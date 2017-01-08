<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* This file hooks the metaboxes to Metabox system powered by TT FW plugin.
/*-----------------------------------------------------------------------------------*/

// remove metaoptions for CPT from the plugin.
remove_filter( 'cs_metabox_options', 'iodtheme_fw_team_metas_opt', 20 ); // remove the plugin team opts, if exists.
remove_filter( 'cs_metabox_options', 'iodtheme_fw_portfolio_metas_opt', 20 ); // remove the plugin team opts, if exists.

/*-----------------------------------------------------------------------------------*/
/* CS meta boxes override                                                            */
/*-----------------------------------------------------------------------------------*/
// framework options filter example
if( !function_exists( 'iodtheme_fw_metas_opt' )) {
	function iodtheme_fw_metas_opt( $options ) {


// Lets create metas for portfolio
	$iodtheme_fw_portfolio_meta =  array(
		// begin: a section
		array(
			'name'   => 'section_1',
			'title'  => 'General Settings',
			'icon'   => 'fa fa-cog',
			// begin: fields
			'fields' => array(
				array(
				  'type'    => 'notice',
				  'class'   => 'info',
				  'content' => 'The main image for this item can be added from right side featured image block.',
				),
				array(
					'id'      => '_enable_img',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Show more images', 'iodtheme' ),
					'label'   => esc_html__( '', 'iodtheme' ),
					'default' => false,
				),
				array(
					'id'      => '_image1',
					'type'    => 'upload',
					'title'   => 'Portfolio images 1',
					'dependency' => array( '_enable_img', '==', 'true' ),
				),
				array(
					'id'      => '_image2',
					'type'    => 'upload',
					'title'   => 'Portfolio images 2',
					'dependency' => array( '_enable_img', '==', 'true' ),
				),
				array(
					'id'      => '_image3',
					'type'    => 'upload',
					'title'   => 'Portfolio images 3',
					'dependency' => array( '_enable_img', '==', 'true' ),
				),
				array(
					'id'      => '_image4',
					'type'    => 'upload',
					'title'   => 'Portfolio images 4',
					'dependency' => array( '_enable_img', '==', 'true' ),
				),
				array(
					'id'      => '_enable_slider',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Show slider', 'iodtheme' ),
					'label'   => esc_html__( '', 'iodtheme' ),
					'default' => false,
				),
				array(
					'id'      => '_sl_image1',
					'type'    => 'upload',
					'title'   => 'Portfolio images 1',
					'dependency' => array( '_enable_slider', '==', 'true' ),
				),
				array(
					'id'      => '_sl_image2',
					'type'    => 'upload',
					'title'   => 'Portfolio images 2',
					'dependency' => array( '_enable_slider', '==', 'true' ),
				),
				array(
					'id'      => '_sl_image3',
					'type'    => 'upload',
					'title'   => 'Portfolio images 3',
					'dependency' => array( '_enable_slider', '==', 'true' ),
				),
				array(
					'id'      => '_sl_image4',
					'type'    => 'upload',
					'title'   => 'Portfolio images 4',
					'dependency' => array( '_enable_slider', '==', 'true' ),
				),
				array(
				  'id'      => '_single_port_url',
				  'type'    => 'text',
				  'title'   => 'Custom URL',
				  'desc'    => 'By default links in the this item block will link to single item page. If you want them to go to a custom URL, enter it here',
				),
					array(
				'id'      => '_big_item',
				'type'    => 'checkbox',
				'title'   => 'Small element',
				'desc'    => 'Please choose if you want small element, recommended for masonry type',
				),
				array(
					'id'      => '_role',
					'type'    => 'text',
					'title'   => 'Role',
					'desc'    => 'Enter role',
				),
				array(
					'id'      => '_complete',
					'type'    => 'text',
					'title'   => 'Complete',
					'desc'    => 'Enter complete date',
				),
				array(
					'id'      => '_client',
					'type'    => 'text',
					'title'   => 'Clients',
					'desc'    => 'Enter your client',
				),
				array(
					'id'      => '_technology',
					'type'    => 'text',
					'title'   => 'Technology',
					'desc'    => 'Enter technology list',
				),
				array(
					'id'      => '_live',
					'type'    => 'text',
					'title'   => 'LIVE URL',
					'desc'    => 'Enter live URL',
				),
				),
		)
	);


// Lets create Team meta options
	$iodtheme_fw_team_meta =  array(
		// begin: a section
		array(
			'name'   => 'section_1',
			'title'  => 'General Settings',
			'icon'   => 'fa fa-cog',
			'fields' => array(
				array(
					'type'    => 'notice',
					'class'   => 'info',
					'content' => 'The main image for this item can be added from right side featured image block.',
				),
				array(
					'id'      => '_position',
					'type'    => 'text',
					'title'   => 'Position',
					'desc'    => 'Member position',
				),
				array(
					'id'      => '_enable_social',
					'type'    => 'switcher',
					'title'   => esc_html__( 'Enable social links in this page', 'iodtheme' ),
					'label'   => esc_html__( '', 'iodtheme' ),
					'default' => false,
				),
				array(
					'id'      => '_facebook',
					'type'    => 'text',
					'title'   => 'Facebook link',
					'desc'    => 'Please enter facebook link',
					'dependency' => array( '_enable_social', '==', 'true' ),
				),
				array(
					'id'      => '_twit',
					'type'    => 'text',
					'title'   => 'Twitter link',
					'desc'    => 'Please enter twitter link',
					'dependency' => array( '_enable_social', '==', 'true' ),
				),
				array(
					'id'      => '_ln',
					'type'    => 'text',
					'title'   => 'Linkedin link',
					'desc'    => 'Please enter linkedin  link',
					'dependency' => array( '_enable_social', '==', 'true' ),
				),
				array(
					'id'      => '_google',
					'type'    => 'text',
					'title'   => 'Google+ link',
					'desc'    => 'Please enter google+ link',
					'dependency' => array( '_enable_social', '==', 'true' ),
				),
			),
		)
	);


// Lets create options that we will use mostly, in page, product, pages
	$iodtheme_fw_default_meta =  array(
				// begin: a section
				array(
					'name'   => 'section_1',
					'title'  => 'General Settings',
					'icon'   => 'fa fa-cog',
					// begin: fields
					'fields' => array(

						array(
						  'id'    => '_hide_title_display',
						  'type'  => 'switcher',
						  'title' => esc_html__( 'Hide default title display in middle content area.', 'iodtheme' ),
						  'desc'  => esc_html__( 'In some case, you might want to hide the default title display. Check this to hide title. If you are not sure about it  leave it unchecked. N/A for woocommerce products.', 'iodtheme' ),
						  'default' => false
						),

						array(
							'id'      => '_single_enable_headline',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Hero section on this page', 'iodtheme' ),
							'label'   => esc_html__( 'Hero section appears after header and before content area. Note: Hero section is full liquid width. If you want boxed Hero section, use visual composer Hero Component to build it please. Note: Visual composer must be active for Hero section to work.', 'iodtheme' ),
							'default' => false
						),
						array(
						  'id'       => '_single_hdline_type',
						  'type'     => 'select',
						  'title' => esc_html__( 'Type.', 'iodtheme' ),
						  'desc' => esc_html__( 'There are 2 type of headline, Type 1 is wider and type 2 is short, horizontally.', 'iodtheme' ),
						  'options'  => array(
						    'type1'  => esc_html__( 'Type 1', 'iodtheme' ),
						    'type2'  => esc_html__( 'Type 2', 'iodtheme' ),
						  ),
							'dependency' => array( '_single_enable_headline', '==', 'true' ),
						  'default'  => 'type1',
						),
						array(
							'id'         => '_single_headline_title',
							'type'       => 'text',
							'title'      => esc_html__( 'Main Title.', 'iodtheme' ),
							'dependency' => array( '_single_enable_headline', '==', 'true' ),
						),
						array(
							'id'    => '_single_page_img',
							'type'  => 'upload',
							'title' => esc_html__( 'Hero area background', 'iodtheme' ),
							'desc'  => esc_html__( 'This image appears in background of hero section above. As the text is light, dark image is suggested. Recommended image size is 1300x400 px. Note: If left empty, default background color displays.', 'iodtheme' ),
							'dependency' => array( '_single_enable_headline', '==', 'true' ),
						),
						array(
						  'id'      => '_single_page_color',
						  'type'    => 'color_picker',
						  'title'   => esc_html__( 'Background color.', 'iodtheme' ),
						  'desc'    => esc_html__( 'You can choose to have background color, also, if you make this color transparent, it will work as overlay color on the image chosen above.', 'iodtheme' ),
						  'default' => '',
						  'rgba'    => true,
						  'dependency' => array( '_single_enable_headline', '==', 'true' ),
						),

						array(
						  'id'       => '_single_text_apprnce',
						  'type'     => 'select',
						  'title' => esc_html__( 'Text Appearance.', 'iodtheme' ),
						  'desc' => esc_html__( 'Based on the color of background image, you might need to make text color Light or Dark.', 'iodtheme' ),
						  'options'  => array(
						    'light'  => esc_html__( 'Light', 'iodtheme' ),
						    'dark'  => esc_html__( 'Dark', 'iodtheme' ),
						  ),
							'dependency' => array( '_single_enable_headline', '==', 'true' ),
						  'default'  => 'light',
						),
						array(
						  'id'    => '_single_hero_breadcrumbs',
						  'type'  => 'switcher',
						  'title' => esc_html__( 'Insert breadcrumbs in Hero section.', 'iodtheme' ),
						  'desc'  => esc_html__( 'Insert breadcrumb in this area. Note: Yoast SEO plugin must be active, and Breadcrumb enabled in SEO/Advanced in wp-admin.', 'iodtheme' ),
						  'default' => true,
						  'dependency' => array( '_single_enable_headline', '==', 'true' ),
						),
						array(
							'id'      => '_single_enable_tpadding',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable Top padding', 'iodtheme' ),
							'label'   => esc_html__( 'When enabled, the page has some white space on the top. Recommended to disable if you want page builder to cover from top of this page.', 'iodtheme' ),
							'default' => true
						),
						array(
							'id'      => '_single_enable_bpadding',
							'type'    => 'switcher',
							'title'   => esc_html__( 'Enable bottom padding', 'iodtheme' ),
							'label'   => esc_html__( 'When enabled, the page has some space on the bottom before footer starts. Recommended to disable if you want page builder to cover till last of this page.', 'iodtheme' ),
							'default' => true
						),

					), // end: fields
				) // end: a section
);


/* Start creating meta options. */

$options = array(); // remove old options

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------

		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Page Options',
			'post_type' => 'page',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $iodtheme_fw_default_meta

		);
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Posts Options',
			'post_type' => 'post',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $iodtheme_fw_default_meta

		);
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Products Options',
			'post_type' => 'product',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $iodtheme_fw_default_meta

		);
		// Portfolio CPT options
		$options[] = array(
			'id'        => '_tt_meta_page_opt',
			'title'     => 'Portfolio Options',
			'post_type' => 'tt_portfolio',
			'context'   => 'normal',
			'priority'  => 'default',
			'sections'  => $iodtheme_fw_portfolio_meta

		);
		// Team CPT options
		$options[] = array(
		   'id'        => '_tt_meta_page_opt',
		   'title'     => 'Team Options',
		   'post_type' => 'tt_team',
		   'context'   => 'normal',
		   'priority'  => 'default',
		   'sections'  => $iodtheme_fw_team_meta

		);

		// Note : Meta options for CPTs are triggered from templatation-framework plugin as needed by this theme.

		return $options;

	}

	add_filter( 'cs_metabox_options', 'iodtheme_fw_metas_opt' );

}


