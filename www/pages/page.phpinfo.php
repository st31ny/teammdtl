<?php
require_once 'framework.php';

/**
 * Display the phpinfo()
 *
 * @author steiny
 *
 */
class page_phpinfo implements IPage
{
    //internal page name
    const NAME = 'PHP-Info';

    private $framework;

    /**
     * Constructor
     * @param Framework $fw. The site's framework object.
     */
    public function __construct($fw)
    {
        $this->framework = $fw;
    }

    /**
     * Get the page's title
     */
    public function getTitle()
    {
        return 'Logout';
    }

    /**
     * Protected page?
     * @return	true if user has to be logged in to access this page
     */
    public function requireLogin()
    {
        //return true;
        return false;
    }

    /**
     * Get the page's name
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * Build the page's content
     *
     * @return	true if successful
     */
    public function buildContent()
    {
        global $SETUP;

        echo '<h1>PHP-Info</h1>';
        echo '<a href="'.$SETUP['path']['phpinfo'].'">PHP-Info aufrufen</a>';
	}
}

?>