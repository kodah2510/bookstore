<?php include 'head.html' ?>
<body>
<?php include 'layouts/navbar.php';?>

<!-- image slide -->
<div class="container">
    <div id="imageSlider" class="row justify-content-center">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card text-white">
                        <img src="https://picsum.photos/id/1005/5760/3840" alt="" class="card-img d-block w-100" height="600">
                        <div class="card-img-overlay">
                            <h4 class="card-title">New books</h4>
                            <p class="card-text">New books are comming soon!</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card text-white">
                        <img src="https://picsum.photos/id/1008/5616/3744" alt="" class="d-block w-100" height="600">
                        <div class="card-img-overlay">
                            <h4 class="card-title">New books</h4>
                            <p class="card-text">New books are comming soon!</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card text-white">
                        <img src="https://picsum.photos/id/1010/5184/3456" alt="" class="d-block w-100" height="600">
                        <div class="card-img-overlay">
                            <h4 class="card-title">New books</h4>
                            <p class="card-text">New books are comming soon!</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
</div>
   
<?php include 'layouts/footer.html'; ?>
</body>
</html>