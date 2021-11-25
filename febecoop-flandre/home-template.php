<?php

/**
 * Template Name: Home
 * 
 * 
 */
get_header();
?>

<?php 

;?>


<div id="overflow" style="overflow-x: hidden;">
<!-- HERO SECTION ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/Hero/hero-type-a"); ?>

<!-- ACCOMPAGNEMENT & CONSEILS ==============
=========================== -->
<span class="anchor" id="intro-section"></span>
<section class="home-accompagnement-conseils-section">
    <div class="home-accompagnement-conseils-section-wrapper grid">

        <div class="hac-header">
            <h3><?php the_field('accompagnement-titre'); ?></h3>
            <p><?php the_field('accompagnement-sous-titre'); ?></p>
        </div>
        <?php
        $featured_posts = get_field('accompagnement-pages');
        if ($featured_posts) : ?>
            <div class="hac-cards-wrapper">
                <?php foreach ($featured_posts as $post) :

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <a class="hac-card-item" href="<?php the_permalink(); ?>">

                        <div class="hac-card-item-header">

                            <?php get_template_part('./src/TEMPLATES/PentagoneShape/pentagone-shape'); ?>

                            <h2><?php if (get_field('carte-titre')) :
                                    $field = get_field_object('general-couleur');
                                    $value = $field['value'];
                                    $label = $field['choices'][$value];
                                    $maintitle = get_field('carte-titre');
                                    $openspan = "<span style=color:" . $value . ";>";
                                    $openmainttitle = str_replace('(*(', $openspan, $maintitle);
                                    $closemainttitle = str_replace(
                                        ')*)',
                                        '</span>',
                                        $openmainttitle
                                    );
                                    echo $closemainttitle;
                                else : the_title();
                                endif; ?>
                            </h2>
                        </div>

                        <div class="hac-card-item-content">
                            <p class="hac-card-item-content-desc"><?php the_field('carte-description'); ?></p>
                            <p class="cta-b"><?php the_field('carte-cta'); ?></p>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>

</section>

</div>


<!-- INFORMATION SPECIFIQUE ==============
=========================== -->
<section class="information-specifique-section">
    <div class="information-specifique-section-wrapper grid">
        <div class="iss-pic-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/HOME/VECTOR/illu-spec-info.svg" alt="Decorative illustration" />
        </div>
        <h4>
            <?php if (get_field('spec-titre')) :
                $maintitle = get_field('spec-titre');
                $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                echo $openmainttitle;
            else : the_title();
            endif; ?>
        </h4>
        <?php
        $link = get_field('spec-cta');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="cta-a" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
    </div>
</section>

<!-- EXPERTISE ==============
=========================== -->
<section class="expertise-section">
    <div class="expertise-section-illu">

    </div>
    <div class="expertise-section-wrapper grid">
        <div class="expertise-section-content">
            <h2><?php the_field('exp-titre'); ?></h2>
            <h3><?php the_field('exp-sous-titre'); ?></h3>
            <p><?php the_field('exp-paragraphe'); ?></p>
        </div>

        <?php $link_publi = get_field('publication-bouton');
                if ($link_publi) :
                    $link_publi_url = $link_publi['url'];
                    $link_publi_title = $link_publi['title'];
                    $link_publi_target = $link_publi['target'] ? $link_publi['target'] : '_self';
                ?>

        <a class="publication-item-container" href="<?php echo esc_url($link_publi_url); ?>" target="<?php echo esc_attr($link_publi_target); ?>">
            <div class="pi-pic-wrapper">
                <?php
                $image = get_field('publication-image');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="pi-content">
                <p class="pi-titre"><?php the_field('publication-titre'); ?></p>
                <p class="pi-desc"><?php the_field('publication-description'); ?></p>
                    <p class="cta-c"><span><?php echo esc_html($link_publi_title); ?></span></p>
                <?php endif; ?>
            </div>
        </a>
        <?php
        $link = get_field('exp-bouton');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="cta-a" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>

    </div>
</section>



<!-- DERNIERES ACTUALITES ==============
=========================== -->
<section class="last-news-section">
    <div class="last-news-section-wrapper grid">
        <div class="last-news-section-container">
            <div class="lns-header">
                <p><?php the_field('last-news-titre'); ?></p>
                <?php $link = get_field('last-news-bouton');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="cta-d" id="last-news-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span></a>
                <?php endif; ?>
            </div>

            <div class="home-last-news-cards-container">

                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'nieuwsfeed',
                        'orderby' => 'date',
                        'posts_per_page' => 2
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <?php get_template_part('./src/TEMPLATES/Actualites/actualite-card'); ?>

                <?php endwhile;
                wp_reset_query(); ?>


            </div>
            <?php $link = get_field('last-news-bouton');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a class="cta-b" id="last-news-cta-mobile" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>


        </div>
        <div class="nos-formations-container">
            <div class="nos-formations-header">
                <h2><?php the_field('formations-titre'); ?></h2>
            </div>
            <a class="nos-formations-card" href="<?php echo esc_url(home_url('/')); ?>workshops-en-events">

                <?php get_template_part('./src/TEMPLATES/PentagoneShape/pentagone-shape'); ?>

                <div class="nos-formations-card-content">
                    <p class="nos-formations-card-content-text"><?php the_field('formations-text'); ?></p>

                    <p class="cta-c"><span><?php pll_e('Voir les formations');?></span></p>

                </div>
            </a>
        </div>
    </div>
