<?php

/**
 * Header file
 * 
 * 
 */
?>
<?php

$meta_description = get_field('meta_description', get_queried_object_id());
$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (empty($meta_description)) {
    $meta_description = 'This could be an interesting meta description';
}

?>
<!DOCTYPE html>
<!--  language_attributes() : Builds up a set of HTML attributes containing the text direction and language information for the page. -->
<html <?php language_attributes() ?> dir="ltr">

<head>

    <!-- // Preload CSS -->
    <!-- <link rel="preload" as="style" type="text/css" href="<?php echo get_template_directory_uri(); ?>/src/STYLE/01_ATOMS/fonts.css" media="none" onload="this.media='all';"> -->
    <link rel="preload" as="font" type="font/woff2" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/FONTS/HANDO/Hando-ExtraLight.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/FONTS/HANDO/Hando-Bold.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/FONTS/HANDO/Hando-Regular.woff2" crossorigin>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta charset="utf-8">
    <?php if (is_home()) : ?>
        <title>Blog | <?php bloginfo('name'); ?></title>
    <?php elseif (is_404()) : ?>
        <title>Error 404 | <?php bloginfo('name'); ?></title>
    <?php else : ?>
        <title><?php if (get_field('meta_titre')) : the_field('meta_titre') ?> | <?php bloginfo('name');
                                                                                else : the_title(); ?> | <?php bloginfo('name');
                                                                                                        endif; ?></title>
    <?php endif; ?>

    <meta name="description" content="<?php echo $meta_description; ?> " />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/FAVICON/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/FAVICON/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/FAVICON/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/FAVICON/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/FAVICON/safari-pinned-tab.svg" color="#ffdc54">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">



    <?php // Meta Facebook 
    ?>
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $current_url; ?>">
    <meta property="og:title" content="<?php the_field('meta_titre'); ?>">
    <meta property="og:image" content="<?php the_field('image_partage', 'options'); ?>">
    <meta property="og:description" content="<?php the_field('meta_description') ?>">
    <meta property="og:site_name" content="Febecoop">
    <meta property="og:locale" content="fr_FR">

    <?php // Meta Twitter 
    ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo $current_url; ?>">
    <meta name="twitter:title" content="<?php the_field('meta_titre'); ?>">
    <meta name="twitter:description" content="<?php the_field('meta_description'); ?>">
    <meta name="twitter:image" content="<?php the_field('image_partage', 'options'); ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TKPEZGXXW4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-TKPEZGXXW4');
    </script>


    <?php wp_head() ?>
</head>

<!-- Hey, source code investigator! 
	This website is created by
		
	         _       _ _             _____            _             
	    /\  | |     | (_)           |  __ \          (_)            
	   /  \ | |_ ___| |_  ___ _ __  | |  | | ___  ___ _  __ _ _ __  
	  / /\ \| __/ _ \ | |/ _ \ '__| | |  | |/ _ \/ __| |/ _` | '_ \ 
	 / ____ \ ||  __/ | |  __/ |    | |__| |  __/\__ \ | (_| | | | |
	/_/    \_\__\___|_|_|\___|_|    |_____/ \___||___/_|\__, |_| |_|
	                                                     __/ |      
                                                        |___/   
	Go pay them a visit on
	https://www.atelierdesign.be
	info@atelierdesign.be
	-->

<body <?php body_class(''); ?> class="body-active">

    <header id="js-header">
        <div class="header-wrapper header-wrapper-landing">
            <div class="header-first-section  header-first-section-landing grid">
                <a id="Febecoop-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/logo_Febecoop.svg" alt="Febecoop logo" /></a>



            <div class="menu-lang menu-lang-laptop menu-lang-landing" id="js-menu-lang">

            <!-- <? $lang = get_field('lang');?>                                                                                
            <a href="#"><?php echo $lang; ?><?php get_template_part( '/src/assets/images/common/svg/icons/arrow' );?></a> -->


            <? $languages = pll_the_languages(array('raw' => 1)); ?>
            <a href="#"><?php echo pll_current_language(); ?><?php get_template_part( '/src/assets/images/common/svg/icons/arrow' );?></a>

            <ul>
        <?php
        foreach ($languages as $lang) :
        if($lang['slug'] != pll_current_language()):
            echo '<li><a href ="' . $lang['url'] .'" hreflang = "' . $lang['slug'] . '">' . $lang['slug'] . '</a></li>';
        endif;
        endforeach;
        ?>
    </ul>
            </div>


                </div>
            </div>
    </header>
