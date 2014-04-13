<?php defined( 'STY_SESSION' ) or die();

include_once $SETUP['dirs']['template'].'/variables.php';
?>
<div id="footer">
	<p>
		<?php echo $TEMPLATE['footer']; ?>
	</p>
	<p id="time">
		<?php echo date("Y-m-d H:i:s");?>
	</p>
</div>
<!-- end #footer -->
