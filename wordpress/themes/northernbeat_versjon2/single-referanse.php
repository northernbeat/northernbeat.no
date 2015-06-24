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
       <div class="block intro">
			<div class="wrapper wide">
				<h1><?php 
					if(get_field('nb_alt_title')){
						$altTitle = get_field('nb_alt_title'); ?>
						<?php echo $altTitle;}
					else {
						the_title(); }
				?></h1>
		</div> 
        </div>
	</section>

            
	<?php if(get_field('nb_toppbilde')){ ?>
		<section class="sitatmbilde_section"> 
			<div class="block intro">       
				<div class="wrapper wide">	
        
					<div class="sitatmbilde">
            			<?php
						$nbToppbilde = get_field('nb_toppbilde');
						$sizes = $nbToppbilde["sizes"]["referansetoppbilde"]; 
						?>
                      <img src="<?php echo $sizes; ?>" />
                     
                    </div>
                    
                    <div class="baresitat">
						<h2>Om leveransen</h2>
						<div class="lead">
							<?php if( get_field('nb_referanse_sitat') ): ?>
								<p class="sitatet"><?php the_field('nb_referanse_sitat'); ?></p>
							<?php endif;?>
							<?php if( get_field('nb_navn_sitat') ): ?>
								<p><?php the_field('nb_navn_sitat'); ?></p>
							<?php endif;?>
						</div>
					</div>
                    
				</div>
			</div>
            
			<div class="gardient_bakbilde"></div>
		</section>
	<?php }  
	
	else { ?>
    	<section> 
			<div class="block intro">       
				<div class="wrapper wide ">
                
					<div class="baresitat">
						<h2>Om leveransen</h2>
						<div class="lead">
							<?php if( get_field('nb_referanse_sitat') ): ?>
								<p class="sitatet"><?php the_field('nb_referanse_sitat'); ?></p>
							<?php endif;?>
							<?php if( get_field('nb_navn_sitat') ): ?>
								<p><?php the_field('nb_navn_sitat'); ?></p>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
            
			<div class="gardient_bakbilde"></div>
            
		</section>
	<?php }?>
                
	<!-- Oppsummering START -->  
	<?php if( get_field('nb_kort_om_oppdraget') || have_rows('nb_prosjektpunktliste') ): ?> 
    
		
        <section class="referanse_white">
			<div class="block main">
					<div class="referanse_oppsummering">
                    

                      <?php $omOppdrag = get_field('nb_kort_om_oppdraget'); ?>
                      		<p><?php echo $omOppdrag; ?></p>
                        
						<ul>
						<?php while( have_rows('nb_prosjektpunktliste') ): the_row(); 			
						
							// vars
							$oppsummeringPunkt = get_sub_field('nb_prosjektpunkt');
						?>
							<li><p><?php echo $oppsummeringPunkt; ?></p></li>
						<?php endwhile; ?>
						</ul>
         
					</div>
			</div>
		</section> 
	<?php endif; ?>  
	<!-- Oppsummering SLUTT --> 

     <!-- Bakrunn & mål START -->
		<?php if( get_field('nb_bakgrunn_bilde') || get_field('nb_bakgrunn')) { ?>
      		<section class="referanse_linje">
       			<div class="block main">
              			<div class="wrapper wide">
      
      						<div class="referanse_bakgrunn">

      							<?php if( get_field('nb_bakgrunn_bilde')) { ?> <div class="referanse_tekst">  <?php } else {
								
								get_field('nb_bakgrunn')
								
								?>  <div class="referanse_tekst_middle"> <?php } ?>
                                
                					<?php $bakgrunnTekst = get_field('nb_bakgrunn');
                      			echo $bakgrunnTekst; ?>
           					</div> 
      
      							<?php $bakgrunnBilde = get_field('nb_bakgrunn_bilde');	
								$sizes = $bakgrunnBilde["sizes"]["referanseimage"];
								$url = $bakgrunnBilde["url"]; ?>
                        			
                            		<div class="referanse_bilderight">
										<?php if($bakgrunnBilde) : ?>
                     						<img src="<?php echo $sizes; ?>" />
										<?php endif; ?>
                            		</div>
                            		
							</div><!-- .referanse_bakgrunn SLUTT --> 
                            
						</div><!-- .wrapper .wide SLUTT --> 
				</div><!-- .block SLUTT --> 
			</section>
		<?php } ?>	
       <!-- Bakrunn & mål SLUTT -->  
       
       
       <!-- Konsept & idé START -->  
       <?php if(get_field('nb_konsept_bilde') || get_field('nb_konsept')){ ?>          
       		<section class="referanse_linje">
       			<div class="block main">
             			<div class="wrapper wide">
                        
                  		<div class="referanse_konsept"> 
                        
								<?php $konseptBilde = get_field('nb_konsept_bilde');
								$sizes = $konseptBilde["sizes"]["referanseimage"];
								$url = $konseptBilde["url"]; ?>
									<div class="referanse_bildeleft">
                                    <?php if($konseptBilde) : ?>
											<img src="<?php echo $sizes; ?>" />
                                    <?php endif; ?>
									</div>
                                    
                                    
                              <?php if( get_field('nb_konsept_bilde')) { ?> <div class="referanse_tekst">  <?php } else {
								
								get_field('nb_konsept')
								
								?>  <div class="referanse_tekst_middle"> <?php } ?>
                            
							
									<?php $bakgrunnTekst = get_field('nb_konsept');
                      				echo $bakgrunnTekst; ?>    
								</div>
                            
							</div><!-- .referanse_konsept SLUTT --> 
                            
						</div><!-- .wrapper .wide SLUTT --> 
				</div><!-- .block SLUTT --> 
			</section>     
                 
		<?php }  ?>
		<!-- Konsept & idé SLUTT -->  
         
	<!-- Slider START -->      
		<?php echo nb_slider_template(); ?> 
	<!-- Slider SLUTT -->   
		
		<!-- Resultater START-->
		<?php if( get_field('nb_resultater_bilde') || get_field('nb_resultater')) { ?>
      		<section class="referanse_linje">
       			<div class="block main">
              			<div class="wrapper wide">
      
      						<div class="referanse_resultat">
                            
                            <?php if( get_field('nb_resultater_bilde')) { ?> <div class="referanse_tekst">  <?php } else {
								
								get_field('nb_resultater')
								
								?>  <div class="referanse_tekst_middle"> <?php } ?>

      							 
                					<?php $resultaterTekst = get_field('nb_resultater');
                      			echo $resultaterTekst; ?>
           					</div> 
      
      							<?php $resultatBilde = get_field('nb_resultater_bilde');	
								$sizes = $resultatBilde["sizes"]["referanseimage"];
								$url = $resultatBilde["url"]; ?>
                            		<div class="referanse_bilderight">
                                    <?php if($resultatBilde) : ?>
                     					<img src="<?php echo $sizes; ?>" />
                                    <?php endif; ?>
                            		</div>
                            
							</div><!-- .referanse_resultat SLUTT --> 
                            
						</div><!-- .wrapper .wide SLUTT --> 
				</div><!-- .block SLUTT --> 
			</section>
		<?php } ?>
       <!-- Resultater SLUTT -->  

		<!-- Ansatte START-->
		<?php $relatert_ansatt = get_field('nb_prosjektmedarbeidere');?>         
			<?php if( $relatert_ansatt ): ?>        
				<section class="referanse_linje">
					<div class="block main">
							<div class="wrapper wide"> 

								<h2 class="prosjektteam">Prosjektteamet</h2>
                				  <div class="ansattwrap">
                                 
									<?php foreach( $relatert_ansatt as $ansattInfo): ?>

											<!--Displays each connected teammmember with meta data -->
											<div class="ansattboks">	
												
                                            <div class="wrapper image">
													<?php if (has_post_thumbnail( $ansattInfo->ID) ):
													
													$post_thumbnail_id = get_post_thumbnail_id( $ansattInfo->ID);
													
													echo get_the_post_thumbnail( $ansattInfo->ID, 'referanseansatt' );
												
													?></div>
													<?php endif; ?> 
													<div class="wrapper text">
													<p><?php echo get_the_title( $ansattInfo ); ?></p>
												</div>
											</div>
                                            
									<?php endforeach;
									  ?> 

                            </div><!-- .ANSATTWRAP -->
                            </div>
					</div>
				</section>
			<?php endif; ?>
		<!-- Ansatte SLUTT -->
        
  <!-- Samarbeidspartnere -->
	
		<section class="referanse_liten"> 
			<div  class="block main">

					<?php if( have_rows('nb_samarbeidspartnere') ){  
                    if( have_rows('nb_andre_prosjekter') ){?> <div class="samarbeidleft">
                    <?php } else {?><div class="samarbeidsenter"><?php } ?>
                
						<h3>Utført sammen med:</h3> 
                    	
						<ul>
						<?php while( have_rows('nb_samarbeidspartnere') ): the_row(); 			
						
							// vars
							$partnerNavn = get_sub_field('nb_samarbeidspartner_navn');
							$partnerLink = get_sub_field('nb_samarbeidspartner_link');
						?>
							<li><p><a href="<?php echo $partnerLink; ?>"><?php echo $partnerNavn; ?></a></p></li>
						<?php endwhile; ?>
						</ul> 
					</div>  <?php } ?>    
	
              
              <!-- Andre prosjekter for kunden -->
        		<?php if( have_rows('nb_andre_prosjekter') ){  
                    if( have_rows('nb_samarbeidspartnere') ){?> <div class="andreprosjekterright">
                    <?php } else {?><div class="andreprosjektersenter"><?php } ?> 

						<h3>Andre prosjekter for kunden:</h3> 
                    	
						<ul>
						<?php while( have_rows('nb_andre_prosjekter') ): the_row(); 			
						
							// vars
							$andreNavn = get_sub_field('nb_andre_prosjekter_navn');
							$andreLink = get_sub_field('nb_andre_prosjekter_link');
						?>
							<li><p><a href="<?php echo $andreLink; ?>"><?php echo $andreNavn; ?></a></p></li>
						<?php endwhile; ?>
						</ul>
                        
                     
					</div>      
    			<?php } ?>
				
        	</div>           
		</section>
 	  
    <!-- Andre prosjekter START -->      
	<?php $posts = get_field('nb_prosjekter_generelt');
		if( $posts ): ?>

			<section class="referanse_grey">
				<div class="block main" id="container">

				<h2 class="prosjektteam">Andre prosjekter vi har gjort</h2>

  				<span class="row clearfix">
    				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        			<?php setup_postdata($post); ?>
       					<div class="textbox third item">
       
       						<div class="wrapper image">
								<a href="<?php the_permalink(); ?>"><?php $post_id = get_the_ID(); echo northernbeat_post_auto_thumbnail($post_id); ?></a>
							</div>
       		
							<div class="wrapper text">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt(); ?></p>
							</div>
        				</div>
    				<?php endforeach; ?>
    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    			</span>
    
				</div>
			</section> 
		<?php endif; ?>


		  
<!-- Andre prosjekter SLUTT -->   
    
</article><!-- #post-<?php the_ID(); ?> -->  

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>