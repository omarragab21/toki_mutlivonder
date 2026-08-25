<?php get_header(); ?>
 <!-- __1____ start top banner-->
    <section class="main__banner__section">
        <div class="container px-0">
            <div class="main_banner">
                <a href="#">
                    <img src="<?php bloginfo('template_directory'); ?>/img/banner.png" alt="">
                </a>
            </div>
        </div>
    </section>

    <!-- __2___ start main slider-->
    <section class="main__slider__section">
        <div class="container px-0">
            <div class="row slider__row">
                <div class="col-12 col-lg-8 offers__slider padding__end__7">
                    <div id="mainSliderOne" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#mainSliderOne" data-slide-to="0" class="active"></li>
                            <li data-target="#mainSliderOne" data-slide-to="1"></li>
                            <li data-target="#mainSliderOne" data-slide-to="2"></li>
                            <li data-target="#mainSliderOne" data-slide-to="3"></li>
                            <li data-target="#mainSliderOne" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                               <a href="#" class="d-block w-100">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/banner1.png" class="d-block w-100" alt="...">
                               </a>
                          </div>
                          <div class="carousel-item">
                               <a href="#" class="d-block w-100">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/banner1.png" class="d-block w-100" alt="...">
                               </a>
                          </div>
                          <div class="carousel-item">
                              <a href="#" class="d-block w-100">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/banner1.png" class="d-block w-100" alt="...">
                               </a>
                          </div>
                          <div class="carousel-item">
                               <a href="#" class="d-block w-100">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/banner1.png" class="d-block w-100" alt="...">
                               </a>
                          </div>
                          <div class="carousel-item">
                               <a href="#" class="d-block w-100">
                                    <img src="<?php bloginfo('template_directory'); ?>/img/banner1.png" class="d-block w-100" alt="...">
                               </a>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#mainSliderOne" data-slide="prev">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#mainSliderOne" data-slide="next">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                      </div>
                </div>
                <div class="col-12 col-lg-4 mini__offers padding__start__7">
                    <div class="width__50">
                        <a href="#" class="fashion_men">
                            <img src="<?php bloginfo('template_directory'); ?>/img/men.png" alt="" class="w-100">
                        </a>
                    </div>
                    <div class="width__50">
                        <a href="#" class="fashion_men">
                            <img src="<?php bloginfo('template_directory'); ?>/img/women.png" alt="" class="w-100">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __3___ start categories section-->
    <section class="categories__section">
        <div class="container categories__container">
            <div class="eight_items_carousel">




               <?php
$args =  array(
 'parent'            => '0',
    'hide_empty'        => false, 
   
); 
$terms = get_terms( 'product_cat', $args );
    foreach ( $terms as $term ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>
                <div class="one_item">
                    <a class="shopping__card" href="<?php echo get_term_link($term);?>">
                        <img src="<?php echo $image;?>" alt="<?php echo $term->title;?>" class="shop__img">
                        <h3 class="shop__title"><?php echo $term->title;?></h3>
                    </a>
                </div>
               
               <?php } ?>
               
                
            </div>

        </div>
    </section>

    <!-- __4___ start safety section-->
    <section class="safety__section">
        <div class="container safety__container">
            <div class="row safety__row">


               <?php
$args =  array(
 'parent'            => '0',
    'hide_empty'        => false, 
    'number'=>4
   
); 
$terms = get_terms( 'product_cat', $args );
    foreach ( $terms as $term ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>
                <div class="col-6 col-md-3">
                    <a href="<?php echo get_term_link($term);?>" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php echo $image;?>" alt="<?php echo $term->name;?>">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center"><?php echo $term->name;?></div>
                    </a>
                </div>
            
            <?php } ?>
            </div>
        </div>
    </section>

    <!-- __5___ start products section منتجات مميزة -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">منتجات مميزة</h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                   <?php 
query_posts('post_type=product&showposts=5');

