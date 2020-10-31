var scrollAnimationElm = document.querySelectorAll('.css_fade');
var scrollAnimationFunc = function () {
    for (var i = 0; i < scrollAnimationElm.length; i++) {
        var triggerMargin = 200; if (window.innerHeight > scrollAnimationElm[i].getBoundingClientRect().top + triggerMargin) {
            scrollAnimationElm[i].classList.add('show');
        }
    }
}
window.addEventListener('load', scrollAnimationFunc);
window.addEventListener('scroll', scrollAnimationFunc);

$(function () {
    var $win = $(window),
        $nav = $('.i_gnav'),
        $nav_fix = $('.i_gnav_pc'),
        $nav_p = $('.i_gnav_a>p'),
        $h1 = $('.i_body_top'),
        $h1_h = $h1.outerHeight(true),
        nav_shadow_w = $('.i_gnav_all').outerWidth(true),
        nav_shadow_h = $('.i_gnav_all').outerHeight(true),
        $spWidth = window.innerWidth,
        icon_h = $('.gnav_icon_h').height(),
        $spMaxWidth = 560;

    $win.on('load scroll', function () {
        if ($spWidth < $spMaxWidth) {
            $nav.addClass('is-fixed');
        } else {
            var value = $(this).scrollTop();
            if (value > $h1_h) {
                $nav.css('width', nav_shadow_w);
                $nav.css('height', nav_shadow_h);
                $nav_p.addClass('none');
                $nav_fix.addClass('is-fixed');
                $('.i_gnav_a').css('height', icon_h);
                $('.i_gnav_all').css('background-color', '#fcfcfc');
                $('.i_gnav_pc').css('background-color', '#fcfcfc');
            } else {
                $nav.css('width', 'auto');
                $nav.css('height', 'auto');
                $nav_p.removeClass('none');
                $nav_fix.removeClass('is-fixed');
                $('.i_gnav_a').css('height', 'auto');
            }
        }
    });
});

$(function () {
    var $main = $('.main'),
        $nav = $('.i_gnav'),
        $navSp = $('.i_gnav_sp'),
        $hum = $('.i_gnav_togglemenu');

    $navSp.on('click', function () {
        if ($(this).hasClass('gnav_active_js')) {
            $(this).removeClass('gnav_active_js');
            $hum.slideUp();
            $main.removeClass('active');
            $nav.css('margin-top', '0');
        } else {
            $(this).addClass('gnav_active_js');
            $hum.slideDown();
            $main.addClass('active');
        }
    });
});

// window.onload = $(document).ready(function ($) {
//     var $main = $('.main'),
//         $nav = $('.i_gnav'),
//         $navSp = $('.i_gnav_sp'),
//         $hum = $('.i_gnav_togglemenu');

//     $navSp.on('click', function () {
//         if ($(this).hasClass('gnav_active_js')) {
//             $(this).removeClass('gnav_active_js');
//             $hum.slideUp();
//             $main.removeClass('active');
//             $nav.css('margin-top', '0');
//         } else {
//             $(this).addClass('gnav_active_js');
//             $hum.slideDown();
//             $main.addClass('active');
//         }
//     });
// });

// window.onload = $(document).ready(function ($) {
//     $('.nav-button').on('click', function () {
//         if ($(this).hasClass('active')) {
//             $(this).removeClass('active');
//             $('.nav-wrap').addClass('close').removeClass('open');

//         } else {
//             $(this).addClass('active');
//             $('.nav-wrap').addClass('open').removeClass('close');
//         }
//     });
// });
