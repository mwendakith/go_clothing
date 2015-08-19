<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Go Clothing</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>"  rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('css/shop-homepage.css'); ?>"  rel="stylesheet">



    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Home</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>


                        <li>
                            <a href="#login" data-toggle="modal">Login</a>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Add to Cart<span class="glyphicon glyphicon-shopping-cart"></span></a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->




            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <p class="lead">Go Clothing</p>
                    <div class="list-group">
                        <a href="#" class="list-group-item">Category 1</a>
                        <a href="#" class="list-group-item">Category 2</a>
                        <a href="#" class="list-group-item">Category 3</a>
                    </div>
                </div>

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

        <div class="container">

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Go Clothing 2015</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="<?php echo base_url('js/jquery.js'); ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>


        <!-- modal login start -->

        <div class="modal fade" id="login" role="dialog">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form class="form-horizontal" method="post" action="">

                        <div class="modal-header">

                            <h4>Login</h4>

                        </div>

                        <div class="modal-content">

                            <!-- row  start-->

                            <div class="form-group">
                                <label for="username" class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-9">

                                    <input type="text" class="form-control" name="username" placeholder="User Name">

                                </div>

                            </div>

                            <!-- row end -->


                            <!-- row  start-->

                            <div class="form-group">

                                <label for="password" class="col-lg-3 control-label">Password:</label>
                                <div class="col-lg-9">

                                    <input type="password" class="form-control" name="password" placeholder="Password">

                                </div>

                            </div>

                            <!-- row end -->

                            <div class="modal-footer">

                                <a class="btn btn-default" data-dismiss="modal">Close</a> 
                                <button class="btn btn-primary" type="submit">Login</button>

                            </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- modal login finish -->

</body>

</html>
