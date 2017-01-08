<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */

function tt_iod_contact_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Contact box", 'iodtheme'),
			"base" => "tt_iod_contact_shortcode",
			'description' => esc_html__( 'Contact information', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__( 'Contact info', 'iodtheme' ),
                    'param_name' => 'content',
                    'value' => '',
                    'description' => esc_html__( 'Contact info', 'iodtheme' )
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Name', 'iodtheme' ),
					'param_name' => 'name',
					'admin_label' => true,
					'value' => '',
					'description' => esc_html__( 'Please contact name, for example "USA', 'iodtheme' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Phone', 'iodtheme' ),
					'param_name' => 'phone',
					'value' => '',
					'description' => esc_html__( 'Please enter phone number', 'iodtheme' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Email', 'iodtheme' ),
					'param_name' => 'email',
					'value' => '',
					'description' => esc_html__( 'Please enter email', 'iodtheme' ),
				),
			)
		)
	);
}

add_action( 'vc_before_init', 'tt_iod_contact_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_contact_shortcode extends WPBakeryShortCode {
	}
}