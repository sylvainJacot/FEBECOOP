<?php
/**
 * Template Name: Membres
 * 
 * 
 */
 get_header();
?>

<!-- HERO SECTION ==============
=========================== -->

<section class="hero-section-type-h">
    <div class="hero-section-type-h-wrapper grid">
        <div class="hero-section-type-h-content">
            <div class="hero-section-type-h-content-text">
                <p class="hero-section-type-h-content-toptitle"><?php pll_e('À propos');?></p>
                <h1><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    </div>
</section>



<!-- MAIN MEMBERS  ==============
=========================== -->
<section class="main-members-mandats-section">




<?php
// Get all the categories
$terms = get_terms( 'cat_nos_membres' );

// Loop through all the returned terms
foreach ( $terms as $term ):

    // set up a new query for each category, pulling in related posts.
    $members = new WP_Query(
        array(
            'post_type' => ' nos-membres',
            'showposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy'  => 'cat_nos_membres',
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
        <?php while ($members->have_posts()) : $members->the_post(); ?>

        <div class="main-members-mandats-section-row-item">

            <?php
            $image = get_field('nm-logo');
            if( $image ) {;

                // Image variables.
                $title = $image['title'];
                $alt = $image['alt'];

                // Thumbnail size attributes.
                $size = 'tm-pic-l';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
                ?>
                <div class="main-members-mandats-section-row-item-pic">
                <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                <span class="main-members-mandats-section-row-item-pic-filtre"></span>
                </div>

            <?php  } else  { ?>

                <div class="main-members-mandats-section-row-item-pic main-members-mandats-section-row-item-pic-placeholder">
                <svg width="299" height="281" viewBox="0 0 299 281" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M264.959 0.349609H33.787C15.153 0.349609 0 15.4976 0 34.1536V246.615C0 265.249 15.153 280.381 33.787 280.381H264.958C283.592 280.381 298.729 265.249 298.729 246.615V34.1536C298.73 15.4976 283.593 0.349609 264.959 0.349609ZM193.174 50.6226C211.194 50.6226 225.808 65.2376 225.808 83.2566C225.808 101.276 211.193 115.891 193.174 115.891C175.149 115.891 160.54 101.276 160.54 83.2566C160.54 65.2376 175.149 50.6226 193.174 50.6226ZM254.363 249.149H49.039C40.026 249.149 36.012 242.628 40.075 234.583L96.081 123.653C100.139 115.609 107.873 114.891 113.35 122.048L169.666 195.644C175.143 202.802 184.716 203.411 191.052 196.998L204.829 183.047C211.16 176.634 220.488 177.428 225.655 184.809L261.33 235.768C266.487 243.16 263.376 249.149 254.363 249.149Z" fill="#010002"/>
                </svg>
                </div>
                    
            <?php };?>


            <div class="main-members-mandats-section-row-item-content">
                <p class="main-members-mandats-section-row-item-text">
                    <span><?php the_field('nm-nom');?>:</span>
                    <?php the_field('nm-description');?>
                </p>
                <a class="cta-c" href="https://<?php the_field('nm-url');?>" target="_blank"><?php the_field('nm-url');?></a>
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