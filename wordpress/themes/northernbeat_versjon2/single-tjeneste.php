<?php

/**

 * The Template for displaying all single posts.

 **/

get_header(); ?>
	<div id="primary" class="site-content">

		<div id="content" role="main">
        
			<?php while ( have_posts() ) : the_post(); 

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
     		</div> 
            
            <div class="wrapper normal">
            <?php if( get_field('lead_box') ): ?>
            	<span class="lead">
    				<p><?php the_field('lead_box'); ?></p>
               </span>
				<?php endif;?>          
            </div>  
      </div>
     </section>
     
     <section>
       <div class="block intro divider icon">
             <div class="block main">
             <div class="wrapper normal">
             	<?php the_content(); ?>   
            </div>
            </div>
         </div>
	</section>
 <?php $relatert_referanse = get_field('nb_aktuelle_referanser');?>
            	<?php if( $relatert_referanse ): ?>   
    <section>
       <div class="block intro divider icon">
             <div class="block main">
             <div class="wrapper wide"> 
             
             	
                <h2 class="prosjektteam">Referanser</h2>
                          	
				<?php foreach( $relatert_referanse as $referanseInfo ): ?>
					<div class="textbox third"> 
                        <!--Displays each connected product with meta data -->
                        <div class="wrapper image">
                         <?php if (has_post_thumbnail( $referanseInfo->ID ) ){
						 		   
								   echo northernbeat_post_auto_thumbnail($referanseInfo->ID);
								 
								   }  
								   $referanse_postID = $referanseInfo->ID;?>
							
                        </div>
                        
                        <div class="wrapper text">
                        		<h3><a href="<?php echo get_permalink( $referanse_postID); ?>"><?php echo get_the_title( $referanse_postID ); ?></a></h3>
                                
                             <?php 
							 	$min_referanse_post = get_post($referanse_postID);
							 	$excerpt = $min_referanse_post->post_excerpt;?>
								<p><?php echo $excerpt; ?></p>
							</div>
					</div>
				<?php endforeach; ?>
                             
				
				
            </div>
            </div>
         </div>
	</section>
    <?php endif; ?>		                   

</article><!-- #post-<?php the_ID(); ?> -->  

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>