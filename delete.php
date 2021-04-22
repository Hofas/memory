<?php
session_start();
include "db.php";
$id =  $_GET[id];
$packet = $_GET[packet];
$queryDelete = "DELETE from {$packet} where ID={$id}";


if ($_SERVER['HTTP_REFERER'] == 'http://localhost/memory/editpacket.php' && isset($_SESSION['login'])) {

echo "Ready to Delete from {$packet}";
    mysqli_query($db, $queryDelete);
    header("location: editpacket.php");

} else {

    header("location: index.php");

    }

