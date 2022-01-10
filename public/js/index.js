$('.more').click(function () {
    const elem = $(this).closest('.desc-item').find('.more-text')
    if (elem.css('display') === 'none') {
        elem.fadeIn(500)
        $(this).css('transform', 'rotate(90deg)')
    } else {
        elem.fadeOut(500)
        $(this).css('transform', 'rotate(0deg)')
    }
})

$('.col-3.scalable').hover(function () {
    const scalable_element = $('.col-3.scalable')
    scalable_element.addClass('mini')
    scalable_element.removeClass('focus')
    $(this).addClass('focus')
}, function () {
    $('.col-3.scalable').removeClass('mini')
    $(this).removeClass('focus')
})

function showModal(action) {
    $('.tab-list > li').removeClass('focus')
    $('.li-' + action).addClass('focus')
    $('.tab').hide()
    $('#' + action).show()
}
