<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */


function tt_iod_post_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Related post", 'iodtheme'),
			"base" => "tt_iod_post_shortcode",
			'description' => esc_html__( 'Related post', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array (
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Amount', 'iodtheme' ),
					'param_name' => 'amount',
					'value' => '',
					'admin_label' => true,
					'description' => esc_html__( 'Enter amount items on page', 'iodtheme' )
				),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_iod_post_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_post_shortcode extends WPBakeryShortCode {
	}
}