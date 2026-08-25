<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>
<div class="col-12 col-md-6 col-lg-5">
                    <div class="product__choose__card">
	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>
	</div>
	</div>
<div class="col-12 col-md-6 col-lg-3">
                    <div class="payment__wrapper">
                        <div class="pay__media">
                            <span class="pay__icon secure__icon"></span>
                            <div class="pay__content">
                                <h5 class="pay__title">
  <?php _e("<!--:en-->Secure Payment<!--:--><!--:ar-->  دفع آمن <!--:-->"); ?>

                              </h5>
                                <span>
  <?php _e("<!--:en-->Existing payment methods are 100% secure<!--:--><!--:ar-->طرق الدفع الموجودة 100% أمنه <!--:-->"); ?>

                                </span>
                            </div>
                        </div>
                        <div class="pay__media">
                            <span class="pay__icon secure__icon"></span>
                            <div class="pay__content">
                                <h5 class="pay__title">
  <?php _e("<!--:en-->Reliable Shipping<!--:--><!--:ar-->شحن موثوق به <!--:-->"); ?>
                                 </h5>
                                <span>
  <?php _e("<!--:en-->On orders over $20.00<!--:--><!--:ar-->على الطلبات التي تزيد عن 20.00 دولارًا<!--:-->"); ?>
                                </span>
                            </div>
                        </div>
                        <div class="pay__media">
                            <span class="pay__icon secure__icon"></span>
                            <div class="pay__content">
                                <h5 class="pay__title">
  <?php _e("<!--:en-->24/7 Support<!--:--><!--:ar-->مساعدة 24/7<!--:-->"); ?>

                                 </h5>
                                <span>
  <?php _e("<!--:en-->Support 24 hours a day<!--:--><!--:ar-->دعم 24 ساعة فى اليوم<!--:-->"); ?>
                                </span>
                            </div>
                        </div>
                    </div>


<?php  
if($product->get_type() !='gift-card'){
?>

                    <div class="free__delivery__wrapper">
                        <div class="del__title__wrap">
     <h3 class="delivery__title">
<?php the_field('ships'); ?>
                            </h3>
                            <h4 class="del__subtitle">
<?php the_field('notice'); ?>
                                

                            </h4>

                        </div>
                        <div class="accordion faqs__accordion" id="accordionExample">
                            <div class="faqs__card">
                              <div class="faqs__title" id="headingOne">
                                  <h3 class="collapse__btn__faqs collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                     <div class="faqs__flex">
                                        <img src="<?php the_field('img1');?>" alt="">
                                        <span>
<?php the_field('title');?>
                                        </span>
                                     </div>
                                     <i class="fa fa-angle-down"></i>
                                  </h3>
                              </div> 
                              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="faqs__content">
<?php the_field('a1');?>
                                </div>
                              </div>
                            </div>
                            <div class="faqs__card">
                              <div class="faqs__title" id="headingTwo">
                                  <h3 class="collapse__btn__faqs collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     <div class="faqs__flex">
                                        <img src="<?php the_field('img2');?>" alt="">
                                        <span>
<?php the_field('title2');?>
                                            
                                        </span>
                                     </div>
                                     <i class="fa fa-angle-down"></i>
                                  </h3>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="faqs__content">
<?php the_field('a2');?>
                                </div>
                              </div>
                            </div>
                            <div class="faqs__card">
                              <div class="faqs__title" id="headingThree">
                                  <h3 class="collapse__btn__faqs collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     <div class="faqs__flex">
                                        <img src="<?php the_field('img3');?>" alt="">
                                        <span>
<?php the_field('title3');?>
                                            

                                        </span>
                                     </div>
                                     <i class="fa fa-angle-down"></i>
                                  </h3>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="faqs__content">
<?php the_field('a3');?>
                                </div>
                              </div>
                            </div>
                            <div class="faqs__card">
                                <div class="faqs__title" id="headingFour">
                                    <h3 class="collapse__btn__faqs collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <div class="faqs__flex">
                                        <img src="<?php the_field('img4');?>" alt="">
                                            <span>
<?php the_field('title4');?>
                                                
                                            </span>
                                        </div>
                                        <i class="fa fa-angle-down"></i>
                                    </h3>
            
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="faqs__content">
<?php the_field('a4');?>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
