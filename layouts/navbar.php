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
</div>
    <hr class="my-2">
