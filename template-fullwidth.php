<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php // if is page CHI SIAMO
			if(is_page(array(183, 64, 185))) {

				include( get_stylesheet_directory() . '/include/page/about.php');

			} elseif(is_page(array(66, 191, 193))) {

				include( get_stylesheet_directory() . '/include/page/services.php');

			} elseif(is_page(array(62, 197, 199))) {

				include( get_stylesheet_directory() . '/include/page/kipekee.php');

			} elseif(is_page(array(2, 51, 53))) {

				include( get_stylesheet_directory() . '/include/page/contatti.php');

			} else {


					while ( have_posts() ) :
						the_post();

						do_action( 'storefront_page_before' );

						get_template_part( 'content', 'page' );

						/**
						* Functions hooked in to storefront_page_after action
						*
						* @hooked storefront_display_comments - 10
						*/
						do_action( 'storefront_page_after' );

					endwhile; // End of the loop.

			}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
