<?php
session_start();
require "connection.php";


$username=$_POST['username'];
$password=$_POST['password'];


$sql="select username,password,role,id,profileImage from customers where username like '$username'";


$res=mysqli_query($con,$sql);


if(mysqli_num_rows($res)==1){
while($row=mysqli_fetch_array($res)){

    if($password==$row['password']){    
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['id']=$row['id'];
    $_SESSION['role']=$row['role'];
    $_SESSION['profileImage']=$row['profileImage']; 
    if($row['role'] == 0){
    header("location:index.php");
    }

    else if ($row['role'] == 1){
        header("location:admin.php");
    }
    }
    else {
    header("location:login.html");
}
}

}


else {
    header("location:login.html");
}