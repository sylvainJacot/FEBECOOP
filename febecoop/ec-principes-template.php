<?php
/**
 * Template Name: Principes
 * 
 * 
 */
 get_header();

// DIFFERENCE AVEC LE FEDERAL, PAS DE SUCCESS STORIES EN BAS

?>

<?php
$id = 'principes-content';
set_query_var('poo', $id);?>
<?php get_template_part( './src/TEMPLATES/EntreprenariatCoop/entreprenariat-coop' );?>
    <!-- ASIDE flexible ==============
=========================== -->
<aside class="entreprenarit-coop-aside">
        <div class="ec-title"><?php pll_e("L'enprenariat coopératif");?></div>

        <ul class="ec-wrapper">
        <li><a href="<?php echo esc_url(home_url('/')); ?>introduction" class="cta-c"><span><?php pll_e('Introduction');?></span></a></li>
        <li><a href="<?php echo esc_url(home_url('/')); ?>histoire" class="cta-c"><span><?php pll_e('Histoire');?></span></a></li>
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