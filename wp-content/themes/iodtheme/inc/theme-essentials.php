<?php
if ( ! defined( 'ABSPATH' ) ) exit;


/*-----------------------------------------------------------------------------------*/
/* Theme essentials! */
/*-----------------------------------------------------------------------------------*/

update_option('revslider-notices', false);
set_transient( '_redux_activation_redirect', false, 30 );
delete_transient( '_dslc_activation_redirect_1' );


/**
 * Add default options and show Options Panel after activate
 * @since  4.0.0
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	// Flush rewrite rules.
	flush_rewrite_rules();
	// redirect
	$tt_update_log = get_option( 'iodtheme_tt_updates_log');
	if( ! is_array($tt_update_log) ) iodtheme_tt_activate_redirect(); // only redirect if its first time activation
}

// Adding redirect
function iodtheme_tt_activate_redirect() {

	header( 'Location: ' . admin_url( 'themes.php?page=tgmpa-install-plugins' ) );

} // End iodtheme_tt_activate_redirect()



// Adding versions
add_action( 'current_screen', 'iodtheme_tt_update_version' );
function iodtheme_tt_update_version( $current_screen ) {
	if ( 'appearance_page_tgmpa-install-plugins' == $current_screen->base ) {
		if( function_exists( 'iodtheme_tt_firstInst_notice' )) add_action( 'admin_notices', 'iodtheme_tt_firstInst_notice' ); // add notice.
	}
	if ( 'toplevel_page__templatation' == $current_screen->base ) {

		$woo_theme = wp_get_theme();
		$woo_this_theme_ver = $woo_theme->get( 'Version' );
		$theme_update_log = get_option( 'iodtheme_tt_updates_log');

        if ( ! $theme_update_log ) $theme_update_log = array();

		// First update
		if ( ! in_array('1.0', $theme_update_log) ) {
			array_unshift($theme_update_log, '1.0');
			update_option( 'iodtheme_tt_updates_log', $theme_update_log);
		}

		if ( ! in_array($woo_this_theme_ver, $theme_update_log) ) {
			array_unshift($theme_update_log, $woo_this_theme_ver);
			update_option( 'iodtheme_tt_updates_log', $theme_update_log);
		}

	}
}

if( !function_exists( 'iodtheme_tt_firstInst_notice' )) {
	function iodtheme_tt_firstInst_notice() {

			 print '<div class="updated notice is-dismissible" style="padding: 25px 12px;"><span style="text-align:center;font-weight: bold;color:green;"> ' .
		     esc_html__( 'Thanks for Activating IOD WordPress theme.', 'iodtheme' ) . '</span>'
			 . '<br /> <br />' .

		     esc_html__( 'Theme requires few bundled plugins to function on its full power. Please Install and Activate plugins below.', 'iodtheme' )

			 . '<br />' .

		     esc_html__( 'You can choose not to install any particular plugin if you do not need it. eg Jobmanager ', 'iodtheme' )

			 . '<br /> <br />' .

			 '<span style="text-align:center;font-weight: bold;color:green;"> ' .
		     esc_html__( 'After plugins are activated, Click Dashboard on left top, then go to Appearance > Theme Setup Wizard for further setup.', 'iodtheme' ) . '</span>'

		     . '</div>';
	}
}



/**
 * Register Sidebars
 */

