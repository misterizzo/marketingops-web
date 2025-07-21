/**
 * MarketingOps public JS file.
 */
jQuery( document ).ready( function( $ ) {
	'use strict';

	// Localized variables.
	var ajaxurl                         = Moc_Public_JS_Obj.ajaxurl;
	var plugin_url                      = Moc_Public_JS_Obj.plugin_url;
	var read_text_article               = Moc_Public_JS_Obj.read_text_article;
	var read_text_workshop              = Moc_Public_JS_Obj.read_text_workshop;
	var moc_post_type                   = Moc_Public_JS_Obj.moc_post_type;
	var theme_xh                        = Moc_Public_JS_Obj.theme_path;
	var current_user_id                 = parseInt( Moc_Public_JS_Obj.current_user_id );
	var version_base_time               = Moc_Public_JS_Obj.version_base_time;
	var toast_success_heading           = Moc_Public_JS_Obj.toast_success_heading;
	var toast_error_heading             = Moc_Public_JS_Obj.toast_error_heading;
	var invalid_empty_message           = Moc_Public_JS_Obj.invalid_empty_message;
	var edit_save_btn_text              = Moc_Public_JS_Obj.edit_save_btn_text;
	var edit_save_btn_processing_text   = Moc_Public_JS_Obj.edit_save_btn_processing_text;
	var user_bio_empty_err_msg          = Moc_Public_JS_Obj.user_bio_empty_err_msg;
	var user_wrong_website_url_err_msg  = Moc_Public_JS_Obj.user_wrong_website_url_err_msg;
	var moc_body_class                  = Moc_Public_JS_Obj.moc_body_class;
	var moc_image_extention_is_invalid  = Moc_Public_JS_Obj.moc_image_extention_is_invalid;
	var moc_image_valid_ext             = Moc_Public_JS_Obj.moc_image_valid_ext;
	var maximum_experience_time_limit   = Moc_Public_JS_Obj.maximum_experience_time_limit;
	maximum_experience_time_limit       = parseInt(maximum_experience_time_limit);
	var moc_experience_max_length_err   = Moc_Public_JS_Obj.moc_experience_max_length_err;
	var moc_experience_min_length_err   = Moc_Public_JS_Obj.moc_experience_min_length_err;
	var moc_only_numbers_not_allowed    = Moc_Public_JS_Obj.moc_only_numbers_not_allowed;
	var moc_social_links_err_message    = Moc_Public_JS_Obj.moc_social_links_err_message;
	var moc_social_link_valid_url_err   = Moc_Public_JS_Obj.moc_social_link_valid_url_err;
	var moc_user_wrong_old_password_err = Moc_Public_JS_Obj.moc_user_wrong_old_password_err;
	var is_member_directory_page        = Moc_Public_JS_Obj.is_member_directory_page;
	var is_blog_listings_page           = Moc_Public_JS_Obj.is_blog_listings_page;
	var is_podcast_listings_page        = Moc_Public_JS_Obj.is_podcast_listings_page;
	var current_state_page              = 1;
	var next_page                       = current_state_page + 1;
	var is_training_seach_page          = Moc_Public_JS_Obj.is_training_seach_page;
	var is_training_index_page          = Moc_Public_JS_Obj.is_training_index_page;
	var moc_otp_code                    = Moc_Public_JS_Obj.moc_otp_code;
	var moc_valid_email_error           = Moc_Public_JS_Obj.moc_valid_email_error;
	var moc_valid_username_error        = Moc_Public_JS_Obj.moc_valid_username_error;
	var moc_work_period_invalid         = Moc_Public_JS_Obj.moc_work_period_invalid;
	var password_strength_error         = Moc_Public_JS_Obj.password_strength_error;
	var not_match_password_err          = Moc_Public_JS_Obj.not_match_password_err;
	var moc_otp_expired_duration        = Moc_Public_JS_Obj.moc_otp_expired_duration;
	var moc_otp_expiration_time         = Moc_Public_JS_Obj.moc_otp_expiration_time;
	moc_otp_expired_duration            = parseInt( moc_otp_expired_duration );
	moc_otp_expiration_time             = parseInt( moc_otp_expiration_time );
	var is_no_bs_martech_demos          = Moc_Public_JS_Obj.is_no_bs_martech_demos;
	var moc_no_bs_demo_coupon_page      = Moc_Public_JS_Obj.moc_no_bs_demo_coupon_page;
	var moc_is_singular_nobs_demo       = Moc_Public_JS_Obj.moc_is_singular_nobs_demo;
	var moc_paid_member                 = Moc_Public_JS_Obj.moc_paid_member;
	var moc_free_member                 = Moc_Public_JS_Obj.moc_free_member;
	var wp_logput_url                   = Moc_Public_JS_Obj.wp_logput_url;
	var moc_moops_page                  = Moc_Public_JS_Obj.moc_moops_page;
	var moc_profile_page                = Moc_Public_JS_Obj.moc_profile_page;
	var moc_courses_page                = Moc_Public_JS_Obj.moc_courses_page;
	var moc_postnew_page                = Moc_Public_JS_Obj.moc_postnew_page;
	var moc_home_url                    = Moc_Public_JS_Obj.moc_home_url;
	var moc_signup_url                  = Moc_Public_JS_Obj.moc_signup_url;
	var post_new_page                   = Moc_Public_JS_Obj.post_new_page;
	var member_plan_slug                = Moc_Public_JS_Obj.member_plan_slug;
	var google_recaptcha_sitekey        = Moc_Public_JS_Obj.google_recaptcha_sitekey;
	var google_recaptcha_theme          = Moc_Public_JS_Obj.google_recaptcha_theme;
	var enable_restriction              = Moc_Public_JS_Obj.enable_restriction;
	var member_plan                     = ( 0 === member_plan_slug.length ) ? 'inactive' : ( ( 1 === member_plan_slug.length && -1 !== $.inArray( 'free-membership', member_plan_slug ) ) ? 'free' : 'pro' );
	var crop_modal                      = $('#cropModal');
	var current_page_url                = window.location.origin + window.location.pathname;
	var cropBoxData, canvasData, cropper;

	/**
	 * Task: https://app.clickup.com/t/868ckjtgh
	 * Update the slack invite request form to be open for only paid members.
	 */
	if ( '1' === enable_restriction ) {
		$( '.moc_paid_content_dynamic_restriction_modal' ).addClass( 'active blog_popup' );
		$( '.moc_paid_content_dynamic_restriction_modal .moc_popup_close' ).remove();
	}

	// Conference load more.
	if ( $( '.confernceloadmore' ).length ) {
		// Click on load more to fetch more videos.
		$( document ).on( 'click', '.confernceloadmore button', function() {
			var current_page = parseInt( $( '#current_page' ).val() );
			var next_page = parseInt( $( '#next_page' ).val() );
			var max_pages = parseInt( $( '#max_pages' ).val() );

			// Show the loader.
			if ( $( '.loader_bg' ).length ) {
				$( '.loader_bg' ).css( 'display', 'flex' );
			}

			// Fire the ajax to fetch the videos.
			$.ajax( {
				dataType: 'json',
				url: ajaxurl,
				type: 'POST',
				data: {
					'action': 'more_conf_videos',
					'page': next_page,
					'max_pages': max_pages,
				},
				success: function( response ) {
					if ( 'videos-found' === response.data.code ) {
						// Hide the loader.
						if ( $( '.loader_bg' ).length ) {
							$( '.loader_bg' ).css( 'display', 'none' );
						}

						// Load the HTML.
						$( '.conferencevaultinner_innerright_inner ul' ).append( response.data.html );

						// Set the pagination values.
						$( '#current_page' ).val( next_page );
						$( '#prev_page' ).val( current_page );
						$( '#next_page' ).val( ( next_page + 1 ) );

						// If the load more should be hidden.
						if ( 'yes' === response.data.hide_load_more ) {
							$( '.confernceloadmore' ).remove();
						}
					}
				}
			} );
		} );

		// Filter the videos by pillars.
		if ( $( '.conference_pillars_filter' ).length ) {
			// Click on the pillar to filter the videos.
			$( document ).on( 'click', '.conference_pillars_filter .single_pillar', function() {
				var this_button = $( this );
				var termid      = parseInt( this_button.data( 'termid' ) );

				// Show the loader.
				if ( $( '.loader_bg' ).length ) {
					$( '.loader_bg' ).css( 'display', 'flex' );
				}

				// Fire the ajax to fetch the videos.
				$.ajax( {
					dataType: 'json',
					url: ajaxurl,
					type: 'POST',
					data: {
						'action': 'filter_conf_videos',
						'termid': termid,
						'current_taxonomy': $( '#conf_taxonomy' ).val(),
						'current_taxonomy_term': $( '#conf_taxonomy' ).data( 'term' ),
					},
					success: function( response ) {
						if ( 'videos-found' === response.data.code ) {
							// Hide the loader.
							if ( $( '.loader_bg' ).length ) {
								$( '.loader_bg' ).css( 'display', 'none' );
							}

							// Adjust the active pillar.
							$( '.conference_pillars_filter .single_pillar' ).removeClass( 'moc_selected_taxonomy' );
							this_button.addClass( 'moc_selected_taxonomy' );

							// Load the HTML.
							$( '.conferencevaultinner_innerright_inner ul' ).html( response.data.html );

							// If the load more should be hidden.
							if ( 'yes' === response.data.hide_load_more ) {
								$( '.confernceloadmore' ).remove();
							}
						}
					}
				} );
			} );
		}
	}

	// Open the conference vault popup.
	if ( $( '.conferencevaultinnergridboximage .innerimageboxdescriptions .session-title a' ).length ) {
		$( document ).on( 'click', '.conferencevaultinnergridboximage .innerimageboxdescriptions .session-title a', function() {
			moc_open_conference_vault_restriction_popup( $( this ) );
		} );
	}

	// Open the conference popup.
	if ( $( '.conferencevaultinnergridboximage .openPopupBtn' ).length ) {
		$( document ).on( 'click', '.conferencevaultinnergridboximage .openPopupBtn', function() {
			moc_open_conference_vault_restriction_popup( $( this ) );
		} );
	}

	/**
	 * Open the restriction popup for the conference vault.
	 * This function checks if the video is restricted and opens a popup.
	 * If the video is not restricted, it redirects to the video details page.
	 * It also checks the user's membership level against the required memberships for the video.
	 * If the user does not have the required membership, it shows a popup with details about the restriction.
	 * If the user has the required membership, it redirects to the video details page.
	 * 
	 * @param {jQuery} current_element - The jQuery element that triggered the popup.
	 *
	 * @returns {boolean}
	 */
	function moc_open_conference_vault_restriction_popup( current_element ) {
		var parent_li          = current_element.parents( 'li' );
		var video_post_id      = parent_li.data( 'post' );
		var enable_restriction = parseInt( $( '#hidden-enable-restriction-' + video_post_id ).text() );

		// If the video is not restricted, open the video details page.
		if ( 0 === enable_restriction ) {
			window.location.href = parent_li.data( 'url' );
			return false;
		}

		// Open the restriction popup.
		var required_memberships       = $( '#hidden-popup-required-membership-levels-' + video_post_id ).text();
		var required_memberships_array = JSON.parse( required_memberships );
		var common_membership_levels   = [];
		var i                          = 0;

		// If the required memberships match, then allow the video to open, restrict otherwise.
		common_membership_levels = $.grep( member_plan_slug, function( el ) {
			return $.inArray( el, required_memberships_array ) !== -1;
		} );

		// If the difference is available, means we have to show the popup, not otherwise.
		if ( 0 === common_membership_levels.length || 0 === current_user_id ) {
			var popup_headline                 = $( '#hidden-popup-headline-' + video_post_id ).text();
			var popup_description              = $( '#hidden-popup-description-' + video_post_id ).text();
			var popup_button_title             = $( '#hidden-popup-button-title-' + video_post_id ).text();
			var popup_button_url               = $( '#hidden-popup-button-url-' + video_post_id ).text();
			var popup_footer_text_not_loggedin = $( '#hidden-popup-footer-text-not-loggedin-' + video_post_id ).text();
			var popup_footer_text_loggedin     = $( '#hidden-popup-footer-text-loggedin-' + video_post_id ).text();

			$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content h2' ).html( popup_headline );
			$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content p.main-description' ).html( popup_description );
			$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content a.black_btn' ).attr( 'href', popup_button_url );
			$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content a.black_btn' ).attr( 'href', popup_button_url );
			$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content a.black_btn' ).attr( 'target', '_self' );
			$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content a.black_btn span' ).not( '.icon' ).text( popup_button_title );

			// If the user is loggedin.
			if ( 0 !== current_user_id ) {
				$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content .link_box' ).html( popup_footer_text_loggedin );
			} else {
				$( '.moc_paid_content_dynamic_restriction_modal .contnet_box .popup_content .link_box' ).html( popup_footer_text_not_loggedin );
			}

			// Open the restriction modal.
			$( '.moc_paid_content_dynamic_restriction_modal' ).addClass( 'active blog_popup' );
			return false;
		}

		// Open the video details page.
		window.location.href = parent_li.data( 'url' );
	}

	// Filter the conference main page.
	if ( $( '.conference_tax_filters' ).length ) {
		$( document ).on( 'click', '.conference_tax_filters ul.moc_training_filters li input[type="checkbox"]', function() {
			var filter_checkboxes = [];
			filter_checkboxes     = moc_get_conference_main_filters();
			var search_keyword    = $( 'input[name="conference_main_search_keyword"]' ).val();

			// Put the AJAX to filter the conference video listings.
			$.ajax( {
				dataType: 'json',
				url: ajaxurl,
				type: 'POST',
				data: {
					'action': 'filter_conference_vault_main',
					'filter_checkboxes': filter_checkboxes,
				},
				beforeSend: function() {
					// Show the loader.
					if ( $( '.loader_bg' ).length ) {
						$( '.loader_bg' ).css( 'display', 'flex' );
					}
				},
				success: function( response ) {
					if ( 'videos-found' === response.data.code ) {
						// Load the HTML.
						$( '.conferencevaultinner_innerright' ).html( response.data.html );

						// Generate the URL.
						var filter_url = moc_get_url_for_fiters_conference_vault_main( filter_checkboxes, search_keyword );

						// Put the URL in the address bar.
						window.history.pushState({ path: filter_url },'', filter_url );
					}
				},
				complete: function() {
					// Hide the loader.
					if ( $( '.loader_bg' ).length ) {
						$( '.loader_bg' ).css( 'display', 'none' );
					}
				}
			} );
		} );
	}

	/**
	 * Get the filters from the conference main vault.
	 *
	 * @returns array
	 */
	function moc_get_conference_main_filters() {
		var conf_filters = [];

		// Loop thorugh the conference filters.
		$( '.common_filter_row.conference_tax_filters' ).each( function() {
			var this_section  = $( this );
			var filter_ul     = this_section.find( 'ul.moc_training_filters' );
			var temp_arr_slug = [];
			var temp_arr_id   = [];

			$( filter_ul.find( 'li' ) ).each( function() {
				var this_li         = $( this );
				var filter_checkbox = this_li.find( 'input[type="checkbox"]' );

				// If the filter checkbox is checked, add to the array.
				if ( filter_checkbox.is( ':checked' ) ) {
					temp_arr_slug.push( filter_checkbox.attr( 'id' ) );
					temp_arr_id.push( filter_checkbox.val() );
				}
			} );

			// Gather all the slugs in an array, if any of the term is checked.
			if ( 0 < temp_arr_slug.length ) {
				conf_filters.push(
					{
						'taxonomy': filter_ul.data( 'taxonomy' ),
						'terms': temp_arr_slug,
						'term_ids': temp_arr_id,
					}
				);
			}
		} );

		return conf_filters;
	}

	/**
	 * 
	 * @param {*} filter_checkboxes 
	 * @returns 
	 */
	function moc_get_url_for_fiters_conference_vault_main( filter_checkboxes, search_keyword ) {
		var address_bar_url = current_page_url;

		// Loop through the filter checkboxes.
		$.each( filter_checkboxes, function( index, term_arr ) {
			var tax_name  = term_arr['taxonomy'];
			var tax_terms = term_arr['terms'];

			if ( 0 === index ) {
				address_bar_url += '?' + tax_name + '=' + tax_terms.join( '|' );
			} else {
				address_bar_url += '&' + tax_name + '=' + tax_terms.join( '|' );
			}
		} );

		// Add the search to the URL.
		if ( '' !== search_keyword ) {
			address_bar_url += '&search=' + search_keyword;
		}

		return address_bar_url;
	}

	/**
	 * Search the conference main vault keyword.
	 */
	if ( $( 'input[name="conference_main_search_keyword"]' ).length ) {
		$( document ).on( 'keyup', 'input[name="conference_main_search_keyword"]', function( event ) {
			var this_input = $( this );
			var keycode    = ( event.keyCode ) ? event.keyCode : event.which;

			if ( 13 === keycode ) {
				var filter_checkboxes = moc_get_conference_main_filters();

				// Put the AJAX to filter the conference video listings.
				$.ajax( {
					dataType: 'json',
					url: ajaxurl,
					type: 'POST',
					data: {
						'action': 'filter_conference_vault_main',
						'filter_checkboxes': filter_checkboxes,
						'search_keyword': this_input.val(),
					},
					beforeSend: function() {
						// Show the loader.
						if ( $( '.loader_bg' ).length ) {
							$( '.loader_bg' ).css( 'display', 'flex' );
						}
					},
					success: function( response ) {
						if ( 'videos-found' === response.data.code ) {
							// Load the HTML.
							$( '.conferencevaultinner_innerright' ).html( response.data.html );

							// Generate the URL.
							var filter_url = moc_get_url_for_fiters_conference_vault_main( filter_checkboxes, this_input.val() );

							// Put the URL in the address bar.
							window.history.pushState({ path: filter_url },'', filter_url );
						}
					},
					complete: function() {
						// Hide the loader.
						if ( $( '.loader_bg' ).length ) {
							$( '.loader_bg' ).css( 'display', 'none' );
						}
					}
				} );
			}
		} );
	}

	// Set the timer on the apalooza page.
	if ( $( '.mops-apalooza-timer' ).length ) {
		// Set the date we're counting down to.
		var countDownDate = new Date( "Nov 6, 2023 00:00:00" ).getTime();

		// Update the count down every 1 second
		var x = setInterval(function () {
			// Get today's date and time
			var now = new Date().getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;
			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Output the result in an element with class="mops-apalooza-timer"
			$( '.mops-apalooza-timer ul.countdown-clock li span#days' ).text( days );
			$( '.mops-apalooza-timer ul.countdown-clock li span#hours' ).text( hours );
			$( '.mops-apalooza-timer ul.countdown-clock li span#minutes' ).text( minutes );
			$( '.mops-apalooza-timer ul.countdown-clock li span#seconds' ).text( seconds );

			// Show the timer.
			$( '.mops-apalooza-timer' ).show();

			// If the count down is over, write some text 
			if (distance < 0) {
				clearInterval(x);
				$( '.mops-apalooza-timer' ).hide();
			}
		}, 1000 );

		// Scroll on the button click: buy your pass
		$( document ).on( 'click', '.mops-apalooza-timer .nav-button-container a', function( evt ) {
			evt.preventDefault();
			var offset_deduction = 0;

			// For the mobile devices
			if ( window.matchMedia( "(max-width: 767px)" ).matches ) {
				offset_deduction = 150;
			}

			// Do the scroll.
			$( 'html, body' ).animate({
				scrollTop: $( '.mops_apalooza_product_section' ).offset().top - offset_deduction
			}, 2000 );
		} );
	} 

	if ( 'yes' === moc_profile_page ) {
		$( '.profile_content .box_right .moc_not_changable_container .loader_bg').insertBefore('.box_avatar_content .avatar_title');
	}

	$( document ).on( 'click', '#get_episodes_in_your_Inbox', function( event ) {
		event.preventDefault();
		$( '.moc_moops_tv_popup' ).removeClass( 'non-active' );
		$( '.moc_moops_tv_popup' ).addClass( 'active' );
	} );
	$( document ).on( 'click', '.moc_profile_close', function() {
		moc_close_popup( $( '.moc_iframe_popup' ) );
		moc_close_popup( $( '.moc_moops_tv_popup' ) );
		$( '.moc_popup_embeded_video' ).html('');
		
	} );

	/**
	 * login Poup close
	 */
	$( document ).on(  'click', '.moc_close_login_sticky_popup', function( event ) {
		event.preventDefault();
		$( '.moc_custom_login_popup' ).hide();
	} );

	$( '.elementor-location-header' ).addClass( 'moc_header' );

	/**
	 * For Logout change url.
	 */
	$( 'a.headerlogout' ).attr( 'href', wp_logput_url );
	$( '.moc_custom_logout a' ).each( function() {
		$( this ).attr( 'href', wp_logput_url );
	} );
	
	if ( 'yes' === moc_profile_page ) {
		var target = ( false !== moc_get_query_variable('target') ) ? moc_get_query_variable('target') : '';
		if ( '' !== target ) {
			$('html, body').animate({
				scrollTop: $("#moc_purchased_courses_container").offset().top - 150
			}, 2000);
			setTimeout(function() {
				var uri = window.location.toString();
				if ( uri.indexOf("?") > 0 ) {
					var clean_uri = uri.substring(0, uri.indexOf("?"));
					window.history.replaceState({}, document.title, clean_uri);
				}
			}, 2000 );
			
		}
	}
	
	$('.popup_open_button a').click(function (e) {
		e.preventDefault();
		var this_element = $( this );
		var videourl     = this_element.data( 'videourl' );
		if ( '' !== videourl ) {
			var data = {
				action: 'moc_open_video_popup',
				videourl: videourl,
			};
			$('body').addClass('popup-active');
			$('.moc_home_loader').addClass('show');
			$.ajax({
				dataType: 'json',
				url: ajaxurl,
				type: 'POST',
				data: data,
				success: function(response) {
					if ( 'moc-open-video-course-success' === response.data.code ) {
						$('.moc_iframe_popup').removeClass('non-active').addClass('active');
						$('.moc_home_loader').removeClass('show');
						$( '.moc_popup_embeded_video' ).html( response.data.html );
					}
				}
			} );
		}
		/* $('.moc_home_watch_video').removeClass('non-active').addClass('active');
		$('body').addClass('popup-active'); */
	});

	$('.moc_iframe_popup .popup_close').click(function (e) {
		e.preventDefault();
		$('.moc_iframe_popup').removeClass('active').addClass('non-active');
		$('body').removeClass('popup-active');
	} );

	/**
	 * jQuery to show/hide password.
	 */
	$( document ).on( 'click', '.moc_pass_icon', function( event ) {
		event.preventDefault();
		var this_icon = $( this );
		if ( this_icon.hasClass( 'moc_show_password' ) ) {
			this_icon.removeClass( 'moc_show_password' );
			this_icon.addClass( 'moc_hide_password' );
			this_icon.closest( '.moc-password-element' ).find( 'input[type="text"]' ).attr( 'type', 'password' );
			this_icon.find( 'img' ).attr( 'src', plugin_url + '/public/images/password_unhide_icon.svg' );
			this_icon.find( 'img' ).attr( 'alt', 'password_hide' );
		} else {
			this_icon.removeClass( 'moc_hide_password' );
			this_icon.addClass( 'moc_show_password' );
			this_icon.closest( '.moc-password-element' ).find( 'input[type="password"]' ).attr( 'type', 'text' );
			this_icon.find( 'img' ).attr( 'src', plugin_url + '/public/images/password_hide_icon.svg' );
			this_icon.find( 'img' ).attr( 'alt', 'password_unhide' );
		}

	} );
	
	/**
	 * jQuery to return quantuty Plus or Minus on product single page.
	 */
	$( document ).on( 'click', 'form.cart button.plus, form.cart button.minus', function() {
		var this_btn = $( this );
		var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
		moc_qty_plus_minus_input( qty, this_btn );
	});

	/**
	 * jQuery to return quantuty Plus or Minus on cart page.
	 */
	$( document ).on( 'click', '.woocommerce-cart-form button.plus, .woocommerce-cart-form button.minus', function() {
		var this_btn = $( this );
		var qty = $( this ).closest( '.quantity' ).find( '.qty' );
		moc_qty_plus_minus_input( qty, this_btn );
		$("button[name='update_cart']").removeAttr('disabled');
		$("button[name='update_cart']").trigger("click");
		
	});
	/**
	 * jQuery to return add class in body.
	 */
	$('body').addClass(moc_body_class);

	/**
	 * jQuery to represent remove span elements on focus of search box.
	 */
	jQuery(document).on('focus', '#search_keywords', function() {
		$('.moc_jobs_count_value_div').remove();
	});

	/**
	 * jQuery to represent remove span elements on focus of search box.
	 */
	jQuery(document).on('focus', '#search_keywords', function() {
		$('.moc_members_count_value_div').remove();
	});

	/**
	 * jQuery to run function for range slider.
	 */
	moc_on_load_slider_js();

	/**
	 * jQuery to replace value on click.
	 */
	$(document).on('keyup', 'input[name="moc_experience"]', function() {
		var v = $(this).val().replace(/[^0-9\.]/g, ''); // Remove non-numerics
		// var v =	$(this).val().replace(/([a-zA-Z ])/g, ''); // Remove non-numerics
		$(this).val(v);
	});

	/**
	 * jQuery to replace value on click.
	 */
	$(document).on('keyup', 'input[name="moc_cl_experience"]', function() {
		var v = $(this).val().replace(/[^0-9\.]/g, ''); // Remove non-numerics
		$(this).val(v);
	});

	/**
	 * jQuery to replace value on click.
	 */
	$( document ).on ( 'keyup', '.moc_post_your_jon #job_salary', function() {
		var v = $(this).val().replace(/[^0-9\.]/g, ''); // Remove non-numerics
		$(this).val(v);
	} );
	
	/**
	 * jQuery to represent time for read any document of webpage.
	 */
	jQuery(function() {
		if ('post' === moc_post_type || 'workshop' === moc_post_type) {
			var read_text = ('post' === moc_post_type) ? read_text_article : read_text_workshop;
			var txt = jQuery(".moc_post_content").text();
			var wordCount = txt.replace(/[^\w ]/g, "").split(/\s+/).length;
			var readingTimeInMinutes = Math.floor(wordCount / 228) + 1;
			var readingTimeAsString = readingTimeInMinutes + " " + read_text;
			jQuery('#moc_post_info ul').append('<li class="elementor-icon-list-item elementor-repeater-item-6e4827c elementor-inline-item" itemprop="datePublished"><span class="elementor-icon-list-text elementor-post-info__item elementor-post-info__item--type-date"><span class="elementor-post-info__item-prefix"> · </span> ' + readingTimeAsString + '</span></li>');
		}

	});

	/**
	 * jQuery to load time css for iframes. 
	 */ 
	$( window ).on( "load", function() {
		block_element($( '.moc_event_page .loader_bg' ));
		setTimeout(function() {
			$('iframe').each(function() {
				function injectCustomAssets() {
					$iframe.contents().find( 'head' ).append(
						$( '<link/>', { rel: 'stylesheet', href: plugin_url + "public/css/moc-custom-iframe.css?ver=" + version_base_time, type: 'text/css' } ),
						// $( '<script/>', { src: plugin_url + "public/js/marketing-ops-core-iframe.js?ver=" + version_base_time, type: 'text/javascript' } )
					);
				}
				var $iframe = $( this );
				$iframe.on( 'load', injectCustomAssets );
				injectCustomAssets();
			});
			unblock_element($( '.moc_event_page .loader_bg' ));
		}, 2500);
		
		
		if ('yes' === is_blog_listings_page) {
			moc_equal_heights($('.blog_box'));
			moc_equal_heights($('.box_content'));
		}
		if ('yes' === is_podcast_listings_page) {
			moc_equal_heights($('.blog_box'));
			moc_equal_heights($('.box_content'));
		}
	});

	/**
	 * jQuery to unchecked any checkbox on job type while other checkbox enable.
	 */
	jQuery(document).on('click', '.job_types input[name="filter_job_type[]"]', function() {
		$("#any_type").prop('checked', false);
	});

	
	/**
	 * jQuery to unchecked any checkbox on job type while other checkbox enable.
	 */
	jQuery(document).on('click', '.search_jobexperiences input[name="filter_by_experiences[]"]', function() {
		$("#any_marketing_automation_experience").prop('checked', false);
	});
	
	/**
	 * jQuery to unchecked other checkbox on job type while any checkbox enable.
	 */
	jQuery(document).on('click', '#any_type', function() {
		$('.job_types input[name="filter_job_type[]').prop('checked', false);
	});

	/**
	 * jQuery to unchecked other checkbox on job type while any checkbox enable.
	 */
	jQuery(document).on('click', '#any_marketing_automation_experience', function() {
		$('.search_jobexperiences input[name="filter_by_experiences[]').prop('checked', false);
	});

	
	/**
	 * jQuery to unchecked any checkbox on job role while other checkbox enable.
	 */
	jQuery(document).on('click', '.search_jobroles input[name="filter_by_role[]"]', function() {
		$("#job_any_role").prop('checked', false);
	});

	
	/**
	 * jQuery to unchecked other checkbox on job role while any checkbox enable.
	 */
	jQuery(document).on('click', '#job_any_role', function() {
		$('.search_jobroles input[name="filter_by_role[]').prop('checked', false);
	});

	/**
	 * jQuery to get job counts while job listings on base of search.
	 */
	$(document).ajaxComplete(function() {
		if ($('.moc_founded_jobs').length) {
			var count_value = $('.moc_founded_jobs').val();
			if (1 < count_value) {
				$('.moc_jobs_count_value').text(count_value + ' jobs found');
			} else {
				$('.moc_jobs_count_value').text(count_value + ' job found');
			}
		}
	});

	/**
	 * jQuery for add clone for Social medial icons.
	 */
	$(document).on('click', '.add_more_social_media', function(event) {
		event.preventDefault();
		var this_element = $(this);
		var data = {
			action: 'moc_user_social_links_empty_html_request',
		};
		block_element(this_element.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketing-social-links-add-empty-html' === response.data.code) {
					$(response.data.html).appendTo('.moc_social_link_section');
					unblock_element($('.loader_bg'));
					moc_on_load_slider_js();
				}

			},
		});
	});

	
	if ( 'yes' === moc_profile_page ) {
		input_radio_checkbox();
	}

	/**
	 * jQuery for add clone for Social medial icons.
	 */
	$(document).on('click', '.add_more_martech_section', function(event) {
		event.preventDefault();
		var this_element = $(this);
		var data = {
			action: 'moc_user_martech_tools_experience_empty_html_request',
		};
		block_element(this_element.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketing-martech-add-empty-html' === response.data.code) {
					$(response.data.html).appendTo('.moc_martech_main_section');
					unblock_element($('.loader_bg'));
					moc_on_load_slider_js();
					input_radio_checkbox();
				}

			},
		});

	});

	/**
	 * jQuery for add clone for Social medial icons.
	 */
	$(document).on('click', '.add_more_skill_section', function(event) {
		event.preventDefault();
		var this_element = $(this);
		var data = {
			action: 'moc_user_skill_empty_html_request',
		};
		block_element(this_element.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketing-skill-add-empty-html' === response.data.code) {
					$(response.data.html).appendTo('.moc_skill_main_section');
					unblock_element($('.loader_bg'));
					moc_on_load_slider_js();
				}

			},
		});
	});

	/**
	 * jQuery for add clone for Social medial icons.
	 */
	$(document).on('click', '.add_more_work_section', function(event) {
		event.preventDefault();
		var this_element = $(this);
		var data = {
			action: 'moc_user_work_section_empty_html_request',
		};
		block_element(this_element.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketing-work-add-empty-html' === response.data.code) {
					$(response.data.html).appendTo('.moc_repeated_work_section_container');
					unblock_element($('.loader_bg'));
					moc_on_load_slider_js();
				}

			},
		});
	});

	// jQuery for delete items.
	$(document).on('click', '.moc_basic_details_module .delete_icon', function() {
		$(this).closest('.moc_social_links').remove();
	});

	// jQuery for delete items.
	$(document).on('click', '.moc_martech_main_section .delete_icon', function() {
		$(this).closest('.moc_martech_inner_section').remove();
	});

	// jQuery for delete items.
	$(document).on('click', '.moc_skill_main_section .delete_icon', function() {
		$(this).closest('.moc_inner_skill_section').remove();
	});

	// jQuery for delete items.
	$(document).on('click', '.moc_work_main_section .delete_icon', function() {
		$(this).closest('.moc_repeated_work_section').remove();
	});


	// jQuery for toogle social icons dropdown.
		// jQuery for toogle social icons dropdown On Hover.
		$('.moc_social_icons').hover(function(){
			}, function(){
			var this_element = $(this);
			this_element.find('.moc_social_icons_list').removeClass('open');
		});

		// jQuery for toogle social icons dropdown On Click.
		$(document).on('click', '.moc_social_icons', function() {
			var this_element = $(this);
			if(this_element.find('.moc_social_icons_list').hasClass('open')){
				this_element.find('.moc_social_icons_list').removeClass('open');
			} else{
				$('.moc_social_icons_list').removeClass('open');
				this_element.find('.moc_social_icons_list').addClass('open');
			}
		});
	
	// jQuery for active selected icons.
	$(document).on('click', '.moc_social_icons_list li', function() {
		var this_element = $(this);
		var selected_icon = this_element.data('icons');
		var social_url = this_element.data('socialurl');
		var domain_url = this_element.data('domainlink');
		var social_inputrow = this_element.closest('div.moc_social_links').find('.social_input');
		social_inputrow.attr('placeholder', social_url);
		social_inputrow.attr('value', domain_url);
		var closest_parent_li = $(this).closest('ul.moc_social_icons').find('li.active');
		var active_icon = closest_parent_li;
		var active_icon_class = $(active_icon).data('activeicon');
		closest_parent_li.data('activeicon', selected_icon);
		closest_parent_li.attr('id', selected_icon);
		closest_parent_li.removeClass(active_icon_class);
		closest_parent_li.addClass(selected_icon);
	});

	// jQuery for adding save ajax for basic details.
	$(document).on('click', '.moc_general_user_info .moc_save_basic_info', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		this_btn.text(edit_save_btn_processing_text);
		var user_id = current_user_id;
		var user_first_name = $('input[name="moc_first_name"]').val();
		var user_last_name = $('input[name="moc_last_name"]').val();
		var user_email = $('input[name="moc_email"]').val();
		var user_o_password = $('input[name="moc_old_password"]').val();
		var user_n_password = $('input[name="moc_new_password"]').val();
		var process_execute = true;
		var password_flag = true;
		$('.moc_error span').text('');

		// validation.

		// For First Name.
		if ('' === user_first_name) {
			$('input[name="moc_first_name"]').closest('div').find('.moc_error.moc_first_name_err span').text(user_bio_empty_err_msg);
			process_execute = false;
		}
		if ('' !== user_first_name && -1 === is_valid_string(user_first_name)) {
			$('input[name="moc_first_name"]').closest('div').find('.moc_error.moc_first_name_err span').text(moc_only_numbers_not_allowed);
			process_execute = false;
		}

		// For Last Name.
		if ('' === user_last_name) {
			$('input[name="moc_last_name"]').closest('div').find('.moc_error.moc_last_name_err span').text(user_bio_empty_err_msg);
			process_execute = false;
		}
		if ('' !== user_last_name && -1 === is_valid_string(user_last_name)) {
			$('input[name="moc_last_name"]').closest('div').find('.moc_error.moc_last_name_err span').text(moc_only_numbers_not_allowed);
			process_execute = false;
		}

		// For Email.
		if ('' === user_email) {
			$('input[name="moc_email"]').closest('div').find('.moc_error.moc_email_err span').text(user_bio_empty_err_msg);
			process_execute = false;
		}
		if ('' !== user_email && -1 === is_valid_email(user_email)) {
			$('input[name="moc_email"]').closest('div').find('.moc_error.moc_email_err span').text( moc_valid_email_error );
			process_execute = false;
		}

		// For Check Confirm password and password is same or not.
		if ('' !== user_o_password && '' === user_n_password) {
			$('input[name="moc_new_password"]').closest('div').find('.moc_error.moc_new_password_err span').text(user_bio_empty_err_msg);
			process_execute = false;
			password_flag = false;
		}

		// Final call validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_btn.text(edit_save_btn_text);
			unblock_element($('.loader_bg'));
			return false;
		}

		var data = {
			action: 'moc_save_general_info',
			user_id: user_id,
			user_first_name: user_first_name,
			user_last_name: user_last_name,
			user_email: user_email,
			user_o_password: user_o_password,
			user_n_password: user_n_password,
		};
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-save-user-general-info' === response.data.code) {
					this_btn.closest('.moc_not_changable_container').find('.box_about_content').removeClass('moc_doing_edit_section');
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					$('.moc_general_user_info').html(response.data.html);
					$('.profile_name .gradient-title').text(response.data.user_name);
					setTimeout(function() {
						window.location.href = response.data.redirect_url;
					}, 2000);

				} else {
					$('input[name="moc_old_password"]').closest('div').find('.moc_error.moc_new_password_err span').text(moc_user_wrong_old_password_err);
					moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, response.data.toast_message);
				}
				this_btn.text(edit_save_btn_text);
				unblock_element($('.loader_bg'));
				$('body').removeClass('moc_doing_edit');
				$('body').addClass(moc_body_class);

			},
		});
	});

	// Update the member basic details.
	$( document ).on( 'click', '.moc_basic_details_module .btn_save', function( event ) {
		event.preventDefault();

		var this_btn = $( this );
		this_btn.text( edit_save_btn_processing_text );

		var user_id           = current_user_id;
		var user_bio          = $( '.user_bio' ).val();
		var user_website      = $( '.user_website' ).val();
		var active_icon       = $( '.social_icons li.active' );
		var active_icon_class = $( active_icon ).data( 'activeicon' );
		var jsd               = $( '#moc_job_seeker_details' ).val();
		var cheked_industries = [];
		var process_execute   = true;
		$( '.moc_error span' ).text('');
		$( 'input[name="industry_experience[]"]:checked' ).each( function() {
			var value_industries = $( this ).val();
			cheked_industries.push( value_industries );
		} );
		var social_media_row = $( '.moc_social_links' );
		var social_media_arr = [];

		// Validation Error.
		social_media_row.each( function() {
			var social_div = $( this ).closest( '.moc_social_links' ).find( '.moc_social_icons_div' );
			var social_tag = social_div.closest( '.moc_social_links' ).find( 'li.active' ).attr( 'id' );
			var social_val = $( this ).closest( '.moc_social_links' ).find( 'input.social_input' ).val();

			if ( -1 === social_val.indexOf( social_tag ) ) {
				$( this ).closest( '.moc_social_links' ).find( '.moc_error.moc_social_links_err span' ).text( moc_social_link_valid_url_err );
				process_execute = false;
			}

			if ( -1 === is_valid_url( social_val ) ) {
				$( this ).closest( '.moc_social_links' ).find( '.moc_error.moc_social_links_err span' ).text( moc_social_links_err_message );
				process_execute = false;
			}

			if ( '' === social_val ) {
				$( this ).closest( '.moc_social_links' ).find( '.moc_error.moc_social_links_err span' ).text( user_bio_empty_err_msg );
				process_execute = false;
			}

			if ( '' !== social_val && true === process_execute ) {
				social_media_arr.push( {
					tag: social_tag,
					val: social_val
				} );
			}
		} );

		if ( '' === user_bio ) {
			$( '.user_bio' ).closest( 'div' ).find( '.moc_error.moc_user_bio_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}

		if ( -1 === is_valid_url( user_website ) && '' !== user_website ) {
			$( '.user_website' ).closest( 'div' ).find( '.moc_error.moc_user_website_err span' ).text( user_wrong_website_url_err_msg );
			process_execute = false;
		}

		if ( false === process_execute ) {
			moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message );
			this_btn.text( edit_save_btn_text );
			unblock_element( $( '.loader_bg' ) );
			return false;
		}

		// Show the loader.
		block_element( this_btn.closest( 'div.moc_not_changable_container' ).find( '.loader_bg' ) );

		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_save_basic_details',
				user_id: user_id,
				user_bio: user_bio,
				active_icon_class: active_icon_class,
				user_website: user_website,
				social_media_arr: social_media_arr,
				cheked_industries: cheked_industries,
				jsd: jsd,
			},
			success: function( response ) {
				if ( 'marketinops-save-user-basic-info' !== response.data.code ) {
					return false;
				}

				// Process the ajax response.
				moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message ); // Show the error message.
				this_btn.closest( '.moc_not_changable_container' ).find( '.box_about_content' ).removeClass( 'moc_doing_edit_section' );
				$( '.moc_user_bio_container' ).html( response.data.html );
				this_btn.text( edit_save_btn_text );
				unblock_element( $( '.loader_bg' ) );
				$( 'body' ).removeClass( 'moc_doing_edit' ).addClass( moc_body_class );
			},
		} );
	} );

	// jQuery for adding save ajax for martech details.
	$( document ).on( 'click', '.moc_user_martech_tools_experience_save_btn', function( event ) {
		event.preventDefault();
		var this_btn = $( this );
		this_btn.text( edit_save_btn_processing_text );
		var user_id         = current_user_id;
		var moc_all_data    = [];
		var process_execute = true;
		$( '.moc_error span' ).text('');
		$( '.moc_martech_inner_section' ).each( function() {
			var this_element    = $( this );
			var main_platform   = this_element.find( 'input[name="main_platform"]' ).val();
			var moc_experience  = this_element.find( 'input[name="moc_experience"]' ).val();
			var moc_skill_level = this_element.find( 'input[name="moc_skill_level"]' ).val();
			var moc_exp_descp   = this_element.find( 'textarea[name="moc_exp_description"]' ).val();
			var make_primary    = this_element.find( 'input[name="main_this_cat"]' );
			var primary_value   = 'no';

			if ( true === make_primary.is( ':checked' ) ) {
				primary_value = 'yes';
			}

			if ( -1 === is_valid_string( main_platform ) ) {
				process_execute = false;
				this_element.find('input[name="main_platform"]').closest('div').find('.moc_error.moc_user_marktech_platform_err span').text(moc_only_numbers_not_allowed);
			}
			if ('' === main_platform) {
				process_execute = false;
				this_element.find('input[name="main_platform"]').focus();
				this_element.find('input[name="main_platform"]').closest('div').find('.moc_error.moc_user_marktech_platform_err span').text(user_bio_empty_err_msg);
			}
			if (maximum_experience_time_limit < moc_experience) {
				process_execute = false;
				this_element.find('input[name="moc_experience"]').closest('div').find('.moc_error.moc_user_marktech_exp_err span').text(moc_experience_max_length_err);
			}
			if (0 >= moc_experience) {
				process_execute = false;
				this_element.find('input[name="moc_experience"]').closest('div').find('.moc_error.moc_user_marktech_exp_err span').text(moc_experience_min_length_err);
			}
			if ('' === moc_experience) {
				process_execute = false;
				if ('' !== main_platform) {
					this_element.find('input[name="moc_experience"]').focus();
				}
				this_element.find('input[name="moc_experience"]').closest('div').find('.moc_error.moc_user_marktech_exp_err span').text(user_bio_empty_err_msg);
			}
			moc_experience = Math.round(moc_experience * 10) / 10;


			// Validations
			if ('' !== main_platform && '' !== moc_experience) {
				moc_all_data.push({
					platform: main_platform,
					experience: moc_experience,
					skill_level: moc_skill_level,
					exp_descp: moc_exp_descp,
					primary_value: primary_value,
				});
			}
		} );

		// Final call for validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_btn.text(edit_save_btn_text);
			return false;
		}

		// Activate the loader.
		block_element( this_btn.closest( 'div.moc_not_changable_container' ).find( '.loader_bg' ) );

		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_save_martech_tool_experience',
				user_id: user_id,
				moc_all_data: moc_all_data,
			},
			success: function( response ) {
				if ( 'marketinops-save-martech' === response.data.code ) {
					moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
					this_btn.closest( '.moc_not_changable_container' ).find( '.box_about_content' ).removeClass( 'moc_doing_edit_section' );
					$( '.moc_user_martech_section_container' ).html( response.data.html );
					this_btn.text( edit_save_btn_text );
					unblock_element( $( '.loader_bg' ) );
					$( 'body' ).removeClass( 'moc_doing_edit' ).addClass( moc_body_class );
					$( '.moc_basic_details_module .btn_save' ).trigger( 'click' );
				}
			},
		} );
	} );

	// jQuery for adding save ajax for skill details.
	$(document).on('click', '.moc_user_skill_save_btn', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		this_btn.text(edit_save_btn_processing_text);
		var user_id = current_user_id;
		var moc_cl_all_data = [];
		var process_execute = true;
		$('.moc_error span').text('');
		$('.moc_inner_skill_section').each(function() {
			var this_element = $(this);
			var moc_coding_language = this_element.find('input[name="moc_coding_language"]').val();
			var moc_cl_experience = this_element.find('input[name="moc_cl_experience"]').val();
			var moc_cl_skill_level = this_element.find('input[name="moc_cl_skill_level"]').val();

			// Validations

			if (-1 === is_valid_string(moc_coding_language)) {
				process_execute = false;
				this_element.find('input[name="moc_coding_language"]').closest('div').find('.moc_error.moc_user_cl_err span').text(moc_only_numbers_not_allowed);

			}
			if ('' === moc_coding_language) {
				process_execute = false;
				this_element.find('input[name="moc_coding_language"]').focus();
				this_element.find('input[name="moc_coding_language"]').closest('div').find('.moc_error.moc_user_cl_err span').text(user_bio_empty_err_msg);
			}
			if (maximum_experience_time_limit < moc_cl_experience) {
				process_execute = false;
				this_element.find('input[name="moc_cl_experience"]').closest('div').find('.moc_error.moc_user_cl_exp_err span').text(moc_experience_max_length_err);
			}
			if (0 >= moc_cl_experience) {
				process_execute = false;
				this_element.find('input[name="moc_cl_experience"]').closest('div').find('.moc_error.moc_user_cl_exp_err span').text(moc_experience_min_length_err);
			}
			if ('' === moc_cl_experience) {
				process_execute = false;
				if ('' !== moc_coding_language) {
					this_element.find('input[name="moc_cl_experience"]').focus();
				}
				this_element.find('input[name="moc_cl_experience"]').closest('div').find('.moc_error.moc_user_cl_exp_err span').text(user_bio_empty_err_msg);
			}
			moc_cl_experience = Math.round(moc_cl_experience * 10) / 10;
			// Validations
			if ('' !== moc_coding_language && '' !== moc_cl_experience) {
				moc_cl_all_data.push({
					cl_platform: moc_coding_language,
					cl_experience: moc_cl_experience,
					cl_skill_level: moc_cl_skill_level,
				});
			}
		});

		// Validations
		// if( 0 === moc_cl_all_data.length ) {
		// 	process_execute = false;
		// }

		// Final call for validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_btn.text(edit_save_btn_text);
			return false;
		}
		var data = {
			action: 'moc_save_coding_language_skill',
			user_id: user_id,
			moc_cl_all_data: moc_cl_all_data,
		};
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-save-skill' === response.data.code) {
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					this_btn.closest('.moc_not_changable_container').find('.box_about_content').removeClass('moc_doing_edit_section');
					$('.moc_user_skill_section').html(response.data.html);
					this_btn.text(edit_save_btn_text);
					unblock_element($('.loader_bg'));
					$('body').removeClass('moc_doing_edit');
					$('body').addClass(moc_body_class);
				}
			},
		});
	});

	$(document).on('click', 'input[name="moc_at_present"]', function() {
		var at_present = $(this);
		at_present.each(function() {
			var this_element = $(this);
			if (this_element.is(':checked')) {
				this_element.closest('div.moc_repeated_work_section').find('.years_month span').removeClass('moc_display_end_date');
				this_element.closest('div.moc_repeated_work_section').find('.years_month span').addClass('moc_not_display_end_date');
				this_element.closest('div.moc_repeated_work_section').find('.years_month .end_year select').val('');
				this_element.closest('div.moc_repeated_work_section').find('.end_year').removeClass('moc_display_end_date');
				this_element.closest('div.moc_repeated_work_section').find('.end_year').addClass('moc_not_display_end_date');

			} else {
				this_element.closest('div.moc_repeated_work_section').find('.years_month span').removeClass('moc_not_display_end_date');
				this_element.closest('div.moc_repeated_work_section').find('.years_month span').addClass('moc_display_end_date');
				this_element.closest('div.moc_repeated_work_section').find('.years_month .end_year select').val('');
				this_element.closest('div.moc_repeated_work_section').find('.years_month .end_year').removeClass('moc_not_display_end_date');
				this_element.closest('div.moc_repeated_work_section').find('.years_month .end_year').addClass('moc_display_end_date');
			}
		});

	});

	$(document).on('change', '.moc_start_month', function() {
		var this_element = $(this);
		var start_month = this_element.val();
		var year_value = this_element.closest('div.years_month').find('.moc_start_year').val();
		if ('' === year_value || '' === start_month) {
			this_element.closest('div.years_month').find('.end_year').addClass('disabled');
		} else {
			this_element.closest('div.years_month').find('.end_year').removeClass('disabled');
		}
	});


	$(document).on('change', '.moc_start_year', function() {
		var this_element = $(this);
		var start_year = parseInt(this_element.val());
		var close_end_year_option = this_element.closest('div.years_month').find('.moc_end_year option');
		// each loop
		close_end_year_option.each(function() {
			var this_option = $(this);
			var end_year = parseInt(this_option.val());
			if (end_year < start_year) {
				this_option.remove();
			}
		});
		var month_value = this_element.closest('div.years_month').find('.moc_start_month').val();
		if ('' === month_value || '' === start_year) {
			this_element.closest('div.years_month').find('.end_year').addClass('disabled');
		} else {
			this_element.closest('div.years_month').find('.end_year').removeClass('disabled');
		}
	});




	// jQuery for adding save ajax for work details.
	$(document).on('click', '.moc_user_work_section_save_btn', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		this_btn.text(edit_save_btn_processing_text);
		var user_id = current_user_id;
		var moc_work_data = [];
		var process_execute = true;
		$('.moc_error span').text('');
		$('.moc_repeated_work_section').each(function() {
			var this_element = $(this);
			var moc_work_company = this_element.find('input[name="moc_work_company"]').val();
			var moc_work_position = this_element.find('input[name="moc_work_position"]').val();
			var moc_start_mm = this_element.find('.moc_start_month').val();
			var moc_start_yyyy = this_element.find('.moc_start_year').val();
			var moc_end_mm = this_element.find('.moc_end_month').val();
			var moc_end_yyyy = this_element.find('.moc_end_year').val();
			var moc_work_website = this_element.find('input[name="moc_work_website"]').val();
			var moc_at_present_val = '';
			if (this_element.find('input[name="moc_at_present"]').is(':checked')) {
				moc_at_present_val = 'yes';
				this_element.find('input[name="moc_work_company_end_md"]').val('');
			} else {
				moc_at_present_val = 'no';
			}

			// Validations
			if ('' === moc_work_company) {
				process_execute = false;
				this_element.find('input[name="moc_work_company"]').focus();
				this_element.find('input[name="moc_work_company"]').closest('div').find('.moc_error.moc_user_work_company_err span').text(user_bio_empty_err_msg);
			}
			if ('' === moc_work_position) {
				process_execute = false;
				this_element.find('input[name="moc_work_position"]').focus();
				this_element.find('input[name="moc_work_position"]').closest('div').find('.moc_error.moc_user_work_company_pos_err span').text(user_bio_empty_err_msg);
			}
			if (-1 === is_valid_url(moc_work_website)) {
				process_execute = false;
				this_element.find('input[name="moc_work_website"]').focus();
				this_element.find('input[name="moc_work_website"]').closest('div').find('.moc_error.moc_user_work_company_website_err span').text(user_wrong_website_url_err_msg);
			}
			if ('' === moc_work_website) {
				process_execute = false;
				this_element.find('input[name="moc_work_website"]').focus();
				this_element.find('input[name="moc_work_website"]').closest('div').find('.moc_error.moc_user_work_company_website_err span').text(user_bio_empty_err_msg);
			}
			if ('' === moc_start_mm) {
				process_execute = false;
				this_element.find('.moc_start_month').closest('.years_month').find('.moc_error.moc_wrong_month_err span').text(user_bio_empty_err_msg);
				// this_element.find('.start_year').css( 'border', '1px solid red' );
			}
			if ('' === moc_start_yyyy) {
				$('.moc_wrong_month_err span').text('');
				this_element.find('.moc_start_year').closest('.years_month').find('.moc_error.moc_wrong_month_err span').text(user_bio_empty_err_msg);
				process_execute = false;
				// this_element.find('.start_year').css( 'border', '1px solid red' );
			}
			if (!this_element.find('input[name="moc_at_present"]').is(':checked') && '' === moc_end_mm) {
				process_execute = false;
				$('.moc_wrong_month_err span').text('');
				this_element.find('.moc_end_month').closest('.years_month').find('.moc_error.moc_wrong_month_err span').text(user_bio_empty_err_msg);

				// this_element.find('.end_year').css( 'border', '1px solid red' );
			}
			if (!this_element.find('input[name="moc_at_present"]').is(':checked') && '' === moc_end_yyyy) {
				$('.moc_wrong_month_err span').text('');
				process_execute = false;
				this_element.find('.moc_end_year').closest('.years_month').find('.moc_error.moc_wrong_month_err span').text(user_bio_empty_err_msg);
				// this_element.find('.end_year').css( 'border', '1px solid red' );
			}
			if ((moc_start_yyyy === moc_end_yyyy) && (moc_start_mm > moc_end_mm)) {
				process_execute = false;
				$('.moc_wrong_month_err span').text('');
				this_element.find('.moc_end_month').closest('.years_month').find('.moc_error.moc_wrong_month_err span').text( moc_work_period_invalid );
				// this_element.find('.end_year').css( 'border', '1px solid red' );
			}

			if ('' !== moc_work_company && '' !== moc_work_position || '' !== moc_start_mm || '' !== moc_start_yyyy || '' !== moc_work_website) {
				moc_work_data.push({
					work_company: moc_work_company,
					work_position: moc_work_position,
					work_moc_start_mm: moc_start_mm,
					work_moc_start_yyyy: moc_start_yyyy,
					work_moc_end_mm: moc_end_mm,
					work_moc_end_yyyy: moc_end_yyyy,
					work_website: moc_work_website,
					moc_at_present_val: moc_at_present_val,
				});
			}
		});

		// Validations
		// if( 0 === moc_work_data.length ) {
		// 	process_execute = false;

		// }

		// Final call for validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_btn.text(edit_save_btn_text);
			return false;
		}
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		var data = {
			action: 'moc_save_work_data',
			user_id: user_id,
			moc_work_data: moc_work_data,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-save-work' === response.data.code) {
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					this_btn.closest('.moc_not_changable_container').find('.box_about_content').removeClass('moc_doing_edit_section');
					$('.moc_work_section').html(response.data.html);
					this_btn.text(edit_save_btn_text);
					unblock_element($('.loader_bg'));
					$('body').removeClass('moc_doing_edit');
					$('body').addClass(moc_body_class);
				}

			},
		});
	});

	$(document).on('change', '#moc_certificate', function() {
		var certificate = $(this).val();
		if ('other' === certificate) {
			$('.moc_user_certificate_save_btn').css('display', 'none');
			moc_open_popup($('.moc_add_custom_certificate'));
			$('#moc_add_custom_certificate_subject').text('');
			$('#moc_add_custom_certificate_description').text('');
			$('.moc_error span').text('');
			$('#moc_add_custom_certificate_subject').css('border', '1px solid #E7EFEF');
			$('#moc_add_custom_certificate_description').css('border', '1px solid #E7EFEF');
		} else {
			$('.moc_user_certificate_save_btn').css('display', 'block');
		}
	});

	// jQuery for adding save ajax for saving certificates.
	$(document).on('click', '.moc_user_certificate_save_btn', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		this_btn.text(edit_save_btn_processing_text);
		var user_id = current_user_id;
		var certificate = $('#moc_certificate').val();
		if ('other' === certificate) {
			return false;
		}
		var data = {
			action: 'moc_save_certificate',
			user_id: user_id,
			certificate: certificate,
		};
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-added-certificate' === response.data.code) {
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					this_btn.closest('.moc_not_changable_container').find('.box_about_content').removeClass('moc_doing_edit_section');
					$('.moc_certification_section').html(response.data.html);
					$('.moc_sidebar_certificates').html(response.data.side_bar_html);
					$('.box_certi_content').removeClass('moc_not_display_certificate_section');

				} else if ('marketinops-alreay-exist-certificate' === response.data.code) {
					moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, response.data.toast_message);
				}
				this_btn.text(edit_save_btn_text);
				unblock_element($('.loader_bg'));
				$('body').removeClass('moc_doing_edit');
				$('body').addClass(moc_body_class);

			},
		});

	});

	// jQuery for delete ajax for delete certificates.
	$(document).on('click', '.moc_delete_certificate', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		var user_id = current_user_id;
		var certificate_id = this_btn.data('certificateid');
		var data = {
			action: 'moc_delete_certificate',
			user_id: user_id,
			certificate_id: certificate_id,
		};
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-deleted-certificate' === response.data.code) {
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					this_btn.closest('.moc_not_changable_container').find('.box_about_content').removeClass('moc_doing_edit_section');
					$('.moc_certification_section').html(response.data.html);
					$('.moc_sidebar_certificates').html(response.data.side_bar_html);
					$('.box_certi_content').addClass(response.data.added_class);
					this_btn.text(edit_save_btn_text);
					unblock_element($('.loader_bg'));
					$('body').removeClass('moc_doing_edit');
					$('body').addClass(moc_body_class);
				}

			},
		});
	});
	if ( 'yes' === moc_profile_page || 'yes' === moc_postnew_page ) {
		var avatar = $( '#hiddenProfileImg' ), image = $( '#crop_profile_image' ), cropBoxData, canvasData, cropper;

		/**
		 * jQuery ajax for uploading profile picture.
		 * Initiate the cropper modal.
		 */
		$(document).on('change', '.moc_avtar_image_upload', function(evt) {
			var this_element = $( this );
			var file_val     = this_element.val();
			var ext_array    = moc_image_valid_ext;
			var ext          = file_val.split( '.' ).pop();

			// If a file other than the allowed extensions is uploaded, exit the process.
			if ( -1 === $.inArray( ext, ext_array ) ) {
				moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, moc_image_extention_is_invalid);
				return false;
			}

			var files = evt.target.files;
			var done  = function( url ) {
				image.attr( 'src', url );
				crop_modal.modal( 'show' );
			};

			if ( files && 0 < files.length ) {
				var reader    = new FileReader();
				reader.onload = function( evt ) {
					done( reader.result );
				};
				reader.readAsDataURL( files[0] );
			}
		} );

		// Close the crop image modal.
		$( document ).on( 'click', '.crop_modal_close', function() {
			crop_modal.modal( 'hide' );
			crop_modal.data( 'bs.modal', null );
			$( '.moc_avtar_image_upload' ).val( '' );
		} );

		crop_modal.on('shown.bs.modal', function () {
			cropper = new Cropper(
				document.getElementById( 'crop_profile_image' ),
				{
					autoCropArea: 0.5,
					viewMode: 1,
					ready: function () {
						cropper.setCropBoxData( cropBoxData ).setCanvasData( canvasData ); //Should set crop box data first here
					}
				}
			);
		} ).on( 'hidden.bs.modal', function () {
			cropper.destroy();
			cropper = null;
			$( '.moc_avtar_image_upload' ).val( '' );
		} );

		// Initiate the rotate image tool.
		$( document ).on( 'click', '#rotateImg', function() {
			cropper.rotate( 90 );
		} );

		// Initiate the crop image tool.
		$( document ).on( 'click', '#cropProfileImg', function() {
			var initialAvatarURL, canvas;
			crop_modal.modal( 'hide' );

			if ( cropper ) {
				canvas           = cropper.getCroppedCanvas();
				initialAvatarURL = avatar.attr( 'src' );
				avatar.attr( 'src', canvas.toDataURL( 'image/png' ) );
				var this_element = $('.moc_avtar_image_upload');
				var file_val     = this_element.val();

				// Set the ajax form data.
				var formData = new FormData();
				formData.append( 'filename', file_val );
				formData.append( 'action', 'moc_user_avtar_upload' );
				formData.append( 'user_id', current_user_id );
				formData.append( 'user_avtar', canvas.toDataURL() );

				$.ajax( {
					url: ajaxurl,
					method: 'POST',
					type: 'POST',
					data: formData,
					contentType: false,
					processData: false,
					beforeSend: function() {
						block_element( this_element.closest( 'div.moc_not_changable_container' ).find( '.loader_bg' ) );
					},
					success: function( response ) {
						if ( 'marketinops-update-user_avtar' === response.data.code ) {
							moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
						} else if ( 'marketinops-avtar-image-size-notcorrect' === response.data.code ) {
							// Reset the file input type.
							var moc_user_avtar = $( '.moc_avtar_image_upload' );
							moc_user_avtar.wrap( '<form>' ).closest( 'form' ).get(0).reset();
							moc_user_avtar.unwrap();
							moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, response.data.toast_message );
						}

						$( '.moc_profile_img' ).attr( 'src', response.data.user_image_url );
						$( '.user_profile_icon .elementor-icon img' ).attr( 'src', response.data.user_image_url );
						unblock_element( $( '.loader_bg' ) );
						$( '.moc_avtar_image_upload' ).val('');
					},
				});
			}
		} );
	}

	// jQuery ajax for submit request from be a guest on ops cast.
	$(document).on('click', '.moc_profile_submit', function(event) {
		event.preventDefault();
		var this_element = $(this);
		this_element.text('Submitting...');
		var subject = $('#moc_profile_subject').val();
		var message = $('#moc_profile_description').val();
		var user_id = current_user_id;
		var process_execute = true;
		$('.moc_error span').text('');
		//validation.
		if ('' === subject) {
			process_execute = false;
			$('.moc_subject_error span').text(user_bio_empty_err_msg);
			// $( '#moc_profile_subject' ).css( 'border', '1px solid red' );
		}
		if ('' === message) {
			process_execute = false;
			$('.moc_message_error span').text(user_bio_empty_err_msg);
			// $( '#moc_profile_description' ).css( 'border', '1px solid red' );

		}

		// Final call for validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_element.text('Submit');
			return false;
		}
		var data = {
			action: 'moc_send_request_for_be_guest_on_ops_cast',
			user_id: user_id,
			subject: subject,
			message: message,
		};
		block_element(this_element.closest('div.moc_profile_content').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-be-guest-ops-cast' === response.data.code) {
					this_element.text('Submit');
					unblock_element($('.loader_bg'));
					moc_close_popup($('.moc_profile_popup'));
					moc_show_toast('bg-success', 'fa-check-circle', response.data.toast_success_msg, response.data.toast_message);
					$('#moc_profile_subject').val('');
					$('#moc_profile_description').val('');
				}
			},
		} );
	} );

	// jQuery ajax for submit request from adding custom certificate.
	$(document).on('click', '.moc_add_custom_certificate_submit', function(event) {
		event.preventDefault();
		var this_element = $(this);
		this_element.text('Submitting...');
		var subject = $('#moc_add_custom_certificate_subject').val();
		var message = $('#moc_add_custom_certificate_description').val();
		var user_id = current_user_id;
		var process_execute = true;
		$('.moc_error span').text('');
		//validation.
		if ('' === subject) {
			process_execute = false;
			$('.moc_add_custom_certificate_subject_error span').text(user_bio_empty_err_msg);
			// $( '#moc_add_custom_certificate_subject' ).css( 'border', '1px solid red' );
		}
		if ('' === message) {
			process_execute = false;
			$('.moc_add_custom_certificate_message_error span').text(user_bio_empty_err_msg);
			// $( '#moc_add_custom_certificate_description' ).css( 'border', '1px solid red' );

		}

		// Final call for validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_element.text('Submit');
			return false;
		}
		var data = {
			action: 'moc_send_request_for_add_custom_certificate',
			user_id: user_id,
			subject: subject,
			message: message,
		};
		block_element(this_element.closest('div.moc_add_custom_certificate').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-add-custom-certificate' === response.data.code) {
					this_element.text('Submit');
					unblock_element($('.loader_bg'));
					moc_close_popup($('.moc_add_custom_certificate'));
					$('.moc_certification_section').html(response.data.html);
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					$('body').removeClass('moc_doing_edit');
					$('body').addClass(moc_body_class);
					$('#moc_add_custom_certificate_subject').val('');
					$('#moc_add_custom_certificate_description').val('');
				}
			},
		} );
	} );

	$(document).on('click', '.moc_user_bio_cancel_btn', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_user_bio_cancel_btn',
				user_id: current_user_id,
			},
			success: function( response ) {
				if ('marketinops-cancel-user-bio-btn' === response.data.code) {
					unblock_element($('.loader_bg'));
					$('.moc_user_bio_container').html(response.data.html);
				}
			},
		} );
	} );

	$(document).on('click', '.moc_cancel_general_info', function(event) {
		event.preventDefault();
		var this_btn = $(this);
		var data = {
			action: 'moc_cancel_general_info',
			user_id: current_user_id,
		};
		block_element(this_btn.closest('div.moc_not_changable_container').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-cancel-general-info-btn' === response.data.code) {
					unblock_element($('.loader_bg'));
					$('.moc_general_user_info').html(response.data.html);
				}
			},
		} );
	} );

	// jQuery ajax for submit request from host a workshop.
	$(document).on('click', '.moc_host_workshop_submit', function(event) {
		event.preventDefault();
		var this_element = $(this);
		this_element.text('Submitting...');
		var subject = $('#moc_host_workshop_subject').val();
		var message = $('#moc_host_workshop_description').val();
		var user_id = current_user_id;
		var process_execute = true;
		$('.moc_error span').text('');
		//validation.
		if ('' === subject) {
			process_execute = false;
			$('.moc_host_workshop_subject_error span').text(user_bio_empty_err_msg);
		}
		if ('' === message) {
			process_execute = false;
			$('.moc_host_workshop_message_error span').text(user_bio_empty_err_msg);
		}

		// Final call for validations.
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			this_element.text('Submit');
			return false;
		}
		var data = {
			action: 'moc_send_request_for_host_workshop',
			user_id: user_id,
			subject: subject,
			message: message,
		};
		block_element(this_element.closest('div.moc_host_workshop').find('.loader_bg'));
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-host-workshop' === response.data.code) {
					this_element.text('Submit');
					unblock_element($('.loader_bg'));
					moc_close_popup($('.moc_host_workshop'));
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					$('#moc_host_workshop_subject').val('');
					$('#moc_host_workshop_description').val('');
				}
			},
		} );
	} );

	//jQuery to add change effect on edit option.
	$(document).on('click', '.moc_user_work_section_edit_btn', function() {
		var this_element = $(this);
		if ($('.years_month').length) {
			var month_element = $('.moc_start_month');
			var year_element = $('.moc_start_year');
			month_element.each(function() {
				var this_month_select = $(this);
				this_month_select.change();
			});
			year_element.each(function() {
				var this_year_select = $(this);
				this_year_select.change();
			});
		}
	});

	$(document).on('click', '.cancel_btn', function() {
		var this_element = $(this);
		this_element.closest('.moc_not_changable_container').find('.box_about_content').removeClass('moc_doing_edit_section');
	});

	$(document).on('click', '.edit_btn', function() {
		var this_element = $(this);
		this_element.closest('.moc_not_changable_container').find('.box_about_content').addClass('moc_doing_edit_section');
	});


	$(document).on('click', '.profile_name a.moc_edit_profile_btn', function() {
		$('.edit_btn').each(function() {
			var this_element = $(this);
			$('.moc_view_profile').removeClass( 'crossed' );
			var closest_element = this_element.closest( '.moc_not_changable_container' ).find( '.moc_user_bio_container' );
			if (this_element.hasClass('moc_doing_edit_section')) {
				this_element.removeClass('moc_doing_edit_section');
				$('.moc_not_editable_data').css('display', 'block');
				$('.moc_editable_data').css('display', 'none');
				// if ( '.moc_user_bio_container .' )
				$( '.moc_do_not_display' ).css( 'display', 'none' );
				$( 'body' ).removeClass( 'moc_view_profile_non_editable' );
				$( '.moc_view_profile' ).show();
				$( '.profile_img .file_upload_btn' ).show();
				$( '.moc_membership_details_section' ).show();
				$('.moc_job_seeker_detail_section').show();
				$('.moc_poublic_view_display').hide();
				
			} else {
				this_element.addClass('moc_doing_edit_section');
				$('.moc_not_editable_data').css('display', 'none');
				$('.moc_editable_data').css('display', 'block');
				$( '.moc_do_not_display' ).css( 'display', 'block' );
				$( 'body' ).removeClass( 'moc_view_profile_non_editable' );
				$( '.edit_btn' ).css( 'display', 'block' );
				$( '.moc_siderbar_content' ).css( 'display', 'block' );
				$( '.moc_view_profile' ).show();
				$( '.profile_img .file_upload_btn' ).show();
				$( '.moc_membership_details_section' ).show();
				$('.moc_job_seeker_detail_section').show();
				$('.moc_poublic_view_display').hide();
			}
		});
	});
	
	$( document ).on( 'click', '.moc_non_member_for_no_bs_demo', function( event ) {
		event.preventDefault();
		var this_element = $( this );
		var closest_popup  = this_element.closest( '.moc_loop_no_bs_demo_coupon' ).find( '.no_bs_demo_popup' );
		closest_popup.removeClass( 'non-active' );
		closest_popup.addClass( 'active' );

	} );
	
	$( document ).on( 'click', '.moc_view_profile', function() {
		var body_element = $( 'body' );
		if ( $(this).hasClass( 'crossed' ) ) {
			$(this).removeClass( 'crossed' );
		} else {
			$(this).addClass( 'crossed' );
		}
		if ( ! body_element.hasClass( 'moc_view_profile_non_editable' ) ) {
			body_element.addClass( 'moc_view_profile_non_editable' );
			$( '.edit_btn' ).css( 'display', 'none' );
			$( '.moc_siderbar_content' ).css( 'display', 'none' );
			$('.moc_not_editable_data').css('display', 'block');
			$('.moc_editable_data').css('display', 'none');
			$( '.moc_do_not_display' ).css( 'display', 'none' );
			$( '.profile_img .file_upload_btn' ).hide();
			// $( this ).hide();
			$( '.moc_membership_details_section' ).hide();
			$('.moc_job_seeker_detail_section').hide();
			$('.moc_poublic_view_display').show();
		}
	} );
	
	$( document ).on( 'click', '.moc_view_profile.crossed', function() {
		var body_element = $( 'body' );
		$(this).removeClass( 'crossed' );
		if ( body_element.hasClass( 'moc_view_profile_non_editable' ) ) {
			body_element.removeClass( 'moc_view_profile_non_editable' );
			$( '.edit_btn' ).show();
			$( '.moc_siderbar_content' ).show();
			// $('.moc_not_editable_data').css('display', 'block');
			// $('.moc_editable_data').show();
			// $( '.moc_do_not_display' ).show();;
			$( '.profile_img .file_upload_btn' ).show();
			$( '.moc_membership_details_section' ).show();
			$('.moc_job_seeker_detail_section').show();
			$('.moc_poublic_view_display').hide();
		}
	} );


	// jQuery to show hide editable data.
	$(document).on('click', '.moc_user_basic_info_edit_btn', function() {
		var this_element = $(this);
		$('body').removeClass(moc_body_class);
		input_radio_checkbox();
		$('body').addClass('moc_doing_edit');
		this_element.closest('.box_about_content').find('.moc_not_editable_data').css('display', 'none');
		this_element.closest('.box_about_content').find('.moc_editable_data').css('display', 'block');
		moc_on_load_slider_js();
		this_element.closest('.moc_user_bio_container').find('.sub_title_with_content').removeClass('moc_do_not_display');
		this_element.closest('.moc_user_bio_container').find('.content_boxes').removeClass('moc_do_not_display');
		this_element.closest('.moc_general_user_info').find('.sub_title_with_content').removeClass('moc_do_not_display');
		this_element.closest('.moc_general_user_info').find('.content_boxes').removeClass('moc_do_not_display');
		this_element.closest('.moc_user_bio_container').find('.moc_job_seeker_detail_section').css('display', 'block');
		this_element.closest('.moc_user_bio_container').find('.moc_poublic_view_display').css('display', 'none');
		

		// $( '.moc_user_bio_container .content_boxes' ).removeClass( 'moc_do_not_display' );
		// this_element.closest( '.box_about_content' ).find( '.after_cancel_display_none' ).css( 'display', 'block' );
	});

	// jQuery to show hide editable data.
	$(document).on('click', '.moc_user_basic_info_cancel_btn', function() {
		var this_element = $(this);
		this_element.closest('.box_about_content').find('.moc_editable_data').css('display', 'none');
		this_element.closest('.box_about_content').find('.moc_not_editable_data').css('display', 'block');
		this_element.closest('.box_about_content').find('.after_cancel_display_none').remove();
		$('body').removeClass('moc_doing_edit');
		$('body').addClass(moc_body_class);
	});

	// jQuery to change valued on slider range.
	$(document).on('change', '.range_slider input[type="range"]', function() {
		var this_element = $(this);
		var closest_skill_level_btn = this_element.closest('div.range_slider_box').find('a.expert_btn');
		var range_value = parseInt(this_element.val());
		var text_to_change = '';
		var class_to_change = '';
		if (1 === range_value) {
			text_to_change = 'BASIC';
			class_to_change = 'yellow_btn';
		} else if (2 === range_value) {
			text_to_change = '<span>INTERMEDIATE</span>';
			class_to_change = 'gradient_btn';
		} else if (3 === range_value) {
			text_to_change = 'ADVANCED';
			class_to_change = 'pink_btn';
		} else {
			text_to_change = 'EXPERT';
			class_to_change = 'blue_btn';
		}
		closest_skill_level_btn.html(text_to_change);
		closest_skill_level_btn.removeClass('yellow_btn gradient_btn blue_btn pink_btn');
		closest_skill_level_btn.addClass(class_to_change);
	});
	/**
	 * Close the notification.
	 */
	$(document).on('click', '.moc-notification .close', function() {
		$('.moc-notification-wrapper .toast').removeClass('show').addClass('hide');
	});

	// jQuery For Open Popup
	$(document).on('click', '.moc_inquire_ops_cast', function(evt) {
		evt.preventDefault();
		moc_open_popup($('.moc_profile_popup'));
		$('#moc_profile_subject').text('');
		$('#moc_profile_description').text('');
		$('.moc_error span').text('');
		$('#moc_profile_subject').css('border', '1px solid #E7EFEF');
		$('#moc_profile_description').css('border', '1px solid #E7EFEF');

	});

	// jQuery For Open Popup
	// This code has been commented to work on the task: https://app.clickup.com/t/868dv7wgt
	// $( document ).on( 'click', '.moc_host_a_workshop_btn', function( evt ) {
	// 	evt.preventDefault();
	// 	moc_open_popup( $( '.moc_host_workshop' ) );
	// 	$( '#moc_host_workshop_subject' ).text('');
	// 	$( '#moc_host_workshop_description' ).text('');
	// 	$( '.moc_error span' ).text( '' );
	// 	$( '#moc_host_workshop_subject' ).css( 'border', '1px solid #E7EFEF' );
	// 	$( '#moc_host_workshop_description' ).css( 'border', '1px solid #E7EFEF' );
	// } );

	// jQuery For close	 Popup
	$(document).on('click', '.moc_profile_popup .popup_close', function() {
		moc_close_popup($('.moc_profile_popup'));
	});

	// jQuery For close	 Popup
	$(document).on('click', '.moc_add_custom_certificate .popup_close', function() {
		moc_close_popup($('.moc_add_custom_certificate'));
	});

	// jQuery For close	 Popup
	$(document).on('click', '.moc_host_workshop .popup_close', function() {
		moc_close_popup($('.moc_host_workshop'));
	});

	/* ----------------------------- For Training page --------------------------------- */
	if ('yes' === is_training_index_page) {
		/**
		 * Function to call ajax for load products based on selected filters.
		 */
		$(document).on('change', '.moc_training_index_page', function() {
			var this_element = $(this);
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			get_products_by_filter();
		});

		/**
		 * Function to return load product based on selected category.
		 */
		$(document).on('change', '.common_filter_row input[type="checkbox"]', function() {
			get_products_by_filter();
		});

	}

	if ( 'yes' === is_training_seach_page ) {
		var search_training = ( false !== moc_get_query_variable( 'search_keywords' ) ) ? moc_get_query_variable( 'search_keywords' ) : '';
		var category        = ( false !== moc_get_query_variable( 'cat' ) ) ? moc_get_query_variable( 'cat' ) : '';
		get_products_by_search_keyword( search_training, category );

		/**
		 * Function to ajax call for load products based on filters.
		 */
		$( document ).on( 'click', '.moc_training_pagination .blog-directory-pagination ul li a', function( event ) {
			event.preventDefault();
			var search_training = ( false !== moc_get_query_variable( 'search_keywords' ) ) ? moc_get_query_variable( 'search_keywords' ) : '';
			var category        = ( false !== moc_get_query_variable( 'cat' ) ) ? moc_get_query_variable( 'cat' ) : '';
			var paged           = $( this ).data( 'page' );
			get_products_by_search_keyword( search_training, category, paged );
		} );

		/**
		 * Function to ajax call for load products.
		 */
		$(document).on('change', '.moc_training_search_page', function() {
			var this_element = $(this);
			var search_training = (false !== moc_get_query_variable('search_keywords')) ? moc_get_query_variable('search_keywords') : '';
			var category = (false !== moc_get_query_variable('cat')) ? moc_get_query_variable('cat') : '';
			var paged = $(this).data('page');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			get_products_by_search_keyword(search_training, category, paged);
		});
	}

	/**
	 * Function to set up class add and remove based on keyup.
	 */
	$(document).on('keyup', function(evt) {
		if (27 === evt.keyCode) {
			$('.popup').removeClass('active');
			$('.popup').addClass('non-active');
		}
	});

	/**  ============================= Start Members listing AJax ======================================= */
	if ('yes' === is_member_directory_page) {

		/**
		 * Function to call ajax for load all memebers based on experience selected. 
		 */
		$('#member_any_exp').on('click', function() {
			if (this.checked) {
				$('input[name="experience[]"]').each(function() {
					this.checked = false;
				});
				moc_get_all_members();
			}
		});

		/**
		 * Function to set check uncheck experiences checkbox.
		 */
		$('input[name="experience[]"]').on('click', function() {
			if ($('input[name="experience[]"]:checked').length >= 1) {
				$('#member_any_exp').prop('checked', false);
			}
		});

		/**
		 * Function to call ajax for load all memebers based on search. 
		 */
		$(".member-search-form").submit(function(e) {
			e.preventDefault();
			moc_get_all_members();
		});

		/**
		 * Function to call ajax for load all memebers based on category change.
		 */
		$('input[name="category[]"]').change(function() {
			var this_element = $(this);
			var this_element_id = this_element.attr('id');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			if ('any-category' !== this_element_id) {
				$('input[name="category[]"]#any-category').prop('checked', false);
				// this_element.prop('checked', true);
			} else {
				$('input[name="category[]"]').prop("checked", false);
				$('input[name="category[]"]#any-category').prop('checked', true);

			}
			var category_prop_array = [];
			$('input[name="category[]"]').each(function() {
				var this_checkbox = $(this);
				var element_prop = this_checkbox.is(':checked');
				if (true === this_checkbox.is(':checked')) {
					category_prop_array.push(
						element_prop
					);
				}
			});
			if (!category_prop_array.length) {
				$('input[name="category[]"]#any-category').prop('checked', true);
			}
			moc_get_all_members();
		});

		/**
		 * Function to call ajax for load all memebers based on experience selected.
		 */
		$(document).on('change', 'input[name="experience[]"]', function() {
			var this_element = $(this);
			var this_element_id = this_element.attr('id');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			if ('any-experience' !== this_element_id) {
				$('input[name="experience[]"]#any-experience').prop('checked', false);
				// this_element.prop('checked', true);
			} else {
				$('input[name="experience[]"]').prop("checked", false);
				$('input[name="experience[]"]#any-experience').prop('checked', true);

			}
			var experience_prop_array = [];
			$('input[name="experience[]"]').each(function() {
				var this_checkbox = $(this);
				var element_prop = this_checkbox.is(':checked');
				if (true === this_checkbox.is(':checked')) {
					experience_prop_array.push(
						element_prop
					);
				}
			});
			if (!experience_prop_array.length) {
				$('input[name="experience[]"]#any-experience').prop('checked', true);
			}
			moc_get_all_members();
		});

		/**
		 * Function to call ajax for load all memebers based experience years.
		 */
		$(document).on('change', 'input[name="experience_years[]"]', function() {
			var this_element = $(this);
			var this_element_id = this_element.attr('id');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}

			if ('any_year_exp' !== this_element_id) {
				$('input[name="experience_years[]"]#any_year_exp').prop('checked', false);
			} else {
				$('input[name="experience_years[]"]').prop("checked", false);
				$('input[name="experience_years[]"]#any_year_exp').prop('checked', true);
			}
			var year_exp_prop_array = [];
			$('input[name="experience_years[]"]').each(function() {
				var this_checkbox = $(this);
				var element_prop = this_checkbox.is(':checked');
				if (true === this_checkbox.is(':checked')) {
					year_exp_prop_array.push(
						element_prop
					);
				}
			});
			if (!year_exp_prop_array.length) {
				$('input[name="experience_years[]"]#any_year_exp').prop('checked', true);
			}
			moc_get_all_members();
		});

		/**
		 * Function to call ajax for load all memebers based on role levels seleted.
		 */
		$('input[name="role_level[]"]').change(function() {
			var this_element = $(this);
			var this_element_id = this_element.attr('id');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			if ('any_role_level' !== this_element_id) {
				$('input[name="role_level[]"]#any_role_level').prop('checked', false);
			} else {
				$('input[name="role_level[]"]').prop("checked", false);
				$('input[name="role_level[]"]#any_role_level').prop('checked', true);

			}
			var role_level_prop_array = [];
			$('input[name="role_level[]"]').each(function() {
				var this_checkbox = $(this);
				var element_prop = this_checkbox.is(':checked');
				if (true === this_checkbox.is(':checked')) {
					role_level_prop_array.push(
						element_prop
					);
				}
			});
			if (!role_level_prop_array.length) {
				$('input[name="role_level[]"]#any_role_level').prop('checked', true);
			}
			moc_get_all_members();
		});

		/**
		 * Function to call ajax for load all memebers based on role levels seleted.
		 */
		 $('input[name="mae_level[]"]').change(function() {
			var this_element = $(this);
			var this_element_id = this_element.attr('id');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			if ('any_mae_level' !== this_element_id) {
				$('input[name="mae_level[]"]#any_mae_level').prop('checked', false);
			} else {
				$('input[name="mae_level[]"]').prop("checked", false);
				$('input[name="mae_level[]"]#any_mae_level').prop('checked', true);

			}
			var mae_level_prop_array = [];
			$('input[name="mae_level[]"]').each(function() {
				var this_checkbox = $(this);
				var element_prop = this_checkbox.is(':checked');
				if (true === this_checkbox.is(':checked')) {
					mae_level_prop_array.push(
						element_prop
					);
				}
			});
			if (!mae_level_prop_array.length) {
				$('input[name="mae_level[]"]#any_mae_level').prop('checked', true);
			}
			moc_get_all_members();
		});

		/**
		 * Function to call ajax for load memebers based on skills category.
		 */
		$('input[name="skills[]"]').change(function() {
			moc_get_all_members();
			var this_element = $(this);
			var this_element_id = this_element.attr('id');
			if (false === this_element.is(':checked')) {
				this_element.attr('checked', false);
			} else {
				this_element.attr('checked', true);
			}
			if ('any_skill_level' !== this_element_id) {
				$('input[name="skills[]"]#any_skill_level').prop('checked', false);
			} else {
				$('input[name="skills[]"]').prop("checked", false);
				$('input[name="skills[]"]#any_skill_level').prop('checked', true);

			}
			var skills_prop_array = [];
			$('input[name="skills[]"]').each(function() {
				var this_checkbox = $(this);
				var element_prop = this_checkbox.is(':checked');
				if (true === this_checkbox.is(':checked')) {
					skills_prop_array.push(
						element_prop
					);
				}
			});
			if (!skills_prop_array.length) {
				$('input[name="skills[]"]#any_skill_level').prop('checked', true);
			}
		});

		/**
		 * Function to call ajax for load all memebers based on sortings.
		 */
		$('.sortby_members').change(function() {
			moc_get_all_members(1);
		});

		/**
		 * Function to call ajax for load all memebers based on pagination.
		 */
		$("body").on("click", ".member-directory-pagination a", function() {
			event.preventDefault()
			var paged = $(this).attr("data-page");
			moc_get_all_members(paged);
		});

		/**
		 * Function to call ajax for load all memebers based on selected filters.
		 */
		$('input[name="filter[]"]').change(function() {
			moc_get_all_members();
		});

		/**
		 * Function to call return show hide HTML on member directory page.
		 */
		$(document).on('focus', '.member-search-form__input', function() {
			$('.moc_members_count_value_div').hide();
			$('.number_of_search').html('');
			$('.moc_jobs_search_keyword').html('');
		});

		moc_get_all_members();
	}


	/**  ============================= End Members listing AJax ======================================= */

	/**  ============================= Start Blogs listing AJax ======================================= */
	if ('yes' === is_blog_listings_page) {

		// Call Ajax on load for listings all blogs.
		moc_get_all_blogs();

		/**
		 * Function to return remove selected class when all button click
		 */
		$(document).on('click', '.page-template-blog-listing-tempate .moc_all_tags', function() {
			var this_element = $(this);
			this_element.addClass('moc_selected_taxonomy');
			$('.page-template-blog-listing-tempate a.tag_box').each(function() {
				var this_btn = $(this);
				if (!this_btn.hasClass('moc_all_tags')) {
					this_btn.removeClass('moc_selected_taxonomy');
				}
			});
		});

		/**
		 * jQuery call to ajax for listing blogs based on selected category.
		 */
		$(document).on('click', '.page-template-blog-listing-tempate a.tag_box', function() {
			var this_element = $(this);
			if (!this_element.hasClass('moc_all_tags')) {
				this_element.toggleClass('moc_selected_taxonomy');
				$('.page-template-blog-listing-tempate .moc_all_tags').removeClass('moc_selected_taxonomy');
			}
			var taxonoy_arr = [];
			$('.page-template-blog-listing-tempate a.tag_box').each(function() {
				var this_anchor = $(this);
				if (this_anchor.hasClass('moc_selected_taxonomy')) {
					var taxonomy_id = this_anchor.data('termid');
					taxonoy_arr.push(taxonomy_id);
				}
			});
			moc_get_all_blogs();

		});

		/**
		 * Function to call ajax to load blogs on based of pagination change.
		 */
		$(document).on("click", ".page-template-blog-listing-tempate .blog-directory-pagination ul li a", function(event) {
			event.preventDefault()
			var paged = $(this).data('page');
			moc_get_all_blogs(paged);
		});

		/**
		 * Function to call ajax to load blogs on based sorting.
		 */
		$(document).on('change', 'select[name="sortby_blogs"]', function() {
			var element_pagination = $('.page-template-blog-listing-tempate .blog-directory-pagination ul li span');
			var paged = 1;
			moc_get_all_blogs(paged);
		});

		/**
		 * Function to call ajax for load blogs while user want to remove author tag from there.
		 */
		$(document).on('click', '.page-template-blog-listing-tempate .moc_tag_box_div .close_icon', function() {
			var uri = window.location.toString();
			if (uri.indexOf("?") > 0) {
				var clean_uri = uri.substring(0, uri.indexOf("?"));
				window.history.replaceState({}, document.title, clean_uri);
				var element_pagination = $('.page-template-blog-listing-tempate .blog-directory-pagination ul li span');
				var paged = 1;
				if (element_pagination.hasClass('current')) {
					paged = element_pagination.data('page');
				}
				$('.page-template-blog-listing-tempate .authore_tags').remove();
				moc_get_all_blogs(paged);
			}
		});
	}


	/**  ============================= End Blogs listing AJax =========================================== */

	/**  ============================= Start podcast listing AJax ======================================= */
	if ('yes' === is_podcast_listings_page) {
		moc_get_all_podcasts();
		$(document).on('click', '.page-template-podcast-listings-tempate .moc_all_tags', function() {
			var this_element = $(this);
			this_element.addClass('moc_selected_taxonomy');
			$('.page-template-podcast-listings-tempate a.tag_box').each(function() {
				var this_btn = $(this);
				if (!this_btn.hasClass('moc_all_tags')) {
					this_btn.removeClass('moc_selected_taxonomy');
				}
			});
		});
		$(document).on('click', '.page-template-podcast-listings-tempate a.tag_box', function() {
			var this_element = $(this);
			if (!this_element.hasClass('moc_all_tags')) {
				this_element.toggleClass('moc_selected_taxonomy');
				$('.page-template-podcast-listings-tempate .moc_all_tags').removeClass('moc_selected_taxonomy');
			}
			var taxonoy_arr = [];
			$('.page-template-podcast-listings-tempate a.tag_box').each(function() {
				var this_anchor = $(this);
				if (this_anchor.hasClass('moc_selected_taxonomy')) {
					var taxonomy_id = this_anchor.data('termid');
					taxonoy_arr.push(taxonomy_id);
				}
			});
			moc_get_all_podcasts();

		});
		$(document).on("click", ".page-template-podcast-listings-tempate .blog-directory-pagination ul li a", function(event) {
			event.preventDefault()
			var paged = $(this).data('page');
			moc_get_all_podcasts(paged);
		});
		$(document).on('change', 'select[name="sortby_podcast"]', function() {
			var element_pagination = $('.page-template-podcast-listings-tempate .blog-directory-pagination ul li span');
			var paged = 1;
			moc_get_all_podcasts(paged);
		});
		$(document).on('click', '.page-template-podcast-listings-tempate .moc_tag_box_div .close_icon', function() {
			var uri = window.location.toString();
			if (uri.indexOf("?") > 0) {
				var clean_uri = uri.substring(0, uri.indexOf("?"));
				window.history.replaceState({}, document.title, clean_uri);
				var element_pagination = $('.page-template-podcast-listings-tempate .blog-directory-pagination ul li span');
				var paged = 1;
				if (element_pagination.hasClass('current')) {
					paged = element_pagination.data('page');
				}
				$('.page-template-podcast-listings-tempate .authore_tags').remove();
				moc_get_all_podcasts(paged);
			}
		});
	}
	/**  ============================= End podcast listing AJax ======================================= */
	if ( 'yes' === is_no_bs_martech_demos ) {
		moc_load_all_no_bs_demos();
		$(document).on("click", ".moc_no_bs_demos_container .blog-directory-pagination ul li a", function(event) {
			event.preventDefault()
			var paged = $(this).data('page');
			moc_load_all_no_bs_demos(paged);
		});
		
		// ADD/ REMOVE Active class based on selection
		$( document ).on( 'click', '.no_bs_filter .moc_tab_category_box a', function( event ) {
			event.preventDefault();
			var this_elelemt = $( this );
			var category_id  = this_elelemt.data( 'catid' );

			if ( ! this_elelemt.hasClass( 'moc_all_no_bs_category' ) ) {
				this_elelemt.toggleClass( 'active' );
			}

			if ( 1 === is_valid_number( category_id ) ) {
				$( '.no_bs_filter .moc_tab_category_box a.moc_no_bs_category, .no_bs_filter .moc_tab_category_box a.moc_all_no_bs_category' ).removeClass( 'active' );
				this_elelemt.addClass( 'active' );
			} else {
				$( '.no_bs_filter .moc_tab_category_box a.moc_no_bs_category' ).removeClass( 'active' );
				$( '.no_bs_filter .moc_tab_category_box a.moc_all_no_bs_category' ).addClass( 'active' );
			}

			moc_load_all_no_bs_demos();
		} );
	}
	if ( 'yes' === moc_no_bs_demo_coupon_page ) {
		moc_load_all_no_bs_demo_coupons();
		$(document).on("click", ".moc_load_lists_no_bs_demo_coupons_container .blog-directory-pagination ul li a", function(event) {
			event.preventDefault()
			var paged = $(this).data('page');
			moc_load_all_no_bs_demo_coupons(paged);
		});
		$(document).on('change', 'select[name="sortby_no_bs_coupon_offer"]', function() {
			// var element_pagination = $('.moc_load_lists_no_bs_demo_coupons_container .blog-directory-pagination ul li span');
			var paged = 1;
			moc_load_all_no_bs_demo_coupons(paged);
		});
	}

	/**
	 * jQuery to serve display full description on hover.
	 */
	if ( $( '.moc_product_description' ).length ) {
		$( document ).on( 'click', '.moc_product_description a', function( evt ) {
			evt.preventDefault();
			var this_btn         = $( this );
			var read_less_link   = '<a class="read-less" href="#" title="read less">read less</a>';
			var full_description = this_btn.parent( '.moc_product_description' ).data( 'fulldescription' );
			var less_description = this_btn.parent( '.moc_product_description' ).data( 'trimdescription' );
			var dots             = this_btn.parent( '.moc_product_description' ).data( 'dots' );

			// If the read more action is required.
			if ( this_btn.hasClass( 'read-more' ) ) {
				this_btn.parent( '.moc_product_description' ).html( full_description + dots + read_less_link );
			} else if ( this_btn.hasClass( 'read-less' ) ) { // If the read less action is required.
				this_btn.parent( '.moc_product_description' ).html( less_description );
			}
		} );
	}

	/**
	 * Render Google Recaptcha on the login and forgot password form.
	 * On the checkout form, the google recaptcha is rendered after a couple of seconds.
	 */
	if ( $( '#google-recaptcha-checkbox' ).length ) {
		setTimeout( function() {
			render_google_recaptcha();
		}, 2000 );
	}

	/**
	 * Function to render google recaptcha.
	 *
	 * @return void
	 */
	function render_google_recaptcha() {
		grecaptcha.render(
			'google-recaptcha-checkbox',
			{
				'sitekey' : google_recaptcha_sitekey,
				'theme': google_recaptcha_theme,
			}
		);
	}

	/**
	 * jQuery to run ajax for forgot password.
	 */
	$( document ).on( 'click', '.moc-forgot-password-form', function( event ) {
		event.preventDefault();

		var process_execute = true;
		var this_button     = $( this );
		var email           = this_button.closest( '.moc-registration' ).find( '.moc-email' ).val();
		var captcha_response = grecaptcha.getResponse();

		this_button.closest( '.moc-registration' ).find( '.moc_error span' ).text( '' );

		// check email input is empty or not.
		if ( -1 === is_valid_string( email ) ) {
			this_button.closest( '.moc-registration' ).find( '.moc_email_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}

		// check password input is valid or not.
		if ( '' === captcha_response ) {
			this_button.closest( '.moc-registration' ).find( '.moc_captcha_err span' ).text( 'Please prove that you are not a robot.' );
			process_execute = false;
		}

		// Return, if there are errors.
		if ( false === process_execute ) {
			moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message );
			return false;
		}

		$.ajax( {
			dataType: 'JSON',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_user_forgot_password_process',
				email: email,
			},
			beforeSend: function() {
				// Show the loader.
				block_element( $( '.moc_forgot_password_form_section .loader_bg' ) );
			},
			success: function( response ) {
				if ('moc-forgot-password-success' === response.data.code) {
					moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.user_response_msg );
					this_button.closest( '.moc-registration' ).find('.moc-email').val( '' );

					if ( '' !== response.data.redirect_url ) {
						setTimeout( function() {
							window.location.href = response.data.redirect_url;
						}, 2000 );
					}
				} else {
					moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, response.data.user_response_msg );
					this_button.closest( '.moc-registration' ).find('.moc-email').val( '' );
				}
			},
			complete: function() {
				unblock_element( $( '.moc_forgot_password_form_section .loader_bg' ) ); // Hide the loader.
				grecaptcha.reset(); // Reset the google recaptcha.
			},
		} );
	} );

	/**
	 * Ajax to serve user profile first step process.
	 */
	$( document ).on( 'click', '.moc-submit-form', function( event ) {
		event.preventDefault();

		var registration_type = $( 'input[type="hidden"][name="reg_type"]' ).val();
		var plan              = ( false !== moc_get_url_vars() ) ? moc_get_url_vars()['plan'] : '';	
		var add_to_cart       = ( false !== moc_get_url_vars() ) ? moc_get_url_vars()['add_to_cart'] : '';
		var this_button       = $( this );
		var process_execute   = true;
		var email             = this_button.closest( '.moc_signup_form' ).find( '.moc-email' ).val();
		var random_otp        = moc_make_otp( 4, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' );
		var _nonce_           = '@A9@' + random_otp + '#2A#';
		var who_reffered_you  = $( 'input[name="who_referred_you"]' ).val();

		// If this is agency registration.
		if ( 1 === is_valid_string( registration_type ) ) {
			if ( 'agency' === registration_type ) {
				var agencyname = this_button.closest( '.moc_signup_form' ).find( '.moc-agencyname' ).val();
				var username   = email.substring( 0, email.indexOf( '@' ) );
			} else {
				var username = this_button.closest( '.moc_signup_form' ).find( '.moc-username' ).val();
			}
		}
		
		$( '.moc_error span' ).text( '' );

		/**
		 * Validations.
		 *
		 * Check username input is empty or not.
		 */
		if ( '' === username ) {
			this_button.closest( '.moc_signup_form' ).find( '.moc_username_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( '' !== username && -1 === is_valid_string( username ) ) {
			this_button.closest( '.moc_signup_form' ).find( '.moc_username_err span' ).text( moc_valid_username_error );
			process_execute = false;
		}

		// check the agency name.
		if ( '' === agencyname ) {
			this_button.closest( '.moc_signup_form' ).find( '.moc_agencyname_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}

		// check email input is empty or not.
		if ( '' === email ) {
			this_button.closest( '.moc_signup_form' ).find( '.moc_email_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}

		// check email input is valid or not.
		if ( '' !== email && -1 === is_valid_email( email ) ) {
			this_button.closest( '.moc_signup_form' ).find( '.moc_email_err span' ).text( moc_valid_email_error );
			process_execute = false;
		}

		// Check the password if the user is not logged in.
		if ( 0 === current_user_id )  {
			var password         = this_button.closest( '.moc_signup_form' ).find( '.moc-password' ).val();
			var confirm_password = this_button.closest( '.moc_signup_form' ).find( '.moc-confirm-password' ).val();

			// check password input is valid or not.
			if ( '' === password ) {
				this_button.closest( '.moc_signup_form' ).find( '.moc_password_err span' ).text( user_bio_empty_err_msg );
				process_execute = false;
			}
			if ( -1 === is_valid_password( password ) ) {
				this_button.closest( '.moc_signup_form' ).find( '.moc_password_err span' ).text( password_strength_error );
				process_execute = false;
			}
			// check password input is match with confirm password.
			if ( '' !== password && password !== confirm_password ) {
				this_button.closest( '.moc_signup_form' ).find( '.moc_confirm_password_err span').text( not_match_password_err );
				process_execute = false;
			}

			// check confirm_password input is empty or not.
			if ( '' === confirm_password ) {
				this_button.closest( '.moc_signup_form' ).find( '.moc_confirm_password_err span' ).text( user_bio_empty_err_msg );
				process_execute = false;
			}
		} else {
			var password         = '';
			var confirm_password = '';
		}

		if ( false === process_execute ) {
			moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message );
			this_button.text( 'Create Profile' );
			return false;
		} else {
			this_button.text( 'Creating your profile...' );
			moc_ajax_callback_verification_otp( 'moc_register_user', current_user_id, username, agencyname, email, password, confirm_password, plan, add_to_cart, _nonce_, 'moc_first_time_event', 'moc-register-container', who_reffered_you, this_button, 0 );
		}
	} );

	/**
	 * Focus to next input on otp input.
	 */
	$(document).on('keyup', '.otp-input', function() {
		var input_val_length = parseInt($(this).val().length);
		var input_max_length = parseInt($(this).attr("maxlength"));
		if (input_val_length === input_max_length) {
			var parent_div = $(this).parent();
			var focus_element_id = parent_div.next('.otp-input-box').find('.otp-input').attr('id');
			$('#' + focus_element_id).focus();
		}
	});

	/**
	 * Ajax to return on varify and create an user after otp verified
	 */
	$(document).on('click', '.email_submit_btn', function(event) {
		event.preventDefault();
		var this_button = $( this );
		this_button.text( 'Verifying' );
		var first_input_val  = $( '#digit-1' ).val();
		var second_input_val = $( '#digit-2' ).val();
		var third_input_val  = $( '#digit-3' ).val();
		var fourth_input_val = $( '#digit-4' ).val();
		var enter_otp        = first_input_val + second_input_val + third_input_val + fourth_input_val;
		var random_otp       = $( 'input[name="moc_emailded_otp"]' ).val();
		var remove_nonce     = random_otp.replace( '@A9@', '' );
		var final_nonce      = remove_nonce.replace( '#2A#', '' );
		var username         = $('input[name="moc_username"]').val();
		var agencyname       = $('input[name="moc_agencyname"]').val();
		var password         = $('input[name="moc_password"]').val();
		var email            = $('input[name="moc_email"]').val();
		var plan             = (false !== moc_get_url_vars()) ? moc_get_url_vars()['plan'] : '';	
		var add_to_cart      = (false !== moc_get_url_vars()) ? moc_get_url_vars()['add_to_cart'] : '';
		var who_reffered_you = $('input[name="moc_who_reffered_you"]').val();
		var process_execute  = true;

		// Vacate the error messages.
		$( '.moc_error span' ).text('');

		// if the login passcode is not provided.
		if ( '' === enter_otp ) {
			$( '.moc_wrong_otp span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}

		// if the login passcode doesn't match the passcode provided.
		if ( final_nonce !== enter_otp ) {
			$( '.moc_wrong_otp span' ).text( 'Please enter valid OTP' );
			process_execute = false;
		}

		if ( false === process_execute ) {
			$( '.otp-backspace .svg_icon img' ).attr( 'src', plugin_url + '/public/images/Vector-1.svg' );
			moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message );
			$( '.moc-email-otp-initial-stage .form-container' ).addClass( 'moc-failure' );
			this_button.text( 'Failure :(' );

			return false;
		} else {
			$.ajax( {
				dataType: 'json',
				url: ajaxurl,
				type: 'POST',
				data: {
					username: username,
					agencyname: agencyname,
					password: password,
					email: email,
					enter_otp: enter_otp,
					_nonce_: random_otp,
					plan: plan,
					who_reffered_you: who_reffered_you,
					add_to_cart: add_to_cart,
					action: 'moc_verify_create_user',
				},
				beforeSend: function() {
					block_element($('.moc-otp-section .loader_bg'));
				},
				success: function( response ) {
					if ('marketingops-verified-otp' === response.data.code) {
						$( '.otp-backspace .svg_icon img' ).attr( 'src', plugin_url + '/public/images/Vector.svg' );
						moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
						$( '.moc-email-otp-initial-stage .form-container' ).addClass( 'moc-success' );
						this_button.text( 'Success!' );
						if ('' !== response.data.redirect_url) {
							setTimeout(function() {
								window.location.href = response.data.redirect_url;
							}, 1000);
						}
					} else {
						moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, response.data.toast_message);
						$( '.otp-backspace .svg_icon img' ).attr( 'src', plugin_url + '/public/images/Vector-1.svg' );
						$( '.moc-email-otp-initial-stage .form-container' ).addClass( 'moc-failure' );
						this_button.text( 'Failure :(' );
						
					}
					unblock_element($('.loader_bg'));
					// this_button.text('Verify');
				}
			} );
		}
	} );

	/**
	 * Ajax to serve resend otp.
	 */
	var count = 0;
	$(document).on('click', '.moc_resend_btn', function() {
		count++;

		$( 'input[name="moc_resend_count_bind"]' ).val( count );
		var click_count      = $( 'input[name="moc_resend_count_bind"]' ).val();
		var username         = $('input[name="moc_username"]').val();
		var agencyname       = $('input[name="moc_agencyname"]').val();
		var email            = $('input[name="moc_email"]').val();
		var password         = $('input[name="moc_password"]').val();
		var confirm_password = $('input[name="moc_password"]').val();
		var who_reffered_you = $('input[name="moc_who_reffered_you"]').val();
		var plan             = (false !== moc_get_url_vars()) ? moc_get_url_vars()['plan'] : '';
		var add_to_cart      = (false !== moc_get_url_vars()) ? moc_get_url_vars()['add_to_cart'] : '';
		var random_otp       = moc_make_otp(4, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		var _nonce_          = '@A9@' + random_otp + '#2A#';

		$( '.moc_error span' ).text( '' );

		// Shoot the ajax for user or agency registration.
		moc_ajax_callback_verification_otp( 'moc_register_user', current_user_id, username, agencyname, email, password, confirm_password, plan, add_to_cart, _nonce_, 'moc_resend_callback_event', 'moc-otp-section', who_reffered_you, '', click_count );
	} );

	/**
	 * Ajax to serve for save profile final steps data.
	 */

	$( document ).on( 'change', 'input[name="moc_profie_pic"]', function() {
		document.getElementById('moc_profile_preview').src = window.URL.createObjectURL(this.files[0]);
		$('.moc_profile_pic_err span').text( '' );
		$( '.pic_box' ).removeClass( 'moc_add_empty_error' );
		$( '.pic_box_content_box' ).hide();
		$( '.pic_delete_button' ).show();
		if ( $( '.pic_box' ).hasClass( 'blank_pic' ) ) {
			$( '.pic_box' ).removeClass( 'blank_pic' );
			$( '.pic_box' ).addClass( 'pic_here' );
		}
	} );

	$( document ).on( 'click', '.pic_delete_button', function() {
		var moc_user_avtar = $('.moc_profie_pic');
		moc_user_avtar.wrap('<form>').closest('form').get(0).reset();
		moc_user_avtar.unwrap();
		$( '#moc_profile_preview' ).attr( 'src', '/wp-content/themes/marketingops/images/profile_setup/user_icon.svg' );
		$( '.pic_box_content_box' ).show();
		$( this ).hide();
		$( '.pic_box' ).addClass( 'blank_pic' );
		$( '.moc_previously_stored_attach_id' ).val( '' );

	} );

	/**
	 * jQuery for addclas on change location dropdown.
	 */
	$( document ).on( 'change', 'select', function() {
		var this_element = $( this );
		if ( '' !== this_element.val() ) {
			this_element.addClass( 'moc_change_selection' );
		} else {
			this_element.removeClass( 'moc_change_selection' );
		}
	} );
	
	// Save the final profile information.
	$( document ).on( 'click', '.moc_save_final_step', function( event ) {
		event.preventDefault();
		var this_btn = $( this );
		this_btn.text( edit_save_btn_processing_text );
		var first_name        = $( 'input[name="moc_first_name"]' ).val();
		var last_name         = $( 'input[name="moc_last_name"]' ).val();
		var location          = $( '#moc_location' ).val();
		var profetional_title = $( 'input[name="moc_pro_text"]' ).val();
		var wiypm             = $( '#moc_what_is_your_map' ).val();
		var yimo              = $( '#moc_years_in_marketing_operation' ).val();
		var jsd               = $( '#moc_job_seeker_details' ).val();
		var previously_img_id = $( '.moc_previously_stored_attach_id' ).val();
		var signup_redirect   = $( 'input[name="moc_signup_redirect_url"]' ).val();
		var process_execute   = true;
		var arrow_html        = moc_arrow_html();
		var file_input        = $( '.moc_profie_pic' );
		var file_val          = file_input.val();
		var ext_array         = moc_image_valid_ext;
		var ext               = file_val.split( '.' ).pop();
		var file              = $( '.moc_profie_pic' )[0].files[0];
		var add_to_cart       = ( undefined !== moc_get_url_vars() ) ? moc_get_url_vars()['add_to_cart'] : '';
		var formData          = new FormData();
		$( '.moc_error span' ).text('');

		/**
		 * Start the fields validation.
		 * First Name validation check.
		 */
		if ( '' === first_name ) {
			$( '.moc_first_name_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( '' !== first_name && -1 === is_valid_string( first_name ) ) {
			$( '.moc_first_name_err span' ).text( moc_only_numbers_not_allowed );
			process_execute = false;
		}

		// Last Name validation check.
		if ( '' === last_name ) {
			$( '.moc_last_name_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( '' !== last_name && -1 === is_valid_string( last_name ) ) {
			$( '.moc_last_name_err span' ).text( moc_only_numbers_not_allowed );
			process_execute = false;
		}

		// Location validation check.
		if ( '' === location ) {
			$( '.moc_location_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}

		// Profile picture validation check.
		if ( '' !== file_val && -1 === $.inArray( ext, ext_array ) ) {
			moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, moc_image_extention_is_invalid );
			process_execute = false;
		}

		// Final validation callback.
		if ( false === process_execute ) {
			moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message );
			this_btn.html( 'Save & Next ' + arrow_html );
			return false;
		} else {
			$( '.pic_box' ).removeClass( 'moc_add_empty_error' );
			formData.append( 'user_avtar', file );
			formData.append( 'action', 'moc_profile_setup_process' );
			formData.append( 'user_id', current_user_id );
			formData.append( 'first_name', first_name );
			formData.append( 'last_name', last_name );
			formData.append( 'location', location );
			formData.append( 'profetional_title', profetional_title );
			formData.append( 'wiypm', wiypm );
			formData.append( 'yimo', yimo );
			formData.append( 'jsd', jsd );
			formData.append( 'previously_img_id', previously_img_id );
			formData.append( 'signup_redirect', signup_redirect );

			if ( undefined !== add_to_cart ) {
				formData.append( 'add_to_cart', add_to_cart );
			}

			// Activate the loader.
			block_element( $( '.profile_setup .loader_bg' ) );

			// Process the ajax.
			$.ajax( {
				url: ajaxurl,
				method: 'POST',
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				success: function( response ) {
					if ( 'marketingops-success-final-steps' === response.data.code ) {
						moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
						if ( '' !== response.data.redirect_url ) {
							setTimeout( function() {
								window.location.href = response.data.redirect_url;
							}, 1000 );
						}
					} else {
						moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, response.data.toast_message );
						$( '#moc_profile_preview' ).attr( 'src', '/wp-content/themes/marketingops/images/profile_setup/user_icon.svg' );
					}

					// Deactivate the loader.
					unblock_element( $( '.loader_bg' ) );
					this_btn.html( 'Save & Next ' + arrow_html );
				}
			} );
		}
	} );

	if ( 'yes' === moc_is_singular_nobs_demo && 'no' === moc_paid_member ) {
		moc_add_content_blocker();   
	}
	
	$( document ).on( 'click', '.otp-backspace .svg_icon img', function() {
		$( '.moc-email-otp-initial-stage .form-container' ).removeClass( 'moc-failure' );
		$( '.moc-email-otp-initial-stage .form-container' ).removeClass( 'moc-success' );
		$( '.email_submit_btn' ).html( '<span class="moc-approve">Approve</span><span class="svg"><svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5262 0.994573C10.2892 0.985459 10.0693 1.12103 9.97249 1.3375C9.87452 1.55396 9.91667 1.80688 10.0807 1.98005L11.8728 3.91682H0.592831C0.382065 3.9134 0.187248 4.02391 0.0812957 4.20619C-0.0257965 4.38734 -0.0257965 4.61292 0.0812957 4.79406C0.187248 4.97634 0.382065 5.08685 0.592831 5.08344H11.8728L10.0807 7.02021C9.9349 7.17287 9.88363 7.39161 9.94515 7.59326C10.0067 7.79492 10.1719 7.94758 10.3769 7.99315C10.5831 8.03872 10.7973 7.96922 10.9375 7.81314L14.001 4.50013L10.9375 1.18711C10.8326 1.0709 10.6834 1.00027 10.5262 0.994573Z" fill="white"/></svg></span>' );
		$( this ).attr( 'src', plugin_url + '/public/images/Vector-3.svg' );
	} );

	/**
	 * jQuery to return remove hyperlink on that button
	 */
	$( document ).on( 'click', '.moc_gray_bar_btn', function( event ) {
		event.preventDefault();
	} );

	if ( 'yes' === moc_moops_page ) {
		moc_load_moops_episods( 1 );
		moc_load_more_btn_html( 1 );
		$( document ).on( 'click', '.moc_load_next_data', function( event ) {
			event.preventDefault();
			var this_btn = $( this );
			var page     = parseInt( this_btn.data( 'nextpage' ) );
			moc_load_moops_episods( page );
			moc_load_more_btn_html( page );
		} );
		
		
	}

	/**
	 * jQuery for sharing profile URL.
	 */
	$( document ).on( 'click', '.moc_share_profile', function( event ) {
		event.preventDefault();
		var copyText = $(this).data( 'profileurl' );
		document.addEventListener('copy', function(e) {
		e.clipboardData.setData('text/plain', copyText);
		e.preventDefault();
		}, true);
		document.execCommand('copy');  
		$( '.moc_box' ).text( 'Copied!' );
		$( '.moc_box' ).addClass( 'moc_copied' );
	} );

	$( "a.moc_share_profile" ).hover(
		function() {   
		 var title = $(this).attr("data-title");
		  $('<div/>', {
			  text: title,
			  class: 'moc_box'
		  }).appendTo('.profile_page .profile_name .profile_links ul');
		}, function() {
		  $(document).find("div.moc_box").remove();
		  $( '.moc_box' ).text( 'Click to copy' );
		}
	);
	$( "a.moc_view_profile" ).hover(
		function() {   
		 var title = $(this).attr("data-text");
		  $('<div/>', {
			  text: title,
			  class: 'moc_box view_box'
		  }).appendTo('.profile_page .profile_name .profile_links ul');
		}, function() {
		  $(document).find("div.moc_box").remove();
		  $( '.moc_box' ).text( 'Click to copy' );
		}
	);
	$( "a.moc_edit_profile_btn" ).hover(
		function() {   
		 var title = $(this).attr("data-text");
		  $('<div/>', {
			  text: title,
			  class: 'moc_box edit_box'
		  }).appendTo('.profile_page .profile_name .profile_links ul');
		}, function() {
		  $(document).find("div.moc_box").remove();
		  $( '.moc_box' ).text( 'Click to copy' );
		}
	);
	
	/**
	 * jQuery to make ajax call for html load of write a blog.
	 */
	if ( 'yes' === moc_postnew_page ) {
		$( document ).on( 'click', '.moc_write_post', function( event ) {
			event.preventDefault();
			var this_elelemt = $( this );
			var post_type = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'post' );
			var tab_id    = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'tab' );
			moc_load_html_write_a_blog_ajax( '', post_type, tab_id );
			
		} );
		$( document ).on( 'click', '.moc_editable_post', function( event ) {
			event.preventDefault();
			var this_elelemt = $( this );
			var post_id      = this_elelemt.data( 'postid' );
			var post_type    = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'post' );
			var tab_id       = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'tab' );
			var post_status  = this_elelemt.closest( '.row_column' ).find( '.status_btn_div' ).data( 'status' );
			if ( 'publish' === post_status ) {
				moc_open_dialog_box_confirmation( post_id, post_type, tab_id );
			} else {
				moc_load_html_write_a_blog_ajax( post_id, post_type, tab_id );
			}
		} );
		/**
		 * jQuery for close popup.
		 */
		$( document ).on( 'click', '.moc_common_popup_close', function( event ) {
			event.preventDefault();
			moc_close_popup( $( '.moc_confirmation_popup' ) );

		} );
		/**
		 * jQuery for confirmation to edit post.
		 */
		$( document ).on( 'click', '.moc_confirmation_popup_yes', function( event ) {
			event.preventDefault();
			var post_id   = $( '.moc_confirmation_article_id' ).val();
			var post_type = $( '.moc_confirmation_article_post_type' ).val();
			var tab_id    = $( '.moc_confirmation_article_post_tab' ).val();
			moc_load_html_write_a_blog_ajax( post_id, post_type, tab_id );
		} );
		/**
		 * jQuery for not confirmation to edit post.
		 */
		 $( document ).on( 'click', '.moc_confirmation_popup_no', function( event ) {
			event.preventDefault();
			var post_type = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'post' );
			var tab_id    = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'tab' );
			var paged     = 1;
			moc_load_all_posts_listings_data( post_type, paged, tab_id );
		} );

		moc_load_all_posts_listings_data( '', '', 'tab_1' );
		moc_load_post_count_data_ajax();
		$( document ).on( 'click', '.moc_tab_link', function() {
			var this_elelemt = $( this );
			var post_type    = this_elelemt.data( 'post' );
			var paged        = 1;
			var tab_id       = this_elelemt.data( 'tab' );
			moc_load_all_posts_listings_data( post_type, paged, tab_id );
		} );
	
		$(document).on("click", ".moc_pagination_for_posts_listings .moc_training_pagination .blog-directory-pagination ul li a", function(event) {
			event.preventDefault();
			var paged     = $(this).data('page');
			var post_type = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'post' );
			var tab_id    = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'tab' );
			moc_load_all_posts_listings_data( post_type, paged, tab_id );
		});
		$( document ).on( 'click', '.edit_para_link_btn', function() {
			var this_btn = $( this );
			$( '.moc_not_editable_content' ).hide();
			$( '.moc_editable_content' ).show();
			moc_input_resize_dynamic_width();
			
		} );
		$( document ).on( 'keyup', '.moc_post_title', function() {
			var this_element     = $( this );
			var this_elelemt_val = this_element.val();
			var post_type        = $( '.tabbing_content_container .tab_box.active_tab a.moc_tab_link' ).data( 'post' );
			if ( 'podcast' !== post_type ) {
				var permalink_input  = $( '.moc_permalink_slug' );
				var replace_text     = moc_slugify(this_elelemt_val)
				permalink_input.val( replace_text );
			} else {
				var permalink_input  = $( '.moc_permalink_slug' );
				var remove_ops       = this_elelemt_val.replace( 'Ops Cast | ', '' );
				var replace_text     = moc_slugify(remove_ops)
				permalink_input.val( replace_text );
			}
			

		} );
		$( document ).on( 'click', '.moc_cancel_info', function() {
			$( '.moc_editable_content' ).hide();
			$( '.moc_not_editable_content' ).show();
		} );
		$( document ).on( 'click', '.moc_save_info', function() {
			var this_btn   = $( this );
			var slug_value = $( '.moc_permalink_slug' ).val();
			$( '.moc_permalink_slug' ).val( slug_value );
			$( '.moc_editable_content' ).hide();
			$( '.moc_not_editable_content' ).show();
			if ( '' !== slug_value ) {
				$( '.moc_not_editable_content p' ).html( 'Permalink <a href="' + moc_home_url + '/' + slug_value + '" target="_blank">' + moc_home_url + '/' + slug_value + '</a>' );
			}
		} );

		$( document ).on( 'change', '#moc_post_status', function() {
			var this_element     = $( this );
			var this_element_val = this_element.val();
			if ( 'future' === this_element_val ) {
				$( '.moc_date_section' ).removeClass( 'moc_not_show_date_field' );
			} else {
				$( '.moc_date_section' ).addClass( 'moc_not_show_date_field' );
			}
		} );
		$( document ).on( 'click', '.moc_save_for_review', function( event ) {
			event.preventDefault();
			var this_btn    = $( this );
			var post_status = $( '#moc_post_status' ).val();
			moc_save_post( post_status );
		} );
		$( document ).on( 'click', '.moc_save_draft', function( event ) {
			event.preventDefault();
			moc_save_post( 'draft' );
		} );
		
		

		/**
		 * jQuery for adding muttiple tags in select2.
		 */
		$( document ).on( 'click', '.moc_add_tags', function( event ) {
			event.preventDefault();
			var prompt_tags = prompt( "Tags" );
			// Exit, if the criteria is invalid.
			if ( -1 === is_valid_string( prompt_tags ) ) {
				return false;
			}

			// Check if the criteria to be added doesn't already exist.
			var existing_tags_count = $( '#moc_post_tags > option' ).length;
			var has_similar_tags     = false;
			if ( 1 <= existing_tags_count ) {
				$( '#moc_post_tags > option' ).each( function() {
					var this_option      = $( this );
					var this_option_text = this_option.text();

					if ( this_option_text.toLowerCase() === prompt_tags.toLowerCase() ) {
						has_similar_tags = true;
						return false;
					}
				} );
			}

			// Check if there was any similar criteria.
			if ( has_similar_tags ) {
				alert( "The tags already exists. Please add a different tags." );
				return false;
			}

			// Push the slug into the array.
			var new_tags = new Option( prompt_tags, prompt_tags, true, true );

			// Append the select option.
			$( '#moc_post_tags' ).prepend( new_tags ).trigger( 'change' );

		} );
		$( document ).on( 'click', '.moc_cancel_process', function( event ) {
			event.preventDefault();
			$( '.tabbing_content_container .tab_box.active_tab a.moc_tab_link' ).click();

		} );
	}

	/**
	 * Function for ajax to call need reports.
	 */
	$( document ).on( 'click', '.moc_submit_need_report', function() {
		var this_element    = $( this );
		var first_name      = $( 'input[name="moc_ef_firstname"]' ).val();
		var last_name       = $( 'input[name="moc_ef_lastname"]' ).val();
		var email           = $( 'input[name="moc_ef_email"]' ).val();
		var website         = $( 'input[name="moc_ef_website"]' ).val();
		var process_execute = true;
		$('.moc_error span').text('');

		// For First Name.
		if ( '' === first_name ) {
			$('.moc_error.moc_ef_firstname_err span').text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( '' !== first_name && -1 === is_valid_string( first_name ) ) {
			$( '.moc_error.moc_ef_firstname_err span' ).text( moc_only_numbers_not_allowed );
			process_execute = false;
		}

		// For Last Name.
		if ( '' === last_name ) {
			$( '.moc_error.moc_ef_lastname_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( '' !== last_name && -1 === is_valid_string( last_name ) ) {
			$( '.moc_error.moc_ef_lastname_err span' ).text( moc_only_numbers_not_allowed );
			process_execute = false;
		}

		// For Email.
		if ( '' === email ) {
			$( '.moc_error.moc_ef_email_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( '' !== email && -1 === is_valid_email( email ) ) {
			$( '.moc_error.moc_ef_email_err span' ).text( moc_valid_email_error );
			process_execute = false;
		}
		// For Website.
		if ( '' === website ) {
			$( '.moc_error.moc_ef_website_err span' ).text( user_bio_empty_err_msg );
			process_execute = false;
		}
		if ( -1 === is_valid_url( website ) && '' !== website ) {
			$( '.moc_error.moc_ef_website_err span' ).text( user_wrong_website_url_err_msg );
			process_execute = false;
		}
		if ( false === process_execute ) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			return false;
		} else {
			var data = {
				action: 'moc_get_need_reports_form_submit',
			};
			$.ajax({
				dataType: 'json',
				url: ajaxurl,
				type: 'POST',
				data: data,
				success: function( response ) {}
			});
		}

	} );
	
	/**
	 * For couses page.
	 */
	if ( 'yes' === moc_courses_page ) {
		moc_get_courses_callback( '' );
		$(document).on("click", ".moc_courses_pagination .moc_training_pagination .blog-directory-pagination ul li a", function(event) {
			event.preventDefault();
			var paged     = $(this).data('page');
			moc_get_courses_callback( paged );
		});
	}

	/**
	 * jQuery for redirecting free course link.
	 */
	$( document ).on( 'click', '.moc_enroll_now_course', function( event ) {
		event.preventDefault();
		window.location.href = $( this ).data( 'courselink' );
	} );

	/**
	 * jQuery ajax to redirect link to add product on cart.
	 */
	$( document ).on( 'click', '.moc_single_checkout_button', function( evnet ) {
		evnet.preventDefault();
		block_element( $( '.courses_product_page .loader_bg' ) );
		var this_element = $( this );
		var product_id   = this_element.data( 'productid' );
		var data = {
			action: 'moc_add_product_cart_redirect_checkout',
			product_id: product_id,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				unblock_element( $( '.loader_bg' ) );
				if ( 'courses-added-cart' === response.data.code ) {
					window.location.href = response.data.return_url;
				}
			}
		});
	} );

	/**
	 * jQuery for open popup.
	 */
	$( document ).on( 'click', '.video_box_popup', function( event ) {
		event.preventDefault();
		var this_element = $( this );
		block_element( $( '.courses_product_page .loader_bg' ) );
		var videourl     = this_element.data( 'videourl' );
		if ( '' !== videourl ) {
			var data = {
				action: 'moc_open_video_popup',
				videourl: videourl,
			};
			$.ajax({
				dataType: 'json',
				url: ajaxurl,
				type: 'POST',
				data: data,
				success: function( response ) {
					unblock_element( $( '.loader_bg' ) );
					if ( 'moc-open-video-course-success' === response.data.code ) {
						moc_open_popup($('.moc_iframe_popup'));
						$( '.moc_popup_embeded_video' ).html( response.data.html );
					}
				}
			});
		}
	} );

	$( document ).on( 'click', '.moc_profile_close', function() {
		moc_close_popup( $( '.moc_iframe_popup' ) );
		$( '.moc_popup_embeded_video' ).html('');
	} );

	/**
	 * Set the timer on the 404 page.
	 */
	if ( $( '.404_redirection_timer' ).length ) {
		const page_404_redirection_interval = setInterval( page_404_redirection_interval_timer, 1000 );

		/**
		 * Update the seconds counter on the 404 page.
		 */
		function page_404_redirection_interval_timer() {
			var timer_secs = parseInt( $( '.404_redirection_timer strong' ).text() );
			timer_secs    -= 1;

			if ( 0 < timer_secs ) {
				$( '.404_redirection_timer strong' ).text( timer_secs ); // Display the seconds counter.
			} else if ( 0 === timer_secs ) {
				$( '.404_redirection_timer strong' ).text( timer_secs );
				clearInterval( page_404_redirection_interval ); // Clear the interval.
				window.location.href = moc_home_url; // Do the redirect.
			}
		}
	}

	/**
	 * Function to return open popup.
	 */
	function moc_open_dialog_box_confirmation( post_id, post_type, tab_id ) {
		moc_open_popup( $( '.moc_confirmation_popup' ) );
		$( '.moc_confirmation_article_id' ).val( post_id );
		$( '.moc_confirmation_article_post_type' ).val( post_type );
		$( '.moc_confirmation_article_post_tab' ).val( tab_id );
	}

	/**
	 * For the create slug of title.
	 */
	function moc_slugify(content) {
		return content.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
	}

	/**
	 * Function to call ajax for load all courses.
	 */
	function moc_get_courses_callback( paged ) {
		paged = ( '' === paged ) ? 1 : paged;
		block_element( $( '.course_list .loader_bg' ) );
		$( '.entry-title' ).remove(); // Remove the main title.
		var data = {
			action: 'get_courses',
			paged: paged,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				unblock_element( $( '.course_list .loader_bg' ) );
				if ( 'courses-not-found' === response.data.code ) {
				} else if ( 'courses-found' === response.data.code ) { // If there are courses available.
					$( '.course_list .course_list_box_content' ).html( response.data.html );
					// moc_equal_heights($('.course_list_box_content .content_box'));
					moc_dynamic_equal_heights($('.course_list_box_content .moc_title_box'), 80);
					// moc_equal_heights($('.course_list_box_content .moc_desc_box'));
					// moc_equal_heights($('.box_content'));
				}
			}
		});
	}
	if ( 'yes' === post_new_page ) {
		$( window ).resize(function() {
			moc_input_resize_dynamic_width();
		} );
	}

	$( document ).on( 'click', '.moc_submit_course_review', function( event ) {	
		event.preventDefault();	
		var this_elelemt    = $( this );	
		var course_object   = $( '.learndash-shortcode-wrap .ld-item-list' ).data( 'shortcode_instance' );	
		var comment_content = $( '.moc_comment_content' ).val();	
		var star_rating     = $( '.moc_course_rating_stars .star_input:checked' ).val();
		var trigger_evt     = $( '.moc_course_review' ).data( 'action' );
		var commentid       = $( '.moc_course_review' ).data( 'commentid' );
		moc_ajax_submit_review( course_object, comment_content, star_rating, trigger_evt, commentid );
	} );

	/**
	 * Edit course review box.
	 */
	$( document ).on( 'click', '.moc_edit_icon', function( event ) {
		event.preventDefault();
		if ( $( '.courses_review .review_box form' ).hasClass( 'active_edit' ) ) {
			$( '.courses_review .review_box form' ).removeClass( 'active_edit' );
			$( '.courses_review .review_box form' ).hide();
		} else {
			$( '.courses_review .review_box form' ).addClass( 'active_edit' );
			$( '.courses_review .review_box form' ).show();
		}
	} );

	/**
	 * Cancel subscription.
	 */
	$( document ).on( 'click', '.mops-cancel-subscription', function() {
		var confirm_cancelation = confirm( 'Are you sure you want to cancel the subscription? This action cannot be undone.' );

		// Return, if the subscription cancellation is cancelled.
		if ( false === confirm_cancelation ) {
			return false;
		}

		// Redirect the user to the cancellation url.
		window.location.href = $( this ).data( 'cancelurl' );
	} );

	/**
	 * Open the apaloooza session moodal.
	 */
	if ( $( '.moc_open_speaker_session_details' ).length ) {
		$( document ).on( 'click', '.moc_open_speaker_session_details', function() {
			var this_element  = $( this );
			var session_index = parseInt( this_element.parents( '.key_speaker_box' ).data( 'sessionindex' ) );
			var session_type  = this_element.parents( '.key_speaker_box' ).data( 'sessiontype' );

			// Return, if the session index or type is unavailable.
			if ( '' === session_index || '' === session_type ) {
				return false;
			}

			// Kickoff the AJAX call to open the modal.
			$.ajax( {
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'apalooza_agenda_details',
					session_index: session_index,
					session_type: session_type,
					moc_post_id: $( 'input[name="moc_post_id"]' ).val(),
				},
				beforeSend: function() {
					this_element.parents( '.key_speaker_container' ).next( '.loader_bg' ).addClass( 'show' );  // Show up the loader.
				},
				success: function ( response ) {
					// If the session data is available.
					if ( 'session-data-available' === response.data.code ) {
						$( '#moc_apaloza_session' ).addClass( 'active' ).removeClass( 'non-active' );
						$( '#moc_apaloza_session .popup_content_box' ).html( response.data.html );
						$( 'body' ).addClass( 'active-popup' );
					}
				},
				error: function( xhr ) {
					this_element.parents( '.key_speaker_container' ).next( '.loader_bg' ).removeClass( 'show' );  // Hide the loader.
				},
				complete: function() {
					this_element.parents( '.key_speaker_container' ).next( '.loader_bg' ).removeClass( 'show' );  // Hide the loader.
				},
			} );
		} );
	}

	/**
	 * Open the apaloooza session moodal.
	 */
	if ( $( '.key_speaker_content.mopza24 .moc_open_speaker_session_details' ).length ) {
		$( document ).on( 'click', '.key_speaker_content.mopza24 .moc_open_speaker_session_details', function() {
			var this_element         = $( this );
			var session_description  = this_element.parents( '.key_speaker_box' ).find( 'div.session_description' ).html();
			var session_speaker_data = this_element.parents( '.key_speaker_box' ).find( 'div.popup_speaker_data' ).html();
			var session_title        = this_element.parents( '.key_speaker_box' ).find( 'h5 a.moc_open_speaker_session_details' ).text();
			this_element.parents( '.key_speaker_container' ).next( '.loader_bg' ).addClass( 'show' );  // Show up the loader.

			// Set the modal html.
			var session_modal_html ='<div class="box_content">';
			session_modal_html    += '<div class="apaloooza-session-speakers">' + session_speaker_data + '</div>';
			session_modal_html    += '<div class="speaker_content">';
			session_modal_html    += '<h2 class="session_title">' + session_title + '</h2>';
			session_modal_html    += session_description;
			session_modal_html    += '</div>';
			session_modal_html    += '</div>';

			setTimeout( function() {
				$( '#moc_apaloza_session' ).addClass( 'active' ).removeClass( 'non-active' );
				$( '#moc_apaloza_session .popup_content_box' ).html( session_modal_html );
				$( 'body' ).addClass( 'active-popup' );
				this_element.parents( '.key_speaker_container' ).next( '.loader_bg' ).removeClass( 'show' );  // Hide the loader.
			}, 500 );
		} );
	}

	/**
	 * Close the session modal.
	 */
	$( document ).on( 'click', '.moc_close_session_modal', function() {
		$( '#moc_apaloza_session' ).addClass( 'non-active' ).removeClass( 'active' );
		// $( '#moc_apalooza_accelevents_purchase_tickets' ).addClass( 'non-active' ).removeClass( 'active' );
		$( 'body' ).removeClass( 'active-popup' );
	} );

	/**
	 * New home banner call to action.
	 */
	if ( 'free' === member_plan || 'inactive' === member_plan ) {
		$( '.logged-in .moc-newhome-banner-btn' ).text( 'Unlock Additional Access' );
	} else if ( 'pro' === member_plan ) {
		$( '.logged-in .moc-newhome-banner-btn' ).text( 'Explore Training Content' );
	}
	
	$( document ).on( 'click', '.banner_btn.rev-btn.moc-newhome-banner-btn', function() {
		if ( 'free' === member_plan || 'inactive' === member_plan ) {
			window.location.href = moc_home_url + '/subscribe/';
		} else if ( 'pro' === member_plan ) {
			window.location.href = moc_home_url + '/courses/';
		}
	} );

	/**
	 * Toggle the show/hide class in-person session.
	 */
	if ( $( '.show_all_inperson_sessions' ).length ) {
		$( document ).on( 'click', '.show_all_inperson_sessions', function( evt ) {
			evt.preventDefault();
			$( '.toggle_show_hide' ).toggleClass( 'show_this_box' );
		} );
	}

	/**
	 * Open the restricted content modal on the member only sessions page.
	 */
	$( document ).on( 'click', '.member-only-sessions-registration-btn', function( evt ) {
		// If the restriction modal has to be opened
		if ( $( this ).hasClass( 'open-restriction-modal' ) ) {
			evt.preventDefault();
			$( '.moc_paid_content_restriction_modal' ).addClass( 'active blog_popup' );
		}
	} );

	/**
	 * Close the restricted content modal.
	 */
	if ( $( '.moc_paid_content_restriction_modal .moc_popup_close a' ).length ) {
		$( document ).on( 'click', '.moc_paid_content_restriction_modal .moc_popup_close a', function( evt ) {
			evt.preventDefault();
			$( '.moc_paid_content_restriction_modal' ).removeClass( 'active blog_popup' );
		} );
	}

	/**
	 * Open the restricted content modal on the member only sessions page.
	 */
	if ( $( '.member-b-p-popup' ).length ) {
		$( document ).on( 'click', '.member-b-p-popup', function( evt ) {
			// If the restriction modal has to be opened
			if ( $( this ).hasClass( 'open-restriction-modal' ) ) {
				evt.preventDefault();
				$( '.main-member-b-p-popup' ).addClass( 'active blog_popup' );
			}
		} );
	}

	/**
	 * Close the restricted content modal.
	 */
	if ( $( '.moc_paid_content_restriction_modal .moc_popup_close a' ).length ) {
		$( document ).on( 'click', '.moc_paid_content_restriction_modal .moc_popup_close a', function( evt ) {
			evt.preventDefault();
			$( '.main-member-b-p-popup' ).removeClass( 'active blog_popup' );
		} );
	}

	/**
	 * Strategists load more on index page.
	 */
	if ( $( '.strategists-load-more-container a' ).length ) {
		$( document ).on( 'click', '.strategists-load-more-container a', function( evt ) {
			evt.preventDefault();
			var this_element  = $( this );
			var next_page     = parseInt( this_element.data( 'next' ) );
			var number        = parseInt( this_element.data( 'number' ) );

			// Return, if the next page or number value is invalid.
			if ( -1 === is_valid_number( next_page ) || -1 === is_valid_number( number ) ) {
				return false;
			}

			// Kickoff the AJAX call to fetch more strategists.
			$.ajax( {
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'more_strategists',
					next_page: next_page,
					number: number,
				},
				beforeSend: function() {
					$( '.strategists-load-more-container' ).next( '.loader_bg' ).addClass( 'show' );  // Show up the loader.
				},
				success: function ( response ) {
					// If the strategists data is not available.
					if ( 'no-strategists-found' === response.data.code ) {
						return false;
					}

					// If the strategists data is available.
					if ( 'strategists-found' === response.data.code ) {
						$( '.bottom-member-listing .box-wrap' ).append( response.data.html );
						$( '.strategists-load-more-container a' ).data( 'next', ( next_page + 1 ) );

						// If the load more button is to be hidden.
						if ( 'yes' === response.data.hide_load_more ) {
							$( '.strategists-load-more-container' ).hide();
						}
					}
				},
				error: function( xhr ) {
					$( '.strategists-load-more-container' ).next( '.loader_bg' ).removeClass( 'show' );  // Show up the loader.
				},
				complete: function() {
					$( '.strategists-load-more-container' ).next( '.loader_bg' ).removeClass( 'show' );  // Show up the loader.
				},
			} );
		} );
	}

	/**
	 * Template like.
	 */
	if ( $( '.template-like' ).length ) {
		$( document ).on( 'click', '.template-like', function( evt ) {
			evt.preventDefault();
			var this_element = $( this );
			var template_id  = parseInt( this_element.parents( '.cardBox' ).data( 'tid' ) );
			var action       = '';

			// Open the membership modal if user is not allowed to access templates.
			var template_access = $( '#allow_templates_access' ).val();
			template_access     = ( is_valid_string( template_access ) ) ? template_access : 'no';

			if ( 'no' === template_access ) {
				$( '.moc_paid_content_restriction_modal' ).addClass( 'active blog_popup' );
				return false;
			}

			// Manage the animation.
			if ( this_element.hasClass( '-active' ) ) {
				action = 'unlike_template';
				this_element.removeClass( '-active' );
			} else {
				action = 'like_template';
				this_element.addClass( '-active' );
			}

			// Kickoff the AJAX call to like the template and store the value in user meta.
			$.ajax( {
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: action,
					template_id: template_id,
					user_id: current_user_id,
				},
				beforeSend: function() {},
				success: function ( response ) {
					// If the like template is a success.
					if ( 'mops-template-like-unlike-success' === response.data.code ) {
						this_element.find( '.count' ).html( response.data.template_likes );
					}
				},
				error: function( xhr ) {
				},
				complete: function() {},
			} );
		} );
	}

	/**
	 * Video attachment download.
	 */
	if ( $( '.vault-video-attachment' ).length ) {
		$( document ).on( 'click', '.vault-video-attachment', function( evt ) {
			evt.preventDefault();
			var this_element = $( this );
			var file         = this_element.data( 'attachment-url' );

			// Download the file.
			var filename = file.substring( file.lastIndexOf( '/' ) + 1 );
			var link     = document.createElement( 'a' );
			link.setAttribute( 'download', filename );
			link.href = file;
			document.body.appendChild( link );
			link.click();
			link.remove();
		} );
	}

	/**
	 * Template download.
	 */
	if ( $( '.template-download' ).length ) {
		$( document ).on( 'click', '.template-download', function( evt ) {
			evt.preventDefault();
			var this_element = $( this );
			var template_id  = parseInt( this_element.parents( '.cardBox' ).data( 'tid' ) );
			var file         = this_element.parents( '.cardBox' ).data( 'file' );

			// Open the membership modal if user is not allowed to access templates.
			var template_access = $( '#allow_templates_access' ).val();
			template_access     = ( is_valid_string( template_access ) ) ? template_access : 'no';

			if ( 'no' === template_access ) {
				$( '.moc_paid_content_restriction_modal' ).addClass( 'active blog_popup' );
				return false;
			}

			// Start the icon animation.
			this_element.parents( '.cardBox' ).find( '.cardBoxText .downloadicon.template-download .btn-download' ).addClass( 'downloaded' );

			// Download the file.
			var filename = file.substring( file.lastIndexOf( '/' ) + 1 );
			var link     = document.createElement( 'a' );
			link.setAttribute( 'download', filename );
			link.href = file;
			document.body.appendChild( link );
			link.click();
			link.remove();

			// Kickoff the AJAX call to update the count of download action of the particular template.
			$.ajax( {
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'download_template',
					template_id: template_id,
				},
				beforeSend: function() {},
				success: function ( response ) {
					// If the download template is a success.
					if ( 'mops-template-download-success' === response.data.code ) {
						this_element.parents( '.cardBox' ).find( '.cardBoxText .downloadicon.template-download .cardlike .count' ).html( response.data.template_download );

						// Remove the downloaded class after 2 secs.
						this_element.parents( '.cardBox' ).find( '.cardBoxText .downloadicon.template-download .btn-download' ).removeClass( 'downloaded' );
					}
				},
				error: function( xhr ) {
				},
				complete: function() {},
			} );
		} );
	}

	// Upload custom template.
	if ( $( '.uploadTemplateCard .ulpadinnerbox button' ).length ) {
		$( document ).on( 'click', '.uploadTemplateCard .ulpadinnerbox button', function( evt ) {
			evt.preventDefault();

			// Open the membership modal if user is not allowed to access templates.
			var template_access = $( '#allow_templates_access' ).val();
			template_access     = ( is_valid_string( template_access ) ) ? template_access : 'no';

			if ( 'no' === template_access ) {
				$( '.moc_paid_content_restriction_modal' ).addClass( 'active blog_popup' );
				return false;
			}

			$( '.uploadtemplatehubspotmodal' ).addClass( 'active' );
		} );
	}

	// Close the modal for uploading custom template.
	if ( $( '.uploadtemplatehubspotmodal .popup_close a' ).length ) {
		$( document ).on( 'click', '.uploadtemplatehubspotmodal .popup_close a', function( evt ) {
			evt.preventDefault();
			jQuery( '.uploadtemplatehubspotmodal' ).removeClass( 'active' );
		} );
	}

	/**
	 * Submit review.
	 *
	 * @param {*} course_object 
	 * @param {*} comment_content 
	 * @param {*} star_rating 
	 * @param {*} trigger_evt 
	 * @param {*} commentid 
	 */
	function moc_ajax_submit_review( course_object, comment_content, star_rating, trigger_evt, commentid ) {
		block_element( $( '.moc_course_review .loader_bg' ) );
		var data = {	
			action: 'moc_course_review_submit_action',	
			course_object: course_object,
			comment_content: comment_content,
			star_rating: star_rating,
			trigger_evt: trigger_evt,
			commentid: commentid,
		};	
		$.ajax({	
			dataType: 'json',	
			url: ajaxurl,	
			type: 'POST',	
			data: data,	
			success: function( response ) {
				if ( 'moc-course-review-success' === response.data.code ) {	
					$( '.moc_course_review' ).hide();	
					$( '.courses_review_success' ).removeClass( 'hide' );
					$( '.moc_course_review_system' ).html( response.data.html );
				}
				unblock_element( $( '.moc_course_review .loader_bg' ) );	
			}	
		});
	}
	
	/**
	 * Function for call ajax for load html for write a posts.
	 */
	function moc_load_html_write_a_blog_ajax( post_id, post_type, tab_id ) {
		$( '#' + tab_id + ' .moc_data_to_show' ).html( '' );
		$( '.moc_write_post' ).hide();
		if ( $( '.moc_confirmation_popup' ).length > 0 ) {
			moc_close_popup( $( '.moc_confirmation_popup' ) );
		}
		block_element( $( '.moc_write_a_post_content_section .loader_bg' ) );
		var data = {
			action: 'moc_load_write_a_post_html',
			post_id: post_id,
			post_type: post_type,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				unblock_element( $( '.moc_write_a_post_content_section .loader_bg' ) );
				if ( 'moc-load-write-post-html-success' === response.data.code ) {
					$('html, body').animate({
						scrollTop: $("#moc_data_to_show").offset().top - 200
					}, 2000);
					$( '#' + tab_id + ' .moc_data_to_show' ).html( response.data.html );
					$( '#' + tab_id + ' .moc_data_to_show .tabbing_content_details' ).show();
					$("#moc_category_box select").select2({
						dropdownParent: $('#moc_category_box'),
						placeholder: "Please select category"
					});
					$("#tag_box select").select2({
						dropdownParent: $('#tag_box'),
						placeholder: "Please select tags",
						allowClear: true
					} );

					wp.editor.remove( 'ic_colmeta_editor' ); // Initialize the wp editor first so the re-initiation works fine.
					wp.editor.initialize(
						'ic_colmeta_editor',
						{
							tinymce: {
								wpautop: true,
								plugins : 'charmap colorpicker compat3x directionality hr image lists media paste tabfocus textcolor wordpress wpautoresize wpdialogs wpeditimage wpemoji wpgallery wplink wptextpattern wpview',
								toolbar1: 'bold italic underline strikethrough | bullist numlist | blockquote hr wp_more | alignleft aligncenter alignright | link unlink |  wp_adv',
								toolbar2: 'formatselect alignjustify forecolor | pastetext removeformat charmap | outdent indent | undo redo | wp_help',
							},
							quicktags: true,
							mediaButtons: true,
						}
					);
					
					// JS for Paramalink Slug CSS
					moc_input_resize_dynamic_width();
				}
			}
		});
	}

	/**
	 * Function to resize textbox.
	 */
	function moc_input_resize_dynamic_width() {
		var para_slug_site_width = $('.user_profile_blog .parma_link .input_box .input_boxes span').width();
		var para_slug_site_width = para_slug_site_width + 10;
		var para_slug_input_width = 'calc(100% - ' + para_slug_site_width + 'px )';
		$('.moc_permalink_slug').css('max-width', para_slug_input_width);
		$('#moc_date_for_post').datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: 'HH:mm:ss',
			minDate:0,
		} );
	}

	function moc_load_post_count_data_ajax() {
		block_element( $( '.moc_profile_details .loader_bg' ) );
		var data = {
			action: 'moc_load_post_count_data',
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ( 'moc-successfully-load-post-count-data' === response.data.code ) {
					$( '.moc_post_count_details' ).html( response.data.html );
					unblock_element( $( '.loader_bg' ) );
				}
			}
		});
	}
	/**
	 * Function to save posts.
	 */
	function moc_save_post( status ){
		block_element( $( '.moc_write_a_post_content_section .loader_bg' ) );
		var post_title      = $( '.moc_post_title' ).val();
		var post_permalink  = $('.moc_permalink_slug').val();
		var post_id         = $( 'input[name="moc_post_id_val"]').val();
		var date            = $( '.moc_date_for_post' ).val();
		var post_type       = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'post' );
		var tab_id          = $( '.tabbing_content_container .tab_box.active_tab a' ).data( 'tab' );
		var description     = get_editor_content( 'ic_colmeta_editor' );
		var process_execute = true;
		$('.moc_error span').text('');
		if ( '' === post_title ) {
			$( '.moc_error.moc_post_title_err' ).text(user_bio_empty_err_msg);
			process_execute = false;
		}
		if ( '' === post_permalink ) {
			$( '.moc_error.moc_permalink_slug_err' ).text(user_bio_empty_err_msg);
			process_execute = false;
		}
		if (false === process_execute) {
			moc_show_toast('bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message);
			unblock_element($('.loader_bg'));
			return false;
		}
		var post_categories = [];
		$( '#moc_post_content' ).each( function() {
			var option_val = $( this ).val();
			if ( '' !== option_val ) {
				post_categories.push( option_val );
			}
		} );
		var post_tags = [];
		$( '#moc_post_tags' ).each( function() {
			var option_val = $( this ).val();
			if ( '' !== option_val ) {
				post_tags.push( option_val );
			}
		} );
		var data = {
			action: 'moc_save_post_data',
			post_title: post_title,
			post_permalink: post_permalink,
			post_id: post_id,
			date: date,
			post_type: post_type,
			tab_id: tab_id,
			description: description,
			post_categories: post_categories,
			post_tags: post_tags,
			status: status,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ( 'moc-successfully-saved-data' === response.data.code ) {
					$( '.tabbing_content_container .tab_box.active_tab a.moc_tab_link' ).click();
					moc_load_post_count_data_ajax();
					setTimeout(function() {
						unblock_element( $( '.loader_bg' ) );
					}, 1000);
				}
			}
		});
		
	}
	/**
	 * Function to return load all posts data.
	 */
	function moc_load_all_posts_listings_data( post_type, paged, tab_id ) {
		$( '.moc_write_post' ).show();
		post_type = ( '' === post_type ) ? 'post' : post_type;
		paged     = ( '' === paged ) ? 1 : paged;
		if ( $( '.moc_confirmation_popup' ).length > 0 ) {
			moc_close_popup( $( '.moc_confirmation_popup' ) );
		}
		$( '#' + tab_id + ' .moc_data_to_show' ).html( '' );
		block_element( $( '.moc_write_a_post_content_section .loader_bg' ) );
		var data = {
			action: 'moc_load_all_posts_listings_data',
			post_type: post_type,
			paged: paged,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				unblock_element( $( '.moc_write_a_post_content_section .loader_bg' ) );
				if ( 'moc-success-load-all-posts' === response.data.code ) {
					// $('html, body').animate({
					// 	scrollTop: $("#moc_data_to_show").offset().top - 200
					// }, 2000);
					$( '#' + tab_id + ' .moc_data_to_show' ).html( response.data.html );
					if ( 'podcast' === post_type ) {
						$( '.moc_write_post' ).hide();
					}
					// $( '.moc_data_to_show .tabbing_content_details' ).show();
					// $('.input_row').datepicker("setDate", response.data.html);
				}
			}
		} );
	}

	/**
	 * Function to return ajax call for moops episodes.
	 *
	 * @param int page this variable holds the page number.
	 */
	 function moc_load_more_btn_html( page ) {
		block_element( $( '.mistakes_episodes_section .loader_bg' ) );
		var data = {
			action: 'moc_load_more_btn',
			page: page,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				unblock_element($('.loader_bg'));
				if ( 'moc-load-episoded-btn-success' === response.data.code ) {
					unblock_element($('.loader_bg'));
					$( '.moc_load_more_btn_section' ).html( response.data.html );
					// $( '.moc_load_episodes_section' )
					// $( '.moc_load_next_data' ).data( 'currentpage', response.data.currentpage );
					// $( '.moc_load_next_data' ).data( 'nextpage', response.data.nextpage );
				}
			}
		} );
	}

	/**
	 * Function to return ajax call for moops episodes.
	 */
	function moc_load_moops_episods( page ) {
		block_element( $( '.mistakes_episodes_section .loader_bg' ) );
		var data = {
			action: 'moc_load_moops_episods_html',
			page: page,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				unblock_element($('.loader_bg'));
				if ( 'moc-load-episoded-success' === response.data.code ) {
					unblock_element($('.loader_bg'));
					// $( '.moc_load_episodes_section' )
					$( '.moc_load_episodes_section' ).append( response.data.html );
					$( '.moc_load_next_data' ).data( 'currentpage', response.data.currentpage );
					$( '.moc_load_next_data' ).data( 'nextpage', response.data.nextpage );
				}
			}
		});
		
	}

	/**
	 * Function to call ajax for block the perticular sections.
	 */
	function moc_add_content_blocker() {
		block_element($('.moc_sinle_no_bs_demo .loader_bg'));
		var data = {
			action: 'moc_block_content_for_non_member',
			page_id: $( 'input[name="moc_post_id"]' ).val(),
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ( 'moc-blocker-success' === response.data.code ) {
					unblock_element($('.loader_bg'));
					$( '.moc-nobs-demo-content' ).append( response.data.html );
				}
			}
		} );
	}

	/**
	 * Function to return timer.
	 */
	function moc_start_countdown_timer(timer_id, duration, start_time) {
		if (typeof start_time === "undefined") {
			start_time = parseInt(new Date().getTime() / 1000);
		}
		var remaining_time = start_time + duration - parseInt(new Date().getTime() / 1000);
		var startValue = 1 - parseInt(remaining_time / duration);
		$('#' + timer_id).circleProgress({
			fill: {
				color: "#FA4A7A"
			},
			backgroundGradient: true,
			backgroundColor: "#FA4A7A",
			backgroundGradientStopColo: "#9C2296",
			emptyFill: "#E7EFEF",
			animationStartValue: startValue,
			value: 1,
			animation: {
				duration: remaining_time * 1000,
				easing: 'linear'
			}
		}).on('circle-animation-progress', function(event, progress, stepValue) {
			$(this).find('span').text(String(parseInt(remaining_time - (remaining_time * progress))));
		});
	}

	/**
	 * Function return html of arrow SVG.
	 */
	function moc_arrow_html() {
		var html = '<span class="svg"><svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.2762 0.994573C11.0392 0.985459 10.8193 1.12103 10.7225 1.3375C10.6245 1.55396 10.6667 1.80688 10.8307 1.98005L12.6228 3.91682H1.34283C1.13206 3.9134 0.937248 4.02391 0.831296 4.20619C0.724204 4.38734 0.724204 4.61292 0.831296 4.79406C0.937248 4.97634 1.13206 5.08685 1.34283 5.08344H12.6228L10.8307 7.02021C10.6849 7.17287 10.6336 7.39161 10.6952 7.59326C10.7567 7.79492 10.9219 7.94758 11.1269 7.99315C11.3331 8.03872 11.5473 7.96922 11.6875 7.81314L14.751 4.50013L11.6875 1.18711C11.5826 1.0709 11.4334 1.00027 11.2762 0.994573Z" fill="white" /></svg></span>';
		return html;
	}
	/**
	 * Function return to timer countdown.
	 */
	function moc_countdown_timer() {
		var param = moc_otp_expired_duration; // Change this if you want more or les than 2 hours
		var today = new Date();
		var newDate = today.setSeconds (today.getSeconds() + param);

		$('#getting-started').countdown(newDate, function(event) {
			$(this).html(event.strftime('%H:%M:%S'));
			if ('00:00:00' === $('#getting-started').text()) {
				$('.moc_resend_notification').show();
				$('#getting-started').hide();
				$('#countdown2').hide();
			}
		});
	}
	/**
	 * Function return to timer countdown.
	 */
	function moc_countdown_timer_for_expiration() {
		var param = moc_otp_expiration_time; // Change this if you want more or les than 2 hours
		var today = new Date();
		var newDate = today.setMinutes (today.getMinutes() + param);
		$('#moc_otp_expiration_timer').countdown(newDate, function(event) {
			$(this).html(event.strftime('%H:%M:%S'));
			if ('00:00:00' === $('#moc_otp_expiration_timer').text()) {
				var random_otp = moc_make_otp(4, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
				var _nonce_ = '@A9@' + random_otp + '#2A#';
				$('input[name="moc_emailded_otp"]').val(_nonce_);
			}
		});
	}

	/**
	 * Function to return ajax call for sending otp to email.
	 */
	function moc_ajax_callback_verification_otp( action, current_user_id, username, agencyname = '', email, password, confirm_password, plan, add_to_cart, _nonce_, evnet, moc_block_element, who_reffered_you, this_button, click_count ) {
		// Send the ajax for individual or agency registration.
		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: action,
				current_user_id: current_user_id,
				username: username,
				agencyname: agencyname,
				email: email,
				password: password,
				confirm_password: confirm_password,
				plan: plan,
				_nonce_: _nonce_,
				evnet: evnet,
				who_reffered_you: who_reffered_you,
				click_count: click_count,
				add_to_cart:add_to_cart,
			},
			beforeSend: function() {
				block_element( $( '.' + moc_block_element + ' .loader_bg' ) );
			},
			success: function( response ) {
				if ( 'marketingops-agency-created-successfully' === response.data.code ) {
					moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
					window.location.href = response.data.redirect_to;
					return false;
				}

				if ( 'marketingops=already-email-exist' === response.data.code ) {
					moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, invalid_empty_message );
					if ('username' === response.data.flag) {
						this_button.closest( '.moc_signup_form' ).find('.moc_username_err span').text(response.data.toast_message);
					} else {
						this_button.closest( '.moc_signup_form' ).find('.moc_email_err span').text(response.data.toast_message);
					}
				} else {
					moc_show_toast('bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message);
					if ('' !== response.data.html) {
						$('#moc_register_page').html(response.data.html);
						$('input[name="moc_emailded_otp"]').val(_nonce_);
						$('input[name="moc_username"]').val(username);
						$('input[name="moc_agencyname"]').val(agencyname);
						$('input[name="moc_password"]').val(password);
						$('input[name="moc_email"]').val(email);
						$('input[name="moc_who_reffered_you"]').val(who_reffered_you);
						$('html, body').animate({
							scrollTop: $(".email-otp-form").offset().top - 200
						}, 2000);
						moc_load_js_runtime();
						moc_countdown_timer();
						moc_countdown_timer_for_expiration();
						moc_start_countdown_timer('countdown2', moc_otp_expired_duration);
					}
				}
				if ('' !== this_button) {
					this_button.text('Create Profile');
				}
				unblock_element($('.loader_bg'));
			}
		});
	}

	/**
	 * Function to return jquery for OTP Input.
	 */
	function moc_load_js_runtime() {
		$('.otp-inputs').find('input').each(function() {
			$(this).attr('maxlength', 1);
			$(this).on('keyup', function(e) {
				var parent = $($(this).parent());
				if (e.keyCode === 8 || e.keyCode === 37) {
					var prev = parent.find('input#' + $(this).data('previous'));

					if (prev.length) {
						$(prev).select();
					}
				} else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
					var next = parent.find('input#' + $(this).data('next'));
					if (next.length) {
						$(next).select();
					} else {
						if (parent.data('autosubmit')) {
							parent.submit();
						}
					}
				}
			});
		});

		// hide placeholder star 

		$('.placeholder').on('click', function() {
			$(this).prev('input').focus();
		});

		$('.otp-inputs').find('input').on('blur', function() {
			if (!$(this).val()) {
				$(this).next('.placeholder').show();
			}
		});

		$('.otp-inputs').find('input').on('focus', function() {
			if (!$(this).val()) {
				$(this).next('.placeholder').hide();
			}
		});

		$('.otp-inputs').find('input').on('input', function() {
			if (!$(this).val()) {
				$(this).next('.placeholder').hide();
			}
		});

		$('.otp-backspace a').on('click', function(e) {
			$('.otp-inputs').find('input').val('');
			$('.otp-inputs').find('.placeholder').show();
		});
	}
	/**
	 * Check if a number is valid.
	 * 
	 * @param {number} data 
	 */
	function is_valid_number(data) {

		return ('' === data || undefined === data || isNaN(data) || 0 === data) ? -1 : 1;
	}

	/**
	 * Check if a string is valid.
	 *
	 * @param {string} $data
	 */
	function is_valid_string(data) {

		return ('' === data || undefined === data || !isNaN(data) || 0 === data) ? -1 : 1;
	}

	/**
	 * Check if a email is valid.
	 *
	 * @param {string} email
	 */
	function is_valid_email(email) {
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		return (!regex.test(email)) ? -1 : 1;
	}
	/**
	 * Check if a password has one atleast one capital, min 8 character, one number and one special character.
	 *
	 * @param {string} password
	 */
	function is_valid_password(password) {
		var regex = password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/);
		var result = (null === regex) ? -1 : 1;
		return result;
	}

	/**
	 * Check if a website URL is valid.
	 *
	 * @param {string} email
	 */
	function is_valid_url(url) {
		var regex = /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/;

		return (!regex.test(url)) ? -1 : 1;
	}

	/**
	 * Block element.
	 *
	 * @param {string} element
	 */
	function block_element(element) {
		element.addClass('show');
	}

	/**
	 * Unblock element.
	 *
	 * @param {string} element
	 */
	function unblock_element(element) {
		element.removeClass('show');
	}
	/**
	 * Function to return add / after 2 letter.
	 * @returns html.
	 */
	function moc_insert_slash(character_after, symbol_add, location) {
		var v = location.val().replace(/\D/g, ''); // Remove non-numerics
		v = v.replace(character_after, '$1' + symbol_add); // Add dashes every 4th digit
		location.val(v);
	}
	/**
	 * Show the notification text.
	 *
	 * @param {string} bg_color Holds the toast background color.
	 * @param {string} icon Holds the toast icon.
	 * @param {string} heading Holds the toast heading.
	 * @param {string} message Holds the toast body message.
	 */
	function moc_show_toast(bg_color, icon, heading, message) {
		$('.moc-notification-wrapper .toast').removeClass('bg-success bg-warning bg-danger');
		$('.moc-notification-wrapper .toast').addClass(bg_color);
		$('.moc-notification-wrapper .toast .moc-notification-icon').removeClass('fa-skull-crossbones fa-check-circle fa-exclamation-circle');
		$('.moc-notification-wrapper .toast .moc-notification-icon').addClass(icon);
		$('.moc-notification-wrapper .toast .moc-notification-heading').text(heading);
		$('.moc-notification-wrapper .toast .moc-notification-message').html(message);
		$('.moc-notification-wrapper .toast').removeClass('hide').addClass('show');
		setTimeout(function() {
			$('.moc-notification-wrapper .toast').removeClass('show').addClass('hide');
		}, 5000);
	}
	$( document ).on( 'click', '.moc_popup_close_btn', function( event ) {
		event.preventDefault();
		var this_element = $( this );
		if ( 0 < this_element.closest( '.moc_loop_no_bs_demo_coupon' ).find( '.no_bs_demo_popup' ).length  ) {
			var closest_popup  = this_element.closest( '.moc_loop_no_bs_demo_coupon' ).find( '.no_bs_demo_popup' );
			moc_close_popup( closest_popup );
		} else {
			window.location.href = moc_signup_url;
		}
		
		
	} );

	$( document ).on( 'click', '#mobile_filter_box .reset_btn', function( event ) {
		event.preventDefault();
		location.reload();
	} );
	
	/**
	 * Show the popup.
	 *
	 * @param {string} element Holds the elements to open popup.
	 */
	function moc_open_popup(element) {
		if (element.hasClass('non-active')) {
			element.addClass('active');
			element.removeClass('non-active');
		}
	}

	/**
	 * Close the popup.
	 *
	 * @param {string} element Holds the elements to close popup.
	 */
	function moc_close_popup(element) {
		if (!element.hasClass('non-active')) {
			element.removeClass('active');
			setTimeout(function() {
				element.addClass('non-active');
			}, 1000);
		}
	}

	/**
	 * Function for ajax call for product listing.
	 */
	function get_products_by_filter() {
		var platform_arr       = [];
		var skills_arr         = [];
		var strategy_types_arr = [];
		var moc_free_products  = '';

		if ( 'yes' === is_training_index_page ) {
			moc_free_products = ( $( '.moc_training_index_page' ).is( ':checked' ) ) ? 'yes' : 'no';
		} else {
			moc_free_products = ( $( '.moc_training_search_page' ).is( ':checked' ) ) ? 'yes' : 'no';
		}

		$( "input[name='training_platform[]']:checked" ).each( function( i ) {
			platform_arr.push( $( this ).val() );
		} );

		$( "input[name='training_skill_level[]']:checked" ).each( function( i ) {
			skills_arr.push( $( this ).val() );
		} );

		$( "input[name='training_strategy_type[]']:checked" ).each( function( i ) {
			strategy_types_arr.push( $( this ).val() );
		} );

		$.ajax( {
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_filter_data_with_training',
				platform_arr: platform_arr,
				skills_arr: skills_arr,
				strategy_types_arr: strategy_types_arr,
				moc_free_products: moc_free_products,
			},
			beforeSend: function() {
				block_element( $( '.moc_main_training_container .loader_bg' ) );
			},
			success: function( response ) {
				if ( 'marketing-change-products-by-filter' === response.data.code ) {
					$( '.training_content.moc_product').html( response.data.html );
					$( '.moc_training_results').html( response.data.post_result_html );
				}
			},
			complete: function() {
				unblock_element( $( '.loader_bg' ) );

				// Initialize the author slider.
				if ( $( '.custom_slider' ).length ) {
					$( '.custom_slider' ).not( '.slick-initialized' ).slick( {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: true,
						arrows: true,
						autoplay: true,
						infinite: false,
						autoplaySpeed: 3000,
						rows: 1,
					} );
				}
			}
		} );
	}

	/**
	 * Function for ajax call for product listiong
	 *
	 */
	function get_products_by_search_keyword(search_training, category, paged) {
		var professor_name    = ( false !== moc_get_query_variable( 'professor' ) ) ? moc_get_query_variable( 'professor' ) : '';
		var paged             = ( paged > 1 ) ? paged : 1;
		var moc_free_products = ( $( '.moc_training_search_page' ).is( ':checked' ) ) ? 'yes' : 'no' ;

		// Shoot the ajax now.
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_search_training',
				dataType: 'json',
				search_training: search_training,
				category: category,
				paged: paged,
				moc_free_products: moc_free_products,
				professor_name: professor_name,
			},
			beforeSend: function() {
				block_element( $( '.moc_product_container .loader_bg' ) );
			},
			success: function( response ) {
				if ( 'marketing-change-products-by-search-keyword' === response.data.code ) {
					$( '.moc_product_inner_section' ).html( response.data.html );
					$( '.moc_training_results' ).html( response.data.post_result_html );
					setTimeout( function() {
						$( '.custom_slider_ajax' ).slick( {
							slidesToShow: 1,
							slidesToScroll: 1,
							dots: true,
							arrows: true,
							autoplay: true,
							infinite: false,
							autoplaySpeed: 3000,
							rows: 1,
						} );
					}, 500 );
				}
			},
			complete: function() {
				// Unblock the loader.
				unblock_element( $( '.loader_bg' ) );

				// Scroll the user to the top of the screen.
				if ( $( '.training_content' ).length ) {
					$( 'html, body' ).animate( { scrollTop: $( '.training_content' ).offset().top - 200 }, 1000 );
				}
			},
		} );
	}

	/**
	 * Function for ajax call for blog listiong
	 *
	 * @param {integer} paged Holds the page number.
	 */
	function moc_get_all_blogs(paged, author) {
		var moc_taxonoy_arr = [];
		$('.page-template-blog-listing-tempate a.tag_box').each(function() {
			var this_anchor = $(this);
			if (this_anchor.hasClass('moc_selected_taxonomy')) {
				var moc_taxonomy_id = parseInt(this_anchor.data('termid'));
				moc_taxonoy_arr.push(moc_taxonomy_id);
			}
		});
		var selected_sorting = $('select[name="sortby_blogs"]').val();
		var author = (false !== moc_get_query_variable('author')) ? moc_get_query_variable('author') : '';
		var paged = (paged > 1) ? paged : 1;
		block_element($('.page-template-blog-listing-tempate .moc_blog_section .loader_bg'));
		var data = {
			action: 'moc_blogs_listings',
			selected_sorting: selected_sorting,
			moc_taxonoy_arr: moc_taxonoy_arr,
			paged: paged,
			author: author,
		};
		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-load-blogs-listings' === response.data.code) {
					$('.page-template-blog-listing-tempate .moc_article_main_section').html(response.data.html);
					$('html, body').animate({
						scrollTop: $(".moc_blog_section").offset().top - 200
					}, 1000);
					setTimeout(function() {
						unblock_element($('.page-template-blog-listing-tempate .loader_bg'));
					}, 1500);
					moc_equal_heights($('.blog_box'));
					moc_equal_heights($('.box_content'));
				}
			},
		} );
	}

	/**
	 * Function for ajax call for podcast listiong
	 *
	 * @param {integer} paged Holds the page number.
	 */
	function moc_get_all_podcasts(paged, author) {
		var moc_taxonoy_arr = [];
		$('.page-template-podcast-listings-tempate a.tag_box').each(function() {
			var this_anchor = $(this);
			if (this_anchor.hasClass('moc_selected_taxonomy')) {
				var moc_taxonomy_id = parseInt(this_anchor.data('termid'));
				moc_taxonoy_arr.push(moc_taxonomy_id);
			}
		});

		var selected_sorting = $('select[name="sortby_podcast"]').val();
		var author = (false !== moc_get_query_variable('author')) ? moc_get_query_variable('author') : '';
		var paged = (paged > 1) ? paged : 1;

		$.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'moc_podcasts_listings',
				selected_sorting: selected_sorting,
				moc_taxonoy_arr: moc_taxonoy_arr,
				paged: paged,
				author: author,
			},
			beforeSend: function() {
				// Block the main content.
				block_element( $( '.page-template-podcast-listings-tempate .moc_blog_section .loader_bg' ) );
			},
			success: function( response ) {
				if ( 'marketinops-load-podcasts-listings' === response.data.code ) {
					$( '.page-template-podcast-listings-tempate .moc_article_main_section' ).html( response.data.html );
					unblock_element( $( '.page-template-podcast-listings-tempate .loader_bg' ) );
					moc_equal_heights( $( '.blog_box' ) );
					moc_equal_heights( $( '.box_content' ) );
					$( 'html, body' ).animate( { scrollTop: $( '.moc_blog_section' ).offset().top - 200 }, 1000 );
					setTimeout( function() {
						unblock_element( $( '.loader_bg' ) );
					}, 2000 );
				}

			},
		});
	}
	/**
	 * Function for ajax call for member listiong
	 *
	 * @param {integer} paged Holds the page number.
	 */
	function moc_get_all_members(paged) {
		var search_term = jQuery("#member_s").val();
		var sortby = jQuery('.sortby_members').val();
		var category_array = [];
		jQuery("input[name='category[]']:checked").each(function(i) {
			category_array.push(jQuery(this).val());
		});

		var experience_array = [];
		jQuery("input[name='experience[]']:checked").each(function(i) {
			experience_array.push(jQuery(this).val());
		});

		var experience_years_array = [];
		jQuery("input[name='experience_years[]']:checked").each(function(i) {
			experience_years_array.push(jQuery(this).val());
		});

		var roles_array = [];
		jQuery("input[name='role_level[]']:checked").each(function(i) {
			roles_array.push(jQuery(this).val());
		});
		var mae_level_array = [];
		jQuery("input[name='mae_level[]']:checked").each(function(i) {
			mae_level_array.push(jQuery(this).val());
		});

		var skills_array = [];
		jQuery("input[name='skills[]']:checked").each(function(i) {
			skills_array.push(jQuery(this).val());
		});

		jQuery("input[name='filter[]']:checked").each(function(i) {
			var value = jQuery(this).attr("data-value");
			var type = jQuery(this).attr("data-type");

			if (type == "category") {
				category_array.push(jQuery(this).val());
			}
			if (type == "experience") {
				experience_array.push(jQuery(this).val());
			}
			if (type == "experience_years") {
				experience_years_array.push(jQuery(this).val());
			}
			if (type == "role_level") {
				roles_array.push(jQuery(this).val());
			}
			if (type == "mae_level") {
				mae_level_array.push(jQuery(this).val());
			}
			if (type == "skills") {
				skills_array.push(jQuery(this).val());
			}
		});
		var paged = (paged > 1) ? paged : 1;
		block_element($('.loader_bg'));
		var data = {
			'action': 'moc_member_load_listings',
			'search_term': search_term,
			'category': category_array,
			'experience': experience_array,
			'experience_years': experience_years_array,
			'roles': roles_array,
			'mae_level': mae_level_array,
			'skills': skills_array,
			'sortby': sortby,
			'paged': paged,
		};
		jQuery.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ('marketinops-load-member-listings' === response.data.code) {
					var totalusers;
					$('.members_directory').html(response.data.html);
					if (response.data.total_users > 1) {
						totalusers = response.data.total_users + ' results found';
					} else if (response.data.total_users == 1) {
						totalusers = response.data.total_users + ' result found';
					} else {
						totalusers = 'No result found';
					}
					if ('' === search_term) {
						$('.moc_jobs_search_keyword').text('Search query example');
					} else {
						$('.moc_jobs_search_keyword').text(search_term);
					}
					$('html, body').animate({
						scrollTop: $(".moc_search_member").offset().top - 200
					}, 1000);
					setTimeout(function() {
						unblock_element($('.loader_bg'));
					}, 1500);
					jQuery('.moc_members_count_value_div').show();
					jQuery('.number_of_search').html(totalusers);
					$('#member_s').blur();
					
				}

			},
		});
	}

	function moc_load_all_no_bs_demos( paged ) {
		var paged = ( paged > 1 ) ? paged : 1;
		var category_array = [];
		$( '.no_bs_filter .moc_tab_category_box a' ).each( function() {
			var this_category = $( this );
			var category_id   = this_category.data( 'catid' );
			if( this_category.hasClass( 'active' ) ) {
				category_array.push( category_id );
			}
		} );
		block_element( $( '.loader_bg' ) );

		jQuery.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: {
				'action': 'moc_no_bs_demos_load_listings',
				paged: paged,
				category_array: category_array
			},
			success: function( response ) {
				if ( 'moc_load_no_bs_demos_successfully' === response.data.code ) {
					$( '.moc_no_bs_demo_loop_sectiion' ).html( response.data.html );
					$( '.moc_load_no_bs_demo_form' ).html('');
					// $( '.moc_load_no_bs_demo_form' ).html( '<script charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/v2.js"></script><script>hbspt.forms.create({ region: "na1", portalId: "8316257", formId: "e5cdc14a-c5cd-40e2-ac00-85fdd5dd2ab4" });</script>' );
					// jQuery( document ).ready( function() {
					// 	hbspt.forms.create({ region: "na1", portalId: "8316257", formId: "e5cdc14a-c5cd-40e2-ac00-85fdd5dd2ab4" });
					// });
					unblock_element($('.loader_bg'));
				}
			},
		});
	}

	function moc_load_all_no_bs_demo_coupons( paged ){
		var paged       = ( paged > 1 ) ? paged : 1;
		var coupon_code = (false !== moc_get_query_variable('coupon_code')) ? moc_get_query_variable('coupon_code') : '';
		var sorting     = $('select[name="sortby_no_bs_coupon_offer"]').val();
		block_element( $( '.loader_bg' ) );
		var data = {
			'action': 'moc_no_bs_demo_coupons_load_listings',
			paged: paged,
			coupon_code: coupon_code,
			post_id: $( 'input[name="moc_post_id"]' ).val(),
			sorting: sorting,
		};
		jQuery.ajax({
			dataType: 'json',
			url: ajaxurl,
			type: 'POST',
			data: data,
			success: function( response ) {
				if ( 'moc_load_no_bs_demo_coupons_successfully' === response.data.code ) {
					$( '.moc_load_lists_no_bs_demo_coupons_inner_section' ).html( response.data.html );
					unblock_element($('.loader_bg'));
					$('html, body').animate({
						scrollTop: $(".no_bs_partner_boxed").offset().top - 150
					}, 2000);
				}
			},
		});
	}

	/**
	 * Function to return add Js for new Element of range slider.
	 * @returns html.
	 */
	function moc_on_load_slider_js() {
		jQuery(document).ready(function() {
			jQuery('input[type="range"]').rangeslider({
				polyfill: false,
				rangeClass: 'rangeslider',
				disabledClass: 'rangeslider--disabled',
				horizontalClass: 'rangeslider--horizontal',
				fillClass: 'rangeslider__fill',
				handleClass: 'rangeslider__handle',

				// Callback function
				onInit: function() {
					var $rangeEl = '';
					$rangeEl = this.$range;

					// add value label to handle
					var $handle = $rangeEl.find('.rangeslider__handle');
					var handleValue = '<div class="rangeslider__handle__value">' + this.value + '</div>';
					$handle.append(handleValue);

					// get range index labels 
					var rangeLabels = this.$element.attr('labels');
					rangeLabels = rangeLabels.split(',');

					// add labels
					$rangeEl.append('<div class="rangeslider__labels"></div>');
					jQuery(rangeLabels).each(function(index, value) {
						$rangeEl.find('.rangeslider__labels').append('<span class="rangeslider__labels__label">' + value + '</span>');
					})
				},

				// Callback function
				onSlide: function(position, value) {
					var $handle = this.$range.find('.rangeslider__handle__value');
					$handle.text(this.value);
				},

				// Callback function
				onSlideEnd: function(position, value) {}
			});
		});
	}

	/**
	 * Get QUery string variable value.
	 * @param {string} sParam Holds the queristring variable.
	 */
	function moc_get_query_variable( sParam ) {
		var sPageURL = window.location.search.substring(1),
			sURLVariables = sPageURL.split('?'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
			}
		}
		return false;
	}
	// Read a page's GET URL variables and return them as an associative array.	
	function moc_get_url_vars()	
	{	
		var vars = [], hash;	
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');	
		for(var i = 0; i < hashes.length; i++)	
		{	
			hash = hashes[i].split('=');	
			vars.push(hash[0]);	
			vars[hash[0]] = hash[1];	
		}	
		return vars;	
	}

	/**
	 * For Element equal height Js.
	 * @param {string} element Holds the selected element.
	 */
	function moc_equal_heights( element ) {
		if ( 768 < $( window ).width() ) {
			var max_height = 120;
		} else if ( 768 === $( window ).width() ) {
			var max_height = 150;
		}

		$( element ).each( function() {
			max_height = Math.max( $( element ).height(), max_height );
		} );

		$( element ).each( function() {
			$( element ).height( max_height );
		} );
	}

	/**
	 * For Element equal height Js.
	 * @param {string} element Holds the selected element.
	 */
	function moc_dynamic_equal_heights(element, element_height) {
		if ($(window).width() > 768) {
			var max_height = element_height;
			$(element).each(function() {
				max_height = Math.max($(element).height(), max_height);
			});

			$(element).each(function() {
				$(element).height(max_height);
			});
		} else if ($(window).width() === 768) {
			var max_height = element_height;
			$(element).each(function() {
				max_height = Math.max($(element).height(), max_height);
			});

			$(element).each(function() {
				$(element).height(max_height);
			});
		}

	}
	/**
	 * Function to return generate otp.
	 */
	function moc_make_otp(length, chars) {
		var result = '';
		for (var i = length; i > 0; --i) {
			result += chars[Math.round(Math.random() * (chars.length - 1))];
		}
		return result;
	}
	function moc_qty_plus_minus_input( qty, this_btn ) {
		var val   = parseFloat(qty.val());
		var max = parseFloat(qty.attr( 'max' ));
		var min = parseFloat(qty.attr( 'min' ));
		var step = parseFloat(qty.attr( 'step' ));

		// Change the value if plus or minus
		if ( this_btn.is( '.plus' ) ) {
		   if ( max && ( max <= val ) ) {
			  qty.val( max );
		   }
		   else {
		   	qty.val( val + step );
		  }
		} else {
		   if ( min && ( min >= val ) ) {
			  qty.val( min );
		   } 
		   else if ( val > 1 ) {
			  qty.val( val - step );
		   }
		}
	}
	// Check if back button is clicked in the browser.
	var perf_entries = performance.getEntriesByType( 'navigation' );
	if ( 0 < perf_entries.length && 'back_forward' === perf_entries[0].type ) {
		location.reload();
	}

	function input_radio_checkbox () {
		$("input:checkbox").on('click', function() {
			// in the handler, 'this' refers to the box clicked on
			var $box = $(this);
			if ($box.is(":checked")) {
				// the name of the box is retrieved using the .attr() method
				// as it is assumed and expected to be immutable
				var group = "input:checkbox[name='" + $box.attr("name") + "']";
					// the checked state of the group/box on the other hand will change
					// and the current value is retrieved using .prop() method
					$(group).prop("checked", false);
					$box.prop("checked", true);
			} else {
				$box.prop("checked", false);
			}
		});
	}
	/**
	 * Function for copy to clipboard any text.
	 */
	function moc_copytoclipboard( text ) {
		var sampleTextarea = document.createElement("textarea");
		document.body.appendChild(sampleTextarea);
		sampleTextarea.value = text; //save main text in it
		sampleTextarea.select(); //select textarea contenrs
		document.execCommand("copy");
		document.body.removeChild(sampleTextarea);
	}

	function get_editor_content( editor_id ) {
		var mce_editor = tinymce.get(editor_id);
		
		if( mce_editor ) {
		  var val = wp.editor.getContent( editor_id ); // Visual tab is active
		} else {
		  var val = $( '#'+ editor_id ).val(); // HTML tab is active
		}

		return val;
	}

	function profile_links_box () {	
		$('.profile_links ul li').hover(function (){	
			$('.profile_links ul').addClass('active_hover');	
			$('.profile_links ul a').removeClass('active_hover');	
			$(this).find('a').addClass('active_hover');	
			var position = $(this).position();	
			var left_position = position.left + 22;	
			var data_text = $(this).find('a').data('text');	
			$('.profile_links ul .tubelight').css('left', left_position);	
			$('.profile_links .profile_links_text .links_text_box span').text(data_text);	
		} );

		$('.profile_links ul').mouseleave(function() {	
			$('.profile_links ul').removeClass('active_hover');	
			$('.profile_links ul a').removeClass('active_hover');	
			$('.profile_links .profile_links_text .links_text_box span').text('Profile');	
		} );

		$('.profile_name .gradient-title .profile_more_icon_bar').click(function() {	
			$(this).toggleClass('clicked_icon');	
			$('.profile_links').toggleClass('hover_div');	
		} );
	}	
	profile_links_box();

	$.fn.inputFilter = function(callback, errMsg) {
		return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
		  if (callback(this.value)) {
			// Accepted value
			if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
			  $(this).removeClass("input-error");
			  this.setCustomValidity("");
			}
			this.oldValue = this.value;
			this.oldSelectionStart = this.selectionStart;
			this.oldSelectionEnd = this.selectionEnd;
		  } else if (this.hasOwnProperty("oldValue")) {
			// Rejected value - restore the previous one
			$(this).addClass("input-error");
			this.setCustomValidity(errMsg);
			this.reportValidity();
			this.value = this.oldValue;
			this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		  } else {
			// Rejected value - nothing to restore
			this.value = "";
		  }
		});
	  };
  
	  $("#job_min_salary").inputFilter(function(value) {
		  return /^-?\d*[.]?\d{0,2}$/.test(value); }, "Must be a numeric value");
	  $("#job_max_salary").inputFilter(function(value) {
			  return /^-?\d*[.]?\d{0,2}$/.test(value); }, "Must be a numeric value");

	// Premium-content-filter-js
	const items = document.querySelectorAll("button.btn-cat");
	const products = document.querySelectorAll(".premium-cat-block");
	
	items.forEach((item) => {
		// Active
		item.addEventListener("click", () => {
			items.forEach((item) => {
			item.classList.remove("active");
			});
			item.classList.add("active");
		
			// Filter
			const valueAttr = item.getAttribute("data-filter");
			products.forEach((item) => {
			item.style.display = "none";
			if (
				item.getAttribute("data-filter").toLowerCase() ==
				valueAttr.toLowerCase() ||
				valueAttr == "all"
			) {
				item.style.display = "flex";
			}
			});
		});
	} );

	/* exapnd card */
	var $cell = $('.card');
	$cell.find('.js-expander').click(function() {
  		var $thisCell = $(this).closest('.card');
  		if ($thisCell.hasClass('is-collapsed')) {
			$cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed').addClass('is-inactive');
			$thisCell.removeClass('is-collapsed').addClass('is-expanded');
			if ($cell.not($thisCell).hasClass('is-inactive')) {
			} else {
	  			$cell.not($thisCell).addClass('is-inactive');
			}
  		} else {
			$thisCell.removeClass('is-expanded').addClass('is-collapsed');
			$cell.not($thisCell).removeClass('is-inactive');
		}
	});
	$cell.find('.js-collapser').click(function() {
  		var $thisCell = $(this).closest('.card');
  		$thisCell.removeClass('is-expanded').addClass('is-collapsed');
  		$cell.not($thisCell).removeClass('is-inactive');
	} );
	/* exapnd card */

	if ( $( '.mops_subscribe_elementor_library' )[0] ) {
		$( '.mops_subscribe_elementor_library' ).addClass( 'mops_subscribe_page' );
	}

	if ( $( '#enrollbtns' )[0] ) {
		$( document ).on( 'click', '#enrollbtns', function() {
			$( '.mainpricebox' ).addClass( 'active' );
		} );
	}

	if ( $( '.closebuttonmainprice' )[0] ) {
		$( document ).on( 'click', '.closebuttonmainprice', function() {
			$( '.mainpricebox' ).removeClass( 'active' );
		} );
	}

	// Agency signup email confirmation.
	var current_agency_subscription = '';
	if ( $( '.agency-signup-email-confirmation' ).length ) {
		$( document ).on( 'click', '.agency-signup-email-confirmation a', function( evt ) {
			evt.preventDefault();
			$( '.mainpricebox' ).addClass( 'active' );
			current_agency_subscription = $( this ).parents( '.agency-signup-email-confirmation' ).data( 'agency-subscription' );

			if ( 'paid' === current_agency_subscription ) {
				// Hide the agency name field. This is only required for the free subscription.
				$( 'input[name="agency-name"]' ).hide();
			} else if ( 'free' === current_agency_subscription ) {
				// Show up the agency name field.
				$( 'input[name="agency-name"]' ).show();
			}
		} );
	}

	// Proceed to agency signup.
	if ( $( '.proceed-to-agency-signup' ).length ) {
		$( document ).on( 'click', '.proceed-to-agency-signup', function( evt ) {
			evt.preventDefault();
			var use_same_email = $( 'input[name="agency-signup-same-email"]:checked' ).val();

			// If it's the free subscription.
			if ( 'free' === current_agency_subscription ) {
				// If the customer wants to go with same email.
				if ( 'yes' === use_same_email ) {
					var agency_name = $( 'input[name="agency-name"]' ).val();

					if ( 1 !== is_valid_string( agency_name ) ) {
						moc_show_toast( 'bg-danger', 'fa-skull-crossbones', toast_error_heading, 'Agency name is required.' );
					} else {
						window.location.href = window.location.origin + window.location.pathname + '?agency_signup=' + current_agency_subscription + '&logout=no&same_email=yes&agency_name=' + agency_name;
					}
				} else if ( 'no' === use_same_email ) { // If the customer wants to go with a different email.
					window.location.href = window.location.origin + window.location.pathname + '?agency_signup=' + current_agency_subscription + '&logout=yes&same_email=no';
				}
			} else if ( 'paid' === current_agency_subscription ) { // If it is the paid subscription.
				// If the customer wants to go with same email.
				if ( 'yes' === use_same_email ) {
					window.location.href = window.location.origin + '/checkout/?add-to-cart=233628';
				} else if ( 'no' === use_same_email ) { // If the customer wants to go with a different email.
					window.location.href = window.location.origin + window.location.pathname + '?agency_signup=' + current_agency_subscription + '&logout=yes&same_email=no';
				}
			}
		} );
	}

	// Agency profile: customer dashbord.
	if ( true === current_page_url.includes( 'my-account/agency-profile' ) ) {
		// Agency description character count.
		$( document ).on( 'keyup', '.agencyformgroup #agency-description', function() {
			var description = $( this ).val();

			// If the description crosses the 400 limit, restrict the user from entering more content.
			if ( 400 <= description.length ) {
				$( this ).val( description.substring( 0, 399 ) );
			}

			// Update the counter.
			$( 'small.agency-description-characters-count' ).text( description.length + ' of 400 characters' );
		} );

		// Agency testimonial text character count.
		$( document ).on( 'keyup', '.agencyformone.mentions #agency-testimonial-text', function() {
			var testimonial_text = $( this ).val();

			// If the testimonial text crosses the 400 limit, restrict the user from entering more content.
			if ( 400 <= testimonial_text.length ) {
				$( this ).val( testimonial_text.substring( 0, 399 ) );
			}

			// Update the counter.
			$( 'small.agency-testimonial-text-characters-count' ).text( testimonial_text.length + ' of 400 characters' );
		} );

		// Add new taxonomy term.
		$( document ).on( 'click', '.add-new-taxonomy-term', function() {
			var taxonomy      = $( this ).data( 'taxonomy' );
			var type          = $( this ).data( 'type' );
			var new_term_html = '<div class="region">';
			new_term_html    += '<input type="text" placeholder="Enter ' + type + '">';
			new_term_html    += '<i class="save save-new-taxonomy-term fa fa-check-circle" data-taxonomy="' + taxonomy + '"></i>';
			new_term_html    += '<i class="close close-new-taxonomy-term fa fa-times-circle"></i>';
			new_term_html    += '</div>';
			$( '#' + type + 's-container' ).html( new_term_html );
		} );

		// Close new taxonomy term.
		$( document ).on( 'click', '.close-new-taxonomy-term', function() {
			$( this ).parent( '.region' ).remove();
		} );

		// Video preview.
		if ( $( '#agency-video' ).length ) {
			var agency_video_url = $( '#agency-video' ).val();

			if ( '' !== agency_video_url ) show_agency_video_preview( agency_video_url );

			$( document ).on( 'keyup change', '#agency-video', function() {
				var video_url = $( this ).val();

				show_agency_video_preview( video_url );
			} );

			/**
			 * Show the video preview.
			 *
			 * @param {*} video_url 
			 */
			function show_agency_video_preview( video_url ) {
				var video_id     = extract_youtube_video_id( video_url ) || extract_vimeo_video_id( video_url );
				var preview_html = '';

				if ( -1 === video_id ) {
					preview_html = '';
				} else if ( null === video_id ) {
					preview_html = '<p style="color: red;">Invalid YouTube or Vimeo URL</p>';
				} else {
					const video_embed_url = ( 'youtube' === video_id.type ) ? `https://www.youtube.com/embed/${video_id.id}` : `https://player.vimeo.com/video/${video_id.id}`;
					preview_html          = `<iframe width="560" height="315" src="${video_embed_url}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`;
				}

				$( '#videoPreview' ).html( preview_html );
			}

			/**
			 * Extract the video ID from youtube video url.
			 *
			 * @param {string} video_url Video URL.
			 *
			 * @return {string}
			 */
			function extract_youtube_video_id( video_url ) {
				if (  '' === video_url ) return -1;

				const regex = /(?:https?:\/\/)?(?:www\.)?youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/|live\/)?([a-zA-Z0-9_-]{11})|(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11})/;
				const match = video_url.match( regex );

				return match ? { id: match[1] || match[2], type: 'youtube' } : null;
			}

			/**
			 * Extract the video ID from vimeo video url.
			 *
			 * @param {string} video_url Video URL.
			 *
			 * @return {string}
			 */
			function extract_vimeo_video_id( video_url ) {
				if (  '' === video_url ) return -1;

				const regex = /(?:https?:\/\/)?(?:www\.)?vimeo\.com\/(?:video\/)?(\d+)/;
				const match = video_url.match( regex );

				return match ? { id: match[1], type: 'vimeo' } : null;
			}
		}

		// Toggle agency articles.
		$( document ).on( 'click', '.toggle-agency-articles', function() {
			$( '.user-agency-articles' ).slideToggle( 1500 );
		} );

		// Add person.
		$( document ).on( 'click', '.addpersone', function() {
			var this_button          = $( this );
			var this_button_text     = this_button.text();
			var current_people_count = $( '.agency-main-people-container .person-data' ).length;

			// Send the AJAX request for adding a new person html.
			$.ajax({
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'add_agency_person_html',
					current_people_count: current_people_count,
				},
				beforeSend: function() {
					this_button.text( 'Adding...' );
				},
				success: function( response ) {
					if ( 'new-person-html' === response.data.code ) {
						$( '.agency-main-people-container' ).append( response.data.html );
					}
				},
				complete: function() {
					this_button.text( this_button_text );
				},
			} );
		} );

		// Agency actions.
		$( document ).on( 'click', '.agency-actions li a', function() {
			var this_button               = $( this );
			var status                    = this_button.data( 'status' );
			var agency_name               = $( '#agency-name' ).val();
			var agency_desc               = $( '#agency-description' ).val();
			var agency_featured_image_id  = $( '.agency-featured-image-id' ).val();
			var contact_name              = $( '#agency-contact-name' ).val();
			var contact_email             = $( '#agency-contact-email' ).val();
			var contact_website           = $( '#agency-contact-website' ).val();
			var agency_type               = $( 'input[name="agency-type"]:checked' ).val();
			var agency_year_founded       = $( '#agency-year-founded' ).val();
			var agency_employees          = $( '#agency-employees' ).val();
			var agency_regions            = [];
			var agency_primary_verticals  = [];
			var agency_services           = [];
			var agency_people             = [];
			var agency_testimonial_text   = $( '#agency-testimonial-text' ).val();
			var agency_testimonial_author = $( '#agency-testimonial-author' ).val();
			var agency_clients            = $( '#agency-clients' ).val();
			agency_clients                = ( -1 !== is_valid_string( agency_clients ) ) ? agency_clients.split( "\n" ) : [];
			var agency_certifications     = $( '#agency-certifications' ).val();
			agency_certifications         = ( -1 !== is_valid_string( agency_certifications ) ) ? agency_certifications.split( "\n" ) : [];
			var agency_awards             = $( '#agency-awards' ).val();
			agency_awards                 = ( -1 !== is_valid_string( agency_awards ) ) ? agency_awards.split( "\n" ) : [];
			var include_articles          = ( $( '#include-articles' ).is( ':checked' ) ) ? 'yes' : 'no';
			var include_jobs              = ( $( '#include-jobs' ).is( ':checked' ) ) ? 'yes' : 'no';
			var agency_video              = $( '#agency-video' ).val();
			var agency_articles           = [];
			var agency_featured_image     = $( '#agency-featured-image' ).prop( 'files' )[0];
			var agency_form_data          = new FormData();

			// Loop through the regions.
			$( '.agency-region' ).each( function() {
				if ( $( this ).is( ':checked' ) ) {
					agency_regions.push( parseInt( $( this ).val() ) );
				}

			} );

			// Loop through the primary verticals.
			$( '.agency-primary-vertical' ).each( function() {
				if ( $( this ).is( ':checked' ) ) {
					agency_primary_verticals.push( parseInt( $( this ).val() ) );
				}

			} );

			// Loop through the services.
			$( '.agency-service' ).each( function() {
				if ( $( this ).is( ':checked' ) ) {
					agency_services.push( parseInt( $( this ).val() ) );
				}

			} );

			// Loop through the agency people.
			$( '.agency-main-people-container .person-data' ).each( function() {
				var this_person       = $( this );
				var fullname          = this_person.find( '.fullname' ).val();
				var position          = this_person.find( '.position' ).val();
				var linkedin          = this_person.find( '.linkedin' ).val();
				var displaypicture    = this_person.find( '.displaypicture' ).prop( 'files' )[0];
				var displaypicture_id = this_person.find( '.displaypicture_id' ).val();
				var agency_person_obj = {
					'fullname': fullname,
					'position': position,
					'linkedin': linkedin,
					// 'displaypicture': displaypicture,
					'displaypicture_id': displaypicture_id,
				};

				agency_people.push( agency_person_obj );
			} );

			// Loop through the article ids.
			$( '.agency-article-id' ).each( function() {
				if ( $( this ).is( ':checked' ) ) {
					agency_articles.push( parseInt( $( this ).val() ) );
				}
			} );

			agency_form_data.append( 'action', 'update_agency' );
			agency_form_data.append( 'agency_featured_image', agency_featured_image );
			agency_form_data.append( 'status', status );
			agency_form_data.append( 'agency_id', $( '#agency-id' ).val() );
			agency_form_data.append( 'agency_name', agency_name );
			agency_form_data.append( 'agency_desc', agency_desc );
			agency_form_data.append( 'agency_featured_image_id', agency_featured_image_id );
			agency_form_data.append( 'agency_contact_name', contact_name );
			agency_form_data.append( 'agency_contact_email', contact_email );
			agency_form_data.append( 'agency_contact_website', contact_website );
			agency_form_data.append( 'agency_type', agency_type );
			agency_form_data.append( 'agency_year_founded', agency_year_founded );
			agency_form_data.append( 'agency_employees', agency_employees );
			agency_form_data.append( 'agency_regions', agency_regions );
			agency_form_data.append( 'agency_primary_verticals', agency_primary_verticals );
			agency_form_data.append( 'agency_services', agency_services );
			agency_form_data.append( 'agency_people', agency_people );
			agency_form_data.append( 'agency_testimonial_text', agency_testimonial_text );
			agency_form_data.append( 'agency_testimonial_author', agency_testimonial_author );
			agency_form_data.append( 'agency_clients', agency_clients );
			agency_form_data.append( 'agency_certifications', agency_certifications );
			agency_form_data.append( 'agency_awards', agency_awards );
			agency_form_data.append( 'include_articles', include_articles );
			agency_form_data.append( 'agency_articles', agency_articles );
			agency_form_data.append( 'include_jobs', include_jobs );
			agency_form_data.append( 'agency_video', agency_video );

			// Send the AJAX request for updating the agency details.
			$.ajax( {
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: agency_form_data,
				contentType: false,
				processData: false,
				beforeSend: function() {
					this_button.text( 'Updating...' );
				},
				success: function( response ) {
					if ( 'agency-updated' === response.data.code ) {
						moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
					}
				},
				complete: function() {
					if ( 'draft' === status ) {
						this_button.html( 'Save Draft' );
					} else if ( 'publish' === status ) {
						this_button.html( 'Publish Profile' );
					}
				},
			} );
		} );
	}

	// Agency listing page.
	if ( true === current_page_url.includes( 'marketing-operations-agency-directory' ) ) {
		// Filter the agencies.
		$( document ).on( 'change', '.agency-filter-field', function() {
			var agency_type             = $( '.agency-type' ).val();
			var agency_primary_vertical = $( '.agency-primary-verticals' ).val();
			var agency_services         = $( '.agency-services' ).val();
			var agency_region           = $( '.agency-regions' ).val();

			// Send the AJAX request for filtering the agencies.
			$.ajax({
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'filter_agencies',
					agency_type: agency_type,
					agency_primary_vertical: agency_primary_vertical,
					agency_services: agency_services,
					agency_region: agency_region,
				},
				beforeSend: function() {
					console.log( 'enable the filter loader' );
				},
				success: function( response ) {
					if ( 'agency-updated' === response.data.code ) {
						moc_show_toast( 'bg-success', 'fa-check-circle', toast_success_heading, response.data.toast_message );
					}
				},
				complete: function() {
					console.log( 'disable the filter loader' );
				},
			} );
		} );
	}
} );




