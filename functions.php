<?php
/**
 * Impostare il textdomain del Tema My Child Theme's.
 *
 * Dichiara il textdomain per il tema child .
 * Le traduzioni verranno inserite nella directory /languages/ .
 */
function my_child_theme_setup() {
	load_child_theme_textdomain( 'my-child-theme', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );


add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_register_style( 'btf', get_stylesheet_directory_uri() . '/css/btf.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'btf' );
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true );
}

/********************
 MENU
*/

register_nav_menus( array(
    'menu-header' => esc_html__( 'Menu Header', 'storefront' ),
    'menu-footer' => esc_html__( 'Menu Footer', 'storefront' ),
    'menu-admin' => esc_html__( 'Menu Admin', 'storefront' )
) );


/***********************
 ADMIN DASHBOARD
*/
/* Add Custom Taxonomy Filter @ WooCommerce Products Admin Dashboard */

add_filter( 'woocommerce_product_filters', 'filter_by_custom_taxonomy_dashboard_products' );
 
function filter_by_custom_taxonomy_dashboard_products( $output ) {
   
  global $wp_query;
 
  $output .= wc_product_dropdown_categories( array(
   'show_option_none' => 'Filtra per Tag',
   'taxonomy' => 'product_tag',
   'name' => 'product_tag',
   'selected' => isset( $wp_query->query_vars['product_tag'] ) ? $wp_query->query_vars['product_tag'] : '',
  ) );
   
  return $output;
}

/**************
// MOBILE
*/

// Change the ‘Menu’ button text
add_filter( 'storefront_menu_toggle_text', 'jk_storefront_menu_toggle_text' );
function jk_storefront_menu_toggle_text( $text ) {
	$text = '';
	return $text;
}

function my_wp_is_mobile() {
    static $is_mobile;

    if ( isset($is_mobile) )
        return $is_mobile;

    if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
            $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}


// INSERIRE POST THUMB IN ADMIN POST LIST PAGE
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Thumbs');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
		echo the_post_thumbnail( array(50,50) );
    }
}

// Aggiungere ID ai post, pagine
add_filter( 'manage_posts_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 6, 2 );
add_filter( 'manage_pages_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_pages_custom_column', 'revealid_id_column_content', 6, 2 );
add_filter( 'manage_media_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_media_custom_column', 'revealid_id_column_content', 6, 2 );
add_filter( 'manage_project_columns', 'revealid_add_id_column', 6 );
add_action( 'manage_project_custom_column', 'revealid_id_column_content', 6, 2 );

function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}

// GET IMAGE METADATA ON UPLOAD
/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
--------------------------------------------------------------------------------------*/
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {
		$my_image_title = get_post( $post_ID )->post_title;
		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );
		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );
		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);
		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );
		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );
	}
}

// REGISTER/REMOVE SIDEBAR

// add_action( 'widgets_init', 'register_new_sidebars' );

// function register_new_sidebars() {

//   register_sidebar(array(
//     'id' => 'sidebar2',
//     'name' => __( 'Prodotti visti di recente', 'storefront' ),
//     'description' => __( 'Prodotti visti di recente', 'storefront' ),
//     'before_widget' => '<div id="%1$s" class="widget %2$s">',
//     'after_widget' => '</div>',
//     'before_title' => '<h4 class="widgettitle">',
//     'after_title' => '</h4>',
//   ));

// 	register_sidebar(array(
//      'name' => 'Search Product Sidebar',
//      'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
//      'after_widget' => '</div>',
//      'before_title' => '<h3 class="widget-title">',
//      'after_title' => '</h3>',
//  ));

// }

// remove sidebar on prodotto customizzabile
// function iconic_remove_sidebar( $is_active_sidebar, $index ) {
// 	global $post;
// 	$post_id = $post->ID;
// 	$post_name = $post->post_name;
//     if( $index !== "sidebar-1" ) {
//         return $is_active_sidebar;
//     }
//     if( !is_product() ) {
//         return $is_active_sidebar;
//     }
// 		if($post_id !== 158092){
// 				return $is_active_sidebar;
// 		}
//     return false;
// }
// add_filter( 'is_active_sidebar', 'iconic_remove_sidebar', 10, 2 );


