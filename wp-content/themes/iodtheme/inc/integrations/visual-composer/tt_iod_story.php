<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */
function tt_iod_story_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Story", 'iodtheme'),
			"base" => "tt_iod_story_shortcode",
			'description' => esc_html__( 'Story information', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Story image', 'iodtheme' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Name', 'iodtheme' ),
                    'param_name' => 'name',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter story name', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__( 'Enter story title', 'iodtheme' )
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Text', 'iodtheme' ),
                    'param_name' => 'text',
                    'value' => '',
                    'description' => esc_html__( 'Enter story text', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                        'heading' => esc_html__( 'Link', 'iodtheme' ),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__( 'Enter link', 'iodtheme' )
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
add_action( 'vc_before_init', 'tt_iod_story_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_story_shortcode extends WPBakeryShortCode {
	}
}