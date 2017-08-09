<div id="myTabs">
	<ul>
		<li>
			<a href="#listBanners">Banner Areas</a>
		</li>
		<li>
			<a href="#addBannerarea">Add Banner Area</a>
		</li>
	</ul>
	<div id="listBanners">
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

		</div>
		<div id="edit_banner_viewport" style="display:none;">
			<button style="width:100px;" id="back_btn">
				Back
			</button>
			<button style="width:100px;" id="remove_btn">
				Remove
			</button>
			<br/>
			Description:
			<input type="text" style="width:500px;" id="description_inContent"/>
			<?php wp_editor("","banner-content")
			?>
			<table>
				<tr>
					<td>Price Sheet: </td><td><select name="price_sheet_id" style="width:270px;" class="select_price" id="price_sheet_id"></select></td>
				</tr>
				<tr>
					<td>Group: </td><td><select name="group_id" style="width:270px;" class="select_group" id="group_id"></select></td>
				</tr>
			</table>
			<button class="saveBanner" style="width:100px;" id="save">
				Save
			</button>

		</div>

		<script>
			jQuery("#back_btn").button({
				icons : {
					primary : "ui-icon-arrowthick-1-w"
				},
				text : 'Back'
			});

			jQuery("#remove_btn").button({
				icons : {
					primary : "ui-icon-circle-minus"
				},
				text : 'Back'
			});

			jQuery(".saveBanner").button({
				icons : {
					primary : "ui-icon-disk"
				},
				text : 'Save'
			});

			function fireWhenReady() {
				if ( typeof vfuel.admin != 'undefined') {
					vfuel.admin.advancedSearch('BannerArea');
					vfuel.admin.bannerareaList(jQuery('#vendorfuel-search').serialize());
					vfuel.admin.priceSheetOptions();
					vfuel.admin.groupOptions();
					
				} else {
					setTimeout(fireWhenReady, 100);
				}
			}


			jQuery(window).load(function() {

				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				fireWhenReady();
				if (vfuel.getURLParameter2('tab') == "add") {
                                    jQuery("#myTabs").tabs("option", "active", 1);
                                }
				jQuery("#back_btn").click(function() {
					jQuery("#banner-content-html").click();
					jQuery('#edit_viewport').css('display', 'block');
					jQuery('#edit_banner_viewport').css('display', 'none');
				});
				
				jQuery("#submitSearch").click(function() {
					vfuel.admin.bannerareaList(jQuery('#vendorfuel-search').serialize());
				});

				jQuery("#remove_btn").click(function() {
					jQuery("#banner-content-html").click();
					vfuel.admin.removeBanner(jQuery(".banner_id").prop("id").substr(6))
					vfuel.admin.viewBannerarea(jQuery(".area_id").prop("id").substr(6));
					jQuery('#edit_viewport').css('display', 'block');
					jQuery('#edit_banner_viewport').css('display', 'none');
				});

				jQuery(".saveBanner").click(function() {
					jQuery("#banner-content-html").click();
					jQuery('#edit_viewport').css('display', 'block');
					jQuery('#edit_banner_viewport').css('display', 'none');
					if (jQuery(".banner_id").length > 0) {
						vfuel.admin.addBanner(jQuery(".banner_id").prop("id").substr(6), jQuery("#price_sheet_id").val(), jQuery("#group_id").val(), jQuery("#description_inContent").val(), vfuel.urlencode(vfuel.htmlspecialchars(jQuery("#banner-content").val())), jQuery(".area_id").prop("id").substr(6))
						vfuel.admin.viewBannerarea(jQuery(".area_id").prop("id").substr(6));
					} else {
						vfuel.admin.addBanner("", jQuery("#price_sheet_id").val(), jQuery("#group_id").val(), jQuery("#description_inContent").val(), vfuel.urlencode(vfuel.htmlspecialchars(jQuery("#banner-content").val())), jQuery(".area_id_new").prop("id").substr(4))
						vfuel.admin.viewBannerarea(jQuery(".area_id_new").prop("id").substr(4));

					}

				});

			});
		</script>
	</div>
	<div id="addBannerarea">
		<form action="#" method="post" name="search" id="banner_area_form_new" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Name:</td><td>
					<input name="name" type="text" id="name_new" style="width:250px;" />
					</td>
				</tr>

				<tr>
					<td>Description:</td><td>
					<input name="description" type="text" id="description_new" style="width:250px;" />
					</td>
				</tr>

				<tr>
					<td>
					<input name="submit" type="submit" id="submitArea_new" value="Save Banner Area" />
					</td>
				</tr>
			</table>
		</form>
	</div>

	<script>
		jQuery(document).ready(function() {

			jQuery("#submitArea_new").button();

			jQuery("#submitRule").click(function() {
				vfuel.admin.addShippingrules(jQuery('#shipping_rules_form').serialize());
			});
			jQuery("#submitArea_new").click(function() {
				vfuel.admin.addBannerarea(jQuery('#banner_area_form_new').serialize());
			});
		});

	</script>
</div>