// remove sidebar
add_action( 'get_header', 'remove_storefront_sidebar' );
function remove_storefront_sidebar() {
	if ( is_cart() || is_checkout() || is_product_category() || is_account_page()) {
		remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
	}
}


/************************** 
 WOOCOMMERCE CUSTOMIZATION
**************************/

/************************** 
 HOMEPAGE
*/

// add slideshow in Homepage
function add_slideshow() {
	if(!wp_is_mobile()) {
		include( get_stylesheet_directory() . '/include/home/slideshow.php');
	}
}
add_action( 'storefront_before_content', 'add_slideshow', 0 );

// add main content
function add_main_content(){
  if(is_front_page()) {
    include( get_stylesheet_directory() . '/include/home/new_arrivals.php');
    include( get_stylesheet_directory() . '/include/home/home_content.php');
    include( get_stylesheet_directory() . '/include/home/product_cat.php');
    include( get_stylesheet_directory() . '/include/home/video.php');
    include( get_stylesheet_directory() . '/include/home/metodo-kipekee.php');
  }
}
add_action('storefront_before_content','add_main_content', 0);

// remove storefront home sections
function manage_storefront_homepage_section() {
  remove_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
  remove_action( 'storefront_homepage', 'storefront_page_content', 20 );
  remove_action( 'homepage', 'storefront_product_categories', 20 );
  remove_action( 'homepage', 'storefront_recent_products', 30 );
  remove_action( 'homepage', 'storefront_popular_products', 50 );
	remove_action( 'homepage', 'storefront_on_sale_products', 60 );
	remove_action( 'homepage', 'storefront_best_selling_products', 70 );
}
add_action( 'init', 'manage_storefront_homepage_section');




// add_action( 'homepage', 'add_home_includes_2', 15 );
// function add_home_includes_2() {
// 	include( get_stylesheet_directory() . '/includes/home/cover.php');
//  	include( get_stylesheet_directory() . '/includes/home/collezioni.php');
// 	//include( get_stylesheet_directory() . '/includes/recent-views.php');
// 	include( get_stylesheet_directory() . '/includes/home/prodotti.php');
// 	// include( get_stylesheet_directory() . '/includes/home/saldi.php');
// 	// include( get_stylesheet_directory() . '/includes/home/slideshow.php');
// 	if(!my_wp_is_mobile()) {
// 		// include( get_stylesheet_directory() . '/includes/parallax.php');
// 	}
// 		//include( get_stylesheet_directory() . '/includes/cerca.php');
// 	// include( get_stylesheet_directory() . '/includes/newsletter.php');
// }

/************************** 
 STOREFRONT HEADER / FOOTER
*/

add_action( 'storefront_header', 'add_top_bar', 0 );
function add_top_bar(){
	if(!my_wp_is_mobile()) {
		include(dirname(__FILE__)."/include/top_bar.php");
	}
}

add_action( 'storefront_header', 'add_search_menu', 0 );
function add_search_menu(){
		include(dirname(__FILE__)."/include/sliding_search_menu.php");
}

// add_action( 'storefront_header', 'add_top_social', 52 );
// function add_top_social(){
// 	if(!my_wp_is_mobile()) {
// 		include(dirname(__FILE__)."/includes/top_social.php");
// 	}
// }
add_action( 'storefront_header', 'search_product_form', 0 );
function search_product_form(){
	if(!wp_is_mobile()) {
        remove_action( 'storefront_header', 'storefront_product_search', 40);
	}
}
function manage_storefront_sections() {
  remove_action( 'storefront_header', 'storefront_site_branding', 20);
  remove_action( 'storefront_header', 'storefront_header_cart', 60);
  remove_action( 'storefront_footer', 'storefront_credit', 20);
}
add_action('init','manage_storefront_sections');

