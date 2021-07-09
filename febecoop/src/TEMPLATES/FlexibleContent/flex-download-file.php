<?php if(get_row_layout() == 'fichier_a_telecharger') : 

$titre = get_sub_field('titre');
$doc = get_sub_field('fichier');



?>
    <a class="flex-download-cta" href="<?php echo $doc ?>" download><?php echo $titre;?></a>

<?php endif;?>