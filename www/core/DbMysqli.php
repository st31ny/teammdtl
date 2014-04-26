<?php

require_once 'setup.php';
require_once $SETUP['path']['idb'];

/**
 * Class for MySQLi connections
*/
class DbMysqli implements IDb {

    private $mysqli;

    /**
     * Connect to a database
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $dbname
     */
    public function __construct( $host, $user, $password, $dbname )
    {
        $this->mysqli = new mysqli( $host, $user, $password, $dbname );
        if( $this->mysqli->connect_error )
            die( 'Database connection error #'.$this->mysqli->connect_errno.': '.$this->mysqli->connect_error );
    }

    /**
     * Execute a single SQL statement
     * @param string $sql SQL statement to execute
     * @return FALSE on failure. IDbResult object on successful execution of a sql query returning data, TRUE otherwise
     */
    public function query( $sql )
    {
        $ret = $this->mysqli->query( $sql );
        if( is_bool( $ret ) )
            return $ret;

        // use our own result class
        return new DbMysqliResult( $ret );

    }

    /**
     * Get the last error message
     * @return string
     */
    public function getError() {
        return $this->mysqli->error;
    }


    /**
     * Escape characters for safe use in a sql query
     * @param string $str String to escape
     * @return escaped string (safe for use in IDb::query())
     */
    public function escape( $str )
    {
        return $this->mysqli->escape_string( $str );
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $this->mysqli->close();
    }

}

/**
 * Class for handling mysql_results
 */
class DbMysqliResult implements IDbResult {

    private $result; //mysqli_result

    /**
     * Constructor
     * @param mysqli_result $result MySQLi result object
     */
    public function __construct( $result )
    {
        $this->result = $result;
    }

    /**
     * Get the next result row
     * @return array Associative array mapping the columns onto their values, or NULL if no more rows are available
     */
    public function next()
    {
        return $this->result->fetch_assoc();
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $result->free();
    }

}