add_action( 'storefront_before_footer', 'add_before_footer_sections', 0 );
function add_before_footer_sections(){
  if(is_page(array(183, 64, 185, 66, 191, 193, 62, 197, 199))) { // contatti 2, 51, 53
    include(dirname(__FILE__)."/include/page/form.php");
  }
  if(is_page(array(2, 51, 53))){
    include(dirname(__FILE__)."/include/page/map.php");
  }
}


add_action( 'storefront_footer', 'add_footer_sections', 0 );
function add_footer_sections(){
		include(dirname(__FILE__)."/include/footer_sections.php");
}

//define the woocommerce_after_single_product_summary callback
// add_action( 'storefront_header', 'add_payment_methods_section', 25 );
// function add_payment_methods_section(){
// 	include(dirname(__FILE__)."/includes/payment_methods.php");
// }

// function mobile_logo() {
//     if(my_wp_is_mobile()) {
//         include( get_stylesheet_directory() . '/includes/header/icons.php');
//     }
// }
// add_action( 'storefront_header', 'mobile_logo', 49);

// if(my_wp_is_mobile()) {
//     add_action( 'storefront_header', 'storefront_site_branding', 20);
// }

/************************** 
 BREADCRUMBS
*/

// function wc_remove_storefront_breadcrumbs() {
// 	global $post;
// 	$post_id = $post->ID;
// 	$post_name = $post->post_name;
//     if ($post_id == 158092 && !is_product_category()){
//         remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
//     }
//   }
//   add_action( 'wp', 'wc_remove_storefront_breadcrumbs');

// function add_yoast_breadcrumbs() {
	// 	global $post;
	// 	$post_id = $post->ID;
	// 	$post_name = $post->post_name;
	//     if ($post_id == 158092){
	//         include( get_stylesheet_directory() . '/includes/custom/breadcrumbs-prodotto-custom.php');
	//     }
	//   }
	// add_action( 'woocommerce_before_single_product', 'add_yoast_breadcrumbs', 15 );


/****************************
 SHOP / ARCHIVE
*/

// EXCLUDE TAG FROM PRODUCT SHOP OR CATEGORY PAGE
// function exclude_specific_tag( $q ) {
//     if (is_product_category() || is_tax('product_brand')) {
//         $tax_query = (array) $q->get( 'tax_query' );
//         $tax_query[] = array(
//             'taxonomy' => 'product_tag',
//             'field' => 'slug',
//             'terms' => array( 'saldi' ), // tag name to hide ''
//             'operator' => 'NOT IN'
//         );
//         $q->set( 'tax_query', $tax_query );
//     }
// }
// add_action( 'woocommerce_product_query', 'exclude_specific_tag' );

// // change sale label
// add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_text', 10, 3);
// function woocommerce_custom_sale_text($text, $post, $_product){
//     return '<span class="onsale">Saldo</span>';
// }
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// CHANGE CATEGORY IMAGE SIZE
// add_filter( 'subcategory_archive_thumbnail_size', function( $size ) {
//   if ( is_product_category( 'vintage' ) ) {
//     return array(
//         'width' => 800,
//         'height' => 300,
//         'crop' => 1,
//         );
//     }
//   } );

/**
 * Hide category product count in product archives
 */
add_filter( 'woocommerce_subcategory_count_html', '__return_false' );

/**
 * Shop/archives: wrap the product image/thumbnail in a div.
 * 
 * The product image itself is hooked in at priority 10 using woocommerce_template_loop_product_thumbnail(),
 * so priority 9 and 11 are used to open and close the div.
 */

function wrap_cat_images() {

  add_action( 'woocommerce_before_subcategory_title', function(){
    echo '<div class="img_wrapper">';
  }, 9 );
  add_action( 'woocommerce_before_subcategory_title', function(){
      echo '<div class="cover trans"></div></div>';
  }, 11 );
  add_action( 'woocommerce_after_subcategory_title', function(){
    echo '<a class="translated btn btn-lg subcat_cta" href="' .  $term_link . '" title="Scopri la collezione"' . $term_name .'">Scopri la collezione</a>';
  }, 11 );
  

}
add_action('init','wrap_cat_images');




