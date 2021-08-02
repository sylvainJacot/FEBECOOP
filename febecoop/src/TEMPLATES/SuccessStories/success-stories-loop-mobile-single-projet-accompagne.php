<div class="slider-type-b-header">
    <h3><?php pll_e('Projets accompagnés'); ?></h3>
    <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes"><span><?php pll_e('Tous les projets accompagnés'); ?></span></a>
</div>

<div class="swiper-container slider-container-type-b js-type-b-swiper other-news-succes-stories-mobile">
    <div class="swiper-wrapper slider-wrapper-type-b">


<?php
$field = get_field_object('page_type');
$value = $field['value'];
$label = $field['choices'][$value];
?>


<?php
$projetsacc = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'post__not_in' => array(get_the_ID()),
        'post_type' => 'projet-accompagnes',
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

    </div>

    <!-- Pagination pour mobile -->
    <div class="swiper-pagination-type-b js-swiper-pagination-type-b"></div>

    <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>actualites"><?php pll_e('Tous les projets accompagnés'); ?></a>


</div>