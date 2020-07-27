<?php $slideshow = 'slideshow';
if( have_rows($slideshow) ): ?>
<section id="slideshow" class="slideshow">
<div id="carouselMagis" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">
  <?php while( have_rows($slideshow) ): the_row();
$immagine_id = get_sub_field('immagine');
$immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
$immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true); ?>
    <div class="carousel-item img_wrapper">
      <img class="" src="<?php echo $immagine_src[0]; ?>" alt="<?php echo $immagine_alt; ?>">
      <div class="cover"></div>
    </div>
    <?php endwhile; ?>
  </div><!--carousel-inner-->

</div>
<h1 class="translated">
<strong>Magis Vintage</strong>
<br/><span>Abbigliamento Second Hand e Vintage Retrò Style</span></h1>
</section>
<?php endif; ?>