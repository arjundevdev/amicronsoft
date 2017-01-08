<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * @author 	templatation.com
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
?>
		<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 *
		 */
		do_action( 'woocommerce_before_main_content' );
		?>

<div class="container">
	<div class="row">
		 <!-- Side Bar -->
		 <div class="col-md-4">
	         <?php get_sidebar('shop'); ?>
	     </div>
		 <!-- Content -->
		 <div class="col-md-8">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h2 class="ml-title"><?php woocommerce_page_title(); ?></h2>

			<?php endif; ?>

			<?php
				/**
				 * woocommerce_archive_description hook
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
			?>

			<?php

			get_template_part('inc/templates/products-archive');

			?>

		</div>
	</div>
</div>

		<?php
			/**
			 * woocommerce_after_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

<?php get_footer( 'shop' ); ?>
