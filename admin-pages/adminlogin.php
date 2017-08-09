<?php
if(!$this->logged_in){
?><div id="adminlogin">
		<?php
		//<form action="#" method="post" name="loginform" id="loginForm" enctype="multipart/form-data" onsubmit="return false">
		?>
		<form action="<?php print $_SERVER["REQUEST_URI"]; ?>" method="post" name="loginform" id="loginForm" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Email:</td><td>
					<input name="email" type="text" id="email" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td>Password:</td><td>
					<input name="password" type="password" id="password" style="width:300px;" />
					</td>
				</tr>
				<tr>
					<td align="left" nowrap="nowrap" class="dbtext">
					<input name="save" type="checkbox" class="ck_btn" id="save" value="1" />
					<label for="save">Save Login</label></td>
				</tr>
				<tr>
					<td><input type="hidden" name="vendorfuel_admin_login" value="true" />
					<input name="submit" type="submit" id="submitLogin" value="Login" />
					</td>
				</tr>
			</table>
		</form>
		<?php 
		/*
		<script>
		jQuery(document).ready(function() {
			var $form1 = jQuery('#loginForm');
			$form1.live('submit', function() {
				$.post(jQuery(this).attr('action'), jQuery(this).serialize(), function(response) {
				}, 'json');
				vfuel.admin.showNotification("Login sent");
				return false;
			});
		});
	</script>
		 * 
		 */
		 ?>
</div>
<script>
    jQuery("#submitLogin").button();    
</script>
<?php
}
else{
	?>
	<h2>You have been logged in</h2><p>If you are not redirected in 3 seconds <a href="<?php print $_SERVER['REQUEST_URI']; ?>">Click Here</a></p>
	<script>
		setTimeout(
			function(){
				window.location.href='<?php print $_SERVER['REQUEST_URI'];?>';
			},
			3000
		);
	</script>
	<?php
}
?>
