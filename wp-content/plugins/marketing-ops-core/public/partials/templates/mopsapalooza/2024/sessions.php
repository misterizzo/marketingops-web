<?php
/**
 * This file is used for templating the notifications.
 *
 * API Doc: https://sessionboard.stoplight.io/docs/sessionboard/1zjc8l9djyez6-getting-started
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/templates/notifications
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

// Check if the live sessions are requested.
$get_sessions = filter_input( INPUT_GET, 'sessions' );

if ( ! is_null( $get_sessions ) && 'live' === $get_sessions ) {
	delete_transient( 'mopza24_sessions' );
}

// Fetch the products data from the transient.
$sessions = get_transient( 'mopza24_sessions' );

// If there are no sessions in the transient.
if ( false === $sessions || empty( $sessions ) ) {
	// Get the sessions from the API.
	$sessions = fetch_mopza24_sessions(); // Shoot the API to get sessions.

	/**
	 * Store the response data in a cookie.
	 * This cookie data will be used to display the sessions on the mopza24 page.
	 * The transients will be stored for 24 hours.
	 */
	if ( false !== $sessions ) {
		set_transient( 'mopza24_sessions', wp_json_encode( $sessions ), ( 60 * 60 * 24 ) );
	}
} else {
	// If you're here, the data is already in transients.
	$sessions = json_decode( $sessions, true );
}

$sessions = ( ! empty( $sessions['results'] ) ) ? $sessions['results'] : array();

