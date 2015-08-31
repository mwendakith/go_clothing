<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url('main_/admin'); ?>">Admin Home</a> / Users List</div>
        <h2 class="title">Users List</h2>


        <div class="row">

            <div class="col-sm-12">

              

                <div class="location col-sm-6 col-sm-offset-3">
                    <h4>Users List</h4>

                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Surname</th>
                                <th>First Name</th>
                                <th>Status</th>
                                <th>Block</th>
                                <th>(un)Set Admin</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $x = 1;
                            foreach ($users as $row) {
                                echo "<tr> <td>" . $x . "</td><td>" . $row->surname . "</td><td>" . $row->f_name . "</td><td>" . $row->status . "</td><td>" .
                                        anchor('requests_/block_user/' . $row->id, "Block", array('title' => 'Block')) . "</td><td>" . 
                                        anchor('requests_/set_admin/' . $row->id, "Set Admin", array('title' => 'Set Admin'))  ."</td></tr>";
                                $x++;
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
