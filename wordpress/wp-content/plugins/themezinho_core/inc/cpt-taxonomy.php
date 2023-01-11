<?php

if ( ! function_exists('motts_solution_cpt') ) {

// Register Custom Post Type
	function motts_solution_cpt() {

		$labels = array(
			'name'                  => _x( 'Solutions', 'Post Type General Name', 'uoncorp' ),
			'singular_name'         => _x( 'Solution', 'Post Type Singular Name', 'uoncorp' ),
			'menu_name'             => __( 'Solutions', 'uoncorp' ),
			'name_admin_bar'        => __( 'Solution', 'uoncorp' ),
			'archives'              => __( 'Solution Archives', 'uoncorp' ),
			'attributes'            => __( 'Solution Attributes', 'uoncorp' ),
			'parent_item_colon'     => __( 'Parent solution:', 'uoncorp' ),
			'all_items'             => __( 'All solutions', 'uoncorp' ),
			'add_new_item'          => __( 'Add New solution', 'uoncorp' ),
			'add_new'               => __( 'Add New', 'uoncorp' ),
			'new_item'              => __( 'New solution', 'uoncorp' ),
			'edit_item'             => __( 'Edit solution', 'uoncorp' ),
			'update_item'           => __( 'Update solution', 'uoncorp' ),
			'view_item'             => __( 'View solution', 'uoncorp' ),
			'view_items'            => __( 'View solutions', 'uoncorp' ),
			'search_items'          => __( 'Search solution', 'uoncorp' ),
			'not_found'             => __( 'Not found', 'uoncorp' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'uoncorp' ),
			'featured_image'        => __( 'Featured Image', 'uoncorp' ),
			'set_featured_image'    => __( 'Set featured image', 'uoncorp' ),
			'remove_featured_image' => __( 'Remove featured image', 'uoncorp' ),
			'use_featured_image'    => __( 'Use as featured image', 'uoncorp' ),
			'insert_into_item'      => __( 'Insert into solution', 'uoncorp' ),
			'uploaded_to_this_item' => __( 'Uploaded to this solution', 'uoncorp' ),
			'items_list'            => __( 'solutions list', 'uoncorp' ),
			'items_list_navigation' => __( 'solutions list navigation', 'uoncorp' ),
			'filter_items_list'     => __( 'Filter solutions list', 'uoncorp' ),
		);
		$args = array(
			'label'                 => __( 'Solution', 'uoncorp' ),
			'description'           => __( 'Solution Description', 'uoncorp' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-view-site',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'solution', $args );

	}
	add_action( 'init', 'motts_solution_cpt', 0 );

}

if ( ! function_exists( 'motts_solution_tag_taxonomy' ) ) {

// Register Custom Taxonomy
	function motts_solution_tag_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Tags', 'Taxonomy General Name', 'uoncorp' ),
			'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'uoncorp' ),
			'menu_name'                  => __( 'Tags', 'uoncorp' ),
			'all_items'                  => __( 'All Tags', 'uoncorp' ),
			'parent_item'                => __( 'Parent Tag', 'uoncorp' ),
			'parent_item_colon'          => __( 'Parent Tag:', 'uoncorp' ),
			'new_item_name'              => __( 'New Tag Name', 'uoncorp' ),
			'add_new_item'               => __( 'Add New Tag', 'uoncorp' ),
			'edit_item'                  => __( 'Edit Tag', 'uoncorp' ),
			'update_item'                => __( 'Update Tag', 'uoncorp' ),
			'view_item'                  => __( 'View Tag', 'uoncorp' ),
			'separate_items_with_commas' => __( 'Separate tags with commas', 'uoncorp' ),
			'add_or_remove_items'        => __( 'Add or remove tags', 'uoncorp' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'uoncorp' ),
			'popular_items'              => __( 'Popular tags', 'uoncorp' ),
			'search_items'               => __( 'Search Tags', 'uoncorp' ),
			'not_found'                  => __( 'Not Found', 'uoncorp' ),
			'no_terms'                   => __( 'No tags', 'uoncorp' ),
			'items_list'                 => __( 'Tags list', 'uoncorp' ),
			'items_list_navigation'      => __( 'Tags list navigation', 'uoncorp' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'solution_tag', array( 'solution' ), $args );

	}
	add_action( 'init', 'motts_solution_tag_taxonomy', 0 );

}

if ( ! function_exists('motts_hero_cpt') ) {

// Register Custom Post Type
	function motts_hero_cpt() {

		$labels = array(
			'name'                  => _x( 'Headers', 'Post Type General Name', 'uoncorp' ),
			'singular_name'         => _x( 'Hero Banner', 'Post Type Singular Name', 'uoncorp' ),
			'menu_name'             => __( 'Headers', 'uoncorp' ),
			'name_admin_bar'        => __( 'Hero Banner', 'uoncorp' ),
			'archives'              => __( 'Hero Banner Archives', 'uoncorp' ),
			'attributes'            => __( 'Hero Banner Attributes', 'uoncorp' ),
			'parent_item_colon'     => __( 'Parent Hero Banner:', 'uoncorp' ),
			'all_items'             => __( 'All Headers', 'uoncorp' ),
			'add_new_item'          => __( 'Add New Hero Banner', 'uoncorp' ),
			'add_new'               => __( 'Add New', 'uoncorp' ),
			'new_item'              => __( 'New Hero Banner', 'uoncorp' ),
			'edit_item'             => __( 'Edit Hero Banner', 'uoncorp' ),
			'update_item'           => __( 'Update Hero Banner', 'uoncorp' ),
			'view_item'             => __( 'View Hero Banner', 'uoncorp' ),
			'view_items'            => __( 'View Headers', 'uoncorp' ),
			'search_items'          => __( 'Search Hero Banner', 'uoncorp' ),
			'not_found'             => __( 'Not found', 'uoncorp' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'uoncorp' ),
			'featured_image'        => __( 'Featured Image', 'uoncorp' ),
			'set_featured_image'    => __( 'Set featured image', 'uoncorp' ),
			'remove_featured_image' => __( 'Remove featured image', 'uoncorp' ),
			'use_featured_image'    => __( 'Use as featured image', 'uoncorp' ),
			'insert_into_item'      => __( 'Insert into Hero Banner', 'uoncorp' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Hero Banner', 'uoncorp' ),
			'items_list'            => __( 'Headers list', 'uoncorp' ),
			'items_list_navigation' => __( 'Headers list navigation', 'uoncorp' ),
			'filter_items_list'     => __( 'Filter Headers list', 'uoncorp' ),
		);
		$args = array(
			'label'                 => __( 'Hero Banner', 'uoncorp' ),
			'description'           => __( 'Hero Banner Description', 'uoncorp' ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'hierarchical'          => true,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-widgets-menus',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'hero', $args );

	}
	add_action( 'init', 'motts_hero_cpt', 0 );

}
