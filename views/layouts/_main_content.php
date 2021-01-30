<div>
    <div class="banner">
        <div class="logo">
            <a href="/cd/views/home">
                <img src="../public/images/home/logo.png">
            </a>
        </div>
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
    const spinPlayBtn = () => {
    document.querySelector(".banner-btn").style.transition = 'transform 5s'
    document.querySelector(".banner-btn").style.transform = 'rotateX(42deg) rotateZ(-21deg) rotateY(360deg)'
    }
    setTimeout( spinPlayBtn, 1000)
</script>