<?php

include "service/database.php";
session_start();

$register_message = "";

if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
}

if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username) || empty($password)){
        $register_message = "Username dan Password Harus Diisi";
    }else{
        $hash_password = hash("sha256",$password);

        try {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";

            if($db->query($sql)) {
                $register_message = "Daftar Akun Berhasil";
            }else{
                $register_message = "Daftar Akun Gagal";
            }
        }catch(mysqli_sql_exception){
            $register_message = "Username Sudah Digunakan";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layouts/header.html" ?>
    <h3>DAFTAR AKUN</h3>
    <i><?= $register_message ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="text" placeholder="password" name="password">
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>
    <?php include "layouts/footer.html" ?>
</body>
</html>