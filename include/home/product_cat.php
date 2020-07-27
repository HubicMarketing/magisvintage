<section id="collezioni">
<h2>Le nostre collezioni</h2>
<div class="cat_wrapper">
 <?php  // 37 vintage  // 38 moda  // 39 cashmere
 $args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'include' => array(37,38,39),
    'hide_empty' => false
 );
   $terms = get_terms($args);
   foreach($terms as $term) { //loop starts here
   $taxonomy = $term->taxonomy;
   $term_id = $term->term_taxonomy_id;
   $term_link = get_term_link( $term );
   $term_name = $term->name;
   $term_slug = $term->slug;
   $term_image_id = get_term_meta( $term_id, 'thumbnail_id', true );
   $term_image = wp_get_attachment_url( $term_image_id ); ?>
           <figure class="wrapper" id="<?php echo $term_slug; ?>">
            <a href="<?php echo $term_link ?>" title="Scopri la collezione <?php echo $term_name ?> di <?php bloginfo('name'); ?>">
             <div class="img_wrapper">
             <img loading="lazy" class="translated trans lazyload" alt="<?php echo $term_name ?>" data-src="<?php echo $term_image ?>" />
             <div class="cover trans"></div>
             </div><!--img_wrapper-->
             <figcaption class="translated figure-caption">
               <h3><?php echo $term_name ?></h3>
               <a class="btn btn-lg" href="<?php echo $term_link ?>" title="Scopri la collezione <?php echo $term_name ?> di <?php bloginfo('name'); ?>">Scopri la collezione</a>
             </figcaption>
           </a>
           </figure>
<?php } ?>         
</div><!--cat_wrapper-->
</section><!--collezioni-->