<div class="container">


    <div class="content inside-page product-details">
        <p id="this_"></p>
        <div class="breadcrumb"><a href="<?php echo site_url(); ?>">Home</a> / <a href="<?php echo site_url('main_/collection'); ?>">Collections</a> / <?php echo $product->name ?></div>	
        <div class="row">
            <div class="col-sm-5">
                <div id="ProductCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active"><img src="<?php echo base_url('images/products/' . $product->image); ?>" class="img-responsive" alt="product"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-1 information">
                <h1><?php echo $product->name ?></h1>
                <div class="price"><b><div id="prod_price">Kshs </div></b></div>
                <div class="clearfix">
                    <div class="pull-left"><input class="form-control quantity" placeholder="Quantity" type="number" id="quantity"></div>
                    <div class="pull-left">
                        <input type="hidden" name ='product_id' value="<?php echo $product->id; ?>" id="product_id">
                        <input type="hidden" name ='site_url' value="<?php echo site_url('main_/add_to_cart'); ?>" id="site_url">
                        <select name="size" class="form-control" id="size">
                            <option value=''>Product Size</option>
                            <?php 
                            foreach ($sizes as $value) {
                                echo "<option value='{$value->size}' id='{$value->price}'>{$value->size}</option>";
                            }
                            
                            
                            ?>
                        </select></div>
                    <div class="pull-right"><button id='add_to_cart' href="" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> Add to Cart</button></div>
                </div>

                <div class="description-tabs">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
                        <li><a href="#review" role="tab" data-toggle="tab">Review (3)</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="description">
                            <?php echo $product->description; ?>
                        </div>
                        <div class="tab-pane" id="review">

                            <div class="reviews">
                                <h5>John Smith</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor tellus, tempor ut ultrices ferme ntum, aliquam consequat metus.</p>
                            </div>

                            <div class="reviews">
                                <h5>John Smith</h5>
                                <p>In vel turpis dolorin dapibus dui. Aenean at auctor neque. Lorem ipsum dolor sit , consectetur elit. Fusce dolor tellus, tempor ut ultrices fermentum, aliquam consequat metus. In vel turpis dolor, in dapibus dui. Aenean at auctor neque. </p>
                            </div>

                            <textarea class="form-control" rows="3" >Write review here</textarea>
                            <a href="#" class="btn btn-primary">Post Review</a>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?php echo site_url('requests_/like_product'); ?>" name="my_url" id ='my_url'/>


                <div class="clearfix">
                    <a class="btn btn-primary" data-toggle='modal' data-target='#message' <?php echo "onclick='like_product({$product->id})'"; ?>  ><i class="fa fa-heart"></i> Like</a>
                    <a href="#" class="btn btn-primary"><i class="fa fa-exchange"></i> Compare</a>
                    <a href="#" class="btn btn-primary"><i class="fa fa-envelope"></i> Send an Email</a>				
                </div>
            </div>
        </div>


        




    </div>

</div>
