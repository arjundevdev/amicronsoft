<?php

$list_type = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<?php if(!empty($content)) { ?>
<div class="clients">
    <div class="single-slide">
        <?php print do_shortcode($content); ?>
    </div>
</div>
<?php } ?>