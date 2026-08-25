<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<section class="login_page">
    
<form method="post" class="woocommerce-ResetPassword lost_reset_password">
                    <div class="main-container">
                        <div class="main_login_page">
                            <div class="title_login_page">
                                <h2>
                                  <?php _e("<!--:en-->Lost Password<!--:--><!--:ar-->نسيت كلمة المرور<!--:-->"); ?>

                                </h2>
    	<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

                            </div>

                            <div class="form_login_page">
                                <div class="input_login_page">
                                    		<input Placeholder="<?php esc_html_e( 'Username or email', 'woocommerce' ); ?>" class="form-control" required=""  type="text" name="user_login" id="user_login" autocomplete="username" />

                                </div>
                            
                            	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

                                <div class="btn_login_page">
                                    		<input type="hidden" name="wc_reset_password" value="true" />

                                    <button type="submit"  class="ctm-btn"> <?php esc_attr_e( 'Reset password', 'woocommerce' ); ?></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

                </form>
            </section>


<?php
do_action( 'woocommerce_after_lost_password_form' );
