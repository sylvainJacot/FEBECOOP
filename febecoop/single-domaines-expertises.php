<?php

/**
 * 
 * 
 * 
 */
get_header();
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-c">
    <div class="hero-section-type-c-wrapper grid">
        <div class="hero-section-type-c-content">
            <?php get_template_part('./src/TEMPLATES/PentagoneShape/pentagone-shape'); ?>
            <div class="hero-section-type-c-content-text">
                <p class="hero-section-type-c-content-toptitle"><?php pll_e('Expertise');?></p>
                <h1><span><?php the_field('general-titre') ?></span></h1>
            </div>
        </div>
        
        <div class="hero-section-type-c-illu"></div>
    </div>
</section>


<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php echo the_field('resume'); ?></p>
    </div>
</div>


<!-- EXPERTISE - CONTENU ==============
=========================== -->
<section class="expertise-contenu-section">
    <div class="expertise-contenu-wrapper grid">
    <div class="expertise-contenu-main generic-content">
    <!-- // START contenu_flexible -->
    <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
    <!-- END contenu_flexible -->
    </div>
    <aside class="expertise-contenu-aside">
    
    <?php 
    $count_posts = wp_count_posts( 'domaines-expertises' )->publish;

    $loop = new WP_Query(array(
    'post_type' => 'domaines-expertises', 
    'posts_per_page' => 7,
    'post__not_in' => array( get_the_ID())
    )); ?>
<ul class="expertise-contenu-aside-liste-links">
    <p class="expertise-contenu-aside-liste-titre">autres domaines d'expertises</p>
<?php while ($loop->have_posts()) : $loop->the_post(); ?>
<li class="expertise-contenu-aside-link"> 
<a class="cta-c" href="<?php the_permalink();?>"><?php the_title();?></a>
</li>   
<?php endwhile; ?>
    </ul>
    <?php if($count_posts > 7) :?>
        <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>expertises">Voir tous les domaines d’expertises</a>
    <?php endif;?>
    </aside>
    </div>
</section>

<!-- SUCCESS STORIES ==============
=========================== -->
<section class="other-news-section">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
                
                <div class="slider-type-b-header">
                <h3>Success stories</h3>
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>success-stories" >Toutes les stories</a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">
                    <?php
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'projet-accompagnes',
                            'orderby' => 'date',
                            'posts_per_page' => -1
                        )
                    );
                    ?>

                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="swiper-slide">
                    <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card');?>
                    </div>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
                <!-- Pagination pour mobile -->
                <div class="swiper-pagination-type-b js-swiper-pagination-type-b "></div>

                <!-- Buttons pour laptop -->
                <div class="swiper-buttons-wrapper swiper-buttons-type-b">
                    <div class="swiper-button-prev swiper-button-prev-type-a js-button-prev-actus">
                    </div>
                    <div class="swiper-button-next swiper-button-next-type-a js-button-next-actus"></div>
                    </div>
                </div>
                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>actualites" >Toutes les actualités</a>
    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>


<?php
get_footer();
?>

