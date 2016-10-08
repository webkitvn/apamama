<?php get_header() ?>
	<div class="container-fluid">
		<div id="home-slide">
			<?php echo do_shortcode('[rev_slider alias="home-slider"]') ?>
		</div>
	</div>
	<div class="container-fluid">
		<div class="product-cats-wrapper">
			<?php 
				$args = array(
			        'taxonomy'     => 'product_cat',
			        'orderby'      => 'id',
			        'hide_empty'   => 0,
			        'parent' => 0
			  	);
			  	$all_categories = get_categories( $args );
			?>
			<div class="row">
				<div class="col-xs-12">
					<div class="product-cats">
						<?php foreach($all_categories as $cate) : ?>
						<div class="cate-item">
							<?php 
								$thumbnail_id = get_woocommerce_term_meta( $cate->term_id, 'thumbnail_id', true );
							    $image = wp_get_attachment_url( $thumbnail_id );
							    if ( 1 ) :
							?>
								    <a href="<?php echo get_term_link($cate->slug, 'product_cat') ?>">
								    	<!-- <img src="<?php echo $image ?>" alt="<?php echo $cate->name ?>"> -->
								    	<span><?php echo $cate->name ?></span>
								    </a>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		$args = array(
            'posts_per_page' => 4,
            'post_type' => 'block',
            'meta_key' => 'is_show',
            'meta_value' => 1,
            'order_by' => 'date',
            'order' => "ASC"
        );
        $query = new WP_Query($args);
        if($query->have_posts()) :
	?>
	<div class="container-fluid">
		<div class="row promos">
			<?php while($query->have_posts()) : $query->the_post() ?>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<?php if(get_field('block_link', $the_ID)) echo '<a href="'.get_field('block_link').'">'; ?>
				<div class="promo-item promo-item-1" style="
					<?php if(get_field('bg_color')) echo 'background-color: '.get_field('bg_color').';' ?>
					<?php $image = get_field('bg_img'); if($image) echo 'background-image: url('.$image['url'].');' ?>
				">
					<?php the_content() ?>
				</div>
				<?php if(get_field('block_link', $the_ID)) echo '</a>'; ?>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>
<?php get_footer() ?>