<?php
/**popup
 * User Edit Template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/users/moc-user-edit.php.
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
if ( is_user_logged_in() ) {
	global $wpdb;
	$current_userid       = get_current_user_id();
	$profile_view_user_id = moc_get_public_user_profie_user_id();

	// if ( '183.82.162.9' === $_SERVER['REMOTE_ADDR'] ) {
	// 	var_dump( $current_userid, $profile_view_user_id );
	// }

	$flag                 = true;
	if ( $profile_view_user_id !== $current_userid ) {
		$current_userid = $profile_view_user_id;
		$flag           = false;
	}
	$all_user_meta             = get_user_meta( $current_userid );
	$firstname                 = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
	$lastname                  = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
	$user_display_name         = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
	$user_nice_name            = get_the_author_meta( 'user_nicename', $current_userid );
	$sidebar_title             = get_field( 'sidebar_title', 'option' );
	$pro_member_badge          = get_field( 'pro_member_badge', 'option' );
	$author_info               = get_userdata( $current_userid );
	$profile_url               = site_url(). '/profile/'.$author_info->data->user_nicename;
} else {
	$profile_view_user_id = moc_get_public_user_profie_user_id();
	if ( 0 === $profile_view_user_id ) {
		wp_safe_redirect( site_url( 'log-in' ) );
		exit;
	}
	$flag                      = false;
	$current_userid            = $profile_view_user_id;
	$all_user_meta             = get_user_meta( $current_userid );
	$firstname                 = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
	$lastname                  = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
	$user_display_name         = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
	$user_nice_name            = get_the_author_meta( 'user_nicename', $current_userid );
	$sidebar_title             = get_field( 'sidebar_title', 'option' );
	$pro_member_badge          = get_field( 'pro_member_badge', 'option' );
	$author_info               = get_userdata( $current_userid );
	$profile_url               = site_url(). '/profile/'.$author_info->data->user_nicename;
}

// var_dump( $user_display_name );

if ( ! wp_is_mobile() ) {
	?>
	<section id="edit_page_section" class="edit_page_section">
		<main <?php post_class( 'site-main profile_page' ); ?> role="main">
			<div class="page-content">
				<!-- profile name -->
				<div class="profile_name">
					<h2 class="gradient-title"><?php echo esc_html( $user_display_name ); ?>
					<span class="profile_more_icon_bar">
						<svg viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.25891 5.61542C4.05935 5.89195 3.6476 5.89195 3.44803 5.61542L0.0953551 0.969819C-0.143294 0.639137 0.0929932 0.177216 0.500797 0.177216L7.20614 0.177215C7.61395 0.177215 7.85024 0.639136 7.61159 0.969818L4.25891 5.61542Z" fill="#242730"></path>
						</svg>
					</span>
					</h2>
					<div class="profile_links">
						<?php
						if ( true === $flag ){
							?>
							<div class="profile_links_text">
								<div class="links_text_box">
									<span>Profile Button</span>
								</div>
							</div>
							<ul>
								<li class="liks_box">
									<a href="javascript:;" class="edit_icon moc_edit_profile_btn" data-text="Edit Profile">
										<span class="svg_icon">
											<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11.6524 1.60283C12.534 0.721257 13.9572 0.721257 14.8388 1.60283C15.7204 2.4844 15.7204 3.90766 14.8388 4.78923L4.74854 14.8795L0.5 15.9416L1.56213 11.6931L11.6524 1.60283Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
									</a>
								</li>
								<li class="liks_box">
									<a href="javascript:;" class="view_icon moc_view_profile" data-text="View Profile">
										<span class="svg_icon">
											<svg width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1.30261 6.491C1.30261 6.491 4.24807 0.600098 9.40261 0.600098C14.5572 0.600098 17.5026 6.491 17.5026 6.491C17.5026 6.491 14.5572 12.3819 9.40261 12.3819C4.24807 12.3819 1.30261 6.491 1.30261 6.491Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M9.40245 8.70016C10.6225 8.70016 11.6115 7.71112 11.6115 6.49107C11.6115 5.27103 10.6225 4.28198 9.40245 4.28198C8.1824 4.28198 7.19336 5.27103 7.19336 6.49107C7.19336 7.71112 8.1824 8.70016 9.40245 8.70016Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
									</a>
								</li>
								<li class="liks_box">
									<a href="javascript:;" class="share_icon moc_share_profile" data-text="Share Profile" data-profileurl="<?php echo esc_url( $profile_url ); ?>" data-title="Click to copy">
										<span class="svg_icon">
											<svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11.3201 5.60864C12.4937 5.60864 13.4451 4.65725 13.4451 3.48364C13.4451 2.31004 12.4937 1.35864 11.3201 1.35864C10.1465 1.35864 9.19507 2.31004 9.19507 3.48364C9.19507 4.65725 10.1465 5.60864 11.3201 5.60864Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M2.82007 10.5669C3.99367 10.5669 4.94507 9.6155 4.94507 8.44189C4.94507 7.26829 3.99367 6.31689 2.82007 6.31689C1.64646 6.31689 0.695068 7.26829 0.695068 8.44189C0.695068 9.6155 1.64646 10.5669 2.82007 10.5669Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M11.3201 15.5251C12.4937 15.5251 13.4451 14.5738 13.4451 13.4001C13.4451 12.2265 12.4937 11.2751 11.3201 11.2751C10.1465 11.2751 9.19507 12.2265 9.19507 13.4001C9.19507 14.5738 10.1465 15.5251 11.3201 15.5251Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M4.65466 9.51147L9.49258 12.3306" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M9.4855 4.55322L4.65466 7.37239" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
									</a>
								</li>
								<div class="tubelight">
									<div class="light-ray"></div>
								</div>
							</ul>
							<?php
						} else {
							?>
							<div class="profile_links_text">
								<div class="links_text_box">
									<span>Profile Button</span>
								</div>
							</div>
							<ul>
								<li class="liks_box">
									<a href="javascript:;" class="share_icon moc_share_profile" data-text="Share Profile" data-profileurl="<?php echo esc_url( $profile_url ); ?>" data-title="Click to copy">
										<span class="svg_icon">
											<svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11.3201 5.60864C12.4937 5.60864 13.4451 4.65725 13.4451 3.48364C13.4451 2.31004 12.4937 1.35864 11.3201 1.35864C10.1465 1.35864 9.19507 2.31004 9.19507 3.48364C9.19507 4.65725 10.1465 5.60864 11.3201 5.60864Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M2.82007 10.5669C3.99367 10.5669 4.94507 9.6155 4.94507 8.44189C4.94507 7.26829 3.99367 6.31689 2.82007 6.31689C1.64646 6.31689 0.695068 7.26829 0.695068 8.44189C0.695068 9.6155 1.64646 10.5669 2.82007 10.5669Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M11.3201 15.5251C12.4937 15.5251 13.4451 14.5738 13.4451 13.4001C13.4451 12.2265 12.4937 11.2751 11.3201 11.2751C10.1465 11.2751 9.19507 12.2265 9.19507 13.4001C9.19507 14.5738 10.1465 15.5251 11.3201 15.5251Z" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M4.65466 9.51147L9.49258 12.3306" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M9.4855 4.55322L4.65466 7.37239" stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
									</a>
								</li>
								<div class="tubelight">
									<div class="light-ray"></div>
								</div>
							</ul>
							<?php
						}
						?>
					</div>
				</div>
				<!-- profile content -->
				<div class="profile_content edit_page">
					<div class="content_row">
						<!-- Left Content Start -->
						<div class="content_box box_left">
							<!-- basic_info Start -->
							<?php
							if ( true === $flag ) {
								?>
								<!-- <div class= "moc_not_changable_container">
									<div class="loader_bg">
										<div class="loader"></div>  
									</div>
									<div class="box_about_content moc_user_profile_info box_content basic_section moc_general_user_info">
										<?php
										// HTML comes from common function moc_user_basic_information, Located in common function file in include folder.
										
										echo moc_user_basic_information( get_current_user_id(), $all_user_meta ); 
										?>
									</div>
								</div> -->
							<?php
							}
							?>
							<!-- about_content Start | Custom Class:- about_section -->
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
										<div class="loader"></div>  
								</div>
								<div class="box_about_content moc_basic_details_module moc_user_profile_info box_content about_section moc_user_bio_container">
									<?php 
									
									// HTML comes from common function moc_user_bio_html, Located in common function file in include folder.
									
									echo moc_user_bio_html( get_current_user_id(), $all_user_meta ); 
									
									?>
								</div>
							</div>
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<div class="box_about_content box_content martech_section moc_user_martech_section_container">
									<?php 

										// HTML comes from common function moc_user_martech_ools_experience_html, Located in common function file in include folder.

										echo moc_user_martech_tools_experience_html( get_current_user_id(), $all_user_meta );
									?>
								</div>
							</div>
							

							<!-- skills_content Start | Custom Class:- skills_section -->
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<div class="box_about_content box_content skills_section moc_user_skill_section">
									<?php 

									// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.

									echo moc_user_skill_html( get_current_user_id(), $all_user_meta );
									?>
								</div>
							</div>
							<!-- skills_content End -->
							<!-- Work_history_content Start | Custom Class:- work_section -->
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<div class="box_about_content box_content work_section moc_work_section">
									<?php

									// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.

									echo moc_user_work_section_html( get_current_user_id(), $all_user_meta );
									?>
								
								</div>
							</div>
							<!-- Work_history_content End -->
							<?php
							if ( true === $flag ) {
								?>
								<!-- Certification_content Start | Custom Class:- certification_section -->
								<div class= "moc_not_changable_container">
									<div class="loader_bg">
										<div class="loader"></div>  
									</div>
									<div class="box_about_content box_content certification_section moc_certification_section">
										<?php

										// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.
										
										echo moc_selected_cerificate_html( get_current_user_id() );
										?>
										
									</div>
								</div>
							<?php
							}
							if ( is_user_logged_in() && true === $flag ) {
								$courses = learndash_user_get_enrolled_courses( get_current_user_id() );
								if ( ! empty( $courses ) && is_array( $courses ) ) {
									?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class= "moc_not_changable_container" id="moc_purchased_courses_container">
										<div class="loader_bg">
											<div class="loader"></div>  
										</div>
										<div class="box_about_content box_content certification_section moc_purchased_courses_section">
											<?php
	
											// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.
											
											echo moc_purchaed_courses( get_current_user_id() );
											?>
											
										</div>
									</div>
									<?php
								}
							}
							?>
							<div class="moc_profile_view_data_blog">
								<?php
								// $post_status = ( false === $flag ) ? 'publish' : 'pending';
								$post_status         = 'publish';
								$blogs_by_user_query = moc_posts_query_by_author( 'post', 1, 4 , $current_userid, $post_status );
								$blogs               = $blogs_by_user_query->posts;
								$community_badges    = ! empty( get_user_meta( $current_userid, 'moc_community_badges', true ) ) ? get_user_meta( $current_userid, 'moc_community_badges', true ) : array();
								if ( ! empty( $community_badges ) && is_array( $community_badges ) ) {
									$get_settings_badges = get_field( 'community_badges', 'option' );
									foreach ( $get_settings_badges as $get_settings_badge ) {
										if ( in_array( $get_settings_badge['community_badges_title'], $community_badges, true ) ) {
											$updated_community_badges_arr[] = $get_settings_badge['community_badges_title'];
										}
									}
								}
								if ( 'pending' === $post_status ) {
									if ( ! empty( $updated_community_badges_arr ) ) {
										if ( in_array( 'Ambassador', $updated_community_badges_arr, true ) ) {
											if ( ! empty( $blogs ) ) {
											?>
												<!-- Certification_content Start | Custom Class:- certification_section -->
												<div class="box_about_content box_content blog_contributons_section">
													<?php
				
														// HTML comes from common function moc_blog_contributons_html, Located in common function file in include folder.
														echo moc_blog_contributions_html( get_current_user_id(), $blogs );
													?>
													<div class="show_more_btn">
														<a href="<?php echo site_url( 'blog/?author=' . $user_nice_name ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
													</div>
												</div>
												<?php
											} else  {
												if ( true === $flag ) {
													?>
													<!-- Certification_content Start | Custom Class:- certification_section -->
													<div class="box_about_content box_content blog_contributons_section">
														<?php echo moc_empty_posts_data( 'Blog contribution', 'There are no drafted blog contributions to your profile !!' ); ?>
													</div>
													<?php
												}
											}
										}
									}
									
								} else {
									if( ! empty( $blogs ) ) {
										?>
										<!-- Blog contributions Start | Custom Class:- certification_section -->
										<div class="box_about_content box_content blog_contributons_section">
											<?php
												// HTML comes from common function moc_blog_contributons_html, Located in common function file in include folder.
												echo moc_blog_contributions_html( get_current_user_id(), $blogs );
											?>
											<div class="show_more_btn">
												<a href="<?php echo site_url( 'blog/?author=' . $user_nice_name ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
											</div>
										</div>
									<?php
									} else  {
										if ( true === $flag ) {
											?>
											<!-- Certification_content Start | Custom Class:- certification_section -->
											<div class="box_about_content box_content blog_contributons_section">
												<?php echo moc_empty_posts_data( 'Blog contribution', 'There are no drafted blog contributions to your profile !!' ); ?>
											</div>
											<?php
										}
									}
									?>
									<?php
								}
								?>
							</div>
							<!-- Podcasts_content Start | Custom Class:- podcasts_section -->
							<div class="moc_profile_view_data_podcast">
								<?php
								global $wpdb;
								$meta_key      = 'podcast_guest';
								$compare       = 'LIKE';
								$podcase_query = moc_posts_by_meta_key_value( 'podcast', 1, 4, $meta_key, $current_userid, $compare );
								$podcasts      = $podcase_query->posts;
								// debug( $podcasts );
								// die;
								if ( !empty( $podcasts ) ) {
									?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class="box_about_content box_content blog_contributons_section podcasts_section">
										<?php

											// HTML comes from common function moc_podcast_contributons_html, Located in common function file in include folder.
											
											echo moc_podcast_contributons_html( get_current_user_id(), $podcasts );
										?>
									<div class="show_more_btn">
											<a href="<?php echo site_url( 'podcast/?author=' . $user_nice_name ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
										</div>
									</div>
								<?php
								} else {
									if ( true === $flag ) {
										?>
										<div class="box_about_content box_content blog_contributons_section podcasts_section">
											<?php echo moc_empty_posts_data( 'Podcasts', 'There are no drafted podcast to your profile !!' ); ?>
										</div>
										<?php
									}
								}
								?>
							</div>
							
							<!-- Workshops_&_Webinars_content Start | Custom Class:- workshops_webinars_section -->
							<?php
							if ( false === $flag ) {
								$workshop_by_user_query = moc_posts_query_by_author( 'workshop', 1, 4 , $current_userid, 'publish' );
								$workshops               = $workshop_by_user_query->posts;
								if( ! empty( $workshops ) ) {
								?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class="box_about_content box_content blog_contributons_section workshops_webinars_section">
										<?php

											// HTML comes from common function moc_podcast_contributons_html, Located in common function file in include folder.
											
											echo moc_workshop_contributons_html( get_current_user_id(), $workshops );
										?>
									</div>
								<?php
								}
							}
							?>
							<!-- Training_courses_content Start | Custom Class:- training_section -->
							<?php
							if ( false === $flag ) {
								$trainings_by_user_query = moc_posts_query_by_author( 'training', 1, 4 , $current_userid, 'publish' );
								$trainings               = $trainings_by_user_query->posts;
								if( ! empty( $trainings ) ) {
								?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class="box_about_content box_content blog_contributons_section training_section">
										<?php

											// HTML comes from common function moc_training_contributons_html, Located in common function file in include folder.
										
											echo moc_training_contributons_html( get_current_user_id(), $trainings );
										?>
									</div>
								<?php
								}
							}
							?>
							<?php
							if ( is_user_logged_in() && true === $flag ) {
								$plan_array    = moc_get_membership_plan_object();
								$plan_array    = array_shift( $plan_array );
								$saved_methods = wc_get_customer_saved_methods_list( get_current_user_id() );
								$has_methods   = (bool) $saved_methods;
								$types         = wc_get_account_payment_methods_types();
								$start_date  = FALSE;
								$expiry_date = FALSE;
								// Get ALL subscriptions
								$subscriptions = WC_Subscriptions_Manager::get_users_subscriptions( get_current_user_id() );
								
								$users_subscriptions = wcs_get_users_subscriptions( get_current_user_id() );
								foreach ($users_subscriptions as $users_subscription){
									if ($users_subscription->has_status(array('active'))) {
											$subscription_id[] = $users_subscription->get_id(); 
									}
								}
								$subscription_id = $subscription_id[0];
								// $subscription = wcs_get_subscription( $subscriptions['order_id'] );
								$subscriptions = array_shift( $subscriptions );
								
								// $order = wc_get_order( $subscriptions['order_id'] );
								// debug( $subscriptions );
								// die;
								$plan_object = $plan_array->plan;
								$plan_id     = $plan_object->id;
								$plan_name   = $plan_object->name;
								if ( $subscriptions ) {
									// Get the first subscription
									$start_date          = moc_get_subsciption_start_date( $subscriptions );
									$period              = moc_get_subsciption_start_date( $subscriptions );
									$expiry_date         = moc_get_subsciption_end_date( $subscriptions );
									$pending_days        = moc_get_days_differenc_between_dates( $start_date, $expiry_date );
									$pending_days        = ! empty( $pending_days ) ? sprintf( __( '%1$s Days Remaining', 'marketingops' ), $pending_days ) : ''; 
									$status              = moc_get_subsciption_status( $subscriptions );
									$change_payment_link = wc_get_endpoint_url( 'subscription-payment-method', $subscription_id, wc_get_page_permalink( 'myaccount' ) );
									$status_class    = '';
									if ( 'Active' === $status ) {
										$status_class = 'green_dot';
									} elseif ( 'Expired' === $status ) {
										$status_class = 'red_dot';
									} else {
										$status_class = 'yellow_dot';
									}
									?>
									<!-- Profile Membership - Desktop - Start | Custom Class Here:- "profile_member" -->
									<div class="moc_not_changable_container profile_member moc_membership_details_section">
										<div class="box_about_content box_content">
											<div class="moc_inner_work_section_container">
												<div class="title_with_btn">
													<h3><?php esc_html_e( 'Subscription', 'marketingops' ); ?></h3>
													<div class="title_right_box">
														<!-- Memebrship Status - Start | 
															by default it's show gray dot
															green_dot:- Green Text Color
															yellow_dot:- Yellow Text Color
															pink_dot:- Red Text Color
															-->
														<div class="moc_mermber_status <?php echo esc_attr( $status_class ); ?>">
															<span><?php echo esc_html( $status ); ?></span>
														</div>
														<!--
														<div class="moc_member_date">
															<span><?php //echo esc_html( $pending_days ); ?></span>
														</div>
														-->
													</div>
												</div>
												<div class="sub_title_with_content">
													<div class="content_boxes">
														<div class="content_boxed">
															<div class="moc_work_main_section">
																<div class="moc_inner_work_section">
																	<div class="moc_profile_member_content">

																		<div class="profile_content_box">
																			<div class="member_badge">
																				<img src="<?php echo esc_url( $pro_member_badge ); ?>" alt="profile_badge" />
																			</div>
																			<!--
																			<p><?php // echo esc_html( $plan_name ); ?></p>
																			-->
																			<div class="profile_member_btn">
																				<a href="<?php echo esc_url( site_url( 'my-account/subscriptions' ) ); ?>" class="profile_member_btn">
																					<?php esc_html_e( 'Manage subscriptions', 'marketingops' ); ?>
																				</a>
																				<a href="<?php echo esc_url( $change_payment_link ); ?>" class="profile_member_btn">
																					<?php esc_html_e( 'Edit card', 'marketingops' ); ?>
																				</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Profile Membership - Desktop - End -->
									<?php
									
								}
							
							}	
							?>
							
						</div>
						<!-- Left Content End -->
						<!-- Right Content Start -->
						<div class="content_box box_right">
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<!-- Avatar_content Start -->
								<?php echo moc_user_avtar_image( get_current_user_id() ); // HTML comes from common function moc_user_skill_html, Located in common function file in include folder. ?>
							</div>
							<!-- what_welse_do_content Start -->
							<?php
							if ( true === $flag ) {
								?>
								<div class="box_else_do_content box_about_content box_content moc_siderbar_content">
									<!-- Sidebar title -->
									<div class="title_with_btn"><h3><?php echo esc_html( $sidebar_title ); ?></h3></div>
									<div class="sub_title_with_content">
										<!-- Become an ambassador -->
										<?php
										$is_ambassador     = mops_is_user_ambassador( $current_userid );
										$is_agency_partner = mops_is_user_agency_partner( $current_userid, true );

										echo ( $is_ambassador || $is_agency_partner ) ? moc_create_a_blog_html( $current_userid ) : moc_become_ambassador_html();
										?>
										<!-- Be a guest on ops cast -->
										<?php echo moc_be_a_guest_on_ops_cast_html(); ?>
										<!-- Host a workshop -->
										<?php echo moc_host_a_workshop_html(); ?>
									</div>
								</div>
								<?php
							}
							$user_all_info      = get_user_meta( $current_userid, 'user_all_info', true );
							$user_certificates  = ! empty( $user_all_info['moc_certificates'] ) ? $user_all_info['moc_certificates'] : array();
							$added_class        = ( ! empty( $user_certificates ) && is_array( $user_certificates ) ) ? 'moc_display_certificate_section' : 'moc_not_display_certificate_section';
							?>
							<div class="box_certi_content box_about_content box_content <?php echo esc_attr( $added_class ); ?>">
								<div class="title_with_btn">
									<!-- Avatar title -->
									<h3><?php esc_html_e( 'Certifications', 'marketingops' ); ?></h3>
								</div>
								<div class="sub_title_with_content moc_sidebar_certificates">
									<?php
									echo moc_sidebar_certificate_html( $user_certificates );
									?>
								</div>
							</div>
							<?php 
							$community_badges = ! empty( get_user_meta( $current_userid, 'moc_community_badges', true ) ) ? get_user_meta( $current_userid, 'moc_community_badges', true ) : array();
							$courses_badges     = moc_get_course_completed_count_by_user( $current_userid );
							if ( ! empty( $community_badges ) && is_array( $community_badges ) || ! empty( $courses_badges ) ) {
								$get_settings_badges = get_field( 'community_badges', 'option' );
								foreach ( $get_settings_badges as $get_settings_badge ) {
									if ( in_array($get_settings_badge['community_badges_title'], $community_badges, true ) ) {
										$updated_community_badges[ $get_settings_badge['community_badges_title'] ] = $get_settings_badge['community_badges_images'];
									}
								}
								// debug( $courses_badges );
								// die;
								$achievements_query = moc_posts_query( 'ld-achievement', 1, -1 );
								$achievements       = $achievements_query->posts;
								if ( ! empty( $achievements ) && is_array( $achievements ) ) {
									foreach ( $achievements as $achievement_id ) {
										if ( 1 <= $courses_badges && 5 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_1', '=' );
											 $achievement_data  = $achievement_query->posts;
											 $achievement_id    = $achievement_data[0];
										} elseif ( 5 <= $courses_badges && 10 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_5', '=' );
											 $achievement_data  = $achievement_query->posts;
											 $achievement_id    = $achievement_data[0];
										} elseif ( 10 <= $courses_badges && 15 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_10', '=' );
											 $achievement_data  = $achievement_query->posts;
											 $achievement_id    = $achievement_data[0];
										} elseif ( 15 <= $courses_badges && 20 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_15', '=' );
											 $achievement_data  = $achievement_query->posts;
											 $achievement_id    = $achievement_data[0];
										} else {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_20', '=' );
											 $achievement_data  = $achievement_query->posts;
											 $achievement_id    = $achievement_data[0];
										}
										if ( ! empty( $courses_badges ) ) {
											$trigger       = get_post_meta( $achievement_id, 'trigger', true );
											$trigger_image = get_post_meta( $achievement_id, 'image', true );
											$updated_community_badges[ $trigger ] = $trigger_image;
										}
										
									}
								}
								
								?>
								<!-- Community_content Start -->
								<div class="box_badge_content box_about_content box_content">
									<div class="title_with_btn">
										<!-- Avatar title -->
										<h3><?php esc_html_e( 'Community badges', 'marketingops' ); ?></h3>
									</div>
									<div class="sub_title_with_content">
										<?php foreach ( $updated_community_badges as $key=>$community_badge_image ) {
											?>
											<div class="badge_img">
												<img src="<?php echo esc_url( $community_badge_image ); ?>" alt="<?php echo esc_html( $key ); ?>" />
											</div>
											<?php
										}
										?>
									</div>
								</div>
								<?php
							}
							?>
							</div>
							<!-- Certifications_content Start -->
						</div>
						<!-- Right Content End -->
					</div>
				</div>
			</div>
		</main>
	</section>
	<?php
} else {
	?>
	<section id="edit_page_section" class="edit_page_section">
		<main <?php post_class( 'site-main profile_page' ); ?> role="main">
			<div class="page-content">
				<div class="profile_name">
					<h2 class="gradient-title"><?php echo esc_html( $user_display_name ); ?></h2>
					<div class="profiel_links">
						<?php if ( true === $flag ){
							?>
							<div class="liks_box">
								<a href="javascript:;" class="moc_edit_profile_btn"><?php esc_html_e( 'edit user profile', 'marketingops' ); ?></a>
							</div>
							<div class="liks_box">
								<a href="javascript:;" class="moc_view_profile"><?php esc_html_e( 'view public profile', 'marketingops' ); ?></a>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<div class="profile_content edit_page">
					<div class="content_row">
						<div class="content_box">
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<!-- Avatar_content Start -->
								<?php

									// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.

									echo moc_user_avtar_image( get_current_user_id() );
								?>
							</div>
							<?php
							if ( true === $flag ) {
								?>
								<!-- <div class= "moc_not_changable_container">
									<div class="loader_bg">
										<div class="loader"></div>  
									</div>
									<div class="box_about_content moc_user_profile_info box_content basic_section moc_general_user_info">
										<?php
										// HTML comes from common function moc_user_basic_information, Located in common function file in include folder.
										
										echo moc_user_basic_information( get_current_user_id(), $all_user_meta ); 
										?>
									</div>
								</div> -->
								<?php
							}
							?>
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
										<div class="loader"></div>  
								</div>
								<div class="box_about_content moc_basic_details_module moc_user_profile_info box_content about_section moc_user_bio_container">
									<?php 
									
									// HTML comes from common function moc_user_bio_html, Located in common function file in include folder.
									
									echo moc_user_bio_html( get_current_user_id(), $all_user_meta ); 
									
									?>
								</div>
							</div>
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<div class="box_about_content box_content martech_section moc_user_martech_section_container">
									<?php 

										// HTML comes from common function moc_user_martech_ools_experience_html, Located in common function file in include folder.

										echo moc_user_martech_tools_experience_html( get_current_user_id(), $all_user_meta );
									?>
								</div>
							</div>
							

							<!-- skills_content Start | Custom Class:- skills_section -->
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<div class="box_about_content box_content skills_section moc_user_skill_section">
									<?php 

									// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.

									echo moc_user_skill_html( get_current_user_id(), $all_user_meta );
									?>
								</div>
							</div>
							<!-- skills_content End -->
							<!-- Work_history_content Start | Custom Class:- work_section -->
							<div class= "moc_not_changable_container">
								<div class="loader_bg">
									<div class="loader"></div>  
								</div>
								<div class="box_about_content box_content work_section moc_work_section">
									<?php

									// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.

									echo moc_user_work_section_html( get_current_user_id(), $all_user_meta );
									?>
								
								</div>
							</div>
							<!-- Work_history_content End -->
							<?php
							if ( true === $flag ) {
								?>
								<!-- Certification_content Start | Custom Class:- certification_section -->
								<div class= "moc_not_changable_container">
									<div class="loader_bg">
										<div class="loader"></div>  
									</div>
									<div class="box_about_content box_content certification_section moc_certification_section">
										<?php

										// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.
										
										echo moc_selected_cerificate_html( get_current_user_id() );
										?>
										
									</div>
								</div>
								<?php
							}
							if ( is_user_logged_in() && true === $flag ) {
								$courses = learndash_user_get_enrolled_courses( get_current_user_id() );
								if ( ! empty( $courses ) && is_array( $courses ) ) {
									?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class= "moc_not_changable_container">
										<div class="loader_bg">
											<div class="loader"></div>  
										</div>
										<div class="box_about_content box_content certification_section moc_certification_section">
											<?php
	
											// HTML comes from common function moc_user_skill_html, Located in common function file in include folder.
											
											echo moc_purchaed_courses( get_current_user_id() );
											?>
											
										</div>
									</div>
									<?php
								}
							}
							
							if ( is_user_logged_in() && true === $flag ) {
								$plan_array    = moc_get_membership_plan_object();
								$plan_array    = array_shift( $plan_array );
								$saved_methods = wc_get_customer_saved_methods_list( get_current_user_id() );
								$has_methods   = (bool) $saved_methods;
								$types         = wc_get_account_payment_methods_types();
							
								$start_date  = FALSE;
								$expiry_date = FALSE;
								// Get ALL subscriptions
								$subscriptions = WC_Subscriptions_Manager::get_users_subscriptions( get_current_user_id() );
								
								$users_subscriptions = wcs_get_users_subscriptions( get_current_user_id() );
								foreach ($users_subscriptions as $users_subscription){
									if ($users_subscription->has_status(array('active'))) {
											$subscription_id[] = $users_subscription->get_id(); 
									}
								}
								$subscription_id = $subscription_id[0];
								// $subscription = wcs_get_subscription( $subscriptions['order_id'] );
								$subscriptions = array_shift( $subscriptions );
								
								// $order = wc_get_order( $subscriptions['order_id'] );
								// debug( $subscriptions );
								// die;
								$plan_object = $plan_array->plan;
								$plan_id     = $plan_object->id;
								$plan_name   = $plan_object->name;
								if ( $subscriptions ) {
									// Get the first subscription
									$start_date          = moc_get_subsciption_start_date( $subscriptions );
									$period              = moc_get_subsciption_start_date( $subscriptions );
									$expiry_date         = moc_get_subsciption_end_date( $subscriptions );
									$pending_days        = moc_get_days_differenc_between_dates( $start_date, $expiry_date );
									$pending_days        = ! empty( $pending_days ) ? sprintf( __( '%1$s Days Remaining', 'marketingops' ), $pending_days ) : ''; 
									$status              = moc_get_subsciption_status( $subscriptions );
									$change_payment_link = wc_get_endpoint_url( 'subscription-payment-method', $subscription_id, wc_get_page_permalink( 'myaccount' ) );
									$status_class    = '';
									if ( 'Active' === $status ) {
										$status_class = 'green_dot';
									} elseif ( 'Expired' === $status ) {
										$status_class = 'red_dot';
									} else {
										$status_class = 'yellow_dot';
									}
									?>
									<!-- Profile Membership - Start | Custom Class Here:- "profile_member" -->
									<div class="moc_not_changable_container profile_member moc_membership_details_section">
										<div class="box_about_content box_content">
											<div class="moc_inner_work_section_container">
												<div class="title_with_btn">
													<h3><?php esc_html_e( 'Subscription', 'marketingops' ); ?></h3>
													<div class="title_right_box">
														<!-- Memebrship Status - Start | 
															by default it's show gray dot
															green_dot:- Green Text Color
															yellow_dot:- Yellow Text Color
															pink_dot:- Red Text Color
															-->
														<div class="moc_mermber_status <?php echo esc_attr( $status_class ); ?>">
															<span><?php echo esc_html( $status ); ?></span>
														</div>
													</div>
													<!--
													<div class="title_right_box_mobile title_right_box">
														<div class="moc_member_date">
															<span><?php // echo esc_html( $pending_days ); ?></span>
														</div>
													</div>
													-->
												</div>
												<div class="sub_title_with_content">
													<div class="content_boxes">
														<div class="content_boxed">
															<div class="moc_work_main_section">
																<div class="moc_inner_work_section">
																	<div class="moc_profile_member_content">

																		<div class="profile_content_box">
																			<div class="member_badge">
																				<img src="<?php echo esc_url( $pro_member_badge ); ?>" alt="profile_badge" />
																			</div>
																			<!--
																			<p><?php // echo esc_html( $plan_name ); ?></p> 
																			-->
																			<div class="profile_member_btn">
																				<a href="<?php echo esc_url( site_url( 'my-account/subscriptions' ) ); ?>" class="profile_member_btn">
																					<?php esc_html_e( 'Manage subscriptions', 'marketingops' ); ?>
																				</a>
																				<a href="<?php echo esc_url( $change_payment_link ); ?>" class="profile_member_btn">
																					<?php esc_html_e( 'Edit card', 'marketingops' ); ?>
																				</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
							}
							?>
							<div class="moc_profile_view_data_blog">
								<?php
								$post_status = ( false === $flag ) ? 'publish' : 'pending';
								$blogs_by_user_query = moc_posts_query_by_author( 'post', 1, 4 , $current_userid, $post_status );
								$blogs               = $blogs_by_user_query->posts;
								$community_badges    = ! empty( get_user_meta( $current_userid, 'moc_community_badges', true ) ) ? get_user_meta( $current_userid, 'moc_community_badges', true ) : array();
								if ( ! empty( $community_badges ) && is_array( $community_badges ) ) {
									$get_settings_badges = get_field( 'community_badges', 'option' );
									foreach ( $get_settings_badges as $get_settings_badge ) {
										if ( in_array( $get_settings_badge['community_badges_title'], $community_badges, true ) ) {
											$updated_community_badges_arr[] = $get_settings_badge['community_badges_title'];
										}
									}
								}
								if ( 'pending' === $post_status ) {
									if ( in_array( 'Ambassador', $updated_community_badges_arr, true ) ) {
										if( ! empty( $blogs ) ) {
										?>
											<!-- Certification_content Start | Custom Class:- certification_section -->
											<div class="box_about_content box_content blog_contributons_section">
												<?php
			
													// HTML comes from common function moc_blog_contributons_html, Located in common function file in include folder.
													echo moc_blog_contributions_html( get_current_user_id(), $blogs );
												?>
												<div class="show_more_btn">
													<a href="<?php echo site_url( 'blog/?author=' . $user_nice_name ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
												</div>
											</div>
											<?php
										} else  {
											if ( true === $flag ) {
												?>
												<!-- Certification_content Start | Custom Class:- certification_section -->
												<div class="box_about_content box_content blog_contributons_section">
													<?php echo moc_empty_posts_data( 'Blog contribution', 'There are no drafted blog contributions to your profile !!' ); ?>
												</div>
												<?php
											}
										}
									}
								} else {
									if( ! empty( $blogs ) ) {
										?>
										<!-- Blog contributions Start | Custom Class:- certification_section -->
										<div class="box_about_content box_content blog_contributons_section">
											<?php
												// HTML comes from common function moc_blog_contributons_html, Located in common function file in include folder.
												echo moc_blog_contributions_html( get_current_user_id(), $blogs );
											?>
											<div class="show_more_btn">
												<a href="<?php echo site_url( 'blog/?author=' . $user_nice_name ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
											</div>
										</div>
									<?php
									} else  {
										if ( true === $flag ) {
											?>
											<!-- Certification_content Start | Custom Class:- certification_section -->
											<div class="box_about_content box_content blog_contributons_section">
												<?php echo moc_empty_posts_data( 'Blog contribution', 'There are no drafted blog contributions to your profile !!' ); ?>
											</div>
											<?php
										}
									}
									?>
									<?php
								}
								?>
							</div>
							<div class="moc_profile_view_data_podcast">
								<?php
								global $wpdb;
								$meta_key      = 'podcast_guest';
								$compare       = 'LIKE';
								$podcase_query = moc_posts_by_meta_key_value( 'podcasts', 1, 4, $meta_key, $current_userid, $compare );
								$podcasts      = $podcase_query->posts;
								if ( !empty( $podcasts ) ) {
									?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class="box_about_content box_content blog_contributons_section podcasts_section">
										<?php

											// HTML comes from common function moc_podcast_contributons_html, Located in common function file in include folder.
											
											echo moc_podcast_contributons_html( get_current_user_id(), $podcasts );
										?>
									<div class="show_more_btn">
											<a href="<?php echo site_url( 'podcast/?author=' . $user_nice_name ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
										</div>
									</div>
								<?php
								} else {
									if ( true === $flag ) {
										?>
										<div class="box_about_content box_content blog_contributons_section podcasts_section">
											<?php echo moc_empty_posts_data( 'Podcasts', 'There are no drafted podcast to your profile !!' ); ?>
										</div>
										<?php
									}
								}
								?>
							</div>
							<?php
							if ( false === $flag ) {
								$workshop_by_user_query = moc_posts_query_by_author( 'workshop', 1, 4 , $current_userid, 'publish' );
								$workshops               = $workshop_by_user_query->posts;
								if( ! empty( $workshops ) ) {
								?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class="box_about_content box_content blog_contributons_section workshops_webinars_section">
										<?php

											// HTML comes from common function moc_podcast_contributons_html, Located in common function file in include folder.
											
											echo moc_workshop_contributons_html( get_current_user_id(), $workshops );
										?>
									</div>
								<?php
								}
							}
							if ( false === $flag ) {
								$trainings_by_user_query = moc_posts_query_by_author( 'training', 1, 4 , $current_userid, 'publish' );
								$trainings               = $trainings_by_user_query->posts;
								if( ! empty( $trainings ) ) {
								?>
									<!-- Certification_content Start | Custom Class:- certification_section -->
									<div class="box_about_content box_content blog_contributons_section training_section">
										<?php

											// HTML comes from common function moc_training_contributons_html, Located in common function file in include folder.
										
											echo moc_training_contributons_html( get_current_user_id(), $trainings );
										?>
									</div>
								<?php
								}
							}
							if ( true === $flag ) {
								?>
								<div class="box_else_do_content box_about_content box_content">
									<div class="title_with_btn">
										<!-- Avatar title -->
										<h3><?php echo esc_html( $sidebar_title ); ?></h3>
									</div>
									<div class="sub_title_with_content">
										<!-- community badges -->
										<?php 
										$community_badges = ! empty( get_user_meta( $current_userid, 'moc_community_badges', true ) ) ? get_user_meta( $current_userid, 'moc_community_badges', true ) : array();
										if ( ! empty( $community_badges ) && is_array( $community_badges ) ) {
											$get_settings_badges = get_field( 'community_badges', 'option' );
											foreach ( $get_settings_badges as $get_settings_badge ) {
												if ( in_array( $get_settings_badge['community_badges_title'], $community_badges, true ) ) {
													$updated_community_badges_arr[] = $get_settings_badge['community_badges_title'];
												}
											}
										}
										if ( ! empty( $updated_community_badges_arr )   ) {
											if ( ! in_array( 'Ambassador', $updated_community_badges_arr, true ) ) {
												echo moc_become_ambassador_html();
											}
										} else {
											echo moc_become_ambassador_html();	
										}
										?>
										<!-- Become an ambassador -->
										
										<?php 
										if ( in_array( 'Ambassador', $updated_community_badges_arr, true ) ) {
											echo moc_create_a_blog_html( $current_userid );
										}
										?>
										<!-- Be a guest on ops cast -->
										<?php echo moc_be_a_guest_on_ops_cast_html(); ?>
										<!-- Host a workshop -->
										<?php echo moc_host_a_workshop_html(); ?>
									</div>
								</div>
								<?php
							}
							$user_all_info      = get_user_meta( $current_userid, 'user_all_info', true );
							$user_certificates  = $user_all_info['moc_certificates'];
							$added_class        = ( ! empty( $user_certificates ) && is_array( $user_certificates ) ) ? 'moc_display_certificate_section' : 'moc_not_display_certificate_section';
							?>
							<div class="box_certi_content box_about_content box_content <?php echo esc_attr( $added_class ); ?>">
								<div class="title_with_btn">
									<!-- Avatar title -->
									<h3><?php esc_html_e( 'Certifications', 'marketingops' ); ?></h3>
								</div>
								<div class="sub_title_with_content moc_sidebar_certificates">
									<?php
									echo moc_sidebar_certificate_html( $user_certificates );
									?>
								</div>
							</div>
							<?php 
							$community_badges = ! empty( get_user_meta( $current_userid, 'moc_community_badges', true ) ) ? get_user_meta( $current_userid, 'moc_community_badges', true ) : array();
							$courses_badges     = moc_get_course_completed_count_by_user( $current_userid );
							if ( ! empty( $community_badges ) && is_array( $community_badges ) || ! empty( $courses_badges ) ) {
								$get_settings_badges = get_field( 'community_badges', 'option' );
								foreach ( $get_settings_badges as $get_settings_badge ){
									if ( in_array($get_settings_badge['community_badges_title'], $community_badges, true ) ) {
										$updated_community_badges[ $get_settings_badge['community_badges_title'] ] = $get_settings_badge['community_badges_images'];
									}
								}
								$achievements_query = moc_posts_query( 'ld-achievement', 1, -1 );
								$achievements       = $achievements_query->posts;
								if ( ! empty( $achievements ) && is_array( $achievements ) ) {
									foreach ( $achievements as $achievement_id ) {
										if ( 1 <= $courses_badges && 5 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_1', '=' );
											$achievement_data  = $achievement_query->posts;
											$achievement_id    = $achievement_data[0];
										} elseif ( 5 <= $courses_badges && 10 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_5', '=' );
											$achievement_data  = $achievement_query->posts;
											$achievement_id    = $achievement_data[0];
										} elseif ( 10 <= $courses_badges && 15 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_10', '=' );
											$achievement_data  = $achievement_query->posts;
											$achievement_id    = $achievement_data[0];
										} elseif ( 15 <= $courses_badges && 20 > $courses_badges ) {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_15', '=' );
											$achievement_data  = $achievement_query->posts;
											$achievement_id    = $achievement_data[0];
										} else {
											$achievement_query = moc_posts_by_meta_key_value( 'ld-achievement', 1, -1, 'trigger', 'course_completed_20', '=' );
											$achievement_data  = $achievement_query->posts;
											$achievement_id    = $achievement_data[0];
										}
										if ( ! empty( $courses_badges ) ) {
											$trigger       = get_post_meta( $achievement_id, 'trigger', true );
											$trigger_image = get_post_meta( $achievement_id, 'image', true );
											$updated_community_badges[ $trigger ] = $trigger_image;
										}
										// $trigger       = get_post_meta( $achievement_id, 'trigger', true );
										// $trigger_image = get_post_meta( $achievement_id, 'image', true );
										// $updated_community_badges[ $trigger ] = $trigger_image;
									}
								}
								?>
								<!-- Community_content Start -->
								<div class="box_badge_content box_about_content box_content">
									<div class="title_with_btn">
										<!-- Avatar title -->
										<h3><?php esc_html_e( 'Community badges', 'marketingops' ); ?></h3>
									</div>
									<div class="sub_title_with_content">
										<?php foreach ( $updated_community_badges as $key=>$community_badge_image ) {
											?>
											<div class="badge_img">
												<img src="<?php echo esc_url( $community_badge_image ); ?>" alt="<?php echo esc_html( $key ); ?>" />
											</div>
											<?php
										}
										?>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</section>
<?php
}
get_footer();