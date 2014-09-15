<?php

/**

 * The template for displaying the footer.

*/
global $add_sidebar_footer;
$add_sidebar_footer = true;
?>


   <?php if($add_sidebar_footer): 
   ?>
   <section>
   <?php get_sidebar("footer"); ?>
   <?php endif; ?>
   </section>
	<!--</div><!-- #main .wrapper -->
<script>window.jQuery || document.write("<script src='<?php echo get_template_directory_uri(); ?>/js/jquery-1.5.1.min.js'>\x3C/script>")</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.tools.min.js"></script>
<script  src="<?php echo get_template_directory_uri(); ?>/js/idangerous.swiper-1.5.min.js"></script>
<script type="text/javascript">
/*
	*/
	window.onload = function() {
	  var imageSwiper = new Swiper('#Screens .swiper-container', {
		speed:300,
		/*
		pagination:'.pagination1',
		*/
		loop: true,
		slidesPerSlide: 3,
		disableAutoResize: true,
		autoPlay:0
	  });
	}
	/* Tabs */
	var swiperTabs = $('.swiper-tabs').swiper({
		onlyExternal : true,
	});
	$(".tabs a").bind('touchstart',function(e){
		e.preventDefault()
		$(".tabs .active").removeClass('active')
		$(this).addClass('active')
		e.preventDefault()
		swiperTabs.swipeTo( $(this).index() )
	})
	$(".tabs a").click(function(e){
		e.preventDefault()
	})
	$(".tabs a").mousedown(function(e){
		$(".tabs .active").removeClass('active')
		$(this).addClass('active')
		e.preventDefault()
		swiperTabs.swipeTo( $(this).index() )
	})
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>

<footer class="clearfix">
		<div class="block">
        <?php if ( is_active_sidebar( 'Footer Widget' ) ) : ?>
			<?php dynamic_sidebar( 'Footer Widget' ); ?>
	     <?php endif; ?>
		</div>
		<div class="slogan">
			Dream. Create. Innovate.
		</div>
	</footer>

<?php wp_footer(); ?>

</body>

</html>