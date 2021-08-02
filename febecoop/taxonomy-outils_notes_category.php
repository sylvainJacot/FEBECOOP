<?php

/**
 *
 * 
 * 
 */
get_header();
?>
<!-- ICI CEST LA PAGE AVANT RESULTATS -->
<?php

// <!-- get the current taxonomy term -->

$term = get_queried_object();
$getterm = $term->slug; 

// print_r($getterm);

$title = $term->name;

// print_r($title);

$terms_tags  = get_terms(
    [  
        "taxonomy" => 'tags_notes_outils',
        "taxonomy_2" => $getterm,
        "hide_empty" => true,
    ],
);
?>


<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-c fiche-outils-hero-section">
    <div class="hero-section-type-c-wrapper grid">
        <div class="hero-section-type-c-content">
            <?php
            $field = get_field_object('general-couleur', $term);
            $value = $field['value'];
            $label = $field['choices'][$value]; ?>
            <div class="pentagone-icons-wrapper">

                <?php
                $image = get_field('general-icone', $term);
                if (!empty($image)) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <span class="main-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
    </svg></span>
<span class="secondary-shape"><svg width="84" height="87" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M80.347 33.1144L61.3625 7.02185C57.0437 1.08355 49.3959 -1.43573 42.3779 0.9036L11.6967 10.8008C4.76864 13.0501 0 19.6183 0 26.9062V59.117C0 66.4949 4.76864 72.973 11.6967 75.2224L42.3779 85.2095C49.3959 87.4589 57.0437 85.0296 61.3625 79.0913L80.347 52.9987C84.6658 47.0604 84.6658 39.0527 80.347 33.1144Z" fill="<?php echo $value; ?>" />
    </svg></span>

            </div>
            <div class="hero-section-type-c-content-text">
                <p class="hero-section-type-c-content-toptitle"><?php pll_e('Notes pratiques & outils');?></p>
                <h1><span><?php echo $title; ?></span></h1>
            </div>
        </div>
    </div>
</section>

<!-- HERO INTRO ==============
=========================== -->
<div class="hero-section-type-b-introduction-wrapper grid">
    <div class="hero-section-type-b-intro-content">
        <p><?php echo the_field('description_complete', $term); ?></p>
    </div>
</div>



<!-- LOOP NOTES PRATIQUES & OUTILS + FILTERS ==============
=========================== -->
<section class="notes-pratiques-outils-loop-section">
    <div class="notes-pratiques-outils-loop-wrapper grid" id="js-notes-pratiques-outils-loop-wrapper">


        <!-- Filtres mobile -->
        <aside class="filtres-type-a-container filters-npo-questions-wrapper-mobile js-filtres-type-a-container">
                <p class="filtres-type-a-title"><?php pll_e('Filtrer par'); ?></p>
                <ul class="filtres-types-a-filtres-container ajax-filtres-types-a-filtres-container">
                    <?php foreach ($terms_tags as $tag) : ?>
                        <?php $term_link = get_term_link($tag); ?>
                        <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>" class="filtres-types-a-filtre-link"><?php echo $tag->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
        </aside>

        <!-- Filtres laptop -->
        <aside class="filters-npo-questions-wrapper filters-npo-questions-wrapper-laptop">
        <p class="filter-npoq-header"><?php pll_e('Filtrer par');?> :</p>
        <div class="filter-npoq-container">
            <?php foreach ($terms_tags as $tag) : ?>
                    <?php $term_link = get_term_link($tag); ?>
                    <a href="<?php echo esc_url($term_link); ?>"><?php echo $tag->name; ?></a>
            <?php endforeach; ?>

        </div>
        </aside>

        <p class="reset-cta reset-filter reset-filter-npo-mobile" style="display: none;"></p>



        <div class="npo-items-wrapper">
            <div class="npo-items-container" id="js-npo-items-container">
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
            
        </div>
        <a href="<?php echo esc_url(home_url('/')); ?>notes-pratiques-outils" class="cta-a"><?php pll_e('Toutes les notes pratiques & outils');?></a>
        </div>
      
    </div>

