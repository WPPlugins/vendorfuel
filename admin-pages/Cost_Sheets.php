<div id="myTabs">
	<ul>
		<li>
			<a href="#listCostsheets">Search</a>
		</li>
		<li>
			<a href="#newCostsheets">Add</a>
		</li>
		<li>
			<a href="#upload">Upload</a>
		</li>
		<li>
			<a href="#batches" id="batches_link">Batches</a>
		</li>
	</ul>
	<div id="listCostsheets">
		<br/>
		<form action="#" method="post" name="search" id="vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_search" style="width: 150px;" value="" />
					</td>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					<input name="submit" type="submit" id="submitSearch" value="Search" />
					</td>
				</tr>
			</table>
		</form>

		<div id="list_viewport"></div>

		<div id="edit_viewport" style="display:none;">
			<form method="post" name="costsheets_form" id="costsheets_form" class="checkAgainstCurrent" onsubmit="return false">
				<table cellpadding="1" cellspacing="0" class="dbTable">
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Product ID:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="product_id" type="text" id="product_id" style="width:300px;" readonly/>
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">SKU#:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="vendor_id" type="text" id="vendor_id" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">UPC:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="cost" type="text" id="cost" style="width:300px;"/>
						</td>
					</tr>
					
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">&nbsp;</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="new_product" type="hidden" id="new_product" value="true" />
						<input name="submit" type="submit" id="submitCostSheet" value="Save Cost Sheet" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script>
			jQuery(document).ready(function() {
				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				jQuery("#submitNewCostSheet").button();

				if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }
                    if (vfuel.getURLParameter2('tab') == "upload") {
                        jQuery("#myTabs").tabs("option", "active", 2);
                    }
                     if (vfuel.getURLParameter2('tab') == "batches") {
                        jQuery("#myTabs").tabs("option", "active", 3);
                    }
				jQuery("#submitSearch").click(function() {
					vfuel.admin.costsheetList(jQuery('#vendorfuel-search').serialize());
				});
			});
		</script>

	</div>
	<div id="newCostsheets">
		<form method="post" name="new_costsheets_form" id="new_costsheets_form" class="checkAgainstCurrentNew" onsubmit="return false">
				<table cellpadding="1" cellspacing="0" class="dbTable">
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Product ID:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="product_id" type="text" id="newProduct_id" style="width:300px;">
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">SKU#:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="vendor_id" type="text" id="newVendor_id" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">UPC:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="cost" type="text" id="newCost" style="width:300px;"/>
						</td>
					</tr>
					
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">&nbsp;</td>
						<td align="left" nowrap="nowrap" class="dbtext">			
						<input name="submit" type="submit" id="submitNewCostSheet" value="Save Cost Sheet" />
						</td>
					</tr>
				</table>
			</form>


	</div>
	<div id="upload">
		<div class="holder" id="holder15"></div>
		<script>
			jQuery(document).ready(function() {
				jQuery(window).load(function() {
					vfuel.admin.dragAndDrop("costsheet");
				});
			});
		</script>
	</div>
	<div id="batches" style="margin-bottom:30px;">
		<br/>
		<form action="#" method="post" name="search" id="Costsheetbatch_vendorfuel-search"  enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td nowrap="nowrap" class="dbtext">Search: </td>
					<td nowrap="nowrap" class="dbtext">
					<input name="q" type="text" class="textfieldstyle01" id="q_search_batch" style="width: 150px;" value="" />
					</td>
					<td colspan="2" nowrap="nowrap" class="dbtext">
					<input name="submit" type="submit" id="submitBatchSearch" value="Search" />
					</td>
				</tr>
				<tr>
					<td>Status: </td>
					<td>
					<select name="status" id="batch_status">
						<option value="pending">Pending</option>
						<option value="confirmed">Confirmed</option>
						<option value="any">Any</option>
					</select></td>
				</tr>
			</table>
		</form>
		

		<div id="Costsheetbatch_viewport"></div>
		<div id="edit_Costsheetbatch_viewport"></div>

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
				//Quick fix to go back to search screen on tab switch so that click events are not messed up when in view/edit mode.
				jQuery('#myTabs').on('tabsactivate', function(event, ui) {
					var newIndex = ui.newTab.index();
					if (newIndex == 0) {
						jQuery('#edit_viewport').hide();
						jQuery('#list_viewport').show();
						jQuery('#vendorfuel-search').show();
					} else if (newIndex == 3) {
						jQuery('#edit_Costsheetbatch_viewport').hide();
						jQuery('#Costsheetbatch_viewport').show();
						jQuery('#Costsheetbatch_vendorfuel-search').show();
					}
				});

				

				jQuery("#submitBatchSearch").button();
				jQuery('#batches_link').click(function() {
					vfuel.admin.costsheetbatchList(jQuery('#Productbatch_vendorfuel-search').serialize());
				});
				jQuery("#submitBatchSearch").click(function() {
					vfuel.admin.costsheetbatchList(jQuery('#Productbatch_vendorfuel-search').serialize());
				});
				jQuery("#batch_status").change(function() {
					vfuel.admin.costsheetbatchList(jQuery('#Productbatch_vendorfuel-search').serialize());
				});
			});
		</script>
	</div>
</div>
