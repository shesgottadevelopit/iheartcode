<?php
/**
 * Singular template file (for pages & posts) - very generic
 * Fallback for single.php and page.php
 * @package iheartcode
 */

get_header(); ?>
<div class="all-content">
<main class="site-content" role="main">
	<?php
		// loop
		while ( have_posts() ) : the_post();
			get_template_part( 'content' );

			if ( get_post_type() === 'post' ) {
			// insert navigation
			the_post_navigation(array(
            'prev_text'                  => __( '<div class="post-nav-link">Previous:</div><span class="post-nav-title"> %title</span>' ),
            'next_text'                  => __( '<div class="post-nav-link">Next:</div><span class="post-nav-title"> %title</span>' ),
				));
			}
			//comments - if applicable
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;  //end loop ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php
get_footer();