$(function() {

    var welcome = $('.welcome');
    var login = $('.login-form');

    $('.login-btn').click(function (e) {

        e.preventDefault();

        if (welcome.hasClass('hide')) {

            welcome.removeClass('hide');
            login.removeClass('show');
            $(this).removeClass('active');

        } else {

            welcome.addClass('hide');
            login.addClass('show');
            $(this).addClass('active');

        }
    })

    $('.close-btn').click(function (e) {
        e.preventDefault();
        $('.register-form').fadeOut(500);
        $('.dark-bg').fadeOut(500);
    });

    $('.register-btn').click(function (e) {
        e.preventDefault();
        $('.register-form').fadeIn(500);
        $('.dark-bg').fadeIn(500);
        welcome.removeClass('hide');
        login.removeClass('show');
    });

});


