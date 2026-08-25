<?php get_header(); ?>
 <!-- __1____ start top banner-->
    <section class="main__banner__section">
        <div class="px-0">
            <div class="main_banner">
<?php 
$ban1=get_field('banner1', 'option');
$ban2=get_field('banner2', 'option');
$ban3=get_field('banner3', 'option');
$slider1=get_field('slider','option');
?>

                <a href="<?php echo $ban1['link'];?>">
                    <img src="<?php echo $ban1['img'];?>" alt="">
                </a>
            </div>
        </div>
    </section>

    <!-- __2___ start main slider-->
    <section class="main__slider__section">
        <div class="px-0">
            <div class="row slider__row">
                <div class="col-12 col-lg-8 offers__slider padding__end__7">
                    <div id="mainSliderOne" class="carousel slide" data-ride="carousel">
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
                        
 <a href="<?php echo $ban2['link'];?>"  class="fashion_men">
                    <img src="<?php echo $ban2['img'];?>" alt="">
                </a>

                    </div>
                    <div class="width__50">
                       <a href="<?php echo $ban3['link'];?>"  class="fashion_men">
                    <img src="<?php echo $ban3['img'];?>" alt="">
                </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- __3___ start categories section-->
    <section class="categories__section">
        <div class="categories__container">
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
                        <img src="<?php echo $image;?>" alt="<?php echo $term->name;?>" class="shop__img">
                        <h3 class="shop__title"><?php echo $term->name;?></h3>
                    </a>
                </div>
               
               <?php } ?>
               
                
            </div>

        </div>
    </section>

    <!-- __4___ start safety section-->
    <section class="safety__section">
        <div class="safety__container">
            <div class="row safety__row">


               <?php
$cat1=get_field('cat1','option');
$args =  array(
 'parent'            => '0',
    'hide_empty'        => false, 
    'number'=>4,
      'include' => $cat1

   
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
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">

  <?php _e("<!--:en-->Special Products<!--:--><!--:ar-->   منتجات مميزة <!--:-->"); ?>

             </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                   <?php 

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 5,
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
                                    
                                    <?php
                                    echo writeMsg(get_the_author_ID(),get_the_ID());
                                    ?>
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
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


                    ?>

                </div>
            </div>
            
        </div>
    </section>
    
    
    <?php 
$section = get_field('section','option');
$section2 = get_field('section2','option');
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
        	 <div class="center__title__wrapper">
                <h3 class="main__center__title"><?php echo $section2['ttitle1'];?></h3>
                <p class="main__center__des">
                    <?php echo $section2['ddesc1'];?>
                </p>
            </div>
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

$section3 = get_field('section3','option');

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

$cat99=get_field('cat99','option');
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
}?>
<?php if(1==33){ ?>
    <!-- __6___ start mega offers section  عروض ميجا -->
    <section class="mega__section">
        <div class="mega__container">
            <div class="title__wrapper">
                <h3 class="main-title">

                      <?php 
if ( 'ar' === $GLOBALS['q_config']['language'])
{

?>
عروض ميجا 

<span class="red__offer">لمدة 24 ساعة بس!</span>
<?php

}else{

?>
Mega Offers
 <span class="red__offer">
for 24 Hour

                  </span>
<?php
}
?>


                  </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row mega__row">

<?php 
$pro=get_field('prodd','option');
// print_r($pro)
$args = array(
    'post_type' => array( 'product' ),
    // 'orderby' => 'ID',
    // 'orderby'=>'ASC',
    // 'orderby' => 'ASC',
    'posts_per_page' => 5,
 'orderby'=>'post__in',
 'order'=>'DESC',
    'post__in' => array_values($pro)
);
$the_query = new WP_Query( $args );



// $args = array(
//     'post_type'      => 'product',
//     'posts_per_page' => 5,
//     'meta_query'     => array(
       
//         array( // Variable products type
//         'key' => '_sale_price_dates_to',
//             'value' => '',
//             'compare' => '!='
//         )
//     )
// );

$the_query = new WP_Query( $args );



// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
$terms = get_the_terms( get_the_ID(), 'product_cat' );
?>

                <div class="col-6 col-md-3">
                    <div class="mega__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="<?php echo get_term_link($terms[0]);?>" class="tablet__offer">
  <?php _e("<!--:en--><!--:--><!--:ar-->عروض<!--:-->"); ?>

                            <?php 

echo $terms[0]->name;

                    ?>
                    </a>
                        <a href="<?php the_permalink(); ?>" class="mega__img">
                            <img src="<?php bloginfo('template_directory'); ?>/img/m-1.png" alt="">
                        </a>
                        <div class="mega__body">
                            <a href="<?php the_permalink(); ?>"><h3 class="mega_title">
                                <?php the_title();?>

                            </h3></a>
                            <div class="bold_price">
                      
                            <?php if ($sale){
                                ?>
 <span>
    <?php 
    echo $sale.' '.$currency;
    ?>
 </span>
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                  

<?php }else{
?>
 <span>
    <?php 
    echo $price.' '.$currency;
    ?>
</span>
<?php
}

?>
                            </div>
                        </div>
                    </div>
                </div>

                                   <?php  


    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


                    ?>

    
            </div>
        </div>
    </section>
<?php } ?>
<?php 

