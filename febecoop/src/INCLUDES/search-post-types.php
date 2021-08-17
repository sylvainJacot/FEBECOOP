<?php 
function my_search_filter($query) {
  if (!$query->is_admin && $query->is_search) {
    $query->set('post_type', array( 'post', 'page','actualites', 'publications', 'projet-accompagnes', 'notes-outils', 'formation-evenement', 'projet-partenaires', 'domaines-expertises', 'team-members', 'nos-membres', 'nos-mandats' ) );
  }
}

add_filter('pre_get_posts','my_search_filter');
?>

