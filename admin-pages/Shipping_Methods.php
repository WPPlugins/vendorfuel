<div id="myTabs">
	<ul>
		<li>
			<a href="#listShippingMethods">Search</a>
		</li>
		<li>
			<a href='#addShippingMethods'>Add</a>
		</li>
	</ul>
	<div id="listShippingMethods">
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
			<form action="#" method="post" name="search" id="shipping_methods_form" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Method ID:</td><td>
						<input name="method_id" type="text" id="method_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Carrier:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="carrier_id" class="select_carrier" id="carrier_id">
							<option value="">--</option>

						</select></td>
					</tr>
					<tr>
						<td>Carrier Service:</td><td>
						<input name="carrier_service" type="text" id="carrier_service" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Name: (viewed by customer) </td><td>
						<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="enabled" type="checkbox" class="ck_btn" id="enabled" value="1" />
						<label style="width:150px;" for="enabled">Enabled</label></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="live_rate" type="checkbox" class="ck_btn" id="live_rate" value="1" />
						<label style="width:150px;" for="live_rate">Live Rate</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitMethod" value="Save Method" />
						</td>
					</tr>
				</table>
			</form>

		</div>
	</div>
	<div id="addShippingMethods">
		<form action="#" method="post" name="search" id="shipping_methods_form_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Carrier:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="carrier_id" class="select_carrier" id="carrier_id_new">
							<option value="">--</option>

						</select></td>
					</tr>
					<tr>
						<td>Carrier Service:</td><td>
						<input name="carrier_service" type="text" id="carrier_service_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Name: (viewed by customer) </td><td>
						<input name="name" type="text" id="name_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="enabled" type="checkbox" class="ck_btn" id="enabled_new" value="1" />
						<label style="width:150px;" for="enabled_new">Enabled</label></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="live_rate" type="checkbox" class="ck_btn" id="live_rate_new" value="1" />
						<label style="width:150px;" for="live_rate_new">Live Rate</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitMethod_new" value="Save Method" />
						</td>
					</tr>
				</table>
		</form>

		<script>
		
			function fireWhenReady() {
				if ( typeof vfuel.admin != 'undefined') {
					vfuel.admin.carrierOptions(function(){
							vfuel.admin.advancedSearch('ShippingMethods');
                    		vfuel.admin.preventUnsavedRedirectNew();
                   	});
				} else {
					setTimeout(fireWhenReady, 100);
				}
			}
		
			jQuery(document).ready(function() {
				fireWhenReady();
				jQuery("#submitMethod").button();
				jQuery("#submitMethod_new").button();
				jQuery("#myTabs").tabs()
				jQuery("#submitSearch").button()
				
				 if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }
				
				jQuery(".ck_btn").button({
					icons : {
						primary : 'ui-icon-closethick'
					},
				}).change(function() {
					jQuery(this).button("option", {
						icons : {
							primary : this.checked ? 'ui-icon-check' : 'ui-icon-closethick'
						},
					});
				})
				
				jQuery("#submitSearch").click(function() {
					vfuel.admin.shippingmethodsList(jQuery('#vendorfuel-search').serialize());
				});

				jQuery("#submitMethod").click(function() {
					vfuel.admin.addShippingmethods(jQuery('#shipping_methods_form').serialize());
				});
				jQuery("#submitMethod_new").click(function() {
					vfuel.admin.addShippingmethods(jQuery('#shipping_methods_form_new').serialize());
				});
				jQuery("#enabled_status").change(function() {
					vfuel.admin.shippingmethodsList(jQuery('#vendorfuel-search').serialize());
				});
			});

		</script>
	</div>
	