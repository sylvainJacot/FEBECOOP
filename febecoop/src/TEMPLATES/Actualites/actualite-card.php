<a href="<?php the_permalink(); ?>" class="swiper-slide  card-type-b-item card-type-b-item-row-actu">
    <div class="card-type-b-pic-wrapper">
        <?php
        $image = get_field('actu-hero-image');
        if (!empty($image)) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
    <div class="card-type-b-content">
        <p class="card-type-b-date"><?php echo get_the_date('d/m/Y'); ?></p>
        <p class="card-type-b-chapeau"><?php the_title(); ?></p>
        <p class="cta-c"><span><?php pll_e('Lire plus');?></span></p>
    </div>
</a>