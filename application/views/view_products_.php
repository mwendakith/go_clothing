<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url('main_/admin'); ?>">Admin Home</a> / Product List</div>
        <h2 class="title">Product List</h2>


        <div class="row">

            <div class="col-sm-12">

              

                <div class="location col-sm-6 col-sm-offset-3">
                    <h4>Product List</h4>

                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            foreach ($products as $row) {
                                echo "<tr> <td>" . $row->id . "</td><td>" . $row->name . "</td><td>" . substr($row->description, 0, 25) . "</td><td>" .
                                        anchor('main_/edit_product/' . $row->id, "Edit", array('title' => 'Edit')) . "</td><td>" . 
                                        anchor('main_/del_product/' . $row->id, "Delete", array('title' => 'Delete'))  ."</td></tr>";
                            }
                            
                            
                            ?>
                        </tbody>
                        
                        
                    </table>


                </div>





            </div>
        </div>
    </div>
    <!-- form -->

</div>
