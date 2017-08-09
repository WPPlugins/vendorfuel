<div id="myTabs">
	<ul>
		<li>
			<a href="#listCategories">Search</a>
		</li>
		<li>
			<a id="hierarchyLink" href="#hierarchyCategories">Hierarchy</a>
		</li>
		<li>
			<a href="#mergeCategories">Merge</a>
		</li>
	</ul>
	<div id="listCategories">
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

		<div id="list_viewport">

		</div>

		<div id="edit_viewport" style="display:none;"></div>

		<script>
            jQuery(document).ready(function() {

                jQuery('#submitSearch').button()
                jQuery("#myTabs").tabs()
                
                if (vfuel.getURLParameter2('tab') == "merge") {
                        jQuery("#myTabs").tabs("option", "active", 2);
                    }

                jQuery("#submitSearch").click(function() {
                    vfuel.admin.categoriesList(jQuery('#vendorfuel-search').serialize());
                });
            });
		</script>
	</div>

	<div id="hierarchyCategories">
		<button id="toParent"></button>
		<br/>

		<div id="hierarchy_viewport"></div>

		<div id="edit_hierarchy_viewport" style="display:none;">
			<form action="#" method="post" name="search" id="add_category" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>ID:</td><td>
						<input name="cat_id" type="text" id="cat_id" style="width:300px;" readonly />
						</td>
					</tr>
					<tr>
						<td>
						<input name="parent_id" type="text" id="parent_id" style="display: none; width:300px;"/>
						</td>
					</tr>
					<tr>
						<td>Filed Under:
						<br/>
						<em>Selected will be primary</em></td><td><table name="parents" type="text" id="parents" style="width:300px;"></table></td>
					</tr>
					<tr>
						<td></td>
						<td>
						<button id="add_parent_cat">
							Add Parent
						</button></td>
					</tr>
					<tr>
						<td>Title:</td><td>
						<input name="title" type="text" id="title" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>UNSPSC:</td><td>
						<input name="unspsc" type="text" id="unspsc" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Slug:</td><td>
						<input name="slug" type="text" id="slug" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Custom Page:</td><td>
						<input name="custom_pg" type="checkbox" class="ck_btn" id="ck_custom" value="1" />
						<br/>
						<?php wp_editor("","custom-page")?> </td>
					</tr>
					<tr>
						<td id="aliasRow"><div id="addAlias">Add Alias</div></td>
					</tr>	
					<tr>
						<td>
						<input name="submit" type="submit" id="submitCat" value="Save Category" />
						</td>
					</tr>
				</table>
			</form>
			<div class="parent-select" title="Select Parent"></div>
		</div>

		<div id="add_hierarchy_viewport" style="display:none;">
			<form action="#" method="post" name="search" id="add_category_new" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Parent ID:</td><td>
						<input name="parent_id" type="text" id="parent_id_new" style="width:300px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Title:</td><td>
						<input name="title" type="text" id="title_new" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>UNSPSC:</td><td>
						<input name="unspsc" type="text" id="unspsc_new" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Custom Page:</td><td>
						<input name="custom_pg" type="checkbox" class="ck_btn" id="ck_custom_new" value="1" />
						<br/>
						<?php wp_editor("","custom-page-new")?> </td>
					</tr>
					<tr>
						<td id="aliasRowNew"><div id="addAliasNew">Add Alias</div></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitNewCat" value="Save Category" />
						</td>
					</tr>
				</table>
			</form>

		</div>
		
		<div id="mergeCategories">
		
		</div>

		<script>
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
                	console.log('right place?');
                	vfuel.admin.advancedSearch('Categories');
                        //vfuel.admin.groupadminOptions("multi");
                         vfuel.admin.categoriesHierarchy();

                } else {
                    setTimeout(fireWhenReady, 100);
                }
            }


            jQuery(document).ready(function() {
                jQuery('#toParent').button({
                    icons : {
                        primary : 'ui-icon-circle-triangle-n'
                    }
                }).button('option', 'label', 'To Parent');

                jQuery("#submitCat").button();
                jQuery("#submitNewCat").button();
                jQuery("#addAlias").button();
                jQuery("#addAliasNew").button();
                jQuery("#add_parent_cat").button({
                    icons : {
                        primary : 'ui-icon-plusthick'
                    }
                });
                
                
				jQuery("#addAlias").click(function(){
					var aliasNumber=0;
					jQuery(".alias").each(function(index){
						aliasNumber++;
					});
					var htmlAliasRow="<tr><td><input class='alias' id='alias"+aliasNumber+"' name='alias[]' /></td></tr>";
					jQuery("#aliasRow").after(htmlAliasRow);
				});
				
				jQuery("#addAliasNew").click(function(){
					var aliasNumber=0;
					jQuery(".aliasNew").each(function(index){
						aliasNumber++;
					});
					var htmlAliasRow="<tr><td><input class='aliasNew' id='alias"+aliasNumber+"' name='alias[]' /></td></tr>";
					jQuery("#aliasRowNew").after(htmlAliasRow);
				});
				
                jQuery("#parent_id").click(function() {
                    jQuery(".parent-select").dialog({
                        autoOpen : false,
                        resizable : false,
                        modal : true,
                        draggable : false,
                        height : '600px',
                        width : '600px'
                    });
                    vfuel.admin.selectCat("parent");
                    jQuery(".parent-select").dialog('open');
                });

                jQuery("#add_parent_cat").click(function() {
                    jQuery(".parent-select").dialog({
                        autoOpen : false,
                        resizable : false,
                        modal : true,
                        draggable : false,
                        height : 600,
                        width : 600
                    });
                    vfuel.admin.selectCat("addToCat");
                    jQuery(".parent-select").dialog('open');
                });

                jQuery("#submitCat").click(function() {
                    var parentsString = '';
                    var parentIDString = '';
                    if (jQuery('input[type=radio]:checked').size() > 0) {
                        jQuery('#parent_id').val(jQuery('input[type=radio]:checked').prop('id').substr(9));
                    }
                    jQuery('.parent_ids').each(function() {
                        parentsString += "&parents%5b%5d=" + this.id.substring(6);
                    });
                    vfuel.admin.addCategory(jQuery('#add_category').find('input[name!=parents]').serialize(), parentsString);
                });
                jQuery("#submitNewCat").click(function() {
                    vfuel.admin.addCategory(jQuery('#add_category_new').find('input[name!=parents]').serialize());
                });

                //hide custom page editor, and then show or hide it base on the toggle.
                jQuery('#wp-custom-page-wrap').hide();
                jQuery('#wp-custom-page-new-wrap').hide();
                jQuery('#ck_custom').change(function() {
                    if (this.checked) {
                        jQuery('#wp-custom-page-wrap').show();
                    } else {
                        jQuery('#wp-custom-page-wrap').hide();
                    }
                });
                jQuery('#ck_custom_new').change(function() {
                    if (this.checked) {
                        jQuery('#wp-custom-page-new-wrap').show();
                    } else {
                        jQuery('#wp-custom-page-new-wrap').hide();
                    }
                });

                jQuery("#hierarchyLink").click(function() {
                    if (!jQuery('#Original_accordian').length)
                        vfuel.admin.categoriesHierarchy();
                });
                if (vfuel.getURLParameter2('tab') == "hierarchy") {

                    jQuery("#myTabs").tabs("option", "active", 1);
					
                }
				fireWhenReady();
            });

		</script>
	</div>
</div>