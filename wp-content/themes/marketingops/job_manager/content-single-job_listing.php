<?php
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $post;
global $current_user;
wp_get_current_user();
$users_preffered_job_type = array();
if ( $current_user ) {
	$user_job_types = get_user_meta( $current_user->ID, 'job_type', true );
	if ( ! empty( $user_job_types ) ) {
		$users_preffered_job_type = $user_job_types;
	}
}
$salary    = get_post_meta( $post->ID, '_job_salary', true );
$bannersrc = get_field( 'banner' );
if ( ! empty( $bannersrc['url'] ) ) {
	$banner = $bannersrc['url'];
} else {
	$desktop_banner = get_field( 'moc_jobs_banner_for_desktop', 'option' );
	$mobile_banner  = get_field( 'moc_jobs_banner_for_mobile', 'option' );
	$banner = ( wp_is_mobile() ) ? $mobile_banner : $desktop_banner;
} 
if ( ! empty( get_field( 'company_placeholder_image', 'option' ) ) ) {
	$image_array            = get_field( 'company_placeholder_image', 'option' );
	$place_holder_image_url = $image_array['url'];
	$defaul_company_url     = $place_holder_image_url;
} else {
	$defaul_company_url = site_url() . '/wp-content/uploads/2022/03/logo_inst.png';
}
$company_id        = get_post_meta( $post->ID, '_company_id', true );
$company_name      = get_the_title( $company_id );
$company_logo_id   = ! empty( get_post_meta( $company_id, '_thumbnail_id', true ) ) ? get_post_meta( $company_id, '_thumbnail_id', true ) : 0;
$company_logo_src  = ( 0 < $company_logo_id ) ? wp_get_attachment_image_src( $company_logo_id, 'thumbnail' ) : array( $defaul_company_url );
if ( ! wp_is_mobile() ) {
	?>
	<div class="job_banner">
		<img src="<?php echo esc_url( $banner ); ?>" alt="<?php echo esc_attr( $banner ); ?>" />
	</div>
	<div class="single_job_listing">
		<div class="eachjobdetail">
			<div class="comlogo"><img class="company_logo" src="<?php echo esc_url( $company_logo_src[0] ); ?>" alt="<?php echo esc_attr( $company_name ); ?>"></div>
				<div class="comdetails">
					<h3><?php wpjm_the_job_title(); ?></h3>
					<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
						<?php $job_types = wpjm_get_the_job_types(); ?>
						<?php if ( ! empty( $job_types ) ) : ?>
							<ul class="jobcats">
								<?php
								if ( ! empty( $company_id ) ) { ?>
									<li class="jobcatx"><span><?php echo esc_html( $company_name ); ?></span></li>
								<?php
								} 
								?>
								<?php foreach ( $job_types as $job_type ) :
									$selected = '';
									if ( $users_preffered_job_type && in_array( $job_type->slug, $users_preffered_job_type, true ) ) {
										$selected = 'selected';
									}
									?>
									<li class="job-type <?php echo esc_attr( $selected ) . ' ' . esc_attr( sanitize_title( $job_type->slug ) ); ?> is_boxed"><?php echo esc_html( $job_type->name ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php } ?>
					<ul class="jobmeta">
						<li class="location"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/location_icon.svg' ); ?>" width="" height="" alt="" /> <?php the_job_location( false ); ?></li>
						<?php
						if ( ! empty( $salary ) ) {
							$salary_icon_image_url = get_stylesheet_directory_uri() . '/images/money.svg';
							?>
						<li class="jobsalaryx">
							<?php echo ( ! empty( $salary ) ) ? '<img src="' . esc_url( $salary_icon_image_url ) . '" width="" height="" alt="" /> $' . esc_html( $salary ) : '-'; ?></li>
						<?php } ?>
						<?php do_action( 'job_listing_meta_start' ); ?>
						<li class="date"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/post_date.svg' ); ?>" width="" height="" alt="" /> <?php the_job_publish_date(); ?></li>
						<?php do_action( 'job_listing_meta_end' ); ?>
					</ul>
				</div>
				<div class="comapply">
					<?php
					if ( get_the_job_application_method() ) :
						$apply                      = get_the_job_application_method();
						$apply_now_default_btn_text = get_field_object( 'apply_now_button_text', 'option' );
						$apply_now_default_btn_text = ! empty ( $apply_now_default_btn_text ) ? $apply_now_default_btn_text['default_value'] : 'Apply Now';
						$apply_now_text             = ! empty( get_field( 'apply_now_button_text', 'option' ) ) ? get_field( 'apply_now_button_text', 'option' ) : $apply_now_default_btn_text;

						wp_enqueue_script( 'wp-job-manager-job-application' );
						?>
						<div class="job_application application">
							<?php do_action( 'job_application_start', $apply ); ?>
							<a href="<?php echo esc_url( $apply->url ); ?>" target="_blank" class="moc_job_apply_btn application_button button"><?php esc_attr_e( $apply_now_text, 'wp-job-manager' ); ?></a>
							<?php do_action( 'job_application_end', $apply ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="job_description">
				<?php wpjm_the_job_description(); ?>
			</div>
		</div>
	</div>
	<?php
} else {
	?>
	
	<div class="job_banner">
		<img src="<?php echo esc_url( $banner ); ?>" alt="<?php echo esc_attr( $banner ); ?>" />
	</div>
	<div class="single_job_listing">
		<div class="eachjobdetail">
			<div class="comlogo"><img class="company_logo" src="<?php echo esc_url( $company_logo_src[0] ); ?>" alt="<?php echo esc_attr( $company_name ); ?>"></div>
				<div class="comdetails">
					<h3><?php wpjm_the_job_title(); ?></h3>
					<ul class="jobmeta">
						<li class="location"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/location_icon.svg' ); ?>" width="" height="" alt="" /> <?php the_job_location( false ); ?></li>
						<?php
						if ( ! empty( $salary ) ) {
							$salary_icon_image_url = get_stylesheet_directory_uri() . '/images/money.svg';
							?>
						<li class="jobsalaryx">
							<?php echo ( ! empty( $salary ) ) ? '<img src="' . esc_url( $salary_icon_image_url ) . '" width="" height="" alt="" /> $' . esc_html( $salary ) : '-'; ?></li>
						<?php } ?>
						<?php do_action( 'job_listing_meta_start' ); ?>
						<li class="date"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/post_date.svg' ); ?>" width="" height="" alt="" /> <?php the_job_publish_date(); ?></li>
						<?php do_action( 'job_listing_meta_end' ); ?>
					</ul>
					<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
						<?php $job_types = wpjm_get_the_job_types(); ?>
						<?php if ( ! empty( $job_types ) ) : ?>
							<ul class="jobcats">
								<?php
								if ( ! empty( $company_id ) ) { ?>
									<li class="jobcatx"><span><?php echo esc_html( $company_name ); ?></span></li>
								<?php
								} 
								?>
								<?php foreach ( $job_types as $job_type ) :
									$selected = '';
									if ( $users_preffered_job_type && in_array( $job_type->slug, $users_preffered_job_type, true ) ) {
										$selected = 'selected';
									}
									?>
									<li class="job-type <?php echo esc_attr( $selected ) . ' ' . esc_attr( sanitize_title( $job_type->slug ) ); ?> is_boxed"><?php echo esc_html( $job_type->name ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php } ?>
				</div>
				<div class="comapply">
					<?php
					if ( get_the_job_application_method() ) :
						$apply                      = get_the_job_application_method();
						$apply_now_default_btn_text = get_field_object( 'apply_now_button_text', 'option' );
						$apply_now_default_btn_text = ! empty ( $apply_now_default_btn_text ) ? $apply_now_default_btn_text['default_value'] : 'Apply Now';
						$apply_now_text             = ! empty( get_field( 'apply_now_button_text', 'option' ) ) ? get_field( 'apply_now_button_text', 'option' ) : $apply_now_default_btn_text;

						wp_enqueue_script( 'wp-job-manager-job-application' );
						?>
						<div class="job_application application">
							<?php do_action( 'job_application_start', $apply ); ?>
							<a href="<?php echo esc_url( $apply->url ); ?>" target="_blank" class="moc_job_apply_btn application_button button"><?php esc_attr_e( $apply_now_text, 'wp-job-manager' ); ?></a>
							<?php do_action( 'job_application_end', $apply ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="job_description">
				<?php wpjm_the_job_description(); ?>
			</div>
		</div>
	</div>

	<?php
}
