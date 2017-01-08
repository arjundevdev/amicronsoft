<?php
/*
 * Templatation.com
 *
 * Banner with label slider for VC
 *
 */

function tt_iod_brands_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => esc_html__( 'Brands' , 'iodtheme' ),
            'base'                    => 'tt_iod_brands_shortcode',
            'description'             => esc_html__( 'Brands images', 'iodtheme' ),
            'as_parent'               => array('only' => 'tt_iod_brands_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('IODtheme', 'iodtheme'),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_brands_fn_vc' );
// Nested Element
function tt_iod_brands_item_fn_vc() {
    vc_map(
        array(
            'name'            => esc_html__('Brands item', 'iodtheme'),
            'base'            => 'tt_iod_brands_item_shortcode',
            'description'     => esc_html__( 'Brands item', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_iod_brands_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Brand image 1', 'iodtheme' ),
                    'param_name' => 'image_1',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Link 1', 'iodtheme' ),
                    'param_name' => 'link_1',
                    'value' => '',
                    'description' => esc_html__( 'Please enter link', 'iodtheme' ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Brand image 2', 'iodtheme' ),
                    'param_name' => 'image_2',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Link 2', 'iodtheme' ),
                    'param_name' => 'link_2',
                    'value' => '',
                    'description' => esc_html__( 'Please enter link', 'iodtheme' ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Brand image 3', 'iodtheme' ),
                    'param_name' => 'image_3',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Link 3', 'iodtheme' ),
                    'param_name' => 'link_3',
                    'value' => '',
                    'description' => esc_html__( 'Please enter link', 'iodtheme' ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Brand image 4', 'iodtheme' ),
                    'param_name' => 'image_4',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Link 4', 'iodtheme' ),
                    'param_name' => 'link_4',
                    'value' => '',
                    'description' => esc_html__( 'Please enter link', 'iodtheme' ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Brand image 5', 'iodtheme' ),
                    'param_name' => 'image_5',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Link 5', 'iodtheme' ),
                    'param_name' => 'link_5',
                    'value' => '',
                    'description' => esc_html__( 'Please enter link', 'iodtheme' ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_brands_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_brands_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_iod_brands_item_shortcode extends WPBakeryShortCode {

    }
}