
                <div class="col-md-9">

                    <table class="table table-bordered">
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
                                echo "<tr> <td>" . $row->id . "</td><td>" . $row->name . "</td><td>" . $row->description . "</td><td>" .
                                        anchor('main/edit_product/' . $row->id, "Edit", array('title' => 'Edit')) . "</td><td>" . 
                                        anchor('main/del_product/' . $row->id, "Delete", array('title' => 'Delete'))  ."</td></tr>";
                            }
                            
                            
                            ?>
                        </tbody>
  
                    </table>


                </div>

            </div>

        </div>
        <!-- /.container -->
