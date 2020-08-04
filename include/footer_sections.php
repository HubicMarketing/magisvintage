<section id="footer_sections">
<div class="wrapper">

    <div class="footer__wrapper">
    <h4><?php _e('Sede legale e operativa','my-child-theme'); ?></h4>
    <p>Magis Srl</p>
    <p><a href="https://goo.gl/maps/5rd9PaDWCEb4fuzh6" target="_blank">Via Vecchia di Compietra, 5/7<br/>51037 Montale (PT) - Italy</a></p>
    <p><?php _e('P.Iva/C.Fis','my-child-theme'); ?>: 01636300473</p>       
    </div><!--top_bar__wrapper-->

    <div class="footer__wrapper">
    <h4><?php _e('Contatti','my-child-theme'); ?></h4>
    <ul>
        <li><?php _e('Telefono','my-child-theme'); ?>: <a href="tel:+39-0573-959517">+39 0573 959517</a></li>
        <li>Email: <a href="mailto:info@magis-trading.com">info@magis-trading.com</a></li>
        <li>Skype: <a href="skype:magis2007?call">magis2007</a></li>
    </ul>
    </div><!--footer__wrapper-->

    <div class="footer__wrapper">
    <h4>Social Networks</h4>
        <ul class="social">
            <li><a target="_blank" title="<?php _e('Visita la pagina Facebook di Magis Vintage','my-child-theme'); ?>" href="https://www.facebook.com/magisvintage/"><img loading="lazy" width="30" height="30" class="lazyload img-fluid" data-src="<?php bloginfo('wpurl') ?>/images/social/facebook.svg" alt="<?php _e('Visita la pagina Facebook di Magis Vintage','my-child-theme'); ?>" /></a></li>
            <li><a target="_blank" title="<?php _e('Visita il profilo Instagram di Magis Vintage','my-child-theme'); ?>" href="https://www.instagram.com/magisvintage/"><img loading="lazy" width="30" height="30" class="lazyload img-fluid" data-src="<?php bloginfo('wpurl') ?>/images/social/instagram.svg" alt="<?php _e('Visita il profilo Instagram di Magis Vintage','my-child-theme'); ?>" /></a></li>
        </ul>
    </div>
    <div class="footer__wrapper">
    <h4><?php _e('Assistenza','my-child-theme'); ?></h4>
        <?php wp_nav_menu( array( 
                'theme_location' => 'menu-footer', 
                'menu_id' => 'menu-footer'
                ) ); ?>
    </div><!--footer__wrapper-->
</div><!--wrapper-->
</section>