<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */

function tt_iod_price_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Pricing plan", 'iodtheme'),
			"base" => "tt_iod_price_shortcode",
			'description' => esc_html__( 'Pricing plan box', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name plan', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter pricing plane name', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Price plan', 'iodtheme' ),
                    'param_name' => 'price',
                    'value' => '',
                    'description' => esc_html__( 'Enter price', 'iodtheme' )
                ),
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__( 'Detail plan', 'iodtheme' ),
                    'param_name' => 'content',
                    'value' => '',
                    'description' => esc_html__( 'Please create bulleted list', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Text btn', 'iodtheme' ),
                    'param_name' => 'text',
                    'value' => '',
                    'description' => esc_html__( 'Enter text button', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Link btn', 'iodtheme' ),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__( 'Enter link button', 'iodtheme' )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__( 'Css', 'iodtheme' ),
                    'param_name' => 'css',
                    'group' => esc_html__( 'Design options', 'iodtheme' ),
                ),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_iod_price_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_price_shortcode extends WPBakeryShortCode {
	}
}