<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage ACM
 * @since ACM 1.0
 */
?>

<?php if ( is_active_sidebar( 'content_right' )  ) : ?>
  <aside id="secondary" class="columns large-4 medium-4 small-12" role="complementary">
    <?php dynamic_sidebar( 'content_right' ); ?>
  </aside><!-- .sidebar .widget-area -->
<?php endif; ?>
