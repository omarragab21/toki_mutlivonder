<?php
/*
Template Name: regvendor
*/
 wp_head();

// the_content();
 ?>
 
 <!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toki</title>

    <link href="<?php bloginfo('template_directory'); ?>/css/newstyle.css" rel="stylesheet">
</head>
<style>
    label.screen-reader-text {
    display: none;
}
.toki_setup_steps li {
 
    height: 40px;
}
</style>
   <div class="tokiStepsWrapper">
        <div class="stepsLogo">
            <a href="<?php echo site_url();?>" class="st_logoLink">
                <img src="<?php echo site_url();?>/wp-content/uploads/2023/01/logo-1.png" alt="">
            </a>
        </div>
        <ol class="toki_setup_steps">
            <li> تسجيل حساب</li>
            <li>طرق الدفع</li>
            <li>السياسات</li>
            <li>خدمة العملاء</li>
            <li>seo</li>
            <li>social</li>
            <li>ready!</li>
        </ol>
        <div class="toki_setup_content">
           
          <?php the_content(); ?>
           
      
        </div>
    </div>




    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/simple-lightbox.min.js" type="text/javascript"></script>
<?php if ( is_singular( 'product' ) ) {?>

    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<?php } ?>

    <script src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.nice-select.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/wow.min.js"></script>
    <script>
        new WOW().init(); 
      </script>
<?php wp_footer(); ?>


</body>

</html>
