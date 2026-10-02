<?php
$error = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){

    //initialize variables
    $email = $_POST["email"];
    $password = $_POST["password"];

    //filter empty fields
    if($email == '' || $password == ''){
        $error = "Some fields are empty.";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email address.";
    }


    if($error == ""){
        //Read from database
        include("assets/classes/autoload.php");
        $db = new Database;
        $user = new User;

        $password = $user->hash_text($password);
         
        $sql = "select * from users where email = '$email' && password = '$password' limit 1";
        $results = $db->read($sql);
        
        if($results){
            $_SESSION['userid'] = $results[0]['userid'];
            header("Location: homepage.php");
            die;
    
        }else{
            $error = "Invalid email or password";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        .output{
            color: red;
        }
    </style>
</head>
<body>
    <div style = "padding-top: 5rem;">

        <form method = "post" style = "max-width: 50%;border-radius: 3%; background: cadetblue; padding: 40px; margin: auto;">
            <h2>Login</h2>
            <div class = "output">
                <?php
                if($error !== ""){
                    echo $error;
                }
                ?>
            </div>

            <div class="mb-3 w-70">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name = "email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name = "password" type="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <br>
            Don't have an account <a href ="signup.php">Signup</a>
        </form>

    </div>
</body>
<script src="assets/js/bootstrap.min.js"></script> 
</html>