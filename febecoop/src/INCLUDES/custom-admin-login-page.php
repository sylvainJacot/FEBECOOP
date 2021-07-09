<?php
// --------------------------------------------------------------- // 
//    -   CUSTOM ADMIN LOGIN PAGE
// --------------------------------------------------------------- // 
 
function custom_loginlogo() {
    echo '<style type="text/css">
        body {
            background: #efedf3 !important;
        }
        h1 a {
            background-image: url(';?> <?php echo get_template_directory_uri(); ?><?php echo'/src/ASSETS/IMAGES/common/VECTOR/logo_Febecoop.svg) !important;
            background-size: 80% !important;
            background-position: center center !important;
            background: #efedf3; 
            height: 100px !important;
            width: 280px !important;
        }
        .login form {
            background: #efedf3;
            box-shadow: none !important;
            border: none !important;
        }
        #wp-submit.button.button-primary.button-large {
            background: #FF9223 !important;
            border-color:#FF9223!important; 
            border-radius: none !important;
            box-shadow: none !important;
            text-shadow: none !important;
            color: #efedf3 !important;
        }
    </style>';
} add_action('login_head', 'custom_loginlogo');


// --------------------------------------------------------------- // 
//    -   CUSTOM ADMIN FOOTER
// --------------------------------------------------------------- // 

function remove_footer_admin () {
    echo "Created by <a href='https://www.atelierdesign.be' target='_blank'>Atelier Design</a> / Powered by <a href='http://www.wordpress.org' target='_blank'>Wordpress</a>";
} add_filter('admin_footer_text', 'remove_footer_admin');

