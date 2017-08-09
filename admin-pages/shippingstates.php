<div id="myTabs">
	<ul>
		<li>
			<a href="#listShippingStates">Search</a>
		</li>
		<li>
			<a href='#addShippingStates'>Add</a>
		</li>
		<li>
			<a href="#upload">Upload</a>
		</li>
	</ul>
	<div id="listShippingStates">
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
			<form action="#" method="post" name="search" id="shipping_states_form" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>State ID:</td><td>
						<input name="state_id" type="text" id="state_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Country:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="country_id" class="select_country" id="country_id">
							<option value="">--</option>

						</select></td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Code:</td><td>
						<input name="code" type="text" id="code" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="enabled" type="checkbox" class="ck_btn" id="enabled" value="1" />
						<label style="width:150px;" for="enabled">Enabled</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitState" value="Save State" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script></script>
	</div>
	<div id="addShippingStates">
		<form action="#" method="post" name="search" id="shipping_states_form_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Country:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="country_id" class="select_country" id="country_id">
							<option value="">--</option>

						</select></td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Code:</td><td>
						<input name="code" type="text" id="code_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="enabled" type="checkbox" class="ck_btn" id="enabled_new" value="1" />
						<label style="width:150px;" for="enabled_new">Enabled</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitState_new" value="Save State" />
						</td>
					</tr>
				</table>
		</form>

		<script>
			function fireWhenReady() {
				if ( typeof vfuel.admin != 'undefined') {
					vfuel.admin.countryOptions('none',function(){
							
                    		vfuel.admin.preventUnsavedRedirectNew();
                   	});
                   	vfuel.admin.advancedSearch('ShippingStates');
				} else {
					setTimeout(fireWhenReady, 100);
				}
			}
			
			jQuery(document).ready(function() {
				fireWhenReady();
				jQuery("#submitState").button();
				jQuery("#submitState_new").button();
				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				
				 if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }
                    if (vfuel.getURLParameter2('tab') == "upload") {
                        jQuery("#myTabs").tabs("option", "active", 2);
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
					vfuel.admin.shippingstatesList(jQuery('#vendorfuel-search').serialize());
				});

				jQuery("#submitState").click(function() {
					vfuel.admin.addShippingstates(jQuery('#shipping_states_form').serialize());
				});
				jQuery("#submitState_new").click(function() {
					vfuel.admin.addShippingstates(jQuery('#shipping_states_form_new').serialize());
				});
				jQuery("#enabled_status").change(function() {
					vfuel.admin.shippingstatesList(jQuery('#vendorfuel-search').serialize());
				});
			});

		</script>
	</div>
	<div id="upload">
		<div class="holder" id="holder5"></div>
		<script>
			jQuery(document).ready(function() {
				jQuery(window).load(function(){
					vfuel.admin.dragAndDrop("shipping_state");
				});
			});
		</script>
	</div>
