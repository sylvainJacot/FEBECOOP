<?php
$featured_posts = get_field('projets_accompagnes');


if ($featured_posts) : ?>

    <?php $featured_posts_count = count($featured_posts); ?>
    <!-- START 1 POST SELECTED -- IF ONLY 1 POST SELECTED -->
    <?php if ($featured_posts_count === 1) : ?>

        <?php foreach ($featured_posts as $post) :
            $post_terms = get_the_terms($post, 'projet_accompagne_cat');
            setup_postdata($post); ?>
            <div class="swiper-slide">
                <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>

        <?php endforeach; ?>

        <?php
        $loop2posts = new WP_Query(
            array(
                'post_type' => 'praktijkverhaal',
                'post__not_in' =>  array(get_the_ID($featured_posts)),
                'orderby' => 'rand',
                'posts_per_page' => 2,
                'tax_query' => [
                    'taxonomy'  => 'projet_accompagne_cat',
                    'terms' =>  array($post_terms->slug),
                    'field'     => 'slug'
                ]
            )
        );
        ?>

        <?php while ($loop2posts->have_posts()) : $loop2posts->the_post(); ?>
            <div class="swiper-slide">
                <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>

        <?php endwhile;
        wp_reset_query(); ?>




        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>

        <!-- END 1 POST SELECTED -- IF ONLY 1 POST SELECTED -->


        <!-- START 2 POST SELECTED -- IF ONLY 2 POSTS SELECTED -->
    <?php elseif ($featured_posts_count === 2) : ?>

        <?php foreach ($featured_posts as $post) :
            $post_terms = get_the_terms($post, 'projet_accompagne_cat');
            setup_postdata($post); ?>
            <div class="swiper-slide">
                <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>

        <?php endforeach; ?>

        <?php
        $loop1post = new WP_Query(
            array(
                'post_type' => 'praktijkverhaal',
                'post__not_in' =>  array(get_the_ID($featured_posts)),
                'orderby' => 'rand',
                'posts_per_page' => 1,
                'tax_query' => [
                    'taxonomy'  => 'projet_accompagne_cat',
                    'terms' =>  array($post_terms->slug),
                    'field'     => 'slug'
                ]
            )
        );
        ?>

        <?php while ($loop1post->have_posts()) : $loop1post->the_post(); ?>
            <div class="swiper-slide">
                <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>

        <?php endwhile;
        wp_reset_query(); ?>




        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>

        <!-- END 2 POST SELECTED -- IF ONLY 2 POSTS SELECTED -->

        <!-- START 2 POST SELECTED -- IF ONLY 2 POSTS SELECTED -->
    <?php else : ?>

        <?php foreach ($featured_posts as $post) :
            $post_terms = get_the_terms($post, 'projet_accompagne_cat');
            setup_postdata($post); ?>
            <div class="swiper-slide">
                <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
            </div>

        <?php endforeach; ?>


        <!-- END 3 POSTS SELECTED -- IF ONLY 3 POSTS SELECTED -->


    <?php endif; ?>

<?php else : ?>

    <?php
    $looppost = new WP_Query(
        array(
            'post_type' => 'praktijkverhaal',
            'orderby' => 'rand',
            'posts_per_page' => 3,
        )
    );
    ?>

    <?php while ($looppost->have_posts()) : $looppost->the_post(); ?>
        <div class="swiper-slide">
            <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card'); ?>
        </div>

    <?php endwhile;
    wp_reset_query(); ?>


    <?php
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>

    <!-- END 0 POSTS SELECTED -- IF ONLY 0 POSTS SELECTED -->
<?php endif; ?>