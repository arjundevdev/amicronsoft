<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

function tt_iod_team_gallery_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Team gallery", 'iodtheme'),
			"base" => "tt_iod_team_gallery_shortcode",
			'description' => esc_html__( 'Gallery items', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
				array(
					'type'      => 'dropdown',
					'heading'     => esc_html__( 'Select type of portfolio', 'iodtheme' ),
					'param_name'  => 'team_type',
					'value'       => array(
						'2 columns'  =>  'type_1',
						'3 columns'  =>  'type_2',
						'4 columns'  =>  'type_3',
					)
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Amount', 'iodtheme' ),
					'param_name' => 'amount',
					'value' => '',
					'admin_label' => true,
					'description' => esc_html__( 'Enter amount items on page', 'iodtheme' )
				),
			)
		)
	);
}

add_action( 'vc_before_init', 'tt_iod_team_gallery_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_team_gallery_shortcode extends WPBakeryShortCode {
	}
}