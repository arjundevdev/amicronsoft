<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme legalpower for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 */
include_once get_template_directory(). '/inc/tgm-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'iodtheme_fw_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function iodtheme_fw_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$tt_plugins_paths = IODTHEME_FW_URI . IODTHEME_FW_PLUGINS;
	$plugins = array(

		array(
            'name'			        => esc_html__( 'WPBakery Visual Composer', 'iodtheme' ),
            'slug'			        => "js_composer", // The plugin slug (typically the folder name)
			'source'   				=> $tt_plugins_paths . 'js_composer.zip',
            'required'			    => false, // If false, the plugin is only 'recommended' instead of required
            'version'			    => '4.12', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'		    => '', // If set, overrides default API URL and points to an external URL
        ),

		// Including templatation-framework plugin
		array(
            'name'			        => esc_html__( 'Templatation Framework', 'iodtheme' ),
			'slug'     				=> 'templatation-framework', // The plugin slug (typically the folder name)
			'source'   				=> $tt_plugins_paths . 'templatation-framework.zip',
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
            'version'			    => esc_html__( '1.5', 'iodtheme' ),
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
        array(
            'name'			        => esc_html__( 'IODtheme Demo Importer', 'iodtheme' ),
            'slug'               => 'iodtheme-demo-importer', // The plugin slug (typically the folder name).
			'source'   			=> $tt_plugins_paths . 'iodtheme-demo-importer.zip',
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'			    => esc_html__( '1.0', 'iodtheme' ),
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
		 //Including envato plugin
		 array(
            'name'			        => esc_html__( 'Envato Market', 'iodtheme' ),
		 	'slug'     				=> 'envato-market', // The plugin slug (typically the folder name)
			'source'   				=> $tt_plugins_paths . 'envato-market.zip',
		 	'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		 	'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		 	'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		 	'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		 ),

		array(
            'name'			        => esc_html__( 'Contact Form 7', 'iodtheme' ),
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),

		array(
            'name'			        => esc_html__( 'WP Job Manager', 'iodtheme' ),
			'slug'     				=> 'wp-job-manager', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'iodtheme',              // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}
