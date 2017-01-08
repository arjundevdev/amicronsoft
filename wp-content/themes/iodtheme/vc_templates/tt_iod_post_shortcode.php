<?php
$amount = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>

<section class="blog">
    <div class="blog-slide">
<?php
$args = array( 'posts_per_page' => $amount );
$query = new WP_Query( $args );
while ( $query->have_posts() ) {
    $query->the_post() ?>
    <article>
        <?php if ( has_post_thumbnail()) { ?>
        <?php $thumb = get_post_thumbnail_id();
          $img_url = wp_get_attachment_url( $thumb,'full' );
          $image = iodtheme_tt_aq_resize( $img_url, '370', '260', true, true, true, true);
          ?>
          <img src="<?php echo esc_url($image) ?>" width="370" height="260" alt="<?php echo iodtheme_fw_img_alt($thumb); ?>" />
        <?php } ?>


        <div class="date"> <?php the_time('d'); ?> <span><?php the_time('M'); ?></span> </div>
        <div class="post-detail"> <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
            <span><?php get_template_part( 'inc/templates/tt-post-meta' ); ?></span>
            <p><?php the_excerpt(); ?></p>
        </div>
    </article>
    <?php
}
wp_reset_postdata();
?>
</div>
</section>






