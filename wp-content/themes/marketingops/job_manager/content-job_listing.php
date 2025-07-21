<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.34.0
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
$get_company_id   = get_post_meta( $post->ID, '_company_id', true );
$get_company_name = get_the_title( $get_company_id );
// if($_SERVER["REMOTE_ADDR"]=='103.81.94.137'){
// 	debug( the_company_logo() );
// 	die;
// }

?>
<li <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_long ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_lat ); ?>">
	<div class="job_detail_section">
		<?php $salary = get_post_meta( get_the_id(), '_job_salary', true ); ?>
		<div class="firstrow">
			<?php
			if ( ! empty( the_company_logo() ) ) {
				?>
				<?php the_company_logo(); ?>
				<?php
			}
			?>
			
			<div class="comdetail">
				<h3><a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a></h3>
				<div class="jobcatx"><span><?php echo esc_html( $get_company_name ); ?></span></div>
			</div>
			<?php if ( get_option( 'job_manager_enable_types' ) ) { ?>
				<ul class="all_jobtypes">
					<?php $job_types = wpjm_get_the_job_types(); ?>
					<?php
					if ( ! empty( $job_types ) ) :
						foreach ( $job_types as $job_type ) :
							$selected = '';
							if ( $users_preffered_job_type && in_array( $job_type->slug, $users_preffered_job_type, true ) ) {
								$selected = 'selected';
							}
							?>
						<li class="job-type <?php echo esc_attr( $selected ) . ' ' . esc_attr( sanitize_title( $job_type->slug ) ); ?>"><?php echo esc_html( $job_type->name ); ?></li>
							<?php
							endforeach;
						endif;
					?>
				</ul>
			<?php } ?>
		</div>
		<div class="jobexcerpt"><?php echo esc_html( get_the_excerpt() ); ?></div>
		<div class="jobsmeta_container">
			<ul class="jobsmeta">
				<li class="location"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/location_icon.svg' ); ?>" width="" height="" alt="" /> <?php the_job_location( false ); ?></li>
				<?php if ( ! empty( $salary ) ) :?>
				<li class="salary">
					<?php echo ( ! empty( $salary ) ) ? '<img src="' . esc_url( get_stylesheet_directory_uri() ) . '/images/money.svg" width="" height="" alt="" /> $' . esc_html( $salary ) : '-'; ?>
				</li>
				<?php endif; ?>
				<li class="date"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/post_date.svg' ); ?>" width="" height="" alt="" /> <?php the_job_publish_date(); ?></li>
			</ul>
			<div class="jobsmeta_view_position_btn">
				<a href="<?php the_job_permalink(); ?>" class="view_position_btn"> <?php esc_html_e( 'View Position', 'wp-job-manager' ); ?> 
					<span class="elementor-button-icon elementor-align-icon-right">
						<svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.9316 0.494141C12.8196 0.494168 12.7103 0.527593 12.6174 0.590141C12.5246 0.652688 12.4525 0.741513 12.4104 0.84525C12.3684 0.948987 12.3582 1.06292 12.3812 1.17247C12.4043 1.28202 12.4595 1.3822 12.5398 1.46021L15.3295 4.25H1.31245C1.23792 4.24895 1.16391 4.26272 1.09474 4.29051C1.02557 4.31831 0.962618 4.35957 0.909535 4.41191C0.856452 4.46425 0.8143 4.52661 0.78553 4.59538C0.756759 4.66415 0.741943 4.73795 0.741943 4.8125C0.741943 4.88704 0.756759 4.96085 0.78553 5.02962C0.8143 5.09839 0.856452 5.16075 0.909535 5.21309C0.962618 5.26543 1.02557 5.30669 1.09474 5.33449C1.16391 5.36228 1.23792 5.37605 1.31245 5.375H15.3295L12.5398 8.16479C12.4858 8.21663 12.4427 8.27871 12.413 8.34741C12.3833 8.4161 12.3676 8.49003 12.3668 8.56487C12.3661 8.6397 12.3803 8.71394 12.4085 8.78322C12.4368 8.85251 12.4787 8.91545 12.5316 8.96837C12.5845 9.02129 12.6474 9.06312 12.7167 9.09141C12.786 9.1197 12.8603 9.13387 12.9351 9.13311C13.0099 9.13235 13.0839 9.11667 13.1525 9.08698C13.2212 9.05729 13.2833 9.01419 13.3352 8.9602L17.0852 5.2102C17.1906 5.10471 17.2498 4.96166 17.2498 4.8125C17.2498 4.66334 17.1906 4.52029 17.0852 4.41479L13.3352 0.664795C13.2827 0.6108 13.22 0.567875 13.1507 0.538562C13.0814 0.509249 13.0069 0.494144 12.9316 0.494141Z" fill="white"></path>
						</svg>
					</span>
				</a>
			</div>
		</div>
	</div>
</li>
