var page = 2;
jQuery(function($) {
    $('body').on('click', '.projet_accompagnes_loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };
 
        $.post(blog.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.card-projet-accompagnes-container').append(response);
                page++;
            } else {
                $('.projet_accompagnes_loadmore').hide();
            }
        });
    });
});