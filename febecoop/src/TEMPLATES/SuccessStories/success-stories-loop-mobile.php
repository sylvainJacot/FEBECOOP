<div class="slider-type-b-header">
    <h3><?php pll_e('Projets accompagnés'); ?></h3>
    <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>success-stories"><?php pll_e('Tous les projets accompagnés'); ?></a>
</div>

<div class="swiper-container slider-container-type-b js-type-b-swiper other-news-succes-stories-mobile">
    <div class="swiper-wrapper slider-wrapper-type-b">


<?php
$field = get_field_object('page_type');
$value = $field['value'];
$label = $field['choices'][$value];
?>

<!-- LOOPS POUR LES 3 CATEGORIES -->
<!-- ============================
        ======================================================== -->
        <?php
$loopDemarrer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('demarrer')
            )
        )
    )
);

$loopDevelopper = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('developper')
            )
        )
    )
);

$loopTransformer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('transformer')
            )
        )
    )
);

//     LOOP POUR TOUT
//    ============================
//     ======================================================== 
$loopAll1Demarrer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('demarrer'),
                'operator' => 'NOT IN',
            )
        )
    )
);
$loopAll2Demarrer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 2,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('demarrer'),
                'operator' => 'NOT IN',
            )
        )
        
    )
);
$loopAll3Demarrer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('demarrer'),
                'operator' => 'NOT IN',
            )
        )
    )
);

$loopAll1Developper = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('developper'),
                'operator' => 'NOT IN',
            )
        )
    )
);
$loopAll2Developper = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 2,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('developper'),
                'operator' => 'NOT IN',
            )
        )
        
    )
);
$loopAll3Developper = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('developper'),
                'operator' => 'NOT IN',
            )
        )
    )
);

$loopAll1Transformer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 1,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('transformer'),
                'operator' => 'NOT IN',
            )
        )
    )
);
$loopAll2Transformer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 2,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('transformer'),
                'operator' => 'NOT IN',
            )
        )
        
    )
);
$loopAll3Transformer = new WP_Query(
    array(
        'post_type' => 'projet-accompagnes',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'tax_query' => array(
            array(
                'taxonomy' => 'projet_accompagne_cat',
                'field'    => 'slug',
                'terms'    => array('transformer'),
                'operator' => 'NOT IN',
            )
        )
    )
);



// <!-- ON REGARDE COMBIEN Y A DE POSTS DANS LES CATEGORIES -->
// <!-- ============================ -->
$postCountDemarrer = $loopDemarrer->post_count;
$postCountDevelopper = $loopDevelopper->post_count;
$postCountTransformer = $loopTransformer->post_count;
?>

    <!-- ON CHECK SI CEST BIEN DEMARRER ET ON CHECK LE NOMBRE DE POSTS -->
    <!-- ============================ -->

    <!-- SI 0 POSTS -->
    <?php if ($label === 'Démarrer' && $postCountDemarrer === 0) : ?>

        <?php while ($loopAll3Demarrer->have_posts()) : $loopAll3Demarrer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
    <?php endif; ?>

    <!-- SI 1 POST -->
    <?php if ($label === 'Démarrer' && $postCountDemarrer === 1) : ?>

        <?php while ($loopDemarrer->have_posts()) : $loopDemarrer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php while ($loopAll2Demarrer->have_posts()) : $loopAll2Demarrer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- SI 2 POSTS -->
    <?php if ($label === 'Démarrer' && $postCountDemarrer === 2) : ?>

        <?php while ($loopDemarrer->have_posts()) : $loopDemarrer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php while ($loopAll1Demarrer->have_posts()) : $loopAll1Demarrer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- SI 3 POSTS -->
    <?php if ($label === 'Démarrer' && $postCountDemarrer === 3) : ?>

        <?php while ($loopDemarrer->have_posts()) : $loopDemarrer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- ON CHECK SI CEST BIEN DEVELOPER ET ON CHECK LE NOMBRE DE POSTS -->
    <!-- ============================ -->

    <!-- SI 0 POSTS -->
    <?php if ($label === 'Développer' && $postCountDevelopper === 0) : ?>

        <?php while ($loopAll3Developper->have_posts()) : $loopAll3Developper->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
    <?php endif; ?>

    <!-- SI 1 POST -->
    <?php if ($label === 'Développer' && $postCountDevelopper === 1) : ?>

        <?php while ($loopDevelopper->have_posts()) : $loopDevelopper->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php while ($loopAll2Developper->have_posts()) : $loopAll2Developper->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- SI 2 POSTS -->
    <?php if ($label === 'Développer' && $postCountDevelopper === 2) : ?>

        <?php while ($loopDevelopper->have_posts()) : $loopDevelopper->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php while ($loopAll1Developper->have_posts()) : $loopAll1Developper->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- SI 3 POSTS -->
    <?php if ($label === 'Développer' && $postCountDevelopper === 3) : ?>

        <?php while ($loopDevelopper->have_posts()) : $loopDevelopper->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- ON CHECK SI CEST BIEN TRANSFORMER ET ON CHECK LE NOMBRE DE POSTS -->
    <!-- ============================ -->

    <!-- SI 0 POSTS -->
    <?php if ($label === 'Transformer' && $postCountTransformer === 0) : ?>

        <?php while ($loopAll3Transformer->have_posts()) : $loopAll3Transformer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
    <?php endif; ?>

    <!-- SI 1 POST -->
    <?php if ($label === 'Transformer' && $postCountTransformer === 1) : ?>

        <?php while ($loopTransformer->have_posts()) : $loopTransformer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php while ($loopAll2Transformer->have_posts()) : $loopAll2Transformer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- SI 2 POSTS -->
    <?php if ($label === 'Transformer' && $postCountTransformer === 2) : ?>

        <?php while ($loopTransformer->have_posts()) : $loopTransformer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
        <?php while ($loopAll1Transformer->have_posts()) : $loopAll1Transformer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>

    <!-- SI 3 POSTS -->
    <?php if ($label === 'Transformer' && $postCountTransformer === 3) : ?>

        <?php while ($loopTransformer->have_posts()) : $loopTransformer->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>

    <?php endif; ?>
    </div>

    <!-- Pagination pour mobile -->
    <div class="swiper-pagination-type-b js-swiper-pagination-type-b "></div>

    <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>actualites"><?php pll_e('Tous les projets accompagnés'); ?></a>


</div>