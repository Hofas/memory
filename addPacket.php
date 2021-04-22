<?php
session_start();
include "db.php";
if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];

} else {header('location: index.php');}





?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="AddPacketStyle.css">
    <title>Add Packet</title>
</head>
<body>

<div class="container">

    <form action="" method="post">
        nazwa nowego pakietu:
        <input type="text">
        <input type="submit" value="add">
        
    </form>
    
</div>



</body>
</html>
