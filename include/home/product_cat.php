<section id="collezioni" class="blacked">
<h2><?php _e('Le nostre collezioni','my-child-theme'); ?></h2>
<div class="cat_wrapper container">
 <?php 
if($mylocale == 'it-IT') { 
 $args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'include' => array(37,38,39),  // 37 vintage  // 38 moda  // 39 cashmere
    'hide_empty' => false
 );
} elseif($mylocale == 'en-GB'){
  $args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'include' => array(197,205,201),
    'hide_empty' => false
 );
} else {
  $args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'order' => 'ASC',
    'include' => array(199,203,207),
    'hide_empty' => false
 );
}
   $terms = get_terms($args);
   foreach($terms as $term) { //loop starts here
   $taxonomy = $term->taxonomy;
   $term_id = $term->term_taxonomy_id;
   $term_link = get_term_link( $term );
   $term_name = $term->name;
   $term_slug = $term->slug;
   $term_image_id = get_term_meta( $term_id, 'thumbnail_id', true );
   $term_image = wp_get_attachment_url( $term_image_id );
   $term_preview_id = get_field('anteprima', $taxonomy . '_' . $term_id);
   $term_preview_src = wp_get_attachment_image_src( $term_preview_id, 'full' ); ?>
           <figure class="wrapper" id="<?php echo $term_slug; ?>">
            <a href="<?php echo $term_link ?>" title="<?php _e('Scopri la collezione','my-child-theme'); ?> <?php echo $term_name ?>">
             <div class="img_wrapper">
             <img loading="lazy" class="translated trans lazyload" alt="<?php echo $term_name ?>" data-src="<?php echo $term_preview_src[0] ?>" />
             </div><!--img_wrapper-->
             <figcaption class="figure-caption">
               <h3 class="trans"><?php echo $term_name ?></h3>
             </figcaption>
           </a>
           </figure>
<?php } ?>         
</div><!--cat_wrapper-->
</section><!--collezioni-->