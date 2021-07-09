<?php
/**
 * Theme functions
 * 
 * 
 */
require_once(__DIR__ .'/src/INCLUDES/scripts-styles.php');
require_once(__DIR__ .'/src/INCLUDES/theme_supports.php');
require_once(__DIR__ .'/src/INCLUDES/remove_top_bar_wp.php');
require_once(__DIR__ .'/src/INCLUDES/allow-svg.php');
require_once(__DIR__ .'/src/INCLUDES/options-page.php');
require_once(__DIR__ .'/src/INCLUDES/custom-WYSIWYG.php');
require_once(__DIR__ .'/src/INCLUDES/remove_blog_posts.php');
require_once(__DIR__ .'/src/INCLUDES/remove_comments.php');
require_once(__DIR__ .'/src/INCLUDES/google-api.php');
require_once(__DIR__ .'/src/INCLUDES/custom-admin-login-page.php');
require_once(__DIR__ .'/src/INCLUDES/remove-login-error.php');
// require_once(__DIR__ .'/src/INCLUDES/load-more-actualites.php');
// require_once(__DIR__ .'/src/INCLUDES/load-more-projets-accompagnes.php');

require_once(__DIR__ .'/src/INCLUDES/translations.php');

global $wp_query;
$wp_query->max_num_pages;

function custom_posts_per_page( $query ) {

    if ( $query->is_archive('actualites') ) {
        set_query_var('posts_per_page', 1);
    }
    }
    add_action( 'pre_get_posts', 'custom_posts_per_page' );