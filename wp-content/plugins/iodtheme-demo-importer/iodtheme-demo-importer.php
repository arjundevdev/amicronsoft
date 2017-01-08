<?php
/*
Plugin Name: IODtheme Demo Importer
Plugin URI: http://templatation.com/
Author: Templatation
Author URI: http://templatation.com/
Version: 1.0
Description: Adds a feature to import iodtheme theme demo in Appearance > Theme setup wizard. Disable/delete from live site please.
Text Domain: templatation
*/

// Define Constants
defined('TT_ROOT')		or define('TT_ROOT', dirname(__FILE__));
defined('TT_VERSION')	or define('TT_VERSION', '1.0');

$tt_temptt_theme = wp_get_theme();
$tt_temptt_currtheme = strtolower( preg_replace( '#[^a-zA-Z]#', '', $tt_temptt_theme->get( 'Name' ) ) );
if( strpos($tt_temptt_currtheme,'child') ) {
    $tt_temptt_currtheme = strtolower( preg_replace( '#[^a-zA-Z]#', '', $tt_temptt_theme->get( 'Template' ) ) );
}
// Only do stuff if correct theme is activated.
if( 'iodtheme' == $tt_temptt_currtheme ) {

    require_once TT_ROOT .'/inc/envato_setup/envato_setup.php';
    require_once TT_ROOT .'/inc/envato_setup/envato_setup_init.php';


}