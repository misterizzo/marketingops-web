<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $current_user;

$allowed_html       = array(
	'a' => array(
		'href' => array(),
	),
);
$default_author_img        = get_field( 'moc_user_default_image', 'option' );
$author_img_id             = ! empty( get_user_meta( $current_user->ID, 'wp_user_avatar', true ) ) ? get_user_meta( $current_user->ID, 'wp_user_avatar', true ) : '';
$author_img_url            = ( empty( $author_img_id ) || false === $author_img_id ) ? $default_author_img : wp_get_attachment_url( $author_img_id );

// Premium content available.
$user_membership_slugs           = moc_get_membership_plan_slug();
$wc_memberships_rules            = get_option( 'wc_memberships_rules' );
$premium_available_content       = ( function_exists( 'mops_get_premium_available_content' ) ) ? mops_get_premium_available_content( $user_membership_slugs, $wc_memberships_rules ) : array();
$premium_available_content_count = array_map( function( $premium_content ) {

	return count( $premium_content );
}, $premium_available_content );
$premium_available_content_count = array_sum( array_values( $premium_available_content_count ) );

// Project templates.
$saved_templates = get_user_meta( $current_user->ID, 'template_likes', true );
$saved_templates = ( ! empty( $saved_templates ) && is_array( $saved_templates ) ) ? count( $saved_templates ) : 0;

// Downloads.
$downloads       = WC()->customer->get_downloadable_products();
$downloads_count = ( ! empty( $downloads ) && is_array( $downloads ) ) ? count( $downloads ) : 0;

// Learndash certificates.
$courses              = get_user_meta( $current_user->ID, '_sfwd-course_progress', true );
$certificates         = ( function_exists( 'mops_get_user_learndash_certificates' ) ) ? mops_get_user_learndash_certificates( $courses, $current_user->ID ) : array();
$certificates_message = ( ! empty( $certificates ) && is_array( $certificates ) ) ? sprintf( __( '%1$d earned', 'marketingops' ), count( $certificates ) ) : __( 'You don\'t have any certificates yet', 'marketngops' );

// Customer orders.
$customer_orders = wc_get_orders(
	array(
		'customer'       => $current_user->ID,
		'page'           => 1,
		'paginate'       => false,
		'posts_per_page' => 1,
	)
);
$customer_order   = ( ! empty( $customer_orders[0] ) ) ? $customer_orders[0] : false;
$order_date       = ( false !== $customer_order ) ? wc_format_datetime( $customer_order->get_date_created() ) : '';
$order_item_count = ( false !== $customer_order ) ? ( $customer_order->get_item_count() - $customer_order->get_item_count_refunded() ) : 0;

// Customer articles and content: posts, podcasts, workshops.
$posts_wp_query     = new WP_Query( moc_posts_query_args() );
$podcasts_wp_query  = new WP_Query( moc_posts_query_args( 'podcast' ) );
$workshops_wp_query = new WP_Query( moc_posts_query_args( 'workshop' ) );
$learndash_courses  = learndash_user_get_enrolled_courses( $current_user->ID );

// Active membership.
$active_memberships = wc_memberships_get_user_memberships(
	$current_user->ID,
	array(
		'status' => 'wcm-active',
	)
);
$membership_message = ''; // Empty membership message.

// If there is only one active membership, and that is free.
if ( 1 === count( $active_memberships ) && ! empty( $active_memberships[0]->plan->slug ) && 'free-membership' === $active_memberships[0]->plan->slug ) {
	$membership_end_date = $active_memberships[0]->get_end_date();
	$membership_end_date = ( is_null( $membership_end_date ) ) ? __( 'forever', 'marketingops' ) : gmdate( 'F j, Y', strtotime( $membership_end_date ) );
	$membership_message  = sprintf(
		__( '%1$s%3$s%2$s until %1$s%4$s%2$s', 'marketingops' ),
		'<strong>',
		'</strong>',
		$active_memberships[0]->plan->name,
		$membership_end_date
	);
} else {
	$active_membership_messages = array(); // Temporary array to store the membership messages.

	// Loop through the memberhsips to get the active premium membership.
	foreach ( $active_memberships as $active_membership ) {
		// Skip, if the membership is free.
		if ( 'free-membership' === $active_membership->plan->slug ) {
			continue;
		}

		$membership_end_date          = $active_membership->get_end_date();
		$membership_end_date          = ( is_null( $membership_end_date ) ) ? __( 'forever', 'marketingops' ) : gmdate( 'F j, Y', strtotime( $membership_end_date ) );
		$active_membership_messages[] = sprintf(
			__( '%1$s%3$s%2$s until %1$s%4$s%2$s', 'marketingops' ),
			'<strong>',
			'</strong>',
			$active_membership->plan->name,
			$membership_end_date
		);
	}

	// If the membership messages are available.
	if ( ! empty( $active_membership_messages ) && is_array( $active_membership_messages ) ) {
		$membership_message = implode( ', ', $active_membership_messages );
	}
}

// Saved payment methods.
$saved_payment_methods = wc_get_customer_saved_methods_list( $current_user->ID );
$payment_methods_temp  = array();

foreach ( $saved_payment_methods as $payment_method_type => $methods ) {
	foreach ( $methods as $payment_method ) {
		$is_default_method = false;

		if ( 'cc' === $payment_method_type ) {
			$brand                   = ( ! empty( $payment_method['method']['brand'] ) ) ? $payment_method['method']['brand'] : '';
			$last4_digits            = ( ! empty( $payment_method['method']['last4'] ) ) ? $payment_method['method']['last4'] : '';
			$is_default_method       = ( ! empty( $payment_method['method']['is_default'] ) && true === $payment_method['method']['is_default'] ) ? true : false;
			$payment_method_message  = sprintf(
				__( '%1$s%3$s%2$s ending in %1$s%4$s%2$s', 'marketingops' ),
				'<strong>',
				'</strong>',
				$brand,
				$last4_digits
			);
			$payment_method_message .= ( true === $is_default_method ) ? __( ' is the default payment method', 'marketingops' ) : '';
			$payment_methods_temp[]  = $payment_method_message;
		} elseif ( 'link' === $payment_method_type ) {
			$brand                   = ( ! empty( $payment_method['method']['brand'] ) ) ? $payment_method['method']['brand'] : '';
			$payment_method_message  = sprintf(
				__( '%1$s%3$s%2$s is the payment method last used.', 'marketingops' ),
				'<strong>',
				'</strong>',
				$brand
			);
			$payment_method_message .= ( true === $is_default_method ) ? __( ' is the default payment method', 'marketingops' ) : '';
			$payment_methods_temp[]  = $payment_method_message;
		}
	}
}

// Billing and shipping addresses.
$billing_address           = wc_get_account_formatted_address( 'billing' );
$is_empty_billing_address  = ( is_null( $billing_address ) || empty( $billing_address ) ) ? true : false;
$shipping_address          = wc_get_account_formatted_address( 'shipping' );
$is_empty_shipping_address = ( is_null( $shipping_address ) || empty( $shipping_address ) ) ? true : false;
$address_message           = sprintf( __( '%1$sBilling%2$s and %1$sShipping%2$s addresses are set.', 'marketingops' ), '<strong>', '</strong>' );

if ( true === $is_empty_billing_address && true === $is_empty_shipping_address ) {
	$address_message  = sprintf( __( '%1$sBilling%2$s and %1$sShipping%2$s addresses are not set.', 'marketingops' ), '<strong>', '</strong>' );
} elseif ( true === $is_empty_billing_address && false === $is_empty_shipping_address ) {
	$address_message  = sprintf( __( '%1$sShipping%2$s address is set and %1$sBilling%2$s is not.', 'marketingops' ), '<strong>', '</strong>' );
} elseif ( false === $is_empty_billing_address && true === $is_empty_shipping_address ) {
	$address_message  = sprintf( __( '%1$sBilling%2$s address is set and %1$sShipping%2$s is not.', 'marketingops' ), '<strong>', '</strong>' );
}

// Profile points completed.
$profile_points = 0;

// Customer avatar.
$customer_avatar_url = mops_get_user_avatar_url( $current_user->ID );
$avatar_done         = ( false === $customer_avatar_url ) ? '' : 'profiledone';
$profile_points      = ( false === $customer_avatar_url ) ? $profile_points : ( $profile_points + 1 );

// Customer all information.
$customer_profile_info = get_user_meta( $current_user->ID, 'user_all_info', true );

// Customer biography.
$overview_done  = ( ! empty( $customer_profile_info['user_basic_info']['user_bio'] ) ) ? 'profiledone' : '';
$profile_points = ( ! empty( $customer_profile_info['user_basic_info']['user_bio'] ) ) ? ( $profile_points + 1 ) : $profile_points;

// Customer tools and skills.
$customer_tools    = ( ! empty( $customer_profile_info['moc_martech_info'] ) && is_array( $customer_profile_info['moc_martech_info'] ) ) ? true : false;
$customer_skills   = ( ! empty( $customer_profile_info['moc_cl_skill_info'] ) && is_array( $customer_profile_info['moc_cl_skill_info'] ) ) ? true : false;
$tools_skills_done = ( true === $customer_tools && true === $customer_skills ) ? 'profiledone' : '';
$profile_points    = ( true === $customer_tools && true === $customer_skills ) ? ( $profile_points + 1 ) : $profile_points;

// Customer work history.
$work_history_done = ( ! empty( $customer_profile_info['moc_work_data'] ) && is_array( $customer_profile_info['moc_work_data'] ) ) ? 'profiledone' : '';
$profile_points    = ( ! empty( $customer_profile_info['moc_work_data'] ) && is_array( $customer_profile_info['moc_work_data'] ) ) ? ( $profile_points + 1 ) : $profile_points;