</section>


<!-- NOUS LES AVONS ACCOMPAGNES  MOBILE ==============
=========================== -->
<section class="slider-section-type-a avons-accompagnes-section avons-accompagnes-section-mobile">
    <div class="slider-wrapper-type-a  avons-accompagnes-section-wrapper  grid">
        <span class="slider-section-type-a-bg"></span>
        <div class="slider-type-a-header">
            <h2><?php the_field('projets-titre'); ?></h2>

            <?php
            $link = get_field('projet-bouton-b');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a id="avons-accompagnes-cta-tablet" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

            <?php
            $link = get_field('projet-bouton-a');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a id="avons-accompagnes-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>

            <div class="avons-accompagnes-section-mobile-cards-wrapper">
        <?php
                $featured_posts = get_field('projets');
                if ($featured_posts) : ?>

                    <?php foreach ($featured_posts as $post) :

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); ?>
                        <a href="<?php the_permalink(); ?> " class="swiper-slide swiper-slide-type-a">
                            <div class="slider-pic-wrapper-type-a">
                                <?php
                                $image = get_field('projet-image-hero');
                                if (!empty($image)) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="slider-content-type-a">
                                <h3 class="slider-title-type-a"><?php the_title(); ?></h3>
                                <?php if (get_field('projet-description')) : ?>
                                <p class="card-type-b-resume"><?php the_field('projet-description') ?></p>
                            <?php else : ?>

                                <?php if (have_rows('contenu-flexible')) : while (have_rows('contenu-flexible')) : the_row(); ?>
                                        <?php if (get_row_layout() == 'introduction-principale') :

                                            $txt = get_sub_field('introduction');
                                        ?>
                                            <p class="card-type-b-resume"><?php echo $txt; ?></p>

                                        <?php endif; ?>
                                <?php endwhile;
                                endif; ?>
                            <?php endif; ?>
                                <p class="slider-cta-type-a"><?php pll_e('Lire plus');?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>

                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>

                </div>


        <?php
        $link = get_field('projet-bouton-a');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a id="avons-accompagnes-cta-mobile" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>

    </div>
</section>

<!-- NOUS LES AVONS ACCOMPAGNES DESKTOP ==============
=========================== -->
<section class="slider-section-type-a avons-accompagnes-section avons-accompagnes-section-desktop">
    <div class="slider-wrapper-type-a  avons-accompagnes-section-wrapper  grid">
        <span class="slider-section-type-a-bg"></span>
        <div class="slider-type-a-header">
            <h2><?php the_field('projets-titre'); ?></h2>

            <?php
            $link = get_field('projet-bouton-b');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a id="avons-accompagnes-cta-tablet" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

            <?php
            $link = get_field('projet-bouton-a');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a id="avons-accompagnes-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
        <div class="swiper-container slider-container-type-a js-projets-swiper-laptop">
            <div class="swiper-wrapper slider-wrapper-type-a ">
                <?php
                $featured_posts = get_field('projets');
                if ($featured_posts) : ?>

                    <?php foreach ($featured_posts as $post) :

                        // Setup this post for WP functions (variable must be named $post).
                        setup_postdata($post); ?>
                        <a href="<?php the_permalink(); ?> " class="swiper-slide swiper-slide-type-a">
                            <div class="slider-pic-wrapper-type-a">
                                <?php
                                $image = get_field('projet-image-hero');
                                if (!empty($image)) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="slider-content-type-a">
                                <h3 class="slider-title-type-a"><?php the_title(); ?></h3>
                                <p class="slider-description-type-a"><?php the_field('projet-description'); ?></p>
                                <p class="slider-cta-type-a"><?php pll_e('Découvrir le projet');?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>

                    <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>
            <!-- Pagination pour mobile -->
            <!-- <div class="swiper-pagination-type-a js-pagination-mobile-projets"></div> -->
            <!-- Pagination pour laptop -->
            <div class="swiper-pagination-numbers-type-a js-pagination-laptop-projets"></div>

            <div class="swiper-buttons-wrapper swiper-buttons-type-a">
                <div class="swiper-button-prev swiper-button-prev-type-a js-button-prev-projets">
                </div>
                <div class="swiper-button-next swiper-button-next-type-a js-button-next-projets"></div>
            </div>

        </div>

        <?php
        $link = get_field('projet-bouton-a');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a id="avons-accompagnes-cta-mobile" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>

    </div>
</section>

<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<?php get_footer(); ?>