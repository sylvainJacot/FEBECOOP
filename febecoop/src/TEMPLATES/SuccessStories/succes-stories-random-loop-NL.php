

<?php
$projetsacc = new WP_Query(
    array(
        'post_type' => 'praktijkverhaal',
        'orderby' => 'rand',
        'posts_per_page' => 3,
    )
);?>

<?php while ($projetsacc->have_posts()) : $projetsacc->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>
        <?php endwhile;
        wp_reset_query(); ?>
