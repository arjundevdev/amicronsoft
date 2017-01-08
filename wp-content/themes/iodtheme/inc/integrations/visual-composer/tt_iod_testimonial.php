<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */
function tt_iod_testimonial_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Testimonial", 'iodtheme'),
			"base" => "tt_iod_testimonial_shortcode",
			'description' => esc_html__( 'Testimonial information', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Author', 'iodtheme' ),
                    'param_name' => 'name',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter testimonial author', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Position', 'iodtheme' ),
                    'param_name' => 'position',
                    'value' => '',
                    'description' => esc_html__( 'Enter testimonial author position', 'iodtheme' )
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Testimonial text', 'iodtheme' ),
                    'param_name' => 'description',
                    'value' => '',
                    'description' => esc_html__( 'Enter testimonial text', 'iodtheme' )
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
add_action( 'vc_before_init', 'tt_iod_testimonial_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_testimonial_shortcode extends WPBakeryShortCode {
	}
}