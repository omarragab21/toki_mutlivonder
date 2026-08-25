<?php
$term = get_queried_object();
// $slider1 = get_field('slide', $term);
$slider1 = get_field('slide', $term->taxonomy . '_' . $term->term_id);
$ban = get_field('ban', $term->taxonomy . '_' . $term->term_id);
$link= get_field('link', $term->taxonomy . '_' . $term->term_id);
if($slider1){
?>
    <!-- __1___ start main slider-->
    <section class="main__slider__section">
        <div class="px-0">
            <div id="mainSliderTwo" class="carousel slide mainSliderTwo" data-ride="carousel">
                <ol class="carousel-indicators">
                    
                      <?php $x=0;foreach ($slider1 as $slide) {
                            ?>
                            <li data-target="#mainSliderOne" data-slide-to="<?php echo $x;?>" class="<?php if($x==0){echo 'active';}?>"></li>
                           <?php $x++;} ?>
                   
                </ol>
                <div class="carousel-inner">
             <?php $x=0;foreach ($slider1 as $slide) {
                            ?>
                          <div class="carousel-item <?php if($x==0){echo 'active';}?>">
                               <a href="<?php echo $slide['link']; ?>" class="d-block w-100">
                                    <img src="<?php echo $slide['img']; ?>" class="d-block w-100" alt="...">
                               </a>
                          </div>
                      <?php $x++;} ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#mainSliderTwo" data-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-target="#mainSliderTwo" data-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
              </div>
        </div>
    </section>
<?php }
if($ban){
?>
    <!-- __2____ start top banner-->
    <section class="main__banner__section">
        <div class="px-0">
            <div class="main_banner">
                <a href="<?php if($link){echo $link;}else{echo'#';}?>">
                    <img src="<?php echo $ban;?>" alt="">
                </a>
            </div>
        </div>
    </section>
<?php } ?>

    <!-- __3___ start categories section-->
    <section class="categories__section">
        <div class="categories__container">
            <div class="seven_items_carousel">

               <?php
$args =  array(
 'parent'            => $term->term_id,
    'hide_empty'        => false, 
   
); 
$terms = get_terms( 'product_cat', $args );
    foreach ( $terms as $term2 ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term2->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>

                <div class="one_item">
                    <a class="shopping__card" href="<?php echo get_term_link($term2);?>">
                        <img src="<?php echo $image; ?>" alt="" class="shop__img">
                        <h3 class="shop__title"><?php echo $term2->name;?></h3>
                    </a>
                </div>
            <?php } ?>
            
            </div>

           
        </div>
    </section>

    <!-- __4___ start products section  افضل منتجات المطبخ والبيت -->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                    
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{

?>
أفضل منتجات
<?php  echo $term->name; ?>

<?php

}else{
?>
<?php  echo $term->name; ?>
best products
<?php
}
?>


                </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">

 <?php 
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 5,
      'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $term->term_id,
    ),
   ),
    'meta_query'     => array(
        'relation' => 'OR',
        array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
        array( // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        )
    )
);

$the_query = new WP_Query( $args );



// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
global $woocommerce;
global $product;

$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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

                                <a href="<?php the_permalink();?>"><h3 class="card-title">


                                    <?php the_title();?></h3></a>

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php              
//  echo get_the_author_ID();
 echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>


                   
<?php     }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();?>



                </div>
            </div>
            
        </div>
    </section>

    <!-- __5___ start products section اخر ماوصل فى البيت والمطبخ-->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                                        
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{

?>
اخر ماوصل فى
<?php  echo $term->name; ?>

<?php

}else{
?>
<?php  echo $term->name; ?>
latest products
<?php
}
?>

                </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                 


 <?php 
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 5,
      'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $term->term_id,
    ),
   ),

);

$the_query = new WP_Query( $args );



// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
global $woocommerce;
global $product;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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

                                <a href="<?php the_permalink();?>"><h3 class="card-title">


                                    <?php the_title();?></h3></a>

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>


                   
<?php     }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();?>



                </div>
            </div>
            
        </div>
    </section>
