<?php
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails', array('page', 'post'));
		set_post_thumbnail_size(740, 300, true ); // default Post Thumbnail dimensions (cropped)

	}
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size('cate_banner', 1200, 300, true);
	}

	//excerpt length
	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


	add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

	//woocommerce support
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
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
		'after_title'   => "</h2><div class='widget_cotent_wrapper' >\n",
	);

	register_sidebar( $args );

	$single_args = array(
		'name'          => 'Single Product Sidebar',
		'id'            => "single-product-sidebar",
		'description'   => 'Apamama Sidebar For Single Product',
		'class'         => '',
		'before_widget' => '<figure id="widget-sidebar %1$s" class="widget %2$s">',
		'after_widget'  => "</figure>\n",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => "</h2><div class='widget_cotent_wrapper' >\n",
	);

	register_sidebar( $single_args );

	$news_args = array(
		'name'          => 'News Sidebar',
		'id'            => "news-sidebar",
		'description'   => 'Apamama Sidebar For News',
		'class'         => '',
		'before_widget' => '<figure id="widget-sidebar %1$s" class="widget %2$s">',
		'after_widget'  => "</figure>\n",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => "</h2><div class='widget_cotent_wrapper' >\n",
	);

	register_sidebar( $news_args );

	add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

	function change_existing_currency_symbol( $currency_symbol, $currency ) {
	     switch( $currency ) {
	          case 'đ': $currency_symbol = 'VNĐ$'; break;
	     }
	     return $currency_symbol;
	}

	// Hook in
	add_filter( 'woocommerce_checkout_fields' , 'apamama_custom_override_checkout_fields' );

	// Our hooked in function - $fields is passed via the filter!
	function apamama_custom_override_checkout_fields( $fields ) {
	    //unset($fields['order']['order_comments']);
	    unset($fields['billing']['billing_company']);
	    unset($fields['billing']['billing_country']);
	    unset($fields['billing']['billing_postcode']);
	    return $fields;
	}
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'main-menu' => __("Main Menu"),
	      //'secondary-menu' => __("Secondary Menu")
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );



	////CUSTOM POST TYPE FOR CUSTOM BLOCK /////
	add_action('init', 'block_register', 1);
		function block_register() {
	 
		$labels = array(
			'name' => _x('Custom block', 'Custom block'),
			'singular_name' => _x('Custom block', 'post type singular name'),
			'add_new' => _x('New block', 'New block'),
			'add_new_item' => __('Add new block'),
			'edit_item' => __('Edit'),
			'new_item' => __('Add new block'),
			'view_item' => __('View block'),
			'search_items' => __('Search block'),
			'not_found' =>  __('Nothing found'),
			'not_found_in_trash' => __('Nothing found in Trash'),
			'parent_item_colon' => ''
		);
	 
		$args = array(
			'labels' => $labels,
			'public' => false,
			'has_archive' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'menu_position'=> 5,
			//'show_in_menu' => TRUE,
			//'show_in_nav_menus' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-text',
			'capability_type' => 'post',
			'hierarchical' => true,
			//'supports' => array('title','editor','thumbnail')
		  ); 
	 
		register_post_type( 'block' , $args );
	}