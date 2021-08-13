<?php 
 if(get_row_layout() == 'video_youtube') : ?>

<!--  TROUVé SUR https://fancyapps.com/docs/ui/fancybox/ -->
<?php 
$videoUrl = get_sub_field('video_link');
$videoIDSplit = explode('?v=', $videoUrl);
$videoID = $videoIDSplit[1];
?>

<a data-fancybox data-src="<?php echo $videoUrl; ?>" class="flex-video-container">
<div class="flex-video-thumbnail-wrapper">
  <img src="https://img.youtube.com/vi/<?php echo $videoID; ?>/sddefault.jpg"  class="flex-video-thumbnail"/>
  </div>
</a>

<?php endif;?>