<?php
session_start();
require "connection.php";

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_REQUEST['id'])){
$id=$_REQUEST['id'];

$sql="delete from `cars` WHERE `car-id` = '$id' ";
$res=mysqli_query($con,$sql);
}


                $sql1="SELECT * FROM `cars` ";
                $res1=mysqli_query($con,$sql1);

                while ($row1=mysqli_fetch_array($res1)){
                    echo "<tr>";
                    echo "<td class='idB' >".$row1['car-id']."</td>";
                    echo "<td>".$row1['color']."</td>";
                    echo "<td>".$row1['manufacturing-company-id']."</td>";
                    echo "<td>".$row1['model']."</td>";
                    echo "<td>".$row1['year']."</td>";
                    echo "<td>".$row1['top-speed']."</td>";
                    
                    
                    echo "<td>".$row1['fuel-type']."</td>";
                    echo "<td>".$row1['transmission-type']."</td>";
                    echo "<td>".$row1['price']."$</td>";
                    echo "<td> <img src=uploads/cars/".$row1['imagename']." width='150px' height='100px' style='border-radius:10px ' > </td>";
                    echo "<td> <img src='./assets/imgs/exit.png'  onclick=deleteRow(this) width=50px style='cursor:pointer'  /> ";
                    echo "<tr>";
                }



?>