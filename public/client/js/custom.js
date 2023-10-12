$( ".nav-item-custom " ).hover(
    function() {
        $(this).addClass('show');
        $(this).find(".dropdown-menu").first().addClass('show');

    }, function() {
        $(this).removeClass('show');
        $(this).find(".dropdown-menu").removeClass('show');
    }
);
