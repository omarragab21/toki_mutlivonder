<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
?>


<div class="col-12 col-md-6 col-lg-4">
                    <div class="product__slider__details">
                        <div class="swiper gallery-top">
                            <div class="swiper-wrapper">
                              <a href="<?php $thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'product'); echo $thumb[0];?>" class="swiper-slide" style="background-image:url(<?php $thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'product'); echo $thumb[0];?>)" data-fancybox="gallery"></a>

                               <?php
                                            

    $attachment_ids = $product->get_gallery_image_ids();

    foreach( $attachment_ids as $attachment_id ) {
   
  ?>
                                <a href="<?php      echo $image_link = wp_get_attachment_url( $attachment_id );?>" class="swiper-slide" style="background-image:url(<?php      echo $image_link = wp_get_attachment_url( $attachment_id );?>)" data-fancybox="gallery"></a>

                                      
<?php } ?>

                            </div>
                            <!-- Add Arrows -->
                          </div>
                          <div class="swiper gallery-thumbs">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide" style="background-image:url(<?php $thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'product'); echo $thumb[0];?>)"></div>
                      <?php            foreach( $attachment_ids as $attachment_id ) {
   
  ?>
                                <div class="swiper-slide" style="background-image:url(<?php      echo $image_link = wp_get_attachment_url( $attachment_id );?>)"></div>

                     

                                      
<?php } ?>
                            </div>
                          </div>
                          <div class="swiper-button-next swiper-button-white"></div>
                          <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                </div>


