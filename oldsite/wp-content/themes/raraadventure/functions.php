<?php

/**
 * raraadventure functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package raraadventure
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function raraadventure_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on raraadventure, use a find and replace
		* to change 'raraadventure' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('raraadventure', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');
	add_image_size('blog-thumb', 360, 301, true);
	add_image_size('single-thumb', 80, 67, true);
	add_image_size('trip-thumb', 364, 304, true);
	add_image_size('reveiw-thumb', 121, 121, true);
	add_image_size('team-thumb', 360, 343, true);
	add_image_size('special-thumb', 360, 450, true);
	add_image_size('destination-thumb', 405, 697, true);
	add_image_size('destination-thumb-2', 451, 250, true);


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'nav-pri' => esc_html__('Primary', 'raraadventure'),
			'nav-footer' => esc_html__('Footer', 'raraadventure'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'raraadventure_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'raraadventure_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function raraadventure_content_width()
{
	$GLOBALS['content_width'] = apply_filters('raraadventure_content_width', 640);
}
add_action('after_setup_theme', 'raraadventure_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function raraadventure_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'raraadventure'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'raraadventure'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'raraadventure_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function raraadventure_scripts()
{
	wp_enqueue_style('raraadventure-boot', get_template_directory_uri() . '/assets/vendors/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('raraadventure-font', get_template_directory_uri() . '/assets/vendors/fontawesome/css/all.min.css');
	wp_enqueue_style('raraadventure-jquery', get_template_directory_uri() . '/assets/vendors/jquery-ui/jquery-ui.min.css');
	wp_enqueue_style('raraadventure-modal', get_template_directory_uri() . '/assets/vendors/modal-video/modal-video.min.css');
	wp_enqueue_style('raraadventure-lightbox', get_template_directory_uri() . '/assets/vendors/lightbox/dist/css/lightbox.min.css');
	wp_enqueue_style('raraadventure-slick', get_template_directory_uri() . '/assets/vendors/slick/slick.css');
	wp_enqueue_style('raraadventure-theme', get_template_directory_uri() . '/assets/vendors/slick/slick-theme.css');
	wp_enqueue_style('raraadventure-style', get_stylesheet_uri(), array(), _S_VERSION);
	//wp_style_add_data('raraadventure-style', 'rtl', 'replace');

	//wp_enqueue_script('raraadventure-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('raraadventure-j', get_template_directory_uri() . '/assets/js/jquery.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-boot', get_template_directory_uri() . '/assets/vendors/bootstrap/js/bootstrap.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-jquery', get_template_directory_uri() . '/assets/vendors/jquery-ui/jquery-ui.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-count', get_template_directory_uri() . '/assets/vendors/countdown-date-loop-counter/loopcounter.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-counter', get_template_directory_uri() . '/assets/js/jquery.counterup.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-modal', get_template_directory_uri() . '/assets/vendors/modal-video/jquery-modal-video.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-masonry', get_template_directory_uri() . '/assets/vendors/masonry/masonry.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-light', get_template_directory_uri() . '/assets/vendors/lightbox/dist/js/lightbox.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-slick', get_template_directory_uri() . '/assets/vendors/slick/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-nav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), null, true);
	wp_enqueue_script('raraadventure-custom', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery'), null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'raraadventure_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Paradise
 */
require get_template_directory() . '/inc/Paradise/Paradise.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load Custom Nav Walker.
 */
if (!file_exists(get_template_directory() . '/inc/pit-bootstrap-navwalker.php')) {
	wp_die('<div style="text-align:center"><h1 style="font-weight:normal">Custom Walker Nav Not Found</h1><p>Opps we have got error!<br>It appears the bootstrap-navwalker.php file may be missing.</p></div>', 'Custom Walker Nav Not Found');
} else {
	require_once get_template_directory() . '/inc/pit-bootstrap-navwalker.php';
}

/**
 * ACF
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}


function get_the_brand_logo($class = "")
{
	if (get_custom_logo()) :
		the_custom_logo();
	else :
		$img = array('logo.svg', 'logo.png', 'logo.jpg');
		$brand = '<span class="' . $class . '">' . get_bloginfo('name') . '</span>';
		foreach ($img as $logo) {
			if (file_exists(get_template_directory() . '/img/' . $logo)) {
				$brand = '<img src="' . get_template_directory_uri() . '/img/' . $logo . '" alt="' . get_bloginfo('name') . '">';
			} elseif (file_exists(get_template_directory() . '/images/' . $logo)) {
				$brand = '<img src="' . get_template_directory_uri() . '/images/' . $logo . '" alt="' . get_bloginfo('name') . '">';
			}
		}
		return '<a class="' . $class . '" href="' . esc_url(home_url('/')) . '">' . $brand . '</a>';
	endif;
	return false;
}
function the_brand_logo()
{
	echo get_the_brand_logo();
}
