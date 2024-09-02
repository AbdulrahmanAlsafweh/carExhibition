<?php
require "connection.php";

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_REQUEST['search'])){
$search=strtolower($_REQUEST['search']);

$sql="select * from `cars` where LOWER(`model`)  like '$search%' ORDER BY `views` DESC ";
$res1=mysqli_query($con,$sql);
$res=mysqli_query($con,$sql);



$i=0;//for loop
$nbrows=mysqli_num_rows($res);
$j=0;
$k=0;
while ($row=mysqli_fetch_array($res)){
    $k++;
    $j++;
   
if($i==0){
    echo "<div class='main'>";

}


echo "<div class='card' >"; //start of card
echo "<div onclick='displayCar(this)'>";
 echo "<span class='views-counter'>"; 
 echo  "<i class='fas fa-eye'></i> ". $row['views'];
  echo "</span>";
echo  "<img src=./uploads/cars/".$row['imagename']." >";
echo "<h3 class='title'>".$row['model']."</h3>";
echo "<p style='margin-top:9px'>".$row['price']."$"."</p>";
echo "<div style='padding:0px;' id=".$row['car-id']." class='id'></div>";
echo "</div>";

  echo "</div>"; //end of card
$i++;

if ($i==3 || $j==$nbrows){
echo "</div>";
$i=0;
}

}

}


