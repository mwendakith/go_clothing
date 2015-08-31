<!DOCTYPE html>
<html lang='en'>

    <meta http-equiv='content-type' content='text/html;charset=UTF-8' />
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
        <title>Go Fashion | The Trend Setter</title>

        <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>

        <?php
        echo link_tag(base_url('assets/font-awesome.min.css'), 'stylesheet', 'text/css');
        echo link_tag(base_url('assets/bootstrap/css/bootstrap.min.css'), 'stylesheet', 'text/css');
        echo link_tag(base_url('assets/uniform/css/uniform.default.min.css'), 'stylesheet', 'text/css');
        echo link_tag(base_url('assets/wow/animate.css'), 'stylesheet', 'text/css');
        echo link_tag(base_url('images/favicon.ico'), 'shortcut icon', 'image/x-icon');
        echo link_tag(base_url('images/favicon.ico'), 'icon', 'image/x-icon');
        echo link_tag(base_url('assets/style.css'), 'stylesheet', 'text/css');
        ?>


    <body>

        <!-- header -->
        <nav class='navbar  navbar-inverse navbar-fixed-top' role='navigation'>
            <div class='clearfix'>
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <a class='navbar-brand' href='<?php echo base_url(); ?>'><img src='<?php echo base_url('images/go_logo.jpg'); ?>'  alt='logo'><h1 class='hide'>Go Fashion.</h1></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class='collapse navbar-collapse navbar-right' id='bs-example-navbar-collapse-1'>

                    <ul class='nav navbar-nav'>        


                        <?php
                        if ($this->session->userdata("status") > 3) {
//
                            echo "<li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Products<span class='caret'></span></a>
                            <ul class='dropdown-menu'><li><a href='" . site_url('main_/product') . "'>Add Product</a></li>                                
                                <li><a href='" . site_url('main_/view_products') . "'>View Products</a></li>
                                <li><a href='" . site_url('main_/category') . "'>Add Categories</a></li>
                                <li><a href='" . site_url('main_/view_categories') . "'>View Categories</a></li>
                                <li><a href='" . site_url('main_/stock') . "'>Add Stock</a></li>
                                <li><a href='" . site_url('main_/view_stock') . "'>View Stock</a></li>
                                    </ul></li>
                                  
                                    
                                    <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Product Categories<span class='caret'></span></a>
                            <ul class='dropdown-menu'><li><a href='" . site_url('main_/product_category') . "'>Add</a></li>                                
                                <li><a href='" . site_url('main_/category') . "'>View</a></li>
                                    </ul></li>
                                    
                                    <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Designers<span class='caret'></span></a>
                            <ul class='dropdown-menu'><li><a href='" . site_url('main_/designer') . "'>Add</a></li>                                
                                <li><a href='" . site_url('main_/category') . "'>View</a></li>
                                    </ul></li>
                                    
                                    <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Users<span class='caret'></span></a>
                            <ul class='dropdown-menu'><li><a href='" . site_url('main_/stock') . "'>Add</a></li>                                
                                <li><a href='" . site_url('main_/view_users') . "'>View</a></li>
                                    </ul></li>";

                                
                            //echo "</li>";
                        }
                        
                        else {
                            echo
                            " <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Categories <span class='caret'></span></a>
                            <ul class='dropdown-menu' role='menu'>";

                            foreach ($category as $value) {
                                echo "<li><a href='" . site_url('main_/view_category/' . $value->id) . "'>" . $value->name . "</a></li>";
                            }

                            echo "</ul> </li>";
                            
                             if ($this->session->userdata("status") != 4 || $this->session->userdata("status") != 5) {
                                echo "<li><a href='" . site_url('main_/collection') . "'>collection</a></li>";
                                echo "<li><a href='" . site_url('main_/category_search') . "'>category search</a></li>";
                            }
                        }
                        ?>
                        

                        
                        
                    </ul>

                    <form class='navbar-form navbar-left searchbar' role='search' method="post" action="<?php echo site_url('main_/locate'); ?>">
                        <div class='form-group'>
                            <input type='text' class='form-control' placeholder='Search for products' name='sstring'>
                        </div>
                        <input type='submit' class='btn btn-inverse' onclick='' value="search">
                    </form>
                    <ul class='nav navbar-nav'>
                        <?php
                       
                        if ($this->session->userdata("id") == NULL) {
                            
                            echo "<li><a href='#'  data-toggle='modal' data-target='#login'><span class='glyphicon glyphicon-user'></span> Login / Register</a></li>";
                        } else {
                            
                            echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'> hi " . $this->session->userdata("name") . "<span class='caret'></span></a>";
                            echo "<ul class='dropdown-menu' role='menu'>";
                            echo "<li><a href='" . site_url('main_/my_profile') . "'>My Profile</a></li>";
                            echo "<li><a href='" . site_url('main_/my_likes') . "'>My Likes</a></li>";
                            echo "<li><a href='" . site_url('main_/my_purchases') . "'>My Purchases</a></li>";
                            
                            echo "</ul> </li>";
                            
                            echo  "<li><a href='" . site_url('main_/logout') . "'>Logout</a></li>";
                            if ($this->session->userdata("status") < 4) {
                                echo "<li><a href='" . site_url('main_/checkout') . "'>checkout</a></li>";

                                echo "
                                <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-shopping-cart'></span> Cart <span class='cart-counter'>{$count}</span> <span class='caret'></span></a>
                            <div class='dropdown-menu mini-cart'>";

                                foreach ($minicart as $value) {
                                    echo "<div class='row product-list'>
                                    <div class='col-xs-3'><a href='#'><img src='" . base_url('images/products/' . $value->thumbnail) . "' class='img-responsive' alt='product'></a></div>
                                    <div class='col-xs-7'><a href='#'>{$value->name}</a></div>
                                    <div class='col-xs-1'><a href='#'><i class='fa fa-close'></i></a></div>
                                </div>";
                                }


//                            <div class='clearfix'>
//                                    <a href='checkout.html' class='btn btn-primary pull-left'>Continue shopping</a> <a href='checkout.html' class='btn btn-danger pull-right'>checkout</a>
//                                </div>

                                echo "

                            </div>
                        </li>";
                            }
                        }
                        ?>


                    </ul>
                </div><!-- Navbar-collapse -->
            </div><!-- container-fluid -->
        </nav>
        <!-- header -->
