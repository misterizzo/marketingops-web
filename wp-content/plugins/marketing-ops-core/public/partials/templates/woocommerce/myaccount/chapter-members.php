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
$nearest_metro      = get_user_meta( $user_id, 'nearest_metro', true );
$country            = get_user_meta( $user_id, 'country', true );
$state              = get_user_meta( $user_id, 'state', true );

// Find all the members that are from the locations where our chapter leader is from.
$members_query_args                           = array();
$members_query_args['fields']                 = 'ids';
$members_query_args['exclude']                = array( $user_id );
$members_query_args['meta_query']['relation'] = 'AND';
$members_query_args['meta_query'][]           = array(
	'key'     => 'country',
	'value'   => $country,
	'compare' => '=',
);

// If the chapter leader current residing state is available.
if ( ! empty( $state ) ) :
	$members_query_args['meta_query'][] = array(
		'key'     => 'state',
		'value'   => $state,
		'compare' => '=',
	);
endif;

// If the chapter leader current residing nearest metro is available.
if ( ! empty( $nearest_metro ) ) :
	$members_query_args['meta_query'][] = array(
		'key'     => 'nearest_metro',
		'value'   => $nearest_metro,
		'compare' => '=',
	);
endif;

$members        = new WP_User_Query( $members_query_args );
$heading        = sprintf( __( 'Members from %s, %s, %s', 'marketingops' ), $nearest_metro, $state, $country );
$default_avatar = get_field( 'moc_user_default_image', 'option' );
$table_columns  = apply_filters(
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
?>
<h2><?php echo apply_filters( 'woocommerce_my_account_chapter_members_title', $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>

<?php if ( $members->get_results() ) : ?>
	<div class="chapter-members-filter" style="display: none;">
		<input type="text" placeholder="<?php esc_attr_e( 'Search your favourite chapter members...', 'marketingops' ); ?>" />
		<input type="hidden" name="search_chapter_country" value="<?php echo esc_attr( $country ); ?>" />
		<input type="hidden" name="search_chapter_state" value="<?php echo esc_attr( $state ); ?>" />
		<input type="hidden" name="search_chapter_chapter_name" value="<?php echo esc_attr( $nearest_metro ); ?>" />
		<input type="hidden" name="search_chapter_current_user_id" value="<?php echo esc_attr( $user_id ); ?>" />
		<i class="search search-chapter-members"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></i>
	</div>
<?php endif; ?>

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
		if ( $members->get_results() ) :
			foreach ( $members->get_results() as $member_id ) :
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
					<?php foreach ( $table_columns as $column_id => $column_name ) : ?>
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
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr><td colspan="<?php echo count( $table_columns ); ?>"><?php esc_html_e( 'No members found residing around your chapter.', 'marketingops' ); ?></td></tr>
		<?php endif; ?>
	</tbody>
</table>
<?php

// Nearby chapters.
$major_metros                = get_field( 'major_metros', 'option' );
$major_metros_country_states = ( ! empty( $major_metros ) && is_array( $major_metros ) ) ? array_column( $major_metros, 'country_code' ) : array();
$to_find_country_state_code  = '';

if ( ! empty( $country ) && ! empty( $state ) ) :
	$to_find_country_state_code = $country . ':' . $state;
elseif ( ! empty( $country ) ) :
	$to_find_country_state_code = $country;
elseif ( ! empty( $state ) ) :
	$to_find_country_state_code = $state;
endif;

// Current chapter index from major metros.
$current_chapter_index = array_search( $to_find_country_state_code, $major_metros_country_states );

// Find the near chapters.
$current_chapter_data   = ( isset( $major_metros[ $current_chapter_index ] ) && ! empty( $major_metros[ $current_chapter_index ] ) ) ? $major_metros[ $current_chapter_index ] : array();
$current_chapter_metros = ( ! empty( $current_chapter_data['metros'] ) ? $current_chapter_data['metros'] : array() );
$nearby_chapters_index  = array_search( $nearest_metro, array_column( $current_chapter_metros, 'metro_name' ) );
$nearby_chapters_string = ( ! empty( $current_chapter_metros[ $nearby_chapters_index ]['nearby_metros'] ) ) ? $current_chapter_metros[ $nearby_chapters_index ]['nearby_metros'] : '';

if ( ! empty( $nearby_chapters_string ) ) :
	$nearby_chapters = explode( ',', $nearby_chapters_string );

	if ( ! empty( $nearby_chapters ) && is_array( $nearby_chapters ) ) :
		// Loop through the nearby chapters.
		foreach ( $nearby_chapters as $nearby_chapter_key => $nearby_chapter ) :
			// Trim the unwanted spaces.
			$nearby_chapter = trim( $nearby_chapter );

			// Find all the members that are from the nearby chapters.
			$members_query_args                           = array();
			$members_query_args['fields']                 = 'ids';
			$members_query_args['exclude']                = array( $user_id );
			$members_query_args['meta_query']['relation'] = 'AND';
			$members_query_args['meta_query'][]           = array(
				'key'     => 'country',
				'value'   => $country,
				'compare' => '=',
			);
			$members_query_args['meta_query'][]           = array(
				'key'     => 'nearest_metro',
				'value'   => $nearby_chapter,
				'compare' => '=',
			);

			// If the chapter leader current residing state is available.
			if ( ! empty( $state ) ) :
				$members_query_args['meta_query'][] = array(
					'key'     => 'state',
					'value'   => $state,
					'compare' => '=',
				);
			endif;

			$members = new WP_User_Query( $members_query_args );
			$heading = sprintf( __( 'Members from %s, %s, %s', 'marketingops' ), $nearby_chapter, $state, $country );

			// If the members from nearby chapters are available.
			if ( $members->get_results() ) : ?>
				<h2 class="nearby-chapter-<?php echo esc_attr( $nearby_chapter_key ); ?>"><?php echo apply_filters( 'woocommerce_my_account_chapter_members_title', $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
				<div class="chapter-members-filter" style="display: none;">
					<input type="text" class="chapter-member-directory-keyword" placeholder="<?php esc_attr_e( 'Search your favourite chapter members...', 'marketingops' ); ?>" />
					<input type="hidden" name="search_chapter_country" value="<?php echo esc_attr( $country ); ?>" />
					<input type="hidden" name="search_chapter_state" value="<?php echo esc_attr( $state ); ?>" />
					<input type="hidden" name="search_chapter_chapter_name" value="<?php echo esc_attr( $nearby_chapter ); ?>" />
					<input type="hidden" name="search_chapter_current_user_id" value="<?php echo esc_attr( $user_id ); ?>" />
					<i class="search search-chapter-members"><svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></i>
				</div>
				<div class="loader_bg"></div>
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
						foreach ( $members->get_results() as $member_id ) :
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
								<?php foreach ( $table_columns as $column_id => $column_name ) : ?>
									<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
										<?php if ( has_action( 'woocommerce_my_account_chapter_members_column_' . $column_id ) ) : ?>
											<?php do_action( 'woocommerce_my_account_chapter_members_column_' . $column_id, $order ); ?>

										<?php elseif ( 'picture' === $column_id ) : ?>
											<img src="<?php echo esc_url( $member_avatar_url ); ?>" alt="<?php echo esc_html( $member_first_name . ' ' . $member_last_name ); ?>">

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
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
						
					</tbody>
				</table>
			<?php
			endif;
		endforeach;
	endif;
endif;
