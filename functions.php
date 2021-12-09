<?php 
/* enqueue script for parent theme stylesheeet */        
function child_theme_parent_styles() {
	
	wp_enqueue_script( 'jq-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js' , array( 'jquery' )  );
    wp_enqueue_style( 'jq-owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );
    wp_enqueue_style( 'jq-ui-style', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css' );

    wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );  
    wp_enqueue_script( 'indexjs-includer', get_stylesheet_directory_uri().'/index.js' );                       
    wp_enqueue_style( 'stylesheet-includer', get_stylesheet_directory_uri().'/style.css' );                       
   }
add_action( 'wp_enqueue_scripts', 'child_theme_parent_styles');

/* Create Custom Portfolio Post type */
add_action( 'init', 'your_prefix_register_post_type' );
function your_prefix_register_post_type() {
	$labels = [
		'name'                     => esc_html__( 'projects', 'your-textdomain' ),
		'singular_name'            => esc_html__( 'portfolio', 'your-textdomain' ),
		'add_new'                  => esc_html__( 'Add New', 'your-textdomain' ),
		'add_new_item'             => esc_html__( 'Add new portfolio', 'your-textdomain' ),
		'edit_item'                => esc_html__( 'Edit portfolio', 'your-textdomain' ),
		'new_item'                 => esc_html__( 'New portfolio', 'your-textdomain' ),
		'view_item'                => esc_html__( 'View portfolio', 'your-textdomain' ),
		'view_items'               => esc_html__( 'View projects', 'your-textdomain' ),
		'search_items'             => esc_html__( 'Search projects', 'your-textdomain' ),
		'not_found'                => esc_html__( 'No projects found', 'your-textdomain' ),
		'not_found_in_trash'       => esc_html__( 'No projects found in Trash', 'your-textdomain' ),
		'parent_item_colon'        => esc_html__( 'Parent portfolio:', 'your-textdomain' ),
		'all_items'                => esc_html__( 'All projects', 'your-textdomain' ),
		'archives'                 => esc_html__( 'Portfolio Archives', 'your-textdomain' ),
		'attributes'               => esc_html__( 'Portfolio Attributes', 'your-textdomain' ),
		'insert_into_item'         => esc_html__( 'Insert into portfolio', 'your-textdomain' ),
		'uploaded_to_this_item'    => esc_html__( 'Uploaded to this portfolio', 'your-textdomain' ),
		'featured_image'           => esc_html__( 'Featured image', 'your-textdomain' ),
		'set_featured_image'       => esc_html__( 'Set featured image', 'your-textdomain' ),
		'remove_featured_image'    => esc_html__( 'Remove featured image', 'your-textdomain' ),
		'use_featured_image'       => esc_html__( 'Use as featured image', 'your-textdomain' ),
		'menu_name'                => esc_html__( 'Projects', 'your-textdomain' ),
		'filter_items_list'        => esc_html__( 'Filter projects list', 'your-textdomain' ),
		'filter_by_date'           => esc_html__( '', 'your-textdomain' ),
		'items_list_navigation'    => esc_html__( 'Projects list navigation', 'your-textdomain' ),
		'items_list'               => esc_html__( 'Projects list', 'your-textdomain' ),
		'item_published'           => esc_html__( 'Portfolio published', 'your-textdomain' ),
		'item_published_privately' => esc_html__( 'Portfolio published privately', 'your-textdomain' ),
		'item_reverted_to_draft'   => esc_html__( 'Portfolio reverted to draft', 'your-textdomain' ),
		'item_scheduled'           => esc_html__( 'Portfolio scheduled', 'your-textdomain' ),
		'item_updated'             => esc_html__( 'Portfolio updated', 'your-textdomain' ),
	];
	$args = [
		'label'               => esc_html__( 'Projects', 'your-textdomain' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'hierarchical'        => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'query_var'           => true,
		'can_export'          => true,
		'delete_with_user'    => true,
		'has_archive'         => true,
		'rest_base'           => '',
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-admin-generic',
		'menu_position'       => '',
		'capability_type'     => 'post',
		'supports'            => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'comments'],
		'taxonomies'          => [],
		'rewrite'             => [
			'with_front' => false,
		],
	];

	register_post_type( 'portfolio', $args );
}

/* Registering Taxonomy for Portfolio */
add_action( 'init', 'register_portfolio_category_taxonomy' );
function register_portfolio_category_taxonomy() {
	$labels = [
		'name'                       => esc_html__( 'Portfolio Categories', 'your-textdomain' ),
		'singular_name'              => esc_html__( 'Porfolio Category', 'your-textdomain' ),
		'menu_name'                  => esc_html__( 'Portfolio Categories', 'your-textdomain' ),
		'search_items'               => esc_html__( 'Search Portfolio Categories', 'your-textdomain' ),
		'popular_items'              => esc_html__( 'Popular Portfolio Categories', 'your-textdomain' ),
		'all_items'                  => esc_html__( 'All Portfolio Categories', 'your-textdomain' ),
		'parent_item'                => esc_html__( 'Parent Porfolio Category', 'your-textdomain' ),
		'parent_item_colon'          => esc_html__( 'Parent Porfolio Category', 'your-textdomain' ),
		'edit_item'                  => esc_html__( 'Edit Porfolio Category', 'your-textdomain' ),
		'view_item'                  => esc_html__( 'View Porfolio Category', 'your-textdomain' ),
		'update_item'                => esc_html__( 'Update Porfolio Category', 'your-textdomain' ),
		'add_new_item'               => esc_html__( 'Add new porfolio category', 'your-textdomain' ),
		'new_item_name'              => esc_html__( 'New porfolio category name', 'your-textdomain' ),
		'separate_items_with_commas' => esc_html__( 'Separate portfolio categories with commas', 'your-textdomain' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove portfolio categories', 'your-textdomain' ),
		'choose_from_most_used'      => esc_html__( 'Choose most used portfolio categories', 'your-textdomain' ),
		'not_found'                  => esc_html__( 'No portfolio categories found', 'your-textdomain' ),
		'no_terms'                   => esc_html__( 'No Portfolio Categories', 'your-textdomain' ),
		'filter_by_item'             => esc_html__( 'Filter by porfolio category', 'your-textdomain' ),
		'items_list_navigation'      => esc_html__( 'Portfolio categories list pagination', 'your-textdomain' ),
		'items_list'                 => esc_html__( 'Portfolio Categories list', 'your-textdomain' ),
		'most_used'                  => esc_html__( 'Most Used', 'your-textdomain' ),
		'back_to_items'              => esc_html__( 'Back to portfolio categories', 'your-textdomain' ),
	];
	$args = [
		'label'              => esc_html__( 'Portfolio Categories', 'your-textdomain' ),
		'labels'             => $labels,
		'description'        => '',
		'public'             => true,
		'publicly_queryable' => true,
		'hierarchical'       => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'meta_box_cb'        => true,
		'show_in_rest'       => true,
		'show_tagcloud'      => true,
		'show_in_quick_edit' => true,
		'show_admin_column'  => false,
		'query_var'          => true,
		'sort'               => false,
		'rest_base'          => '',
		'rewrite'            => [
			'with_front'   => false,
			'hierarchical' => false,
		],
	];
	register_taxonomy( 'porfolio-category', ['portfolio'], $args );
}
