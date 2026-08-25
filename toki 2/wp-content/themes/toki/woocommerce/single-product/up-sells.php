<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $upsells ) : 

$terms = get_the_terms( get_the_ID(), 'product_cat' );
?>
    <!-- __5___ start products section منتجات مميزة -->
    <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
  <?php _e("<!--:en-->What do you think of these options?<!--:--><!--:ar-->ما رأيك بهذه الخيارات؟<!--:-->"); ?>

             </h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                   <?php 


			
$x=array();
			    
		foreach ( $upsells as $upsell ) : 
				$post_object = get_post( $upsell->get_id() );
			    		$x[]=$post_object->ID;

	
 endforeach;
	
	
	
	
	
	$args = array(
    'post_type' => array( 'product' ),
    // 'orderby' => 'ID',
    // 'orderby'=>'ASC',
    // 'orderby' => 'ASC',
 'orderby'=>'post__in',
    'post__in' => array_values($x)
);
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ) {
    
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
						global $product; 

			


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

    ?>

                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                     <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>

                            </div>
                                                       <a href="<?php the_permalink();?>" class="card-img-top">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="product-img">
                            </a>

                           <div class="product__body">

                                <a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title();?></h3></a>

                            <?php if ($sale){
                                ?>
 <div class="new__price">
    <?php 
    echo $sale.' '.$currency;
    ?>
 </div>
                                <div class="old__price"> 
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                     <span>
                                        <?php
 _e("<!--:en-->Sale <!--:--><!--:ar-->خصم <!--:-->");
?>

<?php echo $saving_percentage;?>
                                     </span>
                                </div>


<?php }else{
?>
 <div class="new__price">
    <?php 
    echo $price.' '.$currency;
    ?>
 </div>
<?php
}
$average      = @round($product->get_average_rating());
$review_count = $product->get_review_count();
?>

                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>

                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  


    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


                    ?>

                </div>
            </div>
            
        </div>
    </section>
























	<?php
endif;

wp_reset_postdata();
