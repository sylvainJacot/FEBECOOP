<?php

/**
 * Template Name: Accompagnement Conseil
 * 
 * 
 */
get_header();
?>

<!-- LA DIFFERENCE AVEC LE NL, C'EST QUE LA BANNER CONTACT ET SUCCESS STORIES SONT INVERSES -->

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-c accompagnement-conseil-hero-section">
    <div class="hero-section-type-c-wrapper grid">
        <div class="hero-section-type-c-content hero-section-type-c-content-no-pic">
            <?php
            $field = get_field_object('general-couleur', $term);
            $value = $field['value'];
            $label = $field['choices'][$value]; ?>
            <div class="pentagone-icons-wrapper">

                <?php
                $image = get_field('general-icone', $term);
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <span class="main-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
                    </svg></span>
                <span class="secondary-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
                    </svg></span>

            </div>
            <div class="hero-section-type-c-content-text">
                <p class="hero-section-type-c-content-toptitle"><?php pll_e('Accompagnements & conseils');?></p>
                <h1><span><?php the_field('general-titre') ?></span></h1>
            </div>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php echo the_field('general-description'); ?></p>
    </div>
</div>



<!-- ACCOMPAGNEMENT - CONSEILS CONTENU ==============
=========================== -->
<section class="accompagnement-conseils-contenu-section accompagnement-conseils-contenu-section-nl">
    <main class="accompagnement-conseils-contenu-main grid">
        <div class="accompagnement-conseils-content generic-content">
            <!-- // START contenu_flexible -->
            <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main'); ?>

            <!-- END contenu_flexible -->
        </div>
        <div class="accompagnement-conseils-aside-wrapper"> 
            <?php if (have_rows('contenu_aside')) : ?>
                <?php while (have_rows('contenu_aside')) : the_row();
                    $titre = get_sub_field('titre');
                    $text = get_sub_field('text-aside');
                ?>
                    <aside class="accompagnement-conseils-aside">
                        <p class="accompagnement-conseils-aside-titre"><?php echo $titre; ?></p>
                        <p class="accompagnement-conseils-aside-text"><?php echo $text; ?></p>
                        <ul class="accompagnement-conseils-aside-links">
                            <?php if (have_rows('liens_internes_ou_externes')) : while (have_rows('liens_internes_ou_externes')) : the_row(); ?>

                                    <?php if (get_row_layout() == 'lien_externe') : ?>

                                        <?php
                                        $link = get_sub_field('lien_externe');
                                        if ($link) : ?>

                                            <li class="accompagnement-conseils-aside-link-item">
                                                <a class="cta-c" href="<?php echo esc_url($link); ?>"><span><?php echo get_sub_field('libelle_du_lien'); ?></span></a>
                                            </li>

                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <?php if (get_row_layout() == 'lien_interne') : ?>

                                        <?php
                                        $link = get_sub_field('lien_interne');
                                        if ($link) :
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                            <li class="accompagnement-conseils-aside-link-item">
                                                <a class="cta-c" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span></a>
                                            </li>
                                        <?php endif; ?>

                                    <?php endif; ?>

                            <?php endwhile;
                            endif; ?>
                        </ul>
                    </aside>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </main>

</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner-far-from-footer"); ?>


<!-- SUCCESS STORIES ==============
=========================== -->
<section class="other-news-section other-news-succes-stories other-news-succes-stories-top-footer">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
        <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-loop-mobile-NL'); ?>
        <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-loop-laptop-NL'); ?>
</section>




<?php
get_footer();
?>