/* image preview */
jQuery(document).ready(function ($) {
	$( document ).on( 'change', '.imageInput', function () {
		const container        = $(this).closest( '.image-upload-container' );
		const previewContainer = container.find( '.preview-container' );
		const img              = container.find( '.preview-image' );

		console.log( 'this.files', this.files );

		if ( this.files && this.files[0] && this.files[0].type.match('image.*') ) {
			const reader  = new FileReader();
			reader.onload = function (e) {
				img.attr( 'src', e.target.result );
				previewContainer.show();
	  		};
	 		reader.readAsDataURL(this.files[0]);
		}
  } );

	$('.remove-preview-btn').on('click', function () {
		const container        = $(this).closest('.image-upload-container');
		const previewContainer = container.find('.preview-container');
		const inputFile        = container.find('.imageInput');
		const img              = container.find('.preview-image');

		img.attr( 'src', '' );
		previewContainer.hide();
		inputFile.val( '' );
	});
});
/* image preview */

jQuery(document).ready(function ($) {
  $("#dynamicContent").on("click", ".remove-person", function () {
	const personId = $(this).data("person-id");
	$(`#personBlock${personId}`).remove();
  });
  $("#dynamicContent").on("change", ".imageInput", function () {
	const container = $(this).closest('.image-upload-container');
	const previewContainer = container.find('.preview-container');
	const img = container.find('.preview-image');
	if (this.files && this.files[0]) {
	  const reader = new FileReader();
	  reader.onload = function (e) {
		img.attr('src', e.target.result);
		previewContainer.show();
	  };
	  reader.readAsDataURL(this.files[0]);
	}
  });
  $("#dynamicContent").on("click", ".remove-preview-btn", function () {
	const container = $(this).closest('.image-upload-container');
	const previewContainer = container.find('.preview-container');
	const inputFile = container.find('.imageInput');
	const img = container.find('.preview-image');
	img.attr('src', '');
	previewContainer.hide();
	inputFile.val('');
  });
});
/* toggle */
