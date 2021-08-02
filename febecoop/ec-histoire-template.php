<?php
/**
 * Template Name: Histoire
 * 
 * 
 */
 get_header();
?>

<?php
$id = 'histoire-content';
set_query_var('poo', $id);?>
<?php get_template_part( './src/TEMPLATES/EntreprenariatCoop/entreprenariat-coop' );?>
    <!-- ASIDE flexible ==============
=========================== -->
<aside class="entreprenarit-coop-aside">
        <div class="ec-title"><?php pll_e("L'enprenariat coopératif");?></div>

        <ul class="ec-wrapper">
        <li><a href="<?php echo esc_url(home_url('/')); ?>introduction" class="cta-c"><span><?php pll_e('Introduction');?></span></a></li>
        <li><a href="<?php echo esc_url(home_url('/')); ?>les-7-principes" class="cta-c"><span><?php pll_e('Les 7 principes');?></span></a></li>
        </ul>


    </aside>

</main>

<!-- SUCCESS STORIES ==============
=========================== -->
<?php get_template_part('./src/TEMPLATES/SuccessStories/success-stories-section');?>

<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>

<?php
get_footer();
?>