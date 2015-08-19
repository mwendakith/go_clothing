                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>View Product</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            foreach ($results as $row) {
                                echo "<tr> <td>" . $row->id . "</td><td>" . $row->name . "</td><td>" . $row->description . "</td><td>" . 
                                        anchor('main/view_product/' . $row->id, "View", array('title' => 'View')) . "</td></tr>";
                            }
                            
                            
                            ?>
                        </tbody>
  
                    </table>

                    
