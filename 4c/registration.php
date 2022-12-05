<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $h_password= password_hash($password, PASSWORD_DEFAULT);
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' ");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email has already been taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$h_password')";
            mysqli_query($conn,$query);
            header("Location: regsuccess.php");
        }
        else{
            echo
            "<script> alert('Password Does not Match.'); </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Registration</title>
</head>
<body class="register">
    <h2 id="reghead">REGIST<b id="ration" >RATION</h2><br>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" reduired value=""> <br> <br>

        <label for="username">Username : </label>
        <input type="text" name="username" id="username" reduired value=""> <br> <br>

        <label for="email">Email : </label>
        <input type="email" name="email" id="email" reduired value=""> <br><br>

        <label for="password">Password : </label>
        <input type="password" name="password" id="password" reduired value=""> <br><br>

        <label for="">Confirm Password : </label>
        <input type="password" name="confirmpassword" id="confirmpassword" reduired value=""> <br><br>

        <button id="reg" type="submit" name="submit">REGISTER</button><br>
    </form>
    <br>
    <p>ALREADY REGISTERED? LOGIN NOW</p>
    <a id="login" href="login.php">LOGIN</a>
</body>
</html>