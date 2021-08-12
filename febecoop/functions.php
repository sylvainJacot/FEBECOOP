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
require_once(__DIR__ .'/src/INCLUDES/translations.php');


function my_pagination_rewrite() {
    add_rewrite_rule('actualites/page/?([0-9]{1,})/?$', 'index.php?category_name=actualites&paged=$matches[1]', 'top');
}
add_action('init', 'my_pagination_rewrite');


function remove_page_from_query_string($query_string)
{ 
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        $query_string['paged'] = $query_string['page'];
    }      
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');