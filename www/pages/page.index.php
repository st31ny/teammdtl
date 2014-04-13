<?php
require_once 'framework.php';

/**
 * Default page if no other page selected.
 *
 * @author steiny
 *
 */
class page_index implements IPage
{
    //internal page name
    const NAME = 'index';

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
        return 'Startseite';
    }

    /**
     * Protected page?
     * @return	true if user has to be logged in to access this page
     */
    public function requireLogin()
    {
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
        ?>Hello World!
        <?php
	}
}

?>