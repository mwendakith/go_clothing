
                <div class="col-md-9">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            foreach ($categories as $row) {
                                echo "<tr> <td>" . $row->id . "</td><td>" . $row->name . "</td><td>" . $row->description . "</td><td>" .
                                        anchor('main/edit_category/' . $row->id, "Edit", array('title' => 'Edit')) . "</td><td>" . 
                                        anchor('main/del_category/' . $row->id, "Delete", array('title' => 'Delete'))  ."</td></tr>";
                            }
                            
                            
                            ?>
                        </tbody>
  
                    </table>


                </div>

            </div>

        </div>
        <!-- /.container -->
