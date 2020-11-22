<?php
  add_action( 'rest_api_init', function () {
    // Custom API Register
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

    // Custom API Change Password
    register_rest_route( 'wp/v2', '/users/password', array(
      'methods' => WP_REST_Server::EDITABLE,
      'callback' => 'handle_route_users_change_password',
      'args' => array(
        'password' => array(
          'description' => __( 'Password for the user' ),
          'type'        => 'string',
          'required'    => true
        ),
				'new_password' => array(
					'description' => __( 'New password for the user.' ),
          'type'        => 'string',
          'required'    => true
        ),
				'confirm_new_password' => array(
					'description' => __( 'Confirm new password for the user.' ),
					'type'        => 'string',
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

	function tcl_check_user_password( $value, $messages = 'Password') {
		$password = (string) $value;

		if ( empty( $password ) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( "$messages cannot be empty." ),
				array( 'status' => 400 )
			);
		}

		if ( false !== strpos( $password, '\\' ) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( "$messages cannot contain the '\\' character." ),
				array( 'status' => 400 )
			);
    }
    
		if ( false !== strpos( $password, ' ' ) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( "$messages cannot contain the space character." ),
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

  // Function custom API register
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

  // Function custom API change password
  function handle_route_users_change_password($request) {
    if(! is_user_logged_in()) {
			return new WP_Error(
				'jwt_invalid',
				__( 'Unauthorized' ),
				array( 'status' => 401 )
			);
    }

    $password = tcl_check_user_password($request->get_param('password'));
    $new_password = tcl_check_user_password($request->get_param('new_password'), 'New password');
    $confirm_new_password = tcl_check_user_password($request->get_param('confirm_new_password'), 'Confirm new password');

    if( is_wp_error($password) ) return $password;
    if( is_wp_error($new_password) ) return $new_password;
    if( is_wp_error($confirm_new_password) ) return $confirm_new_password;

    if( $password === $new_password ) {
			return new WP_Error(
				'rest_user_invalid_new_password',
				__( 'Mật khẩu mới không được trùng với mật khẩu cũ.' ),
				array( 'status' => 400 )
			);
    }

    if( $new_password !== $confirm_new_password ) {
			return new WP_Error(
				'rest_user_invalid_confirm_password',
				__( 'Xác nhận mật khẩu mới không khớp.' ),
				array( 'status' => 400 )
			);
    }

    $username = wp_get_current_user()->user_login;
    $user_check = wp_authenticate($username, $password);
    if( is_wp_error($user_check) ) {
			return new WP_Error(
				'rest_user_invalid_password',
				__( 'Mật khẩu cũ không đúng. Vui lòng thử lại.' ),
				array( 'status' => 400 )
			);
    }

    $user_check->__set('user_pass', $confirm_new_password);
    $new_user = wp_update_user( $user_check );
    if( is_wp_error($new_user) ) {
			return new WP_Error(
				'rest_user_update_password',
				__( 'Có lỗi xảy ra trong quá trình xử lý. Vui lòng thử lại.' ),
				array( 'status' => 400 )
			);
    }

    $response = new WP_REST_Response( array(
      'update' => true,
      'status' => 200
    ), 200 );

    return $response;
  }
?>