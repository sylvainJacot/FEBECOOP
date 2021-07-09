
<ul class="form-tabulations-wrapper">
    <li class="tab-nav-item"><?php pll_e('Version digitale');?> (<?php the_field('prix_version_digitale');?>&#8364)</li>
</ul>

<div class="form-wrapper-item form-wrapper-item-active" id="tab-papier-buy">
<?php echo FrmFormsController::get_form_shortcode(array('id' => 5, 'title' => false, 'description' => false)); ?>
</div>