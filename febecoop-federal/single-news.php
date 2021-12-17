<?php
/**
 * 
 * PAR RAPPORT A LA FLANDRE? SEULS LES LIENS POUR LES AUTRES ACTUALITES CHANGENT
 * 
 */
 get_header();
 $post_type_obj = get_post_type_object( 'news' );
$post_type = $post_type_obj->labels->singular_name; 
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-e">
    <div class="hero-section-type-e-wrapper grid">
        <div class="hero-section-type-e-content">
            <div class="hero-section-type-e-content-text">
                <div class="hero-section-type-e-content-toptitle-wrapper">
                <p class="hero-section-type-e-content-toptitle"><?php pll_e('Actualités');?> <span class="hero-section-type-e-content-date"><?php echo get_the_date('d/m/Y'); ?></span></p>
                <p class="hero-section-type-e-content-date"><?php the_date('Y-m-d');?></p>
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
$image = get_field('actu-hero-image');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
    </div>
</div>


<!--MAIN flexible ==============
=========================== -->
<main class="main-actualite-content grid">
    <div class="section-actualite-content generic-content">
        <!-- // START contenu_flexible -->
    <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>

        <!-- END contenu_flexible -->
    </div>

    <!-- SHARE ASIDE ==============
    =========================== -->
    <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a'); ?>

</main>



<!--AUTRES ACTUALITES ==============
=========================== -->
<section class="other-news-section">
    <div class="slider-wrapper-type-b  other-news-section-wrapper other-news-section-wrapper-mobile grid">
                
                <div class="slider-type-b-header">
                <h3><?php pll_e('Autres actualités');?></h3>
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>news" ><span><?php pll_e('Toutes les actualités');?></span></a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">
                    <?php
                    $loop = new WP_Query(
                        array(
                            'category__in'   => wp_get_post_categories( $post->ID ),
                            'post__not_in' => array(get_the_ID()),
                            'post_type' => 'news',
                            'orderby' => 'date',
                            'posts_per_page' => 3
                        )
                    );
                    ?>

                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="swiper-slide swiper-slide-type-b">
                    <?php get_template_part('./src/TEMPLATES/Actualites/actualite-card');?>
                    </div>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
                <!-- Pagination pour mobile -->
                <div class="swiper-pagination-type-b js-swiper-pagination-type-b"></div>


                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>news" ><?php pll_e('Toutes les actualités');?></a>
    </div>
    </div> 
  <div class="slider-wrapper-type-b  other-news-section-wrapper other-news-section-wrapper-laptop grid">
            
            <div class="slider-type-b-header">
            <h3><?php pll_e('Autres actualités');?></h3>
            <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>news" ><span><?php pll_e('Toutes les actualités');?></span></a>
            </div>

            <div class="swiper-container slider-container-type-b js-type-b-swiper">
            <div class="swiper-wrapper slider-wrapper-type-b">
                <?php
                $loop = new WP_Query(
                    array(
                        'category__in'   => wp_get_post_categories( $post->ID ),
                        'post__not_in' => array(get_the_ID()),
                        'post_type' => 'news',
                        'orderby' => 'date',
                        'posts_per_page' => 3
                    )
                );
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="swiper-slide swiper-slide-type-b">
                <?php get_template_part('./src/TEMPLATES/Actualites/actualite-card');?>
                </div>

                <?php endwhile;
                wp_reset_query(); ?>
            </div>

</div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>



<!-- YOUTUBE SCRIPT ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/FlexibleContent/bottom-video-script"); ?>

<?php
get_footer();
?>