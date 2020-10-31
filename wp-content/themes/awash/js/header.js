// ヘッダー追従
$(function() {
    var $win = $(window),
        $main = $('main'),
        $nav = $('nav'),
        $h1 = $('h1'),
        navHeight = $nav.outerHeight(true),
        navPos = $nav.offset().top,
        $spWidth = window.innerWidth,
        $spMaxWidth = 560;

    $win.on('load scroll', function() {
        if ($spWidth < $spMaxWidth) { //SP用
            $nav.addClass('is-fixed');
            $h1.addClass('is-fixed');
        } else { //以下PC
            var value = $(this).scrollTop();
            if (value > navPos) {
                $nav.addClass("is-fixed");
                $h1.addClass("is-fixed");
                $h1.css("height", "100px");
                //activeでフィックスする動作にtransitionをかけられるか要検討
                // $h1.addClass("display-none");
                // $main.css('margin-top', navHeight);
            } else {
                $nav.removeClass("is-fixed");
                $h1.removeClass("is-fixed");
                $h1.css("height", "100px");
                // $h1.removeClass("display-none");
                // $main.css('margin-top', '0');
            }
        }
    });
});

// ハンバーガーメニュー
$(function() {
    $('.header_button_sp').on('click', function() {
        if ($(this).hasClass('header_active_js')) {
            $(this).removeClass('header_active_js');
            $('.header_togglemenu_menu').slideUp();
            $('main').removeClass('active');
            $('nav').css('margin-top', '0');
        } else {
            $(this).addClass('header_active_js');
            $('.header_togglemenu_menu').slideDown();
            $('main').addClass('active');
            // $('nav').css('margin-top', '18.66667%');
        }
    });
});