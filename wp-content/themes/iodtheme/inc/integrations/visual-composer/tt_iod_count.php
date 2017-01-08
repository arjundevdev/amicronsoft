<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */

function tt_iod_count_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Count box", 'iodtheme'),
			"base" => "tt_iod_count_shortcode",
			'description' => esc_html__( 'Counter box', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter counter name', 'iodtheme' )
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Title  color",'iodtheme'),
                    "param_name" => "txt_color",
                    "value" => "",
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Number', 'iodtheme' ),
                    'param_name' => 'number',
                    'value' => '',
                    'description' => esc_html__( 'Enter counter number', 'iodtheme' )
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Number  color",'iodtheme'),
                    "param_name" => "num_color",
                    "value" => "",
                ),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_iod_count_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_count_shortcode extends WPBakeryShortCode {
	}
}