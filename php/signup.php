<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check passwords
    if ($password != $confirm_password) {
        die("Passwords do not match!");
    }

    // Check duplicate email
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        die("Email already registered!");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users(name, email, phone, city, password)
            VALUES('$name','$email','$phone','$city','$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Registration Successful!');
                window.location='../login.html';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>