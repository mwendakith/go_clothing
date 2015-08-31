<div class='container'>
    <!-- form -->
    <div class='content inside-page checkout'>
        <div class='row'>
            <div class='col-sm-8 col-sm-offset-2 col-xs-12'>

                <h2 class='title'>My Purchases</h2>
                <div class='panel panel-default'>
                    <div class='panel-heading clearfix'>My Purchases</div>
                    <div class='panel-body shopping-cart'>

                        <div class='row product-list title hidden-xs'>
                            <div class='col-xs-7'>Product</div>
                            <div class='col-xs-1'>Size</div>
                            <div class='col-xs-2 center price'>Price</div>
                            <div class='col-xs-2'>Qty</div>
                        </div>

                        <?php
                        foreach ($table as $key) {
                            echo "<div class='row product-list'>
            	<div class='col-xs-3 col-sm-2'><a href='" . site_url("main_/product_view/" . $key->product_id) . "'><img src='" . base_url('images/products/' . $key->thumbnail) . "' class='img-responsive' alt='product'></a></div>
            	<div class='col-xs-9 col-sm-5 title'><a href='" . site_url("main_/product_view/" . $key->product_id) . "'>{$key->name}</a></div>
                <div class='col-xs-4 col-sm-1 center'>" . $key->size . " </div>
            	<div class='col-xs-4 col-sm-2 center price'>" . $key->price . " </div>
            	<div class='col-xs-4 col-sm-2 center'>{$key->quantity}</div>
          	</div>";
                        }
                        ?>    

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>