<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            echo "<script>
                    alert('Login Successful!');
                    window.location='../index.html';
                  </script>";

        } else {

            echo "<script>alert('Incorrect Password!'); window.history.back();</script>";

        }

    } else {

        echo "<script>alert('Email not registered!'); window.history.back();</script>";

    }

}
?>