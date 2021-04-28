<?php
/**
 * Products Section
 *
 * Author: Leonardo da Costa
 * 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<section class="section section-products">

  <div class="container">

    <div class="section-title">
      Products
    </div> <!-- ./ section-title -->

    <div class="products-wrapper">

      <?php 
        $loop = new WP_Query( array(  
          "post_type" => "products",
          "order" => "ASC"
        ) );
      ?>

      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="product-box">

          <?php if ( has_post_thumbnail() ) : ?>

            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>

          <?php endif; ?>
        
          <h4 class="product-title"><?php echo str_replace(' | ', '<br />', get_the_title()); ?></h4>
          <a class="btn btn-outline-primary" href="<?php the_permalink(); ?>" role="button">Learn More</a>

        </div> <!-- .product-box -->

      <?php endwhile; wp_reset_postdata(); ?>

    </div> <!-- .products-wrapper -->

  </div> <!-- .container -->

</section>