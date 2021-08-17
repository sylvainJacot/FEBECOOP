<!-- Le problème était si on voulait accèder une pagination d'une taxonomy dans une categorie (par exemple : http://febecoopwallonie.local/categories_actualites/cat-1/page/2/), 
ça fonctionne pas parce que de base, il n'y a pas de règles des slugs ne sont pas à jours sur Wordpress; 
Du coup, c'est ce qui est fait avec cette fonction -->

<!-- Solution trouvée sur https://jewelfarazi.me/fix-wordpress-custom-taxonomy-pagination-404-error/ -->

<?php
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