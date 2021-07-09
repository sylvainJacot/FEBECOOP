<?php if(get_row_layout() == 'contenu_accordeon') : 
 
 ?>
<?php if( have_rows('contenu_accordeon') ): ?>
    <div class="flex-contenu-accordeon-wrapper">

    <?php while( have_rows('contenu_accordeon') ): the_row(); ?>

        <div class="contenu-accordeon-item">
            <div class="cai-header">
            <p class="cai-titre"><?php the_sub_field('titre'); ?></p>
            <span class="cai-ic"></span>
            </div>
            <div class="cai-contenu"><?php the_sub_field('contenu'); ?></div>
        </div>
    <?php endwhile; ?>

    </div>
<?php endif; ?>
 
 <?php endif;?>