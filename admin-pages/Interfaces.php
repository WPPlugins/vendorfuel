<div id="myTabs">
	<ul>
		<li>
			<a href="#listInterfaces">Search</a>
		</li>
		<li>
			<a href='#addInterfaces'>Add</a>
		</li>
	</ul>
	<div id="listInterfaces">
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
			<form action="#" method="post" name="search" id="add_interface" enctype="multipart/form-data" onsubmit="return false">
				<table>

					<tr>
						<td>Interface ID:</td><td>
						<input name="interface_id" type="text" id="interface_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Label:</td><td>
						<input name="label" type="text" id="label" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td>Integration Type:</td><td>
						<select name="type" type="text" id="integration_type" style="width:300px;" />
						<option value="edi">EDI</option><option value="cxml">cXML</option><option value="xml">xml</option><option value="json">json</option><option value="soap">soap</option><option value="http">http</option></select></td>
					</tr>
					<tr>
						<td>
						<div class="hiddenCXML">
							Punchout Identity:
						</div></td><td>
						<input class="hiddenCXML" name="f1" type="text" id="punchoutidentity" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>
						<div class="hiddenCXML">
							Shared Secret:
						</div></td><td>
						<input class="hiddenCXML" name="f2" type="text" id="sharedSecret" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td class="f1show">f1:</td><td>
						<input name="f1" class="f1show" type="text" id="f1" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td class="f2show">f2:</td><td>
						<input name="f2" class="f2show" type="text" id="f2" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>f3:</td><td>
						<input name="f3" class="f3show" type="text" id="f3" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>f4:</td><td>
						<input name="f4" class="f4show" type="text" id="f4" style="width:300px;" />
						</td>
					</tr>
					<tr id="customFields">
						<td>f5:</td><td>
						<input name="f5" class="f5show" type="text" id="f5" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td>
						<div name="addCustom" class="add_custom"  id="addCustom" style="width:185px;">
							Add Custom Parameter
						</div></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitInterface" value="Save Interface" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script>
            jQuery(document).ready(function() {
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();
                if (vfuel.getURLParameter2('tab') == "add") {
                    jQuery("#myTabs").tabs("option", "active", 1);
                }
                jQuery("#submitSearch").click(function() {
                    vfuel.admin.interfacesList(jQuery('#vendorfuel-search').serialize());
                });
            });
		</script>
	</div>
	<div id="addInterfaces">
		<form action="#" method="post" name="search" id="add_new_interface" enctype="multipart/form-data" onsubmit="return false">
			<table>
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
				<tr>
					<td>
					<input name="submit" type="submit" id="submitNewInterface" value="Save Interface" />
					</td>
				</tr>
			</table>
		</form>

		<script>
            jQuery(".hiddenCXML").hide();
            jQuery("#submitNewInterface").button();
            jQuery("#submitInterface").button();

            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
					vfuel.admin.advancedSearch('Interfaces');
                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }
			
			jQuery(document).ready(function() {
				fireWhenReady();
			});
            
            jQuery("#submitInterface").click(function() {

                jQuery('.newCustomFieldName').each(function() {
                    var newName = jQuery(this).val();
                    newName = newName.replace(" ", "_");
                    newName = newName.toLowerCase();
                    newName = "additional[" + newName + "]";
                    jQuery(this).closest('td').next().find('input').attr('name', newName);
                });

                vfuel.admin.addInterfaces(jQuery('#add_interface').find("input[type='hidden'], :input:not(:hidden)").serialize());
            });
            jQuery("#submitNewInterface").click(function() {

                jQuery('.newCustomFieldNameNew').each(function() {
                    var newName = jQuery(this).val();
                    newName = newName.replace(" ", "_");
                    newName = newName.toLowerCase();
                    newName = "additional[" + newName + "]";
                    jQuery(this).closest('td').next().find('input').attr('name', newName);
                });

                vfuel.admin.addInterfaces(jQuery('#add_new_interface').find("input[type='hidden'], :input:not(:hidden)").serialize());
            });

            jQuery("#addCustomNew").button();
            jQuery("#addCustomNew").click(function() {
                jQuery("#newCustomFields").after('<tr class="customRowNew"><td><input class="newCustomFieldNameNew" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValueNew" name="placeholderNameNew" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustomNew">Remove Field</div></td></tr>')
                jQuery(".btnRemoveCustomNew").button();
                jQuery(".btnRemoveCustomNew").click(function() {
                    jQuery(this).closest('.customRowNew').remove();
                });
            });

            jQuery("#addCustom").button();
            jQuery("#addCustom").click(function() {
                jQuery("#customFields").after('<tr class="customRow"><td><input class="newCustomFieldName" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValue" name="placeholderName" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustom">Remove Field</div></td></tr>')
                jQuery(".btnRemoveCustom").button();
                jQuery(".btnRemoveCustom").click(function() {
                    jQuery(this).closest('.customRow').remove();
                });
            });

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
