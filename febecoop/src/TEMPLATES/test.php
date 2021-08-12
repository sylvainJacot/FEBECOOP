<?php
$args = wp_parse_args(
    $args,
    array(
        'my_data' => array(
            'label' => 'xyz', // default value
        )
    )
);
?>

<p class="cta-a"><?php echo pll_e($args['my_data']['label']); ?></p>

<!-- <?php echo esc_html( $args['my_data']['var_one'] ); ?> -->
