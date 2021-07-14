<?php

///////// Styles and Scripts
function febecoop_scripts() {
    // Styles
    // CDNS
    wp_enqueue_style( "swiper-css", "https://unpkg.com/swiper/swiper-bundle.min.css" );
    // Styles
    wp_enqueue_style( "main-style", get_template_directory_uri(  ) . "/src/STYLE/main.css" );


    // Register Scripts
    // CDNS
    wp_enqueue_script( "swiper-script", "https://unpkg.com/swiper/swiper-bundle.min.js", array(), rand(100000,200000), true);
    wp_enqueue_script( "axios-script", "https://unpkg.com/axios/dist/axios.min.js", array(), rand(100000,200000), true);

    // Scripts
    wp_enqueue_script( "customswiper-script", get_template_directory_uri(  ) . "/src/JS/customswipers-dist.js", array(), rand(100000,200000), true);
    wp_enqueue_script( "togglemenu-script", get_template_directory_uri(  ) . "/src/JS/toggle-menu-dist.js", array(), rand(100000,200000), true);
   
    wp_enqueue_script( "togglemenuMobile-script", get_template_directory_uri(  ) . "/src/JS/toggle-menu-mobile-dist.js", array(), rand(100000,200000), true);
   
    
    wp_enqueue_script( "toggleaccordeon-script", get_template_directory_uri(  ) . "/src/JS/toggle-accordeon-dist.js", array(), rand(100000,200000), true);
    wp_enqueue_script( "togglesearch-script", get_template_directory_uri(  ) . "/src/JS/toggle-search-dist.js", array(), rand(100000,200000), true);
    wp_enqueue_script( "tabs-form-script", get_template_directory_uri(  ) . "/src/JS/tabulations-forms-dist.js", array(), rand(100000,200000), true);
    wp_enqueue_script( "toggle-filtre", get_template_directory_uri(  ) . "/src/JS/toggle-filtre-type-a-dist.js", array(), rand(100000,200000), true);
    wp_enqueue_script( "hover-effect", get_template_directory_uri(  ) . "/src/JS/hover-effect-dist.js", array(), rand(100000,200000), true);

    wp_enqueue_script( "form-download-effect", get_template_directory_uri(  ) . "/src/JS/form-download-file.js", array(), rand(100000,200000), true);


}
add_action( 'wp_enqueue_scripts', 'febecoop_scripts');



function add_defer_attribute($tag, $handle) {
    // add script handles to the array below
    $scripts_to_defer = array('');
    
    foreach($scripts_to_defer as $defer_script) {
       if ($defer_script === $handle) {
          return str_replace(' src', ' defer="defer" src', $tag);
       }
    }
    return $tag;
 }

 add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);