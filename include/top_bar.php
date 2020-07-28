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
    <ul><li><a id="openSearchMenu">Cerca</a></li></ul>
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menu-admin', 
                'menu_id' => 'menu-admin'
                ) );
        ?>
    </div><!--top_bar__wrapper-->
</section>