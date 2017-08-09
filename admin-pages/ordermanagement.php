<div id="myTabs">
	<ul>
		<li>
			<a href="#orderOverview">Overview</a>
		</li>
		<li>
			<a href="#listOrders">Search</a>
		</li>
		<li>
			<a href="#orderImport">Import</a>
		</li>
		<li>
			<a href="#orderRMA">RMA</a>
		</li>
		<li>
			<a href="#orderShipping">Shipping</a>
		</li>
		<li>
			<a href="#orderTracking">Tracking</a>
		</li>
	</ul>
	<div id="orderOverview">

	</div>

	<div id="listOrders">
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
				<!--
				<tr>
				<td>Status: </td>
				<td>
				<select name="status" id="order_status">
				<option value="completed">Completed</option>
				<option value="pending">Pending</option>
				<option value="any">Any</option>
				</select>-->
				</td>
				</tr>
			</table>
		</form>

		<div id="list_viewport"></div>
		<div id="edit_viewport" style="display:none;">
			
		</div>

		<script>
            jQuery(document).ready(function() {
                jQuery('#submitSearch').button();
                jQuery("#myTabs").tabs();
                jQuery("#submitSearch").click(function() {
                    vfuel.admin.orderList(jQuery('#vendorfuel-search').serialize());
                });

                jQuery("#order_status").change(function() {
                    vfuel.admin.orderList(jQuery('#vendorfuel-search').serialize());
                });

            });
		</script>
	</div>
	<div id="orderImport">

	</div>
	<div id="orderRMA">

	</div>
	<div id="orderShipping">

	</div>
	<div id="orderTracking">

	</div>
</div>

