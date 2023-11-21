<?php
	add_action('wp_ajax_subscribe_yespo', 'subscribe_yespo');
	add_action('wp_ajax_nopriv_subscribe_yespo', 'subscribe_yespo');
	function subscribe_yespo(){
		if( !isset( $_POST['email'] ) ){
			wp_send_json_error( __( 'Empty email field', 'haltha' ) );
		}
		
		$credentials = get_field( 'yespo', 'options' );
		$body = [
			'contact'   => [
				'channels'   => [
					[
						'type'  => 'email',
						'value' => $_POST['email']
					]
				]
			],
			'formType'  => 'FooterForm'
		];
		
		$response = wp_remote_post(
			'https://yespo.io/api/v1/contact/subscribe',
			[
				'body' => json_encode( $body ),
				'headers' => [
					'accept' => 'application/json; charset=UTF-8',
					'authorization' => 'Basic ' . base64_encode( $credentials['login'] . ':' . $credentials['password'] ),
					'content-type' => 'application/json'
				]
			]
		);
		
		if ( !is_wp_error( $response ) && !wp_remote_retrieve_response_code( $response ) === 200 ) {
			$error_message = is_wp_error( $response ) ? $response->get_error_message() : __( 'Request failed.', 'haltha' );
			wp_send_json_error( $error_message );
		}
		
		
		$body = wp_remote_retrieve_body( $response );
		$data_array = json_decode( $body, true );
		
		switch ( $data_array['emailStatus'] ) {
			case 'NEED_CONFIRMATION':
				$success_message = __( 'Email need confirmation', 'haltha' );
				break;
			case 'SUBSCRIBED':
				$success_message = __( 'Subscribed', 'haltha' );
				break;
			case 'ALREADY_SUBSCRIBED':
				$success_message = __( 'Email already subscribed', 'haltha' );
				break;
			case 'BLACKLISTED':
				$success_message = __( 'Email blacklisted', 'haltha' );
				break;
			default:
				$success_message = __( 'Subscribed', 'haltha' );
		}
		
		wp_send_json_success( $success_message );
	}
	
	function signup_yespo( array $args ){
		if( empty( $args['email'] ) && empty( $args['first_name'] ) && empty( $args['last_name'] ) ){
			return false;
		}
		
		$credentials = get_field( 'yespo', 'options' );
		$body = [
			'eventTypeKey'  => 'signup',
			'params'   => [
				[
					'name'  => 'email',
					'value' => $args['email']
				],
				[
					'name'  => 'FirstName',
					'value' => $args['first_name']
				],
				[
					'name'  => 'LastName',
					'value' => $args['last_name']
				],
			],
			'keyValue'  => $args['email']
		];
		
		$response = wp_remote_post(
			'https://yespo.io/api/v1/event',
			[
				'body' => json_encode( $body ),
				'headers' => [
					'accept' => 'application/json; charset=UTF-8',
					'authorization' => 'Basic ' . base64_encode( $credentials['login'] . ':' . $credentials['password'] ),
					'content-type' => 'application/json'
				]
			]
		);
		
		if ( !is_wp_error( $response ) && !wp_remote_retrieve_response_code( $response ) === 200 ) {
			return false;
		}
		
		return true;
	}