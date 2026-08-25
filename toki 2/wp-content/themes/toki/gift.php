<?php 
/*
Template Name: gift
*/

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
the_title();
 ?>
                   </li>
                </ol>
            </nav>
 </div>


<section class="products__section giftcardcustom">
        <div class="container products__container">
           
            <div class="grid__overflow__wrapper">
                <div class="row prodcut__grid__row ">
          

                            <?php 
query_posts('post_type=product&giftcard-category=gift-card&author=1');

if(have_posts()) : while(have_posts()) : the_post();
global $woocommerce;
global $product;
// $currency = get_woocommerce_currency_symbol();
// $price =(int) get_post_meta( get_the_ID(), '_regular_price', true);
// // echo $price;

// $sale =(int) get_post_meta( get_the_ID(), '_sale_price', true);

    ?>
                    <div class="third__column__part">
                        <div class="card product-card wow zoomIn" style="padding:0" data-wow-duration="1s" data-wow-offset="300" s>
                      
                            <a href="<?php the_permalink();?>" class="card-img-top">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" class="product-img">
                            </a>
                           <div class="product__body">
                                <a href="<?php the_permalink();?>"><h3 class="card-title"><?php the_title();?></h3></a>


                            
 <div class="new__price">
  <?php echo $product->get_price_html(); ?>
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