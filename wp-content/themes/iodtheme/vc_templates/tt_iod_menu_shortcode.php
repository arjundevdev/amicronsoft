<?php

$title = $type_icon = $el_class = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

?>


<?php if (!empty($title)) { ?>
    <div class="side-bar-revenues <?php print esc_html($el_class); ?>">
        <h6 class="head"><a data-toggle="collapse" href="#men" aria-expanded="false"><i
                    class="<?php print esc_html($type_icon); ?>"></i><?php print esc_html($title); ?></a></h6>

        <div class="collapse" id="men">
            <div class="well">
                <ul class="cate result">
                    <?php print do_shortcode($content); ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>


