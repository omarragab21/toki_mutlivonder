<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Woocommerce
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('classic_ecommerce_preloader',true) != "") { ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-woocommerce' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_ecommerce_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

<header id="header">
  <div class="container">
    <div class="row justify-content-between align-items-center py-3">
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="logo">
        <?php classic_ecommerce_the_custom_logo(); ?>
          <div class="site-branding-text">
            <?php if ( get_theme_mod('classic_ecommerce_title_enable',true) != "") { ?>
            <h1 class="site-title"><a class="text-decoration-none sub-primary-color fs-3" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
            <?php } ?>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <?php if ( get_theme_mod('classic_ecommerce_tagline_enable',true) != "") { ?>
              <span class="site-description primary-color"><?php echo esc_html( $description ); ?></span>
              <?php } ?>
            <?php endif; ?> 
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-12">
        <div class="search-contact row align-items-center justify-content-between ">
          <div class="col-lg-6 col-md-12 col-sm-12 col-12 mb-md-2 mb-2 mb-lg-0 mb-sm-0">
            <?php if(class_exists('woocommerce')){ ?>
              <?php get_product_search_form(); ?>
            <?php }?>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-12 position-relative">
              <div class="row d-flex justify-content-between">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-2">
                    <a href="tel:<?php echo esc_html(get_theme_mod('classic_woocommerce_phoneno','+ 000 111 222 333','classic-woocommerce')); ?>" class="w-100 d-flex align-items-center text-decoration-none">
                      <svg class="primary-color icon-l" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                      <p class="contact-string fw-normal mb-0"><?php echo esc_html(get_theme_mod('classic_woocommerce_phoneno','+ 000 111 222 333','classic-woocommerce')); ?></p>
                    </a>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <a href="mailto:<?php echo esc_html(get_theme_mod('classic_woocommerce_email','info@dummymail.com','classic-woocommerce')); ?>" class="w-100 d-flex align-items-center text-decoration-none">
                      <svg class="primary-color icon-l" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                      <p class="contact-string fw-normal mb-0"><?php echo esc_html(get_theme_mod('classic_woocommerce_email','info@dummymail.com','classic-woocommerce')); ?></p>
                    </a>
                  </div>
              </div>
          </div>
        </div>
      </div>

        

    </div>
    <div class="row g-0">
          <div class="col-lg-12">
              <div class="w-100 menu-cart d-flex justify-content-between align-items-center">
                <div class="w-100 h-100 d-flex align-items-center">
                  <div class="toggle-nav">
                    <?php if(has_nav_menu('primary')){ ?>
                      <button role="tab"><?php esc_html_e('MENU','classic-woocommerce'); ?></button>
                    <?php }?>
                  </div>
                  <div id="mySidenav" class="nav sidenav">
                    <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-woocommerce' ); ?>">
                      <?php if(has_nav_menu('primary')){
                        wp_nav_menu( array( 
                          'theme_location' => 'primary',
                          'container_class' => 'main-menu' ,
                          'menu_class' => 'site-menu p-0 mb-0 list-group list-group-horizontal',
                          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                          'fallback_cb' => 'wp_page_menu',
                        ) ); 
                      } ?>
                      <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','classic-woocommerce'); ?></a>
                    </nav>
                  </div>
                </div>
                <?php if(class_exists('woocommerce')){ ?>
                  <div class="cart d-flex align-items-center">
                  <a class="position-relative d-flex align-items-center justify-content-center" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','classic-woocommerce' ); ?>">
                    <span class="position-absolute cart-count"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span>
                    <svg class="cart-icon icon-l" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                  </a>  
                  </div>
                <?php }?>
            </div>
          </div>
        </div>
  </div>
</header>

