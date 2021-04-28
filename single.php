<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="section section-single-product">
	<div class="container">
		<div class="row">

		<?php while ( have_posts() ) : 
		
			the_post();
			$buyNowLink = get_field( 'buy_now_link' );
		?>

			<div class="col-md-12 col-lg-2 lightgallery-column">
				<!-- Product Lightbox on Desktop -->
				<div id="lightgallery" class="lightgallery">

					<?php if ( get_field( 'product_gallery' ) ) : 

						$i = 0;
						$productImages = get_field( 'product_gallery' );
					?>

						<?php foreach( $productImages as $productImage ) : 
							if ( $i == 3 ) {
								$dividerClass = 'divider';
							} else {
								$dividerClass = '';
							}
						?>

							<a href="<?php echo esc_url( $productImage['sizes']['large'] ); ?>" class="<?php echo $dividerClass; ?>">

								<?php if ( $i == 3 ) : ?>

									+ <?php echo (count( $productImages ) - $i); ?> more

								<?php endif; ?>

    						<img class="lightgallery-thumbnail" src="<?php echo esc_url( $productImage['sizes']['medium'] ); ?>" />
							</a>						

						<?php $i++; endforeach; ?>

					<?php endif; ?>

				</div> <!-- ./ #lightgallery  #-->
			</div> <!-- ./ col-md-2 -->
			<div class="col-md-5 col-lg-4">

				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

				<!-- Carousel Gallery on Mobile -->
				<div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
					<ol class="carousel-indicators">

						<?php if ( get_field( 'product_gallery' ) ) : 
							
							$i = 0;
							$productImages = get_field( 'product_gallery' );
						?>

							<?php foreach( $productImages as $productImage ) : 
							
								if ( $i === 0 ) {
									$isActiveClass = "active";

								} else {
									$isActiveClass = "";
								}
							?>

								<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>" class="<?php echo $isActiveClass; ?>"></li>

							<?php $i++; endforeach; ?>

						<?php endif; ?>
						
					</ol>
					<div class="carousel-inner">

						<?php if ( get_field( 'product_gallery' ) ) : 

							$i = 0;
							$productImages = get_field( 'product_gallery' );
						?>

							<?php foreach( $productImages as $productImage ) : 

								if ( $i === 0 ) {
									$isActiveClass = "active";

								} else {
									$isActiveClass = "";
								}
							?>

								<div class="carousel-item <?php echo $isActiveClass; ?>">
									<img src="<?php echo esc_url( $productImage['sizes']['large'] ); ?>" class="d-block carousel-image" alt="<?php echo esc_attr($productImage['alt']); ?>">
								</div><!-- ./ .carousel-item -->

							<?php $i++; endforeach; ?>

						<?php endif; ?>							
					
					</div> <!-- ./ .carousel-inner -->
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
						<i class="fas fa-caret-left"></i>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<i class="fas fa-caret-right"></i>
						<span class="sr-only">Next</span>
					</a>
				</div> <!-- ./ .carousel -->
			</div> <!-- ./ .col-md-6 -->
			<div class="col-md-7 col-lg-6 product-content-column">
				<div class="product-header">
					<h1 class="product-title"><?php echo str_replace(' | ', '<br />', get_the_title()); ?></h1>
					<a href="<?php echo esc_url( $buyNowLink['url'] ); ?>" target="_blank" class="btn btn-buy-now" role="button" aria-pressed="true"><?php echo esc_html( $buyNowLink['title'] );?></a>
				</div>

				<?php if ( have_rows( 'product_features' ) ) : ?>

					<ul class="product-features">

						<?php while ( have_rows('product_features' ) ) : the_row(); ?>

							<li>
								<p><?php echo get_sub_field( 'feature' ) ?></p>
							</li>

						<?php endwhile; ?>

					</ul> <!-- ./ .showcase-features -->

				<?php endif; ?> 

			</div> <!-- ./ .col-md-6 -->

		<?php endwhile; ?>
			
		</div> <!-- ./ .row -->
	</div> <!-- ./ .container -->
</section>

<section class="section section-related-products">
  <div class="container">
		<div class="section-title">
			<h3>Other Kaopectate® <br> Products</h3>
    </div> <!-- ./ section-title -->	
	</div> <!-- ./ .container -->
  <div class="container products-container">
    <div class="products-wrapper">

      <?php 
        $loop = new WP_Query( array(  
          "post_type" => "products",
          "order" => "ASC"
				) );
				
				// Get current post slug
				global $post;
				$current_post_slug = $post->post_name;

      ?>

			<?php while ( $loop->have_posts() ) : $loop->the_post(); 

				// Get loop post slug
				global $post;
				$post_slug = $post->post_name;
			?>

				<!-- Check if current post slug matches the loop slug and filter it out out-->
				<?php if ( !($current_post_slug == $post_slug ) ) : ?>

					<div class="product-box">

						<?php if ( has_post_thumbnail() ) : ?>

							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>

						<?php endif; ?>

						<h4 class="product-title"><?php echo str_replace(' | ', '<br />', get_the_title()); ?></h4>
						<a class="btn btn-outline-primary" href="<?php the_permalink(); ?>" role="button">Learn More</a>
					</div> <!-- ./ .product-box -->					

				<?php endif; ?>

      <?php endwhile; wp_reset_postdata(); ?>

    </div> <!-- ./row -->
  </div> <!-- ./container -->
</section>


<?php
get_footer();