if(have_posts()) : while(have_posts()) : the_post();
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%';

    ?>

                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                     <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>

                            </div>
                                                       <a href="<?php the_permalink();?>" class="card-img-top">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="product-img">
                            </a>

                           <div class="product__body">

                                <a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title();?></h3></a>

                            <?php if ($sale){
                                ?>
 <div class="new__price">
    <?php 
    echo $sale.' '.$currency;
    ?>
 </div>
                                <div class="old__price"> 
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                     <span>
                                        <?php
 _e("<!--:en-->Sale <!--:--><!--:ar-->خصم <!--:-->");
?>

<?php echo $saving_percentage;?>
                                     </span>
                                </div>


<?php }else{
?>
 <div class="new__price">
    <?php 
    echo $price.' '.$currency;
    ?>
 </div>
<?php
}
$average      = round($product->get_average_rating());

?>

                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  endwhile; else : endif ; wp_reset_query();?>

                </div>
            </div>
            
        </div>
    </section>

    <!-- __6___ start mega offers section  عروض ميجا -->
    <section class="mega__section">
        <div class="container mega__container">
            <div class="title__wrapper">
                <h3 class="main-title">عروض ميجا <span class="red__offer">لمدة 24 ساعة بس!</span></h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row mega__row">
                <div class="col-6 col-md-3">
                    <div class="mega__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <a href="#" class="mega__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/m-1.png" alt="">
                        </a>
                        <div class="mega__body">
                            <a href="#"><h3 class="mega_title">سامسونج تاب A8  وذاكرة رام 3 جيجا 32 جيجا رمادى</h3></a>
                            <div class="bold_price">
                                <span>1754,00 رس</span>
                                <del>1969,00 رس</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="mega__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <a href="#" class="mega__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/m-2.png" alt="">
                        </a>
                        <div class="mega__body">
                            <a href="#"><h3 class="mega_title">أطقم تيشريات أطفال مكونة من 6 قطع</h3></a>
                            <div class="bold_price">
                                <span>1754,00 رس</span>
                                <del>1969,00 رس</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="mega__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <a href="#" class="mega__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/m-3.png" alt="">
                        </a>
                        <div class="mega__body">
                            <a href="#"><h3 class="mega_title">بينتولا طقم أوانى طبخ جرانيت 9 قطع</h3></a>
                            <div class="bold_price">
                                <span>1754,00 رس</span>
                                <del>1969,00 رس</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="mega__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <a href="#" class="mega__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/m-4.png" alt="">
                        </a>
                        <div class="mega__body">
                            <a href="#"><h3 class="mega_title">سامسونج تاب A8  وذاكرة رام 3 جيجا 32 جيجا رمادى</h3></a>
                            <div class="bold_price">
                                <span>1754,00 رس</span>
                                <del>1969,00 رس</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __7___ start products section منتجات شيكت عليها -->
    <section class="products__section">
        <div class="container products__container bk__change">
            <div class="title__wrapper">
                <h3 class="main-title">منتجات شيكت عليها  </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                   

             <?php 
query_posts('post_type=product&showposts=5');

if(have_posts()) : while(have_posts()) : the_post();
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%';

    ?>

                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                     <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>

                            </div>
                                                       <a href="<?php the_permalink();?>" class="card-img-top">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="product-img">
                            </a>

                           <div class="product__body">

                                <a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title();?></h3></a>

                            <?php if ($sale){
                                ?>
 <div class="new__price">
    <?php 
    echo $sale.' '.$currency;
    ?>
 </div>
                                <div class="old__price"> 
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                     <span>
                                        <?php
 _e("<!--:en-->Sale <!--:--><!--:ar-->خصم <!--:-->");
?>

<?php echo $saving_percentage;?>
                                     </span>
                                </div>


<?php }else{
?>
 <div class="new__price">
    <?php 
    echo $price.' '.$currency;
    ?>
 </div>
<?php
}
$average      = round($product->get_average_rating());

