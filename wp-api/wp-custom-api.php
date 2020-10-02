<?php
  add_action( 'rest_api_init', function () {
    // Get Image Thumbnail by featured_media id
    register_rest_field('post',
      'featured_media_url', // Vi tri nay tren tuy chon
      array(
        'get_callback'  => 'get_rest_featured_media_url' // Ten ham
      )
    );
  });

  function get_rest_featured_media_url($post, $field_name, $request) {
    $post_id = $post['id'];

    if ($post_id) {
      $url = get_the_post_thumbnail_url($post_id);
      // $arrUrl = wp_get_attachment_image_src($media_id);
      return $url;
    }

    return '';
  }

?>