<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------*/
/* This file hooks the redux options panel. While Redux powered by TT FW plugin.
/*-----------------------------------------------------------------------------------*/


add_filter('redux/options/tt_temptt_opt/sections', 'iodtheme_tt_redux_options');

if ( ! function_exists( 'iodtheme_tt_redux_options' ) ) {
    function iodtheme_tt_redux_options( $sections ) {

	//reset themeoptions array
    $sections = array();

	$shortname = 'tt';

    /*
     *
     * ---> START SECTIONS
     *
     */

/*-----------------------------------------------------------------------------------*/
/* General Settings                                                                  */
/*-----------------------------------------------------------------------------------*/

    $sections[] = array(
        'title'  => esc_html__( 'General Settings', 'iodtheme' ),
        'id'     => 'general',
        'desc'   => esc_html__( 'General Settings.', 'iodtheme' ),
        //'icon'   => 'el el-home ',
        'customizer_width' => '400px',
    );
	// quick start.
    $sections[] = array(
        'title'            => esc_html__( 'Quick Start', 'iodtheme' ),
        'id'               => 'general-quickstart',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id' => $shortname . '_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Upload Logo', 'iodtheme' ),
                'readonly'    => false,
                'subtitle'     => esc_html__( 'Upload a logo for your theme, or specify an image URL directly. For retina friendliness you can upload 2x logo and set desired dimension in retina ready graphics option below.', 'iodtheme' ),
                'desc' => esc_html__( 'Size of defaut logo is 95x45px.', 'iodtheme' ),
            ),
            array(
                'id'       => $shortname . '_retina_favicon',
                'type'     => 'switch',
                'title'    => 'Retina Ready Logo',
                'subtitle' => esc_html__( 'Do you want sharp logo display on retina display devices?', 'iodtheme' ),
                'desc'     => esc_html__( 'To make logo look sharp on Retina devices, you need to upload double size logo above and turn it on to be able to enter desired width/height for logo image. If you are not sure what this means leave it off. Note: To comply with all retina devices app icon etc, please go to Appearance->customize->site identity.', 'iodtheme' ),
                'default'  => false
            ),
            array(
                'id' => $shortname . '_retina_logo_wh',
                'type'           => 'dimensions',
                'units'          => array( 'px' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => esc_html__( 'Dimensions (Width/Height) Option', 'iodtheme' ),
                'subtitle'       => esc_html__( 'Enter desired Width and height for your retina logo. If you want logo to be retina ready, please upload double size version of logo above and enter the dimensions you want it to appear in. Recommended: 290 x 60.', 'iodtheme' ),
                'desc'       => esc_html__( ' Normally it will be half of actual retina logo image dimensions. Enter values without px eg: 50, 70 etc. Recommended: Leave blank to disable this. Note: If your logo is distorted, try keeping the height blank.', 'iodtheme' ),
                'required' => array( $shortname . '_retina_favicon', '=', true ),
                 'default'        => array(
                    'width'  => 0,
                    'height' => 0,
                )
            ),
           array(
                'id' => $shortname . '_gmap_api',
                'type'     => 'text',
                'title' => esc_html__( 'Google Map API Text', 'iodtheme' ),
                'desc'  => sprintf( esc_html__( '%1$s for complete instructions to get an API key from Google itself.', 'iodtheme' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">' . esc_html__( 'Click here', 'iodtheme' ) . '</a>' ),
                'subtitle' => esc_html__( 'Since June 2016, Google requires an API key for displaying maps.', 'iodtheme' ),
           ),
/*
           array(
                'id' => $shortname . '_enable_shoptitle',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Shop Title', 'iodtheme' ),
                'subtitle' => esc_html__( 'If enabled, the title you put for the page Shop, appears on Shop page as heading. Recommended: false.', 'iodtheme' ),
                'default'  => false
           ),*/

         )
);



// favicon info, let users know that favicon now is native wp feature( if it exists ofcourse ).
if( function_exists( 'wp_site_icon' ) ) {
    $sections[] = array(
        'title'            => esc_html__( 'Favicon Icon', 'iodtheme' ),
        'id'               => 'fav_icon_info',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => $shortname . '_favicon_info1',
                'type'  => 'info',
                // 'notice' => false,
                'style' => 'info',
                'title' => esc_html__( 'Favicon Icon', 'iodtheme' ),
                'desc'  => sprintf( esc_html__( 'Since WordPress 4.3, favicon now can be managed from Appearance -> Customize -> Site Identity. %1$s.', 'iodtheme' ), '<a href="' . esc_url( home_url( '/' ) ) . 'wp-admin/customize.php">' . esc_html__( 'Go to Live Customizer (Appearance-Customize) by clicking here', 'iodtheme' ) . '</a>' ),
            ),
            array(
                'id'   => 'opt-divide',
                'type' => 'divide'
            ),

        )
    );
}

// favicons, only if below wp 4.3
if( !function_exists( 'wp_site_icon' ) ) {
    $sections[] = array(
        'title'            => esc_html__( 'Favicon Icon', 'iodtheme' ),
        'id'               => 'fav_icon_2',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => $shortname . '_custom_favicon',
                'type'     => 'media',
                'url'      => true,
                'subtitle' => esc_html__( 'Upload favicon icon.', 'iodtheme' ),
                'title'    => esc_html__( 'Favicon Icon', 'iodtheme' ),
                'default'  => array( 'url' => '' ),
            ),
            array(
                'id'       => $shortname . '_fvcn_57x57',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Apple iPhone Icon', 'iodtheme' ),
                'readonly' => false,
                'subtitle' => esc_html__( 'Icon for Apple iPhone (57px x 57px)', 'iodtheme' ),
                'default'  => array( 'url' => '' ),
            ),
            array(
                'id'       => $shortname . '_fvcn_57x57',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Apple iPhone Icon', 'iodtheme' ),
                'readonly' => false,
                'subtitle' => esc_html__( 'Icon for Apple iPhone (57px x 57px)', 'iodtheme' ),
                'default'  => array( 'url' => '' ),
            ),
            array(
                'id'       => $shortname . '_fvcn_114x114',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Apple iPhone Retina', 'iodtheme' ),
                'readonly' => false,
                'subtitle' => esc_html__( 'Icon for Apple iPhone Retina Version (114px x 114px) and other high-resolution Retina display', 'iodtheme' ),
                'default'  => array( 'url' => '' ),
            ),
            array(
                'id'       => $shortname . '_fvcn_72x72',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Apple iPad Icon', 'iodtheme' ),
                'readonly' => false,
                'subtitle' => esc_html__( 'Icon for Apple iPad (72px x 72px)', 'iodtheme' ),
                'default'  => array( 'url' => '' ),
            ),
            array(
                'id'       => $shortname . '_fvcn_144x144',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Apple iPad Retina Icon', 'iodtheme' ),
                'readonly' => false,
                'subtitle' => esc_html__( 'Icon for Apple iPad Retina Version (144px x 144px) and other high-resolution Retina display.', 'iodtheme' ),
                'default'  => array( 'url' => '' ),
            ),

        )
    );
}

    $sections[] = array(
        'title'            => esc_html__( 'Custom CSS', 'iodtheme' ),
        'id'               => 'display-options',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
    			'id' => $shortname . '_custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS', 'iodtheme' ),
    			'subtitle' => esc_html__( 'Quickly add some CSS to your theme by adding it to this block.', 'iodtheme' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ''
            ),

        )
    );

