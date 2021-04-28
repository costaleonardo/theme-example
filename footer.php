<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * Author: Leonardo da Costa
 * 
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div id="wrapper-footer">

	<div class="container footer-content d-md-flex justify-content-between">

		<div class="footer-info-wrapper">
		
			<?php dynamic_sidebar( 'footer_contact_info' ); ?>

			<?php 
				wp_nav_menu( array(
					'menu'           => 'Footer Menu',
					'theme_location' => 'footer-menu'
				));
			?>

		</div> <!-- .footer-info-wrapper -->

		<div class="copyright-wrapper">

			<img src="<?php echo get_template_directory_uri();?>/images/kaopectate-logo.png" alt="Kaopectate Logo" width="170">
			<?php dynamic_sidebar( 'footer_copyright' ); ?>

		</div> <!-- .copyright-wrapper -->

	</div> <!-- ./container -->

</div> <!-- ./ #wrapper-footer -->

<?php wp_footer(); ?>

</body>

</html>

