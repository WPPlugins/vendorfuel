<?php
if (isset($_POST['vendorfuel-settings'])) {

	$ps = $_POST['vendorfuel-settings'];


	$settings = array("apiUrl" => "https://sapi1b.vendorfuel.com", "apiKey" => "", "theme" => "", "btnText" => "", "productSlug" => "", "catSlug" => "",
		"company_name_option"=>0, "purchase_order_option"=>0,"issuing_office_option"=>0, "cost_center_option"=>0, "attention_option"=>0, "notes_option"=>0);

	if (isset($ps['apiUrl'])) {
		$settings['apiUrl'] = $ps['apiUrl'];
	}
	if (isset($ps['apiKey'])) {
		$settings['apiKey'] = $ps['apiKey'];
	}
	if (isset($ps['theme'])) {
		$settings['theme'] = $ps['theme'];
	}
	if (isset($ps['debug'])) {
		$settings['debug'] = $ps['debug'];
	}
	if (isset($ps['test'])) {
		$settings['test'] = $ps['test'];
	}
	if (isset($ps['useDefaultNav'])) {
		$settings['useDefaultNav'] = $ps['useDefaultNav'];
	}
	if (isset($ps['pagination'])) {
		$settings['pagination'] = $ps['pagination'];
	}
	if (isset($ps['confirmDelete'])) {
		$settings['confirmDelete'] = $ps['confirmDelete'];
	}
	if (isset($ps['payment_gateways'])) {
		$settings['payment_gateways'] = $ps['payment_gateways'];
	}
	if (isset($ps['confirmNavigate'])) {
		$settings['confirmNavigate'] = $ps['confirmNavigate'];
	}
	if (isset($ps['productSlug'])) {
		$settings['productSlug'] = $ps['productSlug'];
	}
	if (isset($ps['catSlug'])) {
		$settings['catSlug'] = $ps['catSlug'];
	}
	if (isset($ps['requireAddress'])) {
		$settings['requireAddress'] = $ps['requireAddress'];
	}
	if (isset($ps['enableRecyclable'])) {
		$settings['enableRecyclable'] = $ps['enableRecyclable'];
	}
	if (isset($ps['forceHttps'])) {
		$settings['forceHttps'] = $ps['forceHttps'];
	}
	if (isset($ps['company_name_option'])) {
		$settings['company_name_option'] = $ps['company_name_option'];
	}
	if (isset($ps['purchase_order_option'])) {
		$settings['purchase_order_option'] = $ps['purchase_order_option'];
	}
	if (isset($ps['issuing_office_option'])) {
		$settings['issuing_office_option'] = $ps['issuing_office_option'];
	}
	if (isset($ps['cost_center_option'])) {
		$settings['cost_center_option'] = $ps['cost_center_option'];
	}
	if (isset($ps['attention_option'])) {
		$settings['attention_option'] = $ps['attention_option'];
	}
	if (isset($ps['notes_option'])) {
		$settings['notes_option'] = $ps['notes_option'];
	}
	
	
	update_option("vendorfuel-settings", $settings);
}

if (isset($_POST['vendorfuel-conversion'])) {
	$ps = $_POST['vendorfuel-conversion'];
	$conversion = array("adwordsID" => "", "adwordsConversionLabel" => "", "analyticsID" => 0);

	if (isset($ps['adwordsID'])) {
		$conversion['adwordsID'] = $ps['adwordsID'];
	}
	if (isset($ps['adwordsConversionLabel'])) {
		$conversion['adwordsConversionLabel'] = $ps['adwordsConversionLabel'];
	}
	if (isset($ps['analyticsID'])) {
		$conversion['analyticsID'] = $ps['analyticsID'];
	}
	update_option("vendorfuel-conversion", $conversion);
}
?>
<script>
	jQuery(document).ready(function () {
		jQuery("#myTabs").tabs()
		jQuery("#submitSave").button()
		jQuery("#submitSaveSettings").button()
		jQuery("#submitConversionSettings").button()
		jQuery("#submitSaveGateways").button()
		jQuery("#submitSaveActions").button()
		jQuery("#submitSaveImages").button();
		jQuery("#submitBlock").button();
        jQuery("#cancelSubscription").button();
        jQuery("#submit-payment-info").button();
	});
