<?php
/**
 * Template Name: WieZijnWij
 * 
 * 
 */
 get_header();
?>
<!-- HERO SECTION ==============
=========================== -->
<div class="overflow-x" style="overflow-x: hidden;">
<section class="hero-section-type-b fiche-outils-hero-section" id="qui-nous-sommes-hero-section">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/QUIESTFEBE/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/QUIESTFEBE/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/QUIESTFEBE/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/QUIESTFEBE/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
            <p class="hero-section-type-b-content-toptitle"><?php pll_e('À propos');?></p>
            <h1><span>
                <?php if ( get_field('titre_hero') ) : 
                    $maintitle = get_field('titre_hero'); 
                    $openmainttitle = str_replace('*break*','<br/>', $maintitle); echo $openmainttitle; else : the_title(); 
                endif; ?>
            </span> </h1>
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


<!-- ABOUT MAIN SECTION ==============
=========================== -->
<section class="about-main-section">

    <?php if( have_rows('about-ajouter-contenu') ): ?>
        <div class="about-main-section-wrapper grid">
    <?php while( have_rows('about-ajouter-contenu') ): the_row();
    
        $titre = get_sub_field('titre');

    ?>
        <div class="about-main-item-content">
            <div class="about-main-item-content-header">
        <?php get_template_part( './src/TEMPLATES/PentagoneShape/pentagone-shape-sub-field' );?>
        <p class="about-main-item-content-title"><?php echo $titre;?></p>
        </div>
        <div class="about-main-item-content-wrapper">

        <!-- // TEXT SIMPLE -->

        <?php if (get_sub_field('contenu_avec_texte_simple_')) :?>
            <p class="about-main-item-content-texte"><span>
                <?php if ( get_sub_field('contenu') ) : 
                    $maintitle = get_sub_field('contenu'); 
                    $openmainttitle = str_replace('*break*','<br/>', $maintitle); echo $openmainttitle; 
                endif; ?>
            </span> </p>
        <?php endif;?>

        <!-- // TEXT AVEC SOUS TITRES -->

        <?php if (get_sub_field('contenu_avec_sous-titres_et_textes')) :?>

            <?php if( have_rows('contenu-avec-texte-stitres') ): ?>

                    <?php while( have_rows('contenu-avec-texte-stitres') ): the_row(); ?>

                    <p class="about-main-item-content-sous-titre"><?php the_sub_field('sous-titre');?></p>
                    <p class="about-main-item-content-texte"><?php the_sub_field('texte');?></p>
                        
           
                    <?php endwhile; ?>

            <?php endif; ?>


        <?php endif;?>
        </div>
        </div>

    <?php endwhile; ?>
    </div>
<?php endif; ?>

</section>



<!-- ABOUT TEAM MEMBERS SECTION ==============
=========================== -->
<? get_template_part( './src/TEMPLATES/AboutTeamMembers/about-team-members-links-NL' ); ?>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner' );?>

<?php
get_footer();
?>