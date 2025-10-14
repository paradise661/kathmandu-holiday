<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package raraadventure
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function raraadventure_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'raraadventure_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function raraadventure_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'raraadventure_pingback_header');

// Return an alternate title, without prefix, for every type used in the get_the_archive_title().
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_year()) {
		$title = get_the_date(_x('Y', 'yearly archives date format'));
	} elseif (is_month()) {
		$title = get_the_date(_x('F Y', 'monthly archives date format'));
	} elseif (is_day()) {
		$title = get_the_date(_x('F j, Y', 'daily archives date format'));
	} elseif (is_tax('post_format')) {
		if (is_tax('post_format', 'post-format-aside')) {
			$title = _x('Asides', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-gallery')) {
			$title = _x('Galleries', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-image')) {
			$title = _x('Images', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-video')) {
			$title = _x('Videos', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-quote')) {
			$title = _x('Quotes', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-link')) {
			$title = _x('Links', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-status')) {
			$title = _x('Statuses', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-audio')) {
			$title = _x('Audio', 'post format archive title');
		} elseif (is_tax('post_format', 'post-format-chat')) {
			$title = _x('Chats', 'post format archive title');
		}
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_search()) {
		$title = sprintf(esc_html__('Search Results for: %s', 'signature-realty'), '<span>' . get_search_query() . '</span>');
	} elseif (is_home()) {
		$title = __('Blog');
	} elseif (is_404()) {
		$title = __('404 Not Found');
	} else {
		$title = __('Archives');
	}
	return $title;
});

/****************************************
 * Returns value if field is not empty **
 ****************************************/
function check_if_exists($value, $html_tag, $class = '')
{
	$get_content = '';
	if (!is_string($html_tag)) return $get_content;
	$add_class = $class != '' ? 'class="' . $class . '"' : '';
	switch ($html_tag) {
		case 'h1':
			if ($value) {
				$get_content .= '<h1 ' . $add_class . '>' . $value . '</h1>';
			}
			break;
		case 'h2':
			if ($value) {
				$get_content .= '<h2 ' . $add_class . '>' . $value . '</h2>';
			}
			break;
		case 'h3':
			if ($value) {
				$get_content .= '<h3 ' . $add_class . '>' . $value . '</h3>';
			}
			break;
		case 'h4':
			if ($value) {
				$get_content .= '<h4 ' . $add_class . '>' . $value . '</h4>';
			}
			break;
		case 'h5':
			if ($value) {
				$get_content .= '<h5 ' . $add_class . '>' . $value . '</h5>';
			}
			break;
		case 'h6':
			if ($value) {
				$get_content .= '<h6 ' . $add_class . '>' . $value . '</h6>';
			}
			break;
		case 'p':
			if ($value) {
				$get_content .= '<p ' . $add_class . '>' . $value . '</p>';
			}
			break;
		case 'small':
			if ($value) {
				$get_content .= '<small ' . $add_class . '>' . $value . '</small>';
			}
			break;
		case 'strong':
			if ($value) {
				$get_content .= '<strong ' . $add_class . '>' . $value . '</strong>';
			}
			break;
		case 'span':
			if ($value) {
				$get_content .= '<span ' . $add_class . '>' . $value . '</span>';
			}
			break;
		case 'em':
			if ($value) {
				$get_content .= '<em ' . $add_class . '>' . $value . '</em>';
			}
			break;
		default:
			return $get_content;
	}
	return $get_content;
}
/***************************************/


/*******************************************************
 * Function to return the ACF Link field array object **
 *******************************************************/
function kk_get_btn_link_title_and_target($button)
{
	if (!is_array($button)) return;
	if (class_exists('ACF')) {
		$btn_title = $button['title'];
		$btn_link = $button['url'];
		$btn_target = $button['target'] ? $button['target'] : '_self';
		$btn_details = array(
			'title' => $btn_title,
			'url' => $btn_link,
			'target' => $btn_target
		);
		return $btn_details;
	}
}
/***************************************/


/********************************
 * Function that returns posts **
 ********************************/
function kk_get_custom_post_type($number_of_post = -1, $post_slug = '', $order = 'DESC', $order_by = 'menu_order', $meta_key = '', $post_parent = 0, $category_slug = '', $taxonomy = '')
{
	if ($post_slug == '') return;
	$tax_query = array();
	if ('' != $category_slug && '' != $taxonomy) {
		$tax_query = array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $category_slug,
			),
		);
	}
	$args = array(
		'post_type'      => $post_slug,
		'posts_per_page' => $number_of_post,
		'orderby' => $order_by,
		'order' => $order,
		'meta_key' => $meta_key,
		'post_parent' => $post_parent,
		'tax_query' => $tax_query,
		'post_status' => 'publish',
	);
	$post_type_qry  = new WP_Query($args);
	wp_reset_postdata();
	return $post_type_qry->posts;
}
/***************************************/


/***********************************
 * Function that returns Thumbnails **
 ***********************************/
function get_thumbnail_url_and_alt_text($post_id,  $fall_back_image = '', $size = '', $class = '')
{
	if ($post_id == null) return null;
	if ($fall_back_image == '') $fall_back_image = home_url('/media/img27.jpg');
	$image_detail = [];
	$url = get_the_post_thumbnail_url($post_id, $size) ? get_the_post_thumbnail_url($post_id, $size) : $fall_back_image;
	$post_meta = get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
	$image_alt  = $post_meta ? $post_meta : get_the_title($post_id);

	$img_class = $class != '' ? 'class="' . $class . '"' : '';
	$image_url = $url;
	$image_alt = $image_alt;

	return '<img src="' . esc_url($image_url) . '" ' . $img_class . ' alt="' . esc_attr($image_alt) . '">';
}


/***********************************
 * Function that returns ACF Image **
 ***********************************/
function get_acf_image($image_object, $class = '', $size = '')
{
	if (class_exists('ACF')) {
		if ($image_object == null) return null;

		$image_url = $size != '' ? $image_object['sizes'][$size] : $image_object['url'];
		$image_alt = $image_object['alt'] ?: get_the_title();
		$img_class = $class != '' ? 'class="' . $class . '"' : '';

		return '<img src="' . $image_url . '" ' . $img_class . ' alt="' . $image_alt . '">';
	}
}

/***********************************
 * Function that returns taxonomy **
 ***********************************/
function kk_get_taxonomy($taxonomy_slug, $hide_empty = false)
{
	$get_taxpnomy = get_categories(array(
		'taxonomy' => $taxonomy_slug,
		'hide_empty' => $hide_empty,
	));
	return $get_taxpnomy;
}
/***************************************/

/***********************************
 * Function that trim letters **
 ***********************************/
function custom_length_excerpt($letter_count_limit, $custom_field)
{
	if ($custom_field) {
		$content = $custom_field;
	} else {
		$content = get_the_content();
	}
	$content = wp_strip_all_tags($content, true);
	if (strlen($content) >= $letter_count_limit) {
		$trim_content = substr($content, 0, $letter_count_limit) . '...';
		return apply_filters('the_content', $trim_content);
	} else {
		return apply_filters('the_content', $content);
	}
}

/*******************************************
 ********Single Post Navination ************
 *******************************************/

function filter_navigation_markup_template($template, $class)
{
	$template = '<div class="post-navigation">%3$s</div>';
	return $template;
}
add_filter('navigation_markup_template', 'filter_navigation_markup_template', 10, 2);

function kk_previous_post_link($output, $format, $link, $post, $adjacent)
{
	if (!$post) return '<div class="nav-prev"><a href="javascript:void(0)"><span class="nav-label">Previous Reading</span><span class="nav-title">No More Posts</span></a></div>';

	return '<div class="nav-prev"><a href="' . get_permalink($post->ID) . '"><span class="nav-label">Previous Reading</span><span class="nav-title">' . get_the_title($post->ID) . '</span></a></div>';
}
add_filter('previous_post_link', 'kk_previous_post_link', 10, 5);

function kk_next_post_link($output, $format, $link, $post, $adjacent)
{
	if (!$post) return '<div class="nav-next"><a href="javascript:void(0)"><span class="nav-label">Next Reading</span><span class="nav-title">No More Posts</span></a></div>';

	return '<div class="nav-next"><a href="' . get_permalink($post->ID) . '"><span class="nav-label">Next Reading</span><span class="nav-title">' . get_the_title($post->ID) . '</span></a></div>';
}
add_filter('next_post_link', 'kk_next_post_link', 10, 5);



/***********************************************************
 ************** Activate/Stores Views On Post **************
 ***********************************************************/
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wp_set_post_views($postID)
{
	$count_key = 'wpb_post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if ($count == '') {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

function wp_get_post_views()
{
	if (is_single()) {
		wp_set_post_views(get_the_ID());
	}
}
//add_filter('the_content', 'wp_get_post_views');
add_action('wp_head', 'wp_get_post_views');

/*******************************************
 ************** Admin Section **************
 *******************************************/

function wp_posts_columns($defaults)
{
	$defaults['wpb_post_views_count']  = esc_html__('Post Views', 'text_domain');
	return $defaults;
}
add_filter('manage_post_posts_columns', 'wp_posts_columns');
add_filter('manage_pit_trips_posts_columns', 'wp_posts_columns');


function wp_post_custom_column($column_name)
{
	if ($column_name == 'wpb_post_views_count') {
		$count = get_post_meta(get_the_ID(), 'wpb_post_views_count', true);
		$view_count = $count == '0' ? '1' : $count;
		echo esc_html__($view_count, 'text_domain');
	}
}
add_action('manage_post_posts_custom_column', 'wp_post_custom_column', 10, 2);
add_action('manage_pit_trips_posts_custom_column', 'wp_post_custom_column', 10, 2);


function wp_post_column_sortable()
{
	$columns['wpb_post_views_count'] = ['wpb_post_views_count', true];
	return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'wp_post_column_sortable');


function wp_sortable_custom_column_query($query)
{
	$orderby = $query->get('orderby');

	if ('wpb_post_views_count' == $orderby) {

		$meta_query = array(
			array(
				'key' => 'wpb_post_views_count',
				'value'   => '',
				'compare' => '>',
			),
		);

		$query->set('meta_query', $meta_query);
		$query->set('orderby', 'meta_value');
	}
}
add_action('pre_get_posts', 'wp_sortable_custom_column_query');
/***************************************/


/* -----------------------------------------------------------
Get Banner Image and Title for Posts and Pages
--------------------------------------------------------------- */
class GetBannerDetails
{
	public $ban_img = [], $ban_content = [];

	function banner_image_and_title_initialize()
	{
		if (class_exists('ACF')) {
			$banner = get_field('banner_details', get_the_ID());
			return $banner;
		}
	}

	function archive_page($page)
	{
		if (class_exists('ACF')) {
			switch ($page) {
				case 'blog':
					$blog_page = get_page_by_path('blog');
					$archive_page = get_field('banner_details', $blog_page->ID);
					break;
			}
			return $archive_page;
		}
	}
	function get_image_and_alt($image_obj, $fall_back_image, $page_title)
	{
		$this->ban_img['url'] = $fall_back_image;
		$this->ban_img['alt'] = $page_title;
		if (!empty($image_obj)) {
			$this->ban_img['url'] = $image_obj['url'] ? $image_obj['url'] : $fall_back_image;
			$this->ban_img['alt'] = $image_obj['alt'] ? $image_obj['alt'] : $page_title;
		}
		return $this->ban_img;
	}

	function get_banner_details($content, $fall_back_title)
	{
		$this->ban_content['banner_title'] = $fall_back_title;
		if (!empty($content)) {
			$this->ban_content['banner_title'] = $content['banner_title'] ? $content['banner_title'] : $fall_back_title;
		}
		return $this->ban_content;
	}

	/**
	 * @param $fall_back_image
	 * @return array
	 */
	function get_banner_title_and_image($fall_back_image = '')
	{
		if (is_home() && get_option('page_for_posts')) {
			$img = $this->get_image_and_alt($this->archive_page('blog')['banner_image'], $fall_back_image, get_the_archive_title());
			$content = $this->get_banner_details($this->archive_page('blog'), 'Blog');
		} elseif (is_page() || is_singular()) {
			$content = $this->get_banner_details($this->banner_image_and_title_initialize(), get_the_title());
			$img = $this->get_image_and_alt($this->banner_image_and_title_initialize()['banner_image'], $fall_back_image, get_the_title());

			// Get Default or dynamic Banner Image and Title For Available Listings Single Page
			if (is_singular('pit_trips')) {
				$content = $this->get_banner_details($this->banner_image_and_title_initialize(), get_the_title());
				$img = $this->get_image_and_alt($this->banner_image_and_title_initialize()['banner_image'], $fall_back_image, get_the_title());
			}
		} elseif (is_archive() || is_search() || is_tax()) {
			$content = $this->get_banner_details(array(), get_the_archive_title());
			$img = $this->get_image_and_alt(array(), $fall_back_image, get_the_archive_title());
		} elseif (is_404()) {
			$content = $this->get_banner_details(array(), '404');
		} else {
			$content = $this->get_banner_details(array(), get_the_title());
		}
		return $this->get_image_and_title($content, $img ?? null);
	}

	function get_image_and_title($content, $ban_image)
	{
		$ban = [];
		$ban['banner_title'] = $content['banner_title'];
		$ban['ban_image_url'] = $ban_image['url'];
		$ban['ban_image_alt'] = $ban_image['alt'];
		return $ban;
	}
}
/***************************************/
