// Create a page with the WordPress REST API

jQuery(function($) { 

	var post_data = {
			title: 'Example posttitle to create',
			content: 'Example content',
			type: 'post',
			status: 'draft',
			post_meta:[]            
		}

	$.ajax({
		method: "POST",
		url: DM_cookieauth_example.rest_url + 'custopendpoint/getdata',
		data: post_data,        
		beforeSend: function ( xhr ) {
			xhr.setRequestHeader( 'X-WP-Nonce', DM_cookieauth_example.nonce );
		},
		success : function( response ) {

			var post_response = response;
			console.log('custopendpoint/getdata',post_response);

		}

	});


});