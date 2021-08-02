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
        <?php if (get_field('projet-description')) : ?>
                    <p class="card-type-b-resume"><?php the_field('projet-description') ?></p>
                <?php else : ?>

                    <?php if (have_rows('contenu-flexible')) : while (have_rows('contenu-flexible')) : the_row(); ?>
                            <?php if (get_row_layout() == 'introduction-principale') :

                                $txt = get_sub_field('introduction');
                            ?>
                                <p class="card-type-b-resume"><?php echo $txt; ?></p>

                            <?php endif; ?>
                    <?php endwhile;
                    endif; ?>
                <?php endif; ?>
        <p class="cta-c"><span><?php pll_e('Lire plus');?></span></p>
    </div>
</a>