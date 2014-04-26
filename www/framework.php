<?php
defined( 'STY_SESSION' ) or die();

session_start();

require_once 'config.php';
require_once 'setup.php';

require_once $SETUP['dirs']['core'].'IPage.php';

function __autoload( $classname )
{
    global $SETUP;

    $classname = strtolower( $classname );
    $page_regexp = "/^page_(.*)$/";
    $matches = array();
    if( preg_match($page_regexp, $classname, $matches) )
    {
        //page requested => load from pages' dir
        include_once $SETUP['dirs']['pages'].'page.'.$matches[1].'.php';
    }
}

/**
 * @brief	Global config object
 */
$config = new Config();

/// Load database definition
require_once str_replace( '$', $config->db[ 'type' ], $SETUP['path']['db'] );

/**
 * @brief	Provides site-wide functions for all other pages
 *
 */
class Framework
{
    // cached database object
    private $db;

    /**
     * Get the singleton class.
     * @return  Reference to the Framework object
     */
    public function instance()
    {
        static $inst;

        if( !isset( $inst ) )
        {
            $c = __CLASS__;
            $inst = new $c;
        }

        return $inst;
    }

    /**
     * Constructor.
     */
    private function __construct()
    {

    }

    /**
     * Check whether a user is logged in.
     * @return	The username or false if no user is logged in
     */
    public function verifyLogin()
    {
        if( !isset( $_SESSION['login'] ) )
        {
            return false;
        }
        return $_SESSION['login'];
    }

    /**
     * Do login a user
     * @param string $un username
     * @param password $pw password
     * @return the username if successful, false otherwise
     */
    public function doLogin( $un, $pw )
    {
        global $config, $SETUP;

        //already logged in?
        if( ( $username = $this->verifyLogin() ) !== false )
            return $username;

        //read setup
        $algo = $SETUP['auth']['algo'];
        $saltlen = -1 * $SETUP['auth']['salt-len'];
        if( !in_array( $algo, hash_algos(), true ) ) //hash algorithm exists?
            die( "FATAL: Hash-Algorithm not found!" );

        //get db entry...
        $pass_hash = $config->password;
        $username = $config->username;

        //verify username
        if( $un !== $username )
            return false;

        //extract salt and hash
        $salt = substr( $pass_hash, $saltlen );
        $hash = substr( $pass_hash, 0, $saltlen );

        if( $hash === hash( $algo, $pw.$salt ) )
        {
            //login successful
            $_SESSION['login'] = $username;
            return $username;
        }

        return false;
    }

    /**
     * Do logout a user
     */
    public function doLogout() {
        session_destroy();
    }

    /**
     * Get all available pages.
     * @return	Array containing the names of available pages (lowercase)
     */
    public function getPages()
    {
        $pages = array();
        $page_file_regexp = "/page\.(.*)\.php/";
        if( $handle = opendir( $SETUP['dirs']['pages'] ) )
        {
            while( false !== ( $entry = readdir( $handle ) ) )
            {
                $matches = array();
                if( preg_match($page_file_regexp, $entry, $matches ) )
                {
                    //valid page file found
                    $pages[] = $matches[1];
                }
            }
            closedir($handle);
        }

        return $pages;
    }

    /**
     * Create an instance of a page.
     * @param	name The page's name
     * @return	Reference to the new page object; NULL if not found
     */
    public function createPage( $name )
    {
        $c = "page_".strtolower($name);
        if( !class_exists( $c, true ) ) //check if class exists and do autoloading
            return NULL;
        return new $c( $this );
    }

    /**
     * Get an IDb object to access the database
     * @return  Reference to the IDb object
     */
    public function getDb()
    {
        global $config;

        if( is_null( $this->db ) ) {
            $cnf = $config->db;
            $name = 'Db'.$cnf['type'];
            $this->db = new $name( $cnf['host'], $cnf['user'], $cnf['pass'], $cnf['dbname'] );
        }

        return $this->db;
    }

    /**
     * Reset fromget value. Should be done after each usage of formget
     */
    public function resetFormget()
    {
        unset($_SESSION['form-post']);
        unset($_SESSION['form-get']);
        unset($_SESSION['form-target']);
    }

}

?>
