<?php

/**
 *
 * 
 * 
 */
get_header();
?>
<!-- ICI CEST LA PAGE DES RESULTATS -->
<?php

// <!-- get the current taxonomy term -->
$term = get_queried_object();
$title = $term->name;

$terms_tags  = get_terms(
    'tags_vragen',
    [
        "hide_empty" => true
    ]
);

// print_r($terms_tags);

?>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-c fiche-outils-hero-section">
    <div class="hero-section-type-c-wrapper grid">
        <div class="hero-section-type-c-content">
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
            <div class="hero-section-type-c-content-text">
                <p class="hero-section-type-c-content-toptitle"><?php pll_e('Notes pratiques & outils');?></p>
                <h1><span><?php echo $title; ?></span></h1>
            </div>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php echo the_field('description_complete', $term); ?></p>
    </div>
</div>



<!-- LOOP NOTES PRATIQUES & OUTILS + FILTERS ==============
=========================== -->
<section class="notes-pratiques-outils-loop-section">
    <div class="notes-pratiques-outils-loop-wrapper grid">

        <aside class="filters-npo-questions-wrapper">
        <p class="filter-npoq-header"><?php pll_e('Filtrer par');?> :</p>
        <div class="filter-npoq-container">
            <?php echo get_the_term_list( $post->ID, 'tags_vragen' ) ?>
        </div>
        </aside>



        <div class="npo-items-wrapper">
            <div class="npo-items-container" id="articles">
            <!-- // LOOP NOTES PRATIQUES & OUTILS -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <a  style="opacity: 0; transition: opacity 1s;" href="<?php echo the_permalink() ?>" class="npo-item">
                        <p><?php the_title(); ?></p>
                        <span class="button-arrow"></span>
                    </a>

                <?php endwhile;
            else : ?>
                <span class="generic-content"><p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p></span>
            <?php endif; ?>
            <a style="opacity: 0; transition: opacity 1s;"  href="<?php echo esc_url(home_url('/')); ?>cooperatief_werken" class="cta-a"><?php pll_e('Tous les outils et notes pratiques');?></a>
            </div>
        </div>
    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<section class="contact-banner-section">
    <div class="contact-banner-section-deco-lines"></div>
    <picture class="contact-banner-illu-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/illu-contact-banner.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/illu-contact-banner-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/illu-contact-banner.svg" alt="example" />
    </picture>
    <div class="contact-banner-section-wrapper">

        <div class="contact-banner-content-wrapper grid">
            <div class="contact-banner-content-text">
                <h2><?php the_field('ban-cont-titre', $term); ?></h2>
                <p><?php the_field('ban-cont-texte', $term); ?></p>
            </div>
            <?php
            $link = get_field('ban-cont-bouton', $term);
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a class="cta-a" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php
get_footer();
?>