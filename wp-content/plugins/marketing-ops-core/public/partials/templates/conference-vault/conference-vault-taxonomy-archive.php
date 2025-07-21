<?php
/**
 * Conference vault taxonomy archive template.
 *
 * This template can be overridden by copying it to activetheme/marketing-ops-core/conference-vault/conference-vault-taxonomy-archive.php
 *
 * @see         https://stage.marketingops.com/
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

$term_id          = get_queried_object()->term_id;
$taxonomy         = get_queried_object()->taxonomy;
$term_title       = get_field( 'term_title', "{$taxonomy}_{$term_id}" );
$video_query_args = moc_posts_query_args( 'conference_vault', 1, 16 );
$video_query      = new WP_Query( $video_query_args );
$pillars          = get_terms( // Get the pillars.
	array(
		'taxonomy'   => 'pillar',
		'hide_empty' => true,
	)
);

// Restrict the modal based on user active membership.
$user_memberships        = moc_get_membership_plan_slug();

if ( false === $user_memberships ) {
	$conference_vault_container_class = 'is-unregistered-member';
} elseif ( ! empty( $user_memberships ) && is_array( $user_memberships ) ) {
	$user_id                 = get_current_user_id();
	$access_conference_vault = get_user_meta( $user_id, 'moc_access_conference_vault', true );

	// If the user is allowed by the admin.
	if ( ! empty( $access_conference_vault ) && 'yes' === $access_conference_vault ) {
		$conference_vault_container_class = '';
	} else {
		if ( 1 === count( $user_memberships ) && in_array( 'free-membership', $user_memberships, true ) ) {
			$conference_vault_container_class = 'is-free-member';
		} elseif ( in_array( 'pro-plus-membership', $user_memberships, true ) ) {
			$conference_vault_container_class = 'is-pro-plus-member';
		} else {
			$conference_vault_container_class = 'is-other-membership-member';
		}
	}
}
?>
<section class="marketingopstemplatesconfernace conferencevaultevent elementor-section elementor-section-boxed" data-usersubscriptionclass="<?php echo esc_attr( $conference_vault_container_class ); ?>">
	<div class="margktingimgss"></div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="conferencevaultinner">
			<h1><?php echo wp_kses_post( $term_title ); ?></h1>
			<ul>
				<li>
					<a href="/conference-vault/" title="<?php esc_html_e( 'Conference Vault', 'marketingops' ); ?>">
						<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none"><g clip-path="url(#clip0_26_136)"><path d="M4.97479 2.50043C5.21176 2.49132 5.43164 2.62689 5.52848 2.84335C5.62646 3.05982 5.58431 3.31274 5.42025 3.48591L3.62817 5.42268H14.9081C15.1189 5.41926 15.3137 5.52977 15.4197 5.71205C15.5268 5.8932 15.5268 6.11877 15.4197 6.29992C15.3137 6.4822 15.1189 6.59271 14.9081 6.5893H3.62817L5.42025 8.52607C5.56608 8.67873 5.61735 8.89747 5.55583 9.09912C5.4943 9.30077 5.32911 9.45344 5.12404 9.49901C4.91783 9.54458 4.70365 9.47508 4.56352 9.319L1.5 6.00599L4.56352 2.69297C4.66833 2.57676 4.81757 2.50613 4.97479 2.50043Z" fill="url(#paint0_linear_26_136)"/></g><defs><linearGradient id="paint0_linear_26_136" x1="15.8302" y1="6.02333" x2="-6.76765" y2="6.02333" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient><clipPath id="clip0_26_136"><rect width="15" height="10" fill="white" transform="matrix(-1 0 0 1 15.5 0.5)"/></clipPath></defs></svg></i>&nbsp;<?php esc_html_e( 'Back', 'marketingops' ); ?>
					</a>
				</li>
				<li><?php echo esc_html( sprintf( _n( '%s session', '%s sessions', $video_query->found_posts, 'marketingops' ), number_format_i18n( $video_query->found_posts ) ) ); ?></li>
				<li style="visibility:hidden;">
					<a href="/conference-vault/" title="<?php esc_html_e( 'Conference Vault', 'marketingops' ); ?>">
						<i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none"><g clip-path="url(#clip0_26_136)"><path d="M4.97479 2.50043C5.21176 2.49132 5.43164 2.62689 5.52848 2.84335C5.62646 3.05982 5.58431 3.31274 5.42025 3.48591L3.62817 5.42268H14.9081C15.1189 5.41926 15.3137 5.52977 15.4197 5.71205C15.5268 5.8932 15.5268 6.11877 15.4197 6.29992C15.3137 6.4822 15.1189 6.59271 14.9081 6.5893H3.62817L5.42025 8.52607C5.56608 8.67873 5.61735 8.89747 5.55583 9.09912C5.4943 9.30077 5.32911 9.45344 5.12404 9.49901C4.91783 9.54458 4.70365 9.47508 4.56352 9.319L1.5 6.00599L4.56352 2.69297C4.66833 2.57676 4.81757 2.50613 4.97479 2.50043Z" fill="url(#paint0_linear_26_136)"/></g><defs><linearGradient id="paint0_linear_26_136" x1="15.8302" y1="6.02333" x2="-6.76765" y2="6.02333" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient><clipPath id="clip0_26_136"><rect width="15" height="10" fill="white" transform="matrix(-1 0 0 1 15.5 0.5)"/></clipPath></defs></svg></i><?php esc_html_e( 'Prev', 'marketingops' ); ?>	
			   		</a>
				</li>
		 	</ul>
	  	</div>
	</div>
	<div class="elementor-container elementor-column-gap-default">
		<!-- Check if the pillars are available. -->
		<?php if ( ! empty( $pillars ) && is_array( $pillars ) ) { ?>
			<div class="blog_articles">
				<div class="elementor-container elementor-column-gap-default">
					<div class="categories_tags articled_container conference_pillars_filter">
						<div class="tag_box text_box"><?php esc_html_e( 'Pillars', 'marketingops' ); ?></div>
						<input type="hidden" id="conf_taxonomy" value="conference" data-term="<?php echo esc_attr( $term_id ); ?>" />
						<button data-termid="-1" class="tag_box moc_all_tags moc_selected_taxonomy single_pillar"><?php esc_html_e( 'ALL', 'marketingops' ); ?></button>

						<!-- Loop thorugh the pillars -->
						<?php foreach ( $pillars as $pillar_term ) { ?>
							<button data-termid="<?php echo esc_attr( $pillar_term->term_id ); ?>" class="tag_box single_pillar"><?php echo wp_kses_post( $pillar_term->name ); ?></button>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="conferencevaultinner_innerright_inner">
			<?php if ( ! empty( $video_query->posts ) && is_array( $video_query->posts ) ) { ?>
				<ul>
					<?php
					// Loop through the conference video posts.
					foreach ( $video_query->posts as $post_id ) {
						echo moc_conference_vault_video_box_html( $post_id ); // Print the conference video post.
					}
					?>
				</ul>
			<?php } ?>

			<?php if ( 1 < $video_query->max_num_pages ) { ?>
				<!-- Load More -->
				<div class="confernceloadmore">
					<div class="confernceloadmoreinner">
						<input type="hidden" id="current_page" value="1" />
						<input type="hidden" id="prev_page" value="0" />
						<input type="hidden" id="next_page" value="2" />
						<input type="hidden" id="max_pages" value="<?php echo esc_attr( $video_query->max_num_pages ); ?>" />
						<button type="button"><?php esc_html_e( 'Load More', 'marketingops' ); ?></button>
					</div>
				</div>
			<?php } ?>

			<div class="loader_bg">
				<div class="loader"></div>
			</div>
		</div>
	</div>
	<!-- This is what will be included inside the popup -->	
</section>

<?php
get_footer();
