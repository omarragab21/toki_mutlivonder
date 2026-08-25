<?php
/**
 * Classic Woocommerce functions and definitions
 *
 * @package Classic Woocommerce
 */

if ( ! function_exists( 'classic_woocommerce_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_woocommerce_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // classic_ecommerce_setup
add_action( 'after_setup_theme', 'classic_woocommerce_setup' );

function classic_woocommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-woocommerce' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-woocommerce' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'classic-woocommerce' ),
		'description'   => __( 'Appears on footer', 'classic-woocommerce' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'classic-woocommerce' ),
		'description'   => __( 'Appears on footer', 'classic-woocommerce' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'classic-woocommerce' ),
		'description'   => __( 'Appears on footer', 'classic-woocommerce' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'classic-woocommerce' ),
		'description'   => __( 'Appears on footer', 'classic-woocommerce' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'classic_woocommerce_widgets_init' );

add_action( 'wp_enqueue_scripts', 'classic_woocommerce_enqueue_styles' );
function classic_woocommerce_enqueue_styles() {
    $parenthandle = 'classic-woocommerce-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, esc_url(get_template_directory_uri()) . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'classic-woocommerce-child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

function classic_woocommerce_scripts() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'classic_woocommerce_scripts' );

add_action( 'customize_register', 'classic_woocommerce_customize_register', 11 );
function classic_woocommerce_customize_register() {
	global $wp_customize;
	$wp_customize->remove_section( 'classic_ecommerce_header_section' );
	$wp_customize->remove_section( 'classic_ecommerce_social_media_section' );
	$wp_customize->remove_section( 'classic_ecommerce_two_cols_section' );

}


// Customizer Section
function classic_woocommerce_customizer ( $wp_customize ) {
	$wp_customize->add_section('classic_woocommerce_header',array(
		'title'	=> __('Manage Header','classic-woocommerce'),
		'panel' => 'classic_ecommerce_panel_area',
	));


	$wp_customize->add_setting('classic_woocommerce_phoneno',array(
		'default'	=> '+ 000 111 222 333',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('classic_woocommerce_phoneno',array(
		'label'	=> __('Phone Number','classic-woocommerce'),
		'section'	=> 'classic_woocommerce_header',
		'setting'	=> 'classic_woocommerce_phoneno',
		'type'		=> 'text'
	));


	$wp_customize->add_setting('classic_woocommerce_email',array(
		'default'	=> 'info@dummymail.com',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('classic_woocommerce_email',array(
		'label'	=> __('Email','classic-woocommerce'),
		'section'	=> 'classic_woocommerce_header',
		'setting'	=> 'classic_woocommerce_email',
		'type'		=> 'text'
	));


	$wp_customize->add_setting('classic_woocommerce_copyright_link',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_woocommerce_copyright_link', array(
	   'section' 	=> 'classic_ecommerce_footer',
	   'label'	 	=> __('Copyright Link','classic-woocommerce'),
	   'type'    	=> 'text',
		'setting'	=> 'classic_woocommerce_copyright_link',
	   'priority' 	=> 1,
    ));


    // Home Category Dropdown Section
	$wp_customize->add_section('classic_woocommerce_featureproduct_section',array(
		'title'	=> __('Manage Featured Products','classic-woocommerce'),
		'priority'	=> 4,
		'panel' => 'classic_ecommerce_panel_area'
	));

	$wp_customize->add_setting('classic_woocommerce_heading',array(
		'default' => 'Featured Products',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_woocommerce_heading', array(
	   'settings' => 'classic_woocommerce_heading',
	   'section'   => 'classic_woocommerce_featureproduct_section',
	   'label' => __('Heading', 'classic-woocommerce'),
	   'type'      => 'text'
	));


}
add_action( 'customize_register', 'classic_woocommerce_customizer' );


// Footer Link
define('CLASSIC_WOOCOMMERCE_FOOTER_LINK',__('https://www.theclassictemplates.com/themes/free-wordpress-woocommerce-template/','classic-woocommerce'));

if ( ! defined( 'CLASSIC_ECOMMERCE_SUPPORT' ) ) {
define('CLASSIC_ECOMMERCE_SUPPORT',__('https://wordpress.org/support/theme/classic-woocommerce','classic-woocommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_REVIEW' ) ) {
define('CLASSIC_ECOMMERCE_REVIEW',__('https://wordpress.org/support/theme/classic-woocommerce/reviews/#new-post','classic-woocommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_PRO_DEMO' ) ) {
define('CLASSIC_ECOMMERCE_PRO_DEMO',__('https://www.theclassictemplates.com/demo/classic-ecommerce/','classic-woocommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_THEME_PAGE' ) ) {
define('CLASSIC_ECOMMERCE_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','classic-woocommerce'));
}
if ( ! defined( 'CLASSIC_ECOMMERCE_PREMIUM_PAGE' ) ) {
define('CLASSIC_ECOMMERCE_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/wordpress-ecommerce-template/','classic-woocommerce'));
}
