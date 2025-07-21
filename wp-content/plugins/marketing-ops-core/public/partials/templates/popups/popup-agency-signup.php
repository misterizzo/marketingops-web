<?php
/**
 * This file is used for templating the agency signup modal on the customer dashboard.
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/templates/popups
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

$paid_agency_signup_url = '';
$free_agency_signup_url = '';
?>
<!-- This is what will be included inside the popup -->
<div class="mainpricebox my-account-agency-profile agencysignup">
	<div class="innermainpricebox">
		<div class="mainpriceboxclose">
			<button class="closebuttonmainprice">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M7 7L12 12L7 17" stroke="#45474F" stroke-width="1.3"></path><path d="M17 7L12 12L17 17" stroke="#45474F" stroke-width="1.3"></path></svg>
			</button>	
		</div>	
		<div class="innerboxprice">
			<h2><?php esc_html_e( 'Wish to continue with same email?', 'marketingops' ); ?></h2>
			<ul>
				<li>
					<p>
						<input type="radio" id="yes" name="agency-signup-same-email" checked value="yes" data-redirect="<?php echo esc_url( $agency_signup_url ); ?>">
						<label for="yes"><?php esc_html_e( 'Yes', 'marketingops' ); ?>
						<small><?php esc_html_e( 'You will be redirected to the agency application form.', 'marketingops' ); ?></small>
						<input type="text" name="agency-name" class="agancyinputbox" placeholder="<?php esc_html_e( 'Name of your agency', 'marketingops' ); ?>">
					</p>
				</li>
				<li>
					<p>
						<input type="radio" id="no" name="agency-signup-same-email" value="no">
						<label for="no"><?php esc_html_e( 'No', 'marketingops' ); ?>
						<small><?php esc_html_e( 'You will be logged out of the system, redirected to the agency signup page from where you can use your preferred email to begin.', 'marketingops' ); ?></small>
					</p>
				</li>
				<li class="action-set">
					<a href="#" class="monthlybtns proceed-to-agency-signup"><?php esc_html_e( 'Proceed', 'marketingops' ); ?></a>
				</li>
			</ul>	
		</div>	
	</div>	
</div>
