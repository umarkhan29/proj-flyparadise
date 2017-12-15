$(document).ready(function() {
    $(".testimonial#owl").owlCarousel({
        navigation: false,
        slideSpeed: 100,
        paginationSpeed: 800,
        items: 3,
        autoPlay: false
    });
    $(".single--package#owl").owlCarousel({
        navigation: false,
        slideSpeed: 100,
        paginationSpeed: 800,
        items: 1,
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
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    var showChar = 400;
    var ellipsestext = "...";
    var moretext = "View Less";
    var lesstext = "View More";
    $('.more--details').each(function() {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar - 1, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(".morelink").click(function() {
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});