?>

                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  endwhile; else : endif ; wp_reset_query();?>
                   
                </div>
            </div>
        </div>
    </section>

    <!-- __8___ start discount section خصم 30%-->
    <section class="safety__section">
        <div class="container safety__container">
            <div class="row safety__row">
                <div class="col-6 col-md-3">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_sf-1.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_sf-2.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_1sf-3.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_sf-1.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __9___ start toki offers section  عروض توكي -->
    <section class="mega__section">
        <div class="container mega__container">
            <div class="title__wrapper">
                <h3 class="main-title">عروض بس فى توكي</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row mega__row">
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-3.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-4.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __10___ start products section  عروض على الالكترونيات -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">عروض على الالكترونيات</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-1.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-2.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-3.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-4.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-5.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __11___ start discount section خصم 30%-->
    <section class="safety__section">
        <div class="container safety__container">
            <div class="row safety__row">
                <div class="col-6 col-md-3 col-lg-4">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_sf-1.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-4">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_sf-2.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-4">
                    <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rsz_1sf-3.png" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>خصم حتى 30%</span>
                            <small>لكل فعاليات الصيف</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __12___ start center banner section  قسط بدون فوائد-->
    <section class="center__banner">
        <div class="container px-0">
            <div id="centerBanner" class="carousel slide centerBanner" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="#" class="d-block w-100">
                            <img src="<?php bloginfo('template_directory'); ?>/img/banner3.png" class="d-block w-100" alt="...">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="d-block w-100">
                            <img src="<?php bloginfo('template_directory'); ?>/img/banner3.png" class="d-block w-100" alt="...">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#" class="d-block w-100">
                            <img src="<?php bloginfo('template_directory'); ?>/img/banner3.png" class="d-block w-100" alt="...">
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#centerBanner" data-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-target="#centerBanner" data-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">عروض على الجوالات</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                                 <?php 
query_posts('post_type=product&showposts=5');

if(have_posts()) : while(have_posts()) : the_post();
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%';

    ?>

                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                     <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>

                            </div>
                                                       <a href="<?php the_permalink();?>" class="card-img-top">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="product-img">
                            </a>

                           <div class="product__body">

                                <a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title();?></h3></a>

                            <?php if ($sale){
                                ?>
 <div class="new__price">
    <?php 
    echo $sale.' '.$currency;
    ?>
 </div>
                                <div class="old__price"> 
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                     <span>
                                        <?php
 _e("<!--:en-->Sale <!--:--><!--:ar-->خصم <!--:-->");
?>

<?php echo $saving_percentage;?>
                                     </span>
                                </div>


<?php }else{
?>
 <div class="new__price">
    <?php 
    echo $price.' '.$currency;
    ?>
 </div>
<?php
}
$average      = round($product->get_average_rating());

