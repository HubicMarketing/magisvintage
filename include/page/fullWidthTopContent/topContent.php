<div class="img_wrapper">
<img class="translated" alt="<?php echo $post_title; ?>" src="<?php echo $url; ?>" />
<div class="cover"></div>
<hgroup class="translated">
    <h1><?php echo $post_title; ?></h1>
        <?php
            $args = array(
                    'delimiter' => ' > '            
            );
        ?>
    <?php woocommerce_breadcrumb( $args ); ?>
</hgroup>
</div><!--img_wrapper-->   

<?php if(!is_page(2, 51, 53)) { ?>
    <article id="main_content" class="blacked">
        <div class="container wrapper">
            <div class="main">
                <?php echo $post_content; ?>
            </div><!--blocco_wrapper-->
        </div><!--container-->
    </article>
<?php } ?>