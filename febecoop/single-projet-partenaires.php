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
<section class="hero-section-type-e">
    <div class="hero-section-type-e-wrapper grid">
        <div class="hero-section-type-e-content">
            <div class="hero-section-type-e-content-text">
                <div class="hero-section-type-e-content-toptitle-wrapper">
                <p class="hero-section-type-e-content-toptitle"><?php echo pll_e('Projet partenaire');?></p>
                </div>
                <h1><span><?php echo the_title(); ?></h1></span>
            </div>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-e-introduction-wrapper">
    <div class="hero-section-type-e-intro-content">
    <?php 
$image = get_field('projet-image-hero');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
    </div>
</div>


<!--MAIN flexible ==============
=========================== -->
<main class="main-projet-accompagne-content main-projet-partenaire-content  grid">
    <div class="section-projet-accompagne-content generic-content">
        <!-- // START contenu_flexible -->
        <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
        <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a');  ?>
        <!-- END contenu_flexible -->


            <!-- SHARE ASIDE ==============
=========================== -->
<!-- <?php get_template_part( './src/TEMPLATES/ShareSection/share-section-a');?>  -->
    </div>

</main>

<!-- AUTRES PROJETS PARTENAIRES ==============
=========================== -->
<section class="other-news-section">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
                
                <div class="slider-type-b-header">
                <h3><?php pll_e('Autres projets partenaires');?></h3> 
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>projets-partenaires" ><?php pll_e('Tous les projets partenaires');?></a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">

                 <?php
                $loop = new WP_Query(
                    array(
                        'post_type' => 'projet-partenaires',
                        'orderby' => 'rand',
                        'post__not_in'  => array(get_the_ID()),
                        'posts_per_page' => 3
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                <div class="swiper-slide">
                <a href="<?php the_permalink(); ?>" class="card-type-b-item">
                <div class="card-type-b-pic-wrapper">
                    <?php
                    $image = get_field('projet-image-hero');
                    if (!empty($image)) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                    <div class="card-type-b-content">
                        <p class="card-type-b-chapeau"><?php the_title() ?></p>
                        <?php if(get_field('projet-part-resume')) :?>
                        <p class="card-type-b-resume"><?php the_field('projet-part-resume') ?></p>
                        <?php else :?>

                        <?php if (have_rows('contenu-flexible')) : while (have_rows('contenu-flexible')) : the_row(); ?>   
                        <?php if(get_row_layout() == 'introduction-principale') : 

                        $txt = get_sub_field('introduction');
                        ?>
                        <p class="card-type-b-resume"><?php echo $txt;?></p>

                        <?php endif;?>
                        <?php endwhile;
                        endif; ?>
                        <?php endif;?>
                        <p class="cta-c"><?php pll_e('Lire plus');?></p>
                    </div>
                </a>
                </div>

                <?php endwhile;
                wp_reset_query(); ?>
                </div>
                <!-- Pagination pour mobile -->
                <div class="swiper-pagination-type-b js-swiper-pagination-type-b "></div>

                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>projets-partenaires" ><?php pll_e('Tous les projets partenaires');?></a>
    </div>
</section>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>


<?php
get_footer();
?>