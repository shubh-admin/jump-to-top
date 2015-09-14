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
   ?>
  <script>
  $ = jQuery.noConflict();
	  (function($){
				$.fn.addScrollToTopButton = function(options){
					var $t = $(this);

						var settings = $.extend({
							text : "<a href='#' style='opacity:0.5; font-size:40px' onmouseleave=\"this.style.color='grey'\" onMouseOver=\"this.style.color='#0066CC'\"><i class='fa fa-arrow-circle-up fa-6'></i></a>",
							speed: 500,
							bottom:20,
							right: 20
						},options);

						return this.each(function(){
							$t.html(settings.text);
							$t.css({'position':'fixed', 'bottom':settings.bottom , 'right':settings.right});
							$t.hide();
							$(document).scroll(function(){
								if($(document).scrollTop()==0)
								{
									$t.hide(200);
								}
								else
								{
									$t.show(200);
								}
							});
							
							$(this).click(function(){
								if($(document).scrollTop()!=0)
								{

									$('html,body').animate({scrollTop:0},settings.speed);
								}
							});
						});
				}
			}(jQuery));
		  $(function(){
		  		$('body').append('<div id="gtp"></div>');

				$('#gtp').addScrollToTopButton({speed:"<?php echo $speed ?>"});
			});
  </script>
  <?php

}
