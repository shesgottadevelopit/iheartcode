<?php
/**
 * Search template file
 * @package iheartcode
 */

get_header(); ?>
<div class="all-content">
<main class="site-content" role="main">
	<?php
		// init loop
		if ( have_posts() ) : ?>

			<header class="page-header full-width-bar">
				<h2 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'iheartcode' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header>
			<?php while ( have_posts() ) : the_post();
			get_template_part( 'content-excerpt' );
			endwhile;
			// insert navigation or pagination
			iheartcode_pagination();
			//echo get_the_posts_pagination();
		else : ?>
			<header class="page-header full-width-bar">
				<h2 class="archive-title"><?php printf( esc_html__( 'Nothing Found', 'iheartcode' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header>
			<?php 
			get_template_part( 'content-none' );
		endif; ?>
</main>
<?php get_sidebar(); ?>
</div>
<?php
get_footer();