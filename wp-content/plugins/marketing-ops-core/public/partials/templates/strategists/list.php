<?php
/**
 * Strategists listing template.
 *
 * This template can be overridden by copying it to yourtheme/marketing-ops-core/users/profile-setup.php.
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

// Fetch the category terms.
$strategists_cats = get_terms(
	array(
		'taxonomy'   => 'strategists_cat',
		'hide_empty' => true,
	)
);

// Fetch the strategists.
$current_category       = filter_input( INPUT_GET, 'cat' );
$posts_per_page         = ( ! empty( $args['number'] ) ) ? (int) $args['number'] : get_option( 'posts_per_page' );
$strategists_query_args = moc_posts_query_args( 'strategists', 1, $posts_per_page );
$strategists_query      = new WP_Query( $strategists_query_args );
$load_more_btn_text     = ( ! empty( $args['load_more_btn_text'] ) ) ? $args['load_more_btn_text'] : __( 'Show More Strategists', 'marketingops' );
?>
<div id="strategists_filter_container" class="ops-cat-filter">
	<?php if ( ! empty( $strategists_cats ) && is_array( $strategists_cats ) ) { ?>
		<div class="top-categories">
		<ul>
			<span><b><?php esc_html_e( 'Categories', 'marketingops' ); ?></b></span>
			<li class="<?php echo esc_html( ( is_null( $current_category ) ) ? 'active' : '' ); ?>"><a href="/strategists/" title="<?php esc_html_e( 'List all strategists.', 'marketingops' ); ?>"><?php esc_html_e( 'ALL', 'marketingops' ); ?></a></li>
			<?php foreach ( $strategists_cats as $strategists_cat ) {
				// Skip, if the category name is empty.
				if ( empty( $strategists_cat->name ) ) {
					continue;
				}
				?>
				<li class="<?php echo esc_html( ( ! is_null( $current_category ) && $strategists_cat->slug === $current_category ) ? 'active' : '' ); ?>"><a href="<?php echo esc_url( sprintf( __( '/strategists/?cat=%1$s#strategists_filter_container', 'marketingops' ), $strategists_cat->slug ) ); ?>" title="<?php echo esc_html( sprintf( __( 'Filter the strategists by %1$s', 'marketingops' ), $strategists_cat->name ) ); ?>"><?php echo esc_html( $strategists_cat->name . ' (' . $strategists_cat->count . ')' ); ?></a></li>
			<?php } ?>
			</ul>
		</div>
	<?php } ?>

	<!-- STRATEGISTS LISTING -->
	<?php if ( ! empty( $strategists_query->posts ) && is_array( $strategists_query->posts ) ) { ?>
		<div class="bottom-member-listing">
			<div class="box-wrap">
				<?php foreach ( $strategists_query->posts as $strategist_id ) {
					echo moc_strategists_box_inner_html( $strategist_id );
					?>
				<?php } ?>
			</div>
			<!-- LOAD MORE STRATEGISTS -->
			<?php if ( ! empty( $strategists_query->max_num_pages ) && 1 < $strategists_query->max_num_pages ) { ?>
				<div class="strategists-load-more-container">
					<a data-next="2" data-number="<?php echo esc_attr( $posts_per_page ); ?>" title="<?php echo wp_kses_post( $load_more_btn_text ); ?>" href="#"><?php echo wp_kses_post( $load_more_btn_text ); ?>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="14" height="10" viewBox="0 0 14 10" fill="none"><path d="M8.93456 0.905859C9.91438 0.905859 10.7215 1.71293 10.7215 2.69275L10.7214 7.06071L12.6828 5.09932C12.7384 5.04219 12.8049 4.99679 12.8783 4.96582C12.9518 4.93485 13.0307 4.91893 13.1104 4.919C13.2288 4.91915 13.3445 4.9546 13.4427 5.02082C13.5409 5.08705 13.6171 5.18105 13.6616 5.29081C13.7062 5.40056 13.7169 5.5211 13.6926 5.63702C13.6683 5.75293 13.61 5.85897 13.5251 5.94158L10.5469 8.91973C10.4352 9.03139 10.2838 9.09412 10.1258 9.09412C9.96787 9.09412 9.81639 9.03139 9.70469 8.91973L6.72654 5.94158C6.66937 5.88669 6.62373 5.82095 6.59229 5.74821C6.56085 5.67547 6.54424 5.59718 6.54343 5.51794C6.54263 5.43869 6.55764 5.36008 6.58759 5.28672C6.61755 5.21335 6.66184 5.14669 6.71788 5.09066C6.77391 5.03462 6.84057 4.99033 6.91393 4.96037C6.9873 4.93042 7.06591 4.91541 7.14515 4.91621C7.2244 4.91702 7.30268 4.93363 7.37543 4.96507C7.44817 4.99651 7.51391 5.04215 7.56879 5.09932L9.53019 7.06071L9.53019 2.69275C9.53019 2.35682 9.27049 2.09712 8.93456 2.09712L0.604087 2.09708C0.525159 2.0982 0.446797 2.08362 0.373553 2.05418C0.30031 2.02475 0.233644 1.98106 0.177435 1.92564C0.121225 1.87022 0.0765924 1.80418 0.0461272 1.73136C0.0156621 1.65854 -2.58082e-05 1.58039 -2.58013e-05 1.50145C-2.57944e-05 1.42251 0.0156622 1.34437 0.0461273 1.27155C0.0765924 1.19873 0.121225 1.13269 0.177435 1.07727C0.233644 1.02185 0.30031 0.97815 0.373553 0.948718C0.446797 0.919286 0.525159 0.904704 0.604087 0.90582L8.93456 0.905859Z" fill="white"></path></svg></a>
				</div>
				<div class="loader_bg"><div class="loader"></div></div>
			<?php } ?>
		</div>
	<?php } ?>
</div>
