<?php
/**
 * Display posts
 * @package back2basics
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header style="text-align:center;">
		<?php the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
		<div class="article-info">
		<span class="article-date"><?php the_date(); ?></span>
	</div>
	</header>

	<div class="article-content">
		<?php the_excerpt();?>
	</div>	

	<footer>
	</footer>
</article>
