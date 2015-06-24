<?php
/**
 * The main template file.
 *
 */
get_header(); ?>
<div id="primary" class="site-content">
		<div id="content" role="main">
        <!--<section>-->
        <div class="block">
			<div class="wrapper wide">
				<h1>Vi skaper nettsider som <strong>engasjerer, konverterer og begeistrer</strong></h1>
			</div>
        </div>
        </section>



    <!-- --------------------------------------------------------------------------------- -->
    <!-- ---------------------------------- TJENESTER ------------------------------------ -->
    <!-- --------------------------------------------------------------------------------- -->
        
        <!-- <div class="block transport divider">
			<div class="wrapper wide">-->
        <section>
        <div class="block transport divider">
			<div class="wrapper wide">
				<h2><a href="<?php bloginfo("url") ?>/tjenester">Dette hjelper vi deg med</a></h2>
            	</div>
			
            <article id="post-<?php the_ID(); ?>" <?php post_class(); 
    $post_id = get_the_ID();
    ?>>

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
        
        </div><!-- END block transport divider-->



    <!-- --------------------------------------------------------------------------------- -->
    <!-- ---------------------------------- REFERANSER ----------------------------------- --> 
    <!-- --------------------------------------------------------------------------------- -->
      
        <div class="block transport divider">
			<div class="wrapper wide">
				<h2><a href="<?php bloginfo("url") ?>/referanser">Referanser</a></h2>






  <section>
    	<div class="block main">
			<div class="wrapper wide">
				<div class="boxflow">
            <span class="row clearfix">
            
          <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'paged'=>$paged,
				'post_type' => 'referanse',
                'posts_per_page' => 3,
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
            /* if ( function_exists( 'wp_paginate' ) ) { */
			/* wp_paginate(); */
    		/* } */
    		/* else{ */
	        /*    northernbeat_content_nav( 'nav-below' ); */
	        /*  } */

        ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>


	</span>
				</div>
			</div>
    	</div>
    </section>













                <!--
                <div class="aktuelt_forside">
                <?php 
					$teller = 0;
					$args = array( 'post_type' => 'aktuelt', 'posts_per_page' => 3 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();	
						$teller++; ?>
                     <div class="column half">
						<h3 class="miniTitle"><?php the_title();?></h3>
                      <?php if($teller == 1) {  
						  	$post_id = get_the_ID(); echo northernbeat_post_auto_thumbnail($post_id);
							the_content(); 
							} else {
							the_excerpt(); }
							?>
						</div>
					<?php endwhile;  ?>
                        
					</div>
                    
                  <?php if ( is_active_sidebar( 'sidebar-recent' ) ) : ?>
    
						<div  class="sidebar-recent column fourth">

						<?php dynamic_sidebar( 'sidebar-recent' ); ?>

						</div>

					<?php endif; ?>
                    -->
   	        </div>
    	</div>
      </section>



    <!-- --------------------------------------------------------------------------------- -->
    <!-- ----------------------------------- BEAT BOX ------------------------------------ -->
    <!-- --------------------------------------------------------------------------------- -->

      <section>
    	<div class="block transport divider">
			<div class="wrapper wide">
				<h2><a href="<?php bloginfo("url") ?>/tag/beatbox/">BeatBox</a></h2>
				<p class="subTitle">En blogg om inspirasjon</p>
                
                
				<div class="boxflow">
					<span class="row clearfix">
                    
                        <?php
                 $args= array(
                              'post_type' => 'post',
                              'tag_slug__in' => array("beatbox"),
                              'showposts'=>3,
                          );
                  $my_query = new WP_Query($args);
                  //print_r($my_query);
                  if($my_query->have_posts()) {
                    while ($my_query->have_posts()) : $my_query->the_post(); 
                    $post_id =  get_the_ID();
                    ?>
						<div class="textbox third">
							<div class="wrapper image">
								<a href="<?php the_permalink(); ?>"><?php echo northernbeat_post_auto_thumbnail($post_id); ?></a>
							</div>
							<div class="wrapper text">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
                        
                <?php
                    endwhile;
                    }
                ?>
					</span>
				</div><!-- boxflow -->
			</div>
    	</div>
    </section>



    <!-- --------------------------------------------------------------------------------- -->
    <!-- ------------------------------------ ANSATTE ------------------------------------ -->
    <!-- --------------------------------------------------------------------------------- -->
    
    <section>
		<div class="block people">
			<h4>Northern Beat</h4>
			<p><?php echo htmlentities("Pløensgate"); ?> 4. 0181, Oslo</p> 
			<div class="wrapper wide">
				<div class="boxflow">
					<span class="row clearfix">
                 
                 
                 <article id="post-<?php the_ID(); ?>" <?php post_class(); 
    $post_id = get_the_ID();
    ?>>

  <section>
  <section>
    	<div class="block main">
			<div class="wrapper wide">
				
            <span class="row clearfix">
            
          <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'paged'=>$paged,
				'post_type' => 'ansatt',
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
            
            <?php if($post_loop>0 && $post_loop%6 == 0):
            ?>
               </span>
               <span class="row clearfix">
            <?php endif; 

				/* Include the post format-specific template for the content. If you want to

				 * this in a child theme then include a file called called content-___.php

				 * (where ___ is the post format) and that will be used instead.

				 */ ?>

				<div class="textbox sixth">
                
					<div class="wrapper image">
						<?php $post_id = get_the_ID(); echo northernbeat_post_auto_thumbnail($post_id); ?>
					</div>
                    
					<div class="wrapper text left">
						<h4><?php the_title(); ?></h4>
                        
                       <p> 
                       <?php if(get_field('nb_stilling')){ ?>
				 				<?php echo get_field('nb_stilling'); ?>
							<?php } ?>
                        </p>
                       
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
    </section>
                 
                 
                    </span>
				</div>
			</div>
		</div>
 </section>
</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
