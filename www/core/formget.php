<?php session_start(); define('STY_SESSION',true);
/**
 * helper script to receive form data
 * the content of the _POST var is stored in $_SESSION['form-post'], _GET is stored in $_SESSION['form-get']
 * the target is determined by $_SESSION['form-target']. values should be unset() after usage!
 *
 * retain _GET like this:
 *	$_SESSION['form-target'] = $_SERVER['REQUEST_URI'];
 */

$_SESSION['form-post'] = $_POST;
$_SESSION['form-get' ] = $_GET;

header( 'Location: ' . $_SESSION['form-target'] );

?>