</script>

<div id="myTabs">
	<ul>
		<li><a href="#general">General</a></li>
		<li><a href="#gateways" onclick="vfuel.admin.viewGateways()">Gateways</a></li>
		<!-- Remove license and security tabs for initial release-->
		<!--<li><a href="#license">License</a></li>
		<li><a href="#security">Security</a></li>-->
		<li><a href="#conversionTracking">Conversion Tracking</a></li>
		<li><a href="#images">Images</a></li>
		<li><a href="#paymentInfo" onclick="vfuel.admin.viewSubscription()">Billing</a></li>
	</ul>
	<div id="general">
		<form id="settingsForm" method="post" action="#">
			<?php
			$setting_values = get_option('vendorfuel-settings');
			$setting_keys = array();
			$setting_keys['apiUrl'] = array('name' => 'API URL', 'default' => 'https://sapi1b.vendorfuel.com',
				'type' => 'string');
			$setting_keys['apiKey'] = array('name' => 'API KEY', 'default' => '', 'type' => 'string');
			$setting_keys['theme'] = array('name' => 'Theme', 'default' => '', 'type' => 'string');
			$setting_keys['productSlug'] = array('name' => 'Product Slug', 'default' => 'product',
				'type' => 'string');
			$setting_keys['catSlug'] = array('name' => 'Category Slug', 'default' => 'cat',
				'type' => 'string');
			$setting_keys['debug'] = array('name' => 'Show Debug Information', 'default' => '0',
				'type' => 'bool');
			$setting_keys['test'] = array('name' => 'Test Mode', 'default' => '0', 'type' => 'bool');
			$setting_keys['useDefaultNav'] = array('name' => 'Use Default Navigation Menu Template', 'default' => '1', 'type' => 'bool');
			$setting_keys['forceHttps'] = array('name' => 'Force Cart and Login Templates to HTTPS', 'default' => '1', 'type' => 'bool');
			$setting_keys['pagination'] = array('name' => 'Use pagination instead of infinite scroll',
				'default' => '0', 'type' => 'bool');
			$setting_keys['confirmDelete'] = array('name' => 'Display confirm delete alerts',
				'default' => '1', 'type' => 'bool');
			$setting_keys['confirmNavigate'] = array('name' => 'Confirm before changing page that contains a form',
				'default' => '1', 'type' => 'bool');
			$setting_keys['requireAddress'] = array('name' => 'Require address during registration',
				'default' => '1', 'type' => 'bool');
			$setting_keys['enableRecyclable'] = array('name' => 'Enable recyclable options',
				'default' => '1', 'type' => 'bool');
			$setting_keys['company_name_option'] = array('name' => 'Company Name', 'default' => '0', 'type' => 'bool');
			$setting_keys['purchase_order_option'] = array('name' => 'Purchase Order Number',
				'default' => '0', 'type' => 'bool');
			$setting_keys['issuing_office_option'] = array('name' => 'Issuing Office',
				'default' => '0', 'type' => 'bool');
			$setting_keys['cost_center_option'] = array('name' => 'Cost Center',
				'default' => '0', 'type' => 'bool');
			$setting_keys['attention_option'] = array('name' => 'Attention',
				'default' => '0', 'type' => 'bool');
			$setting_keys['notes_option'] = array('name' => 'Notes',
				'default' => '0', 'type' => 'bool');
			?>
			<table class="widefat form-table">
				<thead>
					<tr>
						<th>Setting</th>
						<th>Value</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($setting_keys as $key => $a) {
						$v = $a['default'];
						if (isset($setting_values[$key])) {
							$v = $setting_values[$key];
						}
						if($key=='company_name_option'){
						?>
							<tr valign="top"><td><h4>Additional Checkout Template Options</h4></td><td></td></tr>
						<?php } ?>
						<tr valign="top" class="vendorfuel-settings-<?php print $key; ?>">
							<td><?php print $a['name']; ?></td>
							<td><?php
								switch ($a['type']) {
									case "bool":
										?>
										<input type="checkbox" name="vendorfuel-settings[<?php print $key; ?>]" value="1"<?php
										if ($v == 1) {
											?> checked="checked"<?php } ?> />
											   <?php
											   break;
										   default:
											   ?>
										<input type="text" style="width: 200px;" name="vendorfuel-settings[<?php print $key; ?>]" value="<?php print $v; ?>" />
										<?php
										break;
								}
								?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br/>
			<input name="submit" type="submit" class="ui-button" id="submitSaveSettings" value="Save" />
		</form>
	</div>

	<div id="gateways">
		<form id="gatewayForm" action="#" method="post">
			<table class="widefat form-table">
				<thead>
					<tr>
						<th>Enabled</th>
						<th>Gateway</th>
						<th>Settings</th>
					</tr>
				</thead>
				<tbody>
					<tr valign="top">
						<td>
							<input type="checkbox" name="gateways[authnet][enabled]" value="1" checked="checked" />
						</td>
						<td>Authorize.net</td>
						<td>
							<table>
								<tr>
									<td>
										Key
									</td>
									<td>
										<input type="text" style="width: 200px;" name="gateways[authnet][key]" value="" />
									</td>
								</tr>
							</table>

                                                    <table>
                                                         <tr>
									<td>
										ID
									</td>
									<td>
										<input type="text" style="width: 200px;" name="gateways[authnet][id]" value="" />
									</td>
								</tr>
                                                    </table>
						</td>
					</tr>
					<tr valign="top">
						<td>
							<input type="checkbox" name="gateways[paypal][enabled]" value="1" checked="checked" />
						</td>
						<td>PayPal</td>
						<td>
							<table>
								<tr>
									<td>
										ID
									</td>
									<td>
										<input type="text" style="width: 200px;" name="gateways[paypal][client_id]" value="" />
									</td>
								</tr>
							</table>
                                                    <table>
                                                        <tr>
									<td>
										Secret
									</td>
									<td>
										<input type="text" style="width: 200px;" name="gateways[paypal][secret]" value="" />
									</td>
								</tr>
                                                    </table>
						</td>
					</tr>

				</tbody>
			</table>
			<br/>
		                 </form>
			<input type="button" class="ui-button" id="submitSaveGateways" name="submitSaveGateways" value="Save" />
	</div>
	<script>            
		 jQuery('#submitSaveGateways').on("click", function(){
                         vfuel.admin.updatePaymentGateways(jQuery('#gatewayForm').serialize());
                });
 
	</script>
	<!-- Remove license and security tabs for initial release-->
	<!--<div id="license">

	</div>

	<div id="security">
		<form id="securityForm" method="post" action="javascript:void(0);">
			IP Address: <input id="blockIP" type="text"/> <input name="submit" style="display:inline;" type="submit" class="ui-button" id="submitBlock" value="Block" />
		</form>
	</div>-->

	<div id="conversionTracking">
		<form id="conversionForm" method="post" action="#">
			<?php
			$conversion_tracking_values = get_option('vendorfuel-conversion');
			$conversion_keys = array();
			$conversion_keys['adwordsID'] = array('name' => 'Google Adwords ID', 'default' => '','type' => 'string');
			$conversion_keys['adwordsConversionLabel'] = array('name' => 'Google Adwords Conversion Label', 'default' => '', 'type' => 'string');
			$conversion_keys['analyticsID'] = array('name' => 'Enable Google Analytics Ecommerce Tracking (requires google analytics to be loaded on view order page)', 'default' => '0', 'type' => 'bool');
			?>
			<table class="widefat form-table">
				<thead>
					<tr>
						<th>Setting</th>
						<th>Value</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					foreach ($conversion_keys as $key => $a) {
						$v = $a['default'];
						if (isset($conversion_tracking_values[$key])) {
							$v = $conversion_tracking_values[$key];
						}
						?>
						<tr valign="top" class="vendorfuel-conversion-<?php print $key; ?>">
							<td><?php print $a['name']; ?></td>
							<td><?php
								switch ($a['type']) {
									case "bool":
										?>
										<input type="checkbox" name="vendorfuel-conversion[<?php print $key; ?>]" value="1"<?php
										if ($v == 1) {
											?> checked="checked"<?php } ?> />
											   <?php
											   break;
										   default:
											   ?>
										<input type="text" style="width: 200px;" name="vendorfuel-conversion[<?php print $key; ?>]" value="<?php print $v; ?>" />
										<?php
										break;
								}
								?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br/>
			<input name="submit" type="submit" class="ui-button" id="submitConversionSettings" value="Save" />
		</form>
	</div>

	<div id="images">
		<form id="imageSettingsForm" method="post" action="javascript:void(0);">
			<table class="widefat form-table">
				<tr valign="top">
					<th scope="row">Storage Location</th>
					<td>
						<label for="repository">Repository</label>
						<select name="repository" id="repository" value="120"><option value="local">Local</option><option value="amazons3">Amazon S3</option> <option value="maxcdn">MaxCDN</option></select>
						<div class="apiholder" style="display:none;">
							<label for="amazonapi">API Key</label>
							<input name="amazonapi" id="amazonapi"/>
						</div>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">Thumbnail size</th>
					<td>
						<label for="thumbnail_size_w1">Width</label>
						<input name="thumbnail_size_w1" type="number" step="1" min="0" id="thumbnail_size_w1" value="120" class="small-text" />
						<label for="thumbnail_size_h1">Height</label>
						<input name="thumbnail_size_h1" type="number" step="1" min="0" id="thumbnail_size_h1" value="90" class="small-text" /><br />
						<input name="thumbnail_crop1" type="checkbox" id="thumbnail_crop1" value="1"  checked='checked'/>
						<label for="thumbnail_crop1">Crop thumbnail to exact dimensions (normally thumbnails are proportional)</label>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">Medium size</th>
					<td><fieldset><legend class="screen-reader-text"><span>Medium size</span></legend>
							<label for="medium_size_w1">Max Width</label>
							<input name="medium_size_w1" type="number" step="1" min="0" id="medium_size_w1" value="480" class="small-text" />
							<label for="medium_size_h1">Max Height</label>
							<input name="medium_size_h1" type="number" step="1" min="0" id="medium_size_h1" value="396" class="small-text" />
						</fieldset></td>
				</tr>

				<tr valign="top">
					<th scope="row">Large size</th>
					<td><fieldset><legend class="screen-reader-text"><span>Large size</span></legend>
							<label for="large_size_w1">Max Width</label>
							<input name="large_size_w1" type="number" step="1" min="0" id="large_size_w1" value="680" class="small-text" />
							<label for="large_size_h1">Max Height</label>
							<input name="large_size_h1" type="number" step="1" min="0" id="large_size_h1" value="300" class="small-text" />
						</fieldset></td>
				</tr>
			</table>
			<input name="submit" type="submit" style="margin-top:6px;" class="ui-button" id="submitSaveImages" value="Save" />
		</form>
		<script>
			jQuery("#repository").change(function () {
				if (jQuery(this).val() == "amazons3") {
					jQuery(".apiholder").css("display", "inline");
				} else {
					jQuery(".apiholder").hide();
				}
			});

		</script>
	</div>
        

	<div id="paymentInfo">
            <div id="currentSubscription">
                <table>
                    <tr>
                        <td><strong><div id="next_payment_date_label">Next Payment Date:</div></strong></td>
                        <td><div id="next_payment_date"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Card on file:</strong></td>
                        <td><div id="card_ending"></div></td>
                    </tr>
                    <tr id="cancelSubBtn">
                        <td><input name="cancelSubscription" type="button" class="ui-button" id="cancelSubscription" value="Cancel" onclick="vfuel.admin.queryCancelSubscription()" /></td>
                    </tr>
                </table>
            </div>
		<?php require('updatePaymentInfo.php'); ?>
            
            <div id="dialog-confirm" title="Cancel Subscription?" style="display:none">
                <p>You will still be able to use account for remaining paid period. Are you sure you want to cancel?</p>
          </div>
	</div>

</div>