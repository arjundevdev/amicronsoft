<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The main template file.
 *
 * Works as index and fallback.
 *
 */

 get_header();

?>
<!-- MAIN CONTENT BLOCK -->
<div id="content" class="content mainblock">
    <div class="blog blog-pages padding-top-70 padding-bottom-70">
	<div class="container">
		<?php do_action( 'tt_after_container_start' ); ?>
		<div class="row">

			<div class="col-md-8">

			<?php
				if ( is_category() ) {
					$title = single_cat_title( '', false );
				} elseif ( is_tag() ) {
					$title = single_tag_title( '', false );
				} elseif ( is_author() ) {
					$title = get_the_author();
				} elseif ( is_year() ) {
					$title = get_the_date( 'Y' );
				} elseif ( is_month() ) {
					$title = get_the_date( 'F Y' );
				} elseif ( is_day() ) {
					$title = get_the_date( 'F j, Y' );
				} elseif ( is_post_type_archive() ) {
					$title = post_type_archive_title( '', false );
				} elseif ( is_tax() ) {
					$tax = get_taxonomy( get_queried_object()->taxonomy );
					$title = $tax->labels->singular_name . ' ' . single_term_title( '', false );
				} elseif ( is_search() ) {
					$title = get_the_title( $post_id ) . ' ' . get_search_query();
				} else {
					$title = esc_html__( 'Archives', 'iodtheme' );
				}
			?>

			<h1 class="page-title"><?php print esc_attr($title); ?></h1>
			<?php iodtheme_tt_archive_desc(); ?>
			<div class="blog-block">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; else : ?>

				<!-- no posts -->

			<?php endif; ?>
			</div>
			</div>
          <div class="col-md-4">
	         <?php get_sidebar(); ?>
          </div>
		</div>

	</div>
	</div>
</div>

<?php get_footer(); ?>