<?php

/**
 * 
 * 
 * 
 */
get_header();
$post_type_obj = get_post_type_object( 'projet-accompagnes' );
$post_type = $post_type_obj->labels->singular_name; 
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-e">
    <div class="hero-section-type-e-wrapper grid">
        <div class="hero-section-type-e-content">
            <div class="hero-section-type-e-content-text">
                <div class="hero-section-type-e-content-toptitle-wrapper">
                <p class="hero-section-type-e-content-toptitle"><?php echo $post_type;?></p>
                </div>
                <h1><span><?php echo the_title(); ?></h1></span>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( './src/TEMPLATES/Common-multi/single-praktijkverhaal-part' );?>