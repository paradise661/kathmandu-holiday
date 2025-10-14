<?php

class CustomPostTypeAndTaxonomy
{

	private $text_domain  = 'adventure-inc';
	public $post_type_slug_list = [];
	public function __construct()
	{
		add_action('init', [$this, 'init']);
	}
	public function init()
	{

		add_action('init', [$this, 'register_reviews_post_type'], 11);
		add_action('init', [$this, 'register_team_post_type'], 11);
		add_action('init', [$this, 'register_trips_post_type'], 11);
		add_action('init', [$this, 'register_trip_taxonomy'], 11);
		add_action('init', [$this, 'register_trip_category'], 11);
		add_action('init', [$this, 'register_trip_offer'], 11);
	}


	public function register_reviews_post_type()
	{
		/*
		 * Company Post Type
		 * */
		$singular_name  = 'Review';
		$_name          = 'Reviews';
		$post_type_slug = 'pit_reviews';
		$post_rewrite = 'reviews';
		$rewrite      = $post_rewrite ? array('slug' => $post_rewrite, 'with_front' => false) : array();
		$labels       = array(
			'name'                  => _x($_name, 'Post Type General Name', $this->text_domain),
			'singular_name'         => _x($singular_name, 'Post Type Singular Name', $this->text_domain),
			'menu_name'             => __($_name, $this->text_domain),
			'name_admin_bar'        => __($_name, $this->text_domain),
			'archives'              => __($_name . ' Archives', $this->text_domain),
			'parent_item_colon'     => __('Parent Item:', $this->text_domain),
			'all_items'             => __('All ' . $_name, $this->text_domain),
			'add_new_item'          => __('Add New ' . $singular_name, $this->text_domain),
			'add_new'               => __('Add New', $this->text_domain),
			'new_item'              => __('New ' . $singular_name, $this->text_domain),
			'edit_item'             => __('Edit ' . $singular_name, $this->text_domain),
			'update_item'           => __('Update ' . $singular_name, $this->text_domain),
			'view_item'             => __('View ' . $singular_name, $this->text_domain),
			'search_items'          => __('Search ' . $singular_name, $this->text_domain),
			'not_found'             => __('Not found', $this->text_domain),
			'not_found_in_trash'    => __('Not found in Trash', $this->text_domain),
			'featured_image'        => __('Featured Image', $this->text_domain),
			'set_featured_image'    => __('Set featured image', $this->text_domain),
			'remove_featured_image' => __('Remove featured image', $this->text_domain),
			'use_featured_image'    => __('Use as featured image', $this->text_domain),
			'insert_into_item'      => __('Insert into ' . $singular_name, $this->text_domain),
			'uploaded_to_this_item' => __('Uploaded to this ' . $singular_name, $this->text_domain),
			'items_list'            => __($singular_name . ' list', $this->text_domain),
			'items_list_navigation' => __($singular_name . ' list navigation', $this->text_domain),
			'filter_items_list'     => __('Filter ' . $singular_name . ' list', $this->text_domain),
		);
		$args         = array(
			'label'               => __($singular_name, $this->text_domain),
			'description'         => __($singular_name, $this->text_domain),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
			'hierarchical'        => true,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 25,
			'menu_icon'           => 'dashicons-star-filled',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'rewrite'             => $rewrite,
		);
		register_post_type($post_type_slug, $args);
	}

	public function register_team_post_type()
	{
		/*
		 * Company Post Type
		 * */
		$singular_name  = 'Teams';
		$_name          = 'Teams';
		$post_type_slug = 'pit_teams';
		$post_rewrite = 'team';
		$rewrite      = $post_rewrite ? array('slug' => $post_rewrite, 'with_front' => false) : array();
		$labels       = array(
			'name'                  => _x($_name, 'Post Type General Name', $this->text_domain),
			'singular_name'         => _x($singular_name, 'Post Type Singular Name', $this->text_domain),
			'menu_name'             => __($_name, $this->text_domain),
			'name_admin_bar'        => __($_name, $this->text_domain),
			'archives'              => __($_name . ' Archives', $this->text_domain),
			'parent_item_colon'     => __('Parent Item:', $this->text_domain),
			'all_items'             => __('All ' . $_name, $this->text_domain),
			'add_new_item'          => __('Add New ' . $singular_name, $this->text_domain),
			'add_new'               => __('Add New', $this->text_domain),
			'new_item'              => __('New ' . $singular_name, $this->text_domain),
			'edit_item'             => __('Edit ' . $singular_name, $this->text_domain),
			'update_item'           => __('Update ' . $singular_name, $this->text_domain),
			'view_item'             => __('View ' . $singular_name, $this->text_domain),
			'search_items'          => __('Search ' . $singular_name, $this->text_domain),
			'not_found'             => __('Not found', $this->text_domain),
			'not_found_in_trash'    => __('Not found in Trash', $this->text_domain),
			'featured_image'        => __('Featured Image', $this->text_domain),
			'set_featured_image'    => __('Set featured image', $this->text_domain),
			'remove_featured_image' => __('Remove featured image', $this->text_domain),
			'use_featured_image'    => __('Use as featured image', $this->text_domain),
			'insert_into_item'      => __('Insert into ' . $singular_name, $this->text_domain),
			'uploaded_to_this_item' => __('Uploaded to this ' . $singular_name, $this->text_domain),
			'items_list'            => __($singular_name . ' list', $this->text_domain),
			'items_list_navigation' => __($singular_name . ' list navigation', $this->text_domain),
			'filter_items_list'     => __('Filter ' . $singular_name . ' list', $this->text_domain),
		);
		$args         = array(
			'label'               => __($singular_name, $this->text_domain),
			'description'         => __($singular_name, $this->text_domain),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
			'hierarchical'        => true,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 25,
			'menu_icon'           => 'dashicons-admin-users',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'rewrite'             => $rewrite,
		);
		register_post_type($post_type_slug, $args);
	}

