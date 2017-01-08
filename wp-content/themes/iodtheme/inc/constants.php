<?php
if ( ! defined( 'ABSPATH' ) ) exit;

 /*
  *  Theme constants.
  */

if ( ! defined( 'IODTHEME_THEME_NAME' ) ) define( 'IODTHEME_THEME_NAME', 'iodtheme' );

define('IODTHEME_FW_THEME_DIR', trailingslashit( get_template_directory() ));
define('IODTHEME_FW_THEME_DIRURI', esc_url( trailingslashit( get_template_directory_uri() ) ));

define('IODTHEME_FW_URI', 'http://templatation.com');
define('IODTHEME_FW_PLUGINS', '/themesinclude/plugins/');

