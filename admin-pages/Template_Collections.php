<div id="myTabs">
	<ul>
		<li>
			<a href="#listTemplatecollections">Template Collections</a>
		</li>
		
	</ul>
	<div id="listTemplatecollections">

		<div>
			Template Collection: <select id="selTemplateCollection"></select>
		</div>

		<form action="#" method="post" name="search" id="templatecollections_form_new" enctype="multipart/form-data" onsubmit="return false">
				
			Collection Name: 
			<input style="margin-top:30px;" name="name" type="text" id="templateCollectionName" />
			
			<br/>

			<div class="hiddenNewCollection" style="display:none; margin-top:10px; margin-bottom:15px;">
				Templates in Collection:
				<select multiple="multiple" style="width: 250px;" class="select_template multiselect" id="selTemplate"></select>
				
			</div>	
					
			<br/>

			<input class="hiddenNewCollection" style="display:none;" type="submit" id="deleteCollection" value="Delete Collection" />

			<input class="hiddenNewCollection" style="display:none;" type="submit" id="importCollection" value="Import Collection" />

			<input name="submit" type="submit" id="submitCollection_new" value="Save Collection" />
		</form>

	</div>


<script>
    jQuery(document).ready(function() {
    	fireWhenReady();
    	jQuery("#myTabs").tabs();
    	jQuery("#importCollection").button();
    	jQuery("#deleteCollection").button();
    	jQuery("#submitCollection_new").button();
    	

    	jQuery("#addToCollection").click(function(){
    		vfuel.admin.addTemplateToCollection(jQuery('#selTemplate').val(),jQuery('#selTemplateCollection').val());
    	});

    	jQuery("#deleteCollection").click(function(){
    		vfuel.admin.removeTemplateCollections(jQuery('#selTemplateCollection').val());
    	});

    	jQuery("#submitCollection_new").click(function(){	
    		if(jQuery("#selTemplateCollection").val()=="new"){
    			vfuel.admin.addTemplateCollections(jQuery('#templatecollections_form_new').serialize());
    		}else{
    			vfuel.admin.modifyTemplateCollection(jQuery("#selTemplateCollection").val());
    		}
    	});

    	jQuery("#importCollection").click(function(){
    		vfuel.admin.importTemplateCollection(jQuery("#selTemplateCollection").val());
    	});

    });

	function fireWhenReady() {
        if ( typeof vfuel.admin != 'undefined') {
            vfuel.admin.listTemplateCollections();
            vfuel.admin.populateTemplateSelect();
        } else {
            setTimeout(fireWhenReady, 100);
        }
    }

</script>    