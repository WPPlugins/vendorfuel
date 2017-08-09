<div class='column' style="width:1000px;">

    <div class="portlet" id="vf-PageTemplates">
	<div class="portlet-header">
		<a href="admin.php?page=vendorfuel-Page_Templates" class="img-link"> <span class="ui-icon ui-icon-document" style="float:left; display:inline-block;"></span> <span class="link-text">Templates</span> </a>
	</div>
	<div class="portlet-content">
		<ul><span class="ui-icon ui-icon-script" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Page_Templates">Manage Templates</a></ul>
		<ul><span class="ui-icon ui-icon-suitcase" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Template_Collections">Template Collections</a></ul>
                <ul><span class="ui-icon ui-icon-folder-collapsed" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Map_Template_Keys">Map Template Keys</a></ul>
		<ul><span class="ui-icon ui-icon-refresh" style="float:left; display:inline-block;"></span><a id="clearTemplateCache" href="#">Clear Template Cache</a></ul>
	</div>
</div>

</div>

<script>
                jQuery(".portlet").css('width','200px');
                jQuery(".portlet").css('height','200px');
                jQuery(".portlet").css('float','left');
                jQuery(".portlet").css('margin-left','5px');

		jQuery(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all").find(".portlet-header").addClass("ui-widget-header ui-corner-all").end().find(".portlet-content");

		jQuery(".portlet-header .ui-icon").click(function() {
			jQuery(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-plusthick");
			jQuery(this).parents(".portlet:first").find(".portlet-content").toggle();
		});

		jQuery('#clearTemplateCache').click(function(){
			vfuel.admin.clearTemplateCache();
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
