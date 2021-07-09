<?php

/**
 * 
 * 
 * 
 */
get_header();
// <!-- get the current taxonomy term -->
$terms = get_terms( 'categories_actualites' );
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-g">
  <div class="hero-section-type-g-wrapper grid">
    <div class="hero-section-type-g-content">
      <div class="hero-section-type-g-content-text">
        <h1><span><?php the_field('titre_de_la_page'); ?></h1></span>
      </div>

      <div class="hero-section-type-g-content-filtres filtres-type-a-container js-filtres-type-a-container">
        <p class="filtres-type-a-title"><?php pll_e('Filtrer par');?></p>
        <ul class="filtres-types-a-filtres-container js-filtres-types-a-filtres-container">

          <?php foreach ($terms as $tag) :?>
            <?php $term_link = get_term_link( $tag );?>
            <li class="filtres-types-a-filtre"><a href="<?php echo esc_url( $term_link );?>"><?php echo $tag->name;?></a></li>
          <?php endforeach;?>
        </ul>
      </div>

    </div>
  </div>
</section>


<!-- ACTUALITES ==============
=========================== -->
<section class="actualites-section">
  <div class="actualites-section-wrapper grid">
    <div class="actualites-container" id="actualites-container">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <a href="<?php the_permalink(); ?>" style="opacity: 0; transition: opacity 1s;"class="swiper-slide  card-type-b-item card-type-b-item-row-actu">
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
        <p class="cta-c">Lire plus</p>
    </div>
</a>


        <?php endwhile; ?>

      <?php endif; ?>


    </div>


  </div>

  <a class="cta-a" id="loadmore"><?php pll_e('Voir plus');?></a>

</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<?php
get_footer();
?>