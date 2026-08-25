<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) && !isset($_GET['register']) ) : ?>
            <section class="login_page">
		<form class="woocommerce-form woocommerce-form-login login" method="post">
						<?php do_action( 'woocommerce_login_form_start' ); ?>

                    <div class="main-container">
                        <div class="main_login_page">
                            <div class="title_login_page">
		<h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
                            </div>

                            <div class="form_login_page">
                                <div class="input_login_page">
				<input  required placeholder="<?php _e("<!--:en-->Name / Email<!--:--><!--:ar-->  الاسم / البريد الالكتروني <!--:-->"); ?>" type="text" class="form-control"  name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>


                                </div>
                                <div class="input_login_page">

				<input class="form-control" placeholder="<?php _e("<!--:en-->Password<!--:--><!--:ar-->   كلمة المرور<!--:-->");?>" type="password" name="password" id="password" autocomplete="current-password" />

                                </div>
			<?php do_action( 'woocommerce_login_form' ); ?>

                                <div class="remember_me">
                                    <div class="input_remember_me">

					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />


                                        <label for="rememberme"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></label>
                                    </div>
                                    <div class="forget_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">


  <?php _e("<!--:en-->Forget Password ?<!--:--><!--:ar-->نسيت كلمة المرور<!--:-->"); ?>

                                         </a>
                                    </div>
                                </div>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

                                <div class="btn_login_page">
				<button type="submit" class="ctm-btn" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
  <?php _e("<!--:en-->Login<!--:--><!--:ar-->دخول <!--:-->"); ?>

				</button>


                                 
                                </div>

                                <div class="link_form_login_page">

  <?php _e("<!--:en-->Don't Have Account <!--:--><!--:ar-->لا تمتلك حساب    <!--:-->"); ?>

                                  <a href="<?php echo site_url();?>/my-account/edit-account/?register">  

  <?php _e("<!--:en-->Register<!--:--><!--:ar--> سجل الان  <!--:-->"); ?>

                                  </a> </div>
                            </div>
                        </div>
                    </div>
			<?php do_action( 'woocommerce_login_form_end' ); ?>

                </form>
            </section>


<?php endif; ?>



<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) &&isset($_GET['register']) ) : ?>



            <section class="login_page register_page">


    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

            <?php do_action( 'woocommerce_register_form_start' ); ?>
                    <div class="main-container">
                        <div class="main_login_page">
                            <div class="title_login_page">
		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
                            </div>





            <?php do_action( 'woocommerce_register_form_start' ); ?>

        

                            <div class="form_login_page">

                            	    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                                <div class="input_login_page">

     <input placeholder=" Username *" type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
</div>

            <?php endif; ?>
                                <div class="input_login_page">
                <input placeholder="<?php _e("<!--:en-->Email<!--:--><!--:ar-->  البريد الالكتروني <!--:-->"); ?> *" type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>

                                </div>
                                             

 <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                                <div class="input_login_page">
                    <input placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" />
</div>
            <?php else : ?>

                <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

            <?php endif; ?>

            <?php do_action( 'woocommerce_register_form' ); ?>


                                <div class="text_register_page">
                            <p>
        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                            	
                            </p>
                                </div>
                                                            

                                <div class="btn_login_page">
                <button type="submit" class="ctm-btn" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>


                                </div>

                                <div class="link_form_login_page">  
  <?php _e("<!--:en-->Already Have Account<!--:--><!--:ar-->لديك حساب بالعفل <!--:-->"); ?>

                                  <a href="<?php echo site_url();?>/my-account/edit-account"> 

  <?php _e("<!--:en-->Login<!--:--><!--:ar-->دخول<!--:-->"); ?>

                                   </a> </div>
                            </div>
                        </div>
                    </div>
            <?php do_action( 'woocommerce_register_form_end' ); ?>

                </form>
            </section>













<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
