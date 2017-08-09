<div id="myTabs">
	<ul>
		<li>
			<a href="#listReviews">Search</a>
		</li>
		<li>
			<a href="#addReviews">Add</a>
		</li>
	</ul>
	<div id="listReviews">
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
			<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_productreview" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>Review ID:</td><td>
							<input name="review_id" type="text" id="review_id" style="width:300px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Parent Review ID:</td>
						<td>
							<input name="parent_review_id" type="text" id="parent_review_id" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Product ID:</td>
						<td>
							<input name="product_id" type="text" id="product_id" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Customer ID:</td>
						<td>
							<input name="customer_id" type="text" id="customer_id" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Review Date:</td>
						<td>
							<input name="review_date" type="text" id="review_date" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Last Update:</td>
						<td>
							<input name="last_update" type="text" id="last_update" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Status:</td>
						<td>
							<select id="status" name="status" style="width:300px;">
								<option value="pending">Pending</option>
								<option value="approved">Approved</option>
								<option value="deleted">Deleted</option>
							</select></td>
					</tr>
					<tr>
						<td>Rating:</td>
						<td>
							<input name="rating" type="text" id="rating" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Display Name:</td>
						<td>
							<input name="display_name" type="text" id="display_name" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>
							<input name="email" type="text" id="email" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Title:</td>
						<td>
							<input name="title" type="text" id="title" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Content:</td>
						<td>						<textarea name="content" type="text" id="content" style="width:300px;" ></textarea></td>
					</tr>
					<tr>
						<td>Helpfulness:</td>
						<td>						<textarea name="helpfulness" type="text" id="helpfulness" style="width:300px;" ></textarea></td>
					</tr>
					<tr>
						<td>
							<input name="submit" type="submit" id="submitReview" value="Update Review" />
						</td>
						<td>
							<input name="approve" type="submit" id="approveReview" value="Approve Review" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div id="addReviews">
		<br/>


		<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_productreview_new" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Parent Review ID:</td>
					<td>
						<input name="parent_review_id" type="text" id="parent_review_id_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Product ID:</td>
					<td>
						<input name="product_id" type="text" id="product_id_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Customer ID:</td>
					<td>
						<input name="customer_id" type="text" id="customer_id_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Review Date:</td>
					<td>
						<input name="review_date" type="text" id="review_date_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Last Update:</td>
					<td>
						<input name="last_update" type="text" id="last_update_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Status:</td>
					<td>
						<select id="status_new" name="status" style="width:300px;">
							<option value="pending">Pending</option>
							<option value="approved">Approved</option>
							<option value="deleted">Deleted</option>
						</select></td>
				</tr>
				<tr>
					<td>Rating:</td>
					<td>
						<input name="rating" type="text" id="rating_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Display Name:</td>
					<td>
						<input name="display_name" type="text" id="display_name_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>
						<input name="email" type="text" id="email_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Title:</td>
					<td>
						<input name="title" type="text" id="title_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Content:</td>
					<td>						<textarea name="content" type="text" id="content_new" style="width:300px;" ></textarea></td>
				</tr>
				<tr>
					<td>Helpfulness:</td>
					<td>						<textarea name="helpfulness" type="text" id="helpfulness_new" style="width:300px;" ></textarea></td>
				</tr>
				<tr>
					<td>
						<input name="submit" type="submit" id="submitReview_new" value="Save Review" />
					</td>

				</tr>
			</table>
		</form>


		<script>
			jQuery(document).ready(function () {
				fireWhenReady();
				jQuery("#submitReview").button();
				jQuery("#submitReview_new").button();


				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button();
				jQuery("#approveReview").button();

				jQuery("#submitSearch").click(function () {
					vfuel.admin.productreviewList(jQuery('#vendorfuel-search').serialize());
				});
			});

			jQuery("#submitReview").click(function () {
				vfuel.admin.addProductreview(jQuery('#add_productreview').serialize());
			});

			jQuery("#submitReview_new").click(function () {
				vfuel.admin.addProductreview(jQuery('#add_productreview_new').serialize());
			});

			function fireWhenReady() {
				if (typeof vfuel.admin != 'undefined') {
					vfuel.admin.advancedSearch('ProductReviews');
					vfuel.admin.preventUnsavedRedirectNew();

				} else {
					setTimeout(fireWhenReady, 100);
				}
			}

		</script>
	</div>

</div>