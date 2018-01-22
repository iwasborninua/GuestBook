jQuery(
    function () {
        $('section').mouseenter(function () {
            $(this).css({'background':'rgba(255, 255, 255, 0.7)',
                         'transition':'0.6s'})
        })

        $('section').mouseleave(function () {
            $(this).css({'background':'rgba(255, 255, 255, 0.4)',
                         'transition':'0.4s'})
        })
    }
);