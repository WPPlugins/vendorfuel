<div id="myTabs">
	<ul>
		<li>
			<a href="#listGroups">Search</a>
		</li>
		<li>
			<a href="#addGroup">Add</a>
		</li>
		<li>
			<a href="#upload">Upload</a>
		</li>
		<li>
			<a href="#batches" id="batches_link">Batches</a>
		</li>
	</ul>
	
	<div id="attachInterface_modal">
		<form action="#" method="post" name="search" id="add_new_interface" enctype="multipart/form-data" onsubmit="return false">
			<table>

				<tr>
					<td>Group ID:</td><td>
					<input name="group_id" type="text" id="group_id_interface" style="width:250px;" readonly />
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
					<input name="f1" class="f1show" type="text" id="f1_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td class="f2show">f2:</td><td>
					<input name="f2" class="f2show" type="text" id="f2_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>f3:</td><td>
					<input name="f3" class="f3show" type="text" id="f3_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>f4:</td><td>
					<input name="f4" class="f4show" type="text" id="f4_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr id="newCustomInterfaceFields">
					<td>f5:</td><td>
					<input name="f5" class="f5show" type="text" id="f5_interface_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>
					<div name="addCustomInterfaceNew" class="add_custom_interface_new"  id="addCustomInterfaceNew" style="width:185px;">
						Add Custom Parameter
					</div></td>
				</tr>

			</table>
		</form>

	</div>
	
	<div id="listGroups">
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
			<form style="width:800px; display:inline-block;" action="#" method="post" class="checkAgainstCurrent"  name="search" id="add_group" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>ID:</td><td>
						<input name="group_id" type="text" id="group_id" style="width:300px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Parent Group ID:</td><td>
						<input name="parent_group_id" type="text" id="parent_group_id" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Authorized Emails:</td>
						<td>						<textarea name="authorized_emails" id="authorized_emails" cols="34" rows="5"></textarea></td>
					</tr>

					<tr>
						<td>Group Invite Code:</td><td>
						<input name="group_invite_code" type="text" id="group_invite_code" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Punchout Identity:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="punchout_identity" type="text" id="GroupPunchoutIdentity" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Shared Secret:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="shared_secret" type="text" id="GroupSharedSecret" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Terms:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="terms" type="text" id="GroupTerms" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Order Prefix:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="order_prefix" type="text" id="GroupOrderPrefix" style="width:300px;" />
						</td>
					</tr>

					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Default Price Sheet:</td>
						<td align="left" nowrap="nowrap" class="dbtext"><select name="default_price_sheet" class="select_price" id="default_price_sheet"></select></td>
					</tr>
                                        
                                        <tr>
						<td align="left" nowrap="nowrap" class="dbtext">Shipping:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
                                                    <select name="shipping" class="select_shipping" id="shipping">
                                                        <option value="default">Store Default</option>
                                                        <option value="free">Free</option>
                                                        <option value="method">Methods</option>
                                                        <option value="parcel">Parcels</option>
                                                    </select></td>
					</tr>
					
					<tr>
						<td>
						<input name="attach" type="submit" id="attachInterface" value="Attach Interface" />
						</td>
					</tr>
					
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="group_registration_available" type="checkbox" class="ck_btn" id="group_registration_available" value="1" />
						<label for="group_registration_available">Group Registration Available</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitGroup" value="Save Group" />
						</td>
					</tr>
				</table>
			</form>