</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part( './src/TEMPLATES/ContactBanner/contact-banner-options' );?>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<!-- FILTRES LAPTOP -->
<script>
    
$('.filter-npoq-container a').click(function(e){

    e.preventDefault(); // annule effet ou autre sur le clic

    var topContainer = $("#js-notes-pratiques-outils-loop-wrapper").offset().top;
    var top =  topContainer - 40
    $("html").animate(
      {
        scrollTop: top
      }, {
        duration: 100,
        specialEasing: {
            top: 'easeOutCubic'
        }
    },
    );

    $('#js-npo-items-container a').fadeOut(); // vire les anciens item 
 
    var urlcourante = document.location.href; 

    var next_page = $(this).attr('href'); // recuperer lien de la page a afficher

    if ($(this).hasClass('active')) {

    

        $('#js-npo-items-container').append(
        $('<div />').load(urlcourante + '#js-npo-items-container .npo-item') // charge la partie article de la page ciblée par le href, et les affiche dans le article de la page en cours
        );

        $('.active').each(function(){
            $(this).removeClass('active');
        })

        $(this).removeClass('active');


    } else {



        $('#js-npo-items-container').append(
        $('<div />').load(next_page + '#js-npo-items-container .npo-item') // charge la partie article de la page ciblée par le href, et les affiche dans le article de la page en cours
        );

        $('.active').each(function(){
            $(this).removeClass('active');
        })

        $(this).addClass('active');

    }



    setTimeout(function() {
        $('#js-npo-items-container a').css('opacity', '1'); // effet etc a appliquer apres le chargement 
    },1000);
          
});
</script>


<!-- FILTRES mobile -->
<script>
    $('.filtres-types-a-filtre-link').click(function(e) {

        e.preventDefault(); // annule effet ou autre sur le clic

        var topContainer = $("#js-notes-pratiques-outils-loop-wrapper").offset().top;
        var top =  topContainer - 200
        $("html").animate(
        {
            scrollTop: top
        }, {
            duration: 100,
            specialEasing: {
                top: 'easeOutCubic'
            }
        },
        );

        $('#js-npo-items-container a').fadeOut(); // vire les anciens item 

        var urlcourante = document.location.href; 

        var next_page = $(this).attr('href'); // recuperer lien de la page a afficher
 

        $('.reset-cta').css('display', 'flex');

        var newTexte = $(this).text();
        $('.reset-cta').text(newTexte);
 

        $('.filtres-types-a-filtre-link').each(function() {
            $(this).removeClass('active');
        })
        $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau

        $('#js-npo-items-container').append(
        $('<div />').load(next_page + '#js-npo-items-container .npo-item') // charge la partie article de la page ciblée par le href, et les affiche dans le article de la page en cours
        );
        setTimeout(function() {
        $('#js-npo-items-container a').css('opacity', '1'); // effet etc a appliquer apres le chargement 
        },1000);

    });
</script>

<!-- FILTRES EFFACER -->
<script>
    $('.reset-cta').click(function(e) {

        e.preventDefault(); // annule effet ou autre sur le clic

        var topContainer = $("#js-notes-pratiques-outils-loop-wrapper").offset().top;
        var top =  topContainer - 200
        $("html").animate(
        {
            scrollTop: top
        }, {
            duration: 100,
            specialEasing: {
                top: 'easeOutCubic'
            }
        },
        );

        $('#js-npo-items-container a').fadeOut(); // vire les anciens item 

        var urlcourante = document.location.href; 
        var next_actucat_page = $(this).attr('href');
 
        $(this).css('display', 'none');

        $('.filtres-types-a-filtre-link').each(function() {
            $(this).removeClass('active');
        })
        $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau

        $('#js-npo-items-container').append(
        $('<div />').load(urlcourante + '#js-npo-items-container .npo-item') // charge la partie article de la page ciblée par le href, et les affiche dans le article de la page en cours
        );
        setTimeout(function() {
        $('#js-npo-items-container a').css('opacity', '1'); // effet etc a appliquer apres le chargement 
        },1000);

    });
</script>


<?php
get_footer();
?>