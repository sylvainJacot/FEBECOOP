<?php if(get_row_layout() == 'bouton_cta') : 
?>

<?php 
$link = get_field('boutonzefzfezfzefze');

    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a class="cta-a" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>


<?php endif;?>