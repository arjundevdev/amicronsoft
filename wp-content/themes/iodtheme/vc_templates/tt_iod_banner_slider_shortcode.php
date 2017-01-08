<?php


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>


<!-- HOME MAIN SLIDER -->
<section class="home-slide">
    <ul class="slides">
        <?php print do_shortcode($content); ?>
    </ul>
</section>