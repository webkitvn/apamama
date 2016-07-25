<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apamama</title>
	<?php wp_head() ?>
	<script src="https://use.fontawesome.com/4c8792004d.js"></script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/sanfranciscobold.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/sanfranciscoregular.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/sanfranciscomedium.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/sanfranciscothin
	.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>">
</head>
<body <?php body_class() ?>>
	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<nav>
						<div class="menu">
							<ul>
								<li><a href="<?php echo bloginfo('home') ?>"><i class="fa fa-apple" aria-hidden="true"></i> Apamama</a></li>
								<li>
									<a href="<?php echo get_term_link('iphone', 'product_cat') ?>">iPhone</a>
									<?php
										$args = array(
									        'taxonomy'     => 'product_cat',
									        'orderby'      => 'name',
									        'hide_empty'   => 1,
									        'parent' => 9
									  	);
									  	$categories = get_categories( $args );
									  	if(!empty($categories)) :
									?>
									<ul class="submenu">
										<?php foreach($categories as $cat) : ?>
										<li><a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>"><?php echo $cat->name ?></a></li>
										<?php endforeach; ?>
									</ul>
									<?php endif; ?>
								</li>
								<li><a href="#">iPad</a></li>
								<li><a href="#">Ốp lưng</a></li>
								<li><a href="#">Bảo hành</a></li>
								<li><a href="#">Tin tức</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<small>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</small>
								</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>