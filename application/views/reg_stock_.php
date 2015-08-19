<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url(); ?>">Home</a> / Register Product Sizes</div>
        <h2 class="title">Product Sizes</h2>


        <div class="row">

            <div class="col-sm-12">

                <?php 
                if ($success) {
                    echo "<p class='alert alert-success'>Product size registration successful</p>";
                }
                ?>


                <div class="location col-sm-6 col-sm-offset-3">
                    <h4>Register Product Size</h4>

                    <form role="form" method="post" action="<?php echo site_url('main_/reg_stock'); ?>">
                        <div class="form-group">
                            <select name='product_id'>
                                <option value=''></option>
                                <?php
                                foreach ($prod as $value) {
                                    echo "<option value='{$value->id}'>{$value->name}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">	
                            <input type="text" class="form-control" placeholder="Size" name="size">
                        </div>
                        
                        <div class="form-group">	
                            <input type="text" class="form-control" placeholder="Price" name="price">
                        </div>

                        <input type="submit" class="btn btn-primary" value='Submit'>
                    </form>


                </div>





            </div>
        </div>
    </div>
    <!-- form -->

</div>
