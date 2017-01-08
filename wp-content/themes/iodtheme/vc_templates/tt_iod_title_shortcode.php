<?php
/*
 * Templatation.com
 *
 * Title with separator shortcode for VC
 *
 */
$title = $transform = $show_sp = $sptitle_color = $sptitle = $alignment = $title_color = $title_size = $sbtitle = $content_color  = $sbtitle_color = $show_sb = $show_content = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


?>


<div class="heading <?php print esc_html($css_class); ?> <?php print esc_html($alignment. ' ' .$transform);  ?>">
    <?php if($show_sp == 'yes') {?>
    <span style="<?php if (!empty($sptitle_color)) echo 'color: ' . esc_html($sptitle_color) . ';'; ?>"><?php print esc_html($sptitle); ?></span>
    <?php } ?>
    <?php if(!empty($title )) { ?>
    <h4 style="<?php if (!empty($title_color)) echo 'color: ' . esc_html($title_color) . ';'; ?><?php if (!empty($title_size)) echo 'font-size: ' . esc_html($title_size) . 'px;'; ?>"><?php print esc_html($title); ?></h4>
    <?php } ?>
    <?php if($show_sb == 'yes') {?>
    <span style="<?php if (!empty($sbtitle_color)) echo 'color: ' . esc_html($sbtitle_color) . ';'; ?>"><?php print esc_html($sbtitle); ?></span>
    <?php } ?>
</div>