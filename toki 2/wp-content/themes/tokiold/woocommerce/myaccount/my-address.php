<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit;

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __( 'Billing address', 'woocommerce' ),
			'shipping' => __( 'Shipping address', 'woocommerce' ),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __( 'Billing address', 'woocommerce' ),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>
<section class="my_address">
                <div class="main-container">
                

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title_my_address">
                                <p>
                                
                         
	<?php echo apply_filters( 'woocommerce_my_account_my_address_description', esc_html__( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>


                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="main_my_address">
                                <div class="row">
                        
                                


<?php foreach ( $get_addresses as $name => $address_title ) : ?>
	<?php
		$address = wc_get_account_formatted_address( $name );
	
	?>

   <div class="col-lg-6">
                                        <div class="sub_my_address">
                                            <h2> <?php echo esc_html( $address_title ); ?> </h2>
               <p>
                   <?php
				echo $address ? wp_kses_post( $address ) : esc_html_e( '' );
			?>
               </p>
                                            
                                            			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit"> <i class="bi bi-pencil"></i></a>

                                        </div>
                                    </div>



<?php endforeach; ?>

                                 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
            
            
            
            
            
            
            
            
            