<div style="width:400px; background:#ddd; border-radius:5px; margin-top:10px; padding:10px; display:block;" id="listNotes">
				<textarea cols="50" id="newNote"></textarea>
				<div id="addNote">Add Note</div>
			</div>	
		</div>

	</div>
	<div id="addGroup">
		<form action="#" method="post" class="checkAgainstCurrentNew" name="search" id="add_new_group" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Parent Group ID:</td><td>
					<input name="parent_group_id" type="text" id="parent_group_id_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Name:</td><td>
					<input name="name" type="text" id="name_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Authorized Emails:</td>
					<td>					<textarea name="authorized_emails" id="authorized_emails_new" cols="34" rows="5"></textarea></td>
				</tr>

				<tr>
					<td>Group Invite Code:</td><td>
					<input name="group_invite_code" type="text" id="group_invite_code_new" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Punchout Identity:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="punchout_identity" type="text" id="newGroupPunchoutIdentity" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Shared Secret:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="shared_secret" type="text" id="newGroupSharedSecret" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Terms:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="terms" type="text" id="newGroupTerms" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Order Prefix:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="order_prefix" type="text" id="newGroupOrderPrefix" style="width:300px;" />
					</td>
				</tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Default Price Sheet:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select name="default_price_sheet" class="select_price" id="default_price_sheet_new"></select></td>
				</tr>
                                
                                <tr>
						<td align="left" nowrap="nowrap" class="dbtext">Shipping:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
                                                    <select name="shipping" class="select_shipping" id="shipping">
                                                        <option value="default">Store Default</option>
                                                        <option value="free">Free</option>
                                                        <option value="method">Methods</option>
                                                        <option value="parcel">Parcels</option>
                                                    </select></td>
                                </tr>
                                        
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="group_registration_available" type="checkbox" class="ck_btn" id="new_group_registration_available" value="1" />
					<label for="new_group_registration_available">Group Registration Available</label></td>
				</tr>
				<tr>
					<td>
					<input name="submit" type="submit" id="submitNewGroup" value="Save Group" />
					</td>
				</tr>
			</table>
		</form>

		<script>
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
                	vfuel.admin.advancedSearch('Group');
                    vfuel.admin.priceSheetOptions(function(){
                    		vfuel.admin.preventUnsavedRedirectNew();
                   	});
                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }


            window.onload = function() {
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
				
                jQuery("#addNote").button();
                jQuery("#submitGroup").button();
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();

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
                    vfuel.admin.groupList(jQuery('#vendorfuel-search').serialize());
                });

                jQuery("#submitGroup").click(function() {
                    vfuel.admin.addGroup(jQuery('#add_group').serialize());
                });

                jQuery("#submitNewGroup").button();
                jQuery("#submitNewGroup").click(function() {
                    vfuel.admin.addGroup(jQuery('#add_new_group').serialize());
                });
                
                jQuery('#addNote').click(function(){
                	vfuel.admin.groupnotesAdd(jQuery('#group_id').val(),jQuery('#newNote').val());
                });
                
                 //Attach Interface----------------------------

                jQuery("#attachInterface").click(function() {
                    jQuery('#attachInterface_modal').dialog("open");
                });

                jQuery(".hiddenCXML").hide();
                jQuery("#attachInterface").button();
                jQuery('#attachInterface_modal').dialog({
                    autoOpen : false,
                    width : 'auto',
                    height : '520',
                    title : "Attach Interface to Group",
                    modal : true,
                    buttons : {
                        "Attach Interface" : function() {
                            jQuery('.newCustomFieldInterfaceNameNew').each(function() {
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
                jQuery("#addCustomInterfaceNew").button();
                jQuery("#addCustomInterfaceNew").click(function() {
                    jQuery("#newCustomInterfaceFields").after('<tr class="customRowInterfaceNew"><td><input class="newCustomFieldInterfaceNameNew" type="text" style="width: 170px;" placeholder="Custom Parameter Name"/></td><td> <input class="newCustomFieldValueNew" name="placeholderNameNew" type="text" placeholder="Value"/></td><td><div class="btnRemoveCustomInterfaceNew">Remove Field</div></td></tr>');
                    jQuery(".btnRemoveCustomInterfaceNew").button();
                    jQuery(".btnRemoveCustomInterfaceNew").click(function() {
                        jQuery(this).closest('.customRowInterfaceNew').remove();
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

            };
		</script>
	</div>
	<div id="upload">
		<div class="holder" id="holder20"></div>
		<script>
            jQuery(document).ready(function() {
                jQuery(window).load(function() {
                    vfuel.admin.dragAndDrop("group_batch");
                });
            });
		</script>
	</div>

	<div id="batches" style="margin-bottom:30px;">
		<br/>
		<form action="#" method="post" name="search" id="Groupbatch_vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
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

		<div id="Groupbatch_viewport"></div>
		<div id="edit_Groupbatch_viewport"></div>

		<script>
            jQuery(document).ready(function() {

                //Quick fix to go back to search screen on tab switch so that click events are not messed up when in view/edit mode.
                jQuery('#myTabs').on('tabsactivate', function(event, ui) {
                    var newIndex = ui.newTab.index();
                    if (newIndex == 0) {
                        jQuery('#edit_viewport').hide();
                        jQuery('#list_viewport').show();
                        jQuery('#vendorfuel-search').show();
                    } else if (newIndex == 3) {
                        jQuery('#edit_Groupbatch_viewport').hide();
                        jQuery('#Groupbatch_viewport').show();
                        jQuery('#Groupbatch_vendorfuel-search').show();
                    }
                });
/*
                if (vfuel.getURLParameter2('tab') == "add") {
                    jQuery("#myTabs").tabs("option", "active", 1);
                }

                if (vfuel.getURLParameter2('tab') == "upload") {
                    jQuery("#myTabs").tabs("option", "active", 2);
                }

                if (vfuel.getURLParameter2('tab') == "batches") {
                    jQuery("#myTabs").tabs("option", "active", 3);
                }*/

                jQuery("#submitBatchSearch").button();
                
                 jQuery('#batches_link').click(function() {
                 vfuel.admin.groupbatchList(jQuery('#Groupbatch_vendorfuel-search').serialize());
                 });
                 jQuery("#submitBatchSearch").click(function() {
                 vfuel.admin.groupbatchList(jQuery('#Groupbatch_vendorfuel-search').serialize());
                 });
                 jQuery("#batch_status").change(function() {
                 vfuel.admin.groupbatchList(jQuery('#Groupbatch_vendorfuel-search').serialize());
                 });
            });
		</script>
	</div>
</div>