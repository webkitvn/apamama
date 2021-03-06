<?php get_header() ?>
	<?php while(have_posts()) : the_post(); ?>
		<div class="container">
			<div class="page-content">
				<?php if(is_cart()) : ?>
					<div class="slogan">
						<h1>
							<span>
								<span class="slogan-cart active"><i class="fa fa-shopping-cart" aria-hidden="true"></i>XEM GIỎ HÀNG</span>
								<span class="slogan-checkout"><i class="fa fa-list" aria-hidden="true"></i>KIỂM TRA ĐƠN HÀNG</span>
								<span class="slogan-complete"><i class="fa fa-check" aria-hidden="true"></i>HOÀN TẤT ĐƠN HÀNG</span>
							</span>
						</h1>
					</div>
				<?php elseif(is_checkout()) : ?>
					<?php if(!is_order_received_page()) : ?>
					<div class="slogan">
						<h1>
							<span>
								<span class="slogan-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>XEM GIỎ HÀNG</span>
								<span class="slogan-checkout active"><i class="fa fa-list" aria-hidden="true"></i>KIỂM TRA ĐƠN HÀNG</span>
								<span class="slogan-complete"><i class="fa fa-check" aria-hidden="true"></i>HOÀN TẤT ĐƠN HÀNG</span>
							</span>
						</h1>
					</div>
					<?php else : ?>
					<div class="slogan">
						<h1>
							<span>
								<span class="slogan-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>XEM GIỎ HÀNG</span>
								<span class="slogan-checkout"><i class="fa fa-list" aria-hidden="true"></i>KIỂM TRA ĐƠN HÀNG</span>
								<span class="slogan-complete active"><i class="fa fa-check" aria-hidden="true"></i>HOÀN TẤT ĐƠN HÀNG</span>
							</span>
						</h1>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<div class="row">
					<div class="col-xs-12">
						<div>
							<?php the_content() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php get_footer() ?>