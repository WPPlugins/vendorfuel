<div id="myTabs">
	<ul>
		<li>
			<a href="#listImages">Search</a>
		</li>
		<li>
			<a href='#uploadImages'>Upload</a>
		</li>
	</ul>
	<div id="listImages">
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
			<div id="imageDisplay"></div>
		</div>

		<script>
            jQuery(document).ready(function() {

                function fireWhenReady() {
                    if ( typeof vfuel.admin != 'undefined') {
                        vfuel.admin.advancedSearch('Images');

                    } else {
                        setTimeout(fireWhenReady, 100);
                    }
                }
				
				fireWhenReady();	

                jQuery("#myTabs").tabs()

                if (vfuel.getURLParameter2('tab') == "upload") {
                    jQuery("#myTabs").tabs("option", "active", 1);
                }

                jQuery("#submitSearch").button();
                jQuery("#submitSearch").click(function() {
                    vfuel.admin.imagesList(jQuery('#vendorfuel-search').serialize());

                });
            });
		</script>
	</div>
	<div id="uploadImages">

		<div class="holder" id="holder1"></div>
		<script>
            jQuery(document).ready(function() {
                jQuery(window).load(function() {
                    vfuel.admin.dragAndDrop("image");
                });
            });
		</script>

	</div>
