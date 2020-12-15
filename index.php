<?php
   include_once "header.php";
   include_once "data_model_gallery.php";

   $galleries = get_all_gallery();
?>

<!-- Page Content -->
<div class="container bodybox" style="margin-top: 20px; min-height: 1200px;" >
     
      <div class="portfolio-menu mt-2 mb-4">
         <ul>
            <li class="btn btn-outline-dark active" data-filter="*">All</li>
            <li class="btn btn-outline-dark" data-filter=".Mandala">Mandala</li>
            <li class="btn btn-outline-dark" data-filter=".Picture">Painting</li>
         </ul>
      </div>

      <div class="portfolio-item row">
         
         <?php 
         foreach($galleries AS $tumbl){ 
            $product_id = $tumbl['product_id'];
            $product_category = $tumbl['product_category'];
            $product_type = $tumbl['product_type'];
            $product_image = $tumbl['product_image'];
            $product_title = $tumbl['product_title'];   
         ?>

         <div class="item <?=$product_category ;?> col-lg-3 col-md-4 col-6 col-sm">
            <a href="images/<?=$product_image ;?>" class="fancylight popup-btn" data-fancybox-group="light"> 
            <img class="img-fluid" src="images/tumbl_<?=$product_image ;?>" alt=" <?=$product_title ;?>">
            <p style="background-color:#987fa6; color:white; font-size:20px; text-align:center;"><?=$product_title ;?></p> 
            </a>
         </div>  
         <?php }?> 

      </div>

      <div class="pagination1">
         <a  href="?page=galleries&current_page_number=1">FIRST</a> 
         <a href="?page=galleries&current_page_number=<?php echo ($current_page_number > 1 ? ($current_page_number - 1) : 1 )?>">&laquo;</a> 
         <span><?php echo $current_page_number; ?></span> / <span><?php echo $total_number_of_pages; ?> Page</span> 
         <a href="?page=galleries&current_page_number=<?php echo ( ($current_page_number < $total_number_of_pages) ? ($current_page_number + 1) : $total_number_of_pages )?>">&raquo;</a> 
         <a href="?page=galleries&current_page_number=<?php echo $total_number_of_pages; ?>">LAST</a>
      </div>
      
</div>


<?php
  include_once "footer.php";
?>