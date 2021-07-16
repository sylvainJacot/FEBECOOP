<?php
/**
 * 
 * 
 * 
 */
 get_header();
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-e">
    <div class="hero-section-type-e-wrapper grid">
        <div class="hero-section-type-e-content">
            <div class="hero-section-type-e-content-text">
                <div class="hero-section-type-e-content-toptitle-wrapper">
                <p class="hero-section-type-e-content-toptitle"><?php pll_e('Nos prises de position');?></p>
                <p class="hero-section-type-e-content-date"><?php the_date('Y-m-d');?></p>
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
$image = get_field('actu-hero-image');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
    </div>
</div>


<!--MAIN flexible ==============
=========================== -->
<main class="main-prises-de-position-content grid">
    <div class="section-actualite-content generic-content">
        <!-- // START contenu_flexible -->
    <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
    <?php get_template_part( './src/TEMPLATES/ShareSection/share-section-a');?> 
        <!-- END contenu_flexible -->
    </div>

</main>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>



<!-- YOUTUBE SCRIPT ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/FlexibleContent/bottom-video-script"); ?>

<?php
get_footer();
?>