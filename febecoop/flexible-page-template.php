<?php

/**
 * Template Name: Flexible page
 * 
 * 
 */
get_header();

?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-h">
    <div class="hero-section-type-h-wrapper grid">
        <div class="hero-section-type-h-content">
            <div class="hero-section-type-h-content-text">
                <h1><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    </div>
</section>


<!-- MAIN FLEXIBLE PAGE CONTENT ==============
=========================== -->
<main class="main-flexible-page-wrapper grid">
    <div class="main-flexible-page-content generic-content">
        <!-- // START contenu_flexible -->
    <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main');?>
        <!-- END contenu_flexible -->
    </div>


</main>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner' );?>


<?php
get_footer();
?>

