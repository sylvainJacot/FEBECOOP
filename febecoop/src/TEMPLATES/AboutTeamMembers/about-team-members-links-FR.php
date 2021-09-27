<section class="checkout-team-members-section">
<div class="checkout-team-members-section-wrapper grid">

                <?php 
                $link = get_field('team-bouton');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                

                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="checkout-tm-item">
                    <p class="checkout-tm-item-title"><?php the_field('team-title');?></p>
                    <p class="checkout-tm-item-texte"><?php the_field('team-desc');?></p>
                    <p class="cta-a" ><?php echo esc_html( $link_title ); ?></p>
                </a>

                <?php endif; ?>

                <?php 
                $link = get_field('membres-bouton');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="checkout-tm-item">
                    <p class="checkout-tm-item-title"><?php the_field('notre_equipe_titre');?></p>
                    <p class="checkout-tm-item-texte"><?php the_field('notre_membres_description');?></p>
                    <p class="cta-a"><?php echo esc_html( $link_title ); ?></p>
                </a>

                <?php endif; ?>

</div>
</section>