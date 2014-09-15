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
        <section>
        <div class="block transport divider">
			<div class="wrapper wide">
				<h2><a href="<?php bloginfo("url") ?>/tjenester">Dette hjelper vi deg med</a></h2>
            	</div>
		
        
        <?php $tjenester = get_page_by_title("Tjenester"); 
        //print_r($tjenester);
        if($tjenester): ?>
        <div class="boxflow">
        <span class="row clearfix">
        <?php 
            $sub_pages = get_pages( array("child_of" => $tjenester->ID, 'sort_column' => 'menu_order', 'sort_order' => 'DESC')); 
            //print_r($subpages);
            if($sub_pages):
            $sub_pages = array_reverse($sub_pages);
            $post_loop = 0;
        ?>
        <?php foreach($sub_pages as $s_page){ 
              if($post_loop>0 && $post_loop%3 == 0):
        ?>
             </span>
             <span class="row clearfix">
        <?php endif; ?>
        <div class="textbox third">
							<div class="wrapper text">
								<h3><a href='<?php echo get_permalink($s_page->ID) ?>'><?php echo $s_page->post_title ?></a></h3>
								<p><?php echo $s_page->post_excerpt; ?></p>
							</div>
		</div>
        <?php } endif;  ?>
         </span>
        </div>
        <?php endif; ?>
        </div>
        <div class="block transport divider">
			<div class="wrapper wide">
				<h2><a href="<?php bloginfo("url") ?>/tag/referanser">Referanser</a></h2>
                <?php $referenser_page = get_page_by_title("Home-Referanser"); if($referenser_page):
                
                echo apply_filters('the_content', $referenser_page->post_content, $referenser_page->ID); 
                endif;
                 ?>
   	        </div>
    	</div>
      </section>
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
    <section>
		<div class="block people">
			<h4>Northern Beat</h4>
			<p><?php echo htmlentities("Pløensgate"); ?> 4. 0181, Oslo</p> 
			<div class="wrapper wide">
				<div class="boxflow">
					<span class="row clearfix">
                    <?php $hrmvi_page = get_page_by_title("Hvem er vi?"); if($hrmvi_page): 
                     $sub_pages = get_pages( array("child_of" => $hrmvi_page->ID)); 
                     
                     if($sub_pages):
                     foreach($sub_pages as $s_page){
                        $emp_pos_values = trim(get_post_meta($s_page->ID, "Employment Position", true));
                    ?>
					<div class="textbox sixth"> 
							<a href="<?php echo get_permalink($s_page->ID) ?>"><?php echo northernbeat_post_auto_thumbnail($s_page->ID," "); ?></a>
							<div class="wrapper">
								<h4><?php echo $s_page->post_title; ?></h4>
								<p><?php  echo $emp_pos_values; ?></p>
							</div>
					</div>
                    <?php }
                    endif;
                    endif; 
                    ?>
                    </span>
				</div>
			</div>
		</div>
 </section>
</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>