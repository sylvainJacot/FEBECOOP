$('#js-actualites-section-wrapper').on('click', '#loadmore-actu', function(e){

    e.preventDefault();
    console.log('click');

    $(this).parent().fadeOut();

    var next_actu_page = $(this).parent().attr('href');
    // alert(next_actu_page);

    $('#js-actualites-section-wrapper').append(
      $('<div />').addClass('actualites-container actualites-container-fadeIn').load(next_actu_page + ' #js-actualites-container a')
    );

  });




