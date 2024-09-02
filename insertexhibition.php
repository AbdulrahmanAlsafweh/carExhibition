<?php

require "connection.php";

$exhibitionId=$_POST['exhibitionId'];
$name=$_POST['name'];
$capacity=$_POST['capacity'];
$location=$_POST['location'];


$query="insert into `carexhibition`(`exhibition-id`, `exhibition-name`, `location`, `car-capacity`) values ('$exhibitionId','$name','$location','$capacity')";

if (mysqli_query($con, $query)) {
    echo "Record inserted successfully";
    header("location:insertexhibition:html");
} else {
    echo "Error inserting record: " . mysqli_error($con);
}

?>