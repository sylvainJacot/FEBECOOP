<?php
function projet_accompagnes_scripts() {
    // Register the script
    wp_register_script( 'laodmore_projet_acc_scrip', get_stylesheet_directory_uri(). '/src/JS/loadmoreposts_projetsacc.js', array('jquery'), false, true );
 
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'laodmore_projet_acc_scrip', 'blog', $script_data_array );
 
    // Enqueued script with localized data.
    wp_enqueue_script( 'laodmore_projet_acc_scrip' );
}
add_action( 'wp_enqueue_scripts', 'projet_accompagnes_scripts' );

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');


function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args =
    array(
        'post_type' => 'projet-accompagnes',
        'posts_per_page' => 6,
        'paged' => $paged 
    );
$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()) : ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="card-type-b-item">
            <div class="card-type-b-pic-wrapper">
                <?php
                $image = get_field('projet-image-hero');
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
            <div class="card-type-b-content">
                <p class="card-type-b-chapeau"><?php the_title() ?></p>
                <?php if (get_field('projet-description')) : ?>
                    <p class="card-type-b-resume"><?php the_field('projet-description') ?></p>
                <?php else : ?>

                    <?php if (have_rows('contenu-flexible')) : while (have_rows('contenu-flexible')) : the_row(); ?>
                            <?php if (get_row_layout() == 'introduction-principale') :

                                $txt = get_sub_field('introduction');
                            ?>
                                <p class="card-type-b-resume"><?php echo $txt; ?></p>

                            <?php endif; ?>
                    <?php endwhile;
                    endif; ?>
                <?php endif; ?>
                <p class="cta-c">Lire plus</p>
            </div>
        </a>

    <?php endwhile; ?>



    <!-- <div id="more_posts">Load More</div> -->

<?php endif; 
 
    wp_die();
}
?>