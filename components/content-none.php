<?php
/**
 * No content template file
 * @package back2basics
 */
?>
<article>
	<header>
		<h1><?php esc_html_e( 'Nothing Found', 'back2basics' ); ?></h1>
	</header>

	<div>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'back2basics' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'back2basics' ); ?></p>
		<?php get_search_form();

		else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'back2basics' ); ?></p>
			<?php get_search_form();

		endif; ?>
	</div>
</article>
