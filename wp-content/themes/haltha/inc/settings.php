<?php
	require __DIR__ . '/api/leaguecsv/vendor/autoload.php';
	
	use League\Csv\Reader;
	
	register_nav_menus( array(
		'top'      => 'Top Menu',
		'bottom_1' => 'Bottom Menu 1',
		'bottom_2' => 'Bottom Menu 2',
		'privacy'  => 'Privacy Menu',
		'profile'  => 'Profile Menu'
	) );
	
	add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
	function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
		
		if ( 'profile' == $args->theme_location ) {
			$atts['class'] = implode( ' ', $item->classes );
			$class         = 'account-navigation-btn btn btn-transparent btn-icon  wow fadeInLeft';
			$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
			
			if ( $item->current ) {
				$class         = 'active';
				$atts['class'] = isset( $atts['class'] ) ? "{$atts['class']} $class" : $class;
			}
		}
		
		return $atts;
	}
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 200 );
	
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page();
	}
	
	add_filter( 'upload_mimes', 'svg_upload_allow' );
	function svg_upload_allow( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		
		return $mimes;
	}
	
	add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );
	function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ) {
		if ( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ) {
			$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
		} else {
			$dosvg = ( '.svg' === strtolower( substr( $filename, - 4 ) ) );
		}
		
		if ( $dosvg ) {
			if ( current_user_can( 'manage_options' ) ) {
				$data['ext']  = 'svg';
				$data['type'] = 'image/svg+xml';
			} else {
				$data['ext'] = $type_and_ext['type'] = false;
			}
			
		}
		
		return $data;
	}
	
	add_filter( 'use_block_editor_for_post', 'my_disable_gutenberg', 10, 2 );
	function my_disable_gutenberg( $can_edit, $post ) {
		return $post->post_type == 'post';
	}
	
	function get_related_posts( $post = null, $num_posts = 3 ) {
		$post = get_post( $post );
		
		$categories = wp_get_post_categories( $post->ID );
		$tags       = wp_get_post_tags( $post->ID );
		
		$args = array(
			'category__in'   => $categories,
			'tag__in'        => $tags,
			'post__not_in'   => array( $post->ID ),
			'posts_per_page' => $num_posts,
			'orderby'        => 'rand', // You can change the ordering method
		);
		
		$related_posts = new WP_Query( $args );
		
		return $related_posts->have_posts() ? $related_posts : false;
	}
	
	add_filter( 'wpcf7_autop_or_not', '__return_false' );
	
	add_filter( 'excerpt_length', 'custom_excerpt_length' );
	function custom_excerpt_length( $length ) {
		return 30;
	}
	
	add_filter( 'excerpt_more', fn() => '...' );
	
	add_action( 'save_post', 'import_studies_zip_csv', 10, 2 );
	function import_studies_zip_csv( $post_id, $post ) {
		if ( $post->post_type !== 'live_study' ) {
			return;
		}
		
		$fields = get_field( 'fields', $post_id );
		
		if ( empty( $fields['zip']['file'] ) ) {
			return;
		}
		
		$csv_file_path = get_attached_file( $fields['zip']['file']['ID'] );
		
		if ( ! file_exists( $csv_file_path ) ) {
			return;
		}
		
		$csv = Reader::createFromPath( $csv_file_path, 'r' );
		$csv->setHeaderOffset( 0 );
		$records   = $csv->getRecords();
		$zip_codes = [];
		
		foreach ( $records as $key => $record ) {
			$zip_codes['zip']['codes'][]['code'] = $record['zip'];
		}
		
		$zip_codes['zip']['file'] = [];
		
		update_field( 'fields', $zip_codes, $post_id );
	}
	
	add_filter( 'posts_where', 'replace_posts_where_for_acf_repeater_fields' );
	function replace_posts_where_for_acf_repeater_fields( $where ) {
		
		return str_replace( "meta_key = 'fields_zip_codes_$", "meta_key LIKE 'fields_zip_codes_%", $where );
	}
	