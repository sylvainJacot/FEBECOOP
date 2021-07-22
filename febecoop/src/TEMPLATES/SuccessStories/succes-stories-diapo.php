<section class="other-news-section other-news-succes-stories" id="<?php echo $id;?>">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
                
                <div class="slider-type-b-header">
                <h3><?php pll_e('Projets accompagnés');?></h3>
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes" ><?php pll_e('Tous les projets accompagnés');?></a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">
                    <?php
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'projet-accompagnes',
                            'orderby' => 'date',
                            'posts_per_page' => -1
                        )
                    );
                    ?>

                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="swiper-slide">
                    <?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-card');?>
                    </div>

                    <?php endwhile;
                    wp_reset_query(); ?>
                </div>
                <!-- Pagination pour mobile -->
                <div class="swiper-pagination-type-b js-swiper-pagination-type-b "></div>

                <!-- Buttons pour laptop -->
                <div class="swiper-buttons-wrapper swiper-buttons-type-b">
                    <div class="swiper-button-prev swiper-button-prev-type-a js-button-prev-actus">
                    </div>
                    <div class="swiper-button-next swiper-button-next-type-a js-button-next-actus"></div>
                    </div>
                </div>
                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes" ><?php pll_e('Tous les projets accompagnés');?></a>
    </div>
</section>