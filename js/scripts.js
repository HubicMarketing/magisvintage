window.onload = function() {    

    // change grid in archive if products are displayed
    const productArchive = document.querySelector('.tax-product_cat .products li.product.type-product');
    if(productArchive != null) {
        const productList = productArchive.parentElement;
        productList.classList.add('product_grid');
    }

    // LAZY LOADING
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
        img.src = img.dataset.src;
        });
    } else {
        // Dynamically import the LazySizes library
        const script = document.createElement('script');
        script.src =
        'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
        document.body.appendChild(script);
    }

    jQuery('a[href="#offerte"],a[href="#macchine"],a[href="#milk_400"]').click(function() {
        var origin = jQuery(this).attr('href');
        var calcOffset = jQuery(''+origin+'').offset().top;
        event.preventDefault();
        // console.log(calcOffset)
        jQuery("html, body").animate({ scrollTop: calcOffset }, 500);
    });
    jQuery('a[href="#inovi_mini"]').click(function() {
        var origin = jQuery(this).attr('href');
        var calcOffset = jQuery(''+origin+'').offset().top -80;
        event.preventDefault();
        // console.log(calcOffset)
        jQuery("html, body").animate({ scrollTop: calcOffset }, 500);
    });
    
    // ON SCROLL FIXE LOGO TO TOP (MOBILE)
    var main_menu = jQuery("#masthead");
    var main_menu_top = main_menu.offset().top;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > main_menu_top) {
        jQuery(main_menu).addClass("fixed-top");
        } else {
        jQuery(main_menu).removeClass("fixed-top");
        }

        var height = jQuery(window).scrollTop();
        if (height > 100) {
            jQuery('#back2Top').fadeIn();
        } else {
            jQuery('#back2Top').fadeOut();
        }

    });  

    jQuery("#back2Top").click(function(event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    // OPEN SEARCH MENU
    const searchMenu = document.querySelector('#searchMenu');

    const openSearchMenu = () => {
        searchMenu.style.width = "50%";
        searchMenu.classList.add('openSearch');
    };    
    const openSearchBtn = document.querySelector('#openSearchMenu');
    openSearchBtn.addEventListener('click', openSearchMenu);

    const closeSearchMenu = () => {
        searchMenu.style.width = "0";
        searchMenu.classList.remove('openSearch');
    };
    const closeSearchBtn = document.querySelector('#closebtn');
    closeSearchBtn.addEventListener('click', closeSearchMenu);

}

