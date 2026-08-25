<?php
function slideshow() {  
    $labels = array(  
        'name' => __('السلايد شو') ,  
        'singular_name' => __('السلايد شو', 'post type singular name'),  
        'add_new' => _x('اضف  جديد', 'الدورات'),  
        'add_new_item' => __('اضف  جديد'),  
        'edit_item' => __('تعديل '),
        'new_item' => __('اضف  جديد'),  
        'all_items' => __('الكل'),  
        'view_item' => __('عرض '),  
        'search_items' => __('بحث'),  
        'not_found' =>  __('لم تقم باضافة دورات '),  
        'not_found_in_trash' => __('لا يوجد  شيء حذوف'),   
        'parent_item_colon' => '',  
        'menu_name' =>  __('السلايد شو')   // title
    );  
    $args = array(  
        'labels' => $labels,  
        'public' => true,  
        'publicly_queryable' => true,  
        'show_ui' => true,  
        'show_in_menu' => true,  
        'query_var' => true,  


        'menu_position' => 4,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'has_archive' => true,  
        'rewrite' => array( 'slug' => 'slideshow', 'with_front' => false ), // مهم جداً !  
        'supports' => array('title','editor' , 'thumbnail'),  // what will we show
        // 'taxonomies' => array('partners-cat','post_tag'),
    );  
    register_post_type( 'slideshow' , $args );  
    }  
/** 
 * إضافة أقسام للبيع 
 */  
function slideshow_taxonomies() {  

      // section start 
    //      $labels = array (  
    //     'name' => __( '', '' ),  
    //     'singluar_name' => __( '', 'slideshow-cat' ),  
    //     'search_items' => __( 'بحث' ),  
    //     'all_items' => __('الكل'),  
    //     'parent_item' => __('الفرعي'),  
    //     'parent_item_colon' => __('slideshow-cat:'),  
    //     'edit_item' => __('تعديل'),  
    //     'update_item' => __('حفظ'),  
    //     'add_new_item' => __('اضف جديد'),  
    //     'new_item_name' => __('جديد'),  
    //     'menu_name' => __( '' )  
    // );  

   

    // register_taxonomy( 'slideshow-cat', array('slideshow'), array (  
    //                 'labels' => $labels,  
    //                 'hierarchical' =>true,  
    //                 'show_ui' => true,  
    //                 'rewrite' => array( 'slug' => 'slideshow-cat'),  
    //                 'query_var' => true,  
    //                 'show_in_nav_menus' => true,  
    //                 'public' => true  
    //         ));
    
    //section end
  
            
}  
    add_action('init', 'slideshow', 0);   
    add_action('init', 'slideshow_taxonomies', 10);  
 /**
 * end
 */
