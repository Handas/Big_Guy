<?php
add_action('Plugin Loaded', 'wpsm_tabs_b');
function wpsm_tabs_b()
{
	load_plugin_textdomain('wpsm_tabs_b_text_domain', FALSE , dirname( plugin_basename(__FILE__)).'/languages/');
}

function wpsm_tabs_b_front_script()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('wpsm_tabs_b_bootstrap-js',wpsm_tabs_b_directory_url.'assets/js/bootstrap.js',array('jquery'), false, true);
	wp_enqueue_style('wpsm_tabs_b_bootstrap-css', wpsm_tabs_b_directory_url .'assets/css/bootstrap-front.css');
	wp_enqueue_style('wpsm_tabs_b_animation', wpsm_tabs_b_directory_url .'assets/css/animate.css');
	wp_enqueue_style('wpsm_tabs_b_fend-css', wpsm_tabs_b_directory_url .'assets/css/fend.css');
	wp_enqueue_style('wpsm_tabs_b_fontawesome-css', wpsm_tabs_b_directory_url .'assets/css/font-awesome/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','wpsm_tabs_b_front_script');
add_filter('widget_text','do_shortcode');

add_action( 'admin_notices', 'wpsm_tabs_b_review' );
function wpsm_tabs_b_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'wpsm_tabs_b_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('wpsm_tabs_b_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 2)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible wpsm-tabs-b-review-notice">
		<p style="font-size:18px;">'Hi! We saw you have been using <strong>Tabs Builder plugin</strong> for a few days and wanted to ask for your help to <strong>make the plugin better</strong>.We just need a minute of your time to rate the plugin. Thank you!</p>
		<p style="font-size:18px;"><strong><?php _e( '~ wpshopmart', '' ); ?></strong></p>
		<p style="font-size:19px;"> 
			<a href="https://wordpress.org/support/plugin/tabs-builder/reviews/?filter=5#new-post" class="wpsm-tabs-b-dismiss-review-notice wpsm-tabs-b-review-out" target="_blank" rel="noopener">Rate the plugin</a>&nbsp; &nbsp;
			<a href="#"  class="wpsm-tabs-b-dismiss-review-notice wpsm-rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', '' ); ?></a>&nbsp; &nbsp;
			<a href="#" class="wpsm-tabs-b-dismiss-review-notice wpsm-rated" target="_self" rel="noopener"><?php _e( 'I already did', '' ); ?></a>
		</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.wpsm-tabs-b-dismiss-review-notice, .wpsm-tabs-b-dismiss-notice .notice-dismiss', function( event ) {
				if ( $(this).hasClass('wpsm-tabs-b-review-out') ) {
					var wpsm_rate_data_val = "1";
				}
				if ( $(this).hasClass('wpsm-rate-later') ) {
					var wpsm_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('wpsm-rated') ) {
					var wpsm_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'wpsm_tabs_b_dismiss_review',
					wpsm_rate_data_tabs_b : wpsm_rate_data_val
				});
				
				$('.wpsm-tabs-b-review-notice').hide();
				//location.reload();
			});
		});
	</script>
	<?php
}

add_action( 'wp_ajax_wpsm_tabs_b_dismiss_review', 'wpsm_tabs_b_dismiss_review' );
function wpsm_tabs_b_dismiss_review() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['wpsm_rate_data_tabs_b']=="1"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['wpsm_rate_data_tabs_b']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['wpsm_rate_data_tabs_b']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		
	}
	update_option( 'wpsm_tabs_b_review', $review );
	die;
}
?>