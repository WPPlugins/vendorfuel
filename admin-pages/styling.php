<?php
if (isset($_POST['customcss'])) {

	$file_open = fopen(dirname(__DIR__) . '/local/css/style.css', "w+");
	fwrite($file_open, stripslashes($_POST['customcss']));
	fclose($file_open);
}
?>
<script>
    jQuery(document).ready(function() {
        jQuery("#myTabs").tabs();
        jQuery("#submitSaveCSS").button();
    }); 
</script>

<div id="myTabs">
	<ul>
		<li>
			<a href="#css">CSS</a>
		</li>
	</ul>

	<div id="css">
		<form action="<?=$PHP_SELF?>" method="POST">
			<textarea name="customcss" style="width: 700px; height: 600px;">
<?php $datalines = file(dirname(__DIR__) . '/local/css/style.css');

				foreach ($datalines as $zz) {
					echo $zz;
				}
			?>
</textarea>			


			<div>
				<input id="submitSaveCSS" type="submit" name="button" value="Save CSS"/>
			</div>
		</form>
	</div>

</div>