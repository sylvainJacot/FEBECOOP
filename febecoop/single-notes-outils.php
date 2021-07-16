<?php

/**
 * 
 * 
 */
get_header();
?>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-d">

    <div class="hero-section-type-d-wrapper grid">

        <div class="hero-section-type-d-content">

            <div class="hero-section-type-d-content-text">
                <p class="hero-section-type-d-content-toptitle"><?php pll_e('Notes pratiques & outils');?></p>
                <h1><span><?php the_title(); ?></span></h1>
            </div>

            <div class="">

            </div>

            <picture class="illu-npo-detail-wrapper">
                <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/npo-detail-illu-big.svg" media="(min-width: 1025px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/npo-detail-illu-small.svg" alt="Illustrations with speech ballons" />
            </picture>

        </div>



    </div>

</section>

<!--MAIN flexible ==============
=========================== -->
<main class="main-note-outils-content grid">
    <div class="section-note-outils-content generic-content">
        <!-- // START contenu_flexible -->
        <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
        <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a');  ?>
        <!-- END contenu_flexible -->
        <a class="back-cta" onclick="history.back();"><?php pll_e('Retour');?></a>
    </div>

    <!-- ASIDE flexible ==============
=========================== -->
    <aside class="note-outils-content-aside">
        <div class="noca-title">Autres sujets</div>

        <ul class="noca-questions-wrapper">
            <?php

            $related = get_posts(array(
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' => 3,
                'post_type' => 'notes-outils',
                'post__not_in' => array($post->ID)
            ));

            if ($related) foreach ($related as $post) {
                setup_postdata($post); ?>
                <li class="nocaq-item">
                    <?php the_post_thumbnail(); ?>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                </li>
            <?php }
            wp_reset_postdata(); ?>
        </ul>
        <span class="nocaq-cta">
        <a href="<?php echo esc_url(home_url('/')); ?>notes-pratiques-outils" class="cta-c"><?php pll_e('Voir toutes les notes pratiques & outils');?></a>
            </span>

    </aside>

</main>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>


<?php
get_footer();
?>