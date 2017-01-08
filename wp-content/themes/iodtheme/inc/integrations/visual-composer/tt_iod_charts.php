<?php
/*
 * Templatation.com
 *
 * Banner with label slider for VC
 *
 */

function tt_iod_charts_fn_vc() {
    vc_map( array(
        "icon" => 'tt-vc-block',
        'name'                    => esc_html__( 'Charts' , 'iodtheme' ),
        'base'                    => 'tt_iod_charts_shortcode',
        'description'             => esc_html__( 'Charts', 'iodtheme' ),
        "category" => esc_html__('IODtheme', 'iodtheme'),
        'params' => array(
            array(
                'type'      => 'dropdown',
                'heading'     => esc_html__( 'Chart type', 'iodtheme' ),
                'param_name'  => 'char_type',
                'value'       => array(
                    'Monthly Average Temperature'  =>  'type_1',
                    'Revenu'  =>  'type_2',
                    'Areaspline'  =>  'type_3',
                    'Scatter'  =>  'type_4',
                    'USD to EUR'  =>  'type_5',
                    'Cart Historical'  =>  'type_6',
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'iodtheme' ),
                'param_name' => 'title',
                'value' => '',
                'admin_label' => true,
                'description' => esc_html__( 'Enter chart name', 'iodtheme' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'X-axis values', 'iodtheme' ),
                'param_name' => 'cats',
                'value' => '',
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_2', 'type_3') ),
                'description' => esc_html__( 'Enter values for axis (Note: separate values with ",").', 'iodtheme' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Text Y-axis', 'iodtheme' ),
                'param_name' => 'text_y',
                'value' => '',
                'description' => esc_html__( 'Enter text for Y-axis', 'iodtheme' ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_3') )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Tooltip suffix', 'iodtheme' ),
                'param_name' => 'suffix',
                'value' => '',
                'description' => esc_html__( 'Enter text for Y-axis', 'iodtheme' ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_3') )
            ),
            array(
                'type'      => 'dropdown',
                'heading'     => esc_html__( 'Legend layout', 'iodtheme' ),
                'param_name'  => 'layout_type',
                'value'       => array(
                    'Vertical'  =>  'vertical',
                    'Horizontal'  =>  'horizontal',
                ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_3', 'type_4') )
            ),
            array(
                'type'      => 'dropdown',
                'heading'     => esc_html__( 'Legend align', 'iodtheme' ),
                'param_name'  => 'align_type',
                'value'       => array(
                    'Left'  =>  'left',
                    'Right'  =>  'right',
                    'Center'  =>  'center',
                ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_3', 'type_4') )
            ),
            array(
                'type'      => 'dropdown',
                'heading'     => esc_html__( 'Legend vertical align', 'iodtheme' ),
                'param_name'  => 'vertical_type',
                'value'       => array(
                    'Middle'  =>  'middle',
                    'Top'  =>  'top',
                    'Bottom'  =>  'bottom',
                ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_3', 'type_4') )
            ),
            array(

                'type' => 'param_group',
                'heading' => esc_html__( 'Series', 'iodtheme' ),
                'param_name' => 'values',
                'group' => 'Series',
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_1', 'type_2', 'type_3', 'type_4') ),
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Series name', 'iodtheme' ),
                        'param_name'  => 'name',
                        'value'       => '',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter series name', 'iodtheme' ),
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Series data', 'iodtheme' ),
                        'param_name'  => 's_data',
                        'value'       => '',
                        'description' => esc_html__( 'Enter series data (Note: separate values with ",").', 'iodtheme' )
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__( 'Series color', 'iodtheme' ),
                        'param_name'  => 'color',
                        'value'       => '',
                    ),
                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                )
            ), array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Data url', 'iodtheme' ),
                'param_name'  => 'url',
                'value'       => '',
                'group' => 'Series',
                'description' => esc_html__( 'Enter url link with data', 'iodtheme' ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_5', 'type_6') ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Series name', 'iodtheme' ),
                'param_name'  => 's_name',
                'value'       => '',
                'group' => 'Series',
                'description' => esc_html__( 'Enter series name', 'iodtheme' ),
                'dependency'  => array( 'element' => 'char_type', 'value' => array('type_5', 'type_6') ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'iodtheme' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'iodtheme' ),
            ),
        ),
        'js_view' => 'VcIconElementView_Backend',
    ) );

}




add_action( 'vc_before_init', 'tt_iod_charts_fn_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_tt_iod_charts_shortcode extends WPBakeryShortCode {

    }
}

