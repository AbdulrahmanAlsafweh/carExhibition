<?php
session_start();

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

       <style>
        .changeImage{
            background-color: #eee;
            width: 400px;
            height: 400px;
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
    top: 50%;
    left: 50%;
                transform: translate(-50%, -50%);
                    border: 1px solid #ccc;
                    z-index: 9999;
            flex-direction: column;
            justify-content: space-around;
        }
       /* footer {
            background-color: #eee;
            color: black; 
            text-align: center;
            padding: 10px 0;
             margin-top: auto;
            font-weight: bolder;
        } */

        footer a {
            color: #ff0000; 
            text-decoration: none;
            margin: 0 10px;
           
        }
   .views-counter {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #f00; 
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
  }
  
  body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  margin: 0;
  padding: 0px;
}

/* Your other CSS styles for header, main content, etc. */

footer {
  background-color: #eee;
  color: black;
  text-align: center;
  padding: 10px 0;
  font-weight: bold;
  margin-top: auto; /* This pushes the footer to the bottom */
}
    </style>

</head>
<body >
<div class="navbar">
    <div class="navbar-logo">
        <img src="./assets/imgs/logo.png" alt="logo" width="200px" height="150px">
        Car Exhibition
    </div>
    <div class="navbar-search">
        <input type="search" name="search" onkeyup="search(this.value)" id="search" placeholder="Search for a car...">
    </div>
    <div class="navbar-links">
        <ul>
           
          
            
            <?php

                if(empty($_SESSION['username'])){
                    echo "<li>";
                    echo "<a href='login.html'>login</a>";
                    echo "</li>";
                }
                
                else {
                    if($_SESSION['role']== 1){
                          echo "<li>";
                    echo "<a href='admin.php'>Admin Panel</a>";
                    echo "</li>";
                    }
                    else{
                    
                    echo "<li>";
                    echo "<a href='account.php' >";
                    echo "<img src=./uploads/profiles/".$_SESSION['profileImage']." width=100px   style='border-radius:50%; ' />";
                     echo "</a>";
                    echo "</li>";
                   
                }
                }
            ?>
        </ul>
    </div>
</div>

<!-- End of Navbar -->

<!-- pop out div -->

   <div class="changeImage" >

            <h2>Change The Main Image</h2>
            <?php
            if(isset($_GET['state'])){
                echo "<p>".$_GET['state']."</p>";
            }
            ?>
            <form method=post enctype="multipart/form-data">
                <input type="file" name="image">
                <input type="submit" name="submit" value="Change" style="padding:3px">
            </form>
            <div>
                <button onclick="changeImage()">Close</button>
            </div>
        </div>
        <!-- end of popout div -->

        <div id="main">
<?php
require "connection.php";


$sql='SELECT * FROM cars ORDER BY views DESC ';
$res=mysqli_query($con,$sql);

   if(isset($_POST['submit'])){
        $originalName= $_FILES['image']['name'];
        $fileInfo=pathinfo($originalName);
        $imageExtention=$fileInfo['extension'];
        $newDirectory='./uploads/mainImg/';
        $tempPath=$_FILES['image']['tmp_name'];

        $newImageName=$_SESSION['username']."_".$_SESSION['id'].".".$imageExtention;
        if(move_uploaded_file($tempPath,$newDirectory .$newImageName )){
            $userId=$_SESSION['id'];
            $sql="update customers SET profileImage = '$newImageName' where id = $userId ";
            $res=mysqli_query($con,$sql);
            $_SESSION['profileImage']=$newImageName;

            header("location:index.php?state=The main picture has been changed");
        }
        }

        $sql1="select * from customers where username='admin' ";
        $res1=mysqli_query($con,$sql1);
     


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

  echo "</div>";

$i++;

if ($i==3 || $j==$nbrows){
echo "</div>";
$i=0;
}
 if($k==6){
    while($row1=mysqli_fetch_array($res1)){
        if(isset($_SESSION['username'])){
        if($_SESSION['role']== 1){
        echo "<img src=./uploads/mainImg/".$row1['profileImage']." onclick='changeImage()'  style='width:50%; margin:auto;display:block; border-radius:10px ;cursor:pointer ' >";
        }
    else{
        echo "<img src=./uploads/mainImg/admin_1.png   style='width:50%; margin:auto; display:block; border-radius:10px ;' >";
    }
}
        else
        {
            echo "<img src=./uploads/mainImg/admin_1.png   style='width:50%; margin:auto; display:block; border-radius:10px ;' >";

        }
    }}
}
?>
   
</div>

<!-- end of main -->

<!-- start of footer -->

   <footer>
        <p>&copy; <?php echo date('Y'); ?> Car Exhibition. All rights reserved.</p>
        <p>Designed and developed by Abdulrahman Al_Safwah</p>
        <p>Contact us:Info@Car.exhibition</p>
    </footer>

<script>
    function displayCar(clickedCar){
       let id=clickedCar.querySelector('.id').id;
       console.log(id);
       window.location.href="displayCar.php?id="+id;
    }

        function changeImage(){
                let popOut=document.querySelector('.changeImage');
                if(popOut.style.display=="none"){
                popOut.style.display='flex';
                console.log('text');
                }
                else
                {
                popOut.style.display='none';
            console.log('none')}
            }
        
        function search(search){

            var main=document.getElementById('main');
            console.log(search);

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                main.innerHTML=this.responseText;
        }
    };
    xmlhttp.open("GET", "searchMain.php?search=" + search ,true);
    xmlhttp.send();

            

        }

          function addToFavorites(carId) {
    // Your logic to add the car to favorites
    console.log("Added to favorites: Car ID - " + carId);
  }

  function removeFromFavorites(carId) {
    // Your logic to remove the car from favorites
    console.log("Removed from favorites: Car ID - " + carId);
  }


</script>
</body>
</html>