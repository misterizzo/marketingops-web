<?php
/**
 * User Login Template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/users/login.php.
 *
 * @see         https://marketingops.com/
 * @author      Adarsh Verma
 * @package     Marketing_Ops_Core
 * @category    Template
 * @since       1.0.0
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

global $current_user;

get_header();

$type        = filter_input( INPUT_GET, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$heading     = ( ! is_null( $type ) && 'agency' === $type ) ? __( 'Create Your Free Agency Profile', 'marketingops' ) : __( 'Create Your Free Profile', 'marketingops' );
$show_signup = true;
$user_email  = '';
$plan_id     = (int) filter_input( INPUT_GET, 'plan', FILTER_SANITIZE_NUMBER_INT );

if ( is_user_logged_in() ) {
	// Check if the user already has the plan requested in the URL.
	$user_active_memberships = moc_get_membership_plan_object();
	$user_email              = $current_user->data->user_email;

	// If there are active memberships, check if the plan ID is in the list.
	if ( ! empty( $user_active_memberships ) && is_array( $user_active_memberships ) ) {
		// Loop through the active memberships and check if the plan ID is present.
		foreach ( $user_active_memberships as $user_active_membership ) {
			// Check if the plan ID is in the active memberships.
			if ( $user_active_membership->plan_id === $plan_id ) {
				// The user already has the requested plan.
				$show_signup = false;
				break;
			}
		}
	}
} else {
	$show_signup = true;
}

// If the user is not logged in or does not have the requesting plan, show the signup form.
if ( true === $show_signup ) {
	$plan_access_method = get_post_meta( $plan_id, '_access_method', true );

	if ( 'purchase' === $plan_access_method ) {
		$product_ids = get_post_meta( $plan_id, '_product_ids', true );

		if ( ! empty( $product_ids ) && is_array( $product_ids ) ) {
			foreach ( $product_ids as $key => $product_id ) {
				$wc_product = wc_get_product( $product_id );

				if ( 'subscription_variation' === $wc_product->get_type() ) {
					wp_safe_redirect( wc_get_checkout_url() . '?add-to-cart=' . $product_id );
					exit;
				}
			}
		}
	}
	?>
	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element register_content">
		<div class="elementor-widget-wrap elementor-element-populated moc-register-container">
			<div class="loader_bg">
				<div class="loader"></div>  
			</div>
			<div class="elementor-element profileheading gradient-title elementor-widget elementor-widget-heading">
				<div class="elementor-widget-container">
					<h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html( $heading ); ?></h2>
				</div>
			</div>

			<!-- is the user is not logged in -->
			<?php if ( ! is_user_logged_in() ) { ?>
				<div class="elementor-element profilesubheading elementor-widget elementor-widget-text-editor">
					<div class="elementor-widget-container">
					<?php esc_html_e( 'Already a member?', 'marketingops' ); ?> <a href="<?php echo esc_url( site_url( 'log-in' ) ); ?>"><?php esc_html_e( 'Log in', 'marketingops' ); ?></a> </div>
				</div>
			<?php } ?>

			<div class="elementor-element profilfrm elementor-widget elementor-widget-shortcode moc_signup_form">
				<div class="elementor-widget-container">
					<div class="elementor-shortcode">
						<div id="moc-registration-1-wrap" class="moc-form-container moc-registration-form-wrapper">
							<div id="moc-registration-1" class="moc-form-wrapper moc-registration moc-registration-1 ppBuildScratch ppfl-flat ppsbl-pill ppsbw-full-width ppf-remove-frame ppfs-medium ppfia-right">
								<div class="ppbs-headline"><?php esc_html_e( 'Create Your Free Profile', 'marketingops' ); ?></div>
								
								<!-- If the registration is of agency type -->
								<?php if ( ! is_null( $type ) && 'agency' === $type ) { ?>
									<div class="moc-form-field-wrap reg-agencyname reg-username fw-full fda-standard fld-above">
										<div class="moc-form-field-input-textarea-wrap">
											<input name="reg_agencyname" type="text" placeholder="<?php esc_html_e( 'Your Agency Name*', 'marketingops' ); ?>" class="moc-form-field reg-agencyname moc-agencyname" required="required">
											<div class="moc_error moc_agencyname_err">
												<span></span>
											</div>
										</div>
									</div>
								<?php } else { ?>
									<div class="moc-form-field-wrap reg-username fw-full fda-standard fld-above">
										<div class="moc-form-field-input-textarea-wrap">
											<input name="reg_username" type="text" placeholder="Preferred Profile Handle*" class="moc-form-field reg-username moc-username" required="required">
											<div class="moc_error moc_username_err">
												<span></span>
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="moc-form-field-wrap reg-email fw-full fda-standard fld-above">
									<div class="moc-form-field-input-textarea-wrap">
										<input name="reg_email" type="email" placeholder="E-mail Address" class="moc-form-field reg-email moc-email" required="required" value="<?php echo esc_attr( ! empty( $user_email ) ? $user_email : '' ); ?>" <?php echo esc_attr( ! empty( $user_email ) ? 'disabled' : '' ); ?>>
										<div class="moc_error moc_email_err">
											<span></span>
										</div>
									</div>
								</div>

								<!-- is the user is not logged in -->
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="moc-form-field-wrap reg-password moc-password-element fw-full has-password-visibility-icon fda-standard fld-above">
										<div class="moc-form-field-input-textarea-wrap">
											<input name="reg_password" type="password" placeholder="Password (6+ characters, 1 capital letter, 1 special letter, 1 number)" class="moc-form-field reg-password moc-password" required="required">
											<a href="#" class="password_icon moc_pass_icon">
												<input name="reg_password_present" type="hidden" value="true">
												<img src="/wp-content/plugins/marketing-ops-core/public/images/password_unhide_icon.svg" alt="password_unhide" />
											</a>
											<i class="moc-form-material-icons"><?php esc_html_e( 'visibility', 'marketingops' ); ?></i>
											<div class="moc_error moc_password_err">
												<span></span>
											</div>
										</div>
									</div>
									<div class="moc-form-field-wrap reg-confirm-password moc-password-element fw-full fda-standard fld-above">
										<div class="moc-form-field-input-textarea-wrap">
											<input name="reg_password2" type="password" placeholder="Confirm Password" class="moc-form-field reg-confirm-password moc-confirm-password" required="required">
											<a href="#" class="password_icon moc_pass_icon">
												<input name="reg_password_present" type="hidden" value="true">
												<img src="/wp-content/plugins/marketing-ops-core/public/images/password_unhide_icon.svg" alt="password_unhide" />
											</a>
											<div class="moc_error moc_confirm_password_err">
												<span></span>
											</div>
										</div>
									</div>
								<?php } ?>

								<div class="moc-form-field-wrap reg-cpf-who-referred-youtext fw-full fda-standard fld-above">
									<div class="moc-form-field-input-textarea-wrap">
										<input name="who_referred_you" type="text" placeholder="How did you hear about us?" class="moc-form-field reg-cpf moc-referred">
									</div>
								</div>
								<div class="moc-form-field-wrap moc-custom-html fw-full fda-standard fld-above">
									<div class="moc-form-field-input-textarea-wrap">
										<p><?php esc_html_e( 'By clicking “Create Profile” you are agreeing with our', 'marketingops' ); ?> <a target="_blank" href="<?php echo esc_url( site_url( 'privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'marketingops' ); ?></a> <?php esc_html_e( 'and', 'marketingops' ); ?> <a href="<?php echo esc_url( site_url( 'terms-conditions' ) ); ?>" target="_blank"><?php esc_html_e( 'Terms of Use', 'marketingops' ); ?></a></p>
									</div>
								</div>
								<div class="moc-form-submit-button-wrap">
									<button name="reg_submit" type="submit" class="moc-submit-form ppform-submit-button"><?php esc_html_e( 'Create Profile', 'marketingops' ); ?></button>
									<input type="hidden" name="reg_type" value="<?php echo esc_attr( ( ! is_null( $type ) && 'agency' === $type ) ? 'agency' : 'individual' ); ?>" />
								</div>
							</div>
						</div>
						<!-- / ProfilePress WordPress plugin. -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
} else {
	?>
	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element register_content">
		<div class="elementor-widget-wrap elementor-element-populated">
			<div class="elementor-element profileheading gradient-title elementor-widget elementor-widget-heading">
				<div class="elementor-widget-container">
					<h2 class="elementor-heading-title elementor-size-default"><?php esc_html_e( 'You are already loggedin!', 'marketingops' ); ?></h2>
				</div>
			</div>
			<div class="elementor-element profileheading elementor-widget elementor-widget-button">
				<div class="elementor-widget-container">
					<a href="<?php echo esc_url( home_url( 'profile' ) ); ?>" class="elementor-button elementor-size-default"><?php esc_html_e( 'Go to my profile', 'marketingops' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}

get_footer();
