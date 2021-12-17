
<!-- ACTUALITES ==============
=========================== -->
<section class="actualites-section">
  <div class="actualites-section-wrapper js-actualites-section-wrapper grid" id="js-actualites-section-wrapper">
    <div class="actualites-container js-actualites-container" id="js-actualites-container">


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

      <?php endif;
      wp_reset_postdata(); ?>

      <?php

      next_posts_link(('<span class="cta-a" id="loadmore-actu">Voir plus</span>'), $loopActus->max_num_pages);

      ?>

    </div>

  </div> 

</section>