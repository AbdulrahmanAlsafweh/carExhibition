<?php
session_start();

if(empty($_SESSION['username'])){
header("location:login.html");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>company details</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #eeee;
            color: #2e2e2e;
            margin: 0;
            padding: 20px;
        }
        #main {
            max-width: 400px;
            margin: 0 auto;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #2e2e2e;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #2e2e2e;
            color: #fff;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #444;
        }
        a img {
            display: block;
            max-width: 100px;
        }
    </style>
</head>
    <body>
        <a href="admin.php">
        <img src="./assets/imgs/exit.png" width="100px" alt="">
        </a>
        <div id="main">
        <form method='post' >
        <input type="text" name="companyName" placeholder="Manufacturing company " id="company">
        <br>
        <br>
        <input type="submit" value="add" name="submit" id="btn">
        </form>
        </div>
    </body>
</html>

<?php
require "connection.php";
if(isset($_POST['submit'])){
$companyName=strtolower($_POST['companyName']);
$sql1="select * from `manufacturing-company` where  `name` = '$companyName' ";
$result=mysqli_query($con,$sql1);

if( mysqli_num_rows($result) == 0){
$sql=" insert into `manufacturing-company` (name) VALUES ('$companyName') ";
$res=mysqli_query($con,$sql);

if($res==0){
    echo "error occured while adding the company";
}
else{
    echo "company added succesfully";
}
}
else {
    echo "the company is already exist";
}
}
?>