const init = () => {
    getCdsByBtn('.musik-cds-nav-btn')
    getHomeByBtn('.home-nav-btn')
    getLoginByBtn('.login-nav-btn')
    getContactBy('.contact-nav-btn')
    getCdByIdByBtn('.musik-cd-btn')
}

// open and close menu and main-content 
$('.hamburger-menu').click(function () {

    if ($('.nav-wrapper').toggleClass('change')) {
        $('.bottom-nav').show()
    } else {
        $('.bottom-nav').hide()
    }

    $('.nav-wrapper').hasClass('change') ? $('.footer-div').hide() : $('.footer-div').show()
    if ($('.bottom-nav').text() == '') {
        $('.bottom-nav').show()
        getHomeContent()
    }
})

$('.banner-btn').click(function () {

    if ($('.nav-wrapper').toggleClass('change')) {
        $('.bottom-nav').show()
    } else {
        $('.bottom-nav').hide()
    }

    $('.nav-wrapper').hasClass('change') ? $('.footer-div').hide() : $('.footer-div').show()
    if ($('.bottom-nav').text() == '') {
        getHomeContent()
    }
})



// on scroll down in bottom-nav hide top-nav

function scrollFun() {
    if (document.querySelector('.bottom-nav').scrollTop > 10) {
        $('.top-nav').hide()
        $('.logo').hide()
        $('.hamburger-menu').hide()
    } else {
        $('.top-nav').fadeIn('slow')
        $('.logo').fadeIn('slow')
        $('.hamburger-menu').fadeIn('slow')
    }
    if (document.querySelector('.bottom-nav').scrollTop > 800) {

        // show top arrow
        $('.scroll-top-arrow').fadeIn('slow')

        // scroll to top
        $('.scroll-top-arrow').click(function () {
            $('.bottom-nav').scrollTop(0)
        })

    } else {
        $('.scroll-top-arrow').fadeOut('slow')
    }
}

const phoneStyle = size => {
    if (size.matches) {
        document.querySelector('.bottom-nav').onscroll = function() {
            scrollFun()
        }
    }
}
const max450px = window.matchMedia("(max-width: 450px)")

phoneStyle(max450px)



// active nav link color on use
$('.nav-link').click(function () {
    $("li a:first-child").removeClass('open');
    $(this).addClass('open')
});

// get cds
const getCdsByBtn = btn => {
    $(btn).mousedown(function () {

        $.ajax({
            type: "POST",
            url: "music-cds",
            contentType: "application/json; charset=utf-8",
            dataType: "html",
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                $('.bottom-nav').animate({scrollTop: 0}, 'slow')
                $('.bottom-nav').html(res)
                $('.pimage').css('animation', '1s cubic-bezier(.79,.14,.15,.86) 0s 1 normal none running rotation')

                // scroll down
                // desktop option
                /*$(window).bind('mousewheel', function (event) {
                    if (event.originalEvent.wheelDelta >= 0) {
                        $('.top-nav').fadeIn(1000)
                        $('.hamburger-menu').fadeIn(1000)
                        $('.bottom-nav').css('height', '88vh')
                    } else {
                        $('.top-nav').fadeOut('slow')
                        $('.hamburger-menu').fadeOut('slow')
                        $('.bottom-nav').css('height', '100vh')
                    }
                });*/

                // click event to show details of one cd
                getCdByIdByBtn('.musik-cd-btn')

                // show next cds
                $('.load-more-cds').mousedown(function () {
                    let cdsCount = {
                        'cds-count': $('.cds').children().length
                    }

                    $.ajax({
                        type: "POST",
                        url: "load-next-cds",
                        data: cdsCount,
                        dataType: "html",
                        cache: false,

                        error: function (e) {
                            console.log(e);
                        },
                        success: function (res) {
                            $('.cds').append(res)
                            getCdByIdByBtn('.musik-cd-btn')
                        }
                    })
                })

                // search cd
                $(".cd-search-field").keydown(function () {
                    $(".cd-search-field").css("color", "#16c3cf");
                });
                $(".cd-search-field").keyup(function () {
                    $('.load-more-cds').hide()
                    $(".cd-search-field").css("color", "white");

                    let formData = {
                        'cd-search-field': $(".cd-search-field").val(),
                    };
                    $.ajax({
                        type: "POST",
                        url: "music-cds",
                        data: formData,
                        dataType: "html",
                        error: function (e) {
                            console.log(e);
                        },
                        success: function (res) {
                            if (res.includes('Keine Cds')) {
                                $('.cds').hide().html(res).fadeIn('slow')
                                $('.cds').css("color", "white");
                            } else {
                                $('.cds').html(res)
                            }
                            getCdByIdByBtn('.musik-cd-btn')
                            if ($(".cd-search-field").val() == '') {
                                $('.load-more-cds').show()
                            }
                        }
                    });
                });

            } // success end
        })
    })
}

