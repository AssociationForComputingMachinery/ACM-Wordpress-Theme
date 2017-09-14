<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after
*
* @package WordPress
* @subpackage ACM
* @since ACM 1.0
*/
?>
<div class="row">
  <footer>
    <nav>
      <div class="footer-nav">
        <?php get_sidebar( 'footer' ); ?>
      </div>
    </nav>
    <div>
      <div>
        <div class="logo_social_group">
          <hr />
          <?php if(get_theme_mod('footer_logo')) { ?>
          <img alt="ACM Logo" width="200" height="70" class="img-responsive" src="<?php echo get_theme_mod('footer_logo'); ?>">
          <?php } ?>

          <ul class="footer__social">
          	  <!-- COMMENTED OUT BY KS,  08/12/2016
              <?php if(get_theme_mod('facebook_url') != '') { ?>
              <li><a class="fb_link" href="<?php echo get_theme_mod('facebook_url'); ?>">Facebook</a></li>
              <?php } ?>
              <?php if(get_theme_mod('twitter_url') != '') { ?>
              <li><a class="tw_link" href="<?php echo get_theme_mod('twitter_url'); ?>">Twitter</a></li>
              <?php } ?>
              <?php if(get_theme_mod('googleplus_url') != '') { ?>
              <li><a class="gp_link" href="<?php echo get_theme_mod('googleplus_url'); ?>">Google Plus</a></li>
              <?php } ?>
              <?php if(get_theme_mod('linkedin_url') != '') { ?>
              <li><a class="li_link" href="<?php echo get_theme_mod('linkedin_url'); ?>">LinkedIn</a></li>
              <?php } ?>
              <?php if(get_theme_mod('youtube_url') != '') { ?>
              <li><a class="yt_link" href="<?php echo get_theme_mod('youtube_url'); ?>">Youtube</a></li>
              <?php } ?>
              <?php if(get_theme_mod('instagram_url') != '') { ?>
              <li><a class="in_link" href="<?php echo get_theme_mod('instagram_url'); ?>">Instagram</a></li>
              <?php } ?>
              <?php if(get_theme_mod('flickr_url') != '') { ?>
              <li><a class="fl_link" href="<?php echo get_theme_mod('flickr_url'); ?>">Instagram</a></li>
              <?php } ?>
              <?php if(get_theme_mod('email_url') != '') { ?>
              <li><a class="em_link" href="<?php echo get_theme_mod('email_url'); ?>">Instagram</a></li>
              <?php } ?>
              -->
              
                <?php 
				$pg = get_page_by_title( 'Footer - Social Media' );
				foreach( get_cfc_meta( 'social-media-footer', $pg->ID ) as $key => $value ){
				?>

                <li><a href="<?php echo the_cfc_field( 'social-media-footer','url',$pg->ID,$key ); ?>" target="_blank" style="background-image: url(<?php echo the_cfc_field( 'social-media-footer','icon',$pg->ID,$key ); ?>);"><?php echo the_cfc_field( 'social-media-footer','property',$pg->ID,$key ); ?></a></li>

                <?php 
				}
				?>

          </ul>

        </div>
      </div>
    </div>
  </footer>
  <!-- <script type="text/javascript" src="/js/acm.js"></script> -->
  
  <script>
  $(document).ready(function(){
    var wrapper = document.querySelector(".section-nav");
    var nav = priorityNav.init({
      mainNavWrapper: ".section-nav-wrapper",
      breakPoint: 0,
      navDropdownLabel: "MORE"
    }); 
  });
  </script>
</div>
</body>
<?php wp_footer(); ?>
</html>
