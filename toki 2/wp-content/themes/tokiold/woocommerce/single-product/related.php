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

if ( $related_products ) : ?>

                     
                <section class="best_protects_index">
                    <div class="main-container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="title">
	<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		
                                    <p> <span></span> <?php echo esc_html( $heading ); ?> <span></span> </p>
                                </div>
                            </div>
    
    
                            <div class="col-lg-12">
                                <div class="main_best_protects_index">
                                    <div class="row">

			<?php
			
$x=array();
			foreach ( $related_products as $related_product ) : 
			    
			    
								$post_object = get_post( $related_product->get_id() );
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

			?>
			
  <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="add_to_fav">
                            
                     <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
                        </div>
                        <a class="card-img-top" href="<?php the_permalink();?>">
                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="product-img">
                        </a>
                       <div class="card-body">
                            <div class="rate__num">
                                <div class="r_stars">
                                  
<?php 
$average      = round($product->get_average_rating());
    // $review_count = $product->get_review_count();
?>
<?php  
for ($x = 1; $x <= $average; $x++) {
    ?>
<i class="fa fa-star checked"></i>

<?php }
?> 
<?php  
for ($x = 1; $x <= 5-$average; $x++) {
    ?>
<i class="fa fa-star-o"></i>

<?php }
?> 
                                </div>
                               <!-- <span class="r_numbers">(54 تقييم)</span> -->
                            </div>
                            <h3 class="card-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            <p class="card-text">
                                
                                <?php echo strip_tags(get_the_content());?>
                            </p>
                            <div class="pro__price">
                                
                         
                    <?php echo do_shortcode('[add_to_cart id="'.get_the_ID().'"]');?>
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
            
            //endwhile; else : endif ; wp_reset_query(); ?>      
    
                                
    
    
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
    
    
                </section>











	<?php
endif;

wp_reset_postdata();
