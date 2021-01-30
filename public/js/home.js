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
                //var json = JSON.parse(data)
                $('.bottom-nav').html(res)
                postLoginByBtn('.submit-login-btn')
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

                //$('.bottom-nav').css('position', 'absolute')
            }

        });
        $('.bottom-nav').animate({scrollTop: 0}, 'slow')
    })
}

init()