// nav home.php btn
const getHomeByBtn = btn => {
    $(btn).mousedown(function () {

        $.ajax({
            type: "POST",
            url: "home_content_nav",
            contentType: "application/json; charset=utf-8",
            dataType: "html",
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                $('.bottom-nav').html(res)
                getCdsByBtn('.musik-cds-btn-home.php')
            }
        })
    })
}

const getHomeContent = () => {
    $.ajax({
        type: "POST",
        url: "home_content_nav",
        contentType: "application/json; charset=utf-8",
        dataType: "html",
        cache: false,

        error: function (e) {
            console.log(e);
        },
        success: function (res) {
            $('.bottom-nav').html(res)
        }
    })
}

// get contact
const getContactBy = btn => {

    $(btn).mousedown(function (event) {

        $.ajax({
            type: "POST",
            url: "contact",
            dataType: "html",
            cache: false,

            error: function (error) {
                console.log(error);
            },
            success: function (res) {
                $('.bottom-nav').html(res)
                if ($('textarea#ta').length) {
                    CKEDITOR.replace('ta')
                }
            }
        })
    })
}

// get register
const getRegisterByBtn = btn => {

    $(btn).mousedown(function (event) {
        console.log('click')

        $.ajax({
            type: "POST",
            url: "register",
            contentType: "application/json; charset=utf-8",
            dataType: "html",
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                $('.bottom-nav').html(res)
                postRegisterByBtn('.submit-register-btn')
            }
        })
    })
}

// post register
const postRegisterByBtn = btn => {
    $(btn).mousedown(function (event) {

        let formData = {
            'username': $('input[name=username]').val(),
            'email': $('input[name=email]').val(),
            'password': $('input[name=password]').val(),
        };

        $.ajax({
            type: "POST",
            url: "register",
            data: formData,
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                $('.msb-box').hide().html(res).fadeIn('slow')
            },
        })
    })
}

// get Login
const getLoginByBtn = btn => {

    $(btn).mousedown(function (event) {

        $.ajax({
            type: "POST",
            url: "login",
            contentType: "application/json; charset=utf-8",
            dataType: "html",
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                $('.bottom-nav').html(res)
                postLoginByBtn('.submit-login-btn')
                getRegisterByBtn('.to-register-btn')
            }
        })
    })
}

// post Login
const postLoginByBtn = btn => {
    $(btn).mousedown(function (event) {

        let formData = {
            'username': $('input[name=username]').val(),
            'password': $('input[name=password]').val(),
        };

        $.ajax({
            type: "POST",
            url: "login",
            data: formData,
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                if (res.includes("Eingeloggt")) {
                    const newTab = () => window.location.replace("admin/home");
                    setTimeout(newTab, 3000)
                }
                $('.msb-box').hide().html(res).fadeIn('slow')
            },
        })
    })
}


const getCdByIdByBtn = btn => {
    $(btn).mousedown(function (event) {

        var dataId = $(this).attr("data-id")

        $.ajax({
            type: "POST",
            url: "cd?id=" + dataId,
            dataType: "html",
            error: function (e) {
                console.log(`Error: ${e}`);
            },
            success: function (response) {
                $('.bottom-nav').html(response)
            }
        });
        $('.bottom-nav').animate({scrollTop: 0}, 'slow')
    })
}

init()