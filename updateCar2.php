<?php
session_start();
require "connection.php";

if (isset($_POST['submit'])) {
    // Handle the file upload
      if(isset ($_FILES['image']) && $_FILES['image']['error']==UPLOAD_ERR_OK){
        $carId=$_SESSION['updatedCar'];
        $originalFileName=$_FILES['image']['name'];
        $tempPath=$_FILES['image']['tmp_name'];
        $fileInfo = pathinfo($originalFileName);
        $newFileName=$_POST['manufacturingCompany']."_".$_SESSION['updatedCar'];
        $destination='uploads/cars/';
        if(move_uploaded_file($tempPath,$destination.$newFileName.".".$fileInfo['extension'])){
            echo "image uploaded";
            $path=$newFileName.".".$fileInfo['extension'];
             $sql4 = "UPDATE `cars` 
            SET 
                `imagename` = '$path'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql4);
        }
        else {
            echo "error uploading image";
        }
    }
    $model = $_POST['model'];
    $year = $_POST['year'];
    $topSpeed = $_POST['topSpeed'];
    $color = $_POST['Color'];
    $price = $_POST['price'];
    $manufacturingCompany = $_POST['manufacturingCompany'];
    $fuelType = $_POST['fuelType'];
    $transmissionType = $_POST['transmissionType'];
    $branchId = $_POST['branchId'];
    $carId=$_SESSION['updatedCar'];
 
    
    echo "Model: " . $model . "<br>";
    echo "Year: " . $year . "<br>";
    echo "Top Speed: " . $topSpeed . "<br>";
    echo "Color: " . $color . "<br>";
    echo "Price: " . $price . "<br>";
    echo "Manufacturing Company: " . $manufacturingCompany . "<br>";
    echo "Fuel Type: " . $fuelType . "<br>";
    echo "Transmission Type: " . $transmissionType . "<br>";
    echo "Branch ID: " . $branchId . "<br>";

    if(!empty($color)){
   $sql = "UPDATE `cars` 
            SET 
                `color` = '$color'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

        if(!empty($topSpeed)){
   $sql = "UPDATE `cars` 
            SET 
                `top-speed` = '$topSpeed'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

         if(!empty($topSpeed)){
   $sql = "UPDATE `cars` 
            SET 
                `top-speed` = '$topSpeed'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

         if(!empty($price)){
   $sql = "UPDATE `cars` 
            SET 
                `price` = '$price'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

         if(!empty($year)){
   $sql = "UPDATE `cars` 
            SET 
                `year` = '$year'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

        if(!empty($branchId)){
   $sql = "UPDATE `cars` 
            SET 
                `exhibition-id` = '$branchId'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

        if(!empty($manufacturingCompany)){
   $sql = "UPDATE `cars` 
            SET 
                `manufacturing-copmany-id` = '$manufacturingCompany'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

     

          if(!empty($fuelType)){
   $sql = "UPDATE `cars` 
            SET 
                `fuel-type` = '$fuelType'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

          if(!empty($transmissionType)){
   $sql = "UPDATE `cars` 
            SET 
                `transmission-type` = '$transmissionType'
                
            WHERE `car-id` = $carId ";
            mysqli_query($con,$sql);
    }

header("location:updateCar.php");
}

if(isset($_REQUEST['topSpeed'])){

    $topSpeed=$_REQUEST['topSpeed'];

    $sql="UPDATE `cars` 
            SET 
                `top-speed` = '$topSpeed'
                
            WHERE `car-id` = 4442 ";
            mysqli_query($con,$sql);

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
                    echo "<td> <img src='./assets/imgs/edit.png'  onclick=openPop(this) width=50px style='cursor:pointer'  /> ";
                    echo "<tr>";
                }


?>