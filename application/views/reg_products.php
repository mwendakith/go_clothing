
                <div class="col-md-9">

                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url("main/reg_product"); ?>">

                        <div class="">

                            <h4>Add Product</h4>

                        </div>
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label">Name:</label>
                            <div class="col-lg-9">

                                <input type="text" class="form-control" name="name" placeholder="Name">

                            </div>

                        </div>

                        <!-- row end -->
                        
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="designer" class="col-lg-3 control-label">Designer:</label>
                            <div class="col-lg-9">

                                <select name="designer" class="form-control">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($designers as $row) {
                                        echo "<option value=" . $row->id . ">" . $row->name . "</option>";
                                    }
                                    
                                    ?>
                                </select>

                            </div>

                        </div>

                        <!-- row end -->
                        
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="image" class="col-lg-3 control-label">Picture:</label>
                            <div class="col-lg-9">

                                <input type="file" class="form-control" name="image" placeholder="Image">

                            </div>

                        </div>

                        <!-- row end -->

                        <!-- row  start-->

                        <div class="form-group">
                            <label for="username" class="col-lg-3 control-label">Description:</label>
                            <div class="col-lg-9">

                                <textarea rows="6" type="text" class="form-control" name="description" placeholder="Description"></textarea>

                            </div>

                        </div>

                        <!-- row end -->

                        <div class="row ">
                            <div class="col-lg-offset-7">
                            
                        <button class="btn btn-primary " type="submit">Submit</button>
                            </div>

                        </div>

                    </form>


                </div>

            </div>

        </div>
        <!-- /.container -->
