<?php

/**

 * The template for displaying Comments.

 *

 */

if ( post_password_required() )

	return;

?>
<section>
<div class="block main divider icon">
<div class="wrapper normal">
<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">

			<?php

				printf( _n( 'En kommentar om &ldquo;%2$s&rdquo;', '%1$s kommentarer om &ldquo;%2$s&rdquo;', get_comments_number(), 'northernbeat' ),

					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );

			?>

		</h2>
		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'northernbeat_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">

			<h1 class="assistive-text section-heading"><?php _e( 'Kommentarer', 'northernbeat' ); ?></h1>

			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Eldre kommentarer', 'northernbeat' ) ); ?></div>

			<div class="nav-next"><?php next_comments_link( __( 'Nyere kommentarer &rarr;', 'northernbeat' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
		<?php

		/* If there are no comments and comments are closed, let's leave a note.

		 * But we only want the note on posts and pages that had comments in the first place.

		 */

		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'northernbeat' ); ?></p>
		<?php endif; ?>
	<?php endif; // have_comments() ?>
	<?php comment_form(); ?>
    
</div><!-- #comments .comments-area -->

</div><!-- end wrapper normal -------->
</div><!-- devider icon -------->
</section>