<?php
include("config.php");

$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);

$properties = array();

while($row = mysqli_fetch_assoc($result)){
    $properties[] = $row;
}

header("Content-Type: application/json");
echo json_encode($properties);
?>