if($_SESSION['custmproduct']){
?>

    <!-- __7___ start products section منتجات شيكت عليها -->
    <section class="products__section">
        <div class="products__container bk__change">
            <div class="title__wrapper">
                <h3 class="main-title">
<?php _e("<!--:en-->Products i view<!--:--><!--:ar-->منتجات شيكت عليها   <!--:-->"); ?>

                 </h3>
                <a href="<?php echo site_url(); ?>/shop" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
                   

             <?php 
if($_SESSION['custmproduct']){
    $xx=$_SESSION['custmproduct'];

$args = array(
    'post_type' => array( 'product' ),
    'orderby' => 'ASC',
    'number'=>5,
    'post__in' => $xx
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
                                    
                                    
                               

 <?php
                                    echo writeMsg(get_the_author_ID(),get_the_ID());
                                    ?>
                                    
                                    
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

}
else{
    echo'<div class="text-center">لم تتصفح منتجات حتي الان</div>';
}
                    ?>
                   
                </div>
            </div>
        </div>
    </section>
<?php } ?>
    <!-- __8___ start discount section خصم 30%-->
    <section class="safety__section">
        <div class="safety__container">
            <div class="row safety__row">
              
<?php
$cat2=get_field('cat2','option');
$args2 =  array(
 'parent'            => '0',
    'hide_empty'        => false, 
    'number'=>4,
      'include' => $cat2
   
); 
$terms = get_terms( 'product_cat', $args2);
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
<?php if(1==444){ ?>
    <!-- __9___ start toki offers section  عروض توكي -->
    <section class="mega__section">
        <div class="mega__container">
            <div class="title__wrapper">
                <h3 class="main-title">
  <?php _e("<!--:en-->Offers only in Toki<!--:--><!--:ar-->  عروض بس فى توكي<!--:-->"); ?>

              </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row mega__row">


<?php 
$cat3=get_field('cat3','option');

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 4,
    'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat3,
    ),
   ),
   
);

$the_query = new WP_Query( $args );



// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();

        global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
$terms = get_the_terms( get_the_ID(), 'product_cat' );
?>



                <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">

    <a href="<?php echo get_term_link($terms[0]);?>" class="tablet__offer">
  <?php _e("<!--:en--><!--:--><!--:ar-->عروض<!--:-->"); ?>

                            <?php 

echo $terms[0]->name;

                    ?>
                </a>
                        <div class="toki__content">
  <a href="<?php the_permalink(); ?>"><h3 class="toki_title">
                                <?php the_title();?>

                            </h3></a>

                         
                            <div class="toki__price">
                               <?php if ($sale){
                                ?>
 <span>
    <?php 
    echo $sale.' '.$currency;
    ?>
 </span>
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                  

<?php }else{
?>
 <span>
    <?php 
    echo $price.' '.$currency;
    ?>
</span>
<?php
}

?>

                            </div>
                        </div>
                       
   <a href="<?php the_permalink();?>" class="toki__img">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" />
                            </a>

                    </div>
                </div>
                     <?php  


    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


                    ?>
           
            </div>
        </div>
    </section>

<?php } ?>
<?php 

$cat4=get_field('cat4','option');
$category = get_term_by('id', $cat4, 'product_cat');
?>
    <!-- __10___ start products section  عروض على الالكترونيات -->
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
        'terms'    => $cat4,
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

    <!-- __11___ start discount section خصم 30%-->
    <section class="safety__section">
        <div class="safety__container">
            <div class="row safety__row">

<?php 

$bann2=get_field('bann2','option');

