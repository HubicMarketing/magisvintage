<?php $mylocale = get_bloginfo('language'); ?>
<section id="prodotti">
<?php if($mylocale == 'it-IT') { ?>
    <h2>Scopri i nostri Lotti</h2>
<?php } else { ?>
    <h2>Our latest products</h2>
<?php } ?>

<?php if(!my_wp_is_mobile()) { ?>

    <div class="row justify-content-center">
      <!-- <div class="col-lg-10"> -->
  <div id="prodotti_carousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<div class="carousel-item">
<ul class="row row-eq-height">
<?php
$index = 0; //counter set-up
$args = array(
'posts_per_page' => 20,
'post_type' => 'product',
// 'post_status' => 'publish',
'suppress_filters' => false,
'orderby'  => 'date'
);
$posts_array = get_posts( $args );
foreach($posts_array as $post){ //loop starts here
  $post_id = $post->ID;
  $post_name = $post ->post_name;
  $post_title = $post ->post_title;
  $product = wc_get_product( $post_id );
  // Get Product Prices
  $product_id = $product->get_id();
  $product_price = $product->get_price_html();
  $product_link = get_permalink( $product_id );
  $url = wp_get_attachment_url( get_post_thumbnail_id($product_id) ); ?>
<li class="product col-lg-3 col-md-3" id="<?php echo $product_id; ?>">
<figure class="figure trans">
<?php if(!empty($url)) { ?>
<div class="img_wrapper">
  <a class="trans wrapper_images" href="<?php echo $product_link; ?>" title="Vai al prodotto <?php echo $post_title; ?>">
    <img src="<?php echo $url; ?>" class="figure-img img-fluid trans translated" alt="<?php echo $post_title; ?> | <?php bloginfo('name') ?>">
  </a></div><!--img_wrapper-->
  <?php }  ?>
<figcaption class="figure-caption">
<h4><?php echo $post_title; ?></h4>

<div class="product_category_loop">
<?php $product_cats = wp_get_post_terms( $post_id, 'product_cat' );
      if ( $product_cats && ! is_wp_error ( $product_cats ) ){ ?>
      <?php $single_cat = array_shift( $product_cats );
            foreach($product_cats as $product_cat) {
            $product_cat_link = get_term_link( $product_cat->term_id, 'product_cat' ); ?>
            <a href="<?php echo $product_cat_link; ?>"><?php echo $product_cat->name; ?></a>
            <?php } ?>
      <?php } ?>
</div><!--product_category_loop-->

<?php if ( ! empty( $show_rating ) ) : ?>
  <?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<?php endif; ?>
<span class="price"><?php echo $product_price; ?></span>
<?php /* if($mylocale == 'it-IT') { ?>
<a class="btn btn-lg button trans" href="<?php echo $product_link; ?>" title="Vai al prodotto <?php echo $post_title; ?>">Vai al prodotto</a>
<?php } else { ?>
<a class="btn btn-lg button trans" href="<?php echo $product_link; ?>" title="View product <?php echo $post_title; ?>">View product</a>
<?php } */?>
</figcaption>
</figure>
</li>
<?php $index++; if( $index % 5 == 0 && $index !=count($posts_array)){ ?>
</ul></div><div class="carousel-item"><ul class="row row-eq-height">
<?php } } ?>
</ul>
</div><!--/item-->
</div><!--/carousel-inner-->
<?php /* if($index > 4) { ?>
  <!-- Controls -->
  <a class="carousel-control carousel-control-prev" href="#prodotti_carousel" role="button" data-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control carousel-control-next" href="#prodotti_carousel" role="button" data-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="sr-only">Next</span>
  </a>
<?php } */ ?>
</div><!--specialita_carousel-->
<?php wp_reset_postdata(); ?>
<!-- </div> -->
</div><!--row-->

<?php  } else {  ?>

  <div class="row justify-content-center">
<div class="col-12">
<div id="prodotti_carousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<div class="carousel-item">
<ul class="row row-eq-height">
    <?php
    $index = 0; //counter set-up
    $args = array(
    'posts_per_page' => 20,
    'post_type' => 'product',
    // 'post_status' => 'publish',
    'orderby'  => 'date',
    'suppress_filters' => false,
    );
    $posts_array = get_posts( $args );
    foreach($posts_array as $post){ //loop starts here
      $post_id = $post->ID;
      $post_name = $post ->post_name;
      $post_title = $post ->post_title;
      $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
      // global $product;
      $product = wc_get_product( $post_id );
      // Get Product Prices
      $product_price = $product->get_price_html();
      $product_link = get_permalink( $product->get_id() );   ?>
      <li class="product col-12">
      <figure class="figure trans">
        <?php if(!empty($url)) { ?>
        <div class="img_wrapper">
          <a class="trans wrapper_images" href="<?php echo $product_link; ?>" title="Vai al prodotto <?php echo $post_title; ?>">
            <img src="<?php echo $url; ?>" class="figure-img img-fluid trans translated" alt="<?php echo $post_title; ?> | <?php bloginfo('name') ?>">
          </a></div><!--img_wrapper-->
          <?php } ?>
      <figcaption class="figure-caption">
      <h4><?php echo $post_title; ?></h4>

      <div class="product_category_loop">
<?php $product_cats = wp_get_post_terms( $post_id, 'product_cat' );
      if ( $product_cats && ! is_wp_error ( $product_cats ) ){ ?>
      <?php $single_cat = array_shift( $product_cats );
            foreach($product_cats as $product_cat) {
            $product_cat_link = get_term_link( $product_cat->term_id, 'product_cat' ); ?>
            <a href="<?php echo $product_cat_link; ?>"><?php echo $product_cat->name; ?></a>
            <?php } ?>
      <?php } ?>
</div><!--product_category_loop-->

      <?php if ( ! empty( $show_rating ) ) : ?>
        <?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
      <?php endif; ?>
      <span class="price"><?php  echo $product_price; ?></span>
      <?php /*if($mylocale == 'it-IT') { ?>
      <a class="btn btn-lg button trans" href="<?php echo $product_link; ?>" title="Vai al prodotto <?php echo $post_title; ?>">Vai al prodotto</a>
      <?php } else { ?>
      <a class="btn btn-lg button trans" href="<?php echo $product_link; ?>" title="View product <?php echo $post_title; ?>">View product</a>
      <?php } */?>
      </figcaption>
      </figure>
      </li>
      <?php $index++; if( $index % 1 == 0 && $index !=count($posts_array)){ ?>
      </ul></div><div class="carousel-item"><ul class="row row-eq-height">
      <?php } } ?>
      </ul>
      </div><!--/item-->
      </div><!--/carousel-inner-->
      <?php /*if($index > 1) { ?>
        <!-- Controls -->
        <a class="carousel-control carousel-control-prev" href="#prodotti_carousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control carousel-control-next" href="#prodotti_carousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
        </a>
    <?php } */?>
  </div><!--specialita_carousel-->
  <?php wp_reset_postdata(); ?>
<?php }  ?>
<!-- </div> -->
<!--container-->
</section>
