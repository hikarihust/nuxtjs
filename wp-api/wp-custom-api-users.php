<?php
  add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', '/users/register', array(
      'methods' => WP_REST_Server::CREATABLE,
      'callback' => 'handle_route_users_register',
      'args' => array(
        'username' => array(
          'description' => __( 'Login name for the user.' ),
          'type'        => 'string',
          'required'    => true
        ),
        'password' => array(
          'description' => __( 'Password for the user (never included).' ),
          'type'        => 'string',
          'required'    => true
        ),
				'nickname' => array(
					'description' => __( 'The nickname for the user.' ),
          'type'        => 'string',
          'required'    => false
        ),
				'email' => array(
					'description' => __( 'The email address for the user.' ),
					'type'        => 'string',
					'format'      => 'email',
					'required'    => true
				),
      ),
    ));
  });

	function tcl_check_user_password( $value) {
		$password = (string) $value;

		if ( empty( $password ) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( 'Passwords cannot be empty.' ),
				array( 'status' => 400 )
			);
		}

		if ( false !== strpos( $password, '\\' ) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( 'Passwords cannot contain the "\\" character.' ),
				array( 'status' => 400 )
			);
    }
    
		if ( false !== strpos( $password, ' ' ) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( 'Passwords cannot contain the space character.' ),
				array( 'status' => 400 )
			);
		}

		return $password;
	}

  function handle_route_users_register($request) {
    /*
    $status = 200;
    $data = array(
      'email' => $request->get_param('email'),
      'password' => $request->get_param('password')
    );
    $response = new WP_REST_Response( $data, $status );
    */

    $email = $request->get_param('email');
    $username = $request->get_param('username');
    $password = tcl_check_user_password($request->get_param('password'));
    $nickname = $request->get_param('nickname');

    if($password instanceof WP_Error) return $password;
  }
?>