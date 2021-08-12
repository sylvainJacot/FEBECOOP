<!-- <link rel='stylesheet' id='fancybox-css'  href='https://www.sothebysrealty.be/wp-content/themes/sothebys-theme/css/jquery.fancybox.min.css?ver=186041' type='text/css' media='all' />
<script type='text/javascript' src='https://www.sothebysrealty.be/wp-content/themes/sothebys-theme/js/jquery.fancybox.min.js?ver=5.8' id='fancybox-js'></script> -->
<?php 
 if(get_row_layout() == 'video_youtube') : ?>
<div class="flex-video">
    <div class="video-cont"> 
        <div class="videoOverlay open-video-player" data-ytid="<?php the_sub_field('video_link') ?>">
            <img src="https://img.youtube.com/vi/<?php the_sub_field('video_link') ?>/sddefault.jpg" alt="" />
            <span></span>
        </div>
    </div>
</div>

<!-- Vimeo -->
<a data-fancybox data-src="<?php the_sub_field('video_link') ?>" class="flex-video-container">
<div class="flex-video-thumbnail-wrapper">
  <img src="https://img.youtube.com/vi/<?php the_sub_field('id_video') ?>/sddefault.jpg"  class="flex-video-thumbnail"/>
  </div>
</a>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                <div class="video-player">
                    <div class="video-close"></div>
                    <div class="video-box"></div>
                    <div class="video-x anim-hover"></div>
                </div> -->
    <!-- <script>    
        $('.open-video-player').click(function(e) {
            e.preventDefault();
            $('.video-player').addClass('video-open'); 
            idVideo = $(this).data('ytid');
            $('.video-box').append('<iframe class="video" src="https://www.youtube.com/embed/'+idVideo+'?autoplay=1&color=white&rel=0&showinfo=0&autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');            
            return false;
        });
        $('.video-close, .video-x').click(function(e) {
            e.preventDefault();
            $('.video-box').empty(); 
            $('.video-player').removeClass('video-open');
        });             
</script> -->

<?php endif;?>