<?php
/**
 * Sidebar template file
 * @package back2basics
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
