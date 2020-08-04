<section id="top_bar">
<div class="container">
    <div class="top_bar__wrapper">
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menu-header', 
                'menu_id' => 'menu-header'
                ) );
        ?>
    </div><!--top_bar__wrapper-->

 <?php /* ?>   <div class="top_bar__wrapper">
      <a href="<?php bloginfo('wpurl'); ?>" title="Homepage">
        <img class="logo" alt="Logo Magis Vintage" src="<?php bloginfo('wpurl') ?>/images/logo-magis-vintage.png" />
      </a>          
        <?php // echo do_shortcode('[wcas-search-form]'); ?>
    </div><!--top_bar__wrapper-->
<?php */ ?>


    <div class="top_bar__wrapper">

        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menu-admin', 
                'menu_id' => 'menu-admin'
                ) );
        ?>
            <ul><li class="search"><a title="<?php _e('Apri il menu di ricerca','my-child-theme'); ?>" id="openSearchMenu">
            <img width="20" height="20" class="icons search" alt="<?php _e( 'Cerca', 'my-child-theme' ); ?>" src="<?php bloginfo('wpurl'); ?>/images/icons/search.svg" />
            </a></li></ul>
    </div><!--top_bar__wrapper-->
    </div><!--container-->
</section>