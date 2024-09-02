<?php
session_start();
    if($_SESSION['role'] != 1){
        header("location:login.html");    
    }

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>

    <style>
        h1 {
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }

        #main-div {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: row;

        }

        .link {
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 200px;
            background-color: #eee;
            text-align: center;

        }

        a {
            display: flex;
            margin: 50px;
            text-decoration: none;
            width: 300px;
            height: 200px;
            display: block;
            color: black;
            font-weight: bolder;


        }

        a:hover {
            animation: animation 0.4s forwards;
        }

        p {
            border-left: 3px red solid;
            border-right: 3px red solid;
            font-family: 'Courier New', Courier, monospace;
        }

        @keyframes animation {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }
    </style>
</head>

<body>
    <h1>Car exhibition managment</h1>
    <div id="main-div">

        <a href="viewdata.php">
            <div class="link">
                <p> view data</p>
            </div>
        </a>

        <a href="insertcar.php">
            <div class="link">
                <p>Add New Car</p>
            </div>
        </a>
        <a href="insertexhibition.html">
            <div class="link">
                <p>Add New Branch</p>
            </div>
        </a>
        <a href="deleteCar.php">
            <div class="link">
                <p>Delete Car</p>
            </div>
        </a>
        <a href="deleteBranch.php">
            <div class="link">
                <p>Delete Branch</p>
            </div>
        </a>
        <a href="search.php">
            <div class="link">
                <p>Search for car</p>
            </div>
        </a>
        <a href="updateCar.php">
            <div class="link">
                <p>Edit Cars</p>
            </div>
        </a>

        <a href="index.php">
            <div class="link">
                <p>Home</p>
            </div>
        </a>

        <a href="insertcompany.php">
            <div class="link">
                <p>Add new manufacturing company</p>
            </div>
        </a>
        <a href="logout.php">
            <div class="link">
                <p>logout</p>
            </div>
        </a>
    </div>

</body>

</html>