foreach($bann2 as $banner){

?>

                <div class="col-6 col-md-3 col-lg-4">
                    <a href="<?php echo $banner['link'];?>" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <div class="safety__img">
                            <img src="<?php echo $banner['img'];?>" alt="">
                        </div>
                        <div class="safety_title main__btn hvr-underline-from-center h__85">
                            <?php echo $banner['text'];?>
                       
                        </div>
                    </a>
                </div>
          <?php } ?>
            </div>
        </div>
    </section>

    <!-- __12___ start center banner section  قسط بدون فوائد-->
    <section class="center__banner">
        <div class="px-0">
            <div id="centerBanner" class="carousel slide centerBanner" data-ride="carousel">
                <div class="carousel-inner">


<?php 

$slider22=get_field('slider22','option');
$x=0;
foreach($slider22 as $sl){

?>

                    <div class="carousel-item <?php if($x==0){ echo'active';}?>">
                        <a href="<?php echo $sl['link']; ?>" class="d-block w-100">
                            <img src="<?php echo $sl['img']; ?>" class="d-block w-100" alt="...">
                        </a>
                    </div>
             <?php $x++;} ?>
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


<?php 

$cat5=get_field('cat5','option');
$category = get_term_by('id', $cat5, 'product_cat');
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
        'terms'    => $cat5,
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

    <!-- __14___ start sale banner section   خصم 60%-->
    <section class="sale__banner">
        <div class="px-0">

            <?php 

$slider23=get_field('slider23','option');

foreach($slider23 as $banner){

?>
            <a href="<?php echo $banner['link'];?>" class="sale_banner_link">
                <img src="<?php echo $banner['img'];?>" alt="" class="w-100">
            </a>
        <?php } ?>
        </div>
    </section>

<!-- amr -->

<?php 

$cat6=get_field('cat6','option');
$category = get_term_by('id', $cat6, 'product_cat');
?>

    <!-- __15___ start products section  عروض على اللابتوبات -->
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
        'terms'    => $cat6,
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
<?php if(1==3){?>
    <!-- __16___ start prices offers section  عروض التصفيات -->
    <section class="mega__section">
        <div class="mega__container bk__orange">
            <div class="center__wrapper">
                <h3 class="center__title">
<?php
 _e("<!--:en-->Daily price smash <!--:--><!--:ar-->تحطيم أسعار يومي <!--:-->");
 ?>
</h3>
                <h3 class="center__title mr__30">
<?php
 _e("<!--:en-->Qualifier Offers<!--:--><!--:ar-->  عروض التصفيات <!--:-->");
 ?>
              </h3>
            </div>
            <div class="row mega__row">


 <?php 
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 4,
      'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat6,
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
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
$terms = get_the_terms( get_the_ID(), 'product_cat' );
    ?>


                     <div class="col-6 col-md-3">
                    <div class="toki__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">

    <a href="<?php echo get_term_link($terms[0]);?>" class="tablet__offer">
  <?php _e("<!--:en--><!--:--><!--:ar-->عروض<!--:-->"); ?>

                            <?php 

echo $terms[0]->name;

                    ?>
                </a>
                        <div class="toki__content">
  <a href="<?php the_permalink(); ?>"><h3 class="toki_title">
                                <?php the_title();?>

                            </h3></a>

                         
                            <div class="toki__price">
                               <?php if ($sale){
                                ?>
 <span>
    <?php 
    echo $sale.' '.$currency;
    ?>
 </span>
                                     <del>
  <?php 
    echo $price.' '.$currency;
    ?>
                                     </del>
                                  

<?php }else{
?>
 <span>
    <?php 
    echo $price.' '.$currency;
    ?>
</span>
<?php
}

?>

                            </div>
                        </div>
                       
   <a href="<?php the_permalink();?>" class="toki__img">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" />
                            </a>

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
    </section>
<?php } ?>


    <!-- __17___ start more offers section  عروض تصفيات أكثر -->
    <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
                    <?php _e("<!--:en-->More  Offers<!--:--><!--:ar-->عروض تصفيات أكثر<!--:-->"); ?>

                </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">




<?php 
$cat7=get_field('cat7','option');

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 5,
    'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $cat7,
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
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


                    ?>

                </div>
            </div>  
        </div>
    </section>

    <!-- __18___ start sale banner section   خصم 60%-->
    <section class="sale__banner margin__50">
        <div class="px-0">
<?php 

$bann22122=get_field('bann22122','option');

foreach($bann22122 as $banner){

?>

            <a href="<?php echo $banner['link'];?>" class="sale_banner_link">
                <img src="<?php echo $banner['img'];?>" alt="" class="w-100">
            </a>
        <?php } ?>
        </div>
    </section>

    <!-- __19___ start womens offers section  أزياء النساء-->
    <section class="cloth__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