/*-----------------------------------------------------------------------------------*/
/* Style Settings                                                                  */
/*-----------------------------------------------------------------------------------*/

    $sections[] = array(
        'title'            => esc_html__( 'Styling', 'iodtheme' ),
        'id'               => 'body-options',
        'customizer_width' => '450px',
        'icon'   => 'el el-icon-brush',
        'fields'           => array(

            array(
                'id' => $shortname . '_live_cust_info',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Live Customizer', 'iodtheme' ),
                'desc'   =>  sprintf( esc_html__( 'Please note that theme main colors settings can also be done using Live customizer, you can see live preview if you use live customizer. %1$s.', 'iodtheme' ), '<a href="' . esc_url( home_url('/') ) . 'wp-admin/customize.php">' . esc_html__( 'Go to Live Customer (Appearance-Customize) by clicking here', 'iodtheme' ) . '</a>' ),
            ),
           array(
                'id' => $shortname . '_main_acnt_clr',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Accent Color', 'iodtheme' ),
                'subtitle' => esc_html__( 'Main accent color of the theme. Note: Some color are powered by page builder/images. Contact support if you need help.', 'iodtheme' ),
                'desc'     => esc_html__( 'Default: leave blank.', 'iodtheme' ),
                'default'  => ''
           ),

           array(
                'id' => $shortname . '_body_stng',
                'type'     => 'background',
                'output'   => array( '.mainblock' ),
                'title' => esc_html__( 'Body Background Setting', 'iodtheme' ),
                'subtitle' => esc_html__( 'You can customize body section here. Choose a color or an image and setup as per your liking.', 'iodtheme' ),
                'desc' => esc_html__( 'Note: Prebuilt pages are built on full width Visual composer grid. So this change might not be visible on them. It will be visiable on Default page template, and posts.', 'iodtheme' ),
		        'default'  => array(
		            'background-color' => '#ffffff',
		        )
           ),

           array(
                'id' => $shortname . '_topnav_clr',
                'type'     => 'background',
                'output'   => array( '.top-info' ),
                'title'    => esc_html__( 'Topbar Color', 'iodtheme' ),
                'subtitle' => esc_html__( 'Color for the top bar which appears on top of the header.(If enabled in Layout)', 'iodtheme' ),
                'desc'     => esc_html__( 'Default: leave blank.', 'iodtheme' ),
                'default'  => ''
           ),

           array(
                'id' => $shortname . '_hdr_stng',
                'type'     => 'background',
                'output'   => array( 'header .navbar' ),
                'title' => esc_html__( 'Header Settings', 'iodtheme' ),
                'subtitle' => esc_html__( 'You can customize header area here.', 'iodtheme' ),
           ),

            array(
                'id' => $shortname . '_tt_ft_bg',
                'type'     => 'background',
                'output'   => array( '#footer-wrap' ),
                'title'    => esc_html__( 'Footer Background', 'iodtheme' ),
                'subtitle' => esc_html__( 'Select background image or color for footer area, where widgets appear.', 'iodtheme' ),
                'desc'   =>  sprintf( esc_html__( 'Note: As by default an image is set on this area, selecting only color will not work, if you want to have color only, you might need to set image as transparent image(and then select color.). %1$s.', 'iodtheme' ), '<a href="'. esc_url(get_template_directory_uri()) .'/images/zTransparent.png" target="_blank">' . esc_html__( 'Here is a transparent image you can download and use.', 'iodtheme' ) . '</a>' ),
            ),
            array(
                'id' => $shortname . '_extreme_ft_bg',
                'type'     => 'background',
                'output'   => array( '.rights' ),
                'title'    => esc_html__( 'Exreme footer Background', 'iodtheme' ),
                'subtitle' => esc_html__( 'Select background image or color for extreme bottom image, the section which is used for copyright info etc.', 'iodtheme' ),
            ),

        )
        );
