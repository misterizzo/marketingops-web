<?php
/**
 * This file is used for templating the agency profile registration for loggedin members.
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/partials/templates/woocommerce/myaccount
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

global $current_user, $wpdb;

// Check if there are agency signups required from the signup modal.
$agency_signup = filter_input( INPUT_GET, 'agency_signup', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

if ( ! is_null( $agency_signup ) ) {
	$logout     = filter_input( INPUT_GET, 'logout', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
	$same_email = filter_input( INPUT_GET, 'same_email', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

	// If the user wishes to continue with the same email.
	if ( ! is_null( $same_email ) && 'yes' === $same_email ) {
		$agency_name = filter_input( INPUT_GET, 'agency_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

		// Create the agency post and redirect the user to the agency profile setup page.
		wp_insert_post(
			array(
				'post_title'   => $agency_name,
				'post_type'    => 'agency',
				'post_status'  => 'publish',
				'post_author'  => $current_user->ID,
				'meta_input'   => array(
					'agency_owner'      => $current_user->ID,
					'agency_user_email' => $current_user->data->user_email,
				),
			)
		);

		// Redirect the user to the agency profile setup page.
		wp_safe_redirect( wc_get_endpoint_url( 'agency-profile' ) );
		exit;
	} else {
		// If the agency signup is paid, or free.
		if ( 'paid' === $agency_signup ) {
			$redirectto = home_url( '/sign-up/?plan=237665&type=agency' );
		} elseif ( 'free' === $agency_signup ) {
			$redirectto = home_url( '/sign-up/?plan=232396&type=agency' );
		}

		// Set the cookie so the redirection can be done propoerly.
		setcookie( 'redirectto', $redirectto, time() + 86400, '/' );

		/**
		 * Logout the user if the logout is set to yes.
		 * This is to ensure that the user is logged out and redirected to the signup page.
		 */
		if ( ! is_null( $logout ) && 'yes' === $logout ) {
			wp_logout();
			wp_die();
		}
	}
}

$is_agency_member = mops_is_user_agency_partner( $current_user->ID );
$agency_id        = new WP_Query(
	array(
		'post_type'      => 'agency',
		'posts_per_page' => 1,
		'fields'         => 'ids',
		'post_status'    => array( 'publish' ),
		'meta_query'     => array(
			array(
				'key'     => 'agency_owner',
				'value'   => $current_user->ID,
				'compare' => '=',
			)
		),
	)
);
$agency_id        = ( ! empty( $agency_id->posts[0] ) ) ? $agency_id->posts[0] : false;

