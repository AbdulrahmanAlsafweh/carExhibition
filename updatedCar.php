<?php
session_start();

$carId=$_REQUEST['carId'];
$_SESSION['updatedCar']=$carId;

?>