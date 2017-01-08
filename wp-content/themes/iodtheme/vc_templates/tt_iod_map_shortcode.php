<?php
/*
 * Templatation.com
 *
 * Block with image and effect shortcode for VC
 *
 */
$title = $lat = $lon = $zoom = $image = $el_class = $height = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
wp_enqueue_script( 'goog_maps' );

?>


<div style="<?php if (!empty($height)) echo 'height: ' . esc_html($height) . 'px;'; ?>" class="<?php print esc_html($el_class); ?>"  id="map" data-title="<?php print esc_html($title); ?>"  data-zoom="<?php print esc_html($zoom); ?>" data-lat="<?php print esc_html($lat); ?>" data-lon="<?php print esc_html($lon); ?>" data-img="<?php print esc_html($img); ?>"></div>




