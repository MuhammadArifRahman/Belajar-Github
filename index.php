<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])){
    $username = $_POST['email'];
    $password = $_POST['password'];

    $cekUsername = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email' ");
    
    if( mysqli_num_rows($cekUsername) ){

        $user = mysqli_fetch_assoc($cekUsername);

        if( password_verify($password, $user['password']) ){
            header("Location:cover.php");
            exit;
        }
      
    }else{
        echo "<script>alert('Password atau Username salah') <script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="no1.css">
</head>
<body>
    <div class="alert alert-warning role="alert">
        <?php echo $_SESSION['error']?>
    </div>

    <div class="input-group">
        <input type="text" class="input" placeholder=" ">
        <label class="placeholder">Username</label>
    </div>

    <div class="password">
        <input type="text" class="input" placeholder=" ">
        <label class="placeholder">Password</label>
    </div>

    <div class="klik">
        <input type="submit" name="submit" value="klik">
    </div>
    
</body>
</html>
