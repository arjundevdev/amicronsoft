<?php
/*
 * Templatation.com
 *
 * Block with image and effect shortcode for VC
 *
 */
$name = $position = $description = $el_class  = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

?>


<div class="testi <?php print esc_html($el_class); ?> <?php print esc_html($css_class); ?>">
    <?php if(!empty($description)) { ?>
    <p> <?php print do_shortcode($description); ?></p>
    <?php } ?>
    <?php if(!empty($name)) { ?>
    <h6><?php print esc_html($name); ?> /
        <?php if(!empty($position)) { ?>
        <span class="primary-color"><?php print esc_html($position); ?></span>
        <?php } ?>
    </h6>
    <?php } ?>
</div>





