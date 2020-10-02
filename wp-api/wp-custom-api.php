<?php
  add_action( 'rest_api_init', function () {
    // Get Image Thumbnail by featured_media id
    register_rest_field('post',
      'featured_media_url', // định nghĩa tên trường url của hình ảnh
      array(
        'get_callback'  => 'get_rest_featured_media_url' // Ten ham
      )
    );

    register_rest_field('post',
      'author_data',
      array(
        'get_callback'  => 'get_rest_author_post_data'
      )
    );

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

  function get_rest_author_post_data($post, $field_name, $request) {
    $author_id = $post['author'];

    if ($author_id) {
      return array(
        'nickname' => get_the_author_meta( 'nickname', $author_id )
      );
    }
    
    return array(
      'nickname' => ''
    );
  }

?>