// JavaScript Document

jQuery(document).ready(function ($) {
	function fix_height_ma_product_section_description_height_one() {
		// max width: 767
		if ($(window).width() > 768) {
			var heights = new Array();
			$('.mops_apalooza_product_section .ma_ps_product_one .ma_ps_product_text .elementor-widget-text-editor').each(function () {
				$(this).css('min-height', '0');
				$(this).css('max-height', 'none');
				$(this).css('height', 'auto');
				heights.push($(this).height());
			});
			var max = Math.max.apply(Math, heights);
			$('.mops_apalooza_product_section .ma_ps_product_one .ma_ps_product_text .elementor-widget-text-editor').each(function () {
				$(this).css('height', max + 'px');
			});
		}
	}

	function fix_height_ma_product_section_description_height_two() {
		// max width: 767
		if ($(window).width() > 768) {
			var heights = new Array();
			$('.mops_apalooza_product_section .ma_ps_product_two .ma_ps_product_text .elementor-widget-text-editor').each(function () {
				$(this).css('min-height', '0');
				$(this).css('max-height', 'none');
				$(this).css('height', 'auto');
				heights.push($(this).height());
			});
			var max = Math.max.apply(Math, heights);
			$('.mops_apalooza_product_section .ma_ps_product_two .ma_ps_product_text .elementor-widget-text-editor').each(function () {
				$(this).css('height', max + 'px');
			});
		}
	}

	function fix_height_ma_product_section_description_height_three() {
		// max width: 767
		if ($(window).width() > 768) {
			var heights = new Array();
			$('.mops_apalooza_product_section .ma_ps_product_three .ma_ps_product_text .elementor-widget-text-editor').each(function () {
				$(this).css('min-height', '0');
				$(this).css('max-height', 'none');
				$(this).css('height', 'auto');
				heights.push($(this).height());
			});
			var max = Math.max.apply(Math, heights);
			$('.mops_apalooza_product_section .ma_ps_product_three .ma_ps_product_text .elementor-widget-text-editor').each(function () {
				$(this).css('height', max + 'px');
			});
		}
	}

	$(window).on('load', function () {
		// fix_height_ma_product_section_description_height_one();
		// fix_height_ma_product_section_description_height_two();
		// fix_height_ma_product_section_description_height_three();
		$(window).resize(function () {
			setTimeout(function () {
				// fix_height_ma_product_section_description_height_one();
				// fix_height_ma_product_section_description_height_two();
				// fix_height_ma_product_section_description_height_three();
			}, 100);
		});
	});

	$('.ma_footer .ma_footer_column .ma_footer_image .elementor-widget-container svg .url_rect').click(function (e) { 
		e.preventDefault();
		var url = $(this).attr('href'); 
    	window.open(url, '_blank');
	});
// 	$('#show_all_reviews a').click(function(e){
// 		e.preventDefault();
// 		alert();
// 	 $('.show_more').show();
//    });
});


