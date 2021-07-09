
<aside class="share-section-a">

<?php $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<p class="share-title-a"><?php pll_e('Partager');?></p>
<div class="share-socials-container-a">
<a class="social-item-a" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" target="_blank">
    <img title="facebook sharing button" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/social-facebook.svg" alt="facebook sharing button" />
</a>

<a class="social-item-a" href="https://twitter.com/share?url=<?php echo $actual_link; ?>&text=[Febecoop] <?php the_title(); ?>" target="_blank">
    <img title="twitter sharing button" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/social-twitter.svg" alt="twitter sharing button" />
</a>


<a class="social-item-a" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $actual_link; ?>" target="_blank">
    <img title="linkedin sharing button" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/social-linkedin.svg" alt="linkedin sharing button" />
</a>
</div>

</aside>