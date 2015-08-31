<div class='container'>

    <!-- form -->
    <div class='content inside-page collection'>
        <div class='breadcrumb'><a href='<?php echo site_url(); ?>'>Home</a> / Collections</div>

        <h2 class='title'>Collections</h2>

        <div class='row'>

            <input type="hidden" value="<?php echo site_url('requests_/like_product'); ?>" name="my_url" id ='my_url'/>


            <?php
            if ($collection != NULL) {
                foreach ($collection as $value) {
                    echo "<!-- product -->
            <div class='col-sm-4'>
                <div class='product'>
                    <a href='#'>
                        <img src='" . base_url('images/products/' . $value->image) . "' class='img-responsive'  alt='product'>
                        <span class='price special'>Ksh ***</span>       				
                    </a>

                    <div class='overlay'>
                        <div class='detail'>
                            <h4><a href='#'>" . $value->name . "</a></h4>
                            <p>" . substr($value->description, 0, 20) . "...</p>
                            <a href='" . site_url('main_/product_view/' . $value->id) . "' class='btn btn-default view animated fadeInLeft'><i class='fa fa-search-plus'></i> View Detail</a>
                            <a href='#' class='btn btn-default cart animated fadeInRight'><i class='fa fa-shopping-cart'></i></a>
                            <a  data-toggle='modal' data-target='#message' class='btn btn-default wishlist  animated fadeInRight' onclick='like_product({$value->id})'><i class='fa fa-heart'></i></a>       					
                        </div>
                    </div>
                </div>
            </div>
            <!-- product -->";
                }
            }
            
            else{
                echo "No results found " . parse_smileys(":down:", base_url('images/smileys'));
            }
            ?>



        </div>


<!--
        <div class='center'>
            <ul class='pagination'>
                <li class='disabled'><a href='#'>«</a></li>
                <li class='active'><a href='#'>1 <span class='sr-only'>(current)</span></a></li>
                <li><a href='#'>2</a></li>
                <li><a href='#'>3</a></li>
                <li><a href='#'>4</a></li>
                <li><a href='#'>5</a></li>
                <li><a href='#'>»</a></li>
            </ul>
        </div>-->

    </div>
    <!-- form -->

</div>
