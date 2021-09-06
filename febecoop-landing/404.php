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
<section class="hero-section-type-i">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/404/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/404/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/404/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/404/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-i-wrapper grid">
        <div class="hero-section-type-i-content">
            <div class="hero-section-type-i-content-text">

            <p class="hero-section-type-i-content-toptitle">404</p>
            <h1><span>
                <?php the_field('error-titre', 'options');?>
            </span></h1>

            <h2 class="hero-section-type-i-content-text">
                <?php the_field('texte', 'options');?>
            </h2>

            <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-a">Home</a>

            </div>

            <div class="hero-section-pic-wrapper">
            <?php 
            $image = get_field('illustration' , 'options');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            </div>
            </a>
    </div>
    </div>
</section>


<?php
get_footer();
?>