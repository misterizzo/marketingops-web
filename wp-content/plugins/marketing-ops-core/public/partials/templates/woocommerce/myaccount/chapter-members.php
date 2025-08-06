<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

// Get the chapter members.
$user_id      = get_current_user_id();
$chapter_post_query = new WP_Query(
	array(
		'post_type'      => 'chapter',
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'fields'         => 'ids',
		'meta_query'     => array(
			array(
				'key'     => 'primary_leader',
				'value'   => $user_id,
				'compare' => '=',
			),
		),
	)
);
$chapter_post_id = ( ! empty( $chapter_post_query->posts[0] ) ) ? $chapter_post_query->posts[0] : 0;
$chapter_post_title = get_the_title( $chapter_post_id );
$heading          = sprintf( __( 'Chapter members from %s', 'marketingops' ), $chapter_post_title );
$chapter_location = ( 0 !== $chapter_post_id ) ? get_post_meta( $chapter_post_id, 'country_state_code', true ) : '';
$table_columns    = apply_filters(
	'woocommerce_my_account_chapter_members_columns',
	array(
		'picture' => '&nbsp;',
		'name'    => __( 'Name', 'woocommerce' ),
		'email'   => __( 'Email', 'woocommerce' ),
		'actions' => '&nbsp;',
	)
);

if ( false !== strpos( $chapter_location, ':' ) ) {
	$chapter_location_data = explode( ':', $chapter_location );
	$chapter_country_code           = isset( $chapter_location_data[0] ) ? $chapter_location_data[0] : '';
	$chapter_state_code             = isset( $chapter_location_data[1] ) ? $chapter_location_data[1] : '';
} else {
	$chapter_country_code = $chapter_location;
	$chapter_state_code  = '';
}

$chapter_members_query_args = array();
$chapter_members_query_args['fields'] = 'ids';
$chapter_members_query_args['meta_query']['relation'] = 'AND';
$chapter_members_query_args['meta_query'][] = array(
	'key'     => 'country',
	'value'   => $chapter_country_code,
	'compare' => '=',
);

if ( ! empty( $chapter_state_code ) ) {
	$chapter_members_query_args['meta_query'][] = array(
		'key'     => 'state',
		'value'   => $chapter_state_code,
		'compare' => '=',
	);
}
$chapter_members = new WP_User_Query( $chapter_members_query_args );

if ( $chapter_members->get_results() ) : ?>
	<h2><?php echo apply_filters( 'woocommerce_my_account_chapter_members_title', $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
	<table class="shop_table shop_table_responsive my_account_chapter_members">
		<thead>
			<tr>
				<?php foreach ( $table_columns as $column_id => $column_name ) : ?>
					<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php
			foreach ( $chapter_members->get_results() as $member_id ) :
				$chapter_member_first_name = get_user_meta( $member_id, 'first_name', true );
				$chapter_member_last_name  = get_user_meta( $member_id, 'last_name', true );
				$chapter_member_data       = get_userdata( $member_id );

				if ( '119.252.194.87' === $_SERVER['REMOTE_ADDR'] ) {
					debug( $chapter_member_data );
				}
				?>
				<tr class="order">
					<?php foreach ( $table_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_chapter_members_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_chapter_members_column_' . $column_id, $order ); ?>

							<?php elseif ( 'picture' === $column_id ) : ?>
								<img src="https://marketingops.com/wp-content/uploads/2024/12/Mike-Square20241209234031.png" alt="Mike Rizzo">

							<?php elseif ( 'name' === $column_id ) :
								echo esc_html( $chapter_member_first_name . ' ' . $chapter_member_last_name );
								?>

							<?php elseif ( 'email' === $column_id ) : ?>
								<?php echo 'adarsh.srmcem@gmail.com'; ?>

							<?php elseif ( 'actions' === $column_id ) : ?>
								<a href="/" class="button <?php echo sanitize_html_class( $key ); ?>"><?php esc_html_e( 'Check profile', 'marketingops' ); ?></a>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
