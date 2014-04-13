<?php define('STY_SESSION',true);

require_once 'framework.php';

$template_dir = $SETUP['dirs']['template'];
$css_dir = $SETUP['dirs']['css'];
include_once $template_dir.'variables.php';

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$framework =& Framework::instance();

if( isset( $_GET['logout'] ) )
{
    $framework->doLogout();
    header( 'Location: '.$_SERVER['PHP_SELF'] );
}

$page = NULL;
//determine page to load
if( isset( $_GET['page'] ) )
{
    $page = $framework->createPage( $_GET['page'] );
} else //load default page
    $page = $framework->createPage( $config->default_page );
if( $page !== NULL &&
    $page->requireLogin() &&
    !( $login = $framework->verifyLogin() ) )
{
    //not logged in yet but login required
    $page = $framework->createPage( 'login' );
}

//fallback: show 404 page
if( $page === NULL )
    $page = $framework->createPage( '404' );


( $page !== NULL ) or die( "FATAL: No pages found!" );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />

<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/style.css"
	media="screen" />
<?php echo '<link rel="stylesheet" type="text/css" href="'.$css_dir.'page.'.$page->getName().'.css" media="screen" />'; ?>

<title><?php echo $TEMPLATE[ 'title' ].': '.$page->getTitle(); ?></title>

</head>

<body>

	<div id="wrapper">

		<?php include $template_dir.'header.php'; ?>

		<?php include $template_dir.'nav.php'; ?>

		<div id="content">

			<?php

			$page->buildContent();

			?>

		</div>
		<!-- end #content -->

		<?php include $template_dir.'/sidebar.php'; ?>

		<?php include $template_dir.'footer.php' ?>

	</div>
	<!-- End #wrapper -->

</body>

</html>
