<?php
include("assets/classes/autoload.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Homepage</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg" style="background: cadetblue;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <a class="btn btn-outline-light m-4" href="create.php">Create</a>
                    <a class="btn btn-outline-light m-1" href="http://">Profile</a>
                </div>
            </div>
        </nav>
    </div>


    <div style="padding: 40px;">
        <div class="row row-cols-1 row-cols-md-3 g-4" style="background: cadetblue; border-radius: 20px; min-height: 80vh; overflow-y: auto;">
            
        <?php
                $post = new post();

                $results =$post->get_post();
                if ($results) {
                    $image = "https://tse4.mm.bing.net/th/id/OIP.JFqOXf8-Waw9gDdkJJMD2QHaE8?r=0&rs=1&pid=ImgDetMain&o=7&rm=3";
                    foreach ($results as $article){
                        if($article['image'] !== ""){
                            $image = $article['image'];
                        }
                        echo '  <div class="col">
                                    <div class="card">
                                    <img src="' . $image . '" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">' . $article['title'] . '</h5>
                                    <p class="card-text">' . $article['article'] . '</p>
                                    </div>
                                    </div>
                                </div>';
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>No articles found</div>";
                }
                ?>
        </div>
    </div>

    <footer style="background : cadetblue; min-height: 5vh; text-align: center; padding: 10px;">
        <div>
            All rights reserved News Website ⓒ2026
        </div>

    </footer>
</body>
<script src="assets/js/bootstrap.min.js"></script>

</html>