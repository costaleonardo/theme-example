<?php
/**
 * Template Name: Products
 *
 * Template for displaying the theme's product page.
 *
 * Author: Leonardo da Costa
 * 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="section section-products-page">

  <div class="container">

    <div class="page-heading-wrapper">

      <h1 class="page-heading"><?php the_field( 'title_heading' ); ?></h1>

    </div> <!-- .page-heading -->    
    
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

    </div> <!-- .row -->

  </div> <!-- .container -->

</section>

<?php
get_footer();