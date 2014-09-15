<?php

/**

 * The template for displaying Tag pages.

 **/

$add_sidebar_footer = true;
get_header(); 

//print_r($wp_query);
?>

	<section>
         <div class="block main">
          <div class="wrapper wide">
           <h1><?php printf( __( '%s', 'northernbeat' ), single_tag_title( '', false )); ?></h1>
          </div>
         </div> 
  </section>
  <section>
    	<div class="block main divider icon">
			<div class="wrapper wide">
				<div class="boxflow">
				
			  <header class="archive-header">

			<?php if ( tag_description() ) : // Show an optional tag description ?>

				<div class="archive-meta"><?php echo tag_description(); ?></div>

			<?php endif; ?>

			</header><!-- .archive-header -->
            <span class="row clearfix">
		       <?php if ( have_posts() ) : 
               $post_loop = 0;
               ?>
			<?php

			/* Start the Loop */

			while ( have_posts() ) : the_post(); ?>
            
            <?php if($post_loop>0 && $post_loop%3 == 0):
            ?>
               </span>
               <span class="row clearfix">
            <?php endif; 

				/* Include the post format-specific template for the content. If you want to

				 * this in a child theme then include a file called called content-___.php

				 * (where ___ is the post format) and that will be used instead.

				 */

				get_template_part( 'content-loop', get_post_format() );
             $post_loop++;
			endwhile;

			//northernbeat_content_nav( 'nav-below' );
            if ( function_exists( 'wp_paginate' ) ) {
			wp_paginate();
    		}
    		else{
	           northernbeat_content_nav( 'nav-below' );
	         }

        ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


	</span>
				</div>
			</div>
    	</div>
    </section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>