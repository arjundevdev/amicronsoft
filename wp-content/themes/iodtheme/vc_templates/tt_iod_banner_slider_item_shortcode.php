<?php


$title = $title_color = $sbtitle = $sbtitle_color = $image = $text_btn = $link = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
?>



<li class="slide-img-1" style="<?php print 'background-image: url(' . esc_html($img) . ');'; ?>" data-stellar-background-ratio="0.6">
    <div class="position-center-center">
        <?php if(!empty($title )) { ?>
        <h1 style="<?php if (!empty($title_color)) echo 'color: ' . esc_html($title_color) . ';'; ?>"><?php print esc_html($title); ?></h1>
        <?php } ?>
        <?php if(!empty($sbtitle )) { ?>
        <h5  style="<?php if (!empty($sbtitle_color)) echo 'color: ' . esc_html($sbtitle_color) . ';'; ?>"><?php print esc_html($sbtitle); ?></h5>
        <?php } ?>
        <?php if(!empty($text_btn )) { ?>
        <a href="<?php print esc_html($link); ?>" class="btn margin-top-30"><?php print esc_html($text_btn); ?> <i class="fa fa-caret-right"></i></a> </div>
        <?php } ?>
</li>

