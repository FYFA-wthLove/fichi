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