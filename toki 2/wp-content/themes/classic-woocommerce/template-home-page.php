<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Woocommerce
 */

get_header(); ?>

<div id="content"> 
  <section id="slider" class="py-1">
    <div class="container">
      <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12 col-12">
          <div class="categories-box border border-solid">
            <h5 class="mb-0 text-start d-flex align-items-center w-100 py-3 px-3 text-white border border-0" style="background-color: #302e3c;">
            <svg class="icon-l" width="26" height="26" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg> 
            Categories
            </h5>
            <ul class="p-2 px-3 m-0 categories-list primary-bg-color">
              <?php if(class_exists('woocommerce')){ ?>
                <?php
                  $args = array(
                    'number'     => get_theme_mod('classic_ecommerce_product_category_number'),
                    'orderby'    => 'title',
                    'order'      => 'ASC',
                    'hide_empty' => 0,
                    'parent'  => 0
                  );
                  $product_categories = get_terms( 'product_cat', $args );
                  $count = count($product_categories);
                  if ( $count > 0 ){
                    foreach ( $product_categories as $product_category ) {
                      $classic_ecommerce_cat_id   = $product_category->term_id;
                      $cat_link = get_category_link( $classic_ecommerce_cat_id );
                      if ($product_category->category_parent == 0) { ?>
                    <li class="d-flex text-white align-items-center"><i class="fa fa-caret-right fs-5 text-white" aria-hidden="true"></i> <a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                    <?php
                  }
                    echo esc_html( $product_category->name ); ?>n</a></li>
                    <?php
                    }
                  }
                ?>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 col-12 px-0">
          <div class="catwrapslider">
            <div class="owl-carousel">
              <?php if( get_theme_mod('classic_ecommerce_slidersection',false) ) { ?>
                <?php $queryvar = new WP_Query(
                    array( 
                      'cat' => esc_attr(get_theme_mod('classic_ecommerce_slidersection',true)),
                      'posts_per_page' => esc_attr(get_theme_mod('classic_ecommerce_slider_count',true))
                    )
                  );
                while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
                  <div class="item"> 
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="slider-content w-100 h-100 bg-image" style="background-image: url('<?php echo esc_url($image[0]); ?>')">
                      <div class="slider-box text-start">
                        <p><?php echo esc_html(wp_trim_words( get_the_content(), 10)); ?></p>
                        <h3><?php the_title(); ?></h3>
                        <?php if ( get_theme_mod('classic_ecommerce_button_text') != "") { ?>
                          <div class="read-btn">
                            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('classic_ecommerce_button_text','Read More','classic-woocommerce')); ?></a>
                          </div>
                        <?php }?>
                      </div>
                    </div>
                    <?php endif; ?>
                  
                  </div>
                <?php endwhile; wp_reset_postdata(); ?>
              <?php } ?>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
    
    <div class="clear"></div>
  </section>

  <section id="content-creation" class="py-5">
    <div class="container">
      <div id="recent-product">
        <div class="title text-center mb-5">
            <h2 class="sub-primary-color mb-2"><?php echo esc_html(get_theme_mod('classic_woocommerce_heading','Featured Products','classic-woocommerce')); ?></h2>
        </div>
      </div>
      <?php if(class_exists('woocommerce')){ ?>

        <?php echo do_shortcode( '[products limit="4" columns="4" visibility="featured" ]' ); ?>

      <?php }?>

    </div>
  </section>
</div>

<?php get_footer(); ?>