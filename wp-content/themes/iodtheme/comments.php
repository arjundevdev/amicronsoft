<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Comments Template
 *
 * This template file handles the display of comments, pingbacks and trackbacks.
 *
 * External functions are used to display the various types of comments.
 *
 * @package ttFramework
 * @subpackage Template
 */

// Do not delete these lines
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'Please do not load this page directly. Thanks!' );
} ?>


<div class="comments margin-top-80">
        <h5 class="font-normal margin-bottom-40"><?php comments_number( esc_html__( 'No Responses', 'iodtheme' ), esc_html__( 'One Response', 'iodtheme' ), esc_html__( '% Responses', 'iodtheme' ) ); ?> <?php esc_html_e( 'to', 'iodtheme' ); ?> &#8220;<?php the_title(); ?>&#8221;</h5>

<?php if ( post_password_required() ) { ?>
	<p class="nocomments"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'iodtheme' ); ?></p>
<?php echo '</div>'; return; }
?>

<?php $comments_by_type = separate_comments( $comments ); ?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) { ?>

<div id="comments" class="comment-box clearfix">

	<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<ol class="media-list commentlist">

			<?php wp_list_comments( 'callback=iodtheme_fw_cust_cmnt&type=comment' ); ?>

		</ol>

		<nav class="navigation fix">
			<div class="fl"><?php previous_comments_link(); ?></div>
			<div class="fr"><?php next_comments_link(); ?></div>
		</nav><!-- /.navigation -->
	<?php } ?>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>

		<div class="title-block">
			<h2 id="pings" class="post-title comm-title"><?php esc_html_e( 'Trackbacks/Pingbacks', 'iodtheme' ); ?></h2>
		</div>

        <ol class="pinglist">
            <?php wp_list_comments( 'type=pings&callback=iodtheme_fw_list_pings' ); ?>
        </ol>

	<?php }; ?>

</div> <!-- /#comments_wrap -->

<?php } else { // this is displayed if there are no comments so far ?>


	<?php
		// If there are no comments and comments are closed, let's leave a little note, shall we?
		// not needed in this theme
	?>

<?php
	} // End IF Statement

	/* The Respond Form. Uses filters in the theme-functions.php file to customise the form HTML. */
	if ( comments_open() )
		comment_form();
?>
</div> <!-- .comment-block -->
<div class="fix"></div>