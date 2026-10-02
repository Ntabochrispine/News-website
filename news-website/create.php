<?php
$success = "";
$error="";
 include("assets/classes/autoload.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = $_POST['title'];
    $article = $_POST['article'];
    $image = $_POST['image'];
    if ($title == "" || $article == "") {
        $error = "some fields are empty";
    }
    $userid = $_SESSION['userid'];
    $db = new Database;
    $user = new User;


    $postid = $user->create_id();
    $image = "";
    $date =date("y-m-d:h:i:s");
    
    $sql = "insert into `news`(title,postid,article,image,userid,date)values('$title','$postid','$article','$image','$userid','$date')";

    $db->save($sql);

    $success = "article created successfully.";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Create</title>
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
    <div style="padding-top: 5rem;">
        <form method="post" style="max-width: 50%;border-radius: 3%; background: cadetblue; padding: 40px; margin: auto;">
            <?php
            if($error !==""){
                echo "<div class ='alert alert-danger'role='alert'>$error</div>";
            }
                if ($success !==""){
                    echo"<div class='alert alert-danger'role ='alert'>success</div>";
                    } 
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input name = "title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Article </label>

                <textarea name="article" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">image</label>
                <input name = "image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
      
    
    <div style="padding: 40px;">
        <div class="row row-cols-1 row-cols-md-3 g-4" style="background: cadetblue; border-radius: 20px; min-height: 80vh; overflow-y: auto;">
            <div class="col">
                <?php
                $post = new post();
                $userid = [];
                $userid["userid"] = $_SESSION ['userid'];
                $results =$post->get_post_id($userid);
                print_r($results);
                echo "<br>";
                print_r($userid);
                echo "<br>";
                ?>
                <div class="card">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.JFqOXf8-Waw9gDdkJJMD2QHaE8?r=0&rs=1&pid=ImgDetMain&o=7&rm=3" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
          


</body>
<script src="assets/js/bootstrap.min.js"></script>

</html>