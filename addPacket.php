<?php
session_start();
include "db.php";
if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];

} else {header('location: index.php');}

$getQuerry = "SELECT * FROM packets";
$result = mysqli_query($db, $getQuerry);


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

    <table>
      <tr>
      <th>ID</th>
      <th>Name</th>

      </tr>


<?php
while ($row = mysqli_fetch_assoc($result)) {
echo <<<tabela
    <tr>
    <td>{$row['id']}</td>
    <td>{$row['name_packet']}</td>
    <td><a href="">Delete</a></td>
    <td><a href="">Export</a></td>
    </tr>

tabela;
    }

?>
        <tr>
            <td>+</td>
            <td><input type="text"></td>
            <td><a href="">ADD</a></td>
            <td><a href="">Import</a></td>
        </tr>

    </table>

</div>



</body>
</html>
