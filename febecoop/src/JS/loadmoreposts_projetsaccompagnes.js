// $('#js-actualites-section-wrapper').on('click', '#loadmore-actu', function(e){

//     e.preventDefault();
//     console.log('click');

//     $(this).parent().fadeOut();

//     var next_actu_page = $(this).parent().attr('href');
//     // alert(next_actu_page);

//     $('#js-actualites-section-wrapper').append(
//       $('<div />').addClass('actualites-container actualites-container-fadeIn').load(next_actu_page + ' #js-actualites-container a')
//     );

//   });

  $('#js-projets-accompagnes-section-wrapper').on('click', '#loadmore-projetsacc', function(e){

    e.preventDefault();
    console.log('click');

    $(this).parent().fadeOut();

    var next_actu_page = $(this).parent().attr('href');
    // alert(next_actu_page);

    $('#js-projets-accompagnes-section-wrapper').append(
      $('<main />').addClass('card-type-b-container card-projet-accompagnes-container-fadeIn').load(next_actu_page + ' .card-type-b-container a')
    );

  });