<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Woocommerce
 */
?>
<div id="footer">
	<div class="container">
    <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
    <?php endif; // end footer widget area ?>
              
    <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
    <?php endif; // end footer widget area ?>
  
    <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
    <?php endif; // end footer widget area ?>
    
    <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
    <?php endif; // end footer widget area ?>      
    <div class="clear"></div>
  </div>    
  <div class="copywrap">
  	<div class="container">
      <a href="<?php echo esc_html(get_theme_mod('classic_woocommerce_copyright_link',__('https://www.theclassictemplates.com/themes/free-wordpress-woocommerce-template/','classic-woocommerce'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('classic_ecommerce_copyright_line',__('Classic Woocommerce WordPress Theme','classic-woocommerce'))); ?></a>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>