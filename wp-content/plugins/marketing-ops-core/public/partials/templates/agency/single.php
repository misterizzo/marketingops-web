<?php
/**
 * Agency single template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/agency/single.php
 *
 * @see         https://marketingops.com/
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

// Get all the agency details.
global $post;
$agency_id                       = get_the_ID();
$agency_title                    = get_the_title( $agency_id );
$agency_description              = get_post_field( 'post_content', $agency_id );
$agency_types                    = wp_get_object_terms( $agency_id, 'agency_type' );
$agency_types_string             = array();
$agency_regions                  = wp_get_object_terms( $agency_id, 'agency_region' );
$agency_regions_string           = array();
$agency_primary_verticals        = wp_get_object_terms( $agency_id, 'agency_primary_vertical' );
$agency_primary_verticals_string = array();
$agency_services                 = wp_get_object_terms( $agency_id, 'agency_service' );
$agency_services_string          = array();
$agency_founded_year             = get_field( 'agency_year_founded', $agency_id );
$agency_employees                = get_field( 'agency_employees', $agency_id );
$agency_user_name                = get_field( 'agency_user_name', $agency_id );
$agency_user_email               = get_field( 'agency_user_email', $agency_id );
$agency_user_website             = get_field( 'agency_user_website', $agency_id );
$agency_people                   = get_field( 'agency_people', $agency_id );
$agency_clients                  = get_field( 'agency_clients', $agency_id );
$agency_clients_string           = array();
$agency_certifications           = get_field( 'agency_certifications', $agency_id );
$agency_certifications_string    = array();
$agency_awards                   = get_field( 'agency_awards', $agency_id );
$agency_include_articles         = get_field( 'agency_include_articles', $agency_id );
$agency_include_jobs             = get_field( 'agency_include_jobs', $agency_id );
$agency_video                    = get_field( 'agency_video', $agency_id );
$agency_articles_args            = moc_posts_query_args( 'post', 1, 3 );
$agency_articles                 = new WP_Query( $agency_articles_args );
$agency_jobs_args                = moc_posts_query_args( 'job_listing', 1, 3 );
$agency_jobs                     = new WP_Query( $agency_jobs_args );

// Collect all the agency types.
if ( ! empty( $agency_types ) && is_array( $agency_types ) ) {
	// Loop through the agency types.
	foreach ( $agency_types as $agency_type ) {
		$agency_types_string[] = $agency_type->name;
	}

	// Join the types with comma separation.
	$agency_types_string = implode( ', ', $agency_types_string );
}

// Collect all the agency regions.
if ( ! empty( $agency_regions ) && is_array( $agency_regions ) ) {
	// Loop through the agency regions.
	foreach ( $agency_regions as $agency_region ) {
		$agency_regions_string[] = $agency_region->name;
	}

	// Join the regions with comma separation.
	$agency_regions_string = implode( ', ', $agency_regions_string );
}

// Collect all the agency primary verticals.
if ( ! empty( $agency_primary_verticals ) && is_array( $agency_primary_verticals ) ) {
	// Loop through the agency primary verticals.
	foreach ( $agency_primary_verticals as $agency_primary_vertical ) {
		$agency_primary_verticals_string[] = $agency_primary_vertical->name;
	}

	// Join the primary verticals with comma separation.
	$agency_primary_verticals_string = implode( ', ', $agency_primary_verticals_string );
}

// Collect all the agency services.
if ( ! empty( $agency_services ) && is_array( $agency_services ) ) {
	// Loop through the agency services.
	foreach ( $agency_services as $agency_service ) {
		$agency_services_string[] = $agency_service->name;
	}

	// Join the services with comma separation.
	$agency_services_string = implode( ', ', $agency_services_string );
}

// Collect the clients.
if ( ! empty( $agency_clients ) && is_array( $agency_clients ) ) {
	// Loop through the clients.
	foreach ( $agency_clients as $agency_client ) {
		if ( empty( $agency_client['client_name'] ) ) continue;

		$agency_clients_string[] = $agency_client['client_name'];
	}

	// Join the clients with comma separation.
	$agency_clients_string = implode( ', ', $agency_clients_string );
}

// Collect the certifications.
if ( ! empty( $agency_certifications ) && is_array( $agency_certifications ) ) {
	// Loop through the clients.
	foreach ( $agency_certifications as $agency_certification ) {
		if ( empty( $agency_certification['certification_name'] ) ) continue;

		$agency_certifications_string[] = $agency_certification['certification_name'];
	}

	// Join the certifications with comma separation.
	$agency_certifications_string = implode( ', ', $agency_certifications_string );
}
?>
<!-- BASIC DETAILS -->
<section class="mainagencydetails">
	<div class="leftbgbar"><img src="/wp-content/themes/marketingops/images/agencypages/blurcircle1.png" alt="img" /></div>
	<div class="leftbgbar_two"><img src="/wp-content/themes/marketingops/images/agencypages/blur3.png" alt="img" /></div>
	<div class="rightbgbar"><img src="/wp-content/themes/marketingops/images/agencypages/blur2.png" alt="img" /></div>
	<div class="agency-container">
		<h1><span><?php echo wp_kses_post( $agency_title ); ?></span>&nbsp;<?php esc_html_e( 'Agency Details', 'marketingops' ); ?></h1>
		<div class="agencymaintwotable">
			<div class="agencymaintwotable-left">
				<!-- AGENCY FEATURED IMAGE -->
				<?php if ( has_post_thumbnail( $agency_id ) ) {
					echo wp_kses_post( get_the_post_thumbnail( $agency_id, 'full' ) );
				} ?>

				<!-- AGENCY DESCRIPTION -->
				<?php if ( ! empty( $agency_description ) ) { ?>
					<p><?php echo wp_kses_post( $agency_description ); ?></p>
				<?php } ?>

				<a href="<?php echo esc_url( $agency_user_website ); ?>" target="_blank" rel="nofollow noopener noreferrer" class="agencywebsite">
					Contact agency <i><svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_84_218)"><path d="M11.0262 2.99457C10.7892 2.98546 10.5693 3.12103 10.4725 3.3375C10.3745 3.55396 10.4167 3.80688 10.5807 3.98005L12.3728 5.91682H1.09283C0.882065 5.9134 0.687248 6.02391 0.581296 6.20619C0.474204 6.38734 0.474204 6.61292 0.581296 6.79406C0.687248 6.97634 0.882065 7.08685 1.09283 7.08344H12.3728L10.5807 9.02021C10.4349 9.17287 10.3836 9.39161 10.4452 9.59326C10.5067 9.79492 10.6719 9.94758 10.8769 9.99315C11.0831 10.0387 11.2973 9.96922 11.4375 9.81314L14.501 6.50013L11.4375 3.18711C11.3326 3.0709 11.1834 3.00027 11.0262 2.99457Z" fill="white"/></g><defs><clipPath id="clip0_84_218"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg></i>
				</a>
			</div>
			<div class="agencymaintwotable-right">
				<ul>
					<!-- AGENCY TYPES -->
					<?php if ( ! empty( $agency_types_string ) ) { ?>
						<li>
							<div class="leftwithicon">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4.75 4C3.23437 4 2 5.23437 2 6.75V17.25C2 18.7656 3.23437 20 4.75 20H19.25C20.7656 20 22 18.7656 22 17.25V6.75C22 5.23437 20.7656 4 19.25 4H4.75ZM9.5 8.5C9.80469 8.5 10.0781 8.6849 10.1953 8.96615L12.4453 14.4661C12.6016 14.849 12.4167 15.2891 12.0339 15.4453C11.9401 15.4818 11.8464 15.5 11.75 15.5C11.4557 15.5 11.1745 15.3229 11.0547 15.0339L10.8385 14.5H8.16146L7.94531 15.0339C7.78906 15.4193 7.34896 15.6016 6.96615 15.4453C6.58333 15.2891 6.39844 14.849 6.55469 14.4661L8.80469 8.96615C8.92188 8.6849 9.19531 8.5 9.5 8.5ZM16.875 9.5C17.2188 9.5 17.5 9.78125 17.5 10.125V14.875C17.5 15.2188 17.2188 15.5 16.875 15.5H15.25C14.0104 15.5 13 14.4896 13 13.25C13 12.0104 14.0104 11 15.25 11H16.25V10.125C16.25 9.78125 16.5312 9.5 16.875 9.5ZM9.5 11.2318L8.77604 13H10.224L9.5 11.2318ZM15.25 12.25C14.6979 12.25 14.25 12.6979 14.25 13.25C14.25 13.8021 14.6979 14.25 15.25 14.25H16.25V12.25H15.25Z" fill="#6D7B83"/></svg></i> 
								<?php esc_html_e( 'Type:', 'marketingops' ); ?>
							</div>
							<?php echo wp_kses_post( $agency_types_string ); ?>
						</li>
					<?php } ?>

					<!-- AGENCY FOUNDED YEAR -->
					<?php if ( ! empty( $agency_founded_year ) ) { ?>
						<li>
							<div class="leftwithicon">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21 7V6.25C21 4.45833 19.5417 3 17.75 3H6.25C4.45833 3 3 4.45833 3 6.25V7H21ZM3 8.5V17.75C3 19.5417 4.45833 21 6.25 21H17.75C19.5417 21 21 19.5417 21 17.75V8.5H3ZM14.0026 16.3177L12.5469 17.7734C12.2448 18.0755 11.7552 18.0755 11.4531 17.7734L9.9974 16.3177C9.77865 16.0964 9.71094 15.7656 9.83073 15.4766C9.95052 15.1875 10.2318 15 10.5443 15H13.4557C13.7682 15 14.0495 15.1875 14.1693 15.4766C14.2891 15.7656 14.2214 16.0964 14.0026 16.3177ZM14.1693 13.0234C14.0495 13.3125 13.7682 13.5 13.4557 13.5H10.5443C10.2318 13.5 9.95052 13.3125 9.83073 13.0234C9.71094 12.7344 9.77604 12.4036 9.9974 12.1823L11.4531 10.7266C11.7552 10.4245 12.2448 10.4245 12.5469 10.7266L14.0026 12.1823C14.2214 12.4036 14.2891 12.7344 14.1693 13.0234Z" fill="#6D7B83"/></svg></i> 
								<?php esc_html_e( 'Founded:', 'marketingops' ); ?>
							</div>
							<?php echo esc_html( $agency_founded_year ); ?>
						</li>
					<?php } ?>

					<!-- AGENCY EMPLOYEES -->
					<?php if ( ! empty( $agency_employees ) ) { ?>
						<li>
							<div class="leftwithicon">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 3C10.3438 3 9 4.34375 9 6C9 7.65625 10.3438 9 12 9C13.6562 9 15 7.65625 15 6C15 4.34375 13.6562 3 12 3ZM5.5 4C4.11979 4 3 5.11979 3 6.5C3 7.88021 4.11979 9 5.5 9C6.88021 9 8 7.88021 8 6.5C8 5.11979 6.88021 4 5.5 4ZM18.5 4C17.1198 4 16 5.11979 16 6.5C16 7.88021 17.1198 9 18.5 9C19.8802 9 21 7.88021 21 6.5C21 5.11979 19.8802 4 18.5 4ZM12 21C9.51823 21 7.5 18.9818 7.5 16.5V11.75C7.5 10.7839 8.28385 10 9.25 10H14.75C15.7161 10 16.5 10.7839 16.5 11.75V16.5C16.5 18.9818 14.4818 21 12 21ZM6.5 16.5V11.75C6.5 11.0859 6.73698 10.4766 7.13021 10H3.75C2.78385 10 2 10.7839 2 11.75V15C2 17.2057 3.79427 19 6 19C6.35417 19 6.70052 18.9557 7.03125 18.8646C7.03125 18.8646 7.03646 18.862 7.03906 18.862C6.69792 18.1432 6.5 17.3464 6.5 16.5ZM17.5 16.5V11.75C17.5 11.0859 17.263 10.4766 16.8698 10H20.25C21.2161 10 22 10.7839 22 11.75V15C22 17.2057 20.2057 19 18 19C17.6458 19 17.2995 18.9557 16.9688 18.8646C16.9688 18.8646 16.9635 18.862 16.9609 18.862C17.3021 18.1432 17.5 17.3464 17.5 16.5Z" fill="#6D7B83"/></svg></i> 
								<?php esc_html_e( 'Employees:', 'marketingops' ); ?>
							</div>
							<?php echo esc_html( $agency_employees ); ?>
						</li>
					<?php } ?>

					<!-- AGENCY REGIONS -->
					<?php if ( ! empty( $agency_regions_string ) ) { ?>
						<li>
							<div class="leftwithicon">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12.75 2.13013V7.99992H16.5625C15.875 4.95044 14.4375 2.66398 12.75 2.13013ZM11.25 7.99992V2.13013C9.5625 2.66398 8.125 4.95044 7.4375 7.99992H11.25ZM11.25 21.8697V15.9999H7.4375C8.125 19.0494 9.5625 21.3359 11.25 21.8697ZM5.5 11.9999C5.5 11.1379 5.55208 10.302 5.64844 9.49992H2.32813C2.1224 10.2994 2 11.1353 2 11.9999C2 12.8645 2.1224 13.7004 2.32813 14.4999H5.64844C5.55208 13.6978 5.5 12.8619 5.5 11.9999ZM11.25 9.49992H7.17187C7.0625 10.3046 7 11.1379 7 11.9999C7 12.8619 7.0625 13.6952 7.17187 14.4999H11.25V9.49992ZM12.75 15.9999V21.8697C14.4375 21.3359 15.875 19.0494 16.5625 15.9999H12.75ZM5.89063 7.99992C6.3151 5.91398 7.06771 4.12752 8.04167 2.82023C5.71875 3.82544 3.85677 5.68481 2.84115 7.99992H5.89063ZM5.89063 15.9999H2.84115C3.85677 18.315 5.71875 20.1744 8.03906 21.1796C7.0651 19.8723 6.3151 18.0859 5.89063 15.9999ZM16.8281 9.49992H12.75V14.4999H16.8281C16.9375 13.6952 17 12.8619 17 11.9999C17 11.1379 16.9375 10.3046 16.8281 9.49992ZM18.1094 15.9999C17.6849 18.0859 16.9323 19.8723 15.9583 21.1796C18.2786 20.1744 20.1432 18.315 21.1589 15.9999H18.1094ZM21.6719 14.4999C21.8776 13.7004 22 12.8645 22 11.9999C22 11.1353 21.8776 10.2994 21.6719 9.49992H18.3516C18.4479 10.302 18.5 11.1379 18.5 11.9999C18.5 12.8619 18.4479 13.6978 18.3516 14.4999H21.6719ZM18.1094 7.99992H21.1589C20.1432 5.68481 18.2812 3.82544 15.9609 2.82023C16.9349 4.12752 17.6849 5.91398 18.1094 7.99992Z" fill="#6D7B83"/></svg></i> 
								<?php esc_html_e( 'Countries:', 'marketingops' ); ?>
							</div>
							<?php echo wp_kses_post( $agency_regions_string ); ?>
						</li>
					<?php } ?>

					<!-- AGENCY SERVICES -->
					<?php if ( ! empty( $agency_services_string ) ) { ?>
						<li>
							<div class="leftwithicon">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21.6823 11C21.1693 11 20.6068 11.3385 19.4115 11.9583C18.4193 12.474 17.5026 12.9635 16.9193 13.3203C16.9688 13.5391 17 13.7656 17 14C17 15.6536 15.6537 17 14 17H10.25C9.83597 17 9.50004 16.6641 9.50004 16.25C9.50004 15.8359 9.83597 15.5 10.25 15.5H14C14.8282 15.5 15.5 14.8281 15.5 14C15.5 13.5521 15.2969 13.1536 14.9844 12.8776C14.6302 12.6432 14.2084 12.5 13.75 12.5H11.25C11.2344 12.5 11.2214 12.4974 11.2084 12.4948C9.89066 12.474 9.25524 12.3385 8.70056 12.2161C8.19274 12.1042 7.71618 12 6.9141 12C3.24743 12 1.15368 16.5 1.06774 16.6927C0.955765 16.9401 0.984411 17.2292 1.14587 17.4479L4.64587 22.1953C4.7891 22.388 5.01306 22.4974 5.24743 22.4974C5.29691 22.4974 5.34379 22.4922 5.39066 22.4844C5.67452 22.4297 5.90368 22.2161 5.9766 21.9375C6.01566 21.7891 6.39847 20.5 7.75004 20.5C8.7266 20.5 9.73441 20.625 10.711 20.7474C11.7058 20.8724 12.7344 21 13.75 21C15.1302 21 16.125 19.9401 19 17C22.6511 13.2656 23 12.9375 23 12.1979C23 11.5573 22.4375 11 21.6823 11ZM17.3438 6.82031C17.1641 6.6849 17.0573 6.47396 17.0573 6.25C17.0573 6.02604 17.1641 5.8151 17.3438 5.67969L17.6511 5.45052C17.8047 5.33594 17.8802 5.13542 17.8282 4.95313C17.6094 4.1849 17.2032 3.5 16.6615 2.94271C16.5287 2.80729 16.3177 2.77344 16.1433 2.84896L15.7943 2.9974C15.5886 3.08594 15.3542 3.07031 15.1589 2.95833C14.9636 2.84635 14.8334 2.65104 14.8073 2.42708L14.7605 2.04687C14.7396 1.85677 14.6068 1.69271 14.4193 1.64583C14.0495 1.55208 13.6589 1.5 13.2578 1.5C12.8568 1.5 12.4688 1.55208 12.0964 1.64583C11.9115 1.69271 11.7787 1.85677 11.7552 2.04687L11.711 2.42708C11.6823 2.64844 11.5521 2.84635 11.3594 2.95833C11.1641 3.07031 10.9297 3.08594 10.7214 2.9974L10.375 2.84896C10.198 2.77344 9.98962 2.80729 9.85681 2.94271C9.31514 3.5 8.90889 4.1849 8.69014 4.95052C8.63806 5.13542 8.71358 5.33333 8.86722 5.45052L9.17451 5.67969C9.3542 5.8151 9.45837 6.02604 9.45837 6.25C9.45837 6.47396 9.3542 6.6849 9.17451 6.82031L8.86722 7.04948C8.71358 7.16406 8.63806 7.36198 8.69014 7.54687C8.90889 8.3151 9.31514 9 9.85681 9.55469C9.98962 9.69271 10.198 9.72656 10.375 9.65104L10.7214 9.5026C10.9297 9.41406 11.1641 9.42708 11.3594 9.53906C11.5521 9.65104 11.6823 9.84896 11.711 10.0729L11.7552 10.4531C11.7787 10.6432 11.9115 10.8073 12.0964 10.8542C12.4688 10.9479 12.8568 11 13.2578 11C13.6589 11 14.0495 10.9479 14.4193 10.8542C14.6068 10.8073 14.7396 10.6432 14.7631 10.4531L14.8073 10.0729C14.836 9.84896 14.9662 9.65104 15.1589 9.53906C15.3542 9.42708 15.5886 9.41406 15.7943 9.5026L16.1433 9.65104C16.3203 9.72656 16.5287 9.69271 16.6615 9.55469C17.2032 9 17.6094 8.3151 17.8282 7.54687C17.8802 7.36198 17.8047 7.16406 17.6511 7.04948L17.3438 6.82031ZM13.2578 7.5C12.5677 7.5 12.0078 6.9401 12.0078 6.25C12.0078 5.5599 12.5677 5 13.2578 5C13.948 5 14.5078 5.5599 14.5078 6.25C14.5078 6.9401 13.948 7.5 13.2578 7.5Z" fill="#6D7B83"/></svg></i> 
								<?php esc_html_e( 'Services:', 'marketingops' ); ?>
							</div>
							<?php echo wp_kses_post( $agency_services_string ); ?>
						</li>
					<?php } ?>

					<!-- AGENCY PRIMARY VERTICALS -->
					<?php if ( ! empty( $agency_primary_verticals_string ) ) { ?>
						<li>
							<div class="leftwithicon">
								<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M20.75 2H17.25C16.8776 2 16.5599 2.27344 16.5078 2.64323L15.599 9H14V6.75C14 6.47135 13.8464 6.21615 13.6016 6.08594C13.3542 5.95833 13.0573 5.97396 12.8281 6.13021L8.5 9.08073V6.75C8.5 6.47396 8.34635 6.21875 8.10417 6.08854C7.85938 5.95833 7.5651 5.97396 7.33333 6.125L3.72396 8.53125C2.95833 9.04427 2.5 9.89844 2.5 10.8203V20.25C2.5 20.6641 2.83594 21 3.25 21H20.75C21.1641 21 21.5 20.6641 21.5 20.25V2.75C21.5 2.33594 21.1641 2 20.75 2ZM7.5 17.5C7.5 17.776 7.27604 18 7 18H6.5C6.22396 18 6 17.776 6 17.5V12.5C6 12.224 6.22396 12 6.5 12H7C7.27604 12 7.5 12.224 7.5 12.5V17.5ZM11 17.5C11 17.776 10.776 18 10.5 18H10C9.72396 18 9.5 17.776 9.5 17.5V12.5C9.5 12.224 9.72396 12 10 12H10.5C10.776 12 11 12.224 11 12.5V17.5ZM14.5 17.5C14.5 17.776 14.276 18 14 18H13.5C13.224 18 13 17.776 13 17.5V12.5C13 12.224 13.224 12 13.5 12H14C14.276 12 14.5 12.224 14.5 12.5V17.5ZM18 17.5C18 17.776 17.776 18 17.5 18H17C16.724 18 16.5 17.776 16.5 17.5V12.5C16.5 12.224 16.724 12 17 12H17.5C17.776 12 18 12.224 18 12.5V17.5Z" fill="#6D7B83"/></svg></i> 
								<?php esc_html_e( 'Verticals:', 'marketingops' ); ?>
							</div>
							<?php echo wp_kses_post( $agency_primary_verticals_string ); ?>
						</li>
					<?php } ?>

					<li>
						<div class="leftwithicon">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M19.75 4C20.9922 4 22 5.00781 22 6.25V17.7552C22 18.9974 20.9922 20.0052 19.75 20.0052H4.25C3.00781 20.0052 2 18.9974 2 17.7552V6.25C2 5.00781 3.00781 4 4.25 4H19.75ZM9.25 12.5H5.75C5.36979 12.5 5.05729 12.7812 5.00781 13.1484L5 13.25V13.7422L5.00781 13.8516C5.16927 14.9635 6.10156 15.5026 7.5 15.5026C8.83073 15.5026 9.73958 15.0156 9.96354 14.0078L9.99219 13.8516L10 13.7422V13.25C10 12.8698 9.71875 12.5573 9.35156 12.5078L9.25 12.5ZM18.25 12.9948H13.7526L13.651 13.0026C13.2839 13.0521 13.0026 13.3672 13.0026 13.7448C13.0026 14.125 13.2839 14.4401 13.651 14.4896L13.7526 14.4948H18.25L18.3516 14.4896C18.7188 14.4401 19 14.125 19 13.7448C19 13.3672 18.7188 13.0521 18.3516 13.0026L18.25 12.9948ZM7.5 8.5026C6.67188 8.5026 6 9.17448 6 10.0026C6 10.8307 6.67188 11.5026 7.5 11.5026C8.32813 11.5026 9 10.8307 9 10.0026C9 9.17448 8.32813 8.5026 7.5 8.5026ZM18.25 9.5H13.7526L13.651 9.50781C13.2839 9.55729 13.0026 9.86979 13.0026 10.25C13.0026 10.6302 13.2839 10.9427 13.651 10.9922L13.7526 11H18.25L18.3516 10.9922C18.7188 10.9427 19 10.6302 19 10.25C19 9.86979 18.7188 9.55729 18.3516 9.50781L18.25 9.5Z" fill="#6D7B83"/></svg></i> 
							<?php esc_html_e( 'Contact:', 'marketingops' ); ?>
						</div>
						<div class="contervtbox">
							<!-- AGENCY USER NAME -->
							<?php if ( ! empty( $agency_user_name ) ) { ?>
								<b><?php echo wp_kses_post( $agency_user_name ); ?></b>
							<?php } ?>

							<!-- AGENCY USER EMAIL -->
							<?php if ( ! empty( $agency_user_email ) ) { ?>
								<a href="mailto:<?php echo wp_kses_post( $agency_user_email ); ?>"><?php echo wp_kses_post( $agency_user_email ); ?></a>
							<?php } ?>

							<!-- AGENCY WEBSITE -->
							<?php if ( ! empty( $agency_user_website ) ) { ?>
								<a href="<?php echo esc_url( $agency_user_website ); ?>"><?php echo esc_url( $agency_user_website ); ?></a>
							<?php } ?>
						</div>	
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- IN THE SPOTLIGHT -->
<?php if ( ! empty( $agency_people ) && is_array( $agency_people ) ) { ?>
	<section class="agency-spotlight">
		<div class="agency-container">
			<h2>In the Spotlight</h2>
			<ul class="spotlitlist">
				<!-- PEOPLE LIST -->
				<?php foreach ( $agency_people as $person ) {
					$person_image = ( ! empty( $person['display_picture'] ) ) ? wp_get_attachment_url( $person['display_picture'] ) : '';
					?>
					<li>
						<div class="spotilebox">
							<?php if ( ! empty( $person_image ) ) { ?>
								<div class="spotlightimgbox">
									<img src="<?php echo esc_url( $person_image ); ?>" alt="<?php echo ( ! empty( $person['full_name'] ) ) ? sanitize_title( $person['full_name'] ) : ''; ?>-img" /> 
								</div>
							<?php } ?>
							<div class="spotligtext">
								<!-- PERSON NAME -->
								<?php if ( ! empty( $person['full_name'] ) ) { ?>
									<h4><?php echo esc_html_e( $person['full_name'] ); ?></h4>
								<?php } ?>

								<!-- POSITION -->
								<?php if ( ! empty( $person['position'] ) ) { ?>
									<p><?php echo esc_html_e( $person['position'] ); ?></p>
								<?php } ?>

								<!-- LINKEDIN PROFILE -->
								<?php if ( ! empty( $person['linkedin_profile'] ) ) { ?>
									<a href="javascript:void(0);" class="sociallinkbtn"><?php esc_html_e( 'LinkedIn', 'marketingops' ); ?></a>
								<?php } ?>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>	
	</section>
<?php } ?>

<!-- CLIENTS -->
<?php if ( ! empty( $agency_clients_string ) ) { ?>
	<section class="agaeny_clients">
		<div class="agency-container">
			<h3><?php esc_html_e( 'Clients', 'marketingops' ); ?></h3>
			<p><?php echo wp_kses_post( $agency_clients_string ); ?></p>
		</div>	
	</section>
<?php } ?>

<!-- CERTIFICATIONS -->
<?php if ( ! empty( $agency_certifications_string ) ) { ?>
	<section class="agaeny_clients">
		<div class="agency-container">
			<h3><?php esc_html_e( 'Certifications', 'marketingops' ); ?></h3>
			<p><?php echo wp_kses_post( $agency_certifications_string ); ?></p>
		</div>	
	</section>
<?php } ?>

<!-- AWARDS -->
<?php if ( ! empty( $agency_awards ) && is_array( $agency_awards ) ) { ?>
	<section class="agaeny_clients">
		<div class="agency-container">
			<h3><?php esc_html_e( 'Awards', 'marketingops' ); ?></h3>
			<ul>
				<?php foreach ( $agency_awards as $agency_award ) {
					if ( ! empty( $agency_award['award_name'] ) ) { ?>
						<li><?php echo esc_html( $agency_award['award_name'] ); ?></li>
					<?php }
				} ?>
			</ul>
		</div>	
	</section>
<?php } ?>

<!-- ARTICLES -->
<?php
// debug( $agency_articles_args );
// debug( $agency_articles );
// debug( $agency_articles->posts );
?>
<?php if ( ! empty( $agency_articles->posts ) && is_array( $agency_articles->posts ) ) { ?>
	<section class="agency-spotlight">
		<div class="agency-container">
			<h2><?php esc_html_e( 'Articles & Press Releases', 'marketingops' ); ?></h2>
			<ul class="spotlitlist">
				<?php foreach ( $agency_articles->posts as $article_id ) {
					// var_dump( $article_id, get_post_type( $article_id ) );
					$article_title      = get_the_title( $article_id );
					$featured_image_id  = get_post_thumbnail_id( $article_id );
					$featured_image_url = ( ! empty( $featured_image_id ) && 0 !== $featured_image_id ) ? wp_get_attachment_image_url( $featured_image_id ) : '';
					?>
					<li>
						<a href="<?php echo esc_url( get_permalink( $article_id ) ); ?>">
							<div class="spotilebox">
								<?php if ( ! empty( $featured_image_url ) ) { ?>
									<div class="spotlightimgbox">
										<img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php echo ( ! empty( $article_title ) ) ? sanitize_title( $article_title ) : ''; ?>-img" /> 
									</div>
								<?php } ?>
								<div class="spotligtext">
									<h4 class="articalstitle"><?php echo wp_kses_post( $article_title ); ?></h4>
									<p class="articals"><?php echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $article_id ), 20, '...' ) ); ?></p>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>	
	</section>
<?php } ?>

<!-- JOBS -->
<?php if ( ! empty( $agency_jobs->posts ) && is_array( $agency_jobs->posts ) ) { ?>
	<section class="agaeny_jobs">
		<div class="agency-container">
			<h3><?php esc_html_e( 'Jobs', 'marketingops' ); ?></h3>
			<?php foreach ( $agency_jobs->posts as $job_id ) {
				$job_title          = get_the_title( $job_id );
				$job_types          = wp_get_object_terms( $job_id, 'job_listing_type' );
				$featured_image_id  = get_post_thumbnail_id( $job_id );
				$featured_image_url = ( ! empty( $featured_image_id ) && 0 !== $featured_image_id ) ? wp_get_attachment_image_url( $featured_image_id ) : '';
				?>
				<div class="jobdetailbox">
					<div class="joinnermainbox">
						<div class="jobinnerbox">
							<?php if ( ! empty( $featured_image_url ) ) { ?>
								<div class="jobinnerleft">
									<img src="<?php echo esc_url( $featured_image_url ); ?>" alt="<?php echo ( ! empty( $job_title ) ) ? sanitize_title( $job_title ) : ''; ?>-img" /> 
								</div>
							<?php } ?>
							<div class="jobinnerright">
								<h4><?php echo wp_kses_post( $job_title ); ?></h4>
								<h5>Shopify</h5>
							</div>
						</div>
						<div class="jobbtns">
							<a href="javascript:void(0);" class="seniurlevelbtn">Senior Level</a>

							<!-- JOB TYPE -->
							<?php if ( ! empty( $job_types ) && is_array( $job_types ) ) { ?>
								<?php foreach ( $job_types as $job_type ) { ?>
									<a href="javascript:void(0);" class="fulltimbtn"><?php echo esc_html( $job_type->name ); ?></a>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					<p><?php echo wp_kses_post( wp_trim_words( get_post_field( 'post_content', $job_id ), 40, '...' ) ); ?></p>
					<ul>
						<li>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2C7.313 2 3.5 5.813 3.5 10.5C3.5 12.518 4.2245 14.4765 5.5465 16.024C5.6975 16.1955 9.26 20.2435 10.45 21.378C10.8845 21.7925 11.442 22 12 22C12.558 22 13.1155 21.7925 13.5505 21.378C14.934 20.0585 18.3125 16.1855 18.4605 16.0155C19.7755 14.4765 20.5 12.518 20.5 10.5C20.5 5.813 16.687 2 12 2ZM12 13C10.6195 13 9.5 11.8805 9.5 10.5C9.5 9.1195 10.6195 8 12 8C13.3805 8 14.5 9.1195 14.5 10.5C14.5 11.8805 13.3805 13 12 13Z" fill="#6D7B83"/></svg></i> IL, Chicago
						</li>
						<li>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12.75 3C12.06 3 11.5 3.56 11.5 4.25V4.5V11.8701L13 10.9102V6C13.8285 6 14.5 5.3285 14.5 4.5H19C19 5.3285 19.6715 6 20.5 6V18C19.6715 18 19 18.6715 19 19.5H14.5C14.5 18.79 14.0096 18.2 13.3496 18.04L13 18.415L11.5703 19.9453C11.5704 19.9456 11.5702 19.946 11.5703 19.9463L11.5254 19.9951C11.6404 20.5701 12.145 21 12.75 21H13H20.5H20.75C21.44 21 22 20.44 22 19.75V19.5V4.5V4.25C22 3.56 21.44 3 20.75 3H20.5H13H12.75ZM16.75 6C16.4848 6 16.2304 6.10536 16.0429 6.29289C15.8554 6.48043 15.75 6.73478 15.75 7C15.75 7.26522 15.8554 7.51957 16.0429 7.70711C16.2304 7.89464 16.4848 8 16.75 8C17.0152 8 17.2696 7.89464 17.4571 7.70711C17.6446 7.51957 17.75 7.26522 17.75 7C17.75 6.73478 17.6446 6.48043 17.4571 6.29289C17.2696 6.10536 17.0152 6 16.75 6ZM10.5 7.44043L7.16992 8.46484C6.57492 8.64984 6.04504 9.01953 5.66504 9.51953L1.70508 14.7305C1.57008 14.9055 1.5 15.12 1.5 15.335V20C1.5 20.55 1.95 21 2.5 21L7.49023 20.9951C8.60023 20.9951 9.65516 20.5346 10.4102 19.7246L15.5547 14.2148C15.8497 13.9048 15.9951 13.5054 15.9951 13.1104C15.9951 12.6754 15.8197 12.2398 15.4697 11.9248C14.9447 11.4448 14.1597 11.3701 13.5547 11.7451L11.0254 13.3604V13.3652L9.50488 14.3799C9.43488 14.4249 9.35527 14.4596 9.28027 14.4746L9.25 14.4951L9.26465 14.4805C9.20965 14.4955 9.15461 14.5 9.09961 14.5C8.85461 14.5 8.60973 14.3803 8.46973 14.1553C8.24473 13.8053 8.34531 13.3401 8.69531 13.1201L10.5 11.9648V7.44043ZM16.75 9.55469C15.86 9.55469 15.0652 9.92965 14.5752 10.5146C15.1602 10.5546 15.7095 10.7896 16.1445 11.1846C16.6845 11.6696 16.9951 12.3754 16.9951 13.1104C16.9951 13.5854 16.8699 14.0404 16.6299 14.4404C16.6699 14.4454 16.71 14.4453 16.75 14.4453C18.27 14.4453 19.5 13.35 19.5 12C19.5 10.65 18.27 9.55469 16.75 9.55469ZM16.75 16C16.4848 16 16.2304 16.1054 16.0429 16.2929C15.8554 16.4804 15.75 16.7348 15.75 17C15.75 17.2652 15.8554 17.5196 16.0429 17.7071C16.2304 17.8946 16.4848 18 16.75 18C17.0152 18 17.2696 17.8946 17.4571 17.7071C17.6446 17.5196 17.75 17.2652 17.75 17C17.75 16.7348 17.6446 16.4804 17.4571 16.2929C17.2696 16.1054 17.0152 16 16.75 16Z" fill="#6D7B83"/></svg></i> $100,000 - $120,000
						</li>
						<li>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6.25 3C4.458 3 3 4.458 3 6.25V7H21V6.25C21 4.458 19.542 3 17.75 3H6.25ZM3 8.5V17.75C3 19.542 4.458 21 6.25 21H16.4043L14.0068 18.6025C13.7088 18.3045 13.4895 17.9347 13.373 17.5312C12.98 16.1582 12.6143 14.8672 12.6143 14.8672C12.5308 14.6467 12.4935 14.4152 12.502 14.1797C12.5185 13.7367 12.6992 13.3222 13.0107 13.0107C13.3242 12.6977 13.7401 12.517 14.1826 12.501C14.4151 12.4965 14.6467 12.5313 14.8662 12.6143C14.8662 12.6143 16.1563 12.9791 17.5283 13.3721C17.9343 13.4891 18.305 13.7088 18.6025 14.0068L21 16.4043V8.5H3ZM6.75 10H17.25C17.6645 10 18 10.3355 18 10.75C18 11.1645 17.6645 11.5 17.25 11.5H6.75C6.3355 11.5 6 11.1645 6 10.75C6 10.3355 6.3355 10 6.75 10ZM6.75 13H10.75C11.1645 13 11.5 13.3355 11.5 13.75C11.5 14.1645 11.1645 14.5 10.75 14.5H6.75C6.3355 14.5 6 14.1645 6 13.75C6 13.3355 6.3355 13 6.75 13ZM14.2168 13.5C14.0353 13.5065 13.8558 13.5778 13.7168 13.7168C13.5783 13.8553 13.507 14.0338 13.5 14.2148C13.4965 14.3153 13.5123 14.4172 13.5488 14.5127L14.334 17.2529C14.404 17.4944 14.5349 17.7155 14.7139 17.8945L19.1133 22.2949C19.4698 22.6519 19.892 22.8824 20.334 22.9619C20.4735 22.9869 20.612 22.9985 20.749 22.999C21.346 23.0005 21.9103 22.7703 22.3398 22.3398C22.7698 21.9103 23.001 21.346 23 20.749C22.9995 20.612 22.9874 20.4735 22.9619 20.334C22.8824 19.892 22.6519 19.4698 22.2949 19.1133L17.8955 14.7139C17.717 14.5354 17.4944 14.404 17.2529 14.334L14.5127 13.5488C14.4177 13.5128 14.3173 13.4965 14.2168 13.5Z" fill="#6D7B83"/></svg></i> 7 days ago
						</li>
					</ul>
				</div>
			<?php } ?>
		</div>	
	</section>
<?php } ?>
<?php
get_footer();
