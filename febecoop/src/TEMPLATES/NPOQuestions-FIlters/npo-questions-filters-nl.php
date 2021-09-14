<section class="notes-pratiques-outils-loop-section">
    <div class="notes-pratiques-outils-loop-wrapper grid">


        <aside class="filters-npo-questions-wrapper">
        <p class="filter-npoq-header"><?php pll_e('Filtrer par');?>:</p>
        <div class="filter-npoq-container">
            <?php echo get_the_term_list( $post->ID, 'tags_vragen' ) ?>
        </div>
        </aside>



        <div class="npo-items-wrapper">
            <div class="npo-items-container" id="articles">
            <!-- // LOOP NOTES PRATIQUES & OUTILS -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <a href="<?php echo the_permalink() ?>" class="npo-item">
                        <p><?php the_title(); ?></p>
                        <span class="button-arrow"></span>
                    </a>

                <?php endwhile;
            else : ?>
                <span class="generic-content"><p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p></span>
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/')); ?>veelgestelde-vragen" class="cta-a"><?php pll_e('Tous les outils et notes pratiques');?></a>
            
        </div>
        </div>
    </div>
</section>