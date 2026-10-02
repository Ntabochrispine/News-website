<?php
$error = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){

    //initialize variables
    $f_name = $_POST['f-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = "";

    //filter empty fields
    if($f_name == '' || $email == '' || $password == ''){
        $error = "Some fields are empty.";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email address.";
    }

    if(strlen($password) < 6){
        $error = "Password should be atleast 6 characters.";
    }

    if($error == ""){
        //save to database
       
        include("assets/classes/autoload.php");
        $db = new Database;
        $user = new User;
         
        $sql = "select * from users where email = '$email' limit 1";
        $results = $db->read($sql);
        $role = "user";
    
        $userid = $user->create_id();
        $password = $user->hash_text($password);
        if(!$results){
            $sql = "insert into `users` (userid,full_name,email,password,role) values ('$userid','$f_name','$email','$password','$role')";
            $results = $db->save($sql);
            header("Location: login.php");
            die;
    
        }else{
            $error = "Email already exists";
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
    <title>Sign Up</title>
    <style>
        .output{
            color: red;
        }
    </style>
</head>
<body>
    <div style = "padding-top: 5rem;">

        <form method = "post" style = "max-width: 50%;border-radius: 3%; background: cadetblue; padding: 40px; margin: auto;">
            <h2>Sign Up</h2>
            <div class = "output">
                <?php
                if($error !== ""){
                    echo $error;
                }
                ?>
            </div>
            <div class="mb-3 w-70">
                <label for="exampleInpuName" class="form-label">Full Name</label>
                <input name = "f-name" type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" required>
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
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <br>
            Already have an account <a href ="login.php">Login</a>
        </form>

    </div>
</body>
<script src="assets/js/bootstrap.min.js"></script> 
</html>