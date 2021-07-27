<div class="team-member-item">

<?php
$image = get_field('team-member-picture');
if ($image) {; ?>

    <div class="team-member-item-picture">

    <div class="team-member-item-content-socials team-member-item-content-socials-laptop">
        <?php if (have_rows('reseaux_sociaux')) : ?>
            <?php while (have_rows('reseaux_sociaux')) : the_row();

                // Get sub field values.
                $email = get_sub_field('tm-email');
                $twitter = get_sub_field('tm-twitter');
                $linkedin = get_sub_field('tm-linkedin');

            ?>
                <?php if ($email) : ?>
                    <a class="team-member-item-social tmis-email" href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a>
                <?php endif; ?>
                <?php if ($twitter) : ?>
                    <a class="team-member-item-social tmis-twitter" href="<?php echo $twitter; ?>" target="_blank">Twitter</a>
                <?php endif; ?>
                <?php if ($linkedin) : ?>
                    <a class="team-member-item-social tmis-linkedin" href="<?php echo $linkedin; ?>" target="_blank">Linkedin</a>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

        <span class="team-member-item-plus-icone-wrapper"><span class="team-member-item-plus-icone"></span></span>

        <?php
        // Image variables.
        $title = $image['title'];
        $alt = $image['alt'];

        // Thumbnail size attributes.
        $size = 'tm-pic-l';
        $thumb = $image['sizes'][$size];
        $width = $image['sizes'][$size . '-width'];
        $height = $image['sizes'][$size . '-height'];
        ?>

        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
    </div>

<?php } else { ?>

    <div class="team-member-item-picture team-member-item-picture-placeholder">
    <span class="team-member-item-plus-icone-wrapper"><span class="team-member-item-plus-icone"></span></span>
    <div class="team-member-item-content-socials team-member-item-content-socials-laptop">
        <?php if (have_rows('reseaux_sociaux')) : ?>
            <?php while (have_rows('reseaux_sociaux')) : the_row();

                // Get sub field values.
                $email = get_sub_field('tm-email');
                $twitter = get_sub_field('tm-twitter');
                $linkedin = get_sub_field('tm-linkedin');

            ?>
                <?php if ($email) : ?>
                    <a class="team-member-item-social tmis-email" href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a>
                <?php endif; ?>
                <?php if ($twitter) : ?>
                    <a class="team-member-item-social tmis-twitter" href="<?php echo $twitter; ?>" target="_blank">Twitter</a>
                <?php endif; ?>
                <?php if ($linkedin) : ?>
                    <a class="team-member-item-social tmis-linkedin" href="<?php echo $linkedin; ?>" target="_blank">Linkedin</a>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

        <svg width="1536" height="1536" viewBox="0 0 1536 1536" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="placeholder-profil-picture-paths" d="M768 950.7C925.567 950.7 1053.3 822.967 1053.3 665.4C1053.3 507.833 925.567 380.1 768 380.1C610.433 380.1 482.7 507.833 482.7 665.4C482.7 822.967 610.433 950.7 768 950.7Z" fill="black" />
            <path class="placeholder-profil-picture-paths" d="M768 0C1191.5 0 1536 344.5 1536 768C1536 982.2 1447.9 1176.1 1306 1315.6C1293.4 1270.7 1274.5 1227.9 1249.8 1188C1220.4 1140.5 1183.5 1098.6 1140.1 1063.2C1096.4 1027.5 1047.4 999.8 994.6 980.6C963.7 969.4 931.8 961.3 899.4 956.4C934.1 940.7 966 918.7 993.7 891.1C1054 830.8 1087.1 750.7 1087.1 665.5C1087.1 580.3 1053.9 500.2 993.7 439.9C933.4 379.6 853.3 346.5 768.1 346.5C682.9 346.5 602.8 379.7 542.5 439.9C482.2 500.1 449 580.2 449 665.4C449 750.6 482.2 830.7 542.4 891C570.1 918.7 602 940.7 636.7 956.3C604.3 961.2 572.4 969.3 541.5 980.5C488.7 999.6 439.7 1027.4 396 1063.1C352.6 1098.4 315.7 1140.4 286.3 1187.9C261.5 1227.8 242.7 1270.6 230.1 1315.5C88.1 1176.2 0 982.2 0 768C0 344.5 344.5 0 768 0Z" fill="black" />
            <path class="placeholder-profil-picture-paths" d="M823.7 984.5C1038.4 984.5 1227.8 1134.2 1277.9 1341.8C1142.2 1462.6 963.5 1536 768 1536C572.5 1536 393.8 1462.6 258.1 1341.8C308.2 1134.1 497.6 984.4 712.3 984.4H823.7V984.5Z" fill="black" />
        </svg>
    </div>

<?php }; ?>



<div class="team-member-item-content">
    <div class="team-member-item-content-names">
        <p class="team-member-item-content-fname"><?php the_field('prenom'); ?></p>
        <p class="team-member-item-content-name"><?php the_field('nom'); ?></p>
    </div>
    <p class="team-member-item-content-function"><?php the_field('fonction'); ?></p>


    <div class="team-member-item-content-socials team-member-item-content-socials-mobile">
        <?php if (have_rows('reseaux_sociaux')) : ?>
            <?php while (have_rows('reseaux_sociaux')) : the_row();

                // Get sub field values.
                $email = get_sub_field('tm-email');
                $twitter = get_sub_field('tm-twitter');
                $linkedin = get_sub_field('tm-linkedin');

            ?>
                <?php if ($email) : ?>
                    <a class="team-member-item-social tmis-email" href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email; ?></a>
                <?php endif; ?>
                <?php if ($twitter) : ?>
                    <a class="team-member-item-social tmis-twitter" href="<?php echo $twitter; ?>" target="_blank">Twitter</a>
                <?php endif; ?>
                <?php if ($linkedin) : ?>
                    <a class="team-member-item-social tmis-linkedin" href="<?php echo $linkedin; ?>" target="_blank">Linkedin</a>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
</div>