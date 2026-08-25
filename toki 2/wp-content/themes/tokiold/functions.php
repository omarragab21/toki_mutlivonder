<?php

class submenu_wrap extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub__wide__menu'><ul class='second__menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}

function searchfilter($query) {
 
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('product'));
    }
 
return $query;
}
 
add_filter('pre_get_posts','searchfilter');

// Rename, re-order my account menu items
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
  function yith_wcwl_get_items_count() {
    ob_start();
    ?>
      <a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
        <span class="yith-wcwl-items-count">

          <span class="xoo-wsc-sc-count"><?php echo esc_html( yith_wcwl_count_all_products() ); ?></span>
        </span>
        <i class="fa fa-heart-o"></i>
    <?php _e("<!--:en-->Wishlist<!--:--><!--:ar-->المفضلة<!--:-->"); ?>
      </a>
    <?php
    return ob_get_clean();
  }

  add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
  function yith_wcwl_ajax_update_count() {
    wp_send_json( array(
      'count' => yith_wcwl_count_all_products()
    ) );
  }

  add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
  add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
  function yith_wcwl_enqueue_custom_script() {
    wp_add_inline_script(
      'jquery-yith-wcwl',
      "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').children('span').html( data.count );
            } );
          } );
        } );
      "
    );
  }

  add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}

function atg_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'header-menu') {
    $classes[] = 'nav-item';
  }
 
  return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

// add_filter('nav_menu_css_class' , 'v123_nav_class' , 10 , 2 );
// function v123_nav_class ($classes, $item) {
//     if (in_array('menu-item-has-children', $classes) ){
//         $classes[] = 'has__sub__menu';
//     }
//     return $classes;
// }




// function add_menuclass($ulclass) {
//    return preg_replace('/<a /', '<a class="has__sub__menu "', $ulclass);
// }
// add_filter('wp_nav_menu','add_menuclass');



function add_link_atts($atts) {
  $atts['class'] = "nav-link has__sub__menu";
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts');

function fwuk_reorder_my_account_menu() {
    if ( 'ar' === $GLOBALS['q_config']['language'])
{
    $a='تفاصيل الحساب';
    $b='الطلبات';
    $c='المفضلة';   
    $d='العنواين';
    $e='تسجيل الخروج';
}
else{
    $a='Account Details';
    $b='Orders';
    $c='Wishlist';
    $d='Addresses';
    $e='Logout';
    
}
    
    $neworder = array(
        'edit-account'       => __($a ),
        // 'dashboard'          => __( 'Dashboard', 'woocommerce' ),
        'orders'             => __($b),
        'wishlist-link'      => __($c ),
        'edit-address'       => __( $d),
        'customer-logout'    => __( $e ),
    );
    return $neworder;
}
add_filter ( 'woocommerce_account_menu_items', 'fwuk_reorder_my_account_menu' );

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
if ( 'ar' === $GLOBALS['q_config']['language'])
{
    $first='الاسم الاول';
     $last="اسم العائلة"; 
    $address="العنوان"; 
    $address2="رقم البناية "; 
    $state='الحي';
    $city="المدينة";
    $tel='الجوال';
    $postcode='الرقم البريدي';
}
else{
    $first='First Name';
    $last="Last Name";
    $address="Address"; 
    $address2="buildding number"; 
    $state='State';
    $postcode="Post Code";
    $city="City";
    $tel='Mobile';

}

    $address_fields['first_name']['placeholder'] =$first;
    $address_fields['last_name']['placeholder'] = $last;
    $address_fields['address_1']['placeholder'] = $address;
    $address_fields['address_2']['placeholder'] = $address2;
    $address_fields['state']['placeholder'] = $state;
    $address_fields['postcode']['placeholder'] = $postcode;
      $address_fields['city']['placeholder'] = $city;

    return $address_fields;
}

add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
    if ( 'ar' === $GLOBALS['q_config']['language'])
{

    $tel='الجوال';
    $co='الشركة';
    $email='البريد الالكتروني';
}
else{

    $tel='Mobile';
    $email="Email";
    $co='Company';

}
    $fields['billing']['billing_phone']['placeholder'] = $tel;
 $fields['billing']['billing_email']['placeholder'] = $email;
 $fields['billing']['billing_company']['placeholder'] = $co;


    return $fields;
}

function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'data.php':
            remove_post_type_support('page', 'editor');
            remove_post_type_support('page', 'thumbnail');

            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');
add_filter('show_admin_bar', '__return_false'); // remove black menu from site


include('post-types.php');


function mytheme_enqueue_comment_reply() {
    // on single blog post pages with comments open and threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        // enqueue the javascript that performs in-link comment reply fanciness
        wp_enqueue_script( 'comment-reply' ); 
    }
}
// Hook into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_comment_reply' );





function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

if (class_exists('ReduxFramework')) {
    // Initiates the configuration file
    include_once (trailingslashit(get_template_directory()) . 'inc/admin/panel.php');
}
if ( function_exists('add_theme_support') )
add_theme_support('post-thumbnails');
function register_my_menus() {
register_nav_menus(
array(
'header-menu' => __( 'روابط الهيدر' ) ,
'footer-menu' => __( 'روابط الفوتر' ) ,
)
);
}
add_action( 'init', 'register_my_menus' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_theme_support( 'woocommerce' );
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_filter( "woocommerce_single_product_zoom_options", "custom_single_product_zoom_options", 10, 3 );
function custom_single_product_zoom_options( $zoom_options ) {
// Disable zoom magnify:
$zoom_options["magnify"] = 0;

return $zoom_options;
}
