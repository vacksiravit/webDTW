<?php 
require_once("connect.php");
?>
<div class="result"></div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    function refresh_div() {
        jQuery.ajax({
            url:'connect_db.php',
            type:'POST',
            success:function(results) {
                jQuery(".result").html(results);
            }
        });
    }

    t = setInterval(refresh_div,1000);
</script>