	public function register_trips_post_type()
	{
		/*
		 * Company Post Type
		 * */
		$singular_name  = 'Trips';
		$_name          = 'Trips';
		$post_type_slug = 'pit_trips';
		$post_rewrite = 'trips';
		$rewrite      = $post_rewrite ? array('slug' => $post_rewrite, 'with_front' => false) : array();
		$labels       = array(
			'name'                  => _x($_name, 'Post Type General Name', $this->text_domain),
			'singular_name'         => _x($singular_name, 'Post Type Singular Name', $this->text_domain),
			'menu_name'             => __($_name, $this->text_domain),
			'name_admin_bar'        => __($_name, $this->text_domain),
			'archives'              => __($_name . ' Archives', $this->text_domain),
			'parent_item_colon'     => __('Parent Item:', $this->text_domain),
			'all_items'             => __('All ' . $_name, $this->text_domain),
			'add_new_item'          => __('Add New ' . $singular_name, $this->text_domain),
			'add_new'               => __('Add New', $this->text_domain),
			'new_item'              => __('New ' . $singular_name, $this->text_domain),
			'edit_item'             => __('Edit ' . $singular_name, $this->text_domain),
			'update_item'           => __('Update ' . $singular_name, $this->text_domain),
			'view_item'             => __('View ' . $singular_name, $this->text_domain),
			'search_items'          => __('Search ' . $singular_name, $this->text_domain),
			'not_found'             => __('Not found', $this->text_domain),
			'not_found_in_trash'    => __('Not found in Trash', $this->text_domain),
			'featured_image'        => __('Featured Image', $this->text_domain),
			'set_featured_image'    => __('Set featured image', $this->text_domain),
			'remove_featured_image' => __('Remove featured image', $this->text_domain),
			'use_featured_image'    => __('Use as featured image', $this->text_domain),
			'insert_into_item'      => __('Insert into ' . $singular_name, $this->text_domain),
			'uploaded_to_this_item' => __('Uploaded to this ' . $singular_name, $this->text_domain),
			'items_list'            => __($singular_name . ' list', $this->text_domain),
			'items_list_navigation' => __($singular_name . ' list navigation', $this->text_domain),
			'filter_items_list'     => __('Filter ' . $singular_name . ' list', $this->text_domain),
		);
		$args         = array(
			'label'               => __($singular_name, $this->text_domain),
			'description'         => __($singular_name, $this->text_domain),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 25,
			'menu_icon'           => 'dashicons-admin-multisite',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'rewrite'             => $rewrite,
		);
		register_post_type($post_type_slug, $args);
	}

	public function register_trip_taxonomy()
	{
		$post_type_slug = array('pit_trips');
		$singular_name  = 'Destination';
		$_name          = 'Destination';
		$tax_slug       = 'pit_destination';
		$tax_rewrite    = 'destination';
		/* Register Custom Taxonomy Category*/

		$labels = array(
			'name'                       => _x($_name, 'Taxonomy General Name', $this->text_domain),
			'singular_name'              => _x($singular_name, 'Taxonomy Singular Name', $this->text_domain),
			'menu_name'                  => __($singular_name, $this->text_domain),
			'all_items'                  => __('All ' . $_name, $this->text_domain),
			'parent_item'                => __('Parent ' . $_name, $this->text_domain),
			'parent_item_colon'          => __('Parent ' . $_name . ':', $this->text_domain),
			'new_item_name'              => __('New ' . $singular_name . ' Name', $this->text_domain),
			'add_new_item'               => __('Add New ' . $singular_name, $this->text_domain),
			'edit_item'                  => __('Edit ' . $singular_name, $this->text_domain),
			'update_item'                => __('Update ' . $singular_name, $this->text_domain),
			'view_item'                  => __('View ' . $singular_name, $this->text_domain),
			'separate_items_with_commas' => __('Separate ' . $_name . ' with commas', $this->text_domain),
			'add_or_remove_items'        => __('Add or remove ' . $singular_name, $this->text_domain),
			'choose_from_most_used'      => __('Choose from the most used', $this->text_domain),
			'popular_items'              => __('Popular ' . $_name, $this->text_domain),
			'search_items'               => __('Search ' . $_name, $this->text_domain),
			'not_found'                  => __('Not Found', $this->text_domain),
			'no_terms'                   => __('No ' . $singular_name, $this->text_domain),
			'items_list'                 => __('Items list', $this->text_domain),
			'items_list_navigation'      => __('Items list navigation', $this->text_domain),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => array('slug' => $tax_rewrite, 'with_front' => false),
			'has_archive' => false
		);
		register_taxonomy($tax_slug, $post_type_slug, $args);
	}

