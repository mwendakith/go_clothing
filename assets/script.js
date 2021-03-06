function search() {
    var x = $('#sstring').val();
    var form_data = {
        sstring: x
    };

    $.ajax({
        url: "<?php echo site_url('main_/locate'); ?>",
        type: 'POST',
        data: form_data,
        success: function (msg) {
            $("#this").empty().append(msg);
        }
    });
}

function like_product(product_id) {
    
    var form_data = {
        product_id: product_id
    };
    
    var x = $('#my_url').val();

    $.ajax({
        url: x,
        type: "POST",
        data: form_data,
        success: function (msg) {
             $(".my_message").empty().append(msg);
            
        }
    });
}

$('#size').change(
        function () {
            // alert('this');

            var x = $('#size').val();
            var y = $(':selected').attr('id');
            var z = $('#product_id').val();
            var a = $('#quantity').val();
            $('#prod_price').text('Kshs ' + y);
//
//            var form_data = {
//                size: x,
//                price: y,
//                product_id: z,
//                quantity: a
//            };
//
//            $.ajax({
//                url: "<?php echo site_url('main_/add_to_cart'); ?>",
//                type: 'POST',
//                data: form_data,
//                success: function (msg) {
//                    $('#this').attr('class', 'alert alert-success');
//                    $("#this").empty().append('You have added the product to your cart.');
//                }
//            });

        });


$('#add_to_cart').click(
        function () {
            var x = $('#size').val();
            var y = $(':selected').attr('id');
            var z = $('#product_id').val();
            var a = $('#quantity').val();
            var b = $('#site_url').val();
            $('#prod_price').text('Kshs ' + y);

            var form_data = {
                size: x,
                price: y,
                product_id: z,
                quantity: a
            };
           
            $.ajax({
                url: b,
                type: 'POST',
                data: form_data,
                success: function (msg) {
                    $('#this_').attr('class', 'alert alert-success').empty().append(a + ' items have been added to your cart.');
                }
            });
        }
);

function get_price(product_id, product_size) {
    var form_data = {
        id: product_id,
        size: product_size
    };

    $.ajax({
        url: "<?php echo site_url('main_/price'); ?>",
        type: 'POST',
        data: form_data,
        success: function (msg) {
            $("#this").empty().append(msg);
        }
    });
}


function handleResize() {
    var h = $(window).height();
    $('.fullpage').css({'height': h + 'px'});
}
$(function () {
    handleResize();
    $(window).resize(function () {
        handleResize();
    });
});

$(function () {

//jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function () {
        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        $("#progressbar li").eq($("fieldset").index(next_fs)).prev('li').addClass("done");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'transform': 'scale(' + scale + ')'});
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 500,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeOutExpo'
        });
    });

    $(".previous").click(function () {
        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        $("#progressbar li").eq($("fieldset").index(current_fs)).prev('li').removeClass("done");


        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
            },
            duration: 500,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeOutExpo'
        });
    });

    $(".submit").click(function () {
        
    });

});


// uniform
$(function () {
    $('input[type="checkbox"], input[type="radio"], select').uniform();
});

// social icon
$(document).ready(function ($) {
    $('.social i').tooltip('hide')
});

// 

var wow = new WOW(
        {
            boxClass: 'product, related-products', // animated element css class (default is wow)
            animateClass: 'animated fadeInUp', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true        // act on asynchronously loaded content (default is true)
        }
);
wow.init();




$('.carousel').swipe({
    swipeLeft: function () {
        $(this).carousel('next');
    },
    swipeRight: function () {
        $(this).carousel('prev');
    },
    allowPageScroll: 'vertical'
});