<?php

/**

 * Template Name: Tjenester

 */
$add_sidebar_footer = true;


get_header(); 



//print_r($wp_query);
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); 
    $post_id = get_the_ID();
    ?>>
		<section>
        <div class="block intro divider icon">
            <div class="wrapper wide">
			<h1><?php  $custom_title =  trim(get_post_meta($post_id, "Custom Title", true));
            if($custom_title)
            echo $custom_title;
            else
            the_title();  ?></h1>
            
            </div>
            <?php $leadbox_values = trim(get_post_meta($post_id, "Lead Box", true));
             if($leadbox_values): 
            ?> 
            <div class="wrapper normal">
            <?php echo $leadbox_values; ?>
             </div>
             <?php endif; ?>
        </div>
        </section>
        
        
  <section>
    	<div class="block people">

			<div class="wrapper wide">
				<div class="boxflow">
            <span class="row clearfix">
            
          <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'paged'=>$paged,
				'post_type' => 'tjeneste',
				'orderby' => 'date',
				      );

			query_posts($args);
			$x = 0;
            
		        if ( have_posts() ) : 
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

				 */ ?>

				<div class="textbox third">
                
	<div class="wrapper image">
		<a href="<?php the_permalink(); ?>"><?php $post_id = get_the_ID(); echo northernbeat_post_auto_thumbnail($post_id); ?></a>
	</div>
	<div class="wrapper text">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_excerpt(); ?></p>
	</div>
				</div>
             <?php 
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