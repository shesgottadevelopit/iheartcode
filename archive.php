<?php
/**
 * Archive template file
 * @package iheartcode
 */

get_header(); ?>
<main class="site-content" role="main">
	<?php
		// init loop
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<div>', '</div>' );
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

<?php
get_sidebar();
get_footer();
