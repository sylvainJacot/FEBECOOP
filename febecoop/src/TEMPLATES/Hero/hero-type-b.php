<section class="hero-section-type-b fiche-outils-hero-section" id="<?php echo $id;?>">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
            <p class="hero-section-type-b-content-toptitle"><?php pll_e('Sur le terrain');?></p>
            
            <h1><span>
                <?php if ( get_field('titre_hero') ) : 
                    $maintitle = get_field('titre_hero'); 
                    $openmainttitle = str_replace('*break*','<br/>', $maintitle); echo $openmainttitle; else : the_title(); 
                endif; ?>
        </span>    
        </h1>
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
