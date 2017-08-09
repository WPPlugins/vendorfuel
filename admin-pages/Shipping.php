<div class='column'>
    <div class="portlet" id="default">
            <div class="portlet-header">
                    <a href="#" class="img-link"> <span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span> <span class="link-text">Mode</span> </a>
            </div>
            <div class="portlet-content">
                <form action="#" method="post" name="search" id="shipping-mode" enctype="multipart/form-data" onsubmit="return false">
                    <input type="radio" name="mode" id="free" value="free"> Free<br>
                    <input type="radio" name="mode" id="method" value="method"> Methods<br>
                    <input type="radio" name="mode" id="parcel" value="parcel"> Parcels <br>
                    <input name="submit" type="submit" id="saveMode" value="Save" />
                </form>
            </div>
    </div>

    <div class="portlet" id="methods">
            <div class="portlet-header">
                    <a href="admin.php?page=vendorfuel-Shipping_Methods" class="img-link"> <span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span> <span class="link-text">Methods</span> </a>
            </div>
            <div class="portlet-content">
                    <ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Shipping_Methods">Search</a></ul>
                    <ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Shipping_Methods&tab=add">Add</a></ul>
            </div>
    </div>


    <div class="portlet" id="rules">
            <div class="portlet-header">
                    <a href="admin.php?page=vendorfuel-Shipping_Rules" class="img-link"> <span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span> <span class="link-text">Rules</span> </a>
            </div>
            <div class="portlet-content">
                    <ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Shipping_Rules">Search</a></ul>
                    <ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Shipping_Rules&tab=add">Add</a></ul>
            </div>
    </div>

    <div class="portlet" id="parcels">
            <div class="portlet-header">
                    <a href="admin.php?page=vendorfuel-Parcels" class="img-link"> <span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span> <span class="link-text">Parcels</span> </a>
            </div>
            <div class="portlet-content">
                    <ul><span class="ui-icon ui-icon-search" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Parcels">Search</a></ul>
                    <ul><span class="ui-icon ui-icon-plus" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Parcels&tab=add">Add</a></ul>
                    <ul><span class="ui-icon ui-icon-gear" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Parcels&tab=gateways">Gateways</a></ul>
                    <ul><span class="ui-icon ui-icon-home" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Parcels&tab=warehouse">Set Warehouse Location</a></ul>
            </div>
    </div>
</div>


<script>
                function fireWhenReady() {
				if ( typeof vfuel.admin != 'undefined') {
                    		vfuel.admin.getShippingMode();
				} else {
					setTimeout(fireWhenReady, 100);
				}
			}
			
			jQuery(document).ready(function() {
				fireWhenReady();  
                            });
                            
            jQuery('#saveMode').on("click", function(){
                    vfuel.admin.setShippingMode(jQuery('#shipping-mode').serialize());
           });
    
            jQuery("#saveMode").button();
            jQuery(".portlet").css('width','200px');
            jQuery(".portlet").css('height','200px');
            jQuery(".portlet").css('float','left');
            jQuery(".portlet").css('margin-left','5px');

		jQuery(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all").find(".portlet-header").addClass("ui-widget-header ui-corner-all").end().find(".portlet-content");

		jQuery(".portlet-header .ui-icon").click(function() {
			jQuery(this).toggleClass("ui-icon-minusthick").toggleClass("ui-icon-mail-closed");
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
