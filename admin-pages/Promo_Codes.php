<div id="myTabs">
	<ul>
		<li>
			<a href="#listPromo">Search</a>
		</li>
		<li>
			<a href='#addPromo'>Add</a>
		</li>
	</ul>

	<div id="runBatch_modal">
		<form action="#" method="post" name="search" id="add_new_interface" enctype="multipart/form-data" onsubmit="return false">
			<table>

				<tr>
					<td>Code Prefix:</td><td>
					<input name="code_prefix" type="text" id="code_prefix" style="width:120px;" />
					</td>
				</tr>

				<tr>
					<td class="">Number to Generate:</td><td>
					<input name="generate_number" class="" type="text" id="generate_number" style="width:120px;" />
					</td>
				</tr>

				<tr>
					<td class="">List Type:</td><td>
					<input type="radio" name="sepType" value="comma" checked="">
					Comma
					<br>
					<input type="radio" name="sepType" value="newline">
					New Line </td>
				</tr>

			</table>
		</form>
		<div id="generatedCodes" style="display:none;">
			<textarea id="genText" rows="6" cols="35"></textarea>
		</div>
	</div>

	<div id="listPromo">
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
			<form action="#" method="post" name="search" id="add_promo" class="checkAgainstCurrent" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Promo Code ID:</td><td>
						<input name="promo_code_id" type="text" id="promo_code_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>*Code:</td><td>
						<input name="code" type="text" id="code" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Customer ID:</td><td>
						<input name="customer_id" type="text" id="customer_id" style="width:250px;" />
						</td>
					</tr>

					<tr>
						<td>Loc ID:</td><td>
						<input name="loc_id" type="text" id="loc_id" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Email:</td><td>
						<input name="email" type="text" id="email" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>*Date Effective:</td><td>
						<input type="text" class="vf_date_picker" name="date_effective" id="date_effective" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>*Date Expires:</td><td>
						<input type="text" class="vf_date_picker" name="date_expires" id="date_expires" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Limit Per Customer:</td><td>
						<input name="limit_per_customer" type="text" id="limit_per_customer" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Limit Per Loc ID:</td><td>
						<input name="limit_per_loc_id" type="text" id="limit_per_loc_id" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Total Limit:</td><td>
						<input name="limit_total" type="text" id="limit_total" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>*Discount:</td><td>
						<input name="discount" type="text" id="discount" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Max Discount:</td><td>
						<input name="max_discount" type="text" id="max_discount" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>Minimum Purchase:</td><td>
						<input name="min_purchase" type="text" id="min_purchase" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td>*Discount Type:</td><td>
						<select name="discount_type" type="text" id="discount_type" style="width:250px;">
							<option value="percentage">Percentage</option><option value="discount">Discount</option><option value="price">Price</option>
						</select></td>
					</tr>
					<tr>
						<td>Items:</td><td>
						<input name="items" type="text" id="items" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="require_all_items" type="checkbox" class="ck_btn" id="require_all_items" value="1" />
						<label style="width:150px;" for="require_all_items">Require All Items</label></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="auto_add" type="checkbox" class="ck_btn" id="auto_add" value="1" />
						<label style="width:150px;" for="auto_add">Auto Add</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitPromo" value="Save Promo Code" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script>
            jQuery(document).ready(function() {
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();
                jQuery("#submitSearch").click(function() {
                    vfuel.admin.promoList(jQuery('#vendorfuel-search').serialize());
                });
            });
		</script>
	</div>
	<div id="addPromo">
		<form action="#" method="post" name="search" id="add_promo_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="batch_create" type="checkbox" class="ck_btn" id="ck_batch_create" value="1" />
					<label style="width:185px;" for="ck_batch_create">Batch Create</label></td>
				</tr>
				<tr>
					<td>Promo Code ID:</td><td>
					<input name="promo_code_id" type="text" id="promo_code_id_new" style="width:250px;" readonly />
					</td>
				</tr>
				<tr>
					<td>*Code:</td><td>
					<input name="code" type="text" id="code_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Customer ID:</td><td>
					<input name="customer_id" type="text" id="customer_id_new" style="width:250px;" />
					</td>
				</tr>

				<tr>
					<td>Loc ID:</td><td>
					<input name="loc_id" type="text" id="loc_id_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Email:</td><td>
					<input name="email" type="text" id="email_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>*Date Effective:</td><td>
					<input type="text" class="vf_date_picker" name="date_effective" id="date_effective_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>*Date Expires:</td><td>
					<input type="text" class="vf_date_picker" name="date_expires" id="date_expires_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Limit Per Customer:</td><td>
					<input name="limit_per_customer" type="text" id="limit_per_customer_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Limit Per Loc ID:</td><td>
					<input name="limit_per_loc_id" type="text" id="limit_per_loc_id_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Total Limit:</td><td>
					<input name="limit_total" type="text" id="limit_total_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>*Discount:</td><td>
					<input name="discount" type="text" id="discount_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Max Discount:</td><td>
					<input name="max_discount" type="text" id="max_discount_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>Minimum Purchase:</td><td>
					<input name="min_purchase" type="text" id="min_purchase_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td>*Discount Type:</td><td>
					<select name="discount_type" type="text" id="discount_type_new" style="width:250px;">
						<option value="percentage">Percentage</option><option value="discount">Discount</option><option value="price">Price</option>
					</select></td>
				</tr>
				<tr>
					<td>Items:</td><td>
					<input name="items" type="text" id="items_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input  name="require_all_items" type="checkbox" class="ck_btn" id="require_all_items_new" value="1" />
					<label style="width:150px;" for="require_all_items_new">Require All Items</label></td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="auto_add" type="checkbox" class="ck_btn" id="auto_add_new" value="1" />
					<label style="width:150px;" for="auto_add_new">Auto Add</label></td>
				</tr>
				<tr>
					<td>
					<input name="submit" type="submit" id="submitNewPromo" value="Save Promo Code" />
					</td>
				</tr>
				<tr>
					<td>
					<input name="submit" style="display:none;" type="submit" id="submitNewBatch" value="Run Batch" />
					</td>
				</tr>
			</table>
		</form>

		<script>
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
                    vfuel.admin.advancedSearch('PromoCodes');
                    vfuel.admin.preventUnsavedRedirectNew();
                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }


            jQuery('#runBatch_modal').dialog({
                autoOpen : false,
                width : 'auto',
                height : '400',
                title : "Run Batch Code Generation",
                modal : true,
                buttons : {
                    "Generate Codes" : function() {
                        jQuery("#generatedCodes").show();
                        jQuery("#generatedCodes").prepend("<div class='rmvPostGeneration' style='font-weight:bold;'>Generated Codes:</div>")
                        var codeLength = jQuery("#generate_number").val();
                        for (var i = 1; i <= codeLength; i++) {
                            var newCode = "";
                            newCode += jQuery("#code_prefix").val();
                            newCode += vfuel.admin.generatePassword(true);
                            jQuery("#code_new").val(newCode)
                            vfuel.admin.addPromo(jQuery('#add_promo_new').serialize() + "&code=" + newCode, newCode, function(thisCode) {
                                if (jQuery('input[name=sepType]:checked', '#add_new_interface').val() == "comma") {
                                    jQuery("#genText").val(jQuery("#genText").val() + thisCode + ",");
                                } else {
                                    jQuery("#genText").val(jQuery("#genText").val() + thisCode + "\n");
                                }

                                if (thisCode == newCode) {
                                    if (jQuery('input[name=sepType]:checked', '#add_new_interface').val() == "comma") {
                                        setTimeout(function() {
                                            jQuery("#genText").val(jQuery("#genText").val().slice(0, -1))
                                        }, 1300);
                                    }

                                    jQuery("#generatedCodes").append("<div class='rmvPostGeneration' style='font-weight:bold;'>Code Generation Complete</div><div id='btnExitGen'>Done</div>")
                                    jQuery("#btnExitGen").button();
                                    jQuery("#btnExitGen").on("click", function() {
                                        jQuery('#runBatch_modal').dialog("close");
                                        jQuery("#genText").val("");
                                        jQuery("#generatedCodes").hide();
                                        jQuery('.rmvPostGeneration').remove();
                                    });

                                }

                            });

                        }

                    },
                    Cancel : function() {
                        jQuery(this).dialog("close");
                        jQuery("#genText").val("");
                        jQuery("#generatedCodes").hide();
                        jQuery('.rmvPostGeneration').remove();
                    }
                }
            });

            jQuery("#submitNewBatch").button();

            jQuery("#submitNewBatch").click(function() {
                jQuery('#runBatch_modal').dialog("open");
            });

            jQuery("#ck_batch_create").button({
                icons : {
                    primary : 'ui-icon-closethick'
                }
            }).change(function() {
                jQuery(this).button("option", {
                    icons : {
                        primary : this.checked ? 'ui-icon-check' : 'ui-icon-closethick'
                    }

                });

                if (this.checked) {
                    jQuery('#code_new').attr("disabled", true);
                    jQuery("#submitNewPromo").hide();
                    jQuery("#submitNewBatch").show();
                } else {
                    jQuery('#code_new').attr("disabled", false);
                    jQuery("#submitNewPromo").show();
                    jQuery("#submitNewBatch").hide();
                }
            });

            jQuery(".vf_date_picker").datepicker();
            jQuery(".vf_date_picker").datepicker("option", "dateFormat", "yy-mm-dd");
            jQuery(document).ready(function() {
                fireWhenReady();
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

                jQuery("#submitPromo").button();
                jQuery("#submitNewPromo").button();

                if (vfuel.getURLParameter2('tab') == "add") {
                    jQuery("#myTabs").tabs("option", "active", 1);
                }

                jQuery("#submitPromo").click(function() {
                    vfuel.admin.addPromo(jQuery('#add_promo').serialize());
                });
                jQuery("#submitNewPromo").click(function() {
                    vfuel.admin.addPromo(jQuery('#add_promo_new').serialize());
                });
            });
		</script>
	</div>
