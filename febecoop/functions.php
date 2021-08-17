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
// require_once(__DIR__ .'/src/INCLUDES/fixe-404-taxonomy-pagination.php');




function generate_taxonomy_rewrite_rules( $wp_rewrite ) {

$rules = array();

$post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects' );
$taxonomies = get_taxonomies( array( 'public' => true, '_builtin' => false ), 'objects' );

foreach ( $post_types as $post_type ) {
    $post_type_name = $post_type->name;
    $post_type_slug = $post_type->rewrite['slug'];

    foreach ( $taxonomies as $taxonomy ) {
        if ( $taxonomy->object_type[0] == $post_type_name ) {
            $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
            foreach ( $terms as $term ) {
                $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                $rules[$post_type_slug . '/' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=' . $wp_rewrite->preg_index( 1 );
            }
        }
    }
}

$wp_rewrite->rules = $rules + $wp_rewrite->rules;

}

add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');