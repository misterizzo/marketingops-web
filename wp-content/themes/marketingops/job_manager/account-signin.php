<?php
/**
 * In job listing creation flow, this template shows above the job creation form.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/account-signin.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.33.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$current_page_slug = ( ! empty( $post->post_name ) ) ? $post->post_name : '';

if ( is_user_logged_in() ) { ?>
	<div class="pyj_login_form pyj_logged_form">
		<fieldset class="fieldset-logged_in">
			<label><?php esc_html_e( 'Your account', 'marketingops' ); ?></label>
			<div class="field account-sign-in">
				<?php
				$user = wp_get_current_user();
				$username = moc_user_display_name( get_current_user_id() );
				// translators: Placeholder %s is the username.
				printf( wp_kses_post( __( 'You are currently signed in as <strong>%s</strong>.', 'marketingops' ) ), esc_html( $username ) );
				?>

				<div class="pyj_login_form_btn">
					<a class="button" href="<?php echo esc_url( apply_filters( 'submit_job_form_logout_url', wp_logout_url( get_permalink() ) ) ); ?>">
						<span class="form_btn_text"><?php esc_html_e( 'Sign Out', 'marketingops' ); ?></span>
					</a>
				</div>
			</div>
		</fieldset>
	</div>
<?php } else {
	$account_required    = job_manager_user_requires_account();
	$registration_fields = wpjm_get_registration_fields();
	?>
	<div class="pyj_login_form">
		<fieldset class="fieldset-login_required">
			<label><?php esc_html_e( 'Have an account?', 'marketingops' ); ?></label>
			<div class="field account-sign-in">
				<label><?php echo wp_kses_post( apply_filters( 'submit_job_form_login_required_message',  __( 'You must sign in to create a new listing.', 'marketingops' ) ) ); ?></label>
				<div class="pyj_login_form_btn">
					<a class="button" href="<?php echo esc_url( apply_filters( 'submit_job_form_login_url', home_url( "/log-in?redirect_to=/{$current_page_slug}/" ) ) ); ?>">
						<span class="form_btn_text"><?php esc_html_e( 'Sign in', 'marketingops' ); ?></span>
						<span class="form_btn_svg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none"><path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path></svg></span>
					</a>
				</div>
			</div>
		</fieldset>
	</div>
<?php } ?>

<div class="pyj_desc">
	<div class="pyj_desc_box">
		<div class="pyj_desc_icon"><img decoding="async" src="/wp-content/themes/marketingops/images/post_your_job/post_your_job_icon_2.svg" alt="post_your_job_desc_icon"></div>
			<div class="pyj_desc_text">
				<p><b>Get help reaching the right Marketing Operations Professionals for your job!</b> <span>If you need more help targeting your job posting, getting it featured above the other posts, or with recruiting needs, please <a href="/contact/">contact us</a>.</span></p>
			</div>
	</div>
</div>