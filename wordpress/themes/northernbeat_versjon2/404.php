<?php get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <article id="post-0" class="post error404 no-results not-found">
      <section>
        <div class="block intro divider icon">
          <h1 class="entry-title"><?php _e( 'Nothing Found...', 'northernbeat' ); ?></h1>
        </div>
      </section>
      <section>
        <div class="block main divider icon">
          <div class="wrapper normal">
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'northernbeat' ); ?></p>
            
			<?php get_search_form(); ?>
		  </div><!-- .entry-content -->
        </div>
      </section>
	</article><!-- #post-0 -->
  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
