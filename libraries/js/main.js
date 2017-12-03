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
    (function($) {
        $.fn.spinner = function() {
            this.each(function() {
                var el = $(this);

                // add elements
                el.wrap('<span class="spinner"></span>');
                el.before('<span class="sub">-</span>');
                el.after('<span class="add">+</span>');

                // substract
                el.parent().on('click', '.sub', function() {
                    if (el.val() > parseInt(el.attr('min')))
                        el.val(function(i, oldval) { return --oldval; });
                });

                // increment
                el.parent().on('click', '.add', function() {
                    if (el.val() < parseInt(el.attr('max')))
                        el.val(function(i, oldval) { return ++oldval; });
                });
            });
        };
    })(jQuery);

    $('input[type=number]').spinner();
});
$(function() {
    $("#slider-range-min").slider({
        range: "min",
        value: 0,
        min: 0,
        max: 100,
        slide: function(event, ui) {
            $("#amount").val("₹" + ui.value + ",000");
            $(".a, .b, .c, .d").width(ui.value + "%");
        }
    });
    $(".ui-slider-handle");
    $("#amount").val("₹" + $("#slider-range-min").slider("value") + ",000");
});