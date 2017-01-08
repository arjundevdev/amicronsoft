<?php
$title = $link =  '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>


<?php if(!empty($name)) {?>
<li> <a href="<?php print esc_url($link); ?>"><?php print esc_html($name); ?></a></li>
<?php } ?>