<?php if(get_row_layout() == 'introduction-principale') : 

$txt = get_sub_field('introduction');
?>
<div class="flex-introduction-wrapper">
<p id="intro-a"><?php echo $txt;?></p>
</div>

<?php endif;?>