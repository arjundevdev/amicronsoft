<?php
/*
 * Templatation.com
 *
 * Banner with label detail for VC
 *
 */

function tt_iod_history_fn_vc() {
    vc_map(
        array(
            "icon" => 'tt-vc-block',
            'name'                    => esc_html__( 'History' , 'iodtheme' ),
            'base'                    => 'tt_iod_history_shortcode',
            'description' => esc_html__( 'History information', 'iodtheme' ),
            'as_parent'               => array('only' => 'tt_iod_history_item_shortcode'),
            'content_element'         => true,
            "js_view" => 'VcColumnView',
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'params' => array(
                array(
                    'type' => 'param_group',
                    'heading' => esc_html__( 'Years', 'iodtheme' ),
                    'param_name' => 'tabs',
                    'group' => 'Year',
                    'params' => array(
                        array(
                            'type'        => 'textfield',
                            'heading'     => esc_html__( 'Year', 'iodtheme' ),
                            'param_name'  => 'year',
                            'value'       => '',
                            'admin_label' => true,
                            'description' => esc_html__( 'Please enter year', 'iodtheme' ),
                        ),
                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    )
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_history_fn_vc' );

function tt_iod_history_item_fn_vc() {
    vc_map(
        array(
            'name'            => esc_html__('History  item', 'iodtheme'),
            'base'            => 'tt_iod_history_item_shortcode',
            'description'     => esc_html__( 'History content', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
            'content_element' => true,
            'as_child'        => array('only' => 'tt_iod_history_shortcode'), // Use only|except attributes to limit parent (separate multiple values with comma)
            'params'          => array(
                array(
                    'type' => 'textarea_html',
                    'heading' => esc_html__( 'Content info', 'iodtheme' ),
                    'param_name' => 'content',
                    'value' => '',
                    'description'     => esc_html__( 'Please enter history content', 'iodtheme' ),
                ),
            ),
        )
    );
}
add_action( 'vc_before_init', 'tt_iod_history_item_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_history_shortcode extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_tt_iod_history_item_shortcode extends WPBakeryShortCode {

    }
}