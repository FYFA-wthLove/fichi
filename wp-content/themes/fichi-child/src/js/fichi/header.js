(function ($) {
    $(document).ready(function () {
        // Hamburger Menu
        $('.hamburger-button').on('click', function () {

            if ($('#navbarNavDropdown').hasClass('collapsing')) {
                return
            }

            $('.navbar').parent().find('.custom-logo-link').toggleClass('remove-filter');
            $('html').toggleClass('overflow-hide');

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