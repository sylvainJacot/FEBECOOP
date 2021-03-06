<?php

/**
 * 
 * 
 * 
 */

get_header();
?>



<!-- SEARCH RESULTS ==============
=========================== -->
<section class="search-results-section">
<form  action="<?php bloginfo( 'url' ); ?>" method="get" class="nav-search nav-search-laptop nav-search-laptop-search-page" id="js-nav-search-laptop">
<p class="nav-search-laptop-top-title"><?php pll_e('Rechercher et presser entrer');?></p>
    <label for="search">Search in <?php echo home_url('/'); ?></label>
    <input type="text" name="s" id="search" value="<?php echo get_search_query(); ?>" />
    <?php get_template_part( './src/TEMPLATES/Search/search-custom-post-types' );?>
    <input type="image" alt="Search" class="js-nav-icon-search-laptop" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
</form>

    <div class="search-results-wrapper grid">

    <?php 
    if ($wp_query->found_posts === 0 ) {
    echo '<p class="search-results-total sa fade-up">';
    echo pll_e('Aucun résultat');
    echo'</p>'; 
    } elseif ($wp_query->found_posts === 1) {
        echo '<p class="search-results-total sa fade-up">';
        echo pll_e('1 item trouvé');
        echo'</p>'; 
    } else {
        echo '<p class="search-results-total sa fade-up">';
        echo $wp_query->found_posts;
        echo '&nbsp;';
        echo pll_e(' items trouvés');
        echo'</p>';  
    }

    ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

    $post_type = get_post_type();
    $post_obj = get_post_type_object($post_type);
    $post_name = $post_obj->name;
    $post_label = $post_obj->label;
    // print_r($post_name);
    ?>  
    <li class="search-result-item">


    <?php switch ($post_name) {;

case "actualites";
echo '<p class="search-result-item_tag" id="tag-actualites">'; 
echo pll_e("actualites");  
echo '</p>';
break;


case "nieuwsfeed";
echo '<p class="search-result-item_tag" id="tag-actualites">'; 
echo pll_e("actualites");  
echo '</p>';
break;

case "publications";
echo '<p class="search-result-item_tag" id="tag-publications">';
echo pll_e("publications");  
echo '</p>';
break;

case "praktijkverhaal";
echo '<p class="search-result-item_tag" id="tag-projet-accompagnes">';
echo pll_e("projets accompagnés");  
echo '</p>';
break;


case "projet-accompagnes";
echo '<p class="search-result-item_tag" id="tag-projet-accompagnes">';
echo pll_e("projets accompagnés");  
echo '</p>';
break;

case "notes-outils";
echo '<p class="search-result-item_tag" id="tag-notes-outils">';
echo pll_e("notes-outils");  
echo '</p>';
break;

case "projet-partenaires";
echo '<p class="search-result-item_tag" id="tag-projet-partenaires">';
echo pll_e("projet-partenaires");  
echo '</p>';
break;

case "formation-evenement";
echo '<p class="search-result-item_tag" id="tag-formation-evenement">';
echo pll_e("formation-evenement");  
echo '</p>';
break;

case "workshops-en-events";
echo '<p class="search-result-item_tag" id="tag-formation-evenement">';
echo pll_e("formation-evenement");  
echo '</p>';
break;

case "domaines-expertises";
echo '<p class="search-result-item_tag" id="tag-domaines-expertises">';
echo pll_e("domaines-expertises");  
echo '</p>';
break;

case "kenniscentrum";
echo '<p class="search-result-item_tag" id="tag-domaines-expertises">';
echo pll_e("domaines-expertises");  
echo '</p>';
break;

default:
echo '<p class="search-result-item_tag" id="tag-default">';
echo pll_e("page");  
echo '</p>';

};?>


        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <p class="search-result-item-title"><?php the_title(); ?></p>
        <p class="cta-c"><span><?php pll_e('Lire plus');?></span></p>
        </a>
    </li>   

        <?php endwhile; ?>
    <?php endif; ?>




    </div>
</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner-options"); ?>



<?php get_footer(); ?>