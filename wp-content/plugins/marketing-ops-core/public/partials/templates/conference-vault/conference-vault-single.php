<?php
/**
 * Conference vault details page template.
 *
 * This template can be overridden by copying it to activetheme/marketing-ops-core/conference-vault/conference-vault-single.php
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

// Get the header first.
get_header();

$session_title      = get_the_title();
$session_id         = get_the_ID();
$session_by         = get_field( 'session_author', $session_id );
$session_link       = get_field( 'vimeo_video_url', $session_id );
$conference_term    = wp_get_object_terms( $session_id, 'conference' );
$conference         = ( ! empty( $conference_term[0]->name ) ) ? $conference_term[0]->name : '';
$back_link          = ( ! empty( $conference_term[0]->term_id ) ) ? get_term_link( $conference_term[0]->term_id ) : '';
$session_content    = get_the_content();
$session_chatscript = get_field( 'session_chatscript', $session_id );
$video_attachments  = get_field( 'attachments', $session_id );

// Content restrictions.
$enable_restriction              = get_field( 'enable_restriction', $session_id );
$restricted_for                  = get_field( 'restricted_for', $session_id );
$required_membership_level_ids   = ( ! empty( $restricted_for['woocommerce_membership_level'] ) ) ? $restricted_for['woocommerce_membership_level'] : '';
$required_membership_level_slugs = array();
$popup_content                   = ( ! empty( $restricted_for['popup_content'] ) ) ? $restricted_for['popup_content'] : array();
$popup_headline                  = ( ! empty( $restricted_for['popup_content']['headline'] ) ) ? $restricted_for['popup_content']['headline'] : '';
$popup_description               = ( ! empty( $restricted_for['popup_content']['description'] ) ) ? $restricted_for['popup_content']['description'] : '';
$popup_button_title              = ( ! empty( $restricted_for['popup_content']['button_link']['title'] ) ) ? $restricted_for['popup_content']['button_link']['title'] : '';
$popup_button_url                = ( ! empty( $restricted_for['popup_content']['button_link']['url'] ) ) ? $restricted_for['popup_content']['button_link']['url'] : '';
$popup_footer_text_not_loggedin  = ( ! empty( $restricted_for['popup_content']['footer_text'] ) ) ? $restricted_for['popup_content']['footer_text'] : '';
$popup_footer_text_loggedin      = ( ! empty( $restricted_for['popup_content']['footer_text_logged_in'] ) ) ? $restricted_for['popup_content']['footer_text_logged_in'] : '';

// Loop through the membership level IDs.
if ( ! empty( $required_membership_level_ids ) && is_array( $required_membership_level_ids ) ) {
	// Loop through the membership level IDs and convert them to slugs.
	foreach ( $required_membership_level_ids as $required_membership_level_id ) {
		$required_membership_level_slugs[] = get_post_field( 'post_name', $required_membership_level_id );
	}
}

// Get more sessions from the same conference.
if ( ! empty( $conference_term[0]->taxonomy ) ) {
	$same_conference_videos_query = moc_get_conference_videos(
		'conference_vault',
		1,
		3,
		array(
			'taxonomy' => $conference_term[0]->taxonomy,
			'field'    => 'term_id',
			'terms'    => array( $conference_term[0]->term_id ),
		),
		''
	);
	$same_conference_video_ids    = ( ! empty( $same_conference_videos_query->posts ) ) ? $same_conference_videos_query->posts : '';
}

// Check if the other conferences have videos.
$other_conferences_args            = array(
	'taxonomy'   => 'conference',
	'hide_empty' => true,
);
$other_conferences_args['exclude'] = ( ! empty( $conference_term[0]->term_id ) ) ? array( $conference_term[0]->term_id ) : array();
$other_conferences                 = array_values( get_terms( $other_conferences_args ) );

// Get sessions from other conference.
if ( ! empty( $other_conferences[0]->taxonomy ) ) {
	$other_conference_videos_query = moc_get_conference_videos(
		'conference_vault',
		1,
		3,
		array(
			'taxonomy' => $other_conferences[0]->taxonomy,
			'field'    => 'term_id',
			'terms'    => array( $other_conferences[0]->term_id ),
		),
		''
	);
	$other_conference_video_ids    = ( ! empty( $other_conference_videos_query->posts ) ) ? $other_conference_videos_query->posts : '';
}
?>
<section class="marketingopstemplatesconfernace conferencevaultevent conferencevaulteventdetails presentation elementor-section elementor-section-boxed">
	<textarea style="display: none;" id="hidden-enable-restriction-<?php echo esc_attr( $session_id ); ?>"><?php echo esc_attr( ( true === $enable_restriction ) ? 1 : 0 ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-headline-<?php echo esc_attr( $session_id ); ?>"><?php echo wp_kses_post( $popup_headline ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-description-<?php echo esc_attr( $session_id ); ?>"><?php echo wp_kses_post( $popup_description ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-button-title-<?php echo esc_attr( $session_id ); ?>"><?php echo wp_kses_post( $popup_button_title ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-button-url-<?php echo esc_attr( $session_id ); ?>"><?php echo wp_kses_post( $popup_button_url ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-footer-text-not-loggedin-<?php echo esc_attr( $session_id ); ?>"><?php echo wp_kses_post( $popup_footer_text_not_loggedin ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-footer-text-loggedin-<?php echo esc_attr( $session_id ); ?>"><?php echo wp_kses_post( $popup_footer_text_loggedin ); ?></textarea>
	<textarea style="display: none;" id="hidden-popup-required-membership-levels-<?php echo esc_attr( $session_id ); ?>"><?php echo json_encode( $required_membership_level_slugs ); ?></textarea>
	<div class="margktingimgss"></div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="conferencevaultinner">
			<h1><span><?php echo wp_kses_post( $session_title ); ?></span></h1>
			<ul>
				<?php if ( ! empty( $back_link ) ) { ?>
					<li>
						<a href="<?php echo esc_url( $back_link ); ?>">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none"><g clip-path="url(#clip0_26_136)"><path d="M4.97479 2.50043C5.21176 2.49132 5.43164 2.62689 5.52848 2.84335C5.62646 3.05982 5.58431 3.31274 5.42025 3.48591L3.62817 5.42268H14.9081C15.1189 5.41926 15.3137 5.52977 15.4197 5.71205C15.5268 5.8932 15.5268 6.11877 15.4197 6.29992C15.3137 6.4822 15.1189 6.59271 14.9081 6.5893H3.62817L5.42025 8.52607C5.56608 8.67873 5.61735 8.89747 5.55583 9.09912C5.4943 9.30077 5.32911 9.45344 5.12404 9.49901C4.91783 9.54458 4.70365 9.47508 4.56352 9.319L1.5 6.00599L4.56352 2.69297C4.66833 2.57676 4.81757 2.50613 4.97479 2.50043Z" fill="url(#paint0_linear_26_136)"/></g><defs><linearGradient id="paint0_linear_26_136" x1="15.8302" y1="6.02333" x2="-6.76765" y2="6.02333" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient><clipPath id="clip0_26_136"><rect width="15" height="10" fill="white" transform="matrix(-1 0 0 1 15.5 0.5)"/></clipPath></defs></svg></i>
							<?php esc_html_e( 'Back', 'marketingops' ); ?>
						</a>
					</li>
				<?php } ?>
				<li><?php echo esc_html( sprintf( __( 'by %1$s, %2$s conference', 'marketingops' ), $session_by, $conference ) ); ?></li>
				
				<?php if ( ! empty( $back_link ) ) { ?>
					<li style="visibility:hidden;">
						<a href="<?php echo esc_url( $back_link ); ?>">
							<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none"><g clip-path="url(#clip0_26_136)"><path d="M4.97479 2.50043C5.21176 2.49132 5.43164 2.62689 5.52848 2.84335C5.62646 3.05982 5.58431 3.31274 5.42025 3.48591L3.62817 5.42268H14.9081C15.1189 5.41926 15.3137 5.52977 15.4197 5.71205C15.5268 5.8932 15.5268 6.11877 15.4197 6.29992C15.3137 6.4822 15.1189 6.59271 14.9081 6.5893H3.62817L5.42025 8.52607C5.56608 8.67873 5.61735 8.89747 5.55583 9.09912C5.4943 9.30077 5.32911 9.45344 5.12404 9.49901C4.91783 9.54458 4.70365 9.47508 4.56352 9.319L1.5 6.00599L4.56352 2.69297C4.66833 2.57676 4.81757 2.50613 4.97479 2.50043Z" fill="url(#paint0_linear_26_136)"/></g><defs><linearGradient id="paint0_linear_26_136" x1="15.8302" y1="6.02333" x2="-6.76765" y2="6.02333" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient><clipPath id="clip0_26_136"><rect width="15" height="10" fill="white" transform="matrix(-1 0 0 1 15.5 0.5)"/></clipPath></defs></svg></i>
							<?php esc_html_e( 'Prev', 'marketingops' ); ?>
						</a>
					</li>
				<?php } ?>
			</ul>

			<div class="conference-session-details">
				<?php echo wp_kses_post( $session_content ); ?>
			</div>

			<!-- SESSION VIDEO -->
			<?php if ( ! empty( $session_link ) ) { ?>
				<div class="elementor-wrapper elementor-open-inline">
					<iframe class="elementor-video-iframe" allowfullscreen="" allow="clipboard-write" title="vimeo Video Player" src="<?php echo esc_url( $session_link ); ?>?color&amp;autopause=0&amp;loop=0&amp;muted=0&amp;title=1&amp;portrait=1&amp;byline=1&amp;h=427b06ed1e#t="></iframe> 
				</div>
			<?php } ?>
			
			<!-- ATTACHMENTS -->
			<?php if ( ! empty( $video_attachments ) && is_array( $video_attachments ) ) { ?>
				<section class="attechmentwithtext">	
					<h3><?php esc_html_e( 'Attachments', 'marketingops' ); ?>:</h3>
					<ul>
						<?php foreach ( $video_attachments as $video_attachment ) {
							$attachment_file_id = ( ! empty( $video_attachment['video_attachment'] ) ) ? $video_attachment['video_attachment'] : '';

							// Skip, if the file ID is not available.
							if ( empty( $attachment_file_id ) ) {
								continue;
							}

							$attachment_file_url  = wp_get_attachment_url( $attachment_file_id );
							$attachment_file_name = basename( get_attached_file( $attachment_file_id ) );
							?>
							<li>
								<a href="#" class="vault-video-attachment" data-attachment-url="<?php echo esc_url( $attachment_file_url ); ?>">
									<i class="attechmenticon"><svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.98535 0.986435C8.72031 0.99032 8.46764 1.09927 8.28288 1.28934C8.09812 1.47941 7.99637 1.73506 8 2.00011V11.586L6.70703 10.2931C6.61373 10.1972 6.50212 10.121 6.37883 10.0689C6.25554 10.0169 6.12307 9.99022 5.98926 9.99034C5.79041 9.99059 5.59615 10.0501 5.43129 10.1613C5.26643 10.2725 5.13846 10.4303 5.06372 10.6146C4.98898 10.7988 4.97088 11.0012 5.01171 11.1958C5.05255 11.3904 5.15047 11.5684 5.29297 11.7071L8.29297 14.7071C8.48051 14.8946 8.73483 14.9999 9 14.9999C9.26517 14.9999 9.51949 14.8946 9.70703 14.7071L12.707 11.7071C12.803 11.615 12.8796 11.5046 12.9324 11.3825C12.9852 11.2604 13.0131 11.1289 13.0144 10.9959C13.0158 10.8629 12.9906 10.7309 12.9403 10.6077C12.89 10.4845 12.8156 10.3726 12.7216 10.2785C12.6275 10.1845 12.5156 10.1101 12.3924 10.0598C12.2692 10.0095 12.1373 9.98431 12.0042 9.98567C11.8712 9.98702 11.7397 10.0149 11.6176 10.0677C11.4955 10.1205 11.3851 10.1971 11.293 10.2931L10 11.586V2.00011C10.0018 1.8664 9.97683 1.73369 9.92647 1.60981C9.87611 1.48594 9.80143 1.37342 9.70683 1.27891C9.61223 1.1844 9.49964 1.10983 9.37572 1.05959C9.25179 1.00935 9.11906 0.984478 8.98535 0.986435ZM3 6.50011C1.35498 6.50011 0 7.85509 0 9.50011V16.0001C0 17.6451 1.35498 19.0001 3 19.0001H15C16.645 19.0001 18 17.6451 18 16.0001V9.50011C18 7.85509 16.645 6.50011 15 6.50011H13.5C13.3675 6.49823 13.2359 6.52271 13.113 6.57213C12.99 6.62154 12.8781 6.6949 12.7837 6.78795C12.6893 6.88099 12.6144 6.99186 12.5632 7.11412C12.5121 7.23638 12.4858 7.36758 12.4858 7.50011C12.4858 7.63263 12.5121 7.76384 12.5632 7.88609C12.6144 8.00835 12.6893 8.11922 12.7837 8.21227C12.8781 8.30531 12.99 8.37867 13.113 8.42809C13.2359 8.4775 13.3675 8.50198 13.5 8.50011H15C15.564 8.50011 16 8.93612 16 9.50011V16.0001C16 16.5641 15.564 17.0001 15 17.0001H3C2.43602 17.0001 2 16.5641 2 16.0001V9.50011C2 8.93612 2.43602 8.50011 3 8.50011H4.5C4.63251 8.50198 4.76407 8.4775 4.88704 8.42809C5.01001 8.37867 5.12193 8.30531 5.2163 8.21227C5.31067 8.11922 5.38561 8.00835 5.43676 7.88609C5.4879 7.76384 5.51424 7.63263 5.51424 7.50011C5.51424 7.36758 5.4879 7.23638 5.43676 7.11412C5.38561 6.99186 5.31067 6.88099 5.2163 6.78795C5.12193 6.6949 5.01001 6.62154 4.88704 6.57213C4.76407 6.52271 4.63251 6.49823 4.5 6.50011H3Z" fill="url(#paint0_linear_16684_26024)"/><defs><linearGradient id="paint0_linear_16684_26024" x1="-0.424595" y1="10.0367" x2="28.6298" y2="10.0367" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
									<?php echo esc_html( $attachment_file_name ); ?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</section>
			<?php } ?>
			<!-- ATTACHMENTS -->

			<!-- CHAT SCRIPT -->
			<?php if ( ! empty( $session_chatscript ) ) { ?>
				<div class="conference-session-transcript">
					<?php echo wp_kses_post( $session_chatscript ); ?>
				</div>
			<?php } ?>

			<?php if ( ! empty( $same_conference_video_ids ) && is_array( $same_conference_video_ids ) ) { ?>
				<div class="conferencevaultinner_inner sessions-from-same-conference">
					<div class="conferencevaultinner_innerright">
						<div class="conferencevaultinner_innerright_inner">
							<h3><?php echo esc_html( sprintf( __( 'More from %1$s', 'marketingops' ), $conference ) ); ?></h3>
							<ul>
								<?php
								foreach ( $same_conference_video_ids as $video_id ) {
									echo moc_conference_vault_video_box_html( $video_id ); // Print the conference video post.
								} ?>
							</ul>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php if ( ! empty( $other_conference_video_ids ) && is_array( $other_conference_video_ids ) ) { ?>
				<div class="conferencevaultinner_inner sessions-from-other-conference">
					<div class="conferencevaultinner_innerright">
						<div class="conferencevaultinner_innerright_inner">
							<h3><?php echo esc_html( sprintf( __( 'Sessions from %1$s', 'marketingops' ), $other_conferences[0]->name ) ); ?></h3>
							<ul>
								<?php
								foreach ( $other_conference_video_ids as $video_id ) {
									echo moc_conference_vault_video_box_html( $video_id ); // Print the conference video post.
								} ?>
							</ul>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php
get_footer();
