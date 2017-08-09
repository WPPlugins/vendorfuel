<div id="myTabs">
	<ul>
		<li>
			<a href="#listPriceSheets">Search</a>
		</li>
		<li>
			<a href="#newPriceSheet">Add</a>
		</li>
		<li>
			<a href="#batches" id="batches_link">Batches</a>
		</li>
	</ul>
	<div id="listPriceSheets">
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
			<form action="#" method="post" name="search" id="price_sheet_form" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table cellpadding="1" cellspacing="0" class="dbTable">

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">ID:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="price_sheet_id" type="text" id="price_sheet_id" style="width:300px;" readonly/>
						</td>
					</tr>
					<!--
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">CSV File:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><input name="csv_file" type="file" id="csv_file" /></td>
					</tr>
					-->
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Sheet Name:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="sheet" type="text" id="sheet" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Site ID:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="site_id" type="text" id="site_id" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">GP Price Sheet:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="gp_price_sheet" type="text" id="gp_price_sheet" style="width:300px;" />
						</td>
					</tr>
					<td>Upload:</td><td><div class="holder" id="holder2"></div></td>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input type="hidden" name="new_price_sheet" value="true" />
						<input name="submit" type="submit" class="submitButton" id="submit-sheet" value="Save Price Sheet"/>
						</td>
					</tr>
				</table>
			</form>

		</div>

	</div>

	<div id="newPriceSheet">
		<form  action="#" method="post" name="search" id="new_price_sheet_form" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<!--<tr>
				<td align="left" nowrap="nowrap" class="dbtext">CSV File:</td>
				<td align="left" nowrap="nowrap" class="dbtext"><input name="csv_file" type="file" id="csv_file_new" /></td>
				</tr>-->

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Sheet Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="sheet" type="text" id="sheet_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Site ID:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="site_id" type="text" id="site_id_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">GP Price Sheet:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="gp_price_sheet" type="text" id="gp_price_sheet_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Upload:</td><td><div class="holder" id="holder1"></div>
					<script>
						jQuery(document).ready(function() {
							jQuery(window).load(function() {
								vfuel.admin.dragAndDrop("price_sheet");
							});
						});
					</script></td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input type="hidden" name="new_price_sheet" value="true" />
					<input name="submit" type="submit" class="submitButton" id="submit-sheet-new" value="Save Price Sheet"/>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<script>
		jQuery(document).ready(function() {
			jQuery('#submit-sheet').button();
			jQuery('#submit-sheet-new').button();

			jQuery("#submit-sheet").click(function() {
				vfuel.admin.addPricesheet(jQuery('#price_sheet_form').serialize());
			});

			jQuery("#submit-sheet-new").click(function() {
				vfuel.admin.addPricesheet(jQuery('#new_price_sheet_form').serialize());
			});

			jQuery("#myTabs").tabs();
			jQuery("#submitSearch").button();
			jQuery("#submitSearch").click(function() {
				vfuel.admin.pricesheetList(jQuery('#vendorfuel-search').serialize());
			});
		});
	</script>
	<div id="batches" style="margin-bottom:30px;">
		<br/>
		<form action="#" method="post" name="search" id="Pricesheetbatch_vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
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

		<div id="Pricesheetbatch_viewport"></div>
		<div id="edit_Pricesheetbatch_viewport"></div>

		<script>
		function fireWhenReady() {
            if ( typeof vfuel.admin != 'undefined') {
               		vfuel.admin.advancedSearch('PriceSheets');
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
						jQuery('#edit_Pricesheetbatch_viewport').hide();
						jQuery('#Pricesheetbatch_viewport').show();
						jQuery('#Pricesheetbatch_vendorfuel-search').show();
					}
				});
				
				if (vfuel.getURLParameter2('tab') == "add") {
                        jQuery("#myTabs").tabs("option", "active", 1);
                    }
                    
                    if (vfuel.getURLParameter2('tab') == "batches") {
                        jQuery("#myTabs").tabs("option", "active", 2);
                    }

				jQuery("#submitBatchSearch").button();
				/*
				jQuery('#batches_link').click(function(){
					vfuel.admin.pricesheetbatchList(jQuery('#Pricesheetbatch_vendorfuel-search').serialize());
				});*/
				jQuery("#submitBatchSearch").click(function() {
					vfuel.admin.pricesheetbatchList(jQuery('#Pricesheetbatch_vendorfuel-search').serialize());
				});
				jQuery("#batch_status").change(function() {
					vfuel.admin.pricesheetbatchList(jQuery('#Pricesheetbatch_vendorfuel-search').serialize());
				});
			});
		</script>
	</div>
</div>
