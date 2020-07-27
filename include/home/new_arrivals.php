<?php $mylocale = get_bloginfo('language'); ?>
<section id="prodotti">
<?php if($mylocale == 'it-IT') { ?>
    <h2>Scopri i nostri Lotti</h2>
<?php } else { ?>
    <h2>Our latest products</h2>
<?php } ?>
<div class="wrapper">
<?php
$index = 0; //counter set-up
$args = array(
'posts_per_page' => 5,
'post_type' => 'product',
'orderby'  => 'date',
'order' => 'DESC'
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
  $product_link = get_permalink( $product->get_id() ); ?>
<div class="product">
<?php if ( $product->is_on_sale() ) : ?>
    <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
  <?php endif; ?>
<figure class="figure trans">

<div class="img_wrapper">
  <a class="trans wrapper_images" href="<?php echo $product_link; ?>" title="Vai al prodotto <?php echo $post_title; ?>">
<img src="<?php echo $url; ?>" class="figure-img img-fluid trans translated" alt="<?php echo $post_title; ?> | <?php bloginfo('name') ?>">
</a>
</div><!--img_wrapper-->
<figcaption class="figure-caption">
<a href="<?php echo $product_link; ?>" title="Vai al prodotto <?php echo $post_title; ?>">
<h4><?php echo $post_title; ?></h4></a>
<?php if ( ! empty( $show_rating ) ) : ?>
  <?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
<?php endif; ?>

<div class="product_category_loop">
<?php  $product_cats = wp_get_post_terms( $post_id, 'product_cat' );
      if ( $product_cats && ! is_wp_error ( $product_cats ) ){ ?>
      <?php $single_cat = array_shift( $product_cats );
            foreach($product_cats as $product_cat) {
            $product_cat_link = get_term_link( $product_cat->term_id, 'product_cat' ); ?>
            <a href="<?php echo $product_cat_link; ?>"><?php echo $product_cat->name; ?></a>
            <?php } ?>
      <?php } ?>
</div><!--product_category_loop-->

<span class="price"><?php  echo $product_price; ?></span>
</figcaption>
</figure>
</div><!--/product-->
<?php } ?>
</div><!--wrapper-->
<?php wp_reset_postdata(); ?>
</section>