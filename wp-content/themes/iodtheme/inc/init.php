<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* Load the files for theme, with support for overriding the widget via a child theme.
/*-----------------------------------------------------------------------------------*/

include_once get_template_directory(). '/inc/theme-essentials.php';   // Theme Essentials
include_once get_template_directory(). '/inc/theme-options.php';      // Theme options
include_once get_template_directory(). '/inc/theme-functions.php';    // Custom theme functions
include_once get_template_directory(). '/inc/theme-metabox.php';      // Theme Metaboxes
include_once get_template_directory(). '/inc/theme-widgets.php';      // Theme widgets
include_once get_template_directory(). '/inc/theme-comments.php';     // Theme comments


/**
 * Initialize theme required features & components.
 * This is the base setting for required CPTs, based on these settings customer sees options to disable/rename rewrite for cpts in themeoptions.
 */
if(!( function_exists('iodtheme_fw_theme_components') )){

	function iodtheme_fw_theme_components() {

		$theme_components = array(
			'portfolio_cpt'             => '1',
			'team_cpt'                  => '1',
			'client_cpt'                => '0',
			'testimonial_cpt'           => '0',
			'project_cpt'               => '0',
			'metaboxes'                 => '1',
			'theme_options'             => '1',
			'common_shortcodes'         => '1',
			'integrate_VC'              => '1',
			'tt_widget_twitter'         => '1',
		);
		// Let filter modify it
		$theme_components = apply_filters( 'tt_theme_components', $theme_components );
		update_option('tt_temptt_components', $theme_components);
	}

	// only trigger on first install
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' || is_admin() && isset( $_GET['theme'] ) && $pagenow == 'customize.php' ){
		add_action( 'init', 'iodtheme_fw_theme_components', 1 );
		add_action( 'init', 'iodtheme_fw_user_manage_cpt', 2 ); // Trigger first run of this fn.
	}
}

/**
 * Let user disable CPT as per his needs.
 */
if(!( function_exists('iodtheme_fw_user_manage_cpt') )){

	function iodtheme_fw_user_manage_cpt() {

		// Fetch from DB.
		$theme_components = get_option('tt_temptt_components');
		if( !$theme_components ) return;

		// User settings.
		$theme_user_cpts = array(
			'portfolio_cpt'             => iodtheme_fw_get_option( 'portfolio_cpt', $theme_components['portfolio_cpt'] ),
			'testimonial_cpt'           => iodtheme_fw_get_option( 'testimonial_cpt', $theme_components['testimonial_cpt'] ),
			'team_cpt'                  => iodtheme_fw_get_option( 'team_cpt', $theme_components['team_cpt'] ),
			'client_cpt'                => iodtheme_fw_get_option( 'client_cpt', $theme_components['client_cpt'] ),
			'project_cpt'               => iodtheme_fw_get_option( 'project_cpt', $theme_components['project_cpt'] ),
		);

		// Overwrite theme defaults with new user settings.
		$new_theme_components = wp_parse_args( $theme_user_cpts, $theme_components );

		// Save
		update_option('tt_temptt_components_user', $new_theme_components);

	}

	// only trigger on permalink page
	global $pagenow;
	if ( is_admin() && $pagenow == 'options-permalink.php' ){
		add_action( 'init', 'iodtheme_fw_user_manage_cpt', 2 );
	}
}

/**
 * TGM class for plugin includes.
 */
if( is_admin() ){
	if (!( class_exists( 'TGM_Plugin_Activation' ) ))
		include_once get_template_directory(). '/inc/tgm-activation/tt-plugins.php';   // Theme Essentials
}

/**
 * Woocommerce integration
 */
if ( class_exists( 'woocommerce' ) ) {
	include( get_template_directory() . '/inc/integrations/woocommerce/woocommerce.php');
}

/**
 * VC integration
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
		include_once get_template_directory(). '/inc/integrations/visual-composer/vc-init.php';   // Theme Essentials
}


/**
 * Instagram integration
 */
if ( function_exists( 'wpiw_init' ) ) {
	add_filter('wpiw_list_class', 'iodtheme_fw_instafeedlink');
	function iodtheme_fw_instafeedlink($classes) {
	    $classes = "photo-steam";
	    return $classes;
	}
}


/* WPML integration
 */
if ( function_exists('icl_object_id') ) {
  define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
}

/**
 * Content Width
 * ( WP requires it and LC uses is to figure out the wrapper width )
 */

if ( ! isset( $content_width ) )
	$content_width = 1140;


/**
 * Basic Theme Setup
 */

if ( ! function_exists( 'iodtheme_tt_theme_setup' ) ) {

	function iodtheme_tt_theme_setup() {

		// Load the translations
		load_theme_textdomain( 'iodtheme', get_template_directory() . '/lang' );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Add admin editor style.
		add_editor_style( 'inc/editor-style.css' );

		// Add custom background support.
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

		// Enable Post Thumbnails ( Featured Image )
		add_theme_support( 'post-thumbnails' );

		// Title tag support
		add_theme_support( 'title-tag' );

		// Register Navigation Menus
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'iodtheme' ),
			'footer-menu'  => esc_html__( 'Footer Menu', 'iodtheme' ),
		) );

		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form' ) );
		add_image_size( 'tt-blog', 700, 400, true );
	}

} add_action( 'after_setup_theme', 'iodtheme_tt_theme_setup' );


//setting some required settings to avoid multiple redirects caused by plugins
if(  is_admin() && !get_option( 'envato_setup_complete') ) iodtheme_fw_prevent_plugins_redir();
function iodtheme_fw_prevent_plugins_redir() {
	update_option( 'ultimate_vc_addons_redirect', false );
	update_option( 'revslider-notices', false );
	add_filter( 'woocommerce_enable_setup_wizard', __return_false() );
	set_transient( '_redux_activation_redirect', false, 30 );
	remove_action( 'init', 'vc_page_welcome_redirect' );
	delete_transient( '_dslc_activation_redirect_1' );
}
