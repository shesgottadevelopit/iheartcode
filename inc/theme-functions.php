<?php

/**
 * Theme-specific functions, toggle comments to activate
 * @package iheartcode
 */

/**
 * Custom pagination for akudo.codes
 * Page X of Y
 */

function iheartcode_pagination() {
	global $wp_query;
	
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$big = 999999999; // need an unlikely integer
	$current_page = max(1, get_query_var('paged'));
	$pages = $wp_query->max_num_pages;

	$links = paginate_links(array(
		'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages,
		'show_all' => false,
		'prev_next' => true,
		'prev_text' => __('<span class="prev-nav">&laquo;<span class="swap">Newer Posts</span></span>'),
		'next_text' => __('<span class="next-nav"><span class="swap">Older Posts</span> &raquo;</span>'),
		'end_size' => 1,
		'mid_size' => 2,
		'type' => 'plain',
		'before_page_number' => '<span class="page-nums">',
		'after_page_number' => '</span>'
	));
	
	if ( $links ) :
		?>
	<nav class="posts-pagination" role="navigation">
		<h4 class="screen-reader-text"><?php _e( 'Posts navigation', 'iheartcode' ); ?></h4>
		<?php
		//printf(__('<span class="pagination-page-count">Page %s of %s</span>', 'iheartcode'), $current_page, $pages);
		echo $links; ?>
	</nav>
	<?php
	endif;
}


/**
 * Custom Excerpts Indicator
 * Replaces default [...] with just ...
 */
function iheartcode_excerpt_more($more) {
	return " ...";
}

add_filter('excerpt_more', 'iheartcode_excerpt_more');

/**
 * Adds support for excerpts on pages
 */
function iheartcode_add_excerpts_to_pages() {
	add_post_type_support('page', 'excerpt');
}

add_action('init', 'iheartcode_add_excerpts_to_pages');

/**
 * Utility function to check if a gravatar exists for a given email or id
 * @param int|string|object $id_or_email A user ID,  email address, or comment object
 * @return bool if the gravatar exists or not
 */
function validate_gravatar($id_or_email) {
	//id or email code borrowed from wp-includes/pluggable.php
	$email = '';
	if (is_numeric($id_or_email)) {
		$id = (int) $id_or_email;
		$user = get_userdata($id);
		if ($user)
			$email = $user->user_email;
	} elseif (is_object($id_or_email)) {
		// No avatar for pingbacks or trackbacks
		$allowed_comment_types = apply_filters('get_avatar_comment_types', array('comment'));
		if (!empty($id_or_email->comment_type) && !in_array($id_or_email->comment_type, (array) $allowed_comment_types))
			return false;

		if (!empty($id_or_email->user_id)) {
			$id = (int) $id_or_email->user_id;
			$user = get_userdata($id);
			if ($user)
				$email = $user->user_email;
		} elseif (!empty($id_or_email->comment_author_email)) {
			$email = $id_or_email->comment_author_email;
		}
	} else {
		$email = $id_or_email;
	}

	$hashkey = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hashkey . '?d=404';

	$data = wp_cache_get($hashkey);
	if (false === $data) {
		$response = wp_remote_head($uri);
		if (is_wp_error($response)) {
			$data = 'not200';
		} else {
			$data = $response['response']['code'];
		}
		wp_cache_set($hashkey, $data, $group = '', $expire = 60 * 5);
	}
	if ($data == '200') {
		return true;
	} else {
		return false;
	}
}

// Escape HTML in <code> or <pre><code> tags.
function escapeHTML($arr) {

	if (version_compare(PHP_VERSION, '5.2.3') >= 0) {

		$output = htmlspecialchars($arr[2], ENT_NOQUOTES, get_bloginfo('charset'), false);
	} else {
		$specialChars = array(
			'&' => '&amp;',
			'<' => '&lt;',
			'>' => '&gt;'
		);

		// decode already converted data
		$data = htmlspecialchars_decode($arr[2]);
		// escapse all data inside <pre>
		$output = strtr($data, $specialChars);
	}
	if (!empty($output)) {
		return $arr[1] . $output . $arr[3];
	} else {
		return $arr[1] . $arr[2] . $arr[3];
	}
}

function filterCode($data) { // Uncomment if you want to escape anything within a <pre> tag
	//$modifiedData = preg_replace_callback('@(<pre.*>)(.*)(<\/pre>)@isU', 'escapeHTML', $data);
	$modifiedData = preg_replace_callback('@(<code.*>)(.*)(<\/code>)@isU', 'escapeHTML', $data);
	$modifiedData = preg_replace_callback('@(<tt.*>)(.*)(<\/tt>)@isU', 'escapeHTML', $modifiedData);

	return $modifiedData;
}

add_filter('content_save_pre', 'filterCode', 9);
add_filter('excerpt_save_pre', 'filterCode', 9);
