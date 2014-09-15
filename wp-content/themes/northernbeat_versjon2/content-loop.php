<?php
/**
 * The template used for displaying page content in page.php
 **/

?>
<div class="textbox third">
	<div class="wrapper image">
		<a href="<?php the_permalink(); ?>"><?php $post_id = get_the_ID(); echo northernbeat_post_auto_thumbnail($post_id); ?></a>
	</div>
	<div class="wrapper text">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php the_excerpt(); ?></p>
	</div>
</div>