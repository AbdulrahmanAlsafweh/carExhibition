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
       
        </style>
    </head>
    <body>
        <a href="admin.php">
            <img src="./assets/imgs/exit.png" width="100px" alt="">
        </a>
        <h1>Delete Car</h1>

       
     
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
                           <th>delete</th>

            </thead>
            <tbody id="tb" >
              
            </tbody>
        </table>
        <script>
            window.onload(display());

            function deleteRow(btn){
            var row = btn.parentNode.parentNode;
            var id=row.querySelector('.idB').textContent;
            console.log(id);

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('tb').innerHTML=this.responseText;
        }
    };
    xmlhttp.open("GET", "deleteCar2.php?id=" + id ,true);
    xmlhttp.send();

            }



              function display(){
   var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('tb').innerHTML=this.responseText;
        }
    };
    
    xmlhttp.open("GET", "deleteCar2.php?" ,true);
    xmlhttp.send();

            }

        </script>
    </body>
</html>

