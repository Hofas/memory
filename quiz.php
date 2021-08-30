<?php
session_start();
if (isset($_SESSION['login'])){
    $user = $_SESSION['login'];
    $packet = $_COOKIE['packet'];

    include "db.php";
    $score = 0;
    $query = "SELECT * from {$packet}";
    $result = mysqli_query($db, $query);
    $rows = mysqli_num_rows($result);

    $i = rand(1,$rows);


    $query = "SELECT * from {$packet} WHERE id = {$i}";
    $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)){

        $pl=$row['pl'];
        $en=$row['en'];


        $_SESSION['en'] = $en;
        $_SESSION['pl'] = $pl;

    }



} else {header('location: index.php');}




?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="quiz.css">
        <title>Memory</title>
</head>
<body>

<div class="container">

    <div class="header">
    <?php echo "<h1> WELCOME ".$user." You start to learn from ".$packet."</h1>"; ?>
    </div>
    <div class="questionBox">
        <p id="p_question"><?php echo "{$en}";?></p>

    </div>
    <div class="answerBox">

<!--        <form action="checkAnswer.php" method="post">-->
<!--            <label for="answers">-->

<!--                -->
<!--                //if(isset($_SESSION['correctAnswer'])){-->
<!--//                    $rightAnswer =  $_SESSION['correctAnswer'];-->
<!--//                } else {$rightAnswer = '';};-->

                 <input id='answer' name='answer' type='text' placeholder='odp' autofocus="true">

<!--            </label>-->
<!--            <input type="submit" value="Check">-->
<!--        </form>-->

        <p id="answerP"><?php if (isset($_SESSION['score'])) {echo $_SESSION['score'];};?></p>

    

        <p>prawidłowa odp. to:<?php
            if(isset($_SESSION['correctAnswer'])){
                echo $_SESSION['correctAnswer'];};

            ?></p>


        <a id="logoff_button" href="settings.php">Exit</a>

    </div>



</div>





<script src="main.js"></script>
</body>



</html>