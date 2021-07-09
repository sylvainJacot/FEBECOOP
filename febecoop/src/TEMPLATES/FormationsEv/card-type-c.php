<?php
$one_day= get_field('one-day');
$multi_days= get_field('several-days');

$one_date = get_field('ev-date');
$start_date = get_field('ev-date-start');
$end_date = get_field('ev-date-end');


if($one_day || $multi_days) :?>
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
            <?php
            if($one_day) {
                echo $one_date ;
            } elseif ($multi_days) {
                echo "du $start_date au $end_date";
            }
            
            ?>

        </p>

        <h2 class="card-type-c-titre">
            <?php the_title();?>
        </h2>
        <p class="cta-c"><?php pll_e('En savoir plus');?></p>

    </div>
</a> 
<?php endif;?>