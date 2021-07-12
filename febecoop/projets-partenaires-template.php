<?php
/**
 * Template Name: Projets partenaires
 * 
 * 
 */
 get_header();
?>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-b fiche-outils-hero-section" id="projets-partenaires-hero-section">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/PROJETSPARTENAIRES/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/PROJETSPARTENAIRES/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/PROJETSPARTENAIRES/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/PROJETSPARTENAIRES/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
            <p class="hero-section-type-b-content-toptitle">sur le terrain</p>
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
        <?php if (get_field('ajout_de_petit_texte_a_lintroduction_')) :?>
        <p class="hero-section-type-b-petite-intro"><?php the_field('texte_supplementaire_introduction');?></p>
        <?php endif;?>
        </div>
</div>



<!--PROJETS ACCOMPAGNES ==============
=========================== -->
<section class="projets-accompagnes-section">
<div class="projets-accompagnes-section-wrapper grid">


<main 
class="card-type-b-container"
">

<?php
$loop = new WP_Query(
    array(
        'post_type' => 'projet-partenaires',
        'orderby' => 'date',
        'posts_per_page' => -1
    )
);
?>

<?php while ($loop->have_posts()) : $loop->the_post(); ?>

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
        <?php if(get_field('projet-part-resume')) :?>
        <p class="card-type-b-resume"><?php the_field('projet-part-resume') ?></p>
        <?php else :?>

        <?php if (have_rows('contenu-flexible')) : while (have_rows('contenu-flexible')) : the_row(); ?>   
        <?php if(get_row_layout() == 'introduction-principale') : 

        $txt = get_sub_field('introduction');
        ?>
        <p class="card-type-b-resume"><?php echo $txt;?></p>

        <?php endif;?>
        <?php endwhile;
        endif; ?>
        <?php endif;?>
        <p class="cta-c"><?php pll_e('Lire plus');?></p>
    </div>
</a>

<?php endwhile;
wp_reset_query(); ?>

</main>


        <!-- <a class="cta-a" id="js-load-more">Load more</a> -->

</div>
</section>


<?php
get_footer();
?>