
<section class="hero-section-type-a hero-section-type-a-flandre">
    <picture class="orange-wave-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/HOME/VECTOR/orange-wave-wallonia-desktop-flandre.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/HOME/VECTOR/orange-wave-wallonia-laptop-flandre.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/HOME/VECTOR/orange-wave-wallonia-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/HOME/VECTOR/orange-wave-wallonia-mobile_1.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-a-wrapper grid">
        <div class="hero-section-type-a-content">
            <h1><span>
                <?php if ( get_field('titre_hero') ) : 
                    $maintitle = get_field('titre_hero'); 
                    $openmainttitle = str_replace('*break*','<br/>', $maintitle); echo $openmainttitle; else : the_title(); 
                endif; ?>
            </span></h1>
            <div class="hero-section-pic-wrapper">
            <?php 
            $image = get_field('illustration-hero');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            </div>
            <a href="#intro-section" id="scroll-down-arrow"> 
            </a>
    </div>
    </div>
</section>
