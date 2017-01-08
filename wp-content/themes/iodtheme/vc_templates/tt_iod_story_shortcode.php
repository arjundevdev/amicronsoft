<?php
/*
 * Templatation.com
 *
 * Block with image and effect shortcode for VC
 *
 */
$image = $name = $title = $el_class = $text = $link = $text_btn = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
?>



<div class="story <?php print esc_html($el_class); ?> <?php print esc_html($css_class); ?>">
    <ul class="row">
        <li class="col-md-5"> <img class="img-responsive" src="<?php print do_shortcode($img); ?>" alt=""> </li>
        <li class="col-md-7">
            <article><?php if(!empty($name)) { ?> <span> <?php print esc_html($name); ?></span><?php } ?>
                <?php if(!empty($title)) { ?>
                <h5><?php print esc_html($title); ?></h5>
                <?php } ?>
                <?php if(!empty($text)) { ?>
                <p><?php print do_shortcode($text); ?></p>
                <?php } ?>
                <?php if(!empty($link)) { ?>
                <a href="<?php print esc_url($link); ?>" class="btn btn-1 margin-top-20"><?php print esc_html($text_btn); ?><i class="fa fa-caret-right"></i></a> </article>
            <?php } ?>
        </li>
    </ul>
</div>


