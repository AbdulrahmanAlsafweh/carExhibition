<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add new student</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #eeee;
            color: #2e2e2e;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2e2e2e;
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input, select {
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
        }
        input[type="submit"]:hover {
            background-color: #444;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        a {
            color: #2e2e2e;
        }
    </style>
</head>
<body>
    <a href="admin.php">
        <img src="./assets/imgs/exit.png" width="100px">
    </a>
    <h1>Add Car</h1>
    <form  method="post" enctype="multipart/form-data" >
    <input type="file"  name="image">
        <br><br>
        <input type="text" placeholder="Car Id" name="id">
        <br><br>

        <input type="text" placeholder="Model" name="model">
       
        <br><br>
        <input type="date" placeholder="Year" name="year">
        <br><br>
        <input type="number" placeholder="Top Speed" name="topSpeed">
        <br><br>
        <input type="text" placeholder="Color" name="Color">
        <br><br>
        <input type="number" placeholder="Price" name="price">
        <br><br>
            <label for="manufacturingComany">Manufacturing Company</label>
        <select name="manufacturingCompany" id="manufacturingCompany">
        <?php
        require "connection.php";

        $sql="select * from `manufacturing-company`";
        $res=mysqli_query($con,$sql);

        while($row=mysqli_fetch_array($res)){
            echo "<option value=".$row['id'].">".$row['name']."</option>";
        }

        ?>
       
        </select>
          <br><br>
       <label for="fuelType">Fuel Type:</label> <select name="fuelType" id="fuelType">
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
        </select>
      
        
   
          <br>
        <br>
       <label for="TransmissionType">Transmission Type:</label> <select name="transmissionType" id="TransmissionType">
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
        </select>
        <br><br>
        <label for="branchId">Branch:</label><select name="branchId" id="branchId">
            
        <?php
        

        $sql="select * from carexhibition ";
        $res=mysqli_query($con,$sql);

        while($row=mysqli_fetch_array($res)){
            echo "<option value=". $row['exhibition-id']." > ".$row['exhibition-name']."</option>";
        }
        ?>
                </select>
        <br><br><br>
        <input type="submit" value="add" name="submit">
    </form>
</body>
</html>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors',1);
require "connection.php"; // Assuming you have a connection file set up with the name "connection.php"

// uploading image 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    if(isset ($_FILES['image']) && $_FILES['image']['error']==UPLOAD_ERR_OK){
        $originalFileName=$_FILES['image']['name'];
        $tempPath=$_FILES['image']['tmp_name'];
        $fileInfo = pathinfo($originalFileName);
        $newFileName=$_POST['manufacturingCompany']."_".$_POST['id'];
        $destination='uploads/cars/';
        if(move_uploaded_file($tempPath,$destination.$newFileName.".".$fileInfo['extension'])){
            echo "image uploaded";
        }
        else {
            echo "error uploading image";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carId = $_POST['id'];
    $model = $_POST['model'];
    $manufacturingCompany = $_POST['manufacturingCompany'];
    $year = $_POST['year'];
    $topSpeed = $_POST['topSpeed'];
    $color = $_POST['Color'];
    $price = $_POST['price'];
    $fuelType = $_POST['fuelType'];
    $transmissionType = $_POST['transmissionType'];
    $branchId = $_POST['branchId'];
        
    //image
    $fileInfo=pathinfo($_FILES['image']['name']);
    $imagename=$manufacturingCompany."_".$carId.".".$fileInfo['extension'];
    // $imagename=basename($_FILES['image']['name']);
    // Prepare the SQL statement
    $sql = "INSERT INTO `cars`(`car-id`, `model`,`manufacturing-company-id` , `year`, `top-speed`, `color`, `price`, `fuel-type`, `transmission-type`, `exhibition-id`,`imagename`)
            VALUES ('$carId', '$model', '$manufacturingCompany', '$year', '$topSpeed', '$color', '$price', '$fuelType', '$transmissionType', '$branchId','$imagename')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
