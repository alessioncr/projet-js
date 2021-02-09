

<!-- inspiration-->
<!-- https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=carousel-->


<div class="container-fluid py-3" id="wall">
    <div class="carousel slide" id="myCarousel" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid rounded" src="./images/famous/fame1.jpg" alt="First Slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid rounded" src="./images/famous/fame2.jpg" alt="Second Slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid rounded" src="./images/famous/fame3.jpg" alt="Third Slide">
            </div>
            <div class="carousel-item">
                <img class="img-fluid rounded" src="./images/famous/fame4.jpg" alt="Fourth Slide">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>