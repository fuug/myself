$(document).ready(function () {
    const li_count = $('.d-flex.carousel-ul').children().length / 2
    const ellipse = $('.ellipse')
    for (let i = 1; i < li_count; i++) {
        ellipse.clone().appendTo($('.page-ellipse'))
    }
    ellipse.addClass('active')
})

const setActiveEllipse = (next_page) => {
    const ellipse_container = $('.page-ellipse')
    ellipse_container.children().removeClass('active')
    ellipse_container.children().eq(next_page).addClass('active')
}

const swipe_to_right = () => {
    const ul_carousel = $('.d-flex.carousel-ul') //parent element
    const count_page = ul_carousel.children().length / 2,
        li_width = ul_carousel.children().outerWidth() //width of one card
    const width_container = li_width * 2;
    let ul_left = ul_carousel.css('margin-left')//current margin
    ul_left = ul_left.substring(0, ul_left.length - 2) // delete 'px'
    let new_page = -(Math.ceil((+ul_left - width_container) / (width_container)));
    new_page = count_page > new_page ? new_page : 0;
    let new_ml = count_page > new_page ? width_container * new_page : 0;
    ul_carousel.css('margin-left', '-' + new_ml + 'px');
    setActiveEllipse(new_page)
}

const swipe_to_left = () => {
    const ul_carousel = $('.d-flex.carousel-ul') //parent element
    const count_page = ul_carousel.children().length / 2,
        li_width = ul_carousel.children().outerWidth() //width of one card
    const width_container = li_width * 2;
    let ul_left = ul_carousel.css('margin-left') //current margin
    ul_left = ul_left.substring(0, ul_left.length - 2) // delete 'px'
    let new_ml = +ul_left + width_container
    let new_page = -(Math.ceil(new_ml / (width_container)));
    new_ml = 0 <= new_page ? width_container * new_page : width_container * (count_page - 1);
    ul_carousel.css('margin-left', -new_ml + 'px');
    setActiveEllipse(new_page)
}


$('.arrow').click(function () {

    if ($(this).hasClass('arrow-to-right')) {
        swipe_to_right()
    } else {
        swipe_to_left()
    }
})
