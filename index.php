<?php
/**
 * Index template file
 * @package back2basics
 */

get_header(); ?>
<main class="site-content" role="main">
	<?php
		// init loop
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			get_template_part( 'content-excerpt');
			endwhile;
			// insert navigation or pagination
			the_posts_navigation();
		else :
			get_template_part( 'content', 'none' );
		endif; ?>
</main>
<?php
get_sidebar();
get_footer();
