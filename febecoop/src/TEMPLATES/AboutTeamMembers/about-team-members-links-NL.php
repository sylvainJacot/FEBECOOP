<section class="checkout-team-members-section">
<div class="checkout-team-members-section-wrapper grid">
                <a href="<?php echo esc_url(home_url('/')); ?>ons-team" class="checkout-tm-item">
                    <p class="checkout-tm-item-title"><?php the_field('team-title');?></p>
                    <p class="checkout-tm-item-texte"><?php the_field('team-desc');?></p>
                    <p class="cta-a" ><?php pll_e("Découvrir l'équipe");?></p>
                </a>
                <a href="<?php echo esc_url(home_url('/')); ?>netwerk" class="checkout-tm-item">
                    <p class="checkout-tm-item-title"><?php the_field('notre_equipe_titre');?></p>
                    <p class="checkout-tm-item-texte"><?php the_field('notre_membres_description');?></p>
                    <p class="cta-a"><?php pll_e('Découvrir les membres');?></p>
                </a>
</div>
</section>