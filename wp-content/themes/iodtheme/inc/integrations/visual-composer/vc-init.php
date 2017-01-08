<?php
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }
/*
 * Templatation.com
 *
 * VC integration
 *
 */

// Set VC as theme.
if( function_exists('vc_set_as_theme') ){
	function iodtheme_fw_vcAsTheme() {
		vc_set_as_theme(true);
	}
	add_action( 'vc_before_init', 'iodtheme_fw_vcAsTheme' );
}

// Initialize VC modules.
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_icon_box.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_team.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_list.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_button.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_brands.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_history.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_price.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_count.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_title.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_testimonial.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_documents.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_features.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_post.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_menu.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_portfolio.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_slider.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_map.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_story.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_contact.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_team_gallery.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_revenues.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_charts.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_iod_banner_slider.php');
include( get_template_directory() . '/inc/integrations/visual-composer/tt_vc_hero_block.php');

