jQuery( document ).ready( function ( $ ) {
	// Localized variables.
	var ajaxurl = Moc_Admin_JS_Obj.ajaxurl;

	// Membership plan signup redirect type.
	$( document ).on( 'change', '#signup_redirect_type', function() {
		var redirect_type = $( this ).val();

		// Hide both redirect fields initially.
		$( '.signup_redirect_internal_field' ).hide();
		$( '.signup_redirect_external_field' ).hide();

		if ( 'internal' === redirect_type ) {
			$( '.signup_redirect_internal_field' ).show();
			$( '.signup_redirect_external_field' ).hide();
		} else if ( 'external' === redirect_type ) {
			$( '.signup_redirect_internal_field' ).hide();
			$( '.signup_redirect_external_field' ).show();
		}
	} );

	// Set the initial state of the redirect fields.
	var membership_plan_signup_redirect_type = $( '#signup_redirect_type' ).val();
	$( '#signup_redirect_type' ).trigger( 'change' );

	// Mark agency featured.
	$( document ).on( 'click', '.featured-agency', function() {
		var this_element = $( this );

		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'feature_agency',
				is_featured: ( this_element.find( 'span' ).hasClass( 'dashicons-star-empty' ) ) ? 'yes' : 'no',
				agency_id: parseInt( this_element.parents( 'tr' ).attr( 'id' ).replace( 'post-', '' ) ),
			},
			beforeSend: function() {
				// Block element.
				block_element( this_element.parents( 'tr' ) );
			},
			success: function ( response ) {
				if ( 'agency-featured-updated' === response.data.code ) {
					this_element.find( 'span' ).attr( 'class', response.data.icon_new_class );
					this_element.siblings( 'p.featured-agency-success-message' ).text( response.data.toast_message );

					setTimeout( function() {
						this_element.siblings( 'p.featured-agency-success-message' ).text( '' );
					}, 2000 );
				}
				
			},
			complete: function() {
				// Unblock element.
				unblock_element( this_element.parents( 'tr' ) );
			},
		} );
	} );

	// Add this for making job location field required.
	if ( 0 < $( '#_job_location' ).length ) {
		$( '#_job_location' ).attr( 'required', 'required' );
	}
	$( '.tab' ).find( '.tablinks' ).click( function ( e ) {
		e.preventDefault();
		var data_src = $( this ).data( 'src' );
		$( '.tablinks' ).removeClass( 'active' );
		$( '.tabcontent' ).removeClass( 'active' );
		$( this ).addClass( 'active' );
		$( 'body' ).find( '#' + data_src ).addClass( 'active' );
	} );
  	// jQuery to change valued on slider range.
	$( document ).on( 'change', 'input[type="range"]', function() {
		var this_element            = $( this );
		var closest_skill_level_btn = this_element.closest( 'td' ).find( '.moc_skill_span' );
		var range_value             = parseInt( this_element.val() );
		var text_to_change          = '';

		if ( 1 === range_value ) {
			text_to_change  = 'BASIC';
		} else if ( 2 === range_value ) {
			text_to_change = 'INTERMEDIATE';
		} else if ( 3 === range_value ) {
			text_to_change = 'ADVANCED';
		} else {
			text_to_change = 'EXPERT';
		}

		closest_skill_level_btn.text( text_to_change );
	} );

	//jQuery to pass ajax to enable disable value of show in frontend.
	$( document ).on( 'change', 'input[name="moc_show_on_frontend[]"]', function() {
		var this_element = $( this );

		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_make_enable_disable_show_in_frontend',
				checkbox_val: ( this_element.is( ':checked' ) ) ? 'yes' : 'no',
				term_id: this_element.data( 'termid' ),
			},
			beforeSend: function() {
				block_element( $( '.wp-admin table.wp-list-table' ) );
			},
			success: function ( response ) {
				// Check for invalid ajax request.
				if ( 0 === response ) {
					console.log( 'MarketingOps: invalid ajax request' );
					return false;
				}
				if ( 'marketinops-update-taxonomy' === response.data.code ) {
					// unblock_element( $( '.wp-admin.taxonomy-category table.wp-list-table' ) );
					setTimeout( function() {
						location.reload();
					}, 2000 );
				}
				
			},
		} );
	} );

	$( document ).on( 'click', 'input[name="moc_all_show_on_frontend[]"]', function() {
		$( 'input[name="moc_show_on_frontend[]"]' ).not(this).prop('checked', this.checked);
		var checkbox_arr = [];
		$( 'input[name="moc_show_on_frontend[]"]' ).each( function() {
			var this_checkbox = $( this );
			var checkbox_val = '';
			var term_id      = this_checkbox.data( 'termid' );
			if ( this_checkbox.is(":checked")) {
				this_checkbox.prop( 'checked', true );
				checkbox_val = 'yes';
			} else {
				this_checkbox.prop( 'checked', false );
				checkbox_val = 'no';
			}
			checkbox_arr.push( {
				term_id: term_id,
				checkbox_val: checkbox_val,
			} );

		} );
		var data = {
			action: 'moc_make_enable_disable_show_in_frontend_for_all',
			checkbox_arr: checkbox_arr,
		};
		block_element( $( '.wp-admin table.wp-list-table' ) );
		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function ( response ) {
				// Check for invalid ajax request.
				if ( 0 === response ) {
					console.log( 'MarketingOps: invalid ajax request' );
					return false;
				}
				if ( 'marketinops-update-all-taxonomy' === response.data.code ) {
					// unblock_element( $( '.wp-admin.taxonomy-category table.wp-list-table' ) );
					setTimeout( function() {
						location.reload();
					}, 2000 );
				}
				
			},
		} );
	} );
	
	$( document ).on( 'change', '#product-type', function() {
		var this_element = jQuery( this );
		if( this_element.val() === 'training' ) {
			$('.options_group.pricing, .general_tab').show()
			$( 'ul.product_data_tabs li' ).each( function() {
				var this_li = $( this );
				if( this_li.hasClass( 'active' ) ) {
					this_li.removeClass( 'active' );
					
				}
				if ( this_li.hasClass( 'general_options' ) ) {
					this_li.addClass( 'active' );
					$( '#general_product_data' ).show();
					$( '#inventory_product_data' ).hide();
				}
			} );
		}
	} );
	if( $( '#product-type :selected' ).val() === 'training') {
		$('.options_group.pricing, .general_tab').show()
	}
	var pricingPane = $( '#woocommerce-product-data' );
	// productType = $( 'select#product-type' ).val();
	if( pricingPane.length ) {
		console.log( "in ", pricingPane.length );
		pricingPane.find( '.inventory_tab' ).addClass( 'show_if_course' ).end();
		pricingPane.find( '.shipping_tab' ).addClass( 'show_if_simple' ).end();
		var inventory_product_data = $( '#inventory_product_data' );
		if( inventory_product_data.length ) {
			inventory_product_data.find( '._manage_stock_field' ).addClass( 'show_if_course' ).end();
		}
		
	}

	// Click the checkbox to confirm the frontend visibility.
	$( document ).on( 'click', '.toggle-show-in-frontend', function() {
		var this_checkbox = $( this );
		var row_id        = this_checkbox.parents( 'tr' ).attr( 'id' );
		var user_id       = row_id.replace( 'user-', '' );

		// Shoot the AJAX now.
		$.ajax( {
			type: 'POST',
			url: ajaxurl,
			dataType: 'JSON',
			data: {
				action: 'toggle_user_visiblity',
				user_id: user_id,
				show_in_frontend: this_checkbox.is( ':checked' ) ? 'yes' : 'no',
			},
			beforeSend: function() {
				block_element( this_checkbox.parents( 'tr' ) ); // Block element.
			},
			complete: function() {
				unblock_element( this_checkbox.parents( 'tr' ) ); // Unblock element.
			},
			success: function ( response ) {
				// If there is AJAX success.
				if ( 'toggled-show-in-frontend-user' === response.data.code ) {
					// cf_show_notification( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
					console.log( 'mo user visible action.' );
				}
			},
		} );
	} );

	// Click the checkbox to confirm the conference vault access.
	$( document ).on( 'click', '.toggle-access-conference-vault', function() {
		var this_checkbox = $( this );
		var row_id        = this_checkbox.parents( 'tr' ).attr( 'id' );
		var user_id       = row_id.replace( 'user-', '' );

		// Shoot the AJAX now.
		$.ajax( {
			type: 'POST',
			url: ajaxurl,
			dataType: 'JSON',
			data: {
				action: 'toggle_user_conference_vault_access',
				user_id: user_id,
				access_conference_vault: this_checkbox.is( ':checked' ) ? 'yes' : 'no',
			},
			beforeSend: function() {
				block_element( this_checkbox.parents( 'tr' ) ); // Block element.
			},
			complete: function() {
				unblock_element( this_checkbox.parents( 'tr' ) ); // Unblock element.
			},
			success: function ( response ) {
				// If there is AJAX success.
				if ( 'toggled-access-conference-vault-user' === response.data.code ) {
					// cf_show_notification( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
				}
			},
		} );
	} );

	/**
		 * Block element.
		 *
		 * @param {string} element
		 */
	function block_element( element ) {
		element.addClass( 'non-clickable' );
	}

	/**
	 * Unblock element.
	 *
	 * @param {string} element
	 */
	function unblock_element( element ) {
		element.removeClass( 'non-clickable' );
	}
} );
