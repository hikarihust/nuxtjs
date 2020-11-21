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

	function tcl_check_username( $value ) {
		$username = (string) $value;

		if ( ! validate_username( $username ) ) {
			return new WP_Error(
				'rest_user_invalid_username',
				__( 'This username is invalid because it uses illegal characters. Please enter a valid username.' ),
				array( 'status' => 400 )
			);
    }
    
    if ( false !== strpos( $username, ' ' ) ) {
			return new WP_Error(
				'rest_user_invalid_username',
				__( 'Usernames cannot contain the space character.' ),
				array( 'status' => 400 )
			);
		}

		return $username;
	}

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
  
  function tcl_check_nickname($value, $default) {
    $nickname = (string) $value;

		if ( empty( $nickname ) ) {
      return $default;
    }
    
    return $nickname;
  }

  function handle_route_users_register($request) {
    $users_can_register = (boolean) get_option('users_can_register');

    if(!$users_can_register) {
			return new WP_Error(
				'rest_user_can_register',
				__( 'User can not register' ),
				array( 'status' => 400 )
			);
    } 

    $email = $request->get_param('email');
    $username = tcl_check_username($request->get_param('username'));
    $password = tcl_check_user_password($request->get_param('password'));
    $nickname = tcl_check_nickname($request->get_param('nickname'), $username);

    if($password instanceof WP_Error) return $password;
    if($username instanceof WP_Error) return $username;  
    
    $data = array(
      'email' => $email,
      'password' => $password,
      'username' => $username,
      'nickname' => $nickname
    );

    $userIdResult = wp_insert_user(array(
      'user_email' => $email,
      'user_pass'  => $password,
      'user_login' => $username,
      'nickname'   => $nickname,
    ));

    if($userIdResult instanceof WP_Error) {
      return $userIdResult;
    }

    $response = new WP_REST_Response( array(
      'author' => $userIdResult,
      'status' => 201
    ), 201 );

    return $response;
  }
?>