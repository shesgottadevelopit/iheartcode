<?php
/**
 * Index template file
 * @package iheartcode
 */

get_header(); ?>
<div class="all-content">
<main class="site-content" role="main">
	<?php
		// init loop
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			get_template_part( 'content-excerpt');
			endwhile;
			// insert navigation or pagination
			iheartcode_pagination();
			//echo get_the_posts_pagination();
		else :
			get_template_part( 'content', 'none' );
		endif; ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php
get_footer();
