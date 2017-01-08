<?php
/*
 * Templatation.com
 *
 * Banner with label slider for VC
 *
 */

function tt_iod_slider_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => esc_html__( 'Presentation slider' , 'iodtheme' ),
            'base'                    => 'tt_iod_slider_shortcode',
            'description'             => esc_html__( 'Slider with images and description', 'iodtheme' ),
            'as_parent'               => array('only' => 'tt_iod_slider_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('IODtheme', 'iodtheme'),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_slider_fn_vc' );
// Nested Element
function tt_iod_slider_item_fn_vc() {
    vc_map(
        array(
            'name'            => esc_html__('Slider item', 'iodtheme'),
            'base'            => 'tt_iod_slider_item_shortcode',
            'description'     => esc_html__( 'Presentation slider item', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_iod_slider_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Slider image', 'iodtheme' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_slider_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_slider_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_iod_slider_item_shortcode extends WPBakeryShortCode {

    }
}