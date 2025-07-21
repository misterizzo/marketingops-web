<?php
// if ( '183.82.162.9' === $_SERVER['REMOTE_ADDR'] ) {
// 	error_reporting(E_ALL);
// 	ini_set('display_errors', 1);
// }

add_filter( 'auto_update_theme', '__return_false' );
add_filter( 'auto_update_plugin', '__return_false' );

/**
 * Setup Child Theme Styles
 */
function built_by_hello_enqueue_styles() {
	wp_localize_script( 'ajax_url', 'ajax_url', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	wp_enqueue_style( 'built_by_hello-style', get_stylesheet_directory_uri() . '/style.css', false, gmdate( 'Ymdhis' ) );

	if ( is_page( 'mopsapalooza24' ) || is_page( 'mopsapalooza23' ) ) {
		wp_enqueue_style( 'built-mopsapaloozacss', get_stylesheet_directory_uri() . '/css/mopsapalooza.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_script( 'main-js-mopsapalooza', get_stylesheet_directory_uri() . '/js/mopsapalooza.js', array(), '1.0.9', true );
	} else if ( is_page( 'startup-land23' ) ) {
		wp_enqueue_style( 'built-start-up', get_stylesheet_directory_uri() . '/css/start_up.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_script( 'main-js-start-up', get_stylesheet_directory_uri() . '/js/start_up.js', array(), '1.0.9', true );
	} else {
		wp_enqueue_style( 'built_maincss', get_stylesheet_directory_uri() . '/css/main.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_style( 'slick_hello-style', get_stylesheet_directory_uri() . '/css/slick.min.css', false, '1.0.6' );
		wp_enqueue_script( 'script-name', get_stylesheet_directory_uri() . '/js/slick.min.js', array(), '1.0.6', true );

		wp_enqueue_style( 'range_hello-style', get_stylesheet_directory_uri() . '/css/ion.rangeSlider.min.css', false, '1.0.6' );
		wp_enqueue_style( 'gradient-global-style', get_stylesheet_directory_uri() . '/css/gradient_global.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_style( 'moc-design-one-style', get_stylesheet_directory_uri() . '/css/moc-design-one.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_style( 'moc-design-two-style', get_stylesheet_directory_uri() . '/css/moc-design-two.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_style( 'moc-media-style', get_stylesheet_directory_uri() . '/css/media.css', false, gmdate( 'Ymdhis' ) );

		// New Homepage CSS
		wp_enqueue_style( 'moc-new-home-style', get_stylesheet_directory_uri() . '/css/new_home.css', false, gmdate( 'Ymdhis' ) );
		wp_enqueue_style( 'moc-new-home-media-style', get_stylesheet_directory_uri() . '/css/new_home_media.css', false, gmdate( 'Ymdhis' ) );

		wp_enqueue_script( 'range-name', get_stylesheet_directory_uri() . '/js/ion.rangeSlider.min.js', array(), '1.0.6', true );
		wp_enqueue_script( 'main-js-name', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ),  gmdate( 'Ymdhis' ), true );
		wp_localize_script( 'main-js-name', 'Child_Theme_Main_JS',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	if ( is_page('profile' ) || is_page( 'post-new' ) ) {
		wp_enqueue_style( 'profile-popup-style', get_stylesheet_directory_uri() . '/css/profile_popup.css', false, gmdate( 'Ymdhis' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'built_by_hello_enqueue_styles', 20 );


function custom_post_type() {
	$args = array(
		'public'    => true,
		'label'     => __( 'Resources', 'hello' ),
		'menu_icon' => 'dashicons-book',
		'supports'  => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
	);
	register_post_type( 'resource', $args );

	$args = array(
		'public'    => true,
		'label'     => __( 'Podcasts', 'textdomain' ),
		'menu_icon' => 'dashicons-podio',
		'supports'  => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'author' ),
	);
	register_post_type( 'podcast', $args );
}
add_action( 'init', 'custom_post_type' );


add_filter( 'submit_job_form_fields', 'frontend_add_salary_field' );
/**
 * Submit job form.
 */
function frontend_add_salary_field( $fields ) {
	$fields['job']['job_min_salary'] = array(
		'label'       => __( 'Min Salary ($)', 'job_manager' ),
		'type'        => 'text',
		'required'    => true,
		'placeholder' => 'e.g. 20000',
		'priority'    => 7,
	);
	$fields['job']['job_max_salary'] = array(
		'label'       => __( 'Max Salary ($)', 'job_manager' ),
		'type'        => 'text',
		'required'    => true,
		'placeholder' => 'e.g. 20000',
		'priority'    => 7,
	);
	$fields['company']['company_website']['placeholder'] = 'https://';
	return $fields;
}

add_filter( 'job_manager_job_listing_data_fields', 'admin_add_salary_field' );
/**
 * Filter job form.
 */
function admin_add_salary_field( $fields ) {
	unset( $fields['_job_salary'] );
	$fields['_job_min_salary'] = array(
		'label'       => __( 'Min Salary ($)', 'job_manager' ),
		'type'        => 'text',
		'placeholder' => 'e.g. 20000',
		'description' => '',
	);
	$fields['_job_max_salary'] = array(
		'label'       => __( 'Max Salary ($)', 'job_manager' ),
		'type'        => 'text',
		'placeholder' => 'e.g. 20000',
		'description' => '',
	);
	return $fields;
}


/**
 * Truncate a string but end with complete word.
 */
function truncate( $str, $len ) {
	$tail   = max( 0, $len - 10 );
	$trunk  = substr( $str, 0, $tail );
	$trunk .= strrev( preg_replace( '~^..+?[\s,:]\b|^...~', '...', strrev( substr( $str, $tail, $len - $tail ) ) ) );
	return $trunk;
}

/******************** Member Directory */

// add_action( 'wp_ajax_nopriv_members_ajax_call', 'members_ajax_call' );
// add_action( 'wp_ajax_members_ajax_call', 'members_ajax_call' );
/**
 * Ajax for members and filters.
 */
function members_ajax_call() {
	/*
	$nonce            = wp_create_nonce( 'my-nonce' );
	$search_term      = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['search_term'] ) ) ? sanitize_text_field( wp_unslash( $_POST['search_term'] ) ) : '';
	$current_page     = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['paged'] ) ) ? sanitize_text_field( wp_unslash( $_POST['paged'] ) ) : 1;
	$categories       = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['category'] ) ) ? wp_unslash( $_POST['category'] ) : '';
	$experiences      = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['experience'] ) ) ? sanitize_text_field( wp_unslash( $_POST['experience'] ) ) : '';
	$experience_years = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['experience_years'] ) ) ? sanitize_text_field( wp_unslash( $_POST['experience_years'] ) ) : '';
	$roles            = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['roles'] ) ) ? sanitize_text_field( wp_unslash( $_POST['roles'] ) ) : '';
	$skills           = ( wp_verify_nonce( $nonce ) && ! empty( $_POST['skills'] ) ) ? sanitize_text_field( wp_unslash( $_POST['skills'] ) ) : '';*/

	$search_term      = ( ! empty( $_POST['search_term'] ) ) ? sanitize_text_field( $_POST['search_term'] ) : '';
	$current_page     = ( ! empty( $_POST['paged'] ) ) ? sanitize_text_field( $_POST['paged'] ) : 1;
	$categories       = ( ! empty( $_POST['category'] ) ) ? $_POST['category'] : '';
	$experiences      = ( ! empty( $_POST['experience'] ) ) ? $_POST['experience'] : '';
	$experience_years = ( ! empty( $_POST['experience_years'] ) ) ? $_POST['experience_years'] : '';
	$roles            = ( ! empty( $_POST['roles'] ) ) ? $_POST['roles'] : '';
	$skills           = ( ! empty( $_POST['skills'] ) ) ? $_POST['skills'] : '';
	$sortby           = ( ! empty( $_POST['sortby'] ) ) ? $_POST['sortby'] : 'ASC';

	$upload_dir     = wp_upload_dir();
	$users_per_page = 10;

	$result = '';
	// WP_User_Query arguments.
	$args = array(
		'order'          => $sortby,
		'orderby'        => 'ID', // 'display_name',
		'posts_per_page' => max( 1, $users_per_page ),
		'number'         => $users_per_page,
		'offset'         => ( $current_page - 1 ) * $users_per_page,
	);

	if ( ! empty( $search_term ) ) {
		$args['search'] = esc_attr( $search_term ) . '*'; // '*'.
	}

	if ( ! empty( $categories ) || ! empty( $experiences ) || ! empty( $experience_years ) || ! empty( $roles ) || ! empty( $skills ) ) {
		$args['meta_query']['relation'] = 'OR';
	}

	if ( ! empty( $skills ) ) {

		foreach ( $skills as $skill ) {
			$args['meta_query'][] = array(
				'key'     => 'skills',
				'value'   => $skill,
				'compare' => 'LIKE',
			);
		}
	}

	if ( ! empty( $categories ) ) {

		foreach ( $categories as $category ) {
			$args['meta_query'][] = array(
				'key'     => 'category',
				'value'   => $category,
				'compare' => 'LIKE',
			);
		}
	}

	if ( ! empty( $experiences ) ) {
		foreach ( $experiences as $experience ) {
			$args['meta_query'][] = array(
				'key'     => 'experience',
				'value'   => $experience,
				'compare' => 'LIKE',
			);
		}
	}

	if ( ! empty( $roles ) ) {
		foreach ( $roles as $role ) {
			$args['meta_query'][] = array(
				'key'     => 'role_level',
				'value'   => $role,
				'compare' => 'LIKE',
			);
		}
	}

	if ( ! empty( $experience_years ) ) {
		foreach ( $experience_years as $experience_year ) {
			switch ( $experience_year ) {
				case '15+':
					$args['meta_query'][] = array(
						'key'     => 'experience_years',
						'value'   => '15',
						'compare' => '>=',
						'type'    => 'NUMERIC',
					);
					break;
				default:
					$args['meta_query'][] = array(
						'key'     => 'experience_years',
						'value'   => array_map( 'absint', explode( '-', $experience_year ) ),
						'compare' => 'BETWEEN',
						'type'    => 'NUMERIC',
					);
					break;
			}
		}
	}
	$wp_user_query = new WP_User_Query( $args );
	$authors       = $wp_user_query->get_results();
	$total_users   = $wp_user_query->get_total(); // How many users we have in total (beyond the current page).
	$num_pages     = ceil( $total_users / $users_per_page ); // How many pages of users we will need.

	if ( $total_users < $users_per_page ) {
		$users_per_page = $total_users; }

	if ( ! empty( $authors ) ) {
		foreach ( $authors as $author ) {
			$author_info       = get_userdata( $author->ID );
			$profile_url       = ppress_get_frontend_profile_url( $author->ID );
			$description       = get_user_meta( $author->ID, 'description', true );
			$experience_years  = get_user_meta( $author->ID, 'experience_years', true );
			$experience        = get_user_meta( $author->ID, 'experience', true );
			$short_title       = get_user_meta( $author->ID, 'short_title', true );
			$pp_uploaded_files = get_user_meta( $author->ID, 'pp_uploaded_files', true );

			if ( $experience_years > 1 ) {
				$experience_years = $experience_years . ' years';
			} elseif ( 1 === $experience_years ) {
				$experience_years = $experience_years . ' year';
			}

			$experiences = '';
			if ( ! empty( $experience ) ) {
				$experiences = implode( ',', $experience );
			}
			$result .=
			'<li>
				<div class="memberleft">
					<a class="profileimg" href="' . $profile_url . '">' . do_shortcode( "[pp-user-avatar user='" . $author->ID . "' size=96 original=true]" ) . '
					</a>';
			if ( $pp_uploaded_files ) {
				$user_logo = $upload_dir['baseurl'] . '/pp-files/' . $pp_uploaded_files['logo'];
				$result   .= '<img class="profiletype" src="' . $user_logo . '" width="" height="" alt="" />';
			}

				$result .= '
				</div>
				
				<div class="memberright">
					<a class="profileimg" href="' . $profile_url . '"><h3>' . $author->display_name . '</h3></a>
					<div class="memberposition">' . $short_title . '</div>
					<div class="memberexcerpt">' . truncate( $description, 150 ) . '</div>
					<div class="membermeta">
						<span class="pleft">';
			if ( ! empty( $experience_years ) ) {
				$result .= '<img class="meta_img" src="' . get_stylesheet_directory_uri() . '/images/timer.png" width="" height="" alt="" /> ' . $experience_years;
			}
						$result .= '</span><span class="pright">';
			if ( ! empty( $experience ) ) {
				$result .= '<img class="meta_img" src="' . get_stylesheet_directory_uri() . '/images/target.png" width="" height="" alt="" /> <div class="experiencemeta">' . $experiences . '</div>';
			}
					$result .= '</span>
					</div>
				</div>
			</li>';

		}

		$end_size      = 3;
		$mid_size      = 3;
		$max_num_pages = $num_pages;
		$start_pages   = range( 1, $end_size );
		$end_pages     = range( $max_num_pages - $end_size + 1, $max_num_pages );
		$mid_pages     = range( $current_page - $mid_size, $current_page + $mid_size );
		$pages         = array_intersect( range( 1, $max_num_pages ), array_merge( $start_pages, $end_pages, $mid_pages ) );

		$result .= '<nav class="member-directory-pagination"><ul>';
		if ( $current_page && $current_page > 1 ) :
			$result .= '<li><a href="#" class="arrowleft" data-page="' . esc_attr( $current_page - 1 ) . '">&larr;</a></li>';
				endif;

		foreach ( $pages as $page ) {
			if ( intval( $prev_page ) !== intval( $page ) - 1 ) {
				$result .= '<li><span class="gap">...</span></li>';
			}
			if ( intval( $current_page ) === intval( $page ) ) {
				$result .= '<li><span class="current" data-page="' . esc_attr( $page ) . '">' . esc_html( $page ) . '</span></li>';
			} else {
				$result .= '<li><a href="#" data-page="' . esc_attr( $page ) . '">' . esc_html( $page ) . '</a></li>';
			}
			$prev_page = $page;
		}

		if ( $current_page && $current_page < $max_num_pages ) :
			$result .= '<li><a href="#" class="arrowright" data-page="' . esc_attr( $current_page + 1 ) . '">&rarr;</a></li>';
				endif;

		$result .= '</ul></nav>';

	} else {
		$result = 'No authors found';
	}
	echo wp_json_encode(
		array(
			'success'     => 'success',
			'result'      => $result,
			'total_users' => $total_users,
		)
	);
	wp_die();
}


add_shortcode( 'member_directory', 'member_directory' );
/**
 * Shortcode use for members display.
 */
function member_directory() {
	ob_start();
	?>
	<ul class="members_directory"></ul>
	<?php
	$out2 = ob_get_contents();
	ob_end_clean();

	return $out2;
}



add_shortcode( 'member_search', 'member_search' );
/**
 * Shortcode for members search form.
 */
function member_search( $atts ) {
	global $wpdb;
	ob_start();
	echo '<div class="directory_search_form">';

	$atts = shortcode_atts(
		array(
			'key'       => '',
			'limit'     => 10,
			'searchbar' => 'false',
		),
		$atts,
		'member_search'
	);

	if ( ! empty( $atts['key'] ) ) {
		$keyarray  = explode( ',', $atts['key'] );
		$fieldkeys = implode( '","', $keyarray );

		$input_fields_array = array( 'text', 'password', 'email', 'tel', 'number', 'hidden' );
		$sql                = 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields ';
		$sql               .= 'where field_key IN( "' . $fieldkeys . '" )';

		$results = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields where id>=%d AND field_key IN( "' . $fieldkeys . '" )', array( 1 ) ) );
		foreach ( $results as $result ) {
			$key  = $result->field_key;
			$type = $result->type;
			if ( 'checkbox' === $type ) {
				echo '<div class="expandableCollapsibleDiv"><h3 class="open">' . esc_attr( htmlspecialchars_decode( $result->label_name ) ) . '</h3>';
				$checkbox_values  = array_map( 'trim', explode( ',', $result->options ) );
				$checkbox_tag_key = "{$key}[]";

				if ( $checkbox_values ) {
					echo '<ul>';
					foreach ( $checkbox_values as $i => $checkbox_value ) {
						echo sprintf( '<li><input id="%1$s" type="checkbox" name="%2$s" value="%1$s" /> <label for="%1$s">%1$s</label></li>', esc_attr( $checkbox_value ), esc_attr( $checkbox_tag_key ), esc_attr( $checkbox_value ) );

						if ( $i >= $atts['limit'] ) {
							break;
						}
					}

					if ( 'experience' === $key ) {
						echo '<li><input type="checkbox" name="" value="" checked="checked" id="member_any_exp"> <label for="member_any_exp">Any</label></li>';
					}

					echo '</ul></div>';
				}
			} elseif ( 'experience_years' === $key ) {
				echo '<div class="expandableCollapsibleDiv"><h3 class="open">Years of experience</h3>	
					<ul>		
						<li><input type="checkbox" name="experience_years[]" value="0-1" id="0-1"><label for="0-1">0-1 years</label></li>
						<li><input type="checkbox" name="experience_years[]" value="2-5" id="2-5"><label for="2-5">2-5 years</label></li>
						<li><input type="checkbox" name="experience_years[]" value="6-9" id="6-9"><label for="6-9">6-9 years</label></li>
						<li><input type="checkbox" name="experience_years[]" value="10-14" id="10-14"><label for="10-14">10-14 years</label></li>
						<li><input type="checkbox" name="experience_years[]" value="15+" id="15+"><label for="15+">15+ years</label></li>
					</ul></div>';

			} elseif ( 'role_level' === $key ) {
				$result_roles = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'usermeta where meta_key=%s LIMIT ' . $atts['limit'], array( 'role_level' ) ) );
				if ( $result_roles ) {
					echo '<div class="expandableCollapsibleDiv"><h3 class="open">Role level</h3>';
					echo '<ul>';
					foreach ( $result_roles as $result_role ) {
						if ( ! empty( $result_role->meta_value ) ) {
							echo '<li><input type="checkbox" name="role_level[]" id="' . esc_attr( $result_role->meta_value ) . '" value="' . esc_attr( $result_role->meta_value ) . '"><label for="' . esc_attr( $result_role->meta_value ) . '">' . esc_attr( $result_role->meta_value ) . '</label></li>';
						}
					}
					echo '</ul></div>';
				}
			} elseif ( 'skills' === $key ) {
				$result_skills = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'usermeta where meta_key=%s LIMIT ' . $atts['limit'], array( 'skills' ) ) );
				if ( $result_skills ) {
					echo '<div class="expandableCollapsibleDiv"><h3 class="open">Skills</h3>';
					echo '<ul>';
					foreach ( $result_skills as $result_skill ) {
						if ( ! empty( $result_skill->meta_value ) ) {
							echo '<li><input type="checkbox" name="skills[]" id="' . esc_attr( $result_skill->meta_value ) . '" value="' . esc_attr( $result_skill->meta_value ) . '"><label for="' . esc_attr( $result_skill->meta_value ) . '">' . esc_attr( $result_skill->meta_value ) . '</label></li>';
						}
					}
					echo '</ul></div>';
				}
			} elseif ( in_array( $type, $input_fields_array, true ) ) {
				echo '<h3>' . esc_attr( htmlspecialchars_decode( $result->label_name ) ) . '</h3>';
				echo '<input type="' . esc_attr( $type ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="" class="regular-text"/>';
			}
		}
	}
	if ( 'true' === $atts['searchbar'] ) {
		?>
		<form class="member-search-form" role="search" action="" method="post">
			<div class="member_directory_container">
				<div class="moc_input_field">
					<input placeholder="" class="member-search-form__input" type="search" id="member_s" name="member_s" title="Search" value="">
					<div class="moc_members_count_value_div">
						<span class="moc_jobs_search_keyword">Search...</span>
						<span class="moc_members_count_value number_of_search moc_jobs_count_value"><?php echo esc_html( $fouded_posts_text ); ?></span>
					</div>
				</div>
				<button class="member_search_form__submit" type="submit" title="Search" aria-label="Search">Search</button>
			</div>
		</form>
		<?php
	}
	echo '</div>';
	$out2 = ob_get_contents();
	ob_end_clean();
	return $out2;
}

add_action( 'admin_menu', 'admin_menu_jobs', 12 );
/**
 * Quick filter menu item in job listing.
 */
function admin_menu_jobs() {
		add_submenu_page( 'edit.php?post_type=job_listing', __( 'Quick Filter', 'wp-job-manager' ), __( 'Quick Filter', 'wp-job-manager' ), 'manage_options', 'job-quick-filter', 'quick_filter_jobs' );
}

/**
 * Actual code for quick filter values in admin.
 */
function quick_filter_jobs() {
	global $wpdb;

	$nonce             = wp_create_nonce( 'my-nonce' );
	$filter_list_array = array();
	if ( wp_verify_nonce( $nonce ) && isset( $_POST['form_submitted'] ) ) {
		foreach ( $_POST as $key => $value ) {
			$filter_list_array[ $key ] = $value;
		}
		update_option( 'quick_filter_list', $filter_list_array );
	}

	$saved_list_array = get_option( 'quick_filter_list' );
	$max_filters      = isset( $saved_list_array['max_filters'] ) ? $saved_list_array['max_filters'] : '';
	$quick_options    = array();
	$profile_fields   = array();
	$filterrow        = '';
	$results          = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE id>=%d AND type IN ("select", "checkbox")', array( 1 ) ) );
	?>
	<h3>Quick Filter</h3>
	<form action="" method="post">
		<table class="form-table settings parent-settings">
		<tbody>
		<tr valign="top" class="">
		<th scope="row">
		<label for="setting-max_filters">Maximum number of filters</label>
		</th>
		<td>		
		<input id="setting-max_filters" class="regular-text" type="text" name="max_filters" value="<?php echo esc_attr( $max_filters ); ?>">
		</td>
		</tr>
		<?php
		foreach ( $results as $result ) {
			$key              = $result->field_key;
			$type             = $result->type;
			$checkbox_values  = array_map( 'trim', explode( ',', $result->options ) );
			$checkbox_tag_key = "{$key}[]";
			if ( $checkbox_values ) {
				$savedoption = isset( $saved_list_array[ $key ] ) ? $saved_list_array[ $key ] : array();
				echo '<tr valign="top" class=""><th scope="row"><label for="setting-job_experiences_type">Select ' . esc_attr( htmlspecialchars_decode( $result->label_name ) ) . '</label></th><td>';
				foreach ( $checkbox_values as $i => $checkbox_value ) {
					$checked = '';
					if ( in_array( $checkbox_value, $savedoption, true ) ) {
						$checked = ' checked';
					}
					echo sprintf( '<input id="%1$s" type="checkbox" name="%2$s" value="%1$s" ' . esc_attr( $checked ) . '/> <label for="%1$s">%1$s</label><br/>', esc_attr( $checkbox_value ), esc_attr( $checkbox_tag_key ), esc_attr( $checkbox_value ) );
				}
				echo '</td></tr>';
			}
		}
		?>
		<tr valign="top" class="">
		<td colspan="2">
		<input type="hidden" name="form_submitted" value="1" />
		<input type="submit" value="Submit">
		</td>
		</tr>
		</tbody>
		</table>
	</form>
	<?php
}


add_shortcode( 'member_quick_filter', 'member_quick_filter' );
/**
 * Static quick filter for members directory.
 */
function member_quick_filter() {
	global $wpdb;
	ob_start();
	$saved_list_array = get_option( 'quick_filter_list' );
	?>
	<div class="quickfilter_container">
		<div class="quicktitle">Quick filters</div>
		<ul class="quickvalues">
		<?php
		foreach ( $saved_list_array as $key => $values ) {
			foreach ( $values as $value ) {
				echo '<li>
                <input type="checkbox" name="filter[]" data-value="' . esc_attr( $value ) . '" data-type="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '"> <label for="' . esc_attr( $value ) . '">' . esc_attr( strtoupper( $value ) ) . '</label>
                </li>';
			}
		}
		?>
		</ul>
	</div>
	<div class="sortbycontainer">
		<span class="sortby_text">Sort by</span>
		<select class="sortby_members">
			<option value="ASC">Newest</option>
			<option value="DESC">OLDEST</option>
		</select>
	</div>
	<?php
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}



/******************** Start Profile page */

add_action( 'wp_ajax_nopriv_save_profile_ajax_call', 'save_profile_ajax_call' );
add_action( 'wp_ajax_save_profile_ajax_call', 'save_profile_ajax_call' );
/**
 * Function to save profile values using ajax.
 *
 *  @since  1.0.0
 */
function save_profile_ajax_call() {
	$user         = wp_get_current_user();
	$curr_user_id = ( isset( $user->ID ) ? (int) $user->ID : 0 );

	if ( ! empty( $curr_user_id ) ) {

		$save_type = filter_input( INPUT_POST, 'save_type', FILTER_SANITIZE_STRING );
		if ( 'experience' === $save_type ) {
			$experience_array = filter_input( INPUT_POST, 'value', FILTER_SANITIZE_STRING );
			$metas            = array(
				'tools_experience' => $experience_array,
			);
		} elseif ( 'skills' === $save_type ) {
			$skills_array = filter_input( INPUT_POST, 'value', FILTER_SANITIZE_STRING );
			$metas        = array(
				'language_skills' => $skills_array,
			);
		} elseif ( 'work_history' === $save_type ) {
			$work_history_array = filter_input( INPUT_POST, 'value', FILTER_SANITIZE_STRING );
			$metas              = array(
				'work_history' => $work_history_array,
			);
		} else {
			$bio_values = filter_input( INPUT_POST, 'value', FILTER_SANITIZE_STRING );
			$metas      = array(
				'facebook'  => '',
				'twitter'   => '',
				'linkedin'  => '',
				'vk'        => '',
				'youtube'   => '',
				'instagram' => '',
				'github'    => '',
			);
			foreach ( $bio_values as $each_bio ) {
				if ( isset( $each_bio[0] ) && '' !== $each_bio[0] ) {
					$key           = $each_bio[0];
					$val           = isset( $each_bio[1] ) ? $each_bio[1] : '';
					$metas[ $key ] = $val;
				}
			}
		}

		foreach ( $metas as $key => $value ) {
			update_user_meta( $curr_user_id, $key, $value );
		}
	}

	echo wp_json_encode(
		array(
			'success' => 'success',
			'result'  => 1,
		)
	);
	wp_die();
}

add_filter('show_admin_bar', '__return_false');


/******************** End Profile page */

/**
 * Register custom REST route for the post type.
 */
function mops_rest_route_for_post_callback( $route, $post ) {
	if ( $post->post_type === 'wc_membership_plan' ) {
		$route = '/wp/v2/wc_membership_plans/' . $post->ID;
	}

	return $route;
}

add_filter( 'rest_route_for_post', 'mops_rest_route_for_post_callback', 99, 2 );