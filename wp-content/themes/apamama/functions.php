<?php

	// disable Emoji
	function disable_wp_emojicons() {

	  // all actions related to emojis
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	  // filter to remove TinyMCE emojis
	  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
	add_action( 'init', 'disable_wp_emojicons' );

	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	//woocommerce support
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	function apamama_wrapper_start(){
		echo '<div class="main a-shop"><div class="container-fluid">';
	}

	add_action('woocommerce_before_main_content', 'apamama_wrapper_start', 10);

	function apamama_wrapper_end(){
		echo '</div></div>';
	}

	add_action('woocommerce_after_main_content', 'apamama_wrapper_end', 10);


	// Remove default WooCommerce breadcrumbs and add Yoast ones instead
	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	add_action( 'woocommerce_before_main_content','my_yoast_breadcrumb', 20, 0);
	if (!function_exists('my_yoast_breadcrumb') ) {
		function my_yoast_breadcrumb() {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		}
	}
	add_theme_support('woocommerce');

