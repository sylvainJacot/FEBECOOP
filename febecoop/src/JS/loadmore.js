const axios = require('axios').default;


const ajaxLoadMore = () => {
    

    const button = document.getElementById('js-load-more');

    if (typeof (button) != 'undefined' && button != null) {

        button.addEventListener('click', (e) => {

            let current_page = document.querySelector('.card-type-b-container').dataset.page;
            let max_pages = document.querySelector('.card-type-b-container').dataset.max;

            let params = new URLSearchParams();
            params.append('action', 'load_more_posts');
            params.append('current_page', current_page);
            params.append('max_pages', max_pages);

            axios.post('/wp-admin/admin-ajax.php', params)
            .then(res => {

                let posts_list = document.querySelector('.posts-list');

                posts_list.innerHTML += res.data.data;

                let getUrl = window.location;
                let baseUrl = getUrl.protocol + "//" + getUrl.host + "/";

                window.history.pushState('', '', baseUrl + 'page/' + (parseInt(document.querySelector('.card-type-b-container').dataset.page) + 1));

                console.log(parseInt(document.querySelector('.card-type-b-container').dataset.page));

                document.querySelector('.card-type-b-container').dataset.page++;

                if (document.querySelector('.card-type-b-container').dataset.page == document.querySelector('.card-type-b-container').dataset.max) {
                button.parentNode.removeChild(button);
                }

            })

        });
    }


}

ajaxLoadMore();