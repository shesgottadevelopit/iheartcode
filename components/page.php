<?php
/**
 * Page template file
 * @package iheartcode
 */

get_header(); ?>
<main role="main">
	<?php
		// loop
		while ( have_posts() ) : the_post();
			get_template_part( 'content', 'page' );

			//comments - if applicable
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;  //end loop ?>
</main>
<?php
get_sidebar();
get_footer();
