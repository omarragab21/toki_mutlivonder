<?php 
$terms = get_the_terms( get_the_ID(), 'product_cat' );
$child = get_term_children( $terms[0]->term_id, 'product_cat' );


if(1==3){
?>
    <!-- __5___ start products section منتجات مميزة -->
    <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">

  <?php _e("<!--:en-->What do you think of these options?<!--:--><!--:ar-->ما رأيك بهذه الخيارات؟<!--:-->"); ?>

             </h3>
                <a href="<?php echo get_term_link($terms[0]);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
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
        'terms'    => $terms[0]->term_id,
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

global $product;


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
$average      = @round($product->get_average_rating());
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
<?php } ?>
 

    <!-- __4___ start children offers section  أحلى العروض على منتجات الاطفال-->
    <section class="mega__section">
        <div class=" mega__container">
            <div class="title__wrapper">
                <h3 class="main-title">

<?php 

 _e("<!--:en-->Best offers on <!--:--><!--:ar-->    أحلى العروض على   <!--:-->");
 echo ' '. $terms[0]->name;
?>
            </h3>
                <a href="<?php echo get_term_link($terms[0]);?>" class="show__more main__btn"> عرض 
<?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?>
                 <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row">

<?php
if($child){
$args2 =  array(
    'hide_empty'        => false, 
    'number'=>4,
      'include' => $cat2
   
); 
}
else{
$args2 =  array(
 'parent'            => $terms[0]->parent,
    'hide_empty'        => false, 
    'number'=>4,
   
); 
}
$terms2 = get_terms( 'product_cat', $args2);
    foreach ( $terms2 as $termb ) {

        ?>


<?php 
    $thumbnail_id = get_term_meta( $termb->term_id, 'thumbnail_id', true ); 

    // get the image URL
    $image = wp_get_attachment_url( $thumbnail_id ); 

    // print the IMG HTML

?>



                <div class="col-6 col-md-3">
                    <div class="childs__card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                        <a href="<?php echo get_term_link($termb);?>" class="food__offer">
                        	<?php echo $termb->name;?>
                        </a>
                        <a href="<?php echo get_term_link($termb);?>" class="food__img">
                            <img src="<?php echo $image;?>">
                        </a>
                        <div class="mega__body">
                            <a href="#"><h3 class="mega_title"> 
<?php echo $termb->name;?>
                             </h3></a>
                            <div class="bold_price">
                                <span>
 <?php _e("<!--:en-->Up to 50% sale<!--:--><!--:ar-->    خصم حتى 50 % <!--:-->"); ?>
                            </span>
                            </div>
                        </div>
                    </div>
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

  <?php _e("<!--:en-->Best sales in<!--:--><!--:ar-->الاحسن مبيعا في <!--:-->");
echo' '.$terms[0]->name;
   ?>

             </h3>
                <a href="<?php echo get_term_link($terms[0]);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
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
        'terms'    => $terms[0]->term_id,
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

global $product;


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
$average      = @round($product->get_average_rating());
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

<?php 

$section5 = get_field('section5', $terms[0]->taxonomy . '_' . $terms[0]->term_id);
 if($section5['title1']){ ?>
    <!-- __6___ start schools section  أطفالك جاهزين للمدارس-->
    <section class="safety__section">
        <div class=" safety__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title">
<?php echo $section5['title1'];?>
</h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                                        <?php foreach ($section5['data'] as $k5) {
?>
                    <div class="third__column__part">
                        <a href="<?php echo $k5['link22'];?>" class="safety_card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="safety__img height__212 top__radius">
                                <img src="<?php echo $k5['image'];?>" alt="">
                            </div>
                            <div class="safety_title main__btn hvr-underline-from-center h__95 not__radius">
                                <span>
                                <?php echo $k5['text2'];?>
                                    
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

$cat100=get_field('cat100', $terms[0]->taxonomy . '_' . $terms[0]->term_id);
if($cat100){

?>
    <!-- __7___ start brands section  ماركات مختارة  -->
    <section class="safety__section">
        <div class=" safety__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title"> 
<?php _e("<!--:en-->Selected Brands<!--:--><!--:ar-->  ماركات مختارة<!--:-->"); ?>
               </h3>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">

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


                    <div class="third__column__part">
                    <a class="brand__choice wow zoomIn"  data-wow-duration="1s" data-wow-offset="300" href="<?php echo get_term_link($term2);?>" class="brand_card">
                        <img src="<?php echo $image;?>" alt="">
                    </a>
                </div>
              <?php } ?>

                 
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$section14 = get_field('section14', $terms[0]->taxonomy . '_' . $terms[0]->term_id);

 ?>
 <?php if($section14['data']){ ?>
    <!-- __8___ start children products section الاحسن مبيعات لمنتجات الاطفال -->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="title__wrapper">
                <h3 class="main-title"> 
  <?php _e("<!--:en-->Best Sales<!--:--><!--:ar-->الاحسن مبيعات    <!--:-->"); ?>

                </h3>
            </div>
            <div class="row children__row">
                <?php foreach ($section14['data'] as $k14) {?>
                <div class="col-6 col-md-4">
                    <a href="<?php echo $k14['link22'];?>" class="child__card">
                        <div class="child__img_top">
                                <img src="<?php echo $k14['image'];?>" alt="">
                        </div>
                        <h3 class="bag__title">  <?php echo $k14['text2'];?> </h3>
                    </a>
                </div>
              <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php 
if($child){
    foreach($child as $caaa){
$category = get_term_by('id', $caaa, 'product_cat');

?>

 <section class="products__section">
        <div class="products__container">
            <div class="title__wrapper">
                <h3 class="main-title">
<?php 
echo $category->name;
?>

             </h3>
                <a href="<?php echo get_term_link($category);?>" class="show__more main__btn"> <?php _e("<!--:en-->View All<!--:--><!--:ar-->عرض الكل <!--:-->"); ?><i class="fa fa-chevron-left"></i></a>
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
        'terms'    => $caaa,
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

global $product;


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
$average      = @round($product->get_average_rating());
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
<?php }?>
<?php }?>






<?php if(1==2){?>
    <!-- __9___ start children products section   أحسن العروض على العبوات الكبيرة-->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title"> أحسن العروض على العبوات الكبيرة</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at2.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at4.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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

    <!-- __10___ start children products section تنقل الاطفال-->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="title__wrapper">
                <h3 class="main-title">  تنقل الاطفال </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row children__row">
                <div class="col-12 col-md-6">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/atf1.png" alt="">
                        </div>
                        <h3 class="bag__title"> عربيات الاطفال </h3>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/atf2.png" alt="">
                        </div>
                        <h3 class="bag__title"> حمالة اطفال </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __11___ start children products section  أحسن العروض على عربات السفر  -->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أحسن العروض على عربات السفر </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at2.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at4.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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

    <!-- __12___ start children products section مستلزمات الطعام-->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="title__wrapper">
                <h3 class="main-title"> مستلزمات الطعام </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row children__row">
                <div class="col-6 col-md-4 my__col__lg__2">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rd11.png" alt="">
                        </div>
                        <h3 class="bag__title"> الرضاعات </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 my__col__lg__2">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rd22.png" alt="">
                        </div>
                        <h3 class="bag__title"> أدوات الرضاعة </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 my__col__lg__2">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rd33.png" alt="">
                        </div>
                        <h3 class="bag__title"> أدوات الطعام </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 my__col__lg__2">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rd4.png" alt="">
                        </div>
                        <h3 class="bag__title"> كراسي مرتفعة </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 my__col__lg__2">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/rd5.png" alt="">
                        </div>
                        <h3 class="bag__title"> مستلزمات الطعام </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __13___ start food section  أساسيات تحضير الطعام -->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">أساسيات تحضير الطعام</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at2.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at4.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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

    <!-- __14___ start care products section الاستحمام والعناية بالبشرة-->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="title__wrapper">
                <h3 class="main-title">الاستحمام والعناية بالبشرة</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row children__row">
                <div class="col-6 col-md-4">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sb1.png" alt="">
                        </div>
                        <h3 class="bag__title"> صابون وشامبو </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sb2.png" alt="">
                        </div>
                        <h3 class="bag__title">  كريمات وزيوت </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sb3.png" alt="">
                        </div>
                        <h3 class="bag__title"> أدوات العناية الشخصية </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __15___ start care products section   الترفيه-->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="title__wrapper">
                <h3 class="main-title">الترفيه</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row children__row">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/trf1.png" alt="">
                        </div>
                        <h3 class="bag__title"> العربيات والمشايات </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/trf2.png" alt="">
                        </div>
                        <h3 class="bag__title">   ألعاب الاستحمام </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/trf3.png" alt="">
                        </div>
                        <h3 class="bag__title">أبسطة اللعب والحركة</h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/trf1.png" alt="">
                        </div>
                        <h3 class="bag__title"> ألعاب الاطفال والرضع</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __16___ start care products section   الصحة والسلامة-->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="title__wrapper">
                <h3 class="main-title">الصحة والسلامة</h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="row children__row">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sh1.png" alt="">
                        </div>
                        <h3 class="bag__title">  شاشة مراقبة للاطفال </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sh2.png" alt="">
                        </div>
                        <h3 class="bag__title">    أجهزة قياس الحرارة </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sh3.png" alt="">
                        </div>
                        <h3 class="bag__title">  المعقمات </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/sh4.png" alt="">
                        </div>
                        <h3 class="bag__title">   بوابة الاطفال </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __17___ start care products section   للأمهات  -->
    <section class="cloth__section">
        <div class=" lighter__container">
            <div class="center__title__wrapper">
                <h3 class="main__center__title fit__content mx-auto">  للأمهات </h3>
            </div>
            <div class="row women__row">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/om1.png" alt="">
                        </div>
                        <h3 class="bag__title"> ملابس الحوامل </h3>
                        <h3 class="wo__subtitle"> ملابس ومقاسات جديدة </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/om2.png" alt="">
                        </div>
                        <h3 class="bag__title"> العناية الشخصية </h3>
                        <h3 class="wo__subtitle"> ملابس ومقاسات جديدة </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/om3.png" alt="">
                        </div>
                        <h3 class="bag__title"> العناية بالصدر </h3>
                        <h3 class="wo__subtitle"> ملابس ومقاسات جديدة </h3>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="child__card">
                        <div class="child__img_top">
                            <img src="<?php bloginfo('template_directory'); ?>/img/om4.png" alt="">
                        </div>
                        <h3 class="bag__title"> شنط الحفاظات </h3>
                        <h3 class="wo__subtitle"> ملابس ومقاسات جديدة </h3>
                    </a>
                </div>
            </div>
            <div class="row boys__row">
                <div class="col-12 col-md-6">
                    <a href="#" class="child__card">
                        <div class="child__img_top height__392">
                            <img src="<?php bloginfo('template_directory'); ?>/img/bo1.png" alt="">
                        </div>
                        <h3 class="bag__title">  أزياء الاولاد ( 0 - 8 سنة ) </h3>
                        <h3 class="wo__subtitle"> ملابس ومقاسات جديدة </h3>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="#" class="child__card">
                        <div class="child__img_top height__392">
                            <img src="<?php bloginfo('template_directory'); ?>/img/bo2.png" alt="">
                        </div>
                        <h3 class="bag__title">  أزياء الاولاد ( 0 - 8 سنة ) </h3>
                        <h3 class="wo__subtitle"> ملابس ومقاسات جديدة </h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- __19___ start food section  أساسيات ملابس الصيف-->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">  أساسيات ملابس الصيف </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at2.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at4.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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

    <!-- __20___ start categories section فئات أكثر-->
    <section class="categories__section">
        <div class=" categories__container pbt__70">
            <div class="center__title__wrapper">
                <h3 class="main__center__title fit__content mx-auto"> فئات أكثر</h3>
            </div>
            <div class="more__items__carousel">
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-1.png" alt="" class="shop__img">
                        <h3 class="shop__title">قسم التصفية</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-2.png" alt="" class="shop__img">
                        <h3 class="shop__title">العودة للمدارس</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-3.png" alt="" class="shop__img">
                        <h3 class="shop__title">الجوالات</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-4.png" alt="" class="shop__img">
                        <h3 class="shop__title">اللابتوبات</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-5.png" alt="" class="shop__img">
                        <h3 class="shop__title">التلفزيونات</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-6.png" alt="" class="shop__img">
                        <h3 class="shop__title">الجمال</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-7.png" alt="" class="shop__img">
                        <h3 class="shop__title">العطور</h3>
                    </a>
                </div>
                <div class="one_item">
                    <a class="shopping__card" href="category.html">
                        <img src="<?php bloginfo('template_directory'); ?>/img/s-8.png" alt="" class="shop__img">
                        <h3 class="shop__title">الألعاب</h3>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- __21___ start food section  أساسيات ملابس الصيف-->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">  أساسيات ملابس الصيف </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at2.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at4.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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

    <!-- __22___ start food section  أساسيات ملابس الصيف-->
    <section class="products__section">
        <div class=" products__container">
            <div class="title__wrapper">
                <h3 class="main-title">  أساسيات ملابس الصيف </h3>
                <a href="products.html" class="show__more main__btn"> عرض الكل <i class="fa fa-chevron-left"></i></a>
            </div>
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row">
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at1.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at2.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at3.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at4.png" alt="" class="product-img">
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
                        <div class="card product-card wow zoomIn"  data-wow-duration="1s" data-wow-offset="300">
                            <div class="best__proo">افضل المنتجات</div>
                            <div class="add_to_fav">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <a href="#" class="card-img-top">
                                <img src="<?php bloginfo('template_directory'); ?>/img/at5.png" alt="" class="product-img">
                            </a>
                            <div class="product__body">
                                <a href="#"><h3 class="card-title">أبل ساعة سيريس 7 مم مزودة بنظام المواعيد وضد الماء</h3></a>
                                <div class="new__price">1754,00 رس</div>
                                <div class="old__price"> 
                                    <del>1969,00 رس</del>
                                    <span>خصم 10%</span>
                                </div>
                                <div class="bottom__wrapper">
                                     <?php                                     echo writeMsg(get_the_author_ID(),get_the_ID());                                     ?>
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

<?php } ?>