<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action('iodtheme_fw_after_body'); ?>

<!-- Wrap -->
<div id="wrap">

<!-- header -->
<header>

<!-- Top-bar -->
<?php if( function_exists('iodtheme_topnav_content')) echo iodtheme_topnav_content(); ?>

<nav class="navbar">
  <div class="sticky">
    <div class="container">

      <!-- LOGO -->
      <div class="logo"> <?php if ( function_exists( 'iodtheme_tt_logo' ) ) echo iodtheme_tt_logo(); ?> </div>

      <!-- Nav -->
        <?php
        if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
            wp_nav_menu( array( 'depth'          => 3,
                                'sort_column'    => 'menu_order',
                                'container'      => 'ul',
                                'menu_class'     => 'nav ownmenu',
                                'theme_location' => 'primary-menu',
                                'walker' => new My_Walker_Nav_Menu()
            ) );
        } else {
            echo '<ul class="nav ownmenu a"><li>'. esc_html__("Please assign primary menu in wp-admin->Appearance->Menus",'iodtheme') .'</li></ul>';
        } ?>
      <!-- Search -->
      <div class="search-icon"> <a href="#."><i class="fa fa-search"></i></a>
        <?php if ( class_exists( 'woocommerce' ) ) get_product_search_form(); else get_search_form(); ?>
      </div>
    </div>
  </div>
</nav>
</header>

