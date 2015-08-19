
                <div class="col-md-9">

                    <form class="form-horizontal" method="post" action="<?php echo site_url("main/reg_cat"); ?>">

                        <div class="">

                            <h4>Add Category</h4>

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
