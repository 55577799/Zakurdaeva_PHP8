$(() => {

    $('.js-add-to-to-cart').on('click', (event) => {

        const $currentEl = $(event.target);
        const id = $currentEl.data('id');

        $currentEl.parent().empty().html('<span class="badge badge-success">Товар в корзине</span>');

        $.ajax({
            url: `?c=cart&a=ajaxAdd&id=${id}`,
            type: 'get',
            cache: false,
            success: function (response) {
                $('#cart').html(response.count);
            }
        });
    })

});
