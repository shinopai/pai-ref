window.addEventListener('DOMContentLoaded', function () {
    $(function () {
        // back to top button
        var backBtn = $('#back-btn');
        //スクロールが500に達したらボタン表示
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                backBtn.removeClass('hidden');
            } else {
                backBtn.addClass('hidden');
            }
        });

        //スルスルっとスクロールでトップへもどる
        backBtn.click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });

    // flash message fadeout
    $('#flash').fadeOut(3500);
});
