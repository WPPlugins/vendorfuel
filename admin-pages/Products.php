<div id="myTabs">
	<ul>
		<li>
			<a href="#listProducts">Search</a>
		</li>
		<li>
			<a href="#newProduct">Add</a>
		</li>
		<li>
			<a href="#upload">Upload</a>
		</li>
		<li>
			<a href="#batches" id="batches_link">Batches</a>
		</li>
	</ul>
	
	<div id="uploadImages_modal">
		<div id="myModalTabs">
			<ul>
				<li>
					<a href="#listImages">Search Images</a>
				</li>
				<li>
					<a href="#uploadImageTab">Upload Image</a>
				</li>
			</ul>
			<div id="listImages">
				<form action="#" method="post" name="search" id="vendorfuel-search-image" enctype="multipart/form-data" onsubmit="return false">
					<table cellpadding="1" cellspacing="0" class="dbTable">
						<tr>
							<td nowrap="nowrap" class="dbtext">Search: </td>
							<td nowrap="nowrap" class="dbtext">
							<input name="q" type="text" class="textfieldstyle01" id="q_search" style="width: 150px;" value="" />
							</td>
							<td colspan="2" nowrap="nowrap" class="dbtext">
							<input name="submit" type="submit" class="ui-button" id="submitSearchImage" value="Search" />
							</td>
						</tr>
					</table>
				</form>

				<div id="searchimages_viewport"></div>
			</div>
			<div id="uploadImageTab">
				<div class="holder" id="holder20"></div>
			</div>
		</div>			
	</div>
	
	<div id="listProducts">
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
			<form method="post" name="product_form" class="checkAgainstCurrent" id="product_form" onsubmit="return false">
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
						<input name="sku" type="text" id="productSku" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Slug:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="slug" type="text" id="productSlug" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">UPC:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="upc" type="text" id="productUpc" style="width:300px;"/>
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Price:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="price" type="text" id="productPrice" style="width:300px;"/>
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Manufacturer:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="manufacturer" type="text" id="productManufacturer" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Brand Name:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="brand_name" type="text" id="brand_name" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Country:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="country" type="text" id="country" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Device:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="device" type="text" id="device" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Family:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="family" type="text" id="family" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Green:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="green" type="text" id="green" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Green Attributes:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="green_attributes" type="text" id="green_attributes" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Hazmat:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="hazmat" type="text" id="hazmat" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Includes:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="includes" type="text" id="includes" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Keywords:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="keywords" type="text" id="keywords" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Model:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="model" type="text" id="model" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Msds:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="msds" type="text" id="msds" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Rebate:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="rebate" type="text" id="rebate" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Related:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="related" type="text" id="related" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Alternates:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="alternates" type="text" id="alternates" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Truck Only:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="truck_only" type="text" id="truck_only" style="width:300px;" />
						</td>
					</tr>
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 1:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat1" class="select_cat cat1" id="productCat1"></select></td>
					</tr>
					
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 2:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat2" class="select_cat cat2" id="productCat2"></select></td>
					</tr>
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 3:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat3" class="select_cat cat3" id="productCat3"></select></td>
					</tr>
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 4:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat4" class="select_cat cat4" id="productCat4"></select></td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">UoM ID:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="uomid" type="text" id="productUomid" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">UoM Qty:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="uomqty" type="text" id="productUomqty" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">UoM Desc:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="uomdesc" type="text" id="productUomdesc" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Description:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="description" type="text" id="productDescription" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext">Long Description:</td>
						<td align="left" valign="top" nowrap="nowrap" class="dbtext"><?php wp_editor("","productLong_description",array( 'textarea_name' => 'long_description'));?></td>
					</tr>
					<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Attribute 1 Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="att1n" class="product_attributes" type="text" id="att1n" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Attribute 1 Data:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="att1d" type="text" id="att1d" style="width:300px;" />
					</td>
				</tr>
					<tr id="existingAttributes">
						<td align="left" nowrap="nowrap" class="dbtext">Mfg Part #:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="mfg_part_num" type="text" id="productMfg_part_num" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Ability One SKU:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="ability_one_sku" type="text" id="productAbility_one_sku" style="width:300px;"  />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Img URL:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="picture" type="text" id="productPicture" style="width:300px;" />
						</td>
					</tr>
                                        <tr>
						<td align="left" nowrap="nowrap" class="dbtext">Parcel: </td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="parcel" type="text" id="productParcel" style="width:300px;"></select>
						</td>
					</tr>
                                        <tr>
						<td align="left" nowrap="nowrap" class="dbtext">Weight: </td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="weight" type="text" id="productWeight" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Status: </td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="status" type="text" id="productStatus" style="width:300px;"><option value="active">Active</option><option value="inactive">Inactive</option><option value="discontinued">Discontinued</option></select>
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Attached Images:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
							<div id="attachedImages"></div>
						</td>
					</tr>	
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">&nbsp;</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="new_product" type="hidden" id="new_product" value="true" />
						<div id="uploadImage" style="margin-bottom:6px;">Attach Image</div><br/>
						<input name="submit" type="submit" id="submitNewProduct" value="Save Product" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script>
                    
                  
            jQuery(document).ready(function() {
                jQuery("#myTabs").tabs();
                jQuery("#myModalTabs").tabs();
                jQuery("#submitSearch").button();
                jQuery("#submitSearchImage").button();
                jQuery("#submitNewProduct").button();
                jQuery("#uploadImage").button();
                jQuery("#reset").button();

                jQuery('#uploadImages_modal').dialog({
                    autoOpen : false,
                    width : '600',
                    height : '620',
                    title : "Attach Image To Product",
                    modal : true,
                    buttons : {

                        Cancel : function() {

                            jQuery(this).dialog("close");
                        }
                    },
                    open : function() {
                        /*
                         jQuery(document).ready(function() {
                         jQuery(window).load(function() {
                         vfuel.admin.dragAndDrop("image");
                         });
                         });*/

                    },

                    beforeClose : function(event, ui) {
                        jQuery('body').removeClass('stop-scrolling');
                    },
                    close : function() {

                    }
                });

                jQuery("#uploadImage").click(function() {
                    jQuery('#uploadImages_modal').dialog("open");
                });

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
                    vfuel.admin.productList(jQuery('#vendorfuel-search').serialize());
                });
                
                jQuery("#submitSearchImage").click(function() {
                    vfuel.admin.searchimagesList(jQuery('#vendorfuel-search-image').serialize());
                });
                
            });
		</script>

	</div>
	<div id="newProduct">
		<form  method="post" name="new_product_form" class="checkAgainstCurrentNew" id="new_product_form" onsubmit="return false">
			<table cellpadding="1" cellspacing="0" class="dbTable">
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">SKU#:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="sku" type="text" id="newProductSku" style="width:300px;" />
					</td>
				</tr>
				<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Slug:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="slug" type="text" id="newProductSlug" style="width:300px;"  />
						</td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">UPC:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="upc" type="text" id="newProductUpc" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Price:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="price" type="text" id="newPrice" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Manufacturer:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="manufacturer" type="text" id="newProductManufacturer" style="width:300px;" />
					</td>
				</tr>
				<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Brand Name:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="brand_name" type="text" id="newBrand_name" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Country:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="country" type="text" id="newCountry" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Device:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="device" type="text" id="newDevice" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Family:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="family" type="text" id="newFamily" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Green:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="green" type="text" id="newGreen" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Green Attributes:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="green_attributes" type="text" id="newGreen_attributes" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Hazmat:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="hazmat" type="text" id="newHazmat" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Includes:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="includes" type="text" id="newIncludes" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Keywords:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="keywords" type="text" id="newKeywords" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Model:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="model" type="text" id="newModel" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Msds:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="msds" type="text" id="newMsds" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Rebate:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="rebate" type="text" id="newRebate" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Related:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="related" type="text" id="newRelated" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Alternates:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="alternates" type="text" id="newAlternates" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Truck Only:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="truck_only" type="text" id="newTruck_only" style="width:300px;" />
						</td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 1:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat1" class="select_cat cat1" id="newProductCat1"></select></td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 2:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat2" class="select_cat cat2" id="newProductCat2"></select></td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 3:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat3" class="select_cat cat3" id="newProductCat3"></select></td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Category 4:</td>
					<td align="left" nowrap="nowrap" class="dbtext"><select style="width:300px;" name="cat4" class="select_cat cat4" id="newProductCat4"></select></td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">UoM ID:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="uomid" type="text" id="newProductUomid" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">UoM Qty:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="uomqty" type="text" id="newProductUomqty" style="width:300px;"  />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">UoM Desc:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="uomdesc" type="text" id="newProductUomdesc" style="width:300px;"  />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Description:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="description" type="text" id="newProductDescription" style="width:300px;"/>
					</td>
				</tr>
				<tr>
					<td align="left" valign="top" nowrap="nowrap" class="dbtext">Long Description:</td>
					<td align="left" valign="top" nowrap="nowrap" class="dbtext"><?php  wp_editor("","newProductLong_description",array( 'textarea_name' => 'long_description'))
			?></td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Attribute 1 Name:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="att1n" class="product_attributes" type="text" id="newatt1n" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Attribute 1 Data:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="att1d" class="product_attributes" type="text" id="newatt1d" style="width:300px;" />
					</td>
				</tr>
				<tr id="newAttributes">
					<td align="left" nowrap="nowrap" class="dbtext">Mfg Part #:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="mfg_part_num" type="text" id="newProductMfg_part_num" style="width:300px;"/>
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Ability One SKU:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="ability_one_sku" type="text" id="newProductAbility_one_sku" style="width:300px;"/>
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Img URL:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="picture" type="text" id="newProductPicture" style="width:300px;" />
					</td>
				</tr>
                                 <tr>
                                        <td align="left" nowrap="nowrap" class="dbtext">Parcel: </td>
                                        <td align="left" nowrap="nowrap" class="dbtext">
                                        <select name="parcel" type="text" id="newProductParcel" style="width:300px;"></select>
                                        </td>
                                </tr>
                                 <tr>
                                        <td align="left" nowrap="nowrap" class="dbtext">Weight: </td>
                                        <td align="left" nowrap="nowrap" class="dbtext">
                                        <input name="weight" type="text" id="newProductWeight" style="width:300px;" />
                                        </td>
                                </tr>
				<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Status: </td>
						<td align="left" nowrap="nowrap" class="dbtext">
						<select name="status" type="text" id="newProductStatus" style="width:300px;"><option value="active">Active</option><option value="inactive">Inactive</option><option value="discontinued">Discontinued</option></select>
						</td>
					</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">&nbsp;</td>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="new_product" type="hidden" id="new_product" value="true" />
					<input name="reset" type="reset"id="reset2" value="Reset"  />
					&nbsp;&nbsp;
					<input name="submit" type="submit" id="submitNewProduct2" value="Save New Product" />
					</td>
				</tr>
			</table>
		</form>

		<script>
            jQuery(document).ready(function() {
                jQuery("#submitNewProduct2").button();
                jQuery("#reset2").button();
                jQuery("#submitNewProduct2").click(function() {
                    if(jQuery('#newProductCat1').val()==""){
                    	jQuery("select[name='cat1'] option:eq(1)").attr("selected", "selected");
                    }
                    
                    if(jQuery('#newProductCat2').val()==""){
                    	jQuery('#newProductCat2').val(jQuery('#newProductCat1').val());
                    }
                    
                    if(jQuery('#newProductCat3').val()==""){
                    	jQuery('#newProductCat3').val(jQuery('#newProductCat2').val());
                    }
                    
                    if(jQuery('#newProductCat4').val()==""){
                    	jQuery('#newProductCat4').val(jQuery('#newProductCat3').val());
                    }
                    
                    vfuel.admin.addProduct(jQuery('#new_product_form').serialize(),true);
                });
                jQuery("#submitNewProduct").click(function() {
                    if(jQuery('#productCat1').val()==""){
                    	jQuery("select[name='cat1'] option:eq(1)").attr("selected", "selected");
                    }
                    
                    if(jQuery('#productCat2').val()==""){
                    	jQuery('#productCat2').val(jQuery('#productCat1').val());
                    }
                    
                    if(jQuery('#productCat3').val()==""){
                    	jQuery('#productCat3').val(jQuery('#productCat2').val());
                    }
                    
                    if(jQuery('#productCat4').val()==""){
                    	jQuery('#productCat4').val(jQuery('#productCat3').val());
                    }
                    
                    vfuel.admin.addProduct(jQuery('#product_form').serialize(),false);
                });
            });
		</script>
	</div>
	<div id="upload">
		<div class="holder" id="holder1"></div>
		<script>
            jQuery(document).ready(function() {
                jQuery(window).load(function() {
                    vfuel.admin.dragAndDrop(["product", "image"]);

                });
            });
		</script>
	</div>
	<div id="batches" style="margin-bottom:30px;">
		<br/>
		<form action="#" method="post" name="search" id="Productbatch_vendorfuel-search" enctype="multipart/form-data" onsubmit="return false">
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
				
			</table>
		</form>
		

		<div id="Productbatch_viewport"></div>
		<div id="edit_Productbatch_viewport"></div>

		<script>
                    
                      jQuery(window).bind('beforeunload', function() {
              jQuery("#productLong_description-html").click();
               jQuery("#newProductLong_description-html").click();
            });
            
            function fireWhenReady() {
                if ( typeof vfuel.admin != 'undefined') {
					vfuel.admin.advancedSearch('Products');
					vfuel.admin.productbatchAdvancedSearch('Productbatches');
                                        vfuel.admin.productParcelList();
                    vfuel.admin.preventUnsavedRedirectNew();
					vfuel.admin.categoryOptions();
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
                        jQuery('#edit_Productbatch_viewport').hide();
                        jQuery('#Productbatch_viewport').show();
                        jQuery('#Productbatch_vendorfuel-search').show();
                    }
                });

                jQuery('body').on('input', '.product_attributes', function() {
                    if (jQuery("#myTabs").tabs("option", "active") == "1") {
                        var currentAttNum = jQuery(this).attr("id").slice(6, jQuery(this).attr("id").length - 1);
                        var nextAttNum = parseInt(currentAttNum) + 1;
                        console.log("nextNum: " + currentAttNum)
                        if (!jQuery('#newatt' + nextAttNum + 'n').length && nextAttNum < 19) {
                            console.log("new Attribute")
                            jQuery('#newatt' + currentAttNum + 'd').closest("tr").after('<tr class="removeAttRow"><td align="left"\>Attribute ' + nextAttNum + ' Name:</td><td align="left"><input class="product_attributes" name="att' + nextAttNum + 'n" type="text" id="newatt' + nextAttNum + 'n" style="width:300px;" value="" /></tr><tr class="removeAttRow"><td align="left"\>Attribute ' + nextAttNum + ' Data:</td><td align="left"><input class="product_attributes_d" name="att' + nextAttNum + 'd" type="text" id="newatt' + nextAttNum + 'd" style="width:300px;" value="" /></tr>')
                        }
                    }
                });

                jQuery("#submitBatchSearch").button();
                jQuery('#batches_link').click(function() {
                    vfuel.admin.productbatchList(jQuery('#Productbatch_vendorfuel-search').serialize());
                });
                jQuery("#submitBatchSearch").click(function() {
                    vfuel.admin.productbatchList(jQuery('#Productbatch_vendorfuel-search').serialize());
                });
                jQuery("#batch_status").change(function() {
                    vfuel.admin.productbatchList(jQuery('#Productbatch_vendorfuel-search').serialize());
                });
            });
		</script>
	</div>
</div>
