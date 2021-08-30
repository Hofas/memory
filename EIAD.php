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
    <link rel="stylesheet" href="EIAD.css">
    <title>EIAD</title>
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
<!--    <td><a href="DeleteExport.php/?act=delete&pack=${row['name_packet']}">Delete</a></td>-->
<!--    <td><a href="DeleteExport.php/?act=export&pack=${row['name_packet']}">Export</a></td>-->
    <td><input type="button" value="Delete" onclick="deleteFunction('${row['name_packet']}')"></td>
    <td><input type="button" value="Export" onclick="exportFunction('${row['name_packet']}')"></td>
    </tr>

    

tabela;
    }

?>
        <form action="addPacket.php" method="get" id="formAdd">
        <tr>
            <td>+</td>
            <td><input type="text" name="packetName" id="packetName"></td>
            <td><input type="button" id="addPacketButton" value="ADD"></td>
            <td><input type="button" id="importPacket" value="Import"></td>
        </tr>
        </form>
    </table>
    <button id="backButton" onclick="backFunction()">Back</button>
</div>

<div id="warningWindow">
    <div id="warningWindowContent">
      <div><p id="deleteMessage">Are You Sure? To delete </p> <br> </div>
    <div>
        <button class="buttYN" id="delYes">Yes</button>
    <button class="buttYN" id="delNo">NO</button>
    </div>
    </div>
    </div>

<script>
    let btnN = document.querySelector('#delNo');
    let btnY = document.querySelector('#delYes');
    let delM = document.querySelector('#deleteMessage');
    let delWindow = document.querySelector('#warningWindow');

    function exportFunction (pack) {
        console.log(pack);
        window.location.href = `DeleteExport.php/?act=export&pack=${pack}`
    }
    function deleteFunction (pack) {
                delM.innerHTML= `Are You Sure? You want to delete ${pack}`;
                localStorage.setItem('pack',`${pack}`)
                delWindow.style.display = "block";

    }
    function backFunction(){
        window.location.href="http://localhost/memory/settings.php";
    }

    btnN.addEventListener('click', ()=> {
        delWindow.style.display = "none";

    })
    btnY.addEventListener('click', ()=> {
        delWindow.style.display = "none";
        let pack = localStorage.getItem('pack');
        // console.log(`${pack} was deleted`);
        localStorage.clear();
        window.location.href = (`DeleteExport.php/?act=delete&pack=${pack}`);
    })

    let addPacketButton= document.querySelector('#addPacketButton');
    let formAdd= document.querySelector('#formAdd');
    let packetName = document.querySelector('#packetName');
    let importPacket = document.querySelector('#importPacket');
    addPacketButton.addEventListener('click', (e)=>{
    //
    //          // e.preventDefault();
    //             formAdd.submit();

        window.location.href = (`addPacket.php?packetName=${packetName.value}`);
        // alert('clickAdd');
    })
    importPacket.addEventListener('click',() => {
        window.location.href = `DeleteExport.php?act=import&pack=${packetName.value}`

    })

</script>

</body>
</html>
