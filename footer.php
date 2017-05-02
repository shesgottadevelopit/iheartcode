<?php
/**
 * Footer template file
 * @package back2basics
 */
?>
<footer role="contentinfo">
		<div>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'back2basics' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'back2basics' ), '[insert your sponsor]' ); ?></a> Copyright YEAR-<?php echo date('Y'); ?>.<?php bloginfo('name'); ?>
		</div>
	</footer>
</div><!-- end page -->

<?php wp_footer(); ?>
<!-- insert google analytics -->

</body>
</html>
