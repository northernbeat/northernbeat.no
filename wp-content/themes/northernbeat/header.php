<?php

/**

 * The Header for our theme.

 *

 */


?><!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="no"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="no"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="no"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="no"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="no"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head id="www.northernbeat.no" data-template-set="html5-reset">
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>"/>
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

$attachment_id = get_post_thumbnail_id(); // attachment ID

$image_attributes = wp_get_attachment_image_src( $attachment_id, full ); // returns an array

} 

else
  {
$image_attributes = "http://www.northernbeat.no/wp-content/themes/northernbeat/images/logo.png";
}
?>
<meta property="og:image" content="<?php echo $image_attributes[0]; ?>"/>
<meta property="og:site_name" content="Northern Beat"/>

<meta name="google-site-verification" content="">
<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
<meta name="author" content="Northern Beat">
<meta name="Copyright" content="Copyright Northern Beat 2013. All Rights Reserved.">
<!-- Dublin Core Metadata : http://dublincore.org/ -->
<meta name="DC.title" content="Northern Beat"/>
<meta name="DC.subject" content="Vi skaper nettsider som engasjerer, konverterer og begeistrer."/>
<meta name="DC.creator" content="Kristian Harding Hansen."/>
<!--  Mobile Viewport Fix
	j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag 
	device-width : Occupy full width of the screen in its current orientation
	initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
	maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width
	-->
<!-- Uncomment to use; use thoughtfully!-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'/>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/idangerous.swiper-1.5.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

<!--[if lt IE 9]>

<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

<![endif]-->

<?php wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-1.7.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>

</head>



<body id="program">
       <section <?php if(is_home()): echo "class=\"masthead\""; endif; ?>>
	    <header id="pageTop" class="block">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"  rel="home"><img id="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Northernbeat"/></a>
        <a id="menuButton">Meny</a>
		<nav>
         <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'clearfix' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php $header_image = get_header_image();

		if ( ! empty( $header_image ) ) : ?>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

		<?php endif; ?>

	</header><!-- #masthead -->
    <?php if(!is_home()):  ?></section><?php  endif; ?>


	<!--<div id="main" class="wrapper">-->