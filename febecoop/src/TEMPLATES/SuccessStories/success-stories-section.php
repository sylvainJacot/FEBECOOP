<section class="other-news-section">
    <div class="slider-wrapper-type-b  other-news-section-wrapper grid">
                
                <div class="slider-type-b-header">
                <h3><?php pll_e('Projets accompagnés');?></h3> 
                <a class="cta-d" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes" ><span><?php pll_e('Tous les projets accompagnés');?></span></a>
                </div>

                <div class="swiper-container slider-container-type-b js-type-b-swiper">
                <div class="swiper-wrapper slider-wrapper-type-b">
                    <?php get_template_part('./src/TEMPLATES/SuccessStories/succes-stories-random-loop');?>
                </div>
                <!-- Pagination pour mobile -->
                <div class="swiper-pagination-type-b js-swiper-pagination-type-b "></div>

                <a class="cta-b" href="<?php echo esc_url(home_url('/')); ?>projets-accompagnes" ><?php pll_e('Tous les projets accompagnés');?></a>
    </div>
</section>