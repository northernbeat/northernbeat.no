<?php

/**

 * Content Default Template

 *



 */
//echo "content";
global $post;
?>



	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section>
        <div class="block intro divider icon">
			<div class="wrapper wide">
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'northernbeat' ); ?>
		</div>
		<?php endif; ?>
			<?php if ( is_single() ) : ?>
			<h1><?php $custom_title =  trim(get_post_meta($post->ID, "Custom Title", true));
            if($custom_title)
            echo $custom_title;
            else
            the_title();  ?></h1>
            <?php $content_tag_line =  trim(get_post_meta($post->ID, "Content Tag Line", true)); 
            if($content_tag_line) echo $content_tag_line;
            ?>
			<?php else : ?>
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'northernbeat' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
             <?php 
             global $post;
             $post_id = $post ? $post->ID : 0;
             $leadbox_values = trim(get_post_meta($post_id, "Lead Box", true));
             if($leadbox_values): 
            ?> 
            <div class="wrapper normal">
            <?php echo $leadbox_values; ?>
             </div>
             <?php endif; ?>
		  </div>
		</div>
 	<section>
    	<div class="block main">
			<div class="wrapper normal">
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'northernbeat' ) ); ?>
			<?php 
           if ( function_exists( 'wp_paginate' ) ) {
			wp_paginate();
		}
		else {
	           wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'northernbeat' ), 'after' => '</div>' ) );
	         }
             ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
           </div>
        </div>
       </section>
	</article><!-- #post -->