<?php 
#session_start();?><!doctype html>
<html>
<html lang="<?php if ( 'ar' === $GLOBALS['q_config']['language'])
{echo'ar';}else{echo'en';}?>" dir="<?php if ( 'ar' === $GLOBALS['q_config']['language'])
{echo'rtl';}else{echo'ltr';}?>">

<head>
<meta charset="utf-8">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>
<?php
 if(is_home()){bloginfo('name');
}
else{
wp_title('');

}
 ?>
</title>

   

 <link href="<?php bloginfo('template_directory'); ?>/img/logo.png" rel="icon" type="image/png"  sizes="16x16">
    <link href="<?php bloginfo('template_directory'); ?>/css/simple-lightbox.min.css" rel="stylesheet"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php bloginfo('template_directory'); ?>/css/hover.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/nice-select.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/main.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/media.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/v4-shims.min.css" />
    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" rel="stylesheet">





    <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
?>
    <link href="<?php bloginfo('template_directory'); ?>/css/style-ar.css" rel="stylesheet">

<?php
}else{
?>

<?php } ?>
<style>
.h__85 p{margin: 0;color: #fff;}
.h__85 br{
    display: none;
}
 .third__column__part   i.yith-wcwl-icon.fa.fa-heart-o {
    margin: 0 auto;
    display: table;
    color: #333;
    position: relative;
    top: -5px;
}
    .yith-wcwl-add-button span,
.langactive,.xoo-wsc-basket,
.woo-multi-currency{
    display: none!important;
}
span.xoo-wsc-sc-count{
        background-color: #F2C94C;
    color: #fff;
    font-size: 8px;
    position: absolute;
    width: 16px;
    height: 16px;
    line-height: 16px;
    text-align: center;
    border: 1px solid #FFFFFF;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    top: -7px;
    right: -7px;
}
.woocommerce div.product{
    width: 100%;
}
.woosb-title-inner a{
        font-weight: 500;
    font-size: 14px;
    color: #4F4F4F;
    margin-bottom: 10px;
}
</style>
</head>
 <?php 
 wp_head();

   if(is_singular('product')){
        $d=get_the_ID();
        if (!isset($_SESSION['custmproduct']) || !is_array($_SESSION['custmproduct'])) {
            $_SESSION['custmproduct'] = array();
        }
        if(!in_array($d, $_SESSION['custmproduct'])) {
            array_push($_SESSION['custmproduct'], $d);
        }
   }
 
   if (!isset($_SESSION['custmproduct']) || !is_array($_SESSION['custmproduct'])) {
       $_SESSION['custmproduct'] = array();
   }
 ?>
      <body <?php body_class(); ?>>
       <!--loader-->
     <div class="loader-container" id="loader-container">
        <div class="loader__center">
            <div class="loader__ring"></div>
            <span>loading</span>
            <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" >
       </div>
    </div>
    <!--start header-->
    <header>
        <div class="menu-logo"> 
            <div class="headerSearch">
                <div class="container px-lg-0">
                    <div class="row align-items-center">
                        <div class="col-3 col-lg-2">
                            <a class="logo" href="<?php echo site_url();?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" ></a>     
                        </div>
                        <div class="col-9 col-lg-6 col-xl-7 mob__jutify__between">
                            <form action="<?php echo site_url();?>" class="search-form" autocomplete="off">
                                <div class="input-group">
                                    <input type="text" name="s" class="form-control" placeholder="ما الذي تبحث عنه ؟">
                                    <button class="input-group-append search_btn" type="submit">
                                        <i class="search__icon"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-lg-4 col-xl-3 d-flex justify-content-between align-items-center px-lg-0 main_links_wrapper d_mob_none">
                         

     <?php echo qtranxf_generateLanguageSelectCode('short');?>

                            <span class="lang-divider"></span>
                            <div class="account__des dropdown">
                                <a class="account_link dropdown-toggle" href="#" id="dropthree" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="welcome__wrapper">
                                        <?php if(is_user_logged_in()){

$current_user = wp_get_current_user();

                                            ?>
                                        <span class="welcome__name ">
  <?php _e("<!--:en-->Wellcome<!--:--><!--:ar-->اهلا <!--:-->"); ?>



<?php  echo $current_user->user_firstname ;?>
                                        </span>
                                    <?php 


                                } ?>
                                        <span>حسابي</span>
                                    </div>
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropthree">
                                  
         <?php if(!is_user_logged_in()){?>
                                               <a  class="dropdown-item" href="<?php echo site_url();?>/my-account/edit-account"> 

  <?php _e("<!--:en-->Login<!--:--><!--:ar-->دخول<!--:-->"); ?>

                                               </a><a class="dropdown-item" href="<?php echo site_url();?>/my-account/edit-account/?register">
  <?php _e("<!--:en-->Register<!--:--><!--:ar-->تسجيل<!--:-->"); ?>

                                                 </a>
                                                                               </a><a class="dropdown-item" href="<?php echo site_url();?>/vendor-register/">
  <?php echo get_the_title(594); ?>

                                                 </a>
                 
                                                 
                                                 
                                            <?php }else{ ?>
                                    <a class="dropdown-item" href="<?php echo site_url();?>/my-account/edit-account/">
  <?php _e("<!--:en-->My account<!--:--><!--:ar-->حسابي<!--:-->"); ?>
</a>
<?php }     ?>

                                </div>
                            </div>
                            <span class="lang-divider"></span>
<div class="main__link__grey account_link">
                                                                    <?php echo do_shortcode('[xoo_wsc_cart]');?>
</div>
                           <!--  <a href="#" class="main__link__grey account_link"> 
                                <span class="p__relative">
                                    <i class="bag__icon"></i>
                                    <span class="num-cart">2</span>
                                </span>
                                عربة التسوق
                            </a> -->
                        </div>
                    </div>

                </div>
            </div>
            <!--headerNav-->
            <div class="headerNav">
                <div class="container px-0">
                    <ul class="my__navbar">
                        <li class="nav-item all__cats">
                            <a class="nav-link has__sub__menu" href="#" >
                                <i class="menu__icon"></i>  

  <?php _e("<!--:en-->All Categories<!--:--><!--:ar-->جميع الأقسام <!--:-->"); ?>

                                 <i class="fa fa-chevron-down"></i>
                            </a>
                            <div class="sub__wide__menu">
                                <ul class="second__menu">
                                    <li>
                                        <a href="<?php echo site_url();?>" class="has__third__menu">

  <?php _e("<!--:en-->Home<!--:--><!--:ar-->الرئيسية  <!--:-->"); ?>

                                        </a>
                                    </li>

                   <?php
$args =  array(
 'parent'            => '0',
    'hide_empty'        => false, 
   
); 
$terms = get_terms( 'product_cat', $args );
    foreach ( $terms as $term ) {
        $term_children = get_term_children($term->term_id, 'product_cat'); 

        ?>

      
      
                                       <li>
                                        <a href="<?php echo get_term_link($term);?>" class="has__third__menu">

<?php echo $term->name; ?>

                                        </a>

                                        <?php 
if($term_children){
                                        ?>
                                        <ul class="sub__third__menu">
                                            <?php foreach ( $term_children as $child ) {
    $term2 = get_term_by( 'id', $child, 'product_cat' );
    echo '<li><a href="' . get_term_link( $child, 'product_cat' ) . '">' . $term2->name . '</a></li>';
}
?>
                                        </ul>
                        <?php  } ?>

                                    </li>


                                <?php  } ?>


                               
                                </ul>
                            </div>
                        </li>



<?php wp_nav_menu( array(   'walker' => new submenu_wrap(), 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'header-menu' ) ); ?>


                    </ul>
                   
                </div>
                
            </div>
        </div>
    </header>
    <!--end header-->
