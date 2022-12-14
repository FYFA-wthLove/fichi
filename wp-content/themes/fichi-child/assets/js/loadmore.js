jQuery(function($){
    // Load More Ajax
    $('#load-more').click(function() {
        var button = $(this);
        $.ajax({
            url : fichi_loadmore_params.ajaxurl,
            data : {
                'action': 'loadmore',
                'query': fichi_loadmore_params.posts,
                'page' : fichi_loadmore_params.current_page
            },
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...');
            },
            success : function( posts ){
                if( posts ) {

                    button.text( 'Loading more...' );
                    $('.work__fichi-list').append( posts );
                    fichi_loadmore_params.current_page++;

                    if ( fichi_loadmore_params.current_page === fichi_loadmore_params.max_page )
                        button.hide();

                } else {
                    button.hide();
                }
            }
        });
        return false;
    });

    // Category Filter Ajax
    $('.work__category-filter__item').on('click', function() {
        $('.work__category-filter__item').removeClass('active');
        $(this).addClass('active');

        $.ajax({
            url : fichi_loadmore_params.ajaxurl,
            data: {
                action: 'fichi_filter',
                category: $(this).data('slug'),
            },
            dataType : 'json',
            type : 'POST',
            success : function( data ){
                fichi_loadmore_params.current_page = 1;
                fichi_loadmore_params.posts = data.posts;
                fichi_loadmore_params.max_page = data.max_page;
                $('.work__fichi-list').html(data.content);
                
                if ( data.max_page < 2 ) {
                    $('#load-more').hide();
                } else {
                    $('#load-more').show();
                }
            }
        });
        return false;
    });
});
