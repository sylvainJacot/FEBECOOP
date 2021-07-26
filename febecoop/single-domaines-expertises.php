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
        <?php if (get_field('ajout_de_petit_texte_a_lintroduction_')) :?>
        <p class="hero-section-type-b-petite-intro"><?php the_field('texte_supplementaire_introduction');?></p>
        <?php endif;?>
    </div>
</div>


<!-- EXPERTISE - CONTENU ==============
=========================== -->
<section class="expertise-contenu-section">
    <div class="expertise-contenu-wrapper grid">
    <div class="expertise-contenu-main generic-content">
    <!-- // START contenu_flexible -->
    <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
    <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a');  ?>
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
    <p class="expertise-contenu-aside-liste-titre"><?php pll_e("autres domaines d'expertises");?></p> 
<?php while ($loop->have_posts()) : $loop->the_post(); ?>
<li class="expertise-contenu-aside-link"> 
<a class="cta-c" href="<?php the_permalink();?>"><?php the_title();?></a>
</li>   
<?php endwhile; ?>
    </ul>
    <?php if($count_posts > 7) :?>
        <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>expertises"><?php pll_e('Voir tous les domaines d’expertises');?></a>
    <?php endif;?>
    </aside>
    </div>
</section>

<!-- SUCCESS STORIES ==============
=========================== -->
<section class="other-news-section">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
                
                <div class="slider-type-b-header">
                <h3><?php pll_e('Projets accompagnés');?></h3> 
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes" ><?php pll_e('Tous les projets accompagnés');?></a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">
                    <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-loop-single-expertise');?>
                </div>
                <!-- Pagination pour mobile -->
                <div class="swiper-pagination-type-b js-swiper-pagination-type-b "></div>

                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes" ><?php pll_e('Tous les projets accompagnés');?></a>
    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>


<?php
get_footer();
?>

