<?php
/**
*
*Template Name: Search Page
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* e.g., it puts together the home page when no home.php file exists.
*
* Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
*
* @package WordPress
* @subpackage ACM
* @since ACM 1.0
*/
get_header();
?>
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
            <?php echo $banner_title;?></p>
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
  <?php
  if (have_posts()):
  if (is_home() && !is_front_page()):
  ?>
  <header>
    <h1 class="page-title screen-reader-text"><?php
    single_post_title();
    ?></h1>
  </header>
  <?php
  endif;
  ?>
  <?php
  endif;
  ?>
  <div class="article"  id="maincontent">
    <article class="has-edit-button" id="SkipTarget" tabindex="-1">
      <div class="row">
        <div class="columns large-12 medium-12 small-12 zone-1">
          <div>
            <h1>Search Posts</h1>
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </article>
  </div>
</div>
<?php get_footer(); ?>
