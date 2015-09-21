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
