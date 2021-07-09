
<ul class="form-tabulations-wrapper">
    <li class="tab-nav-item"><?php pll_e('Version papier');?> (<?php the_field('prix_version_papier');?>&#8364/<?php pll_e('unité');?>, <?php pll_e('frais de port inclus');?>)</li>
</ul>


<div class="form-wrapper-item form-wrapper-item-active" id="tab-papier-free">
<?php echo FrmFormsController::get_form_shortcode(array('id' => 3, 'title' => false, 'description' => false)); ?>
</div>
