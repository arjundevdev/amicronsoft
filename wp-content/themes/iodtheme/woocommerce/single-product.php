<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

global $product, $woocommerce_loop;

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
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>
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
