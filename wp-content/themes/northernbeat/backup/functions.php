<?php



function northernbeat_setup() {

	/*

	 * Makes Northernbeat available for translation.

	 *

	 * Translations can be added to the /languages/ directory.

	 * If you're building a theme based on Northernbeat, use a find and replace

	 * to change 'northernbeat' to the name of your theme in all the template files.

	 */

	load_theme_textdomain( 'northernbeat', get_template_directory() . '/languages' );



	// This theme styles the visual editor with editor-style.css to match the theme style.

	add_editor_style();



	// Adds RSS feed links to <head> for posts and comments.

	add_theme_support( 'automatic-feed-links' );



	// This theme supports a variety of post formats.

	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menu( 'primary', __( 'Primary Menu', 'northernbeat' ) );



	/*

	 * This theme supports custom background color and image, and here

	 * we also set up the default background color.

	 */

	add_theme_support( 'custom-background', array(

		'default-color' => 'e6e6e6',

	) );



	// This theme uses a custom image size for featured images, displayed on "standard" posts.

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

}

add_action( 'after_setup_theme', 'northernbeat_setup' );



/**

 * Adds support for a custom header image.

 */

require( get_template_directory() . '/inc/custom-header.php' );



/**

 * Enqueues scripts and styles for front-end.

 *



 */

function northernbeat_scripts_styles() {

	global $wp_styles;



	/*

	 * Adds JavaScript to pages with the comment form to support

	 * sites with threaded comments (when in use).

	 */

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	/*

	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.

	 */

	wp_enqueue_script( 'northernbeat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );



	/*

	 * Loads our special font CSS file.

	 *

	 * The use of Open Sans by default is localized. For languages that use

	 * characters not supported by the font, the font can be disabled.

	 *

	 * To disable in a child theme, use wp_dequeue_style()

	 * function mytheme_dequeue_fonts() {

	 *     wp_dequeue_style( 'northernbeat-fonts' );

	 * }

	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );

	 */



	/* translators: If there are characters in your language that are not supported

	   by Open Sans, translate this to 'off'. Do not translate into your own language. */

	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'northernbeat' ) ) {

		$subsets = 'latin,latin-ext';



		/* translators: To add an additional Open Sans character subset specific to your language, translate

		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */

		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'northernbeat' );



		if ( 'cyrillic' == $subset )

			$subsets .= ',cyrillic,cyrillic-ext';

		elseif ( 'greek' == $subset )

			$subsets .= ',greek,greek-ext';

		elseif ( 'vietnamese' == $subset )

			$subsets .= ',vietnamese';



		$protocol = is_ssl() ? 'https' : 'http';

		$query_args = array(

			'family' => 'Open+Sans:400italic,700italic,400,700',

			'subset' => $subsets,

		);

		//wp_enqueue_style( 'northernbeat-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );

	}



	/*

	 * Loads our main stylesheet.

	 */

	wp_enqueue_style( 'northernbeat-style', get_stylesheet_uri() );



	/*

	 * Loads the Internet Explorer specific stylesheet.

	 */

	wp_enqueue_style( 'northernbeat-ie', get_template_directory_uri() . '/css/ie.css', array( 'northernbeat-style' ), '20121010' );

	$wp_styles->add_data( 'northernbeat-ie', 'conditional', 'lt IE 9' );

}

add_action( 'wp_enqueue_scripts', 'northernbeat_scripts_styles' );



/**

 * Creates a nicely formatted and more specific title element text

 * for output in head of document, based on current view.

 *



 *

 * @param string $title Default title text for current view.

 * @param string $sep Optional separator.

 * @return string Filtered title.

 */

function northernbeat_wp_title( $title, $sep ) {

	global $paged, $page;



	if ( is_feed() )

		return $title;



	// Add the site name.

	$title .= get_bloginfo( 'name' );



	// Add the site description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		$title = "$title $sep $site_description";



	// Add a page number if necessary.

	if ( $paged >= 2 || $page >= 2 )

		$title = "$title $sep " . sprintf( __( 'Page %s', 'northernbeat' ), max( $paged, $page ) );



	return $title;

}

