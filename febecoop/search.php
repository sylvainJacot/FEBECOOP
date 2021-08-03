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
<p class="nav-search-laptop-top-title">Rechercher et presser entrer</p>
    <label for="search">Search in <?php echo home_url('/'); ?></label>
    <input type="text" name="s" id="search" value="<?php echo get_search_query(); ?>" />
    <?php get_template_part( './src/TEMPLATES/Search/search-custom-post-types' );?>
    <input type="image" alt="Search" class="js-nav-icon-search-laptop" src="<?php bloginfo('template_url'); ?>/src/ASSETS/IMAGES/common/VECTOR/search-ic-orange.svg" />
</form>

    <div class="search-results-wrapper grid">

    <?php 
    if ($wp_query->found_posts === 0 ) {
    echo("<p class='search-results-total sa fade-up'>Aucun résultat</p>" ); 
    } elseif ($wp_query->found_posts === 1) {
        echo("<p class='search-results-total sa fade-up'>1 item trouvé</p>" ); 
    } else {
        echo("<p class='search-results-total sa fade-up'>$wp_query->found_posts items trouvés</p>" );  
    }

    ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

    $post_type = get_post_type();
    $post_obj = get_post_type_object($post_type);
    $post_name = $post_obj->name;
    $post_label = $post_obj->label;
    ?>  
    <li class="search-result-item">


    <?php switch ($post_name) {;

case "actualites";
echo '<p class="search-result-item_tag" id="tag-actualites">' . $post_name . "</p>";
break;

case "publications";
echo '<p class="search-result-item_tag" id="tag-publications">' . $post_name . "</p>";
break;

case "projet-accompagnes";
echo '<p class="search-result-item_tag" id="tag-projet-accompagnes">' . $post_name . "</p>";
break;

case "notes-outils";
echo '<p class="search-result-item_tag" id="tag-notes-outils">' . $post_name . "</p>";
break;

case "projet-partenaires";
echo '<p class="search-result-item_tag" id="tag-projet-partenaires">' . $post_name . "</p>";
break;

case "formation-evenement";
echo '<p class="search-result-item_tag" id="tag-formation-evenement">' . $post_name . "</p>";
break;

case "domaines-expertises";
echo '<p class="search-result-item_tag" id="tag-domaines-expertises">' . $post_name . "</p>";
break;

default:
echo '<p class="search-result-item_tag" id="tag-default">page</p>';

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