<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<!-- navigation -->
    <div class="container">
        <nav class="nav-bar navbar-expand-md">
            <div class="d-flex">
                <a href="#" class="navbar-brand">
                    Bookstore
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a href="#" class="nav-link">Home</a> 
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About</a> 
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a> 
                        </li>
                    </ul>
                    <form action="" class="form-inline my-2 my-lg-0" style="margin-right: 50px;">
                        <input type="search" class="form-control mr-sm-2" placeholder="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <div class="btn-group">
                        <div class="dropdown">
                            <?php 
                            session_start();
                            if (isset($_SESSION['username'])) 
                            {
                                $name = $_SESSION['username'];
                                echo <<<_END
                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Hi $name </button>
                                <div class="dropdown-menu p-2">
                                <a class="dropdown-item" href="#">Your profile</a>
                                <a class="dropdown-item" href="#">Wishlist</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                                </div>
_END;
                            } 
                            else 
                            {
                                echo '<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">Login</button>';
                                echo '<div class="dropdown-menu p-2" style="width: 20rem;">';
                                include 'login.php';
                                echo '</div>';
                            }
                            ?>
                            </div>
                        </div>
                        <a href="register.php" class="btn btn-outline-secondary">Register</a>
                    </div>
                </div>
            </div>
        </nav>

    <hr class="my-2">

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

    <hr class="my-2">
    <footer>
        <div class="row justify-content-center" style="height: 50px;"><small>This website is made by Kodah2510</small></div>
    </footer>

</body>
</html>