add_filter( 'wp_title', 'northernbeat_wp_title', 10, 2 );



/**

 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.

 *



 */

function northernbeat_page_menu_args( $args ) {

	if ( ! isset( $args['show_home'] ) )

		$args['show_home'] = true;

	return $args;

}

add_filter( 'wp_page_menu_args', 'northernbeat_page_menu_args' );



/**

 * Registers our main widget area and the front page widget areas.

 *



 */

function northernbeat_widgets_init() {

	register_sidebar( array(

		'name' => __( 'Main Sidebar', 'northernbeat' ),

		'id' => 'sidebar-1',

		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'northernbeat' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	register_sidebar( array(

		'name' => __( 'First Front Page Widget Area', 'northernbeat' ),

		'id' => 'sidebar-2',

		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'northernbeat' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	register_sidebar( array(

		'name' => __( 'Second Front Page Widget Area', 'northernbeat' ),

		'id' => 'sidebar-3',

		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'northernbeat' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );
    
    
    register_sidebar( array(

		'name' => __( 'Sidebar Footer', 'northernbeat' ),

		'id' => 'sidebar-footer',

		'description' => __( 'Appears sidebar Footer Area', 'northernbeat' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );
    
    register_sidebar( array(

		'name' => __( 'Footer Widget', 'northernbeat' ),

		'id' => 'footer-widget',

		'description' => __( 'Content For Footer Area', 'northernbeat' ),

		'before_widget' => '<aside id="%1$s" class="widget %2$s">',

		'after_widget' => '</aside>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );

}

add_action( 'widgets_init', 'northernbeat_widgets_init' );



if ( ! function_exists( 'northernbeat_content_nav' ) ) :

/**

 * Displays navigation to next/previous pages when applicable.

 *



 */

function northernbeat_content_nav( $html_id ) {

	global $wp_query;



	$html_id = esc_attr( $html_id );



	if ( $wp_query->max_num_pages > 1 ) : ?>

		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">

			<h3 class="assistive-text"><?php _e( 'Post navigation', 'northernbeat' ); ?></h3>

			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'northernbeat' ) ); ?></div>

			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'northernbeat' ) ); ?></div>

		</nav><!-- #<?php echo $html_id; ?> .navigation -->

	<?php endif;

}

endif;



if ( ! function_exists( 'northernbeat_comment' ) ) :

/**

 * Template for comments and pingbacks.

 *

 * To override this walker in a child theme without modifying the comments template

 * simply create your own northernbeat_comment(), and that function will be used instead.

 *

 * Used as a callback by wp_list_comments() for displaying the comments.

 *



 */

function northernbeat_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :

		case 'pingback' :

		case 'trackback' :

		// Display trackbacks differently than normal comments.

	?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

		<p><?php _e( 'Pingback:', 'northernbeat' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'northernbeat' ), '<span class="edit-link">', '</span>' ); ?></p>

	<?php

			break;

		default :

		// Proceed with normal comments.

		global $post;

	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<header class="comment-meta comment-author vcard">

				<?php

					echo get_avatar( $comment, 44 );

					printf( '<cite class="fn">%1$s %2$s</cite>',

						get_comment_author_link(),

						// If current post author is also comment author, make it known visually.

						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'northernbeat' ) . '</span>' : ''

					);

					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',

						esc_url( get_comment_link( $comment->comment_ID ) ),

						get_comment_time( 'c' ),

						/* translators: 1: date, 2: time */

						sprintf( __( '%1$s at %2$s', 'northernbeat' ), get_comment_date(), get_comment_time() )

					);

				?>

			</header><!-- .comment-meta -->



			<?php if ( '0' == $comment->comment_approved ) : ?>

				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'northernbeat' ); ?></p>

			<?php endif; ?>



			<section class="comment-content comment">

				<?php comment_text(); ?>

				<?php edit_comment_link( __( 'Edit', 'northernbeat' ), '<p class="edit-link">', '</p>' ); ?>

			</section><!-- .comment-content -->



			<div class="reply">

				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'northernbeat' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

			</div><!-- .reply -->

		</article><!-- #comment-## -->

	<?php

		break;

	endswitch; // end comment_type check

}

