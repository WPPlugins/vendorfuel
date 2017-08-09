<div class='column' id="portletWindow">

</div>

<script>
    function fireWhenReady() {
        if ( typeof vfuel.admin != 'undefined') {
          vfuel.admin.generateDash();    
        } else {
            setTimeout(fireWhenReady, 100);
        }
    }


    window.onload = function() {
        fireWhenReady();
    };
    
    

</script>
