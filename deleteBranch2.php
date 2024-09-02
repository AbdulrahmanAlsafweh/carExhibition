<?php
session_start();
require "connection.php";


if($_SERVER['REQUEST_METHOD']=="GET" && isset($_REQUEST['id'])){


$id=$_REQUEST['id'];

$sql="delete from `carexhibition` WHERE `exhibition-id` = '$id' ";
$res=mysqli_query($con,$sql);
}


                $sql1="SELECT * FROM `carexhibition` ";
                $res1=mysqli_query($con,$sql1);

                while ($row1=mysqli_fetch_array($res1)){
                    echo "<tr>";
                    echo "<td class='idB' >".$row1['exhibition-id']."</td>";
                    echo "<td>".$row1['exhibition-name']."</td>";
                    echo "<td>".$row1['location']."</td>";
                    echo "<td>".$row1['car-capacity']."</td>";
                    echo "<td> <img src='./assets/imgs/exit.png'  onclick=deleteRow(this) width=50px style='cursor:pointer' /> ";
                    echo "<tr>";
                }
    




?>