endif;



if ( ! function_exists( 'northernbeat_entry_meta' ) ) :

/**

 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.

 *

 * Create your own northernbeat_entry_meta() to override in a child theme.

 *



 */

function northernbeat_entry_meta() {

	// Translators: used between list items, there is a space after the comma.

	$categories_list = get_the_category_list( __( ', ', 'northernbeat' ) );



	// Translators: used between list items, there is a space after the comma.

	$tag_list = get_the_tag_list( '', __( ', ', 'northernbeat' ) );



	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',

		esc_url( get_permalink() ),

		esc_attr( get_the_time() ),

		esc_attr( get_the_date( 'c' ) ),

		esc_html( get_the_date() )

	);



	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',

		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),

		esc_attr( sprintf( __( 'View all posts by %s', 'northernbeat' ), get_the_author() ) ),

		get_the_author()

	);



	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.

	if ( $tag_list ) {

		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'northernbeat' );

	} elseif ( $categories_list ) {

		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'northernbeat' );

	} else {

		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'northernbeat' );

	}



	printf(

		$utility_text,

		$categories_list,

		$tag_list,

		$date,

		$author

	);

}

endif;



/**

 * Extends the default WordPress body class to denote:

 * 1. Using a full-width layout, when no active widgets in the sidebar

 *    or full-width template.

 * 2. Front Page template: thumbnail in use and number of sidebars for

 *    widget areas.

 * 3. White or empty background color to change the layout and spacing.

 * 4. Custom fonts enabled.

 * 5. Single or multiple authors.

 *



 *

 * @param array Existing class values.

 * @return array Filtered class values.

 */

function northernbeat_body_class( $classes ) {

	$background_color = get_background_color();



	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )

		$classes[] = 'full-width';



	if ( is_page_template( 'page-templates/front-page.php' ) ) {

		$classes[] = 'template-front-page';

		if ( has_post_thumbnail() )

			$classes[] = 'has-post-thumbnail';

		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )

			$classes[] = 'two-sidebars';

	}



	if ( empty( $background_color ) )

		$classes[] = 'custom-background-empty';

	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )

		$classes[] = 'custom-background-white';



	// Enable custom font class only if the font CSS is queued to load.

	if ( wp_style_is( 'northernbeat-fonts', 'queue' ) )

		$classes[] = 'custom-font-enabled';



	if ( ! is_multi_author() )

		$classes[] = 'single-author';



	return $classes;

}

add_filter( 'body_class', 'northernbeat_body_class' );



/**

 * Adjusts content_width value for full-width and single image attachment

 * templates, and when there are no active widgets in the sidebar.

 *



 */

function northernbeat_content_width() {

	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {

		global $content_width;

		$content_width = 960;

	}

}

add_action( 'template_redirect', 'northernbeat_content_width' );



/**

 * Add postMessage support for site title and description for the Theme Customizer.

 *



 *

 * @param WP_Customize_Manager $wp_customize Theme Customizer object.

 * @return void

 */
 
 
 
 
add_action( 'admin_menu', 'northernbeat_create_post_meta_box' );
add_action( 'save_post', 'northernbeat_save_post_meta_box', 10, 2 );

