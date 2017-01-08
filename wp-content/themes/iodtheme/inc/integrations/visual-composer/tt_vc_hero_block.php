<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * Hero block sc for VC
 *
 */
function tt_hero_shortcode_fn_vc() {
	

	vc_map( 
		array(
			"icon" => 'tt-vc-block',
			"name" => esc_html__("IOD Hero Area", 'iodtheme'),
			"base" => "tt_hero_shortcode",
			'description' => esc_html__( 'Highlighted section with BG image and text.', 'iodtheme' ),
            "category" => esc_html__('IODtheme', 'iodtheme'),
			"params" => array(
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => esc_html__("Show Highlight", "iodtheme"),
					"param_name" => "highlight_chk",
					"value" => "",
					"description" => esc_html__("Highlight area appears on top with color background.", 'iodtheme')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Highlight Text", 'iodtheme'),
					"description" => esc_html__("Enter highlight text.", 'iodtheme'),
					"param_name" => "highlight_text",
					'dependency' => array(
						'element' => 'highlight_chk',
						 'value' => array('true')
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Heading", 'iodtheme'),
					"description" => esc_html__("Heading for Hero area.", 'iodtheme'),
					"admin_label" => true,
					"param_name" => "heading",
				),
				// array(
				// 	"type" => "textarea_html",
				// 	"heading" => esc_html__("Subheading", 'iodtheme'),
				// 	"description" => esc_html__("Subheading for Hero area.", 'iodtheme'),
				// 	"param_name" => "content",
				// ),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Hero Area Background Image", 'iodtheme'),
					"description" => esc_html__("Choose image for background. This image is set to cover mode so please check image size. recommended size is 1000x400px, or any landscape size.", 'iodtheme'),
					"param_name" => "image"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__("Background color", 'iodtheme'),
					"description" => esc_html__("You can choose to have background color, also, if you make this color transparent, it will work as overlay color on the image chosen above.", 'iodtheme'),
					"param_name" => "color"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Image Size", 'iodtheme'),
					"description" => esc_html__("How the background image (The Hero Area Image above ) should fit the container ? Leave as-it-is if not sure. Note: If you enable parallax above, size is always 'cover'.", 'iodtheme'),
					"param_name" => "imgsize",
					"value" => array(
						'Auto' => 'auto',
						'Cover' => 'cover',
						'Contain' => 'contain',
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Image Repeat", 'iodtheme'),
					"param_name" => "imgrepeat",
					"std" => "repeat",
					"value" => array(
	                    'no-repeat' => 'no-repeat',
						'repeat-x' => 'repeat-x',
						'repeat-y' => 'repeat-y',
						'repeat' => 'repeat'
					),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Image Position", 'iodtheme'),
					"description" => esc_html__("Select how you would like to position the image (The Hero Area Image above ). Leave as-it-is if not sure.", 'iodtheme'),
					"param_name" => "imgpos",
					"value" => array(
	                    'center center' => 'center center',
						'top left' => 'top left',
						'top center' => 'top center',
						'top right' => 'top right',
						'center left' => 'center left',
						'center right' => 'center right',
						'bottom left' => 'bottom left',
						'bottom center' => 'bottom center',
						'bottom right' => 'bottom right'
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Text Appearance", 'iodtheme'),
					"description" => esc_html__("Based on the color of background image, you might need to make text color Light or Dark. Note: Button appearance is being managed from Button tab.", 'iodtheme'),
					"param_name" => "text_appear",
					"value" => array(
						'Dark' => 'dark',
						'Light' => 'light',
					)
				),

				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => esc_html__("Insert Breadcrumb", "iodtheme"),
					"param_name" => "yoast_bdcmp",
					"value" => "",
					"description" => esc_html__("Skip if you are not currently building top hero block for the page. Insert breadcrumb in this area. Note: Yoast SEO plugin must be active, and Breadcrumb enabled in SEO/Advanced in wp-admin.", 'iodtheme')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Top Space", 'iodtheme'),
	                'description' => esc_html__( 'In-case you want to display big BG image. With block of content aligned in top, you can enter blank space you want on bottom of content. Enter only integer, without px, like 200,400. Note: This will not work if you did not set BG image & inserted padding in Design Options tab.', 'iodtheme' ),
					"param_name" => "block_padding_top",
					"std" => "80",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Bottom Space", 'iodtheme'),
	                'description' => esc_html__( 'In-case you want to display big BG image. With block of content aligned bottom, you can enter blank space you want on top of content. Enter only integer, without px, like 200,400. Note: This will not work if you did not set BG image & inserted padding in Design Options tab.', 'iodtheme' ),
					"param_name" => "block_padding_bottom",
					"std" => "80",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra Class", 'iodtheme'),
	                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'iodtheme' ),
					"param_name" => "el_class",
				),
				array(
					"type" => "checkbox",
					"class" => "",
					"heading" => esc_html__("Link Entire Block ?", "iodtheme"),
					"param_name" => "link_entire_block",
					"value" => "",
					"description" => esc_html__("Do you want to link entire block. Note: You can also use button and link it in Button tab instead.", 'iodtheme')
				),
				array(
					"type" => "vc_link",
					"class" => "",
					"heading" => esc_html__("Entire Block Link",'iodtheme'),
					"param_name" => "block_link",
					"value" => "",
					"description" => "Setup block link here. Note: The title you set makes no difference. Only link and target matters.",
					'dependency' => array(
						'element' => 'link_entire_block',
						'value' => 'true',
					),
			    ),
	            array(
	                'type' => 'css_editor',
	                'heading' => esc_html__( 'CSS box', 'iodtheme' ),
	                'param_name' => 'css',
	                // 'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'iodtheme' ),
	                'group' => esc_html__( 'Design Options', 'iodtheme' )
	            )
			)
		) 
	);
	
}
add_action( 'vc_before_init', 'tt_hero_shortcode_fn_vc' );


if(class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_tt_hero_shortcode extends WPBakeryShortCode {
	}
}