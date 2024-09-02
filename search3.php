<?php
require "connection.php";
$search=strtolower($_REQUEST['search']);

$sql="select * from `cars` where LOWER(`model`) like '$search%' ";
$res=mysqli_query($con,$sql);


while($row1=mysqli_fetch_array($res))
{
     echo "<tr>";
                    echo "<td class='idB' >".$row1['car-id']."</td>";
                    echo "<td>".$row1['color']."</td>";
                    echo "<td>".$row1['manufacturing-company-id']."</td>";
                    echo "<td>".$row1['model']."</td>";
                    echo "<td>".$row1['year']."</td>";
                    echo "<td>".$row1['top-speed']."</td>";
                    
                    
                    echo "<td>".$row1['fuel-type']."</td>";
                    echo "<td>".$row1['transmission-type']."</td>";
                    echo "<td>".$row1['price']."</td>";
                    echo "<td> <img src=uploads/cars/".$row1['imagename']." width='150px' height='100px'> </td>";
                    echo "<tr>";
}



?>