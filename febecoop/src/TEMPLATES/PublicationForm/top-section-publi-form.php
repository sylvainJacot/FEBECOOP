<section class="publication-form-section form-section-type-a" id="publication-form-section">
    <div class="form-section-type-a-wrapper grid">

    <div class="form-type-a-header">
    <?php if(!get_field('version_papier') && !get_field('papier-payant') && !get_field('digi-payant') ) {?>
        <p class="form-type-a-title"><?php pll_e('Télécharger');?></p>
                <?php } else {?> 

                    <p class="form-type-a-title"><?php pll_e('Commander');?></p>

            <?php };?>
    <p class="form-type-a-content"><?php the_field('sous-titre_formlulaire');?></p>
    </div>