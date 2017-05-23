<?php
/**
 * Archive template file
 * @package iheartcode
 */

get_header(); ?>
<div class="all-content">
<main class="site-content" role="main">
	<?php
		// init loop
		if ( have_posts() ) : ?>

			<header class="page-header full-width-bar">
				<?php
					the_archive_title( '<h2 class="archive-title">', '</h2>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header>
			<?php while ( have_posts() ) : the_post();
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