<?php
/*
 * Templatation.com
 *
 * Title with separator shortcode for VC
 *
 */
$price_type = $title = $link = $info = $price
    = $detail = $popular = $text = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


?>

<div class="plan tt-plan-sc <?php print esc_html($css_class); ?>">
    <article>
        <div class="price">
            <h6><?php print esc_html($title); ?></h6>
            <span class="currency"><?php esc_html_e( '$', 'iodtheme' ); ?></span><?php print esc_html($price); ?><span class="period"> <?php esc_html_e( '/monthy', 'iodtheme' ); ?></span></div>
        <div class="price-lists">
            <?php print wpautop(do_shortcode(htmlspecialchars_decode($content))); ?>
        </div>
        <a href="<?php print esc_html($link); ?>" class="btn btn-1 margin-top-30"><?php print esc_html($text); ?> <i class="fa fa-caret-right"></i></a>
    </article>
</div>




