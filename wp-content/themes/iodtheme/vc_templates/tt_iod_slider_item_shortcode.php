<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$img = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';

?>

<?php if(!empty($img))  {?>
<div class="item">
    <div class="item"><img class="img-responsive" src="<?php print esc_url($img); ?>" alt=""></div>
</div>
<?php }?>