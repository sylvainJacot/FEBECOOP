<?php
/**
 * Template Name: Histoire
 * 
 * 
 */
 get_header();

// DIFFERENCE AVEC LE FEDERAL, PAS DE SUCCESS STORIES EN BAS

?>

<?php
$id = 'histoire-content';
set_query_var('poo', $id);?>
<?php get_template_part( './src/TEMPLATES/EntreprenariatCoop/entreprenariat-coop' );?>
    <!-- ASIDE flexible ==============
=========================== -->
<aside class="entreprenarit-coop-aside">
        <div class="ec-title"><?php pll_e("L'entrepreneuriat coopératif");?></div>

        <!-- <ul class="ec-wrapper">
        <li><a href="<?php echo esc_url(home_url('/')); ?>introduction" class="cta-c"><span><?php pll_e('Introduction');?></span></a></li>
        <li><a href="<?php echo esc_url(home_url('/')); ?>les-7-principes" class="cta-c"><span><?php pll_e('Les 7 principes');?></span></a></li>
        </ul> -->

        <?php
        $featured_posts = get_field('related_pages');
        if( $featured_posts ): ?>
            <ul class="ec-wrapper">
            <?php foreach( $featured_posts as $post ): 

                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post); ?>
                <li>
                    <a href="<?php the_permalink(); ?>" class="cta-c"><span><?php the_title(); ?></span></a>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php 
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>


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