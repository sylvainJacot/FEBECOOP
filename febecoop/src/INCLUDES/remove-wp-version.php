<?php
// --------------------------------------------------------------- //
//    -   REMOVE WORDPRESS VERSION NUMBER
// --------------------------------------------------------------- //

function wpb_remove_version() {
    return '';
} add_filter('the_generator', 'wpb_remove_version');