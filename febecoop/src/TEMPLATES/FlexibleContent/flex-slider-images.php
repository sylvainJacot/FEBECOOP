<?php if(get_row_layout() == 'diaporama_images') : ?>


<div class="swiper-container swiper-container-type-b swiper-container-type-b-<?php $sV++; echo $sV; ?> ">
<div class="swiper-wrapper">
    <?php if( have_rows('diapos') ): ?>
        <?php while( have_rows('diapos') ): the_row(); 

            $image = get_sub_field('image');

            ?>

            <div class="swiper-slide swiper-slide-type-c">
            <?php if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            </div>


        <?php endwhile; ?>

    <?php endif; ?>
</div>
    <!-- PAGINATION -->
    <div class="swiper-pagination swiper-pagination-numbers-type-b swiper-pagination-numbers-type-b-<?php echo $sV; ?>"></div>
    <!-- NAV -->
    <div class="swiper-buttons-wrapper swiper-buttons-type-c">
        <div class="swiper-button-prev swiper-button-prev-c swiper-button-prev-c-<?php echo $sV; ?>"></div>
        <div class="swiper-button-next swiper-button-next-c swiper-button-next-c-<?php echo $sV; ?>"></div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript">
            
        const FlexPicturesSwiper = new Swiper(".swiper-container-type-b-<?php echo $sV; ?>", 
        {
            direction: "horizontal",
            visibilityFullFit: true,
            slidesPerView: 1,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            navigation: {
                prevEl: ".swiper-button-prev-c-<?php echo $sV; ?>",
                nextEl: ".swiper-button-next-c-<?php echo $sV; ?>",
            },
            pagination: {
                el: ".swiper-pagination-numbers-type-b-<?php echo $sV; ?>",
                type: "fraction",
            },
        });

    </script>

</div>
<?php endif;?>


