<?php
/**
 * Template Name: Formations rencontres
 * 
 * 
 */
 get_header();
?>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-b" id="formations-hero-section">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/FORMATIONRENCONTRES/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/FORMATIONRENCONTRES/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/FORMATIONRENCONTRES/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/FORMATIONRENCONTRES/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
            <h1><span>
                <?php if ( get_field('titre_hero') ) : 
                    $maintitle = get_field('titre_hero'); 
                    $openmainttitle = str_replace('*break*','<br/>', $maintitle); echo $openmainttitle; else : the_title(); 
                endif; ?>
            </span></h1>
            </div>
            <div class="hero-section-pic-wrapper">
            <?php 
            $image = get_field('illustration_hero');
            if( !empty( $image ) ): ?>
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
        <p><?php the_field('introduction-hero');?></p>
        </div>
</div>



<!-- AGENDA ==============
=========================== -->
<section class="agenda-formations-section">
    <div class="agenda-formations-wrapper grid">
        <div class="agenda-formations-header">
            <h2 class="agenda-formation-titre">
                <?php the_field('agenda_titre');?>
            </h2>
            <div class="agenda-formations-container">

                <?php
                $loop = new WP_Query(
                array(
                    'post_type' => 'formation-evenement',
                    'orderby' => 'date',
                    'posts_per_page' => -1
                )
                );
                ?>
                <?php if ($loop->have_posts()) :?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                    <?php get_template_part( './src/TEMPLATES/FormationsEv/card-type-c' );?>

                <?php endwhile;
                wp_reset_query(); ?>
                
                <?php else :?>
                <p><?php the_field('texte_si_aucun_evenement');?></p>
                <?php endif;?>


            </div>
        </div>

    </div>
</section>



<!-- EVENEMENT A LA UNE==============
=========================== -->
<section class="evement-a-la-une-section">
<div class="evement-a-la-une-section-wrapper grid">
    <div class="evement-a-la-une-section-content">
<?php
$featured_posts = get_field('choisir_formationevenement');
if( $featured_posts ): ?>

    <?php foreach( $featured_posts as $post ): 
        setup_postdata($post); ?>
        <div class="evement-a-la-une-section-content-pic-wrapper">
        <?php 
        $image = get_field('ev-image');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        </div>
            <div class="evement-a-la-une-section-content-text">
        <h2 class="evement-a-la-une-section-content-title">
            <?php the_field('titre_de_la_formationevenement');?>
        </h2>
        <p class="evement-a-la-une-content-resume">
            <?php the_field('ev-resume');?>
        </p>

        <a class="cta-a" href="<?php the_permalink(); ?>"><?php pll_e('Découvrez le programme');?></a>
    <?php endforeach; ?>

    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>

</div>
        </div>
</div>
</section>


<!-- CATALOGUE DE FORMATIONS ==============
=========================== -->
<section class="catalogue-de-formations-section">
    <div class="catalogue-de-formations-wrapper grid">
        <div class="catalogue-de-formations-header">
        <h2 class="titre-catalogue-formations">
            <?php the_field('catalogue-titre');?>
        </h2>
        <p class="stitre-catalogue-formations">
        <?php the_field('catalogue-sous-titre');?>
        </p>
        </div>

        <div class="catalogue-de-formations-loop-container">

            <?php
            $featured_posts= get_field('evenements_formations');
            if( $featured_posts ): ?>

            <?php foreach( $featured_posts as $post ): 

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>


            <a href="<?php the_permalink(); ?>" class="card-type-b-item">
                <div class="card-type-b-pic-wrapper">
                    <?php
                    $image = get_field('ev-image');
                    if (!empty($image)) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="card-type-b-content">
                    <p class="card-type-b-chapeau"><?php the_field('titre_de_la_formationevenement'); ?></p>
                    <p class="cta-c"><?php pll_e('Lire plus');?></p>
                </div>
            </a>


            <?php endforeach; ?>

            <?php 
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>

    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner-formation"); ?>



<?php
get_footer();
?>