<?php

// Enqueue Flexslider Files

	function nb_slider_scripts() {
		wp_enqueue_script( 'jquery' );
	
		wp_enqueue_style( 'flex-style', get_stylesheet_directory_uri() . '/inc/slider/css/flexslider.css' );
	
		wp_enqueue_script( 'flex-script', get_stylesheet_directory_uri() .  '/inc/slider/js/jquery.flexslider.js', array( 'jquery' ), false, true );
	}
	add_action( 'wp_enqueue_scripts', 'nb_slider_scripts' );


// Initialize Slider
	
	function nb_slider_initialize() { ?>
		<script type="text/javascript" charset="utf-8">
			jQuery(window).load(function() {
			  jQuery('.flexslider').flexslider({
			    animation: "slide",
			    direction: "horizontal",
				controlNav: false,  
				directionNav: true, 
				itemWidth: 283,
				slideshow: false
			  });
			});
		</script>
	<?php }
	add_action( 'wp_head', 'nb_slider_initialize' );
	
	
// Create Slider
	
	function nb_slider_template() {

		// Start the Slider ?>
		
                     
		<?php if( have_rows('nb_referansegalleri') ): ?>
                    
			<section class="referanse_linje">
				<div class="block main">
             		<div class="wrapper wide">

               	<div class="referanse_bildegalleri">
  
             		  <div id="" class="flexslider">       
						<ul class="slides">
                        
							<?php while( have_rows('nb_referansegalleri') ): the_row(); 			
								// vars
								$image = get_sub_field('nb_refereansegalleribilde');
								$referanseThumb = $image["sizes"]["referansesliderthumb"];
							?>

								<li><a href="<?php echo $image['url']; ?>" ><img src="<?php echo $referanseThumb; ?>" alt="<?php echo $image['alt'] ?>" /></a></li>
 
							<?php endwhile; ?>
 
						</ul>
 					  </div><!-- .flexslider -->
                      
                  </div><!-- .referanse_bildegalleri -->
               
               </div>
            </div>
          </section>
  
	<?php endif; ?>

	<?php }

// Slider Shortcode

	function nb_slider_shortcode() {
		ob_start();
		nb_slider_template();
		$slider = ob_get_clean();
		return $slider;
	}
	add_shortcode( 'slider', 'nb_slider_shortcode' ); ?>