<?php

/**
 * Template Name: Success stories
 * 
 * 
 */
get_header();
$pa_terms = get_terms('projet_accompagne_cat');
// print_r($pa_terms);
?>
<section class="hero-section-type-b fiche-outils-hero-section" id="projets-accompagnes-hero-section">
    <picture class="hero-section-type-waves-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-mobile.svg" alt="example" />
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
                <p class="hero-section-type-b-content-toptitle"><?php pll_e('Sur le terrain'); ?></p>
                <h1><span>
                        <?php if (get_field('titre_hero')) :
                            $maintitle = get_field('titre_hero');
                            $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                            echo $openmainttitle;
                        else : the_title();
                        endif; ?>
                    </span></h1>
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

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero'); ?></p>
        <?php if (get_field('ajout_de_petit_texte_a_lintroduction_')) : ?>
            <p class="hero-section-type-b-petite-intro"><?php the_field('texte_supplementaire_introduction'); ?></p>
        <?php endif; ?>
    </div>
</div>



<!--PROJETS ACCOMPAGNES ==============
=========================== -->
<section class="projets-accompagnes-section">
    <div class="projets-accompagnes-section-wrapper grid" id="js-projets-accompagnes-section-wrapper">

        <div class="filtres-type-a-container projets-accompagnes-section-filtres js-filtres-type-a-container">
            <p class="filtres-type-a-title"><?php pll_e('Filtrer par'); ?></p>
            <ul class="filtres-types-a-filtres-container ajax-filtres-types-a-filtres-container">
                <?php foreach ($pa_terms as $patag) : ?>
                    <?php $term_link = get_term_link($patag); ?>
                    <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>" class="filtres-types-a-filtre-link"><?php echo $patag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <main class="card-type-b-container card-projet-accompagnes-container card-projet-accompagnes-container-fadeIn" id="js-card-type-b-container">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args =
                array(
                    'post_type' => 'projet-accompagnes',
                    'status' => 'published',
                    'orderby'    => 'post_date',
                    'order'         => 'DESC',
                    'paged' => $paged
                );
            $loopProjetsAcc = new WP_Query($args);
            ?>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
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
                            <p class="cta-c"><?php pll_e('Lire plus'); ?></p>
                        </div>
                    </a>

                <?php endwhile; ?>


            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

            <?php
            next_posts_link(('<span class="cta-a" id="loadmore-projetsacc">Voir plus</span>'), $loopProjetsAcc->max_num_pages);
            ?>

        </main>



    </div>


</section>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<!-- LOAD MORE -->
<script>
    $('#js-projets-accompagnes-section-wrapper').on('click', '#loadmore-projetsacc', function(e) {

        e.preventDefault();
        console.log('click');

        $(this).parent().fadeOut();

        var next_actu_page = $(this).parent().attr('href');
        // alert(next_actu_page);

        $('#js-projets-accompagnes-section-wrapper').append(
            $('<main />').addClass('card-type-b-container card-projet-accompagnes-container-fadeIn').load(next_actu_page + ' .card-type-b-container a')
        );

    });
</script>

<!-- FILTRES -->
<script>
    $('.filtres-types-a-filtre-link').click(function(e) {

        e.preventDefault(); // annule effet ou autre sur le clic

        $('.card-type-b-container').fadeOut(); // vire les anciens item 

        var next_actucat_page = $(this).attr('href');
        alert(next_actucat_page);

        $('.filtres-types-a-filtre-link').each(function() {
            $(this).removeClass('active');
        })
        $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau

        $('#js-projets-accompagnes-section-wrapper').append(
            $('<main />').addClass('card-type-b-container card-projet-accompagnes-container-fadeIn').load(next_actucat_page + ' .card-type-b-container a')
        );

    });
</script>


<?php
get_footer();
?>