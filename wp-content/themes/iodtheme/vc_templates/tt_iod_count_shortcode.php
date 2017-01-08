<?php
/*
 * Templatation.com
 *
 * Title with separator shortcode for VC
 *
 */
$title = $txt_color = $separate = $separatecolor = $number = $num_color = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts ); ?>

<?php if(!empty($number)) { ?>
<div class="counter tt-counter-sc">
    <div class="count"> <span class="number"> <span class="timer" style=" <?php if( !empty($num_color)) echo 'color: '. esc_html($num_color).';'; ?>" data-speed="2000" data-refresh-interval="10" data-to="<?php print esc_html($number); ?>" data-from="0"></span> </span>
       <?php if(!empty($title)) { ?>
        <h5 style="<?php if( !empty($txt_color)) echo 'color: '. esc_html($txt_color).';'; ?>"><?php print esc_html($title); ?></h5>
        <?php } ?>
    </div>
</div>
<?php } ?>