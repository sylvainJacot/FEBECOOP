<?php if(get_row_layout() == 'image') : 

 
 $image = get_sub_field('image');

if( !empty( $image ) ): ?>
<div class="flex-image">
<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
</div>
<?php endif; ?>

<?php endif;?>