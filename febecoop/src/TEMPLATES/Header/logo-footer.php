<?
$logoName = get_query_var('logoName'); 


/** A COPIER-COLLER POUR UTILISER LES VARIABLES :
set_query_var( 'logoName', 'logoName' ); 

*/


?>

<a id="Febecoop-logo-footer" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/<? echo $logoName ?>" alt="Febecoop logo" /></a>