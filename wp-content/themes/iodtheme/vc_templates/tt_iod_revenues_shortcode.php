<?php
/*
 * Templatation.com
 *
 * Block with image and effect shortcode for VC
 *
 */
$image = $title = $el_class = $date_color =
$date = $text = $link = $text_btn = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );



$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
?>


<div class="books <?php print esc_html($css_class); ?>">
    <article class="book-1 <?php print esc_html($el_class); ?>" >
        <div class="row">
            <div class="col-sm-6"> <img class="img-responsive" src="<?php print do_shortcode($img); ?>" alt=""></div>
            <div class="col-sm-6 no-padding-left">
                <?php if(!empty($date)) { ?>
                <h3 style="<?php if (!empty($date_color)) echo 'color: ' . esc_html($date_color) . ';'; ?>"><?php print esc_html($date); ?></h3>
                <?php } ?>
                <?php if(!empty($title)) { ?>
                <h6><?php print esc_html($title); ?></h6>
                <?php } ?>
                <?php if(!empty($text)) { ?>
                <p><?php print do_shortcode($text); ?> </p>
                <?php } ?>
                <?php if(!empty($link)) { ?>
                <a href="<?php print esc_html($link); ?>" class="btn btn-1 margin-top-30" download> <?php print esc_html($text_btn); ?> <i class="fa fa-caret-right"></i></a> </div>
            <?php } ?>
        </div>
    </article>
</div>



