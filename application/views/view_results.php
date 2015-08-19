<div class="row">
    <?php
    /*foreach ($products as $row) {
        echo "<tr> <td>" . $row->id . "</td><td>" . $row->name . "</td><td>" . $row->description . "</td><td>" .
        anchor('main/edit_product/' . $row->id, "Edit", array('title' => 'Edit')) . "</td><td>" .
        anchor('main/del_product/' . $row->id, "Delete", array('title' => 'Delete')) . "</td></tr>";
    }*/
    ?>
    
    <?php
    foreach ($results as $row) {
        echo "    <div class='col-sm-4 col-lg-4 col-md-4'>
                <div class='thumbnail'>
                    <img src='" . base_url("images/" . $row->thumbnail) . "'>
                    <div class='caption'>
                        <h4 class='pull-right'>$24.99</h4>
                        <h4><a href='" . anchor('main/view_product/' . $row->id, "View", array('title' => 'View')) . "'>" . $row->name . "</a>
                        </h4>
                        <p>" . $row->description . "</p>

                    </div>
                    <div class='ratings'>
                        <p class='pull-right'>15 reviews</p>
                        <p>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                        </p>
                    </div>
                </div>
            </div>";
    }
    ?>
    
     


</div>