<?php

/**
 * 
 * 
 * 
 */
get_header();
$pa_terms = get_terms('projet_accompagne_cat');
// print_r($pa_terms);
global $wp_query;
?>
<section class="hero-section-type-b fiche-outils-hero-section" id="projets-accompagnes-hero-section">
    <picture class="hero-section-type-waves-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-mobile.svg" alt="example" />
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
                <p class="hero-section-type-b-content-toptitle"><?php pll_e('Sur le terrrain');?></p>
                <h1><span>
                        <?php if (get_field('titre_hero')) :
                            $maintitle = get_field('titre_hero');
                            $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                            echo $openmainttitle;
                        else : the_title();
                        endif; ?>
                    </span></h1>
            </div>
            <div class="hero-section-pic-wrapper">
                <?php
                $image = get_field('illustration_hero');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            </a>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero'); ?></p>
    </div>
</div>



<!--PROJETS ACCOMPAGNES ==============
=========================== -->
<section class="projets-accompagnes-section">
    <div class="projets-accompagnes-section-wrapper grid">

        <div class="filtres-type-a-container projets-accompagnes-section-filtres js-filtres-type-a-container">
            <p class="filtres-type-a-title">Filtrer par</p>
            <ul class="filtres-types-a-filtres-container ajax-filtres-types-a-filtres-container">
                <?php foreach ($pa_terms as $tag) : ?>
                    <?php $term_link = get_term_link($tag); ?>
                    <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>"><?php echo $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <main class="card-type-b-container" id="card-projet-accompagnes-container">

            <?php
            // The Loop
            while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="card-type-b-item" style="opacity: 0; transition: opacity 1s;">
                    <div class="card-type-b-pic-wrapper">
                        <?php
                        $image = get_field('projet-image-hero');
                        if (!empty($image)) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="card-type-b-content">
                        <p class="card-type-b-chapeau"><?php the_title() ?></p>
                        <p class="cta-c"><?php pll_e('Lire plus');?></p>
                    </div>
                </a>
            <?php endwhile;?>
            
            <div class="post-page-link"> 
            <?php
            posts_nav_link();
            ?>
            </div>
            <?php
            // Reset Query
            wp_reset_query();

            wp_reset_postdata();
            // endif;
            ?>

        </main>


        <!-- <a class="cta-a" id="js-load-more">Load more</a> -->

    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>







<?php
get_footer();
?>