<?php
/**
 * Template Name: Expertises
 * 
 * 
 */
 get_header();
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-b fiche-outils-hero-section" id="fiche-outils-hero-section'">
    <picture class="hero-section-type-waves-container">
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EXPERTISES/VECTOR/illu-wave-desktop.svg" media="(min-width: 1300px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EXPERTISES/VECTOR/illu-wave-laptop.svg" media="(min-width: 1025px)"/>
    <source srcset="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EXPERTISES/VECTOR/illu-wave-tablet.svg" media="(min-width: 768px)"/>
    <img src="<?php echo get_template_directory_uri(  );?>/src/ASSETS/IMAGES/EXPERTISES/VECTOR/illu-wave-mobile.svg" alt="example"/>
    </picture>
    <div class="hero-section-type-b-wrapper grid">
        <div class="hero-section-type-b-content">
            <div class="hero-section-type-b-content-text">
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


<!-- EXPERTISES LOOP ==============
=========================== -->
<section class="expertises-loop-section">
<div class="expertises-wrapper grid">

<?php

      $loop = new WP_Query(
        array(
          'post_type' => 'domaines-expertises',
          'posts_per_page' => -1,
        )
      );
      ?>
      <?php if ($loop->have_posts()) : ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

          
      <a href="<?php echo the_permalink();?>" class="card-type-a">

      <div class="card-type-a-header">
      <?php get_template_part('./src/TEMPLATES/PentagoneShape/pentagone-shape');?>



      <h3><?php the_title(); ?></h3>

      </div>

      <div class="card-type-a-content">
          <p class="card-type-a-content-txt"><?php the_field('resume') ?></p>
          <p class="cta-flex-a"><?php pll_e('En savoir plus');?></p>
      </div>
        </a>


      <?php endwhile;?>
      <?php endif; ?>
  
</div>
</section>

<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<?php
get_footer();
?>