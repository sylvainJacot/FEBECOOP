<section class="contact-banner-section">
<div class="contact-banner-section-deco-lines"></div>
    <picture class="contact-banner-illu-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/illu-contact-banner.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/illu-contact-banner-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/common/VECTOR/illu-contact-banner-mobile.svg" alt="example" />
    </picture>
    <div class="contact-banner-section-wrapper">

        <div class="contact-banner-content-wrapper grid">
            <div class="contact-banner-content-text">
                <h2><span><?php the_field('ban-cont-titre'); ?></span></h2>
                <p><?php the_field('ban-cont-texte'); ?></p>
            </div>
            <?php
            $link = get_field('ban-cont-bouton');
            if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a class="cta-a" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </div>

</section>