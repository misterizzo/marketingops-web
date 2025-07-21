<?php
/**
 * User Add a Blog.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/blogs/add-a-blog.php.
 *
 * @see         https://wordpress-784994-2704071.cloudwaysapps.com/
 * @author      Adarsh Verma
 * @package     Marketing_Ops_Core
 * @category    Template
 * @since       1.0.0
 * @version     1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header();
$user_name = filter_input( INPUT_GET, 'author', FILTER_SANITIZE_STRING );
$user_id   = get_current_user_id();
$username  = ! empty( $user_name ) ? $user_name : get_the_author_meta( 'user_nicename', $user_id );
if ( empty( $user_id ) ) {
	wp_redirect( site_url( 'sign-in' ), 301 );
	exit();
} else {
	if ( empty( $user_name ) ) {
		wp_redirect( site_url( 'blog-new?author=' . $username ), 301 );
	}
	
}

// Check If user name is not avilable then redirect to loggedin page.

?>
<div class="moc_main_container">
	<div class="moc_row">
		<div class="boxed_three_colum">
			<div class="moc_title_section">
				<input type="text" name="moc_blog_title" placeholder="Title" class="inputtext" value="">
			</div>
			<div class="moc_title_section">
				
			</div>
		</div>
	</div>
</div>
<?php
get_footer();