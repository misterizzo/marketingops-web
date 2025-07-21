<?php
/**
 * User Edit Template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/users/profile-setup.php.
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

global $wpdb;

get_header();

// Redirect the user to the login page if they are not logged in.
if ( ! is_user_logged_in() ) {
	wp_redirect( home_url( 'log-in' ), 301 );
	exit;
}

$user_id = get_current_user_id();

$ppress_custom_fields = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE field_key = %s', array( 'experience' ) ), ARRAY_A );
$options              = $ppress_custom_fields[0]['options'];
$options              = explode( ',', $options );
$experience_years     = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE field_key = %s', array( 'experience_years' ) ), ARRAY_A );
$years_options        = $experience_years[0]['options'];
$years_options        = explode( ',', $years_options );
$all_user_meta        = get_user_meta( $user_id );
$first_name           = ! empty ( $all_user_meta['first_name'][0] ) ? $all_user_meta['first_name'][0] : '';
$lastname             = ! empty( $all_user_meta['last_name'][0] ) ? $all_user_meta['last_name'][0] : '';
$location             = ! empty( $all_user_meta['country'][0] ) ? $all_user_meta['country'][0] : ( ! empty( $all_user_meta['billing_country'][0] ) ? $all_user_meta['billing_country'][0] : '' );
$location            = ! empty( $location ) ? $location : '';
$profetional_title    = ! empty( get_user_meta( $user_id, 'profetional_title', true ) ) ? get_user_meta( $user_id, 'profetional_title', true ) : '';
$wipm                 = ! empty( get_user_meta( $user_id, 'experience', true ) ) ? get_user_meta( $user_id, 'experience', true ) : '';
$year_experience      = ! empty( get_user_meta( $user_id, 'experience_years', true ) ) ? get_user_meta( $user_id, 'experience_years', true ) : '' ;
$job_seeker_fields    = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE field_key = %s', array( 'job_seeker_details' ) ), ARRAY_A );
$job_options          =  $job_seeker_fields[0]['options'];
$job_options          =  explode( ',', $job_options );
$job_seeker_details   = ! empty( get_user_meta( $user_id, 'job_seeker_details', true ) ) ? get_user_meta( $user_id, 'job_seeker_details', true ) : '' ;
$default_user_img     = get_field( 'moc_user_default_image', 'option' );
$user_img_id          = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '' ;
$user_img_url         = ! empty( $user_img_id ) ? wp_get_attachment_image_src( $user_img_id, 'full' ) : '';
$image_url            = ! empty( $user_img_url ) ? $user_img_url[0] : $default_user_img;
$main_div_class       = ! empty( $user_img_id ) ? 'pic_here' : 'blank_pic';
$delete_div_class     = ! empty( $user_img_id ) ? 'pic_no_delete_button' : 'pic_delete_button';
$wipm_selected        = ! empty( $wipm ) ? 'moc_change_selection' : '';
$ye_selected          = ! empty( $year_experience ) ? 'moc_change_selection' : '';
$location_class       = ! empty( $location ) ? 'moc_change_selection' : '';
$jsd_selected_class   = ! empty( $job_seeker_details ) ? 'moc_change_selection' : '';
$member_plan_obj      = moc_get_membership_plan_object();

// Set the redirection based on the most recently activated membership plan.
if ( ! empty( $member_plan_obj[0]->plan_id ) ) {
	$signup_redirect_type = get_post_meta( $member_plan_obj[0]->plan_id, 'signup_redirect_type', true );
	$signup_redirect_url  = 'https://community.marketingops.com/';

	// If the signup redirection is internal.
	if ( 'internal' === $signup_redirect_type ) {
		$page_id             = get_post_meta( $member_plan_obj[0]->plan_id, 'signup_redirect_internal', true );
		$signup_redirect_url = ( ! empty( $page_id ) ) ? get_permalink( $page_id ) : $signup_redirect_url;
	} elseif ( 'external' === $signup_redirect_type ) {
		$external_url        = get_post_meta( $member_plan_obj[0]->plan_id, 'signup_redirect_external', true );
		$signup_redirect_url = ( ! empty( $external_url ) ) ? $external_url : $signup_redirect_url;
	}
}

?>
<section class="profile_setup">
	<div class="loader_bg">
		<div class="loader"></div>  
	</div>
	<div class="setup_container">
		<!-- proile setup title -->
		<div class="setup_title">
			<h1><?php esc_html_e( 'Set Up Profile', 'marketingops' ); ?></h1>
			<p><?php esc_html_e( 'Please fill in basic account data', 'marketingops' ); ?></p>
		</div>
		<!-- profile setup form content -->
		<div class="setup_form">
			<form action="" method="">
				<div class="form_container">
					<!-- first Three box -->
					<div class="form_two_box">
						<!-- inputs -->
						<div class="box_container profile_inputs">

							<!-- form row -->
							<div class="form_row">
								<!-- input with error -->
								<div class="content_boxed moc_required_field">
									<input type="text" class="inputtext" name="moc_first_name" placeholder="First Name" value="<?php echo esc_html( $first_name ); ?>">
									<div class="moc_error moc_first_name_err">
										<span></span>
									</div>
								</div>
							</div>

							<!-- form row -->
							<div class="form_row">
								<!-- input with error -->
								<div class="content_boxed moc_required_field">
									<input type="text" class="inputtext" name="moc_last_name" placeholder="Last name" value="<?php echo esc_html( $lastname ); ?>">
									<div class="moc_error moc_last_name_err">
										<span></span>
									</div>
								</div>
							</div>

							<!-- form row -->
							<div class="form_row">
								<!-- input with error -->
								<div class="content_boxed required moc_required_field">
									<?php 
									global $woocommerce;
									$countries_obj   = new WC_Countries();
									$countries   = $countries_obj->__get('countries');
									?>
									<select id="moc_location" class="<?php echo esc_attr( $location_class ); ?>">
										<option value=""><?php esc_html_e( 'Location', 'marketingops' ); ?></option>
										<?php
										foreach ( $countries as $key=> $country ) {
											$option_selected = ( ! empty( $location ) && $location === $key ) ? 'selected="selected"' : '';
											?>
											<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $option_selected ); ?>><?php echo esc_html( $country ); ?></option>
											<?php
										}
										?>
									</select>
									<div class="moc_error moc_location_err">
										<span></span>
									</div>
								</div>
							</div>

						</div>
						<!-- profile pic -->
						<div class="box_container profile_pic">
							<!-- if pic is uploaded -->
							<!-- if pic is not uploaded -->
							<div class="pic_box <?php echo esc_attr( $main_div_class ); ?>">
								<input type="file" name="moc_profie_pic" class="moc_profie_pic" >
								<img src="<?php echo esc_url( $image_url ); ?>" alt="user_icon" id="moc_profile_preview" />
								<div class="pic_box_content_box">
									<h5><?php esc_html_e( 'Profile Picture', 'marketingops' ); ?></h5>
									<p><?php esc_html_e( 'Max 512x512 px', 'marketingops' ); ?></p>
									<p><?php esc_html_e( 'Min 212x212 px', 'marketingops' ); ?></p>
									<p><?php esc_html_e( 'Drag image here or click "Select"', 'marketingops' ); ?></p>
								</div>
								<button class="pic_delete_button <?php echo esc_attr( $delete_div_class ); ?>" type="button">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.42871 4.25L8.96454 0.714167C9.28993 0.38878 9.81749 0.388779 10.1429 0.714167C10.4683 1.03955 10.4683 1.56711 10.1429 1.8925L6.60704 5.42833L10.1429 8.96417C10.4683 9.28956 10.4683 9.81711 10.1429 10.1425C9.81749 10.4679 9.28993 10.4679 8.96454 10.1425L5.42871 6.60667L1.89288 10.1425C1.56749 10.4679 1.03993 10.4679 0.714544 10.1425C0.389156 9.81711 0.389155 9.28956 0.714543 8.96417L4.25038 5.42833L0.714544 1.8925C0.389156 1.56711 0.389156 1.03955 0.714544 0.714167C1.03993 0.388779 1.56749 0.38878 1.89288 0.714167L5.42871 4.25Z" fill="url(#paint0_linear_2365_4013)" />
										<defs>
											<linearGradient id="paint0_linear_2365_4013" x1="0.469369" y1="0.514539" x2="15.688" y2="15.7331" gradientUnits="userSpaceOnUse">
											<stop stop-color="#FD4B7A" />
											<stop offset="1" stop-color="#4D00AE" />
											</linearGradient>
										</defs>
									</svg>
								</button>
								<!-- <div class="pic_box_content">
									<div class="pic_box_text">
										<input type="button" class="input-text delete_button" value="Delete" />
										<span><?php esc_html_e( 'Delete', 'marketingops' ); ?></span>
									</div>
								</div> -->
							</div>
							<div class="moc_error moc_profile_pic_err">
								<span></span>
							</div>
						</div>
					</div>

					<!-- form row -->
					<div class="form_row">
						<!-- input with error -->
						<div class="content_boxed">
							<input type="text" class="inputtext" name="moc_pro_text" placeholder="Professional title"  value="<?php echo esc_html( $profetional_title ); ?>">
						</div>
					</div>

					<!-- form row -->
					<div class="form_row">
						<!-- input with error -->
						<div class="content_boxed required">
							<select id="moc_what_is_your_map" class="<?php echo esc_attr( $wipm_selected ); ?>">
								<option value=""><?php esc_html_e( 'What is your primary MAP?', 'marketingops' ); ?></option>
								<?php
								foreach ( $options as $option ) {
									$option_selected = ( $option === $wipm ) ? 'selected' : '';
									echo '<option value="' . $option . '" ' . $option_selected . '>' . esc_html( $option ) . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<!-- form row -->
					<div class="form_row">
						<!-- input with error -->
						<div class="content_boxed required">
							<select id="moc_years_in_marketing_operation" class="<?php echo esc_attr( $ye_selected ); ?>">
								<option value=""><?php esc_html_e( 'Years in Marketing Operation', 'marketingops' ); ?></option>
								<?php
								foreach ( $years_options as $years_option ) {
									if ( $year_experience > 0 && $year_experience <= 1 ) {
										$year_experience = '0-1';
									} elseif (  $year_experience >= 2 && $year_experience <= 5 ) {
										$year_experience = '2-5';
									} elseif (  $year_experience >= 6 && $year_experience <= 9 ) {
										$year_experience = '6-9';
									} elseif (  $year_experience >= 10 &&  $year_experience <= 14 ) {
										$year_experience = '10-14';
									} elseif (  $year_experience > 14 ) {
										$year_experience = '15+';
									} else {
										$year_experience = '';
									}
									$option_selected = ( $year_experience === $years_option ) ? 'selected' : '';
									echo '<option value="' . $years_option . '" ' . $option_selected . '>' . esc_html( $years_option ) . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<!-- form row -->
					<div class="form_row">
						<!-- input with error -->
						<div class="content_boxed required">
							<select id="moc_job_seeker_details" class="<?php echo esc_attr( $jsd_selected_class ); ?>">
								<option value=""><?php esc_html_e( 'Job Seeker Details', 'marketingops' ); ?></option>
								<?php
								foreach ( $job_options as $job_option ) {
									$option_selected = ( sanitize_title( $job_option ) === sanitize_title( $job_seeker_details ) ) ? 'selected' : '';
									echo '<option value="' . $job_option . '" ' . $option_selected . '>' . esc_html( $job_option ) . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<?php // if ( '183.82.162.107' === $_SERVER['REMOTE_ADDR'] ) { ?>
						<!-- form row -->
						<div class="form_row smtc_network">
							<!-- input with error -->
							<div class="content_boxed">
								<input type="checkbox" id="moc_join_smtc_network" value="1" />
								<label for="moc_join_smtc_network"><?php esc_html_e( 'My primary income is from consulting and I would like to join the MarketingOps private network: Society of Marketing Technology Consultants (SMTC).', 'marketingops' ); ?></label>
							</div>
						</div>
					<?php // } ?>

					<!-- form row -->
					<div class="form_row form_btn">

						<!-- text -->
						<p><?php esc_html_e( 'You will be able to fill in more profile data later', 'marketingops' ); ?></p>

						<!-- btn -->
						<input type="hidden" name="moc_signup_redirect_url" value="<?php echo esc_url( $signup_redirect_url ); ?>">
						<button type="button" class="btn moc_save_final_step">
							<span class="text"><?php esc_html_e( 'Save & Next', 'marketingops' ); ?></span>
							<span class="svg">
								<svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.2762 0.994573C11.0392 0.985459 10.8193 1.12103 10.7225 1.3375C10.6245 1.55396 10.6667 1.80688 10.8307 1.98005L12.6228 3.91682H1.34283C1.13206 3.9134 0.937248 4.02391 0.831296 4.20619C0.724204 4.38734 0.724204 4.61292 0.831296 4.79406C0.937248 4.97634 1.13206 5.08685 1.34283 5.08344H12.6228L10.8307 7.02021C10.6849 7.17287 10.6336 7.39161 10.6952 7.59326C10.7567 7.79492 10.9219 7.94758 11.1269 7.99315C11.3331 8.03872 11.5473 7.96922 11.6875 7.81314L14.751 4.50013L11.6875 1.18711C11.5826 1.0709 11.4334 1.00027 11.2762 0.994573Z" fill="white" />
								</svg>
							</span>
						</button>

					</div>
				</div>
				<input type="hidden" class="moc_previously_stored_attach_id" value="<?php echo esc_attr( $user_img_id ); ?>">
			</form>
		</div>
	</div>
</section>
<?php

get_footer();
