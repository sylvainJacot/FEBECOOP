<?php

/**
 * Template Name: Mediatheques
 * 
 * 
 */
get_header();
?>

<!-- HERO SECTION ==============
=========================== -->
<div class="overflow-x" style="overflow-x: hidden;">
<section class="hero-section-type-b" id="mediatheque-hero-section">
    <picture class="hero-section-type-waves-container">
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)" />
        <source srcset="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)" />
        <img src="<?php echo get_template_directory_uri(); ?>/src/ASSETS/IMAGES/NOTES-OUTILS/VECTOR/illu-wave-mobile.svg" alt="example" />
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
                <p class="hero-section-type-b-content-toptitle"><?php pll_e('Médiathèques');?></p>
                <h1><span>
                        <?php if (get_field('titre_hero')) :
                            $maintitle = get_field('titre_hero');
                            $openmainttitle = str_replace('*break*', '<br/>', $maintitle);
                            echo $openmainttitle;
                        else : the_title();
                        endif; ?>
                    </span></h1>
            </div>
            <div class="hero-section-pic-wrapper">
                <?php
                $image = get_field('illustration_hero');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            </a>
        </div>
    </div>
</section>
</div>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero'); ?></p>
        <?php if (get_field('ajout_de_petit_texte_a_lintroduction_')) :?>
        <p class="hero-section-type-b-petite-intro"><?php the_field('texte_supplementaire_introduction');?></p>
        <?php endif;?>
    </div>
</div>


<!-- PUBLICATION STAR ==============
=========================== -->
<section class="mediatheque-publication-star-section">
    <div class="mediatheque-publication-star-wrapper grid">



            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
            <?php

            $args = array(
                'post_type' => 'publications',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'paged' => $paged,
            ); ?>


            <?php
            $loop = new WP_Query($args);
            if ($loop->have_posts()) { ?>

                <?php
                while ($loop->have_posts()) : $loop->the_post(); ?>

                    <a class="mediatheque-publication-star-item" href="<?php echo get_permalink(); ?>">
                    <!-- <div class="mediatheque-publication-star-item-content-pic"> -->
                        <?php
                        $image = get_field('publication-image-couverture');
                        if (!empty($image))  {?>
                            <img src="<?php echo esc_url($image['url']); ?>" class="mediatheque-publication-star-item-content-pic" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php } else { ?>

                                
                                <!-- <div class="mediatheque-publication-star-item-content-pic-placeholder">
                                    <svg width="299" height="281" viewBox="0 0 299 281" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M264.959 0.349609H33.787C15.153 0.349609 0 15.4976 0 34.1536V246.615C0 265.249 15.153 280.381 33.787 280.381H264.958C283.592 280.381 298.729 265.249 298.729 246.615V34.1536C298.73 15.4976 283.593 0.349609 264.959 0.349609ZM193.174 50.6226C211.194 50.6226 225.808 65.2376 225.808 83.2566C225.808 101.276 211.193 115.891 193.174 115.891C175.149 115.891 160.54 101.276 160.54 83.2566C160.54 65.2376 175.149 50.6226 193.174 50.6226ZM254.363 249.149H49.039C40.026 249.149 36.012 242.628 40.075 234.583L96.081 123.653C100.139 115.609 107.873 114.891 113.35 122.048L169.666 195.644C175.143 202.802 184.716 203.411 191.052 196.998L204.829 183.047C211.16 176.634 220.488 177.428 225.655 184.809L261.33 235.768C266.487 243.16 263.376 249.149 254.363 249.149Z" fill="#010002"/>
                                    </svg>
                                </div> -->

                                <?php }?>
                    <!-- </div> -->

                    <div class="mediatheque-publication-star-item-content">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('resume'); ?></p>
                        <p class="cta-a" href="<?php the_permalink(); ?>"><?php pll_e('Découvrir');?></p>
                    </div>

                     </a>


                <?php endwhile; ?>


                <?php wp_reset_postdata() ?>

        <?php };?>



    </div>
</section>


<!-- PUBLICATION CATEGORIES ==============
=========================== -->
<section class="mediatheque-publications-categrories-section">
    <div class="mediatheque-publications-categrories-wrapper grid" > 


    <?php if( have_rows('publications_a_telecharger') ): ?>
    <?php while( have_rows('publications_a_telecharger') ): the_row(); ?>
        <div class="mediatheque-publications-categrory-item" id="cat-<?php echo get_row_index(); ?>">

            <div class="mediatheque-publications-categrory-item-header-wrapper">
                <div class="mediatheque-publications-categrory-item-header-top">
                    <div class="pentagone-icons-wrapper">
                        <?php
                        $field = get_sub_field_object('general-couleur');
                        $value = $field['value'];
                        $label = $field['choices'][$value]; 
                        $image = get_sub_field('general-icone');
                        if (!empty($image)) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>

                        <span class="main-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
                            </svg></span>
                        <span class="secondary-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
                            </svg></span>

                    </div>
                    <h2><?php the_sub_field('nom_de_la_categorie');?></h2>
                    <div class="mediatheque-publications-categrory-item-header-content">

                    <p><?php the_sub_field('description_de_la_categorie');?></p>

                    </div>
                </div>
            </div>

            <ul class="mediatheque-publications-categrory-item-links" >
            <?php if( have_rows('fichier_a_telecharger') ): ?>
            <?php while( have_rows('fichier_a_telecharger') ): the_row();


                $fichier = get_sub_field('fichier');
                $titrefichier = get_sub_field('titre_du_fichier');

            ?>
            <li class="mediatheque-publications-categrory-item-link-item">
                <a href="<?php echo $fichier; ?>"download="<?php echo $titrefichier;?>"><?php echo $titrefichier;?></a>
            </li>

            <?php endwhile; ?>
            <?php endif; ?>

            </ul>
            <a class="cta-c"><span><?php pll_e('Voir plus');?></span></a>

        </div>
    <?php endwhile; ?>



<?php endif; ?>

<!-- bouton voir + -->

    </div>
</section>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>



<script>

let CtasLoadMore = document.querySelectorAll('.mediatheque-publications-categrory-item .cta-c');

CtasLoadMore.forEach((cta) => {
    let currentItems = 5;
    const previousNode = cta.previousSibling;
    const parentNode = previousNode.parentElement;
    const files =  parentNode.querySelectorAll('.mediatheque-publications-categrory-item-link-item');
    console.log(files);

    if (currentItems >= files.length) {
        cta.style.display = 'none';
        }
    
    cta.addEventListener('click', (e) => {
        e.preventDefault;

        for (let i = currentItems; i < currentItems + 3; i++) {
            if (files[i]) {
                files[i].classList.add('mediatheque-publications-categrory-item-link-item-visible');
            }
        }
        currentItems += 5;

        if (currentItems >= files.length) {
            e.target.style.display = 'none';
        }

    })
})


</script>

<?php
get_footer();
?>