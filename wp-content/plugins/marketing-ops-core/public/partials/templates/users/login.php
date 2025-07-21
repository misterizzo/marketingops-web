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

get_header();

if ( is_user_logged_in() ) {
	?>
	<section class="loginformnew">
	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element register_content login_content moc_login_form_section register_page login_page elementor-section elementor-section-boxed">
		<div class="elementor-widget-wrap elementor-element-populated moc-register-container elementor-container elementor-column-gap-default">
			<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-715834fb register_content">
				<div class="register_content login_content moc_login_form_section">
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
				</div>
			</div>
			<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ea2a0bd register_img">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-5dd7f05 elementor-widget elementor-widget-image" data-id="5dd7f05" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img fetchpriority="high" decoding="async" width="455" height="455" src="https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3.png" class="attachment-large size-large wp-image-165577" alt="Asset 1 3" srcset="https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3.png 455w, https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3-300x300.png 300w, https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3-150x150.png 150w, https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3-100x100.png 100w" sizes="(max-width: 455px) 100vw, 455px" title="Log In">													</div>
				</div>
				</div>	
			</div>	
		</div>
	</div>
</section>
	<?php
} else {
	?>
	<section class="loginformnew">
	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element register_content login_content moc_login_form_section register_page login_page elementor-section elementor-section-boxed">
		<div class="elementor-widget-wrap elementor-element-populated moc-register-container elementor-container elementor-column-gap-default">
			<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-715834fb register_content">
				<div class="register_content login_content moc_login_form_section">
				<div class="loader_bg">
					<div class="loader"></div>  
				</div>
				<div class="elementor-element profileheading gradient-title elementor-widget elementor-widget-heading">
					<div class="elementor-widget-container">
						<h2 class="elementor-heading-title elementor-size-default"><?php esc_html_e( 'Welcome back!', 'marketingops' ); ?></h2>
					</div>
				</div>
				<div class="elementor-element profilesubheading elementor-widget elementor-widget-text-editor">
					<div class="elementor-widget-container">
						<p><?php esc_html_e( 'Login to manage your account!', 'marketingops' ); ?></p>
					</div>
				</div>
				<div class="elementor-element profilfrm elementor-widget elementor-widget-shortcode">
					<div class="elementor-widget-container"><?php wp_login_form(); ?></div>
				</div>
			</div>

			</div>	
			<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ea2a0bd register_img">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-5dd7f05 elementor-widget elementor-widget-image" data-id="5dd7f05" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
													<img fetchpriority="high" decoding="async" width="455" height="455" src="https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3.png" class="attachment-large size-large wp-image-165577" alt="Asset 1 3" srcset="https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3.png 455w, https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3-300x300.png 300w, https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3-150x150.png 150w, https://marketingops.com/wp-content/uploads/2022/04/Asset-1-3-100x100.png 100w" sizes="(max-width: 455px) 100vw, 455px" title="Log In">													</div>
				</div>
				</div>	
			</div>	
		</div>
	</div>
</section>
	<?php
}

get_footer();
