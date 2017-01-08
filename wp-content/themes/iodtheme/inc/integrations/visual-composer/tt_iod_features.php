<?php
/*
 * Templatation.com
 *
 * Banner with label slider for VC
 *
 */

function tt_iod_features_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => esc_html__( 'Features' , 'iodtheme' ),
            'base'                    => 'tt_iod_features_shortcode',
            'description' => esc_html__( 'Features box', 'iodtheme' ),
            'as_parent'               => array('only' => 'tt_iod_features_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('IODtheme', 'iodtheme'),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_features_fn_vc' );
// Nested Element
function tt_iod_features_item_fn_vc() {
    vc_map(
        array(
            'name'            => esc_html__('Features list', 'iodtheme'),
            'base'            => 'tt_iod_features_item_shortcode',
            'description'     => esc_html__( 'Features list', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_iod_features_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type'      => 'dropdown',
                    'heading'     => esc_html__( 'Select style, right or left', 'iodtheme' ),
                    'param_name'  => 'fe_position',
                    'value'       => array(
                        'Left'  =>  'text-left',
                        'Right'  =>  'text-right',
                    )
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Title', 'iodtheme' ),
                    'param_name'  => 'title',
                    'value'       => '',
                    'description' => esc_html__( 'Enter features title', 'iodtheme' ),
                ),
                array(
                    'type'        => 'textarea',
                    'heading'     => esc_html__( 'Text', 'iodtheme' ),
                    'param_name'  => 'text',
                    'value'       => '',
                    'description' => esc_html__( 'Enter features text', 'iodtheme' ),
                ),
                array(
                    'type'        => 'iconpicker',
                    'heading'     => esc_html__( 'Type icon', 'iodtheme' ),
                    'param_name'  => 'type_icon',
                    'value'       => '',
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 300,
                    ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_features_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_features_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_iod_features_item_shortcode extends WPBakeryShortCode {

    }
}