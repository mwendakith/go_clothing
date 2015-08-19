<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url(); ?>">Home</a> / Register Product</div>
        <h2 class="title">Products</h2>


        <div class="row">

            <div class="col-sm-12">
                
                    <?php 
                    if($success){
                        echo "<p class='alert alert-success'>Product registration successful</p>";
                    }
                    ?>
                

                <div class="location col-sm-6 col-sm-offset-3">
                    <h4>Register Product</h4>
                    
                    <form role="form" method="post" action="<?php echo site_url('main_/reg_product'); ?>" enctype="multipart/form-data">
                        <div class="form-group">	
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                        
                        <div class='form-group'>
                            <select name="designer" class="form-control">
                                    <option value="">Designer</option>
                                    <?php 
                                    foreach ($designers as $row) {
                                        echo "<option value=" . $row->id . ">" . $row->name . "</option>";
                                    }
                                    
                                    ?>
                                </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="file" class="form-control" name="image" placeholder="Image">
                        </div>
                       
                        <div class="form-group">
                            <textarea type="text" class="form-control"  placeholder="Description" rows="4" name="description"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary" value='Submit'>
                    </form>


                </div>





            </div>
        </div>
    </div>
    <!-- form -->

</div>
