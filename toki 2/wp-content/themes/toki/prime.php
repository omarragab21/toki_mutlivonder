<?php
/*
Template Name: prime
*/

    $user_id=get_current_user_id();
            $com_prime= get_the_author_meta( 'com_prime', $user_id );
            
                            if(isset($_POST['regnow'])){
    
    			update_user_meta( $user_id,'com_prime',1);
    $home= esc_url( home_url( '/prime/?done' )); 
wp_safe_redirect($home);
// @header("Location: $home");
    //  exit;
}
 ?><?php 

get_header();

if(have_posts()) : while(have_posts()) : the_post();
?>
<style>
    .holddddtoki {
    padding: 40px 0;
    background-color: #FF5900;
text-align:center;
        
    }
</style>

<div class="holddddtoki">
    <div class="container">
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="" >
<?php the_content();?>
        
        
        <form method="POST">
            
            <?php if(is_user_logged_in()){
            
        

            if($com_prime==0){
            ?>
            <button style="border:0" type="submit" name="regnow" class="openMn3modal">
                <?php echo  _e("<!--:en-->Register Now<!--:--><!--:ar-->اشترك الان<!--:-->");
?>

            </button>
            <?php }else{?>
            
               <div style="border:0" type="submit" name="regnow" >
                <?php echo  _e("<!--:en-->Already Registered<!--:--><!--:ar--> انت مسجل بالفعل<!--:-->");
?>

            </div>
            
            
            <?php } }else{?>
            <a href="<?php echo site_url();?>/my-account/edit-account" class="openMn3modal"><?php echo  _e("<!--:en-->You Must Login<!--:--><!--:ar-->سجل دخول اولا <!--:-->");
?></a>
<?php } ?>
            <!--<a href="" class="openMn3modal" data-toggle="modal" data-target="#mana3Modal"> اشترك الان </a>-->
                <!--------    modal search ---------->
            <div class="modal fade mana3Modal" id="mana3Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
    
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">      
                            <h3>  </h3>
                                  <button style="left:20px;color:#333;right:auto" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                            <p>تم الاشتراك بنجاح</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="knowabout">
                            <?php echo  _e("<!--:en-->Benefits of Prime<!--:--><!--:ar-->    تعرف على مزايا برايم<!--:-->");
                            
                            
                         
?>
         

            
        </div>
        
      
        
    </div>
    
</div>
<div class="holdfeature">
      <div class="features__SsliderO">
        <div class="ftOne__itTem">
            <div class="feature_CArd">
                <div class="FeAt_thumb">
                    <img src="https://m.media-amazon.com/images/G/42/prime/marketing/slashPrime/Prime_Delivery_Illustration_2x._CB621712596_.jpg"/>
                </div>
                <h3>  عروض فيديو جيمز </h3>
                <p>هنا وصف مختصر </p>
            </div>
        </div>
        <div class="ftOne__itTem">
            <div class="feature_CArd">
                <div class="FeAt_thumb">
                    <img src="https://m.media-amazon.com/images/G/42/prime/marketing/slashPrime/Prime_Delivery_Illustration_2x._CB621712596_.jpg"/>
                </div>
                <h3> عروض فيديو جيمز </h3>
                <p>هنا وصف مختصر </p>
            </div>
        </div>
        <div class="ftOne__itTem">
            <div class="feature_CArd">
                <div class="FeAt_thumb">
                    <img src="https://m.media-amazon.com/images/G/42/prime/marketing/slashPrime/Prime_Delivery_Illustration_2x._CB621712596_.jpg"/>
                </div>
                <h3> عروض فيديو جيمز </h3>
                <p>هنا وصف مختصر </p>
            </div>
        </div>
        <div class="ftOne__itTem">
            <div class="feature_CArd">
                <div class="FeAt_thumb">
                    <img src="https://m.media-amazon.com/images/G/42/prime/marketing/slashPrime/Prime_Delivery_Illustration_2x._CB621712596_.jpg"/>
                </div>
                <h3> عروض فيديو جيمز </h3>
                <p>هنا وصف مختصر </p>
            </div>
        </div>
        <div class="ftOne__itTem">
            
            <div class="feature_CArd">
                <div class="FeAt_thumb">
                    <img src="https://m.media-amazon.com/images/G/42/prime/marketing/slashPrime/Prime_Delivery_Illustration_2x._CB621712596_.jpg"/>
                </div>
                <h3> عروض فيديو جيمز </h3>
                <p>هنا وصف مختصر </p>
            </div>
        </div>
    </div>
</div>


 <?php 
 endwhile; else : endif ; wp_reset_query(); ?>

<?php 

   

get_footer();?>