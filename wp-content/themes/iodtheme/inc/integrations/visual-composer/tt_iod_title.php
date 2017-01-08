<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */


function tt_iod_title_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Title block", 'iodtheme'),
			"base" => "tt_iod_title_shortcode",
			'description' => esc_html__( 'Title block with subtitle', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Title position', 'iodtheme' ),
                    'param_name'  => 'alignment',
                    'value'       => array(
                        'Center'  =>  'text-center',
                        'Left'  =>  'text-left',
                        'Right'  =>  'text-right',
                    )
                ),
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Title transform', 'iodtheme' ),
                    'param_name'  => 'transform',
                    'value'       => array(
                        'Uppercase'  =>  'text-uppercase',
                        'Normal'  =>  'text-normal',
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter title name', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title size', 'iodtheme' ),
                    'param_name' => 'title_size',
                    'value' => '',
                    'description' => esc_html__( 'Title size, only number', 'iodtheme' )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__( 'Css', 'iodtheme' ),
                    'param_name' => 'css',
                    'group' => esc_html__( 'Design options', 'iodtheme' ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Title  color",'iodtheme'),
                    "param_name" => "title_color",
                    "value" => "",
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => esc_html__( 'Show subtitle?', 'iodtheme' ),
                    'param_name' => 'show_sb',
                    'value'      => array( esc_html__( 'Yes, please', 'iodtheme' ) => 'yes' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Subtitle', 'iodtheme' ),
                    'param_name' => 'sbtitle',
                    'value' => '',
                    'description' => esc_html__( 'Ente subtitle text', 'iodtheme' ),
                    'dependency' => array(
                        'element' => 'show_sb',
                        'value' => 'yes'
                    ),
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Subtitle  color",'iodtheme'),
                    "param_name" => "sbtitle_color",
                    "value" => "",
                    'dependency' => array(
                        'element' => 'show_sb',
                        'value' => 'yes'
                    ),
                ),
                array(
                    'type'       => 'checkbox',
                    'heading'    => esc_html__( 'Show suptitle?', 'iodtheme' ),
                    'param_name' => 'show_sp',
                    'value'      => array( esc_html__( 'Yes, please', 'iodtheme' ) => 'yes' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Suptitle', 'iodtheme' ),
                    'param_name' => 'sptitle',
                    'value' => '',
                    'description' => esc_html__( 'Enter suptitle text', 'iodtheme' ),
                    'dependency' => array(
                        'element' => 'show_sp',
                        'value' => 'yes'
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Suptitle  color",'iodtheme'),
                    "param_name" => "sptitle_color",
                    "value" => "",
                    'dependency' => array(
                        'element' => 'show_sp',
                        'value' => 'yes'
                    ),
                ),
			)
		)
	);
	
}
add_action( 'vc_before_init', 'tt_iod_title_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_title_shortcode extends WPBakeryShortCode {
	}
}