function northernbeat_create_post_meta_box() {
	add_meta_box( 'northernbeat-custom-title', 'Custom Title', 'northernbeat_post_custom_title', 'post', 'normal', 'high' );
	add_meta_box( 'northernbeat-custom-title', 'Custom Title', 'northernbeat_post_custom_title', 'page', 'normal', 'high' );
	add_meta_box( 'northernbeat-meta-box', 'Lead Box', 'northernbeat_post_meta_box', 'post', 'normal', 'high' );
    add_meta_box( 'northernbeat-meta-box', 'Lead Box', 'northernbeat_post_meta_box', 'page', 'normal', 'high' );
   	add_meta_box( 'northernbeat-tagline-box', 'Content Tag Line', 'northernbeat_post_tagline_box', 'post', 'normal', 'high' );
    add_meta_box( 'northernbeat-tagline-box', 'Content Tag Line', 'northernbeat_post_tagline_box', 'page', 'normal', 'high' );
    
    add_meta_box( 'employment-position', 'Employment Position', 'northernbeat_post_employment_pos', 'page', 'normal', 'high' );
}   

function northernbeat_post_meta_box( $object, $box ) { ?>
	<p>
		<label for="second-excerpt">Lead Box</label>
		<br />
		<textarea name="leadbox-text" id="leadbox-text" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Lead Box', true ), 1 ); ?></textarea>
		<input type="hidden" name="northernbeat_meta_box_nonce" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</p>
<?php }

function northernbeat_post_custom_title( $object, $box ) { ?>
	<p>
		<label for="custom-title">Custom Title</label>
		<br />
		<input type="text" name="custom-title" id="custom-title" value="<?php echo wp_specialchars( get_post_meta( $object->ID, 'Custom Title', true ), 1 ); ?>" style="width:  97%;"/>
        <br />
        <label for="custom-title-info"><em>If custom title is empty than post display post default title. Otherwise it will show the custom title</em></label>
		
	</p>
<?php }


function northernbeat_post_employment_pos( $object, $box ) { ?>
	<p>
		<label for="custom-title">Employment Position</label>
		<br />
		<input type="text" name="employment-position" id="employment-position" value="<?php echo wp_specialchars( get_post_meta( $object->ID, 'Employment Position', true ), 1 ); ?>" style="width:  97%;"/>
        <br />
        <label for="employment-position"><em>Add this only where applicable. Otherwise keep it blank. Please don't add any garbage data.</em></label>
	</p>
<?php }


function northernbeat_post_tagline_box( $object, $box ) { ?>
	<p>
		<label for="second-excerpt">Content Tag Line</label>
		<br />
		<textarea name="tagline-text" id="tagline-text" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo wp_specialchars( get_post_meta( $object->ID, 'Content Tag Line', true ), 1 ); ?></textarea>
		
	</p>
<?php }



