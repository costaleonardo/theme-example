<?php
/**
 * Template Name: FAQs
 *
 * Template for displaying the theme's frequently asked questions page.
 *
 * Author: Leonardo da Costa
 *  
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="section section-faqs">

  <div class="container">

    <div class="page-heading-wrapper">
  
      <h1 class="page-heading"><?php the_field( 'title_heading' ); ?></h1>

    </div> <!-- .page-heading -->

    <?php if ( have_rows( 'faqs' ) ) : 
      
      $i = 1; // Increment for primary accordian key
    ?>

      <div id="accordion" class="component-accordion">

        <?php while ( have_rows( 'faqs' ) ) : the_row(); 
        
          $question = get_sub_field( 'question' );
          $answer = get_sub_field( 'answer' );
        ?>

          <div class="card">

            <div class="card-header collapsed" data-toggle="collapse" href="#collapse<?php echo $i;?>">
              <a class="card-title"> <?php echo $question; ?> </a>

            </div> <!-- .card-header -->

            <div id="collapse<?php echo $i;?>" class="collapse" data-parent="#accordion">

              <div class="card-body">

                <?php echo $answer; ?>

              </div> <!-- .card-body -->

            </div> <!-- .collapse  -->

          </div> <!-- .card -->

        <?php $i++; endwhile; ?>

      </div> <!-- #accordion -->

    <?php endif; ?>

  </div> <!-- ./container -->

</section>

<?php get_template_part( 'global-templates/section-products' ); ?>

<?php
get_footer();