if ( ! function_exists( 'iodtheme_tt_widgets_init' ) ) {
function iodtheme_tt_widgets_init() {
    if ( ! function_exists( 'register_sidebar' ) )
        return;

    register_sidebar(array( 'name' => esc_html__( 'Sidebar ( Default )', 'iodtheme' ),'id' => 'default-sidebar','description' => esc_html__( 'Default sidebar.', 'iodtheme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h5 class="side-tittle ">','after_title' => '</h5>'));

    register_sidebar(array( 'name' => esc_html__( 'Sidebar ( Shop )', 'iodtheme' ),'id' => 'shop-sidebar','description' => esc_html__( 'Side for Woocommerce.', 'iodtheme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h5 class="side-tittle ">','after_title' => '</h5>'));

    register_sidebar(array( 'name' => esc_html__( 'Alt. Sidebar 1', 'iodtheme' ),'id' => 'alt1-sidebar','description' => esc_html__( 'Extra sidebar(Maybe Use with Visual Composer).', 'iodtheme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h5 class="side-tittle ">','after_title' => '</h5>'));

    register_sidebar(array( 'name' => esc_html__( 'Alt. Sidebar 2', 'iodtheme' ),'id' => 'alt2-sidebar','description' => esc_html__( 'Extra sidebar(Maybe Use with Visual Composer).', 'iodtheme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h5 class="side-tittle ">','after_title' => '</h5>'));

    // Footer widgetized areas
	$total = iodtheme_fw_get_option( 'footer_sidebars', 4 );
	if ( ! $total ) $total = 4;
	for ( $i = 1; $i <= intval( $total ); $i++ ) {
		register_sidebar( array( 'name' => sprintf( esc_html__( 'Footer %d', 'iodtheme' ), $i ), 'id' => sprintf( 'footer-%d', $i ), 'description' => sprintf( esc_html__( 'Widgetized Footer Region %d.', 'iodtheme' ), $i ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6 class="ft-title">', 'after_title' => '</h6>' ) );
	}

} // End the_widgets_init()
}

add_action( 'widgets_init', 'iodtheme_tt_widgets_init' );


if ( ! function_exists( 'iodtheme_tt_load_scripts' ) ) {
	function iodtheme_tt_load_scripts() {

		wp_enqueue_script( "comment-reply" );

		// Scripts
		// google maps
		if( iodtheme_fw_get_option('gmap_api') ) {
			$gmap_api = iodtheme_fw_get_option('gmap_api');
			wp_register_script( 'goog_maps', 'http://maps.google.com/maps/api/js?key='.$gmap_api, '', null, true );
		} else
			wp_register_script( 'goog_maps', 'http://maps.google.com/maps/api/js', '', null, true );

		wp_enqueue_script( 'bootstrap', IODTHEME_FW_THEME_DIRURI . 'assets/js/bootstrap.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'own-menu', IODTHEME_FW_THEME_DIRURI . 'assets/js/own-menu.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'isotopelib', IODTHEME_FW_THEME_DIRURI . 'assets/js/jquery.isotope.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'flexsliders', IODTHEME_FW_THEME_DIRURI . 'assets/js/jquery.flexslider-min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'countTo', IODTHEME_FW_THEME_DIRURI . 'assets/js/jquery.countTo.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'owlcarousel', IODTHEME_FW_THEME_DIRURI . 'assets/js/owl.carousel.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'cubeportfolio', IODTHEME_FW_THEME_DIRURI . 'assets/js/jquery.cubeportfolio.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'colio', IODTHEME_FW_THEME_DIRURI . 'assets/js/jquery.colio.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'timelinr', IODTHEME_FW_THEME_DIRURI . 'assets/js/jquery.timelinr-0.9.54.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'iodtheme-main', IODTHEME_FW_THEME_DIRURI . 'assets/js/main.js', array( 'jquery' ), null, true );
		wp_register_script( 'highcharts', 'https://code.highcharts.com/highcharts.js', '', null, true );
		wp_register_script( 'exporting', 'https://code.highcharts.com/modules/exporting.js', '', null, true );


		// Styles
		wp_enqueue_style( 'style', IODTHEME_FW_THEME_DIRURI . 'assets/css/themestyle.css', '', null );
		wp_enqueue_style( 'responsive', IODTHEME_FW_THEME_DIRURI . 'assets/css/responsive.css', '', null );

		wp_enqueue_style( 'base', get_stylesheet_uri(), '', null );

		// Fonts
		wp_enqueue_style( 'tt-fonts', iodtheme_tt_g_fonts(), array(), null );

	} //iodtheme_tt_load_scripts
	add_action( 'wp_enqueue_scripts', 'iodtheme_tt_load_scripts' );
}


// calling google fonts needed for this theme.
if ( ! function_exists( 'iodtheme_tt_g_fonts' ) ) {
	/**
	 * @return string Google fonts URL for the theme.
	 */
	function iodtheme_tt_g_fonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'iodtheme' ) ) {
			$fonts[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
			$fonts[] = 'Libre Baskerville:400italic,400,700';
			$fonts[] = 'Raleway:400,100,200,300,500,600,700,800,900';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

// admin styles.
if ( ! function_exists( 'iodtheme_tt_admin_styles' ) ) {
	function iodtheme_tt_admin_styles() {

		wp_enqueue_style( 'theme-admin-css', IODTHEME_FW_THEME_DIRURI . 'assets/css/tt-admin.css' );

	} add_action('admin_enqueue_scripts', 'iodtheme_tt_admin_styles', 200);
}


/**
 * Pagination
 */

function iodtheme_tt_post_pagination( $atts = NULL ) {

	$show_numbers = true;

	if ( ! $show_numbers ) {

		?>
			<div class="classic-pagination clearfix">

				<div class="fl">
					<?php previous_posts_link(); ?>
					&nbsp;
				</div>

				<div class="fr">
					&nbsp;
					<?php next_posts_link(); ?>
				</div>

			</div><!-- .classic-pagination -->
		<?php

	} else {

		global $paged;

		if ( ! isset( $atts['force_number'] ) ) $force_number = false; else $force_number = $atts['force_number'];
		if ( ! isset( $atts['pages'] ) ) $pages = false; else $pages = $atts['pages'];
		$range = 2;

		$showitems = ($range * 2)+1;

		if ( empty ( $paged ) ) { $paged = 1; }

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if( ! $pages ) {
				$pages = 1;
			}
		}

		if( 1 != $pages ) {

			?>
			<div class="page-pagination">
				<ul class="clearfix">
					<?php

						if($paged > 2 && $paged > $range+1 && $showitems < $pages) { print "<li class='inactive'><a class='num-type far-prev' href='".get_pagenum_link(1)."'></a></li>"; }
						if($paged > 1 && $showitems < $pages) { print "<li class='inactive'><a class='num-type prev' href='".get_pagenum_link($paged - 1)."' ></a></li>"; }

						for ($i=1; $i <= $pages; $i++){
							if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)){
								print ($paged == $i)? "<li class='active'><a class='active num-type' href='".get_pagenum_link($i)."'>".$i."</a></li>":"<li class='inactive'><a class='num-type inactive' href='".get_pagenum_link($i)."'>".$i."</a></li>";
							}
						}

						if ($paged < $pages && $showitems < $pages) { print "<li class='inactive'><a class='num-type next' href='".get_pagenum_link($paged + 1)."'></a></li>"; }
						if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) { print "<li class='inactive'><a class='num-type far-next'  href='".get_pagenum_link($pages)."'></a></li>"; }

					?>
				</ul>
			</div><!-- .pagination --><?php
		}

	}

}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown\">\n";
  }
}

/* EOF */