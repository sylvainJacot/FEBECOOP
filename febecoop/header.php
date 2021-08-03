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

<body <?php body_class(''); ?>>


    <header id="js-header">
        <div class="header-wrapper">
            <div class="header-first-section grid">
                <a id="Febecoop-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/logo_Febecoop.svg" alt="Febecoop logo" /></a>

                <div class="header-first-section-right-section">
                    <div class="header-socials-wrapper socials-header-tablet">
                        <?php while (have_rows('reseaux_sociaux', 'option')) : the_row(); ?>
                            <a class="social-item-b" href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/social-<?php echo sanitize_title(get_sub_field('nom')); ?>-blue.svg" alt="<?php the_sub_field('nom'); ?>"></a>
                        <?php endwhile; ?>
                    </div>
                    <div class="nav-search-tablet-placeholder" id="js-nav-search-tablet-placeholder">
                        <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
                    </div>


                    <button id="js-main-navigation-menu-button" class="main-navigation-menu-button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>

            <form action="<?php bloginfo('url'); ?>/" method="get" class="nav-search nav-search-tablet" id="js-nav-search-tablet">
            <label for="search" id="form-search-tablet-title"><?php pll_e('Rechercher');?></label>
            <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
            <?php get_template_part( './src/TEMPLATES/Search/search-custom-post-types' );?>
            <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
            <span class="nav-search-tablet-close-area" id="js-nav-search-tablet-close-area"><span></span></span>
            </form>

            <div class="header-second-section-mobile" id="js-header-second-section-mobile">
                <div class="header-second-section-mobile-wrapper grid">
                    <form action="<?php bloginfo('url'); ?>/" method="get" class="nav-search nav-search-mobile">
                        <label for="search">Search in <?php echo home_url('/'); ?></label>
                        <input type="text" name="s" placeholder="<?php pll_e('Rechercher');?>" id="search" value="<?php the_search_query(); ?>" />
                        <?php get_template_part( './src/TEMPLATES/Search/search-custom-post-types' );?>
                        <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
                    </form>
                    <?php get_template_part('src/TEMPLATES/Header/header-main-nav'); ?>
                    <?php get_template_part('src/TEMPLATES/Header/header-top-nav'); ?>

                </div>
            </div>
            <div class="header-second-section-laptop">
                <div class="header-second-section-laptop-wrapper">

                    <div class="header-second-section-top">
                        <div class="header-socials-wrapper socials-header-laptop">
                            <?php while (have_rows('reseaux_sociaux', 'option')) : the_row(); ?>
                                <a class="social-item-b" href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/social-<?php echo sanitize_title(get_sub_field('nom')); ?>-blue.svg" alt="<?php the_sub_field('nom'); ?>"></a>
                            <?php endwhile; ?>
                        </div>
                        <?php get_template_part('src/TEMPLATES/Header/header-top-nav'); ?>
                        <div class="nav-search-laptop-placeholder" id="js-nav-search-laptop-placeholder">
                            <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic.svg" />
                        </div>
                    </div>
                    <div class="header-second-section-bottom">
                        <?php get_template_part('src/TEMPLATES/Header/header-main-nav'); ?>
                    </div>

                </div>
            </div>
        </div>
        <form action="<?php bloginfo('url'); ?>/" method="get" class="nav-search nav-search-tablet" id="js-nav-search-tablet">
 
 <label for="search" id="form-search-tablet-title"><?php pll_e('Rechercher');?></label>
 <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
 <?php get_template_part( './src/TEMPLATES/Search/search-custom-post-types' );?>
 <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
 <span class="nav-search-tablet-close-area" id="js-nav-search-tablet-close-area"><span></span></span>
</form>
    </header>
    <form action="<?php bloginfo('url'); ?>/" method="get" class="nav-search nav-search-laptop" id="js-nav-search-laptop">
        <p class="nav-search-laptop-top-title">Rechercher et presser entrer</p>
        <label for="search">Search in <?php echo home_url('/'); ?></label>
        <?php get_template_part( './src/TEMPLATES/Search/search-custom-post-types' );?>
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
        <input type="image" alt="Search" class="js-nav-icon-search-laptop" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
        <span class="nav-search-laptop-close-area" id="js-nav-search-laptop-close-area"><span></span></span>
    </form>