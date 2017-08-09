<?php
if (isset($_POST['vendorfuel-terminology'])) {

	$ps = $_POST['vendorfuel-terminology'];

	$terminology = array("btnText" => "", "loggedInText" => "", "promptSignup" => "");

	if (isset($ps['btnText'])) {
		$terminology['btnText'] = $ps['btnText'];
	}

	if (isset($ps['loggedInText'])) {
		$terminology['loggedInText'] = $ps['loggedInText'];
	}
	
	if (isset($ps['promptSignup'])) {
		$terminology['promptSignup'] = stripslashes($ps['promptSignup']);
	}

	update_option("vendorfuel-terminology", $terminology);
}
?> 

<script>
    jQuery(document).ready(function() {
        jQuery("#myTabs").tabs();
        jQuery("#submitSaveTerminology").button();
    });
</script>

<div id="myTabs">
	<ul>
		<li><a href="#general">General</a></li>
	</ul>
	<div id="general">
	    <form id="terminologyForm" method="post" action="#"> 
	        <?php $terminology_values = get_option('vendorfuel-terminology');
			$terminology_keys = array();
			$terminology_keys['btnText'] = array('name' => 'Cart Button Text', 'default' => 'Add to Cart', 'type' => 'string');
			$terminology_keys['loggedInText'] = array('name' => 'Logged In Text', 'default' => 'Logged In As', 'type' => 'string');
			$terminology_keys['promptSignup'] = array('name' => 'Prompt Signup Text', 'default' => 'Log in or create an account now and enjoy an easier and faster checkout process.', 'type' => 'area');
			?>
	        <table class="widefat form-table">
	            <thead>
	                <tr>
	                    <th>Terminology</th>
	                    <th>Value</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php
	                    $i=0;
	                    foreach ($terminology_keys as $key => $a){
	                    	$v = $a['default'];
	                    	if(isset($terminology_values[$key])){
	                    		 $v = $terminology_values[$key]; 
							}
	                ?>
	                <tr valign="top" class="vendorfuel-terminology-<?php print $key; ?>">
	                		<td><?php print $a['name']; ?></td>
	                        <td><?php
	                        switch($a['type']){
								case "bool":
									?>
									<input type="checkbox" name="vendorfuel-terminology[<?php print $key; ?>]" value="1"<?php 
									if($v==1){
										?> checked="checked"<?php } ?> />
									<?php
									break;
								case "area":
									?>
									<textarea rows="4" cols="50" name="vendorfuel-terminology[<?php print $key; ?>]"><?php print $v; ?></textarea>
									<?php
								
								break;	
									default:
									?>
									<input type="text" style="width: 200px;" name="vendorfuel-terminology[<?php print $key; ?>]" value="<?php print $v; ?>" />
									<?php
									break;
									}
	                        ?></td>
	                </tr>
	                <?php } ?>
	            </tbody>
	        </table>
	        <br/>
	           <input name="submit" type="submit" class="ui-button" id="submitSaveTerminology" value="Save" />
	    </form>
	</div>
	
	<script>
        jQuery("#terminologyForm input[name='vendorfuel-terminology[btnText]']").val(vfuel_config["vendorfuel-terminology"].btnText);
        jQuery("#terminologyForm input[name='vendorfuel-terminology[loggedInText]']").val(vfuel_config["vendorfuel-terminology"].loggedInText);
        /*jQuery('#submitSaveTerminology').click(function() {
            $.post("../wp-content/plugins/vendorfuel/set-config.php", jQuery('#terminologyForm').serialize(), function(response) {
            }, 'json');
            vfuel.admin.showNotification("Terminology Saved");
        });*/

	</script>
	
</div>