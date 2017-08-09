<div id="myTabs">
	<ul>
		<li>
			<a href="#listShippingRules">Search</a>
		</li>
		<li>
			<a href='#addShippingRules'>Add</a>
		</li>
	</ul>
	<div id="listShippingRules">
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
			<form action="#" method="post" name="search" id="shipping_rules_form" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Rule ID:</td><td>
						<input name="rule_id" type="text" id="rule_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>Method:</td><td>
						<select name="method_id" class="select_method" id="method_id"></select>
						</td>
					</tr>
					<tr>
						<td>Zones:</td><td>
						<input name="zones" type="text" id="zones" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Items:</td><td>
						<input name="items" type="text" id="items" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Groups:</td><td>
						<input name="groups" type="text" id="groups" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Customers:</td><td>
						<input name="customers" type="text" id="customers" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Item Count:</td><td>
						<input name="item_count" type="text" id="item_count" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Order Total:</td><td>
						$ <input name="order_total" type="text" id="order_total" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Rate Type:</td><td>
						<select name="rate_type" class="select_rate" id="rate_type">
							<option value="NA">- -</option>
							<option value="percentage">Percentage</option>
							<option value="per_order">Per Order</option>
							<option value="per_item">Per Item</option>
							<option value="flat">Flat</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Rate:</td><td>
						<input name="rate" type="text" id="rate" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Additional Fee:</td><td>
						<input name="additional_fee" type="text" id="additional_fee" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitRule" value="Save Rule" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script></script>
	</div>
	<div id="addShippingRules">
		<form action="#" method="post" name="search" id="shipping_rules_form_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name_new" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>Method:</td><td>
						<select name="method_id" class="select_method" id="method_id_new"></select>
						</td>
					</tr>
					<tr>
						<td>Zones:</td><td>
						<input name="zones" type="text" id="zones_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Items:</td><td>
						<input name="items" type="text" id="items_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Groups:</td><td>
						<input name="groups" type="text" id="groups_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Customers:</td><td>
						<input name="customers" type="text" id="customers_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Item Count:</td><td>
						<input name="item_count" type="text" id="item_count_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Order Total:</td><td>
						$ <input name="order_total" type="text" id="order_total_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Rate Type:</td><td>
						<select name="rate_type" class="select_rate" id="rate_type_new">
							<option value="NA">- -</option>
							<option value="percentage">Percentage</option>
							<option value="per_order">Per Order</option>
							<option value="per_item">Per Item</option>
							<option value="flat">Flat</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Rate:</td><td>
						<input name="rate" type="text" id="rate_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Additional Fee:</td><td>
						<input name="additional_fee" type="text" id="additional_fee_new" style="width:250px;" />
						</td>
					</tr>
					
					<tr>
						<td>
						<input name="submit" type="submit" id="submitRule_new" value="Save Rule" />
						</td>
					</tr>
				</table>
		</form>

		<script>
			
			function fireWhenReady() {
				if ( typeof vfuel.admin != 'undefined') {
					vfuel.admin.methodOptions(function(){
                    		vfuel.admin.preventUnsavedRedirectNew();
                    		vfuel.admin.advancedSearch('ShippingRules');
                   	});
				} else {
					setTimeout(fireWhenReady, 100);
				}
			}
			
			jQuery(document).ready(function() {
				fireWhenReady();
				jQuery("#submitRule").button();
				jQuery("#submitRule_new").button();
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
					vfuel.admin.shippingrulesList(jQuery('#vendorfuel-search').serialize());
				});

				jQuery("#submitRule").click(function() {
					vfuel.admin.addShippingrules(jQuery('#shipping_rules_form').serialize());
				});
				jQuery("#submitRule_new").click(function() {
					vfuel.admin.addShippingrules(jQuery('#shipping_rules_form_new').serialize());
				});
			});

		</script>
	</div></div>