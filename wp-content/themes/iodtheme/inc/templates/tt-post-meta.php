<?php
if ( ! defined( 'ABSPATH' ) ) exit;

 /*
  *  template file
  * @templatation.com
  */
?>

<?php the_author_link(); ?>
<?php
$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
if ( comments_open() ) { echo ' / ';
	if ( $num_comments == 0 ) {
		$comments = esc_html__('No Comments', 'iodtheme');
	} elseif ( $num_comments > 1 ) {
		$comments = $num_comments . esc_html__('Comments', 'iodtheme');
	} else {
		$comments = esc_html__('1 Comment', 'iodtheme');
	}
	echo '<a href="' . get_comments_link() .'">'. $comments.'</a>';
} else {
	esc_html_e('Comments off.', 'iodtheme');
}