<?php 
$ban2 = get_field('ban2', $term->taxonomy . '_' . $term->term_id);
$link2= get_field('link2', $term->taxonomy . '_' . $term->term_id);
?>
    <!-- __6___ start sale banner section  العودة للمدارس-->
    <section class="sale__banner">
        <div class="px-0">
            <a href="<?php echo $link2;?>" class="sale_banner_link">
                <img src="<?php echo $ban2;?>" alt="" class="w-100">
            </a>
        </div>
    </section>
<?php 
$section = get_field('section', $term->taxonomy . '_' . $term->term_id);
$section2 = get_field('section2', $term->taxonomy . '_' . $term->term_id);
$data = $section['data'];
$data2 = $section2['data'];
if($section['title1']){
?>
    <!-- __7___ start bags section   الشنط-->
    <section class="bags__section">
        <div class="bags__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section['title1'];?></h3>
                <p class="main__center__des">
                    <?php echo $section['desc1'];?>
                </p>
            </div>
            <div class="row bags__row">

<?php 
foreach ($data as $k) {
    // code...
?>
                <div class="col-6">
                    <a href="<?php echo $k['link22'];?>" class="bag__card">
                        <div class="bags__img">
                            <img src="<?php echo $k['image'];?>" alt="">
                        </div>
                        <h3 class="bag__title"><?php echo $k['text2'];?></h3>
                    </a>
                </div>
            <?php } ?>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">

<?php 
if($data2){

foreach ($data2 as $k2) {
    // code...
?>
                    <div class="third__column__part">
                        <a href="<?php echo $k2['link22']?>" class="person__bag__card">
                            <div class="person__bags__img">
                            <img src="<?php echo $k2['image'];?>" alt="">

                            </div>
                        <h3 class="bag__title"><?php echo $k2['text2'];?></h3>
                        </a>
                    </div>
                <?php } } ?>
             
                </div>
            </div>
        </div>
    </section>
<?php }

