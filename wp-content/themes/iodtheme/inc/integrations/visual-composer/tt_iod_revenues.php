<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */
function tt_iod_revenues_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Revenues", 'iodtheme'),
			"base" => "tt_iod_revenues_shortcode",
			'description' => esc_html__( 'Report information', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Report image', 'iodtheme' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter report title', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Date', 'iodtheme' ),
                    'param_name' => 'date',
                    'value' => '',
                    'description' => esc_html__( 'Enter report date', 'iodtheme' )
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Date color",'iodtheme'),
                    "param_name" => "date_color",
                    "value" => "",
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Text', 'iodtheme' ),
                    'param_name' => 'text',
                    'value' => '',
                    'description' => esc_html__( 'Enter report text', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                        'heading' => esc_html__( 'Link for download', 'iodtheme' ),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__( 'Enter link for download', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Button text', 'iodtheme' ),
                    'param_name' => 'text_btn',
                    'value' => '',
                    'description' => esc_html__( 'Enter button text', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Extra class name', 'iodtheme' ),
                    'param_name' => 'el_class',
                    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'iodtheme' ),
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
add_action( 'vc_before_init', 'tt_iod_revenues_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_revenues_shortcode extends WPBakeryShortCode {
	}
}