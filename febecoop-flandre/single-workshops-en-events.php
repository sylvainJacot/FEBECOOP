<?php

/**
 * 
 * 
 */
get_header();
?>


<!-- ICI SEULS LES IDS DES FORMULAIRES DOIVENT CHANGER PAR RAPPORT A LA FLANDRE -->

<?php
            $date = get_field('ev_date');
            $date_details = get_field('date_details');
            $place = get_field('ev-localisation');
            $price = get_field('ev-prix');

    ?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-h hero-section-type-h-formation">
    <div class="hero-section-type-h-wrapper grid">
<?php if ($date ) { ?>

        <div class="hero-section-type-h-content">
            <div class="hero-section-type-h-content-text">
                <p class="hero-section-type-h-content-toptitle"><?php pll_e('Formations & rencontres');?></p>
                <h1><span><?php the_title(); ?></span></h1>
            </div>
        </div>

<?php } else {?>

        <div class="hero-section-type-h-content" id="hero-section-type-h-content-centered">
            <div class="hero-section-type-h-content-text">
                <p class="hero-section-type-h-content-toptitle"><?php pll_e('Formations & rencontres');?></p>
                <h1><span><?php the_title(); ?></span></h1>
            </div>
        </div>


<?php };?> 

                </div>
</section>
<div class="hero-section-type-h-pic-wrapper">
                    <?php 
                    $image = get_field('ev-image');
                    if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>

<!--MAIN flexible ==============
=========================== -->
<section class="evenement-formation-single-section">
    <main class="evenement-formation-single-wrapper grid">
        <div class="evenement-formation-single-content generic-content">
            <div class="evenement-formation-single-content-flex">
                <!-- // START contenu_flexible -->
                <?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-main'); ?>
                <?php get_template_part('./src/TEMPLATES/ShareSection/share-section-a');  ?>
                <!-- END contenu_flexible -->
            </div>

             <?php if ($date ) : ?>
            <aside class="evenement-formation-single-content-details">
                <?php if ($date ) : ?>
                    <p class="efscd-titre"><?php pll_e('D??tail ??v??nement');?></p>
                    <div class="efscd-liste-details">

                        <?php if ($date) : ?>

                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-date-ic"></span>
                                <p class="efscd-liste-detail-content">
                                    <?php the_field('ev_date'); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if ($date_details) : ?>
                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-date-details-ic"></span>
                                <p class="efscd-liste-detail-content">
                                <?php the_field('date_details'); ?>
                                </p>
                            </div>

                         <?php endif; ?>


                        <?php if ($place) : ?>
                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-place-ic"></span>
                                <p class="efscd-liste-detail-content"><?php the_field('ev-localisation'); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if ($price) : ?>
                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-price-ic"></span>
                                <p class="efscd-liste-detail-content"><?php the_field('ev-prix'); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif ?>
                <div class="efscd-ctas">
                    <?php if ($date) { ?>
                        <a class="cta-a" href="#formation-form-section"><?php pll_e("S'inscrire");?></a>

                    <?php } else {?>

                        <a class="cta-a" href="#formation-form-section"><?php pll_e("S'informer");?></a>

                    <?php } ?>



                </div>
            </aside>
            <?php endif; ?>

        </div>

    </main>
</section>








<?php if($date) {;?>
<!-- FORM TYPE A ==============
// =========================== -->
<section class="formation-form-section form-section-type-a" id="formation-form-section">
    <div class="form-section-type-a-wrapper grid">

        <div class="form-type-a-header">
            <p class="form-type-a-title"><?php the_field('titre_formulaire');?></p> 
            <p class="form-type-a-content"><?php the_field('sous-titre_formulaire'); ?></p>
        </div>
        <div class="form-wrapper-item form-wrapper-item-active">
            <?php echo FrmFormsController::get_form_shortcode(array('id' => 10, 'title' => false, 'description' => false)); ?>
        </div>

        <?php
        $label = get_field('footer_formulaires', 'options');
        $link = get_field('footer_formulaire_lien', 'options');
        ?>
            <a class="form-type-a-footer"  href="mailto:<?php echo$link; ?>">

                    <?php
                    $openspan = "<span>";
                    $openmainttitle = str_replace('(*(', $openspan, $label);
                    $closemainttitle = str_replace(')*)','</span>',$openmainttitle);
                    echo $closemainttitle;
                    ?>


            </a>





    </div>
</section>
<?php } else {;?>

<?php get_template_part( '../febecoop/src/TEMPLATES/ContactBanner/contact-banner-formation-single' );?>




    </div>
</section>

<?php };?>


<script type="text/javascript">
var input = document.getElementById("field_v01l2");
var input2 = document.getElementById("field_k3q0s");


if(input) {
    input.setAttribute('value','<?php the_title(); ?>');
}

if(input2) {
    input2.setAttribute('value','<?php the_title(); ?>');
}


</script>



<?php
get_footer();
?>