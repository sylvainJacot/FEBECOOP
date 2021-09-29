<?php

/**
 * Template Name: Landing page
 * 
 * 
 */
get_header();
?>

<!-- HERO SECTION ==============
=========================== -->
<div class="overflow-x" style="overflow: hidden;">


<section class="hero-section-type-a hero-section-type-a-federal hero-section-type-a-landing">
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


<!-- MAIN ==============
=========================== -->
<span class="anchor" id="intro-section"></span>
<section class="section_landing-main">
<div class="section_landing-main-grid grid">


    <h1><? the_field('subtitle');?></h1>


    <?php if( have_rows('sites') ): ?>
    <ul class="slm-cards-wrapper">
    <?php while( have_rows('sites') ): the_row(); 

        ?>
        <a href="<? the_sub_field('bouton'); ?>"class="slm-card-item">
        <div class="slm-card-item-content">



                            <h2>        
                            <?php if (get_sub_field('titre')) :
                $maintitle = get_sub_field('titre');
                $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                echo $openmainttitle;
            else : the_title();
            endif; ?>
                             </h2>
                            <p class="slm-card-item-content-desc"><? the_sub_field('description'); ?></p>
                            <p class="cta-b"><?php the_field("bouton_sites") ?></p>
                        </div>    
        </a>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>


    </div>
</section>



<!-- FOOTER ==============
=========================== -->
<div class="footer_section-landing">
    <div class="footer_section-landing-leftillu"></div>
    <div class="footer_section-landing-rightillu"></div>
</div>


</div>

