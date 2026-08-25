<?php 
get_header();?>
<?php 
if(have_posts()) : while(have_posts()) : the_post();?>

<nav class="woocommerce-breadcrumb">
<div class="container">
    


    <a href="<?php echo site_url();?>">
        <?php 
 _e("<!--:en-->Home<!--:--><!--:ar-->الرئيسية<!--:-->");
 ?>

    </a>&nbsp;/&nbsp;<?php the_title();?>

</div>


</nav>
 

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



<?php get_footer();?>