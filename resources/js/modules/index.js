// back to top button
window.addEventListener('DOMContentLoaded', function () {
    $(function () {
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
});
