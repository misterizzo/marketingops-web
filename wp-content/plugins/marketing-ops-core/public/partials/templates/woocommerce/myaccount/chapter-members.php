<?php
/**
 * My Orders - Deprecated
 *
 * @deprecated 2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

function get_members_directory( $country_code, $state_code, $metro_name, $user_id ) {
	// Find all the members that are from the locations where our chapter leader is from.
	$members_query_args                           = array();
	$members_query_args['fields']                 = 'ids';
	$members_query_args['exclude']                = array( $user_id );
	$members_query_args['meta_query']['relation'] = 'AND';
	$members_query_args['meta_query'][]           = array(
		'key'     => 'country',
		'value'   => $country_code,
		'compare' => '=',
	);

	// If the chapter leader current residing state is available.
	if ( ! empty( $state_code ) ) :
		$members_query_args['meta_query'][] = array(
			'key'     => 'state',
			'value'   => $state_code,
			'compare' => '=',
		);
	endif;

	// If the chapter leader current residing nearest metro is available.
	if ( ! empty( $metro_name ) ) :
		$members_query_args['meta_query'][] = array(
			'key'     => 'nearest_metro',
			'value'   => $metro_name,
			'compare' => '=',
		);
	endif;

	$members_query = new WP_User_Query( $members_query_args );

	return $members_query->get_results();
}

function get_members_directory_html( $members_from_chapter, $country_code, $state_code, $major_metro_name, $table_columns ) {
	$heading = sprintf( __( 'Members from %s, %s, %s', 'marketingops' ), $major_metro_name, $state_code, $country_code );

	ob_start();
	?>
	<h2><?php echo apply_filters( 'woocommerce_my_account_chapter_members_title', $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

	<?php if ( ! empty( $members_from_chapter ) && is_array( $members_from_chapter ) ) { ?>
		<div class="chapter-members-filter" style="display: none;">
			<input type="text" placeholder="<?php esc_attr_e( 'Search your favourite chapter members...', 'marketingops' ); ?>" />
			<input type="hidden" name="search_chapter_country" value="<?php echo esc_attr( $country ); ?>" />
			<input type="hidden" name="search_chapter_state" value="<?php echo esc_attr( $state ); ?>" />
			<input type="hidden" name="search_chapter_chapter_name" value="<?php echo esc_attr( $nearest_metro ); ?>" />
			<input type="hidden" name="search_chapter_current_user_id" value="<?php echo esc_attr( $user_id ); ?>" />
			<i class="search search-chapter-members"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></i>
		</div>
	<?php } ?>

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
			if ( ! empty( $members_from_chapter ) && is_array( $members_from_chapter ) ) {
				foreach ( $members_from_chapter as $member_id ) {
					$member_profile_url = get_author_posts_url( $member_id );
					$member_profession  = get_user_meta( $member_id, 'profetional_title', true );
					$member_experience  = get_user_meta( $member_id, 'experience_years', true );
					$member_first_name  = get_user_meta( $member_id, 'first_name', true );
					$member_last_name   = get_user_meta( $member_id, 'last_name', true );
					$member_data        = get_userdata( $member_id );
					$member_avatar_id   = get_user_meta( $member_id, 'wp_user_avatar', true );
					$member_avatar_url  = ( ! empty( $member_avatar_id ) ) ? wp_get_attachment_url( $member_avatar_id ) : $default_avatar;
					?>
					<tr class="order">
						<?php foreach ( $table_columns as $column_id => $column_name ) { ?>
							<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
								<?php if ( has_action( 'woocommerce_my_account_chapter_members_column_' . $column_id ) ) : ?>
									<?php do_action( 'woocommerce_my_account_chapter_members_column_' . $column_id, $order ); ?>

								<?php elseif ( 'picture' === $column_id ) : ?>
									<img src="<?php echo esc_url( $member_avatar_url ); ?>" alt="Mike Rizzo">

								<?php elseif ( 'name' === $column_id ) :
									echo esc_html( $member_first_name . ' ' . $member_last_name );
									?>

								<?php elseif ( 'email' === $column_id ) : ?>
									<?php echo ( ! empty( $member_data->data->user_email ) ? '<a href="mailto:' . esc_attr( $member_data->data->user_email ) . '">' . esc_html( $member_data->data->user_email ) . '</a>' : '' ); ?>

								<?php elseif ( 'profession' === $column_id ) : ?>
									<?php echo esc_html( $member_profession ); ?>

								<?php elseif ( 'experience' === $column_id ) : ?>
									<?php echo esc_html( $member_experience ) . ' years in the marketing industry!'; ?>

								<?php elseif ( 'actions' === $column_id ) : ?>
									<a href="<?php echo esc_url( $member_profile_url ); ?>" target="_blank" class="button <?php echo sanitize_html_class( $key ); ?>"><?php esc_html_e( 'Profile', 'marketingops' ); ?></a>
								<?php endif; ?>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr><td colspan="<?php echo count( $table_columns ); ?>"><?php esc_html_e( 'No members found residing around your chapter.', 'marketingops' ); ?></td></tr>
			<?php } ?>
		</tbody>
	</table>
	<?php

	return ob_get_clean();
}

// Get the chapter members.
$user_id         = get_current_user_id();
$major_metros    = get_field( 'major_metros', 'option' );
$assigned_metros = array();
$default_avatar  = get_field( 'moc_user_default_image', 'option' );
$table_columns   = apply_filters(
	'woocommerce_my_account_chapter_members_columns',
	array(
		'picture'    => '&nbsp;',
		'name'       => __( 'Name', 'woocommerce' ),
		'email'      => __( 'Email', 'woocommerce' ),
		'profession' => __( 'Profession', 'woocommerce' ),
		'experience' => __( 'Experience', 'woocommerce' ),
		'actions'    => __( 'Actions', 'woocommerce' ),
	)
);

// Loop through the major metros to get the metros where the current user has been assigned.
if ( ! empty( $major_metros ) && is_array( $major_metros ) ) {
	foreach ( $major_metros as $major_metro_key => $major_metros_data ) {
		$metros        = ( ! empty( $major_metros_data['metros'] ) && is_array( $major_metros_data['metros'] ) ) ? $major_metros_data['metros'] : false;
		$country_state = ( ! empty( $major_metros_data['country_code'] ) ) ? $major_metros_data['country_code'] : false;

		// Skip, if the metros are unavailable.
		if ( false === $metros ) {
			continue;
		}

		// If the metros data is available, find the metro where the current user is assigned.
		if ( ! empty( $metros ) && is_array( $metros ) ) {
			foreach ( $metros as $metro_key => $metro_data ) {
				// If the current user is assigned to this metro, store the metro data.
				if ( ! empty( $metro_data['chapter_leaders'] ) && is_array( $metro_data['chapter_leaders'] ) && in_array( $user_id, $metro_data['chapter_leaders'], true ) ) {
					$assigned_metros[ $country_state ][] = $metro_data['metro_name'];
				}
			}
		}
	}
}

// If there are assigned metros, show the member directory, else show an error message.
if ( ! empty( $assigned_metros ) && is_array( $assigned_metros ) ) {
	foreach ( $assigned_metros as $country_state_code => $major_metros ) {
		foreach ( $major_metros as $major_metro_name ) {
			$exploded_country_state = explode( ':', $country_state_code );
			$country_code           = ! empty( $exploded_country_state[0] ) ? $exploded_country_state[0] : '';
			$state_code             = ! empty( $exploded_country_state[1] ) ? $exploded_country_state[1] : '';
			$members_from_chapter   = get_members_directory( $country_code, $state_code, $major_metro_name, $user_id );
			$members_directory_html = get_members_directory_html( $members_from_chapter, $country_code, $state_code, $major_metro_name, $table_columns );
			echo $members_directory_html;
		}
	}
} else {
	// Show the error message here.
}