function northernbeat_save_post_meta_box( $post_id, $post ) {
	if ( !wp_verify_nonce( $_POST['northernbeat_meta_box_nonce'], plugin_basename( __FILE__ ) ) ){
	   	return $post_id;
	}
	if ( !current_user_can( 'edit_post', $post_id ) ){
	  return $post_id; 
	}
	/* Lead Box */	
    
	$meta_value = get_post_meta( $post_id, 'Lead Box', true );
    //echo $meta_value;
	$new_meta_value = stripslashes( $_POST['leadbox-text'] );

	if ( $new_meta_value && ! metadata_exists('post',$post_id,'Lead Box') )
		add_post_meta( $post_id, 'Lead Box', $new_meta_value, true );

	elseif ( $new_meta_value != $meta_value )
		update_post_meta( $post_id, 'Lead Box', $new_meta_value );

	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, 'Lead Box', $meta_value );
        
   
   /* Custom Title */     
        
   $meta_value_custom_title = get_post_meta( $post_id, 'Custom Title', true );
    //echo $meta_value;
   $new_title_meta_value = stripslashes( $_POST['custom-title'] );

	if ( $new_title_meta_value && ! metadata_exists('post',$post_id,'Custom Title') )
		add_post_meta( $post_id, 'Custom Title', $new_title_meta_value, true );

	elseif ( $new_title_meta_value != $meta_value_custom_title )
		update_post_meta( $post_id, 'Custom Title', $new_title_meta_value );

	elseif ( '' == $new_title_meta_value && $meta_value_custom_title )
		delete_post_meta( $post_id, 'Custom Title', $meta_value_custom_title );
        
    /* Employment Position */  
    
    $meta_value_employment = get_post_meta( $post_id, 'Employment Position', true );

    $new_employment_meta_value = stripslashes( $_POST['employment-position'] );

	if ( $new_employment_meta_value && ! metadata_exists('post',$post_id,'Employment Position') )
		add_post_meta( $post_id, 'Employment Position', $new_employment_meta_value, true );

	elseif ( $new_employment_meta_value != $meta_value_employment )
		update_post_meta( $post_id, 'Employment Position', $meta_value_employment );

	elseif ( '' == $new_employment_meta_value && $meta_value_employment )
		delete_post_meta( $post_id, 'Employment Position', $meta_value_employment );     
        
        
     /* Content Tag line */     
        
   $meta_value_tagline = get_post_meta( $post_id, 'Content Tag Line', true );
    //echo $meta_value;
   $new_tagline_meta_value = stripslashes( $_POST['tagline-text'] );

	if ( $new_tagline_meta_value && ! metadata_exists('post',$post_id,'Content Tag Line') )
		add_post_meta( $post_id, 'Content Tag Line', $new_tagline_meta_value, true );

	elseif ( $new_tagline_meta_value != $meta_value_tagline )
		update_post_meta( $post_id, 'Content Tag Line', $new_tagline_meta_value );

	elseif ( '' == $new_tagline_meta_value && $meta_value_tagline )
		delete_post_meta( $post_id, 'Content Tag Line', $meta_value_tagline );       
}
 
 
function northernbeat_post_auto_thumbnail($post_id,$alt="image",$style=""){
    if($post_id){
        $post_thumbnail_url = northernbeat_post_thumbnail_source($post_id);
        if($post_thumbnail_url){
            $thumb_img = "<img src='".$post_thumbnail_url."' alt='".$alt."' $style/>";
        }
    }
  return $thumb_img;
}

function northernbeat_post_thumbnail_source($post_id){
    if($post_id){
      $post_thumbnail_id = get_post_thumbnail_id($post_id);
      $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
      return $post_thumbnail_url; 
    }
}
 

function northernbeat_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

}








add_action( 'customize_register', 'northernbeat_customize_register' );



/**

 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.

 *



 */

function northernbeat_customize_preview_js() {

	wp_enqueue_script( 'northernbeat-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );

}

function northernbeat_menu_mod($sorted_menu_items){
    global $wp_query,$post;
     //print_r($wp_query);
    if($wp_query->query_vars)
    $query_tag = $wp_query->query_vars['tag'];
    $post_tag_lists = array();
    $post_id = ($post && is_object($post))? $post->ID: 0;
    if($post_id){
    $post_tags = wp_get_post_tags($post_id);
    if($post_tags){
        foreach($post_tags as $value)
        $post_tag_lists[] = strtolower($value->name);
    }
    
    $post_parent = $post->post_parent;
    if($post_parent &&  $post->post_type == "page"){ 
    $parent_post_data = get_post($post_parent);
    $post_tag_lists[] = strtolower($parent_post_data->post_name);
    }
    }
    
    //echo "hello".$nav_menu;
    //return "<div class='jik'>".$nav_menu."</div>";
    //print_r($post_tag_lists);
    
    //print_r($sorted_menu_items);
    
    if($sorted_menu_items){
        foreach($sorted_menu_items as $key => $value){
            $val_title = strtolower($value->title);
            if(in_array($val_title,$post_tag_lists) && !is_home())
            $sorted_menu_items[$key]->classes[] = "current-menu-item";
        }
    }
    //print_r($sorted_menu_items);
    return $sorted_menu_items;
}

add_action( 'customize_preview_init', 'northernbeat_customize_preview_js' );

add_post_type_support( 'page', 'excerpt' );

add_filter( 'wp_nav_menu_objects', "northernbeat_menu_mod", 3 );
