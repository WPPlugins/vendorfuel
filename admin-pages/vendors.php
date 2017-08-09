<div id="myTabs">
	<ul>
		<li>
			<a href="#listVendors">Search</a>
		</li>
		<li>
			<a href='#addVendor'>Add</a>
		</li>
	</ul>

	<div id="attachInterface_modal">
		<form action="#" method="post" name="search" id="add_new_interface" enctype="multipart/form-data" onsubmit="return false">
			<table>

				<tr>
					<td>Vendor ID:</td><td>
					<input name="vendor_id" type="text" id="vendor_id_interface" style="width:250px;" readonly />
					</td>
				</tr>

				<tr>
					<td>Label:</td><td>
					<input name="label" type="text" id="label_new" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td>Integration Type:</td><td>
					<select name="type" type="text" id="integration_type_new" style="width:300px;" />
					<option value="edi">EDI</option><option value="cxml">cXML</option><option value="xml">xml</option><option value="json">json</option><option value="soap">soap</option><option value="http">http</option></select></td>
				</tr>
				<tr>
					<td>
					<div class="hiddenCXML">
						Punchout Identity:
					</div></td><td>
					<input class="hiddenCXML" name="f1" type="text" id="punchoutidentity_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>
					<div class="hiddenCXML">
						Shared Secret:
					</div></td><td>
					<input class="hiddenCXML" name="f2" type="text" id="sharedSecret_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td class="f1show">f1:</td><td>
					<input name="f1" class="f1show" type="text" id="f1_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td class="f2show">f2:</td><td>
					<input name="f2" class="f2show" type="text" id="f2_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>f3:</td><td>
					<input name="f3" class="f3show" type="text" id="f3_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>f4:</td><td>
					<input name="f4" class="f4show" type="text" id="f4_new" style="width:300px;" />
					</td>
				</tr>
				<tr id="newCustomFields">
					<td>f5:</td><td>
					<input name="f5" class="f5show" type="text" id="f5_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>
					<div name="addCustomNew" class="add_custom_new"  id="addCustomNew" style="width:185px;">
						Add Custom Parameter
					</div></td>
				</tr>

			</table>
		</form>

	</div>

	<div id="listVendors">
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
			<form action="#" method="post" name="search" id="add_vendor" enctype="multipart/form-data" onsubmit="return false">
				<table>

					<tr>
						<td>Vendor ID:</td><td>
						<input name="vendor_id" type="text" id="vendor_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Vendor Name:</td><td>
						<input name="name" type="text" id="vendor_name" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td>
						<input name="attach" type="submit" id="attachInterface" value="Attach Interface" />
						</td>
					</tr>

					<tr>
						<td>
						<input name="submit" type="submit" id="submitVendor" value="Save Vendor" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script>
            jQuery(document).ready(function() {
            	fireWhenReady();
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();
                if (vfuel.getURLParameter2('tab') == "add") {
                    jQuery("#myTabs").tabs("option", "active", 1);
                }
                jQuery("#submitSearch").click(function() {
                    vfuel.admin.vendorsList(jQuery('#vendorfuel-search').serialize());
                });
            });
		</script>
	</div>
	<div id="addVendor">
		<form action="#" method="post" name="search" id="add_new_vendor" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Vendor Name:</td><td>
					<input name="name" type="text" id="vendor_name_new" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td>
					<input name="submit" type="submit" id="submitNewVendor" value="Save Vendor" />
					</td>
				</tr>
			</table>
		</form>

		<script>
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
                    vfuel.admin.advancedSearch('Vendors');
                    vfuel.admin.preventUnsavedRedirectNew();

                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }

            

            jQuery("#submitNewVendor").button();
            jQuery("#submitVendor").button();

            jQuery("#submitVendor").click(function() {
                vfuel.admin.addVendors(jQuery('#add_vendor').serialize());
            });
            jQuery("#submitNewVendor").click(function() {
                vfuel.admin.addVendors(jQuery('#add_new_vendor').serialize());
            });

            jQuery("#attachInterface").click(function() {
                jQuery('#attachInterface_modal').dialog("open");
            });

            jQuery(".hiddenCXML").hide();
            jQuery("#attachInterface").button();
            jQuery('#attachInterface_modal').dialog({
                autoOpen : false,
                width : 'auto',
                height : '520',
                title : "Attach Interface to Vendor",
                modal : true,
                buttons : {
                    "Attach Interface" : function() {
                        jQuery('.newCustomFieldNameNew').each(function() {
                            var newName = jQuery(this).val();
                            newName = newName.replace(" ", "_");
                            newName = newName.toLowerCase();
                            newName = "additional[" + newName + "]";
                            jQuery(this).closest('td').next().find('input').attr('name', newName);
                        });

                        vfuel.admin.addInterfaces(jQuery('#add_new_interface').find("input[type='hidden'], :input:not(:hidden)").serialize());
                        jQuery(this).dialog("close");
                    },
                    Cancel : function() {
                        document.getElementById("add_new_interface").reset();
                        jQuery(this).dialog("close");
                    }
                },
                open : function() {

                },

                beforeClose : function(event, ui) {
                    jQuery('body').removeClass('stop-scrolling');
                },
                close : function() {

                }
            });

            jQuery("#addCustomNew").button();
            jQuery("#addCustomNew").click(function() {
                jQuery("#newCustomFields").after('<tr class="customRowNew"><td><input class="newCustomFieldNameNew" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValueNew" name="placeholderNameNew" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustomNew">Remove Field</div></td></tr>')
                jQuery(".btnRemoveCustomNew").button();
                jQuery(".btnRemoveCustomNew").click(function() {
                    jQuery(this).closest('.customRowNew').remove();
                });
            })

            jQuery("#integration_type_new").change(function() {
                if (jQuery(this).val() == "cxml") {
                    jQuery(".hiddenCXML").show();
                    jQuery(".f1show").hide();
                    jQuery(".f2show").hide();
                } else {
                    jQuery(".hiddenCXML").hide();
                    jQuery(".f1show").show();
                    jQuery(".f2show").show();
                }
            });

		</script>
	</div>
