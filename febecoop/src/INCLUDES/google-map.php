<?php 

// Clé d'API (au début du fichier, important)
define( 'GMAP_API_KEY', 'AIzaSyDo77UBqCntbsSfn1gkYyRwuqgjToez-5A' );

// Clé Google Maps pour le champ ACF (à la suite de votre code existant)
function acf_google_map_api( $api ){
	$api['key'] = GMAP_API_KEY;
	return $api;
}
add_filter( 'acf/fields/google_map/api', 'acf_google_map_api' );