<?php

/**
 * 
 * LA DIFFERENCE AVEC LA FLANDRE, C EST QUIL Y A PAS DE PROJETS ACCOMPAGNES EN BAS, AINSI QUE LA BANNER CONTACT QUI CHANGE
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
    <aside class="aside-wysiwyg">
    <h3 class="aside-wysiwyg-title "><?php pll_e("autres domaines d'expertises");?></h3> 
    <ul class="aside-wysiwyg-list-items-wrapper">
    <?php

    $featured_posts = get_field('choix_des_expertises');
    
    if( $featured_posts ): ?>
    <?php $featured_posts_count = count($featured_posts); ?>
    

    <!-- START 1 POST SELECTED -- IF ONLY 1 POST SELECTED -->
    <?php if ($featured_posts_count === 1) : ?>
        <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li class="aside-wysiwyg-list-item">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>
        <?php endforeach; ?>

        <?php 
        $loop2 = new WP_Query(array(
        'post_type' => 'domaines-expertises', 
        'posts_per_page' => 2,
        'post__not_in' => array( get_the_ID())
        )); ?>

        <?php while ($loop2->have_posts()) : $loop2->the_post(); ?>
        <li class="aside-wysiwyg-list-item"> 
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>   
        <?php endwhile; ?>
        <!-- END 1 POST SELECTED -- IF ONLY 1 POST SELECTED -->

        <!-- START 2 POST SELECTED -- IF ONLY 2 POSTS SELECTED -->
        <?php elseif ($featured_posts_count === 2) : ?>

        <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li class="aside-wysiwyg-list-item">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>
        <?php endforeach; ?>

        <?php 
        $loop1 = new WP_Query(array(
        'post_type' => 'domaines-expertises', 
        'posts_per_page' => 1,
        'post__not_in' => array( get_the_ID())
        )); ?>
        <?php while ($loop1->have_posts()) : $loop1->the_post(); ?>
        <li class="aside-wysiwyg-list-item"> 
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>   
        <?php endwhile; ?>
        <!-- END 2 POST SELECTED -- IF ONLY 2 POSTS SELECTED -->
        <!-- START 0 POST SELECTED -- IF ONLY 0 POSTS SELECTED -->
        <?php else : ?>
        <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li class="aside-wysiwyg-list-item">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>

<?php else : ?>

        <?php 
        $loop = new WP_Query(array(
        'post_type' => 'domaines-expertises', 
        'posts_per_page' => 3,
        'post__not_in' => array( get_the_ID())
        )); ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <li class="aside-wysiwyg-list-item"> 
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </li>   
        <?php endwhile;     wp_reset_query(); ?>

    
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
    <?php endif; ?> 
    </ul>   

        <span class="aside-wysiwyg-cta">
        <a class="cta-c" href="<?php echo esc_url(home_url('/')); ?>expertises"><span><?php pll_e('Voir toutes les expertises');?></span></a>
        </span>

    </aside>
    </div>
</section>


<!--AUTRES ACTUALITES ==============
=========================== -->
<section class="other-news-section">
    <div class="slider-wrapper-type-b  other-news-section-wrapper other-news-section-wrapper-mobile grid">
                
                <div class="slider-type-b-header">
                <h3><?php pll_e('Autres actualités');?></h3>
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>actualites" ><span><?php pll_e('Toutes les actualités');?></span></a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">
                    <?php
                    $loop = new WP_Query(
                        array(
                        // 'category__in'   => wp_get_post_categories( $post->ID ),
                        // 'post__not_in' => array(get_the_ID()),
                        'post_type' => 'actualites',
                        'orderby' => 'rand',
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


                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>actualites" ><?php pll_e('Toutes les actualités');?></a>
    </div>
    </div> 
  <div class="slider-wrapper-type-b  other-news-section-wrapper other-news-section-wrapper-laptop grid">
            
            <div class="slider-type-b-header">
            <h3><?php pll_e('Autres actualités');?></h3>
            <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>actualites" ><span><?php pll_e('Toutes les actualités');?></span></a>
            </div>

            <div class="swiper-container slider-container-type-b js-type-b-swiper">
            <div class="swiper-wrapper slider-wrapper-type-b">
                <?php
                $loop = new WP_Query(
                    array(
                        // 'category__in'   => wp_get_post_categories( $post->ID ),
                        // 'post__not_in' => array(get_the_ID()),
                        'post_type' => 'actualites',
                        'orderby' => 'rand',
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



<?php
get_footer();
?>

