<?php

/**
 * Template Name: Success stories
 * 
 * 
 */
get_header();
$pa_terms = get_terms('projet_accompagne_cat');
// print_r($pa_terms);
global $wp_query;
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
                <p class="hero-section-type-b-content-toptitle"><?php pll_e('Sur le terrain');?></p>
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
    </div>
</div>



<!--PROJETS ACCOMPAGNES ==============
=========================== -->
<section class="projets-accompagnes-section">
    <div class="projets-accompagnes-section-wrapper grid">

        <div class="filtres-type-a-container projets-accompagnes-section-filtres js-filtres-type-a-container">
            <p class="filtres-type-a-title">Filtrer par</p>
            <ul class="filtres-types-a-filtres-container ajax-filtres-types-a-filtres-container">
                <?php foreach ($pa_terms as $tag) : ?>
                    <?php $term_link = get_term_link($tag); ?>
                    <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>"><?php echo $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <main class="card-type-b-container card-projet-accompagnes-container" id="card-projet-accompagnes-container">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args =
                array(
                    'post_type' => 'projet-accompagnes',
                    'posts_per_page' => 6,
                    'paged' => 1
                );
            $the_query = new WP_Query($args);
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
                            <p class="cta-c"><?php pll_e('Lire plus');?></p>
                        </div>
                    </a>

                <?php endwhile; ?>

                <a class="cta-a projet_accompagnes_loadmore"><?php pll_e('Voir plus');?></a>


            <?php endif; ?>

        </main>



    </div>


</section>




<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>




<script>
    $('.ajax-filtres-types-a-filtres-container li a').click(function(e) {

        e.preventDefault(); // annule effet ou autre sur le clic

        $('#card-projet-accompagnes-container .card-type-b-item').fadeOut(); // vire les anciens item 

        var next_page = $(this).attr('href'); // recuperer lien de la page a afficher
        // alert(next_page)

        $('.ajax-filtres-types-a-filtres-container li a').each(function() {
            $(this).removeClass('active');
        })
        $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau

        $('.projets-accompagnes-section-wrapper').append(
            $('#card-projet-accompagnes-container').load(next_page + '#card-projet-accompagnes-container .card-type-b-item') // charge la partie article de la page ciblée par le href, et les affiche dans le article de la page en cours
        );

        setTimeout(function() {
            $('#card-projet-accompagnes-container .card-type-b-item').css('opacity', '1'); // effet etc a appliquer apres le chargement 
        }, 500);

    });
</script>



<?php
get_footer();
?>