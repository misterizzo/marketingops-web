<?php
/**
 * This file holds the custom ondemand scripts.
 */

function moc_get_active_paid_memberships( $user_memberships ) {
	// Loop through the membership plans.
	foreach ( $user_memberships as $plan ) {
		$expiry        = $plan->get_end_date();
		$assined_plans = array();

		if ( 'free-membership' === $plan->plan->slug && ! is_null( $expiry ) ) {
			$assined_plans[] = array(
				'name' => $plan->plan->name,
				'ends' => $expiry,
			);

			// Set the end date to empty.
			// $plan->set_end_date(''); // Empty string sets the membership to never expire.
			// var_dump( $plan->get_end_date() );
			// die("lkoo");
		}
	}

	return $assined_plans;
}

function mops_get_user_membership_details() {
	global $wpdb;
	$users_query = new WP_User_Query(
		array(
			'fields' => 'ids',
		)
	);
	$user_query_results = $users_query->get_results();

	// var_dump( count( $users_query->get_results() ) );

	// Return, if there are no users.
	if ( empty( $user_query_results ) || ! is_array( $user_query_results ) ) {
		return;
	}

	// $count = 0;

	// echo '<table style="border: 1px solid black;padding: 10px;">';
	// echo '<thead>';
	// echo '<tr>';
	// echo '<th style="border: 1px solid black;padding: 10px;">First Name</th>';
	// echo '<th style="border: 1px solid black;padding: 10px;">Last Name</th>';
	// echo '<th style="border: 1px solid black;padding: 10px;">Email</th>';
	// echo '<th style="border: 1px solid black;padding: 10px;">Active Memberships</th>';
	// echo '</tr>';
	// echo '</thead>';
	// echo '<body>';

	$user_memberships_arr = array();

	// Iterate through the response.
	foreach ( $user_query_results as $user_id ) {
		// Get the user memberships.
		$user_memberships = wc_memberships_get_user_memberships(
			$user_id,
			array(
				// 'status' => array( 'active' ),
				'status' => array( 'any' ),
			)
		);

		// Collect the user active paid memberships.
		$user_data        = $wpdb->get_row( "SELECT `user_email` FROM `wp_users` WHERE `ID` = {$user_id}", ARRAY_A );
		$membership_plans = moc_get_active_paid_memberships( $user_memberships, $user_data['user_email'] );

		if ( ! empty( $membership_plans ) ) {
			$user_memberships_arr[ $user_data['user_email'] ] = $membership_plans;
			
			// debug( $user_memberships_arr ); die;
		}

		// var_dump( $user_id );
		// debug( $membership_plans ); die;

		// If the memberships array is not empty, log them at a place.
		// if ( ! empty( $membership_plans ) && is_array( $membership_plans ) ) {
			// $count++;
			// $user_data = $wpdb->get_row( "SELECT `user_login`, `user_email`, `user_registered` FROM `wp_users` WHERE `ID` = {$user_id}", ARRAY_A );

			// echo 'ID: ' . $user_id . '<br />';
			// echo 'First Name: ' . get_user_meta( $user_id, 'first_name', true ) . '<br />';
			// echo 'Last Name: ' . get_user_meta( $user_id, 'last_name', true ) . '<br />';
			// echo 'Email: ' . $user_data['user_email'] . '<br />';
			// echo 'Membership: ' . implode( ',', $membership_plans ) . '<br />';
			// echo 'Username: ' . $user_data['user_login'] . '<br />';			
			// echo 'Registered Date: ' . $user_data['user_registered'] . '<br />';
			// echo '<br /><br />';

			// echo '<tr>';
			// echo '<td style="border: 1px solid black;padding: 10px;">' . get_user_meta( $user_id, 'first_name', true ) . '</td>';
			// echo '<td style="border: 1px solid black;padding: 10px;">' . get_user_meta( $user_id, 'last_name', true ) . '</td>';
			// echo '<td style="border: 1px solid black;padding: 10px;">' . $user_data['user_email'] . '</td>';
			// echo '<td style="border: 1px solid black;padding: 10px;">' . implode( ', ', $membership_plans ) . '</td>';
			// echo '</tr>';
		// }
	}

	// var_dump( count( $user_memberships_arr ) );
	// debug( $user_memberships_arr );
	// die;

	// echo '</tbody>';
	// echo '</table>';
	// die;
	// echo $count;
	// die("memberships loop completed");
}

