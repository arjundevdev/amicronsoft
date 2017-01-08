<?php
if ( ! defined( 'ABSPATH' ) ) exit;

 /*
  *  template file
  * @templatation.com
  */

$settings = array(
                'connect_rss' => '',
                'connect_twitter' => '',
                'connect_facebook' => '',
                'connect_youtube' => '',
                'connect_flickr' => '',
                'connect_linkedin' => '',
                'connect_pinterest' => '',
                'connect_instagram' => '',
                'connect_googleplus' => ''
                );
$settings = iodtheme_fw_opt_values( $settings );


?>

<ul>

                <?php if ( $settings['connect_twitter' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_twitter'] ); ?>" class="twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>

		   		<?php } if ( $settings['connect_facebook' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_facebook'] ); ?>" class="facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>

		   		<?php } if ( $settings['connect_youtube' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_youtube'] ); ?>" class="youtube" title="YouTube"><i class="fa fa-youtube"></i></a></li>

		   		<?php } if ( $settings['connect_flickr' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_flickr'] ); ?>" class="flickr" title="Flickr"><i class="fa fa-flickr"></i></a></li>

		   		<?php } if ( $settings['connect_linkedin' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_linkedin'] ); ?>" class="linkedin" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>

		   		<?php } if ( $settings['connect_pinterest' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_pinterest'] ); ?>" class="pinterest" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>

		   		<?php } if ( $settings['connect_instagram' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_instagram'] ); ?>" class="instagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>

		   		<?php } if ( $settings['connect_googleplus' ] != "" ) { ?>
		   		<li><a href="<?php echo esc_url( $settings['connect_googleplus'] ); ?>" class="googleplus" title="Google+"><i class="fa fa-google-plus"></i></a></li>

				<?php } if ( $settings['connect_rss' ] == "1" ) { ?>
		   		<li><a href="<?php echo get_bloginfo_rss('rss2_url'); ?>" class="subscribe" title="RSS"><i class="fa fa-rss"></i></a></li>
				<?php } ?>
</ul>
