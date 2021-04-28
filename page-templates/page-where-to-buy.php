<?php
/**
 * Template Name: Where to Buy
 *
 * Template for displaying the theme's where to buy page.
 *
 * Author: Leonardo da Costa
 * 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="section section-where-to-buy">

  <div class="container">

    <div class="page-heading-wrapper">

      <h1 class="page-heading"><?php the_field( 'title_heading' ); ?></h1>

    </div> <!-- .page-heading -->

    <div class="flex retailer-wrapper">

      <?php if ( have_rows( 'retailers' ) ) : ?>

          <?php while ( have_rows('retailers' ) ) : the_row(); 
          
            $retailerLogo = get_sub_field( 'retailer_logo' );
            $retailerUrl = get_sub_field( 'retailer_url' );
          ?>

            <div class="retailer-box flex-box <?php echo esc_attr( $retailerLogo['title'] ) ?> text-center">

              <a href="<?php echo $retailerUrl; ?>" target="_blank">
                <img src="<?php echo esc_url( $retailerLogo['url'] ); ?>" alt="<?php echo esc_attr( $retailerLogo['alt'] ) ?>" title="<?php echo esc_attr( $retailerLogo['title'] ) ?>">
              </a>

            </div> <!-- .retailer-box --> 

          <?php endwhile; ?>

        <?php endif; ?>      

    </div> <!-- .row -->

  </div> <!-- .container -->

</section>

<?php get_template_part( 'global-templates/section-products' ); ?>

<?php
get_footer();