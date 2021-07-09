<?php
///////// THEME SUPPORTS 
// Menus
add_theme_support( 'menus' );
    register_nav_menus( 
        [
            'header-top-menu' => 'Header Top Menu',
            'header-main-menu' => 'Header Main Menu',
            'footer-bottom-menu' => 'Footer Bottom Menu',
        ]
    );


function wpse_setup_theme() {
// Theme Options
add_theme_support( 'post-thumbnails' );
 }
 
 add_action( 'after_setup_theme', 'wpse_setup_theme' );