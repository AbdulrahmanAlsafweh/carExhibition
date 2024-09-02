<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; text-align: center; justify-content: center;background-color: #2e2e2e; ">
    
    <div class="signup-container">
        <h3>Sign Up</h3>
        <?php
        session_start();
        if(isset($_SESSION['error'])){
            echo "<p style= margin-top:0px;color:red>";
            echo $_SESSION['error'];
            echo "</p>";
        }
        ?>
        <form action="createAccount.php" method="post">
            <input type="text" placeholder="username" name="username">
            <br>
            <br>
            <input type="password" placeholder="password"  name="password" minlength="8">
            <br>
            <br>
            <br>
            <input type="submit" value="create account" id="login-btn">
        </form>
        <p>have an account,<a href="login.html">Login</a></p>
    </div>
</body>
</html>