<?php
/**
 * Display posts
 * @package back2basics
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header style="text-align:center;">
		<?php the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
		<div class="article-meta">
		<span class="article-date"><?php echo get_the_date("l // F j, Y"); ?></span>
		<div class="article-tags">
			<?php echo get_the_tag_list('<span class="article-tag">','</span><span class="article-tag">','</span>'); ?>
			<?php //echo get_tags(); ?>
			<?php //the_tags(); ?>
		</div>
	</div>
	</header>

	<div class="article-content">
		<?php the_excerpt();?>
	</div>	

	<footer>
	</footer>
</article>
