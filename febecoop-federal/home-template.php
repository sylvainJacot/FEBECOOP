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
<div class="overflow-x" style="overflow: hidden;">
<?php get_template_part("./src/TEMPLATES/Hero-Federal/hero-type-a-federal"); ?>

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
                    <a class="cta-d" id="last-news-cta" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span></a>
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
</div>

<!-- EXPERTISE ==============
=========================== -->
<section class="expertise-section expertise-section-federal">
    <div class="expertise-section-illu">

    </div>
    <div class="expertise-section-wrapper grid">
        <div class="expertise-section-content">
            <h2><?php the_field('exp-titre'); ?></h2>
            <h3><?php the_field('exp-sous-titre'); ?></h3>
            <p><?php the_field('exp-paragraphe'); ?></p>
        </div>

        <?php $link = get_field('publication-bouton');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>

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

                <p class="cta-c"><span><?php echo esc_html($link_title); ?></span></p>
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


<!-- NOS PRISES DE POSITIONS ==============
=========================== -->
<section class="nos-prises-positions-section">
    <div class="nos-prises-positions-section-wrapper grid">
        <?php 
        $featured_posts = get_field('choisir_prise_de_position');
        if( $featured_posts ): ?>

        <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
                <div class="nos-prises-positions-pic-wrapper">
                <?php 
                $image = get_field('actu-hero-image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
        <div class="nos-prises-positions-content">
            <h3 class="nos-prises-positions-content-top-titre">
                <?php pll_e('Nos prises de position');?>
            </h3>

            <h2 class="nos-prises-positions-content-titre">
                <?php the_title();?>
            </h2>

            <p class="nos-prises-positions-content-texte">
            <?php 

            if (get_field('resume_pour_la_home_page')) : ?>

            <?php echo the_field('resume_pour_la_home_page');?>

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
            </p>

            <a class="cta-a" href="<?php the_permalink(); ?>"><?php pll_e('En savoir plus');?></a>

        </div>
    <?php endforeach; ?>

    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>

        <!-- <a class="cta-d" id="prise-pos-fede-cta"><span><?php pll_e('Toutes les prises de positions');?></span></a> -->
                <?php 
        $link = get_field('bouton_prises_de_positions');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="cta-d" id="prise-pos-fede-cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
        <?php endif; ?>
    </div>
</section>

<!-- FEBECOOP TERRITOIRE BELGE ==============
=========================== -->
<section class="febe-territoire-belge-section">
    <div class="febe-territoire-belge-section-wrapper grid">
            <div class="febe-territoire-belge-pic-wrapper">
            <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/HOME/VECTOR/home-territoire-illu.svg" alt="illustration febecoop sur le territoire belge"/>
            </div>
            <h2><?php the_field('territ-titre');?></h2>
            <div class="febe-territoire-belge-territoires-container">
                <div class="febe-territoire-belge-territoire">
                        <h3><?php the_field('titre_pour_la_flandre');?></h3>
                        <p><?php the_field('texte_pour_la_flandre');?></p>
                        <a class="cta-b" href="https://dev.atelierdesign.be/FEBECOOP-MULTI/febecoop-flandre"><?php pll_e('Aller sur le site');?></a>
                </div>
                <div class="febe-territoire-belge-territoire">
                        <h3><?php the_field('titre_pour_la_wallonie');?></h3>
                        <p><?php the_field('texte_pour_la_wallonie');?></p>
                        <a class="cta-b" href="https://dev.atelierdesign.be/FEBECOOP-MULTI/febecoop-wallonie-bruxelles"><?php pll_e('Aller sur le site');?></a>
                </div>
            </div>
    </div>
</section>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<?php get_footer(); ?>