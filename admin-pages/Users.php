<!--<h2 class="nav-tab-wrapper"><a href="admin.php?page=<?php print $path; ?>&tab=listCustomers" class="nav-tab <?php echo $my_active_tab == 'listCustomers' ? 'nav-tab-active' : ''; ?>">Search</a><a href="admin.php?page=<?php print $path; ?>&tab=newCustomer" class="nav-tab <?php echo $my_active_tab == 'newCustomer' ? 'nav-tab-active' : ''; ?>">Add</a></h2>-->
<div id="myTabs">
	<ul>
		<li>
			<a href="#listCustomers">Search</a>
		</li>
		<li>
			<a href="#newCustomer">Add</a>
		</li>
		<li>
			<a href="#upload">Upload</a>
		</li>
		<li>
			<a href="#batches" id="batches_link">Batches</a>
		</li>
	</ul>

	<div id="attachInterface_modal">
		<form action="#" method="post" name="search" id="add_new_interface" enctype="multipart/form-data" onsubmit="return false">
			<table>

				<tr>
					<td>Vendor ID:</td><td>
					<input name="user_id" type="text" id="user_id_interface" style="width:250px;" readonly />
					</td>
				</tr>

				<tr>
					<td>Label:</td><td>
					<input name="label" type="text" id="label_new" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td>Integration Type:</td><td>
					<select name="type" type="text" id="integration_type_new" style="width:300px;" />
					<option value="edi">EDI</option><option value="cxml">cXML</option><option value="xml">xml</option><option value="json">json</option><option value="soap">soap</option><option value="http">http</option></select></td>
				</tr>
				<tr>
					<td>
					<div class="hiddenCXML">
						Punchout Identity:
					</div></td><td>
					<input class="hiddenCXML" name="f1" type="text" id="punchoutidentity_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>
					<div class="hiddenCXML">
						Shared Secret:
					</div></td><td>
					<input class="hiddenCXML" name="f2" type="text" id="sharedSecret_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td class="f1show">f1:</td><td>
					<input name="f1" class="f1show" type="text" id="f1_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td class="f2show">f2:</td><td>
					<input name="f2" class="f2show" type="text" id="f2_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>f3:</td><td>
					<input name="f3" class="f3show" type="text" id="f3_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>f4:</td><td>
					<input name="f4" class="f4show" type="text" id="f4_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr id="newCustomInterfaceFields">
					<td>f5:</td><td>
					<input name="f5" class="f5show" type="text" id="f5_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>
					<div name="addCustomInterfaceNew" class="add_custom_interface_new"  id="addCustomInterfaceNew" style="width:185px;">
						Add Custom Parameter
					</div></td>
				</tr>

			</table>
		</form>

	</div>

	<div id="customer_options_modal_edit">
		<form action="#" method="post" name="customer_options_form" id="customer_options_form_edit" onsubmit="return false">
			<table cellpadding="1" style="margin-top:8px;" cellspacing="0" class="dbTable">
				<tr style="border-bottom:1px solid #000;">
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F1 Replace Field:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<select name="f1_replace_field" type="text" id="f1_replace_field_edit" style="width:150px;">
						<option value="">None</option>
						<option value="organization">Company Name</option>
						<option value="rr_po_num">Purchase Order Number</option>
						<option value="issuing_office">Issuing Office</option>
						<option value="cost_center_code">Cost Center</option>
						<option value="attention">Attention</option>
					</select></td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F1 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f1_name" type="text" id="f1_name_edit" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F1 Value:</td>
					<td style="vertical-align:top;"><span id="first_f1_value_edit">
						<input  name="f1_value[]" id="f1_value1" class="clearFVals" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f1_val"  id="addF1Value_edit">
						Add F1 Value
					</div></td>

				</tr>

				<tr>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F2 Replace Field:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<select name="f2_replace_field" type="text" id="f2_replace_field_edit" style="width:150px;">
						<option value="">None</option>
						<option value="organization">Company Name</option>
						<option value="rr_po_num">Purchase Order Number</option>
						<option value="issuing_office">Issuing Office</option>
						<option value="cost_center_code">Cost Center</option>
						<option value="attention">Attention</option>
					</select></td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F2 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f2_name" type="text" id="f2_name_edit" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F2 Value:</td>
					<td style="vertical-align:top;"><span id="first_f2_value_edit">
						<input name="f2_value[]" id="f2_value1" class="clearFVals" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f2_val"  id="addF2Value_edit">
						Add F2 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F3 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f3_name" type="text" id="f3_name_edit" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F3 Value:</td>
					<td style="vertical-align:top;"><span id="first_f3_value_edit">
						<input  name="f3_value[]" id="f3_value1" class="clearFVals" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f3_val"  id="addF3Value_edit">
						Add F3 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F4 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f4_name" type="text" id="f4_name_edit" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F4 Value:</td>
					<td style="vertical-align:top;"><span id="first_f4_value_edit">
						<input  name="f4_value[]" id="f4_value1" class="clearFVals" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f4_val"  id="addF4Value_edit">
						Add F4 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F5 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f5_name" type="text" id="f5_name_edit" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F5 Value:</td>
					<td style="vertical-align:top;"><span id="first_f5_value_edit">
						<input  name="f5_value[]" id="f5_value1" class="clearFVals" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f5_val"  id="addF5Value_edit">
						Add F5 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F6 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f6_name" type="text" id="f6_name_edit" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F6 Value:</td>
					<td style="vertical-align:top;"><span id="first_f6_value_edit">
						<input name="f6_value[]" id="f6_value1" class="clearFVals" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f6_val"  id="addF6Value_edit">
						Add F6 Value
					</div></td>

				</tr>

			</table>
		</form>
	</div>

	<div id="customer_options_modal">
		<form action="#" method="post" name="customer_options_form" id="customer_options_form" onsubmit="return false">
			<table cellpadding="1" style="margin-top:8px;" cellspacing="0" class="dbTable">
				<tr style="border-bottom:1px solid #000;">
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F1 Replace Field:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<select name="f1_replace_field" type="text" id="f1_replace_field" style="width:150px;">
						<option value="">None</option>
						<option value="organization">Company Name</option>
						<option value="rr_po_num">Purchase Order Number</option>
						<option value="issuing_office">Issuing Office</option>
						<option value="cost_center_code">Cost Center</option>
						<option value="attention">Attention</option>
					</select></td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F1 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f1_name" type="text" id="f1_name" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F1 Value:</td>
					<td style="vertical-align:top;"><span id="first_f1_value">
						<input  name="f1_value[]" id="f1_value1_new" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f1_val"  id="addF1Value">
						Add F1 Value
					</div></td>

				</tr>

				<tr>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F2 Replace Field:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<select name="f2_replace_field" type="text" id="f2_replace_field" style="width:150px;">
						<option value="">None</option>
						<option value="organization">Company Name</option>
						<option value="rr_po_num">Purchase Order Number</option>
						<option value="issuing_office">Issuing Office</option>
						<option value="cost_center_code">Cost Center</option>
						<option value="attention">Attention</option>
					</select></td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F2 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f2_name" type="text" id="f2_name" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F2 Value:</td>
					<td style="vertical-align:top;"><span id="first_f2_value">
						<input name="f2_value[]" id="f2_value1_new" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f2_val"  id="addF2Value">
						Add F2 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F3 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f3_name" type="text" id="f3_name" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F3 Value:</td>
					<td style="vertical-align:top;"><span id="first_f3_value">
						<input  name="f3_value[]" id="f3_value1_new" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f3_val"  id="addF3Value">
						Add F3 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F4 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f4_name" type="text" id="f4_name" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F4 Value:</td>
					<td style="vertical-align:top;"><span id="first_f4_value">
						<input  name="f4_value[]" id="f4_value1_new" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f4_val"  id="addF4Value">
						Add F4 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F5 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f5_name" type="text" id="f5_name" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F5 Value:</td>
					<td style="vertical-align:top;"><span id="first_f5_value">
						<input  name="f5_value[]" id="f5_value1_new" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f5_val"  id="addF5Value">
						Add F5 Value
					</div></td>

				</tr>

				<tr>
					<td></td><td></td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F6 Name:</td>
					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">
					<input name="f6_name" type="text" id="f6_name" style="width:150px;"/>
					</td>

					<td align="left" style="vertical-align:top;" nowrap="nowrap" class="dbtext">F6 Value:</td>
					<td style="vertical-align:top;"><span id="first_f6_value">
						<input name="f6_value[]" id="f6_value1_new" type="text" style="width:150px; display:block;" />
					</span></td>

					<td style="vertical-align:top;">
					<div class="add_f6_val"  id="addF6Value">
						Add F6 Value
					</div></td>

				</tr>

			</table>
		</form>
	</div>

	<div id="listCustomers">
		<br/>
		<form action="#" method="post" name="search" id="vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_search" style="width: 150px;" value="" />
					</td>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					<input name="submit" type="submit" class="ui-button" style="float:right;" id="submitSearch" value="Search" />
					</td>
				</tr>
			</table>
		</form>

		<div id="list_viewport"></div>
		<div id="edit_viewport" style="display:none;">

			<form action="#" style="width:800px; display:inline-block;" method="post" class="checkAgainstCurrent" name="customer_form_u" id="customer_form_u" onsubmit="return false">

				<table cellpadding="1" cellspacing="0" class="dbTable">
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Customer ID:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="customer_id" type="text" id="customer_id" style="width:300px;" readonly/>
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Name:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="name" type="text" id="CustomerName" style="width:300px;"/>
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Email:</td>
						<td>
						<input name="email" type="text" id="CustomerEmail" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Agency:</td>
						<td>
						<input name="organization" type="text" id="CustomerAgency" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Punchout Identity:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="punchout_identity" type="text" id="CustomerPunchoutIdentity" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Shared Secret:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="punchout_secret" type="text" id="CustomerSharedSecret" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Terms:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="terms" type="text" id="CustomerTerms" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Order Prefix:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="order_prefix" type="text" id="CustomerOrderPrefix" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Limit Type:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="limit_type" id="CustomerLimitType">
							<option value="none" selected="selected">None</option>
							<option value="monthly">monthly</option>
							<option value="quarterly">quarterly</option>
							<option value="flat">flat</option>
						</select></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Limit:</td>
						<td align="left" nowrap="nowrap" class="dbtext">$
						<input name="limit" type="text" id="CustomerLimit" style="width:150px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Group:</td>
						<td align="left" nowrap="nowrap" class="dbtext"><select name="group_id" class="select_group" id="CustomerGroupId"></select></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Password:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="password" type="text" id="password" style="width:300px;" />
						<button id="generatePass" class="generate">
							Generate
						</button></td>
					</tr>

					<tr id="customFields">
						<td align="left" nowrap="nowrap" class="dbtext">Price Sheet:</td>
						<td align="left" nowrap="nowrap" class="dbtext"><select name="price_sheet" class="select_price" id="CustomerPriceSheet">

						</select></td>
					</tr>

					<tr>
						<td>
						<div name="addCustom" class="add_custom"  id="addCustom">
							Add Custom Parameter
						</div></td>
					</tr>

					<tr>
						<td>
						<div name="addCustomCheckout" class="add_custom_checkout_"  id="addCustomCheckout" style="width:185px;">
							Edit Custom Checkout
						</div></td>
					</tr>

					<tr>
						<td>
						<input name="attach" type="submit" id="attachInterface" value="Attach Interface" />
						</td>
					</tr>

					<tbody class="single_user_options_u" style="display:block;">
						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="credit_line" type="checkbox" class="ck_btn" id="ck_credit_line_u" value="1" />
							<label style="width:185px;" for="ck_credit_line_u">Credit Line</label></td>
						</tr>

						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="optin" type="checkbox" class="ck_btn" id="ck_optin_u" value="1" />
							<label style="width:185px;" for="ck_optin_u">Email Optin</label></td>
						</tr>

						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="taxable" type="checkbox" class="ck_btn" id="ck_taxable_u" value="1" />
							<label style="width:185px;" for="ck_taxable_u">Taxable</label></td>
						</tr>

						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="punchout_only" type="checkbox" class="ck_btn" id="ck_punchout_only_u" value="1" />
							<label style="width:185px;" for="ck_punchout_only_u">Punchout Only</label></td>
						</tr>
						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="lock_billing" type="checkbox" class="ck_btn" id="ck_lock_billing_u" value="1" />
							<label style="width:185px;" for="ck_lock_billing_u">Lock Billing</label></td>
						</tr>
						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="lock_shipping" type="checkbox" class="ck_btn" id="ck_lock_shipping_u" value="1" />
							<label style="width:185px;" for="ck_lock_shipping_u">Lock Shipping</label></td>
						</tr>

						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="change_pw" type="checkbox" class="ck_btn" id="ck_change_pw_u" value="1" />
							<label style="width:185px;" for="ck_change_pw_u">Change Password</label></td>
						</tr>
					</tbody>
					<tbody class="group_user_options_u" style="display:none;">
						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="group_admin" type="checkbox" class="ck_btn" id="ck_group_admin_u" value="1" />
							<label style="width:185px;" for="ck_group_admin_u">Group Admin</label></td>
						</tr>

						<tr>

							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="approver" type="checkbox" class="ck_btn" id="ck_approve_orders_u" value="1" />
							<label style="width:185px;" for="ck_approve_orders_u">Approve Orders</label></td>
						</tr>

						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="pending_emails" type="checkbox" class="ck_btn" id="ck_pending_emails_u" value="1" />
							<label style="width:185px;" for="ck_pending_emails_u">Pending Order Emails</label></td>
						</tr>

						<tr>
							<td align="left" nowrap="nowrap" class="dbtext">
							<input name="allow_payment" type="checkbox" class="ck_btn" id="ck_payment_options_u" value="1" />
							<label style="width:185px;" for="ck_payment_options_u">Enable Payments</label></td>
						</tr>

					</tbody>
				</table>
				<div style="margin-top:10px; margin-bottom:10px;" id="btnViewBillingAddress">
					View Billing Profiles
				</div>
				<div style="margin-top:10px; margin-bottom:10px;" id="btnViewShippingAddress">
					View Shipping Profiles
				</div>
				<br>
				<input type="hidden" name="new_customer" value="false" />
				<input name="reset" type="reset" id="reset_u" value="Reset" />
				&nbsp;&nbsp;
				<input name="submit" type="submit" class="btn_submit_customer"  id="submitCustomer" value="Update Customer" />
				<input name="loginAs" type="submit" class="btn_login_as"  id="loginAs" value="Login As Customer" />
				
			</form>
			<div style="width:400px; background:#ddd; border-radius:5px; margin-top:10px; padding:10px; display:block;" id="listNotes">
				<textarea cols="50" id="newNote"></textarea>
				<div id="addNote">
					Add Note
				</div>

			</div>
			<div>

				<div id="billingForm">
					<div id="listFormTabs">
						<ul>
							<li>
								<a href="#listAddresses">List</a>
							</li>
							<li>
								<a href="#addNewBilling">Add New</a>
							</li>
						</ul>
						<div id="listAddresses">
							
						</div>
						<div id="addNewBilling">
							<div id="billingBody">
								<form action="#" method="post" name="search" id="addShippingForm" enctype="multipart/form-data" onsubmit="return false">
									<table>

										<tr>
											<td>Profile Name:</td><td>
											<input name="address_name" placeholder="ex: Home" type="text" id="addressName" style="width:300px;" />
											</td>
										</tr>

										<tr>
											<td>First Name*:</td><td>
											<input id="firstNameA" type="text" name="first_name" placeholder="Name" required="" style="width:300px;" />
											</td>
										</tr>

										<tr>
											<td>Last Name*:</td><td>
											<input  id="lastNameA" type="text" name="last_name" placeholder="Name" style="width:300px;" />
											</td>
										</tr>
										<tr>
											<td>Email*:</td><td>
											<input id="email" type="text" name="email" placeholder="johndoe@example.com" style="width:300px;" />
											</td>
										</tr>
										<tr>
											<td>Address*:</td><td>
											<input id="address1" type="text" name="address1" placeholder="Address" style="width:300px;" />
											</td>
										</tr>
										<tr>
											<td>Address Line 2:</td><td>
											<input id="address2" type="text" name="address2" placeholder="Address Line 2" style="width:300px;" />
											</td>
										</tr>

										<tr>
											<td>City*:</td><td>
											<input id="city" type="text" name="city" placeholder="City" style="width:300px;" />
											</td>
										</tr>

										<tr>
											<td>State*:</td><td>
											<select id="state" name="state">
												<option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District Of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option>
											</select></td>
										</tr>

										<tr>
											<td>Zip Code:</td><td>
											<input  id="zipcode" type="text" name="zip" placeholder="Zip Code" style="width:300px;" />
											</td>
										</tr>
										<tr>
											<td>Phone Number:</td><td>
											<input style="width:40px" id="areacode" type="text" name="area_code" placeholder="Area" />
											<input style="width:90px;" id="phone" type="text" name="phone" placeholder="Phone Number" />
											</td>
										</tr>

										<tr>
											<td></td><td>
											<input style="float:right;" name="submit" type="submit" class="btn_submit_profile"  id="submitProfile" value="Add Profile" />
											</td>
										</tr>

									</table>
								</form>
								<input id="shiptype" type="hidden" name="type" style="width:300px;" />
							    <input id="profileid" type="hidden" name="profile_id" style="width:300px;" />
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<script>
            jQuery(document).ready(function() {
                jQuery("#addNote").button();
                jQuery("#addF1Value").button();
                jQuery("#addF2Value").button();
                jQuery("#addF3Value").button();
                jQuery("#addF4Value").button();
                jQuery("#addF5Value").button();
                jQuery("#addF6Value").button();
                jQuery("#addF1Value_edit").button();
                jQuery("#addF2Value_edit").button();
                jQuery("#addF3Value_edit").button();
                jQuery("#addF4Value_edit").button();
                jQuery("#addF5Value_edit").button();
                jQuery("#addF6Value_edit").button();
                jQuery("#reset_u").button();
                jQuery("#addCustom").button();
                jQuery("#submitCustomer").button();
                jQuery("#loginAs").button();
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();

                var counter = 2;

                jQuery('#addNote').click(function() {
                    vfuel.admin.customernotesAdd(jQuery('#customer_id').val(), jQuery('#newNote').val());
                });

                jQuery("#addF1Value").click(function() {
                    jQuery("#first_f1_value").append('<input name="f1_value[]"  type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF2Value").click(function() {
                    jQuery("#first_f2_value").append('<input name="f2_value[]" type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF3Value").click(function() {
                    jQuery("#first_f3_value").append('<input name="f3_value[]"  type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF4Value").click(function() {
                    jQuery("#first_f4_value").append('<input name="f4_value[]" type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF5Value").click(function() {
                    jQuery("#first_f5_value").append('<input name="f5_value[]"  type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF6Value").click(function() {
                    jQuery("#first_f6_value").append('<input name="f6_value[]"  type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF1Value_edit").click(function() {
                    jQuery("#first_f1_value_edit").append('<input name="f1_value[]" class="deleteFVals" type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF2Value_edit").click(function() {
                    jQuery("#first_f2_value_edit").append('<input name="f2_value[]" class="deleteFVals"   type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF3Value_edit").click(function() {
                    jQuery("#first_f3_value_edit").append('<input name="f3_value[]" class="deleteFVals"  type="text"  style="width:150px; display:block;" />');

                });

                jQuery("#addF4Value_edit").click(function() {
                    jQuery("#first_f4_value_edit").append('<input name="f4_value[]" class="deleteFVals"  type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF5Value_edit").click(function() {
                    jQuery("#first_f5_value_edit").append('<input name="f5_value[]" class="deleteFVals" type="text" style="width:150px; display:block;" />');

                });

                jQuery("#addF6Value_edit").click(function() {
                    jQuery("#first_f6_value_edit").append('<input name="f6_value[]" class="deleteFVals"  type="text" style="width:150px; display:block;" />');

                });

                jQuery("#submitSearch").click(function() {                	
                	
                    vfuel.admin.customerList(jQuery('#vendorfuel-search').serialize());
                });
                jQuery("#loginAs").click(function() {
                    vfuel.admin.customerLogin(jQuery('#customer_id').val());
                });
                jQuery("#addCustom").click(function() {
                    jQuery("#customFields").after('<tr class="customRow"><td><input class="newCustomFieldName" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValue" name="placeholderName" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustom">Remove Field</div></td></tr>')
                    jQuery(".btnRemoveCustom").button();
                    jQuery(".btnRemoveCustom").click(function() {
                        jQuery(this).closest('.customRow').remove();
                    });
                });
            });
		</script>
	</div>

	<div id="newCustomer">
		<br/>
		<form action="#" method="post" class="checkAgainstCurrentNew" name="new_customer_form" id="new_customer_form" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="name" type="text" id="newCustomerName" style="width:300px;"/>
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Email:</td>
					<td>
					<input name="email" type="text" id="newCustomerEmail" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Agency:</td>
					<td>
					<input name="organization" type="text" id="newCustomerAgency" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Punchout Identity:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="punchout_identity" type="text" id="newCustomerPunchoutIdentity" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Shared Secret:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="punchout_secret" type="text" id="newCustomerSharedSecret" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Terms:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="terms" type="text" id="newCustomerTerms" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Order Prefix:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="order_prefix" type="text" id="newCustomerOrderPrefix" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Limit Type:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<select name="limit_type" id="newCustomerLimitType">
						<option value="none" selected="selected">None</option>
						<option value="monthly">monthly</option>
						<option value="quarterly">quarterly</option>
						<option value="flat">flat</option>
					</select></td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Limit:</td>
					<td align="left" nowrap="nowrap" class="dbtext">$
					<input name="limit" type="text" id="newCustomerLimit" style="width:150px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Group:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select name="group_id" class="select_group" id="newCustomerGroupId"></select></td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Password:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="password" type="text" id="password_new" style="width:300px;" />
					<button id="newGeneratePass" class="generate">
						Generate
					</button></td>
				</tr>

				<tr id="newCustomFields">
					<td align="left" nowrap="nowrap" class="dbtext">Price Sheet:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select name="price_sheet" class="select_price" id="newCustomerPriceSheet">

					</select></td>
				</tr>

				<tr>
					<td>
					<div name="addCustomNew" class="add_custom_new"  id="addCustomNew" style="width:185px;">
						Add Custom Parameter
					</div></td>
				</tr>

				<tr>
					<td>
					<div name="addCustomCheckoutNew" class="add_custom_checkout_new"  id="addCustomCheckoutNew" style="width:185px;">
						Add Custom Checkout
					</div></td>
				</tr>

				<tbody class="single_user_options" style="display:block;">
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="credit_line" type="checkbox" class="ck_btn" id="ck_credit_line" value="1" />
						<label style="width:185px;" for="ck_credit_line">Credit Line</label></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="optin" type="checkbox" class="ck_btn" id="ck_optin" value="1" />
						<label style="width:185px;" for="ck_optin">Email Optin</label></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="taxable" type="checkbox" class="ck_btn" id="ck_taxable" value="1" />
						<label style="width:185px;" for="ck_taxable">Taxable</label></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="punchout_only" type="checkbox" class="ck_btn" id="ck_punchout_only" value="1" />
						<label style="width:185px;" for="ck_punchout_only">Punchout Only</label></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="lock_billing" type="checkbox" class="ck_btn" id="ck_lock_billing" value="1" />
						<label style="width:185px;" for="ck_lock_billing">Lock Billing</label></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="lock_shipping" type="checkbox" class="ck_btn" id="ck_lock_shipping" value="1" />
						<label style="width:185px;" for="ck_lock_shipping">Lock Shipping</label></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="change_pw" type="checkbox" class="ck_btn" id="ck_change_pw" value="1" />
						<label style="width:185px;" for="ck_change_pw">Change Password</label></td>
					</tr>
				</tbody>
				<tbody class="group_user_options" style="display:none;">
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="group_admin" type="checkbox" class="ck_btn" id="ck_group_admin" value="1" />
						<label style="width:185px;" for="ck_group_admin">Group Admin</label></td>
					</tr>

					<tr>

						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="approver" type="checkbox" class="ck_btn" id="ck_approve_orders" value="1" />
						<label style="width:185px;" for="ck_approve_orders">Approve Orders</label></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="pending_emails" type="checkbox" class="ck_btn" id="ck_pending_emails" value="1" />
						<label style="width:185px;" for="ck_pending_emails">Pending Order Emails</label></td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="allow_payment" type="checkbox" class="ck_btn" id="ck_payment_options" value="1" />
						<label style="width:185px;" for="ck_payment_options">Enable Payments</label></td>
					</tr>

				</tbody>

			</table>
			<br>
			<input type="hidden" name="new_customer" value="1" />
			<input name="reset" type="reset" id="reset" value="Reset" />
			&nbsp;&nbsp;
			<input name="submit" type="submit"  id="submitNewCustomer" value="Save New Customer" />

		</form>

		<script>
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
                    vfuel.admin.advancedSearch('Customer');
                    vfuel.admin.priceSheetOptions();
                    vfuel.admin.groupOptions(function() {
                        vfuel.admin.preventUnsavedRedirectNew();
                    });
                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }


            jQuery(document).ready(function() {
                fireWhenReady();
                jQuery(".ck_btn").button({
                    icons : {
                        primary : 'ui-icon-closethick'
                    }
                }).change(function() {
                    jQuery(this).button("option", {
                        icons : {
                            primary : this.checked ? 'ui-icon-check' : 'ui-icon-closethick'
                        }
                    });
                });

                jQuery('#billingForm').dialog({
                    autoOpen : false,
                    width : '450',
                    height : '550',
                    title : "Addresses",
                    modal : true,
                    buttons : {
                        Cancel : function() {
                            jQuery(this).dialog("close");
                        }
                    },
                    open : function() {
                        jQuery('body').addClass('stop-scrolling');
                        jQuery('.ui-dialog').css("top", "80px");
                        jQuery("#listFormTabs").tabs('option', 'active', 0);
                        jQuery('#addShippingForm')[0].reset();

                    },

                    beforeClose : function(event, ui) {
                        jQuery('body').removeClass('stop-scrolling');
                    },
                    close : function() {

                    }
                });

                jQuery('#customer_options_modal').dialog({
                    autoOpen : false,
                    width : 'auto',
                    height : '650',
                    title : "Custom Checkout Options",
                    modal : true,
                    buttons : {
                        Confirm : function() {
                            jQuery(this).dialog("close");
                        },
                        Cancel : function() {
                            document.getElementById("customer_options_form").reset();
                            jQuery(this).dialog("close");
                        }
                    },
                    open : function() {

                    },

                    beforeClose : function(event, ui) {
                        jQuery('body').removeClass('stop-scrolling');
                    },
                    close : function() {

                    }
                });

                jQuery('#customer_options_modal_edit').dialog({
                    autoOpen : false,
                    width : 'auto',
                    height : '650',
                    title : "Edit Custom Checkout Options",
                    modal : true,
                    buttons : {
                        Confirm : function() {
                            jQuery(this).dialog("close");
                        },
                        Cancel : function() {
                            jQuery(this).dialog("close");
                        }
                    },
                    open : function() {

                    },

                    beforeClose : function(event, ui) {
                        jQuery('body').removeClass('stop-scrolling');
                    },
                    close : function() {

                    }
                });

                jQuery("#listFormTabs").tabs();
                jQuery("#submitProfile").button();
                jQuery("#btnViewBillingAddress").button();
                jQuery("#btnViewShippingAddress").button();
                jQuery("#reset").button();
                jQuery(".generate").button();
                jQuery("#submitNewCustomer").button();
                
                jQuery('#listFormTabs a[href="#addNewBilling"]').click(function(){
                	jQuery('#profileid').val('');
                });

                jQuery("#btnViewBillingAddress").click(function() {
                	jQuery('#addressName').attr('name','billing_name');
                	jQuery('#shiptype').val("billing");
                        jQuery('#billingForm').dialog("open");
                        vfuel.admin.customerAddressList(jQuery('#customer_id').val(),"billing");
                });
                
                jQuery("#btnViewShippingAddress").click(function() {
                	jQuery('#addressName').attr('name','shipping_name');
                	jQuery('#shiptype').val("shipping");
                        jQuery('#billingForm').dialog("open");
                        vfuel.admin.customerAddressList(jQuery('#customer_id').val(),"shipping");
                });

                jQuery("#generatePass").click(function() {
                    jQuery("#password").val(vfuel.admin.generatePassword());
                });

                jQuery("#newGeneratePass").click(function() {
                    jQuery("#password_new").val(vfuel.admin.generatePassword());
                });

                jQuery("#addCustomCheckoutNew").button();
                jQuery("#addCustomCheckoutNew").click(function() {
                    jQuery('#customer_options_modal').dialog("open");
                });

                jQuery("#addCustomCheckout").button();
                jQuery("#addCustomCheckout").click(function() {
                    jQuery('#customer_options_modal_edit').dialog("open");
                });

                jQuery("#addCustomNew").button();
                jQuery("#addCustomNew").click(function() {
                    jQuery("#newCustomFields").after('<tr class="customRowNew"><td><input class="newCustomFieldNameNew" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValueNew" name="placeholderNameNew" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustomNew">Remove Field</div></td></tr>')
                    jQuery(".btnRemoveCustomNew").button();
                    jQuery(".btnRemoveCustomNew").click(function() {
                        jQuery(this).closest('.customRowNew').remove();
                    });
                })
                
                jQuery("#submitProfile").click(function(){
                	jQuery('#customer_id').val();
                	vfuel.admin.addCustomerAddress(jQuery('#customer_id').val(),jQuery('#profileid').val(),jQuery('#shiptype').val(), jQuery('#addShippingForm').serialize());        
            	});

                jQuery("#submitNewCustomer").click(function() {
                    if (jQuery("#f1_value1_new").val() == "") {
                        jQuery("#f1_value1_new").attr("name", "f1_value[]");
                    }
                    if (jQuery("#f2_value1_new").val() == "") {
                        jQuery("#f2_value1_new").attr("name", "f2_value[]");
                    }
                    if (jQuery("#f3_value1_new").val() == "") {
                        jQuery("#f3_value1_new").attr("name", "f3_value[]");
                    }
                    if (jQuery("#f4_value1_new").val() == "") {
                        jQuery("#f4_value1_new").attr("name", "f4_value[]");
                    }
                    if (jQuery("#f5_value1_new").val() == "") {
                        jQuery("#f5_value1_new").attr("name", "f5_value[]");
                    }
                    if (jQuery("#f6_value1_new").val() == "") {
                        jQuery("#f6_value1_new").attr("name", "f6_value[]");
                    }
                    jQuery('.newCustomFieldNameNew').each(function() {
                        var newName = jQuery(this).val();
                        newName = newName.replace(" ", "_");
                        newName = newName.toLowerCase();
                        newName = "custom[" + newName + "]";
                        jQuery(this).closest('td').next().find('input').attr('name', newName);
                    });

                    vfuel.admin.addCustomer(jQuery('#new_customer_form').serialize() + "&" + jQuery('#customer_options_form').serialize());

                });

                jQuery(".btn_submit_customer").click(function() {
                    if (jQuery("#f1_value1").val() == "") {
                        jQuery("#f1_value1").attr("name", "f1_value[]");
                    }
                    if (jQuery("#f2_value1").val() == "") {
                        jQuery("#f2_value1").attr("name", "f2_value[]");
                    }
                    if (jQuery("#f3_value1").val() == "") {
                        jQuery("#f3_value1").attr("name", "f3_value[]");
                    }
                    if (jQuery("#f4_value1").val() == "") {
                        jQuery("#f4_value1").attr("name", "f4_value[]");
                    }
                    if (jQuery("#f5_value1").val() == "") {
                        jQuery("#f5_value1").attr("name", "f5_value[]");
                    }
                    if (jQuery("#f6_value1").val() == "") {
                        jQuery("#f6_value1").attr("name", "f6_value[]");
                    }
                    jQuery('.newCustomFieldName').each(function() {
                        var newName = jQuery(this).val();
                        newName = newName.replace(" ", "_");
                        newName = newName.toLowerCase();
                        newName = "custom[" + newName + "]";
                        console.log('New Name: ' + newName);
                        jQuery(this).closest('td').next().find('input').attr('name', newName);
                    });
                    if (jQuery('#password').val() == '') {
                        vfuel.admin.addCustomer(jQuery('#customer_form_u').find('input[name!=password], select').serialize() + "&" + jQuery('#customer_options_form_edit :input[value!=""]').serialize(), this.id)
                    } else {
                        vfuel.admin.addCustomer(jQuery('#customer_form_u').serialize() + "&" + jQuery('#customer_options_form_edit :input[value!=""]').serialize(), this.id);
                    }
                });

                //Attach Interface----------------------------

                jQuery("#attachInterface").click(function() {
                    jQuery('#attachInterface_modal').dialog("open");
                });

                jQuery(".hiddenCXML").hide();
                jQuery("#attachInterface").button();
                jQuery('#attachInterface_modal').dialog({
                    autoOpen : false,
                    width : 'auto',
                    height : '520',
                    title : "Attach Interface to Customer",
                    modal : true,
                    buttons : {
                        "Attach Interface" : function() {
                            jQuery('.newCustomFieldInterfaceNameNew').each(function() {
                                var newName = jQuery(this).val();
                                newName = newName.replace(" ", "_");
                                newName = newName.toLowerCase();
                                newName = "additional[" + newName + "]";
                                jQuery(this).closest('td').next().find('input').attr('name', newName);
                            });

                            vfuel.admin.addInterfaces(jQuery('#add_new_interface').find("input[type='hidden'], :input:not(:hidden)").serialize());
                            jQuery(this).dialog("close");
                        },
                        Cancel : function() {
                            document.getElementById("add_new_interface").reset();
                            jQuery(this).dialog("close");
                        }
                    },
                    open : function() {

                    },

                    beforeClose : function(event, ui) {
                        jQuery('body').removeClass('stop-scrolling');
                    },
                    close : function() {

                    }
                });
                jQuery("#addCustomInterfaceNew").button();
                jQuery("#addCustomInterfaceNew").click(function() {
                    jQuery("#newCustomInterfaceFields").after('<tr class="customRowInterfaceNew"><td><input class="newCustomFieldInterfaceNameNew" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValueNew" name="placeholderNameNew" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustomInterfaceNew">Remove Field</div></td></tr>')
                    jQuery(".btnRemoveCustomInterfaceNew").button();
                    jQuery(".btnRemoveCustomInterfaceNew").click(function() {
                        jQuery(this).closest('.customRowInterfaceNew').remove();
                    });
                });

                jQuery("#integration_type_new").change(function() {
                    if (jQuery(this).val() == "cxml") {
                        jQuery(".hiddenCXML").show();
                        jQuery(".f1show").hide();
                        jQuery(".f2show").hide();
                    } else {
                        jQuery(".hiddenCXML").hide();
                        jQuery(".f1show").show();
                        jQuery(".f2show").show();
                    }
                });
            });
		</script>

	</div>
	<div id="upload">
		<div class="holder" id="holder9"></div>
		<script>
            jQuery(document).ready(function() {
                jQuery(window).load(function() {
                    vfuel.admin.dragAndDrop("customer_batch");
                });
            });
		</script>
	</div>

	<div id="batches" style="margin-bottom:30px;">
		<br/>
		<form action="#" method="post" name="search" id="Customerbatch_vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_search_batch" style="width: 150px;" value="" />
					</td>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					<input name="submit" type="submit" id="submitBatchSearch" value="Search" />
					</td>
				</tr>
				<tr>
					<td>Status: </td>
					<td>
					<select name="status" id="batch_status">
						<option value="pending">Pending</option>
						<option value="confirmed">Confirmed</option>
						<option value="any">Any</option>
					</select></td>
				</tr>
			</table>
		</form>

		<div id="Customerbatch_viewport"></div>
		<div id="edit_Customerbatch_viewport"></div>

		<script>
            jQuery(document).ready(function() {

                //Quick fix to go back to search screen on tab switch so that click events are not messed up when in view/edit mode.
                jQuery('#myTabs').on('tabsactivate', function(event, ui) {
                    var newIndex = ui.newTab.index();
                    if (newIndex == 0) {
                        jQuery('#edit_viewport').hide();
                        jQuery('#list_viewport').show();
                        jQuery('#vendorfuel-search').show();
                    } else if (newIndex == 3) {
                        jQuery('#edit_Customerbatch_viewport').hide();
                        jQuery('#Customerbatch_viewport').show();
                        jQuery('#Customerbatch_vendorfuel-search').show();
                    }
                });

                if (vfuel.getURLParameter2('tab') == "add") {
                    jQuery("#myTabs").tabs("option", "active", 1);
                }

                if (vfuel.getURLParameter2('tab') == "upload") {
                    jQuery("#myTabs").tabs("option", "active", 2);
                }

                if (vfuel.getURLParameter2('tab') == "batches") {
                    jQuery("#myTabs").tabs("option", "active", 3);
                }

                /*
                 jQuery('body').on('input', '.product_attributes', function() {
                 if (jQuery("#myTabs").tabs("option", "active") == "1") {
                 var currentAttNum = jQuery(this).attr("id").slice(6, jQuery(this).attr("id").length - 1);
                 var nextAttNum = parseInt(currentAttNum) + 1;
                 console.log("nextNum: " + currentAttNum)
                 if (!jQuery('#newatt' + nextAttNum + 'n').length && nextAttNum < 19) {
                 console.log("new Attribute")
                 jQuery('#newatt' + currentAttNum + 'd').closest("tr").after('<tr class="removeAttRow"><td align="left"\>Attribute ' + nextAttNum + ' Name:</td><td align="left"><input class="product_attributes" name="att' + nextAttNum + 'n" type="text" id="newatt' + nextAttNum + 'n" style="width:300px;" value="" /></tr><tr class="removeAttRow"><td align="left"\>Attribute ' + nextAttNum + ' Data:</td><td align="left"><input class="product_attributes_d" name="att' + nextAttNum + 'd" type="text" id="newatt' + nextAttNum + 'd" style="width:300px;" value="" /></tr>')
                 }
                 }
                 });*/

                jQuery("#submitBatchSearch").button();
                jQuery('#batches_link').click(function() {
                    vfuel.admin.customerbatchList(jQuery('#Customerbatch_vendorfuel-search').serialize());
                });
                jQuery("#submitBatchSearch").click(function() {
                    vfuel.admin.customerbatchList(jQuery('#Customerbatch_vendorfuel-search').serialize());
                });
                jQuery("#batch_status").change(function() {
                    vfuel.admin.customerbatchList(jQuery('#Customerbatch_vendorfuel-search').serialize());
                });
            });
		</script>
	</div>
</div>