<?php _e('<!--:en--><span class="r__off">40-70% off </span> womens fashion <!--:--><!--:ar--> <span class="r__off">خصم 40-70% </span> على أزياء النساء<!--:-->'); ?>

                 </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn w__152">

<?php _e("<!--:en--> All Offers<!--:--><!--:ar-->كافة  العروض <!--:-->"); ?>
                 <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
 <?php
$loop2=get_field('loop2','option');
$amrcat=array();
foreach($loop2 as $ca){
$amrcat[]=$ca['cat8'][0];
$amrtitle[]=$ca['title'];

}
$args2a =  array(
 // 'parent'            => '0',
    'hide_empty'        => false, 
    'number'=>5,
      'include' => $amrcat

   
); 
$terms22 = get_terms( 'product_cat', $args2a);
$x=0;

    foreach ( $terms22 as $term ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>
              

                    <div class="fourth__column__part">




                        <a href="<?php echo get_term_link($term);?>" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php echo $image;?>" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">
                                    <?php 

echo $amrtitle[$x];
                                    ?>

                                </h3>
                                <span><?php echo $term->name;?></span>
                            </div>
                        </a>
                    </div>

                <?php  $x++;}  ?>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- __20___ start men offers section  أزياء الرجال-->
    <section class="cloth__section">
        <div class="products__container">
            <div class="title__wrapper">

                <h3 class="main-title">

<?php _e('<!--:en--><span class="r__off">40-70% off </span> mens fashion <!--:--><!--:ar--> <span class="r__off">خصم 40-70% </span> على أزياء   الرجال<!--:-->'); ?>

                 </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn w__152">
<?php _e("<!--:en--> All Offers<!--:--><!--:ar-->كافة  العروض <!--:-->"); ?>

                 <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                 <?php
$loop2=get_field('loop3','option');
$amrcat2=array();
foreach($loop2 as $ca){
$amrcat2[]=$ca['cat9'][0];
$amrtitle2[]=$ca['title2'];

}
$args2a =  array(
 // 'parent'            => '0',
    'hide_empty'        => false, 
    'number'=>5,
      'include' => $amrcat2

   
); 
$terms22 = get_terms( 'product_cat', $args2a);
$x=0;

    foreach ( $terms22 as $term ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>
              

                    <div class="fourth__column__part">




                        <a href="<?php echo get_term_link($term);?>" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php echo $image;?>" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">
                                    <?php 

echo $amrtitle2[$x];
                                    ?>

                                </h3>
                                <span><?php echo $term->name;?></span>
                            </div>
                        </a>
                    </div>

                <?php  $x++;}  ?>
                </div>
            </div>
        </div>
    </section>

    <!-- __21___ start children offers section  أزياء الأطفال-->
    <section class="cloth__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> 
<?php _e('<!--:en--><span class="r__off">40-70% off </span> kids fashion <!--:--><!--:ar--> <span class="r__off">خصم 40-70% </span> على أزياء   الاطفال<!--:-->'); ?>

                 </h3>
                <a href="<?php echo site_url();?>/shop" class="show__more main__btn w__152">

<?php _e("<!--:en--> All Offers<!--:--><!--:ar-->كافة  العروض <!--:-->"); ?>

                 <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    
    <?php
$loop2=get_field('loop4','option');
$amrcat2=array();
foreach($loop2 as $ca){
$amrcat3[]=$ca['cat10'][0];
$amrtitle3[]=$ca['title3'];

}
$args2a =  array(
 // 'parent'            => '0',
    'hide_empty'        => false, 
    'number'=>5,
      'include' => $amrcat3

   
); 
$terms22 = get_terms( 'product_cat', $args2a);
$x=0;

    foreach ( $terms22 as $term ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>
              

                    <div class="fourth__column__part">




                        <a href="<?php echo get_term_link($term);?>" class="cloth__card wow bounceIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="colth__img">
                                <img src="<?php echo $image;?>" alt="">
                            </div>
                            <div class="cloth__content">
                                <h3 class="cloth_title">
                                    <?php 

echo $amrtitle3[$x];
                                    ?>

                                </h3>
                                <span><?php echo $term->name;?></span>
                            </div>
                        </a>
                    </div>

                <?php  $x++;}  ?>


                </div>
            </div>
        </div>
    </section>

    <!-- __22___ start sale banner section   خصم 60%-->
    <section class="sale__banner margin__50">
        <div class="px-0">
           <?php 

