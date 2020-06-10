<?php 

// Creating shortcode name
function cf_shortcode() {
	ob_start();
	// quoting_form();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'quote_form', 'cf_shortcode' );