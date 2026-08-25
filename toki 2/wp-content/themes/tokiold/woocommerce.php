<?php get_header(); 
 woocommerce_breadcrumb();

?>



<?php
 if ( is_singular( 'product' ) ) {
?>


   



<?php

}



 ?>

<?php if ( have_posts() ) :?>

<?php if ( is_singular( 'product' ) ) {?>
            <section class="product_detalis">
 <div class="main_product_detalis">
                    <div class="container">
                        <div class="row">

              <?php
     woocommerce_content();?>
   </div>
   </div>
   </div>
</section>
     <?php
  }else{
   
                        get_template_part('shop');

    // woocommerce_get_template( 'archive-product.php' );

  } ?>

<?php endif; ?>


<?php get_footer(); ?>