<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Fist full of comments
if ( ! function_exists( 'iodtheme_fw_cust_cmnt' ) ) {
	function iodtheme_fw_cust_cmnt( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>

<li <?php comment_class('media'); ?>>
  <a id="comment-<?php comment_ID() ?>-start"></a>
	<div id="li-comment-<?php comment_ID() ?>" class="comment_container">
		<?php if( get_comment_type() == 'comment' ) { ?>
	         <div class="media-left"><?php print get_avatar( $comment, apply_filters( 'tt_comment_avatar_size', $size = 88 ) ); ?></div>
	    <?php } ?>
	  <div class="media-body">
	    <h6 class="media-heading"><?php iodtheme_fw_commenter_link(); ?>
		    <span>- <?php print get_comment_date( get_option( 'date_format' ) ).' - '. get_comment_time( get_option( 'time_format' ) ); ?></span>
		    <span class="perma"><a href="<?php print get_comment_link(); ?>-start" title="<?php esc_attr_e( 'Direct link to this comment', 'iodtheme' ); ?>">#</a></span>
		    <span class="edit"><?php edit_comment_link(esc_html__( 'Edit', 'iodtheme' ), '', '' ); ?></span>
            <?php $tt_reply_text = ''; $tt_reply_text = esc_html__( 'Reply', 'iodtheme' ); ?>
			<span class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => $tt_reply_text,  'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</span><!-- /.reply -->
	    </h6>
        <div class="comment-entry" id="comment-<?php comment_ID(); ?>">
			<?php comment_text(); ?>
			<?php if ( $comment->comment_approved == '0' ) { ?>
                <p class='unapproved'><?php esc_html_e( 'Your comment is awaiting moderation.', 'iodtheme' ); ?></p>
            <?php } ?>
		</div><!-- /comment-entry -->
	  </div>
	</div>

	<?php
	} // End iodtheme_tt_cust_cmnt()
}

// PINGBACK / TRACKBACK OUTPUT
if ( ! function_exists( 'iodtheme_fw_list_pings' ) ) {
	function iodtheme_fw_list_pings( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment; ?>

		<li id="comment-<?php comment_ID(); ?>">
			<span class="author"><?php comment_author_link(); ?></span> -
			<span class="date"><?php print get_comment_date( get_option( 'date_format' ) ); ?></span>
			<span class="pingcontent"><?php comment_text(); ?></span>

	<?php
	} // End list_pings()
}

if ( ! function_exists( 'iodtheme_fw_commenter_link' ) ) {
	function iodtheme_fw_commenter_link() {
	    $commenter = get_comment_author_link();
	    print wp_kses_post($commenter);
	} // End iodtheme_tt_commenter_link()
}



?>