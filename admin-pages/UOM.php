<div id="myTabs">
	<ul>
		<li>
			<a href="#listUom">Search</a>
		</li>
		<li>
			<a href="#addUom">Add</a>
		</li>
	</ul>
	<div id="listUom">
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

			<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_uom" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>UOM ID:</td><td>
						<input name="uom_id" type="text" id="uom_id" style="width:250px;" readonly/>
						</td>
					</tr>
					<tr>
						<td>UOM:</td><td>
						<input name="uom" type="text" id="uom" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Code:</td><td>
						<input name="code" type="text" id="code" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Description:</td><td>
						<input name="description" type="text" id="description" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td>
						<input name="submit" type="submit" id="submitUom" value="Save UOM" />
						</td>
					</tr>
				</table>
			</form>
		</div>

	</div>
	<div id="addUom">
		<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_uom_new" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>UOM:</td><td>
						<input name="uom" type="text" id="uom_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Code:</td><td>
						<input name="code" type="text" id="code_new" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Description:</td><td>
						<input name="description" type="text" id="description_new" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td>
						<input name="submit" type="submit" id="submitUom_new" value="Add UOM" />
						</td>
					</tr>
				</table>
			</form>

	</div>

	<script>
        function fireWhenReady() {
            if ( typeof vfuel.admin != 'undefined') {
               
                    vfuel.admin.preventUnsavedRedirectNew();
              
            } else {
                setTimeout(fireWhenReady, 100);
            }
        }


        jQuery(document).ready(function() {
            fireWhenReady();
            jQuery("#myTabs").tabs();
            jQuery("#submitSearch").button();
            jQuery("#submitUom").button();
            jQuery("#submitUom_new").button();
            if (vfuel.getURLParameter2('tab') == "add") {
                jQuery("#myTabs").tabs("option", "active", 1);
            }
            
            jQuery("#submitSearch").click(function() {
                vfuel.admin.uomList(jQuery('#vendorfuel-search').serialize());
            });

            jQuery("#submitUom").click(function() {
                vfuel.admin.addUom(jQuery('#add_uom').serialize());
            });

            jQuery("#submitUom_new").click(function() {
                vfuel.admin.addUom(jQuery('#add_uom_new').serialize());
            });
        });
	</script>
</div>