/*-----------------------------------------------------------------------------------*/
/* Layout Settings                                                                  */
/*-----------------------------------------------------------------------------------*/

    $sections[] = array(
        'title' => esc_html__( 'Layout (Header/Sidebar)', 'iodtheme' ),
        'id'               => 'layout-options',
        'desc'   => esc_html__( 'Layout Settings for Sidebar and Header.', 'iodtheme' ),
        'icon'   => 'el el-photo ',
        'customizer_width' => '400px',
        'fields'           => array(


           array(
                'id' => $shortname . '_js_topbar_notice',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Toppest Bar Settings', 'iodtheme' ),
                'desc'   => esc_html__( 'Below settings are for the top most navigation bar which is optional. It adds some usual user interface items. There is limited space on this bar , so be careful in choosing what part you really need. You can try it out and disable things later if bar goes out of space. Note: Top nav background color can be changed from Styling tab.', 'iodtheme' )
           ),
           array(
                'id' => $shortname . '_enable_topbar',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Top Nav Bar', 'iodtheme' ),
                'subtitle' => esc_html__( 'Enable/Disable the Top most nav bar globally.', 'iodtheme' ),
                'default'  => true
           ),
            array(
    			'id' => $shortname . '_top_nav_left_layout',
                'type'     => 'sorter',
                'title'    => 'Top nav left content',
                'subtitle' => 'You can place content as you want, on left side of the top nav. Sort them, or disable by moving them back to Available column. Note that here you can only enable/disable/sort them, their actual content can be controlled from the options below. Note: Email/phone to be entered in Social/contact setting below. ',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'email'     => 'Email',
                        'phone'   => 'Phone',
                    ),
                    'disabled' => array(
                        'teaser_text'   => 'Text',
                        'wpml_lang'   => 'WPML Languages',
                        'social'   => 'Social Icons',
                        'custommenu'   => 'Custom Menu',
                    ),
                ),
                'required' => array( $shortname . '_enable_topbar', '=', true )
            ),
            array(
    			'id' => $shortname . '_top_nav_right_layout',
                'type'     => 'sorter',
                'title'    => 'Top nav right content',
                'subtitle' => 'You can place content as you want, on right side of the top nav. Sort them, or disable by moving them back to Available column. Note that here you can only enable/disable/sort them, their actual content can be controlled from the options below. Note: Email/phone to be entered in Social/contact setting below. ',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'social'   => 'Social Icons',
                    ),
                    'disabled' => array(
                        'email'     => 'Email',
                        'phone'   => 'Phone',
                        'teaser_text'   => 'Text',
                        'wpml_lang'   => 'WPML Languages',
                        'custommenu'   => 'Custom Menu',
                    ),
                ),
                'required' => array( $shortname . '_enable_topbar', '=', true )
            ),

           array(
                'id' => $shortname . '_ttext_text',
                'type'     => 'text',
                'title' => esc_html__( 'Teaser Text', 'iodtheme' ),
                'subtitle' => esc_html__( 'Teaser text is short sentence that you want to highlight. eg : Our helpline number : xyz. This text appears on left most side of top bar.', 'iodtheme' ),
                'required' => array( $shortname . '_enable_topbar', '=', true )
           ),
           array(
                'id' => $shortname . '_top_nav_menu',
                'type'     => 'select',
                'data'     => 'menus',
                'title'    => esc_html__( 'Select Menu', 'iodtheme' ),
                'subtitle' => esc_html__( 'To display custom menu, please create a new menu in Appearance -> Menus and then select it here.', 'iodtheme' ),
                'required' => array( $shortname . '_enable_topbar', '=', true )
           ),
        )
    );

