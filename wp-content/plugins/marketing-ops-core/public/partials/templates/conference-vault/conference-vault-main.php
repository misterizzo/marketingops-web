<?php
/**
 * Conference vault listing template.
 *
 * This template can be overridden by copying it to activetheme/marketing-ops-core/conference-vault/conference-vault-main.php
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

$page_id                  = get_the_ID(); // Get the page ID.
$pillars                  = get_terms( // Get the pillars.
	array(
		'taxonomy'   => 'pillar',
		'hide_empty' => true,
	)
);
$conferences              = get_terms( // Get the conferences.
	array(
		'taxonomy'   => 'conference',
		'hide_empty' => true,
	)
);
$skill_levels             = get_terms( // Get the skill levels.
	array(
		'taxonomy'   => 'conference_skill_level',
		'hide_empty' => true,
	)
);

// Check if the terms are in the URL.
$get_conference             = filter_input( INPUT_GET, 'conference', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$get_pillar                 = filter_input( INPUT_GET, 'pillar', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$get_conference_skill_level = filter_input( INPUT_GET, 'conference_skill_level', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$get_search                 = filter_input( INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$get_search                 = ( ! is_null( $get_search ) ) ? $get_search : '';

if ( ( ! is_null( $get_conference ) ) || ( ! is_null( $get_pillar ) ) || ( ! is_null( $get_conference_skill_level ) ) ) {
	$get_conference             = ( ! is_null( $get_conference ) ) ? explode( '|', $get_conference ) : array();
	$get_pillar                 = ( ! is_null( $get_pillar ) ) ? explode( '|', $get_pillar ) : array();
	$get_conference_skill_level = ( ! is_null( $get_conference_skill_level ) ) ? explode( '|', $get_conference_skill_level ) : array();
	$merged_terms               = array();
	$terms_from_pillar          = array();
	$terms_from_conference      = array();
	$terms_from_skill_level     = array();

	// Loop through the conference taxonomy to collect the term IDs.
	if ( ! empty( $get_conference ) && is_array( $get_conference ) ) {
		foreach ( $get_conference as $term_slug ) {
			$conference_term         = get_term_by( 'slug', $term_slug, 'conference' );
			$merged_terms[]          = $conference_term->term_id;
			$terms_from_conference[] = $conference_term->term_id;
		}
	}

	// Loop through the pillar taxonomy to collect the term IDs.
	if ( ! empty( $get_pillar ) && is_array( $get_pillar ) ) {
		foreach ( $get_pillar as $term_slug ) {
			$pillar_term         = get_term_by( 'slug', $term_slug, 'pillar' );
			$merged_terms[]      = $pillar_term->term_id;
			$terms_from_pillar[] = $pillar_term->term_id;
		}
	}

	// Loop through the conference_skill_level taxonomy to collect the term IDs.
	if ( ! empty( $get_conference_skill_level ) && is_array( $get_conference_skill_level ) ) {
		foreach ( $get_conference_skill_level as $term_slug ) {
			$conference_skill_level_term = get_term_by( 'slug', $term_slug, 'conference_skill_level' );
			$merged_terms[]              = $conference_skill_level_term->term_id;
			$terms_from_skill_level[]    = $conference_skill_level_term->term_id;
		}
	}
} else {
	$terms_from_pillar        = get_post_meta( $page_id, 'select_pillar', true ); // Get the terms from which the videos should be shown.
	$terms_from_pillar        = ( ! empty( $terms_from_pillar ) && is_array( $terms_from_pillar ) ) ? array_map( 'intval', $terms_from_pillar ) : array();
	$terms_from_conference    = get_post_meta( $page_id, 'select_conference', true );
	$terms_from_conference    = ( ! empty( $terms_from_conference ) && is_array( $terms_from_conference ) ) ? array_map( 'intval', $terms_from_conference ) : array();
	$terms_from_skill_level   = get_post_meta( $page_id, 'select_skill_level', true );
	$terms_from_skill_level   = ( ! empty( $terms_from_skill_level ) && is_array( $terms_from_skill_level ) ) ? array_map( 'intval', $terms_from_skill_level ) : array();
	$merged_terms             = array_merge( $terms_from_conference, $terms_from_pillar, $terms_from_skill_level ); // Merge all the terms.
}
?>
<section class="marketingopstemplatesconfernace conferencevault elementor-section elementor-section-boxed">
	<div class="margktingimgss"></div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="conferencevaultinner">
			<h1><?php echo wp_kses_post( get_the_title( $page_id ) ); ?></h1>
			<h3><?php esc_html_e( 'The complete archive of MarketingOps thought leadership, from conference keynotes to member workshops. All in one place — exclusively for MarketingOps members.', 'marketingops' ); ?></h3>
		</div>
	</div>
	<div class="elementor-container elementor-column-gap-default">
		<div class="conferencevaultinner_inner">
			<div class="conferencevaultinner_innerleft">
				<div class="elementor-shortcode">
					<?php if ( ! empty( $conferences ) && is_array( $conferences ) ) { ?>
						<!-- CONFERENCES -->
						<div class="common_filter_row conference_tax_filters">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="directory_search_form">
									<div class="expandableCollapsibleDiv platform_section">
										<h3 class="open"><?php esc_html_e( 'Conference', 'marketingops' ); ?></h3>
										<ul class="moc_training_filters" data-taxonomy="conference">
											<?php foreach ( $conferences as $conference ) {
												$conference_checked = ( in_array( $conference->term_id, $terms_from_conference, true ) ) ? 'checked' : '';
												?>
												<li>
													<input <?php echo esc_attr( $conference_checked ); ?> id="<?php echo esc_attr( $conference->slug ); ?>" type="checkbox" name="<?php echo esc_attr( $conference->taxonomy ); ?>" value="<?php echo esc_attr( $conference->term_id ); ?>">
													<label for="<?php echo esc_attr( $conference->slug ); ?>"><?php echo esc_html( $conference->name ); ?></label>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<?php if ( ! empty( $pillars ) && is_array( $pillars ) ) { ?>
						<!-- PILLARS -->
						<div class="common_filter_row conference_tax_filters">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="directory_search_form">
									<div class="expandableCollapsibleDiv platform_section">
										<h3 class="open"><?php esc_html_e( 'Pillar', 'marketingops' ); ?></h3>
										<ul class="moc_training_filters" data-taxonomy="pillar">
											<?php foreach ( $pillars as $pillar ) {
												$pillar_checked = ( in_array( $pillar->term_id, $terms_from_pillar, true ) ) ? 'checked' : '';
												?>
												<li>
													<input <?php echo esc_attr( $pillar_checked ); ?> id="<?php echo esc_attr( $pillar->slug ); ?>" type="checkbox" name="<?php echo esc_attr( $pillar->taxonomy ); ?>" value="<?php echo esc_attr( $pillar->term_id ); ?>">
													<label for="<?php echo esc_attr( $pillar->slug ); ?>"><?php echo esc_html( $pillar->name ); ?></label>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					
					<?php if ( ! empty( $skill_levels ) && is_array( $skill_levels ) ) { ?>
						<!-- SKILL LEVELS -->
						<div class="common_filter_row conference_tax_filters">
							<div class="elementor-widget-wrap elementor-element-populated">
								<div class="directory_search_form">
									<div class="expandableCollapsibleDiv platform_section">
										<h3 class="open"><?php esc_html_e( 'Skill Level', 'marketingops' ); ?></h3>
										<ul class="moc_training_filters" data-taxonomy="conference_skill_level">
											<?php foreach ( $skill_levels as $skill_level ) {
												$skill_level_checked = ( in_array( $skill_level->term_id, $terms_from_skill_level, true ) ) ? 'checked' : '';
												?>
												<li>
													<input <?php echo esc_attr( $skill_level_checked ); ?> id="<?php echo esc_attr( $skill_level->slug ); ?>" type="checkbox" name="<?php echo esc_attr( $skill_level->taxonomy ); ?>" value="<?php echo esc_attr( $skill_level->term_id ); ?>">
													<label for="<?php echo esc_attr( $skill_level->slug ); ?>"><?php echo esc_html( $skill_level->name ); ?></label>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="common_filter_row">
						<div class="elementor-widget-wrap elementor-element-populated">
							<div class="directory_search_form mainsidbarsearch">
								<div class="platform_section">
									<h3 class="open"><?php esc_html_e( 'Search', 'marketingops' ); ?></h3>
									<div class="moc_input_field">
										<input type="text" id="search_keywords" name="conference_main_search_keyword" placeholder="E.g.: Revenue" value="<?php echo esc_html( ( ! is_null( $get_search ) ? $get_search : '' ) ); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- IF THERE ARE MERGED TERMS -->
			<?php
			if ( ! empty( $merged_terms ) && is_array( $merged_terms ) ) {
				?><div class="conferencevaultinner_innerright"><?php
					echo moc_conference_vault_main_html( $merged_terms, $get_search );
				?></div><?php
			}
			?>
		</div>

		<!-- AJAX LOADER -->
		<div class="loader_bg"><div class="loader"></div></div>
	</div>
</section>
<?php get_footer();