$section3 = get_field('section3', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section3['title1']){ ?>
    <!-- __8___ start electronics section الالكترونيات -->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section3['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">


                    <?php foreach ($section3['data'] as $k3) {
?>
                    <div class="my__col__three">
                        <a href="<?php echo $k3['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius">
                                <img src="<?php echo $k3['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius">
                                <?php echo $k3['text2'];?>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
  
<?php 

$cat99=get_field('cat99', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat99, 'product_cat');
if($category){
?>


     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'عروض    علي ' . $category->name;
}else{

echo $category->name .' Offers';

}
?>

                </h3>
                <a href="<?php echo @get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat99,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>
<?php 
}
$section4 = get_field('section4', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section4['title1']){ ?>
    <!-- __8___ start electronics section الالكترونيات -->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section4['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row  prodcut__grid__row">


                    <?php foreach ($section4['data'] as $k4) {
?>
                    <div class="my__col__three">
                        <a href="<?php echo $k4['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k4['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius">
                                <?php echo $k4['text2'];?>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
    
<?php 

$cat100=get_field('cat100', $term->taxonomy . '_' . $term->term_id);
if($cat100){

?>
    <!-- __11___ start brands section  ماركات -->
    <section class="brands__section">
        <div class=" brands__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title purple__bk">
<?php _e("<!--:en-->Brands you love<!--:--><!--:ar--> ماركات تحبها<!--:-->"); ?>
                </h3>
            </div>
            <div class="brands_items_carousel">
                <?php
$args2a =  array(
 // 'parent'            => '0',
    'hide_empty'        => false, 
      'include' => $cat100

   
); 
$terms22 = get_terms( 'brand', $args2a);
$x=0;

    foreach ( $terms22 as $term2 ) {
 $image= get_field('image', $term2->taxonomy . '_' . $term2->term_id);

        ?>


                <div class="one_item">
                    <a href="<?php echo get_term_link($term2);?>" class="brand_card">
                        <img src="<?php echo $image;?>" alt="">
                    </a>
                </div>
              <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section5 = get_field('section5', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section5['title1']){ ?>
    <!-- __12___ start children section   أزياء الاطفال-->
    <section class="bags__section">
        <div class="center__title__wrapper lighter__bk container">
            <h3 class="main__center__title"><?php echo $section5['title1'];?></h3>
        </div>
        <div class=" white__bk pt__20">
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">

                    <?php foreach ($section5['data'] as $k5) {
?>
                    <div class="third__column__part">
                        <a href="<?php echo $k5['link22'];?>" class="person__bag__card">
                            <div class="person__bags__img">
                                <img src="<?php echo $k5['image'];?>" alt="">
                            </div>
                            <h3 class="bag__title"> 
                                <?php echo $k5['text2'];?>

                             </h3>
                        </a>
                    </div>
                    <?php } ?>
                
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section6 = get_field('section6', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section6['title1']){ ?>

    <!-- __13___ start women section  أزياء النساء-->
    <section class="cloth__section">
        <div class=" white__bk pt__20">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"> <?php echo $section6['title1'];?> </h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                                        <?php foreach ($section6['data'] as $k6) {
?>
                    <div class="my__col__two">
                        <a href="<?php echo $k6['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k6['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius"> 
                                <?php echo $k6['text2'];?>

                            </div>
                        </a>
                    </div>
               <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section7= get_field('section7', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section7['title1']){ ?>

    <!-- __14___ start men section  أزياء الرجال-->
    <section class="cloth__section">
        <div class=" white__bk pt__20">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section7['title1'];?><h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">

                                        <?php foreach ($section7['data'] as $k7) {
?>

                    <div class="my__col__two">
                        <a href="<?php echo $k7['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k7['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius"> 

                                <?php echo $k7['text2'];?>
                            </div>
                        </a>
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<?php 

$cat111=get_field('cat111', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat111, 'product_cat');
if($category){
?>


     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'عروض    علي ' . $category->name;
}else{

echo $category->name .' Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat111,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>

   <?php 
}
$slide2 = get_field('slide2', $term->taxonomy . '_' . $term->term_id);
if($slide2){ ?>
     <!-- __16___ start center banner section -->
     <section class="center__banner mbt__30">
        <div class="px-0">
            <div id="centerBanner2" class="carousel slide centerBanner" data-ride="carousel">
                <div class="carousel-inner">


<?php 
   $x=0;foreach ($slide2 as $slideb) {
                            ?>
                          <div class="carousel-item <?php if($x==0){echo 'active';}?>">
                               <a href="<?php echo $slideb['link']; ?>" class="d-block w-100">
                                    <img src="<?php echo $slideb['img']; ?>" class="d-block w-100" alt="...">
                               </a>
                          </div>
                      <?php $x++;} ?>

                </div>
                <button class="carousel-control-prev" type="button" data-target="#centerBanner2" data-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-target="#centerBanner2" data-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
                     <?php 
                 }
$slide3 = get_field('slide3', $term->taxonomy . '_' . $term->term_id);
if($slide3){?>
     <!-- __17___ start center banner section -->
     <section class="center__banner mbt__30">
        <div class="px-0">
            <div id="centerBanner3" class="carousel slide centerBanner" data-ride="carousel">
                <div class="carousel-inner">


  <?php
   $x=0;foreach ($slide3 as $slide) {
                            ?>
                          <div class="carousel-item <?php if($x==0){echo 'active';}?>">
                               <a href="<?php echo $slide['link']; ?>" class="d-block w-100">
                                    <img src="<?php echo $slide['img']; ?>" class="d-block w-100" alt="...">
                               </a>
                          </div>
                      <?php $x++;}?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#centerBanner3" data-slide="prev">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="carousel-control-next" type="button" data-target="#centerBanner3" data-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
<?php 
}
$section8 = get_field('section8', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section8['title1']){ ?>
    <!-- __18___ start books section  كتب-->
    <section class="bags__section">
        <div class=" lighter__bk">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php  echo $section8['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">

                    <?php foreach ($section8['data'] as $k8) {
?>
                    <div class="third__column__part">
                        <a href="<?php echo $k8['link22'];?>" class="book__card">
                            <div class="book__img">
                                <img src="<?php echo $k8['image'];?>" alt="">
                            </div>
                            <h3 class="bag__title"> 
                                <?php echo $k8['text2'];?>

                            </h3>
                        </a>
                    </div>
                <?php } ?>
               
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section9 = get_field('section9', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section9['title1']){ ?>
    <!-- __19___ start house favs section مفضلات للبيت والمطبخ -->
    <section class="cloth__section">
        <div class=" bags__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section9['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">

                    <?php foreach ($section9['data'] as $k9) {
?>
                    <div class="my__col__three">
                        <a href="<?php echo $k9['link22'];?>" class="house__card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius">
                                <img src="<?php echo $k9['image'];?>" alt="">
                            </div>
                            <h3 class="bag__title text-center mt__20">
                                <?php echo $k9['text2'];?>
                                
                            </h3>
                        </a>
                    </div>
        <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>



<?php 

$cat112=get_field('cat112', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat112, 'product_cat');
if($category){
?>


     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'عروض    علي ' . $category->name;
}else{

echo $category->name .' Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat112,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>

<?php 
}
$section10 = get_field('section10', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section10['title1']){ ?>

    <!-- __21___ start beauty section  الجمال والحلاقة -->
    <section class="cloth__section">
        <div class=" white__bk">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section10['title1']; ?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                 <?php foreach ($section10['data'] as $k10) {
?>
                    <div class="my__col__three">
                        <a href="<?php echo $k10['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k10['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius">
                                <?php echo $k10['text2'];?>
                                

                            </div>
                        </a>
                    </div>
                <?php } ?>

                </div>
            </div>
        </div>
    </section>
<?php } ?>
  
<?php 

$cat113=get_field('cat113', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat113, 'product_cat');
if($category){
?>


     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'عروض    علي ' . $category->name;
}else{

echo $category->name .' Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat113,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>

<?php 
}
$section11 = get_field('section11', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section11['title1']){ ?>


    <!-- __23___ start meals section   أجهزة تحضير الوجبات اللذيذة -->
    <section class="cloth__section">
        <div class=" lighter__bk pt__20">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section11['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">


                    <?php foreach ($section11['data'] as $k11) {
?>
                    <div class="my__col__three">
                        <a href="<?php echo $k11['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k11['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius">  
                                <?php echo $k11['text2'];?>

                            </div>
                        </a>
                    </div>
                  
<?php } ?>

                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section12 = get_field('section12', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section12['title1']){ ?>
    <!-- __24___ start care section   مستلزمات العناية الصحية -->
    <section class="cloth__section">
        <div class=" white__bk padding__50">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section12['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                                    <?php foreach ($section12['data'] as $k12) {
?>
                    <div class="my__col__three">
                        <a href="<?php echo $k12['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k12['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius">   
                                <?php echo $k12['text2'];?>
                            </div>
                        </a>
                    </div>
              <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section13 = get_field('section13', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section13['title1']){ ?>
    <!-- __25___ start games section   ألعاب لتعليم ممتع-->
    <section class="cloth__section">
        <div class=" lighter__bk pt__20">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section13['title1'];?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">

                                        <?php foreach ($section13['data'] as $k13) {
?>
                    <div class="third__column__part">
                        <a href="<?php echo $k13['link22'];?>" class="safety_card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius border__orange">
                                <img src="<?php echo $k13['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66 not__radius">  
                                <?php echo $k13['text2'];?>
                             </div>
                        </a>
                    </div>
                   <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php 

$cat114=get_field('cat114', $term->taxonomy . '_' . $term->term_id);
?>


     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title mx-auto">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo ' اكتشف المزيد ';
}else{

echo 'View More';

}
?>
                </h3>



              
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '10', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat114,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>



<?php 

$cat115=get_field('cat115', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat115, 'product_cat');
if($category){
?>


     <!-- __13___ start produسسسسcts section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'عروض    علي ' . $category->name;
}else{

echo $category->name .' Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat115,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>



<?php 
}
$cat116=get_field('cat116', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat116, 'product_cat');
if($category){
?>


     <!-- __13___ start produسسسسcts section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                       <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo ' احسن العروض ';
}else{

echo 'Best Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat116,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>
<?php 
}
$section14 = get_field('section14', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section14['data']){ ?>


    <!-- __28___ start discount section خصم 30%-->
    <section class="safety__section">
        <div class=" safety__container">
            <div class="row safety__row">
                                 <?php foreach ($section14['data'] as $k14) {
?>
                <div class="col-6 col-md-3 col-lg-4">
                    <a href="<?php echo $k14['link22'];?>" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                                <img src="<?php echo $k14['image'];?>" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <span>                                <?php echo $k14['text2'];?>
</span>
                            <small>
                                <?php echo $k14['text3'];?>
                                
                            </small>
                        </div>
                    </a>
                </div>
            <?php } ?>
          
            </div>
        </div>
    </section>
            <?php } ?>
<?php 
$section15 = get_field('section15', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section15['title1']){ ?>
  
    <!-- __29___ start beauty section  مستلزمات الجمال-->
    <section class="cloth__section">
        <div class=" lighter__bk pt__20">
            <div class="center__title__wrapper">
                <h3 class="main__center__title">
                    <?php echo $section15['title1']; ?>
                </h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                                     <?php foreach ($section15['data'] as $k15) {
?>
                    <div class="my__col__6">
                        <a href="<?php echo $k15['link22'];?>" class="beauty__offer__card mb__30 wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                                <img src="<?php echo $k15['image'];?>" alt="">
                            <div class="offer__btn">
                                <strong class="d-block">
                                <?php echo $k15['text2'];?>
                                </strong>
                                <span class="d-block">
                                <?php echo $k15['text3'];?>
                                    
                                </span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
                 
                </div>
            </div>
        </div>
    </section>
<?php } ?>
   



<?php 

$cat117=get_field('cat117', $term->taxonomy . '_' . $term->term_id);
$category = get_term_by('id', $cat117, 'product_cat');
if($category){

?>


     <!-- __13___ start produسسسسcts section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                       <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo ' اخر ما وصل ';
}else{

echo 'Latest Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat117,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>
<?php 
}
$section16 = get_field('section16', $term->taxonomy . '_' . $term->term_id);

 ?>
 <?php if($section16['title1']){ ?>

    <!-- __31___ start offers section   عرووض التصفيات-->
    <section class="cloth__section">
        <div class=" lighter__bk pt__20">
            <div class="start__title__wrapper">
                <h3 class="main__start__title"><?php echo $section16['title1']; ?></h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                 <?php foreach ($section16['data'] as $k16) {
                    ?>
                    <div class="my__col__12">
                        <a href="<?php echo $k16['link22'];?>" class="playoffs__card mb__30">
                                <?php echo $k16['text2'];?>
                         </a>
                    </div>
              <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
    <!-- __32___ start best offers section  عروض التصفيات-->
 

<?php 

$cat118=get_field('cat118', $term->taxonomy . '_' . $term->term_id);
if($cat118){
?>


     <!-- __13___ start products section  عروض على الجوالات -->
     <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'عروض    التصفيات ' ;
}else{

echo ' Offers';

}
?>

                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                
<div class="row prodcut__grid__row ">


          <?php 

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
        'posts_per_page'         => '5', // use -1 for all post

  'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat118,
    ),
   ),
);
$query1 = new WP_Query( $args );
while ( $query1->have_posts() ) {
    $query1->the_post();


global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ($price > 0 && $sale > 0) ? (@ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%') : '0%';

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
$review_count = $product->get_review_count();

?>

                                <div class="bottom__wrapper">
 <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
                                    <div class="rate__num">
                                        <div class="r_stars">
                                            <i class="fa fa-star"></i>
                                        </div>
                                       <span class="r_numbers"><?php echo $average;?></span>
                                       <small>(<?php echo $review_count;?>)</small>
                                    </div>
                                </div>
                           </div>
                        </div>
                    </div>
                    <?php  
}
wp_reset_postdata();


                    ?>




                </div>



            </div>   
        </div>
    </section>
<?php } ?>
    <!-- __33___ start categories section فئات أكثر-->
    <section class="categories__section">
        <div class="categories__container pbt__70">
            <div class="center__title__wrapper">
                <h3 class="main__center__title fit__content mx-auto">
                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{
echo 'فئات اكثر ' ;
}else{

echo 'More categories';

}
?>


                </h3>
            </div>
            <div class="more__items__carousel">
<?php

$args =  array(
 'parent'            => $term->term_id,
    'hide_empty'        => false, 
   
); 
$terms = get_terms( 'product_cat', $args );
    foreach ( $terms as $term2 ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term2->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>

                <div class="one_item">
                    <a class="shopping__card" href="<?php echo get_term_link($term2);?>">
                        <img src="<?php echo $image; ?>" alt="" class="shop__img">
                        <h3 class="shop__title"><?php echo $term2->name;?></h3>
                    </a>
                </div>
            <?php } ?>

         
            </div>

        </div>
    </section>