/*-----------------------------------------------------------------------------------*/
/* Footer Settings                                                                  */
/*-----------------------------------------------------------------------------------*/

    $sections[] = array(
        'title' => esc_html__( 'Footer Customization', 'iodtheme' ),
        'id'               => 'footer-settings1',
        'customizer_width' => '450px',
        'fields'           => array(


           array(
                'id' => $shortname . '_extreme_footer_notice',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Footer area customization', 'iodtheme' ),
                'desc'   => esc_html__( 'Customize footer area here. Note: Background colors for footer areas can be changed from Styling tab.', 'iodtheme' )
           ),

           array(
                'id' => $shortname . '_footer_sidebars',
                'type'     => 'image_select',
                'title' => esc_html__( 'Footer Widget Areas', 'iodtheme' ),
                'subtitle' => esc_html__( 'Select how many footer widget areas you want to display.', 'iodtheme' ),
                'desc'     => esc_html__( 'Select default sidebar position for the website, you can override this setting on per post/page level too.', 'iodtheme' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '0' => array(
                        'img' => IODTHEME_FW_THEME_DIRURI .'inc/images/footer-widgets-0.png',
                    ),
                    '1' => array(
                        'img' => IODTHEME_FW_THEME_DIRURI .'inc/images/footer-widgets-1.png',
                    ),
                    '2' => array(
                        'img' => IODTHEME_FW_THEME_DIRURI .'inc/images/footer-widgets-2.png',
                    ),
                    '3' => array(
                        'img' => IODTHEME_FW_THEME_DIRURI .'inc/images/footer-widgets-3.png',
                    ),
                    '4' => array(
                        'img' => IODTHEME_FW_THEME_DIRURI .'inc/images/footer-widgets-4.png',
                    ),
                ),
                'default'  => '4'
           ),
           array(
                'id' => $shortname . '_footer_left',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Custom Footer (Left)', 'iodtheme' ),
                'subtitle' => esc_html__( 'Activate to add the custom text below to the theme footer.', 'iodtheme' ),
                'desc'   => esc_html__( 'If turned off, default text will appear.', 'iodtheme' ),
                'default'  => false
            ),

           array(
                'id' => $shortname . '_footer_left_text',
                'type'     => 'textarea',
                'title' => esc_html__( 'Custom Text (Left)', 'iodtheme' ),
                'subtitle' => esc_html__( 'Custom HTML and Text that will appear in the upper footer of your theme.', 'iodtheme' ),
                'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                'default'  => '',
                'required' => array( $shortname . '_footer_left', '=', true ),
           ),

           array(
                'id' => $shortname . '_footer_menu',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Footer menu (Right)', 'iodtheme' ),
                'subtitle' => esc_html__( 'Once enabled, please create and set menu as footer menu in Appearance -> Menus.', 'iodtheme' ),
                'desc'   => esc_html__( 'If turned off, text options appear below.', 'iodtheme' ),
                'default'  => true
            ),

           array(
                'id' => $shortname . '_footer_right',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable Custom Footer (Right)', 'iodtheme' ),
                'subtitle' => esc_html__( 'Activate to add the custom text below to the theme footer.', 'iodtheme' ),
                'desc'   => esc_html__( 'If turned off, default text will appear.', 'iodtheme' ),
                'default'  => false,
                'required' => array( $shortname . '_footer_menu', '=', false ),
           ),

           array(
                'id' => $shortname . '_footer_right_text',
                'type'     => 'textarea',
                'title' => esc_html__( 'Custom Text (Right)', 'iodtheme' ),
                'subtitle' => esc_html__( 'Custom HTML and Text that will appear in the lower footer of your theme.', 'iodtheme' ),
                'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                'default'  => '',
                'required' => array( $shortname . '_footer_menu', '=', false ),
           ),

        )
    );

