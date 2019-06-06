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
                            <img src="https://picsum.photos/id/1005/5760/3840" alt="" class="card-img" height="700px">
                            <div class="card-img-overlay">
                                <h4 class="card-title">New books</h4>
                                <p class="card-text">New books are comming soon!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-white">
                            <img src="https://picsum.photos/id/1008/5616/3744" alt="" class="card-img" height="700px">
                            <div class="card-img-overlay">
                                <h4 class="card-title">New books</h4>
                                <p class="card-text">New books are comming soon!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-white">
                            <img src="https://picsum.photos/id/1010/5184/3456" alt="" class="card-img" height="700px">
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

<div class="container-fluid" style="height: 100vh; background-color: grey; background-image: url('img/landing/path.png');">
   
    <div class="row justify-content-center" style="">
        <div class="col-md-6" style="position: relative; margin-top: 25vh;">
            <h3>Welcome to Kodah Store</h3>
            <p>We have all kinds of book here! Go check it out</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
        </div>
        <!-- <img id="path_img" src="img/landing/path.png" style="position: absolute;"> -->
        <img id="landing_char_img" src="img/landing/landing_char.png" style="position: absolute;">
        <img id="group_1_img" src="img/landing/Group_1.png" style="position: absolute;">
        <img id="group_2_img" src="img/landing/Group_2.png" style="position: absolute;">
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <h3>Featured books</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card rounded-lg shadow p-3 mb-5 bg-white">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="img/bookcovers/the-arsonist.jpg" alt="" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card-title"><h5>The arsonist</h5></div>
                            <div class="card-text">Khoa Tong</div>
                            <div class="card-text">Rating</div>
                            <div class="card-text">Views</div>
                            <a href="#" class="btn btn-primary">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card rounded-lg shadow p-3 mb-5 bg-white">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="img/bookcovers/img2.jpg" alt="" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card-title"><h5>The arsonist</h5></div>
                            <div class="card-text">Khoa Tong</div>
                            <div class="card-text">Rating</div>
                            <div class="card-text">Views</div>
                            <a href="#" class="btn btn-primary">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card rounded-lg shadow p-3 mb-5 bg-white">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="img/bookcovers/4.jpg" alt="" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="card-title"><h5>The arsonist</h5></div>
                            <div class="card-text">Khoa Tong</div>
                            <div class="card-text">Rating</div>
                            <div class="card-text">Views</div>
                            <a href="#" class="btn btn-primary">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


   
<?php include 'layouts/footer.html'; ?>
</body>
</html>