<div class='container'>
<!-- form -->
<div class='content inside-page checkout'>

        <h2 class='title'>Checkout</h2>


<div class='row'>
<div class='col-sm-8 col-sm-offset-2 col-xs-12'>

	<!-- progress bar -->
<ul id='progressbar'>
<li class='active'></li>
<li></li>
<li></li>
<li></li>
</ul>

    <!-- multistep form -->
	<form id='msform' role='form'>
	<!-- fieldsets -->
	<fieldset>
		<div class='panel panel-default'>
		<div class='panel-heading clearfix'>Shopping Cart</div>
		<div class='panel-body shopping-cart'>
			
			<div class='row product-list title hidden-xs'>
            	<div class='col-xs-7'>Product</div>
            	<div class='col-xs-1'>Size</div>
            	<div class='col-xs-2 center price'>Price</div>
            	<div class='col-xs-1'>Qty</div>
            	<div class='col-xs-1 center'>Action</div>
          	</div>

		
                    
                    <?php 
                    $total = 0;
                    foreach ($carts as $key) {
                        echo "<div class='row product-list'>
            	<div class='col-xs-3 col-sm-2'><a href='product.html'><img src='" . base_url('images/products/' .$key->thumbnail) . "' class='img-responsive' alt='product'></a></div>
            	<div class='col-xs-9 col-sm-5 title'><a href='" . site_url("main_/product_view/" . $key->product_id) . "'>{$key->name}</a></div>
                <div class='col-xs-3 col-sm-1'>" . $key->size . " </div>
            	<div class='col-xs-4 col-sm-2 center price'>" . $key->price . " </div>
            	<div class='col-xs-3 col-sm-1'><input class='form-control' value='{$key->quantity}'></div>
            	<div class='col-xs-2 col-sm-1 center'><a href='" . site_url('main_/del_from_cart/' . $key->id)  . "'><i class='fa fa-close'></i></a></div>
          	</div>";
                    $total += ($key->price * $key->quantity);
                    }
                    
                    
                    
                    
                    
                    
                    ?>    

          	

          	

          	<div class='row product-list grandtotal'>
            	<div class='col-xs-8'>Total</div>
                <div class='col-xs-2 center price'><?php echo $total; ?></div>            	
          	</div>




		</div>
		</div>
		<a href='collections.html' class='btn btn-primary pull-left'>Continue Shopping</a>
		<input type='button' name='next' class='btn btn-danger pull-right next action-button' value='Proceed Checkout' />
		
	</fieldset>
	<fieldset>
		<div class='panel panel-default'>
		<div class='panel-heading clearfix'><span class='pull-left'>Register</span></div>
		<div class='panel-body register'>

		<div class='row'>
			<div class='col-sm-6'>
				<h4>Sign In</h4>
				<div class='form-group'>
				<label for='exampleInputEmail1'>Email address</label>
				<input type='email' class='form-control' id='exampleInputEmail1' placeholder='Enter email'>
				</div>
				<div class='form-group'>
				<label for='exampleInputPassword1'>Password</label>
				<input type='password' class='form-control' id='exampleInputPassword1' placeholder='Password'>
				</div>
				<div class='checkbox'>
				<label>
				<input type='checkbox'> Remember password
				</label>
				</div>
				<div class='forgot-password'><a href='#'>Forgot Password</a></div>
				<button type='submit' class='btn btn-danger'>Submit</button>
			</div>
			<div class='col-sm-6'>
			<h4>Create an Account</h4>
			<p>I would like to create a new account. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor tellus, tempor ut ultrices ferme ntum, aliquam consequat metus. </p>
			<a href='createaccount.html' class='btn btn-danger'>Create an Account</a>

			</div>
		</div>				
	
		</div>
		</div>

		<input type='button' name='previous' class='btn btn-primary pull-left previous action-button' value='Back' />
		<input type='button' name='next' class='btn btn-danger pull-right next action-button' value='Continue' />
	</fieldset>
	<fieldset>
		<div class='panel panel-default'>
		<div class='panel-heading clearfix'>Payment Option</div>
		<div class='panel-body form-horizontal'>
				

				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'></label>
				<div class='col-sm-7'>
					<label class='radio-inline'>
					<input type='radio' name='inlineRadioOptions'>Mr 
					</label>
					<label class='radio-inline'>
					<input type='radio' name='inlineRadioOptions'>Ms
					</label>
				</div>
				
				</div>



				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'>Name</label>
				<div class='col-sm-7'>
				<input type='email' class='form-control' id='inputEmail3'>
				</div>
				
				</div>


				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'>Select Card</label>
				<div class='col-sm-7'>
					<select class='form-control'>
					<option>Option 1</option>
					<option>Option 1</option>
					<option>Option 1</option>
					<option>Option 1</option>
					<option>Option 1</option>
					</select>
				</div>
				
				</div>

				

							

				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'>Date</label>
				<div class='col-sm-7'>
				<div class='row'>
					<div class='col-xs-4'>
					<select>
					<option>Jan</option>
					<option>Feb</option>
					<option>March</option>
					<option>April</option>
					<option>May</option>
					<option>June</option>
					<option>July</option>
					<option>Aug</option>
					<option>Sept</option>
					<option>Oct</option>
					<option>Nov</option>
					<option>Dec</option>
					</select>
					</div>

					<div class='col-xs-3'>
					<select>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					</select>
					</div>

					<div class='col-xs-5'>
					<select>
					<option>2013</option>
					<option>2014</option>
					<option>2015</option>
					<option>2016</option>
					<option>2017</option>
					</select>
					</div>
				</div>
				</div>
				</div>	


		</div>
		</div>


		<input type='button' name='previous' class='btn btn-primary pull-left previous action-button' value='Back' />
		<input type='button' name='next' class='btn btn-danger pull-right next action-button' value='Continue' />
	</fieldset>
	<fieldset>
		<div class='panel panel-default'>
		<div class='panel-heading clearfix'>Address</div>
		<div class='panel-body form-horizontal'>
				

				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'>Address</label>
				<div class='col-sm-7'>
					<select class='form-control'>
					<option>Address 1</option>
					<option>Address 2</option>
					<option>Address 3</option>
					<option>Address 4</option>
					<option>Address 5</option>
					</select>
				</div>
				
				</div>

				


				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'>Cash on delivery</label>
				<div class='col-sm-7'>
					<label class='radio-inline'>
					<input type='radio' name='inlineRadioOptions'>Yes
					</label>
					<label class='radio-inline'>
					<input type='radio' name='inlineRadioOptions'>No
					</label>
				</div>
				</div>


				<div class='form-group'>
				<label for='inputEmail3' class='col-sm-4 control-label'>Message</label>
				<div class='col-sm-7'>
				<textarea type='text' class='form-control' rows='5'></textarea>
				</div>
				
				</div>


				<div class='form-group terms-condition-agree'>
				<label for='inputEmail3' class='col-sm-4 control-label'></label>
				<div class='col-sm-7'>
					<label class='radio-inline'>
					<input type='checkbox' name='inlineRadioOptions'>I agree <a href='#'>Terms & Conditions</a> 
					</label>
				</div>
				
				</div>

		</div>
		</div>


		<input type='button' name='previous' class='btn btn-primary pull-left previous action-button' value='Back' />
		<input type='submit' name='submit' class='btn btn-danger pull-right submit action-button' value='Confirm' />
	</fieldset>
	</form>
</div>




        
    </div>    
</div>
<!-- form -->

</div>