// CHANGE PRODUCT NUMBER FOR SPECIFI CATEGORY ONLY
add_filter('loop_shop_columns', 'custom_loop_columns', 999);
    if (!function_exists('custom_loop_columns')) {
      function custom_loop_columns() {
      if ( is_product_category( 'vintage' ) ) {
        return 2;
      } else {
        return 4; // set products per row for all other categories
    }
  }
}

//custom function to override default sort by category
function custom_default_catalog_orderby( $args ) {
    //choose categories where default sorting will be changed
    if (is_product_category( array( 'vintage' ))) {
        // return 'date'; // sort by latest
        $args['order'] = 'DESC';
        $args['orderby'] = 'title';
        return $args;
        
    }
  } //end function
  add_filter( 'woocommerce_product_subcategories_args', 'custom_default_catalog_orderby' ); //add the filter


/************************** 
 PRODUCT PAGE
*/

// add collezioni on prodotto custom

// function add_collezioni_prodotti() {
// 	global $post;
// 	$post_id = $post->ID;
// 	$post_name = $post->post_name;
// 		if ($post_id == 158092){
// 			include( get_stylesheet_directory() . '/includes/custom/collezioni-prodotto-custom.php');
// 	}
// }
// add_action( 'woocommerce_after_single_product_summary', 'add_collezioni_prodotti', 25 );


/**
 * Rename product data tabs
 */
//  add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
//  function woo_rename_tabs( $tabs ) {
 
//      $tabs['description']['title'] = __( 'Specifiche prodotto' );		// Rename the description tab
//  //	$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
//      $tabs['additional_information']['title'] = __( 'Informazioni aggiuntive' );	// Rename the additional information tab
//      return $tabs;
 
//  }

// Change the description tab heading to product name
// add_filter( 'woocommerce_product_additional_information_heading', 'wc_change_product_additional_information_heading', 10, 1 );
// function wc_change_product_additional_information_heading( $title ) {
// 	global $post;
// 	return 'Specifiche del prodotto';
// }

// REMOVE PRODUCT DESCRIPTION TAB
// add_filter( 'woocommerce_product_tabs', 'sd_remove_product_tabs', 98 );
// function sd_remove_product_tabs( $tabs ) {
//     unset( $tabs['description'] );
//     return $tabs;
// }

// WRAP IMAGE IN WRAPPER

if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
    function woocommerce_get_product_thumbnail( $size = 'full', $placeholder_width = 0, $placeholder_height = 0  ) {
				$mylocale = get_bloginfo('language');
        global $post, $woocommerce;
				$post_id = $post->ID;
				$post_name = $post->post_title;
				$url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
				$immagine_id = get_post_thumbnail_id( $post_id );
				$immagine_alt = get_post_meta( $immagine_id, '_wp_attachment_image_alt', true);
        $output .= '<div class="img_wrapper" id="' .  $post_id . '">';
				$output .= '<a href="' . get_permalink( $post_id ) . '">';
        $output .= '<img class="translated trans" alt="'. $immagine_alt .'" src="' . $url . '" />';
				$output .= '</a>';
				$output .= '</div>';
        return $output;
    }
}


/**
 * Disable out of stock variations
 */
function wcbv_variation_is_active( $active, $variation ) {
	if( ! $variation->is_in_stock() ) {
		return false;
	}
	return $active;
}
add_filter( 'woocommerce_variation_is_active', 'wcbv_variation_is_active', 10, 2 );


/**
 * Remove Categories from WooCommerce Product Category Widget
 */
 
// Used when the widget is displayed as a dropdown
// add_filter( 'woocommerce_product_categories_widget_dropdown_args', 'rv_exclude_wc_widget_categories' );
// // Used when the widget is displayed as a list
// add_filter( 'woocommerce_product_categories_widget_args', 'rv_exclude_wc_widget_categories' );
// function rv_exclude_wc_widget_categories( $cat_args ) {
// 	$cat_args['exclude'] = array('15','297'); // Insert the product category IDs you wish to exclude
// 	return $cat_args;
// }
 
