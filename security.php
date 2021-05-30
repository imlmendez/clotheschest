<?php
//Disable REST API
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
remove_action( 'wp_head', 'rest_output_link_wp_head' );

//remove the WordPress version number from your site
function wpb_remove_version() {
    return '';
}
add_filter('the_generator', 'wpb_remove_version');

//hide login errors 
function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );


//add upload webp
add_filter('upload_mimes','webp_mime_type');
 function webp_mime_type($mimes){
   return array_merge($mimes, array(
     'webp' => 'image/webp'
   )); 
 }
