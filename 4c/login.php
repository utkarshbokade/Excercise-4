<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    
    if (password_verify($password, $row["password"])) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("location: index.php");
    }else{
            header("location: error.php");
        }
//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $verify = password_verify($password, $row['password']);
//         if ($verify == 1) {
//             $_SESSION["login"] = true;
//             $_SESSION["id"] = $row["id"];
//             header("location: index.php");
//         } else {
//             header("location: error.php");
//             //echo
//             //"<script> alert('Incorrect Password'); </script>";
//         }
//     } else {
//         header("location: error2.php");
//         //echo
//         //"<script> alert('User not registered'); </script>";
//     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body class="login">
    <h2 id="heading">LOG<b id="in">IN</h2>
    <br>
    <form class="" action="" method="post" autocomplete="off">
        <label for="usernameemail">Username or Email : </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""> <br> <br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required value=""> <br> <br>
        <button id="login" type="submit" name="submit">LOGIN</button>
    </form>
    <br>
    <h3>Not Registered Yet?</h3>
    <h3>Register to create an account!</h3> <br>
    <a id="reg" href="registration.php">REGISTER</a>
</body>
</html>
