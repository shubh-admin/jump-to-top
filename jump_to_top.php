<?php

   /*
  Plugin Name: Go To Top
  Plugin URI: http://shubhcomputing.com/
  Description: Facilitates to make you on the top of page, post
  Version: 0.1.0
  Author: Shubh Computing LLP
  Author URI: http://shubhcomputing.com/
  */

  defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

   define("GTP_URL", plugin_dir_url(__FILE__));
   define("GTP_DIR", plugin_dir_path( __FILE__ ));
   


  add_action('wp_enqueue_scripts','add_gtp_styles');
  function add_gtp_styles()
  {
  	wp_enqueue_style('font-awesome-style','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
  }

add_action( 'init', 'register_shortcodes');
function register_shortcodes(){
   add_shortcode('go-to-top', 'gtp_function');
}


function gtp_function($atts) {
  extract(shortcode_atts(array(
      'text' => '<i class="fa fa-arrow-circle-up fa-3"></i>',
      'speed'=>500,
      'bottom'=>20,
	  'right'=> 20
   ), $atts));
   include_once(GTP_URL.'jscode.php');
}
