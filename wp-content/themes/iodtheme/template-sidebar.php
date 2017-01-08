<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
/**
 * Template Name: Page with sidebar
 *
 * This page has no sidebar.
 *
 */

 get_header();

?>
<!-- MAIN CONTENT BLOCK -->

<?php do_action( 'tt_before_mainblock' ); ?>
<div id="content" class="content mainblock">

	<?php do_action( 'tt_before_container' ); ?>

	<div class="container">
		<?php do_action( 'tt_after_container_start' ); ?>
		<div class="row">
			<div class="col-md-8">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; endif; ?>
			</div>
          <!-- Side Bar -->
          <div class="col-md-4">
	         <?php get_sidebar(); ?>
          </div>
		</div>
		<!-- commments -->
         <?php if ( comments_open() ) { comments_template( '', true ); } ?>


	</div> <!-- ./container -->
</div>

<?php get_footer(); ?>