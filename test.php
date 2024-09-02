<!DOCTYPE html>
<html>
    <head>
        <title>search car</title>
    </head>
    <body>
        <label for="searchType">Search For A Car By:</label>
        <select  id="searchType" onchange="search()">
            <option value="name">
                Branch Name
            </option>
            <option value="branchLocation">
                Branch Location
            </option>
            <option value="manufacturingCompany">
                Manufacturing Company
            </option>
        </select>

        <div id="space">

        </div>
        <script>
             function search() {
                var type = document.getElementById("searchType").value;

                if (type === "branchLocation") {
                    var select = document.createElement('select');
                    select.id = "branchLocationSelect";
                    const space=document.getElementById('space');
                    space.innerHTML="Exhibition Location";
                   space.appendChild(select);
                    
                    <?php
                        require "connection.php";
                        $sql = "SELECT  `location` FROM `carexhibition`";
                        $res = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($res)) {
                            echo "var option = document.createElement('option');";
                            echo "option.value = '". $row['location'] ."';";
                            echo "option.text = '". $row['location'] ."';";
                            echo "document.getElementById('branchLocationSelect').appendChild(option);";
                        }
                    ?>
                }
                if (type === "name") {
                    var select = document.createElement('select');
                    select.id = "branchNameSelect";
                    const space=document.getElementById('space');
                    space.innerHTML="Exhibition Name:";
                   space.appendChild(select);
                    <?php
                        require "connection.php";
                        $sql = "SELECT  `exhibition-name` FROM `carexhibition`";
                        $res = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($res)) {
                            echo "var option = document.createElement('option');";
                            echo "option.value = '". $row['exhibition-name'] ."';";
                            echo "option.text = '". $row['exhibition-name'] ."';";
                            echo "document.getElementById('branchNameSelect').appendChild(option);";
                        }
                    ?>
                }
                if (type === "manufacturingCompany") {
                    var select = document.createElement('select');
                    select.id = "branchCompanySelect";
                    const space=document.getElementById('space');
                    space.innerHTML="Manufacturing Company:";
                   space.appendChild(select);
                    <?php
                        require "connection.php";
                        $sql = "SELECT  `manufacturing-company` FROM `cars`";
                        $res = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_array($res)) {
                            echo "var option = document.createElement('option');";
                            echo "option.value = '". $row['manufacturing-company'] ."';";
                            echo "option.text = '". $row['manufacturing-company'] ."';";
                            echo "document.getElementById('branchCompanySelect').appendChild(option);";
                        }
                    ?>
                }
            }

         
            
        </script>
    </body>
</html>