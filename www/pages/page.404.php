<?php
require_once 'framework.php';

/**
 * 404 page.
 *
 * @author steiny
 *
 */
class page_404 implements IPage
{
    //internal page name
    const NAME = 'logout';

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
        return 'Seite nicht gefunden';
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

        ?>

            <div class="box" id="fail">
                <p>Ooops! Da ging wohl was schief... Konnte die Seite nicht laden :(</p>
            </div>

        <?php
	}
}

?>