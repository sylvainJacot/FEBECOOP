<?php 
        $link = get_field('footer_formulaires','options');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                        <a class="form-type-a-footer" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">

<?php
$openspan = "<span>";
$openmainttitle = str_replace('(*(', $openspan, $link_title);
$closemainttitle = str_replace(')*)','</span>',$openmainttitle);
echo $closemainttitle;
?>


</a>
        <?php endif; ?>


    </div>
</section>

