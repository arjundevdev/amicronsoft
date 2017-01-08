<?php


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<div class="list-style-featured">
    <ul>
       <?php print do_shortcode($content); ?>
    </ul>
</div>








