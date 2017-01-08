<?php

$link_5 = $link_4 = $link_3 = $link_2 = $link_1 = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$img_1 = (is_numeric($image_1) && !empty($image_1)) ? wp_get_attachment_url($image_1) : '';
$img_2 = (is_numeric($image_2) && !empty($image_2)) ? wp_get_attachment_url($image_2) : '';
$img_3 = (is_numeric($image_3) && !empty($image_3)) ? wp_get_attachment_url($image_3) : '';
$img_4 = (is_numeric($image_4) && !empty($image_4)) ? wp_get_attachment_url($image_4) : '';
$img_5 = (is_numeric($image_5) && !empty($image_5)) ? wp_get_attachment_url($image_5) : '';

?>

<div class="item">
    <ul class="row col-5">
        <?php if(!empty($img_1)) { ?>
        <li><a href="<?php print esc_html($link_1); ?>"><img class="img-responsive" src="<?php print esc_url($img_1); ?>" alt=""></a></li>
        <?php } ?>
        <?php if(!empty($img_2)) { ?>
        <li><a href="<?php print esc_html($link_2); ?>"><img class="img-responsive" src="<?php print esc_url($img_2); ?>" alt=""></a></li>
        <?php } ?>
        <?php if(!empty($img_3)) { ?>
        <li><a href="<?php print esc_html($link_3); ?>"><img class="img-responsive" src="<?php print esc_url($img_3); ?>" alt=""></a></li>
        <?php } ?>
        <?php if(!empty($img_4)) { ?>
        <li><a href="<?php print esc_html($link_4); ?>"><img class="img-responsive" src="<?php print esc_url($img_4); ?>" alt=""></a></li>
        <?php } ?>
        <?php if(!empty($img_5)) { ?>
        <li><a href="<?php print esc_html($link_5); ?>"><img class="img-responsive" src="<?php print esc_url($img_5); ?>" alt=""></a></li>
        <?php } ?>
    </ul>
</div>