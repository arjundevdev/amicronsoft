<?php
/*
 * Templatation.com
 *
 * Banner with label slider for VC
 *
 */

function tt_iod_banner_slider_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => esc_html__( 'Banner slider' , 'iodtheme' ),
            'base'                    => 'tt_iod_banner_slider_shortcode',
            'description'             => esc_html__( 'Slider with images and title', 'iodtheme' ),
            'as_parent'               => array('only' => 'tt_iod_banner_slider_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('IODtheme', 'iodtheme'),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_banner_slider_fn_vc' );
// Nested Element
function tt_iod_banner_slider_item_fn_vc() {
    vc_map(
        array(
            'name'            => esc_html__('Slider item', 'iodtheme'),
            'base'            => 'tt_iod_banner_slider_item_shortcode',
            'description'     => esc_html__( 'Banner slider item', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_iod_banner_slider_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Slider image', 'iodtheme' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'iodtheme' ),
                    'param_name' => 'title',
                    'value' => '',
                    'admin_label' => true,
                    'description' => esc_html__( 'Enter title name', 'iodtheme' )
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Title  color",'iodtheme'),
                    "param_name" => "title_color",
                    "value" => "",
                ), array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Subtitle', 'iodtheme' ),
                    'param_name' => 'sbtitle',
                    'value' => '',
                    'description' => esc_html__( 'Ente subtitle text', 'iodtheme' ),
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Subtitle  color",'iodtheme'),
                    "param_name" => "sbtitle_color",
                    "value" => "",
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Text button', 'iodtheme' ),
                    'param_name'  => 'text_btn',
                    'value'       => '',
                    'description' => esc_html__( 'Enter button text', 'iodtheme' ),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Button link', 'iodtheme' ),
                    'param_name'  => 'link',
                    'value'       => '',
                    'description' => esc_html__( 'Enter button link', 'iodtheme' ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_banner_slider_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_banner_slider_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_iod_banner_slider_item_shortcode extends WPBakeryShortCode {

    }
}