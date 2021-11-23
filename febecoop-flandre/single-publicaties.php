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

            <!-- <div class="illu-publication-detail-wrapper"> -->
                <?php
                $image = get_field('publication-image-couverture');
                if (!empty($image))  {?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php } else { ?>

                    <div class="illu-publication-detail-wrapper-placeholder">
                        <svg width="299" height="281" viewBox="0 0 299 281" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M264.959 0.349609H33.787C15.153 0.349609 0 15.4976 0 34.1536V246.615C0 265.249 15.153 280.381 33.787 280.381H264.958C283.592 280.381 298.729 265.249 298.729 246.615V34.1536C298.73 15.4976 283.593 0.349609 264.959 0.349609ZM193.174 50.6226C211.194 50.6226 225.808 65.2376 225.808 83.2566C225.808 101.276 211.193 115.891 193.174 115.891C175.149 115.891 160.54 101.276 160.54 83.2566C160.54 65.2376 175.149 50.6226 193.174 50.6226ZM254.363 249.149H49.039C40.026 249.149 36.012 242.628 40.075 234.583L96.081 123.653C100.139 115.609 107.873 114.891 113.35 122.048L169.666 195.644C175.143 202.802 184.716 203.411 191.052 196.998L204.829 183.047C211.16 176.634 220.488 177.428 225.655 184.809L261.33 235.768C266.487 243.16 263.376 249.149 254.363 249.149Z" fill="#010002"/>
                        </svg>
                    </div>

                    <?php }?>
            <!-- </div> -->

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
            <?php 
        if (get_field('version_papier')  || get_field('version_digitale')) {
            echo get_template_part('./src/TEMPLATES/ShareSection/share-section-a');
        } else {
            echo get_template_part('./src/TEMPLATES/ShareSection/share-section-b');
        }?>
            <!-- END contenu_flexible -->
        </div>


        <!-- Publication Papier gratuite -->

        <?php
        if (get_field('version_papier') && !get_field('papier-payant') && !get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );            
        }


        // Publication Papier payante

        else if (get_field('version_papier') && get_field('papier-payant') && !get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }

        // Publication Digitale payant

        else if (!get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }
            

        // Publication Papier et digitale gratuite 

        else if (get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  


        // Publication Papier et digitale payante 

        }

        else if (get_field('version_papier') && get_field('papier-payant') && get_field('version_digitale')  && get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }

        // Publication Digitale gratuite

        else if (!get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale')  && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' );  
        }

        else {
            // echo get_template_part( './src/TEMPLATES/PublicationForm/aside-commander-form' ); 
        };
        ?>
        

    </main>
            <!-- SHARE ASIDE ==============
=========================== -->


    
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

        else if (get_field('version_papier') && get_field('papier-payant') && get_field('version_digitale') && get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' );
            echo get_template_part( './src/TEMPLATES/Publications/publi-papier-digi-payant' );
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );
        }

        /* SCENARIO 05 : Papier payant et digitale gratuit */

        else if (get_field('version_papier') && get_field('papier-payant') && get_field('version_digitale') && !get_field('digi-payant')) {
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' );
            echo get_template_part( './src/TEMPLATES/Publications/publi-papier-payante-digi-gratuite' );
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );
        }


        /* SCENARIO 06 : Digitale gratuit */

        else if(!get_field('version_papier') && get_field('version_digitale')){
            echo get_template_part( './src/TEMPLATES/PublicationForm/top-section-publi-form' ); 
            echo get_template_part( './src/TEMPLATES/Publications/publi-digi-gratuit' ); 
            echo get_template_part( './src/TEMPLATES/PublicationForm/bottom-section-publi-form' );
            // echo get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );
        }
        

        /* SCENARIO 07 : Si rien de coché*/
        else {
            echo get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options-publication-noform' );
        }

        ;
        ?>



<script type="text/javascript">

// FLANDRE
// Digi gratuit
var input = document.getElementById("field_4v394");
// Digi payant
var input2 = document.getElementById("field_t0046");
// Papier gratuit
var input3 = document.getElementById("field_1ws3b");
// Papier payant
var input4 = document.getElementById("field_92els");


if(input) {
    input.setAttribute('value','<?php the_title(); ?>');
}

if(input2) {
    input2.setAttribute('value','<?php the_title(); ?>');
}
if(input3) {
    input3.setAttribute('value','<?php the_title(); ?>');
}
if(input4) {
    input4.setAttribute('value','<?php the_title(); ?>');
}


</script>

        
<?php get_footer(); ?>