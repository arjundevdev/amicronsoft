<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The main template file.
 *
 * It is used to show single post.
 *
 */
$postimgg = '';
if(function_exists('iodtheme_tt_post_thumb')) $postimgg = iodtheme_tt_post_thumb('750', '240', false, false, true);
?>
<!-- Post -->
<article <?php post_class( 'single-blog-item blog-post' ); ?>>
<?php if ( has_post_thumbnail()) { ?>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(array('750', '240'), array('class' => 'img-responsive')); ?>
        </a>
<?php } ?>
  <!-- Date -->
  <?php get_template_part( 'inc/templates/tt-post-date' ); ?>
  <!-- Detail -->
  <div class="post-detail">
    <h2 class="posttitle"><a href="<?php the_permalink(); ?>" class="post-title <?php if( empty( $postimgg ) ) echo 'padding-left-89';?>"><?php the_title(); ?></a></h2>
    <div <?php if( empty( $postimgg ) ) echo 'class=padding-left-89';?>>
      <span>
        <?php get_template_part( 'inc/templates/tt-post-meta' ); ?>
      </span>
    <!-- Content -->
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'iodtheme' ); ?> <i class="fa fa-long-arrow-right"></i></a>
    </div>
  </div>
</article>

