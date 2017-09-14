<?php
/**
* The template for displaying Search Results pages
*
* @package WordPress
* @subpackage ACM
* @since ACM 1.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="article"  id="maincontent">
  <div class="row">
    <div class="columns small-12">
      <ul class="breadcrumbs">
        <li>
          <a href="/">Home</a>
        </li>
        <li class="current">
          <a href="/search">Search</a>
        </li>
      </ul>
    </div>
  </div>
  <article class="has-edit-button" id="SkipTarget" tabindex="-1">
    <div class="row">
      <div class="columns large-12 medium-12 small-12 zone-1">
        <div class="search-results">
          <h1 class="srSearchHint search-message"><?php printf( __( 'You searched for: %s', 'acm' ), get_search_query() ); ?></h1>

          <main class="search-main">
          <ol>
            <?php while ( have_posts() ) : the_post(); ?>
            <li>
              <h3 class="srTitle">
              <a href="<?php echo get_permalink(); ?>">
                <?php the_title();  ?>
              </a></h3>
              <p class="rSummary">
                <?php echo substr(get_the_excerpt(), 0,200); ?>
                <div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
              </p>
            </li>
            <?php endwhile; ?>
          </ol>
          <?php
          $big = 999999999; // need an unlikely integer
          ?>
          <?php
          echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages
          ) );
          ?>
          </main>
        </div>
        
      </div>
    </div>
  </article>
  
</div>
<?php endif; ?>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
