<div id="myTabs">
	<ul>
		<li>
			<a href="#listUser">Search</a>
		</li>
		<li>
			<a href='#addUser'>Add</a>
		</li>
	</ul>
	<div id="listUser">
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
			<form action="#" method="post" name="search" class="checkAgainstCurrent" id="add_user" enctype="multipart/form-data" onsubmit="return false">
				<table>
					<tr>
						<td>ID:</td><td>
						<input name="user_id" type="text" id="user_id" style="width:300px;" readonly />
						</td>
					</tr>
					<tr>
						<td>Date Created:</td><td><div id='date_created'></div></td>
					</tr>
					<tr>
						<td>Last Login:</td><td><div id='last_login'></div></td>
					</tr>
					<tr>
						<td>Name:</td><td>
						<input name="name" type="text" id="name" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Email:</td><td>
						<input name="email" type="text" id="email" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td>Password:</td><td>
						<input name="password" type="text" id="password" style="width:300px;" />
						</td>
					</tr>
					<tr>
						<td align="left" nowrap="nowrap" class="dbtext">
						<input name="active" type="checkbox" class="ck_btn" id="active" value="1" />
						<label for="active">Active</label></td>
					</tr>
					<tr>
						<td>
						<input name="submit" type="submit" id="submitUser" value="Save User" />
						</td>
					</tr>
				</table>
			</form>

		</div>

		<script>
			jQuery(document).ready(function() {
				jQuery("#myTabs").tabs();
				jQuery("#submitSearch").button()
				if (vfuel.getURLParameter2('tab') == "add") {
					jQuery("#myTabs").tabs("option", "active", 1);
				}
				jQuery("#submitSearch").click(function() {
					vfuel.admin.userList(jQuery('#vendorfuel-search').serialize());
				});
			});
		</script>
	</div>
	<div id="addUser">
		<form action="#" method="post" name="search" id="add_user_new" class="checkAgainstCurrentNew" enctype="multipart/form-data" onsubmit="return false">
			<table>
				<tr>
					<td>Name:</td><td>
					<input name="name" type="text" id="name_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Email:</td><td>
					<input name="email" type="text" id="email_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Password:</td><td>
					<input name="password" type="text" id="password_new" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="active" type="checkbox" class="ck_btn" id="active_new" value="1" />
					<label for="active_new">Active</label></td>
				</tr>
				<tr>
					<td>
					<input name="submit" type="submit" id="submitNewUser" value="Save User" />
					</td>
				</tr>
			</table>
		</form>

		<script>
			jQuery(document).ready(function() {
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
				function fireWhenReady() {
					if ( typeof vfuel.admin != 'undefined') {
						vfuel.admin.preventUnsavedRedirectNew();
						vfuel.admin.advancedSearch('AdminUsers');
					} else {
						setTimeout(fireWhenReady, 100);
					}
				}
				
				fireWhenReady();

				jQuery("#submitUser").button();
				jQuery("#submitNewUser").button();

				jQuery("#submitUser").click(function() {
					
                                    if (jQuery('#password').val() == '') {
                                        console.log(jQuery('#add_user').find('input[name!=password], select').serialize());
                                        vfuel.admin.addUser(jQuery('#add_user').find('input[name!=password], select').serialize());
                                    } else {
                                        vfuel.admin.addUser(jQuery('#add_user').serialize());
                                    }
				});
                                
				jQuery("#submitNewUser").click(function() {
					vfuel.admin.addUser(jQuery('#add_user_new').serialize());
				});
			});
		</script>
	</div>
