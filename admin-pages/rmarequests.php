<div id="myTabs">
	<ul>
		<li>
			<a href="#listRma">Search</a>
		</li>
		<li>
			<a href="#addRma">Add</a>
		</li>
	</ul>
	<div id="listRma">
		<br/>
		<form action="#" method="post" name="search" id="vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_search" style="width: 150px;" value="" />
					</td>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					<input name="submit" type="submit" class="ui-button" id="submitSearch" value="Search" />
					</td>
				</tr>
			</table>
		</form>

		<div id="list_viewport"></div>
		<div id="edit_viewport" style="display:none;">

			<form action="#" method="post" name="search" id="add_rma" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Purchase ID:</td><td>
						<input name="purch_id" type="text" id="purch_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Customer ID:</td><td>
						<input name="customer_id" type="text" id="customer_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Order ID:</td><td>
						<input name="order_id" type="text" id="order_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Product ID:</td><td>
						<input name="product_id" type="text" id="product_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Purchase Date:</td><td>
						<input name="purchase_date" type="text" id="purchase_date" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Purchase Quantity:</td><td>
						<input name="qty" type="text" id="qty" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Price:</td><td>
						<input name="price" type="text" id="price" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>GSA:</td><td>
						<input name="gsa" type="text" id="gsa" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Ability One:</td><td>
						<input name="ability_one" type="text" id="ability_one" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Core List:</td><td>
						<input name="core_list" type="text" id="core_list" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Return Status:</td><td>
						<select name="return_status" type="text" id="return_status" style="width:250px;">
							<option value="">--</option>
							<option value="none">No return requested</option>
							<option value="requested" selected="selected">Requested</option>
							<option value="denied">Denied</option>
							<option value="approved">Approved</option>
							<option value="refunded">Refunded</option>
							<option value="replaced">Replaced</option>
						</select></td>
					</tr>
					<tr>
						<td>Return Request Date:</td><td>
						<input type="text" class="vf_date_picker" name="return_request_date" id="return_request_date" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext">Request Notes:</td>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext"><?php wp_editor("","return_request_notes")
			?></td>
					</tr>
					
					<tr>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext">Response Notes:</td>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext"><?php wp_editor("","return_response_notes")
			?></td>
					</tr>
					
					<tr>
						<td>Reason:</td><td>
						<input name="return_reason" type="text" id="return_reason" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Quantity:</td><td>
						<input name="return_qty" type="text" id="return_qty" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Boxes:</td><td>
						<input name="return_boxes" type="text" id="return_boxes" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Contact:</td><td>
						<input name="return_contact" type="text" id="return_contact" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>
						<input name="submit" type="submit" id="submitRMA" value="Save RMA" />
						</td>
					</tr>
				</table>
			</form>
		</div>

		
	</div>
	<div id="addRma">
		<form action="#" method="post" name="search" id="add_rma_new" enctype="multipart/form-data" onsubmit="return false">
				<table>
				
					<tr>
						<td>Return Status:</td><td>
						<select name="return_status" type="text" id="return_status_new" style="width:250px;">
							<option value="">--</option>
							<option value="none">No return requested</option>
							<option value="requested" selected="selected">Requested</option>
							<option value="denied">Denied</option>
							<option value="approved">Approved</option>
							<option value="refunded">Refunded</option>
							<option value="replaced">Replaced</option>
						</select></td>
					</tr>
					<tr>
						<td>Return Request Date:</td><td>
						<input type="text" class="vf_date_picker" name="return_request_date" id="return_request_date_new" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext">Request Notes:</td>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext"><?php wp_editor("","return_request_notes_new")
			?></td>
					</tr>
					
					<tr>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext">Response Notes:</td>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext"><?php wp_editor("","return_response_notes_new")
			?></td>
					</tr>
					
					<tr>
						<td>Reason:</td><td>
						<input name="return_reason" type="text" id="return_reason" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Quantity:</td><td>
						<input name="return_qty" type="text" id="return_qty" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Boxes:</td><td>
						<input name="return_boxes" type="text" id="return_boxes" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Contact:</td><td>
						<input name="return_contact" type="text" id="return_contact" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>
						<input name="submit" type="submit" id="submitRMA_new" value="Save RMA" />
						</td>
					</tr>
				</table>
			</form>
		
	</div>
	
	<script>
			jQuery(document).ready(function() {
				jQuery('#return_request_notes_new').attr('name', 'return_request_notes');
				jQuery('#return_response_notes_new').attr('name', 'return_response_notes');
				jQuery('#productLong_description').attr('name', 'long_description');
				jQuery('#newProductLong_description').attr('name', 'long_description');
				jQuery(".vf_date_picker").datepicker();
				jQuery(".vf_date_picker").datepicker("option", "dateFormat", "yy-mm-dd");
				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				jQuery("#submitRMA").button();
				jQuery("#submitRMA_new").button();
				jQuery("#submitSearch").click(function() {
					vfuel.admin.rmaList(jQuery('#vendorfuel-search').serialize());
				});
				
				jQuery("#submitRMA").click(function() {
					vfuel.admin.addRma(jQuery('#add_rma').serialize());
				});
				
				jQuery("#submitRMA_new").click(function() {
					vfuel.admin.addRma(jQuery('#add_rma_new').serialize());
				});
			});
		</script>
</div>