<?php get_header(); ?>
<!-- MAIN CONTENT BLOCK -->
<div id="content" class="content mainblock">
    <div class="blog blog-pages">
	    <div class="container">
		<?php do_action( 'tt_after_container_start' ); ?>
		<div class="row">

            <div class="col-md-8">
				<h1 class="section-title page-title"><?php esc_html_e( 'Search Results For: ', 'iodtheme' ); echo the_search_query(); ?></h1>
				<div class="blog-block">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; else : ?>

				<div class="align-center"><?php esc_html_e( 'We could not find anything for the search term: ', 'iodtheme' ); echo the_search_query(); ?></div>

				<?php endif; ?>
				</div>
			</div>

	        <!-- Side Bar -->
	        <div class="col-md-4">
		       <?php get_sidebar(); ?>
	        </div>
		</div>

	</div>
	</div>
</div>

<?php get_footer(); ?>