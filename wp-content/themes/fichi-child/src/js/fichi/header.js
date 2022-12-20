(function ($) {
    $(document).ready(function () {
        // Hamburger Menu
        $('.hamburger-button').on('click', function () {
            $('body').parent().find('.header').toggleClass('bg-light');
        });
    });

}(jQuery));

window.onscroll = function() {stickyHeader()};

var header = document.getElementById("header-sticky");
var sticky = header.offsetTop;

function stickyHeader() {
    if (window.scrollY > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}