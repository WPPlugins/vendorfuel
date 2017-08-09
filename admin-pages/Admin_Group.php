<div id="myTabs">
	<ul>
		<li>
			<a href="#listAdminGroups">Search</a>
		</li>
		<li>
			<a href='#addAdminGroups'>Add</a>
		</li>
	</ul>
	<div id="listAdminGroups">
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
			<form action="#" method="post" name="search" class="checkAgainstCurrent" id="shipping_zones_form" enctype="multipart/form-data" onsubmit="return false">
				<table>

					<tr>
						<td>Group ID:</td><td>
						<input name="group_id" type="text" id="group_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Description:</td><td>
						<input name="description" type="text" id="description" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Users:</td>
						<td align="left" nowrap="nowrap" class="dbtext"><select name="users" multiple="multiple" class="select_user multiselect" id="admingroup_id"></select></td>
					</tr>

					<tr>
						<td>
						<input name="submit" type="submit" id="submitGroupAdmin" value="Save Admin Group" />
						</td>
					</tr>
				</table>
			</form>

		</div>

	</div>
	<div id="addAdminGroups">
		<form action="#" method="post" name="search" id="shipping_zones_form_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Name:</td><td>
					<input name="name" type="text" id="name_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Description:</td><td>
					<input name="description" type="text" id="description_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Users:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select name="admingroup_id_new" multiple="multiple" class="select_user multiselect" id="admingroup_id_new"></select></td>
				</tr>
				<tr>
					<td>
					<input name="submit" type="submit" id="submitGroupAdmin_new" value="Save Group" />
					</td>
				</tr>
			</table>
		</form>

		<script>
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
                    vfuel.admin.advancedSearch('AdminGroup');
                    vfuel.admin.groupadminOptions("multi",function(){
                        vfuel.admin.preventUnsavedRedirectNew();
                    });
                    jQuery('#admingroup_id').multiselect();  
                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }

            jQuery(document).ready(function() {
                fireWhenReady();
                var countryIdList = [];
                jQuery("#submitGroupAdmin").button();
                jQuery("#submitGroupAdmin_new").button();
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();
                
                 if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }

                jQuery("#submitSearch").click(function() {
                    vfuel.admin.admingroupsList(jQuery('#vendorfuel-search').serialize());
                });

                jQuery("#submitGroupAdmin").click(function() {
                    var userArray = jQuery('#admingroup_id').val();
                    var userString = '';
                    var nameString = "group=" + jQuery('#name').val() + "&group_id=" + jQuery("#group_id").val() + "&description=" + jQuery("#description").val();
                    userString += '&users=' + userArray;

                    vfuel.admin.addAdmingroups(nameString, userString);

                });
                jQuery("#submitGroupAdmin_new").click(function() {
                    var userArray = jQuery('#admingroup_id_new').val();
                    var userString = '';
                    var nameString = "group=" + jQuery('#name_new').val() + "&description=" + jQuery("#description_new").val();
                    userString += '&users=' + userArray;

                    vfuel.admin.addAdmingroups(nameString, userString);

                });
            });

		</script>
	</div>
