// $('#js-actualites_loadmore').click(function(e){

//     e.preventDefault();
//     console.log('click');
    

//     var next_actu_page = $('.js-pagination-actualites a').attr('href');
//     alert(next_actu_page);

//     $('#js-actualites-section-wrapper').append(
//       $('.js-actualites-container').load(next_actu_page + ' .js-actualites-container a')
//     );

//   });



$('#js-actualites-section-wrapper').on('click', '#loadmore-actu', function(e){

    e.preventDefault();
    console.log('click');

    $(this).parent().fadeOut();

    var next_actu_page = $(this).parent().attr('href');
    // alert(next_actu_page);

    $('#js-actualites-section-wrapper').append(
      $('<div />').addClass('actualites-container').load(next_actu_page + ' #js-actualites-container a')
    );

  });




