<?php
$error =0;
$success =0;


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $sql = "SELECT * FROM `signup` WHERE username = '$username'";

    $result = mysqli_query($con,$sql);
    if ($result){
        $num = mysqli_num_rows($result);
        if($num > 0)
            $error=1;
        else{
            if ($password === $cpassword){
                $sql = "INSERT INTO `signup` (username, password) VALUES ('$username', '$password')";

                $result = mysqli_query($con,$sql);
                if ($result){
                    $success =1;
                    session_start();
                    $_SESSION['username'] = $username;
                    header('location:home.php');
                }
                else{
                    echo mysqli_error($con);
                }
            }
            else {
                $error = 2;
            }  
        } 
    }   
} 

?>




<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css" integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">

    <title>SIGNUP PAGE</title>
  </head>
  <body>
    <?php
    if($error == 2){
        echo'<div class="alert alert-danger" role="alert">
            error-password does not match!
            </div>';
    } 
    if($error == 1){
        echo'<div class="alert alert-danger" role="alert">
            error-user slready exists!
            </div>';
    } 
    if($success){
        echo'<div class="alert alert-success" role="alert">
            success-user created successfully
            </div>';
    } 
    ?>
    <h1 class="text-center">sign up here</h1>
    <div class="container mt-5">
        <form action="signup.php" method="post">
            <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Username</label>
            <input type="text" class="form-control"  placeholder="Username" name="username">
            </div>
            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input type="password" class="form-control"  placeholder="Password" name="password">
            </div>
            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input type="password" class="form-control"  placeholder="Password" name="cpassword">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign up</button>
                <a class="btn btn-primary" href="login.php" role="button">Login</a>
            </div>
        </form>
    </div>
  </body>
</html>