// If the linked agency is not available, show the registration page.
if ( false === $agency_id || false === $is_agency_member ) {
	echo do_shortcode( '[elementor-template id="231177"]' );
} else {
	$agency_post_status = get_post_status( $agency_id );
	$agency_title       = get_the_title( $agency_id );
	$agency_image_id    = get_post_thumbnail_id( $agency_id );
	$agency_image       = wp_get_attachment_image_src( $agency_image_id, 'full-image' );
	$agency_description = get_post_field( 'post_content', $agency_id );
	?>
	<div name="agency-signup-form">
		<section class="agencyformone">
			<h1><?php esc_html_e( 'General', 'marketingops' ); ?></h1>
			<div class="agencyformgroup">
				<label for="agency-name"><?php esc_html_e( 'Agency name', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
				<input type="text" class="agancyinputbox" id="agency-name" value="<?php echo wp_kses_post( $agency_title ); ?>">
				<small><?php esc_html_e( 'This will be how your name will be displayed in the account section', 'marketingops' ); ?></small>
			</div>
			<div class="agencyformgroup logoupload">
				<label><?php esc_html_e( 'Logo', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
				<div class="upload-btn-wrapper image-upload-container">
					<button class="btn"><?php esc_html_e( 'Select an image', 'marketingops' ); ?></button>
					<p><?php esc_html_e( 'For the best results, upload horizontal version, 560 x 240px max', 'marketingops' ); ?></p>
					<input type="file" class="imageInput" id="agency-featured-image" name="myfile" accept="image/*" />
					<div id="previewContainer" class="preview-container" style="<?php echo ( empty( $agency_image[0] ) ? 'display: none;' : '' ); ?>">
						<input type="hidden" class="agency-featured-image-id" value="<?php echo ( ! empty( $agency_image_id ) ? $agency_image_id : '' ); ?>" />
						<img class="preview-image" src="<?php echo ( ! empty( $agency_image[0] ) ? $agency_image[0] : '' ); ?>" alt="<?php esc_html_e( 'Image Preview', 'marketingops' ); ?>" />
						<button class="removePreview remove-preview-btn" id="removePreview"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="15.35" stroke="white" stroke-width="1.3"></circle><path d="M11 11L16 16L11 21" stroke="white" stroke-width="1.3"></path><path d="M21 11L16 16L21 21" stroke="white" stroke-width="1.3"></path></svg></button>
					</div>
				</div>
			</div>
			<div class="agencyformgroup">
				<label><?php esc_html_e( 'Description', 'marketingops' ); ?></label>
				<textarea id="agency-description" rows="4" cols="50"><?php echo wp_kses_post( $agency_description ); ?></textarea>
				<small class="agency-description-characters-count"><?php echo sprintf( __( '%1$d of 400 characters', 'marketingops' ), strlen( $agency_description ) ); ?></small>
			</div>

			<h2><?php esc_html_e( 'Contact', 'marketingops' ); ?></h2>
			<?php
			$agency_user_name    = get_field( 'agency_user_name', $agency_id );
			$agency_user_email   = get_field( 'agency_user_email', $agency_id );
			$agency_user_website = get_field( 'agency_user_website', $agency_id );
			?>
			<div class="agencyformgroups">
				<div class="agencyfirstblock">
					<label for="agency-contact-name"><?php esc_html_e( 'Name', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
					<input type="text" class="agancyinputbox" id="agency-contact-name" name="name" value="<?php echo wp_kses_post( $agency_user_name ); ?>">
				</div> 
				<div class="agencyfirstblock">
					<label for="agency-contact-email"><?php esc_html_e( 'E-mail', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
					<input type="email" class="agancyinputbox" id="agency-contact-email" name="email" value="<?php echo esc_html( $agency_user_email ); ?>">
				</div>    
			</div>
			<div class="agencyformgroup">
				<label for="agency-contact-website"><?php esc_html_e( 'Agency Website', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
				<input type="text" class="agancyinputbox" id="agency-contact-website" name="agencywebsite" value="<?php echo esc_url( $agency_user_website ); ?>">
			</div>
		</section>

		<?php
		$agency_types      = wp_get_object_terms( $agency_id, 'agency_type', array( 'fields' => 'ids' ) );
		$agency_type_terms = get_terms(
			array(
				'taxonomy'   => 'agency_type',
				'hide_empty' => false,
			)
		);
		$year_founded      = (int) get_field( 'agency_year_founded', $agency_id );
		$employees_list    = array( '1', '2-5', '6-10', '11-25', '26-50', '51-200', '201-1000', '1001-10000', '10001 or more' );
		$agency_employees  = get_field( 'agency_employees', $agency_id );
		?>
		<section class="agencyformone detailsblock">
			<h3><?php esc_html_e( 'Details', 'marketingops' ); ?></h3>
			<h5><?php esc_html_e( 'Agency type', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></h5>
			<?php if ( ! empty( $agency_type_terms ) && is_array( $agency_type_terms ) ) { ?>
				<?php foreach ( $agency_type_terms as $agency_type_term ) { ?>
					<p>
						<input type="radio" value="<?php echo esc_attr( $agency_type_term->term_id ); ?>" id="agency-type-<?php echo esc_attr( $agency_type_term->term_id ); ?>" name="agency-type" <?php echo esc_attr( ( in_array( $agency_type_term->term_id, $agency_types, true ) ) ? 'checked' : '' ); ?>>
						<label for="agency-type-<?php echo esc_attr( $agency_type_term->term_id ); ?>"><?php echo wp_kses_post( $agency_type_term->name ); ?>
							<small><?php echo wp_kses_post( $agency_type_term->description ); ?></small>
						</label>
					</p>
				<?php } ?>
			<?php } ?>

			<div class="agencyformgroups">
				<div class="agencyfirstblock">
					<label for="agency-year-founded"><?php esc_html_e( 'Year founded', 'marketingops' ); ?></label>
					<select class="marketingops-selectbox" id="agency-year-founded">
						<?php for ( $i = 1900; $i <= gmdate( 'Y' ); $i++ ) { ?>
							<option value="<?php echo esc_attr( $i ); ?>" <?php echo esc_attr( ( ! empty( $year_founded ) && $year_founded === $i ) ? 'selected' : '' ); ?>><?php echo esc_attr( $i ); ?></option>
						<?php } ?>
					</select>
				</div> 
				<div class="agencyfirstblock">
					<label for="agency-employees"><?php esc_html_e( 'Employees', 'marketingops' ); ?></label>
					<select class="marketingops-selectbox" id="agency-employees">
						<?php foreach ( $employees_list as $employees_list_item ) { ?>
							<option value="<?php echo esc_html( $employees_list_item ); ?>" <?php echo esc_attr( ( ! empty( $agency_employees ) && $agency_employees === $employees_list_item ) ? 'selected' : '' ); ?>><?php echo esc_html( $employees_list_item ); ?></option>
						<?php } ?>
					</select>
				</div>    
			</div>

			<?php
			$agency_regions      = wp_get_object_terms( $agency_id, 'agency_region', array( 'fields' => 'ids' ) );
			$agency_region_terms = get_terms(
				array(
					'taxonomy'   => 'agency_region',
					'hide_empty' => false,
				)
			);
			?>
			<h5><?php esc_html_e( 'Which regions do you have full time employees in?', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></h5>
			<?php if ( ! empty( $agency_region_terms ) && is_array( $agency_region_terms ) ) { ?>
				<?php foreach ( $agency_region_terms as $agency_region_term ) { ?>
					<div class="agencyformgroup form-group">
						<input type="checkbox" class="agency-region" name="agency-region[]" id="region-<?php echo esc_html( sanitize_title( $agency_region_term->name ) ); ?>" value="<?php echo esc_attr( $agency_region_term->term_id ); ?>" <?php echo esc_attr( ( ! empty( $agency_regions ) && in_array( $agency_region_term->term_id, $agency_regions, true ) ) ? 'checked' : '' ); ?>>
						<label for="region-<?php echo esc_html( sanitize_title( $agency_region_term->name ) ); ?>"><?php echo esc_html( $agency_region_term->name ); ?></label>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="agencyformgroup form-group" id="regions-container"></div>
			<button style="display: none;" class="addregion add-new-taxonomy-term" data-taxonomy="agency_region" data-type="region"><?php esc_html_e( 'Add another region', 'marketingops' ); ?></button>

			<?php
			$agency_primary_verticals      = wp_get_object_terms( $agency_id, 'agency_primary_vertical', array( 'fields' => 'ids' ) );
			$agency_primary_vertical_terms = get_terms(
				array(
					'taxonomy'   => 'agency_primary_vertical',
					'hide_empty' => false,
				)
			);
			?>
			<div class="agencyformgroups">
				<div class="agencyfirstblock">
					<label><?php esc_html_e( 'Primary Verticals', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
					<?php if ( ! empty( $agency_primary_vertical_terms ) && is_array( $agency_primary_vertical_terms ) ) { ?>
						<?php foreach ( $agency_primary_vertical_terms as $agency_primary_vertical_term ) { ?>
							<div class="agencyformgroup form-group">
								<input type="checkbox" class="agency-primary-vertical" name="agency-primary-vertical[]" id="primary-vertical-<?php echo esc_html( sanitize_title( $agency_primary_vertical_term->name ) ); ?>" value="<?php echo esc_attr( $agency_primary_vertical_term->term_id ); ?>" <?php echo esc_attr( ( ! empty( $agency_primary_verticals ) && in_array( $agency_primary_vertical_term->term_id, $agency_primary_verticals, true ) ) ? 'checked' : '' ); ?>>
								<label for="primary-vertical-<?php echo esc_html( sanitize_title( $agency_primary_vertical_term->name ) ); ?>"><?php echo esc_html( $agency_primary_vertical_term->name ); ?></label>
							</div>
						<?php } ?>
					<?php } ?>
					<button class="addregion" style="display: none;"><?php esc_html_e( 'Add new vertical', 'marketingops' ); ?></button>
				</div>

				<?php
				$agency_services      = wp_get_object_terms( $agency_id, 'agency_service', array( 'fields' => 'ids' ) );
				$agency_service_terms = get_terms(
					array(
						'taxonomy'   => 'agency_service',
						'hide_empty' => false,
					)
				);
				?>
				<div class="agencyfirstblock">
					<label><?php esc_html_e( 'What services do you provide?', 'marketingops' ); ?><?php echo mops_get_required_asterisk(); ?></label>
					<?php if ( ! empty( $agency_service_terms ) && is_array( $agency_service_terms ) ) { ?>
						<?php foreach ( $agency_service_terms as $agency_service_term ) { ?>
							<div class="agencyformgroup form-group">
								<input type="checkbox" class="agency-service" name="agency-service[]" id="service-<?php echo esc_html( sanitize_title( $agency_service_term->name ) ); ?>" value="<?php echo esc_attr( $agency_service_term->term_id ); ?>" <?php echo esc_attr( ( ! empty( $agency_services ) && in_array( $agency_service_term->term_id, $agency_services, true ) ) ? 'checked' : '' ); ?>>
								<label for="service-<?php echo esc_html( sanitize_title( $agency_service_term->name ) ); ?>"><?php echo esc_html( $agency_service_term->name ); ?></label>
							</div>
						<?php } ?>
					<?php } ?>
					<button class="addregion" style="display: none;"><?php esc_html_e( 'Add new service', 'marketingops' ); ?></button>
				</div>
			</div>
		</section>

		<?php $people = get_field( 'agency_people', $agency_id ); ?>
		<section class="agencyformone spotlit">
			<h3 class="spotlit"><?php esc_html_e( 'In the spotlight', 'marketingops' ); ?></h3>
			<div class="agency-main-people-container">
				<?php if ( ! empty( $people ) && is_array( $people ) ) {
					foreach ( $people as $person_index => $person_data ) {
						echo mops_get_agency_person_html_block( $person_index, $person_data );
					}
				} ?>
			</div>
			<button class="addpersone"><?php esc_html_e( 'Add Person', 'marketingops' ); ?></button>
		</section>

		<?php $testimonial = get_field( 'agency_testimonial', $agency_id ); ?>
		<section class="agencyformone mentions">
			<h6 class="special"><?php esc_html_e( 'Special mentions', 'marketingops' ); ?></h6>
			<div class="agencyformgroup videogroup articals" style="margin-top:0;">
				<h5><?php esc_html_e( 'Testimonial', 'marketingops' ); ?></h5>
				<label><?php esc_html_e( 'Text', 'marketingops' ); ?></label>
				<textarea id="agency-testimonial-text" name="agency-testimonial-text" rows="4" cols="50"><?php echo wp_kses_post( ( ! empty( $testimonial['text'] ) ? $testimonial['text'] : '' ) ); ?></textarea>
				<small class="agency-testimonial-text-characters-count"><?php echo sprintf( __( '%1$d of 400 characters', 'marketingops' ), strlen( ( ! empty( $testimonial['text'] ) ? $testimonial['text'] : '' ) ) ); ?></small>
			</div>
			<div class="agencyformgroup person">
				<label><?php esc_html_e( 'Name of the person quoted', 'marketingops' ); ?></label>
				<input type="text" class="agancyinputbox" id="agency-testimonial-author" name="agency-testimonial-author" value="<?php echo wp_kses_post( ( ! empty( $testimonial['name_of_the_person_quoted'] ) ? $testimonial['name_of_the_person_quoted'] : '' ) ); ?>">
			</div>

			<?php
			$clients = get_field( 'agency_clients', $agency_id );
			$clients = ( ! empty( $clients ) && is_array( $clients ) ) ? array_column( $clients, 'client_name' ) : array();
			$clients = ( ! empty( $clients ) && is_array( $clients ) ) ? implode( "\n", $clients ) : '';
			?>
			<div class="agencyformgroup videogroup articals">
				<h5><?php esc_html_e( 'Clients', 'marketingops' ); ?></h5>
				<label><?php esc_html_e( 'Text', 'marketingops' ); ?></label>
				<textarea id="agency-clients" name="agency-clients" rows="4" cols="50"><?php echo wp_kses_post( $clients ); ?></textarea>
				<small><?php esc_html_e( 'List as many as you want, and list one client per line to create a list.', 'marketingops' ); ?></small>
			</div>

			<?php
			$certifications = get_field( 'agency_certifications', $agency_id );
			$certifications = ( ! empty( $certifications ) && is_array( $certifications ) ) ? array_column( $certifications, 'certification_name' ) : array();
			$certifications = ( ! empty( $certifications ) && is_array( $certifications ) ) ? implode( "\n", $certifications ) : '';
			?>
			<div class="agencyformgroup videogroup articals">
				<h5><?php esc_html_e( 'Certifications', 'marketingops' ); ?></h5>
				<label><?php esc_html_e( 'Text', 'marketingops' ); ?></label>
				<textarea id="agency-certifications" name="agency-certifications" rows="4" cols="50"><?php echo wp_kses_post( $certifications ); ?></textarea>
				<small><?php esc_html_e( 'List as many as you want, and list one certification per line to create a list.', 'marketingops' ); ?></small>    
			</div>

			<?php
			$awards = get_field( 'agency_awards', $agency_id );
			$awards = ( ! empty( $awards ) && is_array( $awards ) ) ? array_column( $awards, 'award_name' ) : array();
			$awards = ( ! empty( $awards ) && is_array( $awards ) ) ? implode( "\n", $awards ) : '';
			?>
			<div class="agencyformgroup videogroup articals">
				<h5><?php esc_html_e( 'Awards', 'marketingops' ); ?></h5>
				<label><?php esc_html_e( 'Text', 'marketingops' ); ?></label>
				<textarea id="agency-awards" name="agency-awards" rows="4" cols="50"><?php echo wp_kses_post( $awards ); ?></textarea>
				<small><?php esc_html_e( 'Please list one award per line to create a list.', 'marketingops' ); ?></small>    
			</div>

			<?php
			$include_articles    = get_field( 'agency_include_articles', $agency_id );
			$user_articles_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'paged'          => 1,
					'posts_per_page' => get_option( 'posts_per_page' ),
					'post_status'    => 'publish',
					'fields'         => 'ids',
					'orderby'        => 'date',
					'order'          => 'DESC',
					'author'         => $current_user->ID,
				)
			);
			$user_articles_posts = ( ! empty( $user_articles_query->posts ) && is_array( $user_articles_query->posts ) ) ? $user_articles_query->posts : array();
			?>
			<div class="agencyformgroup videogroup articals">
				<h6 class="jbtitle"><?php esc_html_e( 'Articles & Press Releases', 'marketingops' ); ?></h6>
				<div class="fromgops">
					<div class="agencyformgroup form-group">
						<input type="checkbox" id="include-articles" <?php echo esc_attr( ( ! empty( $include_articles ) && true === $include_articles ) ? 'checked' : '' ); ?>>
						<label for="include-articles"><?php esc_html_e( 'Publish articles & press releases posted by me', 'marketingops' ); ?></label>
					</div>
					<button id="toggleButton" class="toggle-agency-articles"><?php esc_html_e( 'Select', 'marketingops' ); ?> <i><svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_102_2793)"><path d="M10.5262 3.99457C10.2892 3.98546 10.0693 4.12103 9.97249 4.3375C9.87452 4.55396 9.91667 4.80688 10.0807 4.98005L11.8728 6.91682H0.592831C0.382065 6.9134 0.187248 7.02391 0.0812957 7.20619C-0.0257965 7.38734 -0.0257965 7.61292 0.0812957 7.79406C0.187248 7.97634 0.382065 8.08685 0.592831 8.08344H11.8728L10.0807 10.0202C9.9349 10.1729 9.88363 10.3916 9.94515 10.5933C10.0067 10.7949 10.1719 10.9476 10.3769 10.9931C10.5831 11.0387 10.7973 10.9692 10.9375 10.8131L14.001 7.50013L10.9375 4.18711C10.8326 4.0709 10.6834 4.00027 10.5262 3.99457Z" fill="white"/></g><defs><clipPath id="clip0_102_2793"><rect width="15" height="11" fill="white"/></clipPath></defs></svg></i></button>
				</div>
				<div id="dynamicContainer" class="user-agency-articles" style="display: none">
					<h6 class="jbtitle"><?php esc_html_e( 'Select articles you want to be displayed on your agency profile.', 'marketingops' ); ?></h6>
					<div class="toggelecheckselct">
						<?php if ( ! empty( $user_articles_posts ) && is_array( $user_articles_posts ) ) { ?>
							<?php foreach ( $user_articles_posts as $article_post_id ) { ?>
								<div class="agencyformgroup form-group">
									<input type="checkbox" class="agency-article-id" name="agency-article-id[]" id="article-<?php echo esc_attr( $article_post_id ); ?>" value="<?php echo esc_attr( $article_post_id ); ?>">
									<label for="article-<?php echo esc_attr( $article_post_id ); ?>"><?php echo wp_kses_post( get_the_title( $article_post_id ) ); ?></label>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>  
			
			<?php $agency_video = get_field( 'agency_video', $agency_id ); ?>
			<div class="agencyformgroup videogroup">
			<h6 class="jbtitle"><?php esc_html_e( 'Video', 'marketingops' ); ?></h6>
				<label><?php esc_html_e( 'Youtube / Vimeo link', 'marketingops' ); ?></label>
				<input type="text" class="agancyinputbox" id="agency-video" name="Video" value="<?php echo esc_url( $agency_video ); ?>">
				<div id="videoPreview"></div>
			</div>

			<?php $include_jobs = get_field( 'agency_include_jobs', $agency_id ); ?>
			<h6 class="jbtitle"><?php esc_html_e( 'Jobs', 'marketingops' ); ?></h6>
			<div class="agencyformgroup form-group">
				<input type="checkbox" id="include-jobs" <?php echo esc_attr( ( ! empty( $include_jobs ) && true === $include_jobs ) ? 'checked' : '' ); ?>>
				<label for="include-jobs"><?php esc_html_e( 'Include jobs posted by me to this page', 'marketingops' ); ?></label>
			</div>
		</section> 

		<section class="agencyformone">
			<ul class="agency-actions">
				<input type="hidden" id="agency-id" value="<?php echo esc_attr( $agency_id ); ?>">
				<li><a data-status="draft" href="javascript:void(0);" class="savedratbtn draft-agency"><?php esc_html_e( 'Save Draft', 'marketingops' ); ?></a></li>
				<li><a data-status="publish" href="javascript:void(0);" class="profilebtn publish-agency"><?php esc_html_e( 'Publish Profile', 'marketingops' ); ?></a></li>
			</ul>
		</section>
	</div>
	<?php
}
