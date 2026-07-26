<?php
session_start();
include("php/config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT properties.*
        FROM interested_users
        JOIN properties
        ON interested_users.property_id = properties.id
        WHERE interested_users.user_id = '$user_id'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interested Properties</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        My Interested Properties
    </h2>

    <div class="row">

        <?php

        if(mysqli_num_rows($result)>0){

            while($property=mysqli_fetch_assoc($result)){

        ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow">

                <img src="images/<?php echo $property['image']; ?>" class="card-img-top">

                <div class="card-body">

                    <h5><?php echo $property['name']; ?></h5>

                    <p><?php echo $property['location']; ?></p>

                    <h4>₹<?php echo $property['price']; ?></h4>

                    <a href="property-detail.php?id=<?php echo $property['id']; ?>"
                       class="btn btn-primary w-100">

                        View Details

                    </a>

                </div>

            </div>

        </div>

        <?php

            }

        }else{

            echo "<h4 class='text-center'>No Interested Properties Yet!</h4>";

        }

        ?>

    </div>

</div>

</body>
</html>