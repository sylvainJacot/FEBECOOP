<?php

/**
 * Footer file
 * 
 * 
 */
?>
<footer>
    <div class="footer-wrapper grid">
        <a id="Febecoop-logo-footer" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/logo_Febecoop.svg" alt="Febecoop logo" /></a>
        <div class="footer-main-wrapper">
        <div class="newsletter-section">
            <h3 class="newsletter-title"><?php the_field('newsletter-titre', 'option'); ?></h3>
            <div class="newsletter-section-content">
                <p class="newsletter-subtitle"><?php the_field('newsletter-texte', 'option'); ?></p>
                <a class="newsletter-cta" href="#"><?php the_field('newsletter-cta', 'option'); ?></a>
            </div>
        </div>

        <div class="coordonnees-socials-wrapper">

            <div class="coordonees-section">
                <?php if (have_rows('coordonees', 'option')) : ?>

                    <?php while (have_rows('coordonees', 'option')) : the_row(); ?>

                    <?php
                    $adress = get_sub_field('addresse');
                    $state = get_sub_field('localite');

                    $fulladress = $adress  . ' ' . $state;
                    $new_fulladress = str_replace(' ', '+', $fulladress);
                    ?>

                        <div class="coordonees-item">
                            <p class="coordonees-item-province">
                                <?php the_sub_field('province'); ?>
                            </p>
                            <div class="coordonees-item-content">
                            <div class="coordonees-item-coordonees">
                                <a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $new_fulladress; ?>&travelmode=driving" target="_blank">
                                <p><?php the_sub_field('addresse'); ?></p>
                                <p><?php the_sub_field('localite'); ?></p>
                                 </a>
                            </div>

                            <div class="coordonees-item-tel-email">
                                <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a><br />
                                <a href="tel:<?php the_sub_field('telephone'); ?>"><?php the_sub_field('telephone'); ?></a>
                            </div>

                            </div>

                            <?php
                           if( get_sub_field('ajouter_un_bloc_de_donnees_supplementaire')) : ?>
                                <div class="extra-infos">
                                    <p><?php the_sub_field('contenu_supplementaire');?></p>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

            <div class="footer-socials">
                <p class="social-titre"><?php the_field('social-titre', 'option'); ?></p>
                <div class="footer-socials-wrapper">
                    <?php while (have_rows('reseaux_sociaux', 'option')) : the_row(); ?>
                        <a class="social-item-a" href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener"><img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/social-<?php echo sanitize_title(get_sub_field('nom')); ?>.svg" alt="<?php the_sub_field('nom'); ?>"></a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="autres-sites-febecoop">
            <p class="autres-sites-titre"><?php the_field('autres-sites-titre', 'option'); ?></p>
            <div class="autres-sites-wrapper">
                <?php while (have_rows('autres-sites', 'option')) : the_row(); ?>
                    <a class="autre-site" href="<?php the_sub_field('url'); ?>" rel="noopener"><?php the_sub_field('nom_du_site'); ?></a>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="footer-bottom">
            <?php get_template_part('./src/TEMPLATES/Footer/bottom-footer-menu'); ?>
            <a id="footer-bottom-created-by-id" href="https://atelierdesign.be/" target="_blank" rel="noopener"><?php pll_e('Réalisé par AD');?></a>
        </div>
        </div>
    </div>
</footer>

<?php wp_footer() ?>
</body>

</html>