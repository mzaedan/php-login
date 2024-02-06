<?php
include "service/database.php";

$sql = "SELECT * FROM users";
$result = $db->query($sql);
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
    <h3>Daftar User</h3>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

    <?php include "layouts/footer.html" ?>
    
</body>
</html>