<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "connect.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `form`(name, email, phone, message) VALUES('$name','$email','$phone','$message')";
    $result = mysqli_query($con,$sql);

    if ($result){
        echo 'data inserted successfully';
    }
    else
        die(mysqli_error($con));
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get in Touch Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Get in Touch</h1>
            <p>Fill out the form below and we'll get back to you as soon as possible.</p>
        </div>

        <form action="#" method="POST" class="contact-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" placeholder="09123456789">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Your message" rows="6"></textarea>
            </div>

            <button type="submit" class="send-button">Send Message</button>
        </form>
    </div>
</body>
</html>