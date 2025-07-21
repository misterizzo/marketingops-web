// JavaScript Document
jQuery(document).ready(function ($) {
	// Localized variables.
	var ajaxurl = Child_Theme_Main_JS.ajaxurl;


	// New Homepage JS
	function new_home () {
		if($('body').hasClass('page-id-216449')) {
			$('body').addClass('new_homepage');
		}

		$('.mops_community .mops_com_content_box').click(function () {
			var link = $(this).find('.elementor-button').attr('href');
			var target = $(this).find('.elementor-button').attr('target');
			if(target == '_blank') {
				window.open(link, '_blank');
			} else {
				window.location.href = link;
			}
		});

	}

	new_home ();
	
	// If we're on the courses list page.

	// on scroll JS
	$(window).scroll(function () {
		// Sticky Header JS
		if ($('body').hasClass('admin-bar')) {
			var wp_admin = $('.admin-bar').find('#wpadminbar').height(),
				sticky = $('.moc_header'),
				body = $('body'),
				sticky_height = sticky.height(),
				sticky_height = sticky_height;
			sticky.addClass('sticky').css('top', wp_admin);
			body.css("padding-top", sticky_height);
		} else {
			var sticky = $('.moc_header'),
				body = $('body'),
				sticky_height = sticky.height(),
				sticky_height = sticky_height;
			sticky.addClass('sticky');
			body.css("padding-top", sticky_height);
		}

		// Sticky Sidebar JS
		var sticky = $('.sticky_sidebar.elementor-sticky--active');
		sticky.css('top', sticky_height);

	});

	function media_jq() {
		// max width: 1024
		if ($(window).width() < 1025) {
			// Humburger Open Menu JS
			$(document).on('click', '.responsive_menu .menu_bar', function () {
				$(this).closest('.responsive_menu').find('.r_menu_hover').removeClass('menu--close').addClass('menu--open').slideDown("slow");
			});
			// Humburger Close Menu JS
			$(document).on('click', '.responsive_menu .menu_close_bar', function () {
				$(this).parents('.responsive_menu').find('.r_menu_hover').removeClass('menu--open').addClass('menu--close').slideUp("slow");
				$(this).parents('.responsive_menu').find('.normal_menu').css('max-height', '');
				$(this).parents('.responsive_menu').find('.menu_main_ul').css('height', '');
				$(this).parents('.responsive_menu').find('.menu_hover').removeClass('profile-menu--open').addClass('profile-menu--close');
			});
			// Humburger Close Menu JS
			$(document).on('click', '.responsive_menu .menu_header_title', function () {
				$(this).removeClass('active-menu');
				$(this).find('.sub-arrow').css('display', 'none');
				$(this).parents('.responsive_menu').find('.normal_menu').css('max-height', '');
				$(this).parents('.responsive_menu').find('.menu_main_ul').css('height', '');
				$(this).parents('.responsive_menu').find('.menu_hover').removeClass('profile-menu--open').addClass('profile-menu--close');
			});
			// Dropdown Open & Redirect Menu JS
			$(document).on('click', '.r_menu_hover .menu-item-has-children .menu-image-title-after', function (e) {
				if (!$(this).parents('.menu-item-has-children').hasClass('has-sub-menu--open')) {
					e.preventDefault();
					if ($('.menu-item-has-children').hasClass('has-sub-menu--open')) {
						$('.menu-item-has-children').removeClass('has-sub-menu--open').addClass('has-sub-menu--close').find('ul').slideUp("slow");
					}
					$(this).parents('.menu-item-has-children').removeClass('has-sub-menu--close').addClass('has-sub-menu--open').find('ul').slideDown("slow");
				}
			});
			$(document).on('click', '.r_menu_hover .profile_menu', function () {
				if (!$('body').hasClass('moc_not_logged_in_user')) {
					var height = $(this).parents('.nav_dropdown').find('.menu_hover').height();
					$(this).parents('.hover_menu_body').find('.menu_main_ul').css('height', height);
					$(this).parents('.hover_menu_body').find('.normal_menu').css('max-height', '0');
					$(this).parents('.r_menu_hover').find('.menu_header_title').addClass('active-menu')
					$(this).parents('.r_menu_hover').find('.menu_header_title .sub-arrow').css('display', 'inline-block');
					$(this).parents('.nav_dropdown').find('.menu_hover').removeClass('profile-menu--close').addClass('profile-menu--open');
				}
			});
		}
		// max width: 767
		if ($(window).width() < 768) {
			// Top Bar JS
			$(document).on('click', '.topbar_box .profile_menu', function (e) {
				e.preventDefault();
				if ($(this).parent().hasClass('active_menu')) {
					$(this).parent().removeClass('active_menu');
				} else {
					$(this).parent().addClass('active_menu');
				}
			});
		} else {
			$(document).on('click', '.topbar_box .profile_menu', function (e) {
				e.preventDefault();
				$(this).parent().removeClass('active_menu');
			});
		}
	}

	// $('.carousel').slick(slickopts);
	var slickopts = {
		slidesToShow: 3,
		slidesToScroll: 3,
		dots: true,
		arrows: false,
		rows: 2, // Removes the linear order. Would expect card 5 to be on next row, not stacked in groups.
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 776,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		}
		]
	};
	$('.carousel').slick(slickopts);

	var slickopts = {
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: true,
		autoplay: true,
		infinite: false,
		autoplaySpeed: 3000,
		rows: 1,
	};

	$('.custom_slider').slick(slickopts);



	var $range = $(".js-range-slider"),
		$from = $(".from"),
		$to = $(".to"),
		range,
		min = $range.data('min'),
		max = $range.data('max'),
		from,
		to;
	var updateValues = function () {
		$from.prop("value", from);
		$to.prop("value", to);
		$(".from").change();
		$(".to").change();
	};


	$range.ionRangeSlider({
		from: $from.val(),
		onChange: function (data) {
			from = data.from;
			to = data.to;
			updateValues();
		}
	});

	range = $range.data("ionRangeSlider");
	var updateRange = function () {
		range.update({
			from: from,
			to: to
		});
		$from.change();
		$to.change();
	};

	$from.on("input", function () {
		from = +$(this).prop("value");
		if (from < min) {
			from = min;
		}
		if (from > to) {
			from = to;
		}
		updateValues();
		updateRange();
	});

	$to.on("input", function () {
		to = +$(this).prop("value");
		if (to > max) {
			to = max;
		}
		if (to < from) {
			to = from;
		}
		updateValues();
		updateRange();
	});





	$('#job_any_exp').on('click', function () {
		if (this.checked) {
			$('.search_checkbox').each(function () {
				this.checked = false;
			});
		}
	});
	$('.search_checkbox').on('click', function () {
		if ($('.search_checkbox:checked').length >= 1) {
			$('#job_any_exp').prop('checked', false);
		}
	});


	$('#job_any_type').on('click', function () {
		if (this.checked) {
			$('.search_checkbox2').each(function () {
				this.checked = false;
			});
		}
	});
	$('.search_checkbox2').on('click', function () {
		if ($('.search_checkbox2:checked').length >= 1) {
			$('#job_any_type').prop('checked', false);
		}
	});


	$("#posturjob").detach().insertAfter(".lastfield");

	$('.editcancel').click(function (e) {
		var action = $(this).attr('data-action');
		if (action == 'edit') {
			$(this).attr('data-action', 'cancel');
			$(this).text('Cancel');
			$(this).parents('.profile_inner_section').find('.sub_title_with_content').removeClass('editmode_off');
			$(this).parents('.profile_inner_section').find('.saveprofile').show();
		} else {
			$(this).attr('data-action', 'edit');
			$(this).text('Edit');
			$(this).parents('.profile_inner_section').find('.sub_title_with_content').addClass('editmode_off');
			$(this).parents('.profile_inner_section').find('.saveprofile').hide();
		}
	});


	$('.expandableCollapsibleDiv > h3').click(function (e) {
		var showElementDescription = $(this).parents('.expandableCollapsibleDiv').find('ul');

		if ($(showElementDescription).is(':visible')) {
			showElementDescription.hide("fast", "swing");
			//$(this).attr("src", "Image/up-arrow.jpg");
			$(this).removeClass('open').addClass('close');

		} else {
			showElementDescription.show("fast", "swing");
			$(this).removeClass('close').addClass('open');
			//$(this).attr("src", "Image/down-arrow.jpg");

		}
	});

	$('#testimonialshowmore').click(function (event) {
		event.preventDefault();
		$('#testimonial_container').show("fast", "swing");
		$('#testimonialshowmore').hide();
	});

	$('#testimonialshowless').click(function (event) {
		event.preventDefault();
		$("#marketingops-post-section").animate({ scrollTop: 0 }, "slow");
		// $( '#marketingops-post-section' ).scrollTo(100);
		$('#testimonial_container').hide("fast", "swing");
		$('#testimonialshowmore').show();
	});



	$('body').on('change', '.socialtype', function () {
		var scname = $(this).val();
		$(this).parents('.profile_experience').find('.social_input').attr({
			'name': scname,
			'data-label': scname
		});
	});

	$('.add_more_profile_experience').on('click', function () {
		var $limit = $(this).parents('.profile_inner_section').find('.profile_experience_container').attr('data-limit');
		if ($limit) { } else {
			$limit = 10;
		}

		var numItems = $(this).parents('.profile_inner_section').find('.profile_experience_container .profile_inner_section').length;
		console.log(numItems + '---' + $limit);
		if (numItems < $limit) {
			var $item = $(this).parents('.profile_inner_section').find('.profile_experience:first-child').clone();
			$item.find('input, textarea').val('');
			$item.find('.deletesec').html('<input type="button" value="delete" class="btn" onclick="jQuery(this).parents(\'.profile_experience\').remove();">');
			$item.appendTo($(this).parents('.profile_inner_section').find('.profile_experience_container'));
		}
	});

	$(".expertlevel").ionRangeSlider({
		grid: true,
		from: new Date().getMonth(),
		values: [
			"Beginner", "Average", "Skilled", "Specialist", "Expert"
		]
	});

	$('.cleardata').click(function (e) {
		$(this).parents('.profile_experience').find('input:text, input:password, input:file, textarea').val('');
	});


	$('.saveprofile').click(function (e) {

		var datasection = $(this).parents('.profile_inner_section').attr('data-section');

		if (datasection) {

			var searchx;
			searchx = "";
			var parentdiv = $(this).parents('.profile_inner_section');

			var divs_array = [];

			$(parentdiv).find('.profile_experience').not(".notpe").each(function (i) {
				var each_div_array = [];
				$(this).find('input:text, textarea').each(function (i) {
					var label = $(this).attr('data-label');
					var val = $(this).val();
					each_div_array.push([label, val]);
				});
				divs_array.push(each_div_array);
			});

			var industry_experience_in_array = [];
			$(parentdiv).find(".profilecontent input:text, .profilecontent textarea, input[name='industry_experience_in[]']:checked").each(function (i) {
				var input_type = $(this).attr('type');
				if (input_type == 'checkbox') {
					industry_experience_in_array.push($(this).val());
				} else {
					var label = $(this).attr('data-label');
					var val = $(this).val();
					divs_array.push([label, val]);
				}

			});

			if (industry_experience_in_array) {
				divs_array.push(['industry_experience_in', industry_experience_in_array]);
			}

			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: pp_ajax_form.ajaxurl,
				data: {
					'action': 'save_profile_ajax_call',
					'save_type': datasection,
					'value': divs_array,
				},
				beforeSend: function (client) {
					$(parentdiv).addClass('loader');
				},
				success: function (response) {
					$(parentdiv).removeClass('loader');
					if (response.success == 'success') {
						alert('Profile updated successfully.');
					}

					$(parentdiv).find('.editcancel').attr('data-action', 'edit').text('Edit');
					$(parentdiv).find('.sub_title_with_content').addClass('editmode_off');
					$(parentdiv).find('.saveprofile').hide();

				}
			});
		}
	});

	// Jq for fixed height on partner pages

	function fix_height_partner_page_content_one() {
		var heights = new Array();
		$('.partner_section_box_content_one').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.partner_section_box_content_one').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_partner_page_content_two() {
		var heights = new Array();
		$('.partner_section_box_content_two').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.partner_section_box_content_two').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_bs_no_index() {
		var heights = new Array();
		$('.no_bs_index .no_bs_container .no_bs_content_box .box_container .box_content').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.no_bs_index .no_bs_container .no_bs_content_box .box_container .box_content').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_bs_no_index_one() {
		var heights = new Array();
		$('.no_bs_index .no_bs_container .no_bs_content_box .box_container .box_content .content_container .bs_content .site_link_verify').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.no_bs_index .no_bs_container .no_bs_content_box .box_container .box_content .content_container .bs_content .site_link_verify').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_bs_no_index_two() {
		var heights = new Array();
		$('.no_bs_index .no_bs_container .no_bs_content_box .box_container .box_content .content_container .bs_content .bs_content_text').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.no_bs_index .no_bs_container .no_bs_content_box .box_container .box_content .content_container .bs_content .bs_content_text').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_normal_product_page_related_product_title() {
		var heights = new Array();
		$('.product_related .elementor-widget-woocommerce-product-related .related.products .products .product a h2').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.product_related .elementor-widget-woocommerce-product-related .related.products .products .product a h2').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_summer_camp_faq_titles() {
		var heights = new Array();
		$('.faq_section .faq_section_row .faq_box_section .faq_box h3').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.faq_section .faq_section_row .faq_box_section .faq_box h3').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_resources_page_content_one() {
		var heights = new Array();
		$('.resource_boxes_content_one .content_text').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.resource_boxes_content_one .content_text').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function fix_height_resources_page_content_two() {
		var heights = new Array();
		$('.resource_boxes_content_two .content_text').each(function () {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			heights.push($(this).height());
		});
		var max = Math.max.apply(Math, heights);
		$('.resource_boxes_content_two .content_text').each(function () {
			$(this).css('height', max + 'px');
		});
	}

	function subscribe_table() {
		var data_src = $('.membership_table .subscribe_table .table_head a.active').data('src');
		$('.' + data_src).css('display', 'block');
	}

	function subscribe_table_click() {
		$('.membership_table .subscribe_table .table_head a').click(function () {
			var data_src = $(this).data('src');
			$('.membership_table .subscribe_table .table_head a').removeClass('active');
			$('.membership_table .subscribe_table .table_body .table_tr .body_colum').css('display', 'none');
			$(this).addClass('active');
			$('.' + data_src).css('display', 'block');
		});
	}

	function hire_main_tab_click() {

		if ($(window).width() < 768) {
			/* On Mobile Change Title Text */
			var mob_title = $('.hiring_program_offer .membership_table h2').data('mob-title-content');
			$('.hiring_program_offer .membership_table h2').text(mob_title);
		}

		$('.hiring_program_offer .membership_table .heading_btn a').click(function (e) {
			e.preventDefault();

			/* Hide Small Content */
			$('.small_text.btn_tab_content_non_active').css('display', 'none');

			if (!$(this).hasClass('active_content')) {

				/* Change Btn Text */
				var btn_active_text = $(this).data('active-content');
				$(this).addClass('active_content');
				$(this).text(btn_active_text);

				/* Hide Tabs Title */
				$('.head_colum.free_colum, .head_colum.pro_colum, .head_colum.lifetime_colum').css('display', 'none');
				$('.head_colum.free_colum, .head_colum.pro_colum, .head_colum.lifetime_colum').addClass('btn_tab_non_active');
				$('.head_colum.free_colum, .head_colum.pro_colum, .head_colum.lifetime_colum').removeClass('btn_tab_active');
				/* Show hide Tabs Title */
				$('.head_colum.role_colum, .head_colum.annual_colum').css('display', 'block');
				$('.head_colum.role_colum, .head_colum.annual_colum').addClass('btn_tab_active');
				$('.head_colum.role_colum, .head_colum.annual_colum').removeClass('btn_tab_non_active');

				/* Hide Tabs Content */
				$('.body_colum.free_colum, .body_colum.pro_colum, .body_colum.lifetime_colum').css('display', 'none');
				$('.body_colum.free_colum, .body_colum.pro_colum, .body_colum.lifetime_colum').addClass('btn_tab_content_non_active');
				$('.body_colum.free_colum, .body_colum.pro_colum, .body_colum.lifetime_colum').removeClass('btn_tab_content_active');

				/* Show Hide Small Content */
				$('.small_text.btn_tab_content_non_active').css('display', 'block');

				// Media quries: 767
				if ($(window).width() < 768) {
					/* On Mobile Change Title Text */
					var active_mob_title = $(this).closest('.table_heading').find('h2').data('mob-active-title-content');
					$(this).closest('.table_heading').addClass('tab_content_active');
					$(this).closest('.table_heading').find('h2').text(active_mob_title);

					/* Show hide Tabs Content */
					$('.head_colum.role_colum a').addClass('active');
					$('.body_colum.role_colum').css('display', 'block');
					$('.body_colum.role_colum').addClass('btn_tab_content_active');
					$('.body_colum.role_colum').removeClass('btn_tab_content_non_active');

				} else {
					/* Change Title Text */
					var active_title = $(this).closest('.table_heading').find('h2').data('active-title-content');
					$(this).closest('.table_heading').addClass('tab_content_active');
					$(this).closest('.table_heading').find('h2').text(active_title);

					/* Show hide Tabs Content */
					$('.body_colum.role_colum, .body_colum.annual_colum').css('display', 'block');
					$('.body_colum.role_colum, .body_colum.annual_colum').addClass('btn_tab_content_active');
					$('.body_colum.role_colum, .body_colum.annual_colum').removeClass('btn_tab_content_non_active');
				}

			} else {

				/* Change Btn Text */
				var btn_active_text = $(this).data('content');
				$(this).removeClass('active_content');
				$(this).text(btn_active_text);

				/* Hide Tabs Title */
				$('.head_colum.role_colum, .head_colum.annual_colum').css('display', 'none');
				$('.head_colum.role_colum, .head_colum.annual_colum').addClass('btn_tab_non_active');
				$('.head_colum.role_colum, .head_colum.annual_colum').removeClass('btn_tab_active');
				/* Show hide Tabs Title */
				$('.head_colum.free_colum, .head_colum.pro_colum, .head_colum.lifetime_colum').css('display', 'block');
				$('.head_colum.free_colum, .head_colum.pro_colum, .head_colum.lifetime_colum').addClass('btn_tab_active');
				$('.head_colum.free_colum, .head_colum.pro_colum, .head_colum.lifetime_colum').removeClass('btn_tab_non_active');

				/* Hide Tabs Content */
				$('.body_colum.role_colum, .body_colum.annual_colum').css('display', 'none');
				$('.body_colum.role_colum, .body_colum.annual_colum').addClass('btn_tab_content_non_active');
				$('.body_colum.role_colum, .body_colum.annual_colum').removeClass('btn_tab_content_active');

				/* Hide Small Content */
				$('.small_text.btn_tab_content_non_active').css('display', 'none');

				// Media quries: 767
				if ($(window).width() < 768) {

					/* On Mobile Change Title Text */
					var active_mob_title = $(this).closest('.table_heading').find('h2').data('mob-title-content');
					$(this).closest('.table_heading').removeClass('tab_content_active');
					$(this).closest('.table_heading').find('h2').text(active_mob_title);

					/* Show hide Tabs Content */
					$('.head_colum.free_colum a').addClass('active');
					$('.body_colum.free_colum').css('display', 'block');
					$('.body_colum.free_colum').addClass('btn_tab_content_active');
					$('.body_colum.free_colum').removeClass('btn_tab_content_non_active');

				} else {
					/* Change Title Text */
					var active_title = $(this).closest('.table_heading').find('h2').data('title-content');
					$(this).closest('.table_heading').removeClass('tab_content_active');
					$(this).closest('.table_heading').find('h2').text(active_title);

					/* Show hide Tabs Content */
					$('.body_colum.free_colum, .body_colum.pro_colum, .body_colum.lifetime_colum').css('display', 'block');
					$('.body_colum.free_colum, .body_colum.pro_colum, .body_colum.lifetime_colum').addClass('btn_tab_content_active');
					$('.body_colum.free_colum, .body_colum.pro_colum, .body_colum.lifetime_colum').removeClass('btn_tab_content_non_active');
				}

			}
		});
	}

	$(window).on('load', function () {
		media_jq();
		fix_height_normal_product_page_related_product_title();
		fix_height_partner_page_content_one();
		fix_height_partner_page_content_two();
		fix_height_bs_no_index_one();
		fix_height_bs_no_index_two();
		fix_height_bs_no_index();
		fix_height_summer_camp_faq_titles();
		subscribe_table();
		subscribe_table_click();
		fix_height_resources_page_content_one();
		fix_height_resources_page_content_two();
		hire_main_tab_click();
		$(window).resize(function () {
			setTimeout(function () {
				media_jq();
				fix_height_normal_product_page_related_product_title();
				fix_height_partner_page_content_one();
				fix_height_partner_page_content_two();
				fix_height_bs_no_index_one();
				fix_height_bs_no_index_two();
				fix_height_bs_no_index();
				fix_height_summer_camp_faq_titles();
				subscribe_table();
				subscribe_table_click();
				fix_height_resources_page_content_one();
				fix_height_resources_page_content_two();
				hire_main_tab_click();
			}, 100);
		});
	});

	$('.user_profile_blog .user_profile_right_side .blog_box_container .right_side_box_tabbing_content .tabbing_content_container .tab_box a').click(function () {
		if (!$(this).closest('.tab_box').hasClass('active_tab')) {
			var data_tab = $(this).data('tab');
			$('.user_profile_blog .user_profile_right_side .blog_box_container .right_side_box_tabbing_content .tabbing_content_container .tab_box').removeClass('active_tab');
			$('.user_profile_blog .user_profile_right_side .blog_box_container .right_side_box_tab_contnet .tabbing_boxed_container .tabbing_content_details').removeClass('active_tab');
			$(this).closest('.tab_box').addClass('active_tab');
			$('#' + data_tab).addClass('active_tab');
		}
	});

	$(".hiring_program_offer .membership_table .link_btn").click(function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		var scroll_top = $('#' + href).offset().top;
		var scroll_top = scroll_top - 130;
		$('html, body').animate({
			scrollTop: scroll_top
		}, 2000);
	});

	$(".page-id-161517 .form_box fieldset.fieldset-type-text label").click(function (e) {
		e.preventDefault();
		$(this).addClass('active_label');
		$(this).parents('fieldset.fieldset-type-text').find('input').focus();
	});

	$('.page-id-161517 .form_box fieldset.fieldset-type-text input').blur(function(){
		var inputValue = $(this).val();
		if ( inputValue == "" ) {
		  $(this).parents('fieldset.fieldset-type-text').find('label').removeClass('active_label');
		} else {
			$(this).parents('fieldset.fieldset-type-text').find('label').addClass('active_label');
		}
	})
	

});


function saveprofile() {
	jQuery.ajax({
		type: "POST",
		dataType: 'json',
		url: pp_ajax_form.ajaxurl,
		data: {
			'action': 'save_profile_ajax_call',
		},
		success: function (response) {
			if (response.success == 'success') {

			} else {

			}
		}
	});
}

/* (function($) {
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
		return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Must be a numeric value");
	$("#job_max_salary").inputFilter(function(value) {
			return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Must be a numeric value");
  }(jQuery)) */