?>

                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  endwhile; else : endif ; wp_reset_query();?>
                </div>
            </div>   
        </div>
    </section>

    <!-- __14___ start sale banner section   خصم 60%-->
    <section class="sale__banner">
        <div class="container px-0">
            <a href="#" class="sale_banner_link">
                <img src="<?php bloginfo('template_directory'); ?>/img/banner4.png" alt="" class="w-100">
            </a>
        </div>
    </section>

    <!-- __15___ start products section  عروض على اللابتوبات -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">عروض على اللابتوبات</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap.png" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                     <del>1969,00 رس</del>
                                     <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers">4.5</span>
                                       <small>(255)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <!-- __16___ start prices offers section  عروض التصفيات -->
    <section class="mega__section">
        <div class="container mega__container bk__orange">
            <div class="center__wrapper">
                <h3 class="center__title">تحطيم أسعار يومي</h3>
                <h3 class="center__title mr__30">عروض التصفيات</h3>
            </div>
            <div class="row mega__row">
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-3.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="#" class="tablet__offer">عروض التابلت</a>
                        <div class="toki__content">
                            <a href="#">
                                <h3 class="toki_title">مكبر صوت متعدد الوسائط</h3>
                            </a>
                            <div class="toki__price">
                                <del>1969,00 رس</del>
                                <span>175 رس</span>
                            </div>
                        </div>
                        <a href="#" class="toki__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/t-4.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __17___ start more offers section  عروض تصفيات أكثر -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">عروض تصفيات أكثر </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/p-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>

    <!-- __18___ start sale banner section   خصم 60%-->
    <section class="sale__banner margin__50">
        <div class="container px-0">
            <a href="#" class="sale_banner_link">
                <img src="<?php bloginfo('template_directory'); ?>/img/banner5.png" alt="" class="w-100">
            </a>
        </div>
    </section>

    <!-- __19___ start womens offers section  أزياء النساء-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> <span class="r__off">خصم 40-70% </span> على أزياء النساء </h3>
                <a href="products.html" class="show__more main__btn w__152">كافة العروض <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/w-1.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">تبدأ من 39 ريال</h3>
                                <span>بلايز</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/w-2.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title"> خصم 40-70%</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/w-3.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">أقل من 199 ريال</h3>
                                <span>ملابس رياضية</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/w-4.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">أقل من 565 ريال</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/w-1.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">خصم 40-70%</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __20___ start men offers section  أزياء الرجال-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> <span class="r__off">خصم 40-70% </span> على أزياء الرجال </h3>
                <a href="products.html" class="show__more main__btn w__152">كافة العروض <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/men-1.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">تبدأ من 39 ريال</h3>
                                <span>بنطلونات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/men-2.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title"> خصم 40-70%</h3>
                                <span>تيشرتات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/men-3.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">أقل من 199 ريال</h3>
                                <span>الترنج بأقل سعر</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/men-4.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">أقل من 565 ريال</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/men-2.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">خصم 40-70%</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __21___ start children offers section  أزياء الأطفال-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> <span class="r__off">خصم 40-70% </span> على أزياء الأطفال </h3>
                <a href="products.html" class="show__more main__btn w__152">كافة العروض <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/ch-1.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">تبدأ من 39 ريال</h3>
                                <span>بنطلونات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/ch-2.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title"> خصم 40-70%</h3>
                                <span>تيشرتات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/ch-3.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">أقل من 199 ريال</h3>
                                <span>الترنج بأقل سعر</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/ch-4.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">أقل من 565 ريال</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php bloginfo('template_directory'); ?>/img/ch-5.png" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">خصم 40-70%</h3>
                                <span>أفضل الماركات</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __22___ start sale banner section   خصم 60%-->
    <section class="sale__banner margin__50">
        <div class="container px-0">
            <div class="sale_banner_link">
                <img src="<?php bloginfo('template_directory'); ?>/img/banner6.png" alt="" class="w-100 bk__banner">
                <div class="banner__content">
                    <h3 class="banner__title">تخفيضات تصل ل <span>50 %</span></h3>
                    <a href="#" class="shop_now main__btn">تسوق الان</a>
                </div>
            </div>
        </div>
    </section>

    <!-- __23___ start electronics section الالكترونيات -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> الالكترونيات</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">أجهزة الألعاب</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">كاميرات رقمية</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التابلت</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-4.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التلفزيونات</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-5.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">اكسسوارات</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __24___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __25___ start mobiles section الجوالات والاكسسوارات -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> الجوالات والاكسسوارات</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/mob-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">جوالات الاندرويد </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-5.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">جوالات الايفون</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/mob-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">جوالات الاندرويد</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-5.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">اكسسوارات</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/mob-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">جوالات الاندرويد</div>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <!-- __26___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __27___ start mobiles section اللابتوبات والاكسسوارات -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> اللابتوبات والاكسسوارات</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">لابتوب ويندوز </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">ماك بوك</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">لابتوب ويندوز</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">لابتوب ألعاب</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/lap-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">ماك بوك</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __28___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __29___ start beuaty section  الجمال -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">الجمال</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> المكياج </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">العناية بالبشرة</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> العناية بالشعر</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> المكياج</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">العناية بالبشرة</div>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <!-- __30___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __31___ start perfumes section  العطور -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">العطور</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/brf.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> العطور الرجالية </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/brf.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> العطور الرجالية </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/brf.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">  العطور الرجالية </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/brf.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> العطور الرجالية </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/brf.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> العطور الرجالية </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __32___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __33___ start house section  المطبخ والبيت -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">المطبخ والبيت</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">أطقم الطعام </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الاضاءة </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">  مفارش السرير </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الاضاءة </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الأثاث </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __34___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __35___ start toys section   الألعاب -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> الألعاب</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/play.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> سكوتر الأطفال </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/play.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> سكوتر الأطفال </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/play.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> سكوتر الأطفال </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/play.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> سكوتر الأطفال </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/play.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> سكوتر الأطفال </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __36___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __37___ start sale banner section   خصم 60%-->
    <section class="sale__banner margin__50">
        <div class="container px-0">
            <div class="sale_banner_link">
                <img src="<?php bloginfo('template_directory'); ?>/img/banner7.png" alt="" class="w-100">
            </div>
        </div>
    </section>

    <!-- __38___ start toys section   كل مايحتاجه طفلك -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> كل مايحتاجه طفلك </h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/cn-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">  كراسي السيارات </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/cn-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">  حفاظات </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/cn-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> كراسي السيارات </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/cn-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">حفاظات </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/cn-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> كراسي السيارات </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __39___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __40___ start sport section   مستلزمات الرياضة-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> مستلزمات الرياضة</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/rd-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">الدراجات </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/rd-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">  اللياقة البدنية </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/rd-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الدراجات</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/rd-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">اللياقة البدنية </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/rd-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الدراجات</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __41___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __42___ start market section   ماركت توكي -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> ماركت توكي </h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">الأثاث </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الالكترونيات</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الأثاث</div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/el-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الالكترونيات </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bt-3.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الأثاث </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __43___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __44___ start sale banner section   خصم 70%-->
    <section class="sale__banner margin__50">
        <div class="container px-0">
            <div class="sale_banner_link">
                <img src="<?php bloginfo('template_directory'); ?>/img/banner8.png" alt="" class="w-100">
            </div>
        </div>
    </section>

    <!-- __45___ start market section   الساعات-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> الساعات</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/wt.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Casio </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/wt.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Casio </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/wt.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Casio </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/wt.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Casio </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/wt.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Casio </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- __46___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __47___ start market section   النظارات-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> النظارات</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/nd.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Guess </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/nd.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Guess </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/nd.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Guess </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/nd.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Guess </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/nd.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">Guess </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- __48___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __49___ start market section   الصحة والتغذية-->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> الصحة والتغذية</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التدليك والاسترخاء </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التدليك والاسترخاء </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التدليك والاسترخاء </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التدليك والاسترخاء </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/bu-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66">التدليك والاسترخاء </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- __50___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- _51___ start market section    الأثاث -->
    <section class="cloth__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">  الأثاث</h3>
                <a href="products.html" class="show__more main__btn ">عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/k-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الكنب </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/k-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الكراسي </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/k-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الكنب </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/k-2.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الكراسي </div>
                        </a>
                    </div>
                    <div class="fourth__column__part">
                        <a href="#" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                                <img src="<?php bloginfo('template_directory'); ?>/img/k-1.png" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> الكنب </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- __52___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="container products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-2.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn green_color">ماركت</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                    <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                    <div class="new__price">1754,00 رس</div>
                                    <div class="old__price"> 
                                        <del>1969,00 رس</del>
                                        <span>خصم 10%</span>
                                    </div>
                                    <div class="bottom__wrapper">
                                        <div class="ex__type main__btn orange_color">اكسبرس</div>
                                        <div class="rate__num">
                                            <div class="r_stars">
                                                <i class="fa fa-star"></i>
                                            </div>
                                        <span class="r_numbers">4.5</span>
                                        <small>(255)</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-4.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn yellow_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="third__column__part">
                        <div class="card product-card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/off-5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                    <div class="ex__type main__btn orange_color">اكسبرس</div>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    <span class="r_numbers">4.5</span>
                                    <small>(255)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </section>

    <!-- __53___ start sale banner section   خصم 70%-->
    <section class="sale__banner margin__50">
        <div class="container px-0">
            <div class="sale_banner_link">
                <img src="<?php bloginfo('template_directory'); ?>/img/banner9.png" alt="" class="w-100">
            </div>
        </div>
    </section>

<?php get_footer(); ?>