<?php 

get_header();?>
 <!-- start app -->
 
 <div class="container">
     

<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">

 <a href="<?php echo site_url();?>">
        <?php 
 _e("<!--:en-->Home<!--:--><!--:ar-->الرئيسية<!--:-->");
 ?>

    </a>
                  </li>

                  <li class="breadcrumb-item active" aria-current="page"> 

       <?php 
 _e("<!--:en-->Search<!--:--><!--:ar-->نتائج البحث<!--:-->");
 ?>
                   </li>
                </ol>
            </nav>
 </div>


<section class="products__section">
        <div class="container products__container">
           
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
          

                            <?php 

if(have_posts()) : while(have_posts()) : the_post();
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
$sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);
  $saving_percentage = ceil(round( 100 - ( $sale / $price * 100 ), 1 )) . '%';

    ?>
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn" data-wow-duration="1s" data-wow-offset="300" s>
                            <div class="best__proo">افضل المنتجات</div>
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
}?>
                               
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

                    <?php  endwhile; else : endif ; wp_reset_query();

   ?>
  
                </div>
            </div>
            
<div class="clearfix"></div>
<?php    
wp_pagenavi();
      ?>  

        </div>
    </section>



<?php get_footer();?>