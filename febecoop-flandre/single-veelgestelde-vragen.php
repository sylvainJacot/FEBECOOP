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
                <p class="hero-section-type-d-content-toptitle"><?php pll_e('Notes pratiques & outils'); ?></p>
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
        <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main'); ?>
        <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a');  ?>

    </div>

    <!-- ASIDE flexible ==============
=========================== -->
    <aside class="aside-wysiwyg">
        <h3 class="aside-wysiwyg-title"><?php pll_e('Autres sujets');?></h3>

        <ul class="aside-wysiwyg-list-items-wrapper">
            <?php

            $related = get_posts(array(
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' => 3,
                'orderby' => 'rand',
                'post_type' => 'veelgestelde-vragen',
                'post__not_in' => array($post->ID)
            ));

            if ($related) foreach ($related as $post) {
                setup_postdata($post); ?>
                <li class="aside-wysiwyg-list-item">
                    <?php the_post_thumbnail(); ?>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                </li>
            <?php }
            wp_reset_postdata(); ?>
        </ul>
        <span class="aside-wysiwyg-cta">
            <a class="cta-c" href="<?php echo esc_url(home_url('/')); ?>notes-pratiques-outils" class="cta-c"><span><?php pll_e('Voir tous les sujets'); ?></span></a>
        </span>

    </aside>

</main>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part('./src/TEMPLATES/ContactBanner/contact-banner-options'); ?>


<?php
get_footer();
?>