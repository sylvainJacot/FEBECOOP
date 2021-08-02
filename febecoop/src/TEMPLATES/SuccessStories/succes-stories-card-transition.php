<a style="opacity: 0; transition: opacity 1s;" href="<?php the_permalink(); ?>" class="card-type-b-item">
<div class="card-type-b-pic-wrapper">
    <?php
    $image = get_field('projet-image-hero');
    if (!empty($image)) : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    <?php endif; ?>
</div>
    <div class="card-type-b-content">
        <p class="card-type-b-chapeau"><?php the_title() ?></p>
        <p class="cta-c"><span><?php pll_e('Lire plus');?></span></p>
    </div>
</a>



