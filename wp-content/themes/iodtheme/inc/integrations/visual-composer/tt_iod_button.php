<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Button for VC *
 */

function tt_iod_button_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Button", 'iodtheme'),
			"base" => "tt_iod_button_shortcode",
			'description' => esc_html__( 'Button styled for theme.', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Text button', 'iodtheme' ),
                    'param_name'  => 'title',
                    'admin_label' => true,
                    'value'       => '',
					'description' => esc_html__( 'Enter button text', 'iodtheme' ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Button link', 'iodtheme' ),
                    'param_name'  => 'link',
                    'value'       => '',
					'description' => esc_html__( 'Enter button link', 'iodtheme' ),
                ),
                array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => esc_html__("Text button color",'iodtheme'),
					"param_name" => "txt_color",
					"value" => "",
			    ),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => esc_html__("Icon color",'iodtheme'),
					"param_name" => "txt_color2",
					"value" => "",
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Button main background color', 'iodtheme' ),
					'param_name'  => 'btn_bg',
					'value'       => '',
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Button second background color', 'iodtheme' ),
					'param_name'  => 'btn_bg2',
					'value'       => '',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Button alignment', 'iodtheme' ),
					'value' => array(
						esc_html__( 'Left', 'iodtheme' ) => 'left',
						esc_html__( 'Center', 'iodtheme' ) => 'center',
						esc_html__( 'Right', 'iodtheme' ) => 'right',
					),
					'param_name' => 'buttonalign'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'iodtheme' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'iodtheme' ),
				),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_iod_button_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_button_shortcode extends WPBakeryShortCode {
	}
}