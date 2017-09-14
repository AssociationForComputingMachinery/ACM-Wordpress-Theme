<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage ACM
 * @since ACM 1.0
 */
?>

<?php if ( is_active_sidebar( 'content_footer' )  ) : ?>
    <?php dynamic_sidebar( 'content_footer' ); ?>
  
<?php endif; ?>
