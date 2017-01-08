<?php
$fe_position = $title = $text  = $type_icon =   '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<?php if($fe_position == 'text-right') { ?>
<li class="<?php print esc_html($fe_position); ?>">
    <div class="media">
        <div class="media-body">
            <?php if(!empty($title)) { ?>
            <h6><?php print esc_html($title); ?></h6>
            <?php } ?>
            <?php if(!empty($text)) { ?>
            <p><?php print do_shortcode($text); ?></p>
            <?php } ?>
        </div>
        <div class="media-right">
            <div class="icon"> <i class="<?php print esc_html($type_icon); ?>"></i> </div>
        </div>
    </div>
</li>
<?php } ?>
<?php if($fe_position == 'text-left') { ?>
    <li class="<?php print esc_html($fe_position); ?>">
        <div class="media">
            <div class="media-left">
                <div class="icon"> <i class="<?php print esc_html($type_icon); ?>"></i> </div>
            </div>
            <div class="media-body">
                <?php if(!empty($title)) { ?>
                    <h6><?php print esc_html($title); ?></h6>
                <?php } ?>
                <?php if(!empty($text)) { ?>
                    <p><?php print do_shortcode($text); ?></p>
                <?php } ?>
            </div>
        </div>
    </li>
<?php } ?>
