<?php
/**
 * @brief	Conains basic site setup, such as pathes
 */
$SETUP = array();

$SETUP['dirs']['core']			= 'core/';
$SETUP['dirs']['pages'] 		= 'pages/';
$SETUP['dirs']['template']		= 'template/';
$SETUP['dirs']['css']			= 'css/';
$SETUP['dirs']['js']			= 'js/';

$SETUP['path']['formget']		= $SETUP['dirs']['core'].'formget.php';
$SETUP['path']['salt']			= $SETUP['dirs']['core'].'salt.php';
$SETUP['path']['phpinfo']		= $SETUP['dirs']['core'].'phpinfo.php';

$SETUP['auth']['algo']			= 'sha512';
$SETUP['auth']['salt-len']		= 15;

?>