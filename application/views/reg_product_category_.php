<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url('main_/admin'); ?>">Admin Home</a> / Register Product Category</div>
        <h2 class="title">Product Categories</h2>


        <div class="row">

            <div class="col-sm-12">

                <?php
                if ($success) {
                    echo "<p class='alert alert-success'>Product has successfully been added to the category.</p>";
                }
                ?>


                <div class="location col-sm-6 col-sm-offset-3">
                    <h4>Register Product Category</h4>

                    <form role="form" method="post" action="<?php echo site_url('requests_/reg_product_category'); ?>">
                        <select name="product">
                            <option value="">Products</option>
                            <?php
                            foreach ($products as $value) {
                                echo "<option value='{$value->id}'> {$value->name}</option>";
                            }
                            ?>
                        </select>
                        
                        <select name="category">
                            <option value="">Categories</option>
                            <?php
                            foreach ($cats as $value) {
                                echo "<option value='{$value->id}'> {$value->name}</option>";
                            }
                            ?>
                        </select>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value='Submit'>
                        </div>
                    </form>


                </div>





            </div>
        </div>
    </div>
    <!-- form -->

</div>
