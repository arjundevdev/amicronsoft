<?php


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="presentation">
    <div class="single-slide">
        <?php print do_shortcode($content); ?>
    </div>
</div>
