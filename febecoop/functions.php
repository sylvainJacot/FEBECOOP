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
  add_rewrite_rule('([a-z]+)/page/?([0-9]{1,})/?$', 'index.php?category_name=$matches[1]&paged=$matches[2]', 'top');
 }
 
 
 add_action('init', 'my_pagination_rewrite');