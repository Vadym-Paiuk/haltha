<?php
	require __DIR__ . '/api/leaguecsv/vendor/autoload.php';
	
	use League\Csv\Reader;
	
	
	//STEP 1
	/*global $wpdb;
	
	$table_name = $wpdb->prefix . 'drugs'; // Add your table name prefix
	$charset_collate = $wpdb->get_charset_collate();
	
	$sql = "CREATE TABLE $table_name (
	    id INT NOT NULL AUTO_INCREMENT,
	    title VARCHAR(100) NOT NULL,
	    PRIMARY KEY (id)
	) $charset_collate;";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );*/
	
	//STEP 2
	/*$csv = Reader::createFromPath( get_stylesheet_directory() . '/drugbank_vocabulary.csv' );
	$csv->setHeaderOffset( 0 );
	$records = $csv->getRecords();
	$drugs   = [];
	global $wpdb;
	$table_name = $wpdb->prefix . 'drugs';
	
	foreach ( $records as $key => $record ) {
		$drugs[] = $record['Common name'];
		$drugs   = array_merge( $drugs, explode( ' | ', $record['Synonyms'] ) );
	}
	
	$drugs = array_unique( $drugs );
	sort( $drugs );
	
	foreach ( $drugs as $drug ) {
		$wpdb->insert( $table_name, [ 'title' => $drug ] );
	}*/
	
	//STEP 3
	function get_drugs( string $query ): array|bool {
		global $wpdb;
		
		$table_name = $wpdb->prefix . 'drugs';
		
		$results = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT title FROM $table_name WHERE title LIKE %s LIMIT 5",
				$wpdb->esc_like( $query ) . '%'
			)
		);
		
		foreach ( $results as $key => $result ) {
			unset( $results[ $key ] );
			$results[ $key ]['title'] = $result->title;
		}
		
		if ( count( $results ) < 5 ) {
			$results_2 = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT title FROM $table_name WHERE title LIKE %s LIMIT 20",
					'%' . $wpdb->esc_like( $query ) . '%'
				)
			);
			
			foreach ( $results_2 as $key => $result ) {
				unset( $results_2[ $key ] );
				$results_2[ $key ]['title'] = $result->title;
			}
			
			$results = array_merge( $results, $results_2 );
			$results = array_unique( $results, SORT_REGULAR );
			
			$results = array_slice( $results, 0, 5 );
		}
		
		return $results;
	}
	
	
	add_action( 'wp_ajax_search_drugs', 'search_drugs' );
	add_action( 'wp_ajax_nopriv_search_drugs', 'search_drugs' );
	function search_drugs() {
		$drugs = get_drugs( $_POST['q'] );
		
		if ( empty( $drugs ) ) {
			wp_send_json_error();
		}
		
		$drugs = prepareSearchResultsDrugs( $drugs, $_POST['q'] );
		
		ob_start();
		foreach ( $drugs as $drug ) {
			get_template_part( 'parts/select', 'option', $drug );
		}
		
		wp_send_json_success( ob_get_clean() );
	}
	
	function prepareSearchResultsDrugs( array $results, string $query ): array {
		foreach ( $results as $key => $result ) {
			$results[ $key ]['hint'] = str_ireplace( $query, '<b>' . $query . '</b>', $result['title'] );
		}
		
		return $results;
	}