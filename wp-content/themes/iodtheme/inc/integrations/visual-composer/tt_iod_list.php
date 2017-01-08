<?php
/*
 * Templatation.com
 *
 * Banner with label slider for VC
 *
 */

function tt_iod_list_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => esc_html__( 'List' , 'iodtheme' ),
            'base'                    => 'tt_iod_list_shortcode',
            'description' => esc_html__( 'List box', 'iodtheme' ),
            'as_parent'               => array('only' => 'tt_iod_list_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('IODtheme', 'iodtheme'),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_list_fn_vc' );
// Nested Element
function tt_iod_list_item_fn_vc() {
    vc_map(
        array(
            'name'            => esc_html__('Item list', 'iodtheme'),
            'base'            => 'tt_iod_list_item_shortcode',
            'description'     => esc_html__( 'Item list', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_iod_list_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Name item', 'iodtheme' ),
                    'param_name'  => 'title',
                    'value'       => '',
                    'description' => esc_html__( 'Enter list name', 'iodtheme' ),
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__( 'Item color', 'iodtheme' ),
                    'param_name'  => 'itemcolor',
                    'value'       => '',
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
                 array(
                     'type'        => 'colorpicker',
                     'heading'     => esc_html__( 'Icon color', 'iodtheme' ),
                     'param_name'  => 'iconcolor',
                     'value'       => '',
                 ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_list_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_list_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_iod_list_item_shortcode extends WPBakeryShortCode {

    }
}