$bann33331=get_field('bann33331','option');

foreach($bann33331 as $bnaa){

?>
            <div class="sale_banner_link">
                <img src="<?php echo $bnaa['img'];?>" alt="" class="w-100 bk__banner">
                <div class="banner__content">
                    <h3 class="banner__title"><?php echo $bnaa['text'];?></h3>
                    <a href="<?php echo $bnaa['link'];?>" class="shop_now main__btn">
  <?php _e("<!--:en-->Shop Now<!--:--><!--:ar--> تسوق الان <!--:-->"); ?>
                        

                    </a>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>




<?php 

$cat12=get_field('cat12','option');
$bann334444=get_field('bann334444','option');
$i=0;
foreach($cat12 as $allcatdataid){
  $i++;
?>
<?php
  if ($i ==2) { 
   if($bann334444[0]){
           ?>
           
                      
           
<section class="sale__banner">
        <div class="px-0">

                
                    <a href="<?php echo $bann334444[0]['link'];?>" class="sale_banner_link">
                <img src="<?php echo $bann334444[0]['img'];?>" alt="" class="w-100">
            </a>
                </div>
    </section>

           
           
           <?php
        }
  }
?>


<?php
  if ($i ==4) { 
   if($bann334444[1]){
           ?>
                 
           
<section class="sale__banner">
        <div class="px-0">

                
                    <a href="<?php echo $bann334444[1]['link'];?>" class="sale_banner_link">
                <img src="<?php echo $bann334444[1]['img'];?>" alt="" class="w-100">
            </a>
                </div>
    </section>

           
           
           <?php
        }
  }
?>

<?php
  if ($i ==6) { 
   if($bann334444[2]){
           ?>
           
                  
           
<section class="sale__banner">
        <div class="px-0">

                
                    <a href="<?php echo $bann334444[2]['link'];?>" class="sale_banner_link">
                <img src="<?php echo $bann334444[2]['img'];?>" alt="" class="w-100">
            </a>
                </div>
    </section>

           
           <?php
        }
  }
?>


<?php
  if ($i ==8) { 
   if($bann334444[3]){
           ?>
           
           
<section class="sale__banner">
        <div class="px-0">

                
                    <a href="<?php echo $bann334444[3]['link'];?>" class="sale_banner_link">
                <img src="<?php echo $bann334444[3]['img'];?>" alt="" class="w-100">
            </a>
                </div>
    </section>


           
           
           
           
           
           <?php
        }
  }
?>


    <!-- __35___ start toys section   الألعاب -->
    <section class="cloth__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> 
<?php 
$category = get_term_by('id', $allcatdataid, 'product_cat');
echo $category->name;
?>
                </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>


            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">

<?php
$args2 =  array(
 'parent'            => $allcatdataid ,
    'hide_empty'        => false, 
    'number'=>5,
   
); 
$terms = get_terms( 'product_cat', $args2);
$g=0;
    foreach ( $terms as $term ) {

        ?>

<?php 
    $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>

                    <div class="fourth__column__part">
                        <a href="<?php echo get_term_link($term);?>" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212">
                            <img src="<?php echo $image;?>" alt="<?php echo $term->name;?>">

                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__66"> <?php echo $term->name;?> </div>
                        </a>
                    </div>
              <?php } ?>



                </div>
            </div>
        </div>
    </section>

    <!-- __36___ start best offers section  أحسن العروض -->
    <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
<?php _e("<!--:en-->Best Offers<!--:--><!--:ar-->  أحسن العروض <!--:-->"); ?>
              </h3>

                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>

            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                  

   <?php 

$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 5,
      'tax_query' => array(
    array(
        'taxonomy' => 'product_cat', //double check your taxonomy name in you dd 
        'field'    => 'id',
        'terms'    => $allcatdataid,
    ),
   ),
    // 'meta_query'     => array(
    //     'relation' => 'OR',
    //     array( // Simple products type
    //         'key'           => '_sale_price',
    //         'value'         => 0,
    //         'compare'       => '>',
    //         'type'          => 'numeric'
    //     ),
    //     array( // Variable products type
    //         'key'           => '_min_variation_sale_price',
    //         'value'         => 0,
    //         'compare'       => '>',
    //         'type'          => 'numeric'
    //     )
    // )
);

$the_query = new WP_Query( $args );



// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();



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
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();


                    ?>

                </div>
            </div>         
        </div>
    </section>


<?php $g++; } ?>
 
<?php get_footer(); ?>