<?php

interface IPage {
    /**
     * Constructor
     * @param Framework $fw. The site's framework object.
     */
    public function __construct($framework);

    /**
     * Get the page's title
     */
    public function getTitle();

    /**
     * Protected page?
     * @return	true if user has to be logged in to access this page
     */
    public function requireLogin();

    /**
     * Build the page's content
     *
     * @return	true if successful
     */
    public function buildContent();

    /**
     * Get the page's name
     */
    public function getName();

}