$('.show-modal').click(function () {
    const category_id = $(this).data('category_id')
    $('input#cat_id').val(category_id);
})
