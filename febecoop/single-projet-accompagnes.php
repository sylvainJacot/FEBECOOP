<?php

/**
 * 
 * 
 * 
 */
get_header();
$post_type_obj = get_post_type_object( 'projet-accompagnes' );
$post_type = $post_type_obj->labels->singular_name; 
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-e">
    <div class="hero-section-type-e-wrapper grid">
        <div class="hero-section-type-e-content">
            <div class="hero-section-type-e-content-text">
                <div class="hero-section-type-e-content-toptitle-wrapper">
                <p class="hero-section-type-e-content-toptitle"><?php echo $post_type;?></p>
                </div>
                <h1><span><?php echo the_title(); ?></h1></span>
            </div>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-e-introduction-wrapper">
    <div class="hero-section-type-e-intro-content">
    <?php 
$image = get_field('projet-image-hero');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
    </div>
</div>


<!--MAIN flexible ==============
=========================== -->
<main class="main-projet-accompagne-content grid">
    <div class="section-projet-accompagne-content generic-content">
    <div class="flex-introduction-wrapper">
    <!-- <p id="intro-a"><?php the_field('projet-description');?></p> -->
    </div>
        <!-- // START contenu_flexible -->
        <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
        <!-- END contenu_flexible -->
        <a class="back-cta" onclick="history.back();"><?php pll_e('Retour');?></a>

        <!-- SHARE ASIDE ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ShareSection/share-section-a');?> 

    </div>

</main>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>



<?php
get_footer();
?>