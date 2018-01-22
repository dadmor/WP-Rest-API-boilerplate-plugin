<?php

add_action( 'wp', function() {

	wp_register_script( 'DM_cookieauth_example_handle', plugins_url( '../js/create-post-cookieauth.js?'.time(), __FILE__ ), array('jquery'));

	wp_localize_script( 'DM_cookieauth_example_handle', 'DM_cookieauth_example', array(
		'rest_url' => esc_url_raw( rest_url() ),
		'nonce' => wp_create_nonce( 'wp_rest' )
	) );

	wp_enqueue_script( 'DM_cookieauth_example_handle' );

} );


function example_backend_process ( $request ){

	/* Create wp objects here */

	$post_data = $request->get_body_params();
	
	$post_data['current_user'] = wp_get_current_user();
	
	return new WP_REST_Response( $post_data, 200 );

}

// Register the rest route

add_action( 'rest_api_init', function () {

	register_rest_route( 'custopendpoint', 'getdata',array(
		
		'methods'  => 'POST',
		'callback' => 'example_backend_process'

	) );

} );



