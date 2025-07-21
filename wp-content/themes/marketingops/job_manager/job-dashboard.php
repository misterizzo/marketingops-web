<?php
/**
 * Job dashboard shortcode content.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-dashboard.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.35.0
 *
 * @since 1.34.4 Available job actions are passed in an array (`$job_actions`, keyed by job ID) and not generated in the template.
 * @since 1.35.0 Switched to new date functions.
 *
 * @var array     $job_dashboard_columns Array of the columns to show on the job dashboard page.
 * @var int       $max_num_pages         Maximum number of pages
 * @var WP_Post[] $jobs                  Array of job post results.
 * @var array     $job_actions           Array of actions available for each job.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$current_userid               = get_current_user_id();
$all_user_meta                = get_user_meta( $current_userid );
$user_nice_name               = ucfirst( moc_user_display_name( $current_userid ) );
$job_filled_column_name       = $job_dashboard_columns['filled'];
$job_date_column_name         = $job_dashboard_columns['date'];
$job_cd_column_name           = $job_dashboard_columns['closing_date'];
$job_expires_column_name      = $job_dashboard_columns['expires'];
$job_applications_column_name = $job_dashboard_columns['applications'];
?>
<div id="job-manager-job-dashboard" class="job_manager">

	<div class="job_manager_page_title">
		<h2>
			<span class="gradient-title"><?php echo esc_html( $user_nice_name ); ?> </span> Jobs Dashboard
		</h2>
	</div>

	<?php if ( ! $jobs ) : ?>
		<div class="job_manager_blank">
			<p><?php esc_html_e( 'You do not have any active listings.', 'wp-job-manager' ); ?></p>
		</div>
	<?php else :
	// debug( $jobs );
	// die;
		foreach ( $jobs as $job ) :
			if ( ! empty( get_field( 'company_placeholder_image', 'option' ) ) ) {
				$image_array            = get_field( 'company_placeholder_image', 'option' );
				$place_holder_image_url = $image_array['url'];
				$defaul_company_url     = $place_holder_image_url;
			} else {
				$defaul_company_url = site_url() . '/wp-content/uploads/2022/05/briefcase.png';
			}
			$company_id        = get_post_meta( $job->ID, '_company_id', true );
			$company_name      = get_the_title( $company_id );
			$company_logo_id   = ! empty( get_post_meta( $company_id, '_thumbnail_id', true ) ) ? get_post_meta( $company_id, '_thumbnail_id', true ) : 0;
			$company_logo_src  = ( 0 < $company_logo_id ) ? wp_get_attachment_image_src( $company_logo_id, 'thumbnail' ) : array( $defaul_company_url );
			$job_excerpt       = get_the_excerpt( $job->ID );
			$job_expires       = WP_Job_Manager_Post_Types::instance()->get_job_expiration( $job );
			$apss              = get_job_application_count( $job->ID );
			$job_salary        = get_post_meta( $job->ID, '_job_salary', true );
			$types             = wp_get_post_terms( $job->ID, 'job_listing_type' );
			// debug( $types );
			// die;
			?>
			<div class="job_manager_details">
				<div class="manager_container">

					<!-- loop here | Start -->
					<div class="content_box">

						<div class="job_top_bar">
							<div class="box_text box_1">
								<h6><?php echo esc_html( $job_filled_column_name ); ?></h6>
								<p><?php echo is_position_filled( $job ) ? '&#10004;' : '&ndash;'; ?></p>
							</div>

							<div class="box_text box_2">
								<h6><?php echo esc_html( $job_date_column_name ); ?></h6>
								<p><?php echo esc_html( wp_date( get_option( 'date_format' ), get_post_datetime( $job )->getTimestamp() ) ); ?></p>
							</div>

							<div class="box_text box_3">
								<h6><?php echo esc_html( $job_cd_column_name ); ?></h6>
								<p><?php echo esc_html( $job_expires ? wp_date( get_option( 'date_format' ), $job_expires->getTimestamp() ) : '&ndash;' ); ?></p>
							</div>

							<div class="box_text box_4">
								<h6><?php echo esc_html( $job_expires_column_name ); ?></h6>
								<p><?php echo esc_html( $job_expires ? wp_date( get_option( 'date_format' ), $job_expires->getTimestamp() ) : '&ndash;' ); ?></p>
							</div>

							<div class="box_text box_5">
								<h6><?php echo esc_html( $job_applications_column_name ); ?></h6>
								<p><?php echo ( $apss > 0 ) ? $apss : '&ndash;'; ?></p>
							</div>

							<div class="box_btn box_6">
								<div class="btn_container">
									<?php
									// 
									
									if ( ! empty( $job_actions[ $job->ID ] ) ) {
										foreach ( $job_actions[ $job->ID ] as $action => $value ) {
											$action_url = add_query_arg( [
												'action' => $action,
												'job_id' => $job->ID
											] );
											if ( $value['nonce'] ) {
												$action_url = wp_nonce_url( $action_url, $value['nonce'] );
											}
											if ( 'continue' === $action ) {
												echo '<a href="' . esc_url( $action_url ) . '" class="btn gradient_btn job-dashboard-action-' . esc_attr( $action ) . '">' . esc_html( $value['label'] ) . '</a>';
												// echo '<a href="' . esc_url( $action_url ) . '" class="job-dashboard-action-' . esc_attr( $action ) . '">' . esc_html( $value['label'] ) . '</a>';	
											} elseif( 'delete' === $action ) {
												echo '<a href="' . esc_url( $action_url ) . '" class="btn delete_btn job-dashboard-action-' . esc_attr( $action ) . '"><img src="/wp-content/themes/marketingops/images/social_icons/delete_icon.svg" alt="delete_btn" /></a>';
											} else if( 'edit' === $action ) {
												echo '<a href="' . esc_url( $action_url ) . '" class="btn delete_btn job-dashboard-action-' . esc_attr( $action ) . '"><img src="/wp-content/themes/marketingops/images/Frame 347.svg" alt="edit" /></a>';
											}
										}
									}
									?>
								</div>
							</div>
						</div>

						<div class="job_bottom_bar">
							<div class="job_detail_section">
								<div class="firstrow">
									<img class="company_logo" src="<?php echo esc_url( $company_logo_src[0] ); ?>" alt="<?php echo esc_html( $company_name ); ?>">
									<div class="comdetail">
										<h3>
											<?php if ( $job->post_status == 'publish' ) : ?>
												<a href="<?php echo esc_url( get_permalink( $job->ID ) ); ?>"><?php wpjm_the_job_title( $job ); ?></a>
											<?php else : ?>
												<?php wpjm_the_job_title( $job ); ?> <small>(<?php the_job_status( $job ); ?>)</small>
											<?php endif; ?>
										</h3>
										<?php if ( ! empty( $company_name ) ) : ?>
										<div class="jobcatx">
											<span><?php echo esc_html( $company_name ); ?></span>
										</div>
										<?php endif; ?>
									</div>
									<?php if ( ! empty( $types ) ) : ?>
									<ul class="all_jobtypes">
										<?php foreach ( $types as $type ) :
											$type_id   = $type->term_id;
											$type_name = $type->name;
											$users_preffered_job_type = array();
											$selected  = '';
											if ( $current_user ) {
												$user_job_types = get_user_meta( $current_userid, 'job_type', true );
												if ( ! empty( $user_job_types ) ) {
													$users_preffered_job_type = $user_job_types;
												}
												if ( $users_preffered_job_type && in_array( $type->slug, $users_preffered_job_type, true ) ) {
													$selected = 'selected';
												}
											}

											?>
										<li class="job-type <?php echo esc_attr( $selected ) . ' ' . esc_attr( sanitize_title( $type->slug ) ); ?>"><?php echo esc_html( $type_name ); ?></li>
										<?php endforeach; ?>
									</ul>
									<?php endif; ?>
								</div>
								<?php if ( ! empty( $job_excerpt ) ): ?>
								<div class="jobexcerpt">
									<?php echo wp_kses_post( $job_excerpt ); ?>
								</div>
								<?php endif; ?>
								<div class="jobsmeta_container">
									<ul class="jobsmeta">
										<li class="location">
											<img src="/wp-content/themes/marketingops/images/location_icon.svg" alt="location_icon" /> 
											<?php the_job_location( true, $job->ID ); ?>
										</li>
										<?php if( ! empty( $job_salary ) ) : ?>
										<li class="salary">
											<img src="/wp-content/themes/marketingops/images/money.svg" alt="money" /> 
											<?php echo esc_html( $job_salary ); ?>
										</li>
										<?php endif; ?>
										<li class="date">
											<img src="/wp-content/themes/marketingops/images/post_date.svg" alt="post_date" /> 
											<time><?php the_job_publish_date( $job->ID ); ?></time>
										</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
					<!-- loop here | End -->

				</div>
			</div>
			<?php
		endforeach;
		endif; ?>
	<?php get_job_manager_template( 'pagination.php', [ 'max_num_pages' => $max_num_pages ] ); ?>
</div>
