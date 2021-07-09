<aside class="publication-detail grid">

                <p class="publication-detail-titre"><?php pll_e('Détail');?></p>


                <?php if (get_field('digi-payant') || get_field('papier-payant')) {;?>
                <div class="publication-detail-prix-container">
                    <div class="publication-detail-prix-icone"></div>
                    <div class="publication-detail-text-prix-container">
                        <?php if (get_field('papier-payant')) : ?>

                        <p class="publication-detail-prix"><?php pll_e('Version papier');?>: <?php the_field('prix_version_papier');?>&#8364/  <?php pll_e('unité');?>(<?php pll_e('frais de port inclus');?>)</p>

                        <?php endif;?>

                        <?php if (get_field('digi-payant')) : ?>

                        <p class="publication-detail-prix"><?php pll_e('Version digitale');?>: <?php the_field('prix_version_digitale');?>&#8364 </p>
                        
                        <?php endif;?>
                    </div>
                </div>
                <?php } else {;?>
                    <div class="publication-detail-prix-container">
                    <div class="publication-detail-prix-icone"></div>
                    <p class="publication-detail-gratuit"><?php pll_e('Gratuit');?></p>
                </div>
                <?php };?>


            <?php if(get_field('detail')) :?>
                <p class="publication-detail-content"><?php the_field('detail'); ?></p>
            <?php endif;?>

            <?php if(!get_field('version_papier') && !get_field('papier-payant') && get_field('version_digitale') || !get_field('version_digitale') ) {?>
                <a class="cta-a" href="#publication-form-section"><?php pll_e('Télécharger');?></a>
                <?php } else {?> 

                <a class="cta-a" href="#publication-form-section"><?php pll_e('Commander');?></a>

            <?php };?>

            </aside>