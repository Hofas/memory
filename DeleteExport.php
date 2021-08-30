<?php
session_start();
if (!(isset($_SESSION['login']))) {
    header('location: http://localhost/memory/index.php');
    exit();
}
$action = $_GET['act'];
$packet = $_GET['pack'];
include 'db.php';
if ($action == 'delete') {


    $delQuery ="DELETE FROM packets WHERE name_packet = '${packet}'";
    mysqli_query($db, $delQuery);
    $dropTableQuery = "DROP TABLE ${packet}";
    mysqli_query($db,$dropTableQuery);
    header('location: http://localhost/memory/EIAD.php');
    exit();
}

if ($action == 'export') {
   //otwracie CSV
    $csvFile = "${packet}.csv";
    $handle = fopen($csvFile,"w");
    if ($handle) {
        $selectQuery = "SELECT * FROM ${packet}";
        $result = mysqli_query($db, $selectQuery);
        while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($handle,[$row['id'],$row['pl'],$row['en']]);
        }
        echo "Export OK";
        exit();
    }
        else {echo "error opening ${csvFile}";}
}

if ($action == 'import' &&  strlen($packet)>1  ) {
    echo "importuję do bazy ${packet} <br>";
    $createQuery = "CREATE TABLE ${packet} (id int(11) AUTO_INCREMENT PRIMARY KEY,
    pl VARCHAR(30),
    en VARCHAR(30))";
    $insertQuery = "INSERT INTO packets (name_packet) values ('${packet}')";
    mysqli_query($db, $createQuery);    //kreacja tabeli
    mysqli_query($db, $insertQuery);    // wstawienie wpisu do indeksu pakietow

    header('location: EIAD.php');
    exit();
} else  {header('location: EIAD.php');

}
