<?php
$date = get_field('ev_date');


if($date) :
$count_ev++; ?>
<a class="card-type-c-item" href="<?php the_permalink(); ?>">
    <div class="card-type-c-item-pic-wrapper">
        <?php 
        $image = get_field('ev-image');
        if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
    <div class="card-type-c-item-content">
        <p class="card-type-c-item-date">
            <?php the_field('ev_date');?>
        </p>

        <h2 class="card-type-c-titre">
            <?php the_title();?>
        </h2>
        <p class="cta-c"><span><?php pll_e('En savoir plus');?></span></p>

    </div>
</a> 
<?php
$new_count = $count_ev;

endif;?>