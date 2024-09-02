<!DOCTYPE html>
<html>
    <head>
        <title>Search Car</title>
        <style>
               body {
            font-family: Arial, sans-serif;
            background-color: #eeee;
            color: #2e2e2e;
            margin: 0;
            padding: 20px;
        }
        a img {
            margin: 0 auto;
            max-width: 100px;
        }
        a{
            text-decoration: none;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #2e2e2e;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        td.idB {
            font-weight: bold;
        }
        input{
            display: block;
            width: 200px;
            margin:  0 auto;
        }
        </style>
    </head>
    <body>
         <a href="admin.php">
           <img src="./assets/imgs/exit.png"  alt="exit"  width="100px">
           </a>
        <input type="text"  id="searchCar"  placeholder="Enter model.."  onkeyup="searchCar(this.value)">
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
            <tbody id="tableB">

            </tbody>
        </table>
    </body>

    <script>
        function searchCar(search){

            xmlhttp=new XMLHttpRequest(search);
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tableB").innerHTML = this.responseText;
    }
    };
console.log(search);
    xmlhttp.open("GET","search3.php?search=" + search ,true);
    xmlhttp.send();
        }
    </script>
</html>


<?php
session_start();
require "connection.php";




?>
