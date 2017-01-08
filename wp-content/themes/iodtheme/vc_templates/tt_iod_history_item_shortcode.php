<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );



?>

<li >
    <div class="history-content-wrapper">
        <?php print wpautop(do_shortcode(htmlspecialchars_decode($content))); ?>
    </div>
</li>
