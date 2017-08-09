<div id="myTabs">
	<ul>
		<li>
			<a href="#listParcels">List</a>
		</li>
		<li>
			<a href='#addParcel'>Add</a>
		</li>
                <li>
			<a href='#gateways' onclick="vfuel.admin.viewShippingGateways()">Gateways</a>
		</li>
                <li>
                    <a href='#warehouse' onclick="vfuel.admin.getWarehouse()">Warehouse</a>
		</li>
	</ul>
	<div id="listParcels">
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
			<form action="#" method="post" name="search" id="shipping_parcels_form" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Title:</td><td>
						<input name="title" type="text" id="title" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>Length:</td><td>
						<input name="length" type="text" id="length" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Width:</td><td>
						<input name="width" type="text" id="width" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Height:</td><td>
						<input name="height" type="text" id="height" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Units:</td><td>
                                                    <select name="units" class="select_units" id="units_new">
                                                        <option name="in" value="in" />
                                                        <option name="cm" value="cm" />
                                                    </select>
						</td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitParcel" value="Save Parcel" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script></script>
	</div>
	<div id="addParcel">
		<form action="#" method="post" name="search" id="shipping_parcels_form_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
						<td>Title:</td><td>
						<input name="title" type="text" id="title" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>Length:</td><td>
						<input name="length" type="text" id="length" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Width:</td><td>
						<input name="width" type="text" id="width" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Height:</td><td>
						<input name="height" type="text" id="height" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Units:</td><td>
                                                    <select name="units" class="select_units" id="units_new">
                                                        <option name="in" value="in">in</option>
                                                        <option name="cm" value="cm">cm</option>
                                                    </select>
						</td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitParcel_new" value="Save Parcel" />
						</td>
					</tr>
				</table>
		</form>
             </div>
    
    <div id="gateways">
         <div id="listGateways">
            <form action="#" method="post" name="search" id="shipping_gateways" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
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
							<input type="checkbox" name="gateways[shippo][enabled]"/>
						</td>
						<td>Shippo</td>
						<td>
							<table>
								<tr>
									<td>
										Key
									</td>
									<td>
										<input type="text" style="width: 200px;" name="gateways[shippo][key]" value="" />
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
         </div>
        <input type="button" class="ui-button" id="submitSaveShippingGateways" name="submitSaveShippingGateways" value="Save" />
    </div>
    
    <script>
     jQuery('#submitSaveShippingGateways').on("click", function(){
                         vfuel.admin.updateShippingGateways(jQuery('#shipping_gateways').serialize());
                });
    </script>
    
    <div id="warehouse">
        <form action="#" method="post" name="search" id="shipping_warehouse" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
						<td>Street 1:</td><td>
						<input name="street1" type="text" id="street1" style="width:250px;" />
						</td>
					</tr>
                                        <tr>
						<td>Street 2:</td><td>
						<input name="street2" type="text" id="street2" style="width:250px;" />
						</td>
					</tr>
                                        <tr>
						<td>City:</td><td>
						<input name="city" type="text" id="city" style="width:250px;" />
						</td>
					</tr>
                                        <tr>
						<td>State: </td><td>
						<input name="state" type="text" id="state" style="width:250px;" />
						</td>
					</tr>
                                        <tr>
						<td>Zip:</td><td>
						<input name="zip" type="text" id="zip" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitWarehouse" value="Save Warehouse" />
						</td>
					</tr>
				</table>
		</form>
        
       	</div>
		<script>
			
			function fireWhenReady() {
				if ( typeof vfuel.admin != 'undefined') {
                    		vfuel.admin.preventUnsavedRedirectNew();
                    		vfuel.admin.parcelsSearch(jQuery('#vendorfuel-search').serialize());
				} else {
					setTimeout(fireWhenReady, 100);
				}
			}
			
			jQuery(document).ready(function() {
				fireWhenReady();
				jQuery("#submitParcel").button();
				jQuery("#submitParcel_new").button();
				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				jQuery("#submitWarehouse").button();
                                jQuery("#submitSaveShippingGateways").button();
                                
				 if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }

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
				
				jQuery("#submitSearch").click(function() {
					vfuel.admin.parcelsSearch(jQuery('#vendorfuel-search').serialize());
				});

				jQuery("#submitParcel").click(function() {
					vfuel.admin.addParcel(jQuery('#shipping_parcels_form').serialize());
				});
				jQuery("#submitParcel_new").click(function() {
					vfuel.admin.addParcel(jQuery('#shipping_parcels_form_new').serialize());
				});
                                 jQuery("#submitWarehouse").click(function() {
					vfuel.admin.updateWarehouse(jQuery('#shipping_warehouse').serialize());
				});
			});

		</script>    
   
</div>