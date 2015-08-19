
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

                    <form class="form-horizontal" method="post" action="<?php echo site_url('main/logger'); ?>">

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
