<?php

/**
 * Template Name: Prises de positions
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
                <h1><span><?php the_title(); ?></span></h1>
            </div>
        </div>
    </div>
</section>


<!-- PRISES DE POSITIONS LOOP ==============
=========================== -->
<section class="prises-positions-loop-section">
<div class="prises-positions-loop-section grid">

<?php

      $loop = new WP_Query(
        array(
          'post_type' => 'our-views',
          'posts_per_page' => -1,
        )
      );
      ?>
      <?php if ($loop->have_posts()) : ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

          
        <a href="<?php the_permalink(); ?>" class="card-type-b-item card-type-b-item-row-actu">
                <div class="card-type-b-pic-wrapper">
                <?php
                $image = get_field('actu-hero-image');
                if (!empty($image)) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="card-type-b-content">
                <p class="card-type-b-date"><?php echo get_the_date('d/m/Y'); ?></p>
                <p class="card-type-b-chapeau"><?php the_title(); ?></p>
                <p class="cta-c"><span><?php pll_e('Lire plus');?></span></p>
                </div>
        </a>


      <?php endwhile;?>
      <?php endif; ?>
  
</div>
</section>



<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner-options"); ?>


<?php
get_footer();
?>