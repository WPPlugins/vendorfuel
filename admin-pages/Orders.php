<div id="myTabs">
	<ul>
		<li>
			<a href="#listOrders">Search</a>
		</li>
		<li>
			<a href="#upload_order">Import</a>
		</li>
		<li>
			<a href="#RMA">RMA</a>
		</li>
		<li>
			<a href="#upload_tracking">Upload Tracking</a>
		</li>
	</ul>
	

	<div id="listOrders">
		<br/>
		<form action="#" method="post" name="search" id="vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_search" style="width: 150px;" value="" />
					<input name="submit" style="float:right;" type="submit" id="submitSearch" value="Search" />
					</td>
					<tr>
						<td style="display:none;">Order Status</td><td style="display:none;"><select><option value="any"> Any </option><option value="confirmed"> Confirmed </option><option value="shipped"> Shipped </option></select></td>
					</tr>
					<tr><td style="display:none;">Show Pending: </td><td style="display:none;"><input type="checkbox" value="1" name="pending" id="order_pending"/></td></tr>
					<tr><td style="display:none;">
						<input class="ordersRadio" id="rad1" type="radio" name="recent" value="All" style="display:none;" checked><label for="rad1">All | </label>
						<input class="ordersRadio" id="rad2" type="radio" name="recent" value="today" style="display:none;"><label for="rad2">Today | </label>
						<input class="ordersRadio" id="rad3" type="radio" name="recent" value="yesterday" style="display:none;"><label for="rad3">Yesterday | </label>
						<input class="ordersRadio" id="rad4" type="radio" name="recent" value="month" style="display:none;"><label for="rad4">This Month</label></td></tr>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					
					</td>
				</tr>
				<!--
				<tr>
				<td>Status: </td>
				<td>
				<select name="status" id="order_status">
				<option value="completed">Completed</option>
				<option value="pending">Pending</option>
				<option value="any">Any</option>
				</select>-->
				</td>
				</tr>
			</table>
		</form>

		<div id="list_viewport"></div>
		<div id="edit_viewport" style="display:none;"></div>

		<script>
            jQuery(document).ready(function() {
                jQuery('#submitSearch').button();
                jQuery('#btn_nShip').button();
                jQuery('#btn_nEmail').button();
                jQuery('#btn_nAccept').button();
                jQuery("#myTabs").tabs();

                jQuery('#RMAModal').dialog({
                    autoOpen : false,
                    width : 'auto',
                    height : '600',
                    title : "Add RMA",
                    modal : true,
                    buttons : {
                        "Add RMA" : function() {
                            vfuel.admin.addRma(jQuery('#add_rma_new').serialize());
                            jQuery(this).dialog("close");

                        },
                        "Close" : function() {
                            jQuery(this).dialog("close");
                        }
                    }
                });

                jQuery('#NotificationsModal').dialog({
                    autoOpen : false,
                    width : 'auto',
                    height : '680',
                    title : "Shipments",
                    modal : true,
                    buttons : {
                        "Close" : function() {
                            jQuery(this).dialog("close");
                        }
                    }
                });

                jQuery('#NotificationsInfoModal').dialog({
                    autoOpen : false,
                    width : '600',
                    height : '500',
                    title : "Notification Info",
                    modal : true,
                    buttons : {
                        "Resend" : function() {
                            vfuel.admin.resendNotification(jQuery('.currentOpenNote').attr("id").substr(3));
                            jQuery(this).dialog("close");
                        },
                        "Close" : function() {
                            jQuery(this).dialog("close");
                        }
                    }
                });

                jQuery("#submitSearch").click(function() {
                    vfuel.admin.orderList(jQuery('#vendorfuel-search').serialize());
                });

                jQuery("#order_status").change(function() {
                    vfuel.admin.orderList(jQuery('#vendorfuel-search').serialize());
                });
            });
		</script>
	</div>

	<div id="upload_order">
		<div class="holder" id="holder11"></div>
		<script>
            jQuery(document).ready(function() {
                jQuery(window).load(function() {
                    //An array of every type of upload on this page
                    vfuel.admin.dragAndDrop(["order", "order_shipment"]);
                });
            });
		</script>
	</div>

	<div id="RMA">
		<br/>
		<form action="#" method="post" name="search" id="Rma_vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_searchRMA" style="width: 150px;" value="" />
					</td>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					<input name="submit" type="submit" class="ui-button" id="submitSearch2" value="Search" />
					</td>
				</tr>
			</table>
		</form>

		<div id="Rma_viewport">
		</div>
		
		<div id="edit_Rma_viewport" style="display:none;">
			
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
						<td>SKU:</td><td>
						<input name="sku" type="text" id="sku" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Description:</td><td>
						<input name="description" type="text" id="product_description" style="width:250px;" readonly />
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
		
		<script>
            jQuery(document).ready(function() {

                function fireWhenReady() {
                    if ( typeof vfuel.admin != 'undefined') {
                        vfuel.admin.advancedSearch('Orders');
						vfuel.admin.rmaAdvancedSearch('RMA');
                    } else {
                        setTimeout(fireWhenReady, 100);
                    }
                }
				
				fireWhenReady();

                jQuery('#return_request_notes_new').attr('name', 'return_request_notes');
                jQuery('#return_response_notes_new').attr('name', 'return_response_notes');
                jQuery('#productLong_description').attr('name', 'long_description');
                jQuery('#newProductLong_description').attr('name', 'long_description');
                jQuery(".vf_date_picker").datepicker();
                jQuery(".vf_date_picker").datepicker("option", "dateFormat", "yy-mm-dd");
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch2").button();
                jQuery("#submitRMA").button();
                jQuery("#submitRMA_new").button();
                jQuery("#submitSearch2").click(function() {
                    vfuel.admin.rmaList(jQuery('#Rma_vendorfuel-search').serialize());
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
	
	<div id="upload_tracking">
		<div class="holder" id="holder12"></div>

	</div>
</div>

<div id="RMAModal">
			<form action="#" method="post" name="search" id="add_rma_new" enctype="multipart/form-data" onsubmit="return false">
				<table>
					
					<tr>
						<td>Customer ID:</td><td>
						<input name="customer_id" type="text" id="customer_id_new" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Order ID:</td><td>
						<input name="order_id" type="text" id="order_id_new" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Purchase ID:</td><td>
						<input name="purch_id" type="text" id="purch_id_new" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Product ID:</td><td>
						<input name="product_id" type="text" id="product_id_new" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Purchase Date:</td><td>
						<input name="purchase_date" type="text" id="purchase_date_new" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Purchase Quantity:</td><td>
						<input name="qty" type="text" id="qty_new" style="width:250px;" readonly/>
						</td>
					</tr>
					<tr>
						<td>Price:</td><td>
						<input name="price" type="text" id="price_new" style="width:250px;" readonly/>
						</td>
					</tr>
				
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
					
					
				</table>
			</form>
			
			</div>
<div id="NotificationsModal">
	<div id="viewShipments"> 
		<form action="#" method="post" name="search" id="add_shipment" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						
						<input name="shipment_id" type="hidden" id="shipment_id" style="width:300px;"/>
						</td>
					</tr>
					
					<tr>
						<td>Order ID:</td><td>
						<input name="order_id" type="text" id="order_id1" style="width:300px;" readonly />
						</td>
					</tr>
					
					<tr>
						<td>Shipment Date:</td><td>
						<input type="text" class="vf_date_picker" name="shipment_date" id="shipment_date" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td>Delivery Date:</td><td>
						<input type="text" class="vf_date_picker" name="delivery_date" id="delivery_date" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>Supplier Shipment ID:</td><td>
						<input name="supplier_shipment_id" type="text" id="supplier_shipment_id" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Carrier:</td><td>
						<input name="carrier" type="text" id="carrier" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Carrier SCAC:</td><td>
						<input name="carrier_scac" type="text" id="carrier_scac" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Method:</td><td>
						<input name="method" type="text" id="method" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Street:</td><td>
						<input name="street" type="text" id="street" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>City:</td><td>
						<input name="city" type="text" id="city" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>State:</td><td>
						<select class="input-medium" id="state" name="state" style="width:250px;">
							<option value="" selected="selected">Select a State</option> 
							<option value="AL">Alabama</option> 
							<option value="AK">Alaska</option> 
							<option value="AZ">Arizona</option> 
							<option value="AR">Arkansas</option> 
							<option value="CA">California</option> 
							<option value="CO">Colorado</option> 
							<option value="CT">Connecticut</option> 
							<option value="DE">Delaware</option> 
							<option value="DC">District Of Columbia</option> 
							<option value="FL">Florida</option> 
							<option value="GA">Georgia</option> 
							<option value="HI">Hawaii</option> 
							<option value="ID">Idaho</option> 
							<option value="IL">Illinois</option> 
							<option value="IN">Indiana</option> 
							<option value="IA">Iowa</option> 
							<option value="KS">Kansas</option> 
							<option value="KY">Kentucky</option> 
							<option value="LA">Louisiana</option> 
							<option value="ME">Maine</option> 
							<option value="MD">Maryland</option> 
							<option value="MA">Massachusetts</option> 
							<option value="MI">Michigan</option> 
							<option value="MN">Minnesota</option> 
							<option value="MS">Mississippi</option> 
							<option value="MO">Missouri</option> 
							<option value="MT">Montana</option> 
							<option value="NE">Nebraska</option> 
							<option value="NV">Nevada</option> 
							<option value="NH">New Hampshire</option> 
							<option value="NJ">New Jersey</option> 
							<option value="NM">New Mexico</option> 
							<option value="NY">New York</option> 
							<option value="NC">North Carolina</option> 
							<option value="ND">North Dakota</option> 
							<option value="OH">Ohio</option> 
							<option value="OK">Oklahoma</option> 
							<option value="OR">Oregon</option> 
							<option value="PA">Pennsylvania</option> 
							<option value="RI">Rhode Island</option> 
							<option value="SC">South Carolina</option> 
							<option value="SD">South Dakota</option> 
							<option value="TN">Tennessee</option> 
							<option value="TX">Texas</option> 
							<option value="UT">Utah</option> 
							<option value="VT">Vermont</option> 
							<option value="VA">Virginia</option> 
							<option value="WA">Washington</option> 
							<option value="WV">West Virginia</option> 
							<option value="WI">Wisconsin</option> 
							<option value="WY">Wyoming</option>
						</select></td>
					</tr>
					
					<tr>
						<td>Country:</td><td>
						<input name="country" type="text" id="country" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Country Code:</td><td>
						<input name="country_code" type="text" id="country_code" value="US" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Country Phone Code:</td><td>
						<input name="country_phone_code" type="text" id="country_phone_code" value="1" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Area Code:</td><td>
						<input name="area_code" type="text" id="area_code" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Postal Code:</td><td>
						<input name="postal_code" type="text" id="postal_code" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Comments:</td><td>
						<input name="comments" type="text" id="comments" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Phone:</td><td>
						<input name="phone" type="text" id="phone" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td>Code:</td><td>
						<input name="code" type="text" id="code" style="width:300px;" />
						</td>
					</tr>
					
					<tr>
						<td></td>
						<td>
						<input style="float:right;" name="submit" type="submit" id="submitShipment" value="Save Shipment" />
						</td>
					</tr>
				</table>
			</form>
	</div>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('#submitShipment').button();
        jQuery(".vf_date_picker").datepicker();
        jQuery(".vf_date_picker").datepicker("option", "dateFormat", "yy-mm-dd");

        jQuery("#submitShipment").click(function() {
            vfuel.admin.addOrdershipment(jQuery('#add_shipment').serialize());
        });

    });
</script>

<div id="NotificationsInfoModal">
	<div id=fillNotificationInfo></div>
</div>					