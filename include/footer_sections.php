<section id="footer_sections">
<div class="wrapper">

    <div class="footer__wrapper">
    <h4>Sede legale e operativa</h4>
    <p>Magis Srl</p>
    <p><a href="https://goo.gl/maps/5rd9PaDWCEb4fuzh6" target="_blank">Via Vecchia di Compietra, 5/7<br/>51037 Montale (PT) - Italy</a></p>
    <p>P.Iva/C.Fis: 01636300473</p>       
    </div><!--top_bar__wrapper-->

    <div class="footer__wrapper">
    <h4>Contatti</h4>
    <ul>
        <li>Telefono: <strong><a href="tel:+39-0573-959517">+39 0573 959517</a></strong></li>
        <li>Email: <strong><a href="mailto:info@magis-trading.com">info@magis-trading.com</a></strong></li>
        <li>Skype: magis2007</li>
    </ul>
    </div><!--footer__wrapper-->

    <div class="footer__wrapper">
<h4>Social Networks</h4>
        <ul class="social">
            <li><a target="_blank" title="" href=""><img loading="lazy" width="30" height="30" class="lazyload img-fluid" data-src="<?php bloginfo('wpurl') ?>/images/social/facebook_b.png" alt="" /></a></li>
            <li><a target="_blank" title="" href=""><img loading="lazy" width="30" height="30" class="lazyload img-fluid" data-src="<?php bloginfo('wpurl') ?>/images/social/instagram_b.png" alt="" /></a></li>
            </ul>
</div>

    <div class="footer__wrapper">
    <h4>Assistenza</h4>
        <?php 
            wp_nav_menu( array( 
                'theme_location' => 'menu-footer', 
                'menu_id' => 'menu-footer'
                ) );
        ?>
    </div><!--footer__wrapper-->
</div><!--wrapper-->
</section>