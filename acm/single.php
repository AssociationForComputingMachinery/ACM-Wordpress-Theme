<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage ACM
* @since ACM 1.0
*/
get_header(); ?>
<div id="main">
  <main id="maincontent" class="article" tabindex="-1">
  <?php
  // Start the loop.
  while ( have_posts() ) : the_post();
  // Include the single post content template.
  // get_template_part( 'template-parts/content', 'single' );
  ?>

  <div class="row">
    <div class="columns small-12">
      <ul class="breadcrumbs">
        <?php the_breadcrumb(); ?>
      </ul>
    </div>
  </div>
  <article class="has-edit-button" id="SkipTarget" tabindex="-1">
    <div class="row">
      <div class="columns large-9 medium-9 small-12 blocks">
        <div class="clearfix">
          <h1><?php the_title(); ?></h1>
          <?php the_post_thumbnail( 'post-thumbnail', array('class' => 'alignright')); ?>
          <?php the_content(); ?>
          <hr />
          <?php
          // If comments are open or we have at least one comment, load up the comment template.
          if ( comments_open() || get_comments_number() ) {
          comments_template();
          }
          if ( is_singular( 'attachment' ) ) {
          // Parent post navigation.
          the_post_navigation( array(
          'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'acm' ),
          ) );
          } elseif ( is_singular( 'post' ) ) {
          // Previous/next post navigation.
          the_post_navigation( array(
          'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'acm' ) . '</span> ' .
          '<span class="screen-reader-text">' . __( 'Next post:', 'acm' ) . '</span> ' .
          '<span class="post-title">%title</span>',
          'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'acm' ) . '</span> ' .
          '<span class="screen-reader-text">' . __( 'Previous post:', 'acm' ) . '</span> ' .
          '<span class="post-title">%title</span>',
          ) );
          }
          // End of the loop.
          endwhile;
          ?>
        </div>
      </div>
      <?php get_sidebar('content_right'); ?>
    </div>
  </article>
  </main><!-- .site-main -->
  </div><!-- .content-area -->
  <?php get_footer(); ?>
