<?php
/**
 * Display posts
 * @package iheartcode
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article-header full-width-bar">
		
		<?php if ( 'post' === get_post_type() ) : ?>
		
		<div class="article-meta">
			<div class="single-meta">
				<span class="article-categories"><?php the_category(' & '); ?></span> 
				<span style="color:white"> | </span>
				<span><?php echo get_the_date("l // F j, Y"); ?></span>
			</div>
		<div><!--featured image -->
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
		<?php endif;
		if ( is_single() || is_page() ) :
			the_title( '<h2 class="article-title">', '</h2>' );
		else :
			the_title( '<h2 class="article-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="article-tags">
				<?php echo get_the_tag_list('<span class="article-tag">','</span><span class="article-tag">','</span>'); ?>
			</div>
		</div>

		<?php
		endif; ?>
	</header>

	<div class="article-content">
		<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'iheartcode' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			// for links within the page
			wp_link_pages( array(
				'before' => '<div>' . esc_html__( 'Pages:', 'iheartcode' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer>
	</footer>
</article>
