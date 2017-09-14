<?php
/**
* The main template file
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
        <div class="acm-banner-container"
          style="background: url('<?php echo get_theme_mod('banner_bgimage','>>'); ?>') no-repeat center 0 / 130% #000; background-size: cover;">
          <div class="gradient-wrapper"></div>
          <div class="overlay"></div>
          <div class="row">
            <div class="columns large-12 medium-12 banner-content">
              <p class="banner-heading">

                <small><?php echo get_theme_mod('banner_top_title'); ?></small>
              <?php echo get_theme_mod('banner_title'); ?></p>
              <p><?php echo get_theme_mod('banner_description'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row breadcrumb-container" style="background-color: white; padding-top: 10px;">
    <div class="columns small-12">
      <ul class="breadcrumbs">
        <?php the_breadcrumb(); ?>
      </ul>
    </div>
  </div>

  <?php if ( have_posts() ) : ?>
  <?php if ( is_home() && ! is_front_page() ) : ?>
  <header>
    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
  </header>
  <?php endif; ?>
  <?php endif; ?>

  <div class="article"  id="maincontent">
    <article class="has-edit-button" id="SkipTarget" tabindex="-1">
      <div class="row">
        <div class="columns large-9 medium-9 small-12 zone-1">
            <div>
              <div class="articles">
                <div class="three-cols article-block">
                  <div class="row" data-equalizer>

                    <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

                    <div class="large-6 medium-6 small-12 columns">
                      <div class="shadowed cta" data-equalizer-watch="" style="height: 542px;">
                        <div class="row" style="margin: inherit;">
                          <div class="medium-12 columns d-table">
                            <div class="text-wrap">
                              <a href="<?php the_permalink();?>">
                                <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'home-excerpt-thumbnail' ); } ?>
                                <h3><?php the_title(); ?></h3>
                              </a>
                              <div class="dek">
                                <?php the_excerpt(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php endwhile; endif; ?>

                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php get_sidebar('content_right'); ?>
      </div>
    </article>
  </div>

</div>

<?php get_footer(); ?>
