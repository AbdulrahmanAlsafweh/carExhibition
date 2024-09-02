<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
    <style>
          table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
       
    </style>
</head>
<body>
    <h1>Search by Manufacturing Company</h1>
    <form method="post">
        <select name="manufacturingCompany" id="manufacturingCompany">
            <?php
            require "connection.php";
            $sql = "SELECT * FROM `cars`";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {
                echo "<option value='" . $row['manufacturing-company'] . "'>" . $row['manufacturing-company'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Search">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedCompany = $_POST["manufacturingCompany"];
        $sql = "SELECT * FROM `cars` WHERE `manufacturing-company` = '$selectedCompany'";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>";
            echo "<tr><th>Car ID</th><th>Model</th><th>Manufacturing Company</th><th>Year</th><th>color</th><th>Transmission Type</th><th>Fuel Type</th><th>Top Speed</th></tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['car-id'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['manufacturing-company'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['color'] . "</td>";
                echo "<td>" . $row['transmission-type'] . "</td>";
                echo "<td>" . $row['fuel-type'] . "</td>";
                echo "<td>" . $row['top-speed'] . "</td>";


                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No cars found for the selected manufacturing company.</p>";
        }
    }
    ?>
    <h4><a href="index.html">Back</a> to main menu </h4>


</body>
</html>
