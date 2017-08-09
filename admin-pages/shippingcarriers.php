<div id="myTabs">
	<ul>
		<li>
			<a href="#listShippingCarriers">Search</a>
		</li>
		<li>
			<a href='#addShippingCarriers'>Add</a>
		</li>
	</ul>
	<div id="listShippingCarriers">
		<br/>
		<form action="#" method="post" name="search" id="vendorfuel-search"  enctype="multipart/form-data" onsubmit="return false">
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
			<form action="#" method="post" name="search" id="shipping_carriers_form" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Carrier ID:</td><td>
						<input name="carrier_id" type="text" id="carrier_id" style="width:250px;" readonly />
						</td>
					</tr>
					
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Setting Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="setting1n" class="setting_attributes" type="text" id="setting1n" style="width:200px;" />
					</td>
					<td align="left" nowrap="nowrap" class="dbtext">Value:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="setting1v" type="text" class="product_attributes_d" id="setting1v" style="width:200px;" />
					</td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitCarriers" value="Save Carrier" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script></script>
	</div>
	<div id="addShippingCarriers">
		<form action="#" method="post" name="search" id="shipping_carriers_form_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
				</table>
		</form>
		<form action="#" method="post" name="search" id="shipping_carriers_settings_new" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Setting Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="newsetting1n" class="setting_attributes" type="text" id="newsetting1n" style="width:200px;" />
					</td>
					<td align="left" nowrap="nowrap" class="dbtext">Value:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="newsetting1v" type="text" class="setting_attributes_d" id="newsetting1v" style="width:200px;" />
					</td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitCarriers_new" value="Save Carrier" />
						</td>
					</tr>
				</table>
		</form>

		<script>
		function fireWhenReady() {
            if ( typeof vfuel.admin != 'undefined') {
                    vfuel.admin.preventUnsavedRedirectNew();
                    vfuel.admin.advancedSearch('ShippingCarriers');
            } else {
                setTimeout(fireWhenReady, 100);
            }
        }
			jQuery(document).ready(function() {
				fireWhenReady();
				jQuery("#submitCarriers").button();
				jQuery("#submitCarriers_new").button();
				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				
				 if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }
				
				
				jQuery("#submitSearch").click(function() {
					vfuel.admin.shippingcarriersList(jQuery('#vendorfuel-search').serialize());
				});

				jQuery("#submitCarriers").click(function() {
					vfuel.admin.addShippingcarriers(jQuery('#shipping_carriers_form').serialize(),jQuery('#shipping_carriers_settings'));
				});
				jQuery("#submitCarriers_new").click(function() {
					vfuel.admin.addShippingcarriers(jQuery('#shipping_carriers_form_new').serialize(),jQuery('#shipping_carriers_settings_new'));
				});
				
				jQuery('body').on('input','.setting_attributes' ,function() {
					var currentAttNum = jQuery(this).attr("id").slice(10,jQuery(this).attr("id").length-1);
					var nextAttNum=parseInt(currentAttNum)+1;
					if(!jQuery('#newsetting'+nextAttNum+'n').length){
						jQuery('#newsetting'+currentAttNum+'v').closest("tr").after('<tr class="removeAttRow"><td align="left"\>Setting Name:</td><td align="left"><input class="setting_attributes" name="setting' + nextAttNum + 'n" type="text" id="newsetting' + nextAttNum + 'n" style="width:200px;" value="" /><td align="left"\>Value:</td><td align="left"><input class="setting_attributes_d" name="setting' + nextAttNum + 'v" type="text" id="newsetting' + nextAttNum + 'v" style="width:200px;" value="" /></tr>')
					}
				});
				
			});

		</script>
	</div>