<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Map for VC
 *
 */
function tt_iod_map_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Map", 'iodtheme'),
			"base" => "tt_iod_map_shortcode",
			'description' => esc_html__( 'Google map', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Select image marker', 'iodtheme' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image marker from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => esc_html__( 'Enter map title', 'iodtheme' )
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Gmaps latitude', 'iodtheme' ),
                    'param_name' => 'lat',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter map latitude', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Gmaps longitude', 'iodtheme' ),
                    'param_name' => 'lon',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter map longitude', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Zoom', 'iodtheme' ),
                    'param_name' => 'zoom',
                    'value' => '',
                    'description' => esc_html__( 'Enter map zoom in number 0-18', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Height', 'iodtheme' ),
                    'param_name' => 'height',
                    'value' => '',
                    'description' => esc_html__( 'Enter map height in number, default 380px', 'iodtheme' )
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
add_action( 'vc_before_init', 'tt_iod_map_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
    class WPBakeryShortCode_tt_iod_map_shortcode extends WPBakeryShortCode {
    }
}