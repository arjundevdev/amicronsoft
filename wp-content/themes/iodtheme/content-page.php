<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**

 * The default template for displaying page content

 */
?>


<div class="blog-details">
    <?php if ( has_post_thumbnail()) { ?>  
    <?php the_post_thumbnail(); ?>
    <?php } ?>


        <?php print iodtheme_fw_post_title('h3'); ?>
        <!--Start blog details top text-->
        <div class="blog-cnt">
           <?php the_content(); ?>
        </div>

        <?php if ( comments_open() ) { comments_template(); } ?>
</div>