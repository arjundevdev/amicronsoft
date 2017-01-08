<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Blog default
 *
 */
 get_header();
?>
<!-- MAIN CONTENT BLOCK -->
<?php do_action( 'tt_before_mainblock' ); ?>
<div id="content" class="content mainblock">
    <div class="blog blog-pages">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                'post_type' => 'post',
                'paged' => $paged

            );
            // query
            $tt_query = new WP_Query( $args );
            // loop
                if ( $tt_query->have_posts() ) :
                    while ( $tt_query->have_posts() ) : $tt_query->the_post();

                    get_template_part( 'content', get_post_format() );

                    endwhile; ?>
                <?php
                    $pages = $wp_query->max_num_pages;
                    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                ?>
                <div class="pager-article  practice-v3-paginat clearfix">
                       <?php previous_posts_link( '<i class="fa fa-long-arrow-left"></i>', $tt_query->max_num_pages) ?>
                       <?php print ('<a class="active_page">' . $page . '</a>'); ?>
                       <?php next_posts_link( '<i class="fa fa-long-arrow-right"></i>', $tt_query->max_num_pages) ?>

                </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- Side Bar -->
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    </div>
</div>
<?php get_footer(); ?>

