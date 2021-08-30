<?php
session_start();
include "db.php";
if (isset($_SESSION['login'])){
    $user = $_SESSION['login'];
    $_SESSION['score'] = 0;
} else {header('location: index.php');}

?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="settings.css">
    <link rel="icon" href="images/brain.png">
    <title>Memory Settings</title>
</head>
<body onload="startPage()">
<div class="container">
    <div class="header">
        <p>Welcome <?php echo $user?> </p>
    </div>
    <nav>
    <ul>

        <li>
        <a href="EIAD.php">Add/Delete/Export/Import packet...</a>
        
        </li>
        <li>
            Packet to Learn
            <select name="packet" id="packet">
           
           <?php
           $query = "SELECT * FROM packets";
           $result = mysqli_query($db, $query);
           if (!$result){
               die ("query faild".mysqli_error($db));
           } else {
               while ($row = mysqli_fetch_assoc($result)) {

                   echo "<option value=${row['name_packet']}>${row['name_packet']}</option>";
                //    value=${row['name_packet']} ${row['name_packet']}
               }
           }
           ?>



            </select>
        
        </li>

        <li>choose level
            <select name="level" id="level">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

        </li>

        <li>
            <a href="quiz.php">Start To learn</a>

        </li>

        <li>

            <a href="editpacket.php#backButton" >Edit Packet</a>

        </li>

        <li>
<!--            <button id="logoff_button">LogOff</button>-->
<!--        <a id="logoff_button" href="logoff.php">LogOFF</a>-->
            <p id="logOff">LogOff</p>
        </li>

    </ul>

    </nav>

</div>
<script type="text/javascript">
    
    const packet = document.querySelector('#packet');

    function startPage(){
    
    document.cookie = `packet=${packet.value}`
    
    
    }
    

    packet.addEventListener('change',()=>{
        console.log(packet.value);
        document.cookie = `packet=${packet.value}`;
        localStorage.setItem("packet",packet.value);
    })
const logoff = document.querySelector('#logOff');
    logoff.addEventListener('click',()=>{
        let confirm1 = confirm('Are You Shure To log OFF?');
        if (confirm1) {
            location.href = "logoff.php";
                  }




    })

</script>

</body>
</html>
