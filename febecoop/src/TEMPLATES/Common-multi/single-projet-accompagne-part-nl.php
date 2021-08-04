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

        <!-- // START contenu_flexible -->
        <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
        <!-- END contenu_flexible -->


        <!-- SHARE ASIDE ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ShareSection/share-section-a');?> 

<!-- <a class="back-cta" onclick="history.back();"><?php pll_e('Retour');?></a> -->

    </div>

</main>




<!-- SUCCESS STORIES ==============
=========================== -->
<section class="other-news-section other-succes-stories-single-success-story">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
        <?php get_template_part( './src/TEMPLATES/SuccessStories/success-stories-loop-mobile-single-projet-accompagne-NL' );?>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?> 


<?php
get_footer();
?>