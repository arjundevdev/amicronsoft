<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The main template file.
 *
 * Works as index and fallback.
 *
 */

 get_header();

?>
<!-- MAIN CONTENT BLOCK -->
<div id="content" class="content mainblock">
    <div class="blog blog-pages">
    <div class="container">
        <div class="row">
              <div class="col-md-8">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile;
				else : ?>
					<!-- no posts -->
				<?php endif; ?>
                <div class=" pager-article  practice-v3-paginat clearfix">
                <?php
			        the_posts_pagination( array(
			        'prev_text'          => '<i class="fa fa-long-arrow-left"></i>',
			        'next_text'          => '<i class="fa fa-long-arrow-right"></i>'
			        ) );
			        ?>
                </div>
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