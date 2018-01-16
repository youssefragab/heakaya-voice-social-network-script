$(document).ready(function () {
    /* toggle menu */
    $(".menu-toggle").click(function (){
        $(".slide-menu").toggleClass("active");
        $("body").toggleClass("mobile-menu-active");
    });
    $(".mobile-menu-overlay").click(function (){
        $(".slide-menu").removeClass("active");
        $("body").removeClass("mobile-menu-active");
    });

    function makeProgress($var) {
        $pro = $($var);
        if ($pro.length >= 1) {
            var circle = new ProgressBar.Circle($var, {
                easing: 'easeInOut',
                color: $pro.data("color"),
                duration: 3000,
                strokeWidth: 5,
                trailWidth: 5,
                trailColor: $pro.data("background"),
                text: {
                    value: ''
                },
                svgStyle: {
                    display: 'inline-block',
                    width: 'auto'
                },
            });
            circle.animate(-$pro.data("value"), {
                duration: 1500,
                step: function(state, circle, attachment) {
                    console.log();
                    // circle.path.setAttribute('stroke', state);
                }
            });
        }
    }
    $('.timer').countTo();
    makeProgress("#pro2");
    makeProgress("#pro3");

});