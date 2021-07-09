<?php
/**
 * Template Name: Mandats
 * 
 * 
 */
 get_header();
?>
<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-c accompagnement-conseil-hero-section">
    <div class="hero-section-type-c-wrapper grid">
        <div class="hero-section-type-c-content hero-section-type-c-content-no-pic hero-section-type-c-content-no-shape">
            <div class="hero-section-type-c-content-text">
                <p class="hero-section-type-c-content-toptitle"><?php pll_e('À propos');?></p>
                <h1><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php echo the_field('introduction'); ?></p>
    </div>
</div>



<!-- MAIN MEMBERS  ==============
=========================== -->
<section class="main-members-mandats-section">

<?php
// Get all the categories
$terms = get_terms( 'cat_nos_mandats' );

// Loop through all the returned terms
foreach ( $terms as $term ):

    // set up a new query for each category, pulling in related posts.
    $mandats = new WP_Query(
        array(
            'post_type' => 'nos-mandats',
            'showposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'cat_nos_mandats',
                    'terms'     => array( $term->slug ),
                    'field'     => 'slug'
                )
            )
        )
    );
?>

<div class="main-members-mandats-section-row">
<div class="main-members-mandats-section-row-wrapper grid">

<p class="main-members-mandats-section-row-title"><?php echo $term->name; ?></p>
<p class="main-members-mandats-section-row-subtitle"><?php echo $term->description; ?></p>


<div class="main-members-mandats-section-row-grid">
        <?php while ($mandats->have_posts()) : $mandats->the_post(); ?>

        <div class="main-members-mandats-section-row-item">
            <div class="main-members-mandats-section-row-item-pic">
            <?php
            $image = get_field('nm-logo');
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
            <span class="main-members-mandats-section-row-item-pic-filtre"></span>
            </div>

            <div class="main-members-mandats-section-row-item-content">
                <p class="main-members-mandats-section-row-item-text">
                    <span><?php the_field('nm-nom');?>:</span>
                    <?php the_field('nm-description');?>
                </p>
                <a class="cta-e" href="https://<?php the_field('nm-url');?>" target="_blank"><?php the_field('nm-url');?></a>
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