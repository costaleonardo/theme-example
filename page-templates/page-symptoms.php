<?php
/**
 * Template Name: Symptoms
 *
 * Template for displaying the theme's symptoms page.
 *
 * Author: Leonardo da Costa
 * 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<section class="section container">

  <div class="page-heading-wrapper">

    <h1 class="page-heading"><?php the_field( 'title_heading' ); ?></h1>

  </div> <!-- .page-heading -->

</section>

<section class="section section-accordion">

  <div class="container">

    <?php if ( have_rows( 'symptoms' ) ) : 
      
      $i = 1; // Increment for primary accordian key
    ?>

      <div id="accordion" class="component-accordion">

        <?php while ( have_rows( 'symptoms' ) ) : the_row(); 
        
          $symptom = get_sub_field( 'symptom' );
        ?>

          <div class="card">

            <div class="card-header collapsed" data-toggle="collapse" href="#collapse<?php echo $i;?>">

              <a class="card-title"> <?php echo $symptom; ?> </a>    

            </div> <!-- .card-header -->

            <div id="collapse<?php echo $i;?>" class="collapse" data-parent="#accordion">

              <div class="card-body">

                <?php the_sub_field( 'content' ); ?>

              </div> <!-- .card-body -->

            </div> <!-- .collapse  -->

          </div> <!-- .card -->

        <?php $i++; endwhile; ?>

      </div> <!-- #accordion -->

    <?php endif; ?>

  </div> <!-- .container -->

</section>

<section class="section section-symptoms-tabs">

  <div class="container">

    <div class="row">

      <!-- Symptoms Column For Nav Pills -->
      <div class="col-md-4 col-lg-3 tabs-column">

        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        
          <?php if ( have_rows( 'symptoms' ) ) : 
            
            $i = 1; // Increment for primary accordian key
          ?>

            <?php while ( have_rows('symptoms' ) ) : the_row(); 

              $symptom = get_sub_field( 'symptom' );
              $symptomClass = str_replace(' ', '', strtolower( $symptom ));

              if ( $i === 1 ) {
                $isActive = "true";
                $isActiveClasse = "active";

              } else {
                $isSelected = "false";
                $isActiveClasse = "";
              }
            ?>

              <a class="nav-link <?php echo $isActiveClasse; ?>" id="v-pills-<?php echo $symptomClass; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $symptomClass; ?>" role="tab" aria-controls="v-pills-<?php echo $symptomClass; ?>" aria-selected="<?php echo $isSelected; ?>">
                <?php echo $symptom; ?>
                <i class="fas fa-arrow-circle-right"></i>
              </a>

            <?php $i++; endwhile; ?>

          <?php endif; ?>

        </div> <!-- .nav-pills -->

      </div> <!-- .col-md-3 -->

      <!-- Symptom Content Column For Nav Pills -->
      <div class="col-md-8 col-lg-9 content-column">

        <div class="tab-content" id="v-pills-tabContent">
        
          <?php if ( have_rows( 'symptoms' ) ) : 
          
            $i = 1; // Increment for primary accordian key
          ?>

            <?php while ( have_rows('symptoms' ) ) : the_row(); 

              $symptom = get_sub_field( 'symptom' );
              $symptomClass = str_replace(' ', '', strtolower( $symptom ));

              if ( $i === 1 ) {
                $isActive = "true";
                $isActiveClasse = "show active";

              } else {
                $isSelected = "false";
                $isActiveClasse = "";
              }
            ?>

              <div class="tab-pane fade <?php echo $isActiveClasse; ?>" id="v-pills-<?php echo $symptomClass; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $symptomClass; ?>-tab"><?php the_sub_field( 'content' ); ?></div>

            <?php $i++; endwhile; ?>

          <?php endif; ?>

        </div> <!-- .tab-content -->

      </div> <!-- .col-md-9 -->

    </div> <!-- .row -->    

  </div> <!-- .container -->

</section>

<?php get_template_part( 'global-templates/section-products' ); ?>

<?php
get_footer();