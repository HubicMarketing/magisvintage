<!-- <div class="custom-shape-divider-kipekee-top">
<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
</div> -->
<section id="kipekee">
<?php $args = array(
'include' => 62,
'post_type' => 'page'
);
$posts_array = get_posts( $args );
foreach($posts_array as $post){ 
  $post_id = $post->ID;
  $post_slug = $post ->post_name;
  $post_title = $post ->post_title;
  $url = wp_get_attachment_url( get_post_thumbnail_id($post_id) ); ?>      
  
  <a href="<?php echo get_permalink( $post_id ); ?>" title="Scopri <?php echo $post_title ?>">
      <figure class="wrapper translated" id="<?php echo $post_slug; ?>">
               <h2>Kipekee<span>Re-covered clothing</span></h2>
      </figure>
      </a>
<?php } ?>  
</section>