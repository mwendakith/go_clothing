<div class="container">

    <!-- form -->
    <div class="content inside-page contact">
        <div class="breadcrumb"><a href="<?php echo site_url(); ?>">Home</a> / Search by Categories</div>
        <h2 class="title">Categories</h2>


        <div class="row">
            <form method="post" action="<?php echo site_url('main_/category_results') ?>">
                
            <?php 
            foreach ($cats as $value) {
                echo "<div class='checkbox col-md-offset-2 col-md-10' >"
                . "<input type='checkbox'  name='categories[]' value='{$value->id}'>"
                . "<label for='{$value->id}'>{$value->name}</label></div>";
            }
            
            
            
            ?>
                
                <input type="submit" value="Search" class="col-md-offset-4">
            </form>
            
        </div>
        
    </div>
    
</div>