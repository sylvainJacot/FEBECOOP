<?php

/**
 * Template Name: Actualites
 * 
 * 
 */
get_header();
// <!-- get the current taxonomy term -->
$terms = get_terms('categories_actualites');
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
        <p class="filtres-type-a-title"><?php pll_e('Filtrer par'); ?></p>

        <ul class="filtres-types-a-filtres-container" id="js-filtres-types-a-filtres-container">

          <?php foreach ($terms as $tag) : ?>
            <?php $term_link = get_term_link($tag); ?>
            <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>"><?php echo $tag->name; ?></a></li>
          <?php endforeach; ?>

        </ul>

      </div>

    </div>
  </div>
</section>


<!-- ACTUALITES ==============
=========================== -->
<section class="actualites-section">
  <div class="actualites-section-wrapper grid">
    <div class="actualites-container" id="js-actualites-container">
      <?php
      // set the "paged" parameter (use 'page' if the query is on a static front page)
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      
      $loopActus = new WP_Query(
        array(
          'post_type' => 'actualites',
          'status' => 'published', 
          'posts_per_page' => 3,
          'orderby'	=> 'post_date',
          'order'         => 'DESC',
          'paged' => $paged
        )
      );
      ?>
      <?php if ($loopActus->have_posts()) : ?>
        <?php while ($loopActus->have_posts()) : $loopActus->the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="swiper-slide  card-type-b-item card-type-b-item-row-actu">
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
              <p class="cta-c"><?php pll_e('Lire plus'); ?></p>
            </div>
          </a>


        <?php endwhile; ?>

        <?php
          if (  $loopActus->max_num_pages > 1 ) :?>
           <?php  next_posts_link( __( 'Older Entries' ), $loopActus->max_num_pages );?>
          <?php endif;?>


        <!-- <a class="cta-a" id="actualites_loadmore"><?php pll_e('Voir plus'); ?></a> -->

      <?php endif;
      wp_reset_postdata(); ?>


    </div>


  </div>

  <!-- <a class="cta-a" id="loadmore">Voir plus</a> -->

</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<?php
get_footer();
?>