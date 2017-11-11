$(document).ready(function() {
    $("#owl").owlCarousel({
        navigation: false,
        slideSpeed: 100,
        paginationSpeed: 800,
        items: 3,
        autoPlay: false
    });

    $(window).load(function() {
        $(".col-3 input").val("");

        $(".input-effect input").focusout(function() {
            if ($(this).val() != "") {
                $(this).addClass("has-content");
            } else {
                $(this).removeClass("has-content");
            }
        })
    });
    $(".sign--up").click(function() {
        $(this).addClass("enabled");
        $(".sign").removeClass("enabled");
        $(".sign").addClass("disabled");
        $(".sign--in").addClass("remove");
        $(".register").removeClass("remove");
        $(".register").addClass("show");
        $(".sign--in").removeClass("show");
        $(".sign--get").removeClass("remove");
        $(".register--get").addClass("remove");
    });
    $(".sign").click(function() {
        $(this).addClass("enabled");
        $(".sign--up").removeClass("enabled");
        $(".sign--up").addClass("disabled");
        $(".register").addClass("remove");
        $(".register").removeClass("show");
        $(".sign--in").removeClass("remove");
        $(".sign--in").addClass("show");
        $(".register--get").removeClass("remove");
        $(".sign--get").addClass("remove");
    });
});