<div id="myTabs">
	<ul>
		<li>
			<a href="#listJpm">Search</a>
		</li>
		<li>
			<a href='#addJpm'>Add</a>
		</li>
	</ul>
	<div id="listJpm">
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

		<script>
            jQuery(document).ready(function() {
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").button();
                if (vfuel.getURLParameter2('tab') == "add") {
                jQuery("#myTabs").tabs("option", "active", 1);
            }
                jQuery("#submitSearch").click(function() {
                    vfuel.admin.jpmuserList(jQuery('#vendorfuel-search').serialize());
                });
            });
		</script>
	</div>
	<div id="addJpm">

		<script>
            

		</script>
	</div>
