<?php
	
	add_action( 'init', 'create_post_type' );
	
	function create_post_type() {
		
		register_post_type( 'live_study', [
			'taxonomies'    => [ 'live_studies_category' ],
			// post related taxonomies
			'label'         => null,
			'labels'        => [
				'name'              => 'Live Study', // name for the post type.
				'singular_name'     => 'Live Study', // name for single post of that type.
				'add_new'           => 'Add Live Study', // to add a new post.
				'add_new_item'      => 'Adding Live Study', // title for a newly created post in the admin panel.
				'edit_item'         => 'Edit Live Study', // for editing post type.
				'new_item'          => 'New Live Study', // new post's text.
				'view_item'         => 'See Live Study', // for viewing this post type.
				'search_items'      => 'Search Live Study', // search for these post types.
				'not_found'         => 'Not Found', // if search has not found anything.
				'parent_item_colon' => '', // for parents (for hierarchical post types).
				'menu_name'         => 'Live Studies', // menu name.
			],
			'description'   => '',
			'public'        => true,
			'publicly_queryable'  => false, // depends on public
			//'exclude_from_search' => null, // depends on public
			//'show_ui'             => null, // depends on public
			//'show_in_nav_menus'   => null, // depends on public
			'show_in_menu'  => null,
			// whether to in admin panel menu
			//'show_in_admin_bar'   => null, // depends on show_in_menu.
			'show_in_rest'  => null,
			// Add to REST API. WP 4.7.
			'rest_base'     => null,
			// $post_type. WP 4.7.
			'menu_position' => null,
			'menu_icon'     => 'dashicons-book',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // Array of additional rights for this post type.
			//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
			'hierarchical'  => false,
			// [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
			'supports'      => [ 'title', 'editor', 'thumbnail' ],
			'has_archive'   => false,
			'rewrite'       => true,
			'query_var'     => true,
		] );
		
		register_post_type( 'faq', [
			'taxonomies'    => [ 'faqs_category' ],
			// post related taxonomies
			'label'         => null,
			'labels'        => [
				'name'              => 'FAQ', // name for the post type.
				'singular_name'     => 'FAQ', // name for single post of that type.
				'add_new'           => 'Add FAQ Item', // to add a new post.
				'add_new_item'      => 'Adding FAQ Item', // title for a newly created post in the admin panel.
				'edit_item'         => 'Edit FAQ Item', // for editing post type.
				'new_item'          => 'New FAQ Item', // new post's text.
				'view_item'         => 'See FAQ Item', // for viewing this post type.
				'search_items'      => 'Search FAQ Item', // search for these post types.
				'not_found'         => 'Not Found', // if search has not found anything.
				'parent_item_colon' => '', // for parents (for hierarchical post types).
				'menu_name'         => 'FAQs', // menu name.
			],
			'description'   => '',
			'public'        => true,
			'publicly_queryable'  => false, // depends on public
			//'exclude_from_search' => null, // depends on public
			//'show_ui'             => null, // depends on public
			//'show_in_nav_menus'   => null, // depends on public
			'show_in_menu'  => null,
			// whether to in admin panel menu
			//'show_in_admin_bar'   => null, // depends on show_in_menu.
			'show_in_rest'  => null,
			// Add to REST API. WP 4.7.
			'rest_base'     => null,
			// $post_type. WP 4.7.
			'menu_position' => null,
			'menu_icon'     => 'dashicons-info',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // Array of additional rights for this post type.
			//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
			'hierarchical'  => false,
			// [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
			'supports'      => [ 'title', 'editor' ],
			'has_archive'   => false,
			'rewrite'       => true,
			'query_var'     => true,
		] );
	}
	
	add_action( 'init', 'create_taxonomy' );
	
	function create_taxonomy() {
		
		$ar_labels = [
			'live_studies_category' => [
				'multiple_name' => 'Categories',
				'singular_name' => 'Category'
			]
		];
		
		foreach ( $ar_labels as $slug => $ar_label ) {
			register_taxonomy( $slug, [ 'live_study' ], [
				'label'        => '',
				// Default taken from $labels->name
				// Full list: wp-kama.com/function/get_taxonomy_labels
				'labels'       => [
					'name'              => $ar_label['multiple_name'],
					'singular_name'     => $ar_label['singular_name'],
					'search_items'      => 'Search ' . $ar_label['multiple_name'],
					'all_items'         => 'All ' . $ar_label['multiple_name'],
					'view_item '        => 'View ' . $ar_label['singular_name'],
					'parent_item'       => 'Parent ' . $ar_label['singular_name'],
					'parent_item_colon' => 'Parent ' . $ar_label['singular_name'] . ':',
					'edit_item'         => 'Edit ' . $ar_label['singular_name'],
					'update_item'       => 'Update ' . $ar_label['singular_name'],
					'add_new_item'      => 'Add New ' . $ar_label['singular_name'],
					'new_item_name'     => 'New Genre ' . $ar_label['singular_name'],
					'menu_name'         => $ar_label['multiple_name'],
					'back_to_items'     => '← Back to ' . $ar_label['singular_name'],
				],
				'description'  => '',
				'public'       => true,
				// 'publicly_queryable'    => null, // same as argument public
				// 'show_in_nav_menus'     => true, // same as argument public
				// 'show_ui'               => true, // same as argument public
				// 'show_in_menu'          => true, // same as argument show_ui
				// 'show_tagcloud'         => true, // same as argument show_ui
				// 'show_in_quick_edit'    => null, // same as argument show_ui
				'hierarchical' => false,
				
				'rewrite'           => true,
				//'query_var'           => $taxonomy, // query parameter name
				'capabilities'      => array(),
				'meta_box_cb'       => 'post_categories_meta_box',
				// metabox html. callback: `post_categories_meta_box` or `post_tags_meta_box`. false - the metabox is disabled.
				'show_admin_column' => false,
				// auto-creation of a posts table column for the associated post type.
				'show_in_rest'      => null,
				// add to the REST API
				'rest_base'         => null,
				// $taxonomy
				// '_builtin'              => false,
				//'update_count_callback' => '_update_post_term_count',
			] );
		}
		
		$ar_labels = [
			'faqs_category' => [
				'multiple_name' => 'Categories',
				'singular_name' => 'Category'
			]
		];
		
		foreach ( $ar_labels as $slug => $ar_label ) {
			register_taxonomy( $slug, [ 'faq' ], [
				'label'              => '',
				// Default taken from $labels->name
				// Full list: wp-kama.com/function/get_taxonomy_labels
				'labels'             => [
					'name'              => $ar_label['multiple_name'],
					'singular_name'     => $ar_label['singular_name'],
					'search_items'      => 'Search ' . $ar_label['multiple_name'],
					'all_items'         => 'All ' . $ar_label['multiple_name'],
					'view_item '        => 'View ' . $ar_label['singular_name'],
					'parent_item'       => 'Parent ' . $ar_label['singular_name'],
					'parent_item_colon' => 'Parent ' . $ar_label['singular_name'] . ':',
					'edit_item'         => 'Edit ' . $ar_label['singular_name'],
					'update_item'       => 'Update ' . $ar_label['singular_name'],
					'add_new_item'      => 'Add New ' . $ar_label['singular_name'],
					'new_item_name'     => 'New Genre ' . $ar_label['singular_name'],
					'menu_name'         => $ar_label['multiple_name'],
					'back_to_items'     => '← Back to ' . $ar_label['singular_name'],
				],
				'description'        => '',
				'public'             => true,
				'publicly_queryable' => false,
				// same as argument public
				// 'show_in_nav_menus'     => true, // same as argument public
				// 'show_ui'               => true, // same as argument public
				// 'show_in_menu'          => true, // same as argument show_ui
				// 'show_tagcloud'         => true, // same as argument show_ui
				// 'show_in_quick_edit'    => null, // same as argument show_ui
				'hierarchical'       => false,
				
				'rewrite'           => false,
				//'query_var'           => $taxonomy, // query parameter name
				'capabilities'      => array(),
				'meta_box_cb'       => 'post_tags_meta_box',
				// metabox html. callback: `post_categories_meta_box` or `post_tags_meta_box`. false - the metabox is disabled.
				'show_admin_column' => false,
				// auto-creation of a posts table column for the associated post type.
				'show_in_rest'      => null,
				// add to the REST API
				'rest_base'         => null,
				// $taxonomy
				// '_builtin'              => false,
				//'update_count_callback' => '_update_post_term_count',
			] );
		}
		
	}