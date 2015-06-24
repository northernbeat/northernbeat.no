<?php

/**

 * The sidebar containing the main widget area.

 **/

?>



	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    
		<div  class="sidebar-footer">

			<?php dynamic_sidebar( 'sidebar-footer' ); ?>

		</div><!-- #sidebar footer -->

	<?php endif; ?>