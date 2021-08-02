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
<div class="overflow-x" style="overflow-x: hidden;">
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
</div>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
        <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero');?></p>
        <?php if (get_field('ajout_de_petit_texte_a_lintroduction_')) :?>
        <p class="hero-section-type-b-petite-intro"><?php the_field('texte_supplementaire_introduction');?></p>
        <?php endif;?>
        </div>
</div>



<!-- AGENDA ==============
=========================== -->
<section class="agenda-formations-section">
    <div class="agenda-formations-wrapper grid">
        <?php
            $loop = new WP_Query(
            array(
                'post_type' => 'formation-evenement',
                'orderby' => 'date',
                'posts_per_page' => -1
            )
            );
        
             $count_ev = 0;
            //  print_r($loop);
            ?>
        <div class="agenda-formations-header" id="js-agenda-formations-header">
            <h2 class="agenda-formation-titre">
                <?php the_field('agenda_titre');?>
            </h2>
            </div>
            <div class="agenda-formations-container" id="js-agenda-formations-container">
                <?php if ($loop->have_posts()) :?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>



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


                <?php endwhile;
                wp_reset_query(); ?>


                <?php if ($count_ev === 0) :?>
                    <p class="agenda-formation-empty-texte"><?php the_field('texte_si_aucun_evenement');?></p>
                 <?php endif ;?>
                
                <?php endif;?>


            </div>
        </div>

</section>



<!-- EVENEMENT A LA UNE==============
=========================== -->

<section class="evement-a-la-une-section">
<div class="evement-a-la-une-section-wrapper grid">
    <div class="evement-a-la-une-section-content">


    <div class="evement-a-la-une-section-content-pic-wrapper">
        <?php 
        $image = get_field('programme_une_hero_image');
        if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        </div>
            <div class="evement-a-la-une-section-content-text">
        <h2 class="evement-a-la-une-section-content-title">
            <?php the_field('programme_une_titre');?>
        </h2>
        <p class="evement-a-la-une-content-resume">
            <?php the_field('programme_une_description');?>
        </p>

<?php 
$link = get_field('programme_une_bouton');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="cta-a" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>

</div>
        </div>
</div>
</section>
<?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>




<!-- CATALOGUE DE FORMATIONS ==============
=========================== -->
<?php
$featured_posts= get_field('evenements_formations');
if( $featured_posts ): ?>
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
                    <p class="cta-c"><span><?php pll_e('En savoir plus');?></span></p>
                </div>
            </a>


            <?php endforeach; ?>

            <?php 
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
            

        </div>

    </div>
</section>
<?php endif; ?>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner-formation"); ?>

<script>

    const AgendaHeader = document.querySelector('#js-agenda-formations-header');
    const Agenda = document.querySelectorAll('#js-agenda-formations-container a');

    if(Agenda.length === 0) {
        AgendaHeader.style.display = "none";
    } else {
        AgendaHeader.style.display = "block";
    }
    

</script>

<?php
get_footer();
?>