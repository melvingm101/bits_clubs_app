<?php

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function wpt_themes_styles(){
   wp_enqueue_style('app', get_template_directory_uri() . 'js/app.js');
   wp_enqueue_style('waypoint', get_template_directory_uri() . 'js/jquery.waypoints.min.js');
}

add_action('wp_enqueue_scripts', 'wpt_theme_styles');
add_theme_support('post-thumbnails');

function wpt_excerpt_length($length){
    return 50;
}

add_filter('excerpt_length', 'wpt_excerpt_length', 999);
?>