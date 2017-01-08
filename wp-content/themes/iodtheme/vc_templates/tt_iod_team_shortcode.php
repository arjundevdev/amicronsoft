<?php
/*
 * Templatation.com
 *
 * Block with image and effect shortcode for VC
 *
 */
$team_type = $description = $image = $name = $el_class =
$position = $social_fb = $social_li = $social_tw = $social_google = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );


$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
?>


<?php if($team_type == 'type_1') { ?>
<div class="team <?php print esc_html($el_class); ?> <?php print esc_html($css_class); ?>">
    <article>
        <?php if (!empty($img)) { ?>
            <img class="img-responsive" src="<?php print esc_html($img); ?>" alt="">
        <?php } ?>
        <?php if (!empty($name)) { ?>
            <h5><?php print esc_html($name); ?></h5>
        <?php } ?>
        <?php if (!empty($position)) { ?>
            <span><?php print esc_html($position); ?></span>
        <?php } ?>
        <?php if (!empty($description)) { ?>
            <p><?php print do_shortcode($description); ?></p>
        <?php } ?>
        <ul class="social">
            <?php if (!empty($social_fb)) { ?>
                <li><a href="<?php print esc_url($social_fb); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if (!empty($social_tw)) { ?>
                <li><a href="<?php print esc_url($social_tw); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if (!empty($social_li)) { ?>
                <li><a href="<?php print esc_url($social_li); ?>"><i class="fa fa-linkedin"></i></a></li>
            <?php } ?>
            <?php if (!empty($social_google)) { ?>
                <li><a href="<?php print esc_url($social_google); ?>"><i class="fa fa-google-plus"></i></a></li>
            <?php } ?>
        </ul>
    </article>
</div>
<?php } ?>
<?php if($team_type == 'type_2') { ?>
    <div class="team team-list team-wrap <?php print esc_html($el_class); ?>">
        <article class="text-left">
            <?php if (!empty($img)) { ?>
                <div class="col-md-6">
                    <img class="img-responsive" src="<?php print esc_html($img); ?>" alt="">
                </div>
            <?php } ?>
            <div class="col-md-6">
                <?php if (!empty($name)) { ?>
                    <h5><?php print esc_html($name); ?></h5>
                <?php } ?>
                <?php if (!empty($position)) { ?>
                    <span><?php print esc_html($position); ?></span>
                <?php } ?>
                <?php if (!empty($description)) { ?>
                    <p><?php print do_shortcode($description); ?></p>
                <?php } ?>
                <ul class="social">
                    <?php if (!empty($social_fb)) { ?>
                        <li><a href="<?php print esc_url($social_fb); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($social_tw)) { ?>
                        <li><a href="<?php print esc_url($social_tw); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($social_li)) { ?>
                        <li><a href="<?php print esc_url($social_li); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($social_google)) { ?>
                        <li><a href="<?php print esc_url($social_google); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </article>
    </div>
<?php } ?>





