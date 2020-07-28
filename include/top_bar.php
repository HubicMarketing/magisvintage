<section id="top_bar">
    <div class="top_bar__wrapper">
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menu-header', 
                'menu_id' => 'menu-header'
                ) );
        ?>
    </div><!--top_bar__wrapper-->

    <div class="top_bar__wrapper">
      <a href="<?php bloginfo('wpurl'); ?>" title="Homepage">
        <img class="logo" alt="Logo Magis Vintage" src="<?php bloginfo('wpurl') ?>/images/logo-magis-vintage.png" />
      </a>          
        <?php // echo do_shortcode('[wcas-search-form]'); ?>
    </div><!--top_bar__wrapper-->

    <div class="top_bar__wrapper">
    
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menu-admin', 
                'menu_id' => 'menu-admin'
                ) );
        ?>
        <ul><li><a id="openSearchMenu">Cerca</a></li></ul>
    </div><!--top_bar__wrapper-->
</section>