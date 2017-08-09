<div class='column'>
    <div class="portlet" id="Interfaces">
            <div class="portlet-header">
                    <a href="admin.php?page=vendorfuel-Interfaces" class="img-link"> <span class="ui-icon ui-icon-wrench" style="float:left; display:inline-block;"></span> <span class="link-text">Interfaces</span> </a>
            </div>
            <div class="portlet-content">
                    <ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Interfaces">Search</a></ul>
                    <ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Interfaces&tab=add">Add</a></ul>
            </div>
    </div>

    <div class="portlet" id="Interfacelogs">
            <div class="portlet-header">
                    <a href="admin.php?page=vendorfuel-Interface_Logs" class="img-link"> <span class="ui-icon ui-icon-clipboard" style="float:left; display:inline-block;"></span> <span class="link-text">Interface Logs</span> </a>
            </div>
            <div class="portlet-content">
                    <ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Interface_Logs">Search</a></ul>
                    <ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Interface_Logs&tab=add">Add</a></ul>
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