/*-----------------------------------------------------------------------------------*/
/* Social Settings                                                                  */
/*-----------------------------------------------------------------------------------*/

    $sections[] = array(
        'title' => esc_html__( 'Social / Contact Settings', 'iodtheme' ),
        'id'               => 'connect-settings',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id' => $shortname . '_contact_number',
                'type'     => 'text',
                'title' => esc_html__( 'Telephone', 'iodtheme' ),
                'subtitle' => esc_html__( 'Enter your telephone number', 'iodtheme' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname.'_contactform_email',
                'type'     => 'text',
                'title' => esc_html__( 'Contact Form E-Mail', 'iodtheme' ),
                'subtitle' => esc_html__( "Enter your E-mail address to use on the 'Contact Form' page Template.", 'iodtheme' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_rss',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable RSS', 'iodtheme' ),
                'subtitle' => esc_html__( 'Enable the subscribe and RSS icon.', 'iodtheme' ),
                 'default'  => false
            ),
            array(
                'id' => $shortname . '_connect_twitter',
                'type'     => 'text',
                'title' => esc_html__( 'Twitter URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.twitter.com/templatation', 'iodtheme' ), '<a href="http://www.twitter.com/">'.esc_html__( 'Twitter', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_facebook',
                'type'     => 'text',
                'title' => esc_html__( 'Facebook URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.facebook.com/templatation', 'iodtheme' ), '<a href="http://www.facebook.com/">'.esc_html__( 'Facebook', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_youtube',
                'type'     => 'text',
                'title' => esc_html__( 'YouTube URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.youtube.com/templatation', 'iodtheme' ), '<a href="http://www.youtube.com/">'.esc_html__( 'YouTube', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_flickr',
                'type'     => 'text',
                'title' => esc_html__( 'Flickr URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.flickr.com/templatation', 'iodtheme' ), '<a href="http://www.flickr.com/">'.esc_html__( 'Flickr', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_linkedin',
                'type'     => 'text',
                'title' => esc_html__( 'LinkedIn URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.linkedin.com/in/templatation', 'iodtheme' ), '<a href="http://www.www.linkedin.com.com/">'.esc_html__( 'LinkedIn', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_pinterest',
                'type'     => 'text',
                'title' => esc_html__( 'Pinterest URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.pinterest.com/templatation', 'iodtheme' ), '<a href="http://www.pinterest.com/">'.esc_html__( 'Pinterest', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_instagram',
                'type'     => 'text',
                'title' => esc_html__( 'Instagram URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. http://www.instagram.com/templatation', 'iodtheme' ), '<a href="http://www.instagram.com/">'.esc_html__( 'Instagram', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
            array(
                'id' => $shortname . '_connect_googleplus',
                'type'     => 'text',
                'title' => esc_html__( 'Google+ URL', 'iodtheme' ),
                'subtitle' => sprintf( esc_html__( 'Enter your %1$s URL e.g. https://plus.google.com/104560124403688998123/', 'iodtheme' ), '<a href="http://plus.google.com/">'.esc_html__( 'Google+', 'iodtheme' ).'</a>' ),
                'default'  => '',
            ),
        )
    );

/*-----------------------------------------------------------------------------------*/
/* Included Plugins / Theme updates                                                  */
/*-----------------------------------------------------------------------------------*/

   $sections[] = array(
        'title' => esc_html__( 'Included Plugins', 'iodtheme' ),
        'id'               => 'included-plugins',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id' => $shortname . '_inc_plugins',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Included Plugins', 'iodtheme' ),
                'desc'   => sprintf( esc_html__( 'The theme requires/recommends some plugin to function properly. Theme also includes some premium plugins with your purchase, to manage plugins, please go to Appearance -> Install plugins. Note: The menu only appears if all required plugins are not activated. So not to worry if you do not find that menu link.', 'iodtheme' ), '<a href="' . esc_url( home_url('/') ) . 'wp-admin/themes.php?page=tgmpa-install-plugins">'.esc_html__( 'Click Here', 'iodtheme' ).'</a>' ),
            ),
        )
    );

   $sections[] = array(
        'title'  => esc_html__( 'Theme Updates', 'iodtheme' ),
        'id'     => 'theme-update',
        'icon'   => 'el el-refresh',
        'customizer_width' => '450px',
        'fields' => array(

            array(
                'id' => $shortname . '_theme_update',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Theme Update', 'iodtheme' ),
                'desc'   => sprintf( esc_html__( 'The theme is regularly updated with new features and other bug fixes and improvement. You can activate Envato plugin for hassle free theme updates whenever update is available without having to download from Themeforest. Note if you modified any theme files, it will be overwritten with update. Again, make sure to keep regular backups. You can use awesome free plugin named %1$s  to create backups periodically(automatically) without hassles.', 'iodtheme' ), '<a href="https://wordpress.org/plugins/updraftplus/">'.esc_html__( 'UpdraftPlus', 'iodtheme' ).'</a>' ),
            ),
            array(
                'id' => $shortname . '_theme_update3',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title' => esc_html__( 'Step by Step instruction to setup easy updates.', 'iodtheme' ),
                'desc'   => sprintf( esc_html__( 'Please %1s for complete instruction to setup the updater plugin and update easily in future.', 'iodtheme' ), '<a href="http://kb.templatation.com/article/35-how-to-update-the-theme">'.esc_html__( 'Click Here', 'iodtheme' ).'</a>' ),
            )
        )
    );

/*-----------------------------------------------------------------------------------*/
/* CPT Settings                                                                      */
/*-----------------------------------------------------------------------------------*/
// Display options to manage CPT, as required in this theme.
$iodtheme_fw_cpt = '';
$iodtheme_fw_cpt = get_option('tt_temptt_components');
if( is_array( $iodtheme_fw_cpt )) {
    $sections[] = array(
        'title'            => esc_html__( 'CPTs/Portfolio', 'iodtheme' ),
        'id'               => 'theme-cpts',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'     => $shortname . '_inc_cpt',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title'  => esc_html__( 'Custom Post Types', 'iodtheme' ),
                'desc'   => esc_html__( 'The theme adds some post types to manage content like testimonials, portfolios etc. You can disable the Post types that you do not need. You can also change the permalink structure for those custom post types here, for example, if you would like portfolio item url to be like http://yoursite.com/portfolio-item/item or http://yoursite.com/my-work/item. If you are not sure what it all means, its ok to skip this section totally.', 'iodtheme' ),
            ),
            array(
                'id'    => $shortname . '_inc_cpt1',
                'type'  => 'info',
                // 'notice' => false,
                'style' => 'info',
                'title' => esc_html__( 'Important !', 'iodtheme' ),
                'desc'  => esc_html__( 'After changing any settings on this section or its subsections, you need to re-save the Settings → Permalinks page. Otherwise you will get 404 errors.', 'iodtheme' ),
            ),
            array(
                'id' => $shortname.'_cpt_with_front',
                'type'     => 'switch',
                'title' => esc_html__( 'Enable With Front', 'iodtheme' ),
                'subtitle' => esc_html__( 'Recommended: Off', 'iodtheme' ),
                'desc' => esc_html__( 'Prepend the permalink structure with the front base. ( example: if your permalink structure is /blog/, then your links will be: With-Front disabled -> /portfolio-item/, With-Front enabled -> /blog/portfolio-item/ ).', 'iodtheme' ),
                'default'  => false
            ),
        )
    );

// Portfolio CPT
if( ! empty( $iodtheme_fw_cpt['portfolio_cpt'] ) ) {
    $sections[] = array(
        'title'            => esc_html__( 'Portfolio', 'iodtheme' ),
        'id'               => 'portfolio-cpt-setting',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'    => $shortname . '_inc_portfolio',
                'type'  => 'info',
                // 'notice' => false,
                'style' => 'info',
                'title' => esc_html__( 'Important !', 'iodtheme' ),
                'desc'  => esc_html__( 'After changing any settings on this section or its subsections, you need to re-save the Settings → Permalinks page. Otherwise you will get 404 errors.', 'iodtheme' ),
            ),
            array(
                'id'       => $shortname . '_portfolio_cpt',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Portfolio', 'iodtheme' ),
                'subtitle' => esc_html__( 'Enable the Portfolio Custom Post type.', 'iodtheme' ),
                'desc'     => esc_html__( 'Needs theme reactivation to take effect.', 'iodtheme' ),
                'default'  => $iodtheme_fw_cpt['portfolio_cpt'] // Hint: will be 1 always.
            ),
            array(
                'id'       => $shortname . '_ajax_disable',
                'type'     => 'switch',
                'title'    => 'Disable AJAX',
                'subtitle' => esc_html__( 'Disable AJAX for portfolios', 'iodtheme' ),
                'desc'     => esc_html__( 'On portfolios, when clicked on link icon, the details of that particular portfolio item opens in a popup, disable this if you want portfolio item open in a new page traditional way.', 'iodtheme' ),
                'default'  => false
            ),
            array(
                'id'      => $shortname . '_portfolio_cpt_slug',
                'type'    => 'text',
                'title'   => esc_html__( 'Portfolio Slug', 'iodtheme' ),
                'default' => 'portfolio-item',
            ),
            array(
                'id'      => $shortname . '_portfolio_cpt_cat_slug',
                'type'    => 'text',
                'title'   => esc_html__( 'Portfolio Category Slug', 'iodtheme' ),
                'default' => 'portfolio-cats',
            ),
            array(
                'id'       => $shortname . '_portfolio_cpt_single',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Single Page', 'iodtheme' ),
                'desc' => esc_html__( 'Do you want singular item page for this Custom post type. eg: It makes sense to have a Portfolio item single page with more details about that item. But it makes less sense to have single item page for testimonials. Note: Sometimes theme needs to be re-activated for this change to take effect.', 'iodtheme' ),
                'default'  => true
            ),
        )
    );
}

// Team CPT
if( ! empty( $iodtheme_fw_cpt['team_cpt'] ) ) {
    $sections[] = array(
        'title'            => esc_html__( 'Team', 'iodtheme' ),
        'id'               => 'team-cpt-setting',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'    => $shortname . '_inc_team',
                'type'  => 'info',
                // 'notice' => false,
                'style' => 'info',
                'title' => esc_html__( 'Important !', 'iodtheme' ),
                'desc'  => esc_html__( 'After changing any settings on this section or its subsections, you need to re-save the Settings → Permalinks page. Otherwise you will get 404 errors.', 'iodtheme' ),
            ),
            array(
                'id'       => $shortname . '_team_cpt',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Team', 'iodtheme' ),
                'subtitle' => esc_html__( 'Enable the Team Custom Post type.', 'iodtheme' ),
                'default'  => $iodtheme_fw_cpt['team_cpt'] // Hint: will be 1 always.
            ),
            array(
                'id'      => $shortname . '_team_cpt_slug',
                'type'    => 'text',
                'title'   => esc_html__( 'Team Slug', 'iodtheme' ),
                'default' => 'team-item',
            ),
            array(
                'id'      => $shortname . '_team_cpt_cat_slug',
                'type'    => 'text',
                'title'   => esc_html__( 'Team Category Slug', 'iodtheme' ),
                'default' => 'team-cats',
            ),
            array(
                'id'       => $shortname . '_team_cpt_single',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Single Page', 'iodtheme' ),
                'desc' => esc_html__( 'Do you want singular item page for this Custom post type. eg: It makes sense to have a Portfolio item single page with more details about that item. But it makes less sense to have single item page for testimonials. Note: Sometimes theme needs to be re-activated for this change to take effect.', 'iodtheme' ),
                'default'  => false
            ),
        )
    );
}
} // is_array($iodtheme_fw_cpt)


    return $sections;

    }
}
