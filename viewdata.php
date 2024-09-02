<?php
require "connection.php";

$query="select * from `cars`";

$res=mysqli_query($con,$query);

$sql='select * from carexhibition';
$result=mysqli_query($con,$sql);
?>

<html>
    <head><title>
        Data
    </title>

    <style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #eee;
            font-weight: bold;
        }

        tbody tr:hover {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        img {
            max-width: 150px;
            max-height: 100px;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        h4 {
            text-align: center;
            margin-top: 30px;
        }
       
    </style>
</head>
    <body>
        <a href="admin.php">
            <img src="./assets/imgs/exit.png" width="100px" alt="">
        </a>
        <h2 >Cars</h2>
        <table>
            <thead>
                <th>Car Id</th>
                <th>Color</th>
                <th>Manufacturing company</th>
                <th>Model</th>
                <th>Year</th>
                <th>Top Speed</th>
                <th>Fuel Type</th>
                <th>Transmission Type</th>
                <th>Price</th>
                <th>Image</th>
            </thead>
            <tbody>
                <?php
                    while ($row=mysqli_fetch_array($res)){
                        echo "<tr>"."<td>".$row['car-id']."</td>"."<td>".$row['color']."</td>"."<td>".$row['manufacturing-company-id']."</td>"."<td>".$row['model']."</td>"."<td>".$row['model'].$row['year']."</td>"."<td>".$row['top-speed']."</td>"."<td>".$row['fuel-type']."</td>"."<td>".$row['transmission-type']."</td>"."<td>".$row['price']."$</td>"."<td><img src=uploads/cars/".$row['imagename']." width='150px' height='100px' style='border-radius:10px '></td>"."</tr>";
                    }
                ?>
            </tbody>
        </table>


        <h2>Car exhibition</h2>

        <table>
            <thead>
                <th>Exhibition Id</th>
                <th>Exhibition Name</th>
                <th>Location</th>
                <th>Car Capacity</th>
            </thead>

            <tbody>

            
            <?php

                while($row=mysqli_fetch_array($result)){
                    echo "<tr>"."<td>".$row['exhibition-id']."</td>"."<td>".$row['exhibition-name']."</td>"."<td>".$row['location']."</td>"."<td>".$row['car-capacity']."</td>"."</tr>";
                }

?>
            </tbody>
        </table>


    </body>
</html>