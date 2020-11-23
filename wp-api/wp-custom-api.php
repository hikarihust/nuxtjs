<?php
  require_once ABSPATH . 'wp-custom-api-users.php';

  add_action( 'rest_api_init', function () {
    // Get Image Thumbnail by featured_media id
    register_rest_field('post',
      'featured_media_url', // định nghĩa tên trường url của hình ảnh
      array(
        'get_callback'  => 'get_rest_featured_media_url' // Ten ham
      )
    );

    register_rest_field(array('post', 'comment'),
      'author_data',
      array(
        'get_callback'  => 'get_rest_author_post_data'
      )
    );

    register_rest_field('post',
      'view_count',
      array(
        'get_callback'  => 'get_rest_post_view_count'
      )
    );

    register_rest_field('post',
      'comment_count',
      array(
        'get_callback'  => 'get_rest_post_comment_count'
      )
    );

    register_rest_field('comment',
      'comment_reply_count',
      array(
        'get_callback'  => 'get_rest_post_comment_reply_count'
      )
    );
  });

  add_action( 'rest_api_init', function () {
    $wpRoles = wp_roles();
    $capSubscriber = $wpRoles->get_role('subscriber');

    if(! $capSubscriber->capabilities['upload_files']) {
      $wpRoles->add_cap('subscriber', 'upload_files');
    }
  });

  function get_rest_featured_media_url($post, $field_name, $request) {
    $post_id = $post['id'];
    // $media_id = $post['featured_media'];

    if ($post_id) {
      $url = get_the_post_thumbnail_url($post_id);
      // $url = wp_get_attachment_image_src($media_id);
      return $url;
    }

    return '';
  }

  function get_rest_author_post_data($object, $field_name, $request) {
    $author_id = $object['author'];

    if ($author_id) {
      return array(
        'nickname' => get_the_author_meta( 'nickname', $author_id ),
        'description' => get_the_author_meta( 'description', $author_id ),
        'avatar' => get_user_meta( $author_id, 'simple_local_avatar' )[0]['full']
      );
    }
    
    return array(
      'nickname' => '',
      'avatar' => '',
      'description' => ''
    );
  }

  function get_rest_post_view_count($post, $field_name, $request) {
    $post_id = $post['id'];

    if ( function_exists( 'pvc_get_post_views' ) ) {
      $view_count = pvc_get_post_views( $post_id );
      return $view_count;
    }

    return 0;
  }

  function get_rest_post_comment_count($post, $field_name, $request) {
    $post_id = $post['id'];
    $comment_count = get_comments_number($post_id);

    return (int)$comment_count;
  }

  function get_rest_post_comment_reply_count($comment, $field_name, $request) {
    $post_id = $comment['post'];
    $comment_parent_id = $comment['id'];
    if($comment['parent'] === 0) {
      global $wpdb;
      $query = "SELECT COUNT(comment_ID) AS reply_count FROM $wpdb->comments 
      WHERE `comment_post_ID` = $post_id AND `comment_approved` = 1 AND `comment_parent` = $comment_parent_id";
      $data = $wpdb->get_row($query);

      return (int)$data->reply_count;
    }
    return 0;
  }

  add_filter('rest_endpoints', function ($routes) {
    if ( !$routes['/wp/v2/posts'][0]['args']['orderby']['enum'] ) {
      return $routes;
    }

    array_push( $routes['/wp/v2/posts'][0]['args']['orderby']['enum'], 'post_views' );
    return $routes;
  });

  add_filter( 'rest_prepare_user', function($response, $user, $request) {
    $data = $response->get_data();
    $user_id = $data['id'];

    if($user_id) {
      $data['email'] = $user->data->user_email;
      $data['user_name'] = $user->data->user_login; 
      $data['nickname'] = get_user_meta($user_id, 'nickname')[0];
      $data['first_name'] = get_user_meta($user_id, 'first_name')[0];
      $data['last_name'] = get_user_meta($user_id, 'last_name')[0];
    }

    $response = rest_ensure_response( $data );

    return $response;
  }, 10, 3);

  // Can thiệp vào trước khi WP gọi những call back
  add_filter( 'rest_request_before_callbacks', function($response, $handler, $request) {
    $route = $request->get_route();
    if ($route === '/wp/v2/users/me') {
      $password = $request->get_param('password');
      $email = $request->get_param('email');
      if ($password || $email) {
        return new WP_Error(
          'rest_forbidden',
          __( 'Bạn không được phép truy cập.' ),
          array( 'status' => 403 )
        );
      }
    }

    return $request;
  }, 10, 3 )
?>