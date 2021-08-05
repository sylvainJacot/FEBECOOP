<?php

/**
 * 
 * 
 * 
 */
get_header();
// <!-- get the current taxonomy term -->
$terms = get_terms('categories_actualites');
?>

<!-- HERO SECTION ==============
=========================== -->
<section class="hero-section-type-g">
  <div class="hero-section-type-g-wrapper grid">
    <div class="hero-section-type-g-content">
      <div class="hero-section-type-g-content-text">
        <h1><span><?php the_field('titre_de_la_page'); ?></h1></span>
      </div>

      <div class="hero-section-type-g-content-filtres filtres-type-a-container js-filtres-type-a-container">
        <p class="filtres-type-a-title">Filtrer par</p>
        <ul class="filtres-types-a-filtres-container js-filtres-types-a-filtres-container">

          <?php foreach ($terms as $tag) : ?>
            <?php $term_link = get_term_link($tag); ?>
            <li class="filtres-types-a-filtre"><a href="<?php echo esc_url($term_link); ?>"><?php echo $tag->name; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

    </div>
  </div>
</section>


<!-- ACTUALITES ==============
=========================== -->
<section class="actualites-section">
  <div class="actualites-section-wrapper grid">
    <div class="actualites-container" id="actualites-container">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <a href="<?php the_permalink(); ?>" class="swiper-slide  card-type-b-item card-type-b-item-row-actu">
    <div class="card-type-b-pic-wrapper">
        <?php
        $image = get_field('actu-hero-image');
        if (!empty($image)) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
    <div class="card-type-b-content">
        <p class="card-type-b-date"><?php echo get_the_date('d/m/Y'); ?></p>
        <p class="card-type-b-chapeau"><?php the_title(); ?></p>
        <p class="cta-c"><span><?php pll_e('Lire plus');?></span></p>
    </div>
</a>


        <?php endwhile; ?>


        <a class="cta-a" id="actualites_loadmore"><?php pll_e('Voir plus');?></a>

      <?php endif; ?>


    </div>


  </div>

  <!-- <a class="cta-a" id="loadmore">Voir plus</a> -->

</section>


<!-- CONTACT BANNER ==============
=========================== -->
<?php get_template_part("./src/TEMPLATES/ContactBanner/contact-banner"); ?>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

// $('#articles').on('click', '.filter-npoq-container a', function(e) {

     
$('.js-filtres-types-a-filtres-container a').click(function(e){

    e.preventDefault(); // annule effet ou autre sur le clic

    $('#actualites-container a').fadeOut(); // vire les anciens item 
 
    var next_page = $(this).attr('href'); // recuperer lien de la page a afficher
    // alert(next_page)
 
    $('.js-filtres-types-a-filtres-container a').each(function(){ $(this).removeClass('active'); })
    $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau
   
    $('.actualites-section-wrapper').append(
        $('#actualites-container').load(next_page + ' #actualites-container a') // charge la partie article de la page ciblée par le href, et les affiche dans le article de la page en cours
    );

    setTimeout(function() {
        $('#actualites-container a').css('opacity', '1'); // effet etc a appliquer apres le chargement 
    },500);
          
});
</script>

<script>

// $('#articles').on('click', '.filter-npoq-container a', function(e) {

     
$('#actualites_loadmore').click(function(e){
    console.log("hello")
    e.preventDefault(); // annule effet ou autre sur le clic

          
});
</script>



<?php
get_footer();
?>