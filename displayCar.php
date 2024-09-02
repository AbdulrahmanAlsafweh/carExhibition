<?php
session_start();
require "connection.php";

$id=$_GET['id'];

$sql="select * from cars,carexhibition where `car-id` = '$id' AND `cars`.`exhibition-id`=`carexhibition`.`exhibition-id` ";
$res=mysqli_query($con,$sql);
$res1=mysqli_query($con,$sql);

$res2=mysqli_query($con,$sql);
while($V=mysqli_fetch_array($res2)){
    $Views=$V['views'];
    $Views++;
    $q="update `cars` SET `views` ='$Views' where `car-id`='$id' ";
    mysqli_query($con,$q);
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
           Car Info
        </title>
        <style>
            #carImage{
                margin:  auto;
                
                display: block;
                box-shadow: 0px 0px 10px rgba(1, 1, 1, 0.5);
                border-radius:9px ;
                width: 600px;
                height: 400px;
            }
            @keyframes animationK{
                from{
                    transform:scale(1);
                }
                to{
                    transform:scale(1.1);
                }
            }
            img:hover{
                animation: animationK 3s forwards;
            }
            table{
                background-color: #eee;
                border-collapse: collapse;
            }
             table {
                margin-top:50px ;
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        </style>
    </head>
    <body style="margin: 0px;">
        <div style="background-color: #2e2e2e ; margin-bottom:20px ; padding-bottom:30px    ">
            <a href="index.php">
           <img src="./assets/imgs/exit.png"  alt="exit"  width="100px">
           </a>
           <?php

            while($row1=mysqli_fetch_array($res1)){
           echo  "<img src=./uploads/cars/".$row1['imagename'] ." id=carImage  >";
            }

           ?>
        </div>
        <table>
            <thead>
                <th>Model</th>
                <th>Year</th>
                <th>Top Speed</th>
                <th>Color</th>
                <th>Price</th>
                <th>Transmission Type</th>
                <th>exhibition</th>
                <th>location</th>
            </thead>
            <tbody>
                <?php

            while ($row=mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>";
                echo $row['model'];
                echo "</td>";

                 echo "<td>";
                echo $row['year'];
                echo "</td>";

                 echo "<td>";
                echo $row['top-speed']."Km/h";
                echo "</td>";

                 echo "<td>";
                echo $row['color'];
                echo "</td>";

                 echo "<td>";
                echo $row['price']."$";
                echo "</td>";

                 echo "<td>";
                echo $row['transmission-type'];
                echo "</td>";
                echo "<td>";
                echo $row['exhibition-name'];
                echo "</td>";
                 echo "<td>";
                echo $row['location'];
                echo "</td>";
}
                ?>
            </tbody>
        </table>


   
    </body>
</html>