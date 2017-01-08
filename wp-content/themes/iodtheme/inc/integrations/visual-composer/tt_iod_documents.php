<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */
function tt_iod_documents_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Documents block", 'iodtheme'),
			"base" => "tt_iod_documents_shortcode",
			'description' => esc_html__( 'Document brochure block', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Team member image', 'iodtheme' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Document name', 'iodtheme' ),
                    'param_name' => 'name',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter document name', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Document link', 'iodtheme' ),
                    'param_name' => 'link',
                    'value' => '',
                    'description' => esc_html__( 'Enter document link', 'iodtheme' )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__( 'Css', 'iodtheme' ),
                    'param_name' => 'css',
                    'group' => esc_html__( 'Design options', 'iodtheme' ),
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
add_action( 'vc_before_init', 'tt_iod_documents_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_documents_shortcode extends WPBakeryShortCode {
	}
}