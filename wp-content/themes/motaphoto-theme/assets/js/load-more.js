function initializeLoadMore() {

    jQuery(document).ready(function($) {
        var page = 1;
        var canLoadMore = true;

        $('#load-more').on('click', function() {
            if (canLoadMore) {
                page++;
                loadMorePosts(page);
            }
        });

        function loadMorePosts(page) {
            $.ajax({
                url: './wp-admin/admin-ajax.php',
                type: 'post',
                data: {
                    action: 'load_more_posts',
                    page: page
                },
                success: function(response) {
                    if (response.trim() !== '') {
                        $('.galerie__photos').append(response);
                    } else {
                        $('#load-more').hide(); // Cacher le bouton s'il n'y a plus de posts
                        canLoadMore = false; // Mettre canLoadMore à false pour empêcher les futurs chargements
                    }
                }
            });
        }
    });
}