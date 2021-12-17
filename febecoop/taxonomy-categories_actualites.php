<?php

/**
 * 
 * 
 * 
 */
get_header();

// DIFFRENCE AVEC LE NL? LE "VOIR PLUS" EN MEER TONEN

// Checker 
// archive-actualites.php
//taxonomy-categories_actualites.php

// <!-- get the current taxonomy term -->
$terms = get_terms('categories_actualites');
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-g actualite-template-hero-section">
  <div class="hero-section-type-g-wrapper grid">
    <div class="hero-section-type-g-content">
      <div class="hero-section-type-g-content-text">
        <h1><span><?php the_field('titre_de_la_page'); ?></h1></span>
      </div>

      <div class="hero-section-type-g-content-filtres filtres-type-a-container js-filtres-type-a-container">
        <p class="filtres-type-a-title"><?php pll_e('Filtrer par'); ?></p>

        <ul class="filtres-types-a-filtres-container" id="js-filtres-types-a-filtres-container">

          <?php foreach ($terms as $tag) : ?>
            <?php $term_link = get_term_link($tag); ?>
            <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>"><?php echo $tag->name; ?></a></li>
          <?php endforeach; ?>

        </ul>

      </div>

      <p class="reset-cta reset-filter" style="display: none;"></p>
    </div>
  </div>
</section>


<!-- ACTUALITES ==============
=========================== -->
<section class="actualites-section">
  <div class="actualites-section-wrapper js-actualites-section-wrapper grid" id="js-actualites-section-wrapper">
    <div class="actualites-container js-actualites-container">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="swiper-slide card-type-b-item card-type-b-item-row-actu js-card-actus">
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
              <p class="cta-c"><span><?php pll_e('Lire plus'); ?></span></p>
            </div>
          </a>


        <?php endwhile; ?>

      <?php endif; ?>

      <?php
      next_posts_link(('<span class="cta-a" id="loadmore-actu">'.pll__('Voir plus').'</span>'));
      ?>

    </div>

  </div>

</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>

<?php
get_footer();
?>