// mops_get_user_membership_details();

function mops_update_podcasts_guests() {
	$posts_args  = moc_posts_query_args( 'podcast', 1, -1 );
	$posts_query = new WP_Query( $posts_args );

	// Return, if there are no posts.
	if ( empty( $posts_query->posts ) || ! is_array( $posts_query->posts ) ) {
		return;
	}

	$michael_hartmann = 4000; // This is the user ID.

	// Loop through the posts.
	foreach ( $posts_query->posts as $post_id ) {
		$guests = get_field( 'podcast_guest', $post_id );
		$guests = ( false === $guests || is_null( $guests ) ) ? array() : $guests;

		// If michael hartmann is not in the guests, add him.
		if ( false === array_search( $michael_hartmann, $guests, true ) ) {
			$guests[] = $michael_hartmann;
		}

		// Update the ACF field.
		// update_field( 'podcast_guest', $guests, $post_id );
	}

	die("all acf field updated");
}

// mops_update_podcasts_guests();

function mops_update_podcasts_titles() {
	global $wpdb;

	$podcast_titles = $wpdb->get_results( "SELECT `post_title`, `ID` FROM `wp_posts` WHERE `post_type` = 'podcast'", ARRAY_A );

	// If there aren't any podcast titles, return.
	if ( empty( $podcast_titles ) || ! is_array( $podcast_titles ) ) {
		return;
	}

	// Loop through the podcast titles.
	foreach ( $podcast_titles as $podcast_data ) {
		// Skip the podcasts if the title doesn't contain 'Ops Cast | '.
		if ( false === stripos( $podcast_data['post_title'], 'Ops Cast | ' ) ) {
			continue;
		}

		// Modify the title.
		$post_title = str_replace( 'Ops Cast | ', '', $podcast_data['post_title'] );

		// Update the post title.
		$wpdb->update(
			$wpdb->posts,
			array(
				'post_title' => $post_title,
			),
			array(
				'ID' => $podcast_data['ID'],
			)
		);
	}

	wp_die( 'podcasts updated' );
}

// mops_update_podcasts_titles();

/**
 * Fetch mosapalooza24 speakers.
 */
function fetch_mopza24_speakers() {
	// API Doc: https://sessionboard.stoplight.io/docs/sessionboard/1zjc8l9djyez6-getting-started

	$api_token            = '9bzYF5mj5yxgVrZSI9fbdZDL0dcrtaJKQTeZRc/eVpToFNn3R5oZVI8aRujeG3HcAWw3+QAwNI5rAhvIqAW7oTZmODIzZjY3LTFhYWQtNGU5Zi1hZTU4LTc5M2VhMzU3NGE5Yzk2Mzg2';
	$event_id             = 4630;

	$filters = new stdClass();
	$filters->filters = new stdClass();
	$filters->filters->status = 'accepted';
	$session_board_event_sessions_body = json_encode( $filters );

	$session_board_event_sessions      = wp_remote_post(
		add_query_arg(
			array(
				'page'     => 1,
			),
			"https://public-api.sessionboard.com/v1/event/{$event_id}/sessions/"
		),
		array(
			'method'      => 'POST',
			'timeout'     => 45,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array(
				'x-access-token' => $api_token,
				'Content-Type'   => 'application/json',
			),
			'body'        => $session_board_event_sessions_body,
			'cookies'     => array()
		)
	);

	$session_board_event_sessions_response_code = wp_remote_retrieve_response_code( $session_board_event_sessions );
	$session_board_event_sessions_response_body = wp_remote_retrieve_body( $session_board_event_sessions );

	// var_dump( $session_board_event_sessions_response_code );
	// debug( json_decode( $session_board_event_sessions_response_body ) );
	// die;
}

// fetch_mopza24_speakers();
