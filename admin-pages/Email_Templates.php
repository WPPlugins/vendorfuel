<div id="myTabs">
	<ul>
		<li>
			<a href="#register-email">Register</a>
		</li>
		<li>
			<a href="#checkout-email">Checkout</a>
		</li>
		<li>
			<a href="#shipment-email">Shipment</a>
		</li>
		<li>
			<a href="#rma-email">RMA</a>
		</li>
	</ul>

	<div id="register-email">
		<form  method="post" name="registeremail_form" class="checkAgainstCurrentNew" id="registeremail_form" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Notification Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="notification" type="text" id="registerNotification" style="width:300px;" /><b>(Comma separated address to receive Admin copy of email)</b>
					</td>
                                       
				</tr>
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="name" type="text" id="registerName" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="sender" type="text" id="registerSender" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Subject Line:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="subject" type="text" name="registerSubject" id="registerSubject" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;">Email Body: </td><td>
					<div style="width:800px;">
						<?php wp_editor("","register_email", array('textarea_name' => 'message'))
						?>
						<div style="margin-left:680px; margin-top:20px;" id="saveRegister">
							Save Email
						</div>
					</div></td>
				</tr></table>
		</form>
	</div>

	<div id="checkout-email">
		<form  method="post" name="checkoutemail_form" class="checkAgainstCurrentNew" id="checkoutemail_form" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Notification Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="notification" type="text" id="checkoutNotification" style="width:300px;" /><b>(Comma separated address to receive Admin copy of email)</b>
					</td>
				</tr>
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="name" type="text" id="checkoutName" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="sender" type="text" id="checkoutSender" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Subject Line:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="subject" type="text" id="checkoutSubject" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;">Email Body: </td><td>
					<div style="width:800px;">
						<?php wp_editor("","checkout_email", array('textarea_name' => 'message'))
						?>
						<div style="margin-left:680px; margin-top:20px;" id="saveCheckout">
							Save Email
						</div>
					</div></td>
				</tr></table>
		</form>
	</div>

	<div id="shipment-email">
		<form  method="post" name="shipmentemail_form" class="checkAgainstCurrentNew" id="shipmentemail_form" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Notification Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="notification" type="text" id="shipmentNotification" style="width:300px;" /><b>(Comma separated address to receive Admin copy of email)</b>
					</td>
				</tr>
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="name" type="text" id="shipmentName" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="sender" type="text" id="shipmentSender" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Subject Line:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="subject" type="text" id="shipmentSubject" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;">Email Body: </td><td>
					<div style="width:800px;">
						<?php wp_editor("","shipment_email", array('textarea_name' => 'message'))
						?>
						<div style="margin-left:680px; margin-top:20px;" id="saveShipment">
							Save Email
						</div>
					</div></td>
				</tr></table>
		</form>
	</div>

	<div id="rma-email">
		<form  method="post" name="rmaemail_form" class="checkAgainstCurrentNew" id="rmaemail_form" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Notification Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="notification" type="text" id="rmaNotification" style="width:300px;" /><b>(Comma separated address to receive Admin copy of email)</b>
					</td>
				</tr>
                                <tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="name" type="text" id="rmaName" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sender Email:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="sender" type="text" id="rmaSender" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Subject Line:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="subject" type="text" id="rmaSubject" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;">Email Body: </td><td>
					<div style="width:800px;">
						<?php wp_editor("","rma_email", array('textarea_name' => 'message'))
						?>
						<div style="margin-left:680px; margin-top:20px;" id="saveRma">
							Save Email
						</div>
					</div></td>
				</tr></table>
		</form>
	</div>

</div>

