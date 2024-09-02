<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .profile-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 24px;
            font-weight: bold;
        }

        .logout-link {
            font-size: 16px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .changeImage {
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

        .changeImage h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .changeImage p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .changeImage input[type="file"] {
            margin-bottom: 20px;
        }

        .changeImage button {
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div>
            <?php
            session_start();

            require "connection.php";
            echo "<img class='profile-image' onclick='changeImage()' src=./uploads/profiles/" . $_SESSION['profileImage'] . " alt='Profile Image'>";
          if(isset($_POST['submit'])){
        $originalName= $_FILES['image']['name'];
        $fileInfo=pathinfo($originalName);
        $imageExtention=$fileInfo['extension'];
        $newDirectory='./uploads/profiles/';
        $tempPath=$_FILES['image']['tmp_name'];

        $newImageName=$_SESSION['username']."_".$_SESSION['id'].".".$imageExtention;
        if(move_uploaded_file($tempPath,$newDirectory .$newImageName )){
            $userId=$_SESSION['id'];
            $sql="update customers SET profileImage = '$newImageName' where id = $userId ";
            $res=mysqli_query($con,$sql);
            $_SESSION['profileImage']=$newImageName;

            header("location:account.php?state=The profile picture has been changed");
        }}
         ?>
        </div>
        <div class="welcome-message">
            <?php
            $currentHour = date("H");
            $welcoming = "";
            if ($currentHour >= 4 && $currentHour < 12) {
                $welcoming = "Good Morning";
            } else if ($currentHour >= 12 && $currentHour < 17) {
                $welcoming = "Good Afternoon";
            } else if ($currentHour >= 17 && $currentHour < 21) {
                $welcoming = "Good Evening";
            } else {
                $welcoming = "Good Night";
            }
            echo "{$welcoming}, {$_SESSION['username']}";
            ?>
        </div>
        <div>
            <a class="logout-link" href="index.php">Home</a>
        </div>
        <div>
            <a class="logout-link" href="logout.php">Logout</a>
        </div>
        
    </div>

    <div class="changeImage">
        <h2>Change Your Profile Image</h2>
        <?php
        if (isset($_GET['state'])) {
            echo "<p>{$_GET['state']}</p>";
        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit" value="Change">
        </form>
        <div>
            <button onclick="changeImage()">Close</button>
        </div>
    </div>

    <script>
        function changeImage() {
            let popOut = document.querySelector('.changeImage');
            if (popOut.style.display == "none") {
                popOut.style.display = 'flex';
            } else {
                popOut.style.display = 'none';
            }
        }
    </script>

</body>
</html>
