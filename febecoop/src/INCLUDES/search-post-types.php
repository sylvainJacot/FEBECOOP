



<?php
function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search  && $post_type == 'actualites' && $post_type == 'publications' && $post_type == 'projet-accompagnes' && $post_type == 'notes-outils' && $post_type == 'formation-evenement' && $post_type == 'projet-partenaires' && $post_type == 'domaines-expertises' && $post_type == 'team-members' && $post_type == 'nos-membres' && $post_type == 'nos-mandats' )   
  {
    return locate_template('search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser'); 