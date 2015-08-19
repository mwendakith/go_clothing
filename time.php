<?php

// echo sha1(time() . " $%^#@FGSsadfasdfag");

echo sha1('this_time');
<script>

function log_in(){
    var x = $('#exampleInputEmail1').val();
    var y = $('#exampleInputPassword1').val();
        var form_data = {
            username: x,
            password: y
        };
        
        $.ajax({
            url: "<?php echo site_url('main_/logger'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg){
                $(".my_message").empty().append(msg);
            }
        });
}

</script>


?>