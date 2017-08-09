<div>
	<?php
	// TODO: put check here for expired subscription. Otherwise different message.
	// TODO: Fill in current billing address information.
	?>
	<?php if ($this->sub_status == 'inactive'): ?>
		<p>
			<strong>Your subscription has expired. Please update your payment information to continue using VendorFuel.</strong>
		</p>
	<?php else: ?>
		<p>You may update your payment information here.</p>
	<?php endif; ?>
</div>
<div>
	<form name="updatePaymentInfoForm" id="updatePaymentInfoForm"
		  enctype="multipart/form-data">
		<input type="hidden" name="apikey" value="<?php echo $this->apikey; ?>" />
		<input type="hidden" name="tokena" value="<?php echo $this->getCookie('vendorfuel-admin-tokena'); ?>" />
		<input type="hidden" name="tokenb" value="<?php echo $this->getCookie('vendorfuel-admin-tokenb'); ?>" />

		<ul id="update-payment-info-errors" style="display:hidden; color: red;"></ul>

		<table>
			<tr>
				<td colspan="2"><strong>Billing Information</strong></td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td>
					<input name="firstName" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td>
					<input name="lastName" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Address:</td><td>
					<input name="billingAddress1" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Address (line 2):</td><td>
					<input name="billingAddress2" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>City:</td><td>
					<input name="billingCity" type="text" style="width:200px;" />
				</td>
			</tr>
			<tr>
				<td>State:</td><td>
					<input name="billingState" type="text" style="width:60px;" />
				</td>
			</tr>
			<tr>
				<td>Postal Code:</td><td>
					<input name="billingPostcode" type="text" style="width:100px;" />
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2"><strong>Card Information</strong></td>
			</tr>
			<tr>
				<td>Card Number:</td><td>
					<input name="number" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Expiration Date:</td>
				<td>
					<input name="expiryMonth" type="text" style="width:40px;" /> /
					<input name="expiryYear" type="text" style="width:60px;" />
				</td>
			</tr>
			<tr>
				<td>Cvv Number:</td><td>
					<input name="cvv" type="text" style="width:60px;" />
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td>
					<input id="submit-payment-info" type="button" value="Update" />
				</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
            
            jQuery("#submit-payment-info").button();    
		jQuery('#submit-payment-info').click(function () {

			jQuery("body")
				.append('<div id="workingOverlay" class="ui-widget-overlay" style="z-index:3"></div>');
			jQuery("#loading-dialog").dialog('open');
			jQuery("#loader").show();

			var errorList = jQuery('#update-payment-info-errors');
			jQuery.post('<?php echo str_replace("http://", "https://", $this->api_url); ?>' + 'stores/update-payment-info',
				jQuery('#updatePaymentInfoForm').serializeArray(),
				function (resp) {
					console.log(resp);
					if (resp.errors !== undefined && resp.errors.length > 0) {
						console.error("Errors!");

						jQuery("#loading-dialog").dialog('close');
						jQuery("#workingOverlay").remove();

						errorList.empty();
						jQuery.each(resp.errors, function (k, v) {
							errorList.append('<li>' + v + '</li>');
						});
					} else if (resp.store !== undefined) {
						var status = resp.store.status;

						jQuery.cookie('vendorfuel-store-sub-status', status, {
							path: '/',
							domain: '<?php echo $this->adminHost(); ?>'
						});

						window.location.reload();
					}
				}, "json");
		});
	</script>
</div>