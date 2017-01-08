<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 *
 */
function tt_iod_icon_box_fn_vc() {

	$target_arr = array(
		esc_html__( 'Same window', 'iodtheme' ) => '_self',
		esc_html__( 'New window', 'iodtheme' ) => '_blank',
	);

	vc_map(
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("Info Box", 'iodtheme'),
			"base" => "tt_iod_icon_box_shortcode",
			'description' => esc_html__( 'Info box with title, icon and desc.', 'iodtheme' ),
			"category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Insert Graphic", 'iodtheme'),
					'description' => esc_html__( 'Do you want to insert image or icon on this infobox.', 'iodtheme' ),
					"param_name" => "insert_graphic",
					"value" => array(
						'No' => 'no',
						'Image only' => 'image',
						'Icon only' => 'icon',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image source', 'iodtheme' ),
					'param_name' => 'source',
					'value' => array(
						esc_html__( 'Media library', 'iodtheme' ) => 'media_library',
						esc_html__( 'External link', 'iodtheme' ) => 'external_link',
						esc_html__( 'Featured Image', 'iodtheme' ) => 'featured_image',
					),
					'std' => 'media_library',
					'description' => esc_html__( 'Select image source.', 'iodtheme' ),
					'group' => 'Image',
					'dependency' => array(
						'element' => 'insert_graphic',
						'value' => array('image')
					),
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Image', 'iodtheme' ),
					'param_name' => 'image',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
					'dependency' => array(
						'element' => 'source',
						'value' => 'media_library',
					),
					'group' => 'Image',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'External link', 'iodtheme' ),
					'param_name' => 'custom_src',
					'description' => esc_html__( 'Select external link.', 'iodtheme' ),
					'dependency' => array(
						'element' => 'source',
						'value' => 'external_link',
					),
					'group' => 'Image',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'iodtheme' ),
					'param_name' => 'img_size',
					'value' => 'thumbnail',
					'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'iodtheme' ),
					'dependency' => array(
						'element' => 'source',
						'value' => array( 'media_library', 'featured_image' ),
					),
					'group' => 'Image',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image size', 'iodtheme' ),
					'param_name' => 'external_img_size',
					'value' => '',
					'description' => esc_html__( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'iodtheme' ),
					'dependency' => array(
						'element' => 'source',
						'value' => 'external_link',
					),
					'group' => 'Image',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image style', 'iodtheme' ),
					'param_name' => 'img_style',
					'value' => getVcShared( 'single image external styles' ),
					'description' => esc_html__( 'Select image display style.', 'iodtheme' ),
					'dependency' => array(
						'element' => 'source',
						'value' => array( 'media_library', 'featured_image' ),
					),
					'group' => 'Image',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Image style', 'iodtheme' ),
					'param_name' => 'external_style',
					'value' => getVcShared( 'single image external styles' ),
					'description' => esc_html__( 'Select image display style.', 'iodtheme' ),
					'dependency' => array(
						'element' => 'source',
						'value' => 'external_link',
					),
					'group' => 'Image',
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Border color', 'iodtheme' ),
					'param_name' => 'img_border_color',
					'value' => array_merge( getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'iodtheme' ) => 'custom' ) ),
					'std' => 'grey',
					'dependency' => array(
						'element' => 'img_style',
						'value' => array(
							'vc_box_border',
							'vc_box_border_circle',
							'vc_box_outline',
							'vc_box_outline_circle',
							'vc_box_border_circle_2',
							'vc_box_outline_circle_2',
						),
					),
					'description' => esc_html__( 'Border color.', 'iodtheme' ),
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => 'Image',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__( 'Custom color', 'iodtheme' ),
					'param_name' => 'img_border_cust_color',
					'description' => esc_html__( 'Select custom image border color.', 'iodtheme' ),
					'dependency' => array(
						'element' => 'img_border_color',
						'value' => 'custom',
					),
					'group' => 'Image'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Border color', 'iodtheme' ),
					'param_name' => 'external_border_color',
					'value' => getVcShared( 'colors' ),
					'std' => 'grey',
					'dependency' => array(
						'element' => 'external_style',
						'value' => array(
							'vc_box_border',
							'vc_box_border_circle',
							'vc_box_outline',
							'vc_box_outline_circle',
						),
					),
					'description' => esc_html__( 'Border color.', 'iodtheme' ),
					'param_holder_class' => 'vc_colored-dropdown',
					'group' => 'Image',
				),
				// backward compatibility. since 4.6
				array(
					'type' => 'hidden',
					'param_name' => 'img_link_large',
					'group' => 'Image',
					'dependency' => array(
						'element' => 'insert_graphic',
						'value' => array('image')
					),
				),

