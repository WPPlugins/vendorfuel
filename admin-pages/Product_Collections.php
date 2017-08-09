<div id="myTabs">
	<ul>
		<li>
			<a href="#listProductcollections">Search</a>
		</li>
		<li>
			<a href="#addProductcollections">Add</a>
		</li>
	</ul>
	<div id="listProductcollections">
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

			<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_product_collection" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Collection ID:</td><td>
						<input name="collection_id" type="text" id="collection_id" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Products:</td><td>
						<input name="products" type="text" id="products" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td>
						<input name="submit" type="submit" id="submitProductcollection" value="Save Product Collection" />
						</td>
					</tr>
				</table>
			</form>
		</div>

	</div>
	<div id="addProductcollections">
		<form action="#" method="post" name="search" class="checkAgainstCurrentNew" id="add_product_collection_new" enctype="multipart/form-data" onsubmit="return false">
			<table>

				<tr>
					<td>Name:</td><td>
					<input name="name" type="text" id="name_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Products:</td><td>
					<input name="products" type="text" id="products_new" style="width:250px;" />
					</td>
				</tr>

				<tr>
					<td>
					<input name="submit" type="submit" id="submitProductcollection_new" value="Save Product Collection" />
					</td>
				</tr>
			</table>
		</form>

	</div>

	<script>
        function fireWhenReady() {
            if ( typeof vfuel.admin != 'undefined') {
               	vfuel.admin.advancedSearch('Productcollections');
                    vfuel.admin.preventUnsavedRedirectNew();
              
            } else {
                setTimeout(fireWhenReady, 100);
            }
        }


        jQuery(document).ready(function() {
            fireWhenReady();
            jQuery("#myTabs").tabs();
            jQuery("#submitSearch").button();
            jQuery("#submitProductcollection").button();
            jQuery("#submitProductcollection_new").button();
            if (vfuel.getURLParameter2('tab') == "add") {
                jQuery("#myTabs").tabs("option", "active", 1);
            }
            if (vfuel.getURLParameter2('tab') == "upload") {
                jQuery("#myTabs").tabs("option", "active", 2);
            }
            jQuery("#submitSearch").click(function() {
                vfuel.admin.productcollectionsList(jQuery('#vendorfuel-search').serialize());
            });

            jQuery("#submitProductcollection").click(function() {
                vfuel.admin.addProductcollections(jQuery('#add_product_collection').serialize());
            });

            jQuery("#submitProductcollection_new").click(function() {
                vfuel.admin.addProductcollections(jQuery('#add_product_collection_new').serialize());
            });
        });
	</script>
</div>