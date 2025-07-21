jQuery( document ).ready( function( $ ) {
	'use strict';

	// Add a button after the API key field in the admin confgurations to test the API.
	if ( $( '#setting-supabase_database_api_key' ).length ) {
		$( '<a class="add-new-h2 test-supabase-jobs-api" href="javascript:void(0);" title="Test Supabase API">Test Supabase API</a>' ).insertAfter( '#setting-supabase_database_api_key' );
	}

	// Test the API.
	if ( $( '.test-supabase-jobs-api' ).length ) {
		$( document ).on( 'click', '.test-supabase-jobs-api', function() {
			$.ajax( {
				dataType: 'JSON',
				url: ajaxurl,
				type: 'POST',
				data: {
					action: 'test_supabase_api',
				},
				cache: true,
				success: function ( response ) {
					// If all the jobs are imported.
					var message = response.data.message;
					if ( '' !== message ) {
						$( '<label class="test-api-message" style="margin-left: 5px;">' + response.data.message + '</label>' ).insertAfter( '.test-supabase-jobs-api' );
						setTimeout( function() {
							$( '.test-api-message' ).remove();
						}, 3000 );
					}
				},
			} );
		} );
	}

	// When the window is completely loaded, make the AJAX call to start importing the jobs.
	$( window ).load( function() {
		var is_job_import_page = get_query_string_parameter_value( 'page' );
		if ( 'sync-with-supabase' === is_job_import_page ) {
			if ( 0 < $( '.progress-bar-wrapper' ).length ) {
				var new_jobs_added     = 0;
				var old_jobs_updated   = 0;
				var jobs_import_failed = 0;
				kickoff_job_import( 1, new_jobs_added, old_jobs_updated, jobs_import_failed );
			}
		}
	} );

	/**
	 * Kickoff products import.
	 *
	 * @param {*} page
	 * @param {*} new_jobs_added
	 * @param {*} old_jobs_updated
	 * @param {*} jobs_import_failed
	 */
	function kickoff_job_import( page, new_jobs_added, old_jobs_updated, jobs_import_failed ) {
		$.ajax( {
			dataType: 'JSON',
			url: ajaxurl,
			type: 'POST',
			data: {
				action: 'kickoff_job_import',
				page: page,
				new_jobs_added: new_jobs_added,
				old_jobs_updated: old_jobs_updated,
				jobs_import_failed: jobs_import_failed,
			},
			cache: true,
			success: function ( response ) {
				// If all the jobs are imported.
				var code = response.data.code;
				if ( 'jobs-imported' === code ) {
					$( '.import-from-hawthorne-wrapper .finish-card' ).show(); // Show the card details for imported products.
					$( '.import-from-hawthorne-wrapper .importing-card' ).hide(); // Hide the the progress bar.

					// Set the numeric logs here.
					$( '.new-jobs-count' ).text( response.data.new_jobs_added );
					$( '.old-jobs-updated-count' ).text( response.data.old_jobs_updated );
					$( '.failed-jobs-count' ).text( response.data.jobs_import_failed );

					// Hide the log button if there are no failed products.
					if ( 0 === response.data.jobs_import_failed ) {
						$( '.openCollapse_log' ).hide();
					}
					return false;
				}

				// If the import is in process.
				if( 'jobs-import-in-progress' === code ) {
					make_the_bar_progress( response.data.percent ); // Set the progress bar.

					// Update the import notice.
					var imported_jobs = parseInt( response.data.imported );
					var total_jobs    = parseInt( response.data.total );
					imported_jobs     = ( imported_jobs >= total_jobs ) ? total_jobs : imported_jobs;
					$( '.importing-notice span.imported-count' ).text( imported_jobs );
					$( '.importing-notice span.total-products-count' ).text( total_jobs );

					/**
					 * Call self to import next set of jobs.
					 * This wait of 500ms is just to allow the script to set the progress bar.
					 */
					setTimeout( function() {
						page++;
						kickoff_job_import( page, response.data.new_jobs_added, response.data.old_jobs_updated, response.data.jobs_import_failed );
					}, 500 );
				}
			},
		} );
	}

	/**
	 * Make progress to the progress bar.
	 *
	 * @param {*} percent
	 */
	function make_the_bar_progress( percent ) {
		percent = percent.toFixed( 2 ); // Upto 2 decimal places.
		percent = parseFloat( percent ); // Convert the percent to float.
		percent = ( 100 <= percent ) ? 100 : percent;

		// Set the progress bar.
		$( '.importer-progress' ).val( percent );
		$( '.importer-progress' ).next( '.value' ).html( percent + '%' );
		$( '.importer-progress' ).next( '.value' ).css( 'width', percent + '%' );
	}

	/**
	 * Get query string parameter value.
	 *
	 * @param {string} string
	 * @return {string} string
	 */
	function get_query_string_parameter_value( param_name ) {
		var url_string = window.location.href;
		var url        = new URL( url_string );
		var val        = url.searchParams.get( param_name );

		return val;
	}

	// on page load...
	moveProgressBar();

	/**
	 * Fill in the progress bar for showing the sync status.
	 */
	function moveProgressBar() {
		var percent             = ( $( '.progress-wrap' ).data('progress-percent') / 100);
		var progress_wrap_width = $('.progress-wrap').width();
		var progress_total      = percent * progress_wrap_width;
		var animation_length    = 2500;

		// .stop() used to prevent animation queueing
		$( '.progress-bar' ).stop().animate( {
			left: progress_total
		}, animation_length );
	}
} );
