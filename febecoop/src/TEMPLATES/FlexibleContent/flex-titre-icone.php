<?php if(get_row_layout() == 'titre_avec_icone') : 
?>
 
 <span class="flex-titre-icone-wrapper">
    <?php get_template_part( './src/TEMPLATES/PentagoneShape/pentagone-shape-sub-field' );?>
    <h2><?php the_sub_field('titre');?></h2>
</span>

<?php endif;?>