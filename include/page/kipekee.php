<?php global $post;
$post_id = $post->ID;
$post_name = $post ->post_name;
$post_title = $post ->post_title;
$post_content = $post ->post_content;
$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) ); ?>

<section id="<?php echo $post_name; ?>" class="kipekee fullWidth">
    <h1><?php echo $post_title; ?></h1>

    <div class="container">
        <div class="main">
            <?php echo $post_content; ?>
        </div><!--blocco_wrapper-->
    </div><!--container-->

<?php 
$blocco_contenuto = 'blocco';
if( have_rows($blocco_contenuto) ): 
    $count = 0; ?>
<div class="blocco_container">
<?php while( have_rows($blocco_contenuto) ): the_row(); 
    $count++;
    $descrizione = get_sub_field('descrizione');
    $immagine_id = get_sub_field('immagine');
    $immagine_src = wp_get_attachment_image_src( $immagine_id, 'full' );
    $immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true); ?>

        <div class="blocco_wrapper">
        <span><?php echo $count; ?></span>
        <?php echo $descrizione; ?>
        </div><!--blocco_wrapper-->
        <div class="img_wrapper" style="background-image:url('<?php echo $immagine_src[0]; ?>');"></div>

<?php endwhile; ?>
</div>
<?php endif; ?>

</section>