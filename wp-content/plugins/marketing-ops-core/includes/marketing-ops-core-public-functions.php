<?php
/**
 * The file that defines the core functions.
 *
 * @link       https://adarshverma.com/
 * @since      1.0.0
 *
 * @package    Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/includes
 */

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_custom_taxonomy_job_listings' ) ) {
	/**
	 * Function to add custom taxonomy for job listings.
	 *
	 * @since 1.0.0
	 */
	function moc_custom_taxonomy_job_listings() {
		// Custom Taxonomy Roles in Job Postings.
		register_taxonomy( 'jobroles', array( 'job_listing' ), array(
			'labels'            => array(
				'name'                       => _x( 'Roles', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Role', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Roles', 'marketingops' ),
				'all_items'                  => __( 'All Roles', 'marketingops' ),
				'parent_item'                => __( 'Parent Role', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Role:', 'marketingops' ),
				'new_item_name'              => __( 'New Role Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Role', 'marketingops' ),
				'edit_item'                  => __( 'Edit Role', 'marketingops' ),
				'update_item'                => __( 'Update Role', 'marketingops' ),
				'view_item'                  => __( 'View Role', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate roles with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove roles', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Roles', 'marketingops' ),
				'search_items'               => __( 'Search Roles', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No roles', 'marketingops' ),
				'items_list'                 => __( 'Roles list', 'marketingops' ),
				'items_list_navigation'      => __( 'Roles list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		) );

		// Custom Taxonomy Experience in Job Postings.
		register_taxonomy( 'jobexperiences', array( 'job_listing' ), array(
			'labels'            => array(
				'name'                       => _x( 'Experiences', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Experience', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Experiences', 'marketingops' ),
				'all_items'                  => __( 'All Experiences', 'marketingops' ),
				'parent_item'                => __( 'Parent Experience', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Experience:', 'marketingops' ),
				'new_item_name'              => __( 'New Experience Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Experience', 'marketingops' ),
				'edit_item'                  => __( 'Edit Experience', 'marketingops' ),
				'update_item'                => __( 'Update Experience', 'marketingops' ),
				'view_item'                  => __( 'View Experience', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate experiences with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove experiences', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Experiences', 'marketingops' ),
				'search_items'               => __( 'Search Experiences', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No experiences', 'marketingops' ),
				'items_list'                 => __( 'Experiences list', 'marketingops' ),
				'items_list_navigation'      => __( 'Experiences list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		) );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_query_args' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_query_args( $post_type = 'post', $paged = 1, $posts_per_page = '' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_query_args', $args );

		return $args;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_query' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_query( $post_type = 'post', $paged = 1, $posts_per_page = '' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_args', $args );

		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_query_by_author' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param int    $author_id Author ID.
	 * @param string $post_status Post Status.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_query_by_author( $post_type = 'post', $paged = 1, $posts_per_page = '', $author_id = 1, $post_status = 'publish' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => $post_status,
			'author__in'     => array( $author_id ),
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_query_by_author_args', $args );

		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_by_meta_query' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param string $meta_key Posts per page.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_by_meta_query( $post_type = 'post', $paged = 1, $posts_per_page = '', $meta_key = '' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'meta_query'     => array(
				array(
					'key'     => $meta_key,
					'compare' => 'EXISTS',
				),
			),
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_args', $args );

		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_location_by_job_id' ) ) {
	/**
	 * Get the location by job id.
	 *
	 * @param int $job_id Post type.
	 * @since 1.0.0
	 */
	function moc_get_location_by_job_id( $job_id ) {
		$get_location = ! empty( get_post_meta( $job_id, '_job_location', true ) ) ? get_post_meta( $job_id, '_job_location', true ) : '';
		return $get_location;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_by_meta_key_value' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param string $meta_key meta key.
	 * @param string $meta_value meta value.
	 * @param string $compare compare argument in query.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_by_meta_key_value( $post_type = 'post', $paged = 1, $posts_per_page = '', $meta_key = '', $meta_value = '', $compare = '' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'meta_query'     => array(
				array(
					'key'     => $meta_key,
					'value'   => $meta_value,
					'compare' => $compare,
				),
			),
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_by_meta_key_value_posts_args', $args );

		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_query_post_not_in' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param array  $post_not_in Posts exclude.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_query_post_not_in( $post_type = 'post', $paged = 1, $posts_per_page = '', $post_not_in = array() ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'post__not_in'   => $post_not_in,
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */

		$args = apply_filters( 'moc_posts_args', $args );

		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_query_post_in' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param array  $post_in Posts exclude.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_query_post_in( $post_type = 'post', $paged = 1, $posts_per_page = '', $post_in = array() ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'post__in',
			'order'          => 'DESC',
			'post__in'       => $post_in,
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_query_post_in', $args );

		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_query_post_in_by_taxonomy' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param array  $categories_ids Post terms.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_query_post_in_by_taxonomy( $post_type = 'post', $paged = 1, $posts_per_page = '', $categories_ids = array() ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		if ( ! empty( $categories_ids ) ) {
			$args[ 'tax_query' ] = array(
				array(
					'taxonomy'         => 'workshop_category',
					'terms'            => $categories_ids,
					'field'            => 'term_id',
					'include_children' => true,
					'operator'         => 'IN',
				),
			);
		}
		if ( 'product' === $post_type ) {
			$args['tax_query'] = array(
				array(
					'taxonomy'         => 'product_type',
					'terms'            => 'course',
					'field'            => 'slug',
					'include_children' => true,
					'operator'         => 'IN',
				),
			);
		}
		if ( 'sfwd-courses' === $post_type ) {
			$args['meta_query'] = array(
				array(
					'key'     => 'featured_course',
					'value'   => 1,
					'compare' => 'LIKE',
				),
			);
		}
		
		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_query_post_in_by_taxonomy_args', $args );
		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_posts_query_by_dynamic_conditions' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @param string $selected_sorting_by Post sort by.
	 * @param string $selected_sorting_order Post sort order.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_get_posts_query_by_dynamic_conditions( $post_type = 'post', $paged = 1, $posts_per_page = '', $selected_sorting_by = 'date', $selected_sorting_order = 'DESC', $taxonomy = '', $categories = array(), $author_id = '', $exclude = '', $include = array() ) {
		
		// Prepare the arguments array.
		if ( 'podcast' !== $post_type ) {
			$args = array(
				'post_type'      => $post_type,
				'paged'          => $paged,
				'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
				'post_status'    => 'publish',
				'fields'         => 'ids',
				'orderby'        => $selected_sorting_by,
				'order'          => $selected_sorting_order,
				'author'         => $author_id,
			);	
		} else {
			$args = array(
				'post_type'      => $post_type,
				'paged'          => $paged,
				'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
				'post_status'    => 'publish',
				'fields'         => 'ids',
				'orderby'        => $selected_sorting_by,
				'order'          => $selected_sorting_order,
			);
			if ( ! empty( $author_id ) ) {
				$args[ 'meta_query'] = array(
					array(
						'key'     => 'podcast_guest',
						'value'   => $author_id,
						'compare' => 'LIKE',
					),
				);
			}
		}
		if ( ! empty( $taxonomy ) ) {
			if ( ! in_array( "0", $categories, true ) ) {
				$args[ 'tax_query' ] =
				array(
					array(
						'taxonomy'         => $taxonomy,
						'terms'            => $categories,
						'field'            => 'term_id',
						'include_children' => true,
						'operator'         => 'IN'
					),
				);
			}
		}
		if ( ! empty( $exclude ) ) {
			$args['post__not_in'] = array( $exclude );
		}
		if ( ! empty( $include ) ) {
			$args['post__in'] = $include;
		}

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		return new WP_Query( apply_filters( 'moc_get_posts_query_by_dynamic_conditions_args', $args ) );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_add_option_page' ) ) {
	/**
	 * Add custom settings page for sitewide configurations.
	 *
	 * @since 1.0.0
	 */
	function moc_add_option_page() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title' => __( 'MarketingOps Global Settings', 'marketingops' ),
					'menu_title' => __( 'MarketingOps Global Settings', 'marketingops' ),
					'menu_slug'  => 'mops-general-settings',
					'capability' => 'edit_posts',
					'redirect'   => false,
				), 
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Jobs Global', 'marketingops' ),
					'menu_title'  => __( 'Jobs Global', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Company Global', 'marketingops' ),
					'menu_title'  => __( 'Company Global', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Workshop Global', 'marketingops' ),
					'menu_title'  => __( 'Workshop Global', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Community Badges', 'marketingops' ),
					'menu_title'  => __( 'Community Badges', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'No BS Demo', 'marketingops' ),
					'menu_title'  => __( 'No BS Demo', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Members', 'marketingops' ),
					'menu_title'  => __( 'Members', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Partners', 'marketingops' ),
					'menu_title'  => __( 'Partners', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Subscribe Plans', 'marketingops' ),
					'menu_title'  => __( 'Subscribe Plans', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => __( 'Matchmaking Program', 'marketingops' ),
					'menu_title'  => __( 'Matchmaking Program', 'marketingops' ),
					'parent_slug' => 'mops-general-settings',
				),
			);
		}
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_workshop_custom_post_type' ) ) {
	/**
	 * Function to register workshop custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_workshop_custom_post_type() {
		register_post_type( 'workshop', array(
			'label'               => __( 'Workshop', 'marketingops' ),
			'description'         => __( 'Its custom post type of workshop', 'marketingops' ),
			'labels'              => array(
				'name'                  => _x( 'workshops', 'Workshop General Name', 'marketingops' ),
				'singular_name'         => _x( 'Workshop', 'Workshop Singular Name', 'marketingops' ),
				'menu_name'             => __( 'Workshops', 'marketingops' ),
				'name_admin_bar'        => __( 'Workshops', 'marketingops' ),
				'archives'              => __( 'Workshop Archives', 'marketingops' ),
				'attributes'            => __( 'Workshop Attributes', 'marketingops' ),
				'parent_item_colon'     => __( 'Parent Workshop:', 'marketingops' ),
				'all_items'             => __( 'All Workshops', 'marketingops' ),
				'add_new_item'          => __( 'Add New Workshop', 'marketingops' ),
				'add_new'               => __( 'Add New', 'marketingops' ),
				'new_item'              => __( 'New Workshop', 'marketingops' ),
				'edit_item'             => __( 'Edit Workshop', 'marketingops' ),
				'update_item'           => __( 'Update Workshop', 'marketingops' ),
				'view_item'             => __( 'View Workshop', 'marketingops' ),
				'view_items'            => __( 'View Workshops', 'marketingops' ),
				'search_items'          => __( 'Search Workshop', 'marketingops' ),
				'not_found'             => __( 'Not found', 'marketingops' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'marketingops' ),
				'featured_image'        => __( 'Featured Image', 'marketingops' ),
				'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
				'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
				'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
				'insert_into_item'      => __( 'Insert into Workshop', 'marketingops' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Workshop', 'marketingops' ),
				'items_list'            => __( 'Workshops list', 'marketingops' ),
				'items_list_navigation' => __( 'Workshops list navigation', 'marketingops' ),
				'filter_items_list'     => __( 'Filter Workshops list', 'marketingops' ),
			),
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies'          => array( 'workshop_category', ' workshop_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-multisite',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		) );

		// Register taxonomy (workshop_category) for workshop post type.
		register_taxonomy( 'workshop_category', array( 'workshop' ), array(
			'labels'            => array(
				'name'                       => _x( 'Workshop Categories', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Workshop Category', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Workshop Categories', 'marketingops' ),
				'all_items'                  => __( 'All Workshop Categories', 'marketingops' ),
				'parent_item'                => __( 'Parent Workshop Category', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Workshop Category:', 'marketingops' ),
				'new_item_name'              => __( 'New Workshop Category Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Workshop Category', 'marketingops' ),
				'edit_item'                  => __( 'Edit Workshop Category', 'marketingops' ),
				'update_item'                => __( 'Update Workshop Category', 'marketingops' ),
				'view_item'                  => __( 'View Workshop Category', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Workshop Categories with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Workshop Categories', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Workshop Categories', 'marketingops' ),
				'search_items'               => __( 'Search Workshop Categories', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Workshop Categories', 'marketingops' ),
				'items_list'                 => __( 'Workshop Categories list', 'marketingops' ),
				'items_list_navigation'      => __( 'Workshop Categories list navigation', 'marketingops' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		) );

		// Register taxonomy (workshop_tag) for workshop post type.
		register_taxonomy( 'workshop_tag', array( 'workshop' ), array(
			'labels'            => array(
				'name'                       => _x( 'Workshop Tags', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Workshop Tag', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Workshop Tags', 'marketingops' ),
				'all_items'                  => __( 'All Workshop Tags', 'marketingops' ),
				'parent_item'                => __( 'Parent Workshop Tag', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Workshop Tag:', 'marketingops' ),
				'new_item_name'              => __( 'New Workshop Tag Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Workshop Tag', 'marketingops' ),
				'edit_item'                  => __( 'Edit Workshop Tag', 'marketingops' ),
				'update_item'                => __( 'Update Workshop Tag', 'marketingops' ),
				'view_item'                  => __( 'View Workshop Tag', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Workshop Tags with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Workshop Tags', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Workshop Tags', 'marketingops' ),
				'search_items'               => __( 'Search Workshop Tags', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Workshop Tags', 'marketingops' ),
				'items_list'                 => __( 'Workshop Tags list', 'marketingops' ),
				'items_list_navigation'      => __( 'Workshop Tags list navigation', 'marketingops' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		) );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_no_bs_demo_custom_post_type' ) ) {
	/**
	 * Function to register no_bs_demo custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_no_bs_demo_custom_post_type() {
		register_post_type( 'no_bs_demo', array(
			'label'               => __( 'No BS Demo', 'marketingops' ),
			'description'         => __( 'Its custom post type of no_bs_demo', 'marketingops' ),
			'labels'              => array(
				'name'                  => _x( 'No BS Demos', 'No BS Demo General Name', 'marketingops' ),
				'singular_name'         => _x( 'No BS Demo', 'No BS Demo Singular Name', 'marketingops' ),
				'menu_name'             => __( 'No BS Demos', 'marketingops' ),
				'name_admin_bar'        => __( 'No BS Demos', 'marketingops' ),
				'archives'              => __( 'No BS Demo Archives', 'marketingops' ),
				'attributes'            => __( 'No BS Demo Attributes', 'marketingops' ),
				'parent_item_colon'     => __( 'Parent No BS Demo:', 'marketingops' ),
				'all_items'             => __( 'No BS Demos', 'marketingops' ),
				'add_new_item'          => __( 'Add No BS Demo', 'marketingops' ),
				'add_new'               => __( 'Add No BS Demo', 'marketingops' ),
				'new_item'              => __( 'New No BS Demo', 'marketingops' ),
				'edit_item'             => __( 'Edit No BS Demo', 'marketingops' ),
				'update_item'           => __( 'Update No BS Demo', 'marketingops' ),
				'view_item'             => __( 'View No BS Demo', 'marketingops' ),
				'view_items'            => __( 'View No BS Demos', 'marketingops' ),
				'search_items'          => __( 'Search No BS Demo', 'marketingops' ),
				'not_found'             => __( 'Not found', 'marketingops' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'marketingops' ),
				'featured_image'        => __( 'Featured Image', 'marketingops' ),
				'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
				'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
				'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
				'insert_into_item'      => __( 'Insert into No BS Demo', 'marketingops' ),
				'uploaded_to_this_item' => __( 'Uploaded to this No BS Demo', 'marketingops' ),
				'items_list'            => __( 'No BS Demos list', 'marketingops' ),
				'items_list_navigation' => __( 'No BS Demos list navigation', 'marketingops' ),
				'filter_items_list'     => __( 'Filter No BS Demos list', 'marketingops' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ),
			'taxonomies'          => array( 'no_bs_demo_category', ' no_bs_demo_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-tickets-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		) );

		// Register the custom texonomy.
		register_taxonomy( 'no_bs_demo_category', array( 'no_bs_demo' ), array(
			'labels'            => array(
				'name'                       => _x( 'No BS Demo Categories', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'No BS Demo Category', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'No BS Demo Categories', 'marketingops' ),
				'all_items'                  => __( 'All No BS Demo Categories', 'marketingops' ),
				'parent_item'                => __( 'Parent No BS Demo Category', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent No BS Demo Category:', 'marketingops' ),
				'new_item_name'              => __( 'New No BS Demo Category Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New No BS Demo Category', 'marketingops' ),
				'edit_item'                  => __( 'Edit No BS Demo Category', 'marketingops' ),
				'update_item'                => __( 'Update No BS Demo Category', 'marketingops' ),
				'view_item'                  => __( 'View No BS Demo Category', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate No BS Demo Categories with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove No BS Demo Categories', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular No BS Demo Categories', 'marketingops' ),
				'search_items'               => __( 'Search No BS Demo Categories', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No No BS Demo Categories', 'marketingops' ),
				'items_list'                 => __( 'No BS Demo Categories list', 'marketingops' ),
				'items_list_navigation'      => __( 'No BS Demo Categories list navigation', 'marketingops' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		) );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_no_bs_demo_offer_custom_post_type' ) ) {
	/**
	 * Function to register no_bs_demo_offer custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_no_bs_demo_offer_custom_post_type() {
		register_post_type( 'no_bs_demo_offer', array(
			'label'               => __( 'No BS Demo Coupon', 'marketingops' ),
			'description'         => __( 'Its custom post type of no_bs_demo_offer', 'marketingops' ),
			'labels'              => array(
				'name'                  => _x( 'No BS Demo Coupons', 'No BS Demo Coupon General Name', 'marketingops' ),
				'singular_name'         => _x( 'No BS Demo Coupon', 'No BS Demo Coupon Singular Name', 'marketingops' ),
				'menu_name'             => __( 'No BS Demo Coupons', 'marketingops' ),
				'name_admin_bar'        => __( 'No BS Demo Coupons', 'marketingops' ),
				'archives'              => __( 'No BS Demo Coupon Archives', 'marketingops' ),
				'attributes'            => __( 'No BS Demo Coupon Attributes', 'marketingops' ),
				'parent_item_colon'     => __( 'Parent No BS Demo Coupon:', 'marketingops' ),
				'all_items'             => __( 'No BS Demo Coupons', 'marketingops' ),
				'add_new_item'          => __( 'Add New No BS Demo Coupon', 'marketingops' ),
				'add_new'               => __( 'Add Coupon', 'marketingops' ),
				'new_item'              => __( 'New No BS Demo Coupon', 'marketingops' ),
				'edit_item'             => __( 'Edit No BS Demo Coupon', 'marketingops' ),
				'update_item'           => __( 'Update No BS Demo Coupon', 'marketingops' ),
				'view_item'             => __( 'View No BS Demo Coupon', 'marketingops' ),
				'view_items'            => __( 'View No BS Demo Coupons', 'marketingops' ),
				'search_items'          => __( 'Search No BS Demo Coupon', 'marketingops' ),
				'not_found'             => __( 'Not found', 'marketingops' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'marketingops' ),
				'featured_image'        => __( 'Featured Image', 'marketingops' ),
				'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
				'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
				'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
				'insert_into_item'      => __( 'Insert into No BS Demo Coupon', 'marketingops' ),
				'uploaded_to_this_item' => __( 'Uploaded to this No BS Demo Coupon', 'marketingops' ),
				'items_list'            => __( 'No BS Demo Coupons list', 'marketingops' ),
				'items_list_navigation' => __( 'No BS Demo Coupons list navigation', 'marketingops' ),
				'filter_items_list'     => __( 'Filter No BS Demo Coupons list', 'marketingops' ),
			),
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => 'edit.php?post_type=no_bs_demo',
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-tickets-alt',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		) );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_training_custom_post_type' ) ) {
	/**
	 * Function to register training custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_training_custom_post_type() {
		register_post_type( 'training', array(
			'label'               => __( 'Training', 'marketingops' ),
			'description'         => __( 'Its custom post type of training', 'marketingops' ),
			'labels'              => array(
				'name'                  => _x( 'Training', 'Training General Name', 'marketingops' ),
				'singular_name'         => _x( 'Training', 'Training Singular Name', 'marketingops' ),
				'menu_name'             => __( 'Trainings', 'marketingops' ),
				'name_admin_bar'        => __( 'Trainings', 'marketingops' ),
				'archives'              => __( 'Training Archives', 'marketingops' ),
				'attributes'            => __( 'Training Attributes', 'marketingops' ),
				'parent_item_colon'     => __( 'Parent Training:', 'marketingops' ),
				'all_items'             => __( 'All Trainings', 'marketingops' ),
				'add_new_item'          => __( 'Add New Training', 'marketingops' ),
				'add_new'               => __( 'Add New', 'marketingops' ),
				'new_item'              => __( 'New Training', 'marketingops' ),
				'edit_item'             => __( 'Edit Training', 'marketingops' ),
				'update_item'           => __( 'Update Training', 'marketingops' ),
				'view_item'             => __( 'View Training', 'marketingops' ),
				'view_items'            => __( 'View Trainings', 'marketingops' ),
				'search_items'          => __( 'Search Training', 'marketingops' ),
				'not_found'             => __( 'Not found', 'marketingops' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'marketingops' ),
				'featured_image'        => __( 'Featured Image', 'marketingops' ),
				'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
				'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
				'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
				'insert_into_item'      => __( 'Insert into Training', 'marketingops' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Training', 'marketingops' ),
				'items_list'            => __( 'Trainings list', 'marketingops' ),
				'items_list_navigation' => __( 'Trainings list navigation', 'marketingops' ),
				'filter_items_list'     => __( 'Filter Trainings list', 'marketingops' ),
			),
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
			'taxonomies'          => array( 'training_platform', ' training_skill_level', 'training_strategy_type' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-multisite',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		) );
	}
}

if ( ! function_exists( 'moc_training_platform' ) ) {

	// Register Custom Taxonomy
	function moc_training_platform() {
		register_taxonomy( 'training_platform', array( 'product', 'sfwd-courses' ), array(
			'labels'                     => array(
				'name'                       => _x( 'Platform', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Platform', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Platform', 'marketingops' ),
				'all_items'                  => __( 'All Platform', 'marketingops' ),
				'parent_item'                => __( 'Parent Platform', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Platform:', 'marketingops' ),
				'new_item_name'              => __( 'New Platform Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Platform', 'marketingops' ),
				'edit_item'                  => __( 'Edit Platform', 'marketingops' ),
				'update_item'                => __( 'Update Platform', 'marketingops' ),
				'view_item'                  => __( 'View Platform', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate platform with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove platform', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Platform', 'marketingops' ),
				'search_items'               => __( 'Search Platform', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Platform', 'marketingops' ),
				'items_list'                 => __( 'Platform list', 'marketingops' ),
				'items_list_navigation'      => __( 'Platform list navigation', 'marketingops' ),
			),
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		) );
		// register_taxonomy( 'training_platform', array( 'sfwd-courses' ), $args );
	
	}
}
if ( ! function_exists( 'moc_training_skill_level' ) ) {

	// Register Custom Taxonomy
	function moc_training_skill_level() {
		register_taxonomy( 'training_skill_level', array( 'product', 'sfwd-courses' ), array(
			'labels'            => array(
				'name'                       => _x( 'Skill level', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Skill level', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Skill level', 'marketingops' ),
				'all_items'                  => __( 'All Skill level', 'marketingops' ),
				'parent_item'                => __( 'Parent Skill level', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Skill level:', 'marketingops' ),
				'new_item_name'              => __( 'New Skill level Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Skill level', 'marketingops' ),
				'edit_item'                  => __( 'Edit Skill level', 'marketingops' ),
				'update_item'                => __( 'Update Skill level', 'marketingops' ),
				'view_item'                  => __( 'View Skill level', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate platform with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove platforms', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Skill level', 'marketingops' ),
				'search_items'               => __( 'Search Skill level', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Skill level', 'marketingops' ),
				'items_list'                 => __( 'Skill level list', 'marketingops' ),
				'items_list_navigation'      => __( 'Skill level list navigation', 'marketingops' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		) );
		// register_taxonomy( 'training_skill_level', array( 'sfwd-courses' ), $args );
	}
}

if ( ! function_exists( 'moc_training_strategy_type' ) ) {
	// Register Custom Taxonomy
	function moc_training_strategy_type() {
		register_taxonomy( 'training_strategy_type', array( 'product', 'sfwd-courses' ), array(
			'labels'            => array(
				'name'                       => _x( 'Strategy type', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Strategy type', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Strategy type', 'marketingops' ),
				'all_items'                  => __( 'All Strategy type', 'marketingops' ),
				'parent_item'                => __( 'Parent Strategy type', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Strategy type:', 'marketingops' ),
				'new_item_name'              => __( 'New Strategy type Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Strategy type', 'marketingops' ),
				'edit_item'                  => __( 'Edit Strategy type', 'marketingops' ),
				'update_item'                => __( 'Update Strategy type', 'marketingops' ),
				'view_item'                  => __( 'View Strategy type', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate platform with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove platforms', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Strategy type', 'marketingops' ),
				'search_items'               => __( 'Search Strategy type', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Strategy type', 'marketingops' ),
				'items_list'                 => __( 'Strategy type list', 'marketingops' ),
				'items_list_navigation'      => __( 'Strategy type list navigation', 'marketingops' ),
			),
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		) );
		// register_taxonomy( 'training_strategy_type', array( 'sfwd-courses' ), $args );
	
	}
}
if ( ! function_exists( 'moc_podcast_category' ) ) {

	// Register Custom Taxonomy
	function moc_podcast_category() {
		register_taxonomy( 'podcast_category', array( 'podcast' ), array(
			'labels'                     => array(
				'name'                       => _x( 'Podcasts Category', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Podcast Category', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Podcasts Category', 'marketingops' ),
				'all_items'                  => __( 'All Podcasts Category', 'marketingops' ),
				'parent_item'                => __( 'Parent Podcast Category', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Podcast Category:', 'marketingops' ),
				'new_item_name'              => __( 'New Podcast Category Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Podcast Category', 'marketingops' ),
				'edit_item'                  => __( 'Edit Podcast Category', 'marketingops' ),
				'update_item'                => __( 'Update Podcast Category', 'marketingops' ),
				'view_item'                  => __( 'View Podcast Category', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate platform with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove platforms', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Podcasts Category', 'marketingops' ),
				'search_items'               => __( 'Search Podcasts Category', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Podcasts Category', 'marketingops' ),
				'items_list'                 => __( 'Podcasts Category list', 'marketingops' ),
				'items_list_navigation'      => __( 'Podcasts Category list navigation', 'marketingops' ),
			),
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		) );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_posts_by_search_keyword_query_args' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $posts_per_page Posts per page.
	 * @param array  $search_keyword Search keyword.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_posts_by_search_keyword_query_args( $post_type = 'post', $posts_per_page = -1, $search_keyword = '', $min_salary = '', $max_salary = '' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'              => $post_type,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => 1,
			'offset'                 => 0,
			'posts_per_page'         => $posts_per_page,
			'orderby'                => 'date',
			'order'                  => 'DESC',
			'meta_query'             => array(
				array(
					'key'     => '_filled',
					'value'   => 1,
					'compare' => '!=',
				),
				array(
					'key'     => '_job_salary',
					'value'   => array(
						$min_salary,
						$max_salary,
					),
					'compare' => 'BETWEEN',
					'type'    => 'NUMERIC',
				),
			),
			'update_post_term_cache' => '',
			'update_post_meta_cache' => '',
			'cache_results'          => '',
			'fields'                 => 'all',
			's'                      => $search_keyword,
			'lang'                   => '',
		);

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_posts_by_search_keyword_args', $args );

		return $args;
	}
}
if ( function_exists( 'moc_get_default_company_logo_url' ) ) {
	function moc_get_default_company_logo_url() {
		if ( ! empty( get_field( 'company_placeholder_image', 'option' ) ) ) {
			$image_array = get_field( 'company_placeholder_image', 'option' );
			$url         = ( ! empty( $image_array['url'] ) ) ? $image_array['url'] : '';
		} else {
			$url = site_url() . '/wp-content/uploads/2021/10/logo_inst.png';
		}

		return $url;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_common_related_posts' ) ) {
	/**
	 * Get the related posts HTML.
	 *
	 * @param array  $posts_ids Array of post ids.
	 * @param string $heading_title Heading titles.
	 * @since 1.0.0
	 */
	function moc_common_related_posts( $posts_ids, $heading_title ) {
		ob_start();

		if ( ! empty( $posts_ids ) ) {
		?>
		<div class="moc_common_related_posts elementor-column elementor-col-100 elementor-inner-column elementor-element relatedpostbg">
			<div class="elementor-widget-wrap elementor-element-populated">
				<!-- main title -->
				<div class="elementor-element elementor-element-ba398b8 elementor-widget elementor-widget-heading">
					<div class="elementor-widget-container">
						<h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html( $heading_title ); ?></h2>
					</div>
				</div>
				<!-- blog post main div -->
				<div class="elementor-element elementor-posts--align-left elementor-grid-3 elementor-grid-tablet-2 elementor-grid-mobile-1 elementor-posts--thumbnail-top elementor-widget elementor-widget-posts">
					<div class="elementor-widget-container">
						<div class="elementor-posts-container elementor-posts elementor-posts--skin-classic elementor-grid elementor-has-item-ratio">
							<?php
							foreach ( $posts_ids as $post_id ) {
								$post_name                  = wp_trim_words( get_the_title( $post_id ), 5, '...' );
								$post_link                  = get_the_permalink( $post_id );
								$post_description           = get_the_excerpt( $post_id );
								$default_author_img         = get_field( 'moc_user_default_image', 'option' );
								$post_author_id             = get_post_field( 'post_author', $post_id );
								$post_author_username       = get_the_author_meta( 'user_nicename', $post_author_id );
								$post_author_name           = get_the_author_meta( 'display_name', $post_author_id );
								$author_img_id              = ! empty( get_user_meta( $post_author_id, 'wp_user_avatar', true ) ) ? get_user_meta( $post_author_id, 'wp_user_avatar', true ) : '';
								$author_img_url             = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
								$post_author_image_url      = ! empty( $author_img_url ) ? $author_img_url[0] : get_avatar_url( $post_author_id, array( 'size' => 96 ) );
								$post_author_image_url      = ! empty( $post_author_image_url ) ? $post_author_image_url : $default_author_img;
								$post_image_id              = get_post_thumbnail_id( $post_id );
								$post_image_array           = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
								$post_image_url             = ! empty( $post_image_array ) ? $post_image_array[0] : array( get_field( 'moc_workshop_default_image', 'option' ) );
								$author_state               = ! empty( get_user_meta( $post_author_id, 'moc_state', true ) ) ? get_user_meta( $post_author_id, 'moc_state', true ) : '';
								$author_city                = ! empty( get_user_meta( $post_author_id, 'moc_city', true ) ) ? get_user_meta( $post_author_id, 'moc_city', true ) . ', ' : '';
								$author_url                 = site_url() . '/profile/' . $post_author_username;
								$become_member_txt_article  = ! empty ( get_field( 'become_a_member_button_text_for_article', 'option' ) ) ? get_field( 'become_a_member_button_text_for_article', 'option' ) : 'Become a member';
								$become_member_txt_workshop = ! empty ( get_field( 'become_a_member_button_text_workshop', 'option' ) ) ? get_field( 'become_a_member_button_text_workshop', 'option' ) : 'Become a member';
								$become_a_member_txt        = ( 'post' === get_post_type( $post_id ) ) ? $become_member_txt_workshop : $become_member_txt_article;
								$member_article_text_opt    = ! empty ( get_field( 'member_only_tag_text_article', 'option' ) ) ? get_field( 'member_only_tag_text_article', 'option' ) : 'MEMBER ONLY';
								$member_workshop_text_opt   = ! empty ( get_field( 'member_only_tag_text_workshop', 'option' ) ) ? get_field( 'member_only_tag_text_workshop', 'option' ) : 'MEMBER ONLY';
								$members_text               = ( 'post' === get_post_type( $post_id ) ) ? $member_workshop_text_opt : $member_article_text_opt;
								$become_member_link         = ( is_user_logged_in() ) ? $author_url : site_url() . '/sign-up';
								?>
								<article class="elementor-post elementor-grid-item post type-post">
									<div class="elementor-post__text">
										<!-- title with bg -->
										<h3 class="elementor-post__title">
											<!-- member only text -->
											<span class="member_only"><?php echo esc_html( $members_text ); ?></span>
											<div class="pst__title_box">
												<!-- Title -->
												<a href="<?php echo esc_url( $post_link ); ?>" class="title_post"><?php echo esc_html( $post_name ); ?></a>
												<!-- author text & image -->
												<a href="<?php echo esc_url( $author_url ); ?>" class="box_author">
												  <img src="<?php echo esc_url( $post_author_image_url ); ?>" alt="author_img" />
												  <span><?php echo esc_html( $post_author_name ); ?><br/> <?php echo esc_html( $author_city ); ?> <?php echo esc_html( $author_state ); ?></span>
												</a>
											</div>
										  
										</h3>
										<!-- content -->
										<?php
										if ( ! empty( $post_description ) ) {
											?>
												<div class="elementor-post__excerpt">
													<p><?php echo wp_kses_post( $post_description ); ?></p>
												</div>
											<?php
										}
										?>
											<!-- small btn -->
										<a class="elementor-post__read-more" href="<?php echo esc_url( $become_member_link ); ?>"><?php echo esc_html( $become_a_member_txt ); ?></a>
									</div>
								</article>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_basic_information' ) ) {
	/**
	 * Get the HTML for User Basic Information.
	 *
	 * @since 1.0.0
	 */
	function moc_user_basic_information( $current_userid, $all_user_meta ) {
		ob_start();
		global $wpdb;
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if (  $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		$user_obj                       = get_userdata( $current_userid );
		$firstname                      = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname                       = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$email                          = ! empty( $user_obj->data->user_email ) ? $user_obj->data->user_email : '';
		$class_hide_not_data_first_name = empty( $firstname ) ? 'moc_do_not_display' : '';
		$class_hide_not_data_last_name  = empty( $lastname ) ? 'moc_do_not_display' : '';
		$class_hide_not_data_email      = empty( $email ) ? 'moc_do_not_display' : '';
		if ( ( ! empty( $class_hide_not_data_first_name ) && ! empty( $class_hide_not_data_last_name ) ) && ( ! empty( $class_hide_not_data_email )  ) ) {
			$class_hide_not_data_main_div = 'moc_do_not_display';
		}
		?>
		<div class="title_with_btn">
			<h3><?php esc_html_e( 'Basic Details', 'marketingops' ); ?></h3>
			<?php
			
			if ( is_user_logged_in() && true === $flag ) {
				?>
				<div class="btns">
					<div class="moc_not_editable_data">
						<a href="javascript:void(0);" class="gray_color btn edit_btn moc_user_basic_info_edit_btn moc_bio_info"><?php esc_html_e( 'Edit', 'marketingops' ); ?></a>
					</div>
					<div class="moc_editable_data">
						<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_user_basic_info_cancel_btn moc_cancel_general_info"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
						<a href="javascript:void(0);" class="green_color btn btn_save moc_save_basic_info"><?php esc_html_e( 'Save', 'marketingops' ); ?></a>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<div class="sub_title_with_content <?php echo esc_attr( $class_hide_not_data_main_div ); ?>">
			<div class="two_boxes">
				<div class="content_boxes moc_required_field <?php echo esc_attr( $class_hide_not_data_first_name );?> ">
					<h5><?php esc_html_e( 'First Name', 'marketingops' ); ?></h5>
					<div class="moc_editable_data">
						<div class="content_boxed">
							<input type="text" class="inputtext" value="<?php echo esc_html( $firstname ); ?>" name="moc_first_name" placeholder="First Name">
							<div class="moc_error moc_first_name_err">
								<span></span>
							</div>
						</div>
					</div>
					<div class="moc_not_editable_data">
					<?php
						if ( !empty( $firstname ) ) {
							?>
							<div class="content_boxed">
								<?php echo esc_html( $firstname ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<div class="content_boxes moc_required_field <?php echo esc_attr( $class_hide_not_data_last_name );?>">
					<h5><?php esc_html_e( 'Last Name', 'marketingops' ); ?></h5>
					<div class="moc_editable_data">
						<div class="content_boxed">
							<input type="text" class="inputtext" value="<?php echo esc_html( $lastname  ); ?>" name="moc_last_name" placeholder="Last Name">
							<div class="moc_error moc_last_name_err"><span></span></div>
						</div>
					</div>
					<div class="moc_not_editable_data">
						<?php
						if ( ! empty( $lastname ) ) {
							?>
							<div class="content_boxed">
								<?php echo esc_html( $lastname ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="content_boxes moc_required_field <?php echo esc_attr( $class_hide_not_data_email );?>">
				<h5><?php esc_html_e( 'Email', 'marketingops' ); ?></h5>
				<div class="moc_editable_data">
					<div class="content_boxed">
						<input type="email" class="inputtext" value="<?php echo esc_html( $email); ?>" name="moc_email" placeholder="john_doe@example.com">
						<div class="moc_error moc_email_err"><span></span></div>
					</div>
				</div>
				<div class="moc_not_editable_data">
				<?php 
					if ( ! empty( $email ) ) {
						?>
						<div class="content_boxed">
							<a href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="content_boxes moc_editable_data">
				<h5><?php esc_html_e( 'Old Password', 'marketingops' ); ?></h5>
				<div class="content_boxed">
					<div class="moc_editable_data">
						<input type="password" class="inputtext" value="" name="moc_old_password" placeholder="Old password" autocomplete="off">
						<div class="moc_error moc_new_password_err"><span></span></div>
					</div>
				</div>
			</div>
			<div class="content_boxes moc_editable_data">
				<h5><?php esc_html_e( 'New Password', 'marketingops' ); ?></h5>
				<div class="content_boxed">
					<div class="moc_editable_data">
						<input type="password" class="inputtext" value="" name="moc_new_password" placeholder="New password">
						<div class="moc_error moc_new_password_err">
							<span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_bio_html' ) ) {
	/**
	 * Get the User Bio HTML for Edit Profile.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_user_bio_html( $current_userid, $all_user_meta ) {
		ob_start();
		global $wpdb;
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		$user_obj                  = get_userdata( $current_userid );
		$firstname                 = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname                  = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_bio                  = ! empty( $all_user_meta['description'] ) ? trim( $all_user_meta['description'][0] ) : '';
		$non_empty_text            = '';
		$user_display_name         = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$website                   = ! empty( $user_obj->user_url ) ? $user_obj->user_url : $non_empty_text;
		$website_val               = ! empty( $user_obj->user_url ) ? $user_obj->user_url : '';
		$user_all_info             = get_user_meta( $current_userid, 'user_all_info', true );
		$user_all_info             = ( ! empty( $user_all_info ) && is_array( $user_all_info ) ) ? $user_all_info : array();
		$get_user_basic_info       = ! empty( $user_all_info['user_basic_info'] ) ? $user_all_info['user_basic_info'] : array();
		$moc_martech_info          = ( ! empty( $user_all_info ) ) ? $user_all_info['moc_martech_info'] : array();
		$social_media_arr          = ! empty( $get_user_basic_info['social_media_arr'] ) ? $get_user_basic_info['social_media_arr'] : array();
		$checked_industries        = ! empty( $get_user_basic_info['cheked_industries'] ) ? $get_user_basic_info['cheked_industries'] : array();
		$ppress_custom_fields      = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE field_key = %s', array( 'industry_experience' ) ), ARRAY_A );
		$option_choices_industries = $ppress_custom_fields[0]['options'];
		$option_choices_industries = explode( ',', $option_choices_industries );
		$text_empty = '';
		if ( false === $flag ) {
			if( empty( $social_media_arr ) ) {
				$text_empty = $non_empty_text;
			} else {
				$text_empty = '';
			}
		}
		$text_empty_choice = '';
		if ( false === $flag ) {
			if( empty( $social_media_arr ) ) {
				$text_empty_choice = $non_empty_text;
			} else {
				$text_empty_choice = '';
			}
		}
		$class_hide_not_data_bio     = empty( $user_bio ) ? 'moc_do_not_display' : '';
		$class_hide_not_data_website = empty( $website ) ? 'moc_do_not_display' : '';
		$class_hide_not_data_social_media = empty( $social_media_arr ) ? 'moc_do_not_display' : '';
		$class_hide_not_data_industry_media = empty( $checked_industries ) ? 'moc_do_not_display' : '';
		if ( ( ! empty( $class_hide_not_data_bio ) && ! empty( $class_hide_not_data_website ) ) && ( ! empty( $class_hide_not_data_social_media ) && ! empty( $class_hide_not_data_industry_media ) ) ) {
			$class_hide_not_data_main_div = 'moc_do_not_display';
		}
		$get_maps_data      = get_field( 'primary_automation_platform','option' );
		$primary_automation = array();
		$flag_for_primary_automation = array();
		if ( ! empty( $moc_martech_info ) && is_array( $moc_martech_info ) ) {
			foreach ( $moc_martech_info as $moc_martech ) {
				if ( ! empty( $moc_martech['primary_value'] ) && 'yes' === $moc_martech['primary_value'] ) {
					$flag_for_primary_automation[] = 'yes';
				}
			}
		}

		if ( ! empty( $moc_martech_info ) && is_array( $moc_martech_info ) ) {
			foreach ( $moc_martech_info as $moc_martech ) {
				if ( ! empty( $moc_martech['primary_value'] ) && 'yes' === $moc_martech['primary_value'] ) {
					// if ( $moc_martech['platform'] === )
					$primary_automation[] = $moc_martech['platform'];
				}
			}
		}

		if ( ! empty( $get_maps_data ) && is_array( $get_maps_data ) ) {
			foreach ( $get_maps_data as $get_map_data ) {
				$maps_data[$get_map_data['name']] = $get_map_data['image'];
			}	
		}
		
		if ( ! empty( $maps_data ) && is_array( $maps_data ) ) {
			foreach ( $maps_data as $key => $map_data ) {
				if ( ! empty( $primary_automation ) && is_array( $primary_automation ) ) {
					if ( $key === $primary_automation[0] ) {
						if ( ! empty ( $map_data ) ) {
							$map_image[] = $map_data;
						}
						
					}
				}
				
			}
		}
		$job_seeker_fields    = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'ppress_profile_fields WHERE field_key = %s', array( 'job_seeker_details' ) ), ARRAY_A );
		$job_options          =  $job_seeker_fields[0]['options'];
		$job_options          =  explode( ',', $job_options );
		$job_seeker_details   = ! empty( get_user_meta( $current_userid, 'job_seeker_details', true ) ) ? get_user_meta( $current_userid, 'job_seeker_details', true ) : '' ;
		$job_seeker_val       = ! empty( $job_seeker_details ) ? $job_seeker_details : '';
		$jsd_selected_class   = ! empty( $job_seeker_details ) ? 'moc_change_selection' : '';
		$style_for_js         = ! empty( $job_seeker_details ) ? '' : 'display:none;';
		$skill_html           = '';
		$skill_level_txt      = '';
		$skill_class          = '';

		if (  ! empty( $moc_martech_info ) && is_array( $moc_martech_info ) ) {
			foreach ( $moc_martech_info as $moc_martech ) {
				if ( ! empty( $moc_martech['primary_value'] ) && 'yes' === $moc_martech['primary_value'] ) {
					// if ( $moc_martech['platform'] === )
					$skill_level = (int) $moc_martech['skill_level'];
					if ( 1 <= $skill_level && 2 > $skill_level ) {
						$skill_level_txt .= esc_html__( 'BASIC', 'marketingops' );
						$skill_class     .= 'yellow_btn';
						$skill_html      .= '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
					} elseif ( 2 <= $skill_level && 3 > $skill_level ) {
						$skill_level_txt .= esc_html__( 'INTERMEDIATE', 'marketingops' );
						$skill_class     .= 'gradient_btn';
						$skill_html      .= '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '"><span>' .esc_html( $skill_level_txt ) .'</span></a>';
					} elseif ( 3 <= $skill_level && 4 > $skill_level ) {
						$skill_level_txt .= esc_html__( 'ADVANCED', 'marketingops' );
						$skill_class     .= 'pink_btn';
						$skill_html      .= '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
					} else {
						$skill_level_txt .= esc_html__( 'EXPERT', 'marketingops' );
						$skill_class     .= 'blue_btn';
						$skill_html      .= '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
					}
				}
			}
		}
		$map_image = ! empty( $map_image ) ?  $map_image : array();
		$exp_class = '';
		$exp_text  = '';
		$exp_html  = '';
		
		?>
		<div class="title_with_btn">
			<h3><?php esc_html_e( 'About', 'marketingops' ); ?></h3>
			<?php
			if ( is_user_logged_in() && true === $flag ) {
				?>
				<div class="btns">
					<div class="moc_not_editable_data">
						<a href="javascript:void(0);" class="gray_color btn edit_btn moc_user_basic_info_edit_btn moc_bio_info"><?php esc_html_e( 'Edit', 'marketingops' ); ?></a>
					</div>
					<div class="moc_editable_data">
						<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_user_basic_info_cancel_btn moc_user_bio_cancel_btn"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
						<a href="javascript:void(0);" class="green_color btn btn_save moc_user_basic_info_save_btn"><?php esc_html_e( 'Save', 'marketingops' ); ?></a>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<div class="sub_title_with_content <?php echo esc_attr( $class_hide_not_data_main_div ); ?>">
			<div class="content_boxes moc_required_field <?php echo esc_attr( $class_hide_not_data_bio ); ?>">
				<h5><?php esc_html_e( 'Bio', 'marketingops' ); ?></h5>
				<div class="content_boxed">
					<div class="moc_not_editable_data">
						<?php echo esc_html( $user_bio ); ?>
					</div>
					<div class="moc_editable_data">
						<textarea name="description" class="inputtext user_bio"><?php echo esc_html( $user_bio ); ?></textarea>
						<div class="moc_error moc_user_bio_err"><span></span></div>
					</div>
				</div>
			</div>
			<?php
			if ( in_array( 'yes', $flag_for_primary_automation, true ) ) {
				?>
				<div class="moc_not_editable_data">
					<div class="content_boxes ">
						<h5><?php esc_html_e( 'Primary Automation Platform', 'marketingops' ); ?></h5>
						<div class="content_boxed">
							<div class="platform_btns">
								<?php
								if ( ! empty( $map_image ) ) {
									?>
									<img src="<?php echo esc_url( $map_image[0] ); ?>" alt="<?php echo esc_attr( $map ); ?>" />
									<?php
								} else {
									?>
									<span class="img_name btn"><?php echo esc_html( $primary_automation[0] ); ?></span>
									<?php
								}
								?>
								<div class="colum_box"><?php echo $skill_html; ?></div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<div class="content_boxes <?php echo esc_attr( $class_hide_not_data_website ); ?>">
				<h5><?php esc_html_e( 'Website', 'marketingops' ); ?></h5>
				<div class="content_boxed">
					<div class="moc_not_editable_data">
					<a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php echo esc_html( $website ); ?></a>
					</div>
					<div class="moc_editable_data">
						<input type="text" class="inputtext user_website" value="<?php echo esc_attr( $website_val ); ?>" placeholder="https://yourdomain.com">
						<div class="moc_error moc_user_website_err"><span></span></div>
					</div>
				</div>
			</div>
			<div class="content_boxes <?php echo esc_attr( $class_hide_not_data_social_media ); ?>">
				<h5><?php esc_html_e( 'Social media', 'marketingops' ); ?></h5>
				<div class="content_boxed social_icons ">
					<div class="profile_experience notpe">
						<div class="moc_social_link_section">
							<p><?php echo esc_html( $text_empty ); ?></p>
							<?php if ( ! empty( $social_media_arr ) && is_array( $social_media_arr ) ) { ?>
								<?php 
								echo '<div class="moc_not_editable_data">';
									foreach ( $social_media_arr as $key => $social_media ) {
										?>
										<div class="<?php echo esc_html( $social_media['tag'] ); ?>">
											<a href="<?php echo esc_url( $social_media['val'] ); ?>" target="_blank"><?php echo esc_html( $social_media['val'] ); ?></a>
										</div>
									<?php
									}
								echo '</div>';
								echo '<div class="moc_editable_data">';
									foreach ( $social_media_arr as $key => $social_media ) {
										?>
										<div class="exp_inner_sec moc_social_links delete_icon_here">
											<div class="platform platform_left">
												<span class="platform_content">
													<div class="moc_social_icons_div">
														<ul class="social_icons moc_social_icons" id="moc_social_icons">
															<li class="icon_box <?php echo esc_attr( $social_media['tag'] ); ?> active" data-activeicon="<?php echo esc_attr( $social_media['tag'] ); ?>" id="<?php echo esc_attr( $social_media['tag'] ); ?>" ><span></span></li>
															<ul class="social_icons moc_social_icons_list">
																<li class="icon_box facebook" data-icons="facebook" data-socialurl="https://www.facebook.com/john_doe"></li>
																<li class="icon_box twitter" data-icons="twitter" data-socialurl="https://www.twitter.com/john_doe"></li>
																<li class="icon_box insta" data-icons="insta" data-socialurl="https://www.instagram.com/john_doe"></li>
																<li class="icon_box vk" data-icons="vk" data-socialurl="https://www.vk.com/john_doe"></li>
																<li class="icon_box github" data-icons="github" data-socialurl="https://www.github.com/john_doe"></li>
																<li class="icon_box linkedin" data-icons="linkedin" data-socialurl="https://www.linkedin.com/john_doe"></li>
															</ul>
														</ul>
													</div>
													<div class="inputblock profilecontent">
														<input type="text" name="<?php echo $social_icon; ?>" data-label="<?php echo $social_icon; ?>" class="social_input inputtext" value="<?php echo esc_attr( $social_media['val'] ); ?>">
														<div class="moc_error moc_social_links_err"><span></span></div>
													</div>
												</span>
											</div>
											<div class="platform deletesec">
												<input type="button" value="delete" class="btn delete_icon">
											</div>
										</div>
										<?php
									}
								echo '</div>';
							} else {
								?>
								<div class="moc_editable_data">
									<div class="exp_inner_sec moc_social_links delete_icon_here">
										<div class="platform platform_left">
											<span class="platform_content">
												<div class="moc_social_icons_div">
													<ul class="social_icons moc_social_icons" id="moc_social_icons">
														<li class="icon_box insta active" data-activeicon="insta" id="insta" ><span></span></li>
														<ul class="social_icons moc_social_icons_list">
																<li class="icon_box facebook" data-icons="facebook" data-socialurl="https://www.facebook.com/john_doe"></li>
																<li class="icon_box twitter" data-icons="twitter"  data-socialurl="https://www.twitter.com/john_doe"></li>
																<li class="icon_box insta" data-icons="insta" data-socialurl="https://www.instagram.com/john_doe"></li>
																<li class="icon_box vk" data-icons="vk" data-socialurl="https://www.vk.com/john_doe"></li>
																<li class="icon_box github" data-icons="github" data-socialurl="https://www.github.com/john_doe"></li>
																<li class="icon_box linkedin" data-icons="linkedin" data-socialurl="https://www.linkedin.com/john_doe"></li>
														</ul>
													</ul>
												</div>
												<div class="inputblock profilecontent">
													<input type="text" name="" data-label="" class="social_input inputtext" placeholder="https://www.instagram.com/handle">
													<div class="moc_error moc_social_links_err"><span></span></div>
												</div>
											</span>
										</div>
										<div class="platform deletesec">
											<input type="button" value="delete" class="btn delete_icon">
										</div>
									</div>
								</div>
							<?php
								}
							?>
						</div>
						<div class="moc_editable_data">
							<div class="show_more_btn">
								<input type="button" class="add_more_profile_experience add_more_social_media" value="+ Add social media">
								<b class="btn"><?php esc_html_e( '+ Add social media', 'marketingops' ); ?></b>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if ( true === $flag ) {
				?>
				<div class="content_boxes moc_job_seeker_detail_section" style="<?php echo esc_attr( $style_for_js ); ?>">
					<h5><?php echo sprintf( __( '%1$s %2$s(This information is only visible to you and %3$s)%4$s', 'marketingops' ), $job_seeker_fields[0]['label_name'], '<small>', '<a href="'.site_url().'">MarketingOps.com</a>', '</small>' ); ?></h5>
					<div class="content_boxed">
						<div class="moc_not_editable_data">
							<?php echo $job_seeker_val; ?>
						</div>
						<div class="moc_editable_data">
							<select id="moc_job_seeker_details" class="<?php echo esc_attr( $jsd_selected_class ); ?>">
								<option value=""><?php esc_html_e( 'Job Seeker Details', 'marketingops' ); ?></option>
								<?php
								foreach ( $job_options as $job_option ) {
									$option_selected = ( sanitize_title( $job_option ) === sanitize_title( $job_seeker_details ) ) ? 'selected' : '';
									echo '<option value="' . $job_option . '" ' . $option_selected . '>' . esc_html( $job_option ) . '</option>';
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<div class="content_boxes <?php echo esc_attr( $class_hide_not_data_industry_media ); ?>">
				<h5><?php echo esc_html( $ppress_custom_fields[0]['label_name'] ); ?></h5>
				<div class="content_boxed">
					<p><?php echo esc_html( $text_empty_choice ); ?></p>
					<div class="moc_not_editable_data">
						<?php 
						if( ! empty( $checked_industries ) && is_array( $checked_industries ) ) {
							$checked_industries_val = implode( ', ', $checked_industries );
							echo $checked_industries_val;
						}
					echo '</div>';
					echo '<div class="moc_editable_data">';
						foreach ( $option_choices_industries as $option_choices_industry ) {
						?>
							<span class="<?php echo esc_html( $option_choices_industry ); ?> input_checkbox">
								<input type="checkbox" name="industry_experience[]" value="<?php echo esc_html( $option_choices_industry ); ?>" id="<?php echo esc_html( $option_choices_industry ); ?>" <?php echo ( in_array( esc_html( $option_choices_industry ), $checked_industries, true ) ) ? 'checked' : ''; ?> />
								<label for="<?php echo esc_html( $option_choices_industry ); ?>"><?php echo esc_html( $option_choices_industry ); ?></label>
							</span>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_martech_tools_experience_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_user_martech_tools_experience_html( $current_userid, $all_user_meta ) {
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ) {
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}

		$user_all_info        = get_user_meta( $current_userid, 'user_all_info', true );
		$user_all_info        = ( ! empty( $user_all_info ) && is_array( $user_all_info ) ) ? $user_all_info : array();
		$moc_martech_info     = ( ! empty( $user_all_info['moc_martech_info'] ) ) ? $user_all_info['moc_martech_info'] : array();
		$non_empty_text       = '';
		$text_empty           = '';
		if ( false === $flag ) {
			if( empty( $moc_martech_info ) ) {
				$text_empty = $non_empty_text;
			} else {
				$text_empty = '';
			}
		}

		ob_start();
		?>
		<div class="title_with_btn">
			<h3><?php esc_html_e( 'Martech tools experience', 'marketingops' ); ?></h3>
			<?php
			if( is_user_logged_in() && true === $flag ) {
				?>
				<div class="btns">
					<div class="moc_not_editable_data">
						<a href="javascript:void(0);" class="gray_color btn edit_btn moc_user_basic_info_edit_btn moc_martech_edit"><?php esc_html_e( 'Edit', 'marketingops' ); ?></a>
					</div>
					<div class="moc_editable_data">
						<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_user_basic_info_cancel_btn"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
						<a href="javascript:void(0);" class="green_color btn btn_save moc_user_martech_tools_experience_save_btn"><?php esc_html_e( 'Save', 'marketingops' ); ?></a>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<div class="sub_title_with_content">
			<div class="content_boxes">
				<div class="content_boxed">
					<div class="moc_martech_main_section">
						<p><?php echo esc_html( $text_empty ); ?></p>
						<?php
						if ( ! empty( $moc_martech_info ) && is_array( $moc_martech_info ) ) {
							foreach ( $moc_martech_info as $moc_martech_row ) {
								$main_platform_name = $moc_martech_row['platform'];
								$year_experience    = (float) $moc_martech_row['experience'];
								$experience_string  = ( 1 >= $year_experience ) ? $year_experience . ' Year' : $year_experience . ' Years';
								$skill_level        = $moc_martech_row['skill_level'];
								if ( 1 <= $skill_level && 2 > $skill_level ) {
									$skill_level_txt = esc_html__( 'BASIC', 'marketingops' );
									$skill_class     = 'yellow_btn';
									$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
								} elseif ( 2 <= $skill_level && 3 > $skill_level ) {
									$skill_level_txt = esc_html__( 'INTERMEDIATE', 'marketingops' );
									$skill_class     = 'gradient_btn';
									$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '"><span>' .esc_html( $skill_level_txt ) .'</span></a>';
								} elseif ( 3 <= $skill_level && 4 > $skill_level ) {
									$skill_level_txt = esc_html__( 'ADVANCED', 'marketingops' );
									$skill_class     = 'pink_btn';
									$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
								} else {
									$skill_level_txt = esc_html__( 'EXPERT', 'marketingops' );
									$skill_class     = 'blue_btn';
									$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
								}
								$excperience_description = $moc_martech_row['exp_descp'];
								$moc_primary             = ( ! empty( $moc_martech_row['primary_value'] ) && 'yes' === $moc_martech_row['primary_value'] ) ? 'checked' : '';
								$primary_text_class      = ( ! empty( $moc_martech_row['primary_value'] ) && 'yes' === $moc_martech_row['primary_value'] ) ? 'moc_main_platform' : '';
								$primary_text            = ( ! empty( $moc_martech_row['primary_value'] ) && 'yes' === $moc_martech_row['primary_value'] ) ? 'Main platform' : 'Platform';
								?>
								<div class="moc_martech_inner_section">
									<div class="moc_not_editable_data">
										<div class="boxed_three_colum">
											<div class="colum_box">
												<h6 class="<?php echo esc_attr( $primary_text_class ); ?>"><?php echo esc_html( $primary_text ); ?></h6>
												<?php echo esc_html( $main_platform_name ); ?>
											</div>
											<div class="colum_box">
												<h6><?php esc_html_e( 'Experience', 'marketingops' ); ?></h6>
												<?php echo esc_html( $experience_string ); ?>
											</div>
											<div class="colum_box">
												<?php echo $skill_html; ?>
											</div>
										</div>
									</div>
									<div class="moc_editable_data">
										<div class="content_boxes input_radio_btn">
											<div class="content_boxed">
												<span class="input_radio_btn">
													<label class="switch">
														<input type="checkbox" name="main_this_cat" id="main_this_cat" <?php echo $moc_primary; ?>>	
														<span class="slider round"></span>
													</label>
													<span class="text"><?php esc_html_e( 'Make Primary', 'marketingops' ); ?></span>
												</span>
											</div>
										</div>
										<div class="boxed_three_colum">
											<div class="colum_box moc_required_field">
												<h6 class="<?php echo esc_attr( $primary_text_class ); ?>"><?php echo esc_html( $primary_text ); ?></h6>
												<input type="text" name="main_platform" placeholder="Name" class="inputtext" value="<?php echo esc_html( $main_platform_name ); ?>">
												<div class="moc_error moc_user_marktech_platform_err"><span></span></div>
											</div>
											<div class="colum_box moc_required_field">
												<h6><?php esc_html_e( 'Experience', 'marketingops' ); ?></h6>
												<input type="text" name="moc_experience" placeholder="Years" class="inputtext" value="<?php echo esc_html( $year_experience ); ?>">
												<div class="moc_error moc_user_marktech_exp_err"><span></span></div>
											</div>
										<!-- changes here | Some components changes -->
											<div class="colum_box delete_icon_here">
												<div class="platform deletesec">
													<input type="button" value="delete" class="btn delete_icon">
												</div>
											</div>
										</div>
									</div>
									<div class="moc_editable_data">
										<div class="range_slider_box boxed_two_colum">
											<div class="range_slider colum_box">
												<h6><?php esc_html_e( 'Skill level', 'marketingops' ); ?></h6>
												<input class="range_slider_input rangeslider" type="range" name="moc_skill_level" min="1" max="4" step="0.01" labels="1, 2, 3, 4," value="<?php echo esc_html( $skill_level ); ?>">
											</div>
											<div class="colum_box">
												<?php echo $skill_html; ?>
											</div>
										</div>
									</div>
									<div class="moc_not_editable_data">
										<?php echo esc_html( $excperience_description ); ?>
									</div>
									<div class="moc_editable_data">
										<textarea name="moc_exp_description" class="inputtext textarea_2 moc_exp_description" placeholder="Say a few words about your experience"><?php echo esc_html( $excperience_description ); ?></textarea>
									</div>
								</div>
								<hr /> 
							<?php
							}
						}
						?>
					</div>
					<div class="moc_editable_data">
						<div class="show_more_btn">
							<h6><?php esc_html_e( 'Additional platforms', 'marketingops' ); ?></h6>
							<input type="button" class="add_more_profile_experience add_more_martech_section" value="+ Add platform">
							<b class="btn"><?php esc_html_e( '+ Add platform', 'marketingops' ); ?></b>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_skill_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_user_skill_html( $current_userid, $all_user_meta ) {

		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		$user_all_info           = get_user_meta( $current_userid, 'user_all_info', true );
		$moc_martech_info        = ! empty( $user_all_info['moc_cl_skill_info'] ) ? $user_all_info['moc_cl_skill_info'] : array();
		$non_empty_text          = '';
		$text_empty = '';
		if ( false === $flag ) {
			if( empty( $moc_martech_info ) ) {
				$text_empty = $non_empty_text;
			} else {
				$text_empty = '';
			}
		}
		?>
			<div class="title_with_btn">
				<h3><?php esc_html_e( 'Skills', 'marketingops' ); ?></h3>
				<?php
				if( is_user_logged_in() && true === $flag ) {
					?>
					<div class="btns">
						<div class="moc_not_editable_data">
							<a href="javascript:void(0);" class="gray_color btn edit_btn moc_user_basic_info_edit_btn"><?php esc_html_e( 'Edit', 'marketingops' ); ?></a>
						</div>
						<div class="moc_editable_data">
							<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_user_basic_info_cancel_btn"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
							<a href="javascript:void(0);" class="green_color btn btn_save moc_user_skill_save_btn"><?php esc_html_e( 'Save', 'marketingops' ); ?></a>
						</div>
					</div>
				<?php
				}
				?>
			</div>
			<div class="sub_title_with_content">
				<p><?php echo esc_html( $text_empty ); ?></p>
				<div class="content_boxes">
					<div class="content_boxed">
						<div class="moc_skill_main_section">
							<?php 
								if ( ! empty( $moc_martech_info ) && is_array( $moc_martech_info ) ) {
									foreach ( $moc_martech_info as $moc_martech_row ) {
										$main_platform_name      = $moc_martech_row['cl_platform'];
										$year_experience         = ( float )$moc_martech_row['cl_experience'];
										$experience_string       = ( 1 >= $year_experience ) ? $year_experience . ' Year' : $year_experience . ' Years';
										$skill_level             = $moc_martech_row['cl_skill_level'];
										if ( 1 <= $skill_level && 2 > $skill_level ) {
											$skill_level_txt = esc_html__( 'BASIC', 'marketingops' );
											$skill_class     = 'yellow_btn';
											$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
										} elseif ( 2 <= $skill_level && 3 > $skill_level ) {
											$skill_level_txt = esc_html__( 'INTERMEDIATE', 'marketingops' );
											$skill_class     = 'gradient_btn';
											$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '"><span>' .esc_html( $skill_level_txt ) .'</span></a>';
										} elseif ( 3 <= $skill_level && 4 > $skill_level ) {
											$skill_level_txt = esc_html__( 'ADVANCED', 'marketingops' );
											$skill_class     = 'pink_btn';
											$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
										} else {
											$skill_level_txt = esc_html__( 'EXPERT', 'marketingops' );
											$skill_class     = 'blue_btn';
											$skill_html      = '<a id="' . $skill_class . '" class="expert_btn btn ' . esc_attr( $skill_class ) . '">' .esc_html( $skill_level_txt ) .'</a>';
										}
										?>
										<div class="moc_inner_skill_section">
											<div class="moc_not_editable_data">
												<div class="boxed_three_colum">
													<div class="colum_box">
														<h6><?php esc_html_e( 'Skill', 'marketingops' ); ?></h6>
														<?php echo esc_html( $main_platform_name ); ?>
													</div>
													<div class="colum_box">
														<h6><?php esc_html_e( 'Experience', 'marketingops' ); ?></h6>
														<?php echo esc_html( $experience_string ); ?>
													</div>
													<div class="colum_box">
														<?php echo $skill_html; ?>
													</div>
												</div>
											</div>
											<div class="moc_editable_data">
												<div class="boxed_three_colum">
													<div class="colum_box moc_required_field">
														<h6><?php esc_html_e( 'Skill', 'marketingops' ); ?></h6>
														<input type="text" name="moc_coding_language" class="inputtext" value="<?php echo esc_html( $main_platform_name ); ?>" placeholder="Name">
														<div class="moc_error moc_user_cl_err"><span></span></div>
													</div>
													<div class="colum_box moc_required_field">
														<h6><?php esc_html_e( 'Experience', 'marketingops' ); ?></h6>
														<input type="text" name="moc_cl_experience" class="inputtext" value="<?php echo esc_html( $year_experience ); ?>" placeholder="Years">
														<div class="moc_error moc_user_cl_exp_err"><span></span></div>
													</div>
													<!-- changes here | Some components changes -->
													<div class="colum_box delete_icon_here">
														<div class="platform deletesec">
															<input type="button" value="delete" class="btn delete_icon">
														</div>
													</div>
												</div>
											</div>
											<div class="moc_editable_data">
												<div class="range_slider_box boxed_two_colum">
													<div class="range_slider colum_box">
														<h6><?php esc_html_e( 'Skill level', 'marketingops' ); ?></h6>
														<input class="range_slider_input rangeslider" type="range" name="moc_cl_skill_level" min="1" max="4" step="0.01" labels="1, 2, 3, 4," value="<?php echo esc_html( $skill_level ); ?>">
													</div>
													<div class="colum_box">
														<?php echo $skill_html; ?>
													</div>
												</div>
											</div>
											<hr />
										</div>
										
									<?php
									}
								}
							?>
						</div>
						<div class="moc_editable_data">
							<div class="show_more_btn">
								<input type="button" class="add_more_profile_experience add_more_skill_section" value="<?php esc_attr_e( '+ Add skill', 'marketingops' ); ?>">
								<b class="btn"><?php esc_html_e( '+ Add skill', 'marketingops' ); ?></b>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_work_section_html' ) ) {
	/**
	 * Get the User Martech tools experience HTML for Edit Profile.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_user_work_section_html( $current_userid, $all_user_meta ) {
		// die("pooop");
		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		$user_all_info  = get_user_meta( $current_userid, 'user_all_info', true );
		$moc_work_data  = ! empty( $user_all_info['moc_work_data'] ) ? $user_all_info['moc_work_data'] : array();
		$non_empty_text = '';
		$text_empty = '';
		if ( false === $flag ) {
			if( empty( $moc_work_data ) ) {
				$text_empty = $non_empty_text;
			} else {
				$text_empty = '';
			}
		}
		// debug( $moc_work_data );
		// die;
		?>
		
		<div class="moc_inner_work_section_container">
			<div class="title_with_btn">
				<h3><?php esc_html_e( 'Work history', 'marketingops' ); ?></h3>
				<?php
				if( is_user_logged_in() && true === $flag ) {
					?>
					<div class="btns">
						<div class="moc_not_editable_data">
							<a href="javascript:void(0);" class="gray_color btn edit_btn moc_user_basic_info_edit_btn moc_user_work_section_edit_btn"><?php esc_html_e( 'Edit', 'marketingops' ); ?></a>
						</div>
						<div class="moc_editable_data">
							<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_user_basic_info_cancel_btn"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
							<a href="javascript:void(0);" class="green_color btn btn_save moc_user_work_section_save_btn"><?php esc_html_e( 'Save', 'marketingops' ); ?></a>
						</div>
					</div>
				<?php
				}
				?>
			</div>
			<div class="sub_title_with_content">
				<div class="content_boxes">
					<div class="content_boxed">
						<div class="moc_work_main_section">
							<div class="moc_inner_work_section">
								<p><?php echo esc_html( $text_empty ); ?></p>
								<div class="moc_editable_data">
									<div class="moc_repeated_work_section_container">
										<?php
										foreach ( $moc_work_data as $key=>$moc_work_info ) {
											$company_name            = ! empty( $moc_work_info['work_company'] ) ? $moc_work_info['work_company'] : '';
											$position                = ! empty ( $moc_work_info['work_position'] ) ? $moc_work_info['work_position'] : '';
											$work_moc_start_mm       = ! empty( $moc_work_info['work_moc_start_mm'] ) ? $moc_work_info['work_moc_start_mm'] : '';
											$work_moc_start_mm       = ( int )$work_moc_start_mm;
											$work_moc_start_yyyy     = ! empty( $moc_work_info['work_moc_start_yyyy'] ) ? $moc_work_info['work_moc_start_yyyy'] : '';
											$work_moc_start_yyyy     = ( int )$work_moc_start_yyyy;
											$work_moc_end_mm         = ! empty( $moc_work_info['work_moc_end_mm'] ) ? $moc_work_info['work_moc_end_mm'] : '';
											$work_moc_end_mm         = ( int )$work_moc_end_mm;
											$work_moc_end_yyyy       = ! empty( $moc_work_info['work_moc_end_yyyy'] ) ? $moc_work_info['work_moc_end_yyyy'] : '';
											$work_moc_end_yyyy       = ( int )$work_moc_end_yyyy;
											$website                 = ! empty( $moc_work_info['work_website'] ) ? $moc_work_info['work_website'] : '';
											$moc_at_present_val      = ! empty( $moc_work_info['moc_at_present_val'] ) ? $moc_work_info['moc_at_present_val'] : '';
											?>
											<div class="moc_repeated_work_section">
												<div class="boxed_three_colum">
													<div class="colum_box colum_box_1 moc_required_field">
														<h6><?php esc_html_e( 'Company', 'marketingops' ); ?></h6>
														<input type="text" name="moc_work_company" class="inputtext" placeholder="Company" value="<?php echo esc_html( $company_name ); ?>">
														<div class="moc_error moc_user_work_company_err"><span></span></div>
													</div>
													<div class="colum_box delete_icon_here">
														<div class="platform deletesec">
															<input type="button" value="delete" class="btn delete_icon">
														</div>
													</div>
													<div class="colum_box colum_box_3 moc_required_field">
														<h6><?php esc_html_e( 'Position', 'marketingops' ); ?></h6>
														<input type="text" name="moc_work_position" placeholder="In this company" class="inputtext" value="<?php echo esc_html( $position ); ?>">
														<div class="moc_error moc_user_work_company_pos_err"><span></span></div>
													</div>
													<div class="colum_box colum_box_4 moc_required_field">
														<h6><?php esc_html_e( 'Years', 'marketingops' ); ?></h6>
														<!-- <div class="years_month">
															<input type="text" name="moc_work_company_start_md" placeholder="MM/YY" class="inputtext" value="<?php echo esc_html( $start_month_year ); ?>">
															<?php 
															$at_present_class = ( 'yes' !== $moc_at_present_val ) ? 'moc_display_end_date' : 'moc_not_display_end_date';
															?>
															<span class="<?php echo esc_attr( $at_present_class ); ?>"></span>
															<input type="text" name="moc_work_company_end_md" placeholder="MM/YY" class="inputtext <?php echo esc_attr( $at_present_class ); ?>" value="<?php echo esc_html( $end_month_year ); ?>">
														</div> -->
														<div class="years_month">
															<!-- Start Year Dropdown Box -->
															<div class="date_dropbox start_year">
															  	<!-- MM Box -->
															  	<div class="dropbox_box start_month_div">
																	<!-- MM Value -->
																	<select class="moc_start_month">
																		<option value=""><?php esc_html_e( 'MM', 'marketingops' )?></option>
																		<?php 
																		$month_array = moc_months_array();
																		foreach( $month_array as $key=>$month  ) {
																			?>
																			<option value="<?php echo esc_attr( $key ); ?>" <?php echo ( $key === $work_moc_start_mm ) ? 'selected' : ''; ?> ><?php echo esc_attr( $month ); ?></option>
																		<?php
																		}
																		?>
																	</select>
															  	</div>
																<p><?php esc_attr_e( '/', 'marketingops' ); ?></p>  
															  	<!-- YY Box -->
															  	<div class="dropbox_box start_year_div">
																	<!-- MM Value -->
																	<select class="moc_start_year">
																		<option value=""><?php esc_html_e( 'YYYY', 'marketingops' )?></option>
																		<?php
																		$get_current_year = date("Y");
																 		for( $i = 1970; $i <= 					$get_current_year; $i++ ) {
																			?>
																			<option value="<?php echo esc_attr( $i ); ?>" <?php echo ( $i === $work_moc_start_yyyy ) ? 'selected' : ''; ?> ><?php echo esc_attr( $i ); ?></option>
																	 		<?php
																	 	}
																  		?>
																	</select>
															  	</div>
															</div>
															<?php 
															$at_present_class = ( 'yes' !== $moc_at_present_val ) ? 'moc_display_end_date' : 'moc_not_display_end_date';
															?>
															<span class="<?php echo esc_attr( $at_present_class ); ?> moc-seprator"></span>
															<!-- End Year Dropdown Box -->
															<div class="date_dropbox end_year disabled <?php echo esc_attr( $at_present_class ); ?>">
																<!-- MM Box -->
																<div class="dropbox_box end_month_div">
																  	<!-- MM Value -->
																  	<select class="moc_end_month">
																  		<option value=""><?php esc_html_e( 'MM', 'marketingops' )?></option>
																  		<?php 
																		$month_array = moc_months_array();
																		foreach( $month_array as $key=>$month  ) {
																			?>
																			<option value="<?php echo esc_attr( $key ); ?>" <?php echo ( $key === $work_moc_end_mm ) ? 'selected' : ''; ?> ><?php echo esc_attr( $month ); ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																<p><?php esc_attr_e( '/', 'marketingops' ); ?></p>
																<!-- YY Box -->
																<div class="dropbox_box end_year_div">
																  	<!-- MM Value -->
																  	<select class="moc_end_year">
																		<option value=""><?php esc_html_e( 'YYYY', 'marketingops' )?></option>
																		<?php
																		$get_current_year = date("Y");
																		for( $i = 1970; $i <= 	$get_current_year; $i++ ) {
																			?>
																			<option value="<?php echo esc_attr( $i ); ?>" <?php echo ( $i === $work_moc_end_yyyy ) ? 'selected' : ''; ?> ><?php echo esc_attr( $i ); ?></option>
																			<?php
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="moc_error moc_wrong_month_err"><span></span></div>
														</div>
													</div>
													<div class="colum_box colum_box_5">
														<div class="input_checkbox">
															<input type="checkbox" name="moc_at_present" class="moc_at_present" value="<?php echo esc_html( $moc_at_present_val ); ?>" <?php echo ( 'yes' === $moc_at_present_val ) ? 'checked': '';?> />
															<label><?php esc_html_e( 'Present', 'marketingops' ); ?></label>
														</div>
														
													</div>
													<div class="colum_box colum_box_6 moc_required_field">
														<h6><?php esc_html_e( 'Website', 'marketingops' ); ?></h6>
														<input type="text" name="moc_work_website" placeholder="https://example.com" class="inputtext" value="<?php echo esc_html( $website ); ?>">
														<div class="moc_error moc_user_work_company_website_err"><span></span></div>
													</div>
												</div>
												<hr />
											</div>
											<?php
											}
											?>
									</div>
									<div class="show_more_btn">
										<input type="button" class="add_more_profile_experience add_more_work_section" value="+ Add another company">
										<b class="btn"><?php esc_html_e( '+ Add another company', 'marketingops' ); ?></b>
									</div>
								</div>
								<div class="moc_not_editable_data">
									<div class="boxed_two_colum boxed_three_colum">
										<?php
										if ( ! empty( $moc_work_data ) && is_array( $moc_work_data ) ) {
											foreach ( $moc_work_data as $moc_work_info ) {
												$company_name            = ! empty( $moc_work_info['work_company'] ) ? $moc_work_info['work_company'] : '';
												$position                = ! empty ( $moc_work_info['work_position'] ) ? $moc_work_info['work_position'] : '';
												$work_moc_start_mm       = ! empty( $moc_work_info['work_moc_start_mm'] ) ? $moc_work_info['work_moc_start_mm'] : '';
												$work_moc_start_yyyy     = ! empty( $moc_work_info['work_moc_start_yyyy'] ) ? $moc_work_info['work_moc_start_yyyy'] : '';
												$work_moc_end_mm         = ! empty( $moc_work_info['work_moc_end_mm'] ) ? $moc_work_info['work_moc_end_mm'] : '';
												$work_moc_end_yyyy       = ! empty( $moc_work_info['work_moc_end_yyyy'] ) ? $moc_work_info['work_moc_end_yyyy'] : '';
												$website                 = ! empty( $moc_work_info['work_website'] ) ? $moc_work_info['work_website'] : '';
												$moc_at_present_val      = ! empty( $moc_work_info['moc_at_present_val'] ) ? $moc_work_info['moc_at_present_val'] : '';
												$moc_at_present_sting    = ( 'yes' === $moc_at_present_val ) ? __( 'until today', 'marketingops' ) : '';
												$start_date_obj    = DateTime::createFromFormat( '!m', $work_moc_start_mm );
												$start_month_name  = $start_date_obj->format('M');
												if ( 'yes' == $moc_at_present_val ) {
													$end_year_string = $moc_at_present_sting;
												} else if( 'yes' !== $moc_at_present_val && !empty( $work_moc_end_mm ) ) {
													$end_date_obj      = DateTime::createFromFormat( '!m', $work_moc_end_mm );
													// debug( $end_date_obj );
													// die("poop");
													$end_month_name    = $end_date_obj->format('M');
													$end_year_string   = $end_month_name . ' ' . $work_moc_end_yyyy;	
												}
												$start_year_string = $start_month_name . ' ' . $work_moc_start_yyyy;
												
												?>
												<div class="colum_box">
													<h6><?php esc_html_e( 'Company', 'marketingops' ); ?></h6>
													<p><?php echo esc_html( $company_name ); ?></p>
												</div>
												<div class="colum_box">
													<h6><?php esc_html_e( 'Website', 'marketingops' ); ?></h6>
													<p><a href="<?php echo esc_html( $website ); ?>" target="_blank"><?php echo esc_html( $website ); ?></p></a>
												</div>
												<div class="colum_box">
													<h6><?php esc_html_e( 'Position', 'marketingops' ); ?></h6>
													<p><?php echo esc_html( $position ); ?></p>
												</div>
												<div class="colum_box">
													<h6><?php esc_html_e( 'Years', 'marketingops' ); ?></h6>
													<p><?php echo esc_html( $start_year_string ); ?> - <?php echo esc_html( $end_year_string ); ?></p>
												</div>
												<hr />
											<?php
											}
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_public_user_profie_user_id' ) ) {
	/**
	 * Get the User ID by Different User based on URL.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_get_public_user_profie_user_id() {
		global $wpdb, $wp_query;
		$url_slug_array   = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
		$url_segments_arr = explode( '/', $url_slug_array );
		$url_user_name    = '';

		if ( ! empty( $wp_query->query['who'] ) ) {
			$url_user_name = $wp_query->query['who'];
		} else {
			$current_user_id   = get_current_user_id();
			$current_user_data = get_userdata( $current_user_id );
			$url_user_name     = ( ! empty( $current_user_data->data->user_nicename ) ) ? $current_user_data->data->user_nicename : '';
		}

		$get_appoinment_user_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE user_nicename = %s', array( $url_user_name ) ), ARRAY_A );
		$profile_view_user_id      = ! empty( $get_appoinment_user_query ) ? (int) $get_appoinment_user_query[0]['ID'] : get_current_user_id();
		return $profile_view_user_id;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_use_id_by_author_name' ) ) {
	/**
	 * Get the User ID by Different User based on URL.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_get_use_id_by_author_name( $author_name ) {
		global $wpdb;

		// Return false if author name is empty.
		if ( empty( $author_name ) ) {
			return false;
		}

		$user_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE user_nicename = %s', array( $author_name ) ), ARRAY_A );
		$user_id    = ! empty( $user_query ) ? (int) $user_query[0]['ID'] : 0;
		return $user_id;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_user_avtar_image' ) ) {
	/**
	 * Get the User Avatar Image.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_user_avtar_image( $current_userid ) {

		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;

		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}

		$default_author_img = get_field( 'moc_user_default_image', 'option' );
		$author_img_id      = ! empty( get_user_meta( $current_userid, 'wp_user_avatar', true ) ) ? get_user_meta( $current_userid, 'wp_user_avatar', true ) : '';
		$author_img_url     = ( empty( $author_img_id ) || false === $author_img_id ) ? $default_author_img : wp_get_attachment_url( $author_img_id );
		?>
		<div class="box_avatar_content box_about_content box_content">
			<div class="title_with_btn avatar_title">
				<?php
				if ( is_user_logged_in() && true === $flag ) {
					?>
					<h3><?php esc_html_e( 'Avatar', 'marketingops' ); ?></h3>
					<div class="table_info">
						<span class="svg">
							<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M7 0C3.1339 0 0 3.1339 0 7C0 10.8661 3.1339 14 7 14C10.8661 14 14 10.8661 14 7C14 3.1339 10.8661 0 7 0ZM7.7 10.5H6.3V6.3H7.7V10.5ZM7.7 4.9H6.3V3.5H7.7V4.9Z" fill="#6D7B83"></path>
							</svg>                            
						</span>
						<div class="info_box">
							<span><?php esc_html_e( 'Please provide a picture of min. 212*212px and max. 512*512px for better profile views.', 'marketingops' ); ?></span>
						</div>
					</div>
					<?php
					}
				?>
			</div>
			<div class="sub_title_with_content">
				<div class="profile_img">
					<img class="moc_profile_img" src="<?php echo esc_url( $author_img_url ); ?>" alt="profile_img" width="211" height="211" />
					<?php
					if ( is_user_logged_in() && true === $flag ) {
						?>
						<!-- <span class="profile-process-bar" data-progress="67">
							<span class="circle"></span>
							<span class="progress-left progress-boxed">
							  <span class="progress-bar"></span>
							</span>
							<span class="progress-right progress-boxed">
							  <span class="progress-bar"></span>
							</span>
						</span> -->
						<div class="file_upload_btn">
							<input type="file" class="moc_avtar_image_upload">
							<span>
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.42871 4.25L8.96454 0.714167C9.28993 0.38878 9.81749 0.388779 10.1429 0.714167C10.4683 1.03955 10.4683 1.56711 10.1429 1.8925L6.60704 5.42833L10.1429 8.96417C10.4683 9.28956 10.4683 9.81711 10.1429 10.1425C9.81749 10.4679 9.28993 10.4679 8.96454 10.1425L5.42871 6.60667L1.89288 10.1425C1.56749 10.4679 1.03993 10.4679 0.714544 10.1425C0.389156 9.81711 0.389155 9.28956 0.714543 8.96417L4.25038 5.42833L0.714544 1.8925C0.389156 1.56711 0.389156 1.03955 0.714544 0.714167C1.03993 0.388779 1.56749 0.38878 1.89288 0.714167L5.42871 4.25Z" fill="url(#paint0_linear_2365_4013)"></path><defs><linearGradient id="paint0_linear_2365_4013" x1="0.469369" y1="0.514539" x2="15.688" y2="15.7331" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"></stop><stop offset="1" stop-color="#4D00AE"></stop></linearGradient></defs></svg>
							</span>
							<img id="hiddenProfileImg" class="card-img-top" src="" style="display:none;">
						</div>
					<?php
					}
					?>
				</div>
				<?php
					if ( true === $flag ) {
						?>
						<!-- <div class="profile_name">
							<h5><?php esc_html_e( 'Profile completeness: ', 'marketingops' ); ?><span><?php esc_html_e( '67%', 'marketingops' ); ?></span></h5>
						</div> -->
					<?php
					}
				?>
			</div>
		</div>
	<?php
		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_member_directory_user_block_html' ) ) {
	/**
	 * Get the user block html displayed on the member directory page.
	 *
	 * @param array $user_id User id.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_member_directory_user_block_html( $user_id ) {
		$author_info         = get_userdata( $user_id );
		$all_user_meta       = get_user_meta( $user_id );
		$user_all_info       = get_user_meta( $user_id, 'user_all_info', true );
		$moc_martech_info    = $user_all_info['moc_martech_info'];
		$moc_experience      = array();

		foreach ( $moc_martech_info as $moc_martech ) {
			if ( 'yes' === $moc_martech['primary_value'] ) {
				$moc_experience['years']    = sprintf( _n( '%s year', '%s years', $moc_martech['experience'], 'marketingops' ), $moc_martech['experience'] );
				$moc_experience['platform'] = $moc_martech['platform'];
				break;
			}
		}

		$firstname          = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname           = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name  = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$profile_url        = site_url(). '/profile/'.$author_info->data->user_nicename;
		$description        = get_user_meta( $user_id, 'description', true );
		$short_title        = get_user_meta( $user_id, 'short_title', true );
		$author_img_id      = get_user_meta( $user_id, 'wp_user_avatar', true );
		$default_author_img = get_field( 'moc_user_default_image', 'option' );
		$author_img_url    = ( empty( $author_img_id ) || false === $author_img_id ) ? $default_author_img : wp_get_attachment_url( $author_img_id );

		// Start preparing the HTML.
		ob_start();
		?>
		<li>
			<div class="memberleft">
				<a class="profileimg" title="<?php echo wp_kses_post( $user_display_name ); ?>" href="<?php echo esc_url( $profile_url ); ?>">
					<img data-del="avatar" src="<?php echo esc_url( $author_img_url ); ?>" class="avatar pp-user-avatar avatar-800 photo" height="800" width="800">
				</a>
				<!-- <div class="m-social-icon">
					<ul>
						<li><a href=""><img src="/wp-content/themes/marketingops/images/social_icons/twitter.svg"></a></li>
						<li><a href=""><img src="/wp-content/themes/marketingops/images/social_icons/linkdin.svg"></a></li>
					</ul>
				</div> -->
			</div>
			<div class="memberright">
				<a title="<?php echo wp_kses_post( $user_display_name ); ?>" class="profileimg" href="<?php echo esc_url( $profile_url ); ?>">
					<h3><?php echo wp_kses_post( $user_display_name ); ?></h3>
				</a>
				<div class="memberposition"><?php echo wp_kses_post( $short_title ); ?></div>
				<div class="memberexcerpt"><?php echo wp_kses_post( truncate( $description, 150 ) ); ?></div>
				<div class="membermeta">
					<span class="pleft">
						<?php if ( ! empty( $moc_experience['years'] ) ) { ?>
							<img class="meta_img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/timer.png' ); ?>" />
							<?php echo esc_html( $moc_experience['years'] ); ?>
						<?php } ?>
					</span>
					<span class="pright">
						<?php if ( ! empty( $moc_experience['platform'] ) ) { ?>
							<img class="meta_img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/target.png' ); ?>" />
							<div class="experiencemeta"><?php echo esc_html( ( ! empty( $moc_experience['platform'] ) ) ? $moc_experience['platform'] : '' ); ?></div>
						<?php } ?>
					</span>
				</div>
			</div>
		</li>
		<?php
		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_member_directory_user_block_html_new' ) ) {
	/**
	 * Get the user block html displayed on the member directory page.
	 *
	 * @param array $user_id User id.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_member_directory_user_block_html_new( $user_id ) {
		$author_info         = get_userdata( $user_id );
		$all_user_meta       = get_user_meta( $user_id );
		$user_all_info       = get_user_meta( $user_id, 'user_all_info', true );
		$moc_martech_info    = $user_all_info['moc_martech_info'];
		$moc_experience      = array();

		foreach ( $moc_martech_info as $moc_martech ) {
			if ( 'yes' === $moc_martech['primary_value'] ) {
				$moc_experience['years']    = sprintf( _n( '%s year', '%s years', $moc_martech['experience'], 'marketingops' ), $moc_martech['experience'] );
				$moc_experience['platform'] = $moc_martech['platform'];
				break;
			}
		}

		if ( '43.249.228.71' === $_SERVER['REMOTE_ADDR'] || '183.82.162.55' === $_SERVER['REMOTE_ADDR'] ) {
			$moc_experience['years']    = '10 years';
			$moc_experience['platform'] = 'Hubspot';
		}

		$firstname          = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname           = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name  = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$profile_url        = site_url(). '/profile/'.$author_info->data->user_nicename;
		$description        = get_user_meta( $user_id, 'description', true );
		$short_title        = get_user_meta( $user_id, 'short_title', true );
		$author_img_id      = get_user_meta( $user_id, 'wp_user_avatar', true );
		$default_author_img = get_field( 'moc_user_default_image', 'option' );
		$author_img_url    = ( empty( $author_img_id ) || false === $author_img_id ) ? $default_author_img : wp_get_attachment_url( $author_img_id );

		// Start preparing the HTML.
		ob_start();
		?>
		<li class="hello-world-new inner-member-directory">
			<div class="memberleft">
				<a class="profileimg" title="<?php echo wp_kses_post( $user_display_name ); ?>" href="<?php echo esc_url( $profile_url ); ?>">
					<img data-del="avatar" src="<?php echo esc_url( $author_img_url ); ?>" class="avatar pp-user-avatar avatar-800 photo" height="800" width="800">
				</a>
			</div>
			<div class="memberright">
				<a title="<?php echo wp_kses_post( $user_display_name ); ?>" class="profileimg" href="<?php echo esc_url( $profile_url ); ?>">
					<h3><?php echo wp_kses_post( $user_display_name ); ?></h3>
				</a>
				<div class="memberposition"><?php echo wp_kses_post( $short_title ); ?></div>
				<div class="memberexcerpt"><?php echo wp_kses_post( truncate( $description, 150 ) ); ?></div>
				<div class="membermeta">
					<span class="pleft">
						<?php if ( ! empty( $moc_experience['years'] ) ) { ?>
							<img class="meta_img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/timer.png' ); ?>" />
							<?php echo esc_html( $moc_experience['years'] ); ?>
						<?php } ?>
					</span>
					<span class="pright">
						<?php if ( ! empty( $moc_experience['platform'] ) ) { ?>
							<img class="meta_img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/target.png' ); ?>" />
							<div class="experiencemeta"><?php echo esc_html( ( ! empty( $moc_experience['platform'] ) ) ? $moc_experience['platform'] : '' ); ?></div>
						<?php } ?>
					</span>
				</div>
			</div>
			<div class="member-bottom-post">
				<div class="left-blog"><a class="open-restriction-modal member-overlay-popup" href="#">9 Blogs</a></div>
				<div class="right-podcast"><a class="open-restriction-modal member-overlay-popup" href="#">4 Podcast</a></div>
			</div>
			
		</li>
		<div class="main-member-b-p-popup">
				<div class="container">
					<div class="moc_popup_close popup_close">
						<a href="#">
						<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L8 8L1 15" stroke="white" stroke-width="1.3"></path>
						<path d="M15 1L8 8L15 15" stroke="white" stroke-width="1.3"></path>
						</svg>
						</a>
					</div>
					<div class="content-box">
						<div class="left-blogs">
							<div class="content_boxes">
								<div class="boxes_svg_icon">
									<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.25 0.5C3.734 0.5 2.5 1.7335 2.5 3.25V14.25C2.5 15.7665 3.734 17 5.25 17H13.25C14.766 17 16 15.7665 16 14.25V7.5H11.0186C9.90555 7.5 9 6.59397 9 5.48047V0.5H5.25ZM10.5 0.939453V5.48145C10.5 5.76745 10.7326 6 11.0186 6H15.5605L10.5 0.939453ZM1.5 3L0.890625 3.40625C0.334125 3.77725 0 4.40181 0 5.07031V14.75C0 17.3735 2.1265 19.5 4.75 19.5H11.4297C12.0987 19.5 12.7233 19.1659 13.0938 18.6094L13.5 18H4.75C2.955 18 1.5 16.545 1.5 14.75V3ZM6.75 9.5H11.75C12.164 9.5 12.5 9.8355 12.5 10.25C12.5 10.6645 12.164 11 11.75 11H6.75C6.336 11 6 10.6645 6 10.25C6 9.8355 6.336 9.5 6.75 9.5ZM6.75 12.5H11.75C12.164 12.5 12.5 12.8355 12.5 13.25C12.5 13.6645 12.164 14 11.75 14H6.75C6.336 14 6 13.6645 6 13.25C6 12.8355 6.336 12.5 6.75 12.5Z" fill="#6D7B83"></path>
									</svg>
								</div>
								<div class="boxes_title_and_content">
									<h5>Marketing Automation Platform Comparison Template</h5>
									<div class="date_btn">
										<span class="date">Mar 09 2023</span>
										<a href="/marketing-automation-platform-comparison-template/">
											<span class="text">Read</span>
										</a>
									</div>
								</div>	
							</div>
						</div>
						<div class="right-blogpost">
							<div class="content_boxes">
									<div class="boxes_svg_icon">
									<svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10 0.5C4.76217 0.5 0.5 4.76217 0.5 10C0.5 13.0967 1.98719 15.857 4.28613 17.5898C4.56486 17.7997 4.85536 17.9949 5.15625 18.1738C5.24096 18.2268 5.33539 18.2622 5.434 18.2782C5.53261 18.2941 5.63341 18.2902 5.73049 18.2667C5.82757 18.2431 5.91897 18.2005 5.99932 18.1411C6.07968 18.0818 6.14737 18.007 6.19843 17.9211C6.24948 17.8353 6.28288 17.7401 6.29665 17.6411C6.31042 17.5422 6.30429 17.4415 6.27862 17.345C6.25295 17.2484 6.20826 17.158 6.14717 17.079C6.08607 17 6.00981 16.9339 5.92285 16.8848C5.66875 16.7337 5.42375 16.5687 5.18848 16.3916C3.25142 14.9315 2 12.6173 2 10C2 5.57283 5.57283 2 10 2C14.4272 2 18 5.57283 18 10C18 12.6348 16.732 14.9631 14.7725 16.4219V16.4209C14.5327 16.5994 14.2817 16.7656 14.0225 16.917C13.9354 16.9656 13.859 17.0312 13.7976 17.1097C13.7361 17.1883 13.691 17.2783 13.6648 17.3745C13.6386 17.4707 13.6318 17.5712 13.6449 17.67C13.6579 17.7689 13.6906 17.8641 13.7409 17.9502C13.7912 18.0363 13.8582 18.1115 13.9379 18.1714C14.0176 18.2313 14.1085 18.2747 14.2052 18.299C14.3018 18.3234 14.4024 18.3283 14.501 18.3133C14.5996 18.2983 14.6942 18.2639 14.7793 18.2119C15.087 18.0323 15.3837 17.8365 15.668 17.625C17.9934 15.8938 19.5 13.1172 19.5 10C19.5 4.76217 15.2378 0.5 10 0.5ZM10 3.5C6.41913 3.5 3.5 6.41913 3.5 10C3.5 11.7906 4.22792 13.4213 5.40332 14.5967C5.47243 14.6687 5.55521 14.7261 5.6468 14.7657C5.7384 14.8053 5.83697 14.8262 5.93676 14.8272C6.03654 14.8283 6.13552 14.8093 6.2279 14.7716C6.32028 14.7339 6.40421 14.6781 6.47477 14.6076C6.54533 14.537 6.6011 14.4531 6.63882 14.3607C6.67654 14.2683 6.69544 14.1693 6.69442 14.0696C6.69341 13.9698 6.67249 13.8712 6.63291 13.7796C6.59332 13.688 6.53585 13.6052 6.46387 13.5361C5.55826 12.6305 5 11.3854 5 10C5 7.22987 7.22987 5 10 5C12.7701 5 15 7.22987 15 10C15 11.3854 14.4417 12.6305 13.5361 13.5361C13.4642 13.6052 13.4067 13.688 13.3671 13.7796C13.3275 13.8712 13.3066 13.9698 13.3056 14.0696C13.3046 14.1693 13.3235 14.2683 13.3612 14.3607C13.3989 14.4531 13.4547 14.537 13.5252 14.6076C13.5958 14.6781 13.6797 14.7339 13.7721 14.7716C13.8645 14.8093 13.9635 14.8283 14.0632 14.8272C14.163 14.8262 14.2616 14.8053 14.3532 14.7657C14.4448 14.7261 14.5276 14.6687 14.5967 14.5967C15.7721 13.4213 16.5 11.7906 16.5 10C16.5 6.41913 13.5809 3.5 10 3.5ZM10 7.5C9.33696 7.5 8.70107 7.76339 8.23223 8.23223C7.76339 8.70107 7.5 9.33696 7.5 10C7.5 10.663 7.76339 11.2989 8.23223 11.7678C8.70107 12.2366 9.33696 12.5 10 12.5C10.663 12.5 11.2989 12.2366 11.7678 11.7678C12.2366 11.2989 12.5 10.663 12.5 10C12.5 9.33696 12.2366 8.70107 11.7678 8.23223C11.2989 7.76339 10.663 7.5 10 7.5ZM10 13.5C8.6215 13.5 7.5 14.6514 7.5 16.0674C7.5 16.2079 7.51118 16.3502 7.53418 16.4912C7.53718 16.5342 7.54419 16.5766 7.55469 16.6191L8.5293 20.5234C8.6693 21.2344 9.2875 21.75 10 21.75C10.711 21.75 11.3299 21.2346 11.4639 20.5596L12.4453 16.6191C12.4558 16.5771 12.4618 16.5357 12.4648 16.4932C12.4883 16.3517 12.5 16.2089 12.5 16.0674C12.5 14.6514 11.3785 13.5 10 13.5Z" fill="#6D7B83"></path>
									</svg>
									</div>
									<div class="boxes_title_and_content">
										<h5>Marketing Automation Platform Comparison Template</h5>
										<div class="date_btn">
											<span class="date">Mar 09 2023</span>
											<a href="/marketing-automation-platform-comparison-template/">
												<span class="text">Read</span>
											</a>
										</div>
									</div>	
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
		
	}
	
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_selected_cerificate_html' ) ) {
	/**
	 * Get the User Selected Cerificate HTML.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_selected_cerificate_html( $current_userid ) {
		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		$certificates_query = moc_posts_query( 'certificate', 1, -1  );
		$certificates_ids   = $certificates_query->posts;
		$user_all_info      = get_user_meta( $current_userid, 'user_all_info', true );
		$user_certificates  = ! empty( $user_all_info['moc_certificates'] ) ? $user_all_info['moc_certificates'] : array();
		$non_empty_text     = '';
		?>
		<div class="title_with_btn">
			<!-- about title -->
			<h3><?php esc_html_e( 'Selected Certifications', 'marketingops' ); ?></h3>
			<?php
				if( is_user_logged_in() && true === $flag ) {
					?>
					<div class="btns">
						<div class="moc_not_editable_data">
							<a href="javascript:void(0);" class="gray_color btn edit_btn moc_user_basic_info_edit_btn"><?php esc_html_e( 'Edit', 'marketingops' ); ?></a>
						</div>
						<div class="moc_editable_data">
							<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_user_basic_info_cancel_btn"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
						</div>
					</div>
				<?php
				}
				?>
		</div>
		<div class="sub_title_with_content">
			<!-- Certification content -->
			<div class="moc_editable_data">
				<div class="content_boxes">
					<h5><?php echo esc_html( 'Certifications','marketingops' ); ?></h5>
					<div class="content_boxed">
						<div class="select_box">
							<select id="moc_certificate">
								<?php foreach ( $certificates_ids as $certificates_id ) {
									$certificate_title = get_the_title( $certificates_id );
									?>
									<option value="<?php echo esc_attr( $certificates_id  ); ?>"><?php echo esc_html( $certificate_title ); ?></option>	
								<?php
								}
								?>
								<option value="other"><?php esc_html_e( 'My certification is not listed here', 'marketingops' ); ?></option>
							</select>
						</div>
						<div class="colum_box upload_icon_here">
							<div class="platform deletesec">
								<input type="file" value="Upload" class="btn upload_icon moc_user_certificate_save_btn">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Certification content -->
			<div class="content_boxes selected_certi">
				<?php 
				if ( ! empty( $user_certificates ) ) {
					?>
					<h5><?php echo esc_html( 'Selected Designations & Certifications','marketingops' ); ?></h5>	
					<?php
				} else {
					?>
					<div class="moc_not_editable_data">
						<!-- <h5><?php echo esc_html( $non_empty_text ); ?></h5> -->
					</div>
					<div class="moc_editable_data">
						<h5><?php esc_html_e( 'Selected Designations & Certifications','marketingops' ); ?></h5>	
					</div>
				<?php
				}
				?>
				
				<!-- loop here -->
				<?php 
				if ( ! empty( $user_certificates ) && is_array( $user_certificates ) ) {
					foreach ( $user_certificates as $user_certificate ) {
						$certificate_title = get_the_title( $user_certificate );
						$certificate_image = wp_get_attachment_image_src( get_post_thumbnail_id( $user_certificate ), 'single-post-thumbnail' );
						?>
						<div class="content_boxed" >
							<div class="img_content_box">
								<div class="img_box">
									<img src="<?php echo esc_url( $certificate_image[0] ); ?>" alt="<?php echo esc_html( $certificate_title ); ?>">
								</div>
								<span><?php echo esc_html( $certificate_title ); ?></span>
							</div>
							<div class="delete_icon moc_editable_data moc_delete_certificate" data-certificateid = "<?php echo esc_html( $user_certificate ); ?>">
								<input type="button" value="delete" class="btn delete_icon">
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_blog_contributions_html' ) ) {
	/**
	 * Get the User Blog Contributons HTML.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_blog_contributions_html( $current_userid, $blogs ) {

		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		$read_btn_txt = ( false === $flag ) ? __( 'Read', 'marketingops' ) : __( 'Edit', 'marketingops' );
		if ( ! empty( $blogs ) ) {
			?>
			<div class="title_with_btn">
			<!-- about title -->
			<h3><?php echo esc_html( 'Blog contribution','marketingops' ); ?></h3>
			</div>
			<div class="sub_title_with_content">
				<!-- loop here -->
				<?php foreach ( $blogs as $blog_id ){
					$blog_title        = get_the_title( $blog_id );
					$blog_publish_date = get_the_date( 'M d Y', $blog_id );
					$blog_permalink    = get_the_permalink( $blog_id );
					?>
					<div class="content_boxes">
						<div class="boxes_svg_icon">
							<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.25 0.5C3.734 0.5 2.5 1.7335 2.5 3.25V14.25C2.5 15.7665 3.734 17 5.25 17H13.25C14.766 17 16 15.7665 16 14.25V7.5H11.0186C9.90555 7.5 9 6.59397 9 5.48047V0.5H5.25ZM10.5 0.939453V5.48145C10.5 5.76745 10.7326 6 11.0186 6H15.5605L10.5 0.939453ZM1.5 3L0.890625 3.40625C0.334125 3.77725 0 4.40181 0 5.07031V14.75C0 17.3735 2.1265 19.5 4.75 19.5H11.4297C12.0987 19.5 12.7233 19.1659 13.0938 18.6094L13.5 18H4.75C2.955 18 1.5 16.545 1.5 14.75V3ZM6.75 9.5H11.75C12.164 9.5 12.5 9.8355 12.5 10.25C12.5 10.6645 12.164 11 11.75 11H6.75C6.336 11 6 10.6645 6 10.25C6 9.8355 6.336 9.5 6.75 9.5ZM6.75 12.5H11.75C12.164 12.5 12.5 12.8355 12.5 13.25C12.5 13.6645 12.164 14 11.75 14H6.75C6.336 14 6 13.6645 6 13.25C6 12.8355 6.336 12.5 6.75 12.5Z" fill="#6D7B83"/>
							</svg>
						</div>
						<div class="boxes_title_and_content">
							<h5><?php echo esc_html( $blog_title ); ?></h5>
							<div class="date_btn">
								<span class="date"><?php echo esc_html( $blog_publish_date ); ?></span>
								<a href="<?php echo esc_html( $blog_permalink ); ?>">
									<span class="text"><?php echo esc_html( $read_btn_txt ); ?></span>
									<span class="svg">
										<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"/>
											<defs>
												<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
													<stop stop-color="#FD4B7A"/>
													<stop offset="1" stop-color="#4D00AE"/>
												</linearGradient>
											</defs>
										</svg>
									</span>
								</a>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_podcast_contributons_html' ) ) {
	/**
	 * Get the User Blog Contributons HTML.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_podcast_contributons_html( $current_userid, $podcasts  ) {
		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();

		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		?>
		<div class="title_with_btn">
			<!-- about title -->
			<h3><?php echo esc_html( 'Podcasts','marketingops' ); ?></h3>
		</div>
		<div class="sub_title_with_content">
			<!-- loop here -->
			<?php
			foreach ( $podcasts as $podcast_id ) {
					$podcast_title        = get_the_title( $podcast_id );
					$podcast_publish_date = get_the_date( 'M d Y', $podcast_id );
					$podcast_permalink    = get_the_permalink( $podcast_id );
				?>
				<div class="content_boxes">
					<div class="boxes_svg_icon">
						<svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M10 0.5C4.76217 0.5 0.5 4.76217 0.5 10C0.5 13.0967 1.98719 15.857 4.28613 17.5898C4.56486 17.7997 4.85536 17.9949 5.15625 18.1738C5.24096 18.2268 5.33539 18.2622 5.434 18.2782C5.53261 18.2941 5.63341 18.2902 5.73049 18.2667C5.82757 18.2431 5.91897 18.2005 5.99932 18.1411C6.07968 18.0818 6.14737 18.007 6.19843 17.9211C6.24948 17.8353 6.28288 17.7401 6.29665 17.6411C6.31042 17.5422 6.30429 17.4415 6.27862 17.345C6.25295 17.2484 6.20826 17.158 6.14717 17.079C6.08607 17 6.00981 16.9339 5.92285 16.8848C5.66875 16.7337 5.42375 16.5687 5.18848 16.3916C3.25142 14.9315 2 12.6173 2 10C2 5.57283 5.57283 2 10 2C14.4272 2 18 5.57283 18 10C18 12.6348 16.732 14.9631 14.7725 16.4219V16.4209C14.5327 16.5994 14.2817 16.7656 14.0225 16.917C13.9354 16.9656 13.859 17.0312 13.7976 17.1097C13.7361 17.1883 13.691 17.2783 13.6648 17.3745C13.6386 17.4707 13.6318 17.5712 13.6449 17.67C13.6579 17.7689 13.6906 17.8641 13.7409 17.9502C13.7912 18.0363 13.8582 18.1115 13.9379 18.1714C14.0176 18.2313 14.1085 18.2747 14.2052 18.299C14.3018 18.3234 14.4024 18.3283 14.501 18.3133C14.5996 18.2983 14.6942 18.2639 14.7793 18.2119C15.087 18.0323 15.3837 17.8365 15.668 17.625C17.9934 15.8938 19.5 13.1172 19.5 10C19.5 4.76217 15.2378 0.5 10 0.5ZM10 3.5C6.41913 3.5 3.5 6.41913 3.5 10C3.5 11.7906 4.22792 13.4213 5.40332 14.5967C5.47243 14.6687 5.55521 14.7261 5.6468 14.7657C5.7384 14.8053 5.83697 14.8262 5.93676 14.8272C6.03654 14.8283 6.13552 14.8093 6.2279 14.7716C6.32028 14.7339 6.40421 14.6781 6.47477 14.6076C6.54533 14.537 6.6011 14.4531 6.63882 14.3607C6.67654 14.2683 6.69544 14.1693 6.69442 14.0696C6.69341 13.9698 6.67249 13.8712 6.63291 13.7796C6.59332 13.688 6.53585 13.6052 6.46387 13.5361C5.55826 12.6305 5 11.3854 5 10C5 7.22987 7.22987 5 10 5C12.7701 5 15 7.22987 15 10C15 11.3854 14.4417 12.6305 13.5361 13.5361C13.4642 13.6052 13.4067 13.688 13.3671 13.7796C13.3275 13.8712 13.3066 13.9698 13.3056 14.0696C13.3046 14.1693 13.3235 14.2683 13.3612 14.3607C13.3989 14.4531 13.4547 14.537 13.5252 14.6076C13.5958 14.6781 13.6797 14.7339 13.7721 14.7716C13.8645 14.8093 13.9635 14.8283 14.0632 14.8272C14.163 14.8262 14.2616 14.8053 14.3532 14.7657C14.4448 14.7261 14.5276 14.6687 14.5967 14.5967C15.7721 13.4213 16.5 11.7906 16.5 10C16.5 6.41913 13.5809 3.5 10 3.5ZM10 7.5C9.33696 7.5 8.70107 7.76339 8.23223 8.23223C7.76339 8.70107 7.5 9.33696 7.5 10C7.5 10.663 7.76339 11.2989 8.23223 11.7678C8.70107 12.2366 9.33696 12.5 10 12.5C10.663 12.5 11.2989 12.2366 11.7678 11.7678C12.2366 11.2989 12.5 10.663 12.5 10C12.5 9.33696 12.2366 8.70107 11.7678 8.23223C11.2989 7.76339 10.663 7.5 10 7.5ZM10 13.5C8.6215 13.5 7.5 14.6514 7.5 16.0674C7.5 16.2079 7.51118 16.3502 7.53418 16.4912C7.53718 16.5342 7.54419 16.5766 7.55469 16.6191L8.5293 20.5234C8.6693 21.2344 9.2875 21.75 10 21.75C10.711 21.75 11.3299 21.2346 11.4639 20.5596L12.4453 16.6191C12.4558 16.5771 12.4618 16.5357 12.4648 16.4932C12.4883 16.3517 12.5 16.2089 12.5 16.0674C12.5 14.6514 11.3785 13.5 10 13.5Z" fill="#6D7B83"/>
						</svg>
					</div>
					<div class="boxes_title_and_content">
						<h5><?php echo esc_html( $podcast_title ); ?></h5>
						<div class="date_btn">
							<span class="date"><?php echo esc_html( $podcast_publish_date ); ?></span>
							<a href="<?php echo esc_url( $podcast_permalink ); ?>">
								<span class="text"><?php esc_html_e( 'Listen', 'marketingops' ); ?></span>
								<span class="svg">
									<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"/>
										<defs>
											<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
												<stop stop-color="#FD4B7A"/>
												<stop offset="1" stop-color="#4D00AE"/>
											</linearGradient>
										</defs>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_workshop_contributons_html' ) ) {
	/**
	 * Get the User Workshop Contributons HTML.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_workshop_contributons_html( $current_userid, $workshops ) {

		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		?>
		<div class="title_with_btn">
			<!-- about title -->
			<h3><?php esc_html_e( 'Workshops & Webinars', 'marketingops' ); ?></h3>
		</div>
		<div class="sub_title_with_content">
			<!-- loop here -->
			<?php 
			foreach ( $workshops as $workshop_id ){
				$workshop_title        = get_the_title( $workshop_id );
				$workshop_publish_date = get_the_date( 'M d Y', $workshop_id );
				$workshop_permalink    = get_the_permalink( $workshop_id );
				?>
				<div class="content_boxes">
					<div class="boxes_svg_icon">
						<svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.00007 0C2.46964 0 1.96093 0.210714 1.58586 0.585786C1.21079 0.960859 1.00007 1.46957 1.00007 2C1.00007 2.53043 1.21079 3.03914 1.58586 3.41421C1.96093 3.78929 2.46964 4 3.00007 4C3.53051 4 4.03922 3.78929 4.41429 3.41421C4.78936 3.03914 5.00007 2.53043 5.00007 2C5.00007 1.46957 4.78936 0.960859 4.41429 0.585786C4.03922 0.210714 3.53051 0 3.00007 0ZM5.23152 0C5.70802 0.531 6.00007 1.2305 6.00007 2C6.00007 2.7695 5.70802 3.469 5.23152 4H10.2501C11.2166 4 12.0001 4.7835 12.0001 5.75C12.0001 6.7165 11.2166 7.5 10.2501 7.5H6.00007V12.5H10.0001V15.1104L7.82039 16.6357C7.73595 16.6906 7.66342 16.7618 7.60711 16.8453C7.5508 16.9288 7.51187 17.0227 7.49263 17.1215C7.4734 17.2203 7.47426 17.322 7.49515 17.4205C7.51605 17.519 7.55656 17.6123 7.61427 17.6948C7.67198 17.7773 7.7457 17.8473 7.83105 17.9007C7.9164 17.9541 8.01162 17.9898 8.11105 18.0056C8.21048 18.0214 8.31207 18.017 8.40978 17.9928C8.50749 17.9685 8.5993 17.9248 8.67976 17.8643L10.7501 16.415L12.8204 17.8643C12.9008 17.9248 12.9927 17.9685 13.0904 17.9928C13.1881 18.017 13.2897 18.0214 13.3891 18.0056C13.4885 17.9898 13.5837 17.9541 13.6691 17.9007C13.7544 17.8473 13.8282 17.7773 13.8859 17.6948C13.9436 17.6123 13.9841 17.519 14.005 17.4205C14.0259 17.322 14.0268 17.2203 14.0075 17.1215C13.9883 17.0227 13.9494 16.9288 13.893 16.8453C13.8367 16.7618 13.7642 16.6906 13.6798 16.6357L11.5001 15.1104V12.5H19.2501C19.6641 12.5 20.0001 12.1645 20.0001 11.75C20.0001 11.3355 19.6641 11 19.2501 11H19.0001V0.75C19.0001 0.336 18.6641 0 18.2501 0H5.23152ZM2.00007 5C1.17157 5 0.500075 5.6715 0.500075 6.5V12.5V17.25C0.498669 17.3494 0.51703 17.4481 0.554091 17.5403C0.591151 17.6325 0.646172 17.7164 0.715955 17.7872C0.785738 17.858 0.868893 17.9142 0.960585 17.9526C1.05228 17.9909 1.15068 18.0107 1.25007 18.0107C1.34947 18.0107 1.44787 17.9909 1.53956 17.9526C1.63126 17.9142 1.71441 17.858 1.78419 17.7872C1.85398 17.7164 1.909 17.6325 1.94606 17.5403C1.98312 17.4481 2.00148 17.3494 2.00007 17.25V12.5H3.50007V17.25C3.49867 17.3494 3.51703 17.4481 3.55409 17.5403C3.59115 17.6325 3.64617 17.7164 3.71595 17.7872C3.78574 17.858 3.86889 17.9142 3.96059 17.9526C4.05228 17.9909 4.15068 18.0107 4.25007 18.0107C4.34947 18.0107 4.44787 17.9909 4.53956 17.9526C4.63126 17.9142 4.71441 17.858 4.78419 17.7872C4.85398 17.7164 4.909 17.6325 4.94606 17.5403C4.98312 17.4481 5.00148 17.3494 5.00007 17.25V10.75V6.5H10.2501C10.3495 6.50141 10.4481 6.48304 10.5404 6.44598C10.6326 6.40892 10.7165 6.3539 10.7873 6.28412C10.8581 6.21434 10.9143 6.13118 10.9526 6.03949C10.991 5.9478 11.0108 5.84939 11.0108 5.75C11.0108 5.65061 10.991 5.5522 10.9526 5.46051C10.9143 5.36882 10.8581 5.28566 10.7873 5.21588C10.7165 5.1461 10.6326 5.09108 10.5404 5.05402C10.4481 5.01696 10.3495 4.99859 10.2501 5H5.00007H2.50007H2.00007Z" fill="#6D7B83"/>
						</svg>
					</div>
					<div class="boxes_title_and_content">
						<h5><?php echo esc_html( $workshop_title ); ?></h5>
						<div class="date_btn">
							<span class="date"><?php echo esc_html( $workshop_publish_date ); ?></span>
							<a href="<?php echo esc_html( $workshop_permalink ); ?>">
								<span class="text"><?php esc_html_e( 'Watch', 'marketingops' ); ?></span>
								<span class="svg">
									<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"/>
										<defs>
											<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
												<stop stop-color="#FD4B7A"/>
												<stop offset="1" stop-color="#4D00AE"/>
											</linearGradient>
										</defs>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_training_contributons_html' ) ) {
	/**
	 * Get the User Training Contributons HTML.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_training_contributons_html( $current_userid, $trainings ) {

		ob_start();
		$profile_view_user_id = moc_get_public_user_profie_user_id();
		
		// True if user logged in and see own profile else False to visit different user profile.
		$flag                 = true;
		if ( $profile_view_user_id !== $current_userid  ){
			$current_userid = $profile_view_user_id;
			$flag           = false;
		}
		?>
		<div class="title_with_btn">
			<!-- about title -->
			<h3><?php esc_html_e( 'Training courses', 'marketingops' ); ?></h3>
		</div>
		<div class="sub_title_with_content">
			<!-- loop here -->
			<?php 
			foreach ( $trainings as $training_id ){
				$training_title        = get_the_title( $training_id );
				$training_publish_date = get_the_date( 'M d Y', $training_id );
				$training_permalink    = get_the_permalink( $training_id );
				?>
				<div class="content_boxes">
					<div class="boxes_svg_icon">
						<svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M3.25 0.5C1.7335 0.5 0.5 1.7335 0.5 3.25V12.25C0.5 13.7665 1.7335 15 3.25 15H18.75C20.2665 15 21.5 13.7665 21.5 12.25V3.25C21.5 1.7335 20.2665 0.5 18.75 0.5H3.25ZM9.47754 4.99805C9.56187 4.99418 9.65015 5.01191 9.7334 5.05566L14.0127 7.30762C14.3687 7.49462 14.3682 8.00488 14.0117 8.19238L9.73242 10.4453C9.39992 10.6203 9 10.3789 9 10.0029V5.49805C9 5.21567 9.22456 5.00965 9.47754 4.99805ZM6.75 16.5C6.65062 16.4986 6.55194 16.517 6.45972 16.554C6.36749 16.5911 6.28355 16.6461 6.21277 16.7159C6.142 16.7857 6.08579 16.8688 6.04743 16.9605C6.00907 17.0522 5.98932 17.1506 5.98932 17.25C5.98932 17.3494 6.00907 17.4478 6.04743 17.5395C6.08579 17.6312 6.142 17.7143 6.21277 17.7841C6.28355 17.8539 6.36749 17.9089 6.45972 17.946C6.55194 17.983 6.65062 18.0014 6.75 18H15.25C15.3494 18.0014 15.4481 17.983 15.5403 17.946C15.6325 17.9089 15.7164 17.8539 15.7872 17.7841C15.858 17.7143 15.9142 17.6312 15.9526 17.5395C15.9909 17.4478 16.0107 17.3494 16.0107 17.25C16.0107 17.1506 15.9909 17.0522 15.9526 16.9605C15.9142 16.8688 15.858 16.7857 15.7872 16.7159C15.7164 16.6461 15.6325 16.5911 15.5403 16.554C15.4481 16.517 15.3494 16.4986 15.25 16.5H6.75Z" fill="#6D7B83"/>
						</svg>
					</div>
					<div class="boxes_title_and_content">
						<h5><?php echo esc_html( $training_title ); ?></h5>
						<div class="date_btn">
							<span class="date"><?php echo esc_html( $training_publish_date ); ?></span>
							<a href="<?php echo esc_html( $training_permalink ); ?>">
								<span class="text"><?php esc_html_e( 'Learn more', 'marketingops' ); ?></span>
								<span class="svg">
									<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"/>
										<defs>
											<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
												<stop stop-color="#FD4B7A"/>
												<stop offset="1" stop-color="#4D00AE"/>
											</linearGradient>
										</defs>
									</svg>
								</span>
							</a>
						</div>
					</div>
				</div>
			<?php
			}
			?>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_certificate_custom_post_type' ) ) {
	/**
	 * Function to register certificate custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_certificate_custom_post_type() {
		$labels = array(
			'name'                  => _x( 'Certificate', 'Certificate General Name', 'certificate' ),
			'singular_name'         => _x( 'Certificate', 'Certificate Singular Name', 'certificate' ),
			'menu_name'             => __( 'Certificates', 'certificate' ),
			'name_admin_bar'        => __( 'Certificates', 'certificate' ),
			'archives'              => __( 'Certificate Archives', 'certificate' ),
			'attributes'            => __( 'Certificate Attributes', 'certificate' ),
			'parent_item_colon'     => __( 'Parent Certificate:', 'certificate' ),
			'all_items'             => __( 'All Certificates', 'certificate' ),
			'add_new_item'          => __( 'Add New Certificate', 'certificate' ),
			'add_new'               => __( 'Add New', 'certificate' ),
			'new_item'              => __( 'New Certificate', 'certificate' ),
			'edit_item'             => __( 'Edit Certificate', 'certificate' ),
			'update_item'           => __( 'Update Certificate', 'certificate' ),
			'view_item'             => __( 'View Certificate', 'certificate' ),
			'view_items'            => __( 'View Certificates', 'certificate' ),
			'search_items'          => __( 'Search Certificate', 'certificate' ),
			'not_found'             => __( 'Not found', 'certificate' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'certificate' ),
			'featured_image'        => __( 'Featured Image', 'certificate' ),
			'set_featured_image'    => __( 'Set featured image', 'certificate' ),
			'remove_featured_image' => __( 'Remove featured image', 'certificate' ),
			'use_featured_image'    => __( 'Use as featured image', 'certificate' ),
			'insert_into_item'      => __( 'Insert into Certificate', 'certificate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Certificate', 'certificate' ),
			'items_list'            => __( 'Certificates list', 'certificate' ),
			'items_list_navigation' => __( 'Certificates list navigation', 'certificate' ),
			'filter_items_list'     => __( 'Filter Certificates list', 'certificate' ),
		);
		$args   = array(
			'label'               => __( 'Certificate', 'certificate' ),
			'description'         => __( 'Its custom post type of certificate', 'certificate' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-pressthis',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
		);
		register_post_type( 'certificate', $args );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_sidebar_certificate_html' ) ) {
	/**
	 * Get the HTML for sidebar Certificates
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_sidebar_certificate_html( $certificates_ids ) {

		ob_start();
		foreach ( $certificates_ids as $user_certificate ) {
			$certificate_title = get_the_title( $user_certificate );
			$certificate_image = wp_get_attachment_image_src( get_post_thumbnail_id( $user_certificate ), 'single-post-thumbnail' );
			?>
			<div class="certi_img">
				<img src="<?php echo esc_url( $certificate_image[0] ); ?>" alt="<?php echo esc_html( $certificate_title ); ?>">
			</div>
		<?php
		}
		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_become_ambassador_html' ) ) {
	/**
	 * Get the HTML for Become a ambassador.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_become_ambassador_html() {
		ob_start();
		$ambassador_group   = get_field( 'ambassador', 'option' );
		$ambassador_title   = ! empty( $ambassador_group['title'] ) ? str_replace( array( '<p>','</p>' ),'', $ambassador_group['title'] ) : sprintf( __( 'Become an %1$s ambassador', 'marketingops' ), '<br/>' );
		$ambassador_desc    = ! empty( $ambassador_group['description'] ) ? str_replace( array( '<p>','</p>' ),'', $ambassador_group['description'] ) : '';
		$ambassador_btn_txt = ! empty( $ambassador_group['button_text'] ) ? str_replace( array( '<p>','</p>' ),'', $ambassador_group['button_text'] ) : __( 'Register as ambassador', 'marketingops' );
		?>
		<div class="text_box">
			<div class="title_and_svg">
				<div class="svg_icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40">
						<path id="st0" fill="#C4338C" d="M40,7.5C39.9,7.2,39.6,7,39.3,7l-6.5-0.4l-2.4-6C30.2,0.2,29.9,0,29.6,0c-0.3,0-0.6,0.2-0.7,0.5l-2.4,6L19.9,7c-0.3,0-0.6,0.2-0.7,0.6c-0.1,0.3,0,0.7,0.2,0.9l0.8,0.7C2.6,13.1,0,29.7,0,29.9c0,0.3,0.1,0.6,0.4,0.8c0.3,0.2,0.6,0.2,0.9,0l3-1.9c-0.5,2.2-1.1,5.9-0.5,10.6c0,0.3,0.3,0.6,0.6,0.7c0.1,0,0.1,0,0.2,0c0.3,0,0.5-0.1,0.7-0.4L10,32c0.4,1.7,1.3,4.2,2.5,5.6c0.2,0.2,0.6,0.3,0.9,0.2c0.3-0.1,0.5-0.4,0.5-0.7c0-0.2,1.2-15.1,9.6-20.7l-0.6,2.4c-0.1,0.3,0,0.7,0.3,0.8c0.3,0.2,0.6,0.2,0.9,0l5.5-3.5l5.5,3.5c0.1,0.1,0.3,0.1,0.4,0.1c0.2,0,0.3,0,0.5-0.2c0.3-0.2,0.4-0.5,0.3-0.8l-1.6-6.3l5-4.2C40,8.2,40.1,7.8,40,7.5zM33.3,11.7c-0.2,0.2-0.3,0.5-0.3,0.8l1.2,4.9L30,14.7c-0.1-0.1-0.3-0.1-0.4-0.1c-0.1,0-0.3,0-0.4,0.1l-4.2,2.7l1.2-4.9c0.1-0.3,0-0.6-0.3-0.8L22,8.4l5-0.3c0.3,0,0.6-0.2,0.7-0.5l1.9-4.6l1.9,4.6c0.1,0.3,0.4,0.5,0.7,0.5l5,0.3L33.3,11.7z" />
					</svg>
				</div>
				<div class="title gradient-title">
					<h2><?php echo wp_kses_post( $ambassador_title ); ?></h2>
				</div>
			</div>
			<p><?php echo wp_kses_post( $ambassador_desc ); ?></p>
			<div class="text_box_btn">
				<a href="<?php echo site_url( 'marketing-operations-community-ambassador-application' ); ?>" class="btn" target="_blank">
					<span class="text"><?php echo wp_kses_post( $ambassador_btn_txt ); ?></span>
					<span class="svg">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#fff">
							<g clip-path="url(#clip0_446_965)">
								<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#242730"></path>
							</g>
							<defs>
								<clipPath id="clip0_446_965">
									<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
								</clipPath>
							</defs>
						</svg>
					</span>
				</a>
			</div>
		</div>
		<!-- hr -->
		<hr>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_create_a_blog_html' ) ) {
	/**
	 * Get the HTML for create a blog HTML.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_create_a_blog_html( $current_userid ) {
		$username = get_the_author_meta( 'user_nicename', $current_userid );
		$blog_group   = get_field( 'blog', 'option' );
		$blog_title   = ! empty( $blog_group['title'] ) ? str_replace( array( '<p>','</p>' ),'', $blog_group['title'] ) : sprintf( __( 'Write a %1$s blog post', 'marketingops' ), '<br/>' );
		$blog_desc    = ! empty( $blog_group['description'] ) ? str_replace( array( '<p>','</p>' ),'', $blog_group['description'] ) : '';
		$blog_btn_txt = ! empty( $blog_group['button_text'] ) ? str_replace( array( '<p>','</p>' ),'', $blog_group['button_text'] ) : __( 'Write a post', 'marketingops' );
		ob_start();
			?>
			<div class="text_box">
				<div class="title_and_svg">
					<div class="svg_icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" fill="#C4338C">
							<g>
								<path fill="#C4338C" class="st0" d="M10.5,0.3v15.2l3.6-1.8l3.6,1.9V0.3H10.5z M6.9,3c-3,0-5.4,2.4-5.4,5.4v18.8c0,3,2.4,5.4,5.4,5.4h0.9V40l8.4-7.4H33c3,0,5.4-2.4,5.4-5.4V8.4C38.3,5.4,36,3,33,3H19.5v14.7l-5.4,6.8l-5.4-6.8V3H6.9z M14.1,15.7l-3.3,1.7l2.1,2.7h2.4l2.1-2.7L14.1,15.7z M14.2,24.5h22.3v2.7c0,2-1.6,3.6-3.6,3.6H18.2L14.2,24.5z" />
							</g>
						</svg>
					</div>
					<div class="title gradient-title">
						<h2><?php echo wp_kses_post( $blog_title ); ?></h2>
					</div>
				</div>
				<p><?php echo wp_kses_post( $blog_desc ); ?></p>
				<div class="text_box_btn">
					<a href="<?php echo esc_attr( site_url( 'post-new' ) ); ?>" class="btn">
						<span class="text"><?php echo wp_kses_post( $blog_btn_txt ); ?></span>
						<span class="svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#fff">
								<g clip-path="url(#clip0_446_965)">
									<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#242730"></path>
								</g>
								<defs>
									<clipPath id="clip0_446_965">
										<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
									</clipPath>
								</defs>
							</svg>
						</span>
					</a>
				</div>
			</div>
			<!-- hr -->
			<hr>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_be_a_guest_on_ops_cast_html' ) ) {
	/**
	 * Get the HTML for Be a guest on Ops Cast.
	 *
	 * @since 1.0.0
	 */
	function moc_be_a_guest_on_ops_cast_html() {
		ob_start();
		$be_a_guest_on_ops_cast_group   = get_field( 'be_a_guest_on_ops_cast', 'option' );
		$be_a_guest_on_ops_cast_title   = ! empty( $be_a_guest_on_ops_cast_group['title'] ) ? str_replace( array( '<p>','</p>' ),'', $be_a_guest_on_ops_cast_group['title'] ) : sprintf( __( 'Be a guest %1$s on Ops Cast', 'marketingops' ), '<br/>' );
		$be_a_guest_on_ops_cast_desc    = ! empty( $be_a_guest_on_ops_cast_group['description'] ) ? str_replace( array( '<p>','</p>' ),'', $be_a_guest_on_ops_cast_group['description'] ) : '';
		$be_a_guest_on_ops_cast_btn_txt = ! empty( $be_a_guest_on_ops_cast_group['button_text'] ) ? str_replace( array( '<p>','</p>' ),'', $be_a_guest_on_ops_cast_group['button_text'] ) : __( 'Inquire Ops Cast', 'marketingops' );
			?>
			<div class="text_box">
				<div class="title_and_svg">
					<div class="svg_icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" fill="#C4338C">
							<g>
								<path fill="#C4338C" class="st0" d="M20,0c-4.9,0-8.8,3.8-8.8,8.6v0.2h6c0.4,0,0.8,0.4,0.8,0.8c0,0.4-0.4,0.8-0.8,0.8h-6V12h6c0.4,0,0.8,0.4,0.8,0.8c0,0.4-0.4,0.8-0.8,0.8h-6v1.6h6c0.4,0,0.8,0.4,0.8,0.8c0,0.4-0.4,0.8-0.8,0.8h-6v1.8c0,4.7,3.9,8.6,8.8,8.6c4.9,0,8.8-3.8,8.8-8.6v-1.8h-6c-0.4,0-0.8-0.4-0.8-0.8c0-0.4,0.4-0.8,0.8-0.8h6v-1.6h-6c-0.4,0-0.8-0.4-0.8-0.8c0-0.4,0.4-0.8,0.8-0.8h6v-1.6h-6c-0.4,0-0.8-0.4-0.8-0.8c0-0.4,0.4-0.8,0.8-0.8h6V8.6C28.8,3.8,24.9,0,20,0z M7.9,13.7c-0.3,0.1-0.6,0.4-0.6,0.7v4c0,6.2,4.5,11.3,10.3,12.5v4.3h4.8v-4.3c5.9-1.1,10.3-6.3,10.3-12.5v-4c0-0.4-0.3-0.7-0.7-0.7c-0.4,0-0.7,0.3-0.7,0.7v4c0,6.2-5.1,11.3-11.3,11.3c-6.2,0-11.3-5.1-11.3-11.3v-4c0-0.2-0.1-0.4-0.2-0.5C8.3,13.7,8.1,13.7,7.9,13.7C7.9,13.7,7.9,13.7,7.9,13.7z M12.4,36.8c-1.5,0-2.8,1.2-2.8,2.8l0,0.4l20.7,0l0-0.4c0-1.5-1.2-2.8-2.8-2.8H12.4z" />
							</g>
						</svg>
					</div>
					<div class="title gradient-title">
						<h2><?php echo wp_kses_post( $be_a_guest_on_ops_cast_title ); ?></h2>
					</div>
				</div>
				<p><?php echo wp_kses_post( $be_a_guest_on_ops_cast_desc ); ?></p>
				<div class="text_box_btn">
					<a href="javascript:void(0)" class="btn moc_inquire_ops_cast">
						<span class="text"><?php echo wp_kses_post( $be_a_guest_on_ops_cast_btn_txt ); ?></span>
						<span class="svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#fff">
								<g clip-path="url(#clip0_446_965)">
									<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#242730"></path>
								</g>
								<defs>
									<clipPath id="clip0_446_965">
										<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
									</clipPath>
								</defs>
							</svg>
						</span>
					</a>
				</div>
			</div>
			<!-- hr -->
			<hr>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_host_a_workshop_html' ) ) {
	/**
	 * Get the HTML for Host a workshop.
	 *
	 * @since 1.0.0
	 */
	function moc_host_a_workshop_html() {
		ob_start();
		$workshop_group   = get_field( 'workshop', 'option' );
		$workshop_title   = ! empty( $workshop_group['title'] ) ? str_replace( array( '<p>', '</p>' ), '', $workshop_group['title'] ) : sprintf( __( 'Host a workshop %1$s or speak on a panel', 'marketingops' ), '<br/>' );
		$workshop_desc    = ! empty( $workshop_group['description'] ) ? str_replace( array( '<p>', '</p>' ), '', $workshop_group['description'] ) : '';
		$workshop_btn_txt = ! empty( $workshop_group['button_text'] ) ? str_replace( array( '<p>', '</p>' ), '', $workshop_group['button_text'] ) : __( 'Host a workshop', 'marketingops' );
			?>
			<div class="text_box">
				<div class="title_and_svg">
					<div class="svg_icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" fill="#C4338C">
							<g>
								<path class="st0" d="M8.7,0C6.3,0,4.3,1.9,4.3,4.3s1.9,4.3,4.3,4.3c2.4,0,4.3-1.9,4.3-4.3S11.1,0,8.7,0z M23.5,0v1.7h-9.3c0.4,0.8,0.6,1.7,0.6,2.6c0,1.3-0.4,2.5-1.1,3.5H23c2.2,0,3.9,1.8,3.9,3.9s-1.8,3.9-3.9,3.9h-7.4v12.2h23.5c0.5,0,0.9-0.4,0.9-0.9V2.6c0-0.5-0.4-0.9-0.9-0.9H25.2V0H23.5z M4.8,9.6C2.1,9.6,0,11.7,0,14.3v11.7c0,1,0.8,1.7,1.7,1.7s1.7-0.8,1.7-1.7v-9.9c0-0.2,0.2-0.4,0.4-0.4c0.2,0,0.4,0.2,0.4,0.4v21.5C4.3,39,5.1,40,6.4,40c1.3,0,2.3-1,2.3-2.3V27.6c0-0.2,0.2-0.4,0.4-0.4s0.4,0.2,0.4,0.4v10.4c0,0,0,0,0,0c0.1,1.2,1,2.1,2.2,2.1c1.4,0,2.1-1,2.1-2.3V13.9H23c1.2,0,2.2-1,2.2-2.2c0-1.2-1-2.2-2.2-2.2H11.8l-3.1,6.1l-3-6.1H4.8z M22.2,29.6l-3.9,7.8H20l3.9-7.8H22.2z M24.8,29.6l3.9,7.8h1.7l-3.9-7.8H24.8z"/>
							</g>
						</svg>
					</div>
					<div class="title gradient-title">
						<h2><?php echo wp_kses_post( $workshop_title ); ?></h2>
					</div>
				</div>
				<p><?php echo wp_kses_post( $workshop_desc ); ?></p>
				<div class="text_box_btn">
					<a href="https://forms.clickup.com/42117651/f/185agk-10251/Y6O5GAMD8FZXUJAXTJ" target="_blank" class="btn moc_host_a_workshop_btn">
						<span class="text"><?php echo wp_kses_post( $workshop_btn_txt ); ?></span>
						<span class="svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#fff">
								<g clip-path="url(#clip0_446_965)">
									<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#242730"></path>
								</g>
								<defs>
									<clipPath id="clip0_446_965">
										<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
									</clipPath>
								</defs>
							</svg>
						</span>
					</a>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_months_array' ) ) {
	/**
	 * Get the HTML for Host a workshop.
	 *
	 * @since 1.0.0
	 */
	function moc_months_array() {
		$months_array = array(
			'1'  => 'Jan',
			'2'  => 'Feb',
			'3'  => 'Mar',
			'4'  => 'Apr',
			'5'  => 'May',
			'6'  => 'Jun',
			'7'  => 'Jul',
			'8'  => 'Aug',
			'9'  => 'Sep',
			'10' => 'Oct',
			'11' => 'Nov',
			'12' => 'Dec',
		);
		return $months_array;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_training_two_box_html' ) ) {
	/**
	 * Get the HTML for 2 Box HTML.
	 *
	 * @param array  $category_ids Holds Category id.
	 * @param string $post_type Holds Posts Type.
	 * @param int    $per_page Holds Posts to display per page.
	 * @since 1.0.0
	 */
	function moc_training_two_box_html( $category_ids, $post_type, $per_page ) {
		ob_start();
		// $category_ids =  ! empty( $category_ids ) ? $category_ids : array( 0 );
		$category_ids = array_filter( $category_ids );
		$query = moc_posts_query_post_in_by_taxonomy( $post_type, 1, $per_page, $category_ids );
		$posts_ids = $query->posts;
		?>
		<div class="moc_main_training_container">
			<?php
			if ( 'product' === $post_type ) {
				?>
				<div class="loader_bg">
					<div class="loader"></div>  
				</div>
				<?php
			}
			?>
			<div class="training_content moc_<?php echo esc_html( $post_type ); ?>">
				<?php echo moc_training_box_product_html( $posts_ids ); // phpcs:ignore ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_training_box_product_html' ) ) {
	/**
	 * Get the HTML For blog filter html.
	 *
	 * @param array $post_ids Posts ID.
	 * @since 1.0.0
	 */
	function moc_training_box_product_html( $posts_ids ) {
		ob_start();
		$i = 0;
		foreach ( $posts_ids as $workshop_id ) {
			$class = '';
			if( 0 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 1 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 2 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 3 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 4 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 5 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 6 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 7 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else if( 8 === $i ) {
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			} else {
				$i = 0;
				$class     = "moc_training_index_{$i}";
				$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
			}
			$title = get_the_title( $workshop_id );
			$permalink = get_the_permalink( $workshop_id );
			$default_author_img         = get_field( 'moc_user_default_image', 'option' );
			$post_author_id             = get_post_meta( $workshop_id, 'course_author', true );
			$post_author_username       = get_the_author_meta( 'user_nicename', $post_author_id );
			$post_author_name           = get_the_author_meta( 'display_name', $post_author_id );
			$all_user_meta              = get_user_meta( $professior_id );
			$firstname                  = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
			$lastname                   = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
			$post_author_name           = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $post_author_name;
			$author_img_id              = ! empty( get_user_meta( $post_author_id, 'wp_user_avatar', true ) ) ? get_user_meta( $post_author_id, 'wp_user_avatar', true ) : '';
			$author_img_url             = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
			$post_author_image_url      = ! empty( $author_img_url ) ? $author_img_url[0] : $default_author_img;
			$post_image_id              = get_post_thumbnail_id( $workshop_id );
			$post_image_array           = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
			$post_image_url             = ! empty( $post_image_array ) ? $post_image_array[0] : array( get_field( 'moc_workshop_default_image', 'option' ) );
			$author_state               = ! empty( get_user_meta( $post_author_id, 'moc_state', true ) ) ? get_user_meta( $post_author_id, 'moc_state', true ) : '';
			$author_city                = ! empty( get_user_meta( $post_author_id, 'moc_city', true ) ) ? get_user_meta( $post_author_id, 'moc_city', true ) . ', ' : '';
			$author_url                 = site_url() . '/profile/' . $post_author_username;
			$become_member_txt_article  = ! empty ( get_field( 'become_a_member_button_text_for_article', 'option' ) ) ? get_field( 'become_a_member_button_text_for_article', 'option' ) : 'Become a member';
			$become_member_txt_workshop = ! empty ( get_field( 'become_a_member_button_text_workshop', 'option' ) ) ? get_field( 'become_a_member_button_text_workshop', 'option' ) : 'Become a member';
			$become_a_member_txt        = ( 'post' === get_post_type( $workshop_id ) ) ? $become_member_txt_workshop : $become_member_txt_article;
			$member_article_text_opt    = ! empty ( get_field( 'member_only_tag_text_article', 'option' ) ) ? get_field( 'member_only_tag_text_article', 'option' ) : 'MEMBER ONLY';
			$member_workshop_text_opt   = ! empty ( get_field( 'member_only_tag_text_workshop', 'option' ) ) ? get_field( 'member_only_tag_text_workshop', 'option' ) : 'MEMBER ONLY';
			$members_text               = ( 'post' === get_post_type( $workshop_id ) ) ? $member_workshop_text_opt : $member_article_text_opt;
			$become_member_link         = ( is_user_logged_in() ) ? $author_url : site_url() . '/sign-up';
			$description                = wp_trim_words( get_the_excerpt( $workshop_id ), 25, '...' );
			$platform_terms_obj         = get_the_terms ( $workshop_id, 'training_platform' );
			$platform_id                = $platform_terms_obj[0]->term_id;
			$platform_icon_id           = get_term_meta( $platform_id, 'product_icons', true );
			$platform_icon_src          = ! empty( $platform_icon_id ) ? wp_get_attachment_image_src( $platform_icon_id, 'single-post-thumbnail' ) : array();
			$related_groups             = ! empty( get_post_meta( $workshop_id, '_related_group', true ) ) ? get_post_meta( $workshop_id, '_related_group', true ) : array();
			$related_courses            = ! empty( get_post_meta( $workshop_id, '_related_course', true ) ) ? get_post_meta( $workshop_id, '_related_course', true ) : array();
			$authors_ids                = array();
			if ( ! empty( $related_groups ) && is_array( $related_groups ) ) {
				foreach ( $related_groups as $related_group ) {
					$course_id                       = $related_group;
					$authors_names_data              = get_post_meta( $course_id, 'ppma_authors_name', true );
					$authors_names_exp[$workshop_id] = explode( ', ', $authors_names_data );
				}
				$authors_name = $authors_names_exp[$workshop_id];
				foreach ( $authors_name as $author_name ) {
					global $wpdb;
					$multi_author_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $author_name ) ), ARRAY_A );
					$authors_ids[]          = ! empty( $multi_author_query ) ? (int) $multi_author_query[0]['ID'] : 0;
				}
			} else {
				foreach ( $related_courses as $related_course ) {
					$course_id                       = $related_course;
					$authors_names_data              = get_post_meta( $course_id, 'ppma_authors_name', true );
					$authors_names_exp[$workshop_id] = explode( ', ', $authors_names_data );
				}

				$authors_name = $authors_names_exp[$workshop_id];
				foreach ( $authors_name as $author_name ) {
					global $wpdb;
					$multi_author_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $author_name ) ), ARRAY_A );
					$authors_ids[]          = ! empty( $multi_author_query ) ? (int) $multi_author_query[0]['ID'] : 0;
				}
			}
			$authors_ids = array_unique( $authors_ids );
			?>
			<div class="training_content_boxed <?php echo esc_attr( $class );?>">
					<div class="boxed_bg" style="background-image: url('<?php echo esc_attr( $image_url[0] ); ?>');">
						<!-- training Bages -->
						<div class="training_bages">
							<!-- member badge black -->
							<?php
							if ( ! empty( $platform_icon_src ) ) {
								?>
								<img src="<?php echo esc_url( $platform_icon_src[0] ); ?>" class="moc_selected_platform" />
								<?php
							}
							?>
							<!-- member badge black -->
							<!-- <span class="bages_svg_box member_only">
								<svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="30" cy="30" r="30" fill="#45474F" />
									<path d="M8.71739 34.8218L4.48298 28.5498L4.43205 28.5634C4.48482 28.7151 4.55464 28.9228 4.64151 29.1867C4.72839 29.4505 4.81843 29.7338 4.91164 30.0363C5.00485 30.3389 5.08887 30.6298 5.16368 30.9091L6.37993 35.4482L5.14611 35.7788L2.92896 27.5042L4.83629 26.9932L8.89825 32.9839L8.93221 32.9748L9.53386 25.7345L11.4355 25.2249L13.6527 33.4994L12.3566 33.8467L11.1222 29.2397C11.0544 28.9869 10.9849 28.7123 10.9136 28.416C10.846 28.1187 10.7825 27.8364 10.7231 27.5693C10.6674 27.3011 10.6221 27.0868 10.5872 26.9263L10.5419 26.9384L9.91726 34.5003L8.71739 34.8218ZM21.0975 31.5046L16.4112 32.7603L14.1941 24.4858L18.8803 23.2301L19.1867 24.3733L15.8587 25.2651L16.4608 27.512L19.5793 26.6764L19.8841 27.814L16.7656 28.6496L17.4617 31.2474L20.7896 30.3557L21.0975 31.5046ZM27.0368 29.9132L22.8024 23.6411L22.7514 23.6547C22.8042 23.8064 22.874 24.0142 22.9609 24.278C23.0478 24.5419 23.1378 24.8251 23.231 25.1277C23.3242 25.4303 23.4083 25.7212 23.4831 26.0004L24.6993 30.5395L23.4655 30.8701L21.2483 22.5956L23.1557 22.0845L27.2176 28.0752L27.2516 28.0661L27.8532 20.8258L29.7549 20.3162L31.9721 28.5908L30.676 28.938L29.4415 24.331C29.3738 24.0782 29.3043 23.8037 29.233 23.5073C29.1654 23.21 29.1019 22.9278 29.0425 22.6606C28.9868 22.3924 28.9415 22.1781 28.9066 22.0176L28.8613 22.0297L28.2366 29.5917L27.0368 29.9132ZM32.5135 19.5771L34.9754 18.9174C36.0432 18.6313 36.8903 18.5701 37.5165 18.734C38.1427 18.8978 38.5575 19.3589 38.7607 20.1173C38.8456 20.4342 38.8658 20.7361 38.8214 21.0231C38.7797 21.3052 38.6755 21.5575 38.5086 21.7802C38.3408 21.999 38.1098 22.1782 37.8156 22.3177L37.8307 22.3743C38.1666 22.345 38.4783 22.3686 38.7657 22.4453C39.0569 22.5209 39.3101 22.6735 39.5253 22.903C39.7442 23.1314 39.9108 23.4589 40.0251 23.8852C40.1605 24.3908 40.155 24.8533 40.0086 25.2727C39.8659 25.6911 39.5967 26.0523 39.2011 26.3565C38.8091 26.6597 38.3094 26.8927 37.702 27.0554L34.7306 27.8516L32.5135 19.5771ZM34.7863 22.6259L36.088 22.2771C36.703 22.1124 37.1026 21.8981 37.2867 21.6344C37.4708 21.3708 37.5113 21.0465 37.4082 20.6617C37.3031 20.2692 37.0857 20.0242 36.7563 19.9264C36.4305 19.8277 35.962 19.8602 35.3508 20.024L34.1736 20.3394L34.7863 22.6259ZM35.0805 23.7239L35.7841 26.35L37.216 25.9664C37.8499 25.7965 38.2623 25.5546 38.4531 25.2406C38.644 24.9266 38.6833 24.5602 38.5711 24.1413C38.5024 23.8848 38.3842 23.6778 38.2167 23.5205C38.053 23.3622 37.8273 23.267 37.5396 23.2349C37.251 23.199 36.8859 23.2402 36.4444 23.3585L35.0805 23.7239ZM47.637 24.3933L42.9508 25.649L40.7336 17.3745L45.4199 16.1188L45.7262 17.2621L42.3983 18.1538L43.0004 20.4007L46.1189 19.5651L46.4237 20.7027L43.3052 21.5383L44.0013 24.1361L47.3292 23.2444L47.637 24.3933ZM50.1141 14.861C50.8272 14.6699 51.439 14.599 51.9497 14.6482C52.464 14.6964 52.8819 14.8675 53.2034 15.1615C53.5286 15.4545 53.7644 15.8746 53.911 16.4217C54.0202 16.8292 54.0378 17.1966 53.9637 17.5238C53.8896 17.851 53.7552 18.1417 53.5605 18.3961C53.3658 18.6505 53.144 18.8717 52.8951 19.0597L56.2251 22.0922L54.6913 22.5032L51.8048 19.7219L50.4747 20.0783L51.3634 23.3949L50.0051 23.7588L47.7879 15.4843L50.1141 14.861ZM50.3268 16.0172L49.4496 16.2523L50.1744 18.9576L51.114 18.7059C51.7441 18.5371 52.1693 18.2978 52.3896 17.988C52.6137 17.6772 52.6645 17.2936 52.5422 16.837C52.4138 16.3578 52.17 16.0592 51.8108 15.9411C51.4554 15.822 50.9607 15.8474 50.3268 16.0172ZM24.5828 40.6181C24.7537 41.2558 24.8282 41.8586 24.8065 42.4265C24.7876 42.9897 24.6683 43.5029 24.4487 43.9662C24.228 44.4256 23.9035 44.822 23.4752 45.1551C23.0468 45.4883 22.5081 45.7418 21.8591 45.9157C21.1988 46.0926 20.598 46.1444 20.0567 46.0711C19.5191 45.9968 19.0395 45.8139 18.6176 45.5225C18.1996 45.2301 17.8411 44.8429 17.5421 44.3609C17.2431 43.8789 17.0081 43.3191 16.8373 42.6814C16.6088 41.8287 16.5492 41.048 16.6586 40.3393C16.7707 39.6258 17.0665 39.0167 17.546 38.5122C18.0283 38.0028 18.709 37.6303 19.5881 37.3948C20.4484 37.1643 21.2104 37.1481 21.8742 37.3464C22.5379 37.5446 23.0968 37.9247 23.5506 38.4865C24.0072 39.0435 24.3513 39.7541 24.5828 40.6181ZM18.2666 42.3106C18.4374 42.9482 18.6723 43.4778 18.9712 43.8991C19.2692 44.3167 19.6312 44.6039 20.0574 44.7606C20.4863 44.9126 20.9838 44.9128 21.5498 44.7611C22.1195 44.6084 22.5503 44.3596 22.842 44.0145C23.1327 43.6657 23.3008 43.2364 23.3462 42.7268C23.3906 42.2135 23.3274 41.638 23.1566 41.0003C22.8967 40.0306 22.4992 39.3243 21.964 38.8813C21.4315 38.4335 20.7427 38.3229 19.8975 38.5494C19.3315 38.701 18.8989 38.9504 18.5996 39.2975C18.3041 39.6436 18.1318 40.0719 18.0826 40.5825C18.0323 41.0893 18.0937 41.6654 18.2666 42.3106ZM34.956 42.2851L33.2864 42.7325L27.4642 37.2134L27.4133 37.227C27.488 37.4456 27.5644 37.6779 27.6425 37.9239C27.7243 38.1689 27.8044 38.4224 27.8827 38.6845C27.9648 38.9456 28.046 39.211 28.1263 39.4806L29.2849 43.8046L28.0511 44.1352L25.834 35.8607L27.4923 35.4164L33.2966 40.8917L33.3362 40.8811C33.2771 40.6907 33.2085 40.4725 33.1305 40.2265C33.0525 39.9805 32.9724 39.7269 32.8903 39.4659C32.811 39.2 32.7361 38.943 32.6656 38.695L31.4993 34.3427L32.7388 34.0106L34.956 42.2851ZM37.7089 41.5475L35.4917 33.2729L36.8501 32.909L38.7578 40.0289L42.2725 39.0871L42.5819 40.2417L37.7089 41.5475ZM45.7308 34.5754L46.6833 30.2742L48.1491 29.8814L46.7543 35.6782L47.6156 38.8929L46.263 39.2554L45.4152 36.0916L41.2895 31.7194L42.7667 31.3236L45.7308 34.5754Z" fill="white" />
								</svg>
							</span> -->
						</div>
						<!-- Name of workshop -->
						<div class="training_workshop_name">
							<!-- Title -->
							<a href="<?php echo esc_html( $permalink ); ?>">
							<div class="workshop_title"><?php echo esc_html( $title ); ?></div>
							</a>
							<!-- Author Name -->
							<div class="box_author">
								<!-- Slider Begin -->
								<div class="custom_slider">
									<?php
									if ( ! empty( $authors_ids ) && is_array( $authors_ids ) ) {
										foreach ( $authors_ids as $author_id ) {
											$upload_dir       = wp_upload_dir();
											$image_id         = ! empty( get_user_meta( $author_id, 'wp_user_avatar', true ) ) ? get_user_meta( $author_id, 'wp_user_avatar', true ) : '';
											$author_img_url   = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attached_file', true ) : '';
											$author_image_url = ! empty( $author_img_url ) ? $upload_dir['baseurl'] . '/' . $author_img_url : $default_author_img;
											$all_user_meta    = get_user_meta( $author_id );
											$firstname        = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
											$lastname         = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
											$author_name      = get_the_author_meta( 'display_name', $author_id );
											$p_author_name    = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $author_name;
											$p_author_state   = ! empty( get_user_meta( $author_id, 'moc_state', true ) ) ? get_user_meta( $author_id, 'moc_state', true ) : '';
											$p_author_city    = ! empty( get_user_meta( $author_id, 'moc_city', true ) ) ? get_user_meta( $author_id, 'moc_city', true ) . ', ' : '';
											?>
											<div class="slider_item">
												<div class="item_box">
													<img src="<?php echo esc_url( $author_image_url ); ?>" alt="author_img" />
													<span><?php echo esc_html( $p_author_name ); ?><br/> <?php echo esc_html( $p_author_city ); ?> <?php echo esc_html( $p_author_state ); ?></span>
												</div>
											</div>
											<?php
										}
									}
									?>
								</div>
								<!-- Slider End -->
							</div>
						</div>
					</div>
					<div class="content_box">
						<?php if ( ! empty( $description ) ) { ?>
							<p><?php echo esc_html( $description ); ?></p>
						<?php } ?>
					</div>
				</div>
			<?php
			$i++;
		}

		return ob_get_clean();	
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_blog_category_filter_html_block' ) ) {
	/**
	 * Get the HTML For blog filter html.
	 *
	 * @since 1.0.0
	 */
	function moc_blog_category_filter_html_block( $category ) {
		ob_start();
		$get_all_terms =! empty( $category ) ? moc_get_all_terms_by_taxonomy( $category ) : array();
			?>
			<div class="articles_box elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default">
				<div class="elementor-container elementor-column-gap-default">
					<div class="categories_tags articled_container">
						<div class="tag_box text_box"><?php esc_html_e( 'Categories', 'marketingops' ); ?></div>
						<a href="javascript:void(0);" data-termid="0" class="tag_box moc_all_tags moc_selected_taxonomy"><?php esc_html_e( 'ALL', 'marketingops' ); ?></a>
						<?php
						if ( ! empty( $get_all_terms ) && is_array( $get_all_terms ) ) {
							foreach ( $get_all_terms as $get_all_term ) {
								$term_id                       = $get_all_term->term_id;
								$get_show_category_in_frontend = get_term_meta( $term_id, 'moc_show_category_in_frontend', true );
								$term_name                     = $get_all_term->name;
								$term_name                     = strtoupper( $term_name );
								$term_slug                     = $get_all_term->slug;
								if ( is_array( $get_show_category_in_frontend ) && ! empty( $get_show_category_in_frontend ) && in_array( 'yes', $get_show_category_in_frontend, true ) ) {
									?><a href="javascript:void(0);" data-termid="<?php echo esc_attr( $term_id ); ?>" class="tag_box"><?php echo esc_html( $term_name ); ?></a><?php
								}
							}
						}
						?>
					</div>
				</div>
			</div>
		<?php

		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_all_terms_by_taxonomy' ) ) {
	/**
	 * Get all terms by taxonomy.
	 *
	 * @since 1.0.0
	 */
	function moc_get_all_terms_by_taxonomy( $taxonomy ) {
		$get_all_terms = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
				'exclude'    => 1,
			)
		);
		return $get_all_terms;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_blog_listings_html_block' ) ) {
	/**
	 * Get the HTML For blog listings html.
	 *
	 * @since 1.0.0
	 */
	function moc_blog_listings_html_block( $selected_sorting, $categories, $paged, $profile_view_user_id, $post_type, $taxonomy ) {
		ob_start();
		$posts_per_page    = ! empty( get_field( 'moc_blogs_per_page', 'option' ) ) ? ( int )get_field( 'moc_blogs_per_page', 'option' ) : get_option( 'posts_per_page' );
		$count_posts_query = moc_get_posts_query_by_dynamic_conditions( $post_type, $paged, -1, 'date', $selected_sorting, $taxonomy, $categories, $profile_view_user_id, '', array() );
		$count_posts       = count( $count_posts_query->posts );
		$get_query_posts   = moc_get_posts_query_by_dynamic_conditions( $post_type, $paged, $posts_per_page, 'date', $selected_sorting, $taxonomy, $categories, $profile_view_user_id, '', array() );
		$get_posts         = $get_query_posts->posts;
		if ( ! empty( $get_posts ) && is_array( $get_posts ) ) {
			?>
			<div class="articles_box elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default">
				<div class="elementor-container elementor-column-gap-default">
					<div class="articled_blogs articled_container">
						<div class="blogs_box_container">
							<?php
							foreach ( $get_posts as $key => $get_post_id ) {
								$moc_post_title   = get_the_title( $get_post_id );
								$moc_post_title   = substr( $moc_post_title, 0, 60 ) . '...';
								$moc_post_excerpt = strip_tags( get_the_excerpt( $get_post_id ) );
								$moc_post_excerpt = substr( $moc_post_excerpt, 0, 70 ) . '...';
								$moc_post_link    = get_the_permalink( $get_post_id );
								$post_image_id    = get_post_thumbnail_id( $get_post_id );
								$post_image_array = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
								$post_image_url   = ! empty( $post_image_array ) ? $post_image_array[0] : get_field( 'moc_default_post_image', 'option' );
								$class_to_add     = ( 1 > $key ) ? 'moc_first_posts_loaded' : '';
								?>
								<div data-type="<?php echo esc_html( $post_type ); ?>" class="blog_box <?php echo esc_attr( $class_to_add ); ?>">
									<!-- a  tag for redirection -->
									<a href="<?php echo esc_url( $moc_post_link ); ?>" class="blog_redirection">
										<!-- image -->
										<div class="box_img">
											<!-- image Size:- 775px X 335px -->
											<img src="<?php echo esc_url( $post_image_url ); ?>" />
										</div>
										<!-- blog text -->
										<div class="box_content">
											<h2><?php echo esc_html( $moc_post_title ); ?></h2>

											<?php // Remove the description for the podcasts. ?>
											<?php // if ( 'podcast' !== $post_type ) { ?>
												<p><?php echo esc_html( $moc_post_excerpt ); ?></p>
											<?php // } ?>
										</div>
									</a>
								</div>
								<?php
							}
							?>
						</div>
						<?php echo moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page ); ?>
					</div>
				</div>
			</div>
			<?php
		} else {
			$no_more_text = '';
			if ( 'podcast' === $post_type ) {
				$no_more_text = __( 'No more podcasts available.', 'marketingops' );
			} else if( 'post' === $post_type ) {
				$no_more_text = __( 'No more blogs available.', 'marketingops' );
			}
			?>
			<h4 class="moc_no_posts"><?php echo esc_html( $no_more_text ); ?></h4>
		<?php
		}
		?>
		<?php
		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_paginations_for_posts' ) ) {
	/**
	 * Function to define a paginations.
	 *
	 * @since 1.0.0
	 */
	function moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page ) {
		ob_start();
		$current_page      = $paged;
		$num_pages         = ceil( $count_posts / $posts_per_page );
		$end_size          = 1;
		$mid_size          = 4;
		$max_num_pages     = $num_pages;
		$start_pages       = range( 1, $end_size );
		$end_pages         = range( $max_num_pages - $end_size + 1, $max_num_pages );
		$mid_pages         = range( $current_page - $mid_size, $current_page + $mid_size );
		$pages             = array_intersect( range( 1, $max_num_pages ), array_merge( $start_pages, $end_pages, $mid_pages ) );
		?>
		<div class="pagination_container custom_pagination moc_training_pagination">
			<input type="hidden" name="moc_start_pagination" data-currentpage="<?php echo esc_attr( $current_page ); ?>" data-nextpage="<?php echo esc_attr( $current_page + 1 ); ?>" data-maxpage="<?php echo esc_attr( $max_num_pages ); ?>">
			<nav class="blog-directory-pagination">
				<ul>
					<?php
					if ( $num_pages > 1 ) {
						if ( ! empty( $current_page ) && $current_page > 1 ) {
							?>
							<li><a href="#" class="arrowleft" data-page="<?php echo esc_attr( $current_page - 1 ); ?>">&larr;</a></li>
							<?php
						}
						foreach ( $pages as $page ) {
							if ( intval( $prev_page ) !== intval( $page ) - 1 ) {
								?>
								<li><span class="gap">...</span></li>
								<?php
							}
							if ( intval( $current_page ) === intval( $page ) ) {
								?>
								<li><span class="current" data-page="<?php echo esc_attr( $page ); ?>"><?php echo esc_html( $page ); ?></span></li>
								<?php	
							} else {
								?>
								<li><a href="#" data-page="<?php echo esc_attr( $page ); ?>"><?php echo esc_html( $page ); ?></a></li>
								<?php
							}
							$prev_page = $page;
						}
						if ( $current_page && $current_page < $max_num_pages ) {
							?>
							<li><a href="#" class="arrowright" data-page="<?php echo esc_attr( $current_page + 1 ); ?>">&rarr;</a></li>
							<?php
						}
					}
					?>
				</ul>
			</nav>
		</div>
		<?php

		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_posts_by_search_keyword' ) ) {
	/**
	 * Get all terms by taxonomy.
	 *
	 * @since 1.0.0
	 */
	function moc_get_posts_by_search_keyword( $search_keyword, $post_type = 'post', $paged = 1, $posts_per_page = -1, $selected_sorting_by = 'date', $selected_sorting_order = 'DESC', $category = array(), $taxonomy = array(), $meta_key = '', $meta_value = '', $compare = '', $type = ''  ) {
		$args = array(
			'post_type'              => $post_type,
			'post_status'            => 'publish',
			'paged'                  => $paged,
			'ignore_sticky_posts'    => 1,
			'posts_per_page'         => $posts_per_page,
			'orderby'                => $selected_sorting_by,
			'order'                  => $selected_sorting_order,
			'fields'                 => 'ids',
			's'                      => $search_keyword,
			
		);
		if ( ( 0 === $meta_value ) && ( ! empty( $meta_key ) && ( '_price' === $meta_key ) ) )  {
			if ( 'featured_course' === $meta_key ) {
				$args[ 'tax_query' ] = 
				array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
						'operator' => 'IN', // or 'NOT IN' to exclude feature products
					),
				);
			} else {
				$args['meta_query'] = array(
					array(
						'key'     => "{$meta_key}",
						'value'   => $meta_value,
						'compare' => "{$compare}",
						'type'    => "{$type}",
					),
				);
			}
			
		}
		if ( ! empty( $category && $taxonomy ) ) {
			$args[ 'tax_query' ] = 
			array(
				array(
					'taxonomy' => $taxonomy,
					'terms' => $category,
					'field' => 'slug',
					'include_children' => true,
					'operator' => 'IN'
				),
			);
		}
		
		if ( 'product' === $post_type ) {
			$args[ 'tax_query' ] = 
			array(
				array(
					'taxonomy'        => 'product_type',
					'terms'            => 'course',
					'field'            => 'slug',
					'include_children' => true,
					'operator'         => 'IN'
				),
			);
		}
		
		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_get_posts_by_search_keyword_args', $args );
		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_training_products_listing_html' ) ) {
	/**
	 * Get the HTML For products listings html.
	 *
	 * @since 1.0.0
	 */
	function moc_training_products_listing_html( $search_keyword = '', $post_type = 'post', $paged = 1, $posts_per_page = '', $selected_sorting_by = 'date', $selected_sorting_order = 'DESC', $category = '', $taxonomy = '', $meta_key = '', $meta_value = '', $compare = '', $type = '', $professor_id = '' ) {
		global $wpdb;

		ob_start();
		$count_posts_query = moc_get_courses_by_search_keyword( $search_keyword, $post_type, $paged, -1, $selected_sorting_by, $selected_sorting_order, $category, $taxonomy, $meta_key, $meta_value, $compare, $type, $professor_id );
		$count_posts       = count( $count_posts_query->posts );
		$get_query_posts   = moc_get_courses_by_search_keyword( $search_keyword, $post_type, $paged, $posts_per_page , $selected_sorting_by, $selected_sorting_order, $category, $taxonomy, $meta_key, $meta_value, $compare, $type, $professor_id );
		$get_posts         = $get_query_posts->posts;
		if ( ! empty( $get_posts ) && is_array( $get_posts ) ) { ?>
			<div class="training_page_new">
				<div class="training_contnet_box">
						<div class="training_content">
							<?php
								$i = 0;
								foreach ( $get_posts as $key => $get_post_id ) {
									$class = '';
									if( 0 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
										
									} else if( 1 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 2 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 3 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 4 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 5 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 6 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 7 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 8 === $i ) {
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else {
										$i = 0;
										$class     = "moc_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									}
									$title = get_the_title( $get_post_id );
									$permalink = get_the_permalink( $get_post_id );
									$default_author_img         = get_field( 'moc_user_default_image', 'option' );
									// $professior_id              = get_post_meta( $get_post_id, '_moc_selected_professors', true );
									$professior_id              = get_post_meta( $get_post_id, 'course_author', true );
									$column_class               = ! empty( $professior_id ) ? 'moc_half_divide' : 'moc_no_divide';
									$post_author_username       = get_the_author_meta( 'user_nicename', $professior_id );
									$post_author_name           = get_the_author_meta( 'display_name', $professior_id );
									$all_user_meta              = get_user_meta( $professior_id );
									$firstname                  = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
									$lastname                   = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
									$post_author_name           = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $post_author_name;
									$author_img_id              = ! empty( get_user_meta( $professior_id, 'wp_user_avatar', true ) ) ? get_user_meta( $professior_id, 'wp_user_avatar', true ) : '';
									$author_img_url             = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
									$post_author_image_url      = ! empty( $author_img_url ) ? $author_img_url[0] : $default_author_img;
									$post_image_id              = get_post_thumbnail_id( $get_post_id );
									$post_image_array           = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
									$post_image_url             = ! empty( $post_image_array ) ? $post_image_array[0] : array( get_field( 'moc_workshop_default_image', 'option' ) );
									$author_state               = ! empty( get_user_meta( $professior_id, 'moc_state', true ) ) ? get_user_meta( $professior_id, 'moc_state', true ) : '';
									$author_city                = ! empty( get_user_meta( $professior_id, 'moc_city', true ) ) ? get_user_meta( $professior_id, 'moc_city', true ) . ', ' : '';
									$author_url                 = site_url() . '/profile/' . $post_author_username;
									$moc_post_excerpt           = strip_tags( get_the_excerpt( $get_post_id ) );
									$platform_terms_obj         = get_the_terms ( $get_post_id, 'training_platform' );
									$platform_id                = $platform_terms_obj[0]->term_id;
									$platform_icon_id           = get_term_meta( $platform_id, 'product_icons', true );
									$platform_icon_src          = ! empty( $platform_icon_id ) ? wp_get_attachment_image_src( $platform_icon_id, 'single-post-thumbnail' ) : array();
									$get_course_meta            = get_post_meta( $get_post_id, '_sfwd-courses', true );
									$get_couse_price            = $get_course_meta['sfwd-courses_course_price_type'];
									$meta_value                 = ( 1 ===  $meta_value ) ? 'free' : $meta_value;
									$related_groups             = ! empty( get_post_meta( $get_post_id, '_related_group', true ) ) ? get_post_meta( $get_post_id, '_related_group', true ) : array();
									$related_courses            = ! empty( get_post_meta( $get_post_id, '_related_course', true ) ) ? get_post_meta( $get_post_id, '_related_course', true ) : array();
									$description                = wp_trim_words( get_the_excerpt( $get_post_id ), 25, '...' );
									$authors_ids                = array();

									if ( ! empty( $related_groups ) && is_array( $related_groups ) ) {
										foreach ( $related_groups as $related_group ) {
											$course_id                       = $related_group;
											$authors_names_data              = get_post_meta( $course_id, 'ppma_authors_name', true );
											$authors_names_exp[$get_post_id] = explode( ', ', $authors_names_data );
										}
										$authors_name = $authors_names_exp[$get_post_id];
										foreach ( $authors_name as $author_name ) {
											$multi_author_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $author_name ) ), ARRAY_A );
											$authors_ids[]          = ! empty( $multi_author_query ) ? (int) $multi_author_query[0]['ID'] : 0;
										}
									} else {
										foreach ( $related_courses as $related_course ) {
											$course_id          = $related_course;
											$authors_names_data = get_post_meta( $course_id, 'ppma_authors_name', true );
											$authors_names_exp  = explode( ', ', $authors_names_data );
										}

										foreach ( $authors_names_exp as $author_name ) {
											$multi_author_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $author_name ) ), ARRAY_A );
											$authors_ids[]      = ! empty( $multi_author_query ) ? (int) $multi_author_query[0]['ID'] : 0;
										}
									}

									$authors_ids = array_unique( $authors_ids );
									?>
									<div class="456 training_content_boxed <?php echo esc_attr( $class );?>">
										<div class="boxed_bg" style="background-image: url('<?php echo esc_url( $image_url[0] ); ?>');">
											<!-- training Bages -->
											<div class="training_bages">
												
												<!-- <span class="bages_svg_box member_only">
													<svg width="60" height="60" viewBox="0 0 60 60" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<circle cx="30" cy="30" r="30" fill="#45474F" />
														<path
															d="M46.3639 41.3352V16.2128L36.8105 10.9091V49.0909L46.3639 41.3352ZM24.6612 14.2261L32.3612 16.5528V40.7386L24.6612 44.1869V14.2261ZM20.2119 19.1659L14.3652 18.1994V39.8735L20.2587 38.2807L20.2119 19.1659Z"
															fill="#F8F9F9" />
													</svg>
												</span>
												
												<span class="bages_svg_box member_only">
													<svg width="60" height="60" viewBox="0 0 60 60" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<circle cx="30" cy="30" r="30" fill="#45474F" />
														<path
															d="M8.71739 34.8218L4.48298 28.5498L4.43205 28.5634C4.48482 28.7151 4.55464 28.9228 4.64151 29.1867C4.72839 29.4505 4.81843 29.7338 4.91164 30.0363C5.00485 30.3389 5.08887 30.6298 5.16368 30.9091L6.37993 35.4482L5.14611 35.7788L2.92896 27.5042L4.83629 26.9932L8.89825 32.9839L8.93221 32.9748L9.53386 25.7345L11.4355 25.2249L13.6527 33.4994L12.3566 33.8467L11.1222 29.2397C11.0544 28.9869 10.9849 28.7123 10.9136 28.416C10.846 28.1187 10.7825 27.8364 10.7231 27.5693C10.6674 27.3011 10.6221 27.0868 10.5872 26.9263L10.5419 26.9384L9.91726 34.5003L8.71739 34.8218ZM21.0975 31.5046L16.4112 32.7603L14.1941 24.4858L18.8803 23.2301L19.1867 24.3733L15.8587 25.2651L16.4608 27.512L19.5793 26.6764L19.8841 27.814L16.7656 28.6496L17.4617 31.2474L20.7896 30.3557L21.0975 31.5046ZM27.0368 29.9132L22.8024 23.6411L22.7514 23.6547C22.8042 23.8064 22.874 24.0142 22.9609 24.278C23.0478 24.5419 23.1378 24.8251 23.231 25.1277C23.3242 25.4303 23.4083 25.7212 23.4831 26.0004L24.6993 30.5395L23.4655 30.8701L21.2483 22.5956L23.1557 22.0845L27.2176 28.0752L27.2516 28.0661L27.8532 20.8258L29.7549 20.3162L31.9721 28.5908L30.676 28.938L29.4415 24.331C29.3738 24.0782 29.3043 23.8037 29.233 23.5073C29.1654 23.21 29.1019 22.9278 29.0425 22.6606C28.9868 22.3924 28.9415 22.1781 28.9066 22.0176L28.8613 22.0297L28.2366 29.5917L27.0368 29.9132ZM32.5135 19.5771L34.9754 18.9174C36.0432 18.6313 36.8903 18.5701 37.5165 18.734C38.1427 18.8978 38.5575 19.3589 38.7607 20.1173C38.8456 20.4342 38.8658 20.7361 38.8214 21.0231C38.7797 21.3052 38.6755 21.5575 38.5086 21.7802C38.3408 21.999 38.1098 22.1782 37.8156 22.3177L37.8307 22.3743C38.1666 22.345 38.4783 22.3686 38.7657 22.4453C39.0569 22.5209 39.3101 22.6735 39.5253 22.903C39.7442 23.1314 39.9108 23.4589 40.0251 23.8852C40.1605 24.3908 40.155 24.8533 40.0086 25.2727C39.8659 25.6911 39.5967 26.0523 39.2011 26.3565C38.8091 26.6597 38.3094 26.8927 37.702 27.0554L34.7306 27.8516L32.5135 19.5771ZM34.7863 22.6259L36.088 22.2771C36.703 22.1124 37.1026 21.8981 37.2867 21.6344C37.4708 21.3708 37.5113 21.0465 37.4082 20.6617C37.3031 20.2692 37.0857 20.0242 36.7563 19.9264C36.4305 19.8277 35.962 19.8602 35.3508 20.024L34.1736 20.3394L34.7863 22.6259ZM35.0805 23.7239L35.7841 26.35L37.216 25.9664C37.8499 25.7965 38.2623 25.5546 38.4531 25.2406C38.644 24.9266 38.6833 24.5602 38.5711 24.1413C38.5024 23.8848 38.3842 23.6778 38.2167 23.5205C38.053 23.3622 37.8273 23.267 37.5396 23.2349C37.251 23.199 36.8859 23.2402 36.4444 23.3585L35.0805 23.7239ZM47.637 24.3933L42.9508 25.649L40.7336 17.3745L45.4199 16.1188L45.7262 17.2621L42.3983 18.1538L43.0004 20.4007L46.1189 19.5651L46.4237 20.7027L43.3052 21.5383L44.0013 24.1361L47.3292 23.2444L47.637 24.3933ZM50.1141 14.861C50.8272 14.6699 51.439 14.599 51.9497 14.6482C52.464 14.6964 52.8819 14.8675 53.2034 15.1615C53.5286 15.4545 53.7644 15.8746 53.911 16.4217C54.0202 16.8292 54.0378 17.1966 53.9637 17.5238C53.8896 17.851 53.7552 18.1417 53.5605 18.3961C53.3658 18.6505 53.144 18.8717 52.8951 19.0597L56.2251 22.0922L54.6913 22.5032L51.8048 19.7219L50.4747 20.0783L51.3634 23.3949L50.0051 23.7588L47.7879 15.4843L50.1141 14.861ZM50.3268 16.0172L49.4496 16.2523L50.1744 18.9576L51.114 18.7059C51.7441 18.5371 52.1693 18.2978 52.3896 17.988C52.6137 17.6772 52.6645 17.2936 52.5422 16.837C52.4138 16.3578 52.17 16.0592 51.8108 15.9411C51.4554 15.822 50.9607 15.8474 50.3268 16.0172ZM24.5828 40.6181C24.7537 41.2558 24.8282 41.8586 24.8065 42.4265C24.7876 42.9897 24.6683 43.5029 24.4487 43.9662C24.228 44.4256 23.9035 44.822 23.4752 45.1551C23.0468 45.4883 22.5081 45.7418 21.8591 45.9157C21.1988 46.0926 20.598 46.1444 20.0567 46.0711C19.5191 45.9968 19.0395 45.8139 18.6176 45.5225C18.1996 45.2301 17.8411 44.8429 17.5421 44.3609C17.2431 43.8789 17.0081 43.3191 16.8373 42.6814C16.6088 41.8287 16.5492 41.048 16.6586 40.3393C16.7707 39.6258 17.0665 39.0167 17.546 38.5122C18.0283 38.0028 18.709 37.6303 19.5881 37.3948C20.4484 37.1643 21.2104 37.1481 21.8742 37.3464C22.5379 37.5446 23.0968 37.9247 23.5506 38.4865C24.0072 39.0435 24.3513 39.7541 24.5828 40.6181ZM18.2666 42.3106C18.4374 42.9482 18.6723 43.4778 18.9712 43.8991C19.2692 44.3167 19.6312 44.6039 20.0574 44.7606C20.4863 44.9126 20.9838 44.9128 21.5498 44.7611C22.1195 44.6084 22.5503 44.3596 22.842 44.0145C23.1327 43.6657 23.3008 43.2364 23.3462 42.7268C23.3906 42.2135 23.3274 41.638 23.1566 41.0003C22.8967 40.0306 22.4992 39.3243 21.964 38.8813C21.4315 38.4335 20.7427 38.3229 19.8975 38.5494C19.3315 38.701 18.8989 38.9504 18.5996 39.2975C18.3041 39.6436 18.1318 40.0719 18.0826 40.5825C18.0323 41.0893 18.0937 41.6654 18.2666 42.3106ZM34.956 42.2851L33.2864 42.7325L27.4642 37.2134L27.4133 37.227C27.488 37.4456 27.5644 37.6779 27.6425 37.9239C27.7243 38.1689 27.8044 38.4224 27.8827 38.6845C27.9648 38.9456 28.046 39.211 28.1263 39.4806L29.2849 43.8046L28.0511 44.1352L25.834 35.8607L27.4923 35.4164L33.2966 40.8917L33.3362 40.8811C33.2771 40.6907 33.2085 40.4725 33.1305 40.2265C33.0525 39.9805 32.9724 39.7269 32.8903 39.4659C32.811 39.2 32.7361 38.943 32.6656 38.695L31.4993 34.3427L32.7388 34.0106L34.956 42.2851ZM37.7089 41.5475L35.4917 33.2729L36.8501 32.909L38.7578 40.0289L42.2725 39.0871L42.5819 40.2417L37.7089 41.5475ZM45.7308 34.5754L46.6833 30.2742L48.1491 29.8814L46.7543 35.6782L47.6156 38.8929L46.263 39.2554L45.4152 36.0916L41.2895 31.7194L42.7667 31.3236L45.7308 34.5754Z"
															fill="white" />
													</svg>
												</span> -->
											</div>
											<!-- Name of workshop -->
											<div class="training_workshop_name">
												<!-- Title -->
												<a href="<?php echo esc_url( $permalink ); ?>" class="workshop_title"><?php echo esc_html( $title ); ?></a>
												<!-- Slider Begin -->
												<div class="box_author">
													<div class="custom_slider custom_slider_ajax">
														<?php
														if ( ! empty( $authors_ids ) && is_array( $authors_ids ) ) {
															foreach ( $authors_ids as $author_id ) {
																$upload_dir       = wp_upload_dir();
																$image_id         = ! empty( get_user_meta( $author_id, 'wp_user_avatar', true ) ) ? get_user_meta( $author_id, 'wp_user_avatar', true ) : '';
																$author_img_url   = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attached_file', true ) : '';
																$author_image_url = ! empty( $author_img_url ) ? $upload_dir['baseurl'] . '/' . $author_img_url : $default_author_img;
																$all_user_meta    = get_user_meta( $author_id );
																$firstname        = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
																$lastname         = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
																$author_name      = get_the_author_meta( 'display_name', $author_id );
																$p_author_name    = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $author_name;
																$p_author_state   = ! empty( get_user_meta( $author_id, 'moc_state', true ) ) ? get_user_meta( $author_id, 'moc_state', true ) : '';
																$p_author_city    = ! empty( get_user_meta( $author_id, 'moc_city', true ) ) ? get_user_meta( $author_id, 'moc_city', true ) . ', ' : '';
																$author_username  = get_the_author_meta( 'user_nicename', $author_id );
																$author_url       = site_url() . '/profile/' . $author_username;
																?>
																<div class="slider_item">
																	<div class="item_box">
																		<a href="<?php echo esc_url( $author_url ); ?>">
																			<img src="<?php echo esc_url( $author_image_url ); ?>"
																				alt="author_img">
																			<span><?php echo esc_html( $p_author_name ); ?> <?php echo esc_html( $p_author_state ); ?> <?php echo esc_html( $p_author_city ); ?></span>
																		</a>
																	</div>
																</div>
																<?php
															}
														}
														?>
													</div>
												</div>
												<!-- Slider End -->
											</div>
										</div>
										<div class="content_box">
											<?php if ( ! empty( $description ) ) { ?>
												<p><?php echo esc_html( $description ); ?></p>
											<?php } ?>
										</div>
									</div>
									<?php
									$i++;
								}
							?>
					</div>
				</div>
				<?php
				echo moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page );
				?>
			</div>
			<?php
		} else {
			$no_more_text = __( 'No more courses available.', 'marketingops' );
			?>
			<h4 class="moc_no_posts"><?php echo esc_html( $no_more_text ); ?></h4>
			<?php
		}

		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_training_products_featured_course' ) ) {
	/**
	 * Get the HTML For products listings html.
	 *
	 * @since 1.0.0
	 */
	function moc_training_products_featured_course( $search_keyword = '', $post_type = 'post', $paged = 1, $posts_per_page = '', $selected_sorting_by = 'date', $selected_sorting_order = 'DESC', $category = '', $taxonomy = '', $meta_key = '', $meta_value = '', $compare = '', $type = '', $professor_id = '' ) {
		ob_start();
		$count_posts_query = moc_get_courses_by_search_keyword( $search_keyword, $post_type, $paged, -1, $selected_sorting_by, $selected_sorting_order, $category, $taxonomy, $meta_key, $meta_value, $compare, $type, $professor_id );
		$count_posts       = count( $count_posts_query->posts );
		$get_query_posts   = moc_get_courses_by_search_keyword( $search_keyword, $post_type, $paged, $posts_per_page , $selected_sorting_by, $selected_sorting_order, $category, $taxonomy, $meta_key, $meta_value, $compare, $type, $professor_id );
		$get_posts         = $get_query_posts->posts;
		$empty_posts       = ( empty( $get_posts ) ) ? moc_get_courses_by_search_keyword( $search_keyword, $post_type, $paged, $posts_per_page , $selected_sorting_by, $selected_sorting_order, $category, $taxonomy, '', $meta_value, $compare, $type, $professor_id ) : moc_get_courses_by_search_keyword( $search_keyword, $post_type, $paged, $posts_per_page , $selected_sorting_by, $selected_sorting_order, $category, $taxonomy, $meta_key, $meta_value, $compare, $type, $professor_id );
		$get_posts         = $empty_posts->posts;
		if ( ! empty( $get_posts ) && is_array( $get_posts ) ) {
			?>
			<div class="training_page_new">
				<?php
					$i = 1;
					foreach ( $get_posts as $key => $get_post_id ) {
						$class = '';
						if( 1 === $i ) {
							$class = "moc_training_index_{$i}";
						} else if( 2 === $i ) {
							$class = "moc_training_index_{$i}";
						} else if( 3 === $i ) {
							$class = "moc_training_index_{$i}";
						} else if( 4 === $i ) {
							$class = "moc_training_index_{$i}";
						} else if( 5 === $i ) {
							$class = "moc_training_index_{$i}";
						} else if( 6 === $i ) {
							$class = "moc_training_index_{$i}";
						} else {
							$i = 1;
							$class = "moc_training_index_{$i}";
						}

						$title                      = get_the_title( $get_post_id );
						$permalink                  = get_the_permalink( $get_post_id );
						$default_author_img         = get_field( 'moc_user_default_image', 'option' );
						// $professior_id              = get_post_meta( $get_post_id, '_moc_selected_professors', true );
						$professior_id              = get_post_meta( $get_post_id, 'course_author', true );
						$column_class               = ! empty( $professior_id ) ? 'moc_half_divide' : 'moc_no_divide';
						$post_author_username       = get_the_author_meta( 'user_nicename', $professior_id );
						$post_author_name           = get_the_author_meta( 'display_name', $professior_id );
						$all_user_meta              = get_user_meta( $professior_id );
						$firstname                  = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
						$lastname                   = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
						$post_author_name           = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $post_author_name;
						$author_img_id              = ! empty( get_user_meta( $professior_id, 'wp_user_avatar', true ) ) ? get_user_meta( $professior_id, 'wp_user_avatar', true ) : '';
						$author_img_url             = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
						$post_author_image_url      = ! empty( $author_img_url ) ? $author_img_url[0] : $default_author_img;
						$post_image_id              = get_post_thumbnail_id( $get_post_id );
						$post_image_array           = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
						$post_image_url             = ! empty( $post_image_array ) ? $post_image_array[0] : array( get_field( 'moc_workshop_default_image', 'option' ) );
						$author_state               = ! empty( get_user_meta( $professior_id, 'moc_state', true ) ) ? get_user_meta( $professior_id, 'moc_state', true ) : '';
						$author_city                = ! empty( get_user_meta( $professior_id, 'moc_city', true ) ) ? get_user_meta( $professior_id, 'moc_city', true ) . ', ' : '';
						$author_url                 = site_url() . '/profile/' . $post_author_username;
						$moc_post_excerpt           = strip_tags( get_the_excerpt( $get_post_id ) );
						$platform_terms_obj         = get_the_terms ( $get_post_id, 'training_platform' );
						$platform_id                = ( false !== $platform_terms_obj ) ? $platform_terms_obj[0]->term_id : '';
						$platform_icon_id           = get_term_meta( $platform_id, 'product_icons', true );
						$platform_icon_src          = ! empty( $platform_icon_id ) ? wp_get_attachment_image_src( $platform_icon_id, 'single-post-thumbnail' ) : array();
						$related_groups             = ! empty( get_post_meta( $get_post_id, '_related_group', true ) ) ? get_post_meta( $get_post_id, '_related_group', true ) : array();
						$related_courses            = ! empty( get_post_meta( $get_post_id, '_related_course', true ) ) ? get_post_meta( $get_post_id, '_related_course', true ) : array();
						$authors_ids                = array();
						$authors_names_exp          = array();
						if ( ! empty( $related_groups ) && is_array( $related_groups ) ) {
							foreach ( $related_groups as $related_group ) {
								$course_id           = $related_group;
								$authors_names_data  = get_post_meta( $course_id, 'ppma_authors_name', true );
								$authors_names_exp[] = explode( ', ', $authors_names_data );
							}
							$authors_name = $authors_names_exp[0];
							foreach ( $authors_name as $author_name ) {
								global $wpdb;
								$multi_author_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $author_name ) ), ARRAY_A );
								$authors_ids[]      = ! empty( $multi_author_query ) ? (int) $multi_author_query[0]['ID'] : 0;
							}
						} else {
							foreach ( $related_courses as $related_course ) {
								$course_id                       = $related_course;
								$authors_names_data              = get_post_meta( $course_id, 'ppma_authors_name', true );
								$authors_names_exp[] = explode( ', ', $authors_names_data );
							}
							$authors_name = ( ! empty( $authors_names_exp[0] ) ) ? $authors_names_exp[0] : array();
							foreach ( $authors_name as $author_name ) {
								global $wpdb;
								$multi_author_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $author_name ) ), ARRAY_A );
								$authors_ids[]          = ! empty( $multi_author_query ) ? (int) $multi_author_query[0]['ID'] : 0;
							}
						}
						$authors_ids = array_unique( $authors_ids );
						?>
						<div class="training_page_poster elementor-section-boxed">
							<div class="elementor-container elementor-column-gap-default">
								<!-- Left Content -->
								<div class="elementor-column elementor-col-66 elementor-top-column elementor-element poster_left">
									<div class="elementor-widget-wrap elementor-element-populated">
										<!-- Left Content Title -->
										<div class="elementor-element elementor-widget elementor-widget-heading">
											<div class="elementor-widget-container">
												<h2 class="elementor-heading-title elementor-size-default"><?php echo esc_html( $title ); ?></h2>
											</div>
										</div>
										<!-- Left Content Text -->
										<div class="elementor-element elementor-widget elementor-widget-text-editor">
											<div class="elementor-widget-container">
												<div><?php echo esc_html( $moc_post_excerpt ); ?></div>
											</div>
										</div>
										<!-- Left Content btn -->
										<div class="elementor-element elementor-align-left elementor-widget elementor-widget-button">
											<div class="elementor-widget-container">
												<div class="elementor-button-wrapper">
													<a href="<?php echo esc_url( $permalink ); ?>" class="elementor-button-link elementor-button elementor-size-sm"
														role="button">
														<span class="elementor-button-content-wrapper">
															<span class="elementor-button-icon elementor-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11"
																	viewBox="0 0 20 11" fill="none">
																	<path
																		d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z"
																		fill="white"></path>
																</svg> </span>
															<span class="elementor-button-text"><?php esc_html_e( 'View Course', 'marketingops' ); ?></span>
														</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Right Content -->
								<div class="elementor-column elementor-col-33 elementor-top-column elementor-element poster_right">
									<div class="elementor-widget-wrap elementor-element-populated">
										<!-- Right Content Logo Img -->
										<!-- <div class="elementor-element poster_right_social_logo elementor-widget elementor-widget-image">
											<div class="elementor-widget-container">
												<img src="/wp-content/uploads/2022/02/mailchimp_logo_white.svg"
													class="attachment-full size-full" alt="" width="60" height="60">
											</div>
										</div> -->
										<!-- Right Content Text -->
										<div class="elementor-elemen poster_right_text_box elementor-widget elementor-widget-text-editor">
											<div class="elementor-widget-container">
												<p><?php esc_html_e( 'Taught by:', 'marketingops' ); ?></p>
											</div>
										</div>
										<?php
										if ( ! empty( $authors_ids ) && is_array( $authors_ids ) ) {
											?>
											<!-- Slider Changes Here | Start -->
											<div class="custom_slider">
												<?php
												foreach ( $authors_ids as $professior_id ) {
													$upload_dir            = wp_upload_dir();
													$image_id              = ! empty( get_user_meta( $professior_id, 'wp_user_avatar', true ) ) ? get_user_meta( $professior_id, 'wp_user_avatar', true ) : '';
													$author_img_url        = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attached_file', true ) : '';
													$post_author_image_url = ! empty( $author_img_url ) ? $upload_dir['baseurl'] . '/' . $author_img_url : $default_author_img;
													$all_user_meta              = get_user_meta( $professior_id );
													$firstname                  = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
													$lastname                   = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
													$author_name                = get_the_author_meta( 'display_name', $professior_id );
													$post_author_name           = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $author_name;
													$author_state               = ! empty( get_user_meta( $professior_id, 'moc_state', true ) ) ? get_user_meta( $professior_id, 'moc_state', true ) : '';
													$author_city                = ! empty( get_user_meta( $professior_id, 'moc_city', true ) ) ? get_user_meta( $professior_id, 'moc_city', true ) . ', ' : '';
													?>
													<!-- Item Loop -->
													<div class="slider_item">
														<!-- Right Content User Image -->
														<div class="elementor-element poster_right_text_box poster_right_image_box elementor-widget elementor-widget-image">
															<div class="elementor-widget-container">
																<img src="<?php echo esc_url( $post_author_image_url ); ?>" class="attachment-large size-large"
																	alt="" width="188" height="189">
															</div>
														</div>
														<!-- Right Content User Name -->
														<div class="elementor-element poster_right_text_box elementor-widget elementor-widget-heading">
															<div class="elementor-widget-container">
																<h4 class="elementor-heading-title elementor-size-default"><?php echo esc_html( $post_author_name ); ?> <?php echo esc_html( $author_state ); ?> <?php echo esc_html( $author_city ); ?></h4>
															</div>
														</div>
													</div>
													<?php
												}
												?>
											</div>
											<!-- Slider Changes Here | End -->
											<?php
										} 
										?>
										<!-- Right Content User Badges -->
										<div class="elementor-element poster_right_new_badge elementor-widget elementor-widget-image">
											<div class="elementor-widget-container">
												<img src="/wp-content/uploads/2022/02/New_text_badge.svg"
													class="attachment-large size-large" alt="" width="105" height="105">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					}
				?>
			</div>
		<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_post_count_results' ) ) {
	/**
	 * Get the HTML For post counts results html.
	 *
	 * @since 1.0.0
	 */
	function moc_post_count_results( $search_keyword, $post_ids, $singuler_text, $plural_text ) {
		ob_start();
		$get_jobs_count    = count( $post_ids );
		$founded_jobs      = $get_jobs_count;
		$singuler_text     = sprintf( __( '%1$s found', 'marketingops' ), $singuler_text );
		$plural_text       = sprintf( __( '%1$s found', 'marketingops' ), $plural_text );
		$fouded_posts_text = ( 1 < $founded_jobs ) ? $founded_jobs. ' '. $plural_text : $founded_jobs. ' '. $singuler_text;
		$fouded_posts_text = ( 0 < $founded_jobs ) ? $fouded_posts_text : 'We\'re sorry the search you entered has no results';
		?>
		<span class="moc_jobs_search_keyword"><?php echo esc_html( $search_keyword ); ?></span>
		<span class="moc_jobs_count_value"><?php echo esc_html( $fouded_posts_text ); ?></span>
		<?php

		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_custom_product_type_slug' ) ) {
	/**
	 * Get the custom product type slug.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_custom_product_type_slug() {

		return 'training';
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_custom_product_type_label' ) ) {
	/**
	 * Get the custom product type label.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_custom_product_type_label() {
		$product_type_label = __( 'Training', 'marketingops' );

		/**
		 * This hook fires in admin panel on the item settings page.
		 *
		 * This filter will help in modifying the product type label.
		 *
		 * @param string $product_type_label Holds the product type label.
		 * @return string
		 */
		return apply_filters( 'moc_product_type_label', $product_type_label );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_otp_varification_html' ) ) {
	/**
	 * Get the HTML of OTP Form.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_otp_varification_html( $click_count ) {
		ob_start();
		?>
		<div class="email-otp moc-otp-section">
			<div class="loader_bg">
				<div class="loader"></div>  
			</div>
			<div class="email-otp-container">
				<div class="email-otp-title">
					<div class="gradient-title">
						<?php
						
						?>
						<h3><?php echo sprintf( __( 'We just sent you e-mail with %1$s verification code %2$s', 'marketingops' ), '<span>', '</span>' ); ?></h3>
						<p><?php esc_html_e( 'Please check it and apply to the form below', 'marketingops' ); ?></p>
						<p><?php esc_html_e( 'If you don\'t see it in your inbox sure to look in your spam/junk folder for the code.' ); ?></p>
					</div>
				</div>
				<div class="email-otp-form moc-email-otp-initial-stage">
					<div class="form-container">
						<div class="colum-box colum-box-1">
							<div class="box_container">
								<div class="otp-box">
									<div class="otp-inputs" data-group-name="digits">
										<div class="otp-input-box">
											<input type="password" class="otp-input" id="digit-1" name="digit-1" data-next="digit-2" />
											<span class="placeholder">
												<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.5" d="M7.70605 0.179688L7.16016 5.19434L12.2129 3.78516L12.543 6.0957L7.70605 6.48926L10.8545 10.6279L8.6709 11.8213L6.43652 7.22559L4.40527 11.8213L2.1709 10.6279L5.24316 6.48926L0.457031 6.0957L0.825195 3.78516L5.78906 5.19434L5.24316 0.179688H7.70605Z" fill="#6D7B83"/>
												</svg>										
											</span>
										</div>
										<div class="otp-input-box">
											<input type="password" class="otp-input" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
											<span class="placeholder">
												<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.5" d="M7.70605 0.179688L7.16016 5.19434L12.2129 3.78516L12.543 6.0957L7.70605 6.48926L10.8545 10.6279L8.6709 11.8213L6.43652 7.22559L4.40527 11.8213L2.1709 10.6279L5.24316 6.48926L0.457031 6.0957L0.825195 3.78516L5.78906 5.19434L5.24316 0.179688H7.70605Z" fill="#6D7B83"/>
												</svg>										
											</span>
										</div>
										<div class="otp-input-box">
											<input type="password" class="otp-input" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
											<span class="placeholder">
												<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.5" d="M7.70605 0.179688L7.16016 5.19434L12.2129 3.78516L12.543 6.0957L7.70605 6.48926L10.8545 10.6279L8.6709 11.8213L6.43652 7.22559L4.40527 11.8213L2.1709 10.6279L5.24316 6.48926L0.457031 6.0957L0.825195 3.78516L5.78906 5.19434L5.24316 0.179688H7.70605Z" fill="#6D7B83"/>
												</svg>										
											</span>
										</div>
										<div class="otp-input-box">
											<input type="password" class="otp-input" id="digit-4" name="digit-4" data-previous="digit-3" />
											<span class="placeholder">
												<svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path opacity="0.5" d="M7.70605 0.179688L7.16016 5.19434L12.2129 3.78516L12.543 6.0957L7.70605 6.48926L10.8545 10.6279L8.6709 11.8213L6.43652 7.22559L4.40527 11.8213L2.1709 10.6279L5.24316 6.48926L0.457031 6.0957L0.825195 3.78516L5.78906 5.19434L5.24316 0.179688H7.70605Z" fill="#6D7B83"/>
												</svg>										
											</span>
										</div>
									</div>
									<div class="otp-backspace">
										<a href="#">
											<div class="svg_icon">
												<img src="<?php echo esc_url( MOC_PLUGIN_URL ); ?>/public/images/Vector-3.svg">
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="colum-box colum-box-2">
							<div class="btn_container">
								<a href="#" class="btn email_submit_btn">
									<span class="moc-approve"><?php esc_html_e( 'Approve', 'marketingops' ); ?></span>
									<span class="svg">
										<svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10.5262 0.994573C10.2892 0.985459 10.0693 1.12103 9.97249 1.3375C9.87452 1.55396 9.91667 1.80688 10.0807 1.98005L11.8728 3.91682H0.592831C0.382065 3.9134 0.187248 4.02391 0.0812957 4.20619C-0.0257965 4.38734 -0.0257965 4.61292 0.0812957 4.79406C0.187248 4.97634 0.382065 5.08685 0.592831 5.08344H11.8728L10.0807 7.02021C9.9349 7.17287 9.88363 7.39161 9.94515 7.59326C10.0067 7.79492 10.1719 7.94758 10.3769 7.99315C10.5831 8.03872 10.7973 7.96922 10.9375 7.81314L14.001 4.50013L10.9375 1.18711C10.8326 1.0709 10.6834 1.00027 10.5262 0.994573Z" fill="white"/>
										</svg>							
									</span>
								</a>
								<input type="hidden" name="moc_emailded_otp">
								<input type="hidden" name="moc_username">
								<input type="hidden" name="moc_agencyname">
								<input type="hidden" name="moc_password">
								<input type="hidden" name="moc_email">
								<input type="hidden" name="moc_who_reffered_you">
								<input type="hidden" name="moc_resend_count_bind" value="<?php echo esc_attr( $click_count ); ?>">
							</div>
						</div>
						<div class="colum-box colum-box-3">
							<?php 
								if( 2 >= $click_count ) {
									?>
									<p class="moc_resend_notification"><?php echo sprintf( __( 'Not seeing anything? %1$s Resend %2$s', 'marketingops' ), '<a class="moc_resend_btn" href="#">', '</a>' ); ?></p>
									<span id="countdown2" class="circleTimer" data-size="99" data-thickness="7">
										<span></span>
									</span>
									<div id="getting-started"></div>
									<div id="moc_otp_expiration_timer"></div>
									<div class="moc_error moc_wrong_otp"><span></span></div>
									<?php
								} else {
									?>
									<p class="moc_resend_notification"><?php echo sprintf( __( 'Not seeing anything? %1$s Contact Us %2$s', 'marketingops' ), '<a class="moc_contact_to_admin" href="'. site_url( 'contact' ) .'">', '</a>' ); ?></p>
									<?php
								}
							?>
						</div>
					</div>

				</div>
				<div class="email-otp-image">
					<div class="image_container">
						<img src="/wp-content/themes/marketingops/images/email_code/email_code_image.png" alt="email_code_image" />
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_email_template_html' ) ) {
	/**
	 * Get the product HTML of email template.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_email_template_html( $_nonce_array ) {
		ob_start();
		$email_template = get_field( 'email_otp_verification_template', 'option' );
		$message        = $email_template['message'];
		$message        = str_replace( '{1}', $_nonce_array[0], $message );
		$message        = str_replace( '{2}', $_nonce_array[1], $message );
		$message        = str_replace( '{3}', $_nonce_array[2], $message );
		$message        = str_replace( '{4}', $_nonce_array[3], $message );
		?>
		<style type="text/css">
		@font-face {
			font-family: 'Futura LT Bold';
			font-style: normal;
			font-weight: normal;
			src: local('Futura LT Bold'), url(<?php echo esc_url( MOC_PLUGIN_URL . 'public/fonts/FuturaLT-Bold.woff' ); ?>) format('woff');
		}
		
		@font-face {
			font-family: 'open_sansregular';
			src: url(<?php echo esc_url( MOC_PLUGIN_URL . 'public/fonts/opensans-regular-webfont.woff2' ); ?>) format('woff2'), url(<?php echo esc_url( MOC_PLUGIN_URL . 'public/fonts/opensans-regular-webfont.woff' ); ?>) format('woff');
			font-weight: normal;
			font-style: normal;
		}
		</style>
		<?php
		echo $message;

		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_products_slug' ) ) {
	/**
	 * Get the product slug by product id.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_products_slug( $member_product_ids ) {
		foreach ( $member_product_ids as $member_product_id ) {
			$product_obj = wc_get_product( $member_product_id  );
			$products_slug[$member_product_id] = $product_obj->get_sku();
		}
		return $products_slug;
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_no_bs_demo_lists_html' ) ) {
	/**
	 * Get the HTML of no bs demo lists.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_no_bs_demo_lists_html() {
		$no_bs_demo_query = moc_get_posts_query_by_dynamic_conditions( 'no_bs_demo', 1, 3, 'date', 'DESC', '', array(), '', '', array() );
		$no_bs_demos      = $no_bs_demo_query->posts;
		$get_all_terms    = ! empty( moc_get_all_terms_by_taxonomy( 'no_bs_demo_category' ) ) ? moc_get_all_terms_by_taxonomy( 'no_bs_demo_category' ) : array();
		ob_start();
		?>
		<!-- No BS Index Content-->
		<div class="no_bs_index">
			<div class="no_bs_container">
				<div class="container_box">
					<div class="no_bs_filter">
						<span>Quick filters</span>
						<ul>
							<li class="tab_box moc_tab_category_box">
								<a href="#" class="active moc_all_no_bs_category" data-catid=""><?php esc_html_e( 'ALL', 'marketingops' ); ?></a>
							</li>
							<?php
							if ( ! empty( $get_all_terms ) && is_array( $get_all_terms ) ) {
								foreach ( $get_all_terms as $get_all_term ) {
									$term_id   = $get_all_term->term_id;
									$get_show_category_in_frontend = get_term_meta( $term_id, 'moc_show_category_in_frontend', true );
									$term_name = $get_all_term->name;
									$term_name = str_replace('&amp;', '&', $term_name);
									$term_name = strtoupper( $term_name );
									$term_slug = $get_all_term->slug; 
									$get_show_category_in_frontend = get_term_meta( $term_id, 'moc_show_category_in_frontend', true );
									if ( ! empty( $get_show_category_in_frontend ) && is_array( $get_show_category_in_frontend ) && in_array( 'yes', $get_show_category_in_frontend, true ) ) {
										?>
										<li class="tab_box moc_tab_category_box">
											<a href="javascript:void(0);" class="moc_no_bs_category" data-catid="<?php echo esc_attr( $term_id ); ?>"><?php echo esc_html( $term_name ); ?></a>
										</li>
										<?php
									}
									?>
									<?php
								}
							}
							?>
						</ul>
					</div>
					<div class="no_bs_content_box">
						<div class="box_container moc_no_bs_demo_loop_sectiion"></div>
					</div>
				</div>
			</div>
		</div>
	<?php
	return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_no_bs_demo_loop_html' ) ) {
	/**
	 * Get the HTML of demos loop.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_no_bs_demo_loop_html( $no_bs_demos, $paged, $count_posts, $posts_per_page, $mo_bs_location ) {
		ob_start();
		$paged               = (int) $paged;
		$form_logic_position = count( $no_bs_demos );
		$i                   = 1;

		foreach ( $no_bs_demos as $no_bs_demo ) {
			$name               = get_the_title( $no_bs_demo );
			$link               = get_the_permalink( $no_bs_demo );
			$content            = get_the_excerpt( $no_bs_demo );
			$description        = strip_tags( $content );
			$description        = substr( $description, 0, 130 ) . '...';
			$has_offer          = get_field( 'has_offer', $no_bs_demo );
			$coupon_code        = ! empty( get_field( 'select_coupon_code', $no_bs_demo ) ) ? get_field( 'select_coupon_code', $no_bs_demo ) : '';
			$coupon_slug        = get_post_field( 'post_name', $coupon_code );
			$select_coupon_code = ( true === $has_offer ) ? $coupon_code : array();
			$video_type         =  ( 'null' !== get_field( 'video_type', $no_bs_demo ) ) ? get_field( 'video_type', $no_bs_demo ) : '';
			$video_link         = ( 'hosted_video' === $video_type ) ? get_field( 'video_file', $no_bs_demo ) : '';
			$post_image_id      = get_post_thumbnail_id( $no_bs_demo );
			$post_image_array   = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
			$post_image_url     = ! empty( $post_image_array ) ? $post_image_array[0] : array( get_field( 'moc_workshop_default_image', 'option' ) );
			$approved_text      = sprintf( __( 'approved by: %1$s 122 %2$s ', 'marketingops' ), '<b>','</b>' );
			$approved_text      = '';
			
			if ( ( ( $form_logic_position === $i ) && 1 === $paged ) && ( 'related' !== $mo_bs_location ) ) {
				// echo moc_hubspt_nobs_demo();
			}
			?>
			<div class="box_content">
				<div class="content_container">
					<div class="img_box">
						<img src="<?php echo esc_url( $post_image_url ); ?>" alt="img_1." />
					</div>
					<div class="bs_content">
						<div class="site_link_verify">
							<div class="site_link">
								<a href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_html( $name ); ?></a>
							</div>
							<?php
							if ( ! empty( $approved_text ) ) {
								?>
								<div class="verify_content">
									<a href="#">
										<span class="text"><?php echo $approved_text; ?></b></span>
										<span class="svg_icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
												<style type="text/css">
													.moc_svg_icon_1 {fill: url(#SVGID_1_)}
													.moc_svg_icon_2 {fill: #fff}
												</style>
												<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="-0.2967" y1="12.0002" x2="31.4467" y2="12.0002" gradientTransform="matrix(1 0 0 -1 0 22)">
													<stop offset="0" style="stop-color:#fd4b7a" />
													<stop offset="1" style="stop-color:#4d00ae" />
												</linearGradient>
												<path class="moc_svg_icon_1" d="M7,0.2C6,0.2,5,0.8,4.5,1.8L3.6,3.6L1.8,4.5c-1.3,0.7-2,2.2-1.5,3.6L0.9,10l-0.6,1.9c-0.5,1.4,0.2,3,1.5,3.6
												l1.8,0.9l0.9,1.8c0.7,1.3,2.2,2,3.6,1.5l1.9-0.6l1.9,0.6c1.4,0.5,3-0.2,3.6-1.5l0.9-1.8l1.8-0.9c1.3-0.7,2-2.2,1.5-3.6L19.1,10
												l0.6-1.9c0.5-1.4-0.2-3-1.5-3.6l-1.8-0.9l-0.9-1.8c-0.7-1.3-2.2-2-3.6-1.5L10,0.9L8.1,0.3C7.8,0.2,7.4,0.2,7,0.2z" />
												<linearGradient id="SVGID_00000131367767756529177010000010455871422728802453_" gradientUnits="userSpaceOnUse" x1="0" y1="22" x2="0" y2="22" gradientTransform="matrix(1 0 0 -1 0 22)">
													<stop offset="0" style="stop-color:#fd4b7a" />
													<stop offset="1" style="stop-color:#4d00ae" />
												</linearGradient>
												<path style="fill:url(#SVGID_00000131367767756529177010000010455871422728802453_)" d="M0,0" />
												<linearGradient id="SVGID_00000069360138539335796620000005279328395410303629_" gradientUnits="userSpaceOnUse" x1="0" y1="22" x2="0" y2="22" gradientTransform="matrix(1 0 0 -1 0 22)">
													<stop offset="0" style="stop-color:#fd4b7a" />
													<stop offset="1" style="stop-color:#4d00ae" />
												</linearGradient>
												<path style="fill:url(#SVGID_00000069360138539335796620000005279328395410303629_)" d="M0,0" />
												<path class="moc_svg_icon_2" d="M1.5,14.4c-0.6-0.6-0.6-1.7,0-2.4l5.8-5.8C8,5.5,9,5.5,9.7,6.2c0.6,0.6,0.6,1.7,0,2.4l-5.8,5.8
												C3.2,15,2.1,15,1.5,14.4z" />
												<path class="moc_svg_icon_2" d="M7.3,14.4c-0.6-0.6-0.6-1.7,0-2.4l5.8-5.8c0.6-0.6,1.7-0.6,2.4,0c0.6,0.6,0.6,1.7,0,2.4l-5.8,5.8
												C9,15,8,15,7.3,14.4z" />
												<path class="moc_svg_icon_2" d="M13.1,14.4c-0.6-0.6-0.6-1.7,0-2.4l2-2c0.6-0.6,1.7-0.6,2.4,0c0.6,0.6,0.6,1.7,0,2.4l-2,2
												C14.8,15,13.8,15,13.1,14.4z" />
											</svg>
										</span>
									</a>
								</div>
								<?php
							}
							?>
						</div>
						<!-- bs content -->
						<div class="bs_content_text">
							<p><?php echo esc_html( $description ); ?></p>
						</div>
						<!-- bs btn -->
						<div class="bs_btn">
							<!-- gradient bg -->
							<a href="<?php echo esc_url( $link ); ?>" class="btn gradient_btn">
								<span class="text"><?php echo esc_html( 'Watch demo' ); ?></span>
								<span class="svg">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#fff">
										<g clip-path="url(#clip0_446_965)">
											<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#fff"></path>
										</g>
										<defs>
											<clipPath id="clip0_446_965">
												<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
											</clipPath>
										</defs>
									</svg>
								</span>
							</a>
							<!-- Gray bg -->
							<?php
							if ( ! empty( $has_offer ) && ! empty( $coupon_code ) ) {
								?>
								<a href="<?php echo esc_url( site_url() ); ?>/member-only-partner-offers/?coupon_code=<?php echo esc_attr( $coupon_slug ); ?>" class="btn gray_btn">
									<span class="text"><?php echo esc_html( 'View offer' ); ?></span>
									<span class="svg">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#242730">
											<g clip-path="url(#clip0_446_965)">
												<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#242730"></path>
											</g>
											<defs>
												<clipPath id="clip0_446_965">
													<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
												</clipPath>
											</defs>
										</svg>
									</span>
								</a>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
			$i++;
		}
		echo moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page );
		return ob_get_clean();
	}
}
/**
 * Check function is exisi or not.
 */
if ( ! function_exists( 'moc_no_bs_demo_coupons_lists_html' ) ) {
	/**
	 * Function to return HTML of listings of Coupons.
	 *
	 * @since 1.0.0
	 */
	function moc_no_bs_demo_coupons_lists_html() {
		ob_start();
		?>
		<!-- No BS Index Content-->
		<div class="no_bs_partner no_bs_index">
			<div class="no_bs_container">
				<div class="container_box moc_load_lists_no_bs_demo_coupons_container">
					<div class="loader_bg">
						<div class="loader"></div>  
					</div>
					<!-- NO BS Content Box-->
					<div class="no_bs_content_box">
						<div class="box_container">
							<!-- box content | Loop  -->
							<div class="moc_load_lists_no_bs_demo_coupons_inner_section"></div>
						</div>
					</div>
					<!-- load more function -->
					<!-- <div class="load_more_function">
						<a href="#testimonial_container" class="elementor-button-link elementor-button elementor-size-sm" role="button">
							<span class="elementor-button-content-wrapper">
								<span class="elementor-button-icon elementor-align-icon-right">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
										<g clip-path="url(#clip0_446_1054)">
											<path d="M11.2501 7.25006C12.4839 7.25006 13.5001 8.2663 13.5001 9.50006L13.5001 15.0001L15.9698 12.5303C16.0398 12.4584 16.1235 12.4012 16.216 12.3622C16.3085 12.3232 16.4078 12.3032 16.5082 12.3033C16.6573 12.3035 16.803 12.3481 16.9267 12.4315C17.0503 12.5149 17.1463 12.6332 17.2023 12.7715C17.2584 12.9097 17.272 13.0614 17.2413 13.2074C17.2107 13.3533 17.1373 13.4869 17.0304 13.5909L13.2804 17.3409C13.1397 17.4815 12.949 17.5605 12.7501 17.5605C12.5512 17.5605 12.3605 17.4815 12.2198 17.3409L8.46985 13.5909C8.39787 13.5218 8.3404 13.439 8.30081 13.3474C8.26122 13.2558 8.24031 13.1572 8.23929 13.0574C8.23828 12.9577 8.25718 12.8587 8.2949 12.7663C8.33261 12.6739 8.38838 12.59 8.45894 12.5194C8.5295 12.4489 8.61343 12.3931 8.70582 12.3554C8.7982 12.3177 8.89718 12.2988 8.99696 12.2998C9.09674 12.3008 9.19531 12.3217 9.28691 12.3613C9.37851 12.4009 9.46129 12.4584 9.53039 12.5303L12.0001 15.0001L12.0001 9.50006C12.0001 9.07707 11.6731 8.75006 11.2501 8.75006L0.760649 8.75001C0.661264 8.75142 0.562593 8.73306 0.470367 8.696C0.378141 8.65894 0.294199 8.60392 0.223421 8.53413C0.152643 8.46435 0.0964431 8.38119 0.0580825 8.2895C0.0197219 8.19781 -3.24992e-05 8.09941 -3.24905e-05 8.00001C-3.24818e-05 7.90062 0.0197219 7.80222 0.0580825 7.71052C0.0964431 7.61883 0.152643 7.53568 0.223421 7.46589C0.294199 7.39611 0.378141 7.34109 0.470367 7.30403C0.562593 7.26697 0.661264 7.24861 0.760649 7.25001L11.2501 7.25006Z" fill="#242730"></path>
										</g>
										<defs>
											<clipPath id="clip0_446_1054"><rect width="18" height="18" fill="white" transform="matrix(-1 -8.74228e-08 -8.74228e-08 1 18 0)"></rect></clipPath>
										</defs>
									</svg>			
								</span>
							<span class="elementor-button-text">Load more</span>
							</span>
						</a>
					</div> -->
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();

	}
}
/**
 * Check function is exisi or not.
 */
if ( ! function_exists( 'moc_no_bs_demo_coupons_lists_loop_html' ) ) {
	/**
	 * Function to return HTML of listings of Coupons.
	 *
	 * @since 1.0.0
	 */
	function moc_no_bs_demo_coupons_lists_loop_html( $no_bs_demos, $paged, $count_posts, $posts_per_page ) {
		ob_start();
		$current_page      = $paged;
		foreach( $no_bs_demos as $no_bs_demo ) {
			$name                         = get_the_title( $no_bs_demo );
			$content_post                 = get_post( $no_bs_demo );
			$content                      = $content_post->post_content;
			$content                      = apply_filters( 'the_content', $content );
			$description                  = strip_tags( $content );
			$post_image_id                = get_post_thumbnail_id( $no_bs_demo );
			$post_image_array             = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
			$post_image_url               = ! empty( $post_image_array[0] ) ? $post_image_array[0] : array( get_field( 'moc_workshop_default_image', 'option' ) );
			$approved_text                = sprintf( __( 'approved by: %1$s 122 %2$s ', 'marketingops' ), '<b>','</b>' );
			$approved_text                = '';
			$assign_coupons_to_demo_query = moc_posts_by_meta_key_value( 'no_bs_demo', 1, -1, 'select_coupon_code', $no_bs_demo, '=' );
			$assign_coupons_to_demo       = $assign_coupons_to_demo_query->posts;
			$coupon_link                  = get_field( 'coupon_offer_link', $no_bs_demo );
			$rule_args                    = moc_restricted_rules_based_argument( $no_bs_demo );
			?>
			<div class="box_content moc_loop_no_bs_demo_coupon">
				<div class="blog_popup non-active no_bs_demo_popup">
					<?php
					echo moc_non_member_popup_html(
						( ! empty( $rule_args['membership_restrict_popup_title'] ) ) ? $rule_args['membership_restrict_popup_title'] : '',
						( ! empty( $rule_args['membership_restrict_popup_description'] ) ) ? $rule_args['membership_restrict_popup_description'] : '',
						( ! empty( $rule_args['membership_restrict_popup_btn_title'] ) ) ? $rule_args['membership_restrict_popup_btn_title'] : '',
						( ! empty( $rule_args['membership_restrict_popup_btn_link'] ) ) ? $rule_args['membership_restrict_popup_btn_link'] : ''
					);
					?>
				</div>
				<div class="content_container">
					<!-- img box -->
					<div class="img_box">
						<img src="<?php echo $post_image_url; ?>" alt="img_1." />
					</div>
					<!-- content box -->
					<div class="bs_content">
						<!-- site link & verify -->
						<div class="site_link_verify">
							<!-- site link -->
							<div class="site_link">
								<a target="_blank"><?php echo esc_html( $name ); ?></a>
							</div>
							<!-- verify content-->
							<?php
							if ( ! empty( $approved_text ) ) {
								?>
								<div class="verify_content">
									<a>
										<span class="text"><?php echo $approved_text; ?></b></span>
										<span class="svg_icon">
											<svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M6.99406 0.00373275C5.91602 0.0525765 4.90774 0.668811 4.39249 1.67756L3.47452 3.47444L1.67765 4.3924C0.332649 5.0794 -0.314694 6.6429 0.150306 8.0799L0.771399 9.99983L0.150306 11.9197C-0.314694 13.3567 0.332649 14.9202 1.67765 15.6072L3.47452 16.5252L4.39249 18.3221C5.07949 19.6671 6.64104 20.3154 8.07804 19.8494L9.99992 19.2283L11.9198 19.8494C13.3568 20.3144 14.9203 19.6671 15.6073 18.3221L16.5253 16.5252L18.3222 15.6072C19.6672 14.9202 20.3155 13.3587 19.8495 11.9217L19.2284 9.99983L19.8495 8.0799C20.3145 6.6429 19.6672 5.0794 18.3222 4.3924L16.5253 3.47444L15.6073 1.67756C14.9203 0.332561 13.3588 -0.315783 11.9218 0.150217L9.99992 0.771311L8.07999 0.150217C7.72074 0.0339671 7.3534 -0.0125485 6.99406 0.00373275Z" fill="url(#paint0_linear_3451_8163)"/>
												<path d="M6.82833 7.36065C6.82833 6.44355 7.57178 5.7001 8.48888 5.7001L-nan -nanC-nan -nan -nan -nan -nan -nanL-nan -nanC-nan -nan -nan -nan -nan -nanL8.48888 5.7001C9.40597 5.7001 10.1494 6.44355 10.1494 7.36065V13.1918C10.1494 14.1089 9.40597 14.8524 8.48888 14.8524L-nan -nanC-nan -nan -nan -nan -nan -nanL-nan -nanC-nan -nan -nan -nan -nan -nanL8.48888 14.8524C7.57178 14.8524 6.82833 14.1089 6.82833 13.1918V7.36065Z" fill="white"/>
												<path d="M12.6554 7.36065C12.6554 6.44355 13.3989 5.7001 14.316 5.7001L-nan -nanC-nan -nan -nan -nan -nan -nanL-nan -nanC-nan -nan -nan -nan -nan -nanL14.316 5.7001C15.2331 5.7001 15.9765 6.44355 15.9765 7.36065V13.1918C15.9765 14.1089 15.2331 14.8524 14.316 14.8524L-nan -nanC-nan -nan -nan -nan -nan -nanL-nan -nanC-nan -nan -nan -nan -nan -nanL14.316 14.8524C13.3989 14.8524 12.6554 14.1089 12.6554 13.1918V7.36065Z" fill="white"/>
												<path d="M1.48689 14.3625C0.837703 13.7133 0.837704 12.6608 1.48689 12.0116L7.31187 6.1866C7.96106 5.53741 9.0136 5.53741 9.66279 6.1866C10.312 6.83578 10.312 7.88832 9.66278 8.53751L3.8378 14.3625C3.18862 15.0117 2.13608 15.0117 1.48689 14.3625Z" fill="white"/>
												<path d="M7.31458 14.3625C6.6654 13.7133 6.6654 12.6608 7.31458 12.0116L13.1396 6.1866C13.7888 5.53741 14.8413 5.53741 15.4905 6.1866C16.1397 6.83578 16.1397 7.88832 15.4905 8.53751L9.6655 14.3625C9.01631 15.0117 7.96377 15.0117 7.31458 14.3625Z" fill="white"/>
												<path d="M13.1423 14.3624C12.4931 13.7132 12.4931 12.6607 13.1423 12.0115L15.1622 9.99163C15.8114 9.34244 16.8639 9.34244 17.5131 9.99163C18.1623 10.6408 18.1623 11.6934 17.5131 12.3425L15.4932 14.3624C14.8441 15.0116 13.7915 15.0116 13.1423 14.3624Z" fill="white"/>
												<defs>
													<linearGradient id="paint0_linear_3451_8163" x1="-0.471266" y1="10.0481" x2="31.8102" y2="10.0481" gradientUnits="userSpaceOnUse">
														<stop stop-color="#FD4B7A"/>
														<stop offset="1" stop-color="#4D00AE"/>
													</linearGradient>
												</defs>
											</svg>                                                    
										</span>
									</a>
								</div>
								<?php
							}
							?>
						</div>
						<!-- bs content -->
						<div class="bs_content_text">
							<p><?php echo esc_html( $description ); ?></p>
						</div>
						<!-- bs btn -->
						<div class="bs_btn">
							<!-- gradient bg -->
							<?php
							if ( ! empty( $coupon_link ) ) {
								$navigate_coupon_link = ( ! current_user_can( 'wc_memberships_view_restricted_post_content', $no_bs_demo ) ) ? 'javascript:void(0);' : $coupon_link;
								$non_member_class     = ( ! current_user_can( 'wc_memberships_view_restricted_post_content', $no_bs_demo ) ) ? 'moc_non_member_for_no_bs_demo' : '';

								echo mops_member_only_button_html(
									'', // Container class.
									'no', // Enable container element.
									'Claim offer', // Button text.
									'yes', // Show arrow icon?
									'', // Open in new tab.
									$navigate_coupon_link, // Button link.
									"btn gradient_btn {$non_member_class}" // Button class.
								);
							}
							?>
							<!-- Gray bg -->
							<?php
							if ( ! empty( $assign_coupons_to_demo ) ) {
								$navigate_watch_more_link   = ( ! current_user_can( 'wc_memberships_view_restricted_post_content', $no_bs_demo ) ) ? 'javascript:void(0);' : get_the_permalink( $assign_coupons_to_demo[0] );
								$non_member_class           = ( ! current_user_can( 'wc_memberships_view_restricted_post_content', $no_bs_demo ) ) ? 'moc_non_member_for_no_bs_demo' : '';
								?>
								<a href="<?php echo $navigate_watch_more_link; ?>" class="btn gray_btn <?php echo esc_attr( $non_member_class ); ?>">
									<span class="text"><?php esc_html_e( 'Watch No BS demo', 'marketingops' ); ?></span>
									<span class="svg">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#242730">
											<g clip-path="url(#clip0_446_965)">
												<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#fff"></path>
											</g>
											<defs>
												<clipPath id="clip0_446_965">
													<rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect>
												</clipPath>
											</defs>
										</svg>
									</span>
								</a>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		echo moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page );
		return ob_get_clean();
	}
}

/**
 * Check Function exists or not.
 */
if ( ! function_exists( 'moc_get_post_id_by_slug' ) ) {
	/**
	 *  Function to get post ID By slug.
	 *
	 * @param string    $slug This varibale holds the slug of custom post type.
	 */ 
	function moc_get_post_id_by_slug( $slug, $taxonomy ) {
		$args = array(
			'post_type'      => $taxonomy,
			'posts_per_page' => 1,
			'post_name__in'  => array( $slug ),
			'fields'         => 'ids' 
		);
		return get_posts( $args );
	}
}
/**
 * Check function is exist or not.
 * 
 */
if ( ! function_exists( 'moc_hubspt_nobs_demo' ) ) {
	/**
	 *  Function to get html of hubspot form.
	 *
	 * @since 1.0.0
	 */ 
	function moc_hubspt_nobs_demo() {
		ob_start();
		?>
		<div class="box_content">
			<div class="content_container form_section">
				<div class="bs_form_content">
					<div class="bs_form_title">
						<h2><span><?php esc_html_e( 'Tell us who we should demo next:', 'marketingops' ); ?></span></h2>
					</div>
					<div class="moc_load_no_bs_demo_form"></div>
				</div>
			</div>
		</div>	
		<?php

		return ob_get_clean();
	}
	
}
/**
 * Check function is exist or not.
 * 
 */
if ( ! function_exists( 'moc_membership_plan_table' ) ) {
	/**
	 *  Function to get html membership plan html.
	 *
	 * @since 1.0.0
	 */ 
	function moc_membership_plan_table() {
		ob_start();
		$plans_array            = moc_get_membership_plan_object();
		$plan_id                = ( ! empty( $plans_array  ) ) ? $plans_array[0]->plan_id : 0;
		$free_current_class     = '';
		$pro_current_class      = '';
		$lifetime_current_class = '';
		$gs_free_membership     = get_field( 'gs_free_membership', 'option' );
		$gs_pro_membership      = get_field( 'gs_pro_membership', 'option' );
		$gs_lifetime_membership = get_field( 'gs_lifetime_membership', 'option' );
		
		//Free
		$free_member_plan_title       = $gs_free_membership['title'];
		$free_member_plan_btn_txt     = $gs_free_membership['button_text'];
		$free_member_plan_btn_url     = $gs_free_membership['button_url'];
		$free_url_components          = parse_url( $free_member_plan_btn_url );
		parse_str( $free_url_components['query'], $free_params );
		$url_plan_id                  = (int) $free_params['plan'];

		if ( $plan_id === $url_plan_id ) {
			$free_member_plan_btn_txt = __( 'Current Plan' );
			$free_member_plan_btn_url = 'javascript:void(0);';
			$free_current_class       = 'current_plan';
		}

		//Pro
		$pro_member_plan_title        = $gs_pro_membership['title'];
		$pro_member_plan_btn_txt      = $gs_pro_membership['button_text'];
		$pro_member_plan_btn_url      = $gs_pro_membership['button_url'];
		$pro_url_components           = parse_url( $pro_member_plan_btn_url );
		parse_str( $pro_url_components['query'], $pro_params );
		$pro_url_plan_id              = (int) $pro_params['plan'];

		if ( ! empty( $plan_id ) ) {
			if ( $plan_id === $pro_url_plan_id ) {
				$pro_member_plan_btn_txt = __( 'Current Plan' );
				$pro_member_plan_btn_url = 'javascript:void(0);';
				$pro_current_class       = 'current_plan';
			} else {
				$member_product_ids   = get_post_meta( $pro_url_plan_id, '_product_ids', true );
				$member_product_sku   = moc_get_products_slug( $member_product_ids );
				foreach ( $member_product_sku as $product_sku ) {
					if ( 'mo-pros-variation-yearly-membership' === $product_sku ) {
						$product_id_need_to_add_cart[] = wc_get_product_id_by_sku( $product_sku );
					}
				}
				$pro_member_plan_btn_url = site_url( '?add-to-cart='. $product_id_need_to_add_cart[0] );
			}
		}

		//Lifetime
		$lifetime_member_plan_title   = $gs_lifetime_membership['title'];
		$lifetime_member_plan_btn_txt = $gs_lifetime_membership['button_text'];
		$lifetime_member_plan_btn_url = $gs_lifetime_membership['button_url'];
		$membership_plans             = get_field( 'membership_plans', 'option' );
		$lifetime_url_components      = parse_url( $lifetime_member_plan_btn_url );
		parse_str( $lifetime_url_components['query'], $lifetime_params );
		$lifetime_url_plan_id         = (int) $lifetime_params['plan'];

		if ( ! empty( $plan_id ) ) {
			if ( $plan_id === $lifetime_url_plan_id ) {
				$lifetime_member_plan_btn_txt = __( 'Current Plan' );
				$lifetime_member_plan_btn_url = 'javascript:void(0)';
				$lifetime_current_class       = 'current_plan';
			} else {
				$member_product_ids           = get_post_meta( $lifetime_url_plan_id, '_product_ids', true );
				$member_product_sku           = moc_get_products_slug( $member_product_ids );
				
				foreach ( $member_product_sku as $product_sku ) {
					if ( 'mo-pros-variation-monthly-membership' === $product_sku ) {
						$lifetime_product_id_need_to_add_cart[] = wc_get_product_id_by_sku( $product_sku );
					}
				}
				$lifetime_member_plan_btn_url = site_url( '?add-to-cart='. $lifetime_product_id_need_to_add_cart[0] );
				
			}
		}

		if ( empty( $plan_id ) && is_user_logged_in() ) {
			$member_product_ids           = get_post_meta( $lifetime_url_plan_id, '_product_ids', true );
			$lifetime_member_plan_btn_url = site_url( '?add-to-cart='. $member_product_ids[0] );
			$member_year_product_ids      = get_post_meta( $pro_url_plan_id, '_product_ids', true );
			$member_product_sku           = moc_get_products_slug( $member_year_product_ids );
			foreach ( $member_product_sku as $product_sku ) {
				if ( 'mo-pros-variation-yearly-membership' === $product_sku ) {
					$product_id_need_to_add_cart[] = wc_get_product_id_by_sku( $product_sku );
				}
			}
			$pro_member_plan_btn_url = site_url( '?add-to-cart='. $product_id_need_to_add_cart[0] );
		}
		?>
		<div class="subscribe_table">
			<div class="table_head">
				<div class="head_colum global_cloum empty_colum"></div>
				<div class="head_colum global_cloum free_colum">
					<a href="javascript:void(0);" class="tabbing_btn" data-src="free_colum"><?php echo esc_html( $free_member_plan_title ); ?></a>
				</div>
				<div class="head_colum global_cloum pro_colum">
					<a href="javascript:void(0);" class="tabbing_btn active" data-src="pro_colum"><?php echo $pro_member_plan_title; ?></a>
				</div>
				<div class="head_colum global_cloum">
					<a href="javascript:void(0);" class="tabbing_btn" data-src="lifetime_colum"><?php echo $lifetime_member_plan_title; ?></a>
				</div>
			</div>
			<div class="table_body">
				<?php
				$count = 0;
				foreach ( $membership_plans as $membership_plan ) {
					$membership_offer_text   = $membership_plan['membership_offer_text'];
					$membership_info_section = $membership_plan['membership_info_section'];
					$info_checkpoints        = $membership_info_section['info_section'];
					$info_checkpoints        = ! empty( $info_checkpoints ) ? $info_checkpoints : 'no';

					// Free
					$free_membership_attributes = $membership_plan['free_membership_attributes'];
					$free_select_choice         = $free_membership_attributes['select_choice'];
					$free_choice_output         = ( 'text' === $free_select_choice ) ? $free_membership_attributes['text'] : $free_membership_attributes['dots'];
					$free_choice_html           = ( 'text' === $free_select_choice ) ? '<span class="text">' . $free_choice_output . '</span>' : '<span class="dot ' . $free_choice_output . '_dot"></span>';

					//Pro
					$pro_membership_attributes = $membership_plan['pro_membership_attributes'];
					$pro_select_choice         = $pro_membership_attributes['select_choice'];
					$pro_choice_output         = ( 'text' === $pro_select_choice ) ? $pro_membership_attributes['text'] : $pro_membership_attributes['dots'];
					$pro_choice_html           = ( 'text' === $pro_select_choice ) ? '<span class="text">' . $pro_choice_output . '</span>' : '<span class="dot ' . $pro_choice_output . '_dot"></span>';

					//Lifetime
					$lifetime_membership_attributes = $membership_plan['lifetime_membership_attributes'];
					$lifetime_select_choice         = $lifetime_membership_attributes['select_choice'];
					$lifetime_choice_output         = ( 'text' === $lifetime_select_choice ) ? $lifetime_membership_attributes['text'] : $lifetime_membership_attributes['dots'];
					$lifetime_choice_html           = ( 'text' === $lifetime_select_choice ) ? '<span class="text">' . $lifetime_choice_output . '</span>' : '<span class="dot ' . $lifetime_choice_output . '_dot"></span>';
					$count++;
					$class = ( $count % 2 == 1 ) ? "odd" : "even";
					?>
					<div class="table_tr <?php echo esc_attr( $class ); ?>">
						<div class="body_colum global_cloum title_tr_colum">
							<span class="text"><?php echo $membership_offer_text; ?></span>
							<?php
							if ( 'yes' === $info_checkpoints ) {
								$info_description = $membership_info_section['info_description'];
								$info_description = ! empty( $info_description ) ? $info_description : '';
								?>
								<div class="table_info">
									<span class="svg">
										<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M7 0C3.1339 0 0 3.1339 0 7C0 10.8661 3.1339 14 7 14C10.8661 14 14 10.8661 14 7C14 3.1339 10.8661 0 7 0ZM7.7 10.5H6.3V6.3H7.7V10.5ZM7.7 4.9H6.3V3.5H7.7V4.9Z" fill="#6D7B83"/>
										</svg>                            
									</span>
									<div class="info_box">
										<span><?php echo wp_kses_post( $info_description ); ?></span>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="body_colum global_cloum free_colum">
							<?php echo wp_kses_post( $free_choice_html ); ?>
						</div>
						<div class="body_colum global_cloum pro_colum">
							<?php echo wp_kses_post( $pro_choice_html ); ?>
						</div>
						<div class="body_colum global_cloum lifetime_colum">
							<?php echo wp_kses_post( $lifetime_choice_html ); ?>
						</div>
					</div>
					<?php
				}
				?>
				<div class="table_tr btn_tr">
					<div class="body_colum global_cloum empty_colum"></div>
					<div class="body_colum global_cloum free_colum">
						<?php
						// debug( $plan_id );
						// die;
							if ( is_user_logged_in() ) {
								if ( 163406 === $plan_id ) {
									// die( "poop" );
									?>
									<a href="<?php echo $free_member_plan_btn_url; ?>" class="btn black_btn <?php echo esc_attr( $free_current_class ); ?>"><?php echo esc_html( $free_member_plan_btn_txt ); ?></a>
									<?php
								}
							} else {
								?>
								<a href="<?php echo $free_member_plan_btn_url; ?>" class="btn black_btn <?php echo esc_attr( $free_current_class ); ?>"><?php echo esc_html( $free_member_plan_btn_txt ); ?></a>
								<?php
							}
						?>
					</div>
					<div class="body_colum global_cloum pro_colum">
						<a href="<?php echo $pro_member_plan_btn_url; ?>" class="btn gradient_btn <?php echo esc_attr( $pro_current_class ); ?>"><?php echo esc_html( $pro_member_plan_btn_txt ); ?></a>
					</div>
					<div class="body_colum global_cloum lifetime_colum">
						<?php
							if ( 163758 !== $plan_id ) {
								?>
								<a href="<?php echo $lifetime_member_plan_btn_url; ?>" class="btn black_btn <?php echo esc_attr( $lifetime_current_class ); ?>"><?php echo esc_html( $lifetime_member_plan_btn_txt ); ?></a>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
	
}
/**
 * Check function is exist or not.
 * 
 */
if ( ! function_exists( 'moc_non_member_popup_html' ) ) {
	/**
	 *  Function to get html of popup for non member user
	 *
	 * @since 1.0.0
	 */ 
	function moc_non_member_popup_html(  $membership_restrict_popup_title = '', $membership_restrict_popup_description = '', $membership_restrict_popup_btn_title = '', $membership_restrict_popup_btn_link = ''  ) {
		ob_start();
		$non_member_blocked_popup = get_field( 'non_member_blocked_popup', 'option' );
		$heading                  = $membership_restrict_popup_title;
		$description              = $membership_restrict_popup_description;
		$button_text              = $membership_restrict_popup_btn_title;
		$button_icon              = $non_member_blocked_popup['button_icon'];
		$button_link              = $membership_restrict_popup_btn_link;
		?>
		<div class="container">
			<div class="moc_popup_close popup_close">
				<a href="" class="moc_popup_close_btn">
					<svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L8 8L1 15" stroke="white" stroke-width="1.3"/>
						<path d="M15 1L8 8L15 15" stroke="white" stroke-width="1.3"/>
					</svg>
				</a>
			</div>
			<div class="contnet_box">
				<div class="popup_content">
					<h2><?php echo esc_html( $heading ); ?></h2>
					<div class="content_icon">
						<span class="svg">
							<svg width="42" height="34" viewBox="0 0 42 34" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 0C2.46243 0 0 2.46243 0 5.5V28.5C0 31.5376 2.46243 34 5.5 34H36.5C39.5376 34 42 31.5376 42 28.5V5.5C42 2.46243 39.5376 0 36.5 0H5.5ZM12.4473 23.2972L12.3412 21.028H29.4202L29.3142 23.2972C29.2954 23.6907 28.9778 24 28.5917 24H13.1697C12.7837 24 12.4656 23.6907 12.4473 23.2972ZM28.5913 11.7049C28.5913 11.0262 29.131 10.4754 29.7961 10.4754C30.4612 10.4754 31 11.0267 31 11.7054C31 12.3841 30.4602 12.9349 29.7952 12.9349C29.7945 12.9349 29.7939 12.9348 29.7933 12.9347C29.7927 12.9346 29.7921 12.9344 29.7913 12.9344C29.7913 12.9399 29.7921 12.9453 29.793 12.9508C29.7939 12.957 29.7949 12.9633 29.7947 12.9698L29.4645 20.0449H12.2945L11.9644 12.9698C11.9641 12.9589 11.9657 12.9485 11.9672 12.938C11.9686 12.9291 11.9699 12.9201 11.9701 12.9108C11.4174 12.7992 11 12.302 11 11.7054C11 11.0267 11.5398 10.4759 12.2048 10.4759C12.8699 10.4759 13.4097 11.0267 13.4097 11.7054C13.4097 11.9641 13.3307 12.2041 13.1962 12.4023L16.4748 14.9115L20.1284 11.1831C19.8542 10.9574 19.6754 10.6166 19.6754 10.2295C19.6754 9.55082 20.2152 9 20.8802 9C21.5453 9 22.0851 9.55082 22.0851 10.2295C22.0851 10.6166 21.9063 10.9579 21.6321 11.1831L25.2856 14.9115L28.6395 12.3443C28.6621 12.3265 28.6872 12.3141 28.7123 12.3018C28.722 12.297 28.7316 12.2923 28.7411 12.2872C28.6486 12.1131 28.5913 11.9169 28.5913 11.7049Z" fill="white"/>
							</svg>                        
						</span>
					</div>
					<p><?php echo esc_html( $description ); ?></p>
					<a href="<?php echo esc_url( $button_link ); ?>" class="btn black_btn">
						<span><?php echo esc_html( $button_text ); ?></span>
						<span class="icon">
							<img src="<?php echo esc_html( $button_icon ); ?>">
							</svg>
						</span>
					</a>
                    <div class="link_box">
                        <p>Already a member? <a href="/log-in">Login here</a>.</p>
                    </div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_check_user_is_member_or_not' ) ) {
	/**
	 * Functio to return boolean( true/false ) depends on user is paid member or not.
	 *
	 * @since 1.0.0
	 */
	function moc_check_user_is_member_or_not() {
		if ( ! is_user_logged_in() ) {
			return false;
		}
		$members_plan = WC_Subscriptions_Manager::get_users_subscriptions( get_current_user_id() );
		if ( empty( $members_plan ) ) {
			return false;
		}
		return true;
	}
}

/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_render_forgot_password_link_html' ) ) {
	/**
	 * Functio to render HTML of forgot password form.
	 *
	 * @since 1.0.0
	 */
	function moc_render_forgot_password_link_html() {
		ob_start();
		?>
		<div class="elementor-column elementor-col-100 elementor-top-column elementor-element register_content login_content moc_forgot_password_form_section">
			<div class="elementor-widget-wrap elementor-element-populated moc-register-container">
				<div class="loader_bg">
					<div class="loader"></div>  
				</div>
				<div class="elementor-element profilfrm elementor-widget elementor-widget-shortcode">
					<div class="elementor-widget-container">
						<div class="elementor-shortcode">
							<form>
								<div id="moc-registration-1-wrap" class="moc-form-container moc-registration-form-wrapper">
									<div id="moc-registration-1" class="moc-form-wrapper moc-registration moc-registration-1 ppBuildScratch ppfl-flat ppsbl-pill ppsbw-full-width ppf-remove-frame ppfs-medium ppfia-right">
										<div class="moc-form-field-wrap reg-email fw-full fda-standard fld-above">
											<div class="moc-form-field-input-textarea-wrap">
												<input name="reg_email" type="email" placeholder="<?php esc_html_e( 'Username or Email Address', 'marketing-ops-core' ); ?>" class="moc-form-field reg-email moc-email">
												<div class="moc_error moc_email_err">
													<span></span>
												</div>
											</div>
										</div>
										<?php
										/**
										 * Hook that fires on the custom login page.
										 *
										 * This hook helps in adding custom assets to the marketingops.com login screen.
										 */
										do_action( 'mops_forgot_password_form' );
										?>
										<div class="moc-form-submit-button-wrap">
											<button name="moc_forgot_password_submit" type="submit" class="moc-forgot-password-form ppform-submit-button"><?php esc_html_e( 'Send Request', 'marketingops' ); ?></button>
										</div>
									</div>
								</div>
							</form>
							<!-- / ProfilePress WordPress plugin. -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_script_settings' ) ) {
	/**
	 * Function to return output of script setting from website.
	 *
	 * @param string $script This variable holds to which script load.
	 * @since 1.0.0
	*/
	function moc_script_settings( $script ) {
		if ( 'body' === $script ) {
			$settings = get_field( 'moc_body_script', 'option' );
		} elseif ( 'header' ) {
			$settings = get_field( 'moc_header_script', 'option' );
		} else {
			$settings = get_field( 'moc_footer_script', 'option' );
		}
		return $settings;
	}
}

/**
 * Check if function exists or not.
 */
if ( ! function_exists( 'moc_get_membership_plan_object' ) ) {
	function moc_get_membership_plan_object() {

		return wc_memberships_get_user_memberships( get_current_user_id(), array( 'status' => array( 'active', 'complimentary' ) ) );
	}
}

/**
 * Check if function exists or not.
 */
if ( ! function_exists( 'moc_get_membership_plan_slug' ) ) {
	function moc_get_membership_plan_slug() {
		if ( ! is_user_logged_in() ) {
			return false;
		}

		// Get the membership plan object.
		$plan_object = moc_get_membership_plan_object();

		// Loop through the membership plans.
		foreach ( $plan_object as $plans ) {
			$assined_plans[] = $plans->plan->slug;
		}

		$assined_plans = ! empty( $assined_plans ) ? $assined_plans : array();

		return $assined_plans;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_post_by_term_data' ) ) {
	/**
	 * Get the posts.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_post_by_term_data( $post_type = 'post', $paged = 1, $posts_per_page = '',$taxonomy = 'category', $term = array() ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		if ( ! empty( $taxonomy ) && ! empty( $term ) ) {
			$args[ 'tax_query' ] =
			array(
				array(
					'taxonomy' => $taxonomy,
					'terms' => $term,
					'field' => 'slug',
					'include_children' => true,
					'operator' => 'IN'
				),
			);
		}
		// debug( $args );
		// die;
		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_post_by_term_data_args', $args );
		// debug( $args );
		return new WP_Query( $args );
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_days_differenc_between_dates' ) ) {
	/**
	 * Get the days difference between 2 dates.
	 *
	 * @param string $from_date Post type.
	 * @param string $to_date Paged value.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_days_differenc_between_dates( $from_date, $to_date ) {
		$diff         = strtotime( $to_date ) - strtotime( $from_date );
  		$days = abs( round( $diff / 86400 ) );
		return $days;
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_subsciption_start_date' ) ) {
	/**
	 * Get the subscription start date.
	 *
	 * @param array $subscriptions subscription array
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_subsciption_start_date( $subscriptions ) {
		$start_date  = ( isset( $subscriptions['start_date'] ) ) ? $subscriptions['start_date'] : FALSE;
		$start_date  = ( false !== $start_date ) ? date( 'l jS F Y', strtotime( $start_date ) ) : FALSE;
		return $start_date;
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_subsciption_period' ) ) {
	/**
	 * Get the subscription period.
	 *
	 * @param array $subscriptions subscription array
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_subsciption_period( $subscriptions ) {
		$period      = ( isset( $subscriptions['period'] ) ) ? $subscriptions['period'] : '';
		return $period;
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_subsciption_end_date' ) ) {
	/**
	 * Get the subscription end date.
	 *
	 * @param array $subscriptions subscription array
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_subsciption_end_date( $subscriptions ) {
		$period      = moc_get_subsciption_period( $subscriptions );
		$start_date  = moc_get_subsciption_start_date( $subscriptions );
		if ( 'year' === $period ) {
			$text        = __( 'End Date', 'marketingops' );
			$expiry_date = ( isset( $subscriptions['expiry_date'] ) ) ? $subscriptions['expiry_date'] : FALSE;
			$expiry_date = ( false !== $start_date ) ? date( 'l jS F Y', strtotime( $expiry_date ) ) : FALSE;
		} elseif( 'month' === $period ) {
			$text        = __( 'Next Payment Date', 'marketingops' );
			$expiry_date = date( 'Y-m-d', strtotime( '+1 month', strtotime( $start_date ) ) );
			$expiry_date  = ( false !== $expiry_date ) ? date( 'l jS F Y', strtotime( $expiry_date ) ) : FALSE;
		}
		return $expiry_date;
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_subsciption_status' ) ) {
	/**
	 * Get the subscription end status.
	 *
	 * @param  array $subscriptions subscription array
	 * @return string
	 * @since  1.0.0
	 */
	function moc_get_subsciption_status( $subscriptions ) {
		$status = ( isset( $subscriptions['status'] ) ) ? ucfirst( $subscriptions['status'] ) : '' ;
		return $status;
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_moops_demo_blog_section_html' ) ) {
	/**
	 * Get the HTML of moops demo html.
	 *
	 * @param  array $post_ids array of post ids.
	 * @param  int	 $paged page value.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_moops_demo_blog_section_html( $post_ids, $paged ) {
		ob_start();
		$nextpage          = $paged + 1;
		$serialize_postids = wp_json_encode( $moops_episods );
		?>
		<div class="mistakes_episodes_section">
			<div class="loader_bg">
				<div class="loader"></div>  
			</div>
			<div class="episodes_container">
				<div class="box_content">
					<?php
					foreach ( $post_ids as $post_id ) {
						$post_title       = get_the_title( $post_id );
						$post_date        = get_the_date( 'F j Y', $post_id );
						$post_image_id    = get_post_thumbnail_id( $post_id );
						$post_image_array = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
						$post_image_url   = ! empty( $post_image_array ) ? $post_image_array[0] : get_field( 'moc_default_post_image', 'option' );
						$terms            = wp_get_object_terms( $post_id, 'category', array( 'fields' => 'names' ) );
						

						?>
						<div class="episodes_box box_1">
							<div class="box_container">
								<div class="box_text">
									<?php
									if ( ! empty( $terms ) ) {
										?>
										<div class="episodes_tag_date">
											<a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>"><span class="tag"><?php echo esc_html( $terms[0] ); ?></span></a>
											<span class="date"><?php echo esc_html( $post_date ); ?></span>
										</div>
										<?php
									}
									?>
									<div class="episodes_title">
										<a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>"><h3><?php echo esc_html( $post_title ); ?></h3></a>
									</div>
								</div>
								<div class="box_image">
									<a href="<?php echo esc_url( get_the_permalink( $post_id ) ); ?>">
										<img src="<?php echo esc_url( $post_image_url  ); ?>" alt="episodes_img" />
									</a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if function exist or not.
 */
if ( ! function_exists( 'moc_load_more_buttons' ) ) {
	/**
	 * Get the HTML of load more button.
	 *
	 * @param  array $post_ids array of post ids.
	 * @param  int	$paged page value.
	 * @param  int	$total_pages total post count.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_load_more_buttons( $post_ids, $paged, $total_pages ) {
		ob_start();
		$nextpage = $paged + 1;
		if ( $total_pages > $paged ) {
			?>
			<div class="box_btn">
				<a href="javascript:void(0);" class="moc_load_next_data show_more_btn elementor-button-link elementor-button elementor-size-sm"  data-currentpage="<?php echo esc_attr( $paged ); ?>" data-nextpage="<?php echo esc_attr( $nextpage ); ?>">
					<span class="elementor-button-content-wrapper">
						<span class="elementor-button-icon elementor-align-icon-right">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
								<g clip-path="url(#clip0_446_1054)">
									<path d="M11.2501 7.25006C12.4839 7.25006 13.5001 8.2663 13.5001 9.50006L13.5001 15.0001L15.9698 12.5303C16.0398 12.4584 16.1235 12.4012 16.216 12.3622C16.3085 12.3232 16.4078 12.3032 16.5082 12.3033C16.6573 12.3035 16.803 12.3481 16.9267 12.4315C17.0503 12.5149 17.1463 12.6332 17.2023 12.7715C17.2584 12.9097 17.272 13.0614 17.2413 13.2074C17.2107 13.3533 17.1373 13.4869 17.0304 13.5909L13.2804 17.3409C13.1397 17.4815 12.949 17.5605 12.7501 17.5605C12.5512 17.5605 12.3605 17.4815 12.2198 17.3409L8.46985 13.5909C8.39787 13.5218 8.3404 13.439 8.30081 13.3474C8.26122 13.2558 8.24031 13.1572 8.23929 13.0574C8.23828 12.9577 8.25718 12.8587 8.2949 12.7663C8.33261 12.6739 8.38838 12.59 8.45894 12.5194C8.5295 12.4489 8.61343 12.3931 8.70582 12.3554C8.7982 12.3177 8.89718 12.2988 8.99696 12.2998C9.09674 12.3008 9.19531 12.3217 9.28691 12.3613C9.37851 12.4009 9.46129 12.4584 9.53039 12.5303L12.0001 15.0001L12.0001 9.50006C12.0001 9.07707 11.6731 8.75006 11.2501 8.75006L0.760649 8.75001C0.661264 8.75142 0.562593 8.73306 0.470367 8.696C0.378141 8.65894 0.294199 8.60392 0.223421 8.53413C0.152643 8.46435 0.0964431 8.38119 0.0580825 8.2895C0.0197219 8.19781 -3.24992e-05 8.09941 -3.24905e-05 8.00001C-3.24818e-05 7.90062 0.0197219 7.80222 0.0580825 7.71052C0.0964431 7.61883 0.152643 7.53568 0.223421 7.46589C0.294199 7.39611 0.378141 7.34109 0.470367 7.30403C0.562593 7.26697 0.661264 7.24861 0.760649 7.25001L11.2501 7.25006Z" fill="#242730"></path>
								</g>
								<defs>
									<clipPath id="clip0_446_1054">
										<rect width="18" height="18" fill="white" transform="matrix(-1 -8.74228e-08 -8.74228e-08 1 18 0)"></rect>
									</clipPath>
								</defs>
							</svg>			
						</span>
						<span class="elementor-button-text">Show more</span>
						<input type="hidden" class="moc_last_loaded_post_ids" value="<?php echo esc_attr( $serialize_postids ); ?>">
					</span>
				</a>
			</div>
			<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_restricted_rules_based_argument' ) ) {
	/**
	 * Function to return popup data from membership plans.
	 *
	 * @param integer $post_id This variable holds the post ID.
	 * @since 1.0.0
	 */
	function moc_restricted_rules_based_argument( $post_id ) {
		$membership_objects = wc_memberships_get_membership_plans();

		foreach ( $membership_objects as $membership_plan ) {
			$membership_ids[] =  $membership_plan->get_id();
		}

		$rules = wc_memberships()->get_rules_instance()->get_post_content_restriction_rules( $post_id );

		foreach ( $rules as $rule ) {
			$membership_set_id = $rule->get_membership_plan_id();
			if ( in_array( $membership_set_id, $membership_ids ) ) {
				$set_restrict_member_id[] = $membership_set_id;
			}
		}

		if ( ! empty( $set_restrict_member_id[0] ) ) {
			$membership_restrict_popup_title       = get_post_meta( $set_restrict_member_id[0], 'membership_restrict_popup_title', true );
			$membership_restrict_popup_description = get_post_meta( $set_restrict_member_id[0], 'membership_restrict_popup_description', true );
			$membership_restrict_popup_btn_title   = get_post_meta( $set_restrict_member_id[0], 'membership_restrict_popup_btn_title', true );
			$membership_restrict_popup_btn_link    = get_post_meta( $set_restrict_member_id[0], 'membership_restrict_popup_btn_link', true );
			$rule_args                             = array(
				'membership_restrict_popup_title'       => $membership_restrict_popup_title,
				'membership_restrict_popup_description' => $membership_restrict_popup_description,
				'membership_restrict_popup_btn_title'   => $membership_restrict_popup_btn_title,
				'membership_restrict_popup_btn_link'    => $membership_restrict_popup_btn_link,
			);

			return $rule_args;
		} else {
			return array();
		}
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_html_for_listing_post_data' ) ) {
	/**
	 * Function to return html for listed data of selected posts.
	 */
	function moc_html_for_listing_post_data( $post_data, $posts_per_page, $paged, $count_posts, $post_type ) {
		ob_start();
		foreach ( $post_data as $post_id ) {
			$title             = get_the_title( $post_id );
			$date              = get_the_date( 'M d Y', $post_id );
			$post_permalink    = get_the_permalink( $post_id );
			$post_status       = get_post_status( $post_id );
			$post_status_class = '';
			if ( 'pending' === $post_status ) {
				$post_status_class = 'pending_btn';
			} elseif( 'draft' === $post_status ) {
				$post_status_class = 'draft_btn';
			} elseif( 'publish' === $post_status ) {
				$post_status_class = 'publish_btn';
			}
			?>
			<div class="row_column">
				<div class="column_container">
					<div class="column_box">
						<div class="content_boxes">
							<div class="boxes_svg_icon">
								<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.25 0.5C3.734 0.5 2.5 1.7335 2.5 3.25V14.25C2.5 15.7665 3.734 17 5.25 17H13.25C14.766 17 16 15.7665 16 14.25V7.5H11.0186C9.90555 7.5 9 6.59397 9 5.48047V0.5H5.25ZM10.5 0.939453V5.48145C10.5 5.76745 10.7326 6 11.0186 6H15.5605L10.5 0.939453ZM1.5 3L0.890625 3.40625C0.334125 3.77725 0 4.40181 0 5.07031V14.75C0 17.3735 2.1265 19.5 4.75 19.5H11.4297C12.0987 19.5 12.7233 19.1659 13.0938 18.6094L13.5 18H4.75C2.955 18 1.5 16.545 1.5 14.75V3ZM6.75 9.5H11.75C12.164 9.5 12.5 9.8355 12.5 10.25C12.5 10.6645 12.164 11 11.75 11H6.75C6.336 11 6 10.6645 6 10.25C6 9.8355 6.336 9.5 6.75 9.5ZM6.75 12.5H11.75C12.164 12.5 12.5 12.8355 12.5 13.25C12.5 13.6645 12.164 14 11.75 14H6.75C6.336 14 6 13.6645 6 13.25C6 12.8355 6.336 12.5 6.75 12.5Z" fill="#6D7B83"></path>
								</svg>
							</div>
							<div class="boxes_title_and_content">
								<h5><?php echo esc_html( $title ); ?></h5>
								<div class="date_btn">
									<span class="date"><?php echo esc_html( $date ); ?></span>
									<?php
									if ( 'publish' === $post_status ) {
										?>
										<a href="<?php echo esc_url( $post_permalink ); ?>">
											<span class="text"><?php esc_html_e( 'Read', 'marketingops' ); ?></span>
											<span class="svg">
												<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"></path>
													<defs>
														<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
															<stop stop-color="#FD4B7A"></stop>
															<stop offset="1" stop-color="#4D00AE"></stop>
														</linearGradient>
													</defs>
												</svg>
											</span>
										</a>
										<?php
										if ( 'post' === $post_type ) {
											?>
											<a href="javascript:void(0);" class="moc_editable_post" data-postid = "<?php echo esc_attr( $post_id ); ?>">
												<span class="text"><?php esc_html_e( 'Edit', 'marketingops' ); ?></span>
												<span class="svg">
													<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"></path>
														<defs>
															<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
																<stop stop-color="#FD4B7A"></stop>
																<stop offset="1" stop-color="#4D00AE"></stop>
															</linearGradient>
														</defs>
													</svg>
												</span>
											</a>
											<?php		
										}
									} else {
										if ( 'post' === $post_type ) {
										?>
											<a href="javascript:void(0);" class="moc_editable_post" data-postid = "<?php echo esc_attr( $post_id ); ?>">
												<span class="text"><?php esc_html_e( 'Edit', 'marketingops' ); ?></span>
												<span class="svg">
													<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"></path>
														<defs>
															<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
																<stop stop-color="#FD4B7A"></stop>
																<stop offset="1" stop-color="#4D00AE"></stop>
															</linearGradient>
														</defs>
													</svg>
												</span>
											</a>
											<?php
										}
									}
									?>
								</div>
								<div class="status_btn <?php echo esc_attr( $post_status_class ); ?>">
									<div class="btn_box status_btn_div" data-status="<?php echo esc_attr( $post_status ); ?>">
										<?php
										$post_status_text = '';
										if ( 'publish' === $post_status ) {
											$post_status_text =	sprintf( __( '%1$sed', '' ), $post_status );
										} elseif ( 'future' === $post_status ) {
											$post_status_text =	__( 'Scheduled', '' );
										} else {
											$post_status_text =	$post_status	;
										}
										// $post_status_text = ( 'publish' === $post_status ) ? $post_status . 'ed' : $post_status;
										// $post_status_text = ( 'future'  === $post_status ) ? __( 'Scheduled', '' ) : $post_status;
										?>
										<span><?php echo esc_html( strtoupper( $post_status_text ) ); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<div class="moc_pagination_for_posts_listings">
			<?php echo moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_load_write_a_post_html' ) ) {
	/**
	 * Function to load html of write a post.
	 *
	 * @param integer $post_id   This variable holds the post id.
	 * @param string  $post_type This variable holds the post type.
	 * @since 1.0.0
	 */
	function moc_load_write_a_post_html( $post_id, $post_type ) {
		ob_start();
		$title             = ( ! empty( $post_id ) ) ? get_the_title( $post_id ) : '';
		$date              = ( ! empty( $post_id ) ) ? get_the_date( 'Y-m-d H:i:s', $post_id ) : '';
		// debug( $date );
		// die;
		$post_permalink    = get_the_permalink( $post_id );
		$post_status       = get_post_status( $post_id );
		if ( ! empty( $post_id ) ) {
			$content_post = get_post( $post_id );
			$content      = $content_post->post_content;
			$content      = apply_filters('the_content', $content);
			$content      = str_replace(']]>', ']]&gt;', $content);
		}
		$post = get_post($post_id); 
		$post_status_class = '';
		if ( 'pending' === $post_status ) {
			$post_status_class = 'pending_btn';
		} elseif( 'draft' === $post_status ) {
			$post_status_class = 'draft_btn';
		} elseif( 'publish' === $post_status ) {
			$post_status_class = 'publish_btn';
		}
		$explded_slug            = str_replace( site_url(), '', $post_permalink  );
		$explded_slug            = ltrim( $explded_slug, '/' );
		$explded_slug            = ( ! empty( $explded_slug ) ) ? $explded_slug : '';
		$display_permalink_slug  = ! empty( $post_permalink ) ? 'display:none;' : '';
		$display_permalink_value = empty( $post_id ) ? 'display:none;' : '';
		$future_permalink        = $post->post_name;
		$shortend_permalink      = moc_shorten_filename( $future_permalink );
		$taxonomy                = '';
		if ( 'post' === $post_type ) {
			$taxonomy = 'category';
		} elseif ( 'podcast' === $post_type ) {
			$taxonomy = 'podcast_category';
		} elseif ( 'podcast' === $post_type ) {
			$taxonomy = 'podcast_category';
		} elseif ( 'workshop' === $post_type ) {
			$taxonomy = 'workshop_category';
		}
		$category_args = array(
			'type'         => $post_type,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hierarchical' => 1,
			'hide_empty'   => 0,
			'taxonomy'     => $taxonomy,
			'exclude'      => 1,
		);
		$categories    = get_categories( $category_args );
		$selected_cats = ! empty( $post_id ) ? wp_get_object_terms( $post_id, $taxonomy ) : array();
		$post_term_ids = array();
		$post_tag_ids  = array();
		$tags_args     = array(
			'type'         => $post_type,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hierarchical' => 1,
			'hide_empty'   => 0,
			'taxonomy'     => 'post_tag',
			'exclude'      => 1,
		);
		$tags          = get_categories( $tags_args );
		$selected_tags = ! empty( $post_id ) ? wp_get_object_terms( $post_id, 'post_tag' ) : array();

		if ( ! empty( $selected_cats ) && is_array( $selected_cats ) ) {
			foreach ( $selected_cats as $selected_cat_data ) {
				$post_term_ids[] = $selected_cat_data->term_id;
			}
		}

		if ( ! empty( $post_tag_ids ) && is_array( $post_tag_ids ) ) {
			foreach ( $selected_tags as $selected_tag_data ) {
				$post_tag_ids[] = $selected_tag_data->term_id;
			}
		}
		?>
		<div class="tabbing_content_details">
			<div class="tabbing_row">
				<div class="form_column_row">
					<h3><?php esc_html_e( 'Write new article', 'marketingops' ); ?></h3>
					<form action="" method="">
						<div class="form_row">
							<label><?php esc_html_e( 'Title', 'marketingops' ); ?></label>
							<input type="text" class="input_row moc_post_title" value="<?php echo esc_attr( $title ); ?>" placeholder="Title" />
							<div class="moc_error moc_post_title_err">
								<span></span>
							</div>
						</div>
						<div class="form_row">
							<div class="parma_link">
								<?php if ( 'publish' === $post_status ) {
									
								} ?>
								<div class="not_editable_data moc_not_editable_content" style="<?php echo esc_attr( $display_permalink_value ); ?>">
									<p><?php esc_html_e( 'Permalink', 'marketingops' ); ?> <a href="<?php echo esc_html( $post_permalink ); ?>" target="_blank"><?php echo esc_html( home_url( $shortend_permalink ) ); ?></a></p>
									<button type="button" class="edit_para_link_btn btn">Edit</button>
								</div>
								<div class="editable_data moc_editable_content" style="<?php echo esc_attr( $display_permalink_slug ); ?>">
									<label><?php esc_html_e( 'Permalink', 'marketingops' ); ?></label>
									<div class="input_box">
										<div class="input_boxes">
											<span><?php echo esc_url( home_url( '/' ) ); ?></span>
											<input type="text" class="input_row moc_permalink_slug" value="<?php echo esc_attr( $future_permalink );?>" placeholder="post-slug" />
										</div>
										<div class="input_btn_box">
											<a href="javascript:void(0);" class="gray_color btn cancel_btn moc_cancel_info"><?php esc_html_e( 'Cancel', 'marketingops' ); ?></a>
											<a href="javascript:void(0);" class="green_color btn btn_save moc_save_info"><?php esc_html_e( 'Save', 'marketingops' ); ?></a>
										</div>
									</div>
									<div class="moc_error moc_permalink_slug_err">
										<span></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form_row">
							<label><?php esc_html_e( 'Body copy', 'marketingops' ); ?></label>
							<div class="post-content-wp-editor-container">
								<textarea id="ic_colmeta_editor"><?php echo $content; ?></textarea>
							</div>
						</div>
						<div class="form_two_column_row">
							<div class="form_row">
								<label><?php esc_html_e( 'Category', 'marketingops' ); ?></label>
								<div id="moc_category_box" class="form_row_select">
									<select id="moc_post_content" class="js-example-basic-multiple" name="moc_post_content[]" multiple="multiple">
										<?php foreach ( $categories as $category ) {
											$selected = ( in_array( $category->term_id, $post_term_ids, true ) ) ? 'selected' : '';
											?>
											<option value="<?php echo esc_html( $category->name ); ?>" <?php echo $selected; ?>><?php echo esc_html( $category->name ); ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form_row">
								<div class="form_two_column_row">
									<div class="form_row">
										<label><?php esc_html_e( 'Status', 'marketingops' ); ?></label>
										<?php 
										$all_status = array( 
											'pending' => 'Pending', 
											'future'  => 'Schedule'
										);
										?>
										<div id="status_box" class="form_row_select">
											<select class="selected_option" id="moc_post_status">
												<option disabled="disabled"><?php esc_html_e( 'Please select', 'marketingops' ); ?></option>
												<?php
												foreach ( $all_status as $key => $status  ) {
													$selected = ( $post_status === $key ) ? 'selected' : '';
													?>
													<option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_attr( ucfirst( $status ) ); ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<?php
									$date_class = ( $post_status === 'future' ) ? '' : 'moc_not_show_date_field';
									?>
									<div class="form_row moc_date_section <?php echo esc_attr( $date_class ); ?>">
										<label><?php esc_html_e( 'Date', 'marketingops' ); ?></label>
										<input type="text" id="moc_date_for_post" class="input_row moc_date_for_post" value="<?php echo esc_html( $date ); ?>"/>
									</div>
								</div>
							</div>
						</div>
						<div class="form_row">
							<label><?php esc_html_e( 'Tags', 'marketingops' ); ?></label>
							<div id="tag_box" class="form_row_select">
								<select id="moc_post_tags" class="js-example-basic-multiple" name="moc_post_tags[]" multiple="multiple">
									<?php foreach ( $tags as $tag ) {
										$selected = ( ! empty( $post_tag_ids ) && in_array( $tag->term_id, $post_tag_ids, true ) ) ? 'selected' : '';
										// $selected = in_array(  )
										?>
										<option value="<?php echo esc_html( $tag->name ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo esc_html( $tag->name ); ?></option>
										<?php
									}
									?>
								</select>
								<span class="input_box">
									<div class="input_btn_box">
										<a href="javascript:void(0);" class="green_color btn moc_add_tags"><?php esc_html_e( 'Add Tags', 'marketingops' ); ?></a>
									</div>
								</span>
							</div>
						</div>
						<div class="form_row form_btn">
							<button type="button" class="white_btn btn moc_cancel_process"><?php esc_html_e( 'Cancel', '' ); ?></button>
							<button type="button" class="white_btn btn moc_save_draft">Save draft</button>
							<button type="submit" class="gradient_btn btn moc_save_for_review">
								<span class="svg_text"><?php esc_html_e( 'Submit for review', 'marketingops' ); ?></span>
								<span class="svg_icon">
									<svg viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10.5252 0.994573C10.2882 0.985459 10.0684 1.12103 9.97152 1.3375C9.87354 1.55396 9.91569 1.80688 10.0797 1.98005L11.8718 3.91682H0.591854C0.381088 3.9134 0.186272 4.02391 0.0803191 4.20619C-0.026773 4.38734 -0.026773 4.61292 0.0803191 4.79406C0.186272 4.97634 0.381088 5.08685 0.591854 5.08344H11.8718L10.0797 7.02021C9.93392 7.17287 9.88265 7.39161 9.94417 7.59326C10.0057 7.79492 10.1709 7.94758 10.376 7.99315C10.5822 8.03872 10.7964 7.96922 10.9365 7.81314L14 4.50013L10.9365 1.18711C10.8317 1.0709 10.6824 1.00027 10.5252 0.994573Z" fill="white"/>
									</svg>														
								</span>
							</button>
						</div>
						<input type="hidden" name="moc_post_id_val" value="<?php echo esc_attr( $post_id ); ?>">
					</form>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();

	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_get_course_tile_html' ) ) {
	/**
	 * Return the course single tile HTML on the courses list page.
	 *
	 * @param int|string $course_id Course post ID.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_get_course_tile_html( $course_ids, $posts_per_page, $paged, $count_posts ) {
		ob_start();
		// Return, if the course ID is not provided.
		foreach ( $course_ids as $course_id ) {
			$course_title         = get_the_title( $course_id );
			if ( strlen( $course_title ) > 50 ) {
				$course_title = substr( $course_title, 0, 60 ) . '...';
			}
			$course_excerpt       = strip_tags( get_the_excerpt( $course_id ) );
			if ( strlen( $course_excerpt ) > 70 ) {
				$course_excerpt = substr( $course_excerpt, 0, 40 ) . '...';
			}
			$course_thumbnail_id  = get_post_thumbnail_id( $course_id );
			$course_thumbnail_url = ( ! empty( $course_thumbnail_id ) ) ? wp_get_attachment_url( $course_thumbnail_id ) : '';
		
			// Prepare the course HTML now.
			?>
			<div class="box_content elementor-column elementor-col-33 elementor-top-column elementor-element">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-widget elementor-widget-image">
						<div class="elementor-widget-container">
							<img src="<?php echo esc_url( $course_thumbnail_url ); ?>" alt="OPS" />
						</div>
					</div>
					<div class="elementor-element elementor-widget elementor-widget-content">
						<div class="content_box">
							<div class="elementor-widget-container">
								<h3 class="moc_title_box"><?php echo wp_kses_post( $course_title ); ?></h3>
								<p class="moc_desc_box"><?php echo $course_excerpt; ?></p>
								<a href="<?php echo esc_url( get_permalink( $course_id ) ); ?>" class="btn pink_btn"><?php esc_html_e( 'Enroll Now', 'marketingops' ) ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		<div class="moc_courses_pagination">
			<?php echo moc_get_paginations_for_posts( $paged, $count_posts, $posts_per_page ); ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_load_post_count_html' ) ) {
	/**
	 * Function to load html of post count.
	 *
	 * @since 1.0.0
	 */
	function moc_load_post_count_html( $current_userid ) {
		ob_start();
		// For Normal blog posts.
		$total_blogs_query     = moc_posts_query_by_author( 'post', 1, -1, $current_userid, array('publish', 'pending', 'draft' ) );
		$total_blogs           = $total_blogs_query->posts;
		$total_blogs_count     = count( $total_blogs );

		// For podcasts.
		$total_podcast_query   = moc_posts_query_by_author( 'podcast', 1, -1, $current_userid, array('publish', 'pending', 'draft' ) );
		$total_podcasts        = $total_podcast_query->posts;
		$total_podcasts_count  = count( $total_podcasts );

		// For workshops.
		$total_workshop_query  = moc_posts_query_by_author( 'workshop', 1, -1, $current_userid, array('publish', 'pending', 'draft' ) );
		$total_workshops       = $total_workshop_query->posts;
		$total_workshops_count = count( $total_workshops );

		// For courses.
		$total_course_query    = moc_posts_query_by_author( 'sfwd-courses', 1, -1, $current_userid, array('publish', 'pending', 'draft' ) );
		$total_courses         = $total_course_query->posts;
		$total_courses_count   = count( $total_courses );
		?>
		<div class="box_row">
			<div class="details_box_bg">
				<div class="details_content">
					<h3><?php echo esc_html( $total_blogs_count ); ?></h3>
				</div>
				<span><?php esc_html_e( 'Articles', 'marketingops' ); ?></span>
			</div>
		</div>
		<!-- Forloop Here -->
		<div class="box_row">
			<div class="details_box_bg">
				<div class="details_content">
					<h3><?php echo esc_html( $total_podcasts_count ); ?></h3>
				</div>
				<span><?php esc_html_e( 'Podcasts', 'marketingops' ); ?></span>
			</div>
		</div>
		<!-- Forloop Here -->
		<!-- <div class="box_row">
			<div class="details_box_bg">
				<div class="details_content">
					<h3><?php echo esc_html( $total_workshops_count ); ?></h3>
				</div>
				<span><?php esc_html_e( 'Workshops & Webinars', 'marketingops' ); ?></span>
			</div>
		</div> -->
		<!-- Forloop Here -->
		<!-- <div class="box_row">
			<div class="details_box_bg">
				<div class="details_content">
					<h3><?php echo esc_html( $total_courses_count ); ?></h3>
				</div>
				<span><?php esc_html_e( 'Training Courses', 'marketingops' ); ?></span>
			</div>
		</div> -->
		<?php
		return ob_get_clean();
	}
}
/**
 * Check if function exist or not.
 */
if ( ! function_exists( 'moc_shorten_filename' ) ) {
	/**
	 * Function to return long url in short url.
	 *
	 * @param String $long_filename Thia varibles holds the string.
	 * @since 1.o.o
	 */
	function moc_shorten_filename( $long_filename ) {
		if ( empty( $long_filename ) ) {
			return $long_filename;
		}

		
		$left_part  = substr( $long_filename, 0, 18 ); // Get the left part of the filename.
		$right_part = substr( $long_filename, -18, 18 ); // Get the right part of the filename.
		$filename   = "{$left_part}...{$right_part}";

		/**
		 * This hooks runs on the checkout page basically where the license files are uploaded.
		 *
		 * This hooks helps in modifying the shortened filename.
		 *
		 * @param string $filename File name.
		 * @return string
		 * @since 1.0.0
		 */
		return apply_filters( 'ersrv_shortened_filename', $filename );
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_get_course_completed_count_by_user' ) ) {
	/**
	 * Function to return completed course count by user id.
	 *
	 * @param integer $user_id This varible hold the user id.
	 * @since 1.0.0
	 */
	function moc_get_course_completed_count_by_user( $user_id ) {
		$get_all_course_ids_query  = moc_posts_query( 'sfwd-courses', 1, -1 );
		$get_all_course_ids        = $get_all_course_ids_query->posts;
		$counted_completed_courses = array();
		foreach ( $get_all_course_ids as $get_all_course_id ) {
			$get_course_meta_key_val     = get_user_meta( $user_id, "course_completed_{$get_all_course_id}", true );
			$counted_completed_courses[] = ! empty( $get_course_meta_key_val ) ? $get_course_meta_key_val : '';
		}
		$counted_completed_courses = array_filter( $counted_completed_courses );
		return count( $counted_completed_courses );

	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_need_this_reports_html' ) ) {
	/**
	 * Function to return html of report form.
	 *
	 * @since 1.0.0
	 */
	function moc_need_this_reports_html() {
		ob_start();
		?>
		<div class="entry_level_form">
			<div class="form_container">
				<div class="form_row">
					<label>
						<span><?php esc_html_e( 'First name', 'marketingops' ); ?></span>
						<span class="required">*</span>
					</label>
					<input type="text" name="moc_ef_firstname" />
					<div class="moc_error moc_ef_firstname_err">
						<span></span>
					</div>
				</div>
				<div class="form_row">
					<label>
						<span><?php esc_html_e( 'Last name', 'marketingops' ); ?></span>
						<span class="required">*</span>
					</label>
					<input type="text" name="moc_ef_lastname" />
					<div class="moc_error moc_ef_lastname_err">
						<span></span>
					</div>
				</div>
				<div class="form_row">
					<label>
						<span><?php esc_html_e( 'Email', 'marketingops' ); ?></span>
						<span class="required">*</span>
					</label>
					<input type="email" name="moc_ef_email" />
					<div class="moc_error moc_ef_email_err">
						<span></span>
					</div>
				</div>
				<div class="form_row">
					<label>
						<span><?php esc_html_e( 'Company Website', 'marketingops' ); ?></span>
						<span class="required">*</span>
					</label>
					<input type="text" name="moc_ef_website" />
					<div class="moc_error moc_ef_website_err">
						<span></span>
					</div>
				</div>
				<div class="form_row full_width form_checkbox">
					<label><span><?php esc_html_e( 'Which template(s) do you need?', 'marketingops' ); ?></span></label>
					<div class="form_checkbox_row">
						<div class="checkbox_row">
							<span class="input_checkbox">
								<input type="checkbox" value="checkbox_1" id="checkbox_1">
								<label for="checkbox_1"><?php esc_html_e( 'Entry-level Marketing Ops Job Template', 'marketingops' ); ?></label>
							</span>
						</div>
						<div class="checkbox_row">
							<span class="input_checkbox">
								<input type="checkbox" value="checkbox_2" id="checkbox_2">
								<label for="checkbox_2"><?php esc_html_e( 'Mid-level Marketing Ops Job Template', 'marketingops' ); ?></label>
							</span>
						</div>
						<div class="checkbox_row">
							<span class="input_checkbox">
								<input type="checkbox" value="checkbox_3" id="checkbox_3">
								<label for="checkbox_3"><?php esc_html_e( 'Executive-level Marketing Ops Job Template', 'marketingops' ); ?></label>
							</span>
						</div>
					</div>
				</div>
				<div class="form_row full_width form_submit">
					<button type="submit" class="elementor-button-link elementor-button elementor-size-lg moc_submit_need_report">
						<span class="elementor-button-content-wrapper">
							<span class="elementor-button-icon elementor-align-icon-right">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none"><path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path></svg>
							</span>
							<span class="elementor-button-text"><?php esc_html_e( 'Download your template', 'marketingops' ); ?></span>
						</span>
					</a>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_courses_products_html' ) ) {
	/**
	 * Function to return HTML of course products.
	 *
	 * @since 1.0.0
	 */
	function moc_courses_products_html() {
		global $wpdb, $product;

		ob_start();

		if ( ! empty( $product ) ) {
			$wc_product_id         = $product->get_id();
			$wc_product            = wc_get_product( $wc_product_id );
			$description           = ! empty( $wc_product->get_description() ) ? $wc_product->get_description() : '';
			$product_title         = ! empty( $wc_product->get_name() ) ? $wc_product->get_name() : '';
			$product_regular_price = ! empty( $wc_product->get_regular_price() ) ? $wc_product->get_regular_price() : '';
			$product_sale_price    = ! empty( $wc_product->get_sale_price() ) ? $wc_product->get_sale_price() : '';
			$product_price         = ! empty( $wc_product->get_price() ) ? $wc_product->get_price() : 0;
			$related_groups        = ! empty( get_post_meta( $wc_product_id, '_related_group', true ) ) ? get_post_meta( $wc_product_id, '_related_group', true ) : array();
			$related_courses       = ! empty( get_post_meta( $wc_product_id, '_related_course', true ) ) ? get_post_meta( $wc_product_id, '_related_course', true ) : array();
			$product_image         = wp_get_attachment_image_src( get_post_thumbnail_id( $wc_product_id ), 'full' );
			$product_image         = $product_image[0];
			$course_preview_type   = ! empty( get_field( 'course_preview_type', $wc_product_id ) ) ? get_field( 'course_preview_type', $wc_product_id ) : '';
			$course_image          = ( 'image' === $course_preview_type && ! empty( get_field( 'course_preview_image', $wc_product_id ) ) ) ? get_field( 'course_preview_image', $wc_product_id ) : $product_image;
			$preview_video_link    = get_field( 'course_preview_video_link', $related_courses[0] );
			$embeded_url           = moc_convert_link_to_embed( $preview_video_link, '640', '360' );
			$courses_length        = ! empty( get_field( 'course_hours_length', $wc_product_id ) ) ? get_field( 'course_hours_length', $wc_product_id ) : '';

			foreach ( $related_groups as $related_group ) {
				$courses_groups[] = learndash_group_enrolled_courses( $related_group );
			}

			$courses_count = ( ! empty( $related_groups ) ) ? count( $courses_groups[0] ) : count( $related_courses );

			if ( ! empty( $related_groups ) && is_array( $related_groups ) ) {
				foreach ( $related_groups as $related_group ) {
					$course_id             = $related_group;
					$professior_names_data = get_post_meta( $course_id, 'ppma_authors_name', true );
					$professior_names_exp[]  = explode( ', ', $professior_names_data );
				}
				$professior_names = $professior_names_exp[0];
				foreach ( $professior_names as $professior_name ) {
					$get_appoinment_user_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $professior_name ) ), ARRAY_A );
					$professior_ids[]          = ! empty( $get_appoinment_user_query ) ? (int) $get_appoinment_user_query[0]['ID'] : 0;
				}
			} else {
				foreach ( $related_courses as $related_course ) {
					$course_id              = $related_course;
					$professior_names_data  = get_post_meta( $course_id, 'ppma_authors_name', true );
					$professior_names_exp   = explode( ', ', $professior_names_data );
				}

				foreach ( $professior_names_exp as $professior_name ) {
					$professior_name = ( ! empty( $professior_name ) ) ? $professior_name : '';

					// Skip, if the professor name is empty.
					if ( empty( $professior_name ) ) {
						continue;
					}

					$get_appoinment_user_query = $wpdb->get_results( $wpdb->prepare( 'SELECT ID FROM ' . $wpdb->prefix . 'users WHERE display_name = %s', array( $professior_name ) ), ARRAY_A );
					$professior_ids[]          = ! empty( $get_appoinment_user_query ) ? (int) $get_appoinment_user_query[0]['ID'] : 0;
				}
			}

			$professior_ids = ( ! empty( $professior_ids ) && is_array( $professior_ids ) ) ? array_unique( $professior_ids ) : array();
			?>
			<div class="courses_product_page">
				<div class="loader_bg">
					<div class="loader_product"></div>  
				</div>
				<div class="container">
					<div class="row">
						<!-- Left Side Part -->
						<div class="courses_product_left_side">
							<!-- Left Side Top Part -->
							<div class="left_side_top_box">
								<!-- Light Box Video Part -->
								<?php
								if ( 'video' === $course_preview_type ) {
									$video_data   = get_field( 'course_preview_video_link',$wc_product_id  );
									$video_banner = $video_data['video_banner'];
									$video_link   = $video_data['video_link'];

									?>
									<div class="video_box">
										<a href="javascript:void(0);" class="video_box_popup" data-videourl="<?php echo esc_attr( $video_link ); ?>">
											<!-- Course Img -->
											<img src="<?php echo esc_url( $video_banner ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
											<!-- Play Icon -->
											<img src="/wp-content/themes/marketingops/images/info_page/play.svg" alt="<?php echo esc_attr( $product_title ); ?>" class="play_btn" />
										</a>
									</div>
									<?php
								} elseif ( 'image' === $course_preview_type ) {
									?>
									<div class="video_box moc_image_box">
										<!-- Course Img -->
										<img src="<?php echo esc_url( $course_image ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
									</div>
									<?php
								} else {
									?>
									<div class="video_box moc_featured_image_box">
										<!-- Course Img -->
										<img src="<?php echo esc_url( $product_image ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
									</div>
									<?php
								}
								?>
								
							</div>
							<div class="left_side_bottom_box">
								<div class="bottom_box_container">
									<div class="custom_slider ">
										<?php
										if ( ! empty( $professior_ids ) && is_array( $professior_ids ) ) {
											foreach ( $professior_ids as $professior_id ) {	
												$default_author_img         = get_field( 'moc_user_default_image', 'option' );
												$professior_username  = get_the_author_meta( 'user_nicename', $professior_id );
												$professior_name      = get_the_author_meta( 'display_name', $professior_id );
												$all_user_meta        = get_user_meta( $professior_id );
												$firstname            = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
												$lastname             = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
												$professior_name      = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $professior_name;
												$upload_dir           = wp_upload_dir();
												$image_id             = ! empty( get_user_meta( $professior_id, 'wp_user_avatar', true ) ) ? get_user_meta( $professior_id, 'wp_user_avatar', true ) : '';
												$author_img_url       = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attached_file', true ) : '';
												$professior_image_url = ! empty( $author_img_url ) ? $upload_dir['baseurl'] . '/' . $author_img_url : $default_author_img;
												$user_all_info        = get_user_meta( $professior_id, 'user_all_info', true );
												$user_certificates    = ! empty( $user_all_info['moc_certificates'] ) ? $user_all_info['moc_certificates'] : array();
												$moc_martech_info     = $user_all_info['moc_martech_info'];
												$courses_link         = home_url() . '/courses-search/?professor=' . $professior_username;
												if ( ! empty( $moc_martech_info ) && is_array( $moc_martech_info ) ) {
													foreach ( $moc_martech_info as $moc_martech ) {
														if ( 'yes' === $moc_martech['primary_value'] ) {
															// if ( $moc_martech['platform'] === )
															$primary_automation[] = $moc_martech['platform'];
														}
													}
												}
												?>
												<div class="slider_item">
													<div class="author_box_container">
														<!-- Bottom Left Side Part -->
														<div class="bottom_box_left_side">
															<!-- Author Img -->
															<div class="author_img">
																<img src="<?php echo esc_url( $professior_image_url ); ?>"
																	alt="<?php echo esc_attr( $professior_name ); ?>" />
															</div>
															<!-- Author Content -->
															<div class="author_content">
																<!-- Author Name -->
																<div class="author_content_box">
																	<p><?php esc_html_e( 'Taught by:', 'marketingops' ); ?></p>
																	<h4><?php echo esc_html( $professior_name ); ?></h4>
																</div>
																<!-- Author Tracker -->
																<?php
																if ( ! empty( $primary_automation ) ) {
																	?>
																	<div class="author_content_box">
																		<p><?php esc_html_e( 'Main MAP:', 'marketingops' ); ?></p>
																		<h4><?php echo esc_html( $primary_automation[0] ); ?></h4>
																	</div>
																	<?php
																}
																?>
																<!-- Author BTN Link -->
																<a href="<?php echo esc_url( $courses_link ); ?>" target="_blank"><?php echo sprintf( __( 'View other courses by %1$s', 'marketingops' ), $professior_name ); ?></a>
															</div>
														</div>
														<!-- Bottom Right Side Part -->
														<div class="bottom_box_right_side">
															<div class="right_side_brand_box">
																<!-- Brand Img Box -->
																<?php 
																if ( ! empty( $user_certificates ) && is_array( $user_certificates ) ) {
																	foreach ( $user_certificates as $user_certificate ) {
																		$certificate_title = get_the_title( $user_certificate );
																		$certificate_image = wp_get_attachment_image_src( get_post_thumbnail_id( $user_certificate ), 'single-post-thumbnail' );
																		?>
																		<div class="brand_box">
																			<img src="<?php echo esc_url( $certificate_image[0] ); ?>" alt="<?php echo esc_html( $certificate_title ); ?>">
																		</div>
																		<?php
																	}
																}
																?>
															</div>
														</div>
													</div>
												</div>
												<?php
											}
										}
										?>
									</div>
								</div>
							</div>
							<?php
							if ( is_user_logged_in() ) {
								?>
								<div class="left_side_bottom_box moc_manage_review_section">
									<div class="bottom_box_container">
										<div class="product_review right_side_box">
											<?php echo do_shortcode('[elementor-template id="210470"]'); ?>
										</div>
									</div>
								</div>
								<?php
							}
						?>
						</div>
						<!-- Right Side Part -->
						<div class="courses_product_right_side">
							<!-- Product Title -->
							<div class="product_title right_side_box">
								<h2><?php echo esc_html( $product_title ); ?></h2>
							</div>
							<!-- Mobile Product Price & Reviews -->
							<div class="mobile_part mobile_product_review_price product_review_price">
								<!-- Product Price -->
								<div class="product_price right_side_box">
									<label><?php esc_html_e( 'Total price', 'marketingops' ); ?></label>
									<p class="price">
										<?php
										if ( ! empty(  $product_sale_price ) ) {
											?>
											<del aria-hidden="true">
												<span class="woocommerce-Price-amount amount">
													<bdi>
														<span class="woocommerce-Price-currencySymbol">$</span><?php echo esc_html( $product_regular_price ); ?>
													</bdi>
												</span>
											</del>
											<?php
										}
										?>
										<ins>
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<span class="woocommerce-Price-currencySymbol">$</span><?php echo esc_html( $product_price ); ?>
												</bdi>
											</span>
										</ins>
									</p>
								</div>
								<!-- Product Rating -->
								
							</div>
							<!-- Mobile Video Part -->
							<?php
								if ( 'video' === $course_preview_type ) {
									$video_data   = get_field( 'course_preview_video_link',$wc_product_id  );
									$video_banner = $video_data['video_banner'];
									$video_link   = $video_data['video_link'];

									?>
									<div class="mobile_part video_box">
										<a href="javascript:void(0);" class="video_box_popup" data-videourl="<?php echo esc_attr( $video_link ); ?>">
											<!-- Course Img -->
											<img src="<?php echo esc_url( $video_banner ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
											<!-- Play Icon -->
											<img src="/wp-content/themes/marketingops/images/info_page/play.svg" alt="<?php echo esc_attr( $product_title ); ?>" class="play_btn" />
										</a>
									</div>
									<?php
								} elseif ( 'image' === $course_preview_type ) {
									?>
									<div class="mobile_part video_box moc_image_box">
										<!-- Course Img -->
										<img src="<?php echo esc_url( $course_image ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
									</div>
									<?php
								} else {
									?>
									<div class="mobile_part video_box moc_featured_image_box">
										<!-- Course Img -->
										<img src="<?php echo esc_url( $product_image ); ?>" alt="<?php echo esc_attr( $product_title ); ?>" />
									</div>
									<?php
								}
								?>
							<!-- Product Icon Box -->
							<div class="product_icon_box right_side_box">
								<!-- Icon Box -->
								<div class="icon_box">
									<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_video.svg"
										alt="courses_product_video" />
									<p><?php echo esc_html( $courses_count ); ?> <?php esc_html_e( 'courses', 'marketingops' ); ?></p>
								</div>
								<!-- Icon Box -->
								<?php
								if ( ! empty( $courses_length ) ) {
									?>
									<div class="icon_box">
										<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_tv.svg"
											alt="courses_product_tv" />
										<p><?php echo esc_html( $courses_length ); ?></p>
									</div>
									<?php
								}
								?>
							</div>
							<!-- Product Content -->
							<div class="product_content right_side_box">
								<p><?php echo wp_kses_post( $description ); ?></p>
							</div>
							<!-- Product Price & Reviews -->
							<div class="product_review_price">
								<!-- Product Price -->
								<div class="product_price right_side_box">
									<label><?php esc_html_e( 'Total price', 'marketingops' ); ?></label>
									<p class="price">
										<?php
										if ( ! empty(  $product_sale_price ) ) {
											?>
											<del aria-hidden="true">
												<span class="woocommerce-Price-amount amount">
													<bdi>
														<span class="woocommerce-Price-currencySymbol">$</span><?php echo esc_html( $product_regular_price ); ?>
													</bdi>
												</span>
											</del>
											<?php
										}
										?>
										<ins>
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<span class="woocommerce-Price-currencySymbol">$</span><?php echo esc_html( $product_price ); ?>
												</bdi>
											</span>
										</ins>
									</p>
								</div>
								<!-- Product Rating -->
							</div>
							<!-- Product Form Button -->
							<?php
							$stock_quantity          = $wc_product->get_stock_quantity();
							$product_manageble_stock = $wc_product->managing_stock();
							$outofstock_msg          = get_field( 'course_out_of_stock_message', 'option' );
							$course_outofstock_msg   = str_replace( '{course_name}', $product_title, $outofstock_msg );
							$low_stock_amount        = get_post_meta( $wc_product_id, '_low_stock_amount', true );
							$low_Stock_msg           = get_field( 'course_low_stock_threshold_message', 'option' );
							$course_low_stock_msg    = str_replace( '{course_threshold}', $stock_quantity, $low_Stock_msg );
							$flag_to_display = true;
							if ( $wc_product->is_type( 'course' ) ) {
								if ( is_user_logged_in() ) {
									$product_link = site_url() . '/?add-to-cart=' . esc_attr( $wc_product_id ) . '&quantity=1';
								} else {
									$product_needs_to_plan = 
									$product_link = site_url() . '/sign-up?plan=163406&add_to_cart='.$wc_product_id;	
									$flag_to_display = false;
								}
									
							}
							if ( $product_manageble_stock ) {
								if ( 0 < $stock_quantity ) {
									if ( $low_stock_amount >= $stock_quantity ) {
										?>
										<div class="moc_low_stock_threshold_div">
											<p class="moc_low_stock_threshold_msg"><?php echo $course_low_stock_msg;?></p>
										</div>
										<?php
									}
									?>
									<div class="moc_product_stock_quantity">
										<?php
										if ( ! empty( $product_manageble_stock ) ) {
											echo $stock_quantity . ' available';
										}
										?>
									</div>
									<div class="product_form">
										<!-- Cart Button -->
										<a href="<?php echo esc_url( $product_link ); ?>" class="moc_single_add_to_cart_button elementor-button-link elementor-button elementor-size-lg" role="button">
											<span class="elementor-button-content-wrapper">
												<span class="elementor-button-icon elementor-align-icon-right">
													<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
														<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path>
													</svg>
												</span>
												<span class="elementor-button-text"><?php esc_html_e( 'Add to cart', 'marketingops' ); ?></span>
											</span>
										</a>
										<!-- Checkout Button -->
										
										<?php	
										if ( true === $flag_to_display ) {	
											?>	
											<button type="submit" class="single_checkout_button moc_single_checkout_button button" data-productid="<?php echo esc_attr( $wc_product_id ); ?>"><?php esc_html_e( 'Checkout', 'marketingops' ); ?></button>	
											<?php	
										}	
										?>
									</div>
									<?php
								} else {
									?>
									<p class="moc_product_not_in_stock"><?php echo $course_outofstock_msg;?></p>
									<?php
								}
							} else {
								if ( $product->is_in_stock() ) {
									if ( $product->is_type( 'course' ) ) {
										if ( is_user_logged_in() ) {
											$product_link = site_url() . '/?add-to-cart=' . esc_attr( $wc_product_id ) . '&quantity=1';
										} else {
											$product_link = site_url() . '/sign-up?plan=163406&add_to_cart='.$wc_product_id;
										}
											
									}
									?>
									<div class="moc_product_stock_quantity">
										<?php
										if ( ! empty( $product_manageble_stock ) ) {
											echo $stock_quantity . ' available';
										}
										?>
									</div>
									<div class="product_form">
										<!-- Cart Button -->
										<a href="<?php echo esc_url( $product_link ); ?>" class="moc_single_add_to_cart_button elementor-button-link elementor-button elementor-size-lg" role="button">
											<span class="elementor-button-content-wrapper">
												<span class="elementor-button-icon elementor-align-icon-right">
													<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
														<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path>
													</svg>
												</span>
												<span class="elementor-button-text"><?php esc_html_e( 'Add to cart', 'marketingops' ); ?></span>
											</span>
										</a>
										<!-- Checkout Button -->
										<?php	
										if ( true === $flag_to_display ) {	
											?>	
											<button type="submit" class="single_checkout_button moc_single_checkout_button button" data-productid="<?php echo esc_attr( $wc_product_id ); ?>"><?php esc_html_e( 'Checkout', 'marketingops' ); ?></button>	
											<?php	
										}
										?>
									</div>
									<?php
								} else {
									?>
									<p class="moc_product_not_in_stock"><?php echo $course_outofstock_msg;?></p>
									<?php
								}
							}
								
								// debug( $product_manageble_stock );
								// die;
								// ! $product->managing_stock() && ! $product->is_in_stock()
							
							?>
							<!-- <div class="product_form">
								<a href="/?add-to-cart=<?php echo esc_attr( $wc_product_id ); ?>&quantity=1" class="moc_single_add_to_cart_button elementor-button-link elementor-button elementor-size-lg" role="button">
									<span class="elementor-button-content-wrapper">
										<span class="elementor-button-icon elementor-align-icon-right">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
												<path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="white"></path>
											</svg>
										</span>
										<span class="elementor-button-text"><?php esc_html_e( 'Add to cart', 'marketingops' ); ?></span>
									</span>
								</a>
								<button type="submit" class="single_checkout_button moc_single_checkout_button button" data-productid="<?php echo esc_attr( $wc_product_id ); ?>"><?php esc_html_e( 'Checkout', 'marketingops' ); ?></button>
							</div> -->
						</div>
					</div>
				</div>
			</div>
			<?php
		} else {
			?>
			<div class="courses_product_page">
				<div class="container">
					<div class="row">
						<!-- Left Side Part -->
						<div class="courses_product_left_side">
							<!-- Left Side Top Part -->
							<div class="left_side_top_box">
								<!-- Light Box Video Part -->
								<div class="video_box">
									<!-- Course Img -->
									<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_page.jpg"
										alt="courses_product_page" />
									<!-- Play Icon -->
									<img src="/wp-content/themes/marketingops/images/info_page/play.svg" alt="ply_icon"
										class="play_btn" />
								</div>
							</div>
							<!-- Left Side Bottom Part -->
							<div class="left_side_bottom_box">
								<div class="bottom_box_container">
									<!-- Bottom Left Side Part -->
									<div class="bottom_box_left_side">
										<!-- Author Img -->
										<div class="author_img">
											<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_author_image.png"
												alt="courses_product_author_image" />
										</div>
										<!-- Author Content -->
										<div class="author_content">
											<!-- Author Name -->
											<div class="author_content_box">
												<p><?php esc_html_e( 'Taught by:', 'marketingops' ); ?></p>
												<h4><?php esc_html_e( 'Sarah McNamara', 'marketingops' ); ?></h4>
											</div>
											<!-- Author Tracker -->
											<div class="author_content_box">
												<p><?php esc_html_e( 'Main MAP:', 'marketingops' ); ?></p>
												<h4><?php esc_html_e( 'HubSpot', 'marketingops' ); ?></h4>
											</div>
											<!-- Author BTN Link -->
											<a href="#" target="_blank"><?php esc_html_e( 'View other courses by Sahar McNamara', 'marketingops' ); ?></a>
										</div>
									</div>
									<!-- Bottom Right Side Part -->
									<div class="bottom_box_right_side">
										<div class="right_side_brand_box">
											<!-- Brand Img Box -->
											<div class="brand_box">
												<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_badge_1.png"
													alt="courses_product_badge_1" />
											</div>
											<!-- Brand Img Box -->
											<div class="brand_box">
												<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_badge_2.png"
													alt="courses_product_badge_2" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							if ( is_user_logged_in() ) {
								?>
								<div class="left_side_bottom_box moc_manage_review_section">
									<div class="bottom_box_container">
										<div class="product_review right_side_box">
											<?php echo do_shortcode('[elementor-template id="210470"]'); ?>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<!-- Right Side Part -->
						<div class="courses_product_right_side">
							<!-- Product Title -->
							<div class="product_title right_side_box">
								<h2><?php esc_html_e( 'Some name of the video here', 'marketingops' ); ?></h2>
							</div>
							<!-- Mobile Product Price & Reviews -->
							<div class="mobile_part mobile_product_review_price product_review_price">
								<!-- Product Price -->
								<div class="product_price right_side_box">
									<label><?php esc_html_e( 'Total price', 'marketingops' ); ?></label>
									<p class="price">
										<del aria-hidden="true">
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<span class="woocommerce-Price-currencySymbol"><?php esc_html_e( '$', 'marketingops' ); ?></span><?php esc_html_e( '29.99', 'marketingops' ); ?>
												</bdi>
											</span>
										</del>
										<ins>
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<span class="woocommerce-Price-currencySymbol"><?php esc_html_e( '$', 'marketingops' ); ?></span><?php esc_html_e( '25.49', 'marketingops' ); ?>
												</bdi>
											</span>
										</ins>
									</p>
								</div>
								<!-- Product Rating -->
								<div class="product_review right_side_box">
									
								</div>
							</div>
							<!-- Mobile Video Part -->
							<div class="mobile_part video_box">
								<!-- Course Img -->
								<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_page.jpg"
									alt="courses_product_page" />
								<!-- Play Icon -->
								<img src="/wp-content/themes/marketingops/images/info_page/play.svg" alt="ply_icon"
									class="play_btn" />
							</div>
							<!-- Product Icon Box -->
							<div class="product_icon_box right_side_box">
								<!-- Icon Box -->
								<div class="icon_box">
									<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_video.svg"
										alt="courses_product_video" />
									<p><?php esc_html_e( '6 videos', 'marketingops' ); ?></p>
								</div>
								<!-- Icon Box -->
								<div class="icon_box">
									<img src="/wp-content/themes/marketingops/images/course_product_page/courses_product_tv.svg"
										alt="courses_product_tv" />
									<p><?php esc_html_e( '4 hours', 'marketingops' ); ?></p>
								</div>
							</div>
							<!-- Product Content -->
							<div class="product_content right_side_box">
								<p><?php esc_html_e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
									labore et dolore magna aliqua. In hac habitasse platea
									dictumst vestibulum rhoncus. Nunc non blandit massa enim nec dui nunc. Amet cursus sit amet
									dictum sit amet justo. Commodo quis imperdiet massa tincidunt.
									Nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit.', 'marketingops' ); ?></p>
							</div>
							<!-- Product Price & Reviews -->
							<div class="product_review_price">
								<!-- Product Price -->
								<div class="product_price right_side_box">
									<label><?php esc_html_e( 'Total price', 'marketingops' ); ?></label>
									<p class="price">
										<del aria-hidden="true">
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<span class="woocommerce-Price-currencySymbol"><?php esc_html_e( '$', 'marketingops' ); ?></span><?php esc_html_e( '29.99', 'marketingops' ); ?>
												</bdi>
											</span>
										</del>
										<ins>
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<span class="woocommerce-Price-currencySymbol"><?php esc_html_e( '$', 'marketingops' ); ?></span><?php esc_html_e( '25.49', 'marketingops' ); ?>
												</bdi>
											</span>
										</ins>
									</p>
								</div>
								<!-- Product Rating -->
							</div>
							<!-- Product Form Button -->
							<div class="product_form">
								<!-- Cart Button -->
								<button type="submit" class="single_add_to_cart_button button"><?php esc_html_e( 'Add to cart', 'marketingops' ); ?></button>
								<!-- Checkout Button -->
								<button type="submit" class="single_checkout_button button"><?php esc_html_e( 'Checkout', 'marketingops' ); ?></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_courses_by_search_keyword' ) ) {
	/**
	 * Get all terms by taxonomy.
	 *
	 * @since 1.0.0
	 */
	function moc_get_courses_by_search_keyword( $search_keyword, $post_type = 'post', $paged = 1, $posts_per_page = -1, $selected_sorting_by = 'date', $selected_sorting_order = 'DESC', $category = array(), $taxonomy = array(), $meta_key = '', $meta_value = '', $compare = '', $type = '', $professor_id = 0 ) {
		// Prepare the arguments array.
		$str_name             = str_replace('+', ' ', $search_keyword );
		$name             = preg_split( '/\s+/', trim( $str_name ) );
		$first_name       = $name[0];
		$last_name        = isset( $name[1] ) ? $name[1] : null;
		$user_arguments   = array();

		if ( ! empty( $search_keyword ) ) {
			if ( is_null( $last_name ) ) {
				$user_arguments['meta_query'][] = array(
					'relation' => 'OR', // This is default, just trying to be descriptive
					array(
						'key'     => 'first_name',
						'value'   => $first_name,
						'compare' => 'LIKE',
					),
					array(
						'key'     => 'last_name',
						'value'   => $first_name,
						'compare' => 'LIKE',
					)
					
				);
			} else {
				$user_arguments['meta_query'][] = array(
					'relation' => 'OR', // This is default, just trying to be descriptive
					array(
						'key'     => 'first_name',
						'value'   => $first_name,
						'compare' => 'LIKE'
					),
					array(
						'key'     => 'last_name',
						'value'   => $last_name,
						'compare' => 'LIKE'
					)
				);
			}
			
		}

		if ( ! empty( $search_keyword ) ) {
			$user_arguments['search'] = '*'.esc_attr( $str_name ).'*';
		}
		$wp_user_query = new WP_User_Query( $user_arguments );
		$authors       = $wp_user_query->get_results();
		$author_ids    = array();

		if ( ! empty( $authors ) && is_array( $authors ) ) {
			foreach ( $authors as $author ) {
				$author_ids[]= $author->data->ID;
			}
		}

		$args = array(
			'post_type'              => $post_type,
			'post_status'            => 'publish',
			'paged'                  => $paged,
			'ignore_sticky_posts'    => 1,
			'posts_per_page'         => $posts_per_page,
			'orderby'                => $selected_sorting_by,
			'order'                  => $selected_sorting_order,
			'fields'                 => 'ids',
		);
		if ( ! empty ( $author_ids ) ) {
			$args['meta_query'] = array(
				array(
					'key'     => "course_author",
					'value'   => $author_ids,
					'compare' => "IN",
				),
			);
		} else {
			$args['s'] = $search_keyword;
		}
		if ( ! empty( $professor_id ) ) {
			global $wpdb;
			$get_appoinment_user_query = $wpdb->get_results( $wpdb->prepare( 'SELECT display_name FROM ' . $wpdb->prefix . 'users WHERE ID = %d', array( $professor_id ) ), ARRAY_A );
			$professor_displayname     = ! empty( $get_appoinment_user_query ) ? $get_appoinment_user_query[0]['display_name'] : '';
			
			$professor_id = (int) $professor_id;
			$args['meta_query'][] = array(
				'relation' => 'OR', // This is default, just trying to be descriptive
				array(
					'key'     => 'course_author',
					'value'   => serialize( $professor_id ),
					'compare' => "LIKE",
					'type'    => "{$type}",
				),
				array(
					'key'     => 'course_author',
					'value'   => $professor_id,
					'compare' => "=",
				),
				array(
					'key'     => 'ppma_authors_name',
					'value'   => $professor_displayname,
					'compare' => 'LIKE',
				)
				
			);
		}
		if ( ( 0 === $meta_value ) && ( ! empty( $meta_key ) && ( '_price' === $meta_key ) ) )  {
			$args['meta_query'] = array(
				array(
					'key'     => "{$meta_key}",
					'value'   => $meta_value,
					'compare' => "{$compare}",
					'type'    => "{$type}",
				),
			);
		} 
		if ( ! empty( $category && $taxonomy ) ) {
			$args[ 'tax_query' ] = 
			array(
				array(
					'taxonomy' => $taxonomy,
					'terms' => $category,
					'field' => 'slug',
					'include_children' => true,
					'operator' => 'IN'
				),
			);
		}
		
		if ( 'product' === $post_type ) {
			$args[ 'tax_query' ] = 
			array(
				array(
					'taxonomy' => 'product_type',
					'terms' => 'course',
					'field' => 'slug',
					'include_children' => true,
					'operator' => 'IN'
				),
			);
			if ( 'featured_course' === $meta_key ) {
				$args[ 'tax_query' ] = 
				array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
						'operator' => 'IN', // or 'NOT IN' to exclude feature products
					),
					array(
						'taxonomy' => 'product_type',
						'terms' => 'course',
						'field' => 'slug',
						'include_children' => true,
						'operator' => 'IN'
					),
				);
			}
		}
		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		return new WP_Query( apply_filters( 'moc_get_posts_by_search_keyword_args', $args ) );
	}
}

function moc_convert_link_to_embed( $videoLink, $width, $height ) {
	$embed = '';

	$video_link = ( ! empty( $videoLink['video_link'] ) ) ? $videoLink['video_link'] : $videoLink;

	if ( preg_match( '/https:\/\/(?:www.)?(youtube).com\/watch\\?v=(.*?)/', $video_link ) )
		$embed = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"" . $width . "\" height=\"" . $height . "\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $video_link );

	if ( preg_match( '/https:\/\/vimeo.com\/(\\d+)/', $video_link, $regs ) )
		$embed = '<iframe src="https://player.vimeo.com/video/' . $regs[1] . '?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=ffffff" width="' . $width . '" height="' . $height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

	return $embed;

}

if ( ! function_exists( 'moc_purchaed_courses' ) ) {
	/**
	 * Get the User purchased courses.
	 *
	 * @param array  $$current_userid Current User id.
	 * @since 1.0.0
	 */
	function moc_purchaed_courses( $current_userid ) {
		ob_start();

		$courses = learndash_user_get_enrolled_courses( get_current_user_id() );
		?>
		<div class="title_with_btn">
			<!-- about title -->
			<h3><?php echo esc_html( 'Purchased Courses','marketingops' ); ?></h3>
		</div>
		<div class="sub_title_with_content moc_profile_purchased_courses">
			<!-- Certification content -->
			<div class="content_boxes selected_certi">
				<div class="training_page_new">
					<div class="training_contnet_box">
						<div class="training_content">
							<!-- loop here -->
							<?php 
							if ( ! empty( $courses ) && is_array( $courses ) ) {
								$i = 0;
								foreach ( $courses as $course_id ) {
									$course_title     = get_the_title( $course_id );
									$course_permalink = get_the_permalink( $course_id );
									$class = '';
									if( 0 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 1 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 2 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 3 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 4 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 5 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 6 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 7 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else if( 8 === $i ) {
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									} else {
										$i = 0;
										$class     = "moc_profile_training_index_{$i}";
										$image_url = wp_get_attachment_image_src( get_option( 'options_courses_default_image_'. $i .'_default_image' ), 'single-post-thumbnail' );
									}
									?>
									<div class="training_content_boxed <?php echo esc_attr( $class );?>">
										<div class="boxed_bg" style="background-image: url('<?php echo esc_url( $image_url[0] ); ?>');">
											<!-- Name of workshop -->
											<div class="training_workshop_name">
												<a href="<?php echo esc_url( $course_permalink ); ?>" class="workshop_title"><?php echo esc_html( $course_title ); ?></a>
											</div>
										</div>
									</div>
									<?php
									$i++;
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_check_user_role' ) ) {
	/**
	 * Function to retunrn current user roles.
	 *
	 * @param array $roles This variable hold the role of current user.
	 * @since 1.0.0
	 */
	function moc_check_user_role( $roles ) {
		/*@ Check user logged-in */
		if ( is_user_logged_in() ) {
			$user = wp_get_current_user();
			$currentUserRoles = $user->roles;
			$isMatching = array_intersect( $currentUserRoles, $roles);
			$response = false;
			if ( !empty($isMatching) ) {
				$response = true;  
			}
			return $response;
		}
	}
}
/**
 * Check if function exists or not.
 */
if ( ! function_exists( 'moc_resourses_block' ) ) {
	/**
	 * Function to load HTML for Resourse lists.
	 */
	function moc_resourses_block( $resourse_posts ) {
		ob_start();
		foreach ( $resourse_posts as $resourse_post ) {
			$post_title       = get_the_title( $resourse_post );
			$post_link_arr    = get_field( 'custom_link', $resourse_post );
			$post_permalink   = $post_link_arr[ 'url' ];
			$link_target      = ! empty( $post_link_arr[ 'target' ] ) ? $post_link_arr[ 'target' ] : '_self';
			$post_description = get_the_excerpt( $resourse_post );
			$post_image_id    = get_post_thumbnail_id( $resourse_post );
			$post_image_array = ! empty( $post_image_id ) ? wp_get_attachment_image_src( $post_image_id, 'single-post-thumbnail' ) : array();
			$post_image_url   = ! empty( $post_image_array ) ? $post_image_array[0] : get_field( 'moc_default_post_image', 'option' );
			?>
			<a href="<?php echo esc_url( $post_permalink ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
				<div class="blog_post">
					<div class="post_boxed">
						<!-- Box looped here -->
						<div class="box_loop">
							<!-- main title -->
							<div class="blog_post_box">
								<div class="box_title">
									<h2><?php echo esc_html( $post_title ); ?></h2>
									<p><?php echo $post_description; ?></p>
									<div class="box_post_img">
										<img src="<?php echo esc_url( $post_image_url ); ?>" alt="<?php echo esc_attr( $post_title ); ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
			<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_load_html_view_profile_data' ) ) {
	/**
	 * Load HTML for posts.
	 */
	function moc_load_html_view_profile_data( $post_type, $posts, $post_status ) {
		ob_start();
		$post_read_txt = ( 'post' === $post_type ) ? __( 'Read', 'marketingops' ) : __( 'Listen', 'marketingops' );
		$post_edit_txt = ( 'post' === $post_type ) ? __( 'Edit', 'marketingops' ) : __( 'Listen', 'marketingops' );
		$read_btn_txt  = ( 'publish' === $post_status ) ? $post_read_txt : $post_edit_txt;
		$title         = ( 'post' === $post_type ) ? __( 'Blog contribution','marketingops' ) : __( 'Podcasts','marketingops' );
		if ( ! empty( $posts ) ) {
			?>
			<div class="title_with_btn">
			<!-- about title -->
			<h3><?php echo esc_html( $title ); ?></h3>
			</div>
			<div class="sub_title_with_content">
				<!-- loop here -->
				<?php foreach ( $posts as $post_id ){
					$blog_title        = get_the_title( $post_id );
					$blog_publish_date = get_the_date( 'M d Y', $post_id );
					$blog_permalink    = get_the_permalink( $post_id );
					?>
					<div class="content_boxes">
						<div class="boxes_svg_icon">
							<svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.25 0.5C3.734 0.5 2.5 1.7335 2.5 3.25V14.25C2.5 15.7665 3.734 17 5.25 17H13.25C14.766 17 16 15.7665 16 14.25V7.5H11.0186C9.90555 7.5 9 6.59397 9 5.48047V0.5H5.25ZM10.5 0.939453V5.48145C10.5 5.76745 10.7326 6 11.0186 6H15.5605L10.5 0.939453ZM1.5 3L0.890625 3.40625C0.334125 3.77725 0 4.40181 0 5.07031V14.75C0 17.3735 2.1265 19.5 4.75 19.5H11.4297C12.0987 19.5 12.7233 19.1659 13.0938 18.6094L13.5 18H4.75C2.955 18 1.5 16.545 1.5 14.75V3ZM6.75 9.5H11.75C12.164 9.5 12.5 9.8355 12.5 10.25C12.5 10.6645 12.164 11 11.75 11H6.75C6.336 11 6 10.6645 6 10.25C6 9.8355 6.336 9.5 6.75 9.5ZM6.75 12.5H11.75C12.164 12.5 12.5 12.8355 12.5 13.25C12.5 13.6645 12.164 14 11.75 14H6.75C6.336 14 6 13.6645 6 13.25C6 12.8355 6.336 12.5 6.75 12.5Z" fill="#6D7B83"/>
							</svg>
						</div>
						<div class="boxes_title_and_content">
							<h5><?php echo esc_html( $blog_title ); ?></h5>
							<div class="date_btn">
								<span class="date"><?php echo esc_html( $blog_publish_date ); ?></span>
								<a href="<?php echo esc_html( $blog_permalink ); ?>">
									<span class="text"><?php echo esc_html( $read_btn_txt ); ?></span>
									<span class="svg">
										<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M10.5262 0.494085C10.2892 0.484971 10.0693 0.620545 9.97249 0.837007C9.87452 1.05347 9.91667 1.30639 10.0807 1.47956L11.8728 3.41633H0.592831C0.382065 3.41291 0.187248 3.52342 0.0812957 3.70571C-0.0257965 3.88685 -0.0257965 4.11243 0.0812957 4.29357C0.187248 4.47586 0.382065 4.58637 0.592831 4.58295H11.8728L10.0807 6.51972C9.9349 6.67238 9.88363 6.89112 9.94515 7.09277C10.0067 7.29443 10.1719 7.44709 10.3769 7.49266C10.5831 7.53823 10.7973 7.46874 10.9375 7.31266L14.001 3.99964L10.9375 0.686623C10.8326 0.570417 10.6834 0.499781 10.5262 0.494085Z" fill="url(#paint0_linear_2170_635)"/>
											<defs>
												<linearGradient id="paint0_linear_2170_635" x1="-0.329264" y1="4.01698" x2="22.2686" y2="4.01698" gradientUnits="userSpaceOnUse">
													<stop stop-color="#FD4B7A"/>
													<stop offset="1" stop-color="#4D00AE"/>
												</linearGradient>
											</defs>
										</svg>
									</span>
								</a>
							</div>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		<?php
		}
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_blogs_view_html' ) ) {
	/**
	 * Function to load HTML for view blog data.
	 */
	function moc_blogs_view_html( $user_id, $post_type, $post_status ) {
		ob_start();
		if ( 'post' === $post_type ) {
			$blogs_by_user_query = moc_posts_query_by_author( $post_type, 1, 4 , $user_id, $post_status );
			$posts_data          = $blogs_by_user_query->posts;
		} else {
			global $wpdb;
			$meta_key      = 'podcast_guest';
			$compare       = 'LIKE';
			$podcase_query = moc_posts_by_meta_key_value( $post_type, 1, 4, $meta_key, $user_id, $compare );
			$posts_data    = $podcase_query->posts;
		}
		$community_badges    = ! empty( get_user_meta( $user_id, 'moc_community_badges', true ) ) ? get_user_meta( $user_id, 'moc_community_badges', true ) : array();
		$all_user_meta             = get_user_meta( $user_id );
		$firstname                 = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname                  = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name         = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $all_user_meta['nickname'][0];
		$user_nice_name            = get_the_author_meta( 'user_nicename', $user_id );
		$posts_url                 = ( 'post' === $post_type ) ? 'blog/?author=' . $user_nice_name : 'podcast/?author=' . $user_nice_name;
		if ( ! empty( $community_badges ) && is_array( $community_badges ) ) {
			$get_settings_badges = get_field( 'community_badges', 'option' );
			foreach ( $get_settings_badges as $get_settings_badge ) {
				if ( in_array( $get_settings_badge['community_badges_title'], $community_badges, true ) ) {
					$updated_community_badges_arr[] = $get_settings_badge['community_badges_title'];
				}
			}
		}
		if ( ! empty( $updated_community_badges_arr ) ) {
			if ( in_array( 'Ambassador', $updated_community_badges_arr, true ) ) {
				if( ! empty( $posts_data ) ) {
				?>
					<!-- Certification_content Start | Custom Class:- certification_section -->
					<div class="box_about_content box_content blog_contributons_section">
						<?php
						echo moc_load_html_view_profile_data( $post_type, $posts_data, $post_status );;
						?>
						<div class="show_more_btn">
							<a href="<?php echo site_url( $posts_url ); ?>"><?php esc_html_e( 'show more', 'marketingops' ); ?></a>
						</div>
					</div>
					<?php
				} else {
					if ( 'post' === $post_type ) {
						?>
						<div class="box_about_content box_content blog_contributons_section">
							<?php echo moc_empty_posts_data( 'Blog contribution', 'There are no drafted blog contributions to your profile.' ); ?>
						</div>
						<?php
					} else {
						?>
						<div class="box_about_content box_content blog_contributons_section podcasts_section">
							<?php echo moc_empty_posts_data( 'Podcasts', 'There are no drafted podcast to your profile !!' ); ?>
						</div>
						<?php
					}
				}
			}
		}
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists ( 'moc_empty_posts_data' ) ) {
	/**
	 * Function to return empty post data html.
	 */
	function moc_empty_posts_data( $title, $message ) {
		ob_start();
		?>
		<div class="title_with_btn">
			<h3><?php echo esc_html_e( $title ); ?></h3>
		</div>
		<p><?php echo $message; ?></p>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function is exists or not.
 */
if ( ! function_exists( 'moc_no_courses_found_html' ) ) {
	/**
	 * Function to return HTML for no courses found.
	 *
	 * @since 1.0.0
	 */
	function moc_no_courses_found_html() {
		ob_start();
		$placeholder_image = get_field( 'no_course_found_image', 'option' );
		?>
		<div class="moc_no_courses_found">
			<img src="<?php echo esc_attr( $placeholder_image ); ?>">
			<a href="<?php echo home_url( 'courses' ); ?>"><?php esc_html_e( 'Explore Courses', 'marketingops' ); ?></a>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_load_html_for_program_plans_table' ) ) {
	/**
	 * Function to load HTMl for program plans.
	 *
	 * @since 1.0.0
	 */
	function moc_load_html_for_program_plans_table() {
		ob_start();
		$matchmaking_program_plans = get_field( 'matchmaking_program_plans', 'option' );
		?>
		<div class="subscribe_table">
			<div class="table_heading">
				<h2 class="gradient_text" data-title-content="Select a matchmaking program offer"
					data-active-title-content="Select a matchmaking live offer"
					data-mob-title-content="Select a hiring program offer"
					data-mob-active-title-content="Select a hiring live offer">Select a matchmaking program offer</h2>
				<div class="heading_btn">
					<a href="#" class="btn black_btn" data-content="Show Agency Plans"
						data-active-content="Show Hiring Managers & Teams Plans">Show Agency Plans</a>
				</div>
			</div>
			<div class="table_head">
				<div class="head_colum global_cloum empty_colum">
					<a href="javascript:void(0);" class="tabbing_btn hide_text">123</a>
				</div>
				<div class="head_colum global_cloum free_colum btn_tab_active">
					<a href="javascript:void(0);" class="tabbing_btn active" data-src="free_colum">Promote</a>
				</div>
				<div class="head_colum global_cloum pro_colum btn_tab_active">
					<a href="javascript:void(0);" class="tabbing_btn" data-src="pro_colum">Matchmaking Light</a>
				</div>
				<div class="head_colum global_cloum lifetime_colum btn_tab_active">
					<a href="javascript:void(0);" class="tabbing_btn" data-src="lifetime_colum">Matchmaking Full</a>
				</div>
				<div class="head_colum global_cloum role_colum btn_tab_non_active">
					<a href="javascript:void(0);" class="tabbing_btn active" data-src="role_colum">One-off Roles</a>
				</div>
				<div class="head_colum global_cloum annual_colum btn_tab_non_active">
					<a href="javascript:void(0);" class="tabbing_btn" data-src="annual_colum">Annual Package</a>
				</div>
			</div>
			<div class="table_body">
				<?php
				if ( ! empty( $matchmaking_program_plans ) && is_array( $matchmaking_program_plans ) ) {
					foreach ( $matchmaking_program_plans as $matchmaking_program_plan ) {
						$heading_title                 = $matchmaking_program_plan['membership_offer_text'];
						$heading_decoration            = $matchmaking_program_plan['membership_offer_text_showcase'];
						$class                         = ( 'gradient' === $heading_decoration ) ? 'text gradient_text title_text' : 'text';
						$info_promote_column           = $matchmaking_program_plan['promote_column']['info_section'];
						$info_matchmaking_light_column = $matchmaking_program_plan['matchmaking_light_column']['info_section'];
						$info_matchmaking_full_column  = $matchmaking_program_plan['matchmaking_full_column']['info_section'];
						$info_one_off_roles_column     = $matchmaking_program_plan['one-off_roles_column']['info_section'];
						$info_annual_package_column    = $matchmaking_program_plan['annual_package_column']['info_section'];
						$inner_class                   = ( 'gradient' === $heading_decoration ) ? 'text gradient_text' : 'text';
						$text_promote                  = '';
						$html_promote                  = '';
						$text_light                    = '';
						$html_light                    = '';
						$text_full                     = '';
						$html_full                     = '';
						if ( 'text' === $info_promote_column ) {
							$text_promote = $matchmaking_program_plan['promote_column']['description'];
							$html_promote = '<span class="' . $inner_class . '">' . $text_promote . '</span>';
						} elseif ( 'dot' === $info_promote_column ) {
							$text_promote = '<span class="dot pink_dot"></span>';
							$html_promote = '<span class="' . $inner_class . '">' . $text_promote . '</span>';
						} else {
							$text_promote = $matchmaking_program_plan['promote_column']['choices_value'];
							$html_promote = '<span class="' . $inner_class . '">' . ucfirst( $text_promote ) . '</span>';
						}

						if ( 'text' === $info_matchmaking_light_column ) {
							$text_light = $matchmaking_program_plan['matchmaking_light_column']['description'];
							$html_light = '<span class="' . $inner_class . '">' . $text_light . '</span>';
						} elseif ( 'dot' === $info_matchmaking_light_column ) {
							$text_light = '<span class="dot pink_dot"></span>';
							$html_light = '<span class="' . $inner_class . '">' . $text_light . '</span>';
						} else {
							$text_light = $matchmaking_program_plan['matchmaking_light_column']['choices_value'];
							$html_light = '<span class="' . $inner_class . '">' . ucfirst( $text_light ) . '</span>';
						}

						if ( 'text' === $info_matchmaking_full_column ) {
							$text_full = $matchmaking_program_plan['matchmaking_full_column']['description'];
							$html_full = '<span class="' . $inner_class . '">' . $text_full . '</span>';
						} elseif ( 'dot' === $info_matchmaking_full_column ) {
							$text_full = '<span class="dot pink_dot"></span>';
							$html_full = '<span class="' . $inner_class . '">' . $text_full . '</span>';
						} else {
							$text_full = $matchmaking_program_plan['matchmaking_full_column']['choices_value'];
							$html_full = '<span class="' . $inner_class . '">' . ucfirst( $text_full ) . '</span>';
						}

						if ( 'text' === $info_one_off_roles_column ) {
							$text_one_off = $matchmaking_program_plan['one-off_roles_column']['description'];
							$html_one_off = '<span class="' . $inner_class . '">' . $text_one_off . '</span>';
						} elseif ( 'dot' === $info_one_off_roles_column ) {
							$text_one_off = '<span class="dot pink_dot"></span>';
							$html_one_off = '<span class="' . $inner_class . '">' . $text_one_off . '</span>';
						} else {
							$text_one_off = $matchmaking_program_plan['one-off_roles_column']['choices_value'];
							$html_one_off = '<span class="' . $inner_class . '">' . ucfirst( $text_one_off ) . '</span>';
						}

						if ( 'text' === $info_annual_package_column ) {
							$text_annual = $matchmaking_program_plan['annual_package_column']['description'];
							$html_annual = '<span class="' . $inner_class . '">' . $text_annual . '</span>';
						} elseif ( 'dot' === $info_annual_package_column ) {
							$text_annual = '<span class="dot pink_dot"></span>';
							$html_annual = '<span class="' . $inner_class . '">' . $text_annual . '</span>';
						} else {
							$text_annual = $matchmaking_program_plan['annual_package_column']['choices_value'];
							$html_annual = '<span class="' . $inner_class . '">' . ucfirst( $text_annual ) . '</span>';
						}
						
						?>
						<div class="table_tr odd">
							<div class="body_colum global_cloum title_tr_colum">
								<span class="<?php echo esc_attr( $class ); ?>"><?php echo wp_kses_post( $heading_title ); ?></span>
							</div>
							<div class="body_colum global_cloum free_colum btn_tab_content_active">
								<?php echo wp_kses_post( $html_promote ); ?>
							</div>
							<div class="body_colum global_cloum pro_colum btn_tab_content_active">
								<?php echo wp_kses_post( $text_light ); ?>
							</div>
							<div class="body_colum global_cloum lifetime_colum btn_tab_content_active">
								<?php echo wp_kses_post( $html_full ); ?>
							</div>
							<div class="body_colum global_cloum role_colum btn_tab_content_non_active">
								<?php echo wp_kses_post( $html_one_off ); ?>
							</div>
							<div class="body_colum global_cloum annual_colum btn_tab_content_non_active">
								<?php echo wp_kses_post( $html_annual ); ?>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_user_display_name' ) ) {
	/**
	 * User display name by user first and last name.
	 */
	function moc_user_display_name( $user_id ) {
		$post_author_name  = get_the_author_meta( 'display_name', $user_id );
		$all_user_meta     = get_user_meta( $user_id );
		$firstname         = ! empty( $all_user_meta['first_name'] ) ? $all_user_meta['first_name'][0] : '';
		$lastname          = ! empty( $all_user_meta['last_name'] ) ? $all_user_meta['last_name'][0] : '';
		$user_display_name = ! empty( $firstname ) ? $firstname . ' ' . $lastname : $post_author_name;
		return $user_display_name;
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_html_for_blog_username_section' ) ) {
	/**
	 * HTML for Display Name on blog post of user first and last name.
	 */
	function moc_html_for_blog_username_section( $user_id, $post_id ) {
		ob_start();
		$user_name             = moc_user_display_name( $user_id );
		$post_author_name      = get_the_author_meta( 'user_nicename', $user_id );;
		$user_link             = site_url(). '/profile/' . $post_author_name;
		$author_img_id         = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
		$author_img_url        = ! empty( $author_img_id ) ? wp_get_attachment_image_src( $author_img_id, 'full' ) : '';
		$post_author_image_url = ! empty( $author_img_url ) ? $author_img_url[0] : get_avatar_url( $user_id, array( 'size' => 96 ) );
		$post_author_image_url = ! empty( $post_author_image_url ) ? $post_author_image_url : $default_author_img;
		$blog_publish_date     = get_the_date( 'F d Y', $post_id );
		?>
		<div class="elementor-element elementor-element-e5bc3b0 post_info elementor-widget elementor-widget-post-info" id="moc_post_info">
			<div class="elementor-widget-container">
				<ul class="elementor-inline-items elementor-icon-list-items elementor-post-info">
					<li class="elementor-icon-list-item elementor-repeater-item-8bf4423 elementor-inline-item" itemprop="author">
						<a href="<?php echo esc_url( $user_link ); ?>">
							<span class="elementor-icon-list-icon">
								<img class="elementor-avatar" src="<?php echo esc_url( $post_author_image_url ); ?>" alt="Amara Omoregie">
							</span>
							<span class="elementor-icon-list-text elementor-post-info__item elementor-post-info__item--type-author"><?php echo esc_html( $user_name ); ?> </span>
						</a>
					</li>
					<li class="elementor-icon-list-item elementor-repeater-item-6e4827c elementor-inline-item" itemprop="datePublished">
						<a href="/2022/10/16/">
							<span class="elementor-icon-list-text elementor-post-info__item elementor-post-info__item--type-date">
								<span class="elementor-post-info__item-prefix">·</span> <?php echo esc_html( $blog_publish_date ); ?>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}
/**
 * check function exists or not.
 */
if ( ! function_exists( 'moc_add_review_form_after_course_complete' ) ) {
	/**
	 * Function to return HTML of course review form.
	 *
	 * @since 1.0.0
	 * @param integer $course_id This variable holds the course id.
	 * @param integer $user_id This variable holds the user id.
	 */
	function moc_add_review_form_after_course_complete( $course_id, $user_id ) {
		ob_start();
		$product_query = moc_posts_by_meta_key_value( 'product', 1, 4, '_related_course', $course_id, 'LIKE' );
		$product_data  = $product_query->posts;
		$product_id    = $product_data[0];
		$comments      = get_comments( array (
			'post_id'     => (int) $product_id,
			'user_id'     => (int) $user_id,
		) );
		if ( empty( $comments ) ) {
			?>
			<div class="courses_review moc_course_review" data-action="add"  data-commentid="">
				<div class="loader_bg">
					<div class="loader"></div>  
				</div>
				<div class="review_box">
					<h3><?php esc_html_e( 'Please leave a review', 'marketingops' ); ?></h3>
					<form action="" method="">
						<div class="review_box_content woocommerce">
							<h4><?php esc_html_e( 'How would you rate this course?', 'marketingops' ); ?></h4>
							<div class="rating_star moc_course_rating_stars">
								<div class="star-rating__wrap">
									<?php
									for( $i=5; $i >=1; $i-- ) {
										?>
											<input class="star_input" id="star-rating-<?php echo esc_attr( $i ); ?>" type="radio" name="rating" value="<?php echo esc_attr( $i ); ?>">
											<label class="star star-<?php echo esc_attr( $i ); ?>" for="star-rating-<?php echo esc_attr( $i ); ?>" title="<?php echo esc_attr( $i ); ?> out of <?php echo esc_attr( $i ); ?> stars"></label>
										<?php
									}
									?>
								</div>
							</div>
						</div>
						<div class="review_box_btn_textarea">
							<textarea class="moc_comment_content" placeholder="Say a few words about your experience"></textarea>
							<p class="form-submit">
								<input name="submit" type="submit" id="submit" class="submit moc_submit_course_review" value="Submit a review">
							</p>
						</div>
					</form>
				</div>
			</div>
			<?php
		} else {
			echo moc_html_for_course_review_listings( $product_id, $user_id, 'course' );
		}
		return ob_get_clean();
	}
}
/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_get_client_ip' ) ) {
	/**
	 * Function to get the client IP address
	 */
	function moc_get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
}

/**
 * Check function exists or not.
 */
if ( ! function_exists( 'moc_html_for_course_review_listings' ) ) {
	/**
	 * Function to return HTML for course reviews listings.
	 *
	 * @since 1.0.0
	 * @param integer $course_id  This variable holds the value of course ID.
	 * @param integer $product_id This variable holds the value of product ID.
	 * @param integer $user_id    This variable holds the value of user ID.
	 */
	function moc_html_for_course_review_listings( $product_id, $user_id, $type ) {
		ob_start();
		
		if ( 'course' === $type ) {
			$args                      = array (
				'post_id'     => (int) $product_id,
				'user_id'     => (int) $user_id,
			);
			$course_comments = get_comments( $args );
			$course_comment  = $course_comments[0];
			
			if ( ! empty( $course_comment ) ) {
				$comment_id            = $course_comment->comment_ID;
				$comment_post_id       = $course_comment->comment_post_ID;
				$comment_author        = $course_comment->comment_author;
				$comment_author_email  = $course_comment->comment_author_email;
				$comment_author_url    = $course_comment->comment_author_url;
				$comment_date_gmt      = $course_comment->comment_date_gmt;
				$formatted_date        = date( "F j, Y", strtotime( $comment_date_gmt ) );
				$comment_content       = $course_comment->comment_content;
				$comment_approved      = $course_comment->comment_approved;
				$comment_approved      = $course_comment->comment_approved;
				$comment_user_id       = $course_comment->user_id;
				$ratings_value         = (int) get_comment_meta( $comment_id, 'rating', true );
				?>
				<div id="reviews" class="courses_review moc_course_review moc_product_review_edit" data-action="edit" data-commentid="<?php echo $comment_id; ?>">
					<div class="loader_bg">
						<div class="loader"></div>
					</div>
					<div class="review_box" id="comments">
						<h3><?php esc_html_e( 'Your Reviews', 'marketingops' ); ?></h3>
						<div class="review_box_content woocommerce moc_rating_star_default">
							<div class="rating_star">
								<div class="star-rating__wrap">
									<?php
									for( $i=5; $i >=1; $i-- ) {
										$checked_value = ( $i === $ratings_value ) ? 'checked' : '';
										?>
										<input class="star_input" id="normal-star-rating-<?php echo esc_attr( $i ); ?>" type="radio" name="rating" value="<?php echo esc_attr( $i ); ?>" <?php echo esc_attr( $checked_value ); ?>>
											<label class="star star-<?php echo esc_attr( $i ); ?>" for="normal-star-rating-<?php echo esc_attr( $i ); ?>" title="<?php echo esc_attr( $i ); ?> out of <?php echo esc_attr( $i ); ?> stars"></label>
										<?php
									}
									?>
								</div>
							</div>
						</div>
						<div class="customer_review">
							<!-- Comment List -->
							<ol class="commentlist">
								<!-- Review Loop | 'author_review' class added -->
								<li class="comment even author_review">
									<div class="comment_container">
										<div class="comment-text">
											<p class="meta">
												<strong class="woocommerce-review__author"><?php echo esc_html( $comment_author ); ?></strong>
												<span class="woocommerce-review__dash">-</span>
												<time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( $comment_date_gmt ); ?>"><?php echo esc_html( $formatted_date ); ?></time>
											</p>
											<div class="description">
												<p><?php echo wp_kses_post( $comment_content ); ?></p>
											</div>
											<div class="edit_icons">
												<a href="javascript:void(0);" class="edit_icon moc_edit_icon">
													<span class="svg_icon">
														<svg width="16" height="17" viewBox="0 0 16 17" fill="none"
															xmlns="http://www.w3.org/2000/svg">
															<path
																d="M11.6524 1.60283C12.534 0.721257 13.9572 0.721257 14.8388 1.60283C15.7204 2.4844 15.7204 3.90766 14.8388 4.78923L4.74854 14.8795L0.5 15.9416L1.56213 11.6931L11.6524 1.60283Z"
																stroke="#45474F" stroke-linecap="round" stroke-linejoin="round"></path>
														</svg>
													</span>
												</a>
											</div>
										</div>
									</div>
								</li>
							</ol>
						</div>
						<h3><?php esc_html_e( 'Please Add a review', 'marketingops' ); ?></h3>
						<form action="" method="">
							<div class="review_box_content woocommerce">
								<h4><?php esc_html_e( 'Your Rating *', 'marketingops' ); ?></h4>
								<div class="rating_star moc_course_rating_stars">
									<div class="star-rating__wrap">
										<?php
										for( $i=5; $i >=1; $i-- ) {
											$checked_value = ( $i === $ratings_value ) ? 'checked' : '';
											?>
											<input class="star_input" id="star-rating-<?php echo esc_attr( $i ); ?>" type="radio" name="rating" value="<?php echo esc_attr( $i ); ?>" <?php echo esc_attr( $checked_value ); ?>>
											<label class="star star-<?php echo esc_attr( $i ); ?>" for="star-rating-<?php echo esc_attr( $i ); ?>" title="<?php echo esc_attr( $i ); ?> out of <?php echo esc_attr( $i ); ?> stars"></label>
											<?php
										}
										?>
									</div>
								</div>
							</div>
							<div class="review_box_btn_textarea">
								<h4><?php esc_html_e( 'Your Review *', 'marketingops' ); ?></h4>
								<textarea class="moc_comment_content" placeholder="Say a few words about your experience"><?php echo wp_kses_post( $comment_content )?></textarea>
								<p class="form-submit">
									<input name="submit" type="submit" id="submit" class="submit moc_submit_course_review" value="Submit a review">
								</p>
							</div>
						</form>
					</div>
				</div>
				<?php
			}
		} else {
			$paged             = filter_input( INPUT_GET, 'comment-page', FILTER_SANITIZE_NUMBER_INT );
			$product_permalink = get_the_permalink( $product_id );
			$paged             = ( ! empty( $paged ) ) ? (int) $paged : 1;
			$args              = array (
				'post_id'         => (int) $product_id,
				'paged'           => $paged,
				'number'          => get_option('comments_per_page'),
			);
			$course_comments = get_comments( $args );
			$total_comments_args = array (
				'post_id'     => (int) $product_id,
				'count'       => true
			);
			$total_comments  = get_comments( $total_comments_args );
			$wc_product      = wc_get_product( $product_id );
			if ( ! empty( $wc_product ) ) {
				$rating          = (int) ceil( $wc_product->get_average_rating() );
				// if($_SERVER["REMOTE_ADDR"]=='49.36.71.149'){
				// 	debug( $total_comments );
				// 	die;
				// }
				if ( ! empty( $course_comments ) ) {
						?>
						<div id="reviews" class="courses_review moc_product_reviews moc_product_review_edit">
							<div class="loader_bg">
								<div class="loader"></div>
							</div>
							<div class="review_box" id="comments">
								<h3><?php esc_html_e( 'Customers Reviews', 'marketingops' ); ?></h3>
								<div class="review_box_content woocommerce moc_rating_star_default">
									<div class="rating_star">
										<div class="star-rating__wrap">
											<?php
											for( $i=5; $i >=1; $i-- ) {
												$active_class = '';
												if ( $i <= $rating ) {
													$active_class = 'active'; 
												}
												$checked_value = ( $i === $rating ) ? 'checked' : '';
												?>
												<input class="star_input" id="normal-star-rating-<?php echo esc_attr( $i ); ?>" type="radio" name="rating" value="<?php echo esc_attr( $i ); ?>" <?php echo esc_attr( $checked_value ); ?>>
												<label class="star star-<?php echo esc_attr( $i ); ?> <?php echo esc_attr( $active_class ); ?>" for="normal-star-rating-<?php echo esc_attr( $i ); ?>" title="<?php echo esc_attr( $i ); ?> out of <?php echo esc_attr( $i ); ?> stars"></label>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<div class="customer_review">
									<!-- Comment List -->
									<ol class="commentlist">
										<!-- Review Loop | 'author_review' class added -->
										<?php
										foreach ( $course_comments as $course_comment ) {
											$comment_id            = $course_comment->comment_ID;
											$comment_post_id       = $course_comment->comment_post_ID;
											$comment_author        = $course_comment->comment_author;
											$comment_author_email  = $course_comment->comment_author_email;
											$comment_author_url    = $course_comment->comment_author_url;
											$comment_date_gmt      = $course_comment->comment_date_gmt;
											$formatted_date        = date( "F j, Y", strtotime( $comment_date_gmt ) );
											$comment_content       = $course_comment->comment_content;
											$comment_approved      = $course_comment->comment_approved;
											$comment_approved      = $course_comment->comment_approved;
											$comment_user_id       = $course_comment->user_id;
											$ratings_value         = (int) get_comment_meta( $comment_id, 'rating', true );
											$active_star           = '';

											?>
											<li class="comment even author_review">
												<div class="comment_container">
												<div class="review_box_content woocommerce moc_rating_star_default">
													<div class="rating_star">
														<div class="star-rating__wrap">
															<?php
															for( $j=5; $j >=1; $j-- ) {
																$checked_value = ( $j === $ratings_value ) ? 'checked' : '';
																if ( $j <= $ratings_value ) {
																	$active_star = 'active'; 
																}
																?>
																<input class="star_input" id="user-normal-star-rating-<?php echo esc_attr( $j ); ?>" type="radio" name="rating" value="<?php echo esc_attr( $j ); ?>" <?php echo esc_attr( $checked_value ); ?>>
																<label class="star star-<?php echo esc_attr( $j ); ?> <?php echo esc_attr( $active_star ); ?>" for="user-normal-star-rating-<?php echo esc_attr( $j ); ?>" title="<?php echo esc_attr( $j ); ?> out of <?php echo esc_attr( $j ); ?> stars"></label>
																<?php
															}
															?>
														</div>
													</div>
												</div>
													<div class="comment-text">
														<p class="meta">
															<strong class="woocommerce-review__author"><?php echo esc_html( $comment_author ); ?></strong>
															<span class="woocommerce-review__dash">-</span>
															<time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( $comment_date_gmt ); ?>"><?php echo esc_html( $formatted_date ); ?></time>
														</p>
														<div class="description">
															<p><?php echo wp_kses_post( $comment_content ); ?></p>
														</div>
													</div>
												</div>
											</li>
											<?php
										}
										?>
									</ol>
									<!-- Pagination -->
								</div>
							</div>
						</div>
					<?php
					if ( count(  $course_comments ) < $total_comments ) {
						$num_pages = $total_comments / get_option('comments_per_page');
						$num_pages = round( $num_pages );
						$num_pages = (int) $num_pages;
						$next_page = $paged + 1;
						$prev_page = $paged - 1;
						?>
						<div class="pagination_container custom_pagination">
							<nav class="blog-directory-pagination">
								<ul>
									<?php
									if ( $paged !== 1 ) {
										?>
										<li><a href="<?php echo $product_permalink; ?>?comment-page=<?php echo $prev_page; ?>/#comments" class="arrowleft" data-page="<?php echo esc_attr( $paged ); ?>">←</a></li>
										<?php
									}
									for( $i=1; $i <= $num_pages; $i++ ) {
										$active_html = ( $i === $paged ) ? '<span class="current" data-page="1">' : '';
										if ( empty( $active_html ) ) {
											?>
											<li>
												<a href="<?php echo $product_permalink; ?>?comment-page=<?php echo $i; ?>/#comments" data-page="<?php echo esc_attr( $i ); ?>">
													<?php echo $active_html; ?><?php echo esc_html( $i ); ?>
												</a>
											</li>
											<?php
										} else {
											?>
											<li><?php echo $active_html; ?><?php echo esc_html( $i ); ?></li>
											<?php
										}
									}
									if ( $num_pages !== $paged ) {
										?>
										<li><a href="<?php echo $product_permalink; ?>?comment-page=<?php echo $next_page; ?>/#comments" class="arrowright" data-page="<?php echo esc_attr( $paged ); ?>">→</a></li>
										<?php
									}
									?>
								</ul>
							</nav>
						</div>
						<?php
					}
					?>
					<?php
				}	
			}
			

		}	
		return ob_get_clean();
	}
}

/**
 * Check if function is exists or not.
 */
if ( ! function_exists( 'moc_update_syncari_data_tabels' ) ) {
	/**
	 * Function to update and insert in custom tabels
	 * @since 1.0.0
	 * @param integer $user_id  This variable holds the value of user_id.
	 * @param integer $key      This variable holds the key of table index.
	 * @param integer $values   This variable holds the value of table index.
	 */
	function moc_update_syncari_data_tabels( $user_id, $key_value_arr ) {
		global $wpdb;
		$user_id      = (int) $user_id;
		$user_query   = $wpdb->get_results( $wpdb->prepare( 'SELECT `user_id` FROM ' . $wpdb->prefix . 'syncari_data' ), ARRAY_A );
		$user_ids     = array();
		foreach ( $user_query as $get_user_id ) {
			$user_ids[] = (int) $get_user_id['user_id'];
		}
		if ( ! empty( $user_id ) && 0 !== $user_id ) {
			if ( in_array( $user_id, $user_ids, true ) ) {
				$wpdb->update(
					$wpdb->prefix . 'syncari_data',
					$key_value_arr,
					array( 
						'user_ID' => $user_id,
					)
				);
			} else {
				$wpdb->insert(
					$wpdb->prefix . 'syncari_data', 
					$key_value_arr,
				);
			}
		}
	}
}

/**
 * Check if function is exists or not.
 */
if ( ! function_exists( 'mops_member_only_button_html' ) ) {
	/**
	 * Generate the member restricted button html.
	 *
	 * @param string $container_class Button container class.
	 * @param string $enable_container Should the button container show up or not.
	 * @param string $button_text Button text.
	 * @param string $show_arrow_icon Should the arrow icon show up after the button text.
	 * @param string $open_in_new_tab Should the link open in new tab or not.
	 * @param string $button_class Button class attribute.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function mops_member_only_button_html( $container_class, $enable_container, $button_text, $show_arrow_icon, $open_in_new_tab, $button_link, $button_class ) {
		$user_memberships = moc_get_membership_plan_slug();

		if ( false === $user_memberships ) {
			$button_class .= 'is-unregistered-member open-restriction-modal member-only-sessions-registration-btn';
			$button_link   = '#';
		} elseif ( ! empty( $user_memberships ) && is_array( $user_memberships ) ) {
			if ( 1 === count( $user_memberships ) && in_array( 'free-membership', $user_memberships, true ) ) {
				$button_class .= 'is-free-member member-only-sessions-registration-btn';
			} else{
				$button_class .= 'is-paid-member member-only-sessions-registration-btn';
			}
		}

		$button_html = ''; // Prepare the html now.

		if ( ! empty( $enable_container ) && 'yes' === $enable_container ) {
			$button_html .= '<div class="member-only-button-container ' . $container_class . '">';
		}

		$button_html .= '<a target="' . $open_in_new_tab . '" class="' . $button_class . '" title="' . $button_text . '" href="' . $button_link . '">';
		$button_html .= '<span class="text">' . $button_text . '</span>';

		if ( ! empty( $show_arrow_icon ) && 'yes' === $show_arrow_icon ) {
			$button_html .= '<span class="svg"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="#fff"><g clip-path="url(#clip0_446_965)"><path d="M14.7859 0.74192C14.4643 0.729551 14.1659 0.913544 14.0345 1.20731C13.9015 1.50109 13.9587 1.84433 14.1814 2.07935L16.6135 4.70782H1.30494C1.0189 4.70318 0.754506 4.85316 0.610713 5.10055C0.465374 5.34639 0.465374 5.65253 0.610713 5.89837C0.754506 6.14575 1.0189 6.29573 1.30494 6.29109H16.6135L14.1814 8.91957C13.9835 9.12675 13.9139 9.42361 13.9974 9.69728C14.0809 9.97096 14.3051 10.1781 14.5834 10.24C14.8632 10.3018 15.1539 10.2075 15.3441 9.99569L19.5017 5.49946L15.3441 1.00322C15.2018 0.845513 14.9993 0.749651 14.7859 0.74192Z" fill="#fff"></path></g><defs><clipPath id="clip0_446_965"><rect width="19" height="10" fill="white" transform="translate(0.5 0.5)"></rect></clipPath></defs></svg></span>';
		}

		$button_html .= '</a>';

		if ( ! empty( $enable_container ) && 'yes' === $enable_container ) {
			$button_html .= '</div>';
		}

		return $button_html;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_strategists_custom_post_type_and_category_taxonomy' ) ) {
	/**
	 * Function to register strategists custom post type and category taxonomy.
	 *
	 * @since 1.0.0
	 */
	function moc_strategists_custom_post_type_and_category_taxonomy() {
		register_post_type( 'strategists', array(
			'label'               => __( 'Strategists', 'marketingops' ),
			'description'         => __( 'Its custom post type for mops strategists.', 'marketingops' ),
			'labels'              => array(
				'name'                  => _x( 'Strategists', 'Strategist General Name', 'marketingops' ),
				'singular_name'         => _x( 'Strategist', 'Strategist Singular Name', 'marketingops' ),
				'menu_name'             => __( 'Strategists', 'marketingops' ),
				'name_admin_bar'        => __( 'Strategists', 'marketingops' ),
				'archives'              => __( 'Strategist Archives', 'marketingops' ),
				'attributes'            => __( 'Strategist Attributes', 'marketingops' ),
				'parent_item_colon'     => __( 'Parent Strategist:', 'marketingops' ),
				'all_items'             => __( 'All Strategists', 'marketingops' ),
				'add_new_item'          => __( 'Add New Strategist', 'marketingops' ),
				'add_new'               => __( 'Add New', 'marketingops' ),
				'new_item'              => __( 'New Strategist', 'marketingops' ),
				'edit_item'             => __( 'Edit Strategist', 'marketingops' ),
				'update_item'           => __( 'Update Strategist', 'marketingops' ),
				'view_item'             => __( 'View Strategist', 'marketingops' ),
				'view_items'            => __( 'View Strategists', 'marketingops' ),
				'search_items'          => __( 'Search Strategist', 'marketingops' ),
				'not_found'             => __( 'Not found', 'marketingops' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'marketingops' ),
				'featured_image'        => __( 'Featured Image', 'marketingops' ),
				'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
				'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
				'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
				'insert_into_item'      => __( 'Insert into Strategist', 'marketingops' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Strategist', 'marketingops' ),
				'items_list'            => __( 'Strategists list', 'marketingops' ),
				'items_list_navigation' => __( 'Strategists list navigation', 'marketingops' ),
				'filter_items_list'     => __( 'Filter Strategists list', 'marketingops' ),
			),
			'supports'            => array( 'title', 'editor', 'author', 'revisions' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 65,
			'menu_icon'           => 'dashicons-businessperson',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		) );

		// Register taxonomy, strategists_cat.
		register_taxonomy( 'strategists_cat', array( 'strategists' ), array(
			'labels'            => array(
				'name'                       => _x( 'Strategist Categories', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Strategist Category', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Strategist Categories', 'marketingops' ),
				'all_items'                  => __( 'All Strategist Categories', 'marketingops' ),
				'parent_item'                => __( 'Parent Strategist Category', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Strategist Category:', 'marketingops' ),
				'new_item_name'              => __( 'New Strategist Category Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Strategist Category', 'marketingops' ),
				'edit_item'                  => __( 'Edit Strategist Category', 'marketingops' ),
				'update_item'                => __( 'Update Strategist Category', 'marketingops' ),
				'view_item'                  => __( 'View Strategist Category', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Strategist Categories with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Strategist Categories', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Strategist Categories', 'marketingops' ),
				'search_items'               => __( 'Search Strategist Categories', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Strategist Categories', 'marketingops' ),
				'items_list'                 => __( 'Strategist Categories list', 'marketingops' ),
				'items_list_navigation'      => __( 'Strategist Categories list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_templates_custom_post_type_and_category_taxonomy' ) ) {
	/**
	 * Function to register templates custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_templates_custom_post_type_and_category_taxonomy() {
		register_post_type(
			'template',
			array(
				'label'               => __( 'Project Templates', 'marketingops' ),
				'description'         => __( 'Its custom post type for marketingops project templates.', 'marketingops' ),
				'labels'              => array(
					'name'                  => _x( 'Marketing Ops Templates', 'Template General Name', 'marketingops' ),
					'singular_name'         => _x( 'Project Template', 'Template Singular Name', 'marketingops' ),
					'menu_name'             => __( 'Project Templates', 'marketingops' ),
					'name_admin_bar'        => __( 'Project Templates', 'marketingops' ),
					'archives'              => __( 'Project Template Archives', 'marketingops' ),
					'attributes'            => __( 'Project Template Attributes', 'marketingops' ),
					'parent_item_colon'     => __( 'Parent Project Template:', 'marketingops' ),
					'all_items'             => __( 'All Project Templates', 'marketingops' ),
					'add_new_item'          => __( 'Add New Project Template', 'marketingops' ),
					'add_new'               => __( 'Add New', 'marketingops' ),
					'new_item'              => __( 'New Project Template', 'marketingops' ),
					'edit_item'             => __( 'Edit Project Template', 'marketingops' ),
					'update_item'           => __( 'Update Project Template', 'marketingops' ),
					'view_item'             => __( 'View Project Template', 'marketingops' ),
					'view_items'            => __( 'View Project Templates', 'marketingops' ),
					'search_items'          => __( 'Search Project Template', 'marketingops' ),
					'not_found'             => __( 'No project template found', 'marketingops' ),
					'not_found_in_trash'    => __( 'No project template found in trash', 'marketingops' ),
					'featured_image'        => __( 'Featured Image', 'marketingops' ),
					'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
					'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
					'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
					'insert_into_item'      => __( 'Insert into Project Template', 'marketingops' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Project Template', 'marketingops' ),
					'items_list'            => __( 'Project templates list', 'marketingops' ),
					'items_list_navigation' => __( 'Project templates list navigation', 'marketingops' ),
					'filter_items_list'     => __( 'Filter Project Templates list', 'marketingops' ),
				),
				'supports'            => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail' ),
				'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 65,
				'menu_icon'           => 'dashicons-media-document',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'rewrite'             => array( 'slug' => 'templates' ),
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest'        => true,
			)
		);
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_conference_vault_custom_post_type_and_category_taxonomy' ) ) {
	/**
	 * Function to register templates custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_conference_vault_custom_post_type_and_category_taxonomy() {
		register_post_type(
			'conference_vault',
			array(
				'label'               => __( 'Member Vault', 'marketingops' ),
				'description'         => __( 'Its custom post type for marketingops Member Vault.', 'marketingops' ),
				'labels'              => array(
					'name'                  => _x( 'Member Vault', 'Template General Name', 'marketingops' ),
					'singular_name'         => _x( 'Member Vault', 'Template Singular Name', 'marketingops' ),
					'menu_name'             => __( 'Member Vault', 'marketingops' ),
					'name_admin_bar'        => __( 'Member Vault', 'marketingops' ),
					'archives'              => __( 'Member Vault Archives', 'marketingops' ),
					'attributes'            => __( 'Member Vault Attributes', 'marketingops' ),
					'parent_item_colon'     => __( 'Parent Member Vault:', 'marketingops' ),
					'all_items'             => __( 'All Member Vault', 'marketingops' ),
					'add_new_item'          => __( 'Add New Member Vault Video', 'marketingops' ),
					'add_new'               => __( 'Add New Video', 'marketingops' ),
					'new_item'              => __( 'New Member Vault Video', 'marketingops' ),
					'edit_item'             => __( 'Edit Member Vault Video', 'marketingops' ),
					'update_item'           => __( 'Update Member Vault Video', 'marketingops' ),
					'view_item'             => __( 'View Member Vault Video', 'marketingops' ),
					'view_items'            => __( 'View Member Vault Videos', 'marketingops' ),
					'search_items'          => __( 'Search Member Vault Video', 'marketingops' ),
					'not_found'             => __( 'No Member Vault Video found', 'marketingops' ),
					'not_found_in_trash'    => __( 'No Member Vault Video found in trash', 'marketingops' ),
					'featured_image'        => __( 'Featured Image', 'marketingops' ),
					'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
					'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
					'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
					'insert_into_item'      => __( 'Insert into Member Vault Video', 'marketingops' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Member Vault Video', 'marketingops' ),
					'items_list'            => __( 'Member Vault Videos list', 'marketingops' ),
					'items_list_navigation' => __( 'Member Vault Videos list navigation', 'marketingops' ),
					'filter_items_list'     => __( 'Filter Member Vault Videos list', 'marketingops' ),
				),
				'supports'            => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail' ),
				'hierarchical'        => true,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 65,
				'menu_icon'           => 'dashicons-format-video',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'rewrite'             => array( 'slug' => 'conference_vault' ),
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest'        => true,
			)
		);

		// Register taxonomy, pillar.
		register_taxonomy( 'pillar', array( 'conference_vault' ), array(
			'labels'            => array(
				'name'                       => _x( 'Pillars', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Pillar', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Pillars', 'marketingops' ),
				'all_items'                  => __( 'All Pillars', 'marketingops' ),
				'parent_item'                => __( 'Parent Pillar', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Pillar:', 'marketingops' ),
				'new_item_name'              => __( 'New Pillar Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Pillar', 'marketingops' ),
				'edit_item'                  => __( 'Edit Pillar', 'marketingops' ),
				'update_item'                => __( 'Update Pillar', 'marketingops' ),
				'view_item'                  => __( 'View Pillar', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Pillarss with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Pillarss', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Pillarss', 'marketingops' ),
				'search_items'               => __( 'Search Pillarss', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Pillarss', 'marketingops' ),
				'items_list'                 => __( 'Pillarss list', 'marketingops' ),
				'items_list_navigation'      => __( 'Pillars list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );

		// Register taxonomy, conference.
		register_taxonomy( 'conference', array( 'conference_vault' ), array(
			'labels'            => array(
				'name'                       => _x( 'Conferences', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Conference', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Conferences', 'marketingops' ),
				'all_items'                  => __( 'All Conferences', 'marketingops' ),
				'parent_item'                => __( 'Parent Conference', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Conference:', 'marketingops' ),
				'new_item_name'              => __( 'New Conference Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Conference', 'marketingops' ),
				'edit_item'                  => __( 'Edit Conference', 'marketingops' ),
				'update_item'                => __( 'Update Conference', 'marketingops' ),
				'view_item'                  => __( 'View Conference', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Conferences with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Conferences', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Conferences', 'marketingops' ),
				'search_items'               => __( 'Search Conferences', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Conferences', 'marketingops' ),
				'items_list'                 => __( 'Conferences list', 'marketingops' ),
				'items_list_navigation'      => __( 'Conferences list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );

		// Register taxonomy, skill level.
		register_taxonomy( 'conference_skill_level', array( 'conference_vault' ), array(
			'labels'            => array(
				'name'                       => _x( 'Skill Levels', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Skill Level', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Skill Levels', 'marketingops' ),
				'all_items'                  => __( 'All Skill Levels', 'marketingops' ),
				'parent_item'                => __( 'Parent Skill Level', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Skill Level:', 'marketingops' ),
				'new_item_name'              => __( 'New Skill Level Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Skill Level', 'marketingops' ),
				'edit_item'                  => __( 'Edit Skill Level', 'marketingops' ),
				'update_item'                => __( 'Update Skill Level', 'marketingops' ),
				'view_item'                  => __( 'View Skill Level', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Skill Levels with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Skill Levels', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Skill Levels', 'marketingops' ),
				'search_items'               => __( 'Search Skill Levels', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Skill Levels', 'marketingops' ),
				'items_list'                 => __( 'Skill Levels list', 'marketingops' ),
				'items_list_navigation'      => __( 'Skill Levels list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_strategists_box_inner_html' ) ) {
	/**
	 * Function to return the inner html of the strategists on the listing page.
	 *
	 * @param $strategist_id int Strategist post ID.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_strategists_box_inner_html( $strategist_id = -1 ) {
		// Return, if the strategist ID is -1.
		if ( -1 === $strategist_id ) {
			return;
		}

		$name               = get_the_title( $strategist_id );
		$user_id            = get_post_meta( $strategist_id, 'member', true );
		$company_name       = get_post_meta( $strategist_id, 'company_name', true );
		$company_logo       = get_post_meta( $strategist_id, 'company_logo', true );
		$company_logo       = ( ! empty( $company_logo ) ) ? wp_get_attachment_image_url( $company_logo ) : '';
		$role               = get_post_meta( $strategist_id, 'role', true );
		$categories         = wp_get_object_terms( $strategist_id, 'strategists_cat' );
		$first_cat          = ( ! empty( $categories[0] ) ) ? $categories[0] : '';
		$default_author_img = get_field( 'moc_user_default_image', 'option' );
		$uploads_dir        = wp_upload_dir();
		$user_avtar_id      = ! empty( get_user_meta( $user_id, 'wp_user_avatar', true ) ) ? get_user_meta( $user_id, 'wp_user_avatar', true ) : '';
		$user_image_url     = ! empty( $user_avtar_id ) ? get_post_meta( $user_avtar_id, '_wp_attached_file', true ) : '';
		$user_image_url     = ! empty( $user_image_url ) ?  $uploads_dir['baseurl'] . '/' . $user_image_url : $default_author_img;
		$profile_picture    = get_post_meta( $strategist_id, 'profile_picture', true );
		$profile_picture    = ( ! empty( $profile_picture ) ) ? wp_get_attachment_image_url( $profile_picture ) : $user_image_url;
		$member_position    = '';

		if ( ! empty( $company_name ) && ! empty( $role ) ) {
			$member_position = "{$company_name} • {$role}";
		} elseif ( ! empty( $company_name ) ) {
			$member_position = $company_name;
		} elseif ( ! empty( $role ) ) {
			$member_position = $role;
		}

		// Prepare the html now.
		ob_start();
		?>
		<div class="box-inner" data-sid="<?php echo esc_attr( $strategist_id ); ?>" data-uid="<?php echo esc_attr( $user_id ); ?>">
			<div class="member-img">
				<?php if ( ! empty( $profile_picture ) ) { ?>
					<div class="m-img"><img alt="<?php echo esc_html( sprintf( __( '%1$s-user-image', 'marketingops' ), sanitize_title( $name ) ) ); ?>" src="<?php echo esc_url( $profile_picture ); ?>"></div>
				<?php } ?>

				<?php if ( ! empty( $company_logo ) ) { ?>
					<div class="m-logo"><img alt="<?php echo esc_html( sprintf( __( '%1$s-company-logo', 'marketingops' ), sanitize_title( $company_name ) ) ); ?>" src="<?php echo esc_url( $company_logo ); ?>"></div>
				<?php } ?>
			</div>
			<div class="m-content">
				<h2><?php echo wp_kses_post( $name ); ?></h2>
				<p><?php echo wp_kses_post( $member_position ); ?></p>
				<div class="btn-text-change">
					<?php if ( ! empty( $first_cat ) ) { ?>
						<a href="<?php echo esc_url( sprintf( __( '/strategists/?cat=%1$s', 'marketingops' ), $first_cat->slug ) ); ?>" title="<?php echo esc_html( sprintf( __( 'Filter the strategists by %1$s', 'marketingops' ), $first_cat->name ) ); ?>"><?php echo esc_html( $first_cat->name ); ?></a>
					<?php } ?>

					<?php if ( 1 < count( $categories ) ) { ?>
						<a href="<?php echo esc_url( get_permalink( $strategist_id ) ); ?>">+<?php echo esc_html( count( $categories ) - 1 ); ?></a>
					<?php } ?>
					<div class="h-gradiant-btn">
						<a href="<?php echo esc_url( get_permalink( $strategist_id ) ); ?>"><?php esc_html_e( 'View strategist', 'marketingops' ); ?> <img src="/wp-content/uploads/2023/08/icons8_right_arrow_1-1.png" alt="icons8 right arrow" title="<?php echo esc_html( sprintf( __( 'View Strategist, %1$s', 'marketingops' ), $name ) ); ?>"></a>
					</div>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_template_card_box_html' ) ) {
	/**
	 * Function to return the inner html of the templates on the listing page.
	 *
	 * @param $template_id int Template post ID.
	 * @return string
	 * @since 1.0.0
	 */
	function moc_template_card_box_html( $template_id = -1 ) {
		// Return, if the template ID is -1.
		if ( -1 === $template_id ) {
			return;
		}

		$name           = get_the_title( $template_id );
		$icon_svg       = get_field( 'template_icon_svg', $template_id );
		$file_id        = get_field( 'template_file', $template_id );
		$file_url       = wp_get_attachment_url( $file_id );
		$likes_data     = get_post_meta( $template_id, 'template_likes', true );
		$likes_data     = ( empty( $likes_data ) || ! is_array( $likes_data ) ) ? array() : $likes_data;
		$like_active    = ( in_array( get_current_user_id(), $likes_data ) ) ? true : false;
		$download_count = get_post_meta( $template_id, 'template_download', true );
		$download_count = ( empty( $download_count ) ) ? 0 : (int) $download_count;
		$details_images = get_field( 'template_details_images', $template_id );

		// Prepare the html now.
		ob_start();
		?>
		<div class="cardBox card [ is-collapsed ]>" data-file="<?php echo esc_url( $file_url ); ?>" data-tid="<?php echo esc_attr( $template_id ); ?>">
			<?php if ( ! empty( $icon_svg ) ) { ?>
				<div class="card__inner [ js-expander ]">
					<div class="cardboximage">
						<div class="cardboximageinner"><?php echo $icon_svg; ?></div>
						<div class="cardboxIcon">
							<a href="#" class="cardlikelink template-like <?php echo esc_attr( $like_active ? '-active' : '' ); ?>">
								<div class="cardlike">
									<div class="m-favorite">
										<div class="m-favorite__icon"></div>			
										<span class="m-favorite__smallIcon"></span>
										<span class="m-favorite__smallIcon"></span>
										<span class="m-favorite__smallIcon"></span>
									</div>
									<h4 class="count"><?php echo esc_html( count( $likes_data ) ); ?></h4>
								</div>
							</a>
							<a href="#" class="downloadicon template-download">
								<div class="cardlike">
									<div class="btn-download" id="btn-download">
										<svg width="22px" height="16px" viewBox="0 0 22 16"><path d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15" id="check"></path><polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline><path d="M8,1 L8,11" class="svg-out"></path></svg>
									</div>
									<h4 class="count"><?php echo esc_html( $download_count ); ?></h4>
								</div>
							</a>
						</div>
					</div>
			<?php } ?>
			<div class="cardBoxText">
				<h3><?php echo wp_kses_post( $name ); ?></h3>
				<p><?php echo wp_kses_post( get_post_field( 'post_excerpt', $template_id ) ); ?></p>

				<h3 class="specifiation">Show full desctiption <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.7501 0.138889C9.70969 0.138889 10.5001 0.929296 10.5001 1.88889L10.5001 6.16667L12.421 4.24577C12.4754 4.18982 12.5405 4.14536 12.6124 4.11503C12.6844 4.0847 12.7616 4.0691 12.8397 4.06918C12.9557 4.06932 13.069 4.10404 13.1652 4.1689C13.2613 4.23376 13.336 4.32581 13.3796 4.4333C13.4232 4.5408 13.4337 4.65884 13.4099 4.77237C13.3861 4.88589 13.329 4.98974 13.2459 5.07064L10.3292 7.98731C10.2198 8.09666 10.0714 8.15809 9.91676 8.15809C9.76208 8.15809 9.61372 8.09666 9.50432 7.98731L6.58766 5.07064C6.53167 5.01689 6.48698 4.95251 6.45619 4.88127C6.42539 4.81002 6.40913 4.73335 6.40834 4.65575C6.40755 4.57814 6.42225 4.50115 6.45159 4.4293C6.48092 4.35745 6.5243 4.29217 6.57918 4.23729C6.63406 4.18241 6.69934 4.13903 6.77119 4.1097C6.84304 4.08036 6.92003 4.06566 6.99764 4.06645C7.07524 4.06724 7.15191 4.0835 7.22315 4.1143C7.2944 4.14509 7.35878 4.18978 7.41253 4.24577L9.33343 6.16667L9.33343 1.88889C9.33343 1.5599 9.07909 1.30556 8.7501 1.30556L0.591616 1.30552C0.514316 1.30661 0.437572 1.29233 0.365841 1.26351C0.294109 1.23468 0.228821 1.19189 0.173772 1.13761C0.118723 1.08334 0.0750112 1.01866 0.0451755 0.947343C0.0153388 0.876026 -2.5807e-05 0.799491 -2.58002e-05 0.722184C-2.57934e-05 0.644878 0.0153389 0.568343 0.0451755 0.497026C0.0750112 0.425709 0.118723 0.361034 0.173772 0.306758C0.228821 0.252482 0.294109 0.209688 0.365841 0.180863C0.437572 0.152039 0.514317 0.137758 0.591616 0.138851L8.7501 0.138889Z" fill="#8F1D9B"/></svg></h3>

				<a href="#" class="downloadbtn template-download">
					<span><?php esc_html_e( 'Download', 'marketingops' ); ?></span>
					<i><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none"><g clip-path="url(#clip0_12408_14530)"><path d="M8.12631 5.23446C9.01736 5.23446 9.75131 5.96841 9.75131 6.85946L9.75131 10.8317L11.535 9.048C11.5855 8.99604 11.646 8.95476 11.7128 8.92659C11.7796 8.89843 11.8513 8.88395 11.9238 8.88402C12.0315 8.88415 12.1367 8.91639 12.226 8.97661C12.3153 9.03684 12.3846 9.12232 12.4251 9.22214C12.4656 9.32195 12.4754 9.43156 12.4533 9.53698C12.4312 9.64239 12.3781 9.73882 12.3009 9.81395L9.59262 12.5223C9.49103 12.6238 9.35328 12.6809 9.20964 12.6809C9.06601 12.6809 8.92825 12.6238 8.82667 12.5223L6.11833 9.81395C6.06635 9.76403 6.02484 9.70425 5.99625 9.6381C5.96766 9.57195 5.95255 9.50075 5.95182 9.42869C5.95109 9.35662 5.96474 9.28514 5.99198 9.21842C6.01922 9.15169 6.0595 9.09108 6.11046 9.04012C6.16142 8.98916 6.22203 8.94888 6.28876 8.92164C6.35548 8.8944 6.42696 8.88075 6.49903 8.88148C6.57109 8.88221 6.64228 8.89732 6.70844 8.92591C6.77459 8.95451 6.83437 8.99601 6.88428 9.048L8.66797 10.8317L8.66798 6.85946C8.66798 6.55397 8.4318 6.3178 8.12631 6.3178L0.550579 6.31776C0.478802 6.31878 0.407539 6.30552 0.340932 6.27875C0.274324 6.25198 0.213698 6.21225 0.162581 6.16185C0.111464 6.11145 0.0708751 6.05139 0.0431709 5.98517C0.0154657 5.91895 0.00119871 5.84788 0.00119872 5.77609C0.00119873 5.70431 0.0154657 5.63324 0.0431709 5.56702C0.0708751 5.5008 0.111464 5.44074 0.162581 5.39034C0.213698 5.33994 0.274324 5.30021 0.340932 5.27344C0.407539 5.24667 0.478802 5.23341 0.550579 5.23443L8.12631 5.23446Z" fill="white"/></g><defs><clipPath id="clip0_12408_14530"><rect width="13" height="13" fill="white" transform="matrix(-1 -8.74228e-08 -8.74228e-08 1 13 0)"/></clipPath></defs></svg></i>
				</a>
			</div>
		</div>

		<div class="fulldescriptionbox card__expander">
			<div class="closedescription [ js-collapser ]">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M7 7L12 12L7 17" stroke="#45474F" stroke-width="1.3"/><path d="M17 7L12 12L17 17" stroke="#45474F" stroke-width="1.3"/></svg>
			</div>	
			<div class="fulldescriptionboxleft cardContainer">
				<div class="cardBox" data-file="<?php echo esc_url( $file_url ); ?>" data-tid="<?php echo esc_attr( $template_id ); ?>">
					<div class="cardboximage">
						<div class="cardboximageinner"><?php echo $icon_svg; ?></div>
						<div class="cardboxIcon">
							<a href="#" class="cardlikelink template-like ">
								<div class="cardlike">
									<div class="m-favorite">
										<div class="m-favorite__icon"></div>
										<span class="m-favorite__smallIcon"></span>
										<span class="m-favorite__smallIcon"></span>
										<span class="m-favorite__smallIcon"></span>
									</div>
									<h4 class="count"><?php echo esc_html( count( $likes_data ) ); ?></h4>
								</div>
							</a>
							<a href="#" class="downloadicon template-download">
								<div class="cardlike">
									<div class="btn-download" id="btn-download">
										<svg width="22px" height="16px" viewBox="0 0 22 16"><path d="M2,10 L6,13 L12.8760559,4.5959317 C14.1180021,3.0779974 16.2457925,2.62289624 18,3.5 L18,3.5 C19.8385982,4.4192991 21,6.29848669 21,8.35410197 L21,10 C21,12.7614237 18.7614237,15 16,15 L1,15" id="check"></path><polyline points="4.5 8.5 8 11 11.5 8.5" class="svg-out"></polyline><path d="M8,1 L8,11" class="svg-out"></path></svg>
									</div>
									<h4 class="count"><?php echo esc_html( $download_count ); ?></h4>
								</div>
							</a>
						</div>
					</div>

					<div class="cardBoxText">
						<h3><?php echo wp_kses_post( $name ); ?></h3>
						<?php echo wp_kses_post( get_post_field( 'post_content', $template_id ) ); ?>

						<a href="#" class="downloadbtn template-download">
							<span><?php esc_html_e( 'Download', 'marketingops' ); ?></span>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none"><g clip-path="url(#clip0_12408_14530)"><path d="M8.12631 5.23446C9.01736 5.23446 9.75131 5.96841 9.75131 6.85946L9.75131 10.8317L11.535 9.048C11.5855 8.99604 11.646 8.95476 11.7128 8.92659C11.7796 8.89843 11.8513 8.88395 11.9238 8.88402C12.0315 8.88415 12.1367 8.91639 12.226 8.97661C12.3153 9.03684 12.3846 9.12232 12.4251 9.22214C12.4656 9.32195 12.4754 9.43156 12.4533 9.53698C12.4312 9.64239 12.3781 9.73882 12.3009 9.81395L9.59262 12.5223C9.49103 12.6238 9.35328 12.6809 9.20964 12.6809C9.06601 12.6809 8.92825 12.6238 8.82667 12.5223L6.11833 9.81395C6.06635 9.76403 6.02484 9.70425 5.99625 9.6381C5.96766 9.57195 5.95255 9.50075 5.95182 9.42869C5.95109 9.35662 5.96474 9.28514 5.99198 9.21842C6.01922 9.15169 6.0595 9.09108 6.11046 9.04012C6.16142 8.98916 6.22203 8.94888 6.28876 8.92164C6.35548 8.8944 6.42696 8.88075 6.49903 8.88148C6.57109 8.88221 6.64228 8.89732 6.70844 8.92591C6.77459 8.95451 6.83437 8.99601 6.88428 9.048L8.66797 10.8317L8.66798 6.85946C8.66798 6.55397 8.4318 6.3178 8.12631 6.3178L0.550579 6.31776C0.478802 6.31878 0.407539 6.30552 0.340932 6.27875C0.274324 6.25198 0.213698 6.21225 0.162581 6.16185C0.111464 6.11145 0.0708751 6.05139 0.0431709 5.98517C0.0154657 5.91895 0.00119871 5.84788 0.00119872 5.77609C0.00119873 5.70431 0.0154657 5.63324 0.0431709 5.56702C0.0708751 5.5008 0.111464 5.44074 0.162581 5.39034C0.213698 5.33994 0.274324 5.30021 0.340932 5.27344C0.407539 5.24667 0.478802 5.23341 0.550579 5.23443L8.12631 5.23446Z" fill="white"></path></g><defs><clipPath id="clip0_12408_14530"><rect width="13" height="13" fill="white" transform="matrix(-1 -8.74228e-08 -8.74228e-08 1 13 0)"></rect></clipPath></defs></svg></i>
						</a>
						<h3 class="specifiation [ js-collapser ]"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none"><g clip-path="url(#clip0_1_239)"><path d="M5.2499 8.86111C4.29031 8.86111 3.4999 8.0707 3.4999 7.11111L3.49991 2.83333L1.57901 4.75423C1.52458 4.81018 1.45948 4.85464 1.38756 4.88497C1.31564 4.9153 1.23836 4.9309 1.16031 4.93082C1.04431 4.93068 0.930991 4.89596 0.834823 4.8311C0.738655 4.76624 0.664005 4.67419 0.620409 4.5667C0.576813 4.4592 0.56625 4.34116 0.590071 4.22763C0.613891 4.11411 0.671012 4.01026 0.754138 3.92936L3.6708 1.01269C3.7802 0.903338 3.92856 0.841907 4.08324 0.841907C4.23792 0.841907 4.38628 0.903338 4.49568 1.01269L7.41234 3.92936C7.46833 3.98311 7.51302 4.04749 7.54381 4.11873C7.57461 4.18998 7.59087 4.26665 7.59166 4.34425C7.59245 4.42186 7.57775 4.49885 7.54841 4.5707C7.51908 4.64255 7.4757 4.70783 7.42082 4.76271C7.36594 4.81759 7.30066 4.86097 7.22881 4.8903C7.15696 4.91964 7.07997 4.93434 7.00236 4.93355C6.92476 4.93276 6.84809 4.9165 6.77685 4.8857C6.7056 4.85491 6.64122 4.81022 6.58747 4.75423L4.66657 2.83333L4.66657 7.11111C4.66657 7.4401 4.92091 7.69444 5.2499 7.69444L13.4084 7.69448C13.4857 7.69339 13.5624 7.70767 13.6342 7.73649C13.7059 7.76532 13.7712 7.80811 13.8262 7.86239C13.8813 7.91666 13.925 7.98134 13.9548 8.05266C13.9847 8.12397 14 8.20051 14 8.27782C14 8.35512 13.9847 8.43166 13.9548 8.50297C13.925 8.57429 13.8813 8.63897 13.8262 8.69324C13.7712 8.74752 13.7059 8.79031 13.6342 8.81914C13.5624 8.84796 13.4857 8.86224 13.4084 8.86115L5.2499 8.86111Z" fill="#F2477E"/></g><defs><clipPath id="clip0_1_239"><rect width="14" height="14" fill="white" transform="matrix(1 8.74228e-08 8.74228e-08 -1 0 14.5)"/></clipPath></defs></svg> Show less</h3>
					</div>
				</div>
			</div>

			<?php if ( ! empty( $details_images ) && is_array( $details_images ) ) { ?>
				<div class="fulldescriptionboxright">
					<?php foreach ( $details_images as $details_image ) { ?>
						<div class="fulldescriptionboximgbox">
							<a href="#" class="woocommerce-product-gallery__trigger templates-details-img">
								<img role="presentation" class="zoomImg" src="<?php echo esc_url( wp_get_attachment_url( $details_image['image'] ) ); ?>" />
							</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>	
		</div>

		</div>	
		<?php
		return ob_get_clean();
		
	}
}


/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_conference_vault_video_box_html' ) ) {
	/**
	 * Function to return the inner html of the conferene video on the listing page.
	 *
	 * @param $post_id int Conference video post ID.
	 * @return string
	 *
	 * @since 1.0.0
	 */
	function moc_conference_vault_video_box_html( $post_id = 1 ) {
		// Return, if the template ID is -1.
		if ( -1 === $post_id ) {
			return;
		}

		$session_title   = get_the_title( $post_id );
		$session_by      = get_field( 'session_author', $post_id );
		$session_link    = get_field( 'vimeo_video_url', $post_id );
		$session_excerpt = get_post_field( 'post_excerpt', $post_id );

		// Content restrictions.
		$enable_restriction              = get_field( 'enable_restriction', $post_id );
		$restricted_for                  = get_field( 'restricted_for', $post_id );
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

		ob_start();
		?>
		<li data-video="<?php echo esc_url( $session_link ); ?>" data-post="<?php echo esc_attr( $post_id ); ?>" data-url="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
			<textarea style="display: none;" id="hidden-enable-restriction-<?php echo esc_attr( $post_id ); ?>"><?php echo esc_attr( ( true === $enable_restriction ) ? 1 : 0 ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-headline-<?php echo esc_attr( $post_id ); ?>"><?php echo wp_kses_post( $popup_headline ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-description-<?php echo esc_attr( $post_id ); ?>"><?php echo wp_kses_post( $popup_description ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-button-title-<?php echo esc_attr( $post_id ); ?>"><?php echo wp_kses_post( $popup_button_title ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-button-url-<?php echo esc_attr( $post_id ); ?>"><?php echo wp_kses_post( $popup_button_url ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-footer-text-not-loggedin-<?php echo esc_attr( $post_id ); ?>"><?php echo wp_kses_post( $popup_footer_text_not_loggedin ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-footer-text-loggedin-<?php echo esc_attr( $post_id ); ?>"><?php echo wp_kses_post( $popup_footer_text_loggedin ); ?></textarea>
			<textarea style="display: none;" id="hidden-popup-required-membership-levels-<?php echo esc_attr( $post_id ); ?>"><?php echo json_encode( $required_membership_level_slugs ); ?></textarea>
			<div class="conferencevaultinnergridboximage">
				<div class="innerimagebox">
					<?php if ( has_post_thumbnail( $post_id ) ) {
						$session_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );

						if ( ! empty( $session_image[0] ) ) {
							?><img src="<?php echo esc_url( $session_image[0] ); ?>" alt="<?php echo esc_attr( sanitize_title( $session_title ) ); ?>-featured-image" title="<?php echo esc_attr( $session_title ); ?>" /><?php
						}
						?>
					<?php } else { ?>
						<img src="/wp-content/uploads/2024/05/Rectangle-868.jpg" alt="conference-video-default-image" title="<?php esc_html_e( 'Conference Video Default Image', 'marketingops' ); ?>" />
					<?php } ?>

					<div class="overlayimagicon openPopupBtn">
						<svg width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="fill:#fff;"><g><path fill="none" d="M0 0h24v24H0z"/><path fill-rule="nonzero" d="M21 3a1 1 0 0 1 1 1v7h-2V5H4v14h6v2H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zm0 10a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-8a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h8zm-1 2h-6v4h6v-4z"/></g></svg>
					</div>	
				</div>
				<div class="innerimageboxdescriptions">
					<!-- Session Title -->
					<?php if ( ! empty( $session_title ) ) { ?>
						<h4 class="session-title"><a title="<?php echo wp_kses_post( $session_title ); ?>" href="javascript:void(0);"><?php echo wp_kses_post( $session_title ); ?></a></h4>
					<?php } ?>

					<!-- Session Author -->
					<?php if ( ! empty( $session_by ) ) { ?>
						<small><?php echo esc_html( sprintf( __( 'by %1$s', 'marketingops' ), $session_by ) ); ?></small>
					<?php } ?>

					<!-- Session Short Description -->
					<?php if ( ! empty( $session_excerpt ) ) { ?>
						<p><?php echo wp_kses_post( $session_excerpt ); ?></p>
					<?php } ?>
				</div>
			</div>
		</li>
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_get_conference_videos' ) ) {
	/**
	 * Get the Member Vault videos.
	 *
	 * @param string $post_type Post type.
	 * @param int    $paged Paged value.
	 * @param int    $posts_per_page Posts per page.
	 * @return object
	 * @since 1.0.0
	 */
	function moc_get_conference_videos( $post_type = 'post', $paged = 1, $posts_per_page = '', $tax_query = array(), $search_keyword = '' ) {
		// Prepare the arguments array.
		$args = array(
			'post_type'      => $post_type,
			'paged'          => $paged,
			'posts_per_page' => ( ! empty( $posts_per_page ) ) ? $posts_per_page : get_option( 'posts_per_page' ),
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'orderby'        => 'date',
			'order'          => 'DESC',
		);

		// If the search is available.
		if ( ! empty( $search_keyword ) ) {
			$args['s'] = $search_keyword;
		}

		// If the tax arguments are available.
		if ( ! empty( $tax_query ) && is_array( $tax_query ) ) {
			$args['tax_query'][] = $tax_query;
		}

		/**
		 * Posts/custom posts listing arguments filter.
		 *
		 * This filter helps to modify the arguments for retreiving posts of default/custom post types.
		 *
		 * @param array $args Holds the post arguments.
		 * @return array
		 */
		$args = apply_filters( 'moc_get_conference_videos_args', $args );

		return new WP_Query( $args );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_conference_vault_main_html' ) ) {
	/**
	 * Get the HTML for the Member Vault main page.
	 *
	 * @param array $term_ids Array of term ids.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_conference_vault_main_html( $term_ids, $search_keyword ) {
		ob_start();

		foreach ( $term_ids as $term_id ) {
			$term          = get_term( $term_id );
			$videos_query  = moc_get_conference_videos(
				'conference_vault',
				1,
				5,
				array(
					'taxonomy' => $term->taxonomy,
					'field'    => 'term_id',
					'terms'    => array( $term->term_id ),
				),
				$search_keyword
			);
			$video_ids     = ( ! empty( $videos_query->posts ) && is_array( $videos_query->posts ) ) ? $videos_query->posts : array();

			// Show the section if the term has videos, otherwise not.
			if ( ! empty( $video_ids ) && is_array( $video_ids ) ) { ?>
				<div class="conferencevaultevent">
					<h2><?php echo wp_kses_post( $term->name ); ?></h2>
					<p><?php echo esc_html( sprintf( _n( '%s session', '%s sessions', $videos_query->found_posts, 'marketingops' ), number_format_i18n( $videos_query->found_posts ) ) ); ?></p>
					<div class="conferencevaultinner_innerright_inner">
						<ul>
							<?php
							foreach ( $video_ids as $video_id ) {
								echo moc_conference_vault_video_box_html( $video_id ); // Print the conference video post.
							}
							?>
							<li>
								<div class="conferencevaultinnergridboximage">
									<div class="conferencevaultinnergridboximageshowmore">
										<a target="_blank" href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" title="<?php echo wp_kses_post( $term->name ); ?>">
										<?php esc_html_e( 'Show this event', 'marketingops' ); ?>
											<i><svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_26_82)"><path d="M10.5262 3.99457C10.2892 3.98546 10.0693 4.12103 9.97249 4.3375C9.87452 4.55396 9.91667 4.80688 10.0807 4.98005L11.8728 6.91682H0.592831C0.382065 6.9134 0.187248 7.02391 0.0812957 7.20619C-0.0257965 7.38734 -0.0257965 7.61292 0.0812957 7.79406C0.187248 7.97634 0.382065 8.08685 0.592831 8.08344H11.8728L10.0807 10.0202C9.9349 10.1729 9.88363 10.3916 9.94515 10.5933C10.0067 10.7949 10.1719 10.9476 10.3769 10.9931C10.5831 11.0387 10.7973 10.9692 10.9375 10.8131L14.001 7.50013L10.9375 4.18711C10.8326 4.0709 10.6834 4.00027 10.5262 3.99457Z" fill="#242730"/></g><defs><clipPath id="clip0_26_82"><rect width="15" height="11" fill="white"/></clipPath></defs></svg></i>
										</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			<?php } else {
				echo moc_no_conference_found_html();
			} ?>
		<?php } ?>
		<!-- <div class="confernceloadmore">
			<div class="confernceloadmoreinner">
				<button type="button"><?php // esc_html_e( 'Load More', 'marketingops' ); ?></button>
			</div>
		</div> -->
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_no_conference_found_html' ) ) {
	/**
	 * Get the HTML when no conference is selected.
	 *
	 * @param string $message Message.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function moc_no_conference_found_html( $message = '' ) {
		$message = ( empty( $message ) ) ? __( 'No videos found matching your search criteria. Please try again.', 'marketingops' ) : $message;

		// Start preparing the HTML.
		ob_start();
		?>
		<div class="ops-register no-conference-selected">
			<div class="title"><p><?php echo esc_html( $message ); ?></p></div>
			<div class="r-btn">
				<a class="member-only-sessions-registration-btn" title="<?php esc_html_e( 'Reset', 'marketingops' ); ?>" href="/conference-vault/"><?php esc_html_e( 'Reset Filters', 'marketingops' ); ?>&nbsp;
					<img decoding="async" src="/wp-content/uploads/2023/08/icons8_right_arrow_1-1.png" alt="icons8 right arrow 1 1" title="arrow-img" />
				</a>
			</div>
		</div>
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'moc_agency_custom_post_type_and_category_taxonomy' ) ) {
	/**
	 * Function to register templates custom post type.
	 *
	 * @since 1.0.0
	 */
	function moc_agency_custom_post_type_and_category_taxonomy() {
		register_post_type(
			'agency',
			array(
				'label'               => __( 'Agencies', 'marketingops' ),
				'description'         => __( 'Its custom post type for marketingops agencies.', 'marketingops' ),
				'labels'              => array(
					'name'                  => _x( 'Agencies', 'Template General Name', 'marketingops' ),
					'singular_name'         => _x( 'Agency', 'Template Singular Name', 'marketingops' ),
					'menu_name'             => __( 'Agencies', 'marketingops' ),
					'name_admin_bar'        => __( 'Agencies', 'marketingops' ),
					'archives'              => __( 'Agency Archives', 'marketingops' ),
					'attributes'            => __( 'Agency Attributes', 'marketingops' ),
					'parent_item_colon'     => __( 'Parent Agency:', 'marketingops' ),
					'all_items'             => __( 'All Agencies', 'marketingops' ),
					'add_new_item'          => __( 'Add New Agency', 'marketingops' ),
					'add_new'               => __( 'Add New', 'marketingops' ),
					'new_item'              => __( 'New Agency', 'marketingops' ),
					'edit_item'             => __( 'Edit Agency', 'marketingops' ),
					'update_item'           => __( 'Update Agency', 'marketingops' ),
					'view_item'             => __( 'View Agency', 'marketingops' ),
					'view_items'            => __( 'View Agencies', 'marketingops' ),
					'search_items'          => __( 'Search Agency', 'marketingops' ),
					'not_found'             => __( 'No Agency found', 'marketingops' ),
					'not_found_in_trash'    => __( 'No Agency found in trash', 'marketingops' ),
					'featured_image'        => __( 'Featured Image', 'marketingops' ),
					'set_featured_image'    => __( 'Set featured image', 'marketingops' ),
					'remove_featured_image' => __( 'Remove featured image', 'marketingops' ),
					'use_featured_image'    => __( 'Use as featured image', 'marketingops' ),
					'insert_into_item'      => __( 'Insert into Agency', 'marketingops' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Agency', 'marketingops' ),
					'items_list'            => __( 'Agencies list', 'marketingops' ),
					'items_list_navigation' => __( 'Agencies list navigation', 'marketingops' ),
					'filter_items_list'     => __( 'Filter Agencies list', 'marketingops' ),
				),
				'supports'            => array( 'title', 'editor', 'author', 'excerpt', 'thumbnail' ),
				'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 65,
				'menu_icon'           => 'dashicons-media-document',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => false,
				'rewrite'             => array( 'slug' => 'agency' ),
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest'        => true,
			)
		);

		// Register taxonomy, agency_type.
		register_taxonomy( 'agency_type', array( 'agency' ), array(
			'labels'            => array(
				'name'                       => _x( 'Agency Types', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Agency Type', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Agency Types', 'marketingops' ),
				'all_items'                  => __( 'All Agency Types', 'marketingops' ),
				'parent_item'                => __( 'Parent Agency Type', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Agency Type:', 'marketingops' ),
				'new_item_name'              => __( 'New Agency Type Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Agency Type', 'marketingops' ),
				'edit_item'                  => __( 'Edit Agency Type', 'marketingops' ),
				'update_item'                => __( 'Update Agency Type', 'marketingops' ),
				'view_item'                  => __( 'View Agency Type', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Agency Types with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Agency Types', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Agency Types', 'marketingops' ),
				'search_items'               => __( 'Search Agency Types', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Agency Types', 'marketingops' ),
				'items_list'                 => __( 'Agency Types list', 'marketingops' ),
				'items_list_navigation'      => __( 'Agency Types list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );

		// Register taxonomy, agency_region.
		register_taxonomy( 'agency_region', array( 'agency' ), array(
			'labels'            => array(
				'name'                       => _x( 'Agency Regions', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Agency Region', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Agency Regions', 'marketingops' ),
				'all_items'                  => __( 'All Agency Regions', 'marketingops' ),
				'parent_item'                => __( 'Parent Agency Region', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Agency Region:', 'marketingops' ),
				'new_item_name'              => __( 'New Agency Region Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Agency Region', 'marketingops' ),
				'edit_item'                  => __( 'Edit Agency Region', 'marketingops' ),
				'update_item'                => __( 'Update Agency Region', 'marketingops' ),
				'view_item'                  => __( 'View Agency Region', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Agency Regions with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Agency Regions', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Agency Regions', 'marketingops' ),
				'search_items'               => __( 'Search Agency Regions', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Agency Regions', 'marketingops' ),
				'items_list'                 => __( 'Agency Regions list', 'marketingops' ),
				'items_list_navigation'      => __( 'Agency Regions list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );

		// Register taxonomy, agency_primary_vertical.
		register_taxonomy( 'agency_primary_vertical', array( 'agency' ), array(
			'labels'            => array(
				'name'                       => _x( 'Agency Primary Verticals', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Agency Primary Vertical', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Agency Primary Verticals', 'marketingops' ),
				'all_items'                  => __( 'All Agency Primary Verticals', 'marketingops' ),
				'parent_item'                => __( 'Parent Agency Primary Vertical', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Agency Primary Vertical:', 'marketingops' ),
				'new_item_name'              => __( 'New Agency Primary Vertical Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Agency Primary Vertical', 'marketingops' ),
				'edit_item'                  => __( 'Edit Agency Primary Vertical', 'marketingops' ),
				'update_item'                => __( 'Update Agency Primary Vertical', 'marketingops' ),
				'view_item'                  => __( 'View Agency Primary Vertical', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Agency Primary Verticals with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Agency Primary Verticals', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Agency Primary Verticals', 'marketingops' ),
				'search_items'               => __( 'Search Agency Primary Verticals', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Agency Primary Verticals', 'marketingops' ),
				'items_list'                 => __( 'Agency Primary Verticals list', 'marketingops' ),
				'items_list_navigation'      => __( 'Agency Primary Verticals list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );

		// Register taxonomy, agency_service.
		register_taxonomy( 'agency_service', array( 'agency' ), array(
			'labels'            => array(
				'name'                       => _x( 'Agency Services', 'Taxonomy General Name', 'marketingops' ),
				'singular_name'              => _x( 'Agency Service', 'Taxonomy Singular Name', 'marketingops' ),
				'menu_name'                  => __( 'Agency Services', 'marketingops' ),
				'all_items'                  => __( 'All Agency Services', 'marketingops' ),
				'parent_item'                => __( 'Parent Agency Service', 'marketingops' ),
				'parent_item_colon'          => __( 'Parent Agency Service:', 'marketingops' ),
				'new_item_name'              => __( 'New Agency Service Name', 'marketingops' ),
				'add_new_item'               => __( 'Add New Agency Service', 'marketingops' ),
				'edit_item'                  => __( 'Edit Agency Service', 'marketingops' ),
				'update_item'                => __( 'Update Agency Service', 'marketingops' ),
				'view_item'                  => __( 'View Agency Service', 'marketingops' ),
				'separate_items_with_commas' => __( 'Separate Agency Services with commas', 'marketingops' ),
				'add_or_remove_items'        => __( 'Add or remove Agency Services', 'marketingops' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'marketingops' ),
				'popular_items'              => __( 'Popular Agency Services', 'marketingops' ),
				'search_items'               => __( 'Search Agency Services', 'marketingops' ),
				'not_found'                  => __( 'Not Found', 'marketingops' ),
				'no_terms'                   => __( 'No Agency Services', 'marketingops' ),
				'items_list'                 => __( 'Agency Services list', 'marketingops' ),
				'items_list_navigation'      => __( 'Agency Services list navigation', 'marketingops' ),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
		) );
	}
}


/**
 * Check if the function exists.
 */
if ( ! function_exists( 'fetch_mopza24_sessions' ) ) {
	/**
	 * Fetch mopza24 sessions.
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function fetch_mopza24_sessions() {
		$api_token                         = '9bzYF5mj5yxgVrZSI9fbdZDL0dcrtaJKQTeZRc/eVpToFNn3R5oZVI8aRujeG3HcAWw3+QAwNI5rAhvIqAW7oTZmODIzZjY3LTFhYWQtNGU5Zi1hZTU4LTc5M2VhMzU3NGE5Yzk2Mzg2';
		$event_id                          = 4630;
		$filters                           = new stdClass();
		$filters->filters                  = new stdClass();
		$filters->filters->status          = 'accepted';
		$session_board_event_sessions_body = json_encode( $filters );

		$session_board_event_sessions      = wp_remote_post(
			add_query_arg(
				array(
					'page'     => 1,
					'pageSize' => 100,
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

		// If the API response is 200 OK.
		if ( 200 === $session_board_event_sessions_response_code ) {
			$session_board_event_sessions_response_body = wp_remote_retrieve_body( $session_board_event_sessions );

			return json_decode( $session_board_event_sessions_response_body, true );
		}

		return false;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_premium_available_content' ) ) {
	/**
	 * Return the premium available content array.
	 *
	 * @param array $user_membership_slugs User membership slugs.
	 * @param array $wc_memberships_rules WooCommerce membership rules.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function mops_get_premium_available_content( $user_membership_slugs, $wc_memberships_rules ) {
		$premium_available_content = array();

		foreach ( $user_membership_slugs as $membership_slug ) {
			$membership_plan    = get_page_by_path( $membership_slug, OBJECT, array( 'wc_membership_plan' ) );
			$membership_plan_id = ( ! empty( $membership_plan->ID ) ) ? $membership_plan->ID : 0;
	
			// Skip, if the membership plan ID is 0.
			if ( 0 === $membership_plan_id ) {
				continue;
			}
	
			// Iterate through the wc membersip rules and collect the data.
			if ( ! empty( $wc_memberships_rules ) && is_array( $wc_memberships_rules ) ) {
				foreach ( $wc_memberships_rules as $wc_memberships_rule ) {
					$rule_plan_id = ( ! empty( $wc_memberships_rule['membership_plan_id'] ) ) ? $wc_memberships_rule['membership_plan_id'] : false;
	
					// Skip, if the membership plan id is false.
					if ( false === $rule_plan_id || $membership_plan_id !== $rule_plan_id ) {
						continue;
					}
	
					$content_type      = ( ! empty( $wc_memberships_rule['content_type'] ) ) ? $wc_memberships_rule['content_type'] : '';
					$rule_type         = ( ! empty( $wc_memberships_rule['rule_type'] ) ) ? $wc_memberships_rule['rule_type'] : '';
					$content_type_name = ( ! empty( $wc_memberships_rule['content_type_name'] ) ) ? $wc_memberships_rule['content_type_name'] : '';
					$object_ids        = ( ! empty( $wc_memberships_rule['object_ids'] ) ) ? $wc_memberships_rule['object_ids'] : array();
	
					// Skip, there is no available (membership restricted) content.
					if ( empty( $object_ids ) ) {
						continue;
					}
	
					// If the rule type is for content restriction.
					if ( ! empty( $rule_type ) && ( 'content_restriction' === $rule_type || 'product_restriction' === $rule_type ) ) {
						$premium_available_content_temp                  = ( ! empty( $premium_available_content[ $content_type_name ] ) && is_array( $premium_available_content[ $content_type_name ] ) ) ? $premium_available_content[ $content_type_name ] : array();
						$premium_available_content[ $content_type_name ] = array_merge( $premium_available_content_temp, $object_ids );
						$premium_available_content[ $content_type_name ] = array_values( array_unique( $premium_available_content[ $content_type_name ] ) );
					} elseif ( ! empty( $rule_type ) && 'purchasing_discount' === $rule_type ) {
						$premium_available_content['purchasing_discount'][] = array(
							'object_ids'        => $object_ids,
							'content_type'      => $content_type,
							'content_type_name' => $content_type_name,
							'discount_type'     => ( ! empty( $wc_memberships_rule['discount_type'] ) ) ? $wc_memberships_rule['discount_type'] : array(),
							'discount_amount'   => ( ! empty( $wc_memberships_rule['discount_amount'] ) ) ? $wc_memberships_rule['discount_amount'] : array(),
						);
					}
				}
			}
		}

		return $premium_available_content;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_premium_unavailable_content' ) ) {
	/**
	 * Return the premium available content array.
	 *
	 * @param array $user_membership_slugs User membership slugs.
	 * @param array $wc_memberships_rules WooCommerce membership rules.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function mops_get_premium_unavailable_content( $user_membership_slugs, $wc_memberships_rules ) {
		$premium_unavailable_content = array();

		foreach ( $wc_memberships_rules as $index => $wc_memberships_rule ) {
			$rule_plan_id = ( ! empty( $wc_memberships_rule['membership_plan_id'] ) ) ? $wc_memberships_rule['membership_plan_id'] : false;

			// Skip, if the membership plan id is false.
			if ( false === $rule_plan_id || $user_max_membership_post_id !== $rule_plan_id ) {
				continue;
			}

			$content_type      = ( ! empty( $wc_memberships_rule['content_type'] ) ) ? $wc_memberships_rule['content_type'] : '';
			$rule_type         = ( ! empty( $wc_memberships_rule['rule_type'] ) ) ? $wc_memberships_rule['rule_type'] : '';
			$content_type_name = ( ! empty( $wc_memberships_rule['content_type_name'] ) ) ? $wc_memberships_rule['content_type_name'] : '';
			$object_ids        = ( ! empty( $wc_memberships_rule['object_ids'] ) ) ? $wc_memberships_rule['object_ids'] : array();

			// Skip, there is no available (membership restricted) content.
			if ( empty( $object_ids ) ) {
				continue;
			}

			// If the rule type is for content restriction.
			if ( ! empty( $rule_type ) && ( 'content_restriction' === $rule_type || 'product_restriction' === $rule_type ) ) {
				$premium_unavailable_content_temp                  = ( ! empty( $premium_unavailable_content[ $content_type_name ] ) && is_array( $premium_unavailable_content[ $content_type_name ] ) ) ? $premium_unavailable_content[ $content_type_name ] : array();
				$premium_unavailable_content[ $content_type_name ] = array_merge( $premium_unavailable_content_temp, $object_ids );
				$premium_unavailable_content[ $content_type_name ] = array_values( array_unique( $premium_unavailable_content[ $content_type_name ] ) );
			} elseif ( ! empty( $rule_type ) && 'purchasing_discount' === $rule_type ) {
				$premium_unavailable_content['purchasing_discount'][] = array(
					'object_ids'        => $object_ids,
					'content_type'      => $content_type,
					'content_type_name' => $content_type_name,
					'discount_type'     => ( ! empty( $wc_memberships_rule['discount_type'] ) ) ? $wc_memberships_rule['discount_type'] : array(),
					'discount_amount'   => ( ! empty( $wc_memberships_rule['discount_amount'] ) ) ? $wc_memberships_rule['discount_amount'] : array(),
				);
			}
		}

		return $premium_unavailable_content;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_user_learndash_certificates' ) ) {
	/**
	 * Return the customer learndash certificates.
	 *
	 * @param array $courses User courses.
	 *
	 * @return array
	 *
	 * @since 1.0.0
	 */
	function mops_get_user_learndash_certificates( $courses, $user_id ) {
		$certificates = array();

		if ( ! empty( $courses ) && is_array( $courses ) ) {
			// Loop through the courses to collect the associated certificate.
			foreach ( $courses as $course_id => $course_data ) {
				// Get the attached certificate ID.
				$certificate_id  = get_post_meta( $course_id, '_ld_certificate', true );
				$certficate_link = learndash_get_course_certificate_link( $course_id, $user_id );
		
				// If the certificate link is available, put it in an array.
				if ( ! empty( $certficate_link ) ) {
					$certificates[] = array(
						'course'           => $course_id,
						'certificate'      => $certificate_id,
						'certificate_link' => $certficate_link,
					);
				}
			}
		}

		return $certificates;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_user_avatar_url' ) ) {
	/**
	 * Return the user avatar url.
	 *
	 * @param int $user_id User ID.
	 *
	 * @return string|boolean
	 *
	 * @since 1.0.0
	 */
	function mops_get_user_avatar_url( $user_id ) {
		$wp_user_avatar = get_user_meta( $user_id, 'wp_user_avatar', true );

		return ( empty( $wp_user_avatar ) || is_null( $wp_user_avatar ) || false === $wp_user_avatar ) ? false : wp_get_attachment_url( $wp_user_avatar );
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_verify_google_recaptcha' ) ) {
	/**
	 * Verify the google recaptcha response.
	 *
	 * @param string $recaptcha_response Google recaptcha response.
	 * @param string $secret_key         Google recaptcha secret key.
	 *
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	function mops_verify_google_recaptcha( $recaptcha_response, $secret_key ) {
		$verify_recaptcha_response = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$recaptcha_response}" );
		$response_data             = json_decode( $verify_recaptcha_response );

		// if ( '183.82.160.85' === $_SERVER['REMOTE_ADDR'] ) {
		// 	debug( $response_data );
		// }

		return ( $response_data->success ) ? true : false;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_is_user_ambassador' ) ) {
	/**
	 * Check if the current user is ambassador.
	 *
	 * @param int $user_id User ID.
	 *
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	function mops_is_user_ambassador( $user_id ) {
		$user_badges = get_user_meta( $user_id, 'moc_community_badges', true );

		// Return, if there are no user badges available.
		if ( empty( $user_badges ) || ! is_array( $user_badges ) ) {
			return false;
		}

		$is_ambassador_in_badges = array_search( 'Ambassador', $user_badges, true );

		return ( false === $is_ambassador_in_badges ) ? false : true;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_is_user_agency_partner' ) ) {
	/**
	 * Check if the current user is agency partner.
	 *
	 * @param int $user_id User ID.
	 *
	 * @return boolean
	 *
	 * @since 1.0.0
	 */
	function mops_is_user_agency_partner( $user_id, $is_paid_agency = false ) {
		// If the function is not defined.
		if ( ! function_exists( 'wc_memberships_get_user_memberships' ) ) {
			return false;
		}

		// Get the user memberships.
		$user_active_memberships     = wc_memberships_get_user_active_memberships( $user_id );
		$user_active_memberships_arr = array();

		// If there are no active memberships.
		if ( empty( $user_active_memberships ) || ! is_array( $user_active_memberships ) ) {
			return false;
		}

		// Loop through the active memberships.
		foreach ( $user_active_memberships as $membership_data ) {
			// If the appropriate membership is assigned.
			if ( ! empty( $membership_data->plan->slug ) ) {
				$user_active_memberships_arr[] = $membership_data->plan->slug;
			}
		}

		// Check if the user is agency partner.
		if ( in_array( 'mo-pros-agency-monthly-membership', $user_active_memberships_arr, true ) || in_array( 'free-agency-membership', $user_active_memberships_arr, true ) ) {
			// If the is_paid_agency is true, then check for the paid agency membership.
			if ( $is_paid_agency && in_array( 'mo-pros-agency-monthly-membership', $user_active_memberships_arr, true ) ) {
				return true;
			} elseif ( ! $is_paid_agency && in_array( 'free-agency-membership', $user_active_memberships_arr, true ) ) {
				return true;
			}
		}

		return false;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_required_asterisk' ) ) {
	/**
	 * Return the html for required asterisk.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	function mops_get_required_asterisk() {
		ob_start();
		?>
		<i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i>
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_get_agency_person_html_block' ) ) {
	/**
	 * Return the html for required asterisk.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	function mops_get_agency_person_html_block( $person_index = 0, $person_data = array() ) {
		$full_name        = ( ! empty( $person_data['full_name'] ) ) ? $person_data['full_name'] : '';
		$position         = ( ! empty( $person_data['position'] ) ) ? $person_data['position'] : '';
		$linkedin_profile = ( ! empty( $person_data['linkedin_profile'] ) ) ? $person_data['linkedin_profile'] : '';
		$display_picture  = ( ! empty( $person_data['display_picture'] ) ) ? wp_get_attachment_image_src( $person_data['display_picture'], 'full-image' ) : 0;

		ob_start();
		?>
		<div class="person-data">
			<h4><?php echo esc_html( sprintf( __( 'Person %1$d', 'marketingops' ), ( $person_index + 1) ) ); ?></h4>
			<div class="agencyformgroups">
				<div class="agencyfirstblock">
					<label><?php esc_html_e( 'Full Name', 'marketingops' ); ?></label>
					<input type="text" class="agancyinputbox fullname" name="fullname" value="<?php echo wp_kses_post( $full_name ); ?>">
				</div> 
				<div class="agencyfirstblock">
					<label><?php esc_html_e( 'Position', 'marketingops' ); ?></label>
					<input type="text" class="agancyinputbox position" name="position" value="<?php echo wp_kses_post( $position ); ?>">
				</div>
			</div>
			<div class="agencyformgroup bottomtext">
				<label><?php esc_html_e( 'LinkedIn URL', 'marketingops' ); ?></label>
				<input type="text" class="agancyinputbox linkedin" name="linkedin" value="<?php echo wp_kses_post( $linkedin_profile ); ?>">
			</div>

			<div class="agencyformgroup">
				<label><?php esc_html_e( 'Display picture', 'marketingops' ); ?></label>
				<div class="upload-btn-wrapper image-upload-container">
					<button class="btn"><?php esc_html_e( 'Select an image', 'marketingops' ); ?></button>
					<p><?php esc_html_e( 'For the best results, crop your photo to 640 x 380px before uploading.', 'marketingops' ); ?></p>
					<input type="file" class="imageInput displaypicture" accept="image/*"/>
					<div id="previewContainer" class="preview-container" style="<?php echo ( empty( $display_picture[0] ) ? 'display: none;' : '' ); ?>">
						<input type="hidden" class="displaypicture_id" value="<?php echo ( ! empty( $person_data['display_picture'] ) ? $person_data['display_picture'] : '' ); ?>" />
						<img class="preview-image" src="<?php echo ( ! empty( $display_picture[0] ) ? $display_picture[0] : '' ); ?>" alt="Image Preview" />
						<button class="removePreview remove-preview-btn" id="removePreview"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="15.35" stroke="white" stroke-width="1.3"></circle><path d="M11 11L16 16L11 21" stroke="white" stroke-width="1.3"></path><path d="M21 11L16 16L21 21" stroke="white" stroke-width="1.3"></path></svg></button>
					</div>
				</div>
			</div>
		</div>
		<?php

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_upload_media' ) ) {
	/**
	 * Upload the media to WordPress media folder and return the attachment ID.
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 */
	function mops_upload_media( $media_file, $post_id = 0 ) {
		$filename      = $media_file['name'];
		$upload_file   = wp_upload_bits( $filename, null, file_get_contents( $media_file['tmp_name'] ) );
		$attachment_id = 0;

		if ( ! $upload_file['error'] ) {
			$wp_filetype   = wp_check_filetype( $filename, null );
			$attachment    = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_parent'    => 0,
				'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
				'post_content'   => '',
				'post_status'    => 'inherit',
			);

			if ( 0 === $post_id ) {
				$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'] );
			} else {
				$attachment_id = wp_insert_attachment( $attachment, $upload_file['file'], $post_id );
			}

			if ( ! is_wp_error( $attachment_id ) ) {
				require_once( ABSPATH . 'wp-admin' . '/includes/image.php' );
				$attachment_data = wp_generate_attachment_metadata( $attachment_id, $upload_file['file'] );
				wp_update_attachment_metadata( $attachment_id, $attachment_data );
			}

			if ( 0 !== $post_id ) {
				set_post_thumbnail( $post_id, $attachment_id );
			}
		}

		return $attachment_id;
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'mops_agency_list_item' ) ) {
	/**
	 * Agency list item.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	function mops_agency_list_item( $agency_id = 0, $agency_member = array(), $subscription_type = 'free' ) {
		// Get the agency html.
		ob_start();

		// If the agency ID is not available.
		if ( 0 === $agency_id ) {
			?>
			<li class="agency-list-item" data-membership-id="<?php echo esc_attr( $agency_member->ID ); ?>" data-agencyowner-id="<?php echo esc_attr( $agency_member->post_author ); ?>" data-membership-creation-date="<?php echo esc_attr( $agency_member->post_date ); ?>">
				<!-- show the overlay if the current user is not agency member -->
				<div class="overlayonhover" style="visibility: visible;opacity: 1;">
					<h2><?php esc_html_e( 'Apply for an agency profile at no charge.', 'marketingops' ); ?></h2>
					<p><?php esc_html_e( 'Share your story with the MarketingOps.com community:', 'marketingops' ); ?></p>
					<a href="/subscribe/agency/" class="apllyfreebtns"><?php esc_html_e( 'Apply for free', 'marketingops' ); ?> <i><svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_63_608)"><path d="M11.0262 2.99457C10.7892 2.98546 10.5693 3.12103 10.4725 3.3375C10.3745 3.55396 10.4167 3.80688 10.5807 3.98005L12.3728 5.91682H1.09283C0.882065 5.9134 0.687248 6.02391 0.581296 6.20619C0.474204 6.38734 0.474204 6.61292 0.581296 6.79406C0.687248 6.97634 0.882065 7.08685 1.09283 7.08344H12.3728L10.5807 9.02021C10.4349 9.17287 10.3836 9.39161 10.4452 9.59326C10.5067 9.79492 10.6719 9.94758 10.8769 9.99315C11.0831 10.0387 11.2973 9.96922 11.4375 9.81314L14.501 6.50013L11.4375 3.18711C11.3326 3.0709 11.1834 3.00027 11.0262 2.99457Z" fill="#911D9B"/></g><defs><clipPath id="clip0_63_608"><rect width="15" height="10" fill="white" transform="translate(0 0.5)"/></clipPath></defs></svg></i></a>
				</div>
			</li>
			<?php
		} else {
			// Get the agency data.
			$agency_title          = get_the_title( $agency_id );
			$agency_featured_image = wp_get_attachment_url( get_post_thumbnail_id( $agency_id ) );
			$agency_services       = wp_get_object_terms( $agency_id, 'agency_service' );
			?>
			<li class="agency-list-item" data-agency="<?php echo esc_attr( $agency_id ); ?>" data-membership-id="<?php echo esc_attr( $agency_member->ID ); ?>" data-agencyowner-id="<?php echo esc_attr( $agency_member->post_author ); ?>" data-membership-creation-date="<?php echo esc_attr( $agency_member->post_date ); ?>">
				<a href="<?php echo esc_url( get_permalink( $agency_id ) ); ?>" class="learnmorebtnagency">
					<div class="inneragencylistbox">
						<!-- partner tag shows up only for the paid agency memberships -->
						<?php if ( 'paid' === $subscription_type ) { ?>
							<h4><?php esc_html_e( 'PARTNER', 'marketingops' ); ?></h4>
						<?php } ?>
						<img src="<?php echo esc_url( $agency_featured_image ); ?>" alt="img" />
						<h3><?php echo wp_kses_post( $agency_title ); ?></h3>
						<?php if ( ! empty( $agency_services ) && is_array( $agency_services ) ) { ?>
							<ul>
								<?php foreach ( $agency_services as $service_index => $agency_service ) {
									if ( 10 > $service_index ) {
										?><li><?php echo esc_html( $agency_service->name ); ?></li><?php
									}
								}

								if ( 10 < count( $agency_services ) ) {
									?><li> +<?php echo esc_html( count( $agency_services ) - 9 ); ?> more </li><?php
								}
								?>
							</ul>
						<?php } ?>
							<div class="learnmorebtnagency">
							<?php esc_html_e( 'Learn more', 'marketingops' ); ?> <i class="lernmoresvg"> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"><g clip-path="url(#clip0_53_583)"><path d="M10.5262 3.99457C10.2892 3.98546 10.0693 4.12103 9.97249 4.3375C9.87452 4.55396 9.91667 4.80688 10.0807 4.98005L11.8728 6.91682H0.592831C0.382065 6.9134 0.187248 7.02391 0.0812957 7.20619C-0.0257965 7.38734 -0.0257965 7.61292 0.0812957 7.79406C0.187248 7.97634 0.382065 8.08685 0.592831 8.08344H11.8728L10.0807 10.0202C9.9349 10.1729 9.88363 10.3916 9.94515 10.5933C10.0067 10.7949 10.1719 10.9476 10.3769 10.9931C10.5831 11.0387 10.7973 10.9692 10.9375 10.8131L14.001 7.50013L10.9375 4.18711C10.8326 4.0709 10.6834 4.00027 10.5262 3.99457Z" fill="#45474F"/></g><defs><clipPath id="clip0_53_583"><rect width="15" height="11" fill="white"/></clipPath></defs></svg> </i>	
							</div>
					</div>
				</a>
			</li>
			<?php
		}

		return ob_get_clean();
	}
}

/**
 * Check if the function exists.
 */
if ( ! function_exists( 'is_post_restricted' ) ) {
	/**
	 * Upload the media to WordPress media folder and return the attachment ID.
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 */
	function is_post_restricted( $post_id = 0 ) {
		// Return, if the post ID is 0.
		if ( 0 === $post_id ) {
			return false;
		}

		// Get the post restriction.
		$enable_restriction = get_field( 'enable_restriction', $post_id );

		if ( is_bool( $enable_restriction ) && true === $enable_restriction ) {
			if ( is_user_logged_in() ) {
				$current_user_membership = moc_get_membership_plan_slug();
				$restricted_for          = get_field( 'restricted_for', $post_id );
				$restricted_for_wc_memberships = ( ! empty( $restricted_for['woocommerce_membership_level'] ) && is_array( $restricted_for['woocommerce_membership_level'] ) ) ? $restricted_for['woocommerce_membership_level'] : array();

				// If the memberships are restricted.
				if ( ! empty( $restricted_for_wc_memberships ) && ! in_array( $current_user_membership, $restricted_for_wc_memberships ) ) {
					$restriction_open_for_wc_membership_slugs = array();

					// Loop through the array to collect the restricted memberships.
					foreach ( $restricted_for_wc_memberships as $restricted_for_wc_membership_id ) {
						$restriction_open_for_wc_membership_slugs[] = get_post_field( 'post_name', $restricted_for_wc_membership_id );
					}

					/**
					 * Check if the content is open for the current user.
					 * Get common membership levels. If any membership level is not available, then the content should be restricted.
					 */
					$common_membership_levels = array_intersect( $restriction_open_for_wc_membership_slugs, $current_user_membership );

					// If there are membership levels available, then the content should be restricted.
					if ( empty( $common_membership_levels ) && is_array( $common_membership_levels ) && 0 === count( $common_membership_levels ) ) {
						return true;
					}
				}
			} else {
				return true;
			}
		}

		return false;
	}
}