<script>   
    
      jQuery(window).bind('beforeunload', function() {
              jQuery("#register_email-html").click();
               jQuery("#shipment_email-html").click();
               jQuery("#checkout_email-html").click();
               jQuery("#rma_email-html").click();
            });
            
    jQuery(document).ready(function() {
        jQuery("#myTabs").tabs();
        jQuery("#saveRegister").button();
        jQuery("#saveShipment").button();
        jQuery("#saveCheckout").button();
        jQuery("#saveRma").button();

        var htmlRegisterToolbar = '<br/><select id="qt_register_email_selectShortCode">\n\
<option value="%[site-name]%">Site Name</option>\n\
<option value="%[registration-name]%">Customer Name</option>\n\
</select>';
        htmlRegisterToolbar += '<input type="button" id="qt_register_email_insertShortCode" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Placeholder"/> Replace with value.';

        var htmlShipmentToolbar = '<br/><select id="qt_shipment_email_selectShortCode">\n\
    <option value="%[site-name]%">Site Name</option>\n\
<option value="%[customer-name]%">Customer Name</option>\n\
<option value="%[shipping-name]%">Shipping Name</option>\n\
\n\<option value="%[shipping-address1]%">Shipping Address 1</option>\n\
\n\<option value="%[shipping-address2]%">Shipping Address 2</option>\n\
\n\<option value="%[shipping-city]%">Shipping City</option>\n\
\n\<option value="%[shipping-state]%">Shipping State</option>\n\
\n\<option value="%[shipping-zip]%">Shipping Zip</option>\n\
\n\<option value="%[shipping-phone]%">Shipping Phone</option>\n\
\n\<option value="%[shipping-email]%">Shipping Email</option>\n\
\n\<option value="%[payment-method]%">Payment Method</option>\n\
\n\<option value="%[subtotal]%">Subtotal</option>\n\
\n\<option value="%[shipping-total]%">Shipping Total</option>\n\
\n\<option value="%[tax-rate]%">Tax Rate</option>\n\
\n\<option value="%[tax-total]%">Tax Total</option>\n\
\n\<option value="%[total]%">Total</option>\n\
\n\<option value="%[billing-name]%">Billing Name</option>\n\
\n\<option value="%[billing-address1]%">Billing Address 1</option>\n\
\n\<option value="%[billing-address2]%">Billing Address 2</option>\n\
\n\<option value="%[billing-city]%">Billing City</option>\n\
\n\<option value="%[billing-state]%">Billing State</option>\n\
\n\<option value="%[billing-zip]%">Billing Zip</option>\n\
\n\<option value="%[billing-email]%">Billing Email</option>\n\
\n\<option value="%[billing-phone]%">Billing Phone</option>\n\
\n\<option value="%[first-name]%">First Name</option>\n\
\n\<option value="%[last-name]%">Last Name</option>\n\
\n\<option value="%[cost-center-code]%">Cost Center Code</option>\n\
\n\<option value="%[purchase-order]%">Purchase Order</option>\n\
\n\<option value="%[issuing-office]%">Issuing Office</option>\n\
\n\<option value="%[notes]%">Notes</option>\n\
\n\<option value="%[organization]%">Organization</option>\n\
\n\<option value="%[attention]%">Attention</option>\n\
\n\<option value="%[approver]%">Approver</option>\n\
\n\<option value="%[approver-notes]%">Approver Notes</option>\n\
\n\<option value="%[promo-discount]%">Promotion Discount</option>\n\
\n\<option value="%[ebt-discount]%">EBT Discount</option>\n\
\n\<option value="%[f1-name]%">F1 Name</option>\n\
\n\<option value="%[f1-value]%">F1 Value</option>\n\
\n\<option value="%[f2-name]%">F2 Name</option>\n\
\n\<option value="%[f2-value]%">F2 Value</option>\n\
\n\<option value="%[f3-name]%">F3 Name</option>\n\
\n\<option value="%[f3-value]%">F3 Value</option>\n\
\n\<option value="%[f4-name]%">F4 Name</option>\n\
\n\<option value="%[f4-value]%">F4 Value</option>\n\
\n\<option value="%[f5-name]%">F5 Name</option>\n\
\n\<option value="%[f5-value]%">F5 Value</option>\n\
\n\<option value="%[f6-name]%">F6 Name</option>\n\
\n\<option value="%[f6-value]%">F6 Value</option>\n\
\n\<option value="%[rma-purchase-id]%">RMA Purchase ID</option>\n\
\n\<option value="%[rma-product-id]%">RMA Product ID</option>\n\
\n\<option value="%[rma-sku]%">RMA Sku</option>\n\
\n\<option value="%[rma-description]%">RMA Description</option>\n\
\n\<option value="%[rma-purchase-date]%">RMA Purchase Date</option>\n\
\n\<option value="%[rma-reason]%">RMA Reason</option>\n\
\n\<option value="%[rma-quantity]%">RMA Quantity</option>\n\
\n\<option value="%[rma-email]%">RMA Email</option>\n\
\n\<option value="%[rma-notes]%">RMA Notes</option>\n\
\n\<option value="%[rma-id]%">RMA Id</option>\n\
\n\<option value="%[shipping-date]%">Shipping Date</option>\n\
\n\<option value="%[shipping-carrier]%">Shipping Carrier</option>\n\
\n\<option value="%[shipping-code]%">Shipping Code</option>\n\
\n\<option value="%[order-date]%">order-date</option>\n\
\n\<option value="%[shipping-id]%">shipping-id</option>\n\
</select>';
        htmlShipmentToolbar += '<input type="button" id="qt_shipment_email_insertShortCode" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Placeholder"/> Replace with value.';

         htmlShipmentToolbar += '<br/><select id="qt_shipment_email_selectShortCodeConditional">\n\
    <option value="%{[site-name] %[site-name]% }%">Site Name</option>\n\
<option value="%{[customer-name] %[customer-name]% }%">Customer Name</option>\n\
<option value="%{[shipping-name] %[shipping-name]% }%">Shipping Name</option>\n\
\n\<option value="%{[shipping-address1] %[shipping-address1]% }%">Shipping Address 1</option>\n\
\n\<option value="%{[shipping-address2] %[shipping-address2]% }%">Shipping Address 2</option>\n\
\n\<option value="%{[shipping-city] %[shipping-city]% }%">Shipping City</option>\n\
\n\<option value="%{[shipping-state] %[shipping-state]% }%">Shipping State</option>\n\
\n\<option value="%{[shipping-zip] %[shipping-zip]% }%">Shipping Zip</option>\n\
\n\<option value="%{[shipping-phone] %[shipping-phone]% }%">Shipping Phone</option>\n\
\n\<option value="%{[shipping-email] %[shipping-email]% }%">Shipping Email</option>\n\
\n\<option value="%{[payment-method] %[payment-method]% }%">Payment Method</option>\n\
\n\<option value="%{[subtotal] %[subtotal]% }%">Subtotal</option>\n\
\n\<option value="%{[shipping-total] %[shipping-total]% }%">Shipping Total</option>\n\
\n\<option value="%{[tax-rate] %[tax-rate]% }%">Tax Rate</option>\n\
\n\<option value="%{[tax-total] %[tax-total]% }%">Tax Total</option>\n\
\n\<option value="%{[total] %[total]% }%">Total</option>\n\
\n\<option value="%{[billing-name] %[billing-name]% }%">Billing Name</option>\n\
\n\<option value="%{[billing-address1] %[billing-address1]% }%">Billing Address 1</option>\n\
\n\<option value="%{[billing-address2] %[billing-address2]% }%">Billing Address 2</option>\n\
\n\<option value="%{[billing-city] %[billing-city]% }%">Billing City</option>\n\
\n\<option value="%{[billing-state] %[billing-state]% }%">Billing State</option>\n\
\n\<option value="%{[billing-zip] %[billing-zip]% }%">Billing Zip</option>\n\
\n\<option value="%{[billing-email] %[billing-email]% }%">Billing Email</option>\n\
\n\<option value="%{[billing-phone] %[billing-phone]% }%">Billing Phone</option>\n\
\n\<option value="%{[first-name] %[first-name]% }%">First Name</option>\n\
\n\<option value="%{[last-name] %[last-name]% }%">Last Name</option>\n\
\n\<option value="%{[cost-center-code] %[cost-center-code]% }%">Cost Center Code</option>\n\
\n\<option value="%{[purchase-order] %[purchase-order]% }%">Purchase Order</option>\n\
\n\<option value="%{[issuing-office] %[issuing-office]% }%">Issuing Office</option>\n\
\n\<option value="%{[notes] %[notes]% }%">Notes</option>\n\
\n\<option value="%{[organization] %[organization]% }%">Organization</option>\n\
\n\<option value="%{[attention] %[attention]% }%">Attention</option>\n\
\n\<option value="%{[approver] %[approver]% }%">Approver</option>\n\
\n\<option value="%{[approver-notes] %[approver-notes]% }%">Approver Notes</option>\n\
\n\<option value="%{[promo-discount] %[promo-discount]% }%">Promotion Discount</option>\n\
\n\<option value="%{[ebt-discount] %[ebt-discount]% }%">EBT Discount</option>\n\
\n\<option value="%{[f1-name] %[f1-name]% }%">F1 Name</option>\n\
\n\<option value="%{[f1-value] %[f1-value]% }%">F1 Value</option>\n\
\n\<option value="%{[f2-name] %[f2-name]% }%">F2 Name</option>\n\
\n\<option value="%{[f2-value] %[f2-value]% }%">F2 Value</option>\n\
\n\<option value="%{[f3-name] %[f3-name]% }%">F3 Name</option>\n\
\n\<option value="%{[f3-value] %[f3-value]% }%">F3 Value</option>\n\
\n\<option value="%{[f4-name] %[f4-name]% }%">F4 Name</option>\n\
\n\<option value="%{[f4-value] %[f4-value]% }%">F4 Value</option>\n\
\n\<option value="%{[f5-name] %[f5-name]% }%">F5 Name</option>\n\
\n\<option value="%{[f5-value] %[f5-value]% }%">F5 Value</option>\n\
\n\<option value="%{[f6-name] %[f6-name]% }%">F6 Name</option>\n\
\n\<option value="%{[f6-value] %[f6-value]% }%">F6 Value</option>\n\
\n\<option value="%{[rma-purchase-id] %[rma-purchase-id]% }%">RMA Purchase ID</option>\n\
\n\<option value="%{[rma-product-id] %[rma-product-id]% }%">RMA Product ID</option>\n\
\n\<option value="%{[rma-sku] %[rma-sku]% }%">RMA Sku</option>\n\
\n\<option value="%{[rma-description] %[rma-description]% }%">RMA Description</option>\n\
\n\<option value="%{[rma-purchase-date] %[rma-purchase-date]% }%">RMA Purchase Date</option>\n\
\n\<option value="%{[rma-reason] %[rma-reason]% }%">RMA Reason</option>\n\
\n\<option value="%{[rma-quantity] %[rma-quantity]% }%">RMA Quantity</option>\n\
\n\<option value="%{[rma-email] %[rma-email]% }%">RMA Email</option>\n\
\n\<option value="%{[rma-notes] %[rma-notes]% }%">RMA Notes</option>\n\
\n\<option value="%{[rma-id] %[rma-id]% }%">RMA Id</option>\n\
\n\<option value="%{[shipping-date] %[shipping-date]% }%">Shipping Date</option>\n\
\n\<option value="%{[shipping-carrier] %[shipping-carrier]% }%">Shipping Carrier</option>\n\
\n\<option value="%{[shipping-code] %[shipping-code]% }%">Shipping Code</option>\n\
\n\<option value="%{[order-date] %[order-date]% }%">order-date</option>\n\
\n\<option value="%{[shipping-id] %[shipping-id]% }%">shipping-id</option>\n\
</select>';
        htmlShipmentToolbar += '<input type="button" id="qt_shipment_email_insertShortCodeConditional" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Conditional Placeholder"/> Replace with content within {} if value is not null.';

        var htmlCheckoutToolbar = '<br/><select id="qt_checkout_email_selectShortCode">\n\
    <option value="%[site-name]%">Site Name</option>\n\
<option value="%[customer-name]%">Customer Name</option>\n\
<option value="%[shipping-name]%">Shipping Name</option>\n\
\n\<option value="%[shipping-address1]%">Shipping Address 1</option>\n\
\n\<option value="%[shipping-address2]%">Shipping Address 2</option>\n\
\n\<option value="%[shipping-city]%">Shipping City</option>\n\
\n\<option value="%[shipping-state]%">Shipping State</option>\n\
\n\<option value="%[shipping-zip]%">Shipping Zip</option>\n\
\n\<option value="%[shipping-phone]%">Shipping Phone</option>\n\
\n\<option value="%[shipping-email]%">Shipping Email</option>\n\
\n\<option value="%[payment-method]%">Payment Method</option>\n\
\n\<option value="%[subtotal]%">Subtotal</option>\n\
\n\<option value="%[shipping-total]%">Shipping Total</option>\n\
\n\<option value="%[tax-rate]%">Tax Rate</option>\n\
\n\<option value="%[tax-total]%">Tax Total</option>\n\
\n\<option value="%[total]%">Total</option>\n\
\n\<option value="%[billing-name]%">Billing Name</option>\n\
\n\<option value="%[billing-address1]%">Billing Address 1</option>\n\
\n\<option value="%[billing-address2]%">Billing Address 2</option>\n\
\n\<option value="%[billing-city]%">Billing City</option>\n\
\n\<option value="%[billing-state]%">Billing State</option>\n\
\n\<option value="%[billing-zip]%">Billing Zip</option>\n\
\n\<option value="%[billing-email]%">Billing Email</option>\n\
\n\<option value="%[billing-phone]%">Billing Phone</option>\n\
\n\<option value="%[first-name]%">First Name</option>\n\
\n\<option value="%[last-name]%">Last Name</option>\n\
\n\<option value="%[cost-center-code]%">Cost Center Code</option>\n\
\n\<option value="%[purchase-order]%">Purchase Order</option>\n\
\n\<option value="%[issuing-office]%">Issuing Office</option>\n\
\n\<option value="%[notes]%">Notes</option>\n\
\n\<option value="%[organization]%">Organization</option>\n\
\n\<option value="%[attention]%">Attention</option>\n\
\n\<option value="%[approver]%">Approver</option>\n\
\n\<option value="%[approver-notes]%">Approver Notes</option>\n\
\n\<option value="%[promo-discount]%">Promotion Discount</option>\n\
\n\<option value="%[ebt-discount]%">EBT Discount</option>\n\
\n\<option value="%[f1-name]%">F1 Name</option>\n\
\n\<option value="%[f1-value]%">F1 Value</option>\n\
\n\<option value="%[f2-value]%">F2 Value</option>\n\
\n\<option value="%[f3-name]%">F3 Name</option>\n\
\n\<option value="%[f3-value]%">F3 Value</option>\n\
\n\<option value="%[f4-name]%">F4 Name</option>\n\
\n\<option value="%[f4-value]%">F4 Value</option>\n\
\n\<option value="%[f5-name]%">F5 Name</option>\n\
\n\<option value="%[f5-value]%">F5 Value</option>\n\
\n\<option value="%[f6-name]%">F6 Name</option>\n\
\n\<option value="%[f6-value]%">F6 Value</option>\n\
\n\<option value="%[order-date]%">order-date</option>\n\
</select>';
        htmlCheckoutToolbar += '<input type="button" id="qt_checkout_email_insertShortCode" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Placeholder"/> Replace with value.';
        
         htmlCheckoutToolbar += '<br/><select id="qt_checkout_email_selectShortCodeConditional">\n\
    <option value="%{[site-name] %[site-name]% }%">Site Name</option>\n\
<option value="%{[customer-name] %[customer-name]% }%">Customer Name</option>\n\
<option value="%{[shipping-name] %[shipping-name]% }%">Shipping Name</option>\n\
\n\<option value="%{[shipping-address1] %[shipping-address1]% }%">Shipping Address 1</option>\n\
\n\<option value="%{[shipping-address2] %[shipping-address2]% }%">Shipping Address 2</option>\n\
\n\<option value="%{[shipping-city] %[shipping-city]% }%">Shipping City</option>\n\
\n\<option value="%{[shipping-state] %[shipping-state]% }%">Shipping State</option>\n\
\n\<option value="%{[shipping-zip] %[shipping-zip]% }%">Shipping Zip</option>\n\
\n\<option value="%{[shipping-phone] %[shipping-phone]% }%">Shipping Phone</option>\n\
\n\<option value="%{[shipping-email] %[shipping-email]% }%">Shipping Email</option>\n\
\n\<option value="%{[payment-method] %[payment-method]% }%">Payment Method</option>\n\
\n\<option value="%{[subtotal] %[subtotal]% }%">Subtotal</option>\n\
\n\<option value="%{[shipping-total] %[shipping-total]% }%">Shipping Total</option>\n\
\n\<option value="%{[tax-rate] %[tax-rate]% }%">Tax Rate</option>\n\
\n\<option value="%{[tax-total] %[tax-total]% }%">Tax Total</option>\n\
\n\<option value="%{[total] %[total]% }%">Total</option>\n\
\n\<option value="%{[billing-name] %[billing-name]% }%">Billing Name</option>\n\
\n\<option value="%{[billing-address1] %[billing-address1]% }%">Billing Address 1</option>\n\
\n\<option value="%{[billing-address2] %[billing-address2]% }%">Billing Address 2</option>\n\
\n\<option value="%{[billing-city] %[billing-city]% }%">Billing City</option>\n\
\n\<option value="%{[billing-state] %[billing-state]% }%">Billing State</option>\n\
\n\<option value="%{[billing-zip] %[billing-zip]% }%">Billing Zip</option>\n\
\n\<option value="%{[billing-email] %[billing-email]% }%">Billing Email</option>\n\
\n\<option value="%{[billing-phone] %[billing-phone]% }%">Billing Phone</option>\n\
\n\<option value="%{[first-name] %[first-name]% }%">First Name</option>\n\
\n\<option value="%{[last-name] %[last-name]% }%">Last Name</option>\n\
\n\<option value="%{[cost-center-code] %[cost-center-code]% }%">Cost Center Code</option>\n\
\n\<option value="%{[purchase-order] %[purchase-order]% }%">Purchase Order</option>\n\
\n\<option value="%{[issuing-office] %[issuing-office]% }%">Issuing Office</option>\n\
\n\<option value="%{[notes] %[notes]% }%">Notes</option>\n\
\n\<option value="%{[organization] %[organization]% }%">Organization</option>\n\
\n\<option value="%{[attention] %[attention]% }%">Attention</option>\n\
\n\<option value="%{[approver] %[approver]% }%">Approver</option>\n\
\n\<option value="%{[approver-notes] %[approver-notes]% }%">Approver Notes</option>\n\
\n\<option value="%{[promo-discount] %[promo-discount]% }%">Promotion Discount</option>\n\
\n\<option value="%{[ebt-discount] %[ebt-discount]% }%">EBT Discount</option>\n\
\n\<option value="%{[f1-name] %[f1-name]% }%">F1 Name</option>\n\
\n\<option value="%{[f1-value] %[f1-value]% }%">F1 Value</option>\n\
\n\<option value="%{[f2-name] %[f2-name]% }%">F2 Name</option>\n\
\n\<option value="%{[f2-value] %[f2-value]% }%">F2 Value</option>\n\
\n\<option value="%{[f3-name] %[f3-name]% }%">F3 Name</option>\n\
\n\<option value="%{[f3-value] %[f3-value]% }%">F3 Value</option>\n\
\n\<option value="%{[f4-name] %[f4-name]% }%">F4 Name</option>\n\
\n\<option value="%{[f4-value] %[f4-value]% }%">F4 Value</option>\n\
\n\<option value="%{[f5-name] %[f5-name]% }%">F5 Name</option>\n\
\n\<option value="%{[f5-value] %[f5-value]% }%">F5 Value</option>\n\
\n\<option value="%{[f6-name] %[f6-name]% }%">F6 Name</option>\n\
\n\<option value="%{[f6-value] %[f6-value]% }%">F6 Value</option>\n\
\n\<option value="%{[order-date] %[order-date]% }%">order-date</option>\n\
</select>';
        htmlCheckoutToolbar += '<input type="button" id="qt_checkout_email_insertShortCodeConditional" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Conditional Placeholder"/> Replace with content within {} if value is not null.';
    
    htmlCheckoutToolbar += '<br/><select id="qt_checkout_email_selectShortCodeTable">\n\
    <option value="%@[items]<table><tbody><tr><td><strong>Item #</strong></td><td><strong>Item Description</strong></td><td><strong>Unit Price</strong></td><td><strong>Quantity</strong></td><td><strong>Extended Price</strong></td></tr><tr><td>%[item-sku]%</td><td>%[item-desc]%</td><td>%[item-price]%</td><td>%[item-quantity]%</td><td>%[item-extended-price]%</td></tr></tbody></table>@%">Order Items</option>\n\
</select>';
        htmlCheckoutToolbar += '<input type="button" id="qt_checkout_email_insertShortCodeTable" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Table Placeholder"/> Repeats the second table row for each value.';
	
	var htmlRmaToolbar = '<br/><select id="qt_rma_email_selectShortCode">\n\
    <option value="%[site-name]%">Site Name</option>\n\
\n\<option value="%[rma-purchase-id]%">RMA Purchase ID</option>\n\
\n\<option value="%[rma-product-id]%">RMA Product ID</option>\n\
\n\<option value="%[rma-sku]%">RMA Sku</option>\n\
\n\<option value="%[rma-description]%">RMA Description</option>\n\
\n\<option value="%[rma-purchase-date]%">RMA Purchase Date</option>\n\
\n\<option value="%[rma-reason]%">RMA Reason</option>\n\
\n\<option value="%[rma-quantity]%">RMA Quantity</option>\n\
\n\<option value="%[rma-contact]%">RMA Contact</option>\n\
\n\<option value="%[rma-notes]%">RMA Notes</option>\n\
\n\<option value="%[rma-order-id]%">RMA Order Id</option>\n\
\n\<option value="%[rma-request-date]%">RMA Request Date</option>\n\
\n\<option value="%[rma-order-id]%">RMA Order Id</option>\n\
\n\<option value="%[rma-status]%">RMA Status</option>\n\
</select>';
        htmlRmaToolbar += '<input type="button" id="qt_rma_email_insertShortCode" class="ed_button button button-small" aria-label="Inserted Short Code" value="Insert Placeholder"/> Replace with value.';

        
        function fireWhenReady() {
            if ( typeof vfuel.admin != 'undefined') {
                vfuel.admin.viewEmails();
                
                jQuery('#qt_register_email_toolbar').append(htmlRegisterToolbar);
                jQuery('#qt_shipment_email_toolbar').append(htmlShipmentToolbar);
                jQuery('#qt_checkout_email_toolbar').append(htmlCheckoutToolbar);
                jQuery('#qt_rma_email_toolbar').append(htmlRmaToolbar);

                jQuery('#qt_register_email_insertShortCode').click(function() {
                    var cursorPos = jQuery('#register_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#register_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#register_email').val(textBefore + jQuery("#qt_register_email_selectShortCode").val() + textAfter);
                });
                
                
                jQuery('#qt_shipment_email_insertShortCode').click(function() {
                    var cursorPos = jQuery('#shipment_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#shipment_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#shipment_email').val(textBefore + jQuery("#qt_shipment_email_selectShortCode").val() + textAfter);
                });
                
                jQuery('#qt_shipment_email_insertShortCodeConditional').click(function() {
                    var cursorPos = jQuery('#shipment_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#shipment_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#shipment_email').val(textBefore + jQuery("#qt_shipment_email_selectShortCodeConditional").val() + textAfter);
                });
                
                jQuery('#qt_shipment_email_insertShortCodeTable').click(function() {
                    var cursorPos = jQuery('#shipment_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#shipment_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#shipment_email').val(textBefore + jQuery("#qt_shipment_email_selectShortCodeTable").val() + textAfter);
                });
                
                jQuery('#qt_checkout_email_insertShortCode').click(function() {
                    var cursorPos = jQuery('#checkout_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#checkout_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#checkout_email').val(textBefore + jQuery("#qt_checkout_email_selectShortCode").val() + textAfter);
                });
                
                jQuery('#qt_checkout_email_insertShortCodeConditional').click(function() {
                    var cursorPos = jQuery('#checkout_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#checkout_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#checkout_email').val(textBefore + jQuery("#qt_checkout_email_selectShortCodeConditional").val() + textAfter);
                });
                
                jQuery('#qt_checkout_email_insertShortCodeTable').click(function() {
                    var cursorPos = jQuery('#checkout_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#checkout_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#checkout_email').val(textBefore + jQuery("#qt_checkout_email_selectShortCodeTable").val() + textAfter);
                });
                
                jQuery('#qt_rma_email_insertShortCode').click(function() {
                    var cursorPos = jQuery('#rma_email').prop('selectionStart');
                    console.log("cursor: " + cursorPos);
                    var v = jQuery('#rma_email').val();
                    var textBefore = v.substring(0, cursorPos);
                    var textAfter = v.substring(cursorPos, v.length);
                    jQuery('#rma_email').val(textBefore + jQuery("#qt_rma_email_selectShortCode").val() + textAfter);
                });

            } else {
                setTimeout(fireWhenReady, 500);
            }
        }

        fireWhenReady();

        if (vfuel.getURLParameter2('tab') === "registration") {
            jQuery("#myTabs").tabs("option", "active", 0);
        }
        
        if (vfuel.getURLParameter2('tab') === "checkout") {
            jQuery("#myTabs").tabs("option", "active", 1);
        }

        if (vfuel.getURLParameter2('tab') === "shipment") {
            jQuery("#myTabs").tabs("option", "active", 2);
        }

        if (vfuel.getURLParameter2('tab') === "rma") {
            jQuery("#myTabs").tabs("option", "active", 3);
        }
        
        jQuery("#saveRegister").click(function(){
                jQuery('.switch-html').click();
        	vfuel.admin.addEmail('register',jQuery('#registeremail_form').serialize());
        });
        
        jQuery("#saveShipment").click(function(){
            jQuery('.switch-html').click();
        	vfuel.admin.addEmail('shipment',jQuery('#shipmentemail_form').serialize());
        });
        
        jQuery("#saveCheckout").click(function(){
            jQuery('.switch-html').click();
        	vfuel.admin.addEmail('checkout',jQuery('#checkoutemail_form').serialize());
        });
        
        jQuery("#saveRma").click(function(){
            jQuery('.switch-html').click();
        	vfuel.admin.addEmail('rma', jQuery('#rmaemail_form').serialize());
        });
    }); 
</script>