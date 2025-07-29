<?php
$error =0;
$success =0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `signup` WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($con,$sql);
    if ($result){
        $num = mysqli_num_rows($result);
        if($num > 0){ 
            $success=1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        }
        else{
            $error =1;
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

    <title>LOGIN PAGE</title>
  </head>
  <body>
    <?php
    if($error){
        echo'<div class="alert alert-danger" role="alert">
            error-Invalid data!
            </div>';
    } 
    if($success){
        echo'<div class="alert alert-success" role="alert">
            success-logged in successfully
            </div>';
    } 
    ?>
    <h1 class="text-center">login here</h1>
    <div class="container mt-5">
        <form action="login.php" method="post">
            <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Username</label>
            <input type="text" class="form-control"  placeholder="Username" name="username">
            </div>
            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password</label>
            <input type="password" class="form-control"  placeholder="Password" name="password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">login</button>
                <a class="btn btn-primary" href="signup.php" role="button">Sign up</a>
            </div>
            
        </form>
    </div>
  </body>
</html>