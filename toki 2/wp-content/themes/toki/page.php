<?php 
get_header();?>
<?php 
if(have_posts()) : while(have_posts()) : the_post();?>

<div class="details__container">
    
<div class="col-xs-12">
    
<nav class="breadcrumb">
    
<ol class="breadcrumb" style="padding:0;">
    

 <li class="breadcrumb-item">
    <a href="<?php echo site_url();?>">
        <?php 
 _e("<!--:en-->Home<!--:--><!--:ar-->الرئيسية<!--:-->");
 ?>

    </a></li>
                  <li class="breadcrumb-item active" aria-current="page">    <?php the_title();?> </li>





</ol>
</nav>
</div>
</div>
 

            <section class="produdsd">
 <div class="main_product_detalis">
                    <div class="container">
                        <div class="row">
<div class="col-xs-12 col-md-12 col-lg-12">
    
              <?php
     the_content();?>
   </div>
</div>
   </div>
   </div>
</section>






  <?php endwhile; else : endif ; wp_reset_query(); ?>
<br/>


<?php get_footer();?>