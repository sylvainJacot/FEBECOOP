var page = 2;
jQuery(function($) {
    $('body').on('click', '.actualites_loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };
 
        $.post(blog.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.actualites-container').append(response);
                page++;
            } else {
                $('.actualites_loadmore').hide();
            }
        });
    });
});