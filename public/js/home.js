
const init = () => {
    getCdsByBtn('.musik-cds-nav-btn')
    getHomeByBtn('.home-nav-btn')
    getLoginByBtn('.login-nav-btn')
    getContactBy('.contact-nav-btn');
}
let a = 1

// open and close menu and main-content 
$('.hamburger-menu').click(function () {
    $('.nav-wrapper').toggleClass('change')
    if ($('.bottom-nav').text() == '') {
        getHomeContent()
    }
})

$('.banner-btn').click(function () {
    $('.nav-wrapper').toggleClass('change')
    if ($('.bottom-nav').text() == '') {
        getHomeContent()
    }
})

// active nav link
$('.nav-link').click(function() {
    $("li a:first-child").removeClass('open');
    $(this).addClass('open')
  });

// get cds
const getCdsByBtn = btn => {
    $(btn).mousedown(function () {
        $.ajax({
            type: "POST",
            url: "music-cds.php",
            contentType: "application/json; charset=utf-8",
            dataType: "html",
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                $('.bottom-nav').html(res)
                $('.pimage').css('animation', '1s cubic-bezier(.79,.14,.15,.86) 0s 1 normal none running rotation')
                getCdByIdByBtn('.musik-cd-btn')
            }
        })
    })
}

// nav home.php btn
const getHomeByBtn = btn => {
    $(btn).mousedown(function () {

        $.ajax({
            type: "POST",
            url: "test.php",
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
        url: "test.php",
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
}

// get contact
const getContactBy = btn => {

    $(btn).mousedown(function (event) {
        console.log("Handler for event called.")
        $.ajax({
            type: "POST",
            url: "contact.php",
            //contentType: "application/json; charset=utf-8",
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
        console.log("Handler for .submit() called.")
        $.ajax({
            type: "POST",
            url: "login.php",
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
        console.log("Handler for .submit() called.")
        let formData = {
            'username': $('input[name=username]').val(),
            'password': $('input[name=password]').val(),
        };

        /*var meAsJqueryObj = $(this)
        if (meAsJqueryObj.data('requestRunning')) {
            return
        }
        meAsJqueryObj.data('requestRunning', true)
        console.log(meAsJqueryObj)*/

        $.ajax({
            type: "POST",
            url: "login.php",
            //contentType: "application/json; charset=utf-8",
            data: formData,
            //dataType: "json",
            //encode: true,
            cache: false,

            error: function (e) {
                console.log(e);
            },
            success: function (res) {
                console.log(res);
                if (res.includes("Eingeloggt")) {
                    const newTab = () => window.open('admin/home', '_blank')
                    setTimeout(newTab, 3000)

                    const reloadPage = () => location.reload()
                    setTimeout(reloadPage, 3000)

                    //$(location).attr('href', "admin/cds.php")
                }
                $('.msb-box').html(res)
            },
            complete: function () {
                //meAsJqueryObj.data('requestRunning', false)
                

            }
        })
    })
}


const getCdByIdByBtn = btn => {
    $('.musik-cd-btn').mousedown(function (event) {

        var dataId = $(this).attr("data-id")

        $.ajax({
            type: "POST",
            url: "cd.php?id=" + dataId,
            dataType: "html",
            error: function (e) {
                console.log(`Error: ${e}`);
            },

            success: function (response) {
                $('.bottom-nav').html(response)
                $('.bottom-nav').css('position', 'absolute')
            }

        });
        $('.bottom-nav').animate({ scrollTop: 0 }, 'slow')
    })
}

init()