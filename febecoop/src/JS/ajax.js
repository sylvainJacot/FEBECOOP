$(function() {
// FILTRES

  $('.filtres-types-a-filtre a').click(function(e) {

    e.preventDefault(); // annule effet ou autre sur le clic

    //Actus
    $('.actualites-container').fadeOut(); // vire les anciens item 
    //Projets
    $('.card-type-b-container').fadeOut(); // vire les anciens item 
    
    var next_actucat_pageeee = $(this).attr('href');


    $('.reset-cta').css('display', 'flex');

    var newTexte = $(this).text();
    $('.reset-cta').text(newTexte);


    $('.filtres-types-a-filtre a').each(function() {
      $(this).removeClass('active');
    })
    $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau

    //NEWS
    if($('.js-actualites-section-wrapper').length >0) {
      $('.js-actualites-section-wrapper').append(
        $('<div />').addClass('actualites-container actualites-container-fadeIn').load(next_actucat_pageeee + ' .js-actualites-container a')
      );
    }
    //PROJETS ACCOMPAGNES
    if($('#js-projets-accompagnes-section-wrapper').length >0) {
      $('#js-projets-accompagnes-section-wrapper').append(
          $('<main />').addClass('card-type-b-container card-projet-accompagnes-container-fadeIn').load(next_actucat_pageeee + ' .card-type-b-container a')
      );
    }
  });

//LOAD MORE


  $('.js-actualites-section-wrapper').on('click', '#loadmore-actu', function(e) {

    e.preventDefault();

    $(this).parent().fadeOut();

    var next_actu_page = $(this).parent().attr('href');
    console.log(next_actu_page);

    $('.js-actualites-section-wrapper').append(
      $('<div />').addClass('actualites-container actualites-container-fadeIn').load(next_actu_page + ' .js-actualites-container a')
    );

  });

  $('.projets-accompagnes-section-wrapper').on('click', '#loadmore-actu', function(e) {

    e.preventDefault();

    $(this).parent().fadeOut();

    var next_actu_page = $(this).parent().attr('href');
    console.log(next_actu_page);

    $('.projets-accompagnes-section-wrapper').append(
      $('<div />').addClass('actualites-container card-type-b-container actualites-container-fadeIn').load(next_actu_page + ' .js-actualites-container a')
    );

  });

//RESET

  $('.reset-cta').click(function(e) {

    e.preventDefault(); // annule effet ou autre sur le clic

    //Actus
    $('.actualites-container').fadeOut(); // vire les anciens item 
    //Projets
    $('.card-type-b-container').fadeOut(); // vire les anciens item 

    var urlcourante = document.location.href; 
    var next_actucat_page = $(this).attr('href');

    $(this).css('display', 'none');

    $('.filtres-types-a-filtre a').each(function() {
      $(this).removeClass('active');
    })
    $(this).addClass('active'); // supprimer la classe active du vieux et met sur le nouveau
    //NEWS
    if($('.js-actualites-section-wrapper').length >0) {
      $('.js-actualites-section-wrapper').append(
        $('<div />').addClass('actualites-container actualites-container-fadeIn').load(urlcourante + ' .js-actualites-container a')
      );
    }
    //PROJETS
    if($('#js-projets-accompagnes-section-wrapper').length >0) {
      $('#js-projets-accompagnes-section-wrapper').append(
          $('<main />').addClass('card-type-b-container card-projet-accompagnes-container-fadeIn').load(urlcourante + ' .card-type-b-container a')
      );
    }
  });

  //PROJETS ACCOMPAGNES LOAD MORE
  $('#js-projets-accompagnes-section-wrapper').on('click', '#loadmore-projetsacc', function(e) {

      e.preventDefault();

      $(this).parent().fadeOut();

      var next_actu_page = $(this).parent().attr('href');


      $('#js-projets-accompagnes-section-wrapper').append(
          $('<main />').addClass('card-type-b-container card-projet-accompagnes-container-fadeIn').load(next_actu_page + ' .card-type-b-container a')
      );

  });


});