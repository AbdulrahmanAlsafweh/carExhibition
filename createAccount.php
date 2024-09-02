<?php
session_start();
require "connection.php";

$sql='select * from customers';
$res=mysqli_query($con,$sql);

$username=$_POST['username'];
$password=$_POST['password'];

$row=mysqli_fetch_array($res);

if($username != $row['username'] && $password != $row['password']){
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['role']=0;
    $_SESSION['profileImage']='profile.png';
    $sql2="INSERT INTO `customers`(`username`, `password`, `role`,`profileImage`) values ('$username','$password','0','profileImage.png')";
    $res2=mysqli_query($con,$sql2);
    if($res2==1){
    header("location:index.php");
    }
    else {
        header("location:signup.php");
    }
}
else {
    $_SESSION['error']='The account is already exist,Try other username';
    header("location:signup.php");
}



?>