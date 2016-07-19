<?php

	
	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	//woocommerce support
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	function apamama_wrapper_start(){
		echo '<div class="main products-wrapper">';
	}

	add_action('woocommerce_before_main_content', 'apamama_wrapper_start', 10);

	function apamama_wrapper_end(){
		echo '</div>';
	}

	add_action('woocommerce_after_main_content', 'apamama_wrapper_end', 10);


	// Remove default WooCommerce breadcrumbs and add Yoast ones instead
	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	// add_action( 'woocommerce_before_main_content','my_yoast_breadcrumb', 20, 0);
	// if (!function_exists('my_yoast_breadcrumb') ) {
	// 	function my_yoast_breadcrumb() {
	// 		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	// 	}
	// }
	add_theme_support('woocommerce');

	$args = array(
		'name'          => 'Product Sidebar',
		'id'            => "product-sidebar",
		'description'   => 'Apamama Product Sidebar',
		'class'         => '',
		'before_widget' => '<figure id="widget-sidebar %1$s" class="widget %2$s">',
		'after_widget'  => "</figure>\n",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => "</h2>\n",
	);

	register_sidebar( $args );

	add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

	function change_existing_currency_symbol( $currency_symbol, $currency ) {
	     switch( $currency ) {
	          case 'đ': $currency_symbol = 'VNĐ$'; break;
	     }
	     return $currency_symbol;
	}