<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url('main_/admin'); ?>">Admin Home</a> / Register Designer</div>
        <h2 class="title">Designers</h2>


        <div class="row">

            <div class="col-sm-12">
                
                    <?php 
                    if($success){
                        echo "<p class='alert alert-success'>Designer registration successful</p>";
                    }
                    ?>
                

                <div class="location col-sm-6 col-sm-offset-3">
                    <h4>Register Designer</h4>
                    
                    <form role="form" method="post" action="<?php echo site_url('requests_/reg_designer'); ?>">
                        <div class="form-group">	
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                        </div>
                       
                        
                        <input type="submit" class="btn btn-primary" value='Submit'>
                    </form>


                </div>





            </div>
        </div>
    </div>
    <!-- form -->

</div>
