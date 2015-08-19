
                <div class="col-md-9">

                    <form class="form-horizontal" method="post" action="<?php echo site_url("main/reg_admin"); ?>">

                        <div class="">

                            <h4>Register Administrator</h4>

                        </div>
                        
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="title" class="col-lg-3 control-label">Title:</label>
                            <div class="col-lg-9">

                                <select name="title" class="form-control">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($titles as $row) {
                                        echo "<option value=" . $row->id . ">" . $row->name . "</option>";
                                    }
                                    
                                    ?>
                                </select>

                            </div>

                        </div>

                        <!-- row end -->
                        
                        
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="f_name" class="col-lg-3 control-label">First Name:</label>
                            <div class="col-lg-9">

                                <input type="text" class="form-control" name="f_name" placeholder="First Name">

                            </div>

                        </div>

                        <!-- row end -->
                        
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="surname" class="col-lg-3 control-label">Surname:</label>
                            <div class="col-lg-9">

                                <input type="text" class="form-control" name="surname" placeholder="Surname">

                            </div>

                        </div>

                        <!-- row end -->
                        
                        <!-- row  start-->

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">

                                <input type="text" class="form-control" name="email" placeholder="Email">

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
