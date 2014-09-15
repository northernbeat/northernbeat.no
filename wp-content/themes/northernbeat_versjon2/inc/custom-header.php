<?php

/**

 * Implements an optional custom header for Northernbeat.

 * See http://codex.wordpress.org/Custom_Headers

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Northernbeat 1.0

 */



/**

 * Sets up the WordPress core custom header arguments and settings.

 *

 * @uses add_theme_support() to register support for 3.4 and up.

 * @uses northernbeat_header_style() to style front-end.

 * @uses northernbeat_admin_header_style() to style wp-admin form.

 * @uses northernbeat_admin_header_image() to add custom markup to wp-admin form.

 *

 * @since Northernbeat 1.0

 */

function northernbeat_custom_header_setup() {

	$args = array(

		// Text color and image (empty to use none).

		'default-text-color'     => '444',

		'default-image'          => '',



		// Set height and width, with a maximum value for the width.

		'height'                 => 250,

		'width'                  => 960,

		'max-width'              => 2000,



		// Support flexible height and width.

		'flex-height'            => true,

		'flex-width'             => true,



		// Random image rotation off by default.

		'random-default'         => false,



		// Callbacks for styling the header and the admin preview.

		'wp-head-callback'       => 'northernbeat_header_style',

		'admin-head-callback'    => 'northernbeat_admin_header_style',

		'admin-preview-callback' => 'northernbeat_admin_header_image',

	);



	add_theme_support( 'custom-header', $args );

}

add_action( 'after_setup_theme', 'northernbeat_custom_header_setup' );



/**

 * Styles the header text displayed on the blog.

 *

 * get_header_textcolor() options: 444 is default, hide text (returns 'blank'), or any hex value.

 *

 * @since Northernbeat 1.0

 */

function northernbeat_header_style() {

	$text_color = get_header_textcolor();



	// If no custom options for text are set, let's bail

	if ( $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )

		return;



	// If we get this far, we have custom styles.

	?>

	<style type="text/css">

	<?php

		// Has the text been hidden?

		if ( ! display_header_text() ) :

	?>

	

	<?php

		// If the user has set a custom color for the text, use that.

		else :

	?>

	<?php endif; ?>

	</style>

	<?php

}



/**

 * Styles the header image displayed on the Appearance > Header admin panel.

 *

 * @since Northernbeat 1.0

 */

function northernbeat_admin_header_style() {

?>

	</style>

<?php

}



/**

 * Outputs markup to be displayed on the Appearance > Header admin panel.

 * This callback overrides the default markup displayed there.

 *

 * @since Northernbeat 1.0

 */

function northernbeat_admin_header_image() {

	?>

	

<?php }