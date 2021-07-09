<?php
function actualites_scripts() {
    // Register the script
    wp_register_script( 'loadmore_actualites_script', get_stylesheet_directory_uri(). '/src/JS/loadmoreposts_actualites.js', array('jquery'), false, true );
 
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'loadmore_actualites_script', 'blog', $script_data_array );
 
    // Enqueued script with localized data.
    wp_enqueue_script( 'loadmore_actualites_script' );
}
add_action( 'wp_enqueue_scripts', 'actualites_scripts' );

add_action('wp_ajax_load_posts_by_ajax', 'load_actus_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_actus_by_ajax_callback');


function load_actus_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $loop = new WP_Query(
      array(
        'post_type' => 'actualites',
        'posts_per_page' => 6,
        'paged' => $paged
      )
    );
    ?>
    <?php if ($loop->have_posts()) : ?>
      <?php while ($loop->have_posts()) : $loop->the_post(); ?>

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
      <p class="cta-c">Lire plus</p>
  </div>
</a>


      <?php endwhile; ?>

      <!-- <a class="cta-a actualites_loadmore">Voir plus</a> -->

    <?php endif; 
 
    wp_die();
}
?>