<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

// Get the chapter members.
$user_id            = get_current_user_id();
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
$chapter_post_id    = ( ! empty( $chapter_post_query->posts[0] ) ) ? $chapter_post_query->posts[0] : 0;
$chapter_post_title = get_the_title( $chapter_post_id );
$heading            = sprintf( __( 'Chapter members from %s', 'marketingops' ), $chapter_post_title );
$chapter_location   = ( 0 !== $chapter_post_id ) ? get_post_meta( $chapter_post_id, 'country_state_code', true ) : '';
$table_columns      = apply_filters(
	'woocommerce_my_account_chapter_members_columns',
	array(
		'picture' => '&nbsp;',
		'name'    => __( 'Name', 'woocommerce' ),
		'email'   => __( 'Email', 'woocommerce' ),
		'profession' => __( 'Profession', 'woocommerce' ),
		'experience' => __( 'Experience', 'woocommerce' ),
		'actions' => __( 'Actions', 'woocommerce' ),
	)
);

// Get the chapter location data.
if ( false !== strpos( $chapter_location, ':' ) ) {
	$chapter_location_data = explode( ':', $chapter_location );
	$chapter_country_code           = isset( $chapter_location_data[0] ) ? $chapter_location_data[0] : '';
	$chapter_state_code             = isset( $chapter_location_data[1] ) ? $chapter_location_data[1] : '';
} else {
	$chapter_country_code = $chapter_location;
	$chapter_state_code  = '';
}

// Get the chapter members.
$chapter_members_query_args                           = array();
$chapter_members_query_args['fields']                 = 'ids';
$chapter_members_query_args['meta_query']['relation'] = 'AND';
$chapter_members_query_args['meta_query'][]           = array(
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

$chapter_members    = new WP_User_Query( $chapter_members_query_args );
$default_author_img = get_field( 'moc_user_default_image', 'option' );

if ( $chapter_members->get_results() ) : ?>
	<h2><?php echo apply_filters( 'woocommerce_my_account_chapter_members_title', $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

	<div class="chapter-members-filter">
		<input type="text" placeholder="<?php esc_attr_e( 'Search your favourite chapter members...', 'marketingops' ); ?>" />
		<i class="search"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg></i>
	</div>
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
				// If the member is the current user, skip.
				if ( $member_id == $user_id ) {
					continue;
				}

				$chapter_member_profile_url = get_author_posts_url( $member_id );
				$chapter_member_profession  = get_user_meta( $member_id, 'profetional_title', true );
				$chapter_member_experience  = get_user_meta( $member_id, 'experience_years', true );
				$chapter_member_first_name  = get_user_meta( $member_id, 'first_name', true );
				$chapter_member_last_name   = get_user_meta( $member_id, 'last_name', true );
				$chapter_member_data        = get_userdata( $member_id );
				$chapter_member_avatar_id   = ( ! empty( get_user_meta( $member_id, 'wp_user_avatar', true ) ) ) ? get_user_meta( $member_id, 'wp_user_avatar', true ) : '';
				$chapter_member_avatar_url  = ( ! empty( $chapter_member_avatar_id ) ) ? get_post_meta( $chapter_member_avatar_id, '_wp_attached_file', true ) : '';
				$chapter_member_avatar_url  = ( ! empty( $chapter_member_avatar_url ) ) ?  $upload_url['baseurl'] . '/' . $chapter_member_avatar_url : $default_author_img;
				?>
				<tr class="order">
					<?php foreach ( $table_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_chapter_members_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_chapter_members_column_' . $column_id, $order ); ?>

							<?php elseif ( 'picture' === $column_id ) : ?>
								<img src="<?php echo esc_url( $chapter_member_avatar_url ); ?>" alt="Mike Rizzo">

							<?php elseif ( 'name' === $column_id ) :
								echo esc_html( $chapter_member_first_name . ' ' . $chapter_member_last_name );
								?>

							<?php elseif ( 'email' === $column_id ) : ?>
								<?php echo ( ! empty( $chapter_member_data->data->user_email ) ? '<a href="mailto:' . esc_attr( $chapter_member_data->data->user_email ) . '">' . esc_html( $chapter_member_data->data->user_email ) . '</a>' : '' ); ?>

							<?php elseif ( 'profession' === $column_id ) : ?>
								<?php echo esc_html( $chapter_member_profession ); ?>

							<?php elseif ( 'experience' === $column_id ) : ?>
								<?php echo esc_html( $chapter_member_experience ) . ' years'; ?>

							<?php elseif ( 'actions' === $column_id ) : ?>
								<a href="<?php echo esc_url( $chapter_member_profile_url ); ?>" target="_blank" class="button <?php echo sanitize_html_class( $key ); ?>"><?php esc_html_e( 'Profile', 'marketingops' ); ?></a>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
