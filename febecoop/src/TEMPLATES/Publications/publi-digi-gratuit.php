
<div class="form-wrapper-item form-wrapper-item-active" id="tab-papier-buy">
<?php echo FrmFormsController::get_form_shortcode(array('id' => 4, 'title' => false, 'description' => false)); ?>
<a class="cta-a" id="js-download-form" href="<?php echo the_field('file_a_telecharger');?>" download="<?php echo the_field('file_a_telecharger');?>"><?php pll_e('Téléchager');?></a>
</div>
