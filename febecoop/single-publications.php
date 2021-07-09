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
<section class="hero-section-type-f">

    <div class="hero-section-type-f-wrapper grid">

        <div class="hero-section-type-f-content">

            <div class="illu-publication-detail-wrapper">
                <?php
                $image = get_field('publication-image-couverture');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>

            <div class="hero-section-type-f-content-text">
                <p class="hero-section-type-f-content-toptitle"><?php pll_e('Publication');?></p>
                <h1><span><?php the_title(); ?></span></h1>
            </div>



        </div>



    </div>

</section>


<section class="publication-content-section">
<div class="publication-content-section-wrapper grid">
    <!--MAIN flexible ==============
=========================== -->
    <main class="publication-content-main grid">
        <div class="publication-content generic-content">
            <!-- // START contenu_flexible -->
            <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main-publication');?>
            <!-- END contenu_flexible -->
        </div>


        <?php
        if (get_field('version_papier') && !get_field('papier-payant') && !get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );            
        }


        else if (get_field('version_papier') && get_field('papier-payant') && !get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }



        // else if (!get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && !get_field('digi-payant')) {

        // echo get_template_part( './src/TEMPLATES/Publications/publi-digi-gratuit' );
        //  }



        else if (!get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }
            


        else if (get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  

        }

        else if (get_field('version_papier') && get_field('papier-payant') && get_field('version_digitale')  && get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }

        else {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  

        };
        ?>

    </main>
            <!-- SHARE ASIDE ==============
=========================== -->
    <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a'); ?>
    </div>



</section>


<!-- FORM TYPE A ==============
=========================== -->


        <?php

        /* SCENARIO 01 : Papier payant */

        if (get_field('version_papier') && get_field('papier-payant') && !get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' );            
            echo get_template_part( './src/TEMPLATES/Publications/publi-papier-payant' );
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' ); 

        }


        /* SCENARIO 02 : Digitale payant */

        else if (!get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' );
            echo get_template_part( './src/TEMPLATES/Publications/publi-digi-payant' );
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );
        }
            

        /* SCENARIO 03 : Papier gratuit et digitale gratuit */

        else if (get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' );
            echo get_template_part( './src/TEMPLATES/Publications/publi-papier-digi-gratuit' );
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );

        }

        
        /* SCENARIO 04 : Papier payant et digitale payant */

        else if (get_field('version_papier') && get_field('papier-payant') && get_field('version_digitale')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' );
            echo get_template_part( './src/TEMPLATES/Publications/publi-papier-digi-payant' );
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );
        }


        /* SCENARIO 05 : Digitale gratuit par défaut */

        else {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' ); 
            echo get_template_part( './src/TEMPLATES/Publications/publi-digi-gratuit' ); 
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );
        };
        ?>
        





<?php
get_footer();
?>