<?php
	//STEP 1
	/*global $wpdb;
	
	$table_name = $wpdb->prefix . 'diseases'; // Add your table name prefix
	$charset_collate = $wpdb->get_charset_collate();
	
	$sql = "CREATE TABLE $table_name (
	    id INT NOT NULL AUTO_INCREMENT,
	    title VARCHAR(100) NOT NULL,
	    PRIMARY KEY (id)
	) $charset_collate;";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );*/
	
	//STEP 2
	/*global $wpdb;
	$table_name = $wpdb->prefix . 'diseases';
	$delimiter = "\t";
	$diseases = [];
	$fp = fopen(get_stylesheet_directory() . '/human_disease_textmining_full.tsv', 'r');
	while ( !feof($fp) ) {
		$line = fgets($fp, 2048);
		
		$data = str_getcsv($line, $delimiter);
		
		if( in_array( $data[3], $diseases ) || $data[3] === $data[2] ){
			continue;
		}
		$diseases[] = $data[3];
		
		$wpdb->insert($table_name, ['title' => $data[3]]);
	}
	
	fclose($fp);*/
	
	//STEP 3
	function get_diseases( string $query ): array | bool{
		global $wpdb;
		
		$table_name = $wpdb->prefix . 'diseases';
		
		$results = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT title FROM $table_name WHERE title LIKE %s LIMIT 5",
				'%' . $wpdb->esc_like($query) . '%'
			)
		);
		
		foreach ( $results as $key => $result ){
			unset( $results[$key] );
			$results[$key]['title'] = $result->title;
		}
		
		return $results;
	}
	
	
	add_action( 'wp_ajax_search_diseases', 'search_diseases' );
	add_action( 'wp_ajax_nopriv_search_diseases', 'search_diseases' );
	function search_diseases() {
		$diseases = get_diseases( $_POST['q'] );
		
		if ( empty( $diseases ) ){
			wp_send_json_error();
		}
		
		$diseases = prepareSearchResultsDiseases( $diseases, $_POST['q'] );
		
		ob_start();
		foreach ( $diseases as $disease ){
			get_template_part( 'parts/select', 'option', $disease );
		}
		
		wp_send_json_success( ob_get_clean() );
	}
	
	function prepareSearchResultsDiseases( array $results, string $query ): array {
		foreach ( $results as $key => $result ){
			$results[$key]['hint'] = str_ireplace( $query, '<b>' . $query . '</b>', $result['title'] );
		}
		
		return $results;
	}