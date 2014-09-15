<?php
/**
* Content Single
**/
 global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section>
       <div class="block intro divider icon">
            <div class="wrapper wide">
		    <h1><?php 
            //echo "hi";
            $custom_title =  trim(get_post_meta($post->ID, "Custom Title", true));
            if($custom_title)
            echo $custom_title;
            else
            the_title(); 
            
            ?></h1>
         <?php 
            
             $leadbox_values = trim(get_post_meta($post->ID, "Lead Box", true));
             if($leadbox_values): 
            ?> 
            <div class="wrapper normal">
            <?php echo $leadbox_values; ?>
             </div>
              <?php endif; ?>
             <div class="block main divider icon">
             <div class="wrapper normal">
             	<?php the_content(); ?>
            </div>
            </div>
         </div>
        </div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->