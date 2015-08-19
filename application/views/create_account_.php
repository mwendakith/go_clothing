<div class='container'>
    <!-- form -->
    <div class='content inside-page create-account'>
        <h2 class='title'>Create an Account</h2>
        <div class='row'>



            <form class='form-horizontal col-sm-6 col-sm-offset-3' method="post" action="<?php echo site_url('main_/create_account'); ?>">
                <div class='panel-body'>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-4 control-label'></label>
                        <div class='col-sm-8'>
                            <?php 
                            foreach ($titles as $value) {
                               echo "<label class='radio-inline'>
                                <input type='radio' name='title_id' id='inlineRadio1' value='{$value->id}'>{$value->name} 
                            </label>";
                            }
                            ?>
                        </div>

                    </div>



                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-4 control-label'>Surname</label>
                        <div class='col-sm-8'>
                            <input type='text' class='form-control' id='inputEmail3' name='surname'>
                        </div>				
                    </div>

                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-4 control-label'>First Name</label>
                        <div class='col-sm-8'>
                            <input type='text' class='form-control' id='inputEmail3'name='f_name'>
                        </div>				
                    </div>



                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-4 control-label'>Email</label>
                        <div class='col-sm-8'>
                            <input type='email' class='form-control' id='inputEmail3' name='email'>
                        </div>				
                    </div>	


                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-4 control-label'>Password</label>
                        <div class='col-sm-8'>
                            <input type='password' class='form-control' id='inputEmail3' name='password'>
                        </div>				
                    </div>



                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-4 control-label'>Re-Enter Password</label>
                        <div class='col-sm-8'>
                            <input type='password' class='form-control' id='inputEmail3' name='confirmation'>
                        </div>				
                    </div>	

                    <input type="submit" class='btn btn-danger pull-right' value="Create an Account">


                </div>
            </form>
        </div>
    </div>
    <!-- form -->

</div>

