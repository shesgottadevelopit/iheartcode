<?php
/**
 * 404 error page
 * @package iheartcode
 */
get_header(); ?>
<div class="all-content">
<main class="site-content" role="main">
	<header class="page-header full-width-bar">
		<h2 class="archive-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'iheartcode' ); ?></h2>
	</header>
	<div>
		<p><?php esc_html_e( 'Nothing is here, sorry about that (well not really sorry, but you get the point).', 'iheartcode' ); ?></p>

		<?php get_search_form();?>

	</div>
</main>
<?php get_sidebar(); ?>
</div>
<?php
get_footer();