// If there are no sessions, print a message.
if ( ! empty( $sessions ) && is_array( $sessions ) ) {
	?>
	<div class="key_speaker_content apalooza_in_person_speakers_container mopza24">
		<h2 class="heading"><?php esc_html_e( 'SESSIONS', 'marketingops' ); ?></h3>
		<div class="key_speaker_container">
			<div class="key_speaker_row">
				<?php
				// Loop through the sessions.
				foreach ( $sessions as $session ) {
					// debug( $session );
					$session_id           = ( ! empty( $session['id'] ) ) ? $session['id'] : '';
					$session_friendly_id  = ( ! empty( $session['friendly_id'] ) ) ? $session['friendly_id'] : '';
					$session_title        = ( ! empty( $session['title'] ) ) ? $session['title'] : '';
					$session_description  = ( ! empty( $session['description'] ) ) ? $session['description'] : '';
					$session_speakers     = ( ! empty( $session['speakers'] ) ) ? $session['speakers'] : array();
					$session_speaker_data = '';
					?>
					<div class="key_speaker_box" data-session_id="<?php echo esc_attr( $session_id ); ?>" data-session_friendly_id="<?php echo esc_attr( $session_friendly_id ); ?>">
						<h5><a href="javascript:void(0);" class="popup_btn moc_open_speaker_session_details"><?php echo wp_kses_post( $session_title ); ?></a></h5>
						<div class="session_description" style="display: none;"><?php echo wp_kses_post( $session_description ); ?></div>
						<div class="key_speaker_details">
							<!-- Popup Button -->
							<div class="ks_button">
								<a href="javascript:void(0);" class="popup_btn button moc_open_speaker_session_details">
									<span class="text"><?php esc_html_e( 'View', 'marketingops' ); ?></span>
									<span class="svg_icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none"><path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path></svg></span>
								</a>
							</div>

							<?php if ( ! empty( $session_speakers ) && is_array( $session_speakers ) ) { ?>
								<!-- Speaker Details -->
								<div class="ks_details moc_open_speaker_session_details">
									<?php foreach ( $session_speakers as $speaker ) {
										$speaker_id          = ( ! empty( $speaker['id'] ) ) ? $speaker['id'] : '';
										$speaker_friendly_id = ( ! empty( $speaker['friendly_id'] ) ) ? $speaker['friendly_id'] : '';
										$speaker_name        = ( ! empty( $speaker['full_name'] ) ) ? $speaker['full_name'] : '';
										$speaker_photo_url   = ( ! empty( $speaker['photo_url'] ) ) ? $speaker['photo_url'] : get_field( 'moc_user_default_image', 'option' );
										$speaker_linkedin    = ( ! empty( $speaker['linkedin_url'] ) ) ? $speaker['linkedin_url'] : '';
										$speaker_twitter     = ( ! empty( $speaker['twitter_url'] ) ) ? $speaker['twitter_url'] : '';

										$session_speaker_data .= '<div class="speaker_details">';
										$session_speaker_data .= '<div class="speaker_img">';
										$session_speaker_data .= '<img src="' . $speaker_photo_url . '" alt="Profile picture of ' . $speaker_name . '" />';
										$session_speaker_data .= '</div>';
										$session_speaker_data .= '<div class="speaker_details_box">';
										$session_speaker_data .= '<div class="details_box">';
										$session_speaker_data .= '<h2>' . $speaker_name . '</h2>';
										// $session_speaker_data .= '<h5>Middesk&nbsp;•&nbsp;Revenue Operations &amp; Strategy</h5>';
										$session_speaker_data .= '</div>';
										$session_speaker_data .= '<div class="socail_icons">';

										if ( ! empty( $speaker_linkedin ) ) {
											$session_speaker_data .= '<a href="' . $speaker_linkedin . '" target="_blank"><svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="19" cy="19" r="19" fill="#1F2840"></circle><path d="M25.2104 11.3684H12.3007C11.5101 11.3684 10.8684 12.0101 10.8684 12.8007V25.7104C10.8684 26.501 11.5101 27.1427 12.3007 27.1427H25.2104C26.001 27.1427 26.6427 26.501 26.6427 25.7104V12.8007C26.6427 12.0101 26.001 11.3684 25.2104 11.3684ZM15.8528 24.2743H13.7406V17.4681H15.8528V24.2743ZM14.7757 16.4941C14.092 16.4941 13.542 15.9441 13.542 15.2642C13.542 14.5806 14.0958 14.0306 14.7757 14.0306C15.4556 14.0306 16.0094 14.5844 16.0094 15.2642C16.0094 15.9441 15.4556 16.4941 14.7757 16.4941ZM23.7781 24.2743H21.6622V20.9667C21.6622 20.176 21.6507 19.1601 20.566 19.1601C19.4622 19.1601 19.2941 20.0195 19.2941 20.9094V24.2743H17.182V17.4681H19.2101V18.4H19.2406C19.5195 17.8653 20.2108 17.3 21.2382 17.3C23.3809 17.3 23.7781 18.7094 23.7781 20.5427V24.2743Z" fill="white"></path></svg></a>';
										}

										if ( ! empty( $speaker_twitter ) ) {
											$session_speaker_data .= '<a href="' . $speaker_twitter . '" target="_blank"><svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="19" cy="19" r="19" fill="#1F2840"></circle><path d="M28.8465 14.3248C28.159 14.6303 27.4219 14.8366 26.6465 14.9282C27.4372 14.4546 28.0445 13.706 28.3309 12.8123C27.5899 13.2515 26.7726 13.5685 25.9018 13.7404C25.2028 12.9956 24.2097 12.5334 23.1097 12.5334C20.9976 12.5334 19.2827 14.2446 19.2827 16.3567C19.2827 16.6584 19.317 16.9487 19.382 17.2275C16.2042 17.0709 13.3854 15.547 11.4986 13.2324C11.1702 13.7977 10.983 14.4546 10.983 15.1574C10.983 16.4828 11.6552 17.6515 12.6827 18.339C12.0563 18.3199 11.4642 18.148 10.9486 17.8616C10.9486 17.8769 10.9486 17.8921 10.9486 17.9074C10.9486 19.7637 12.2702 21.3067 14.0195 21.6581C13.6986 21.7459 13.3587 21.7918 13.0111 21.7918C12.7629 21.7918 12.5261 21.7689 12.2931 21.723C12.7781 23.2432 14.1913 24.3508 15.8642 24.3814C14.5542 25.4088 12.908 26.0199 11.1129 26.0199C10.8073 26.0199 10.5017 26.0008 10.2 25.9664C11.8958 27.0512 13.9049 27.6814 16.0629 27.6814C23.0983 27.6814 26.9445 21.8567 26.9445 16.7998C26.9445 16.6355 26.9406 16.4713 26.9368 16.3071C27.6816 15.7647 28.3309 15.0925 28.8465 14.3248Z" fill="white"></path></svg></a>';
										}

										$session_speaker_data .= '</div>';
										$session_speaker_data .= '</div>';
										$session_speaker_data .= '</div>';
										?>
										<a href="javascript:void(0);" class="ks_link" data-speaker_id="<?php echo esc_attr( $speaker_id ); ?>" data-speaker_friendly_id="<?php echo esc_attr( $speaker_friendly_id ); ?>">
											<span class="ks_text"><?php echo wp_kses_post( $speaker_name ); ?></span>
											<span class="ks_img"><img decoding="async" src="<?php echo esc_url( $speaker_photo_url ); ?>" alt="Profile picture of <?php echo wp_kses_post( $speaker_name ); ?>" title="Profile picture of <?php echo wp_kses_post( $speaker_name ); ?>" /></span>
										</a>
									<?php } ?>
									<div class="popup_speaker_data" style="display: none;"><?php echo $session_speaker_data; ?></div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="loader_bg"><div class="loader"></div></div>
	</div>
	<?php
} else {
	?><p style="color: #fff;"><?php esc_html_e( 'There are no sessions fetched from API. Please contact the site administrator', 'marketingops' ); ?></p><?php
}
