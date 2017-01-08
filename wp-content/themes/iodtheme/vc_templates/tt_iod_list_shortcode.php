<?php

$list_2 = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

   <div class="tt-list-sc">
       <ul>
           <?php print do_shortcode($content); ?>
       </ul>
   </div>





