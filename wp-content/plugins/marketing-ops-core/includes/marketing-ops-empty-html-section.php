<?php
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_martech_tools_experience_empty_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @since 1.0.0
	 */
	function moc_user_martech_tools_experience_empty_html() {
		ob_start();
			?>
			<hr /> 
			<div class="moc_martech_inner_section after_cancel_display_none moc_editable_data">

				<div class="content_boxes input_radio_btn">
					<div class="content_boxed">
						<span class="input_radio_btn">
							<label class="switch">
								<input type="checkbox" name="main_this_cat" id="main_this_cat">	
								<span class="slider round"></span>
							</label>
							<span class="text"><?php esc_html_e( 'Make Primary', 'marketingops' ); ?></span>
						</span>
					</div>
				</div>

				<div class="boxed_three_colum">
					<div class="colum_box moc_required_field">
						<h6><?php esc_html_e( 'Main platform', 'marketingops' ); ?></h6>
						<input name="main_platform" class="inputtext" placeholder="Name">
						<div class="moc_error moc_user_marktech_platform_err"><span></span></div>
					</div>
					<div class="colum_box moc_required_field">
						<h6><?php esc_html_e( 'Experience', 'marketingops' ); ?></h6>
						<input name="moc_experience" class="inputtext" placeholder="Years">
						<div class="moc_error moc_user_marktech_exp_err"><span></span></div>
					</div>
					<div class="colum_box delete_icon_here">
						<div class="platform deletesec">
							<input type="button" value="delete" class="btn delete_icon">
						</div>
					</div>
				</div>
				<div class="range_slider_box boxed_two_colum">
					<div class="range_slider colum_box">
						<h6><?php esc_html_e( 'Skill level', 'marketingops' ); ?></h6>
						<input type="range" class="range_slider_input rangeslider" name="moc_skill_level" min="1" max="4" step="0.01" labels="1, 2, 3, 4" value="1">
					</div>
					<div class="colum_box"><a class="expert_btn btn yellow_btn"><?php esc_html_e( 'BASIC', 'marketingops' ); ?></a></div>
				</div>
				<textarea name="moc_exp_description" class="inputtext textarea_2 moc_exp_description" placeholder="Say a few words about your experience"></textarea>
				<hr>
			</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_work_section_empty_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @since 1.0.0
	 */
	function moc_user_work_section_empty_html() {
		ob_start();
			?>
			<div class="moc_repeated_work_section after_cancel_display_none moc_editable_data">
				<div class="boxed_three_colum">
					<div class="colum_box colum_box_1 moc_required_field">
						<h6><?php esc_html_e( 'Company', 'marketingops' ); ?></h6>
						<input name="moc_work_company" class="inputtext" placeholder="Company">
						<div class="moc_error moc_user_work_company_err"><span></span></div>
					</div>
					<div class="colum_box delete_icon_here">
						<div class="platform deletesec">
							<input type="button" value="delete" class="btn delete_icon">
						</div>
					</div>
					<div class="colum_box colum_box_3 moc_required_field">
						<h6><?php esc_html_e( 'Position', 'marketingops' ); ?></h6>
						<input name="moc_work_position" placeholder="In this company" class="inputtext">
						<div class="moc_error moc_user_work_company_pos_err"><span></span></div>
					</div>
					<div class="colum_box colum_box_4 moc_required_field">
						<h6><?php esc_html_e( 'Years', 'marketingops' ); ?></h6>
						<div class="years_month">
							<!-- Start Year Dropdown Box -->
							<div class="date_dropbox start_year">
								<!-- MM Box -->
								<div class="dropbox_box start_month_div">
									<!-- MM Value -->
									<select class="moc_start_month">
										<option value=""><?php esc_html_e( 'MM', 'marketingops' )?></option>
										<?php
										$month_array = moc_months_array();
										foreach( $month_array as $key=>$month  ) {
											?>
											<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_attr( $month ); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<p><?php esc_attr_e( '/', 'marketingops' ); ?></p>  
								<!-- YY Box -->
								<div class="dropbox_box start_year_div">
									<!-- MM Value -->
									<select class="moc_start_year">
										<option value=""><?php esc_html_e( 'YYYY', 'marketingops' )?></option>
										<?php
										$get_current_year = date("Y");
										for( $i = 1970; $i <= $get_current_year; $i++ ) {
											?>
											<option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_attr( $i ); ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<span class="moc-seprator"></span>
							<!-- End Year Dropdown Box -->
							<div class="date_dropbox end_year disabled">
								<!-- MM Box -->
								<div class="dropbox_box end_month_div">
									<!-- MM Value -->
									<select class="moc_end_month">
										<option value=""><?php esc_html_e( 'MM', 'marketingops' )?></option>
										<?php
										$month_array = moc_months_array();
										foreach( $month_array as $key=>$month  ) {
											?>
											<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_attr( $month ); ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<p><?php esc_attr_e( '/', 'marketingops' ); ?></p>  
								<!-- YY Box -->
								<div class="dropbox_box end_year_div">
									<!-- MM Value -->
									<select class="moc_end_year">
										<option value=""><?php esc_html_e( 'YYYY', 'marketingops' )?></option>
										<?php
										$get_current_year = date("Y");
										for( $i = 1970; $i <= $get_current_year; $i++ ) {
											?>
											<option value="<?php echo esc_attr( $i ); ?>"><?php echo esc_attr( $i ); ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="moc_error moc_wrong_month_err"><span></span></div>
						</div>
					</div>
					<div class="colum_box colum_box_5">
						<div class="input_checkbox">
							<input type="checkbox" name="moc_at_present" value="" class="moc_at_present" />
							<label for="moc_at_present"><?php esc_html_e( 'Present', 'marketingops' ); ?></label>
						</div>
					</div>
					<div class="colum_box colum_box_6 moc_required_field">
						<h6><?php esc_html_e( 'Website', 'marketingops' ); ?></h6>
						<input name="moc_work_website" placeholder="https://example.com" class="inputtext">
						<div class="moc_error moc_user_work_company_website_err"><span></span></div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_skill_empty_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @since 1.0.0
	 */
	function moc_user_skill_empty_html() {
		ob_start();
			?>
			<div class="moc_inner_skill_section after_cancel_display_none moc_editable_data">
				<div class="boxed_three_colum">
					<div class="colum_box moc_required_field">
						<h6><?php esc_html_e( 'Skill', 'marketingops' ); ?></h6>
						<input name="moc_coding_language" class="inputtext" placeholder="Name">
						<div class="moc_error moc_user_cl_err"><span></span></div>
					</div>
					<div class="colum_box moc_required_field">
						<h6><?php esc_html_e( 'Experience', 'marketingops' ); ?></h6>
						<input name="moc_cl_experience" class="inputtext" placeholder="Years">
						<div class="moc_error moc_user_cl_exp_err"><span></span></div>
					</div>
					<div class="colum_box delete_icon_here">
						<div class="platform deletesec">
							<input type="button" value="delete" class="btn delete_icon">
						</div>
					</div>
				</div>
				<div class="range_slider_box boxed_two_colum">
					<div class="range_slider colum_box">
						<h6><?php esc_html_e( 'Skill level', 'marketingops' ); ?></h6>
						<input type="range" class="range_slider_input rangeslider" name="moc_cl_skill_level" min="1" max="4" step="0.01" labels="1, 2, 3, 4" value="1">
					</div>
					<div class="colum_box"><a class="expert_btn btn yellow_btn"><?php esc_html_e( 'BASIC', 'marketingops' ); ?></a></div>
				</div>
				<hr>
			</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_social_link_empty_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @since 1.0.0
	 */
	function moc_user_social_link_empty_html() {
		ob_start();
			?>
			<div class="exp_inner_sec moc_social_links after_cancel_display_none delete_icon_here">
				<div class="platform platform_left">
					<span class="platform_content">
						<div class="moc_social_icons_div">
							<ul class="social_icons moc_social_icons">
								<li class="icon_box insta active" id="insta" data-activeicon="insta">
									<span></span>
								</li>
								<ul class="social_icons moc_social_icons_list">
									<li class="icon_box facebook" data-icons="<?php esc_attr_e( 'facebook', 'marketingops' ); ?>" data-socialurl="<?php esc_attr_e( 'https://www.facebook.com/john_doe', 'marketingops' ); ?>"></li>
									<li class="icon_box twitter" data-icons="<?php esc_attr_e( 'twitter', 'marketingops' ); ?>" data-socialurl="<?php esc_attr_e( 'https://www.twitter.com/john_doe', 'marketingops' ); ?>" ></li>
									<li class="icon_box insta" data-icons="<?php esc_attr_e( 'insta', 'marketingops' ); ?>" data-socialurl="<?php esc_attr_e( 'https://www.instagram.com/john_doe', 'marketingops' ); ?>"></li>
									<li class="icon_box vk" data-icons="<?php esc_attr_e( 'vk', 'marketingops' ); ?>" data-socialurl="<?php esc_attr_e( 'https://www.vk.com/john_doe', 'marketingops' ); ?>"></li>
									<li class="icon_box github" data-icons="<?php esc_attr_e( 'github', 'marketingops' ); ?>" data-socialurl="<?php esc_attr_e( 'https://www.github.com/john_doe', 'marketingops' ); ?>"></li>
									<li class="icon_box linkedin" data-icons="<?php esc_attr_e( 'linkedin', 'marketingops' ); ?>" data-socialurl="<?php esc_attr_e( 'https://www.linkedin.com/john_doe', 'marketingops' ); ?>"></li>
								</ul>
							</ul>
						</div>
						<div class="inputblock profilecontent">
							<input name="" data-label="" class="social_input inputtext" placeholder="<?php esc_attr_e( 'https://www.instagram.com/handle', 'marketingops' ); ?>">
							<div class="moc_error moc_social_links_err"><span></span></div>
						</div>
					</span>
				</div>
				<div class="platform deletesec">
					<input type="button" value="delete" class="btn delete_icon">
				</div>
			</div>
		<?php
		return ob_get_clean();
	}
}