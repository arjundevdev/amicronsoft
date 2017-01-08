<?php

$name = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$group_val = json_decode(urldecode($atts['tabs']));
?>

<div class="history">
    <div id="timeline" class="col-lg-10 col-md-12 col-sm-12">
        <ul id="dates" class="custom-list">
            <?php foreach ($group_val as $val) {
                if (isset($val->year)) { ?>
                    <li><a href="#date1"><span><?php print esc_html($val->year); ?></span></a></li>
                <?php } ?>
            <?php } ?>
        </ul>
        <ul id="issues" class="custom-list">
            <?php print do_shortcode($content); ?>
        </ul>
        <a href="#" id="next"><i class="ion-ios-arrow-right"></i></a>
        <a href="#" id="prev"><i class="ion-ios-arrow-left"></i></a>
    </div>
</div>



