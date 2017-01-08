<?php
/*
 * Templatation.com
 *
 * Title with separator shortcode for VC
 *
 */
$name = $email = $phone = $image = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';

?>

<div class="contact-info tt-contact-sc">
    <article>
        <?php if(!empty($name )) { ?>
        <h5><?php print esc_html($name); ?></h5>
        <?php } ?>
        <?php if(!empty($content )) { ?>
        <div class="content-contact">
            <?php print wpautop(do_shortcode(htmlspecialchars_decode($content))); ?>
        </div>
        <?php } ?>
        <?php if(!empty($phone )) { ?>
        <span class="margin-top-30"><i class="fa fa-phone-square"></i> <?php print esc_html($phone); ?></span>
        <?php } ?>
        <?php if(!empty($email )) { ?>
        <span class="primary-color"><i class="fa fa-envelope"></i> <?php print esc_html($email); ?></span>
        <?php } ?>
    </article>
</div>

