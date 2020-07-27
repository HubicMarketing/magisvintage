<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

<?php if(!is_product_category()) { ?>
		</div><!-- .col-full -->
<?php } ?>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<a id="back2Top" title="Back to top" href="#">&#10148;</a>

<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php if(is_front_page()){ ?>
	<script type="text/javascript">
		  jQuery('#carouselMagis').carousel({
			interval: 3000,
			keyboard: true,
			pause: false,
			ride: 'carousel',
			wrap: true,
		});
		jQuery('#prodotti .carousel').carousel({
			interval: 6000,
			keyboard: true,
			pause: false,
			ride: 'carousel',
			wrap: true,
		});
		jQuery('.carousel .carousel-item:first-child').addClass('active');
	</script>
<?php } ?>
</body>
</html>
