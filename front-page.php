<?php
/**
 * Template Name: Front Page
 *
 * Template for displaying the theme's front page.
 * 
 * Author: Leonardo da Costa
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="section section-showcase">

  <div class="container">

    <div class="row">

      <div class="col-sm-4 col-md-5">

        <?php if ( get_field( 'showcase_image' ) ) : ?>

          <div class="showcase-featured-wrapper">
            <img class="showcase-featured" src="<?php the_field( 'showcase_image' ); ?>" alt="Kaopectate Product">
          </div>

        <?php endif; ?>

      </div> <!-- .col-sm-4 -->

      <div class="col-sm-8 col-md-7">

        <div class="showcase-content-wrapper">

          <?php if ( get_field( 'showcase_title' ) ) : 
            
            $showcaseTitle = get_field( 'showcase_title' );
            $showcaseTitleNew = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $showcaseTitle);
          ?>

            <h1 class="showcase-heading"><?php echo $showcaseTitleNew; ?></h1>

          <?php endif; ?>    

          <?php if ( have_rows( 'showcase_features' ) ) : ?>

            <ul class="product-features">

              <?php while ( have_rows('showcase_features' ) ) : the_row(); ?>

                <li>
                  <p><?php echo get_sub_field( 'feature' ) ?></p>
                </li>

              <?php endwhile; ?>

            </ul> <!-- .showcase-features -->

          <?php endif; ?>        
        
        </div> <!-- .showcase-content-wrapper -->

      </div> <!-- .col-sm-8 -->

    </div> <!-- .row -->

  </div> <!-- .container -->

</section>

<?php get_template_part( 'global-templates/section-products' ); ?>

<?php
get_footer();