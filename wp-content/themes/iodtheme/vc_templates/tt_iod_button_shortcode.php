<?php
/*
 * Templatation.com
 *
 * Title with separator shortcode for VC
 *
 */
$buttonalign = $title = $link = $el_class =  $txt_color = $btn_bg = $txt_color2 = $btn_bg2 = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

?>

<?php if(!empty($title)) { ?>
<div class="iodbutton3" style="<?php if(!empty($buttonalign)) echo 'text-align:'.$buttonalign; ?>">
<a class="btn btn-1 <?php print esc_html($el_class); ?>" style="
<?php if (!empty($txt_color)) echo 'color: ' . esc_html($txt_color) . ';'; ?>
<?php if (!empty($btn_bg)) echo 'background: ' . esc_html($btn_bg) . ';'; ?>
    "  href="<?php print esc_url($link); ?>"><?php print esc_html($title); ?> <i  style="
    <?php if (!empty($txt_color2)) echo 'color: ' . esc_html($txt_color2) . ';'; ?>
    <?php if (!empty($btn_bg2)) echo 'background: ' . esc_html($btn_bg2) . ';'; ?>
        "  class="fa fa-caret-right"></i></a>
</div>
<?php } ?>



