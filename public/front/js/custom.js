
jQuery(".nest").on("click", function() {
    if (
        jQuery(this)
        .next()
        .hasClass("show")
    ) {
        jQuery(this)
            .next()
            .removeClass("show");
        jQuery(this)
            .next()
            .slideUp(300);
    } else {
        jQuery(this)
            .parent()
            .parent()
            .find("li .inner")
            .removeClass("show");
        jQuery(this)
            .parent()
            .parent()
            .find("li .inner")
            .slideUp(300);
        jQuery(this)
            .next()
            .toggleClass("show");
        jQuery(this)
            .next()
            .slideToggle(300);
    }
});

jQuery('.owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        1500: {
            items: 3,
            nav: false
        },
        1000: {
            items: 2,
            nav: false,
            dots: true,
            loop: false
        }
    }
})
