<?php
session_start();
include "db.php";
if (isset($_SESSION['login'])){
    $user = $_SESSION['login'];
    $packet = $_COOKIE['packet'];
} else {header('location: index.php');}
//$query = "INSERT INTO ogrod (en, pl) VALUES ('plant','roślina')";
?>


<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="editpacket.css">
    <link rel="icon" href="images/brain.png">
    <title>Edit Packet</title>
</head>
<body>
    <div class="container">

        <div class="header">
            <p>You Are Editing: <?php echo $packet?> </p>
        </div>

        <form action="update.php" method="post">
        <div class="table">

        <?php
        $query = "SELECT * from {$packet}";
        $result = mysqli_query($db, $query);

        ?>

        <table>
            <tr>
                <th>ID</th>
                <th>PL</th>
                <th>EN</th>
                <th>Remove</th>

            </tr>
<?php
$id = 1;
while ($row = mysqli_fetch_assoc($result)) {

echo <<<tabela

            <tr id="{$id}">
                <td>{$row['id']}</td>
                <td class="tdPL"> <input type="text" value="{$row['pl']}" name="plrow{$row['id']}"> </td>
                <td class="tdEN"> <input type="text" value="{$row['en']}" name="enrow{$row['id']}"> </td>
                <td><a href="delete.php?id={$row['id']}&packet={$packet}">Delete</a></td>
            </tr>
tabela;
$id++;
 $last = $row['id'] +1;
};

echo <<<tabelaEnd
    <tr>
                <td>{$last}</td>
                <td class="tdPL"> <input type="text" value="" name="addPL"> </td>
                <td class="tdEN"> <input type="text" value="" name="addEN"> </td>
                <td>Enter to ADD</td>
            </tr>
tabelaEnd;
?>

        </table>
        </div>
        <button type="submit">SAVE Change</button>
            <a href="settings.php" id="backButton">Back</a>
        </form>
    </div>



    <script type="text/javascript">
        const tabela =document.querySelector('table');
        tabela.addEventListener('click',(e)=>{
            console.log(e.target);

        })



    </script>
</body>
</html>
