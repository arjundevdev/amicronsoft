<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

function tt_iod_portfolio_fn_vc() {
	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Portfolio", 'iodtheme'),
			"base" => "tt_iod_portfolio_shortcode",
			'description' => esc_html__( 'Portfolio items', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Select type of portfolio', 'iodtheme' ),
                    'param_name'  => 'gallery_type',
                    'value'       => array(
                        'Three columns'  =>  'type_1',
                        'Masonry type'  =>  'type_2',
                    )
                ),
				array(
					'type'        => 'textfield',
					'heading'     => 'Select Categories',
					'param_name'  => 'cats',
					'std'         => '',
					'description' => 'Please write ID categories separated by commas, for example 22,3,85',
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

add_action( 'vc_before_init', 'tt_iod_portfolio_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_portfolio_shortcode extends WPBakeryShortCode {
	}
}