<?php
session_start();
include("config.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please login first!');
            window.location='../login.html';
          </script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if property id is received
if (!isset($_POST['property_id'])) {
    die("Property ID not found.");
}

$property_id = $_POST['property_id'];

// Check if already marked interested
$check = "SELECT * FROM interested_users
          WHERE user_id='$user_id'
          AND property_id='$property_id'";

$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {

    echo "<script>
            alert('You have already marked this property as interested.');
            window.history.back();
          </script>";

} else {

    $sql = "INSERT INTO interested_users (user_id, property_id)
            VALUES ('$user_id', '$property_id')";

    if (mysqli_query($conn, $sql)) {

        echo "<script>
                alert('Property added to your Interested list!');
                window.history.back();
              </script>";

    } else {

        echo "Error: " . mysqli_error($conn);

    }

}
?>