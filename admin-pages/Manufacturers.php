<div id="myTabs">
	<ul>
		<li>
			<a href="#listManufacturer">Search</a>
		</li>
		<li>
			<a href="#addManufacturer">Add</a>
		</li>
		<li>
			<a href="#mergeManufacturer">Merge</a>
		</li>
	</ul>
	<div id="listManufacturer">
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
			<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_manufacturer" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Mfg ID:</td><td>
						<input name="mfg_id" type="text" id="mfg_id" style="width:300px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Manufacturer:</td><td>
						<input name="manufacturer" type="text" id="manufacturer" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Info:</td><td>						<textarea name="mfg_info" id="mfg_info" cols="34" rows="5"></textarea></td>
					</tr>
					<tr>
						<td>Website:</td><td>
						<input name="mfg_website" type="text" id="mfg_website" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="mfg_logo" type="checkbox" class="ck_btn" id="mfg_logo" value="1" />
						<label style="width:185px;" for="mfg_logo">Logo</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitManufacturer" value="Save Manufacturer" />
						</td>
					</tr>
				</table>
			</form>
		</div>

		<script>
			jQuery(document).ready(function() {
				jQuery("#submitManufacturer").button();
				jQuery("#submitNewManufacturer").button();

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

				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				
				if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }
                    
                    if (vfuel.getURLParameter2('tab') == "merge") {
                        jQuery("#myTabs").tabs("option", "active", 2);
                    }
				jQuery("#submitSearch").click(function() {
					vfuel.admin.manufacturerList(jQuery('#vendorfuel-search').serialize());
				});
			});

			jQuery("#submitManufacturer").click(function() {
				vfuel.admin.addManufacturer(jQuery('#add_manufacturer').serialize());
			});
		</script>
	</div>
	<div id="mergeManufacturer">
		
		</div>
	<div id="addManufacturer">
		<form action="#" method="post" name="search" class="checkAgainstCurrentNew" id="add_new_manufacturer" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Manufacturer:</td><td>
					<input name="manufacturer" type="text" id="manufacturer_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Info:</td>
					<td><textarea name="mfg_info" id="mfg_info_new" cols="34" rows="5"></textarea></td>
				</tr>
				<tr>
					<td>Website:</td><td>
					<input name="mfg_website" type="text" id="mfg_website_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="mfg_logo" type="checkbox" class="ck_btn" id="mfg_logo_new" value="1" />
					<label style="width:185px;" for="mfg_logo_new">Logo</label></td>
				</tr>
				<tr>
					<td>
					<input name="submit" type="submit" id="submitNewManufacturer" value="Save Manufacturer" />
					</td>
				</tr>
			</table>
		</form>
		<script>
		function fireWhenReady() {
            if ( typeof vfuel.admin != 'undefined') {
               		vfuel.admin.advancedSearch('Manufacturers');
                    vfuel.admin.preventUnsavedRedirectNew();
              
            } else {
                setTimeout(fireWhenReady, 100);
            }
        }
			jQuery(document).ready(function() {
				fireWhenReady();
				jQuery("#submitNewManufacturer").click(function() {
					vfuel.admin.addManufacturer(jQuery('#add_new_manufacturer').serialize());
				});
			});
		</script>
		</script>
	</div>
</div>