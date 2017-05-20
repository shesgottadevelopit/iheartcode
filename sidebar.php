<?php
/**
 * Sidebar template file
 * @package iheartcode
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="site-widgets" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
