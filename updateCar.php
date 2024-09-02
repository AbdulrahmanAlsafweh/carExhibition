<!DOCTYPE html>
<html>
    <head>
        <title>Delete Car</title>

        <style>
                 body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        a img {
            max-width: 100px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        td.idB {
            font-weight: bold;
        }
         .updateCar{
            background-color: #eee;
            width: 400px;
            height: fit-content;
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
        </style>
    </head>
    <body>
     
        <a href="admin.php">
            <img src="./assets/imgs/exit.png" width="100px" alt="">
        </a>
        <h1>Edit Car</h1>


         <div class="updateCar" >

            <h2>edit car</h2>
          <form  method="post" action="updateCar2.php" enctype="multipart/form-data">
        <input type="file"  name="image">
      
        <br><br>
    

        <input type="text" placeholder="Model" id="model" name="model">
       
        <br><br>
        <input type="date" placeholder="Year" id="year" name="year">
        <br><br>
        <input type="number" placeholder="Top Speed" id="topSpeed" name="topSpeed">
        <br><br>
        <input type="text" placeholder="Color" id="color" name="Color">
        <br><br>
        <input type="number" placeholder="Price" id="price" name="price">
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
        <input type="submit" value="edit" name="submit" onclick="display()">
    </form>
            <div>
                <button onclick="openPop()">Close</button>
            </div>
        </div>

       
     
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
                           <th>edit</th>

            </thead>
            <tbody id="tb" >
              
            </tbody>
        </table>
        <script>
            
            window.onload=display();




           function display() {

          

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('tb').innerHTML = this.responseText;
        }
    };
  
    xmlhttp.open("GET", "updateCar2.php?", true);
    xmlhttp.send(); 
    
}

            
            function openPop(img){
            
                let popOut=document.querySelector('.updateCar');
                 if(popOut.style.display=="none"){
                popOut.style.display='flex';
                console.log('text');
                }
                else
                {
                popOut.style.display='none';
            console.log('none')}
                let row=img.parentNode.parentNode.querySelector(".idB").textContent;
                
                var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        }
    };
    
    xmlhttp.open("GET", "updatedCar.php?carId="+row ,true);
    xmlhttp.send();

            }
        </script>
    </body>
</html>

