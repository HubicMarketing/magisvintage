<?php global $post;
$post_id = $post->ID;
$post_name = $post ->post_name;
$post_title = $post ->post_title;
$post_content = $post ->post_content;
$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
$link_certificazione = get_field('link_certificazione'); ?>

<section id="<?php echo $post_name; ?>" class="kipekee fullWidth">
<?php include(dirname(__FILE__)."/fullWidthTopContent/topContent.php"); ?>
<div class="container">
<?php $blocco_contenuto = 'blocco';
    if( have_rows($blocco_contenuto) ): 
        $count = 0; ?>
    <div class="blocco_container">
    <?php 

    while( have_rows($blocco_contenuto) ): the_row(); 
        $count++;
        $descrizione = get_sub_field('descrizione');
        $video = 'video'; if( have_rows($video) ): while( have_rows($video) ): the_row(); 
        $video_src = get_sub_field('video');
        $preview_id = get_sub_field('preview');
        $preview_src = wp_get_attachment_image_src( $preview_id, 'full' ); 
        
        if(!my_wp_is_mobile()) { ?>
            <video controls preload="none" poster="<?php echo $preview_src[0]; ?>">
                <source src="<?php echo $video_src; ?>" type="video/mp4">
            </video>
       
            <div class="blocco_wrapper">
                <span><?php _e('Fase','my-child-theme'); ?> <?php echo $count; ?></span>
                <?php echo $descrizione; ?>
            </div><!--blocco_wrapper-->            
        <?php } else { ?>        
            <div class="blocco_wrapper">
                <span><?php _e('Fase','my-child-theme'); ?> <?php echo $count; ?></span>
                <?php echo $descrizione; ?>
            </div><!--blocco_wrapper-->     
            <video controls preload="none" poster="<?php echo $preview_src[0]; ?>">
                <source src="<?php echo $video_src; ?>" type="video/mp4">
            </video>
        <?php ?>
        <?php } endwhile; endif; 
        endwhile; ?>
    </div>
    <?php endif; ?>
</div><!--container-->

<a class="certificazione_kipekee" target="_blank" href="<?php echo $link_certificazione; ?>" title="<?php _e('Scarica la certificazione dei saponi impiegati','my-child-theme'); ?>">
<?php _e('Scarica la certificazione dei saponi impiegati','my-child-theme'); ?></a>
</section>