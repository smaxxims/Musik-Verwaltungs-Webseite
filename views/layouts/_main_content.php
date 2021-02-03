<?php
/*
 *  test composer
require 'C:/xampp/php/vendor/autoload.php';

$Parsedown = new Parsedown();
echo $Parsedown->text('Hello _Parsedown_!');
*/
?>
<div>
    <div class="banner">
        <div class="logo">
            <a href="/cd/views/home">
                <img src="../public/images/home/logo.png">
            </a>
        </div>

<!--
        <div class='peak grad1 p1'></div>
        <div class='peak grad1 s1'></div>
        <div class='peak grad2 p2'></div>
        <div class='peak grad2 s2'></div>
        <div class='peak grad3 p3'></div>
        <div class='peak grad3 s3'></div>
        <div class='peak grad4 p4'></div>
        <div class='peak grad4 s4'></div>
        <div class='peak grad5 p5'></div>
        <div class='peak grad5 s5'></div>
        <div class='peak grad6 p6'></div>
        <div class='peak grad6 s6'></div>
        <div class='peak grad7 p7'></div>
        <div class='peak grad7 s7'></div>
        <div class='peak grad8 p8'></div>
        <div class='peak grad8 s8'></div>
        <div class='peak grad9 p9'></div>
        <div class='peak grad9 s9'></div>
        <div class='peak grad10 p10'></div>
        <div class='peak grad10 s10'></div>
        <div class='shadow'></div>
-->

        <div class="btn-wrapper">
            <button class="banner-btn">Play</button>
        </div>
    </div>

    <div class="nav-wrapper">
        <div class="hamburger-menu">
            <div class="line line-1"></div>
            <div class="line line-2"></div>
            <div class="line line-3"></div>
        </div>

        <?php include "layouts/_nav.html" ?>
        
        <div class="bottom-nav scrollDesign"></div>
    </div>
</div>

<script>

/*
    function enterFullscreen(element) {
        if(element.requestFullscreen) {
            element.requestFullscreen();
        } else if(element.msRequestFullscreen) {
            element.msRequestFullscreen();
        } else if(element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        }
    }

    //enterFullscreen(document.documentElement); // ganze Seite
    enterFullscreen(document.querySelector('body')); // ein bestimmtes Element
*/



    const spinPlayBtn = () => {
    document.querySelector(".banner-btn").style.transition = 'transform 5s'
    document.querySelector(".banner-btn").style.transform = 'rotateX(42deg) rotateZ(-21deg) rotateY(360deg)'
    }
    setTimeout( spinPlayBtn, 1000)
</script>