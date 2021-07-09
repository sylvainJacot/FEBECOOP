<?php if (have_rows('contenu-flexible')) : while (have_rows('contenu-flexible')) : the_row(); ?>

<?php get_template_part('./src/TEMPLATES/FlexibleContent/introduction'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-wysiwyg'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-image'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-contenu-accordeon'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-divider'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-video-youtube'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-titre-icone'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-slider-images'); ?>
<?php get_template_part('./src/TEMPLATES/FlexibleContent/flex-share'); ?>

<?php endwhile;
endif; ?>