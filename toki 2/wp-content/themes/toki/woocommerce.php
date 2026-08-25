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
            <section class="product__details__section">
                    <div class="details__container">
                        <div class="row product__details__row">

              <?php
     woocommerce_content();


     ?>
   </div>
   </div>
</section>
<?php 
                        get_template_part('shop3');
?>
     <?php
  }
  if(is_tax( 'product_cat' )){
    woocommerce_get_template( 'taxonomy-product_cat.php' );

}
  if(is_post_type_archive( 'product' )){
   
                        get_template_part('shop');

    // woocommerce_get_template( 'archive-product.php' );

  } ?>

<?php endif; ?>


<?php get_footer(); ?>