// CUSTOMIZE RELATED PRODUCT 

// add_filter( 'woocommerce_related_products', 'related_products_by_same_title', 9999, 3 ); 
// function related_products_by_same_title( $related_posts, $product_id, $args ) {
//    $product = wc_get_product( $product_id );
//    $related_posts = get_posts( array(
//       'post_type' => 'product',
//       'post_status' => 'publish',
// 	  'tax_query' = array(
// 		'taxonomy' => 'product_tag',
// 		'field' => 'slug',
// 		'terms' => array( 'saldi' ),
// 		'operator' => 'NOT IN'
// 	  );
//    ));
//    return $related_posts;
// }

/**
 * Change number of related products output
 */
//  function woo_related_products_limit() {
// 	global $product;
  
// 	  $args['posts_per_page'] = 8;
// 	  return $args;
//   }
//   add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
// 	function jk_related_products_args( $args ) {
// 	  $args['posts_per_page'] = 8; // 4 related products
// 	  $args['columns'] = 4; // arranged in 2 columns
// 	  return $args;
//   }
  

// add_filter( 'woocommerce_related_products', 'related_products_filter', 9999, 3 ); 
 
// function related_products_filter( $related_posts, $product_id, $args ) {
//    $product = wc_get_product( $product_id );
//    $product_tag = 'product_tag';
//    $product_cat = 'product_cat';
//    $product_cats = wp_get_post_terms( $product_id, 'product_cat' );
// //    $last_cat = array_pop( $product_cats );
// //    $last_cat_id = $last_cat->term_id;
//    $title = $product->get_name();
//    $related_posts = get_posts( array(
//       'post_type' => 'product',
// 	  'post_status' => 'publish',
// 	  'posts_per_page' => 8,
// 	  'tax_query' => array( 
// 		'relation' => 'AND',   
// 		  array(
// 			'taxonomy' => $product_tag,    
// 			'field' => 'slug',   //(string) - Select taxonomy term by ('id' or 'slug')
// 			'terms' => array( 'saldi' ),    
// 			'operator' => 'NOT IN'
// 		  ),
// 		  array(
// 			'taxonomy' => $product_cat,
// 			'field' => 'slug',
// 			'terms' => array( $product_cats[1]->slug ),
// 			'operator' => 'IN'
// 		  )
// 		),
//    ));
// //    console_log($product_cats[1]->slug);
//    return $related_posts;
// }

// REMOVE related
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// 	function add_related(){
//   if(is_product()) {
//   add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 25 );
// 	}
// }
// add_action('woocommerce_after_main_content','add_related'); 

/************************** 
 FOOTER
*/

// add_action( 'init', 'jk_remove_storefront_handheld_footer_bar' );
// function jk_remove_storefront_handheld_footer_bar() {
//   remove_action( 'storefront_footer', 'storefront_handheld_footer_bar', 999 );
// }

// // FIRMA
// add_action( 'storefront_after_footer', 'add_firma' );
// function add_firma() {
//     include( get_stylesheet_directory() . '/includes/cookie-firma.php');
// }


/*******************************
    AJAX
*/
/* Increase Woocommerce Variation Threshold */
function wc_ajax_variation_threshold_modify( $threshold, $product ){
    $threshold = '111';
    return  $threshold;
  }
  add_filter( 'woocommerce_ajax_variation_threshold', 'wc_ajax_variation_threshold_modify', 10, 2 );
  
/**************************
 TRANSLATION
*/

// $mylocale = get_bloginfo('language');

// add_filter( 'gettext', 'translate_woocommerce_strings', 999, 3 );
// function translate_woocommerce_strings( $translated, $untranslated, $domain ) {
//    if ( ! is_admin() && 'woocommerce' === $domain ) {
//        switch ( $translated) {
//          case 'Discount applied' :
//             $translated = 'Sconto applicato';
//             break;
//         //  case 'Product Description' : 
//         //     $translated = 'Product Specifications';
//         //     break;
//          // ETC
//       }
//    }   
//    return $translated;
// }

?>