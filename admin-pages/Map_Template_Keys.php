<?php
if (isset($_POST['vendorfuel-pages'])) {
    $pp =  $_POST['vendorfuel-pages'];
    ksort($pp);
    $vf_page_update = array();
    $i = 1;
    foreach ($pp as $page => $val)
    {
        $vf_page_update[$page] = array('id' => $i, 'url' => $val[0]);
        $i++;
    }
	update_option("vendorfuel-pages", $vf_page_update);
}

if (isset($_POST['customPages'])) {
    $cp = $_POST['customPages'];
    ksort($cp);
    update_option("custom-pages", $cp);
}

$vf_pages = get_option('vendorfuel-pages');
$custom_pages = get_option('custom-pages');

$wp_pages = array();
                        $pages = get_pages();
                        for($i = 0;$i < count($pages); $i++) {
                                $wp_pages[$i] = get_permalink($pages[$i]);
                            }    
?>
<script>
    jQuery(document).ready(function() {
        jQuery("#myTabs").tabs();
        jQuery("#submitSaveMap").button();
        jQuery("#addKey").button();
        jQuery("#addPage").button();
        jQuery("#removePage").button();
        jQuery('button[name^=removeKey]').button();
        jQuery('button[name^=editKey]').button();
    }); 
</script>

<div id="myTabs">
	<ul>
		<li><a href="#general">Map Template Keys</a></li>
	</ul>
	<div id="map">
	    <form id="mapForm" method="post" action="#"> 
	        <table class="widefat form-table" id="mapTable">
	            <thead>
	                <tr>
	                    <th>Key</th>
	                    <th>Page</th>
                            <th></th>
	                </tr>
	            </thead>
	            <tbody id="mapBody">                        
	                <?php
                        $k = 0;
	                    foreach ($vf_pages as $key => $attr){
	                ?>
	                <tr valign="top" class="vendorfuel-pages-<?php print $key; ?>" id="row<?php echo $k ?>" >
                            <td id="key<?php echo $k ?>" name="key<?php echo $k ?>"><?php print $key; ?></td>
                                        <td>
                                            <select name="vendorfuel-pages[<?php print $key; ?>][]" id="page_options<?php echo $k ?>">
                                                <optgroup label="Custom Pages" name="groupCustomPages">
                                             <?php
	                    for($i = 0; $i < count($custom_pages); $i++){
	                ?>
                                     <option value="<?php print $custom_pages[$i]; ?>"
                                                    <?php
                                                    if($custom_pages[$i] == $attr[url]){ echo 'selected';}
                                                    ?>
                                                    >
                                                <?php print $custom_pages[$i]; ?>
                                            </option>
                                            <?php } ?>           
                                                <optgroup label="Wordpress Pages">
                                            <?php
	                    for($i = 0; $i < count($wp_pages); $i++){
	                ?>
                                     <option value="<?php print $wp_pages[$i]; ?>"
                                                    <?php
                                                    if($wp_pages[$i] == $attr[url]){ echo 'selected';}
                                                    ?>
                                                    >
                                                <?php print $wp_pages[$i]; ?>
                                            </option>
                                            <?php } ?>                               
                                           </select>
                                        </td>
                                        <td><button type="button" name="editKey<?php echo $k ?>" id="<?php echo $k ?>" onmouseup="editKey(this.id)">Edit Key</button><button type="button" name="removeKey<?php echo $k ?>" id="<?php echo $k ?>" onmouseup="removeKey(this.id)">Remove</button></td>
	                </tr>
	                <?php 
                        $k++;
                                                    }?>
	            </tbody>
	        </table>
	        <br/>
                <input name="submit" type="submit" class="ui-button" id="submitSaveMap" value="Save Map" /></form>
                <input type="text" placeholder="Enter New Key Here" id="keyInput" /><input name="addKey" type="button" class="ui-button" id="addKey" value="Add Key" />
                <input type="text" placeholder="Enter New Page URL Here" id="customPageInput" /><input name="addPage" type="button" class="ui-button" id="addPage" value="Add Page" />
                <select id="selectRemovePage"><optgroup label="Custom Pages" name="groupCustomPages"> <?php
	                    for($i = 0; $i < count($custom_pages); $i++){
	                ?>
                                     <option value="<?php print $custom_pages[$i]; ?>">
                                                <?php print $custom_pages[$i]; ?>
                                            </option>
                                            <?php } ?>  </select><input name="removePage" type="button" class="ui-button" id="removePage" value="Remove Page" />
                                           
	    
	</div>
	
	<script>
            
            jQuery(document).on("keypress", ":input:not(textarea)", function(event) {
                 return event.keyCode !== 13;
             });
            
            var rows = <?php echo $k ?>;
            var options = jQuery("#page_options").html();
            var unsaved = false;

            function unloadPage(){ 
                if(unsaved){
                    return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
                }
            }

            jQuery(window).bind('beforeunload', function() {
                if(unsaved){
                    return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
                }
            });

            jQuery('#submitSaveMap').click(function() {
                unsaved = false;
            });

            jQuery('#keyInput').on("change paste", function(e) {
                jQuery(this).val(vfuel.admin.slugify(jQuery(this).val()));
            });

            jQuery('#addKey').on("click", function(){
                key = jQuery('#keyInput').val();
                if(key === '') {
                    alert('Key may not be empty.');
                    return;
                    }

                jQuery("#mapBody").append('<tr valign="top" class="vendorfuel-pages-' + key + '" id="row' + ++rows + '"><td>'+key+'</td><td><select name="vendorfuel-pages['+key+'][]">'+options+'</select></td><td><button type="button" name="removeKey'+rows+'" id="'+rows+'" onmouseup="removeKey(this.id)">Remove</button></td></tr>');
                jQuery('button[name^=removeKey]').button();
                unsaved = true;
           });
           
           jQuery('#addPage').on("click", function(){
                page = jQuery('#customPageInput').val();
                if(page === '') {
                    alert('URL may not be empty.');
                    return;
                    }
                    
                    jQuery('optgroup[name^=groupCustomPages]').append('<option value="'+page+'">'+page+'</option>');
                    var pages = <?php echo json_encode($custom_pages); ?>; 
                    
                    if(pages == false)
                        pages = [];
                    
                    pages.push(page);
                    $.post("#", { customPages : pages }, function(response) {}, 'json');
           });
           
           jQuery('#removePage').on("click", function(){
                page = jQuery('#selectRemovePage').val();
                    
                    jQuery('optgroup[name^=groupCustomPages] option[value="'+page+'"]').remove();
                    var pages = <?php echo json_encode($custom_pages); ?>; 
                    pages = pages.filter(function(value){ return value  !== page;});
                    $.post("#", { customPages : pages }, function(response) {}, 'json');
           });

            function removeKey(id) {
                var row = '#row' + id;
                jQuery(row).remove();
                rows--;
                unsaved = true;
            }
            
             function editKey(id) {
               var key = '#key' + id;
               var originalKey = jQuery(key).html();
               jQuery(key).html('<input type="text" id="keyEdit" value="'+originalKey+'"  onkeypress="updateKey(event, \''+originalKey+'\',\''+key+'\',\''+id+'\')" onblur="updateKey(event, \''+originalKey+'\',\''+key+'\',\''+id+'\')"/>');
               jQuery('#keyEdit').focus();
            }
            
             function updateKey(event, originalKey,key,id) {
                 if(event.keyCode === 13 || event.type === 'blur'){
                    jQuery('#keyEdit').val(vfuel.admin.slugify(jQuery('#keyEdit').val()));
                    var newKey = jQuery('#keyEdit').val();
                    //scan templates for key if key changed
                    if(jQuery('#keyEdit').val() !== originalKey) {
                         vfuel.admin.templatesToUpdateKey(originalKey, newKey);
                         var pageID = '#page_options' + id;
                         console.log(pageID);
                         jQuery(pageID).attr('name', 'vendorfuel-pages['+jQuery('#keyEdit').val()+'][]');
                        unsaved = true;
                    }

                    jQuery(key).html(jQuery('#keyEdit').val());
                }
            }
         
	</script>
        