<?php
/**
 * Filters in `[jobs]` shortcode.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-filters.php.
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

wp_enqueue_script( 'wp-job-manager-ajax-filters' );

do_action( 'job_manager_job_filters_before', $atts );
$role_terms      = get_terms(
	array(
		'taxonomy'   => 'jobroles',
		'hide_empty' => false,
	)
);
$termexperiences = get_terms(
	array(
		'taxonomy'   => 'jobexperiences',
		'hide_empty' => false,
	)
);


$salary_value      = get_field( 'salary_filter', 'option' );
$salary_obj        = get_field_object( 'salary_filter', 'option' );
$salary_sub_fields = $salary_obj['sub_fields'];
foreach ( $salary_sub_fields as $salary_sub_field ) {
	$salary_default_value[] = $salary_sub_field['default_value'];
}
$max_min_salary_array  = array(
	'minimum_salary' => $salary_default_value[0],
	'maximum_salary' => $salary_default_value[1],
);
$salary_filter_setting = ! empty( get_field( 'salary_filter', 'option' ) ) ? get_field( 'salary_filter', 'option' ) : $max_min_salary_array;
$min_salary            = ( ( 0 < $salary_filter_setting['minimum_salary'] ) && ( $salary_filter_setting['minimum_salary'] < $salary_filter_setting['maximum_salary'] ) ) ? $salary_filter_setting['minimum_salary'] : $salary_default_value[0];
$max_salary            = ( ( 0 < $salary_filter_setting['maximum_salary'] ) && ( $min_salary < $salary_filter_setting['maximum_salary'] ) ) ? $salary_filter_setting['maximum_salary'] : $salary_default_value[1];
// debug( $max_salary );
// die;
?>

<form class="job_filters">
	<?php do_action( 'job_manager_job_filters_start', $atts ); ?>
	<div class="search_jobs">
		<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>

		<!-- filter Content -->
		<div class="mobile_filter">
			<a href="#" class="filter_content filter_btn" data-toggle="collapse" data-src="mobile_filter_box">
				<span>Filters</span>
				<span class="svg_icon">
					<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="21.5" cy="21.5" r="21" fill="#F6F7F7" fill-opacity="0.5" stroke="#E7EFEF"/>
						<path d="M25.2499 11.5C24.0162 11.5 22.9999 12.5162 22.9999 13.75C22.9999 13.8881 22.888 14 22.7499 14H11.7499C11.6506 13.9986 11.5519 14.017 11.4597 14.054C11.3674 14.0911 11.2835 14.1461 11.2127 14.2159C11.1419 14.2857 11.0857 14.3688 11.0474 14.4605C11.009 14.5522 10.9893 14.6506 10.9893 14.75C10.9893 14.8494 11.009 14.9478 11.0474 15.0395C11.0857 15.1312 11.1419 15.2143 11.2127 15.2841C11.2835 15.3539 11.3674 15.4089 11.4597 15.446C11.5519 15.483 11.6506 15.5014 11.7499 15.5H22.7499C22.888 15.5 22.9999 15.6119 22.9999 15.75C22.9999 16.9838 24.0162 18 25.2499 18C26.4837 18 27.4999 16.9838 27.4999 15.75C27.4999 15.6119 27.6119 15.5 27.7499 15.5H30.2499C30.3493 15.5014 30.448 15.483 30.5402 15.446C30.6324 15.4089 30.7164 15.3539 30.7872 15.2841C30.8579 15.2143 30.9141 15.1312 30.9525 15.0395C30.9909 14.9478 31.0106 14.8494 31.0106 14.75C31.0106 14.6506 30.9909 14.5522 30.9525 14.4605C30.9141 14.3688 30.8579 14.2857 30.7872 14.2159C30.7164 14.1461 30.6324 14.0911 30.5402 14.054C30.448 14.017 30.3493 13.9986 30.2499 14H27.7499C27.6119 14 27.4999 13.8881 27.4999 13.75C27.4999 12.5162 26.4837 11.5 25.2499 11.5ZM25.2499 13C25.6732 13 25.9999 13.3268 25.9999 13.75V14.5862C25.9999 14.6133 25.9974 14.6404 25.9944 14.6674C25.9886 14.7213 25.9886 14.7758 25.9944 14.8297C25.9974 14.8567 25.9999 14.8838 25.9999 14.9109V15.75C25.9999 16.1732 25.6732 16.5 25.2499 16.5C24.8267 16.5 24.4999 16.1732 24.4999 15.75V14.9138C24.4999 14.8867 24.5025 14.8596 24.5055 14.8326C24.5113 14.7787 24.5113 14.7242 24.5055 14.6703C24.5025 14.6433 24.4999 14.6162 24.4999 14.5891V13.75C24.4999 13.3268 24.8267 13 25.2499 13ZM16.7499 17.75C15.5162 17.75 14.4999 18.7662 14.4999 20C14.4999 20.1381 14.388 20.25 14.2499 20.25H11.7499C11.6506 20.2486 11.5519 20.267 11.4597 20.304C11.3674 20.3411 11.2835 20.3961 11.2127 20.4659C11.1419 20.5357 11.0857 20.6188 11.0474 20.7105C11.009 20.8022 10.9893 20.9006 10.9893 21C10.9893 21.0994 11.009 21.1978 11.0474 21.2895C11.0857 21.3812 11.1419 21.4643 11.2127 21.5341C11.2835 21.6039 11.3674 21.6589 11.4597 21.696C11.5519 21.733 11.6506 21.7514 11.7499 21.75H14.2499C14.388 21.75 14.4999 21.8619 14.4999 22C14.4999 23.2338 15.5162 24.25 16.7499 24.25C17.9837 24.25 18.9999 23.2338 18.9999 22C18.9999 21.8619 19.1119 21.75 19.2499 21.75H30.2499C30.3493 21.7514 30.448 21.733 30.5402 21.696C30.6324 21.6589 30.7164 21.6039 30.7872 21.5341C30.8579 21.4643 30.9141 21.3812 30.9525 21.2895C30.9909 21.1978 31.0106 21.0994 31.0106 21C31.0106 20.9006 30.9909 20.8022 30.9525 20.7105C30.9141 20.6188 30.8579 20.5357 30.7872 20.4659C30.7164 20.3961 30.6324 20.3411 30.5402 20.304C30.448 20.267 30.3493 20.2486 30.2499 20.25H19.2499C19.1119 20.25 18.9999 20.1381 18.9999 20C18.9999 18.7662 17.9837 17.75 16.7499 17.75ZM16.7499 19.25C17.1732 19.25 17.4999 19.5768 17.4999 20V20.8362C17.4999 20.8633 17.4974 20.8904 17.4944 20.9174C17.4886 20.9713 17.4886 21.0258 17.4944 21.0797C17.4974 21.1067 17.4999 21.1338 17.4999 21.1609V22C17.4999 22.4232 17.1732 22.75 16.7499 22.75C16.3267 22.75 15.9999 22.4232 15.9999 22V21.1638C15.9999 21.1367 16.0025 21.1096 16.0055 21.0826C16.0113 21.0287 16.0113 20.9742 16.0055 20.9203C16.0025 20.8933 15.9999 20.8662 15.9999 20.8391V20C15.9999 19.5768 16.3267 19.25 16.7499 19.25ZM24.2499 24C23.0162 24 21.9999 25.0162 21.9999 26.25C21.9999 26.3881 21.888 26.5 21.7499 26.5H11.7499C11.6506 26.4986 11.5519 26.517 11.4597 26.554C11.3674 26.5911 11.2835 26.6461 11.2127 26.7159C11.1419 26.7857 11.0857 26.8688 11.0474 26.9605C11.009 27.0522 10.9893 27.1506 10.9893 27.25C10.9893 27.3494 11.009 27.4478 11.0474 27.5395C11.0857 27.6312 11.1419 27.7143 11.2127 27.7841C11.2835 27.8539 11.3674 27.9089 11.4597 27.946C11.5519 27.983 11.6506 28.0014 11.7499 28H21.7499C21.888 28 21.9999 28.1119 21.9999 28.25C21.9999 29.4838 23.0162 30.5 24.2499 30.5C25.4837 30.5 26.4999 29.4838 26.4999 28.25C26.4999 28.1119 26.6119 28 26.7499 28H30.2499C30.3493 28.0014 30.448 27.983 30.5402 27.946C30.6324 27.9089 30.7164 27.8539 30.7872 27.7841C30.8579 27.7143 30.9141 27.6312 30.9525 27.5395C30.9909 27.4478 31.0106 27.3494 31.0106 27.25C31.0106 27.1506 30.9909 27.0522 30.9525 26.9605C30.9141 26.8688 30.8579 26.7857 30.7872 26.7159C30.7164 26.6461 30.6324 26.5911 30.5402 26.554C30.448 26.517 30.3493 26.4986 30.2499 26.5H26.7499C26.6119 26.5 26.4999 26.3881 26.4999 26.25C26.4999 25.0162 25.4837 24 24.2499 24ZM24.2499 25.5C24.6732 25.5 24.9999 25.8268 24.9999 26.25V27.0862C24.9999 27.1133 24.9974 27.1404 24.9944 27.1674C24.9886 27.2213 24.9886 27.2758 24.9944 27.3297C24.9974 27.3567 24.9999 27.3838 24.9999 27.4109V28.25C24.9999 28.6733 24.6732 29 24.2499 29C23.8267 29 23.4999 28.6733 23.4999 28.25V27.4138C23.4999 27.3867 23.5025 27.3596 23.5055 27.3326C23.5113 27.2787 23.5113 27.2242 23.5055 27.1703C23.5025 27.1433 23.4999 27.1162 23.4999 27.0891V26.25C23.4999 25.8268 23.8267 25.5 24.2499 25.5Z" fill="#45474F"/>
					</svg>
				</span>
			</a>
		</div>

		<div class="sortbycontainer">
			<span class="sortby_text"><?php esc_html_e( 'Sort by', 'wp-job-manager' ); ?></span>
			<select class="job-manager-filter" name="sortby_jobs">
				<option value="DESC"><?php esc_html_e( 'Newest', 'wp-job-manager' ); ?></option>
				<option value="ASC"><?php esc_html_e( 'Oldest', 'wp-job-manager' ); ?></option>
			</select>
		</div>
		<div class="mobile_filter_box" id="mobile_filter_box">
			<!-- filter title boxed -->
			<div class="mobile_filter_title_box">
				<div class="title_box">
					<h5>Filters</h5>
				</div>
				<div class="filter_closed_btn">
					<a href="#" class="svg_icon filter_close_btn" data-toggle="collapsed" data-src="mobile_filter_box">
						<svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="21.5" cy="21.5" r="21" fill="#F6F7F7" fill-opacity="0.5" stroke="#E7EFEF"/>
							<path d="M28.7433 13.4892C28.5452 13.4939 28.357 13.5768 28.2198 13.7197L21.0001 20.9394L13.7804 13.7197C13.7105 13.6477 13.6268 13.5905 13.5344 13.5514C13.442 13.5123 13.3427 13.4922 13.2423 13.4922C13.093 13.4922 12.9472 13.5368 12.8234 13.6202C12.6996 13.7035 12.6035 13.822 12.5474 13.9603C12.4913 14.0986 12.4778 14.2505 12.5085 14.3966C12.5392 14.5427 12.6128 14.6762 12.7198 14.7802L19.9396 22L12.7198 29.2197C12.6479 29.2888 12.5904 29.3716 12.5508 29.4632C12.5112 29.5548 12.4903 29.6533 12.4893 29.7531C12.4883 29.8529 12.5072 29.9519 12.5449 30.0443C12.5826 30.1366 12.6384 30.2206 12.7089 30.2911C12.7795 30.3617 12.8634 30.4175 12.9558 30.4552C13.0482 30.4929 13.1472 30.5118 13.247 30.5108C13.3467 30.5098 13.4453 30.4889 13.5369 30.4493C13.6285 30.4097 13.7113 30.3522 13.7804 30.2802L21.0001 23.0605L28.2198 30.2802C28.289 30.3522 28.3717 30.4097 28.4633 30.4493C28.5549 30.4889 28.6535 30.5098 28.7533 30.5108C28.8531 30.5118 28.952 30.4929 29.0444 30.4552C29.1368 30.4175 29.2207 30.3617 29.2913 30.2911C29.3618 30.2206 29.4176 30.1366 29.4553 30.0443C29.493 29.9519 29.5119 29.8529 29.5109 29.7531C29.5099 29.6533 29.489 29.5548 29.4494 29.4632C29.4098 29.3716 29.3524 29.2888 29.2804 29.2197L22.0607 22L29.2804 14.7802C29.3895 14.6756 29.4643 14.5404 29.4952 14.3924C29.5261 14.2444 29.5116 14.0905 29.4535 13.951C29.3955 13.8114 29.2966 13.6926 29.1698 13.6102C29.0431 13.5278 28.8944 13.4857 28.7433 13.4892Z" fill="black"/>
						</svg>
					</a>
				</div>
			</div>

			<!-- Reset BTN -->
			<div class="reset_btn">
				<a href="javascript:;">
					<span class="text">Reset Filters</span>
				</a>
			</div>
			<!-- Reset BTN -->
			
			<div class="search_salary job_types">
				<div class="expandableCollapsibleDiv">
					<h3 class="open"><?php esc_html_e( 'Salary range', 'wp-job-manager' ); ?></h3>
					<ul>
						<div class="pleft searchsalary">
							<label for="search_min"><?php esc_html_e( 'Min', 'wp-job-manager' ); ?></label>
							<input name="salarymin" type="number"  value="<?php echo esc_html( $min_salary ); ?>" class="from" data-fromval/>
						</div>
						<div class="pright searchsalary">
							<label for="search_max"><?php esc_html_e( 'Max', 'wp-job-manager' ); ?></label>
							<input name="salarymax" type="number" value="<?php echo esc_html( $max_salary ); ?>" class="to" data-toval=""/>
						</div>
						<div class="job_types">
							<input type="text" class="js-range-slider" name="my_range" value="" step="100"
								data-skin="round"
								data-type="double"
								data-min="<?php echo esc_html( $min_salary ); ?>"
								data-max="<?php echo esc_html( $max_salary ); ?>"
								data-grid="false"
								data-step="100"
							/>
							<input type="hidden" name="salarymin_val" value="<?php echo esc_html( $min_salary ); ?>" />
							<input type="hidden" name="salarymax_val" value="<?php echo esc_html( $max_salary ); ?>" />
						</div>
						
					</ul>
				</div>
			</div>
			<div class="search_jobroles job-manager-filter">
				<div class="expandableCollapsibleDiv">
					<h3 class="open"><?php esc_html_e( 'Role level', 'wp-job-manager' ); ?></h3>
					<ul>
					<li><input type="checkbox" id="job_any_role" name="" value="" checked="checked"> <label for="job_any_role"><?php esc_html_e( 'Any', 'wp-job-manager' ); ?></label></li>
						<?php
						foreach ( $role_terms as $role_term ) {
							echo '<li><input id="' . esc_attr( $role_term->name ) . '" type="radio" name="filter_by_role[]" value="' . esc_attr( $role_term->slug ) . '" id="job_"' . esc_attr( $role_term->slug ) . '"> <label for="' . esc_attr( $role_term->name ) . '">' . esc_attr( $role_term->name ) . '</label></li>';
						}
						?>
					</ul>
				</div>
			</div>
			<div class="search_jobexperiences job-manager-filter">
				<div class="expandableCollapsibleDiv">
					<h3 class="open"><?php esc_html_e( 'Marketing automation experience', 'wp-job-manager' ); ?></h3>
					<ul>
						<li><input type="checkbox" id="any_marketing_automation_experience" name="" value="" checked="checked" id="job_any_exp"> <label for="any_marketing_automation_experience"><?php esc_html_e( 'Any', 'wp-job-manager' ); ?></label></li>
						<?php
						foreach ( $termexperiences as $termexperience ) {
							echo '<li><input id="' . esc_attr( $termexperience->name ) . '" type="radio" class="search_checkbox" name="filter_by_experiences[]" value="' . esc_attr( $termexperience->slug ) . '" id="job_"' . esc_attr( $termexperience->slug ) . '"> <label for="' . esc_attr( $termexperience->name ) . '">' . esc_attr( $termexperience->name ) . '</label></li>';
						}
						?>
					</ul>
				</div>
			</div>
			<div class="search_keywords">
				<label for="search_keywords"><?php esc_html_e( 'Keywords', 'wp-job-manager' ); ?></label>
				<input type="text" name="search_keywords" id="search_keywords" placeholder="<?php esc_attr_e( 'Keywords', 'wp-job-manager' ); ?>" value="<?php echo esc_attr( $keywords ); ?>" />
			</div>
			<div class="search_location">
				<div class="expandableCollapsibleDiv"><h3 class="open"><?php esc_html_e( 'Location', 'wp-job-manager' ); ?></h3>
					<ul>
						<input type="text" name="search_location" id="search_location" placeholder="<?php esc_attr_e( 'Location', 'wp-job-manager' ); ?>" value="<?php echo esc_attr( $location ); ?>" />
					</ul>
				</div>
			</div>

			<div style="clear: both"></div>

			<?php if ( $categories ) : ?>
				<?php foreach ( $categories as $category ) : ?>
					<input type="hidden" name="search_categories[]" value="<?php echo esc_attr( sanitize_title( $category ) ); ?>" />
				<?php endforeach; ?>
			<?php elseif ( $show_categories && ! is_tax( 'job_listing_category' ) && get_terms( array( 'taxonomy' => 'job_listing_category' ) ) ) : ?>
				<div class="search_categories">
					<label for="search_categories"><?php esc_html_e( 'Category', 'wp-job-manager' ); ?></label>
					<?php if ( $show_category_multiselect ) : ?>
						<?php
						job_manager_dropdown_categories(
							array(
								'taxonomy'     => 'job_listing_category',
								'hierarchical' => 1,
								'name'         => 'search_categories',
								'orderby'      => 'name',
								'selected'     => $selected_category,
								'hide_empty'   => true,
							)
						);
						?>
					<?php else : ?>
						<?php
						job_manager_dropdown_categories(
							array(
								'taxonomy'        => 'job_listing_category',
								'hierarchical'    => 1,
								'show_option_all' => __( 'Any category', 'wp-job-manager' ),
								'name'            => 'search_categories',
								'orderby'         => 'name',
								'selected'        => $selected_category,
								'multiple'        => false,
								'hide_empty'      => true,
							)
						);
						?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php
			/**
			 * Show the submit button on the job filters form.
			 *
			 * @since 1.33.0
			 *
			 * @param bool $show_submit_button Whether to show the button. Defaults to true.
			 * @return bool
			 */
			if ( apply_filters( 'job_manager_job_filters_show_submit_button', true ) ) :
				?>
				<div class="search_submit">
					<input type="submit" value="<?php esc_attr_e( 'Search Jobs', 'wp-job-manager' ); ?>">
				</div>
			<?php endif; ?>

			<?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>

			<!-- type & btn code here -->
			<?php 
			if ( wp_is_mobile() ) {
				?>
				<div class="search_jobs lastfield">
					<div>
						<?php if ( ! is_tax( 'job_listing_type' ) && empty( $job_types ) ) : ?>
							<div class="expandableCollapsibleDiv"><h3 class="open"><?php esc_html_e( 'Type', 'wp-job-manager' ); ?></h3>
							<ul class="job_types">
								<li><input type="checkbox" id="any_type" name="" value="" checked="checked" id="job_any_type"> <label for="any_type"><?php esc_html_e( 'Any', 'wp-job-manager' ); ?></label></li>
								<?php foreach ( get_job_listing_types() as $job_type ) : ?>
									<li><input id="<?php echo esc_html( $job_type->name ); ?>" type="radio" class="search_checkbox2" name="filter_job_type[]" value="<?php echo esc_attr( $job_type->slug ); ?>" id="job_type_<?php echo esc_attr( $job_type->slug ); ?>" /> <label for="<?php echo esc_html( $job_type->name ); ?>"><?php echo esc_html( $job_type->name ); ?></label></li>
								<?php endforeach; ?>
							</ul>
							</div>
							<!--<input type="hidden" name="filter_job_type[]" value="" />-->
						<?php elseif ( $job_types ) : ?>
							<?php foreach ( $job_types as $job_type ) : ?>
								<input type="hidden" name="filter_job_type[]" value="<?php echo esc_attr( sanitize_title( $job_type ) ); ?>" />
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>

	<?php do_action( 'job_manager_job_filters_end', $atts ); ?>
</form>

<script type="text/javascript">
	(function( $ ) {
	'use strict';
		// sidebar open
		$('.filter_btn').click(function(e) {
			e.preventDefault();
			var data_toggled = $(this).data('toggle');
			var data_src = $(this).data('src');
			if ( data_toggled === 'collapse' ) {
				$( this ).data('toggle', 'collapse');
				$('#' + data_src).addClass('active');
				$('body').addClass('fixed');
				$('html').addClass('fixed');
			} else {
				$(this).data('toggle', 'collapse');
				$('.mobile_filter_box').removeClass('active');
				$('body').removeClass('fixed');
				$('html').removeClass('fixed');
			}
		});

		// sidebar closed

		$('.filter_close_btn').click(function(e) {
			e.preventDefault();
			$('.filter_btn').data('toggle', 'collapse');
			$('.mobile_filter_box').removeClass('active');
			$('body').removeClass('fixed');
			$('html').removeClass('fixed');
		});
	})( jQuery );
</script>

<?php do_action( 'job_manager_job_filters_after', $atts ); ?>

<noscript><?php esc_html_e( 'Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.', 'wp-job-manager' ); ?></noscript>
