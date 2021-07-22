<?php

/**
 * 
 * 
 */
get_header();
?>


<?php
            $one_date = get_field('one-day');
            $several_date = get_field('several-days');

            $place = get_field('ev-localisation');
            $price = get_field('ev-prix');

            $hour_start_day = get_field('one-day-heure-start');
            $hour_end_day = get_field('one-day-heure-end');

            $hour_start_days = get_field('several-days-heure-start');
            $hour_end_days = get_field('several-days-heure-end');

    ?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-h">
    <div class="hero-section-type-h-wrapper grid">
<?php if ($one_date || $several_date) { ?>

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

             <?php if ($one_date || $several_date) : ?>
            <aside class="evenement-formation-single-content-details">
                <?php if ($one_date || $several_date || $place || $price) : ?>
                    <p class="efscd-titre"><?php pll_e('Détail évènement');?></p>
                    <div class="efscd-liste-details">

                        <?php if ($one_date) { ?>

                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-date-ic"></span>
                                <p class="efscd-liste-detail-content">
                                    <?php the_field('ev-date'); ?></br>
                                    <?php the_field('one-day-heure-start'); ?>-<?php the_field('one-day-heure-end'); ?>
                                </p>
                            </div>
                        <?php } elseif($several_date)  {?>
                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-date-ic"></span>
                                <p class="efscd-liste-detail-content"><?php pll_e('Du');?> <?php the_field('ev-date-start'); ?>
                                    </br> <?php pll_e('au');?> <?php the_field('ev-date-end'); ?>
                                    </br><?php the_field('several-days-heure-start'); ?>-<?php the_field('several-days-heure-end'); ?>
                                </p>
                            </div>

                        <?php } else {?>
                            <div class="efscd-liste-detail-item">
                                <span class="efscd-liste-detail-item-icone efscd-date-ic"></span>
                                <p class="efscd-liste-detail-content">Aucune date prévue</p>
                            </div>
                        <?php }?>

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
                    <?php if ($one_date  && !$several_date) { ?>
                        <?php get_template_part('./src/TEMPLATES/Addtocalendar/add-to-calendar'); ?>
                        <a class="cta-a" href="#formation-form-section"><?php pll_e("S'inscrire");?></a>

                    <?php } elseif($several_date && !$one_date)  {?>

               
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





<?php
$one_day= get_field('one-day');
$multi_days= get_field('several-days');

$one_date = get_field('ev-date');
$start_date = get_field('ev-date-start');
$end_date = get_field('ev-date-end');
?>


<?php if($one_day || $multi_days) {;?>
<!-- FORM TYPE A ==============
// =========================== -->
<section class="formation-form-section form-section-type-a" id="formation-form-section">
    <div class="form-section-type-a-wrapper grid">

        <div class="form-type-a-header">
            <p class="form-type-a-title"><?php pll_e('S’inscrire à l’événement/formation');?></p>
            <p class="form-type-a-content"><?php the_field('sous-titre_formlulaire'); ?></p>
        </div>
        <div class="form-wrapper-item form-wrapper-item-active">
            <?php echo FrmFormsController::get_form_shortcode(array('id' => 10, 'title' => false, 'description' => false)); ?>
        </div>

        <?php
        $link = get_field('footer_formulaires', 'options');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="form-type-a-footer" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

                    <?php
                    $openspan = "<span>";
                    $openmainttitle = str_replace('(*(', $openspan, $link_title);
                    $closemainttitle = str_replace(')*)','</span>',$openmainttitle);
                    echo $closemainttitle;
                    ?>


            </a>
        <?php endif; ?>




    </div>
</section>
<?php } else {;?>

    <!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner-options"); ?>

<?php };?>


<script type="text/javascript">
    (function() {
        if (window.addtocalendar)
            if (typeof window.addtocalendar.start == "function") return;
        if (window.ifaddtocalendar == undefined) {
            window.ifaddtocalendar = 1;
            var d = document,
                s = d.createElement('script'),
                g = 'getElementsByTagName';
            s.type = 'text/javascript';
            s.charset = 'UTF-8';
            s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://addtocalendar.com/atc/1.5/atc.min.js';
            var h = d[g]('body')[0];
            h.appendChild(s);
        }
    })();
</script>



<?php
get_footer();
?>