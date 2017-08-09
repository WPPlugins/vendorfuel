<div id="myTabs">
	<ul>
		<li>
			<a href="#listShippingRules">Search</a>
		</li>
		<li>
			<a href='#addShippingRules'>Add</a>
		</li>
	</ul>
	<div id="listShippingRules">
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
			<form action="#" method="post" name="search" id="shipping_zones_form" enctype="multipart/form-data" onsubmit="return false">
				<table>

					<tr>
						<td>Zone ID:</td><td>
							<input name="zone_id" type="text" id="zone_id" style="width:250px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Name:</td><td>
							<input name="name" type="text" id="name" style="width:250px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">Country:</td>
						<td align="left" nowrap="nowrap" class="dbtext">
							<select name="country_id" multiple="multiple" class="select_country multiselect" id="country_id1">
							</select></td>
					</tr>

					<tr><td></td><td><div id="countries_selected"></div></td></tr>

<!--					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
							<input name="enabled" type="checkbox" class="ck_btn" id="enabled" value="1" />
							<label style="width:150px;" for="enabled">Enabled</label></td>
					</tr>-->
					<tr>
						<td>
							<input name="submit" type="submit" id="submitZone" value="Save Zone" />
						</td>
					</tr>
				</table>
			</form>

		</div>

	</div>
	<div id="addShippingRules">
		<form action="#" method="post" name="search" id="shipping_zones_form_new" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Name:</td><td>
						<input name="name" type="text" id="name_new" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">Country:</td>
					<td align="left" nowrap="nowrap" class="dbtext">
						<select name="country_id" multiple="multiple" class="select_country multiselect" id="country_id_new1">
						</select></td>
				</tr>
				<tr><td></td><td><div id="countries_selected_new"></div></td></tr>

				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
						<input name="enabled" type="checkbox" class="ck_btn" id="enabled_new" value="1" />
						<label style="width:150px;" for="enabled_new">Enabled</label></td>
				</tr>
				<tr>
					<td>
						<input name="submit" type="submit" id="submitZone_new" value="Save Zone" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	<script>

		function fireWhenReady() {
			if (typeof vfuel.admin != 'undefined') {
				vfuel.admin.countryOptions("multi", function () {
					jQuery('#country_id_new1').multiselect("refresh");
					vfuel.admin.preventUnsavedRedirectNew();
				});
				jQuery("#country_id1").multiselect();
			} else {
				setTimeout(fireWhenReady, 100);
			}
		}

		jQuery(document).ready(function () {
			fireWhenReady();
			var countryIdList = [];
			jQuery("#submitZone").button();
			jQuery("#submitZone_new").button();
			jQuery("#myTabs").tabs();
			jQuery("#submitSearch").button();
			jQuery('#country_id_new1').multiselect();

			if (vfuel.getURLParameter2('tab') == "add") {
				jQuery("#myTabs").tabs("option", "active", 1);
			}

			jQuery(".ck_btn").button({
				icons: {
					primary: 'ui-icon-closethick'
				}
			}).change(function () {
				jQuery(this).button("option", {
					icons: {
						primary: this.checked ? 'ui-icon-check' : 'ui-icon-closethick'
					}
				});
			});

			jQuery("#country_id_new1").change(function () {

				var diff = jQuery(countryIdList).not(jQuery(this).val()).get();

				if (diff != '') {
					console.log("diff" + diff);
					jQuery('#rmnS' + diff).remove();
				}

				countryIdList = jQuery(this).val();
				jQuery.each(jQuery(this).val(), function (index, data) {
					if (!jQuery("#country_" + data + "_new1").length) {
						vfuel.admin.stateOptions(data);
					}
				});
			});

			jQuery("#country_id1").change(function () {

				var diff = jQuery(countryIdList).not(jQuery(this).val()).get();

				if (diff != '') {
					console.log("diff" + diff);
					jQuery('#rmlS' + diff).remove();
				}

				countryIdList = jQuery(this).val();
				jQuery.each(jQuery(this).val(), function (index, data) {
					if (!jQuery("#country_" + data + "_new").length) {
						vfuel.admin.stateOptions(data);
					}
				});

			});

			jQuery("#submitSearch").click(function () {
				vfuel.admin.shippingzonesList(jQuery('#vendorfuel-search').serialize());
			});

			jQuery("#submitZone").click(function () {
				var countriesArray = jQuery('#country_id1').val();
				var countriesString = '';
				var statesString = '&states=';
				var nameString = "name=" + jQuery('#name').val() +
					"&zone_id=" + jQuery('#zone_id').val();
				countriesString += '&countries=' + countriesArray;

				jQuery('.select_states').each(function (index) {
					var statesArray = jQuery(this).val();
					if (statesArray != null) {
						statesString += statesArray + ',';
					}
				});

				vfuel.admin.addShippingzones(nameString, countriesString, statesString);

			});
			jQuery("#submitZone_new").click(function () {
				var countriesArray = jQuery('#country_id_new1').val();
				var countriesString = '';
				var statesString = '&states=';
				var nameString = "name=" + jQuery('#name_new').val();
				countriesString += '&countries=' + countriesArray;

				jQuery('.select_states_new').each(function (index) {
					var statesArray = jQuery(this).val();
					if (statesArray != null) {
						statesString += statesArray + ',';
					}
				});
				statesString = statesString.slice(0, -1);

				vfuel.admin.addShippingzones(nameString, countriesString, statesString);

			});

		});
	</script>
