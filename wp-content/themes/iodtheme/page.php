<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * author: Templatation
 *
 */
	get_header();
?>
	
<!-- MAIN CONTENT BLOCK -->
<?php do_action( 'tt_before_mainblock' ); ?>
<div id="content" class="content mainblock">
	<div class="container">


        <?php echo iodtheme_fw_post_title('h1'); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>

		<?php endwhile; endif;

			if ( comments_open() ) {  ?>
			 <div class="comment-part">
			 <?php comments_template( '', true );  ?>
			 </div>
			<?php
			}
            ?>

	</div>

</div>

<?php get_footer(); ?>