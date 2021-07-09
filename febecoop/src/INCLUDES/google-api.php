<?php

// Clé d'API (au début du fichier, important)
// define( 'GMAP_API_KEY', 'AIzaSyDo77UBqCntbsSfn1gkYyRwuqgjToez-5A' );

/* ACF Google Maps */
// function wpc_acf_init() {
// acf_update_setting('google_api_key', GMAP_API_KEY);
// }
// add_action('acf/init', 'wpc_acf_init');

add_action('acf/init', 'febecoop_acf_init');
function febecoop_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDo77UBqCntbsSfn1gkYyRwuqgjToez-5A');
}