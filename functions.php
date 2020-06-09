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
}

?>