<?php
/**
 * Template Name: Equipe
 * 
 * 
 */
 get_header();
?>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-b fiche-outils-hero-section" id="equipe-hero-section">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EQUIPE/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
            <p class="hero-section-type-b-content-toptitle"><?php pll_e('À propos');?></p>
            <h1><span>
                <?php if ( get_field('titre_hero') ) : 
                    $maintitle = get_field('titre_hero'); 
                    $openmainttitle = str_replace('*break*','<br/>', $maintitle); echo $openmainttitle; else : the_title(); 
                endif; ?>
            </span> </h1>

            </div>
            <div class="hero-section-pic-wrapper">
            <?php 
            $image = get_field('illustration_hero');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            </div>
            </a>
    </div>
    </div>
</section>


<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
        <div class="hero-section-type-b-intro-content">
        <p><?php the_field('introduction-hero');?></p>
        </div>
</div>


<!-- MAIN TEAM MEMBERS  ==============
=========================== -->
<section class="team-members-section">

    <?php
// Get all the categories
$terms = get_terms( 'groupe_equipe' );

// Loop through all the returned terms
foreach ( $terms as $term ):

    // set up a new query for each category, pulling in related posts.
    $members = new WP_Query(
        array(
            'post_type' => ' team-members',
            'showposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'groupe_equipe',
                    'terms'     => array( $term->slug ),
                    'field'     => 'slug'
                )
            )
        )
    );
?>

<div class="team-members-row-item">
<div class="team-members-row-item-container grid">
<p class="team-members-row-item-title"><?php echo $term->name; ?></p>

<div class="team-members-row-item-wrapper">
<?php while ($members->have_posts()) : $members->the_post(); ?>
        <div class="team-member-item">

            <div class="team-member-item-picture">
            <span class="team-member-item-plus-icone-wrapper"><span class="team-member-item-plus-icone"></span></span>
            <?php
            $image = get_field('team-member-picture');
            if( $image ):

                // Image variables.
                $title = $image['title'];
                $alt = $image['alt'];

                // Thumbnail size attributes.
                $size = 'tm-pic-l';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
                ?>

                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />


            <?php endif; ?>

            </div>
            
            <div class="team-member-item-content">
                <div class="team-member-item-content-names">
                    <p class="team-member-item-content-fname"><?php the_field('prenom');?></p>
                    <p class="team-member-item-content-name"><?php the_field('nom');?></p>
                </div>
                <p class="team-member-item-content-function"><?php the_field('fonction');?></p>


                <div class="team-member-item-content-socials">
                <?php if( have_rows('reseaux_sociaux') ): ?>
                    <?php while( have_rows('reseaux_sociaux') ): the_row(); 

                        // Get sub field values.
                        $email = get_sub_field('tm-email');
                        $twitter = get_sub_field('tm-twitter');
                        $linkedin = get_sub_field('tm-linkedin');

                        ?>
                        <?php if ($email): ?>
                            <a class="team-member-item-social tmis-email" href="mailto:<?php echo $email;?>" target="_blank" ><?php echo $email;?></a>
                        <?php endif; ?>
                        <?php if ($twitter): ?>
                            <a class="team-member-item-social tmis-twitter" href="<?php echo $twitter;?>" target="_blank" >Twitter</a>
                        <?php endif; ?>
                        <?php if ($linkedin): ?>
                            <a class="team-member-item-social tmis-linkedin" href="<?php echo $linkedin;?>" target="_blank" >Linkedin</a>
                        <?php endif; ?>
                        
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
<?php endwhile; ?>
</div>
</div>
</div>
<?php
    // Reset things, for good measure
    $members = null;
    wp_reset_postdata();

// end the loop
endforeach;?>

</section>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>

<?php
get_footer();
?>