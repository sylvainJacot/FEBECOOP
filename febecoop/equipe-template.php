<?php

/**
 * Template Name: Equipe
 * 
 * 
 */
get_header();
?>


<!-- HERO SECTION ==============
=========================== -->
<div class="overflow-x" style="overflow-x: hidden;">
<section class="hero-section-type-b fiche-outils-hero-section" id="equipe-hero-section">
    <picture class="hero-section-type-waves-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-mobile.svg" alt="example" />
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
                <p class="hero-section-type-b-content-toptitle"><?php pll_e('À propos'); ?></p>
                <h1><span>
                        <?php if (get_field('titre_hero')) :
                            $maintitle = get_field('titre_hero');
                            $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                            echo $openmainttitle;
                        else : the_title();
                        endif; ?>
                    </span> </h1>

            </div>
            <div class="hero-section-pic-wrapper">
                <?php
                $image = get_field('illustration_hero');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            </a>
        </div>
    </div>
</section>
</div>


<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero'); ?></p>
    </div>
</div>


<!-- MAIN TEAM MEMBERS  ==============
=========================== -->
<section class="team-members-section">

    <?php
    // Get all the categories
    $terms = get_terms('groupe_equipe');

    $members = new WP_Query(
        array(
            'post_type' => ' team-members',
            'showposts' => -1,
        )
    );

    ?>

    <?php if (get_field('afficher_les_membres_de_lequipe_par_groupe')) {

        // Loop through all the returned terms
        foreach ($terms as $term) :

            // set up a new query for each category, pulling in related posts.
            $membersGroupes = new WP_Query(
                array(
                    'post_type' => ' team-members',
                    'showposts' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'groupe_equipe',
                            'terms'     => array($term->slug),
                            'field'     => 'slug'
                        )
                    )
                )
            );
    ?>

            <div class="team-members-row-item">
                <div class="team-members-row-item-container grid">
                    <p class="team-members-row-item-title"><?php echo $term->name; ?></p>

                    <div class="team-members-row-item-wrapper">
                        <?php while ($membersGroupes->have_posts()) : $membersGroupes->the_post(); ?>

                            <?php get_template_part( './src/TEMPLATES/TeamMember/teamMember-item' );?>

                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php
            // Reset things, for good measure
            $membersGroupes = null;
            wp_reset_postdata();

        // end the loop
        endforeach; ?>

    <?php } else { ?>


        <div class="team-members-row-item">
            <div class="team-members-row-item-container grid">

                <div class="team-members-row-item-wrapper">
                    <?php while ($members->have_posts()) : $members->the_post(); ?>
                    <?php get_template_part( './src/TEMPLATES/TeamMember/teamMember-item' );?>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php
        // Reset things, for good measure
        $members = null;
        wp_reset_postdata(); ?>


    <?php } ?>

</section>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>

<?php
get_footer();
?>