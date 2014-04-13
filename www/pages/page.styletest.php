<?php
require_once 'framework.php';

/**
 * Page to test the default CSS.
 *
 * @author steiny
 *
 */
class page_styletest implements IPage
{
    //internal page name
    const NAME = 'styletest';

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
        return 'Style-Test';
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
        ?>

            <h1>Heading1</h1>
			blub
			<h2>Heading2</h2>
			blub
			<h3>Heading3</h3>
			blub
			<h4>Heading4</h4>
			blub
			<h5>Heading5</h5>

			<h3>Paragraph Element</h3>

			<p>Quisque pellentesque sodales aliquam. Morbi mollis neque eget arcu
				egestas non ultrices neque volutpat. Nam at nunc lectus, id
				vulputate purus. In et turpis ac mauris viverra iaculis. Cras sed
				elit a purus ultrices iaculis eget sit amet dolor. Praesent ac
				libero dolor, id viverra libero. Mauris aliquam nibh vitae eros
				sodales fermentum. Fusce cursus est varius ante vehicula eget
				ultrices felis eleifend. Nunc pharetra rutrum nibh et lobortis.
				Morbi vitae venenatis velit.</p>

			<p>Quisque pellentesque sodales aliquam. Morbi mollis neque eget arcu
				egestas non ultrices neque volutpat. Nam at nunc lectus, id
				vulputate purus. In et turpis ac mauris viverra iaculis. Cras sed
				elit a purus ultrices iaculis eget sit amet dolor. Praesent ac
				libero dolor, id viverra libero. Mauris aliquam nibh vitae eros
				sodales fermentum. Fusce cursus est varius ante vehicula eget
				ultrices felis eleifend. Nunc pharetra rutrum nibh et lobortis.
				Morbi vitae venenatis velit.</p>

			<h3>Another Heading Starting Point</h3>

			<p>Quisque pellentesque sodales aliquam. Morbi mollis neque eget arcu
				egestas non ultrices neque volutpat. Nam at nunc lectus, id
				vulputate purus. In et turpis ac mauris viverra iaculis. Cras sed
				elit a purus ultrices iaculis eget sit amet dolor. Praesent ac
				libero dolor, id viverra libero. Mauris aliquam nibh vitae eros
				sodales fermentum. Fusce cursus est varius ante vehicula eget
				ultrices felis eleifend. Nunc pharetra rutrum nibh et lobortis.
				Morbi vitae venenatis velit.</p>

			<p>Quisque pellentesque sodales aliquam. Morbi mollis neque eget arcu
				egestas non ultrices neque volutpat. Nam at nunc lectus, id
				vulputate purus. In et turpis ac mauris viverra iaculis. Cras sed
				elit a purus ultrices iaculis eget sit amet dolor. Praesent ac
				libero dolor, id viverra libero. Mauris aliquam nibh vitae eros
				sodales fermentum. Fusce cursus est varius ante vehicula eget
				ultrices felis eleifend. Nunc pharetra rutrum nibh et lobortis.
				Morbi vitae venenatis velit.</p>

			<div class="box success">
			    <p>Erfolg!</p>
			</div>
			<div class="box fail">
			    <p>Fehler!</p>
			</div>


        <?php
	}
}

?>