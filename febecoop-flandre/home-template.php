<?php

/**
 * Template Name: Home
 * 
 * 
 */
get_header();
?>

<!-- HERO SECTION ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/Hero-Flandre/hero-type-a-flandre"); ?>

<!-- DERNIERES ACTUALITES ==============
=========================== -->
<span class="anchor" id="intro-section"></span>
<section class="last-news-section last-news-section-flandre">
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
                    <a class="cta-d" id="last-news-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>

            <div class="home-last-news-cards-container">

                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'actualites',
                        'orderby' => 'date',
                        'posts_per_page' => 3
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                <?php get_template_part('./src/TEMPLATES/Actualites/actualite-card');?>

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
    </div>
</section>


<!-- EXPERTISE ==============
=========================== -->
<section class="expertise-section expertise-section-flandre">
    <div class="expertise-section-illu">

    </div>
    <div class="expertise-section-wrapper grid">
        <div class="expertise-section-content">
            <h2><?php the_field('exp-titre'); ?></h2>
            <h3><?php the_field('exp-sous-titre'); ?></h3>
            <p><?php the_field('exp-paragraphe'); ?></p>
        </div>

        <a class="publication-item-container" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" >
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
            <?php $link = get_field('publication-bouton');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <p class="cta-c"><?php echo esc_html($link_title); ?></p>
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

</div></section>


<!-- ACCOMPAGNEMENT & CONSEILS ==============
=========================== -->
<section class="home-accompagnement-conseils-section home-accompagnement-conseils-section-flandre">
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




<!-- DERNIERES SUCCESS STORIES ==============
=========================== -->
<section class="last-news-section last-success-stories-section-flandre">
    <div class="last-news-section-wrapper grid">
        <div class="last-news-section-container">
            <div class="lns-header">
                <p><?php the_field('last-success-titre'); ?></p>
                <?php $link = get_field('last-success-bouton');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="cta-d" id="last-news-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>

            <div class="home-last-news-cards-container">

                <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'projet-accompagnes',
                        'orderby' => 'date',
                        'posts_per_page' => 2
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                <?php get_template_part('./src/TEMPLATES/SuccessStories-Flandre/success-stories-card-flandre');?>

                <?php endwhile;
                wp_reset_query(); ?>


            </div>
            <?php $link = get_field('last-success-bouton');
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
            <a class="nos-formations-card" href="<?php echo esc_url(home_url('/')); ?>formations-rencontres">

                <?php get_template_part('./src/TEMPLATES/PentagoneShape/pentagone-shape'); ?>

                <div class="nos-formations-card-content">
                <p class="nos-formations-card-content-text"><?php the_field('formations-text'); ?></p>

                <p class="cta-c"><?php pll_e('Toutes les formations');?></p>

                </div>
            </a>
        </div>
    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<?php get_footer(); ?>