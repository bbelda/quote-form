<?php 
// CSS and JS Files Enqueue
function quote_form_enqueue_scripts() {
    wp_enqueue_style( 'qoute-main-css', plugin_dir_url( __DIR__ ) . 'assets/css/main.css'  );
    wp_enqueue_style( 'qoute-grid', plugin_dir_url( __DIR__ ) . 'assets/css/grid.min.css'  );
  
    wp_enqueue_script( 'qoute-jquery-js', plugin_dir_url( __DIR__ ) . 'assets/js/jquery.min.js', false);
    wp_enqueue_script( 'qoute-main-js', plugin_dir_url( __DIR__ ) . 'assets/js/main.js', false);
    wp_enqueue_script( 'qoute-validate', plugin_dir_url( __DIR__ ) . 'assets/js/jquery.Validate.js', false);
    wp_enqueue_script( 'qoute-masking', plugin_dir_url( __DIR__ ) . 'assets/js/mask.min.js', false);
}

add_action( 'wp_enqueue_scripts', 'quote_form_enqueue_scripts', 11);