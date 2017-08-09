<div class='column'>
<div class="portlet" id="Users">
	<div class="portlet-header">
		<a href="admin.php?page=vendorfuel-Users" class="img-link"> <span class="ui-icon ui-icon-person" style="float:left; display:inline-block;"></span> <span class="link-text">Users</span> </a>
	</div>
	<div class="portlet-content">
		<ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Users">Search</a></ul>
		<ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Users&tab=add">Add</a></ul>
		<ul><span class="ui-icon ui-icon-arrowthick-1-n" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Users&tab=upload">Upload</a></ul>
		<ul><span class="ui-icon ui-icon-bookmark" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Users&tab=batches">Batches</a></ul>
	</div>
</div>

<div class="portlet" id="Groups">
	<div class="portlet-header">
		<a href="admin.php?page=vendorfuel-Groups" class="img-link"> <span class="ui-icon ui-icon-person" style="float:left; display:inline-block;"></span> <span class="link-text">Groups</span> </a>
	</div>
	<div class="portlet-content">
		
		<ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Groups">Search</a></ul>
		<ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Groups&tab=add">Add</a></ul>
		<ul><span class="ui-icon ui-icon-arrowthick-1-n" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Groups&tab=upload">Upload</a></ul>
		<ul><span class="ui-icon ui-icon-bookmark" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Groups&tab=batches">Batches</a></ul>
	</div>
</div>
</div>

<script>
                jQuery(".portlet").css('width','200px');
                jQuery(".portlet").css('float','left');
                jQuery(".portlet").css('margin-left','5px');

		jQuery(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all").find(".portlet-header").addClass("ui-widget-header ui-corner-all").end().find(".portlet-content");

		jQuery(".portlet-header .ui-icon").click(function() {
			jQuery(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
			jQuery(this).parents(".portlet:first").find(".portlet-content").toggle();
		});

		jQuery(".column").disableSelection();

		jQuery('.portlet').mouseup(function() {
			var strLayout = "";

			setTimeout(function() {

				jQuery('.column').each(function(i, obj) {
					jQuery(obj).children().each(function(j, child) {
						strLayout += jQuery(child).prop("id") + ',';
					});
					strLayout += "cc,";
				});
				strLayout = strLayout.substring(0, strLayout.length - 4);
				console.log(strLayout);
				jQuery.cookie("overviewGrid", strLayout, {
					path : '/',
					expires : 10000
				});
			}, 500);
		});
</script>
