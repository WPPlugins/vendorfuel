<div class='column' style="width:1000px;">

    <div class="portlet" id="default">
            <div class="portlet-header">
                    <a href="#" class="img-link"> <span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span> <span class="link-text">Mode</span> </a>
            </div>
            <div class="portlet-content">
                <form action="#" method="post" name="search" id="email-mode" enctype="multipart/form-data" onsubmit="return false">
                    <input type="radio" name="mode" id="default" value="default"> Default<br>
                    <input type="radio" name="mode" id="vf" value="vf"> VendorFuel<br>
                    <input type="radio" name="mode" id="smtp" value="smtp"> SMTP<br>
                    <input type="text" name="credentials[mail_host]" id="mail_host" value="" placeholder="Host"> <br>
                    <input type="text" name="credentials[mail_user]" id="mail_user" value="" palceholder="Username"> <br>
                    <input type="password" name="credentials[mail_pass]" id="mail_pass" value="" palceholder="Password"> <br>
                    
                        
                    <input name="submit" type="submit" id="saveMode" value="Save" />
                </form>
            </div>
    </div>
    
    <div class="portlet" id="vf-Email">
	<div class="portlet-header">
		<a href="admin.php?page=vendorfuel-email" class="img-link"> <span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span> <span class="link-text">Email</span> </a>
	</div>
	<div class="portlet-content">
			<ul><span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Email_Templates&tab=registration">Registration</a></ul>
			<ul><span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Email_Templates&tab=checkout">Checkout</a></ul>
			<ul><span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Email_Templates&tab=shipment">Shipment</a></ul>
			<ul><span class="ui-icon ui-icon-mail-closed" style="float:left; display:inline-block;"></span><a href="admin.php?page=vendorfuel-Email_Templates&tab=rma">RMA Email</a></ul>
	</div>
    </div>
</div>

<script>
    
                function fireWhenReady() {
                            if ( typeof vfuel.admin != 'undefined') {
                            vfuel.admin.getEmailMode();
                            } else {
                                    setTimeout(fireWhenReady, 100);
                            }
                    }
                    
                    jQuery(document).ready(function() {
                            fireWhenReady();  
                        });
                        
                    jQuery('#saveMode').on("click", function(){
                            vfuel.admin.setEmailMode(jQuery('#email-mode').serialize());
                   });
                   
                    jQuery("#saveMode").button();
    
                            
                jQuery(".portlet").css('width','200px');
                jQuery(".portlet").css('height','200px');
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
