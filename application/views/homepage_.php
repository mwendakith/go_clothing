<div class='content fullpage homepage'>

<!-- banner & block -->
    <div class='col-md-6 col-sm-8  banner height-full  animated fadeInDownBig'>
    	<div id='BannerCarousel' class='carousel slide  height-full' data-ride='carousel'>
    	 <div class='carousel-inner  height-full'>
             <?php 
             $counter = 1;
             while ($counter < 5) {
                 $path = 'images/slide' .  $counter . '.jpg';
                 echo "<div class='item ";
                 if($counter == 1){
                     echo " active ";
                 }
                 echo  " height-full'>
                <img src='" . base_url($path) . "' class='img-responsive' alt='slide'>
                <div class='caption'><h2 class='animated fadeInDown'>All The Latest Fashion</h2>
                <p class='animated fadeInUp'>We lead, others follow.</p>
                <a href='" . site_url('main_/collection') . "' class='btn btn-default animated fadeInLeftBig'>View Products</a> <a href='lookbook.html' class='btn btn-default animated fadeInRightBig'>Lookbook</a>
                </div>
            </div>";
                 $counter++;
             }
             
             ?>
        	
        </div>
        <!-- Controls -->
        <a class='left carousel-control' href='#BannerCarousel' role='button' data-slide='prev'><i class='fa fa-angle-left'></i></a>
        <a class='right carousel-control' href='#BannerCarousel' role='button' data-slide='next'><i class='fa fa-angle-right'></i></a>
        </div>
    </div>
    <div class='col-md-6 col-sm-4 height-full'>
        <div class='height-full'>
            <div class='col-md-6 col-xs-12 height-half animated fadeInUp'><div class='block height-full women '><a href='<?php echo site_url('main_/collection'); ?>' class='info animated fadeInDown'><h3>women</h3><span>21459 Products</span></a></div></div>
            <div class='col-md-6 col-xs-12 height-half animated fadeInDown'><div class='block height-full store'><div class='overlay'><div class='store-info'><div class='desc'><h4>Over 2500 products</h4><p>Find us here.</p><a href='contact.html'  class='btn btn-default'>our store</a></div></div></div></div></div>
            <div class='col-md-6 col-xs-12 height-half animated fadeInDown'><div class='block height-full men'><a href='<?php echo site_url('main_/collection'); ?>' class='info animated fadeInDown'><h3>men</h3><span>1874 Products</span></a></div></div>
            <div class='col-md-6 col-xs-12 height-half animated fadeInUp'><div class='block height-full couple'><a href='<?php echo site_url('main_/collection'); ?>' class='info animated fadeInDown'><h3>kids</h3><span>398 Products</span></a></div></div>            
        </div>
    </div>
   

<!-- banner & block -->



</div>
