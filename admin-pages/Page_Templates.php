


<div id="tabs">

	<div style="padding:10px;">
		Template: <select id="selTemplate"></select>
	</div>

	<ul>
		<li><a id="contentTab" href="#tabs-content">Content</a></li>
		<li><a id="javascriptTab" href="#tabs-js">Javascript</a></li>
	</ul>

	<div style="padding:10px;">
		Template Name: <input id="templateName"/>
	</div>

	<div id="tabs-content">
		<div style="height:500px; width:1000px;" id="content_editor">
		</div>
	</div>
	
	<div id="tabs-js">
		<div style="height:500px; width:1000px;" id="js_editor">
		</div>
	</div>

	<div style="width:1000px; height:80px;">	
		<div id="deleteTemplate">Delete Template</div>
		<div id="extendTemplate">Extend Template</div>
		<select id="bannerAreas"><option value="">Select Banner Area</option></select>
		<div id="insertBanner">Insert Banner Area</div>
		<div id="resetTemplate" style="display:none;">Reset Template</div>
		<div style="float:right;" id="saveTemplate">Save Template</div>
	</div>
</div>



<script>


    jQuery(document).ready(function() {

    	var content_editor = ace.edit("content_editor");
		content_editor.setTheme("ace/theme/monokai");
		content_editor.getSession().setMode("ace/mode/html");
		content_editor.setShowPrintMargin(false);

		var js_editor = ace.edit("js_editor");
		js_editor.setTheme("ace/theme/monokai");
		js_editor.getSession().setMode("ace/mode/javascript");
		js_editor.setShowPrintMargin(false);

    	fireWhenReady();
    	jQuery('#tabs').tabs();
    	jQuery('#saveTemplate').button();
    	jQuery('#deleteTemplate').button();
    	jQuery('#extendTemplate').button();
    	jQuery('#insertBanner').button();
    	jQuery('#resetTemplate').button();

    	jQuery('#saveTemplate').click(function(){
    		content_editor.resize();
	    	js_editor.resize();

	    	if(jQuery('#selTemplate').val()=="new"){
	    		vfuel.admin.addTemplate(encodeURIComponent(content_editor.getValue()),encodeURIComponent(js_editor.getValue()));
	    	}else{	
	    		vfuel.admin.modifyTemplate(encodeURIComponent(content_editor.getValue()),encodeURIComponent(js_editor.getValue()));
	    	}
    	});

    	jQuery('#extendTemplate').click(function(){
    		content_editor.resize();
	    	js_editor.resize();
    		vfuel.admin.extendTemplate(encodeURIComponent(content_editor.getValue()),encodeURIComponent(js_editor.getValue()),jQuery('#selTemplate').val());
    	});

    	jQuery('#resetTemplate').click(function(){
    		vfuel.admin.resetTemplate();
    	});

    	jQuery('#deleteTemplate').click(function(){
    		vfuel.admin.removeTemplate();
    	});

    	jQuery('#contentTab').click(function(){
    		content_editor.resize();
    		jQuery('#insertBanner').css("display","inline-block");
    		jQuery('#bannerAreas').css("display","inline-block");
    	});

    	jQuery('#javascriptTab').click(function(){
    		js_editor.resize();
    		jQuery('#insertBanner').css("display","none");
    		jQuery('#bannerAreas').css("display","none");
    	});
    });


    function fireWhenReady() {
        if ( typeof vfuel.admin != 'undefined') {
            vfuel.admin.viewTemplates();
            vfuel.admin.selectBannerAreas();
        } else {
            setTimeout(fireWhenReady, 100);
        }
    }

</script>