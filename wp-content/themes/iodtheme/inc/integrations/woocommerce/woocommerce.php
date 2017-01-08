<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* This theme supports WooCommerce, woo! */
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

// Remove WC breadcrumb (we're using the Yoast SEO)
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// remove page title
/*add_filter('woocommerce_show_page_title', 'woo_hide_page_title');
function woo_hide_page_title() { return (!iodtheme_fw_get_option('enable_shoptitle', '0')) ? false : true; }*/

/*-----------------------------------------------------------------------------------*/
/* Layout */
/*-----------------------------------------------------------------------------------*/

// Adjust markup on all woocommerce pages
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'iodtheme_woocommerce_theme_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'iodtheme_woocommerce_theme_after_content', 20 );


if ( ! function_exists( 'iodtheme_woocommerce_theme_before_content' ) ) {
	function iodtheme_woocommerce_theme_before_content() {
		do_action( 'tt_before_mainblock' ); ?>
		<div id="content" class="content shop mainblock">
	    <?php
	} // End iodtheme_woocommerce_theme_before_content()
}


if ( ! function_exists( 'iodtheme_woocommerce_theme_after_content' ) ) {
	function iodtheme_woocommerce_theme_after_content() {
		?>
		</div>
	    <?php
	} // End iodtheme_woocommerce_theme_after_content()
}


// remove unwanted woocommerce actions.
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


// Modify cart page image size.
if ( ! function_exists( 'iodtheme_fw_cart_thumb' ) ) {
	function iodtheme_fw_cart_thumb( $thumb, $cart_item, $cart_item_key ) {

		$thumb1 = iodtheme_tt_post_thumb( '70', '65', false, false, '', $cart_item['product_id'] );
		return $thumb1;

	}

	add_filter( 'woocommerce_cart_item_thumbnail', 'iodtheme_fw_cart_thumb', 10, 3 );
}


// Change pagination arrow.
add_filter( 'woocommerce_pagination_args', 'iodtheme_fw_wc_pagination_args' );
function iodtheme_fw_wc_pagination_args( $args ) {
	$args['prev_text'] = '&lt;';
	$args['next_text'] = '&gt;';
	return $args;
}
