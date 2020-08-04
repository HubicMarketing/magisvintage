<?php
global $post;
$post_id = $post->ID;
$post_name = $post ->post_name;
$post_title = $post ->post_title;
$post_content = $post ->post_content;
$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) ); ?>

<section id="main_content" class="blacked">
    <h2>Magis Vintage</h2>
    <div class="container wrapper">
        <?php echo $post_content; ?>
    </div><!--container-->
</section>