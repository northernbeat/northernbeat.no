<?php

/**

 * The template used for displaying page content in page.php

*/

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
        <div class="block main divider icon">
		<div class="entry-content">
            <div class="wrapper normal">
             	<?php the_content(); ?>
            </div>    
            <?php $sub_pages = get_pages( array("child_of" => $post_id, 'sort_order' => 'DESC', 'sort_column' => 'menu_order')); 
            //print_r($subpages);
            if($sub_pages):
            $sub_pages = array_reverse($sub_pages);
            $post_loop = 0;
            ?>
    	    <!--<div class="block main">-->
			<div class="wrapper wide">
            <div class="boxflow">
             <span class="row clearfix">
             <?php foreach($sub_pages as $s_page){ 
             $excerpt_page =  has_excerpt( $s_page->ID ); 
             ?>
             <?php if($post_loop>0 && $post_loop%3 == 0):
             ?>
             </span>
             <span class="row clearfix">
            <?php endif; ?>
            <div class="textbox third">
            <div class="wrapper image">
            <?php echo northernbeat_post_auto_thumbnail($s_page->ID); ?>
            </div>
            <div class="wrapper text <?php if(!$excerpt_page) echo "left"; ?>">
             <h3><?php 
             if($excerpt_page)
             echo "<a href='".get_permalink($s_page->ID)."'>".$s_page->post_title."</a>";
             else
             echo $s_page->post_title; 
             ?></h3>
             <?php 
             //print_r($s_page);
             if($excerpt_page)
             echo "<p>".$s_page->post_excerpt."</p>";
             else
             echo apply_filters('the_content', $s_page->post_content, $s_page->ID); 
             
             
             ?>
            </div>
            </div>
            <?php $post_loop++;} ?>
            </span>
            </div>
            </div>
            <!--</div>-->
            <?php endif; // subpages ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'northernbeat' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
        </div>
       </section>
		<section class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'northernbeat' ), '<span class="edit-link">', '</span>' ); ?>
		</section><!-- .entry-meta -->
	</article><!-- #post -->
     