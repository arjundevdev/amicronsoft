<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * @author 		templatation
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
		<?php
			/**
			 * woocommerce_before_single_product hook
			 *
			 * @hooked wc_print_notices - 10
			 */
			 do_action( 'woocommerce_before_single_product' );

			 if ( post_password_required() ) {
			    echo get_the_password_form();
			    return;
			 }
		?>

		<?php

		get_template_part('inc/templates/content-product-single');

		?>


<?php do_action( 'woocommerce_after_single_product' ); ?>
