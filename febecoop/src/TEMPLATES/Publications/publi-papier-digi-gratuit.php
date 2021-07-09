
<ul class="form-tabulations-wrapper">
    <li class="tab-nav-item tab-nav-item-active" data-tab-target="#tab-papier-free"><span class="tab-nav-item-radio"></span><?php pll_e('Version papier');?></li>
    <li  class="tab-nav-item" data-tab-target="#tab-digi-free"><span class="tab-nav-item-radio"></span><?php pll_e('Version digitale');?></li>
</ul>

<div class="form-wrapper-item form-wrapper-item-active" id="tab-papier-free">
<?php echo FrmFormsController::get_form_shortcode(array('id' => 2, 'title' => false, 'description' => false)); ?>
</div>

<div class="form-wrapper-item"  id="tab-digi-free">
<?php echo FrmFormsController::get_form_shortcode(array('id' => 4, 'title' => false, 'description' => false)); ?>
</div>