// icon params
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon library', 'iodtheme' ),
					'value' => array(
						esc_html__( 'Font Awesome', 'iodtheme' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'iodtheme' ) => 'openiconic',
						esc_html__( 'Typicons', 'iodtheme' ) => 'typicons',
						esc_html__( 'Entypo', 'iodtheme' ) => 'entypo',
						esc_html__( 'Linecons', 'iodtheme' ) => 'linecons',
					),
					'param_name' => 'type',
					'description' => esc_html__( 'Select icon library.', 'iodtheme' ),
					'group' => 'Icon',
					'dependency' => array(
						'element' => 'insert_graphic',
						'value' => array('icon')
					),
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'iodtheme' ),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-adjust', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon from library.', 'iodtheme' ),
					'group' => 'Icon'
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'iodtheme' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'openiconic',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'openiconic',
					),
					'description' => esc_html__( 'Select icon from library.', 'iodtheme' ),
					'group' => 'Icon'
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'iodtheme' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'typicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'iodtheme' ),
					'group' => 'Icon'
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'iodtheme' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'entypo',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'entypo',
					),
					'group' => 'Icon'
				),
				array(
					'type' => 'iconpicker',
					'heading' => esc_html__( 'Icon', 'iodtheme' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
					'settings' => array(
						'emptyIcon' => false, // default true, display an "EMPTY" icon?
						'type' => 'linecons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'type',
						'value' => 'linecons',
					),
					'description' => esc_html__( 'Select icon from library.', 'iodtheme' ),
					'group' => 'Icon'
				),
				array(
					'type'        => 'colorpicker',
					'heading' => esc_html__( 'Icon color', 'iodtheme' ),
					'param_name'  => 'icon_color',
					'value'       => '',
					'group' => 'Icon',
					'dependency' => array(
						'element' => 'insert_graphic',
						'value' => array('icon')
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Size', 'iodtheme' ),
					'param_name' => 'size',
					'value' => array_merge( getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
					'std' => 'md',
					'description' => esc_html__( 'Icon size.', 'iodtheme' ),
					'group' => 'Icon',
					'dependency' => array(
						'element' => 'insert_graphic',
						'value' => array('icon')
					),
				),
// end of Icon params
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Heading type", 'iodtheme'),
					'description' => esc_html__( 'This also determines the size of text for both heading/subheading. There is also SEO benefits of using heading tags. H1 is biggest in fontsize, and in important. Recommended/default: h4', 'iodtheme' ),
					"param_name" => "title_tag",
					"value" => array(
						'default' => 'default',
						'h1' => 'h1',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
						'div' => 'div',
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'iodtheme'),
					"description" => esc_html__("The above tag will wrap around this title.", 'iodtheme'),
					"param_name" => "title",
					"admin_label" => true,
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Title color', 'iodtheme' ),
					'param_name'  => 'title_color',
					'value'       => '',
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Title Text Weight", 'iodtheme'),
					'description' => esc_html__( 'Text weight for title tag', 'iodtheme' ),
					"param_name" => "title_weight",
					"value" => array(
						'Normal' => 'normal',
						'Bold' => 'bold',
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Title Text Transform", 'iodtheme'),
					'description' => esc_html__( 'Text transform for title tag. Recommended: none', 'iodtheme' ),
					"param_name" => "title_text_transform",
					"value" => array(
						'None' => 'none',
						'Capitalize' => 'capitalize',
						'Uppercase' => 'uppercase',
						'Lowercase' => 'lowercase',
					)
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__("Paragraph", 'iodtheme'),
					"description" => esc_html__("Paragraph for this info box. ", 'iodtheme'),
					"param_name" => "content",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Content Alignment", 'iodtheme'),
					"param_name" => "alignment",
					"value" => array(
						'Left' => 'left',
						'Center' => 'center',
						'Right' => 'right',
					)
				),


				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'Css', 'iodtheme' ),
					'param_name' => 'css',
					'group' => esc_html__( 'Design options', 'iodtheme' ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Show additional information?', 'iodtheme' ),
					'param_name' => 'show_link',
					'value'      => array( esc_html__( 'Yes, please', 'iodtheme' ) => 'yes' ),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Link', 'iodtheme' ),
					'param_name' => 'link',
					'value' => '',
					'description' => esc_html__( 'Enter service link', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes'
					),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'iodtheme' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'iodtheme' ),
				),

				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Additional align', 'iodtheme' ),
					'param_name' => 'add_align',
					"value" => array(
						'Left' => 'left',
						'Right' => 'right',
					),
					'description' => esc_html__( 'Enter additional title', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),

				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional title', 'iodtheme' ),
					'param_name' => 'add_title',
					'value' => '',
					'description' => esc_html__( 'Enter additional title', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Additional text', 'iodtheme' ),
					'param_name' => 'add_text',
					'value' => '',
					'description' => esc_html__( 'Enter additional text', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Additional image', 'iodtheme' ),
					'param_name' => 'add_image',
					'value' => '',
					'description' => esc_html__( 'Select image from media library.', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional button text 1', 'iodtheme' ),
					'param_name' => 'add_btn_1',
					'value' => '',
					'description' => esc_html__( 'Enter button text 1', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional button link 1', 'iodtheme' ),
					'param_name' => 'add_btn_link_1',
					'value' => '',
					'description' => esc_html__( 'Enter button link 1', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional button text 2', 'iodtheme' ),
					'param_name' => 'add_btn_2',
					'value' => '',
					'description' => esc_html__( 'Enter button text 2', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Additional button link 2', 'iodtheme' ),
					'param_name' => 'add_btn_link_2',
					'value' => '',
					'description' => esc_html__( 'Enter button link 2', 'iodtheme' ),
					'dependency' => array(
						'element' => 'show_link',
						'value' => 'yes',
					),
					'group' => 'Additional Information',
				),
			)
		)
	);

}
add_action( 'vc_before_init', 'tt_iod_icon_box_fn_vc' );

if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_iod_icon_box_shortcode extends WPBakeryShortCode {
	}
}