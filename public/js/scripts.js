$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('.navbar').addClass('bg-secondary text-white');
    } else {
        $('.navbar').removeClass('bg-secondary text-white');
    }
});