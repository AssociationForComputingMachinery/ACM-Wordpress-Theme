<?php
/**
* The template for displaying 404 pages (Not Found)
*
* @package WordPress
* @subpackage ACM
* @since ACM 1.0
*/

  get_header();
  ?>
  <div class="row" style="background-color: white; padding-top: 10px;">
    <div class="columns small-12">
      <ul class="breadcrumbs">
        <?php the_breadcrumb(); ?>
      </ul>
    </div>
  </div>
  <div class="banner-container">
    <div>
      <div>
        <?php

          $existing_image_id = get_post_meta(get_the_ID(), '_banner_attached_image', true);
          $banner_top_title = get_post_meta(get_the_ID(), 'meta-banner-top-title', true);
          $banner_title = get_post_meta(get_the_ID(), 'meta-banner-title', true);
          $banner_description = get_post_meta(get_the_ID(), 'meta-banner-description', true);

          if (is_numeric($existing_image_id)) {
            $arr_existing_image = wp_get_attachment_image_src($existing_image_id, 'large');
            $existing_image_url = $arr_existing_image[0];
            ?>
        <div class="acm-banner-container" style="background: url('<?php echo $existing_image_url; ?>') no-repeat center 0 / 130% #000; background-size: cover;">
          <div class="gradient-wrapper"></div>
          <div class="overlay"></div>
          <div class="row">
            <div class="columns large-12 medium-12 banner-content">
              <p class="banner-heading">
                <small><?php echo $banner_top_title;?></small>
                <?php echo $banner_title;?>
              </p>
              <p><?php echo $banner_description;?></p>
            </div>
          </div>
        </div>
      </div>
            <?php
          }
        ?>
    </div>
  </div>

  <div class="article"  id="maincontent">
    <article class="has-edit-button" id="SkipTarget" tabindex="-1">
      <div class="row">
        <div class="columns large-12 medium-12 small-12 zone-1">

            <h1 class="page-title"><?php _e( 'Not Found - 404', 'ACM' ); ?></h1>

          <div>
  					<p><?php _e( 'Use the search form below to find the page you are looking for.', 'ACM' ); ?></p>
  					<!-- <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ACM' ); ?></p> -->

            <?php get_search_form(); ?>

  					<?php //get_search_form(); ?>
          </div>
        </div>
      </div>
    </article>
  </div>

<?php get_footer(); ?>
