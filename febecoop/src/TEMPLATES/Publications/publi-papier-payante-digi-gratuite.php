<ul class="form-tabulations-wrapper">
    <li class="tab-nav-item tab-nav-item-active" data-tab-target="#tab-papier-buy"><span class="tab-nav-item-radio"></span><?php pll_e('Version papier'); ?><div class="tab-nav-item-parentheses">(<?php the_field('prix_version_papier'); ?>&#8364/unité, <?php pll_e('frais de port inclus'); ?>)</div>
    </li>
    <li class="tab-nav-item" data-tab-target="#tab-digi-buy"><span class="tab-nav-item-radio"></span><?php pll_e('Version digitale'); ?><div class="tab-nav-item-parentheses"></div>
    </li>
</ul>



<div class="form-wrapper-item form-wrapper-item-active publication-commander-form" id="tab-papier-buy">
    <?php echo FrmFormsController::get_form_shortcode(array('id' => 3, 'title' => false, 'description' => false)); ?>

</div>

<div class="form-wrapper-item publication-commander-form" id="tab-digi-buy">
    <?php echo FrmFormsController::get_form_shortcode(array('id' => 4, 'title' => false, 'description' => false)); ?>
    <a class="cta-a" id="js-download-form" href="<?php echo the_field('file_a_telecharger');?>" download="<?php echo the_field('file_a_telecharger');?>"><?php pll_e('Téléchager');?></a>
</div>