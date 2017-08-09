<div>
	<div>
		<p>
			<strong>
				Please set up a store in vendorfuel or click
				<a href="<?php echo get_admin_url() . 'admin.php?page=vendorfuel-Settings'; ?>" />here</a>
				to enter your api key.
			</strong>
		</p>
		<?php if (!is_ssl()): ?>
			<p>
				<strong>We take your privacy and security very seriously. Even though this wordpress page is not secure (https), your data is sent to our api using a secured connection.  If you want to further secure your data before it is sent, please set up your page to use https.</strong>
			</p>
		<?php endif; ?>
	</div>
	<form name="new-store-form" id="new-store-form"
		  enctype="multipart/form-data">

		<ul id="new-store-form-errors" style="display:hidden; color: red;"></ul>

		<table>
			<tr>
				<td colspan="2"><strong>Store Information</strong></td>
			</tr>
			<tr>
				<td>Store Name:</td>
				<td>
					<input name="store[name]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Store Url:</td>
				<td>
					<input name="store[url]" type="text" style="width:300px;"
						   value="<?php echo (is_ssl() ? 'https://' : 'http://') . $this->adminHost(); ?>" />
				</td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>
					<input name="user[name]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<input id="new-user-email" name="user[email]" type="email" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input id="new-user-password" name="user[password]" type="password" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td>
					<input name="user[password_confirmation]" type="password" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2"><strong>Billing Information</strong></td>
			</tr>
			<tr>
				<td>First Name:</td>
				<td>
					<input name="card[firstName]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td>
					<input name="card[lastName]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Address:</td><td>
					<input name="card[billingAddress1]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Address (line 2):</td><td>
					<input name="card[billingAddress2]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>City:</td><td>
					<input name="card[billingCity]" type="text" style="width:200px;" />
				</td>
			</tr>
			<tr>
				<td>State:</td><td>
					<input name="card[billingState]" type="text" style="width:60px;" />
				</td>
			</tr>
			<tr>
				<td>Postal Code:</td><td>
					<input name="card[billingPostcode]" type="text" style="width:100px;" />
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
					<input name="card[number]" type="text" style="width:300px;" />
				</td>
			</tr>
			<tr>
				<td>Expiration Date:</td>
				<td>
					<input name="card[expiryMonth]" type="text" style="width:40px;" /> /
					<input name="card[expiryYear]" type="text" style="width:60px;" />
				</td>
			</tr>
			<tr>
				<td>Cvv Number:</td><td>
					<input name="card[cvv]" type="text" style="width:60px;" />
				</td>
			</tr>
                        
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
                        
                        <tr>
				<td>  
                                    <a href="https://vendorfuel.com/terms" target="_blank"><u>Terms of Service</u></a><input id="tos" style="width: 60px;" name="tos" type="checkbox" />
                                    <a href="https://vendorfuel.com/privacy" target="_blank"><u>Privacy Policy</u></a></label><input id="privacy" style="width: 60px;" name="privacy" type="checkbox" />
                                 </td>
			</tr>
                        
                        <tr>
				<td colspan="2">&nbsp;</td>
			</tr>
                      
			<tr>
				<td>
					<input id="submit-info" type="button" value="Create" />
				</td>
			</tr>
		</table>
	</form>
	<form id="created-store-form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="vendorfuel-created-new-store" value="true" />
		<input type="hidden" name="apikey" />
		<input type="hidden" name="email" />
		<input type="hidden" name="password" />
	</form>

	<script type="text/javascript">
                jQuery("#submit-info").button(); 
		var createdForm = jQuery('#created-store-form');
		var newForm = jQuery('#new-store-form');
		jQuery('#submit-info').click(function () {
                    
                        if(!jQuery('#tos').is(":checked") || !jQuery('#privacy').is(":checked")) {
				alert('Please acknowledge that you accept the Terms of Service and Privacy policy.');
				return;
			}
                        
			jQuery("body")
				.append('<div id="workingOverlay" class="ui-widget-overlay" style="z-index:3"></div>');
			jQuery("#loading-dialog").dialog('open');
			jQuery("#loader").show();

			var errorList = jQuery('#new-store-form-errors');

			jQuery.post('<?php echo str_replace("http://", "https://", $this->api_url); ?>' + 'stores',
				newForm.serializeArray(),
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
					} else {
						console.log(resp);
						createdForm.find('[name=apikey]').val(resp.store.api_key);
						createdForm.find('[name=email]').val(newForm.find('#new-user-email').val());
						createdForm.find('[name=password]').val(newForm.find('#new-user-password').val());
						createdForm.submit();
					}
				}, "json");
		});
	</script>
</div>