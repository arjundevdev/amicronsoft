<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Team for VC
 *
 */
function tt_iod_team_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Team", 'iodtheme'),
			"base" => "tt_iod_team_shortcode",
			'description' => esc_html__( 'Different types of team member block.', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Select type of portfolio', 'iodtheme' ),
                    'param_name'  => 'team_type',
                    'value'       => array(
                        'Image top'  =>  'type_1',
                        'Image left'  =>  'type_2',
                    )
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Team member image', 'iodtheme' ),
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
                    'description' => esc_html__( 'Team member name.', 'iodtheme' )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Position', 'iodtheme' ),
                    'param_name' => 'position',
                    'value' => '',
                    'description' => esc_html__( 'Team member position.', 'iodtheme' )
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Description', 'iodtheme' ),
                    'param_name' => 'description',
                    'value' => '',
                    'description' => esc_html__( 'Team member detail text.', 'iodtheme' )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Facebook', 'iodtheme' ),
                    'param_name'  => 'social_fb',
                    'value'       => '',
                    'description' => esc_html__( 'Enter facebook social link url.', 'iodtheme' ),
                    'group'       => 'Social URL'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Linkedin', 'iodtheme' ),
                    'param_name'  => 'social_li',
                    'value'       => '',
                    'description' => esc_html__( 'Enter linkedin social link url.', 'iodtheme' ),
                    'group'       => 'Social URL'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Twitter', 'iodtheme' ),
                    'param_name'  => 'social_tw',
                    'value'       => '',
                    'description' => esc_html__( 'Enter twitter social link url.', 'iodtheme' ),
                    'group'       => 'Social URL'
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Google', 'iodtheme' ),
                    'param_name'  => 'social_google',
                    'value'       => '',
                    'description' => esc_html__( 'Enter google social link url.', 'iodtheme' ),
                    'group'       => 'Social URL'
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
add_action( 'vc_before_init', 'tt_iod_team_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_team_shortcode extends WPBakeryShortCode {
	}
}