// Customer certifications.
$certifications_done = ( ! empty( $customer_profile_info['moc_certificates'] ) && is_array( $customer_profile_info['moc_certificates'] ) ) ? 'profiledone' : '';
$profile_points      = ( ! empty( $customer_profile_info['moc_certificates'] ) && is_array( $customer_profile_info['moc_certificates'] ) ) ? ( $profile_points + 1 ) : $profile_points;
?>
<div class="newdashbordmain">
	<h3><?php echo wp_kses_post( sprintf( __( 'Hello %1$s!', 'marketingops' ), $current_user->display_name ) ); ?></h3>
	<span class="hedertitlethree"><?php esc_html_e( 'Take a look', 'marketingops' ); ?>:</span>
	<ul class="dashbordlistmain">
		<!-- premium content -->
		<li>
			<a href="/my-account/premium-content/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 3.5C11.2031 3.5026 10.5104 4.03906 10.3099 4.8099C10.1094 5.58073 10.4557 6.38802 11.1484 6.77865L9.04428 10.9844L5.23438 7.17448C5.57032 6.63542 5.58595 5.95573 5.27866 5.40104C4.97136 4.84635 4.38543 4.5 3.75001 4.5C2.89063 4.5026 2.16147 5.13021 2.02866 5.98177C1.89584 6.83073 2.40105 7.65104 3.21876 7.91406L4.83595 16H19.1641L20.7813 7.91667C21.6016 7.65365 22.1094 6.83333 21.9792 5.98177C21.8464 5.13021 21.112 4.5 20.25 4.5C19.6146 4.5 19.0313 4.84635 18.7214 5.40104C18.4141 5.95573 18.4297 6.63542 18.7656 7.17448L14.9557 10.9844L12.8516 6.77865C13.5469 6.39062 13.8932 5.58073 13.6927 4.8099C13.4922 4.03906 12.7969 3.5 12 3.5ZM5.00001 17.5V19.25C5.00001 20.2161 5.78386 21 6.75001 21H17.25C18.2162 21 19 20.2161 19 19.25V17.5H5.00001Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 3.5C11.2031 3.5026 10.5104 4.03906 10.3099 4.8099C10.1094 5.58073 10.4557 6.38802 11.1484 6.77865L9.04428 10.9844L5.23438 7.17448C5.57032 6.63542 5.58595 5.95573 5.27866 5.40104C4.97136 4.84635 4.38543 4.5 3.75001 4.5C2.89063 4.5026 2.16147 5.13021 2.02866 5.98177C1.89584 6.83073 2.40105 7.65104 3.21876 7.91406L4.83595 16H19.1641L20.7813 7.91667C21.6016 7.65365 22.1094 6.83333 21.9792 5.98177C21.8464 5.13021 21.112 4.5 20.25 4.5C19.6146 4.5 19.0313 4.84635 18.7214 5.40104C18.4141 5.95573 18.4297 6.63542 18.7656 7.17448L14.9557 10.9844L12.8516 6.77865C13.5469 6.39062 13.8932 5.58073 13.6927 4.8099C13.4922 4.03906 12.7969 3.5 12 3.5ZM5.00001 17.5V19.25C5.00001 20.2161 5.78386 21 6.75001 21H17.25C18.2162 21 19 20.2161 19 19.25V17.5H5.00001Z" fill="url(#paint0_linear_0_224)"/><defs><linearGradient id="paint0_linear_0_224" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/>	</linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Premium Content', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo esc_html( sprintf( __( '%1$d items available', 'marketingops' ), $premium_available_content_count ) ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- project templates -->
		<li>
			<a href="/my-account/project-templates/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M5.9173 3C4.40167 3 3.1673 4.23437 3.1673 5.75V18.25C3.1673 19.7656 4.40167 21 5.9173 21H19.4173C20.9329 21 22.1673 19.7656 22.1673 18.25V5.75C22.1673 4.23437 20.9329 3 19.4173 3H5.9173ZM5.9173 4.5C6.33136 4.5 6.6673 4.83594 6.6673 5.25C6.6673 5.66406 6.33136 6 5.9173 6C5.50323 6 5.1673 5.66406 5.1673 5.25C5.1673 4.83594 5.50323 4.5 5.9173 4.5ZM8.4173 4.5C8.83136 4.5 9.1673 4.83594 9.1673 5.25C9.1673 5.66406 8.83136 6 8.4173 6C8.00323 6 7.6673 5.66406 7.6673 5.25C7.6673 4.83594 8.00323 4.5 8.4173 4.5ZM11.4173 4.5H19.4173C19.8314 4.5 20.1673 4.83594 20.1673 5.25C20.1673 5.66406 19.8314 6 19.4173 6H11.4173C11.0032 6 10.6673 5.66406 10.6673 5.25C10.6673 4.83594 11.0032 4.5 11.4173 4.5ZM5.1673 7.5H20.1673V18.25C20.1673 18.6641 19.8314 19 19.4173 19H5.9173C5.50323 19 5.1673 18.6641 5.1673 18.25V7.5ZM7.4173 9C7.00323 9 6.6673 9.33594 6.6673 9.75V17.25C6.6673 17.6641 7.00323 18 7.4173 18H10.9173C11.3314 18 11.6673 17.6641 11.6673 17.25V9.75C11.6673 9.33594 11.3314 9 10.9173 9H7.4173ZM13.9173 9C13.6465 8.9974 13.3965 9.13802 13.2584 9.3724C13.123 9.60677 13.123 9.89323 13.2584 10.1276C13.3965 10.362 13.6465 10.5026 13.9173 10.5H17.9173C18.1881 10.5026 18.4381 10.362 18.5762 10.1276C18.7116 9.89323 18.7116 9.60677 18.5762 9.3724C18.4381 9.13802 18.1881 8.9974 17.9173 9H13.9173ZM13.9173 11.5C13.6465 11.4974 13.3965 11.638 13.2584 11.8724C13.123 12.1068 13.123 12.3932 13.2584 12.6276C13.3965 12.862 13.6465 13.0026 13.9173 13H17.9173C18.1881 13.0026 18.4381 12.862 18.5762 12.6276C18.7116 12.3932 18.7116 12.1068 18.5762 11.8724C18.4381 11.638 18.1881 11.4974 17.9173 11.5H13.9173ZM13.9173 14C13.6465 13.9974 13.3965 14.138 13.2584 14.3724C13.123 14.6068 13.123 14.8932 13.2584 15.1276C13.3965 15.362 13.6465 15.5026 13.9173 15.5H17.9173C18.1881 15.5026 18.4381 15.362 18.5762 15.1276C18.7116 14.8932 18.7116 14.6068 18.5762 14.3724C18.4381 14.138 18.1881 13.9974 17.9173 14H13.9173ZM13.9173 16.5C13.6465 16.4974 13.3965 16.638 13.2584 16.8724C13.123 17.1068 13.123 17.3932 13.2584 17.6276C13.3965 17.862 13.6465 18.0026 13.9173 18H15.9173C16.1881 18.0026 16.4381 17.862 16.5762 17.6276C16.7116 17.3932 16.7116 17.1068 16.5762 16.8724C16.4381 16.638 16.1881 16.4974 15.9173 16.5H13.9173Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 24" fill="none"><path d="M5.9173 3C4.40167 3 3.1673 4.23437 3.1673 5.75V18.25C3.1673 19.7656 4.40167 21 5.9173 21H19.4173C20.9329 21 22.1673 19.7656 22.1673 18.25V5.75C22.1673 4.23437 20.9329 3 19.4173 3H5.9173ZM5.9173 4.5C6.33136 4.5 6.6673 4.83594 6.6673 5.25C6.6673 5.66406 6.33136 6 5.9173 6C5.50323 6 5.1673 5.66406 5.1673 5.25C5.1673 4.83594 5.50323 4.5 5.9173 4.5ZM8.4173 4.5C8.83136 4.5 9.1673 4.83594 9.1673 5.25C9.1673 5.66406 8.83136 6 8.4173 6C8.00323 6 7.6673 5.66406 7.6673 5.25C7.6673 4.83594 8.00323 4.5 8.4173 4.5ZM11.4173 4.5H19.4173C19.8314 4.5 20.1673 4.83594 20.1673 5.25C20.1673 5.66406 19.8314 6 19.4173 6H11.4173C11.0032 6 10.6673 5.66406 10.6673 5.25C10.6673 4.83594 11.0032 4.5 11.4173 4.5ZM5.1673 7.5H20.1673V18.25C20.1673 18.6641 19.8314 19 19.4173 19H5.9173C5.50323 19 5.1673 18.6641 5.1673 18.25V7.5ZM7.4173 9C7.00323 9 6.6673 9.33594 6.6673 9.75V17.25C6.6673 17.6641 7.00323 18 7.4173 18H10.9173C11.3314 18 11.6673 17.6641 11.6673 17.25V9.75C11.6673 9.33594 11.3314 9 10.9173 9H7.4173ZM13.9173 9C13.6465 8.9974 13.3965 9.13802 13.2584 9.3724C13.123 9.60677 13.123 9.89323 13.2584 10.1276C13.3965 10.362 13.6465 10.5026 13.9173 10.5H17.9173C18.1881 10.5026 18.4381 10.362 18.5762 10.1276C18.7116 9.89323 18.7116 9.60677 18.5762 9.3724C18.4381 9.13802 18.1881 8.9974 17.9173 9H13.9173ZM13.9173 11.5C13.6465 11.4974 13.3965 11.638 13.2584 11.8724C13.123 12.1068 13.123 12.3932 13.2584 12.6276C13.3965 12.862 13.6465 13.0026 13.9173 13H17.9173C18.1881 13.0026 18.4381 12.862 18.5762 12.6276C18.7116 12.3932 18.7116 12.1068 18.5762 11.8724C18.4381 11.638 18.1881 11.4974 17.9173 11.5H13.9173ZM13.9173 14C13.6465 13.9974 13.3965 14.138 13.2584 14.3724C13.123 14.6068 13.123 14.8932 13.2584 15.1276C13.3965 15.362 13.6465 15.5026 13.9173 15.5H17.9173C18.1881 15.5026 18.4381 15.362 18.5762 15.1276C18.7116 14.8932 18.7116 14.6068 18.5762 14.3724C18.4381 14.138 18.1881 13.9974 17.9173 14H13.9173ZM13.9173 16.5C13.6465 16.4974 13.3965 16.638 13.2584 16.8724C13.123 17.1068 13.123 17.3932 13.2584 17.6276C13.3965 17.862 13.6465 18.0026 13.9173 18H15.9173C16.1881 18.0026 16.4381 17.862 16.5762 17.6276C16.7116 17.3932 16.7116 17.1068 16.5762 16.8724C16.4381 16.638 16.1881 16.4974 15.9173 16.5H13.9173Z" fill="url(#Project_224)"/><defs><linearGradient id="Project_224" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Project Templates', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo esc_html( sprintf( __( '%1$d saved', 'marketingops' ), $saved_templates ) ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- downloads -->
		<li>
			<a href="/my-account/downloads/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M18.2507 3H14.959C14.5449 3 14.209 3.33594 14.209 3.75C14.209 5.40104 12.8887 6 12.0007 6C11.1127 6 9.79234 5.40104 9.79234 3.75C9.79234 3.33594 9.4564 3 9.04234 3H5.75067C4.23505 3 3.00067 4.23437 3.00067 5.75V18.25C3.00067 19.7656 4.23505 21 5.75067 21H18.2507C19.7663 21 21.0007 19.7656 21.0007 18.25V5.75C21.0007 4.23437 19.7663 3 18.2507 3ZM15.5319 14.2812L12.5319 17.2812C12.4616 17.349 12.3783 17.4063 12.2871 17.4427C12.2819 17.4453 12.2793 17.4453 12.2741 17.4479C12.1882 17.4792 12.097 17.5 12.0007 17.5C11.9043 17.5 11.8132 17.4792 11.7272 17.4479C11.722 17.4453 11.7194 17.4453 11.7168 17.4427C11.6231 17.4063 11.5397 17.349 11.4694 17.2812L8.46942 14.2812C8.17775 13.987 8.17775 13.513 8.46942 13.2187C8.76369 12.9271 9.23765 12.9271 9.53192 13.2187L11.2507 14.9401V10.25C11.2507 9.83594 11.5866 9.5 12.0007 9.5C12.4147 9.5 12.7507 9.83594 12.7507 10.25V14.9401L14.4694 13.2187C14.7637 12.9271 15.2377 12.9271 15.5319 13.2187C15.8236 13.513 15.8236 13.987 15.5319 14.2812Z" fill="#6D7B83"/></svg></i>
							<i> 
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M18.2507 3H14.959C14.5449 3 14.209 3.33594 14.209 3.75C14.209 5.40104 12.8887 6 12.0007 6C11.1127 6 9.79234 5.40104 9.79234 3.75C9.79234 3.33594 9.4564 3 9.04234 3H5.75067C4.23505 3 3.00067 4.23437 3.00067 5.75V18.25C3.00067 19.7656 4.23505 21 5.75067 21H18.2507C19.7663 21 21.0007 19.7656 21.0007 18.25V5.75C21.0007 4.23437 19.7663 3 18.2507 3ZM15.5319 14.2812L12.5319 17.2812C12.4616 17.349 12.3783 17.4063 12.2871 17.4427C12.2819 17.4453 12.2793 17.4453 12.2741 17.4479C12.1882 17.4792 12.097 17.5 12.0007 17.5C11.9043 17.5 11.8132 17.4792 11.7272 17.4479C11.722 17.4453 11.7194 17.4453 11.7168 17.4427C11.6231 17.4063 11.5397 17.349 11.4694 17.2812L8.46942 14.2812C8.17775 13.987 8.17775 13.513 8.46942 13.2187C8.76369 12.9271 9.23765 12.9271 9.53192 13.2187L11.2507 14.9401V10.25C11.2507 9.83594 11.5866 9.5 12.0007 9.5C12.4147 9.5 12.7507 9.83594 12.7507 10.25V14.9401L14.4694 13.2187C14.7637 12.9271 15.2377 12.9271 15.5319 13.2187C15.8236 13.513 15.8236 13.987 15.5319 14.2812Z" fill="url(#Downloads_224)"/><defs><linearGradient id="Downloads_224" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Downloads', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo esc_html( sprintf( __( '%1$d saved', 'marketingops' ), $downloads_count ) ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- course certificates -->
		<li>
			<a href="/my-account/ld-certificates/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M4.91602 4C3.67643 4 2.66602 5.01042 2.66602 6.25V17.75C2.66602 18.9896 3.67643 20 4.91602 20H10.666V21.75C10.666 22.0182 10.8092 22.2656 11.0384 22.3984C11.2702 22.5339 11.5566 22.5339 11.7884 22.401L12.666 21.8984L13.5436 22.401C13.6582 22.4661 13.7884 22.5 13.916 22.5C14.0462 22.5 14.1764 22.4661 14.2936 22.3984C14.5228 22.2656 14.666 22.0182 14.666 21.75V20H20.416C21.6556 20 22.666 18.9896 22.666 17.75V6.25C22.666 5.01042 21.6556 4 20.416 4H4.91602ZM6.91602 7.5H18.416C18.8301 7.5 19.166 7.83594 19.166 8.25C19.166 8.66406 18.8301 9 18.416 9H6.91602C6.50195 9 6.16602 8.66406 6.16602 8.25C6.16602 7.83594 6.50195 7.5 6.91602 7.5ZM7.91602 10.5H17.416C17.8301 10.5 18.166 10.8359 18.166 11.25C18.166 11.6641 17.8301 12 17.416 12H7.91602C7.50195 12 7.16602 11.6641 7.16602 11.25C7.16602 10.8359 7.50195 10.5 7.91602 10.5ZM12.666 14C14.0462 14 15.166 15.1198 15.166 16.5C15.166 17.8802 14.0462 19 12.666 19C11.2858 19 10.166 17.8802 10.166 16.5C10.166 15.1198 11.2858 14 12.666 14Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4.91602 4C3.67643 4 2.66602 5.01042 2.66602 6.25V17.75C2.66602 18.9896 3.67643 20 4.91602 20H10.666V21.75C10.666 22.0182 10.8092 22.2656 11.0384 22.3984C11.2702 22.5339 11.5566 22.5339 11.7884 22.401L12.666 21.8984L13.5436 22.401C13.6582 22.4661 13.7884 22.5 13.916 22.5C14.0462 22.5 14.1764 22.4661 14.2936 22.3984C14.5228 22.2656 14.666 22.0182 14.666 21.75V20H20.416C21.6556 20 22.666 18.9896 22.666 17.75V6.25C22.666 5.01042 21.6556 4 20.416 4H4.91602ZM6.91602 7.5H18.416C18.8301 7.5 19.166 7.83594 19.166 8.25C19.166 8.66406 18.8301 9 18.416 9H6.91602C6.50195 9 6.16602 8.66406 6.16602 8.25C6.16602 7.83594 6.50195 7.5 6.91602 7.5ZM7.91602 10.5H17.416C17.8301 10.5 18.166 10.8359 18.166 11.25C18.166 11.6641 17.8301 12 17.416 12H7.91602C7.50195 12 7.16602 11.6641 7.16602 11.25C7.16602 10.8359 7.50195 10.5 7.91602 10.5ZM12.666 14C14.0462 14 15.166 15.1198 15.166 16.5C15.166 17.8802 14.0462 19 12.666 19C11.2858 19 10.166 17.8802 10.166 16.5C10.166 15.1198 11.2858 14 12.666 14Z" fill="url(#course)"/><defs><linearGradient id="course" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Course Certificates', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo esc_html( $certificates_message ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- orders -->
		<li>
			<a href="<?php echo esc_url( ( false !== $customer_order ) ? $customer_order->get_view_order_url() : '#' ); ?>">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 24" fill="none"> <path d="M15.4271 1.6875C15.2213 1.6875 15.0156 1.73177 14.8151 1.81771L10.3724 3.7474C10.0677 3.88021 9.79165 4.08855 9.61457 4.3724C9.33332 4.82813 9.29686 5.3698 9.50259 5.84375L10.7448 8.70313C11.0338 9.36459 11.8073 9.66667 12.4687 9.3724L17.4453 7.16407C18.1015 6.8724 18.3984 6.10938 18.1146 5.45313L16.888 2.63542C16.6276 2.03646 16.039 1.67969 15.4271 1.6875ZM5.49217 3.9948C5.14582 4.00782 4.79425 4.08855 4.46353 4.25L2.7578 5.07552C2.50519 5.1849 2.33332 5.42448 2.30988 5.69792C2.28644 5.97136 2.41405 6.23698 2.64321 6.38802C2.87238 6.53907 3.16665 6.55469 3.40884 6.42448L5.11717 5.59896C5.68748 5.32292 6.34894 5.57292 6.59373 6.15625L10.9844 16.5833C11.0495 16.7422 11.1302 16.8906 11.2161 17.0365C10.151 17.2135 9.33332 18.1354 9.33332 19.25C9.33332 20.4896 10.3437 21.5 11.5833 21.5C12.8229 21.5 13.8333 20.4896 13.8333 19.25C13.8333 19.1328 13.8151 19.0182 13.7995 18.9037C14.5807 19.0729 15.4219 19.013 16.2083 18.6667V18.6693L22.0338 16.1146C22.2838 16.0104 22.4583 15.7787 22.4896 15.5104C22.5208 15.2422 22.4062 14.9766 22.1875 14.8177C21.9661 14.6563 21.6797 14.6276 21.4323 14.7422L15.6068 17.2943C14.3463 17.8464 12.901 17.2682 12.3646 16H12.3672L7.97655 5.57552C7.54686 4.5573 6.53123 3.96094 5.49217 3.9948ZM18.5338 8.4375C18.3646 8.44011 18.1927 8.47657 18.026 8.54948L13.0495 10.7578C12.3932 11.0495 12.0963 11.8125 12.3828 12.4688L13.5 15.0417C13.7578 15.6328 14.3385 15.9896 14.9479 15.9896C15.1562 15.9896 15.3698 15.9479 15.5729 15.8594L20.0677 13.9063C20.5443 13.7005 20.8828 13.2813 20.9896 12.7526C21.0547 12.4245 20.9948 12.0833 20.862 11.7787L19.75 9.22136C19.5338 8.72396 19.0443 8.42969 18.5338 8.4375Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M15.4271 1.6875C15.2213 1.6875 15.0156 1.73177 14.8151 1.81771L10.3724 3.7474C10.0677 3.88021 9.79165 4.08855 9.61457 4.3724C9.33332 4.82813 9.29686 5.3698 9.50259 5.84375L10.7448 8.70313C11.0338 9.36459 11.8073 9.66667 12.4687 9.3724L17.4453 7.16407C18.1015 6.8724 18.3984 6.10938 18.1146 5.45313L16.888 2.63542C16.6276 2.03646 16.039 1.67969 15.4271 1.6875ZM5.49217 3.9948C5.14582 4.00782 4.79425 4.08855 4.46353 4.25L2.7578 5.07552C2.50519 5.1849 2.33332 5.42448 2.30988 5.69792C2.28644 5.97136 2.41405 6.23698 2.64321 6.38802C2.87238 6.53907 3.16665 6.55469 3.40884 6.42448L5.11717 5.59896C5.68748 5.32292 6.34894 5.57292 6.59373 6.15625L10.9844 16.5833C11.0495 16.7422 11.1302 16.8906 11.2161 17.0365C10.151 17.2135 9.33332 18.1354 9.33332 19.25C9.33332 20.4896 10.3437 21.5 11.5833 21.5C12.8229 21.5 13.8333 20.4896 13.8333 19.25C13.8333 19.1328 13.8151 19.0182 13.7995 18.9037C14.5807 19.0729 15.4219 19.013 16.2083 18.6667V18.6693L22.0338 16.1146C22.2838 16.0104 22.4583 15.7787 22.4896 15.5104C22.5208 15.2422 22.4062 14.9766 22.1875 14.8177C21.9661 14.6563 21.6797 14.6276 21.4323 14.7422L15.6068 17.2943C14.3463 17.8464 12.901 17.2682 12.3646 16H12.3672L7.97655 5.57552C7.54686 4.5573 6.53123 3.96094 5.49217 3.9948ZM18.5338 8.4375C18.3646 8.44011 18.1927 8.47657 18.026 8.54948L13.0495 10.7578C12.3932 11.0495 12.0963 11.8125 12.3828 12.4688L13.5 15.0417C13.7578 15.6328 14.3385 15.9896 14.9479 15.9896C15.1562 15.9896 15.3698 15.9479 15.5729 15.8594L20.0677 13.9063C20.5443 13.7005 20.8828 13.2813 20.9896 12.7526C21.0547 12.4245 20.9948 12.0833 20.862 11.7787L19.75 9.22136C19.5338 8.72396 19.0443 8.42969 18.5338 8.4375Z" fill="url(#orders)"/><defs><linearGradient id="orders" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Orders', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li>
									<?php
									$order_total = ( false !== $customer_order ) ? $customer_order->get_formatted_order_total() : wc_price( 0 );
									/* translators: 1: order date */
									echo wp_kses_post( sprintf( __( 'last ordered on %2$s%1$s%3$s', 'marketingops' ), $order_date, '<strong>', '</strong>' ) );
									/* translators: 1: formatted order total 2: total order items */
									echo wp_kses_post( sprintf( _n( ' and paid %3$s%1$s%4$s for %3$s%2$s%4$s item', ' and paid %3$s%1$s%4$s for %3$s%2$s%4$s items', $order_item_count, 'woocommerce' ), $order_total, $order_item_count, '<strong>', '</strong>' ) );
									?>
								</li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- my articles and content -->
		<?php
		/**
		 * My articles and content section to be visible to only the following user roles.
		 * Administrator, Ambassador, Agency Owner.
		 * Task: https://app.clickup.com/t/868aa271h
		 */
		$is_ambassador    = mops_is_user_ambassador( $current_user->ID );
		$is_administrator = ( ! empty( $current_user->roles ) && in_array( 'administrator', $current_user->roles, true ) ) ? true : false;
		$is_agency_owner  = mops_is_user_agency_partner( $current_user->ID, true );

		if ( true === $is_ambassador || true === $is_administrator || true === $is_agency_owner ) {
			?>
			<li>
				<a href="<?php echo esc_url( ( mops_is_user_ambassador( $current_user->ID ) ) ? home_url( '/post-new/?source=customer-dashboard' ) : home_url( '/marketing-operations-community-ambassador-application/' ) ); ?>">
					<div class="innerdashbordlist">
						<div class="innsersubdashbordlist">
							<div class="iconwithtitledashbord">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9.25067 2.5C7.73467 2.5 6.50067 3.7335 6.50067 5.25V16.25C6.50067 17.7665 7.73467 19 9.25067 19H17.2507C18.7667 19 20.0007 17.7665 20.0007 16.25V9.5H15.0192C13.9062 9.5 13.0007 8.59397 13.0007 7.48047V2.5H9.25067ZM14.5007 2.93945V7.48145C14.5007 7.76745 14.7332 8 15.0192 8H19.5612L14.5007 2.93945ZM5.50067 5L4.8913 5.40625C4.3348 5.77725 4.00067 6.40181 4.00067 7.07031V16.75C4.00067 19.3735 6.12717 21.5 8.75067 21.5H15.4304C16.0994 21.5 16.7239 21.1659 17.0944 20.6094L17.5007 20H8.75067C6.95567 20 5.50067 18.545 5.50067 16.75V5ZM10.7507 11.5H15.7507C16.1647 11.5 16.5007 11.8355 16.5007 12.25C16.5007 12.6645 16.1647 13 15.7507 13H10.7507C10.3367 13 10.0007 12.6645 10.0007 12.25C10.0007 11.8355 10.3367 11.5 10.7507 11.5ZM10.7507 14.5H15.7507C16.1647 14.5 16.5007 14.8355 16.5007 15.25C16.5007 15.6645 16.1647 16 15.7507 16H10.7507C10.3367 16 10.0007 15.6645 10.0007 15.25C10.0007 14.8355 10.3367 14.5 10.7507 14.5Z" fill="#6D7B83"/></svg></i>
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9.25067 2.5C7.73467 2.5 6.50067 3.7335 6.50067 5.25V16.25C6.50067 17.7665 7.73467 19 9.25067 19H17.2507C18.7667 19 20.0007 17.7665 20.0007 16.25V9.5H15.0192C13.9062 9.5 13.0007 8.59397 13.0007 7.48047V2.5H9.25067ZM14.5007 2.93945V7.48145C14.5007 7.76745 14.7332 8 15.0192 8H19.5612L14.5007 2.93945ZM5.50067 5L4.8913 5.40625C4.3348 5.77725 4.00067 6.40181 4.00067 7.07031V16.75C4.00067 19.3735 6.12717 21.5 8.75067 21.5H15.4304C16.0994 21.5 16.7239 21.1659 17.0944 20.6094L17.5007 20H8.75067C6.95567 20 5.50067 18.545 5.50067 16.75V5ZM10.7507 11.5H15.7507C16.1647 11.5 16.5007 11.8355 16.5007 12.25C16.5007 12.6645 16.1647 13 15.7507 13H10.7507C10.3367 13 10.0007 12.6645 10.0007 12.25C10.0007 11.8355 10.3367 11.5 10.7507 11.5ZM10.7507 14.5H15.7507C16.1647 14.5 16.5007 14.8355 16.5007 15.25C16.5007 15.6645 16.1647 16 15.7507 16H10.7507C10.3367 16 10.0007 15.6645 10.0007 15.25C10.0007 14.8355 10.3367 14.5 10.7507 14.5Z" fill="url(#Articles)"/><defs><linearGradient id="Articles" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
								<h4><?php esc_html_e( 'My Articles & Content', 'marketingops' ); ?></h4>
							</div>
							<div class="bottomdashbordlist">
								<ul>
									<li>
										<?php
										echo wp_kses_post(
											sprintf(
												__( '%1$s%3$d%2$s articles, %1$s%4$d%2$s podcasts, %1$s%5$d%2$s workshops, %1$s%6$d%2$s courses', 'marketingops' ),
												'<strong>',
												'</strong>',
												$posts_wp_query->found_posts,
												$podcasts_wp_query->found_posts,
												$workshops_wp_query->found_posts,
												count( $learndash_courses )
											)
										);
										?></li>
								</ul>
							</div>
							<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
						</div>
					</div>
				</a>
			</li>
		<?php } ?>

		<!-- agency profile -->
		<li>
			<a href="javascript:void(0);">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M4.91797 2.50001C4.64714 2.4948 4.39714 2.64064 4.26172 2.8698C4.12109 3.10418 4.12109 3.39585 4.26172 3.63022C4.39714 3.85939 4.64714 4.00522 4.91797 4.00001H5.66797V14.0156C4.81901 14.1406 4.16797 14.8698 4.16797 15.75V20.75C4.16797 21.1615 4.50651 21.5 4.91797 21.5H10.418C10.8294 21.5 11.168 21.1615 11.168 20.75V17.5C11.168 17.224 11.3919 17 11.668 17H13.668C13.944 17 14.168 17.224 14.168 17.5V20.75C14.168 21.1615 14.5065 21.5 14.918 21.5H20.418C20.8294 21.5 21.168 21.1615 21.168 20.75V15.75C21.168 14.8698 20.5169 14.1406 19.668 14.0156V4.00001H20.418C20.6888 4.00522 20.9388 3.85939 21.0742 3.63022C21.2148 3.39585 21.2148 3.10418 21.0742 2.8698C20.9388 2.64064 20.6888 2.4948 20.418 2.50001H4.91797ZM8.66797 6.00001H9.66797C9.94401 6.00001 10.168 6.22397 10.168 6.50001V7.50001C10.168 7.77605 9.94401 8.00001 9.66797 8.00001H8.66797C8.39193 8.00001 8.16797 7.77605 8.16797 7.50001V6.50001C8.16797 6.22397 8.39193 6.00001 8.66797 6.00001ZM12.168 6.00001H13.168C13.444 6.00001 13.668 6.22397 13.668 6.50001V7.50001C13.668 7.77605 13.444 8.00001 13.168 8.00001H12.168C11.8919 8.00001 11.668 7.77605 11.668 7.50001V6.50001C11.668 6.22397 11.8919 6.00001 12.168 6.00001ZM15.668 6.00001H16.668C16.944 6.00001 17.168 6.22397 17.168 6.50001V7.50001C17.168 7.77605 16.944 8.00001 16.668 8.00001H15.668C15.3919 8.00001 15.168 7.77605 15.168 7.50001V6.50001C15.168 6.22397 15.3919 6.00001 15.668 6.00001ZM8.66797 9.50001H9.66797C9.94401 9.50001 10.168 9.72397 10.168 10V11C10.168 11.2761 9.94401 11.5 9.66797 11.5H8.66797C8.39193 11.5 8.16797 11.2761 8.16797 11V10C8.16797 9.72397 8.39193 9.50001 8.66797 9.50001ZM12.168 9.50001H13.168C13.444 9.50001 13.668 9.72397 13.668 10V11C13.668 11.2761 13.444 11.5 13.168 11.5H12.168C11.8919 11.5 11.668 11.2761 11.668 11V10C11.668 9.72397 11.8919 9.50001 12.168 9.50001ZM15.668 9.50001H16.668C16.944 9.50001 17.168 9.72397 17.168 10V11C17.168 11.2761 16.944 11.5 16.668 11.5H15.668C15.3919 11.5 15.168 11.2761 15.168 11V10C15.168 9.72397 15.3919 9.50001 15.668 9.50001ZM8.66797 13H9.66797C9.94401 13 10.168 13.224 10.168 13.5V14.5C10.168 14.7761 9.94401 15 9.66797 15H8.66797C8.39193 15 8.16797 14.7761 8.16797 14.5V13.5C8.16797 13.224 8.39193 13 8.66797 13ZM12.168 13H13.168C13.444 13 13.668 13.224 13.668 13.5V14.5C13.668 14.7761 13.444 15 13.168 15H12.168C11.8919 15 11.668 14.7761 11.668 14.5V13.5C11.668 13.224 11.8919 13 12.168 13ZM15.668 13H16.668C16.944 13 17.168 13.224 17.168 13.5V14.5C17.168 14.7761 16.944 15 16.668 15H15.668C15.3919 15 15.168 14.7761 15.168 14.5V13.5C15.168 13.224 15.3919 13 15.668 13ZM7.16797 17H8.16797C8.44401 17 8.66797 17.224 8.66797 17.5V18.5C8.66797 18.7761 8.44401 19 8.16797 19H7.16797C6.89193 19 6.66797 18.7761 6.66797 18.5V17.5C6.66797 17.224 6.89193 17 7.16797 17ZM17.168 17H18.168C18.444 17 18.668 17.224 18.668 17.5V18.5C18.668 18.7761 18.444 19 18.168 19H17.168C16.8919 19 16.668 18.7761 16.668 18.5V17.5C16.668 17.224 16.8919 17 17.168 17Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4.91797 2.50001C4.64714 2.4948 4.39714 2.64064 4.26172 2.8698C4.12109 3.10418 4.12109 3.39585 4.26172 3.63022C4.39714 3.85939 4.64714 4.00522 4.91797 4.00001H5.66797V14.0156C4.81901 14.1406 4.16797 14.8698 4.16797 15.75V20.75C4.16797 21.1615 4.50651 21.5 4.91797 21.5H10.418C10.8294 21.5 11.168 21.1615 11.168 20.75V17.5C11.168 17.224 11.3919 17 11.668 17H13.668C13.944 17 14.168 17.224 14.168 17.5V20.75C14.168 21.1615 14.5065 21.5 14.918 21.5H20.418C20.8294 21.5 21.168 21.1615 21.168 20.75V15.75C21.168 14.8698 20.5169 14.1406 19.668 14.0156V4.00001H20.418C20.6888 4.00522 20.9388 3.85939 21.0742 3.63022C21.2148 3.39585 21.2148 3.10418 21.0742 2.8698C20.9388 2.64064 20.6888 2.4948 20.418 2.50001H4.91797ZM8.66797 6.00001H9.66797C9.94401 6.00001 10.168 6.22397 10.168 6.50001V7.50001C10.168 7.77605 9.94401 8.00001 9.66797 8.00001H8.66797C8.39193 8.00001 8.16797 7.77605 8.16797 7.50001V6.50001C8.16797 6.22397 8.39193 6.00001 8.66797 6.00001ZM12.168 6.00001H13.168C13.444 6.00001 13.668 6.22397 13.668 6.50001V7.50001C13.668 7.77605 13.444 8.00001 13.168 8.00001H12.168C11.8919 8.00001 11.668 7.77605 11.668 7.50001V6.50001C11.668 6.22397 11.8919 6.00001 12.168 6.00001ZM15.668 6.00001H16.668C16.944 6.00001 17.168 6.22397 17.168 6.50001V7.50001C17.168 7.77605 16.944 8.00001 16.668 8.00001H15.668C15.3919 8.00001 15.168 7.77605 15.168 7.50001V6.50001C15.168 6.22397 15.3919 6.00001 15.668 6.00001ZM8.66797 9.50001H9.66797C9.94401 9.50001 10.168 9.72397 10.168 10V11C10.168 11.2761 9.94401 11.5 9.66797 11.5H8.66797C8.39193 11.5 8.16797 11.2761 8.16797 11V10C8.16797 9.72397 8.39193 9.50001 8.66797 9.50001ZM12.168 9.50001H13.168C13.444 9.50001 13.668 9.72397 13.668 10V11C13.668 11.2761 13.444 11.5 13.168 11.5H12.168C11.8919 11.5 11.668 11.2761 11.668 11V10C11.668 9.72397 11.8919 9.50001 12.168 9.50001ZM15.668 9.50001H16.668C16.944 9.50001 17.168 9.72397 17.168 10V11C17.168 11.2761 16.944 11.5 16.668 11.5H15.668C15.3919 11.5 15.168 11.2761 15.168 11V10C15.168 9.72397 15.3919 9.50001 15.668 9.50001ZM8.66797 13H9.66797C9.94401 13 10.168 13.224 10.168 13.5V14.5C10.168 14.7761 9.94401 15 9.66797 15H8.66797C8.39193 15 8.16797 14.7761 8.16797 14.5V13.5C8.16797 13.224 8.39193 13 8.66797 13ZM12.168 13H13.168C13.444 13 13.668 13.224 13.668 13.5V14.5C13.668 14.7761 13.444 15 13.168 15H12.168C11.8919 15 11.668 14.7761 11.668 14.5V13.5C11.668 13.224 11.8919 13 12.168 13ZM15.668 13H16.668C16.944 13 17.168 13.224 17.168 13.5V14.5C17.168 14.7761 16.944 15 16.668 15H15.668C15.3919 15 15.168 14.7761 15.168 14.5V13.5C15.168 13.224 15.3919 13 15.668 13ZM7.16797 17H8.16797C8.44401 17 8.66797 17.224 8.66797 17.5V18.5C8.66797 18.7761 8.44401 19 8.16797 19H7.16797C6.89193 19 6.66797 18.7761 6.66797 18.5V17.5C6.66797 17.224 6.89193 17 7.16797 17ZM17.168 17H18.168C18.444 17 18.668 17.224 18.668 17.5V18.5C18.668 18.7761 18.444 19 18.168 19H17.168C16.8919 19 16.668 18.7761 16.668 18.5V17.5C16.668 17.224 16.8919 17 17.168 17Z" fill="url(#Agency)"/><defs><linearGradient id="Agency" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Agency Profile', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php esc_html_e( 'Register your agency with MarketingOps', 'marketingops' ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- platform profile -->
		<li>
			<a href="javascript:void(0);">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><g clip-path="url(#clip0_0_247)"><path d="M18.6673 1.5C18.3756 1.5 18.084 1.52604 17.8079 1.57292L17.6308 2.28646C17.3652 3.40104 16.2194 4.0625 15.1204 3.73958L14.5215 3.55729C14.1569 4.02604 13.8652 4.55729 13.6673 5.13021L14.1152 5.55729C14.9329 6.34375 14.9329 7.65625 14.1152 8.44271L13.6673 8.86979C13.8652 9.44792 14.1569 9.97396 14.5215 10.4427L15.1204 10.2656C16.2194 9.9375 17.3652 10.599 17.6308 11.7135L17.8079 12.4271C18.084 12.474 18.3756 12.5 18.6673 12.5C18.959 12.5 19.2506 12.474 19.5267 12.4271L19.7038 11.7135C19.9694 10.599 21.1152 9.9375 22.2142 10.2604L22.8131 10.4427C23.1777 9.97396 23.4694 9.44271 23.6673 8.86979L23.2194 8.44271C22.4017 7.65625 22.4017 6.34375 23.2194 5.55729L23.6673 5.13021C23.4694 4.55729 23.1777 4.02604 22.8131 3.55729L22.2142 3.73958C21.1152 4.0625 19.9694 3.40104 19.7038 2.28646L19.5267 1.57292C19.2506 1.52604 18.959 1.5 18.6673 1.5ZM4.9173 4.5C3.95376 4.5 3.1673 5.28646 3.1673 6.25V15.75C3.1673 16.7135 3.95376 17.5 4.9173 17.5H20.4173C21.3808 17.5 22.1673 16.7135 22.1673 15.75V12.474C21.1569 13.125 19.959 13.5 18.6673 13.5C15.0788 13.5 12.1673 10.5885 12.1673 7C12.1673 6.11458 12.3496 5.27083 12.6673 4.5H4.9173ZM18.6673 5.5C19.4954 5.5 20.1673 6.17188 20.1673 7C20.1673 7.82813 19.4954 8.5 18.6673 8.5C17.8392 8.5 17.1673 7.82813 17.1673 7C17.1673 6.17188 17.8392 5.5 18.6673 5.5ZM1.9173 19C1.64646 18.9948 1.39646 19.1406 1.26105 19.3698C1.12042 19.6042 1.12042 19.8958 1.26105 20.1302C1.39646 20.3594 1.64646 20.5052 1.9173 20.5H23.4173C23.6881 20.5052 23.9381 20.3594 24.0735 20.1302C24.2142 19.8958 24.2142 19.6042 24.0735 19.3698C23.9381 19.1406 23.6881 18.9948 23.4173 19H1.9173Z" fill="#6D7B83"/></g><defs><clipPath id="clip0_0_247"><rect width="24" height="24" fill="white" transform="translate(0.667297)"/></clipPath></defs></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_0_247)"><path d="M18.6673 1.5C18.3756 1.5 18.084 1.52604 17.8079 1.57292L17.6308 2.28646C17.3652 3.40104 16.2194 4.0625 15.1204 3.73958L14.5215 3.55729C14.1569 4.02604 13.8652 4.55729 13.6673 5.13021L14.1152 5.55729C14.9329 6.34375 14.9329 7.65625 14.1152 8.44271L13.6673 8.86979C13.8652 9.44792 14.1569 9.97396 14.5215 10.4427L15.1204 10.2656C16.2194 9.9375 17.3652 10.599 17.6308 11.7135L17.8079 12.4271C18.084 12.474 18.3756 12.5 18.6673 12.5C18.959 12.5 19.2506 12.474 19.5267 12.4271L19.7038 11.7135C19.9694 10.599 21.1152 9.9375 22.2142 10.2604L22.8131 10.4427C23.1777 9.97396 23.4694 9.44271 23.6673 8.86979L23.2194 8.44271C22.4017 7.65625 22.4017 6.34375 23.2194 5.55729L23.6673 5.13021C23.4694 4.55729 23.1777 4.02604 22.8131 3.55729L22.2142 3.73958C21.1152 4.0625 19.9694 3.40104 19.7038 2.28646L19.5267 1.57292C19.2506 1.52604 18.959 1.5 18.6673 1.5ZM4.9173 4.5C3.95376 4.5 3.1673 5.28646 3.1673 6.25V15.75C3.1673 16.7135 3.95376 17.5 4.9173 17.5H20.4173C21.3808 17.5 22.1673 16.7135 22.1673 15.75V12.474C21.1569 13.125 19.959 13.5 18.6673 13.5C15.0788 13.5 12.1673 10.5885 12.1673 7C12.1673 6.11458 12.3496 5.27083 12.6673 4.5H4.9173ZM18.6673 5.5C19.4954 5.5 20.1673 6.17188 20.1673 7C20.1673 7.82813 19.4954 8.5 18.6673 8.5C17.8392 8.5 17.1673 7.82813 17.1673 7C17.1673 6.17188 17.8392 5.5 18.6673 5.5ZM1.9173 19C1.64646 18.9948 1.39646 19.1406 1.26105 19.3698C1.12042 19.6042 1.12042 19.8958 1.26105 20.1302C1.39646 20.3594 1.64646 20.5052 1.9173 20.5H23.4173C23.6881 20.5052 23.9381 20.3594 24.0735 20.1302C24.2142 19.8958 24.2142 19.6042 24.0735 19.3698C23.9381 19.1406 23.6881 18.9948 23.4173 19H1.9173Z" fill="url(#Platform)"/></g><defs><clipPath id="clip0_0_247"><rect width="24" height="24" fill="white" transform="translate(0.667297)"/></clipPath><linearGradient id="Platform" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Platform Profile', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php esc_html_e( 'Register your platform with MarketingOps', 'marketingops' ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- active membership -->
		<li>
			<a href="/my-account/members-area/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M20.0827 3.5H4.5827C3.06708 3.5 1.8327 4.73437 1.8327 6.25V17.75C1.8327 19.2656 3.06708 20.5 4.5827 20.5H20.0827C21.5983 20.5 22.8327 19.2656 22.8327 17.75V6.25C22.8327 4.73437 21.5983 3.5 20.0827 3.5ZM16.9291 11.4167L14.9968 13.2812L15.4525 15.9141C15.4863 16.1016 15.4108 16.2917 15.2572 16.4036C15.1686 16.4688 15.0645 16.5 14.9603 16.5C14.8822 16.5 14.8041 16.4818 14.7311 16.4427L12.3327 15.1953L9.93427 16.4427C9.76499 16.5313 9.56447 16.5156 9.40822 16.4036C9.25458 16.2917 9.17906 16.1016 9.21291 15.9141L9.66864 13.2812L7.73635 11.4167C7.59833 11.2839 7.54885 11.0859 7.60614 10.9036C7.66604 10.7214 7.82229 10.5885 8.01239 10.5625L10.6895 10.1771L11.8848 7.77604C12.0541 7.4375 12.6113 7.4375 12.7806 7.77604L13.9785 10.1771L16.6556 10.5625C16.8431 10.5885 17.002 10.7214 17.0593 10.9036C17.1166 11.0859 17.0671 11.2839 16.9291 11.4167Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 25 24" fill="none"><path d="M20.0827 3.5H4.5827C3.06708 3.5 1.8327 4.73437 1.8327 6.25V17.75C1.8327 19.2656 3.06708 20.5 4.5827 20.5H20.0827C21.5983 20.5 22.8327 19.2656 22.8327 17.75V6.25C22.8327 4.73437 21.5983 3.5 20.0827 3.5ZM16.9291 11.4167L14.9968 13.2812L15.4525 15.9141C15.4863 16.1016 15.4108 16.2917 15.2572 16.4036C15.1686 16.4688 15.0645 16.5 14.9603 16.5C14.8822 16.5 14.8041 16.4818 14.7311 16.4427L12.3327 15.1953L9.93427 16.4427C9.76499 16.5313 9.56447 16.5156 9.40822 16.4036C9.25458 16.2917 9.17906 16.1016 9.21291 15.9141L9.66864 13.2812L7.73635 11.4167C7.59833 11.2839 7.54885 11.0859 7.60614 10.9036C7.66604 10.7214 7.82229 10.5885 8.01239 10.5625L10.6895 10.1771L11.8848 7.77604C12.0541 7.4375 12.6113 7.4375 12.7806 7.77604L13.9785 10.1771L16.6556 10.5625C16.8431 10.5885 17.002 10.7214 17.0593 10.9036C17.1166 11.0859 17.0671 11.2839 16.9291 11.4167Z" fill="url(#Memberships)"/><defs><linearGradient id="Memberships" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Active Membership', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo wp_kses_post( $membership_message ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- payment methods -->
		<li>
			<a href="/my-account/payment-methods/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M9.23112 4C8.0905 4 7.16602 4.9349 7.16602 6.09115V6.5H23.166V6.09115C23.166 4.9349 22.2415 4 21.1009 4H9.23112ZM7.16602 8V13.1432L10.6973 10.8932C11.1061 10.6406 11.5801 10.5104 12.0592 10.5104C12.7103 10.5104 13.3301 10.7448 13.8066 11.1797C14.3301 11.6536 14.6374 12.3099 14.6608 13.0156C14.6868 13.7188 14.4316 14.3906 13.9499 14.8932L13.3848 15.5H21.1009C22.2415 15.5 23.166 14.5651 23.166 13.4089V8H7.16602ZM6.16602 8.05469L4.83529 8.46615C4.24154 8.65104 3.71029 9.01823 3.33008 9.51823L2.17643 11.0391C1.8457 11.474 1.66602 12.0052 1.66602 12.5495V20C1.66602 20.0677 1.67383 20.1354 1.68685 20.2005C1.69987 20.2656 1.7207 20.3281 1.74414 20.388C1.75977 20.4193 1.77799 20.4505 1.79622 20.4818C1.80924 20.5052 1.81966 20.5339 1.83789 20.5573C1.83789 20.5573 1.83789 20.5573 1.83789 20.5599C1.87435 20.612 1.91602 20.6615 1.96029 20.7057C2.00456 20.75 2.05404 20.7917 2.10872 20.8281C2.26758 20.9375 2.46029 21 2.66602 21H4.66602V20.9974H5.1556C6.26497 20.9948 7.32227 20.5339 8.08008 19.724L13.2181 14.2135C13.8405 13.5625 13.804 12.5286 13.1374 11.9219C12.6087 11.4453 11.8275 11.3724 11.2207 11.7474L6.91602 14.4948L6.9655 14.4453C6.5905 14.5807 6.16602 14.3047 6.16602 13.8802V8.05469ZM12.4499 16.5L8.80925 20.4062C8.60612 20.625 8.37956 20.8255 8.13997 21.0052L10.6556 21C11.765 21 12.8223 20.5417 13.5749 19.7318L16.5905 16.5H12.4499Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9.23112 4C8.0905 4 7.16602 4.9349 7.16602 6.09115V6.5H23.166V6.09115C23.166 4.9349 22.2415 4 21.1009 4H9.23112ZM7.16602 8V13.1432L10.6973 10.8932C11.1061 10.6406 11.5801 10.5104 12.0592 10.5104C12.7103 10.5104 13.3301 10.7448 13.8066 11.1797C14.3301 11.6536 14.6374 12.3099 14.6608 13.0156C14.6868 13.7188 14.4316 14.3906 13.9499 14.8932L13.3848 15.5H21.1009C22.2415 15.5 23.166 14.5651 23.166 13.4089V8H7.16602ZM6.16602 8.05469L4.83529 8.46615C4.24154 8.65104 3.71029 9.01823 3.33008 9.51823L2.17643 11.0391C1.8457 11.474 1.66602 12.0052 1.66602 12.5495V20C1.66602 20.0677 1.67383 20.1354 1.68685 20.2005C1.69987 20.2656 1.7207 20.3281 1.74414 20.388C1.75977 20.4193 1.77799 20.4505 1.79622 20.4818C1.80924 20.5052 1.81966 20.5339 1.83789 20.5573C1.83789 20.5573 1.83789 20.5573 1.83789 20.5599C1.87435 20.612 1.91602 20.6615 1.96029 20.7057C2.00456 20.75 2.05404 20.7917 2.10872 20.8281C2.26758 20.9375 2.46029 21 2.66602 21H4.66602V20.9974H5.1556C6.26497 20.9948 7.32227 20.5339 8.08008 19.724L13.2181 14.2135C13.8405 13.5625 13.804 12.5286 13.1374 11.9219C12.6087 11.4453 11.8275 11.3724 11.2207 11.7474L6.91602 14.4948L6.9655 14.4453C6.5905 14.5807 6.16602 14.3047 6.16602 13.8802V8.05469ZM12.4499 16.5L8.80925 20.4062C8.60612 20.625 8.37956 20.8255 8.13997 21.0052L10.6556 21C11.765 21 12.8223 20.5417 13.5749 19.7318L16.5905 16.5H12.4499Z" fill="url(#Payment)"/><defs><linearGradient id="Payment" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Payment Methods', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo wp_kses_post( ( ! empty( $payment_methods_temp ) && is_array( $payment_methods_temp ) ) ? implode( ', ', $payment_methods_temp ) : '' ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- billing and shipping addresses -->
		<li>
			<a href="/my-account/edit-address/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M12.3334 2C8.474 2 5.33337 5.14063 5.33337 9C5.33337 10.6615 5.92973 12.276 7.01306 13.5443C7.13546 13.6849 10.0157 17.0365 10.9844 17.9583C11.362 18.3203 11.8464 18.5 12.3334 18.5C12.8204 18.5 13.3047 18.3203 13.6849 17.9583C14.8073 16.888 17.5391 13.6771 17.6537 13.5443C18.737 12.276 19.3334 10.6615 19.3334 9C19.3334 5.14063 16.1927 2 12.3334 2ZM12.3334 6.5C13.7136 6.5 14.8334 7.61979 14.8334 9C14.8334 10.3802 13.7136 11.5 12.3334 11.5C10.9532 11.5 9.83337 10.3802 9.83337 9C9.83337 7.61979 10.9532 6.5 12.3334 6.5ZM6.71879 14.7214C4.44535 15.3776 2.83337 16.4766 2.83337 18C2.83337 20.625 7.61202 22 12.3334 22C17.0547 22 21.8334 20.625 21.8334 18C21.8334 16.4766 20.2214 15.3776 17.9506 14.7214C17.6615 15.0495 17.2657 15.4974 16.8308 15.9818C19.0417 16.5026 20.3334 17.3464 20.3334 18C20.3334 19.0182 17.2162 20.5 12.3334 20.5C7.45056 20.5 4.33337 19.0182 4.33337 18C4.33337 17.3438 5.62764 16.5 7.84379 15.9818C7.4089 15.4974 7.01046 15.0495 6.71879 14.7214Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12.3334 2C8.474 2 5.33337 5.14063 5.33337 9C5.33337 10.6615 5.92973 12.276 7.01306 13.5443C7.13546 13.6849 10.0157 17.0365 10.9844 17.9583C11.362 18.3203 11.8464 18.5 12.3334 18.5C12.8204 18.5 13.3047 18.3203 13.6849 17.9583C14.8073 16.888 17.5391 13.6771 17.6537 13.5443C18.737 12.276 19.3334 10.6615 19.3334 9C19.3334 5.14063 16.1927 2 12.3334 2ZM12.3334 6.5C13.7136 6.5 14.8334 7.61979 14.8334 9C14.8334 10.3802 13.7136 11.5 12.3334 11.5C10.9532 11.5 9.83337 10.3802 9.83337 9C9.83337 7.61979 10.9532 6.5 12.3334 6.5ZM6.71879 14.7214C4.44535 15.3776 2.83337 16.4766 2.83337 18C2.83337 20.625 7.61202 22 12.3334 22C17.0547 22 21.8334 20.625 21.8334 18C21.8334 16.4766 20.2214 15.3776 17.9506 14.7214C17.6615 15.0495 17.2657 15.4974 16.8308 15.9818C19.0417 16.5026 20.3334 17.3464 20.3334 18C20.3334 19.0182 17.2162 20.5 12.3334 20.5C7.45056 20.5 4.33337 19.0182 4.33337 18C4.33337 17.3438 5.62764 16.5 7.84379 15.9818C7.4089 15.4974 7.01046 15.0495 6.71879 14.7214Z" fill="url(#Addresses)"/><defs><linearGradient id="Addresses" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Addresses', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php echo wp_kses_post( $address_message ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>

		<!-- account and password -->
		<li>
			<a href="/my-account/edit-account/">
				<div class="innerdashbordlist">
					<div class="innsersubdashbordlist">
						<div class="iconwithtitledashbord">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12.0007 7.5C11.1752 7.5 10.5007 8.17448 10.5007 9V10H13.5007V9C13.5007 8.17448 12.8262 7.5 12.0007 7.5ZM12.0007 12C11.1699 12 10.5007 12.6693 10.5007 13.5C10.5007 14.3307 11.1699 15 12.0007 15C12.8314 15 13.5007 14.3307 13.5007 13.5C13.5007 12.6693 12.8314 12 12.0007 12ZM12.0007 7.5C11.1752 7.5 10.5007 8.17448 10.5007 9V10H13.5007V9C13.5007 8.17448 12.8262 7.5 12.0007 7.5ZM12.0007 12C11.1699 12 10.5007 12.6693 10.5007 13.5C10.5007 14.3307 11.1699 15 12.0007 15C12.8314 15 13.5007 14.3307 13.5007 13.5C13.5007 12.6693 12.8314 12 12.0007 12ZM12.0007 2C6.48505 2 2.00067 6.48437 2.00067 12C2.00067 17.5156 6.48505 22 12.0007 22C17.5163 22 22.0007 17.5156 22.0007 12C22.0007 6.48437 17.5163 2 12.0007 2ZM16.5007 15.5C16.5007 16.3255 15.8262 17 15.0007 17H9.00067C8.17515 17 7.50067 16.3255 7.50067 15.5V11.5C7.50067 10.6745 8.17515 10 9.00067 10V9C9.00067 7.34375 10.3444 6 12.0007 6C13.6569 6 15.0007 7.34375 15.0007 9V10C15.8262 10 16.5007 10.6745 16.5007 11.5V15.5ZM12.0007 7.5C11.1752 7.5 10.5007 8.17448 10.5007 9V10H13.5007V9C13.5007 8.17448 12.8262 7.5 12.0007 7.5ZM12.0007 12C11.1699 12 10.5007 12.6693 10.5007 13.5C10.5007 14.3307 11.1699 15 12.0007 15C12.8314 15 13.5007 14.3307 13.5007 13.5C13.5007 12.6693 12.8314 12 12.0007 12Z" fill="#6D7B83"/></svg></i>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12.0007 7.5C11.1752 7.5 10.5007 8.17448 10.5007 9V10H13.5007V9C13.5007 8.17448 12.8262 7.5 12.0007 7.5ZM12.0007 12C11.1699 12 10.5007 12.6693 10.5007 13.5C10.5007 14.3307 11.1699 15 12.0007 15C12.8314 15 13.5007 14.3307 13.5007 13.5C13.5007 12.6693 12.8314 12 12.0007 12ZM12.0007 7.5C11.1752 7.5 10.5007 8.17448 10.5007 9V10H13.5007V9C13.5007 8.17448 12.8262 7.5 12.0007 7.5ZM12.0007 12C11.1699 12 10.5007 12.6693 10.5007 13.5C10.5007 14.3307 11.1699 15 12.0007 15C12.8314 15 13.5007 14.3307 13.5007 13.5C13.5007 12.6693 12.8314 12 12.0007 12ZM12.0007 2C6.48505 2 2.00067 6.48437 2.00067 12C2.00067 17.5156 6.48505 22 12.0007 22C17.5163 22 22.0007 17.5156 22.0007 12C22.0007 6.48437 17.5163 2 12.0007 2ZM16.5007 15.5C16.5007 16.3255 15.8262 17 15.0007 17H9.00067C8.17515 17 7.50067 16.3255 7.50067 15.5V11.5C7.50067 10.6745 8.17515 10 9.00067 10V9C9.00067 7.34375 10.3444 6 12.0007 6C13.6569 6 15.0007 7.34375 15.0007 9V10C15.8262 10 16.5007 10.6745 16.5007 11.5V15.5ZM12.0007 7.5C11.1752 7.5 10.5007 8.17448 10.5007 9V10H13.5007V9C13.5007 8.17448 12.8262 7.5 12.0007 7.5ZM12.0007 12C11.1699 12 10.5007 12.6693 10.5007 13.5C10.5007 14.3307 11.1699 15 12.0007 15C12.8314 15 13.5007 14.3307 13.5007 13.5C13.5007 12.6693 12.8314 12 12.0007 12Z" fill="url(#Account)"/><defs><linearGradient id="Account" x1="1.83093" y1="11.6415" x2="34.4163" y2="11.6415" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
							<h4><?php esc_html_e( 'Account & Password', 'marketingops' ); ?></h4>
						</div>
						<div class="bottomdashbordlist">
							<ul>
								<li><?php esc_html_e( 'All set!', 'marketingops' ); ?></li>
							</ul>
						</div>
						<div class="arrowrightdashbord"><span class="arrowsvgimg"></span></div>
					</div>
				</div>
			</a>
		</li>
	</ul>

	<!-- profile completeness -->
	<div class="dashbordprofilebox">
		<h4><?php echo wp_kses_post( __( 'Profile is ', 'marketingops' ) . '<span>' . ( $profile_points * 20 ) . '%' . '</span>' . __(' complete.', 'marketingops') ); ?></h4>
		<p><?php esc_html_e( 'Complete your profile to enjoy all the platform\'s benefits.', 'marketingops' ); ?></p>
			<ul class="roundprofilelist">
				<li class="<?php echo esc_attr( $avatar_done ); ?>">
					<h5><?php esc_html_e( 'Avatar', 'marketingops' ); ?></h5>
					<div class="roundprobilebox">
						<div class="roundaroow profilboxarrow"></div>
						<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none"><path d="M17 0.333313C7.81164 0.333313 0.333344 7.81161 0.333344 17C0.333344 26.1883 7.81164 33.6666 17 33.6666C26.1884 33.6666 33.6667 26.1883 33.6667 17C33.6667 7.81161 26.1884 0.333313 17 0.333313ZM17 2.83331C24.8386 2.83331 31.1667 9.16144 31.1667 17C31.1667 24.8385 24.8386 31.1666 17 31.1666C9.16147 31.1666 2.83334 24.8385 2.83334 17C2.83334 9.16144 9.16147 2.83331 17 2.83331ZM17 6.99998C15.4375 6.99998 14.1094 7.62932 13.2543 8.59286C12.3993 9.55206 12 10.7847 12 12C12 13.2153 12.3993 14.4479 13.2543 15.4071C14.1094 16.3706 15.4375 17 17 17C18.5625 17 19.8906 16.3706 20.7457 15.4071C21.6007 14.4479 22 13.2153 22 12C22 10.7847 21.6007 9.55206 20.7457 8.59286C19.8906 7.62932 18.5625 6.99998 17 6.99998ZM17 9.49998C17.9375 9.49998 18.4844 9.80814 18.8793 10.2508C19.2743 10.6979 19.5 11.3403 19.5 12C19.5 12.6597 19.2743 13.3021 18.8793 13.7491C18.4844 14.1918 17.9375 14.5 17 14.5C16.0625 14.5 15.5156 14.1918 15.1207 13.7491C14.7257 13.3021 14.5 12.6597 14.5 12C14.5 11.3403 14.7257 10.6979 15.1207 10.2508C15.5156 9.80814 16.0625 9.49998 17 9.49998ZM11.3837 18.6666C9.89931 18.6666 8.66668 19.8993 8.66668 21.3837V22.2864C8.66668 23.9401 9.71268 25.3811 11.2057 26.3316C12.6988 27.2821 14.691 27.8333 17 27.8333C19.309 27.8333 21.3012 27.2821 22.7943 26.3316C24.2873 25.3811 25.3333 23.9401 25.3333 22.2864V21.3837C25.3333 19.8993 24.1007 18.6666 22.6163 18.6666H11.3837ZM11.3837 21.1666H22.6163C22.7509 21.1666 22.8333 21.2491 22.8333 21.3837V22.2864C22.8333 22.8767 22.4471 23.5885 21.4488 24.2265C20.4549 24.8602 18.9054 25.3333 17 25.3333C15.0946 25.3333 13.5451 24.8602 12.5512 24.2265C11.553 23.5885 11.1667 22.8767 11.1667 22.2864V21.3837C11.1667 21.2491 11.2491 21.1666 11.3837 21.1666Z" fill="#6D7B83"/></svg>	
					</div>
					<button class="addprofilebtn" onclick="location.href = '<?php echo home_url( '/profile/' ); ?>'"><?php esc_html_e( 'Add', 'marketingops' ); ?></button>
				</li>
				<li class="<?php echo esc_attr( $overview_done ); ?>">
					<h5><?php esc_html_e( 'Overview', 'marketingops' ); ?></h5>
					<div class="roundprobilebox">
					<div class="roundaroow profilboxarrow"></div>
						<svg xmlns="http://www.w3.org/2000/svg" width="28" height="34" viewBox="0 0 28 34" fill="none"><path d="M11.0834 0.5C9.16929 0.5 7.58943 1.97135 7.37675 3.83333H4.41669C2.3594 3.83333 0.666687 5.52604 0.666687 7.58333V30.0833C0.666687 32.1406 2.3594 33.8333 4.41669 33.8333H23.5834C25.6406 33.8333 27.3334 32.1406 27.3334 30.0833V7.58333C27.3334 5.52604 25.6406 3.83333 23.5834 3.83333H20.6233C20.4106 1.97135 18.8307 0.5 16.9167 0.5H11.0834ZM11.0834 3H16.9167C17.6242 3 18.1667 3.54253 18.1667 4.25C18.1667 4.95747 17.6242 5.5 16.9167 5.5H11.0834C10.3759 5.5 9.83335 4.95747 9.83335 4.25C9.83335 3.54253 10.3759 3 11.0834 3ZM4.41669 6.33333H7.97571C8.6528 7.33594 9.79429 8 11.0834 8H16.9167C18.2057 8 19.3472 7.33594 20.0243 6.33333H23.5834C24.2908 6.33333 24.8334 6.87587 24.8334 7.58333V30.0833C24.8334 30.7908 24.2908 31.3333 23.5834 31.3333H4.41669C3.70922 31.3333 3.16669 30.7908 3.16669 30.0833V7.58333C3.16669 6.87587 3.70922 6.33333 4.41669 6.33333ZM7.75002 12.1667C7.29863 12.1623 6.88196 12.3967 6.65193 12.7873C6.42624 13.1779 6.42624 13.6554 6.65193 14.046C6.88196 14.4366 7.29863 14.671 7.75002 14.6667H20.25C20.7014 14.671 21.1181 14.4366 21.3481 14.046C21.5738 13.6554 21.5738 13.1779 21.3481 12.7873C21.1181 12.3967 20.7014 12.1623 20.25 12.1667H7.75002ZM7.75002 18.8333C7.29863 18.829 6.88196 19.0634 6.65193 19.454C6.42624 19.8446 6.42624 20.322 6.65193 20.7127C6.88196 21.1033 7.29863 21.3377 7.75002 21.3333H13.5834C14.0347 21.3377 14.4514 21.1033 14.6814 20.7127C14.9071 20.322 14.9071 19.8446 14.6814 19.454C14.4514 19.0634 14.0347 18.829 13.5834 18.8333H7.75002ZM7.75002 25.5C7.29863 25.4957 6.88196 25.73 6.65193 26.1207C6.42624 26.5113 6.42624 26.9887 6.65193 27.3793C6.88196 27.77 7.29863 28.0043 7.75002 28H16.9167C17.3681 28.0043 17.7847 27.77 18.0148 27.3793C18.2405 26.9887 18.2405 26.5113 18.0148 26.1207C17.7847 25.73 17.3681 25.4957 16.9167 25.5H7.75002Z" fill="#6D7B83"/></svg>
					</div>
					<button class="addprofilebtn" onclick="location.href = '<?php echo home_url( '/profile/' ); ?>'"><?php esc_html_e( 'Add', 'marketingops' ); ?></button>
				</li>
				<li class="<?php echo esc_attr( $tools_skills_done ); ?>">
					<h5><?php esc_html_e( 'Tools & Skills', 'marketingops' ); ?></h5>
					<div class="roundprobilebox">
						<div class="roundaroow profilboxarrow"></div>
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none"><path d="M21.2505 0C18.6897 0 16.4328 1.15885 14.8312 2.92535C13.9936 2.79948 13.2166 2.92535 12.6177 3.13802C11.8798 3.3941 11.3503 3.71094 11.2071 3.79774C11.2071 3.79774 11.2071 3.79774 11.2028 3.79774C9.3104 4.95226 7.30519 6.05035 5.34772 7.25694C5.12203 7.39583 4.76178 7.56076 4.37116 7.70399C2.28349 8.45486 0.833832 10.421 0.833832 12.6693V17.5C0.833832 18.6502 1.19408 19.8915 1.86248 21.0069L1.48487 21.3846C-0.472591 23.3333 -0.489952 26.5408 1.45015 28.5113C1.45449 28.5113 1.45449 28.5113 1.45449 28.5113C3.39026 30.4731 6.58904 30.4861 8.54217 28.5417L8.82428 28.2639C9.50571 28.9019 10.8772 30 13.1429 30C14.9658 30 16.6758 29.1189 17.8781 27.7083C19.2453 26.1068 21.8755 23.3637 21.8755 23.3637C21.8885 23.3507 21.9059 23.3377 21.9189 23.3203C22.1446 23.0599 22.4701 22.691 22.7522 22.1875C22.7522 22.1875 22.7522 22.1875 22.7566 22.1875C23.3555 21.0981 23.4988 19.8177 23.1298 18.6415C23.1298 18.6415 23.1298 18.6415 23.1255 18.6415C22.9606 18.1163 22.5873 17.7214 22.2531 17.296C26.5804 16.7752 30.0005 13.2118 30.0005 8.75C30.0005 7.43924 29.701 6.19792 29.1889 5.08681C29.0196 4.71788 28.6767 4.45312 28.2774 4.38368C27.8738 4.3099 27.4614 4.4401 27.175 4.72656L23.1255 8.75434C22.5873 9.29253 21.7627 9.29253 21.2288 8.75C20.6906 8.20312 20.6949 7.35243 21.2375 6.8099L25.2436 2.81684C25.5344 2.52604 25.6646 2.11372 25.5951 1.71007C25.5213 1.30642 25.2566 0.963543 24.8833 0.794271C23.7809 0.290799 22.5482 0 21.2505 0ZM21.2505 2.5C21.4762 2.5 21.6628 2.61285 21.8798 2.63889L19.4753 5.03906C17.9736 6.53212 17.9606 8.9974 19.4493 10.5035C20.9337 12.0095 23.3946 12.0182 24.892 10.5295C24.892 10.5295 24.892 10.5295 24.892 10.5252L27.3486 8.07726C27.379 8.31163 27.5005 8.51128 27.5005 8.75C27.5005 12.2179 24.7184 15 21.2505 15C20.8252 15 20.4085 14.9219 19.9962 14.8351C19.4536 14.2969 18.9024 13.7543 18.2861 13.1467C16.7193 11.5972 15.4345 10.3212 15.1785 10.0694C15.083 9.63542 15.0005 9.20139 15.0005 8.75C15.0005 5.28212 17.7826 2.5 21.2505 2.5ZM13.1298 5.64236C12.7566 6.61458 12.5005 7.64757 12.5005 8.75C12.5005 9.53559 12.6133 10.2821 12.8 10.9896C12.8564 11.2066 12.9692 11.4019 13.1298 11.5582C13.1298 11.5582 14.8139 13.2292 16.5283 14.9219C17.1576 15.5425 17.7219 16.0981 18.2774 16.645C18.3816 16.8186 18.5291 16.9661 18.7071 17.0703C18.7679 17.1311 18.859 17.2222 18.9154 17.2786C19.2496 17.6085 19.5317 17.8819 19.7401 18.0859C19.9484 18.2899 19.9918 18.342 20.1524 18.4852C20.4345 18.7326 20.6298 19.0365 20.7427 19.3924C20.9076 19.9175 20.8555 20.4557 20.5691 20.9766C20.4475 21.1936 20.2609 21.4193 20.0309 21.6797C19.9788 21.7361 17.4397 24.3707 15.9771 26.0851C15.2002 26.9965 14.1498 27.5 13.1429 27.5C11.4936 27.5 10.7427 26.7318 10.2826 26.263C9.37116 25.3472 7.94321 23.9236 6.70623 22.6997C6.08991 22.0877 5.52133 21.5278 5.09165 21.1068C4.74876 20.7682 4.60987 20.6293 4.4406 20.4731C4.38418 20.395 4.31473 20.3212 4.24095 20.2604C3.68105 19.7309 3.33383 18.6024 3.33383 17.5V12.6693C3.33383 11.4887 4.08036 10.4644 5.21751 10.0521C5.7123 9.87413 6.20276 9.6658 6.66283 9.38368C8.54651 8.22483 10.5474 7.13108 12.5048 5.93316C12.5396 5.91146 12.8651 5.76389 13.1298 5.64236ZM3.42932 22.9731C3.84599 23.3854 4.36248 23.8976 4.94842 24.4748C5.66456 25.1866 6.30692 25.8333 7.01439 26.5365L6.78001 26.7708C5.78175 27.7648 4.22359 27.7561 3.23401 26.7535C2.24008 25.7465 2.24876 24.1493 3.24703 23.1554L3.42932 22.9731Z" fill="#6D7B83"/></svg>	
					</div>
					<button class="addprofilebtn" onclick="location.href = '<?php echo home_url( '/profile/' ); ?>'"><?php esc_html_e( 'Add', 'marketingops' ); ?></button>
				</li>
				<li class="<?php echo esc_attr( $work_history_done ); ?>">
					<h5><?php esc_html_e( 'Work History', 'marketingops' ); ?></h5>
					<div class="roundprobilebox">
					<div class="roundaroow profilboxarrow"></div>
						<svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none"><path d="M15.9173 5C14.3201 5 13.0007 6.31944 13.0007 7.91667V10H6.75065C5.15343 10 3.83398 11.3194 3.83398 12.9167V32.9167C3.83398 34.5139 5.15343 35.8333 6.75065 35.8333H34.2506C35.8479 35.8333 37.1673 34.5139 37.1673 32.9167V12.9167C37.1673 11.3194 35.8479 10 34.2506 10H28.0007V7.91667C28.0007 6.31944 26.6812 5 25.084 5H15.9173ZM15.9173 7.5H25.084C25.3314 7.5 25.5007 7.66927 25.5007 7.91667V10H15.5007V7.91667C15.5007 7.66927 15.6699 7.5 15.9173 7.5ZM6.75065 12.5H34.2506C34.498 12.5 34.6673 12.6693 34.6673 12.9167V24.1667H23.0007V23.75C23.0007 23.0599 22.4408 22.5 21.7507 22.5H19.2507C18.5605 22.5 18.0007 23.0599 18.0007 23.75V24.1667H6.33398V12.9167C6.33398 12.6693 6.50326 12.5 6.75065 12.5ZM6.33398 26.6667H18.0007V27.0833C18.0007 27.7734 18.5605 28.3333 19.2507 28.3333H21.7507C22.4408 28.3333 23.0007 27.7734 23.0007 27.0833V26.6667H34.6673V32.9167C34.6673 33.1641 34.498 33.3333 34.2506 33.3333H6.75065C6.50326 33.3333 6.33398 33.1641 6.33398 32.9167V26.6667Z" fill="#6D7B83"/></svg>
					</div>
					<button class="addprofilebtn" onclick="location.href = '<?php echo home_url( '/profile/' ); ?>'"><?php esc_html_e( 'Add', 'marketingops' ); ?></button>
				</li>
				<li class="<?php echo esc_attr( $certifications_done ); ?>">
					<h5><?php esc_html_e( 'Certifications', 'marketingops' ); ?></h5>
					<div class="roundprobilebox">
						<div class="roundaroow profilboxarrow"></div>
						<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M7.91732 5.83301C5.39128 5.83301 3.33398 7.8903 3.33398 10.4163V26.2497C3.33398 28.7757 5.39128 30.833 7.91732 30.833H22.5007V29.4311C22.2489 29.0839 22.0362 28.715 21.8453 28.333H7.91732C6.76714 28.333 5.83398 27.3998 5.83398 26.2497V10.4163C5.83398 9.26617 6.76714 8.33301 7.91732 8.33301H32.084C33.2342 8.33301 34.1673 9.26617 34.1673 10.4163V15.9979C35.1092 16.4841 35.9512 17.1177 36.6673 17.8729V10.4163C36.6673 7.8903 34.61 5.83301 32.084 5.83301H7.91732ZM11.2507 12.4997C10.7993 12.4953 10.3826 12.7297 10.1526 13.1203C9.92687 13.511 9.92687 13.9884 10.1526 14.379C10.3826 14.7696 10.7993 15.004 11.2507 14.9997H28.7507C29.202 15.004 29.6187 14.7696 29.8487 14.379C30.0744 13.9884 30.0744 13.511 29.8487 13.1203C29.6187 12.7297 29.202 12.4953 28.7507 12.4997H11.2507ZM30.0006 17.4997C26.3331 17.4997 23.334 20.4988 23.334 24.1663C23.334 25.846 23.9677 27.3781 25.0007 28.5544V36.2497C25.0007 36.7097 25.2524 37.1351 25.6604 37.3521C26.0684 37.5691 26.5588 37.5474 26.9451 37.2913L30.0006 35.2514L33.0562 37.2913C33.4425 37.5474 33.9329 37.5691 34.3409 37.3521C34.7489 37.1351 35.0006 36.7097 35.0006 36.2497V28.5544C36.0336 27.3781 36.6673 25.846 36.6673 24.1663C36.6673 20.4988 33.6682 17.4997 30.0006 17.4997ZM30.0006 19.9997C32.3184 19.9997 34.1673 21.8486 34.1673 24.1663C34.1673 26.4841 32.3184 28.333 30.0006 28.333C27.6829 28.333 25.834 26.4841 25.834 24.1663C25.834 21.8486 27.6829 19.9997 30.0006 19.9997ZM11.2507 21.6663C10.7993 21.662 10.3826 21.8964 10.1526 22.287C9.92687 22.6776 9.92687 23.1551 10.1526 23.5457C10.3826 23.9363 10.7993 24.1707 11.2507 24.1663H18.7507C19.202 24.1707 19.6187 23.9363 19.8487 23.5457C20.0744 23.1551 20.0744 22.6776 19.8487 22.287C19.6187 21.8964 19.202 21.662 18.7507 21.6663H11.2507ZM27.5007 30.3382C28.2732 30.6551 29.1152 30.833 30.0006 30.833C30.8861 30.833 31.7281 30.6551 32.5006 30.3382V33.9146L30.6951 32.708C30.2741 32.4302 29.7272 32.4302 29.3062 32.708L27.5007 33.9146V30.3382Z" fill="#6D7B83"/></svg>
					</div>
					<button class="addprofilebtn" onclick="location.href = '<?php echo home_url( '/profile/' ); ?>'"><?php esc_html_e( 'Add', 'marketingops' ); ?></button>
				</li>
			</ul>
		</div>
	</div>
<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action( 'woocommerce_account_dashboard' );

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action( 'woocommerce_before_my_account' );

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
