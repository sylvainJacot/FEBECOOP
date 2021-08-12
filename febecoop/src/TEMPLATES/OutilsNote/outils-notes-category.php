<?php


$terms  = get_terms(
    'outils_notes_category',
    [
        "hide_empty" => true
    ]
);

?>


<?php foreach ($terms as $term) {;

    $title = $term->name;
    $desc = $term->description;

?>
    <a href="<?php echo get_term_link($term); ?>" class="card-type-a">

        <div class="card-type-a-header">
            <?php
            $field = get_field_object('general-couleur', $term);
            $value = $field['value'];
            $label = $field['choices'][$value]; ?>
            <div class="pentagone-icons-wrapper">

                <?php
                $image = get_field('general-icone', $term);
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <span class="main-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
    </svg></span>
<span class="secondary-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
    </svg></span>

            </div>

            <h3><?php echo $title; ?></h3>

        </div>

        <div class="card-type-a-content">
            <p class="card-type-a-content-txt"><?php echo $desc; ?></p>
            <p class="cta-flex-a"><span><?php pll_e('En savoir plus');?></span></p>
        </div>

    </a>

<?php }; ?>