<?php
session_start();
include "db.php";
if (isset($_SESSION['login'])){
    $user = $_SESSION['login'];
    $packet = $_COOKIE['packet'];
} else {header('location: index.php');}

$query = "SELECT * FROM {$packet}";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $pl = $_POST["plrow{$id}"];
    $en = $_POST["enrow{$id}"];

    $queryUpdate = "UPDATE {$packet} SET pl = '{$pl}', en = '{$en}'  WHERE id = '{$id}'";

    mysqli_query($db, $queryUpdate);



}
if ( strlen($_POST['addPL'])>1 && strlen($_POST['addEN'])>1 ){
    $pl = $_POST['addPL'];
    $en = $_POST['addEN'];

$insertQuery = "INSERT INTO {$packet} (pl,en) VALUES ('$pl','$en')";
mysqli_query($db, $insertQuery);

}

header('location: editpacket.php#backButton')
?>