<?php
/*
Plugin Name: Templatation Framework
Plugin URI: http://templatation.com/
Author: Templatation
Author URI: http://templatation.com/
Version: 1.61
Description: Framework plugin needed for theme to work smoothly.
Text Domain: templatation
*/

// Define Constants
define('TT_FW_ROOT', dirname(__FILE__));

// Fetch the options set from theme, which we use to decide which features to turn on from this plugin.
$defaults = array(
		'portfolio_cpt'             => '0',
		'team_cpt'                  => '0',
		'client_cpt'                => '0',
		'testimonial_cpt'           => '0',
		'project_cpt'               => '0',
		'metaboxes'                 => '1',
		'theme_options'             => '1',
		'common_shortcodes'         => '1',
		'integrate_VC'              => '1',
		'tt_widget_instagram'       => '0',
		'tt_widget_twitter'         => '0',
);
$tt_temptt_components = wp_parse_args( get_option('tt_temptt_components_user'), $defaults ); // Replace defaults with values set in Theme.


//Include Portfolio CPT
if ( ! empty( $tt_temptt_components['portfolio_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-portfolio.php';
}

//Include Clients CPT
if ( ! empty( $tt_temptt_components['client_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-client.php';
}

//Include Projects CPT
if ( ! empty( $tt_temptt_components['project_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-project.php';
}

//Include Team CPT
if ( ! empty( $tt_temptt_components['team_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-team.php';
}

//Include Testimonial CPT
if ( ! empty( $tt_temptt_components['testimonial_cpt'] ) ) {
	include TT_FW_ROOT . '/inc/CPT/tt-testimonial.php';
}

//Include redux framework
if ( ! class_exists( 'Redux' && ! empty( $tt_temptt_components['theme_options'] ) ) ) {
	include TT_FW_ROOT . '/inc/redux/admin-init.php';
}

//Include CS framework
if ( ! class_exists( 'CSFramework' && ! empty( $tt_temptt_components['metaboxes'] ) ) ) {
	include TT_FW_ROOT . '/inc/cs-framework/cs-framework.php';
}

//Include Shortcodes
if ( ! empty( $tt_temptt_components['common_shortcodes'] ) ) {
	include TT_FW_ROOT . '/inc/shortcodes/init.php';
}

//Include VC stuff
if ( ! empty( $tt_temptt_components['integrate_VC'] ) ) {
	if ( function_exists( 'vc_set_as_theme' ) ) {
		include TT_FW_ROOT . '/inc/vc/vc-init.php';
	}
}

//Include twitter
if ( ! empty( $tt_temptt_components['tt_widget_twitter'] ) ) {
		add_action( 'wp_enqueue_scripts', 'tt_temptt_framework_twter_enqueue' );
		include TT_FW_ROOT . '/inc/widgets/tt-widget_twitter.php';
}


/*-----------------------------------------------------------------------------------*/
/* Remove no-ttfmwrk class from body, when this plugin is active. */
/*-----------------------------------------------------------------------------------*/
add_filter( 'body_class','tt_temptt_ttfmwrk_yes', 11 );
if ( ! function_exists( 'tt_temptt_ttfmwrk_yes' ) ) {
function tt_temptt_ttfmwrk_yes( $classes ) {

	if (($key = array_search('no-ttfmwrk', $classes)) !== false) {
    unset($classes[$key]);
	}
	return $classes;
  }
}

/*-----------------------------------------------------------------------------------*/
/* Enqueue twitter script function . */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'tt_temptt_framework_twter_enqueue' ) ) {
function tt_temptt_framework_twter_enqueue() {
	wp_enqueue_script( 'temptt-twitterFetcher', plugin_dir_url( __FILE__ ) . 'inc/assets/js/twitterFetcher.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'temptt-twitterFetcher-style', plugin_dir_url( __FILE__ ) . 'inc/assets/css/twitterFetcher.css', false );
  }
}


/*-----------------------------------------------------------------------------------*/
/* tt_get_dynamic_value() */
/* Replace values in a provided array with theme options, if available. */
/*
/* $settings array should resemble: $settings = array( 'theme_option_without_tt' => 'default_value' );
/*
/* @since 4.4.4 */
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'tt_temptt_opt_values' )) {
	function tt_temptt_opt_values( $settings ) {
		global $tt_temptt_opt;

		if ( is_array( $tt_temptt_opt ) ) {
			foreach ( $settings as $k => $v ) {

				if ( is_array( $v ) ) {
					foreach ( $v as $k1 => $v1 ) {
						if ( isset( $tt_temptt_opt[ 'tt_' . $k ][ $k1 ] ) && ( $tt_temptt_opt[ 'tt_' . $k ][ $k1 ] != '' ) ) {
							$settings[ $k ][ $k1 ] = $tt_temptt_opt[ 'tt_' . $k ][ $k1 ];
						}
					}
				} else {
					if ( isset( $tt_temptt_opt[ 'tt_' . $k ] ) && ( $tt_temptt_opt[ 'tt_' . $k ] != '' ) ) {
						$settings[ $k ] = $tt_temptt_opt[ 'tt_' . $k ];
					}
				}
			}
		}

		return $settings;
	} // End tt_temptt_opt_values()
}


/*-----------------------------------------------------------------------------------*/
/* tt_temptt_get_option() */
/* Replace values in a provided variable with theme options, if available. */
/*
 * field id should be without tt_
 */
/* TT @since 6.0 */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'tt_temptt_get_option' ) ) {
	function tt_temptt_get_option( $var, $default = false ) {
		global $tt_temptt_opt;

		if ( isset( $tt_temptt_opt[ 'tt_' . $var ] ) ) {
			$var = $tt_temptt_opt[ 'tt_' . $var ];
		} else {
			$var = $default;
		}

		return $var;
	} // End tt_temptt_get_option()
}
