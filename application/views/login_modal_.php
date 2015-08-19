<!-- login modal -->
<div class="modal fade" id="login">
  <div class="modal-dialog">
   <div class="modal-content">
   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>


   <div class="row">
            <div class="col-sm-6">
                <h4>Sign In</h4>
                <form method="post" action="<?php echo site_url('main_/logger'); ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="my_message">
                
                </div>
                <div class="forgot-password"><a href="#">Forgot Password</a></div>
                    <input type="submit" class="btn btn-danger" value="Submit">
                </form>
            </div>
            <div class="col-sm-6">
            <h4>Create an Account</h4>
            <p>I would like to create a new account. </p>
            <a href="<?php echo site_url('main_/account'); ?>" class="btn btn-danger">Create an Account</a>
            </div>
    </div>  
</div>
  </div>
</div>
<!-- login modal -->