	public function register_trip_category()
	{
		$post_type_slug = array('pit_trips');
		$singular_name  = 'Category';
		$_name          = 'Category';
		$tax_slug       = 'pit_category';
		$tax_rewrite    = 'trip-category';
		/* Register Custom Taxonomy Category*/

		$labels = array(
			'name'                       => _x($_name, 'Taxonomy General Name', $this->text_domain),
			'singular_name'              => _x($singular_name, 'Taxonomy Singular Name', $this->text_domain),
			'menu_name'                  => __($singular_name, $this->text_domain),
			'all_items'                  => __('All ' . $_name, $this->text_domain),
			'parent_item'                => __('Parent ' . $_name, $this->text_domain),
			'parent_item_colon'          => __('Parent ' . $_name . ':', $this->text_domain),
			'new_item_name'              => __('New ' . $singular_name . ' Name', $this->text_domain),
			'add_new_item'               => __('Add New ' . $singular_name, $this->text_domain),
			'edit_item'                  => __('Edit ' . $singular_name, $this->text_domain),
			'update_item'                => __('Update ' . $singular_name, $this->text_domain),
			'view_item'                  => __('View ' . $singular_name, $this->text_domain),
			'separate_items_with_commas' => __('Separate ' . $_name . ' with commas', $this->text_domain),
			'add_or_remove_items'        => __('Add or remove ' . $singular_name, $this->text_domain),
			'choose_from_most_used'      => __('Choose from the most used', $this->text_domain),
			'popular_items'              => __('Popular ' . $_name, $this->text_domain),
			'search_items'               => __('Search ' . $_name, $this->text_domain),
			'not_found'                  => __('Not Found', $this->text_domain),
			'no_terms'                   => __('No ' . $singular_name, $this->text_domain),
			'items_list'                 => __('Items list', $this->text_domain),
			'items_list_navigation'      => __('Items list navigation', $this->text_domain),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => array('slug' => $tax_rewrite, 'with_front' => false),
			'has_archive' => false
		);
		register_taxonomy($tax_slug, $post_type_slug, $args);
	}

	public function register_trip_offer()
	{
		$post_type_slug = array('pit_trips');
		$singular_name  = 'Offer';
		$_name          = 'Offer';
		$tax_slug       = 'pit_offer';
		$tax_rewrite    = 'offer';
		/* Register Custom Taxonomy Category*/

		$labels = array(
			'name'                       => _x($_name, 'Taxonomy General Name', $this->text_domain),
			'singular_name'              => _x($singular_name, 'Taxonomy Singular Name', $this->text_domain),
			'menu_name'                  => __($singular_name, $this->text_domain),
			'all_items'                  => __('All ' . $_name, $this->text_domain),
			'parent_item'                => __('Parent ' . $_name, $this->text_domain),
			'parent_item_colon'          => __('Parent ' . $_name . ':', $this->text_domain),
			'new_item_name'              => __('New ' . $singular_name . ' Name', $this->text_domain),
			'add_new_item'               => __('Add New ' . $singular_name, $this->text_domain),
			'edit_item'                  => __('Edit ' . $singular_name, $this->text_domain),
			'update_item'                => __('Update ' . $singular_name, $this->text_domain),
			'view_item'                  => __('View ' . $singular_name, $this->text_domain),
			'separate_items_with_commas' => __('Separate ' . $_name . ' with commas', $this->text_domain),
			'add_or_remove_items'        => __('Add or remove ' . $singular_name, $this->text_domain),
			'choose_from_most_used'      => __('Choose from the most used', $this->text_domain),
			'popular_items'              => __('Popular ' . $_name, $this->text_domain),
			'search_items'               => __('Search ' . $_name, $this->text_domain),
			'not_found'                  => __('Not Found', $this->text_domain),
			'no_terms'                   => __('No ' . $singular_name, $this->text_domain),
			'items_list'                 => __('Items list', $this->text_domain),
			'items_list_navigation'      => __('Items list navigation', $this->text_domain),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => array('slug' => $tax_rewrite, 'with_front' => false),
			'has_archive' => false
		);
		register_taxonomy($tax_slug, $post_type_slug, $args);
	}
}
