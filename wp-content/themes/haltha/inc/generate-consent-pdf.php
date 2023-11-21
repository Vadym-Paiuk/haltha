<?php
	require_once __DIR__ . '/api/mpdf/vendor/autoload.php';
	
	add_action( 'wp_ajax_generate_consent_pdf', 'generate_consent_pdf' );
	add_action( 'wp_ajax_nopriv_generate_consent_pdf', 'generate_consent_pdf' );
	function generate_consent_pdf() {
		if ( ! is_user_logged_in() ) {
			return false;
		}
		
		header( "Content-Type: application-x/force-download" );
		$current_user_id     = get_current_user_id();
		$current_user_fields = get_field( 'informed_consent', 'user_' . $current_user_id );
		$temp_file           = 'output.pdf';
		$stylesheet          = file_get_contents( get_stylesheet_directory_uri() . '/pdf-style.css' );
		
		header( 'Content-Disposition: attachment; filename="' . $temp_file . '"' );
		
		$html = '<div class="consent">';
		$html .= $current_user_fields['consent'];
		$html .= '</div>';
		$html .= '<div class="signature">';
		$html .= '<div class="name">';
		$html .= $current_user_fields['first_name'] . ' ' . $current_user_fields['last_name'];
		$html .= '</div>';
		$html .= '<div class="date">';
		$html .= $current_user_fields['date'];
		$html .= '</div>';
		$html .= '</div>';
		
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML( $stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS );
		$mpdf->WriteHTML( $html, \Mpdf\HTMLParserMode::HTML_BODY );
		$mpdf->Output( $temp_file, 'I' );
		
		die();
	}