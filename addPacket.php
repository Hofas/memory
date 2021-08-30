<?php
session_start();
if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
} else {header('location: index.php');}
include "db.php";

if (strlen($_GET['packetName'])>1){

    $packetNAME = $_GET['packetName'];
} else {header('location: EIAD.php');
        exit();
        }

include "db.php";
$createSQL = "CREATE TABLE {$packetNAME} (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    pl varchar(24) NOT NULL,
    en varchar(24) NOT NULL
)";
$insertQuery = "INSERT INTO packets (name_packet) VALUES ('{$packetNAME}')";

mysqli_query($db, $createSQL);
mysqli_query($db, $insertQuery);

//echo "done";
header ('location:EIAD.php');