<?php $mylocale = get_bloginfo('language'); ?>
<section id="kipekee">
<?php 
if($mylocale == 'it-IT') { 
    $args = array(
    'include' => 62,
    'post_type' => 'page'
    );
} elseif($mylocale == 'en-GB'){
    $args = array(
    'include' => 197,
    'post_type' => 'page'
    );
} else {
    $args = array(
    'include' => 199,
    'post_type' => 'page'
    );
}
$posts_array = get_posts( $args );
foreach($posts_array as $post){ 
  $post_id = $post->ID;
  $post_slug = $post ->post_name;
  $post_title = $post ->post_title;
  $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) ); ?>        
  <a href="<?php echo get_permalink( $post_id ); ?>" title="Scopri <?php echo $post_title ?>">
  <div class="img_wrapper">
  <img class="translated lazyload" alt="<?php echo $post_title ?>" loading="lazy" data-src="<?php echo $url; ?>" />
  <div class="cover"></div>
        <figure class="wrapper translated" id="<?php echo $post_slug; ?>">
            <h2>Kipekee<span>Re-covered clothing</span></h2>
        </figure>
  </div></a>
<?php } ?>  
</section>