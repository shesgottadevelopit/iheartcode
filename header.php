<?php
/**
 * Header template file
 * @package iheartcode
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div class="site-page"><!-- start page -->
			<header class="masthead full-width-bar" role="banner">
				<div class="site-banner"> <!-- site title/description or logo -->
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>

					<?php
					$description = get_bloginfo('description', 'display');
					if ($description || is_customize_preview()) :?>
					<span class="site-description"><?php echo $description; ?></span>
					<?php endif;?>
				</div>
				<nav class="top-nav" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'iheartcode'); ?></button>
<?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu')); ?>
				</nav><!-- end navigation -->
			</header>
